<?php

namespace Mariojgt\Skeleton\Controllers\Auth;

use Illuminate\Http\Request;
use Mariojgt\Skeleton\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function index()
    {
        return view('skeleton::content.auth.login');
    }

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

        return  Redirect::back()->with('success', 'success');
    }

    public function login(Request $request)
    {
        // Validate the user
        $request->validate([
            'email'    => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return Redirect::route('home_dashboard')->with('success', 'Welcome :)');
        } else {
            return  Redirect::back()->with('error', 'Credentials do not match');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        return Redirect::route('login')->with('success', 'By :)');
    }
}
