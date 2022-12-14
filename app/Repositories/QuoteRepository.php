<?php

namespace App\Repositories;

use App\Models\QuoteMain;
use App\Models\QuoteSub1;
use Illuminate\Database\Eloquent\Model;
use Exception;

class QuoteRepository
{
    public function __construct() {
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
        return $items;
    }

    public function listsMainAmount($param) {
        $query = QuoteMain::orderBy('id', 'desc');

        $amount = $query->count();
        return $amount;
    }

    public function createMain($param) {
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
    }

    public function updateMainById($id, $param) {
        $item = QuoteMain::where('id', '=', $id)
            ->first();
        if(isset($item->id) == false)
            throw new Exception('指定資料不存在');

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
}
