<?php

namespace App\Repositories;

use App\Models\MemPermission;
use Illuminate\Database\Eloquent\Model;
use Exception;

class MemPermissionRepository
{
    public function __construct() {
    }

    public function getById($id) {
        $item = MemPermission::where('id', $id)->first();
        if(isset($item->id) == false)
            throw new Exception('指定資料不存在');
        return $item;
    }

    public function getAll() {
        $items = MemPermission::orderBy('id', 'asc')
            ->get();
        foreach($items as $i => $item) {
            for($j = 1;$j <= 10;++$j) {
                switch($item->{'quoteSub_'. $j}) {
                    case 0:
                        $items[$i]->{'quoteSub_'.$j.'_Show'} = '無';
                        break;
                    case 1:
                        $items[$i]->{'quoteSub_'.$j.'_Show'} = '查看';
                        break;
                    case 2:
                        $items[$i]->{'quoteSub_'.$j.'_Show'} = '編輯';
                        break;
                }
            }
            switch($item->{'member'}) {
                case 0:
                    $items[$i]->{'memberShow'} = '無';
                    break;
                case 1:
                    $items[$i]->{'memberShow'} = '查看';
                    break;
                case 2:
                    $items[$i]->{'memberShow'} = '編輯';
                    break;
            }
        }
        return $items;
    }
}
