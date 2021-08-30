<?php

namespace Mariojgt\Unityuser\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Mariojgt\Onixserver\Helpers\ApiHelper;

class DashboardController extends Controller
{
    /**
     * @return [blade view]
     */
    public function index()
    {

        // Get the user key information
        $apiManager = new ApiHelper();
        $userKey    = $apiManager->getUserKeyInfo(Auth::user());


        return view('unity-user::content.dashboard.index', compact('userKey'));
    }
}
