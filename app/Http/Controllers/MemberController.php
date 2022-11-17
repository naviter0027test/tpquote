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

    public function login(Request $request) {
        $result = [
            'status' => false,
            'msg' => 'login failure',
        ];
        $param = $request->all();
        $param['account'] = isset($param['account']) ? $param['account'] : '';
        $param['pass'] = isset($param['pass']) ? $param['pass'] : '';
        $memberRepo = new MemberRepository();
        $member = $memberRepo->checkLogin($param);
        if($member != false) {
            Session::put('member', $member);
            $result = [
                'status' => true,
                'msg' => 'login success',
            ];
        }
        return json_encode($result);
    }

    public function home() {
        return view('member.home');
    }

    public function logout() {
    }

    public function isLogin() {
        $result = [
            'status' => false,
            'msg' => 'not login',
        ];
        if(Session::has('member') == true) {
            $result = [
                'status' => true,
                'msg' => 'has login',
            ];
        }
        return json_encode($result);
    }
}
