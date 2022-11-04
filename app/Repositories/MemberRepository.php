<?php

namespace App\Repositories;

use App\Models\MemPermission;
use App\Models\Member;
use Illuminate\Database\Eloquent\Model;
use Exception;

class MemberRepository
{
    public function __construct() {
    }

    public function getById($id) {
        $item = Member::leftJoin('MemPermission', 'MemPermission.id', '=', 'Member.memPermissionId')
            ->where('Member.id', '=', $id)
            ->select([
                'Member.id',
                'Member.account',
                'Member.userName',
                'MemPermission.name as permissionName',
                'MemPermission.quoteSub_1',
                'MemPermission.quoteSub_2',
                'MemPermission.quoteSub_3',
                'MemPermission.quoteSub_4',
                'MemPermission.quoteSub_5',
                'MemPermission.quoteSub_6',
                'MemPermission.quoteSub_7',
                'MemPermission.quoteSub_8',
                'MemPermission.quoteSub_9',
                'MemPermission.quoteSub_10',
                'MemPermission.member',
            ])
            ->first();
        if(isset($item->id) == false)
            throw new Exception('指定資料不存在');
        return $item;
    }

    public function checkByAccount($account) {
        $item = Member::leftJoin('MemPermission', 'MemPermission.id', '=', 'Member.memPermissionId')
            ->where('Member.account', '=', $account)
            ->select([
                'Member.id',
            ])
            ->first();
        if(isset($item->id) == false)
            return false;
        return true;
    }

    public function checkLogin($param) {
        $item = Member::where('account', '=', $param['account'])
            ->where('pass', '=', md5(trim($param['pass'])) )
            ->first();
        if(isset($item->id) == false)
            return false;
        return $item;
    }

    public function create($param) {
        if($this->checkByAccount($param['account']) == true)
            throw new Exception('帳號重複');
        if(trim($param['account']) == '')
            throw new Exception('帳號不得為空');
        $member = new Member();
        $member->account = trim($param['account']);
        $member->pass = md5(trim($param['pass']));
        $member->userName = $param['userName'];
        $member->memPermissionId = $param['memPermissionId'];
        $member->save();
    }
}
