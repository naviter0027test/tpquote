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
        $member->id = 1;
        $member->account = 'account1';
        $member->pass = md5('123456');
        $member->userName = '採購人員1';
        $member->memPermissionId = 1;
        $member->save();

        $member = new Member();
        $member->id = 2;
        $member->account = 'account2';
        $member->pass = md5('123456');
        $member->userName = '採購人員2';
        $member->memPermissionId = 1;
        $member->save();

        $member = new Member();
        $member->id = 3;
        $member->account = 'account3';
        $member->pass = md5('123456');
        $member->userName = '採購人員3';
        $member->memPermissionId = 1;
        $member->save();

        $member = new Member();
        $member->id = 4;
        $member->account = 'account4';
        $member->pass = md5('123456');
        $member->userName = '採購人員4';
        $member->memPermissionId = 1;
        $member->save();

        $member = new Member();
        $member->id = 5;
        $member->account = 'account5';
        $member->pass = md5('123456');
        $member->userName = '採購主管';
        $member->memPermissionId = 2;
        $member->save();

        $member = new Member();
        $member->id = 6;
        $member->account = 'account6';
        $member->pass = md5('123456');
        $member->userName = '台北開發1';
        $member->memPermissionId = 3;
        $member->save();

        $member = new Member();
        $member->id = 7;
        $member->account = 'account7';
        $member->pass = md5('123456');
        $member->userName = '台北開發2';
        $member->memPermissionId = 3;
        $member->save();

        $member = new Member();
        $member->id = 8;
        $member->account = 'account8';
        $member->pass = md5('123456');
        $member->userName = '台北開發3';
        $member->memPermissionId = 3;
        $member->save();

        $member = new Member();
        $member->id = 9;
        $member->account = 'account9';
        $member->pass = md5('123456');
        $member->userName = '台北開發4';
        $member->memPermissionId = 3;
        $member->save();

        $member = new Member();
        $member->id = 10;
        $member->account = 'account10';
        $member->pass = md5('123456');
        $member->userName = '台北開發5';
        $member->memPermissionId = 3;
        $member->save();

        $member = new Member();
        $member->id = 11;
        $member->account = 'account11';
        $member->pass = md5('123456');
        $member->userName = '總經理';
        $member->memPermissionId = 4;
        $member->save();

        $member = new Member();
        $member->id = 12;
        $member->account = 'account12';
        $member->pass = md5('123456');
        $member->userName = '業務1';
        $member->memPermissionId = 4;
        $member->save();

        $member = new Member();
        $member->id = 13;
        $member->account = 'account13';
        $member->pass = md5('123456');
        $member->userName = '業務2';
        $member->memPermissionId = 4;
        $member->save();

        $member = new Member();
        $member->id = 14;
        $member->account = 'account14';
        $member->pass = md5('123456');
        $member->userName = '業務3';
        $member->memPermissionId = 4;
        $member->save();

        $member = new Member();
        $member->id = 15;
        $member->account = 'account15';
        $member->pass = md5('123456');
        $member->userName = '業務4';
        $member->memPermissionId = 4;
        $member->save();

        $member = new Member();
        $member->id = 16;
        $member->account = 'account16';
        $member->pass = md5('123456');
        $member->userName = '業務5';
        $member->memPermissionId = 4;
        $member->save();

        $member = new Member();
        $member->id = 17;
        $member->account = 'account17';
        $member->pass = md5('123456');
        $member->userName = '工廠成本會計';
        $member->memPermissionId = 5;
        $member->save();

        $member = new Member();
        $member->id = 18;
        $member->account = 'account18';
        $member->pass = md5('123456');
        $member->userName = '財務主管';
        $member->memPermissionId = 6;
        $member->save();

        $member = new Member();
        $member->id = 19;
        $member->account = 'account19';
        $member->pass = md5('123456');
        $member->userName = '管理員';
        $member->memPermissionId = 7;
        $member->save();

        $member = new Member();
        $member->id = 20;
        $member->account = 'account20';
        $member->pass = md5('123456');
        $member->userName = '測試員1';
        $member->memPermissionId = 1;
        $member->save();

        $member = new Member();
        $member->id = 21;
        $member->account = 'account21';
        $member->pass = md5('123456');
        $member->userName = '測試員2';
        $member->memPermissionId = 2;
        $member->save();
    }
}

