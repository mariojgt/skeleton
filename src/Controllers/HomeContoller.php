<?php

namespace Mariojgt\Skeleton\Controllers;

use App\Http\Controllers\Controller;

class HomeContoller extends Controller
{
    /**
     * @return [blade view]
     */
    public function index()
    {
        return view('skeleton::content.index');
    }
}