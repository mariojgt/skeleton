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
use App\Helpers\AuthOverride;

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

        // In here we call a helper case we need some bespoke extra fuctions
        $authOverhide = new AuthOverride();
        $authOverhide->customRegister($request, $user);

        // Send the verification to the user
        UserVerifyEvent::dispatch($user);
        DB::commit();

        return Redirect::back()
            ->with('success', 'Account Created with success, Please check you email for a verification link.');
    }
}
