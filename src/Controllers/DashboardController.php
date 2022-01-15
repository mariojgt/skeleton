<?php

namespace Mariojgt\Skeleton\Controllers;

use Inertia\Inertia;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * @return [blade view]
     */
    public function index()
    {
        if (config('skeleton.inertiajs_enable')) {
            return Inertia::render('Dashboard/Index', [
                'title' => 'Login',
            ]);
        } else {
            return view('skeleton::content.dashboard.index');
        }
    }
}
