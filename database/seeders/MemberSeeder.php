<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Member;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $member = new Member();
        $member->account = 'account1';
        $member->pass = md5('123456');
        $member->userName = '採購人員1';
        $member->memPermissionId = 1;
        $member->save();

        $member = new Member();
        $member->account = 'account2';
        $member->pass = md5('123456');
        $member->userName = '採購人員2';
        $member->memPermissionId = 1;
        $member->save();

        $member = new Member();
        $member->account = 'account3';
        $member->pass = md5('123456');
        $member->userName = '採購人員3';
        $member->memPermissionId = 1;
        $member->save();

        $member = new Member();
        $member->account = 'account4';
        $member->pass = md5('123456');
        $member->userName = '採購人員4';
        $member->memPermissionId = 1;
        $member->save();

        $member = new Member();
        $member->account = 'account5';
        $member->pass = md5('123456');
        $member->userName = '採購主管';
        $member->memPermissionId = 2;
        $member->save();
    }
}

