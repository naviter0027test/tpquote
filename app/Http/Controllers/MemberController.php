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
            $request->session()->flash('msg', $result['msg']);
            return redirect($jump);
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

    public function passwordPage(Request $request) {
        return view('member.password');
    }

    public function password(Request $request) {
        $result = [
            'status' => false,
            'msg' => 'password update failure',
        ];
        $jump = "/member/proccess";

        $param = $request->all();
        $param['mode'] = isset($param['mode']) ? $param['mode'] : 'html';

        $memberRepo = new MemberRepository();
        $member = Session::get('member');
        $memberParam = [
            'account' => $member->account,
            'pass' => $param['oldPass'],
        ];
        try {
            $member = $memberRepo->checkLogin($memberParam);
            if($member == false)
                throw new Exception('舊密碼錯誤');

            $updateParam['pass'] = $param['pass'];
            $memberRepo->updateById($member->id, $updateParam);
            $result = [
                'status' => true,
                'msg' => '密碼更新成功',
            ];
        }
        catch(Exception $e) {
            $result = [
                'status' => false,
                'msg' => $e->getMessage(),
            ];
        }

        if($param['mode'] == 'html')
            return redirect($jump);
        return json_encode($result);
    }
}
