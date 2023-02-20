<?php

namespace App\Repositories;

use App\Models\QuoteMain;
use App\Models\QuoteSub1;
use App\Models\QuoteSub1_1;
use App\Models\QuoteSub2;
use App\Models\QuoteSub2_1;
use App\Models\QuoteSub3;
use App\Models\QuoteSub3_1;
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
        $item->infoImg = $param['infoImg'];
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
}
