<?php

namespace Mariojgt\Skeleton\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('skeleton::content.dashboard.index');
    }
}
