<?php

namespace App\Helpers;

use Illuminate\Http\Request;
use Mariojgt\UnityAdmin\Models\User;

class AuthOverride
{
    public function customLogin(Request $request)
    {
        # code...
    }

    public function customRegister(Request $request, User $user)
    {
        # code...
    }
}
