<?php

namespace Mariojgt\Skeleton\Controllers\Auth;

use Inertia\Inertia;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Auth\Events\PasswordReset;

class ResetPassword extends Controller
{
    /**
     * @return [blade view]
     */
    public function index()
    {
        if (config('skeleton.inertiajs_enable')) {
            return Inertia::render('Login/Reset', [
                'title' => 'Login',
            ]);
        } else {
            return view('skeleton::content.auth.forgot');
        }
    }

    /**
     * Send a link so the user can reset the password.
     *
     * @param Request $request
     *
     * @return [redirect]
     */
    public function reset(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        Password::sendResetLink(
            $request->only('email')
        );

        return Redirect::back()->with('success', 'Password link sent with success.');
    }

    /**
     * @param mixed $token
     *
     * @return [blade view]
     */
    public function passwordReset($token)
    {
        if (config('skeleton.inertiajs_enable')) {
            return Inertia::render('Login/ResetPassword', [
                'token' => $token,
            ]);
        } else {
            return view('skeleton::content.auth.reset_password', compact('token'));
        }
    }

    /**
     * Change the user password.
     *
     * @param Request $request
     *
     * @return [Redirect]
     */
    public function passwordChange(Request $request)
    {
        $request->validate([
            'token'    => 'required',
            'email'    => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);
        // Using laravel default password reset
        Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                ])->save();

                $user->setRememberToken(Str::random(60));

                event(new PasswordReset($user));
            }
        );

        return Redirect::route('login')->with('success', 'Password Update');
    }
}
