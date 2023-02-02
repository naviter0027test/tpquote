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
        $memberPermission = Session::get('memberPermission');
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
            $result['nowPage'] = $param['nowPage'];
            $result['pageNum'] = $param['pageNum'];
            unset($param['nowPage']);
            unset($param['pageNum']);
            $result['param'] = $param;
        }
        catch(Exception $e) {
            $result['status'] = false;
            $result['msg'] = $e->getMessage();
        }

        if($param['mode'] == 'html') {
            $result['memberPermission'] = $memberPermission;
            return view('quote.main.lists', $result);
        }
        return json_encode($result);
    }

    public function createMainPage(Request $request) {
        $memberPermission = Session::get('memberPermission');
        $result = [];
        $result['memberPermission'] = $memberPermission;
        return view('quote.main.create', $result);
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
            if(isset($result['errors'])) {
                $errors = json_decode(json_encode($result['errors']), true);
                $result['errors'] = $errors;
            }
            $request->session()->flash('result', $result);
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
            if($result['status'] == true) {
                return view('quote.main.edit', $result);
            }
            $request->session()->flash('result', $result);
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

    public function removeMain(Request $request, $id = 0) {
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

            $quoteRepo->removeMainById($id);
            $result['status'] = true;
            $result['msg'] = '刪除成功';
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

    public function subsMain(Request $request, $mainId = 0) {
        $result = [
            'status' => false,
            'msg' => '',
        ];
        $jump = "/member/proccess";

        $param = $request->all();
        $param['mode'] = isset($param['mode']) ? $param['mode'] : 'html';

        $member = Session::get('member');

        if($param['mode'] == 'html') {
            return view('quote.main.subs', $result);
        }
        return json_encode($result);
    }

    public function editSub1(Request $request, $mainId = 0) {
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
            $quoteRepo->checkPermit($member->id, 'quoteSub_1', 1);
            $result['item'] = $quoteRepo->getSub1ByMainId($mainId);
            $result['status'] = true;
            $result['msg'] = 'success';
        }
        catch(Exception $e) {
            $result['status'] = false;
            $result['msg'] = $e->getMessage();
        }

        if($param['mode'] == 'html') {
            return view('quote.sub1.edit', $result);
        }
        return json_encode($result);
    }

    public function updateSub1(Request $request, $mainId = 0) {
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
            $quoteRepo->checkPermit($member->id, 'quoteSub_1', 2);

            $validator = Validator::make($param, [
                'partNo' => 'required',
                'materialName' => 'required',
                'length' => 'required|integer',
                'width' => 'required|integer',
                'height' => 'required|integer',
            ]);

            if($validator->fails()) {
                $result['errors'] = $validator->errors();
                throw new Exception('輸入錯誤');
            }
            $param['spec'] = isset($param['spec']) ? trim($param['spec']) : '';
            $param['specIllustrate'] = isset($param['specIllustrate']) ? trim($param['specIllustrate']) : '';
            $param['content'] = isset($param['content']) ? trim($param['content']) : '';
            $param['level'] = isset($param['level']) ? trim($param['level']) : '';
            $param['business'] = isset($param['business']) ? trim($param['business']) : '';
            $param['fsc'] = isset($param['fsc']) ? trim($param['fsc']) : '';
            $param['memo'] = isset($param['memo']) ? trim($param['memo']) : '';
            $param['bigLength'] = isset($param['bigLength']) ? trim($param['bigLength']) : '';
            $param['bigWidth'] = isset($param['bigWidth']) ? trim($param['bigWidth']) : '';
            $param['bigHeight'] = isset($param['bigHeight']) ? trim($param['bigHeight']) : '';

            $quoteRepo->updateSub1ByMainId($mainId, $param);
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

    public function listsSub1(Request $request) {
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
            $quoteRepo->checkPermit($member->id, 'quoteSub_1', 1);

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

            $result['items'] = $quoteRepo->listsSub1($param);
            $result['amount'] = $quoteRepo->listsSub1Amount($param);
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

    public function createSub1Page(Request $request) {
        return view('quote.sub1.create');
    }

    public function createSub1(Request $request) {
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
            $quoteRepo->checkPermit($member->id, 'quoteSub_1', 2);

            $validator = Validator::make($param, [
                'partNo' => 'required',
                'materialName' => 'required',
                'length' => 'required|integer',
                'width' => 'required|integer',
                'height' => 'required|integer',
            ]);

            if($validator->fails()) {
                $result['errors'] = $validator->errors();
                throw new Exception('輸入錯誤');
            }
            $param['spec'] = isset($param['spec']) ? trim($param['spec']) : '';
            $param['specIllustrate'] = isset($param['specIllustrate']) ? trim($param['specIllustrate']) : '';
            $param['content'] = isset($param['content']) ? trim($param['content']) : '';
            $param['level'] = isset($param['level']) ? trim($param['level']) : '';
            $param['business'] = isset($param['business']) ? trim($param['business']) : '';
            $param['fsc'] = isset($param['fsc']) ? trim($param['fsc']) : '';
            $param['memo'] = isset($param['memo']) ? trim($param['memo']) : '';
            $param['bigLength'] = isset($param['bigLength']) ? trim($param['bigLength']) : '';
            $param['bigWidth'] = isset($param['bigWidth']) ? trim($param['bigWidth']) : '';
            $param['bigHeight'] = isset($param['bigHeight']) ? trim($param['bigHeight']) : '';

            $quoteRepo->createSub1($param);
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

    public function removeSub1(Request $request, $mainId = 0) {
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
            $quoteRepo->checkPermit($member->id, 'quoteSub_1', 2);

            $quoteRepo->removeSub1ByMainId($mainId);
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

    public function createSub1_1Page(Request $request, $mainId = 0) {
        return view('quote.sub1-1.create');
    }

    public function editSub1_1(Request $request, $mainId = 0) {
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
            $quoteRepo->checkPermit($member->id, 'quoteSub_1', 1);
            $result['item'] = $quoteRepo->getSub1_1ByMainId($mainId);
            $result['status'] = true;
            $result['msg'] = 'success';
        }
        catch(Exception $e) {
            $result['status'] = false;
            $result['msg'] = $e->getMessage();
        }

        if($param['mode'] == 'html') {
            return view('quote.sub1-1.edit', $result);
        }
        return json_encode($result);
    }

    public function updateSub1_1(Request $request, $mainId = 0) {
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
            $quoteRepo->checkPermit($member->id, 'quoteSub_1', 2);

            $validator = Validator::make($param, [
                'partNo' => 'required',
                'materialName' => 'required',
                'length' => 'required|integer',
                'width' => 'required|integer',
                'height' => 'required|integer',
                'usageAmount' => 'required|integer',
            ]);

            if($validator->fails()) {
                $result['errors'] = $validator->errors();
                throw new Exception('輸入錯誤');
            }
            $param['spec'] = isset($param['spec']) ? $param['spec'] : '';
            $param['specIllustrate'] = isset($param['specIllustrate']) ? $param['specIllustrate'] : '';
            $param['content'] = isset($param['content']) ? $param['content'] : '';
            $param['level'] = isset($param['level']) ? $param['level'] : '';
            $param['business'] = isset($param['business']) ? $param['business'] : '';
            $param['fsc'] = isset($param['fsc']) ? $param['fsc'] : '';
            $param['materialPrice'] = isset($param['materialPrice']) ? $param['materialPrice'] : null;

            $quoteRepo->updateSub1_1ByMainId($mainId, $param);
            $result['status'] = true;
            $result['msg'] = 'success';
        }
        catch(Exception $e) {
            $result['status'] = false;
            $result['msg'] = $e->getMessage();
        }

        if($param['mode'] == 'html') {
            if(isset($result['errors'])) {
                $errors = json_decode(json_encode($result['errors']), true);
                $result['errors'] = $errors;
            }
            $request->session()->flash('result', $result);
            return redirect($jump);
        }
        return json_encode($result);
    }

    public function createSub2Page(Request $request, $mainId = 0) {
        return view('quote.sub2.create');
    }

    public function editSub2(Request $request, $id = 0) {
        return view('quote.sub2.edit');
    }

    public function createSub2_1Page(Request $request, $mainId = 0) {
        return view('quote.sub2-1.create');
    }

    public function editSub2_1(Request $request, $mainId = 0) {
        return view('quote.sub2-1.edit');
    }
}
