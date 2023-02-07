<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\QuoteSub2_1;

class QuoteSub2_1Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $quoteSub2_2at1 = new QuoteSub2_1();
        $quoteSub2_2at1->mainId = 1;
        $quoteSub2_2at1->serialNumber = "SLN-20221200001";
        $quoteSub2_2at1->partNo = "SUB1-20221200001";
        $quoteSub2_2at1->materialName = "面紙";
        $quoteSub2_2at1->length = 420;
        $quoteSub2_2at1->width = 120;
        $quoteSub2_2at1->height = 25;
        $quoteSub2_2at1->usageAmount = 90;
        $quoteSub2_2at1->paperThickness = "50G";
        $quoteSub2_2at1->paperMaterial = "雙銅";
        $quoteSub2_2at1->printMethod = "單面印刷";
        $quoteSub2_2at1->craftMethod = "裱E瓦楞";
        $quoteSub2_2at1->coatingMethod = "上UV";
        $quoteSub2_2at1->memo = "";
        $quoteSub2_2at1->infoImg = "";
        $quoteSub2_2at1->save();
    }
}
