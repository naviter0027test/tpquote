<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function loginPage() {
        return view('member.login');
    }

    public function login() {
    }

    public function home() {
        return view('member.home');
    }

    public function logout() {
    }

    public function isLogin() {
    }
}
