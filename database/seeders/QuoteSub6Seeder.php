<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\QuoteSub6;

class QuoteSub6Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $quoteSub6at1 = new QuoteSub6();
        $quoteSub6at1->mainId = 1;
        $quoteSub6at1->serialNumber = "SLN-20221200001";
        $quoteSub6at1->processName = "鞋底板";
        $quoteSub6at1->materialName = "彩盒";
        $quoteSub6at1->processMemo = "";
        $quoteSub6at1->localNeedSec = 25;
        $quoteSub6at1->usageAmount = 400;
        $quoteSub6at1->save();
    }
}
