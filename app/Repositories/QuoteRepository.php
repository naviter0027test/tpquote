<?php

namespace App\Repositories;

use App\Models\QuoteMain;
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
}
