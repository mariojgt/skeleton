<?php

namespace Mariojgt\Skeleton\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Mariojgt\Skeleton\Models\User;
use Illuminate\Support\Facades\Redirect;
use Mariojgt\Skeleton\Events\UserVerifyEvent;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{

    /**
     * @return [blade view]
     */
    public function register()
    {
        return view('skeleton::content.auth.register');
    }

    /**
     * Register a new user to the website
     *
     * @param Request $request
     *
     * @return [redirect]
     */
    public function userRegister(Request $request)
    {
        if (config('skeleton.register_enable') == false) {
            return  Redirect::back()->with('error', 'Sorry but registration has been disable.');
        }

        // Validate the user Note the smal update in the password verification
        $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Password::min(8)->uncompromised()],
        ]);

        $user           = new User();
        $user->name     = Request('name');
        $user->email    = Request('email');
        $user->password = Hash::make(Request('password'));
        $user->save();

        // Send the verification to the user
        UserVerifyEvent::dispatch($user);

        return  Redirect::back()->with('success', 'Account Created with success, Please check you email for a verification link.');
    }
}
