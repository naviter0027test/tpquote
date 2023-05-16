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

        $files = [];
        if($request->hasFile('image'))
            $files['image'] = $request->file('image');

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

            $quoteRepo->createMain($param, $files);

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

        $files = [];
        if($request->hasFile('image'))
            $files['image'] = $request->file('image');

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

            $quoteRepo->updateMainById($id, $param, $files);
            $result['status'] = true;
            $result['msg'] = 'success';
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
            $request->session()->flash('result', $result);
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
        $memberPermission = Session::get('memberPermission');
        $result['memberPermission'] = $memberPermission;
        try {
            $quoteRepo = new QuoteRepository();
            $param['mainId'] = $mainId;
            $result['mainId'] = $mainId;
            $result['items'] = $quoteRepo->subsMain($param);
        }
        catch(Exception $e) {
            $result['status'] = false;
            $result['msg'] = $e->getMessage();
        }
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
            $result['mainId'] = $mainId;
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
            $request->session()->flash('result', $result);
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

    public function createSub1Page(Request $request, $mainId = 0) {
        $result = [
            'status' => false,
            'msg' => '',
        ];
        $jump = "/member/proccess";

        $param = $request->all();

        $member = Session::get('member');
        $memberPermission = Session::get('memberPermission');
        try {
            $quoteRepo = new QuoteRepository();
            $quoteRepo->checkPermit($member->id, 'quoteSub_1', 2);
            $result['status'] = true;
        }
        catch(Exception $e) {
            $result['status'] = false;
            $result['msg'] = $e->getMessage();
        }
        if($result['status'] == false) {
            $request->session()->flash('result', $result);
            return redirect($jump);
        }
        $result['memberPermission'] = $memberPermission;
        $result['mainId'] = $mainId;
        return view('quote.sub1.create', $result);
    }

    public function createSub1(Request $request, $mainId = 0) {
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
            $param['mainId'] = $mainId;
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
            $request->session()->flash('result', $result);
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
        $result = [
            'status' => false,
            'msg' => '',
        ];
        $jump = "/member/proccess";

        $param = $request->all();

        $member = Session::get('member');
        $memberPermission = Session::get('memberPermission');
        try {
            $quoteRepo = new QuoteRepository();
            $quoteRepo->checkPermit($member->id, 'quoteSub_1', 2);
            $result['status'] = true;
        }
        catch(Exception $e) {
            $result['status'] = false;
            $result['msg'] = $e->getMessage();
        }
        if($result['status'] == false) {
            $request->session()->flash('result', $result);
            return redirect($jump);
        }
        $result['memberPermission'] = $memberPermission;
        $result['mainId'] = $mainId;
        return view('quote.sub1-1.create', $result);
    }

    public function createSub1_1(Request $request, $mainId = 0) {
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
            $param['mainId'] = $mainId;
            $param['spec'] = isset($param['spec']) ? $param['spec'] : '';
            $param['specIllustrate'] = isset($param['specIllustrate']) ? $param['specIllustrate'] : '';
            $param['content'] = isset($param['content']) ? $param['content'] : '';
            $param['level'] = isset($param['level']) ? $param['level'] : '';
            $param['business'] = isset($param['business']) ? $param['business'] : '';
            $param['fsc'] = isset($param['fsc']) ? $param['fsc'] : '';
            $param['materialPrice'] = isset($param['materialPrice']) ? $param['materialPrice'] : null;
            $quoteRepo->createSub1_1($param);
            $result['status'] = true;
            $result['msg'] = 'success';
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
            $result['mainId'] = $mainId;
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
        $result = [
            'status' => false,
            'msg' => '',
        ];
        $jump = "/member/proccess";

        $param = $request->all();

        $member = Session::get('member');
        $memberPermission = Session::get('memberPermission');
        try {
            $quoteRepo = new QuoteRepository();
            $quoteRepo->checkPermit($member->id, 'quoteSub_2', 2);
            $result['status'] = true;
        }
        catch(Exception $e) {
            $result['status'] = false;
            $result['msg'] = $e->getMessage();
        }
        if($result['status'] == false) {
            $request->session()->flash('result', $result);
            return redirect($jump);
        }
        $result['memberPermission'] = $memberPermission;
        $result['mainId'] = $mainId;
        return view('quote.sub2.create', $result);
    }

    public function createSub2(Request $request, $mainId = 0) {
        $result = [
            'status' => false,
            'msg' => '',
        ];
        $jump = "/member/proccess";

        $param = $request->all();
        $param['mode'] = isset($param['mode']) ? $param['mode'] : 'html';

        $files = [];
        if($request->hasFile('infoImg'))
            $files['infoImg'] = $request->file('infoImg');

        $member = Session::get('member');
        try {
            $quoteRepo = new QuoteRepository();
            $quoteRepo->checkPermit($member->id, 'quoteSub_2', 2);

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
            $param['serialNumber'] = isset($param['serialNumber']) ? $param['serialNumber'] : '';
            $param['boxType'] = isset($param['boxType']) ? $param['boxType'] : '';
            $param['internalPcsNum'] = isset($param['internalPcsNum']) ? $param['internalPcsNum'] : null;
            $param['paperThickness'] = isset($param['paperThickness']) ? $param['paperThickness'] : '';
            $param['paperMaterial'] = isset($param['paperMaterial']) ? $param['paperMaterial'] : '';
            $param['printMethod'] = isset($param['printMethod']) ? $param['printMethod'] : '';
            $param['craftMethod'] = isset($param['craftMethod']) ? $param['craftMethod'] : '';
            $param['coatingMethod'] = isset($param['coatingMethod']) ? $param['coatingMethod'] : '';
            $param['memo'] = isset($param['memo']) ? $param['memo'] : '';

            $param['mainId'] = $mainId;
            $quoteRepo->createSub2($param, $files);
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

    public function editSub2(Request $request, $mainId = 0) {
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
            $quoteRepo->checkPermit($member->id, 'quoteSub_2', 1);
            $result['item'] = $quoteRepo->getSub2ByMainId($mainId);
            $result['status'] = true;
            $result['msg'] = 'success';
        }
        catch(Exception $e) {
            $result['status'] = false;
            $result['msg'] = $e->getMessage();
        }

        if($param['mode'] == 'html') {
            $result['mainId'] = $mainId;
            $result['memberPermission'] = $memberPermission;
            return view('quote.sub2.edit', $result);
        }
        return json_encode($result);
    }

    public function updateSub2(Request $request, $mainId) {
        $result = [
            'status' => false,
            'msg' => '',
        ];
        $jump = "/member/proccess";

        $param = $request->all();
        $param['mode'] = isset($param['mode']) ? $param['mode'] : 'html';

        $files = [];
        if($request->hasFile('infoImg'))
            $files['infoImg'] = $request->file('infoImg');

        $member = Session::get('member');
        try {
            $quoteRepo = new QuoteRepository();
            $quoteRepo->checkPermit($member->id, 'quoteSub_2', 1);

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
            $param['serialNumber'] = isset($param['serialNumber']) ? $param['serialNumber'] : '';
            $param['boxType'] = isset($param['boxType']) ? $param['boxType'] : '';
            $param['internalPcsNum'] = isset($param['internalPcsNum']) ? $param['internalPcsNum'] : null;
            $param['paperThickness'] = isset($param['paperThickness']) ? $param['paperThickness'] : '';
            $param['paperMaterial'] = isset($param['paperMaterial']) ? $param['paperMaterial'] : '';
            $param['printMethod'] = isset($param['printMethod']) ? $param['printMethod'] : '';
            $param['craftMethod'] = isset($param['craftMethod']) ? $param['craftMethod'] : '';
            $param['coatingMethod'] = isset($param['coatingMethod']) ? $param['coatingMethod'] : '';
            $param['memo'] = isset($param['memo']) ? $param['memo'] : '';

            $quoteRepo->updateSub2ByMainId($mainId, $param, $files);
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

    public function createSub2_1Page(Request $request, $mainId = 0) {
        $result = [
            'status' => false,
            'msg' => '',
        ];
        $jump = "/member/proccess";

        $param = $request->all();

        $member = Session::get('member');
        $memberPermission = Session::get('memberPermission');
        try {
            $quoteRepo = new QuoteRepository();
            $quoteRepo->checkPermit($member->id, 'quoteSub_2', 2);
            $result['status'] = true;
        }
        catch(Exception $e) {
            $result['status'] = false;
            $result['msg'] = $e->getMessage();
        }
        if($result['status'] == false) {
            $request->session()->flash('result', $result);
            return redirect($jump);
        }
        $result['memberPermission'] = $memberPermission;
        $result['mainId'] = $mainId;
        return view('quote.sub2-1.create', $result);
    }

    public function createSub2_1(Request $request, $mainId = 0) {
        $result = [
            'status' => false,
            'msg' => '',
        ];
        $jump = "/member/proccess";

        $param = $request->all();
        $param['mode'] = isset($param['mode']) ? $param['mode'] : 'html';

        $files = [];
        if($request->hasFile('infoImg'))
            $files['infoImg'] = $request->file('infoImg');

        $member = Session::get('member');
        try {
            $quoteRepo = new QuoteRepository();
            $quoteRepo->checkPermit($member->id, 'quoteSub_2', 1);

            $validator = Validator::make($param, [
                'partNo' => 'required',
                'serialNumber' => 'required',
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
            $param['paperThickness'] = isset($param['paperThickness']) ? $param['paperThickness'] : '';
            $param['paperMaterial'] = isset($param['paperMaterial']) ? $param['paperMaterial'] : '';
            $param['printMethod'] = isset($param['printMethod']) ? $param['printMethod'] : '';
            $param['craftMethod'] = isset($param['craftMethod']) ? $param['craftMethod'] : '';
            $param['coatingMethod'] = isset($param['coatingMethod']) ? $param['coatingMethod'] : '';
            $param['memo'] = isset($param['memo']) ? $param['memo'] : '';

            $param['mainId'] = $mainId;
            $quoteRepo->createSub2_1($param, $files);
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

    public function editSub2_1(Request $request, $mainId = 0) {
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
            $quoteRepo->checkPermit($member->id, 'quoteSub_2', 1);
            $result['item'] = $quoteRepo->getSub2_1ByMainId($mainId);
            $result['status'] = true;
            $result['msg'] = 'success';
        }
        catch(Exception $e) {
            $result['status'] = false;
            $result['msg'] = $e->getMessage();
        }

        if($param['mode'] == 'html') {
            $result['mainId'] = $mainId;
            $result['memberPermission'] = $memberPermission;
            return view('quote.sub2-1.edit', $result);
        }
        return json_encode($result);
    }

    public function updateSub2_1(Request $request, $mainId = 0) {
        $result = [
            'status' => false,
            'msg' => '',
        ];
        $jump = "/member/proccess";

        $param = $request->all();
        $param['mode'] = isset($param['mode']) ? $param['mode'] : 'html';

        $files = [];
        if($request->hasFile('infoImg'))
            $files['infoImg'] = $request->file('infoImg');

        $member = Session::get('member');
        try {
            $quoteRepo = new QuoteRepository();
            $quoteRepo->checkPermit($member->id, 'quoteSub_2', 1);

            $validator = Validator::make($param, [
                'partNo' => 'required',
                'serialNumber' => 'required',
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
            $param['paperThickness'] = isset($param['paperThickness']) ? $param['paperThickness'] : '';
            $param['paperMaterial'] = isset($param['paperMaterial']) ? $param['paperMaterial'] : '';
            $param['printMethod'] = isset($param['printMethod']) ? $param['printMethod'] : '';
            $param['craftMethod'] = isset($param['craftMethod']) ? $param['craftMethod'] : '';
            $param['coatingMethod'] = isset($param['coatingMethod']) ? $param['coatingMethod'] : '';
            $param['memo'] = isset($param['memo']) ? $param['memo'] : '';

            $quoteRepo->updateSub2_1ByMainId($mainId, $param, $files);
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

    public function editSub3(Request $request, $mainId = 0) {
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
            $quoteRepo->checkPermit($member->id, 'quoteSub_3', 1);
            $result['item'] = $quoteRepo->getSub3ByMainId($mainId);
            $result['status'] = true;
            $result['msg'] = 'success';
        }
        catch(Exception $e) {
            $result['status'] = false;
            $result['msg'] = $e->getMessage();
        }

        if($param['mode'] == 'html') {
            $result['memberPermission'] = $memberPermission;
            $result['mainId'] = $mainId;
            return view('quote.sub3.edit', $result);
        }
        return json_encode($result);
    }

    public function createSub3Page(Request $request, $mainId = 0) {
        $result = [
            'status' => false,
            'msg' => '',
        ];
        $jump = "/member/proccess";

        $param = $request->all();

        $member = Session::get('member');
        $memberPermission = Session::get('memberPermission');
        try {
            $quoteRepo = new QuoteRepository();
            $quoteRepo->checkPermit($member->id, 'quoteSub_3', 2);
            $result['status'] = true;
        }
        catch(Exception $e) {
            $result['status'] = false;
            $result['msg'] = $e->getMessage();
        }
        if($result['status'] == false) {
            $request->session()->flash('result', $result);
            return redirect($jump);
        }
        $result['memberPermission'] = $memberPermission;
        $result['mainId'] = $mainId;
        return view('quote.sub3.create', $result);
    }

    public function createSub3(Request $request, $mainId = 0) {
        $result = [
            'status' => false,
            'msg' => '',
        ];
        $jump = "/member/proccess";

        $param = $request->all();
        $param['mode'] = isset($param['mode']) ? $param['mode'] : 'html';

        $files = [];
        if($request->hasFile('infoImg'))
            $files['infoImg'] = $request->file('infoImg');

        $member = Session::get('member');
        try {
            $quoteRepo = new QuoteRepository();
            $quoteRepo->checkPermit($member->id, 'quoteSub_3', 2);

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
            $param['info'] = isset($param['info']) ? $param['info'] : '';

            $param['mainId'] = $mainId;
            $quoteRepo->createSub3($param, $files);
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

    public function updateSub3(Request $request, $mainId = 0) {
        $result = [
            'status' => false,
            'msg' => '',
        ];
        $jump = "/member/proccess";

        $param = $request->all();
        $param['mode'] = isset($param['mode']) ? $param['mode'] : 'html';

        $files = [];
        if($request->hasFile('infoImg'))
            $files['infoImg'] = $request->file('infoImg');

        $member = Session::get('member');
        try {
            $quoteRepo = new QuoteRepository();
            $quoteRepo->checkPermit($member->id, 'quoteSub_3', 2);

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
            $param['info'] = isset($param['info']) ? $param['info'] : '';

            $quoteRepo->updateSub3ByMainId($mainId, $param, $files);
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

    public function createSub3_1Page(Request $request, $mainId = 0) {
        $result = [
            'status' => false,
            'msg' => '',
        ];
        $jump = "/member/proccess";

        $param = $request->all();

        $member = Session::get('member');
        $memberPermission = Session::get('memberPermission');
        try {
            $quoteRepo = new QuoteRepository();
            $quoteRepo->checkPermit($member->id, 'quoteSub_3', 2);
            $result['status'] = true;
        }
        catch(Exception $e) {
            $result['status'] = false;
            $result['msg'] = $e->getMessage();
        }
        if($result['status'] == false) {
            $request->session()->flash('result', $result);
            return redirect($jump);
        }
        $result['memberPermission'] = $memberPermission;
        $result['mainId'] = $mainId;
        return view('quote.sub3-1.create', $result);
    }

    public function editSub3_1(Request $request, $mainId = 0) {
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
            $quoteRepo->checkPermit($member->id, 'quoteSub_3', 1);
            $result['item'] = $quoteRepo->getSub3_1ByMainId($mainId);
            $result['status'] = true;
            $result['msg'] = 'success';
        }
        catch(Exception $e) {
            $result['status'] = false;
            $result['msg'] = $e->getMessage();
        }

        if($param['mode'] == 'html') {
            $result['mainId'] = $mainId;
            $result['memberPermission'] = $memberPermission;
            return view('quote.sub3-1.edit', $result);
        }
        return json_encode($result);
    }

    public function createSub3_1(Request $request, $mainId = 0) {
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
            $quoteRepo->checkPermit($member->id, 'quoteSub_3', 2);

            $validator = Validator::make($param, [
                'serialNumber' => 'required',
                'name' => 'required',
                'subtotal' => 'required|integer',
            ]);

            if($validator->fails()) {
                $result['errors'] = $validator->errors();
                throw new Exception('輸入錯誤');
            }
            $param['painted'] = isset($param['painted']) ? $param['painted'] : '';
            $param['memo'] = isset($param['memo']) ? $param['memo'] : '';

            $param['mainId'] = $mainId;
            $quoteRepo->createSub3_1($param);
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

    public function updateSub3_1(Request $request, $mainId = 0) {
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
            $quoteRepo->checkPermit($member->id, 'quoteSub_3', 2);

            $validator = Validator::make($param, [
                'serialNumber' => 'required',
                'name' => 'required',
                'subtotal' => 'required|integer',
            ]);

            if($validator->fails()) {
                $result['errors'] = $validator->errors();
                throw new Exception('輸入錯誤');
            }
            $param['painted'] = isset($param['painted']) ? $param['painted'] : '';
            $param['memo'] = isset($param['memo']) ? $param['memo'] : '';

            $quoteRepo->updateSub3_1ByMainId($mainId, $param);
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

    public function createSub4Page(Request $request, $mainId = 0) {
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
            $quoteRepo->checkPermit($member->id, 'quoteSub_4', 1);
            $result['item'] = $quoteRepo->getSub4ByMainId($mainId);
            $result['status'] = true;
            $result['msg'] = 'success';
        }
        catch(Exception $e) {
            $result['status'] = false;
            $result['msg'] = $e->getMessage();
        }

        if($param['mode'] == 'html') {
            $result['mainId'] = $mainId;
            $result['memberPermission'] = $memberPermission;
            return view('quote.sub4.create', $result);
        }
        return json_encode($result);
    }

    public function editSub4(Request $request, $mainId = 0) {
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
            $quoteRepo->checkPermit($member->id, 'quoteSub_4', 1);
            $result['item'] = $quoteRepo->getSub4ByMainId($mainId);
            $result['status'] = true;
            $result['msg'] = 'success';
        }
        catch(Exception $e) {
            $result['status'] = false;
            $result['msg'] = $e->getMessage();
        }

        if($param['mode'] == 'html') {
            $result['mainId'] = $mainId;
            $result['memberPermission'] = $memberPermission;
            return view('quote.sub4.edit', $result);
        }
        return json_encode($result);
    }

    public function createSub4(Request $request, $mainId = 0) {
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
            $quoteRepo->checkPermit($member->id, 'quoteSub_4', 2);

            $validator = Validator::make($param, [
                'serialNumber' => 'required',
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
            $param['origin'] = isset($param['origin']) ? $param['origin'] : '';
            $param['thickness'] = isset($param['thickness']) ? $param['thickness'] : '';
            $param['loss'] = isset($param['loss']) ? $param['loss'] : '';
            $param['price'] = isset($param['price']) ? $param['price'] : '';
            $param['memo'] = isset($param['memo']) ? $param['memo'] : '';

            $param['mainId'] = $mainId;
            $quoteRepo->createSub4($param);
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

    public function updateSub4(Request $request, $mainId = 0) {
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
            $quoteRepo->checkPermit($member->id, 'quoteSub_4', 2);

            $validator = Validator::make($param, [
                'serialNumber' => 'required',
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
            $param['origin'] = isset($param['origin']) ? $param['origin'] : '';
            $param['thickness'] = isset($param['thickness']) ? $param['thickness'] : '';
            $param['loss'] = isset($param['loss']) ? $param['loss'] : '';
            $param['price'] = isset($param['price']) ? $param['price'] : '';
            $param['memo'] = isset($param['memo']) ? $param['memo'] : '';

            $quoteRepo->updateSub4ByMainId($mainId, $param);
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

    public function editSub5(Request $request, $mainId = 0) {
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
            $quoteRepo->checkPermit($member->id, 'quoteSub_5', 1);
            $result['item'] = $quoteRepo->getSub5ByMainId($mainId);
            $result['status'] = true;
            $result['msg'] = 'success';
        }
        catch(Exception $e) {
            $result['status'] = false;
            $result['msg'] = $e->getMessage();
        }

        if($param['mode'] == 'html') {
            $result['mainId'] = $mainId;
            $result['memberPermission'] = $memberPermission;
            return view('quote.sub5.edit', $result);
        }
        return json_encode($result);
    }

    public function createSub5Page(Request $request, $mainId = 0) {
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
            $quoteRepo->checkPermit($member->id, 'quoteSub_5', 1);
            $result['item'] = $quoteRepo->getSub5ByMainId($mainId);
            $result['status'] = true;
            $result['msg'] = 'success';
        }
        catch(Exception $e) {
            $result['status'] = false;
            $result['msg'] = $e->getMessage();
        }

        if($param['mode'] == 'html') {
            $result['mainId'] = $mainId;
            $result['memberPermission'] = $memberPermission;
            return view('quote.sub5.create', $result);
        }
        return json_encode($result);
    }

    public function createSub5(Request $request, $mainId = 0) {
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
            $quoteRepo->checkPermit($member->id, 'quoteSub_5', 2);

            $validator = Validator::make($param, [
                'serialNumber' => 'required',
                'orderNum' => 'required|integer',
                'priceSubtotal' => 'required|integer',
                'flattenSubtotal' => 'required|integer',
                'packageMethod' => 'required',
            ]);

            if($validator->fails()) {
                $result['errors'] = $validator->errors();
                throw new Exception('輸入錯誤');
            }
            $param['boxMethod'] = isset($param['boxMethod']) ? $param['boxMethod'] : '';
            $param['fillDate'] = isset($param['fillDate']) ? $param['fillDate'] : '';
            $param['devFillDate'] = isset($param['devFillDate']) ? $param['devFillDate'] : '';
            $param['auditDate'] = isset($param['auditDate']) ? $param['auditDate'] : '';
            $param['memo'] = isset($param['memo']) ? $param['memo'] : '';

            $param['mainId'] = $mainId;
            $quoteRepo->createSub5($param);
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

    public function updateSub5(Request $request, $mainId = 0) {
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
            $quoteRepo->checkPermit($member->id, 'quoteSub_5', 2);

            $validator = Validator::make($param, [
                'serialNumber' => 'required',
                'orderNum' => 'required|integer',
                'priceSubtotal' => 'required|integer',
                'flattenSubtotal' => 'required|integer',
                'packageMethod' => 'required',
            ]);

            if($validator->fails()) {
                $result['errors'] = $validator->errors();
                throw new Exception('輸入錯誤');
            }
            $param['boxMethod'] = isset($param['boxMethod']) ? $param['boxMethod'] : '';
            $param['fillDate'] = isset($param['fillDate']) ? $param['fillDate'] : '';
            $param['devFillDate'] = isset($param['devFillDate']) ? $param['devFillDate'] : '';
            $param['auditDate'] = isset($param['auditDate']) ? $param['auditDate'] : '';
            $param['memo'] = isset($param['memo']) ? $param['memo'] : '';

            $quoteRepo->updateSub5ByMainId($mainId, $param);
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

    public function createSub5_1Page(Request $request, $mainId = 0) {
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
            $quoteRepo->checkPermit($member->id, 'quoteSub_5', 1);
            //$result['item'] = $quoteRepo->getSub5_1ByMainId($mainId);
            $result['status'] = true;
            $result['msg'] = 'success';
        }
        catch(Exception $e) {
            $result['status'] = false;
            $result['msg'] = $e->getMessage();
        }

        if($param['mode'] == 'html') {
            $result['mainId'] = $mainId;
            $result['memberPermission'] = $memberPermission;
            return view('quote.sub5-1.create', $result);
        }
        return json_encode($result);
    }

    public function editSub5_1(Request $request, $mainId = 0) {
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
            $quoteRepo->checkPermit($member->id, 'quoteSub_5', 1);
            $result['item'] = $quoteRepo->getSub5_1ByMainId($mainId);
            $result['status'] = true;
            $result['msg'] = 'success';
        }
        catch(Exception $e) {
            $result['status'] = false;
            $result['msg'] = $e->getMessage();
        }

        if($param['mode'] == 'html') {
            $result['mainId'] = $mainId;
            $result['memberPermission'] = $memberPermission;
            return view('quote.sub5-1.edit', $result);
        }
        return json_encode($result);
    }

    public function createSub5_1(Request $request, $mainId = 0) {
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
            $quoteRepo->checkPermit($member->id, 'quoteSub_5', 2);

            $validator = Validator::make($param, [
                'serialNumber' => 'required',
                'proccessName' => 'required',
                'firm' => 'required',
            ]);

            if($validator->fails()) {
                $result['errors'] = $validator->errors();
                throw new Exception('輸入錯誤');
            }

            $param['mainId'] = $mainId;
            $quoteRepo->createSub5_1($param);
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

    public function updateSub5_1(Request $request, $mainId = 0) {
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
            $quoteRepo->checkPermit($member->id, 'quoteSub_5', 2);

            $validator = Validator::make($param, [
                'serialNumber' => 'required',
                'proccessName' => 'required',
                'firm' => 'required',
            ]);

            if($validator->fails()) {
                $result['errors'] = $validator->errors();
                throw new Exception('輸入錯誤');
            }

            $quoteRepo->updateSub5_1ByMainId($mainId, $param);
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

    public function createSub6Page(Request $request, $mainId = 0) {
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
            $quoteRepo->checkPermit($member->id, 'quoteSub_6', 1);
            //$result['item'] = $quoteRepo->getSub6ByMainId($mainId);
            $result['status'] = true;
            $result['msg'] = 'success';
        }
        catch(Exception $e) {
            $result['status'] = false;
            $result['msg'] = $e->getMessage();
        }

        if($param['mode'] == 'html') {
            $result['mainId'] = $mainId;
            $result['memberPermission'] = $memberPermission;
            return view('quote.sub6.create', $result);
        }
        return json_encode($result);
    }

    public function editSub6(Request $request, $mainId = 0) {
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
            $quoteRepo->checkPermit($member->id, 'quoteSub_6', 1);
            $result['item'] = $quoteRepo->getSub6ByMainId($mainId);
            $result['status'] = true;
            $result['msg'] = 'success';
        }
        catch(Exception $e) {
            $result['status'] = false;
            $result['msg'] = $e->getMessage();
        }

        if($param['mode'] == 'html') {
            $result['mainId'] = $mainId;
            $result['memberPermission'] = $memberPermission;
            return view('quote.sub6.edit', $result);
        }
        return json_encode($result);
    }

    public function createSub6(Request $request, $mainId = 0) {
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
            $quoteRepo->checkPermit($member->id, 'quoteSub_6', 2);

            $validator = Validator::make($param, [
                'serialNumber' => 'required',
                'processName' => 'required',
                'materialName' => 'required',
                'localNeedSec' => 'required|integer',
                'usageAmount' => 'required|integer',
            ]);

            if($validator->fails()) {
                $result['errors'] = $validator->errors();
                throw new Exception('輸入錯誤');
            }
            $param['processMemo'] = isset($param['processMemo']) ? $param['processMemo'] : '';

            $param['mainId'] = $mainId;
            $quoteRepo->createSub6($param);
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

    public function updateSub6(Request $request, $mainId = 0) {
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
            $quoteRepo->checkPermit($member->id, 'quoteSub_6', 2);

            $validator = Validator::make($param, [
                'serialNumber' => 'required',
                'processName' => 'required',
                'materialName' => 'required',
                'localNeedSec' => 'required|integer',
                'usageAmount' => 'required|integer',
            ]);

            if($validator->fails()) {
                $result['errors'] = $validator->errors();
                throw new Exception('輸入錯誤');
            }
            $param['processMemo'] = isset($param['processMemo']) ? $param['processMemo'] : '';

            $quoteRepo->updateSub6ByMainId($mainId, $param);
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

    public function createSub7Page(Request $request, $mainId = 0) {
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
            $quoteRepo->checkPermit($member->id, 'quoteSub_7', 1);
            //$result['item'] = $quoteRepo->getSub7ByMainId($mainId);
            $result['status'] = true;
            $result['msg'] = 'success';
        }
        catch(Exception $e) {
            $result['status'] = false;
            $result['msg'] = $e->getMessage();
        }

        if($param['mode'] == 'html') {
            $result['mainId'] = $mainId;
            $result['memberPermission'] = $memberPermission;
            return view('quote.sub7.create', $result);
        }
        return json_encode($result);
    }

    public function editSub7(Request $request, $mainId = 0) {
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
            $quoteRepo->checkPermit($member->id, 'quoteSub_7', 1);
            $result['item'] = $quoteRepo->getSub7ByMainId($mainId);
            $result['status'] = true;
            $result['msg'] = 'success';
        }
        catch(Exception $e) {
            $result['status'] = false;
            $result['msg'] = $e->getMessage();
        }

        if($param['mode'] == 'html') {
            return view('quote.sub7.edit', $result);
        }
        return json_encode($result);
    }

    public function createSub7(Request $request, $mainId = 0) {
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
            $quoteRepo->checkPermit($member->id, 'quoteSub_7', 2);

            $validator = Validator::make($param, [
                'serialNumber' => 'required',
                'processName' => 'required',
                'materialName' => 'required',
                'localNeedSec' => 'required|integer',
                'usageAmount' => 'required|integer',
            ]);

            if($validator->fails()) {
                $result['errors'] = $validator->errors();
                throw new Exception('輸入錯誤');
            }
            $param['processMemo'] = isset($param['processMemo']) ? $param['processMemo'] : '';
            $param['localNeedNum'] = isset($param['localNeedNum']) ? $param['localNeedNum'] : 0;
            $param['outProcessPrice'] = isset($param['outProcessPrice']) ? $param['outProcessPrice'] : 0;

            $param['mainId'] = $mainId;
            $quoteRepo->createSub7($param);
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

    public function updateSub7(Request $request, $mainId = 0) {
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
            $quoteRepo->checkPermit($member->id, 'quoteSub_7', 2);

            $validator = Validator::make($param, [
                'serialNumber' => 'required',
                'processName' => 'required',
                'materialName' => 'required',
                'localNeedSec' => 'required|integer',
                'usageAmount' => 'required|integer',
            ]);

            if($validator->fails()) {
                $result['errors'] = $validator->errors();
                throw new Exception('輸入錯誤');
            }
            $param['processMemo'] = isset($param['processMemo']) ? $param['processMemo'] : '';
            $param['localNeedNum'] = isset($param['localNeedNum']) ? $param['localNeedNum'] : 0;
            $param['outProcessPrice'] = isset($param['outProcessPrice']) ? $param['outProcessPrice'] : 0;

            $quoteRepo->updateSub7ByMainId($mainId, $param);
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

    public function createSub7_1Page(Request $request, $mainId = 0) {
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
            $quoteRepo->checkPermit($member->id, 'quoteSub_7', 1);
            //$result['item'] = $quoteRepo->getSub7_1ByMainId($mainId);
            $result['status'] = true;
            $result['msg'] = 'success';
        }
        catch(Exception $e) {
            $result['status'] = false;
            $result['msg'] = $e->getMessage();
        }

        if($param['mode'] == 'html') {
            $result['mainId'] = $mainId;
            $result['memberPermission'] = $memberPermission;
            return view('quote.sub7-1.create', $result);
        }
        return json_encode($result);
    }

    public function editSub7_1(Request $request, $mainId = 0) {
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
            $quoteRepo->checkPermit($member->id, 'quoteSub_7', 1);
            $result['item'] = $quoteRepo->getSub7_1ByMainId($mainId);
            $result['status'] = true;
            $result['msg'] = 'success';
        }
        catch(Exception $e) {
            $result['status'] = false;
            $result['msg'] = $e->getMessage();
        }

        if($param['mode'] == 'html') {
            return view('quote.sub7-1.edit', $result);
        }
        return json_encode($result);
    }

    public function createSub7_1(Request $request, $mainId = 0) {
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
            $quoteRepo->checkPermit($member->id, 'quoteSub_7', 2);

            $validator = Validator::make($param, [
                'serialNumber' => 'required',
                'outOrSelf' => 'required|integer',
                'processName' => 'required',
                'materialName' => 'required',
                'localNeedSec' => 'required|integer',
                'usageAmount' => 'required|integer',
            ]);

            if($validator->fails()) {
                $result['errors'] = $validator->errors();
                throw new Exception('輸入錯誤');
            }
            $param['processMemo'] = isset($param['processMemo']) ? $param['processMemo'] : '';
            $param['outProcessPrice'] = isset($param['outProcessPrice']) ? $param['outProcessPrice'] : 0;

            $param['mainId'] = $mainId;
            $quoteRepo->createSub7_1($param);
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

    public function updateSub7_1(Request $request, $mainId = 0) {
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
            $quoteRepo->checkPermit($member->id, 'quoteSub_7', 2);

            $validator = Validator::make($param, [
                'serialNumber' => 'required',
                'outOrSelf' => 'required|integer',
                'processName' => 'required',
                'materialName' => 'required',
                'localNeedSec' => 'required|integer',
                'usageAmount' => 'required|integer',
            ]);

            if($validator->fails()) {
                $result['errors'] = $validator->errors();
                throw new Exception('輸入錯誤');
            }
            $param['processMemo'] = isset($param['processMemo']) ? $param['processMemo'] : '';
            $param['outProcessPrice'] = isset($param['outProcessPrice']) ? $param['outProcessPrice'] : 0;

            $quoteRepo->updateSub7_1ByMainId($mainId, $param);
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

    public function editSub8(Request $request, $mainId = 0) {
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
            $quoteRepo->checkPermit($member->id, 'quoteSub_8', 1);
            $result['item'] = $quoteRepo->getSub8ByMainId($mainId);
            $result['status'] = true;
            $result['msg'] = 'success';
        }
        catch(Exception $e) {
            $result['status'] = false;
            $result['msg'] = $e->getMessage();
        }

        if($param['mode'] == 'html') {
            return view('quote.sub8.edit', $result);
        }
        return json_encode($result);
    }

    public function createSub8Page(Request $request, $mainId = 0) {
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
            $quoteRepo->checkPermit($member->id, 'quoteSub_8', 1);
            $result['status'] = true;
            $result['msg'] = 'success';
        }
        catch(Exception $e) {
            $result['status'] = false;
            $result['msg'] = $e->getMessage();
        }

        if($param['mode'] == 'html') {
            $result['mainId'] = $mainId;
            $result['memberPermission'] = $memberPermission;
            return view('quote.sub8.create', $result);
        }
        return json_encode($result);
    }

    public function createSub8(Request $request, $mainId = 0) {
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
            $quoteRepo->checkPermit($member->id, 'quoteSub_8', 2);

            $validator = Validator::make($param, [
                'sub1Price' => 'required|integer',
                'sub1SubTotal' => 'required|integer',
                'sub2Price' => 'required|integer',
                'sub2SubTotal' => 'required|integer',
                'sub3Price' => 'required|integer',
                'sub3SubTotal' => 'required|integer',
                'sub3_1Price' => 'required|integer',
                'sub3_1SubTotal' => 'required|integer',
                'sub4Price' => 'required|integer',
                'sub4SubTotal' => 'required|integer',
                'sub5Price' => 'required|integer',
                'sub5SubTotal' => 'required|integer',
                'sub6Price' => 'required|integer',
                'sub6SubTotal' => 'required|integer',
                'sub7Price' => 'required|integer',
                'sub7SubTotal' => 'required|integer',
            ]);

            if($validator->fails()) {
                $result['errors'] = $validator->errors();
                throw new Exception('輸入錯誤');
            }
            $param['purchaseName'] = isset($param['purchaseName']) ? $param['purchaseName'] : '';
            $param['purchaseFillDate'] = isset($param['purchaseFillDate']) ? $param['purchaseFillDate'] : '';
            $param['reviewName'] = isset($param['reviewName']) ? $param['reviewName'] : '';
            $param['reviewFillDate'] = isset($param['reviewFillDate']) ? $param['reviewFillDate'] : '';

            $param['mainId'] = $mainId;
            $quoteRepo->createSub8($param);
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

    public function updateSub8(Request $request, $mainId = 0) {
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
            $quoteRepo->checkPermit($member->id, 'quoteSub_8', 2);

            $validator = Validator::make($param, [
                'sub1Price' => 'required|integer',
                'sub1SubTotal' => 'required|integer',
                'sub2Price' => 'required|integer',
                'sub2SubTotal' => 'required|integer',
                'sub3Price' => 'required|integer',
                'sub3SubTotal' => 'required|integer',
                'sub3_1Price' => 'required|integer',
                'sub3_1SubTotal' => 'required|integer',
                'sub4Price' => 'required|integer',
                'sub4SubTotal' => 'required|integer',
                'sub5Price' => 'required|integer',
                'sub5SubTotal' => 'required|integer',
                'sub6Price' => 'required|integer',
                'sub6SubTotal' => 'required|integer',
                'sub7Price' => 'required|integer',
                'sub7SubTotal' => 'required|integer',
            ]);

            if($validator->fails()) {
                $result['errors'] = $validator->errors();
                throw new Exception('輸入錯誤');
            }
            $param['purchaseName'] = isset($param['purchaseName']) ? $param['purchaseName'] : '';
            $param['purchaseFillDate'] = isset($param['purchaseFillDate']) ? $param['purchaseFillDate'] : '';
            $param['reviewName'] = isset($param['reviewName']) ? $param['reviewName'] : '';
            $param['reviewFillDate'] = isset($param['reviewFillDate']) ? $param['reviewFillDate'] : '';

            $quoteRepo->updateSub8ByMainId($mainId, $param);
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

    public function editSub9(Request $request, $mainId = 0) {
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
            $quoteRepo->checkPermit($member->id, 'quoteSub_9', 1);
            $result['item'] = $quoteRepo->getSub9ByMainId($mainId);
            $result['status'] = true;
            $result['msg'] = 'success';
        }
        catch(Exception $e) {
            $result['status'] = false;
            $result['msg'] = $e->getMessage();
        }

        if($param['mode'] == 'html') {
            return view('quote.sub9.edit', $result);
        }
        return json_encode($result);
    }

    public function createSub9(Request $request, $mainId = 0) {
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
            $quoteRepo->checkPermit($member->id, 'quoteSub_9', 2);

            $validator = Validator::make($param, [
                'port' => 'required|integer',
                'formula' => 'required|integer',
                'freight' => 'required|integer',
            ]);

            if($validator->fails()) {
                $result['errors'] = $validator->errors();
                throw new Exception('輸入錯誤');
            }

            $param['mainId'] = $mainId;
            $quoteRepo->createSub9($param);
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

    public function updateSub9(Request $request, $mainId = 0) {
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
            $quoteRepo->checkPermit($member->id, 'quoteSub_9', 2);

            $validator = Validator::make($param, [
                'port' => 'required|integer',
                'formula' => 'required|integer',
                'freight' => 'required|integer',
            ]);

            if($validator->fails()) {
                $result['errors'] = $validator->errors();
                throw new Exception('輸入錯誤');
            }

            $quoteRepo->updateSub9ByMainId($mainId, $param);
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

    public function editTotal(Request $request, $mainId = 0) {
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
            $quoteRepo->checkPermit($member->id, 'quoteSub_10', 1);
            $result['item'] = $quoteRepo->getTotalByMainId($mainId);
            $result['status'] = true;
            $result['msg'] = 'success';
        }
        catch(Exception $e) {
            $result['status'] = false;
            $result['msg'] = $e->getMessage();
        }

        if($param['mode'] == 'html') {
            return view('quote.total.edit', $result);
        }
        return json_encode($result);
    }

    public function createTotal(Request $request, $mainId = 0) {
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
            $quoteRepo->checkPermit($member->id, 'quoteSub_10', 2);

            $validator = Validator::make($param, [
                'costPrice' => 'required|integer',
                'profit' => 'required|integer',
                'exchangeRate' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            ]);

            if($validator->fails()) {
                $result['errors'] = $validator->errors();
                throw new Exception('輸入錯誤');
            }
            $param['reviewName'] = isset($param['reviewName']) ? $param['reviewName'] : '';
            $param['reviewFillDate'] = isset($param['reviewFillDate']) ? $param['reviewFillDate'] : '';
            $param['reviewGeneralManager'] = isset($param['reviewGeneralManager']) ? $param['reviewGeneralManager'] : '';
            $param['reviewGeneralManagerFillDate'] = isset($param['reviewGeneralManagerFillDate']) ? $param['reviewGeneralManagerFillDate'] : '';
            $param['reviewFinalGeneralManager'] = isset($param['reviewFinalGeneralManager']) ? $param['reviewFinalGeneralManager'] : '';
            $param['reviewFinalGeneralManagerFillDate'] = isset($param['reviewFinalGeneralManagerFillDate']) ? $param['reviewFinalGeneralManagerFillDate'] : '';

            $param['mainId'] = $mainId;
            $quoteRepo->createTotal($param);
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

    public function updateTotal(Request $request, $mainId = 0) {
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
            $quoteRepo->checkPermit($member->id, 'quoteSub_10', 2);

            $validator = Validator::make($param, [
                'costPrice' => 'required|integer',
                'profit' => 'required|integer',
                'exchangeRate' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            ]);

            if($validator->fails()) {
                $result['errors'] = $validator->errors();
                throw new Exception('輸入錯誤');
            }
            $param['reviewName'] = isset($param['reviewName']) ? $param['reviewName'] : '';
            $param['reviewFillDate'] = isset($param['reviewFillDate']) ? $param['reviewFillDate'] : '';
            $param['reviewGeneralManager'] = isset($param['reviewGeneralManager']) ? $param['reviewGeneralManager'] : '';
            $param['reviewGeneralManagerFillDate'] = isset($param['reviewGeneralManagerFillDate']) ? $param['reviewGeneralManagerFillDate'] : '';
            $param['reviewFinalGeneralManager'] = isset($param['reviewFinalGeneralManager']) ? $param['reviewFinalGeneralManager'] : '';
            $param['reviewFinalGeneralManagerFillDate'] = isset($param['reviewFinalGeneralManagerFillDate']) ? $param['reviewFinalGeneralManagerFillDate'] : '';

            $quoteRepo->updateTotalByMainId($mainId, $param);
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
}
