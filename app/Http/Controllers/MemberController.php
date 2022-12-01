<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Repositories\MemberRepository;
use App\Repositories\MemPermissionRepository;
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
            Session::put('memberPermission', $memberRepo->getById($member->id));
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
        $memberPermission = Session::get('memberPermission');
        return view('member.home', ['memberPermission' => $memberPermission]);
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
        $memberPermission = Session::get('memberPermission');
        return view('member.password', ['memberPermission' => $memberPermission]);
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

    public function proccess(Request $request) {
        $memberPermission = Session::get('memberPermission');
        return view('member.proccess', ['memberPermission' => $memberPermission]);
    }

    public function lists(Request $request) {
        $result = [
            'status' => false,
            'msg' => '成員列表錯誤',
        ];
        $jump = "/member/proccess";

        $param = $request->all();
        $param['mode'] = isset($param['mode']) ? $param['mode'] : 'html';
        $param['nowPage'] = isset($param['nowPage']) ? $param['nowPage'] : 1;

        try {
            if(isset($param['pageNum']) == true && is_numeric($param['pageNum']) == false)
                throw new Exception('頁數限制請輸入數字');
            else
                $param['pageNum'] = 20;

            $memberRepo = new MemberRepository();
            $member = Session::get('member');
            $memberPermission = $memberRepo->getById($member->id);
            if($memberPermission->member < 1)
                throw new Exception('權限不足');
            $items = $memberRepo->lists($param);
            $amount = $memberRepo->listsAmount($param);
            $result = [
                'status' => true,
                'msg' => '成員列表成功',
                'items' => $items,
                'amount' => $amount,
            ];
        }
        catch(Exception $e) {
            $result = [
                'status' => false,
                'msg' => $e->getMessage(),
            ];
        }

        if($param['mode'] == 'html') {
            if($result['status'] == false)
                return redirect($jump);
            else {
                $nowPage = $param['nowPage'];
                unset($param['nowPage']);
                return view('member.lists', ['memberPermission' => $memberPermission, 'result' => $result, 'param' => $param, 'nowPage' => $nowPage ]);
            }
        }
        return json_encode($result);
    }

    public function createPage(Request $request) {
        $memberPermission = Session::get('memberPermission');
        $memPermissionRepo = new MemPermissionRepository();
        $memPermissionList = $memPermissionRepo->getAll();
        return view('member.create', ['memberPermission' => $memberPermission, 'memPermissionList' => $memPermissionList]);
    }

    public function create(Request $request) {
        $result = [
            'status' => false,
            'msg' => '成員新增錯誤',
        ];
        $jump = "/member/proccess";

        $memberRepo = new MemberRepository();
        $param = $request->all();
        $param['mode'] = isset($param['mode']) ? $param['mode'] : 'html';

        try {
            $member = Session::get('member');
            $memberPermission = $memberRepo->getById($member->id);
            if($memberPermission->member != 2)
                throw new Exception('權限不足');

            $validator = Validator::make($param, [
                'account' => 'required|max:20',
                'pass' => 'required',
                'userName' => 'required',
                'memPermissionId' => 'required|integer',
            ]);

            if($validator->fails()) {
                $result['errors'] = $validator->errors();
                throw new Exception('輸入錯誤');
            }

            $memberRepo->create($param);
            $result['status'] = true;
            $result['msg'] = '新增成功';
        }
        catch(Exception $e) {
            $result['status'] = false;
            $result['msg'] = $e->getMessage();
        }

        if($param['mode'] == 'html') {
            $request->session()->flash('result', $result);
            return redirect($jump);
        }
        return json_encode($result);
    }

    public function edit(Request $request) {
        $memberPermission = Session::get('memberPermission');
        return view('member.edit', ['memberPermission' => $memberPermission]);
    }

    public function update(Request $request, $id = 0) {
        $result = [
            'status' => false,
            'msg' => '成員修改錯誤',
        ];
        $jump = "/member/proccess";

        $memberRepo = new MemberRepository();
        $param = $request->all();
        $param['mode'] = isset($param['mode']) ? $param['mode'] : 'html';

        try {
            $member = Session::get('member');
            $memberPermission = $memberRepo->getById($member->id);
            if($memberPermission->member != 2)
                throw new Exception('權限不足');

            $validator = Validator::make($param, [
                'userName' => 'required',
                'memPermissionId' => 'required|integer',
            ]);

            if($validator->fails()) {
                $result['errors'] = $validator->errors();
                throw new Exception('輸入錯誤');
            }

            $memberRepo->updateById($id, $param);
            $result['status'] = true;
            $result['msg'] = '修改成功';
        }
        catch(Exception $e) {
            $result['status'] = false;
            $result['msg'] = $e->getMessage();
        }

        if($param['mode'] == 'html')
            return redirect($jump);
        return json_encode($result);
    }

    public function remove(Request $request, $id = 0) {
        $result = [
            'status' => false,
            'msg' => '成員刪除錯誤',
        ];
        $jump = "/member/proccess";

        $memberRepo = new MemberRepository();
        $param = $request->all();
        $param['mode'] = isset($param['mode']) ? $param['mode'] : 'html';

        try {
            $member = Session::get('member');
            $memberPermission = $memberRepo->getById($member->id);
            if($memberPermission->member != 2)
                throw new Exception('權限不足');

            if($id == 0)
                throw new Exception('未輸入刪除的對象');

            $memberRepo->removeById($id, $param);
            $result['status'] = true;
            $result['msg'] = '刪除成功';
        }
        catch(Exception $e) {
            $result['status'] = false;
            $result['msg'] = $e->getMessage();
        }

        if($param['mode'] == 'html')
            return redirect($jump);
        return json_encode($result);
    }
}
