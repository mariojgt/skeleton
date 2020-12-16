<?php

namespace Mariojgt\Skeleton\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeContoller extends Controller
{
    public function index()
    {
        return view('skeleton::content.index');
    }
}
