<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Repositories\MemberRepository;
use App\Repositories\MemPermissionRepository;
use App\Repositories\QuoteRepository;
use Session;
use Exception;

class QuoteController extends Controller
{
    public function listsMain(Request $request) {
        $result = [
            'status' => false,
            'msg' => '',
        ];
        $jump = "/member/proccess";

        $param = $request->all();
        $param['mode'] = isset($param['mode']) ? $param['mode'] : 'html';

        $member = Session::get('member');
        try {
            $quoteRepo = new QuoteRepository();
            $quoteRepo->checkPermit($member->id, 'quoteMain', 1);

            $param['nowPage'] = isset($param['nowPage']) == true ? $param['nowPage'] : 1;
            $param['pageNum'] = isset($param['pageNum']) == true ? $param['pageNum'] : 20;
            $validator = Validator::make($param, [
                'nowPage' => 'integer|min:1',
                'pageNum' => 'integer|min:10',
            ]);
            if($validator->fails()) {
                $result['errors'] = $validator->errors();
                throw new Exception('輸入錯誤');
            }

            $result['items'] = $quoteRepo->listsMain($param);
            $result['amount'] = $quoteRepo->listsMainAmount($param);
            $result['status'] = true;
            $result['msg'] = 'success';
        }
        catch(Exception $e) {
            $result['status'] = false;
            $result['msg'] = $e->getMessage();
        }

        if($param['mode'] == 'html') {
            return view('quote.lists');
        }
        return json_encode($result);
    }

    public function createMainPage(Request $request) {
        return view('quote.create.main');
    }

    public function createMain(Request $request) {
        $result = [
            'status' => false,
            'msg' => '',
        ];
        $jump = "/member/proccess";

        $param = $request->all();
        $param['mode'] = isset($param['mode']) ? $param['mode'] : 'html';

        $member = Session::get('member');
        try {
            $quoteRepo = new QuoteRepository();
            $quoteRepo->checkPermit($member->id, 'quoteMain', 2);

            $validator = Validator::make($param, [
                'quoteCls' => 'required|integer',
                'customerProductNum' => 'required',
                'productNum' => 'required',
                'productNameTw' => 'required',
            ]);

            if($validator->fails()) {
                $result['errors'] = $validator->errors();
                throw new Exception('輸入錯誤');
            }
            $param['productNameEn'] = isset($param['productNameEn']) ? trim($param['productNameEn']) : '';
            $param['quoteQuality'] = isset($param['quoteQuality']) ? trim($param['quoteQuality']) : '';
            $param['quoteQuantity'] = isset($param['quoteQuantity']) ? trim($param['quoteQuantity']) : '';
            $param['productInfo'] = isset($param['productInfo']) ? trim($param['productInfo']) : '';

            $quoteRepo->createMain($param);

            $result['status'] = true;
            $result['msg'] = "建立成功";
        }
        catch(Exception $e) {
            $result['status'] = false;
            $result['msg'] = $e->getMessage();
        }

        if($param['mode'] == 'html') {
            $request->session()->flash('msg', $result['msg']);
            return redirect($jump);
        }
        return json_encode($result);
    }

    public function editMain(Request $request, $id = 0) {
        $result = [
            'status' => false,
            'msg' => '',
        ];
        $jump = "/member/proccess";

        $param = $request->all();
        $param['mode'] = isset($param['mode']) ? $param['mode'] : 'html';

        $member = Session::get('member');
        try {
            $quoteRepo = new QuoteRepository();
            $quoteRepo->checkPermit($member->id, 'quoteMain', 2);

            $result['status'] = true;
            $result['msg'] = 'success';
            $result['item'] = $quoteRepo->getMainById($id);
        }
        catch(Exception $e) {
            $result['status'] = false;
            $result['msg'] = $e->getMessage();
        }

        if($param['mode'] == 'html') {
            $request->session()->flash('msg', $result['msg']);
            return redirect($jump);
        }
        return json_encode($result);
    }

    public function updateMain(Request $request, $id = 0) {
        $result = [
            'status' => false,
            'msg' => '',
        ];
        $jump = "/member/proccess";

        $param = $request->all();
        $param['mode'] = isset($param['mode']) ? $param['mode'] : 'html';

        $member = Session::get('member');
        try {
            $quoteRepo = new QuoteRepository();
            $quoteRepo->checkPermit($member->id, 'quoteMain', 2);

            $validator = Validator::make($param, [
                'quoteCls' => 'required|integer',
                'customerProductNum' => 'required',
                'productNum' => 'required',
                'productNameTw' => 'required',
            ]);

            if($validator->fails()) {
                $result['errors'] = $validator->errors();
                throw new Exception('輸入錯誤');
            }
            $param['productNameEn'] = isset($param['productNameEn']) ? trim($param['productNameEn']) : '';
            $param['quoteQuality'] = isset($param['quoteQuality']) ? trim($param['quoteQuality']) : '';
            $param['quoteQuantity'] = isset($param['quoteQuantity']) ? trim($param['quoteQuantity']) : '';
            $param['productInfo'] = isset($param['productInfo']) ? trim($param['productInfo']) : '';

            $quoteRepo->updateMainById($id, $param);
            $result['status'] = true;
            $result['msg'] = 'success';
        }
        catch(Exception $e) {
            $result['status'] = false;
            $result['msg'] = $e->getMessage();
        }

        if($param['mode'] == 'html') {
            $request->session()->flash('msg', $result['msg']);
            return redirect($jump);
        }
        return json_encode($result);
    }

    public function createSub1_1(Request $request) {
        return view('quote.create.sub1-1');
    }

    public function editSub1_1(Request $request, $id = 0) {
        return 'quote edit sub1';
    }

    public function createSub2(Request $request) {
        return 'quote create sub 2';
    }

    public function editSub2(Request $request, $id = 0) {
        return 'quote edit sub2';
    }

    public function createSub2_1(Request $request) {
        return 'quote create sub 2-1';
    }

    public function editSub2_1(Request $request, $id = 0) {
        return 'quote edit sub 2-1';
    }
}
