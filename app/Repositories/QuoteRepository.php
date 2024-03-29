<?php

namespace App\Repositories;

use App\Models\QuoteMain;
use App\Models\QuoteSub1;
use App\Models\QuoteSub1_1;
use App\Models\QuoteSub2;
use App\Models\QuoteSub2_1;
use App\Models\QuoteSub3;
use App\Models\QuoteSub3_1;
use App\Models\QuoteSub4;
use App\Models\QuoteSub5;
use App\Models\QuoteSub5_1;
use App\Models\QuoteSub6;
use App\Models\QuoteSub7;
use App\Models\QuoteSub7_1;
use App\Models\QuoteSub8;
use App\Models\QuoteSub9;
use App\Models\QuoteTotal;
use App\Repositories\MemberRepository;
use Illuminate\Database\Eloquent\Model;
use Exception;
use Storage;

class QuoteRepository
{
    public function __construct() {
    }

    public function checkExt($ext) {
        $validExtArr = ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'doc', 'docx', 'odt', 'pdf', 'xls', 'xlsx', 'ods'];
        $ext = strtolower(trim($ext));
        if(in_array($ext, $validExtArr) == false)
            throw new Exception('上傳檔案格式限定:'. implode(',', $validExtArr) );
    }

    //$memberId 哪位成員要檢查
    //$objectActive 目標動作
    //$objectPermit 要求權限
    public function checkPermit($memberId, $objectActive = 'quoteMain', $objectPermit = 2) {
        $memberRepo = new MemberRepository();
        $member = $memberRepo->getById($memberId);

        $objActive = $objectActive;
        if($objectActive == 'quoteMain')
            $objActive = 'quoteSub_1';

        if($member->$objActive < $objectPermit)
            throw new Exception("$objectActive permission denied");
    }

    public function getMainById($id) {
        $item = QuoteMain::where('id', '=', $id)
            ->first();
        if(isset($item->id) == false)
            throw new Exception('指定資料不存在');
        return $item;
    }

    public function listsMain($param) {
        if(is_numeric($param['nowPage']) == false)
            throw new Exception('頁數請輸入數字');
        if(is_numeric($param['pageNum']) == false)
            throw new Exception('單頁數量請輸入數字');

        $start = ($param['nowPage'] - 1) * $param['pageNum'];
        $query = QuoteMain::orderBy('id', 'desc');

        $items = $query->offset($start)
            ->limit($param['pageNum'])
            ->get();
        foreach($items as $i => $item) {
            switch($item->quoteCls) {
                case '1':
                    $items[$i]->quoteClsShow = '業務一部';
                    break;
                case '2':
                    $items[$i]->quoteClsShow = '業務二部';
                    break;
                case '3':
                    $items[$i]->quoteClsShow = '公司品項';
                    break;
            }
        }
        return $items;
    }

    public function listsMainAmount($param) {
        $query = QuoteMain::orderBy('id', 'desc');

        $amount = $query->count();
        return $amount;
    }

    public function subsMain($param) {
        $items = [];
        $items['sub1'] = QuoteSub1::where('mainId', '=', $param['mainId'])
            ->first();
        $items['sub1_1'] = QuoteSub1_1::where('mainId', '=', $param['mainId'])
            ->first();
        $items['sub2'] = QuoteSub2::where('mainId', '=', $param['mainId'])
            ->first();
        $items['sub2_1'] = QuoteSub2_1::where('mainId', '=', $param['mainId'])
            ->first();
        $items['sub3'] = QuoteSub3::where('mainId', '=', $param['mainId'])
            ->first();
        $items['sub3_1'] = QuoteSub3_1::where('mainId', '=', $param['mainId'])
            ->first();
        $items['sub4'] = QuoteSub4::where('mainId', '=', $param['mainId'])
            ->first();
        $items['sub5'] = QuoteSub5::where('mainId', '=', $param['mainId'])
            ->first();
        $items['sub5_1'] = QuoteSub5_1::where('mainId', '=', $param['mainId'])
            ->first();
        $items['sub6'] = QuoteSub6::where('mainId', '=', $param['mainId'])
            ->first();
        $items['sub7'] = QuoteSub7::where('mainId', '=', $param['mainId'])
            ->first();
        $items['sub7_1'] = QuoteSub7_1::where('mainId', '=', $param['mainId'])
            ->first();
        return $items;
    }

    public function createMain($param, $files = []) {

        if(isset($files['image'])) {
            $ext = $files['image']->getClientOriginalExtension();
            $this->checkExt($ext);
        }

        $item = new QuoteMain();
        $item->quoteCls = $param['quoteCls'];
        $item->customerProductNum = $param['customerProductNum'];
        $item->productNum = $param['productNum'];
        $item->productNameTw = $param['productNameTw'];
        $item->productNameEn = $param['productNameEn'];
        $item->quoteQuality = $param['quoteQuality'];
        $item->quoteQuantity = $param['quoteQuantity'];
        $item->productInfo = $param['productInfo'];
        $item->created_at = date('Y-m-d H:i:s');
        $item->updated_at = date('Y-m-d H:i:s');
        $item->save();

        $root = config('filesystems')['disks']['uploads']['root'];
        $path = date('/Y/m'). '/';
        if(isset($files['image'])) {
            $ext = $files['image']->getClientOriginalExtension();
            $filename = $item->id. "_main_image.$ext";
            $item->image = $path. $filename;
            $item->save();
            $files['image']->move($root. $path, $filename);
        }
    }

    public function updateMainById($id, $param, $files) {
        $item = QuoteMain::where('id', '=', $id)
            ->first();
        if(isset($item->id) == false)
            throw new Exception('指定資料不存在');

        if(isset($files['image'])) {
            $ext = $files['image']->getClientOriginalExtension();
            $this->checkExt($ext);
        }

        if(isset($param['quoteCls']) && is_numeric($param['quoteCls']))
            $item->quoteCls = $param['quoteCls'];
        if(isset($param['customerProductNum']) && trim($param['customerProductNum']) != '')
            $item->customerProductNum = $param['customerProductNum'];
        if(isset($param['productNum']) && trim($param['productNum']) != '')
            $item->productNum = $param['productNum'];
        if(isset($param['productNameTw']) && trim($param['productNameTw']) != '')
            $item->productNameTw = $param['productNameTw'];
        if(isset($param['productNameEn']) && trim($param['productNameEn']) != '')
            $item->productNameEn = $param['productNameEn'];
        if(isset($param['quoteQuality']) && trim($param['quoteQuality']) != '')
            $item->quoteQuality = $param['quoteQuality'];
        if(isset($param['quoteQuantity']) && trim($param['quoteQuantity']) != '')
            $item->quoteQuantity = $param['quoteQuantity'];
        if(isset($param['productInfo']) && trim($param['productInfo']) != '')
            $item->productInfo = $param['productInfo'];
        $item->updated_at = date('Y-m-d H:i:s');
        $item->save();

        $root = config('filesystems')['disks']['uploads']['root'];
        $path = date('/Y/m'). '/';
        if(isset($files['image'])) {
            $ext = $files['image']->getClientOriginalExtension();
            $filename = $item->id. "_main_image.$ext";
            $item->image = $path. $filename;
            $item->save();
            $files['image']->move($root. $path, $filename);
        }
    }

    public function removeMainById($id) {
        QuoteMain::where('id', '=', $id)->delete();
    }

    public function getSub1ByMainId($mainId) {
        $item = QuoteSub1::where('mainId', '=', $mainId)
            ->first();
        if(isset($item->id) == false)
            throw new Exception('指定資料不存在');
        return $item;
    }

    public function listsSub1($param) {
        if(is_numeric($param['nowPage']) == false)
            throw new Exception('頁數請輸入數字');
        if(is_numeric($param['pageNum']) == false)
            throw new Exception('單頁數量請輸入數字');

        $start = ($param['nowPage'] - 1) * $param['pageNum'];
        $query = QuoteSub1::orderBy('id', 'desc');

        $items = $query->offset($start)
            ->limit($param['pageNum'])
            ->get();
        return $items;
    }

    public function listsSub1Amount($param) {
        $query = QuoteSub1::orderBy('id', 'desc');

        $amount = $query->count();
        return $amount;
    }

    public function createSub1($param) {
        $this->getMainById($param['mainId']);
        $sub = [];
        try {
            $sub = $this->getSub1ByMainId($param['mainId']);
        } catch(Exception $e) {
            //子資料不存在的例外，因符合本次需要，故跳過不處理
        }

        if(isset($sub->id) == true)
            throw new Exception('子資料已存在');

        $item = new QuoteSub1();
        $item->mainId = $param['mainId'];
        $item->partNo = $param['partNo'];
        $item->materialName = $param['materialName'];
        $item->length = $param['length'];
        $item->width = $param['width'];
        $item->height = $param['height'];
        $item->spec = $param['spec'];
        $item->specIllustrate = $param['specIllustrate'];
        $item->content = $param['content'];
        $item->level = $param['level'];
        $item->business = $param['business'];
        $item->fsc = $param['fsc'];
        $item->memo = $param['memo'];
        $item->bigLength = $param['bigLength'];
        $item->bigWidth = $param['bigWidth'];
        $item->bigHeight = $param['bigHeight'];
        $item->created_at = date('Y-m-d H:i:s');
        $item->updated_at = date('Y-m-d H:i:s');
        $item->save();
    }

    public function updateSub1ByMainId($mainId, $param) {
        $item = $this->getSub1ByMainId($mainId);

        if(isset($param['partNo']) && trim($param['partNo']) != '')
            $item->partNo = $param['partNo'];
        if(isset($param['materialName']) && trim($param['materialName']) != '')
            $item->materialName = $param['materialName'];
        if(isset($param['length']) && is_numeric($param['length']))
            $item->length = $param['length'];
        if(isset($param['width']) && is_numeric($param['width']))
            $item->width = $param['width'];
        if(isset($param['height']) && is_numeric($param['height']))
            $item->height = $param['height'];
        if(isset($param['spec']) && trim($param['spec']) != '')
            $item->spec = $param['spec'];
        if(isset($param['specIllustrate']) && trim($param['specIllustrate']) != '')
            $item->specIllustrate = $param['specIllustrate'];
        if(isset($param['content']) && trim($param['content']) != '')
            $item->content = $param['content'];
        if(isset($param['level']) && trim($param['level']) != '')
            $item->level = $param['level'];
        if(isset($param['business']) && trim($param['business']) != '')
            $item->business = $param['business'];
        if(isset($param['fsc']) && trim($param['fsc']) != '')
            $item->fsc = $param['fsc'];
        if(isset($param['memo']) && trim($param['memo']) != '')
            $item->memo = $param['memo'];
        if(isset($param['bigLength']) && is_numeric($param['bigLength']))
            $item->bigLength = $param['bigLength'];
        if(isset($param['bigWidth']) && is_numeric($param['bigWidth']))
            $item->bigWidth = $param['bigWidth'];
        if(isset($param['bigHeight']) && is_numeric($param['bigHeight']))
            $item->bigHeight = $param['bigHeight'];
        $item->updated_at = date('Y-m-d H:i:s');
        $item->save();
    }

    public function removeSub1ByMainId($mainId) {
        QuoteSub1::where('mainId', $mainId)->delete();
    }

    public function getSub1_1ByMainId($mainId) {
        $item = QuoteSub1_1::where('mainId', '=', $mainId)
            ->first();
        if(isset($item->id) == false)
            throw new Exception('指定資料不存在');
        return $item;
    }

    public function listsSub1_1($param) {
        if(is_numeric($param['nowPage']) == false)
            throw new Exception('頁數請輸入數字');
        if(is_numeric($param['pageNum']) == false)
            throw new Exception('單頁數量請輸入數字');

        $start = ($param['nowPage'] - 1) * $param['pageNum'];
        $query = QuoteSub1_1::orderBy('id', 'desc');

        $items = $query->offset($start)
            ->limit($param['pageNum'])
            ->get();
        return $items;
    }

    public function listsSub1_1Amount($param) {
        $query = QuoteSub1_1::orderBy('id', 'desc');

        $amount = $query->count();
        return $amount;
    }

    public function createSub1_1($param) {
        $this->getMainById($param['mainId']);
        $sub = [];
        try {
            $sub = $this->getSub1_1ByMainId($param['mainId']);
        } catch(Exception $e) {
            //子資料不存在的例外，因符合本次需要，故跳過不處理
        }

        if(isset($sub->id) == true)
            throw new Exception('子資料已存在');

        $item = new QuoteSub1_1();
        $item->mainId = $param['mainId'];
        $item->partNo = $param['partNo'];
        $item->materialName = $param['materialName'];
        $item->length = $param['length'];
        $item->width = $param['width'];
        $item->height = $param['height'];
        $item->usageAmount = $param['usageAmount'];
        $item->spec = $param['spec'];
        $item->specIllustrate = $param['specIllustrate'];
        $item->content = $param['content'];
        $item->level = $param['level'];
        $item->business = $param['business'];
        $item->fsc = $param['fsc'];
        $item->materialPrice = $param['materialPrice'];
        $item->created_at = date('Y-m-d H:i:s');
        $item->updated_at = date('Y-m-d H:i:s');
        $item->save();
    }

    public function updateSub1_1ByMainId($mainId, $param) {
        $item = $this->getSub1_1ByMainId($mainId);

        if(isset($param['partNo']) && trim($param['partNo']) != '')
            $item->partNo = $param['partNo'];
        if(isset($param['materialName']) && trim($param['materialName']) != '')
            $item->materialName = $param['materialName'];
        if(isset($param['length']) && is_numeric($param['length']))
            $item->length = $param['length'];
        if(isset($param['width']) && is_numeric($param['width']))
            $item->width = $param['width'];
        if(isset($param['height']) && is_numeric($param['height']))
            $item->height = $param['height'];
        if(isset($param['usageAmount']) && is_numeric($param['usageAmount']))
            $item->usageAmount = $param['usageAmount'];
        if(isset($param['spec']) && trim($param['spec']) != '')
            $item->spec = $param['spec'];
        if(isset($param['specIllustrate']) && trim($param['specIllustrate']) != '')
            $item->specIllustrate = $param['specIllustrate'];
        if(isset($param['content']) && trim($param['content']) != '')
            $item->content = $param['content'];
        if(isset($param['level']) && trim($param['level']) != '')
            $item->level = $param['level'];
        if(isset($param['business']) && trim($param['business']) != '')
            $item->business = $param['business'];
        if(isset($param['fsc']) && trim($param['fsc']) != '')
            $item->fsc = $param['fsc'];
        if(isset($param['materialPrice']) && is_numeric($param['materialPrice']))
            $item->materialPrice = $param['materialPrice'];
        $item->updated_at = date('Y-m-d H:i:s');
        $item->save();
    }

    public function getSub2ByMainId($mainId) {
        $item = QuoteSub2::where('mainId', '=', $mainId)
            ->first();
        if(isset($item->id) == false)
            throw new Exception('指定資料不存在');
        return $item;
    }

    public function createSub2($param, $files = []) {
        $this->getMainById($param['mainId']);
        $sub = [];
        try {
            $sub = $this->getSub2ByMainId($param['mainId']);
        } catch(Exception $e) {
            //子資料不存在的例外，因符合本次需要，故跳過不處理
        }

        if(isset($sub->id) == true)
            throw new Exception('子資料已存在');

        if(isset($files['infoImg'])) {
            $ext = $files['infoImg']->getClientOriginalExtension();
            $this->checkExt($ext);
        }

        $item = new QuoteSub2();
        $item->mainId = $param['mainId'];
        $item->partNo = $param['partNo'];
        $item->serialNumber = $param['serialNumber'];
        $item->materialName = $param['materialName'];
        $item->length = $param['length'];
        $item->width = $param['width'];
        $item->height = $param['height'];
        $item->usageAmount = $param['usageAmount'];
        $item->boxType = $param['boxType'];
        $item->internalPcsNum = $param['internalPcsNum'];
        $item->paperThickness = $param['paperThickness'];
        $item->paperMaterial = $param['paperMaterial'];
        $item->printMethod = $param['printMethod'];
        $item->craftMethod = $param['craftMethod'];
        $item->coatingMethod = $param['coatingMethod'];
        $item->memo = $param['memo'];
        $item->created_at = date('Y-m-d H:i:s');
        $item->updated_at = date('Y-m-d H:i:s');
        $item->save();

        $root = config('filesystems')['disks']['uploads']['root'];
        $path = date('/Y/m'). '/';
        if(isset($files['infoImg'])) {
            $ext = $files['infoImg']->getClientOriginalExtension();
            $filename = $item->id. "_sub2_infoImg.$ext";
            $item->infoImg = $path. $filename;
            $item->save();
            $files['infoImg']->move($root. $path, $filename);
        }
    }

    public function updateSub2ByMainId($mainId, $param, $files = []) {
        $item = $this->getSub2ByMainId($mainId);

        if(isset($files['infoImg'])) {
            $ext = $files['infoImg']->getClientOriginalExtension();
            $this->checkExt($ext);
        }

        if(isset($param['partNo']) && trim($param['partNo']) != '')
            $item->partNo = $param['partNo'];
        if(isset($param['serialNumber']) && trim($param['serialNumber']) != '')
            $item->serialNumber = $param['serialNumber'];
        if(isset($param['materialName']) && trim($param['materialName']) != '')
            $item->materialName = $param['materialName'];
        if(isset($param['length']) && is_numeric($param['length']))
            $item->length = $param['length'];
        if(isset($param['width']) && is_numeric($param['width']))
            $item->width = $param['width'];
        if(isset($param['height']) && is_numeric($param['height']))
            $item->height = $param['height'];
        if(isset($param['usageAmount']) && is_numeric($param['usageAmount']))
            $item->usageAmount = $param['usageAmount'];
        if(isset($param['boxType']) && trim($param['boxType']) != '')
            $item->boxType = $param['boxType'];
        if(isset($param['internalPcsNum']) && is_numeric($param['internalPcsNum']))
            $item->internalPcsNum = $param['internalPcsNum'];
        if(isset($param['paperThickness']) && trim($param['paperThickness']) != '')
            $item->paperThickness = $param['paperThickness'];
        if(isset($param['paperMaterial']) && trim($param['paperMaterial']) != '')
            $item->paperMaterial = $param['paperMaterial'];
        if(isset($param['printMethod']) && trim($param['printMethod']) != '')
            $item->printMethod = $param['printMethod'];
        if(isset($param['craftMethod']) && trim($param['craftMethod']) != '')
            $item->craftMethod = $param['craftMethod'];
        if(isset($param['coatingMethod']) && trim($param['coatingMethod']) != '')
            $item->coatingMethod = $param['coatingMethod'];
        if(isset($param['memo']) && trim($param['memo']) != '')
            $item->memo = $param['memo'];

        $item->save();

        $root = config('filesystems')['disks']['uploads']['root'];
        $path = date('/Y/m'). '/';
        if(isset($files['infoImg'])) {
            $ext = $files['infoImg']->getClientOriginalExtension();
            $filename = $item->id. "_sub2_infoImg.$ext";
            $item->infoImg = $path. $filename;
            $item->save();
            $files['infoImg']->move($root. $path, $filename);
        }
    }

    public function getSub2_1ByMainId($mainId) {
        $item = QuoteSub2_1::where('mainId', '=', $mainId)
            ->first();
        if(isset($item->id) == false)
            throw new Exception('指定資料不存在');
        return $item;
    }

    public function createSub2_1($param, $files = []) {
        $this->getMainById($param['mainId']);
        $sub = [];
        try {
            $sub = $this->getSub2_1ByMainId($param['mainId']);
        } catch(Exception $e) {
            //子資料不存在的例外，因符合本次需要，故跳過不處理
        }

        if(isset($sub->id) == true)
            throw new Exception('子資料已存在');

        if(isset($files['infoImg'])) {
            $ext = $files['infoImg']->getClientOriginalExtension();
            $this->checkExt($ext);
        }

        $item = new QuoteSub2_1();
        $item->mainId = $param['mainId'];
        $item->serialNumber = $param['serialNumber'];
        $item->partNo = $param['partNo'];
        $item->materialName = $param['materialName'];
        $item->length = $param['length'];
        $item->width = $param['width'];
        $item->height = $param['height'];
        $item->usageAmount = $param['usageAmount'];
        $item->paperThickness = $param['paperThickness'];
        $item->paperMaterial = $param['paperMaterial'];
        $item->printMethod = $param['printMethod'];
        $item->craftMethod = $param['craftMethod'];
        $item->coatingMethod = $param['coatingMethod'];
        $item->memo = $param['memo'];
        $item->save();

        $root = config('filesystems')['disks']['uploads']['root'];
        $path = date('/Y/m'). '/';
        if(isset($files['infoImg'])) {
            $ext = $files['infoImg']->getClientOriginalExtension();
            $filename = $item->id. "_sub2_1_infoImg.$ext";
            $item->infoImg = $path. $filename;
            $item->save();
            $files['infoImg']->move($root. $path, $filename);
        }
    }

    public function updateSub2_1ByMainId($mainId, $param, $files = []) {
        $item = $this->getSub2_1ByMainId($mainId);

        if(isset($files['infoImg'])) {
            $ext = $files['infoImg']->getClientOriginalExtension();
            $this->checkExt($ext);
        }

        if(isset($param['serialNumber']) && trim($param['serialNumber']) != '')
            $item->serialNumber = $param['serialNumber'];
        if(isset($param['partNo']) && trim($param['partNo']) != '')
            $item->partNo = $param['partNo'];
        if(isset($param['materialName']) && trim($param['materialName']) != '')
            $item->materialName = $param['materialName'];
        if(isset($param['length']) && is_numeric($param['length']))
            $item->length = $param['length'];
        if(isset($param['width']) && is_numeric($param['width']))
            $item->width = $param['width'];
        if(isset($param['height']) && is_numeric($param['height']))
            $item->height = $param['height'];
        if(isset($param['usageAmount']) && is_numeric($param['usageAmount']))
            $item->usageAmount = $param['usageAmount'];
        if(isset($param['paperThickness']) && trim($param['paperThickness']) != '')
            $item->paperThickness = $param['paperThickness'];
        if(isset($param['paperMaterial']) && trim($param['paperMaterial']) != '')
            $item->paperMaterial = $param['paperMaterial'];
        if(isset($param['printMethod']) && trim($param['printMethod']) != '')
            $item->printMethod = $param['printMethod'];
        if(isset($param['craftMethod']) && trim($param['craftMethod']) != '')
            $item->craftMethod = $param['craftMethod'];
        if(isset($param['coatingMethod']) && trim($param['coatingMethod']) != '')
            $item->coatingMethod = $param['coatingMethod'];
        if(isset($param['memo']) && trim($param['memo']) != '')
            $item->memo = $param['memo'];

        $item->save();

        $root = config('filesystems')['disks']['uploads']['root'];
        $path = date('/Y/m'). '/';
        if(isset($files['infoImg'])) {
            $ext = $files['infoImg']->getClientOriginalExtension();
            $filename = $item->id. "_sub2_1_infoImg.$ext";
            $item->infoImg = $path. $filename;
            $item->save();
            $files['infoImg']->move($root. $path, $filename);
        }
    }

    public function getSub3ByMainId($mainId) {
        $item = QuoteSub3::where('mainId', '=', $mainId)
            ->first();
        if(isset($item->id) == false)
            throw new Exception('指定資料不存在');
        return $item;
    }

    public function createSub3($param, $files = []) {
        $this->getMainById($param['mainId']);
        $sub = [];
        try {
            $sub = $this->getSub3ByMainId($param['mainId']);
        } catch(Exception $e) {
            //子資料不存在的例外，因符合本次需要，故跳過不處理
        }

        if(isset($sub->id) == true)
            throw new Exception('子資料已存在');

        if(isset($files['infoImg'])) {
            $ext = $files['infoImg']->getClientOriginalExtension();
            $this->checkExt($ext);
        }

        $item = new QuoteSub3();
        $item->mainId = $param['mainId'];
        $item->partNo = $param['partNo'];
        $item->materialName = $param['materialName'];
        $item->length = $param['length'];
        $item->width = $param['width'];
        $item->height = $param['height'];
        $item->usageAmount = $param['usageAmount'];
        $item->spec = $param['spec'];
        $item->info = $param['info'];
        $item->created_at = date('Y-m-d H:i:s');
        $item->updated_at = date('Y-m-d H:i:s');
        $item->save();

        $root = config('filesystems')['disks']['uploads']['root'];
        $path = date('/Y/m'). '/';
        if(isset($files['infoImg'])) {
            $ext = $files['infoImg']->getClientOriginalExtension();
            $filename = $item->id. "_sub3_infoImg.$ext";
            $item->infoImg = $path. $filename;
            $item->save();
            $files['infoImg']->move($root. $path, $filename);
        }
    }

    public function updateSub3ByMainId($mainId, $param, $files = []) {
        $item = $this->getSub3ByMainId($mainId);

        if(isset($files['infoImg'])) {
            $ext = $files['infoImg']->getClientOriginalExtension();
            $this->checkExt($ext);
        }

        if(isset($param['partNo']) && trim($param['partNo']) != '')
            $item->partNo = $param['partNo'];
        if(isset($param['materialName']) && trim($param['materialName']) != '')
            $item->materialName = $param['materialName'];
        if(isset($param['length']) && is_numeric($param['length']))
            $item->length = $param['length'];
        if(isset($param['width']) && is_numeric($param['width']))
            $item->width = $param['width'];
        if(isset($param['height']) && is_numeric($param['height']))
            $item->height = $param['height'];
        if(isset($param['usageAmount']) && is_numeric($param['usageAmount']))
            $item->usageAmount = $param['usageAmount'];
        if(isset($param['spec']) && trim($param['spec']) != '')
            $item->spec = $param['spec'];
        if(isset($param['info']) && trim($param['info']) != '')
            $item->info = $param['info'];
        $item->updated_at = date('Y-m-d H:i:s');

        $item->save();

        $root = config('filesystems')['disks']['uploads']['root'];
        $path = date('/Y/m'). '/';
        if(isset($files['infoImg'])) {
            $ext = $files['infoImg']->getClientOriginalExtension();
            $filename = $item->id. "_sub3_infoImg.$ext";
            $item->infoImg = $path. $filename;
            $item->save();
            $files['infoImg']->move($root. $path, $filename);
        }
    }

    public function getSub3_1ByMainId($mainId) {
        $item = QuoteSub3_1::where('mainId', '=', $mainId)
            ->first();
        if(isset($item->id) == false)
            throw new Exception('指定資料不存在');
        return $item;
    }

    public function createSub3_1($param, $files = []) {
        $this->getMainById($param['mainId']);
        $sub = [];
        try {
            $sub = $this->getSub3_1ByMainId($param['mainId']);
        } catch(Exception $e) {
            //子資料不存在的例外，因符合本次需要，故跳過不處理
        }

        if(isset($sub->id) == true)
            throw new Exception('子資料已存在');

        $item = new QuoteSub3_1();
        $item->mainId = $param['mainId'];
        $item->serialNumber = $param['serialNumber'];
        $item->name = $param['name'];
        $item->painted = $param['painted'];
        $item->subtotal = $param['subtotal'];
        $item->memo = $param['memo'];
        $item->created_at = date('Y-m-d H:i:s');
        $item->updated_at = date('Y-m-d H:i:s');
        $item->save();
    }

    public function updateSub3_1ByMainId($mainId, $param, $files = []) {
        $item = $this->getSub3_1ByMainId($mainId);

        if(isset($param['serialNumber']) && trim($param['serialNumber']) != '')
            $item->serialNumber = $param['serialNumber'];
        if(isset($param['name']) && trim($param['name']) != '')
            $item->name = $param['name'];
        if(isset($param['painted']) && trim($param['painted']) != '')
            $item->painted = $param['painted'];
        if(isset($param['subtotal']) && is_numeric($param['subtotal']))
            $item->subtotal = $param['subtotal'];
        if(isset($param['memo']) && trim($param['memo']) != '')
            $item->memo = $param['memo'];
        $item->updated_at = date('Y-m-d H:i:s');

        $item->save();
    }

    public function getSub4ByMainId($mainId) {
        $item = QuoteSub4::where('mainId', '=', $mainId)
            ->first();
        if(isset($item->id) == false)
            throw new Exception('指定資料不存在');
        return $item;
    }

    public function createSub4($param) {
        $this->getMainById($param['mainId']);
        $sub = [];
        try {
            $sub = $this->getSub4ByMainId($param['mainId']);
        } catch(Exception $e) {
            //子資料不存在的例外，因符合本次需要，故跳過不處理
        }

        if(isset($sub->id) == true)
            throw new Exception('子資料已存在');

        $item = new QuoteSub4();
        $item->mainId = $param['mainId'];
        $item->serialNumber = $param['serialNumber'];
        $item->partNo = $param['partNo'];
        $item->materialName = $param['materialName'];
        $item->length = $param['length'];
        $item->width = $param['width'];
        $item->height = $param['height'];
        $item->origin = $param['origin'];
        $item->thickness = $param['thickness'];
        $item->usageAmount = $param['usageAmount'];
        $item->loss = $param['loss'];
        $item->price = $param['price'];
        $item->memo = $param['memo'];
        $item->created_at = date('Y-m-d H:i:s');
        $item->updated_at = date('Y-m-d H:i:s');
        $item->save();
    }

    public function updateSub4ByMainId($mainId, $param) {
        $item = $this->getSub4ByMainId($mainId);

        if(isset($param['serialNumber']) && trim($param['serialNumber']) != '')
            $item->serialNumber = $param['serialNumber'];
        if(isset($param['partNo']) && trim($param['partNo']) != '')
            $item->partNo = $param['partNo'];
        if(isset($param['materialName']) && trim($param['materialName']) != '')
            $item->materialName = $param['materialName'];
        if(isset($param['length']) && is_numeric($param['length']))
            $item->length = $param['length'];
        if(isset($param['width']) && is_numeric($param['width']))
            $item->width = $param['width'];
        if(isset($param['height']) && is_numeric($param['height']))
            $item->height = $param['height'];
        if(isset($param['origin']) && trim($param['origin']) != '')
            $item->origin = $param['origin'];
        if(isset($param['thickness']) && trim($param['thickness']) != '')
            $item->thickness = $param['thickness'];
        if(isset($param['usageAmount']) && is_numeric($param['usageAmount']))
            $item->usageAmount = $param['usageAmount'];
        if(isset($param['loss']) && is_numeric($param['loss']))
            $item->loss = $param['loss'];
        if(isset($param['price']) && is_numeric($param['price']))
            $item->price = $param['price'];
        if(isset($param['memo']) && trim($param['memo']) != '')
            $item->memo = $param['memo'];
        $item->updated_at = date('Y-m-d H:i:s');

        $item->save();
    }

    public function getSub5ByMainId($mainId) {
        $item = QuoteSub5::where('mainId', '=', $mainId)
            ->first();
        if(isset($item->id) == false)
            throw new Exception('指定資料不存在');
        return $item;
    }

    public function createSub5($param) {
        $this->getMainById($param['mainId']);
        $sub = [];
        try {
            $sub = $this->getSub5ByMainId($param['mainId']);
        } catch(Exception $e) {
            //子資料不存在的例外，因符合本次需要，故跳過不處理
        }

        if(isset($sub->id) == true)
            throw new Exception('子資料已存在');

        $item = new QuoteSub5();
        $item->mainId = $param['mainId'];
        $item->serialNumber = $param['serialNumber'];
        $item->memo = $param["memo"];
        $item->orderNum = $param['orderNum'];
        $item->priceSubtotal = $param['priceSubtotal'];
        $item->flattenSubtotal = $param['flattenSubtotal'];
        $item->packageMethod = $param['packageMethod'];
        $item->boxMethod = $param['boxMethod'];
        if(isset($param['fillDate']) && trim($param['fillDate']))
            $item->fillDate = $param['fillDate'];
        if(isset($param['devFillDate']) && trim($param['devFillDate']))
            $item->devFillDate = $param['devFillDate'];
        if(isset($param['auditDate']) && trim($param['auditDate']))
            $item->auditDate = $param['auditDate'];
        $item->created_at = date('Y-m-d H:i:s');
        $item->updated_at = date('Y-m-d H:i:s');
        $item->save();
    }

    public function updateSub5ByMainId($mainId, $param) {
        $item = $this->getSub5ByMainId($mainId);

        if(isset($param['serialNumber']) && trim($param['serialNumber']) != '')
            $item->serialNumber = $param['serialNumber'];
        if(isset($param['memo']) && trim($param['memo']) != '')
            $item->memo = $param['memo'];
        if(isset($param['orderNum']) && is_numeric($param['orderNum']))
            $item->orderNum = $param['orderNum'];
        if(isset($param['priceSubtotal']) && is_numeric($param['priceSubtotal']))
            $item->priceSubtotal = $param['priceSubtotal'];
        if(isset($param['flattenSubtotal']) && is_numeric($param['flattenSubtotal']))
            $item->flattenSubtotal = $param['flattenSubtotal'];
        if(isset($param['packageMethod']) && trim($param['packageMethod']) != '')
            $item->packageMethod = $param['packageMethod'];
        if(isset($param['boxMethod']) && trim($param['boxMethod']) != '')
            $item->boxMethod = $param['boxMethod'];
        if(isset($param['fillDate']) && trim($param['fillDate']))
            $item->fillDate = $param['fillDate'];
        if(isset($param['devFillDate']) && trim($param['devFillDate']))
            $item->devFillDate = $param['devFillDate'];
        if(isset($param['auditDate']) && trim($param['auditDate']))
            $item->auditDate = $param['auditDate'];
        $item->updated_at = date('Y-m-d H:i:s');

        $item->save();
    }

    public function getSub5_1ByMainId($mainId) {
        $item = QuoteSub5_1::where('mainId', '=', $mainId)
            ->first();
        if(isset($item->id) == false)
            throw new Exception('指定資料不存在');
        return $item;
    }

    public function createSub5_1($param) {
        $this->getMainById($param['mainId']);
        $sub = [];
        try {
            $sub = $this->getSub5_1ByMainId($param['mainId']);
        } catch(Exception $e) {
            //子資料不存在的例外，因符合本次需要，故跳過不處理
        }

        if(isset($sub->id) == true)
            throw new Exception('子資料已存在');

        $item = new QuoteSub5_1();
        $item->mainId = $param['mainId'];
        $item->serialNumber = $param['serialNumber'];
        $item->proccessName = $param["proccessName"];
        $item->firm = $param['firm'];
        $item->created_at = date('Y-m-d H:i:s');
        $item->updated_at = date('Y-m-d H:i:s');
        $item->save();
    }

    public function updateSub5_1ByMainId($mainId, $param) {
        $item = $this->getSub5_1ByMainId($mainId);

        if(isset($param['serialNumber']) && trim($param['serialNumber']) != '')
            $item->serialNumber = $param['serialNumber'];
        if(isset($param['proccessName']) && trim($param['proccessName']) != '')
            $item->proccessName = $param['proccessName'];
        if(isset($param['firm']) && trim($param['firm']) != '')
            $item->firm = $param['firm'];
        $item->updated_at = date('Y-m-d H:i:s');

        $item->save();
    }

    public function getSub6ByMainId($mainId) {
        $item = QuoteSub6::where('mainId', '=', $mainId)
            ->first();
        if(isset($item->id) == false)
            throw new Exception('指定資料不存在');
        return $item;
    }

    public function createSub6($param) {
        $this->getMainById($param['mainId']);
        $sub = [];
        try {
            $sub = $this->getSub6ByMainId($param['mainId']);
        } catch(Exception $e) {
            //子資料不存在的例外，因符合本次需要，故跳過不處理
        }

        if(isset($sub->id) == true)
            throw new Exception('子資料已存在');

        $item = new QuoteSub6();
        $item->mainId = $param['mainId'];
        $item->serialNumber = $param['serialNumber'];
        $item->processName = $param["processName"];
        $item->materialName = $param['materialName'];
        $item->processMemo = $param["processMemo"];
        $item->localNeedSec = $param["localNeedSec"];
        $item->usageAmount = $param["usageAmount"];
        $item->created_at = date('Y-m-d H:i:s');
        $item->updated_at = date('Y-m-d H:i:s');
        $item->save();
    }

    public function updateSub6ByMainId($mainId, $param) {
        $item = $this->getSub6ByMainId($mainId);

        if(isset($param['serialNumber']) && trim($param['serialNumber']) != '')
            $item->serialNumber = $param['serialNumber'];
        if(isset($param['processName']) && trim($param['processName']) != '')
            $item->processName = $param['processName'];
        if(isset($param['materialName']) && trim($param['materialName']) != '')
            $item->materialName = $param['materialName'];
        if(isset($param['processMemo']) && trim($param['processMemo']) != '')
            $item->processMemo = $param['processMemo'];
        if(isset($param['localNeedSec']) && is_numeric($param['localNeedSec']))
            $item->localNeedSec = $param['localNeedSec'];
        if(isset($param['usageAmount']) && is_numeric($param['usageAmount']))
            $item->usageAmount = $param['usageAmount'];
        $item->updated_at = date('Y-m-d H:i:s');

        $item->save();
    }

    public function getSub7ByMainId($mainId) {
        $item = QuoteSub7::where('mainId', '=', $mainId)
            ->first();
        if(isset($item->id) == false)
            throw new Exception('指定資料不存在');
        return $item;
    }

    public function createSub7($param) {
        $this->getMainById($param['mainId']);
        $sub = [];
        try {
            $sub = $this->getSub7ByMainId($param['mainId']);
        } catch(Exception $e) {
            //子資料不存在的例外，因符合本次需要，故跳過不處理
        }

        if(isset($sub->id) == true)
            throw new Exception('子資料已存在');

        $item = new QuoteSub7();
        $item->mainId = $param['mainId'];
        $item->serialNumber = $param['serialNumber'];
        $item->processName = $param["processName"];
        $item->materialName = $param['materialName'];
        $item->processMemo = $param["processMemo"];
        $item->localNeedSec = $param["localNeedSec"];
        $item->usageAmount = $param["usageAmount"];
        $item->localNeedNum = $param["localNeedNum"];
        $item->outProcessPrice = $param["outProcessPrice"];
        $item->created_at = date('Y-m-d H:i:s');
        $item->updated_at = date('Y-m-d H:i:s');
        $item->save();
    }

    public function updateSub7ByMainId($mainId, $param) {
        $item = $this->getSub7ByMainId($mainId);

        if(isset($param['serialNumber']) && trim($param['serialNumber']) != '')
            $item->serialNumber = $param['serialNumber'];
        if(isset($param['processName']) && trim($param['processName']) != '')
            $item->processName = $param['processName'];
        if(isset($param['materialName']) && trim($param['materialName']) != '')
            $item->materialName = $param['materialName'];
        if(isset($param['processMemo']) && trim($param['processMemo']) != '')
            $item->processMemo = $param['processMemo'];
        if(isset($param['localNeedSec']) && is_numeric($param['localNeedSec']))
            $item->localNeedSec = $param['localNeedSec'];
        if(isset($param['usageAmount']) && is_numeric($param['usageAmount']))
            $item->usageAmount = $param['usageAmount'];
        if(isset($param['localNeedNum']) && is_numeric($param['localNeedNum']))
            $item->localNeedNum = $param['localNeedNum'];
        if(isset($param['outProcessPrice']) && is_numeric($param['outProcessPrice']))
            $item->outProcessPrice = $param['outProcessPrice'];
        $item->updated_at = date('Y-m-d H:i:s');

        $item->save();
    }

    public function getSub7_1ByMainId($mainId) {
        $item = QuoteSub7_1::where('mainId', '=', $mainId)
            ->first();
        if(isset($item->id) == false)
            throw new Exception('指定資料不存在');
        return $item;
    }

    public function createSub7_1($param) {
        $this->getMainById($param['mainId']);
        $sub = [];
        try {
            $sub = $this->getSub7_1ByMainId($param['mainId']);
        } catch(Exception $e) {
            //子資料不存在的例外，因符合本次需要，故跳過不處理
        }

        if(isset($sub->id) == true)
            throw new Exception('子資料已存在');

        $item = new QuoteSub7_1();
        $item->mainId = $param['mainId'];
        $item->serialNumber = $param['serialNumber'];
        $item->outOrSelf = $param['outOrSelf'];
        $item->processName = $param["processName"];
        $item->materialName = $param['materialName'];
        $item->processMemo = $param["processMemo"];
        $item->localNeedSec = $param["localNeedSec"];
        $item->usageAmount = $param["usageAmount"];
        $item->outProcessPrice = $param["outProcessPrice"];
        $item->created_at = date('Y-m-d H:i:s');
        $item->updated_at = date('Y-m-d H:i:s');
        $item->save();
    }

    public function updateSub7_1ByMainId($mainId, $param) {
        $item = $this->getSub7_1ByMainId($mainId);

        if(isset($param['serialNumber']) && trim($param['serialNumber']) != '')
            $item->serialNumber = $param['serialNumber'];
        if(isset($param['outOrSelf']) && is_numeric($param['outOrSelf']))
            $item->outOrSelf = $param['outOrSelf'];
        if(isset($param['processName']) && trim($param['processName']) != '')
            $item->processName = $param['processName'];
        if(isset($param['materialName']) && trim($param['materialName']) != '')
            $item->materialName = $param['materialName'];
        if(isset($param['processMemo']) && trim($param['processMemo']) != '')
            $item->processMemo = $param['processMemo'];
        if(isset($param['localNeedSec']) && is_numeric($param['localNeedSec']))
            $item->localNeedSec = $param['localNeedSec'];
        if(isset($param['usageAmount']) && is_numeric($param['usageAmount']))
            $item->usageAmount = $param['usageAmount'];
        if(isset($param['outProcessPrice']) && is_numeric($param['outProcessPrice']))
            $item->outProcessPrice = $param['outProcessPrice'];
        $item->updated_at = date('Y-m-d H:i:s');

        $item->save();
    }

    public function getSub8ByMainId($mainId) {
        $item = QuoteSub8::where('mainId', '=', $mainId)
            ->first();
        if(isset($item->id) == false)
            throw new Exception('指定資料不存在');
        return $item;
    }

    public function createSub8($param) {
        $this->getMainById($param['mainId']);
        $sub = [];
        try {
            $sub = $this->getSub8ByMainId($param['mainId']);
        } catch(Exception $e) {
            //子資料不存在的例外，因符合本次需要，故跳過不處理
        }

        if(isset($sub->id) == true)
            throw new Exception('子資料已存在');

        $item = new QuoteSub8();
        $item->mainId = $param['mainId'];
        $item->sub1Price = $param['sub1Price'];
        $item->sub1SubTotal = $param["sub1SubTotal"];
        $item->sub2Price = $param['sub2Price'];
        $item->sub2SubTotal = $param["sub2SubTotal"];
        $item->sub3Price = $param['sub3Price'];
        $item->sub3SubTotal = $param["sub3SubTotal"];
        $item->sub3_1Price = $param['sub3_1Price'];
        $item->sub3_1SubTotal = $param["sub3_1SubTotal"];
        $item->sub4Price = $param['sub4Price'];
        $item->sub4SubTotal = $param["sub4SubTotal"];
        $item->sub5Price = $param['sub5Price'];
        $item->sub5SubTotal = $param["sub5SubTotal"];
        $item->sub6Price = $param['sub6Price'];
        $item->sub6SubTotal = $param["sub6SubTotal"];
        $item->sub7Price = $param['sub7Price'];
        $item->sub7SubTotal = $param["sub7SubTotal"];
        if(isset($param['purchaseName']) && trim($param['purchaseName']) != '')
            $item->purchaseName = $param["purchaseName"];
        if(isset($param['purchaseFillDate']) && trim($param['purchaseFillDate']) != '')
            $item->purchaseFillDate = $param["purchaseFillDate"];
        if(isset($param['reviewName']) && trim($param['reviewName']) != '')
            $item->reviewName = $param["reviewName"];
        if(isset($param['reviewFillDate']) && trim($param['reviewFillDate']) != '')
            $item->reviewFillDate = $param["reviewFillDate"];
        $item->created_at = date('Y-m-d H:i:s');
        $item->updated_at = date('Y-m-d H:i:s');
        $item->save();
    }

    public function updateSub8ByMainId($mainId, $param) {
        $item = $this->getSub8ByMainId($mainId);

        if(isset($param['sub1Price']) && is_numeric($param['sub1Price']))
            $item->sub1Price = $param['sub1Price'];
        if(isset($param['sub1SubTotal']) && is_numeric($param['sub1SubTotal']))
            $item->sub1SubTotal = $param["sub1SubTotal"];
        if(isset($param['sub2Price']) && is_numeric($param['sub2Price']))
            $item->sub2Price = $param['sub2Price'];
        if(isset($param['sub2SubTotal']) && is_numeric($param['sub2SubTotal']))
            $item->sub2SubTotal = $param["sub2SubTotal"];
        if(isset($param['sub3Price']) && is_numeric($param['sub3Price']))
            $item->sub3Price = $param['sub3Price'];
        if(isset($param['sub3SubTotal']) && is_numeric($param['sub3SubTotal']))
            $item->sub3SubTotal = $param["sub3SubTotal"];
        if(isset($param['sub3_1Price']) && is_numeric($param['sub3_1Price']))
            $item->sub3_1Price = $param['sub3_1Price'];
        if(isset($param['sub3_1SubTotal']) && is_numeric($param['sub3_1SubTotal']))
            $item->sub3_1SubTotal = $param["sub3_1SubTotal"];
        if(isset($param['sub4Price']) && is_numeric($param['sub4Price']))
            $item->sub4Price = $param['sub4Price'];
        if(isset($param['sub4SubTotal']) && is_numeric($param['sub4SubTotal']))
            $item->sub4SubTotal = $param["sub4SubTotal"];
        if(isset($param['sub5Price']) && is_numeric($param['sub5Price']))
            $item->sub5Price = $param['sub5Price'];
        if(isset($param['sub5SubTotal']) && is_numeric($param['sub5SubTotal']))
            $item->sub5SubTotal = $param["sub5SubTotal"];
        if(isset($param['sub6Price']) && is_numeric($param['sub6Price']))
            $item->sub6Price = $param['sub6Price'];
        if(isset($param['sub6SubTotal']) && is_numeric($param['sub6SubTotal']))
            $item->sub6SubTotal = $param["sub6SubTotal"];
        if(isset($param['sub7Price']) && is_numeric($param['sub7Price']))
            $item->sub7Price = $param['sub7Price'];
        if(isset($param['sub7SubTotal']) && is_numeric($param['sub7SubTotal']))
            $item->sub7SubTotal = $param["sub7SubTotal"];
        if(isset($param['purchaseName']) && trim($param['purchaseName']) != '')
            $item->purchaseName = $param["purchaseName"];
        if(isset($param['purchaseFillDate']) && trim($param['purchaseFillDate']) != '')
            $item->purchaseFillDate = $param["purchaseFillDate"];
        if(isset($param['reviewName']) && trim($param['reviewName']) != '')
            $item->reviewName = $param["reviewName"];
        if(isset($param['reviewFillDate']) && trim($param['reviewFillDate']) != '')
            $item->reviewFillDate = $param["reviewFillDate"];
        $item->updated_at = date('Y-m-d H:i:s');

        $item->save();
    }

    public function getSub9ByMainId($mainId) {
        $item = QuoteSub9::where('mainId', '=', $mainId)
            ->first();
        if(isset($item->id) == false)
            throw new Exception('指定資料不存在');
        return $item;
    }

    public function createSub9($param) {
        $this->getMainById($param['mainId']);
        $sub = [];
        try {
            $sub = $this->getSub9ByMainId($param['mainId']);
        } catch(Exception $e) {
            //子資料不存在的例外，因符合本次需要，故跳過不處理
        }

        if(isset($sub->id) == true)
            throw new Exception('子資料已存在');

        $item = new QuoteSub9();
        $item->mainId = $param['mainId'];
        $item->port = $param['port'];
        $item->formula = $param["formula"];
        $item->freight = $param['freight'];
        $item->created_at = date('Y-m-d H:i:s');
        $item->updated_at = date('Y-m-d H:i:s');
        $item->save();
    }

    public function updateSub9ByMainId($mainId, $param) {
        $item = $this->getSub9ByMainId($mainId);

        if(isset($param['port']) && is_numeric($param['port']))
            $item->port = $param['port'];
        if(isset($param['formula']) && is_numeric($param['formula']))
            $item->formula = $param["formula"];
        if(isset($param['freight']) && is_numeric($param['freight']))
            $item->freight = $param['freight'];
        $item->updated_at = date('Y-m-d H:i:s');

        $item->save();
    }

    public function getTotalByMainId($mainId) {
        $item = QuoteTotal::where('mainId', '=', $mainId)
            ->first();
        if(isset($item->id) == false)
            throw new Exception('指定資料不存在');
        return $item;
    }

    public function createTotal($param) {
        $this->getMainById($param['mainId']);
        $sub = [];
        try {
            $sub = $this->getTotalByMainId($param['mainId']);
        } catch(Exception $e) {
            //子資料不存在的例外，因符合本次需要，故跳過不處理
        }

        if(isset($sub->id) == true)
            throw new Exception('子資料已存在');

        $item = new QuoteTotal();
        $item->mainId = $param['mainId'];
        $item->costPrice = $param['costPrice'];
        $item->profit = $param["profit"];
        $item->exchangeRate = $param['exchangeRate'];
        $item->quotePrice = ($item->costPrice + $item->profit) * $item->exchangeRate;
        if(isset($param['reviewName']) && trim($param['reviewName']))
            $item->reviewName = $param['reviewName'];
        if(isset($param['reviewFillDate']) && trim($param['reviewFillDate']))
            $item->reviewFillDate = $param['reviewFillDate'];
        if(isset($param['reviewGeneralManager']) && trim($param['reviewGeneralManager']))
            $item->reviewGeneralManager = $param['reviewGeneralManager'];
        if(isset($param['reviewGeneralManagerFillDate']) && trim($param['reviewGeneralManagerFillDate']))
            $item->reviewGeneralManagerFillDate = $param['reviewGeneralManagerFillDate'];
        if(isset($param['reviewFinalGeneralManager']) && trim($param['reviewFinalGeneralManager']))
            $item->reviewFinalGeneralManager = $param['reviewFinalGeneralManager'];
        if(isset($param['reviewFinalGeneralManagerFillDate']) && trim($param['reviewFinalGeneralManagerFillDate']))
            $item->reviewFinalGeneralManagerFillDate = $param['reviewFinalGeneralManagerFillDate'];
        $item->created_at = date('Y-m-d H:i:s');
        $item->updated_at = date('Y-m-d H:i:s');
        $item->save();
    }

    public function updateTotalByMainId($mainId, $param) {
        $item = $this->getTotalByMainId($mainId);

        if(isset($param['costPrice']) && is_numeric($param['costPrice']))
            $item->costPrice = $param['costPrice'];
        if(isset($param['profit']) && is_numeric($param['profit']))
            $item->profit = $param["profit"];
        if(isset($param['exchangeRate']) && is_double($param['exchangeRate']))
            $item->exchangeRate = $param['exchangeRate'];
        $item->quotePrice = ($item->costPrice + $item->profit) * $item->exchangeRate;
        if(isset($param['reviewName']) && trim($param['reviewName']))
            $item->reviewName = $param['reviewName'];
        if(isset($param['reviewFillDate']) && trim($param['reviewFillDate']))
            $item->reviewFillDate = $param['reviewFillDate'];
        if(isset($param['reviewGeneralManager']) && trim($param['reviewGeneralManager']))
            $item->reviewGeneralManager = $param['reviewGeneralManager'];
        if(isset($param['reviewGeneralManagerFillDate']) && trim($param['reviewGeneralManagerFillDate']))
            $item->reviewGeneralManagerFillDate = $param['reviewGeneralManagerFillDate'];
        if(isset($param['reviewFinalGeneralManager']) && trim($param['reviewFinalGeneralManager']))
            $item->reviewFinalGeneralManager = $param['reviewFinalGeneralManager'];
        if(isset($param['reviewFinalGeneralManagerFillDate']) && trim($param['reviewFinalGeneralManagerFillDate']))
            $item->reviewFinalGeneralManagerFillDate = $param['reviewFinalGeneralManagerFillDate'];
        $item->updated_at = date('Y-m-d H:i:s');

        $item->save();
    }
}
