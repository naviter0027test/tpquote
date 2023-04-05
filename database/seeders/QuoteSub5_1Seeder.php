<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\QuoteSub5_1;

class QuoteSub5_1Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $quoteSub5_1at1 = new QuoteSub5_1();
        $quoteSub5_1at1->mainId = 1;
        $quoteSub5_1at1->serialNumber = "SLN-20221200001";
        $quoteSub5_1at1->proccessName = "鞋底板";
        $quoteSub5_1at1->firm = "自製";
        $quoteSub5_1at1->save();
    }
}
