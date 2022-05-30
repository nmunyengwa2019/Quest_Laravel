<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class LogoutController extends Controller
{
    use AuthenticatesUsers;
    public function logout()
    {
        Auth::logout();

        return redirect('login');
    }
}
