<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin_panel.dashboard');
    }
}
