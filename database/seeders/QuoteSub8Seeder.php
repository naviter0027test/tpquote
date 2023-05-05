<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\QuoteSub8;

class QuoteSub8Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $quoteSub8at1 = new QuoteSub8();
        $quoteSub8at1->mainId = 1;
        $quoteSub8at1->sub1Price = 12800;
        $quoteSub8at1->sub1SubTotal = 12800;
        $quoteSub8at1->sub2Price = 7800;
        $quoteSub8at1->sub2SubTotal = 15600;
        $quoteSub8at1->sub3Price = 4580;
        $quoteSub8at1->sub3SubTotal = 4580;
        $quoteSub8at1->sub3_1Price = 3000;
        $quoteSub8at1->sub3_1SubTotal = 9000;
        $quoteSub8at1->sub4Price = 4500;
        $quoteSub8at1->sub4SubTotal = 13500;
        $quoteSub8at1->sub5Price = 5100;
        $quoteSub8at1->sub5SubTotal = 15300;
        $quoteSub8at1->sub6Price = 4500;
        $quoteSub8at1->sub6SubTotal = 13500;
        $quoteSub8at1->sub7Price = 5100;
        $quoteSub8at1->sub7SubTotal = 15300;
        $quoteSub8at1->purchaseName = "莊鴻瑜";
        $quoteSub8at1->purchaseFillDate = "2023-02-01 00:00:00";
        $quoteSub8at1->reviewName = "唐憲中";
        $quoteSub8at1->reviewFillDate = "2023-02-02 00:00:00";
        $quoteSub8at1->save();
    }
}
