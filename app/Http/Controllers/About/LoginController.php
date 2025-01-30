<?php

namespace App\Http\Controllers\About;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLoginForm() {
        return view('Home.Login');
    }
}
