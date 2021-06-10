<?php

namespace Mariojgt\Skeleton\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * @return [blade view]
     */
    public function index()
    {
        return view('skeleton::content.dashboard.index');
    }
}
