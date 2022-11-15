<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Repositories\MemberRepository;
use Session;
use Exception;

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
        $result = [
            'status' => true,
            'msg' => 'has login',
        ];
        if(Session::has('member') == false) {
            $result = [
                'status' => false,
                'msg' => 'not login',
            ];
        }
        return json_encode($result);
    }
}
