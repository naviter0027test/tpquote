<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\QuoteSub7;

class QuoteSub7Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $quoteSub7at1 = new QuoteSub7();
        $quoteSub7at1->mainId = 1;
        $quoteSub7at1->serialNumber = "SLN-20221200001";
        $quoteSub7at1->processName = "鞋底板";
        $quoteSub7at1->materialName = "彩盒";
        $quoteSub7at1->processMemo = "";
        $quoteSub7at1->localNeedSec = 25;
        $quoteSub7at1->usageAmount = 400;
        $quoteSub7at1->localNeedNum = 35;
        $quoteSub7at1->outProcessPrice = 3570;
        $quoteSub7at1->save();

    }
}
