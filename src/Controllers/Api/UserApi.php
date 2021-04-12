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

class UserApi extends Controller
{
    public function home(Request $request)
    {
        return response()->json([
            'meta'  => [
                'api_version' => '1',
                'message'     => 'Welcome to skeleton connect'
            ],
            'data' => 'You Are login',
        ]);
    }
}
