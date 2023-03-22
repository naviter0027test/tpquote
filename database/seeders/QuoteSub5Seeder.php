<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\QuoteSub5;

class QuoteSub5Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $quoteSub5at1 = new QuoteSub5();
        $quoteSub5at1->mainId = 1;
        $quoteSub5at1->serialNumber = "SLN-20221200001";
        $quoteSub5at1->memo = "";
        $quoteSub5at1->orderNum = 53;
        $quoteSub5at1->priceSubtotal = 120;
        $quoteSub5at1->flattenSubtotal = 25;
        $quoteSub5at1->packageMethod = "展示盒";
        $quoteSub5at1->boxMethod = "展示盒";
        $quoteSub5at1->fillDate = "2023-03-01 12:00:00";
        $quoteSub5at1->devFillDate = "2023-03-01 12:00:00";
        $quoteSub5at1->auditDate = "2023-03-01 12:00:00";
        $quoteSub5at1->save();
    }
}
