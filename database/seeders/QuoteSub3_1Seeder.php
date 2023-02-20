<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\QuoteSub3_1;

class QuoteSub3_1Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $quoteSub3_1at1 = new QuoteSub3_1();
        $quoteSub3_1at1->mainId = 1;
        $quoteSub3_1at1->serialNumber = "SLN-20221200001";
        $quoteSub3_1at1->name = "滾漆";
        $quoteSub3_1at1->painted = "二底一面";
        $quoteSub3_1at1->subtotal = 1500;
        $quoteSub3_1at1->memo = "";
        $quoteSub3_1at1->save();
    }
}
