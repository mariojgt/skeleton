<?php

namespace Mariojgt\Skeleton\Controllers\Api;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Mariojgt\Skeleton\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Mariojgt\Skeleton\Events\UserVerifyEvent;
use Validator;

class AuthApi extends Controller
{
    public function login(Request $request)
    {
        // Validate the user
        $validator = Validator::make($request->all(), [
            'email'    => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ]);
        // If Validation Fail
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $credentials = $request->only('email', 'password');
        // Try login
        if (Auth::attempt($credentials)) {
            // Create the device name
            $tokenName = $_SERVER['SERVER_NAME'] . '-' . Request('device') ?? Carbon::now();
            // Return the token to be used in the api
            $token = Auth::user()->createToken($tokenName)->plainTextToken;

            return response()->json([
                'raw_token' => $token,
                'token'     => explode('|', $token)[1],
                'status'    => true,
            ]);
        } else {
            return response()->json([
                'data' => 'User not found',
            ], 401);
        }
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        // If Validation Fail
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        // Create the user
        $user           = new User();
        $user->name     = Request('name');
        $user->email    = Request('email');
        $user->password = Hash::make(Request('password'));
        $user->save();

        // Send the verification to the user
        UserVerifyEvent::dispatch($user);

        return response()->json([
            'data' => 'User Created with success please verify your email',
        ]);
    }
    // Check boot token
    public function checkConnection()
    {
        return response()->json([
            'app_name' => env('APP_NAME'),
            'version'  => config('skeleton.version'),
            'message'  => 'Boot Token authentication with success',
            'status'   => true,
        ]);
    }
    // CHeck if this url is valid
    public function checkUrl()
    {
        return response()->json([
            'version'  => 'Connection successful',
            'status'   => true,
        ]);
    }
}
