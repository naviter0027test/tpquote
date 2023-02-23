<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\QuoteSub4;

class QuoteSub4Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $quoteSub4at1 = new QuoteSub4();
        $quoteSub4at1->mainId = 1;
        $quoteSub4at1->serialNumber = "SLN-20221200001";
        $quoteSub4at1->partNo = "SUB1-20221200001";
        $quoteSub4at1->materialName = "POF膜";
        $quoteSub4at1->length = 380;
        $quoteSub4at1->width = 120;
        $quoteSub4at1->height = 25;
        $quoteSub4at1->origin = "國產";
        $quoteSub4at1->thickness = 0.019;
        $quoteSub4at1->usageAmount = 35;
        $quoteSub4at1->loss = 5;
        $quoteSub4at1->price = 600;
        $quoteSub4at1->memo = "";
        $quoteSub4at1->save();
    }
}
