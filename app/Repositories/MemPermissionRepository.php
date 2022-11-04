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
        return $items;
    }
}
