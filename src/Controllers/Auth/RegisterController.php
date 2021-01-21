<?php

namespace Mariojgt\Skeleton\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Mariojgt\Skeleton\Models\User;
use Illuminate\Support\Facades\Redirect;
use Mariojgt\Skeleton\Events\UserVerifyEvent;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class RegisterController extends Controller
{

    public function register()
    {
        return view('skeleton::content.auth.register');
    }

    public function userRegister(Request $request)
    {
        // Validate the user
        $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
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
