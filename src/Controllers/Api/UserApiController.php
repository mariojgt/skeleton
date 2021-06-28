<?php

namespace Mariojgt\Skeleton\Controllers\Api;

use Illuminate\Http\Request;
use Mariojgt\Skeleton\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Mariojgt\Skeleton\Resource\UserResource;

class UserApiController extends Controller
{
    /**
     * @param Request $request
     *
     * @return [json]
     */
    public function checkToken(Request $request)
    {
        return response()->json([
            'data' => true,
        ]);
    }

    /**
     * @param Request $request
     *
     * @return [json]
     */
    public function userProfile(Request $request)
    {
        return response()->json([
            'data' => new UserResource(auth()->user()),
        ]);
    }

    /**
     * @param Request $request
     *
     * @return [json]
     */
    public function userUpdateProfile(Request $request)
    {
        // Validate the user
        $validator = Validator::make($request->all(), [
            'name'  => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        // If Validation Fail for the basic stuf
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        // Check is need validation to update the password
        if (!empty(Request('password'))) {
            $request->request->add(['password_confirmation' => Request('confirmPassword')]);
            // Validate the password
            $validator = Validator::make($request->all(), [
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);

            // If Validation Fail for the basic stuf
            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }
        }
        // Update the user profile
        $user = User::find(auth()->user()->id);
        $user->name     = Request('name');
        $user->email    = Request('email');
        if (!empty(Request('password'))) {
            $user->password = Hash::make(Request('password'));
        }
        $user->save();

        return response()->json([
            'data'    => $user,
            'status'  => true,
            'message' => 'information updated',
        ]);
    }
}
