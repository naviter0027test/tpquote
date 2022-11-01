<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('MemPermission')->insert([
            'id' => 1,
            'name' => '採購部',
            'quoteSub_1' => 1,
            'quoteSub_2' => 1,
            'quoteSub_3' => 1,
            'quoteSub_4' => 2,
            'quoteSub_5' => 0,
            'quoteSub_6' => 0,
            'quoteSub_7' => 0,
            'quoteSub_8' => 0,
            'quoteSub_9' => 0,
            'quoteSub_10' => 0,
        ]);
        DB::table('MemPermission')->insert([
            'id' => 2,
            'name' => '採購主管',
            'quoteSub_1' => 1,
            'quoteSub_2' => 1,
            'quoteSub_3' => 1,
            'quoteSub_4' => 2,
            'quoteSub_5' => 0,
            'quoteSub_6' => 0,
            'quoteSub_7' => 0,
            'quoteSub_8' => 0,
            'quoteSub_9' => 0,
            'quoteSub_10' => 1,
        ]);
        DB::table('MemPermission')->insert([
            'id' => 3,
            'name' => '台北開發',
            'quoteSub_1' => 2,
            'quoteSub_2' => 2,
            'quoteSub_3' => 2,
            'quoteSub_4' => 2,
            'quoteSub_5' => 2,
            'quoteSub_6' => 0,
            'quoteSub_7' => 0,
            'quoteSub_8' => 1,
            'quoteSub_9' => 0,
            'quoteSub_10' => 1,
        ]);
        DB::table('MemPermission')->insert([
            'id' => 4,
            'name' => '總經理/業務',
            'quoteSub_1' => 2,
            'quoteSub_2' => 2,
            'quoteSub_3' => 2,
            'quoteSub_4' => 2,
            'quoteSub_5' => 2,
            'quoteSub_6' => 2,
            'quoteSub_7' => 2,
            'quoteSub_8' => 2,
            'quoteSub_9' => 0,
            'quoteSub_10' => 2,
        ]);
        DB::table('MemPermission')->insert([
            'id' => 5,
            'name' => '工業成本會計',
            'quoteSub_1' => 1,
            'quoteSub_2' => 1,
            'quoteSub_3' => 1,
            'quoteSub_4' => 1,
            'quoteSub_5' => 1,
            'quoteSub_6' => 1,
            'quoteSub_7' => 1,
            'quoteSub_8' => 2,
            'quoteSub_9' => 0,
            'quoteSub_10' => 0,
        ]);
        DB::table('MemPermission')->insert([
            'id' => 6,
            'name' => '財務主管',
            'quoteSub_1' => 1,
            'quoteSub_2' => 1,
            'quoteSub_3' => 1,
            'quoteSub_4' => 1,
            'quoteSub_5' => 1,
            'quoteSub_6' => 1,
            'quoteSub_7' => 1,
            'quoteSub_8' => 1,
            'quoteSub_9' => 0,
            'quoteSub_10' => 1,
        ]);
        DB::table('MemPermission')->insert([
            'id' => 7,
            'name' => '系統管理者',
            'quoteSub_1' => 2,
            'quoteSub_2' => 2,
            'quoteSub_3' => 2,
            'quoteSub_4' => 2,
            'quoteSub_5' => 2,
            'quoteSub_6' => 2,
            'quoteSub_7' => 2,
            'quoteSub_8' => 2,
            'quoteSub_9' => 2,
            'quoteSub_10' => 2,
        ]);
    }
}
