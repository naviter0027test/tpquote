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
        $jump = '/member/login';
        $param = $request->all();
        $param['account'] = isset($param['account']) ? $param['account'] : '';
        $param['pass'] = isset($param['pass']) ? $param['pass'] : '';
        $param['mode'] = isset($param['mode']) ? $param['mode'] : 'html';
        $memberRepo = new MemberRepository();
        $member = $memberRepo->checkLogin($param);
        if($member != false) {
            Session::put('member', $member);
            $result = [
                'status' => true,
                'msg' => 'login success',
            ];
            $jump = '/member/home';
        }
        if($param['mode'] == 'html') {
            return redirect($jump)->with('msg', $result['msg']);
        }
        return json_encode($result);
    }

    public function home() {
        return view('member.home');
    }

    public function logout(Request $request) {
        $result = [
            'status' => false,
            'msg' => 'logout failure',
        ];
        $jump = '/member/login';

        $param = $request->all();
        $param['mode'] = isset($param['mode']) ? $param['mode'] : 'html';
        \Log::info($param);
        Session::forget('member');
        $result = [
            'status' => true,
            'msg' => 'logout success',
        ];
        if($param['mode'] == 'html')
            return redirect($jump);
        return json_encode($result);
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
