<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @return string
     */
    protected function redirectPath()
    {
        $user = auth()->user();

        if ($user->role === 'admin') {
            return view('admin_panel.dashboard');
        } else {
            return '/user_home';
        }
    }
}
