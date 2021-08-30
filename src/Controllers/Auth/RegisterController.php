<?php

namespace Mariojgt\Unityuser\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Mariojgt\UnityAdmin\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules\Password;
use Mariojgt\Onixserver\Helpers\ApiHelper;
use Mariojgt\Unityuser\Events\UserVerifyEvent;
use Mariojgt\Onixserver\Controllers\Gateway\GatewayController;

class RegisterController extends Controller
{
    /**
     * @return [blade view]
     */
    public function register()
    {
        return view('unity-user::content.auth.register');
    }

    /**
     * Register a new user to the aplication.
     *
     * @param Request $request
     *
     * @return [redirect]
     */
    public function userRegister(Request $request)
    {
        if (config('unityuser.register_enable') == false) {
            return  Redirect::back()->with('error', 'Sorry but registration has been disable.');
        }

        // Validate the user Note the small update in the password verification
        $request->validate([
            'first_name'  => ['required', 'string', 'max:255'],
            'last_name'   => ['required', 'string', 'max:255'],
            'plan'        => ['required'],
            'email'       => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'    => ['required', 'confirmed', Password::min(8)],
        ]);

        DB::beginTransaction();

        // Create the user in the database
        $user             = new User();
        $user->first_name = Request('first_name');
        $user->last_name  = Request('last_name');
        $user->email      = Request('email');
        $user->password   = Hash::make(Request('password'));
        $user->save();

        // beskpoke part here

        // Create the customer in the stripe and generate a key
        $gateway = new GatewayController();
        $gateway->createCustomer($user);

        // If is a paid plan we can create a subscription and charge the customer
        if (request('plan') == 'paid') {

            $request->validate([
                "number"    => ['required'],
                "exp_month" => ['required', 'numeric'],
                "exp_year"  => ['required', 'numeric'],
                "cvc"       => ['required', 'numeric'],
            ]);

            // Validate payment
            $paymentInfo = $gateway->createPaymentMethod($request);
            // If fail return error and roll all database back
            if ($paymentInfo == false) {
                DB::rollback();
                return Redirect::back()
                    ->with('error', 'Card information invalid please try again.')
                    ->withInput(Request()->all());
            }

            // Now update the user payment method and subscribe him
            $apiHelper           = new ApiHelper();
            $userKey             = $apiHelper::getUserKeyInfo($user);

            // Update the customer payment method
            $customerUpdatedInfo = $gateway
                ->updateUserPaymentInformation($userKey->customer_ref_payment, $paymentInfo->id);
            // Store the payment method ref in the key
            $userKey->payment_ref      = $customerUpdatedInfo->id;
            $userKey->save();

            // Create the subscription on stripe
            $subscriptionSchedule = $gateway->createSubscription($user);

            // for test only
            //StripeUserSubscriptionSuccessEvent::dispatch($subscriptionSchedule);

            // The account update fpr the paid plan is done using weebhook
            // The invoice is generated using the webhook
        }
        // beskpoe finish
        // Send the verification to the user
        UserVerifyEvent::dispatch($user);
        DB::commit();

        return Redirect::back()
            ->with('success', 'Account Created with success, Please check you email for a verification link.');
    }
}
