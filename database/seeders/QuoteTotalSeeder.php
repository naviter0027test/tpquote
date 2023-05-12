<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\QuoteSub8;
use App\Models\QuoteSub9;
use App\Models\QuoteTotal;

class QuoteTotalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $quoteSub8at1 = QuoteSub8::where('mainId', '=', 1)->first();
        $quoteSub9at1 = QuoteSub9::where('mainId', '=', 1)->first();
        $sub8at1 = json_decode(json_encode($quoteSub8at1), true);
        $quoteTotalat1 = new QuoteTotal();
        $quoteTotalat1->mainId = 1;
        $quoteTotalat1->costPrice = 0;
        for($i = 1;$i < 8;++$i)
            $quoteTotalat1->costPrice += $sub8at1["sub$i". "SubTotal"];
        $quoteTotalat1->costPrice += $quoteSub9at1->freight;
        $quoteTotalat1->profit = 15000;
        $quoteTotalat1->exchangeRate = 1.5;
        $quoteTotalat1->quotePrice = ($quoteTotalat1->costPrice + $quoteTotalat1->profit = 15000) * $quoteTotalat1->exchangeRate;
        $quoteTotalat1->reviewName = "唐憲中";
        $quoteTotalat1->reviewFillDate = "2023-02-05 00:00:00";
        $quoteTotalat1->reviewGeneralManager = "趙山春";
        $quoteTotalat1->reviewGeneralManagerFillDate = "2023-02-06 00:00:00";
        $quoteTotalat1->reviewFinalGeneralManager = "趙山春";
        $quoteTotalat1->reviewFinalGeneralManagerFillDate = "2023-02-07 00:00:00";
        $quoteTotalat1->save();
    }
}
