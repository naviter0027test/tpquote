<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\QuoteSub7_1;

class QuoteSub7_1Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $quoteSub7_1at1 = new QuoteSub7_1();
        $quoteSub7_1at1->mainId = 1;
        $quoteSub7_1at1->serialNumber = "SLN-20221200001";
        $quoteSub7_1at1->outOrSelf = 1;
        $quoteSub7_1at1->processName = "鞋底板";
        $quoteSub7_1at1->materialName = "膠磁";
        $quoteSub7_1at1->processMemo = "";
        $quoteSub7_1at1->localNeedSec = 25;
        $quoteSub7_1at1->usageAmount = 400;
        $quoteSub7_1at1->outProcessPrice = 3570;
        $quoteSub7_1at1->save();
    }
}
