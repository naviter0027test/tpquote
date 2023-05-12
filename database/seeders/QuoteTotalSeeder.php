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
        $quoteTotalat1->quotePrice = ($quoteTotalat1->costPrice + $quoteTotalat1->profit) * $quoteTotalat1->exchangeRate;
        $quoteTotalat1->reviewName = "唐憲中";
        $quoteTotalat1->reviewFillDate = "2023-02-05 00:00:00";
        $quoteTotalat1->reviewGeneralManager = "趙山春";
        $quoteTotalat1->reviewGeneralManagerFillDate = "2023-02-06 00:00:00";
        $quoteTotalat1->reviewFinalGeneralManager = "趙山春";
        $quoteTotalat1->reviewFinalGeneralManagerFillDate = "2023-02-07 00:00:00";
        $quoteTotalat1->save();

        $quoteSub8at2 = QuoteSub8::where('mainId', '=', 2)->first();
        $quoteSub9at2 = QuoteSub9::where('mainId', '=', 2)->first();
        $sub8at2 = json_decode(json_encode($quoteSub8at2), true);
        $quoteTotalat2 = new QuoteTotal();
        $quoteTotalat2->mainId = 2;
        $quoteTotalat2->costPrice = 0;
        for($i = 1;$i < 8;++$i)
            $quoteTotalat2->costPrice += $sub8at2["sub$i". "SubTotal"];
        $quoteTotalat2->costPrice += $quoteSub9at2->freight;
        $quoteTotalat2->profit = 24000;
        $quoteTotalat2->exchangeRate = 1.8;
        $quoteTotalat2->quotePrice = ($quoteTotalat2->costPrice + $quoteTotalat2->profit) * $quoteTotalat2->exchangeRate;
        $quoteTotalat2->reviewName = "莊炳中";
        $quoteTotalat2->reviewFillDate = "2023-02-05 00:00:00";
        $quoteTotalat2->reviewGeneralManager = "胡雪艷";
        $quoteTotalat2->reviewGeneralManagerFillDate = "2023-02-06 00:00:00";
        $quoteTotalat2->reviewFinalGeneralManager = "胡雪艷";
        $quoteTotalat2->reviewFinalGeneralManagerFillDate = "2023-02-07 00:00:00";
        $quoteTotalat2->save();

        $quoteSub8at3 = QuoteSub8::where('mainId', '=', 3)->first();
        $quoteSub9at3 = QuoteSub9::where('mainId', '=', 3)->first();
        $sub8at3 = json_decode(json_encode($quoteSub8at3), true);
        $quoteTotalat3 = new QuoteTotal();
        $quoteTotalat3->mainId = 3;
        $quoteTotalat3->costPrice = 0;
        for($i = 1;$i < 8;++$i)
            $quoteTotalat3->costPrice += $sub8at3["sub$i". "SubTotal"];
        $quoteTotalat3->costPrice += $quoteSub9at3->freight;
        $quoteTotalat3->profit = 24000;
        $quoteTotalat3->exchangeRate = 1.8;
        $quoteTotalat3->quotePrice = ($quoteTotalat3->costPrice + $quoteTotalat3->profit) * $quoteTotalat3->exchangeRate;
        $quoteTotalat3->reviewName = "楊德語";
        $quoteTotalat3->reviewFillDate = "2023-02-05 00:00:00";
        $quoteTotalat3->reviewGeneralManager = "黃紹君";
        $quoteTotalat3->reviewGeneralManagerFillDate = "2023-02-06 00:00:00";
        $quoteTotalat3->reviewFinalGeneralManager = "黃紹君";
        $quoteTotalat3->reviewFinalGeneralManagerFillDate = "2023-02-07 00:00:00";
        $quoteTotalat3->save();

        $quoteSub8at4 = QuoteSub8::where('mainId', '=', 4)->first();
        $quoteSub9at4 = QuoteSub9::where('mainId', '=', 4)->first();
        $sub8at4 = json_decode(json_encode($quoteSub8at4), true);
        $quoteTotalat4 = new QuoteTotal();
        $quoteTotalat4->mainId = 4;
        $quoteTotalat4->costPrice = 0;
        for($i = 1;$i < 8;++$i)
            $quoteTotalat4->costPrice += $sub8at4["sub$i". "SubTotal"];
        $quoteTotalat4->costPrice += $quoteSub9at4->freight;
        $quoteTotalat4->profit = 26000;
        $quoteTotalat4->exchangeRate = 2.0;
        $quoteTotalat4->quotePrice = ($quoteTotalat4->costPrice + $quoteTotalat4->profit) * $quoteTotalat4->exchangeRate;
        $quoteTotalat4->reviewName = "韓趙長";
        $quoteTotalat4->reviewFillDate = "2023-02-07 00:00:00";
        $quoteTotalat4->reviewGeneralManager = "唐文雲";
        $quoteTotalat4->reviewGeneralManagerFillDate = "2023-02-09 00:00:00";
        $quoteTotalat4->reviewFinalGeneralManager = "唐文雲";
        $quoteTotalat4->reviewFinalGeneralManagerFillDate = "2023-02-09 00:00:00";
        $quoteTotalat4->save();

        $quoteSub8at5 = QuoteSub8::where('mainId', '=', 5)->first();
        $quoteSub9at5 = QuoteSub9::where('mainId', '=', 5)->first();
        $sub8at5 = json_decode(json_encode($quoteSub8at5), true);
        $quoteTotalat5 = new QuoteTotal();
        $quoteTotalat5->mainId = 5;
        $quoteTotalat5->costPrice = 0;
        for($i = 1;$i < 8;++$i)
            $quoteTotalat5->costPrice += $sub8at5["sub$i". "SubTotal"];
        $quoteTotalat5->costPrice += $quoteSub9at5->freight;
        $quoteTotalat5->profit = 17000;
        $quoteTotalat5->exchangeRate = 1.3;
        $quoteTotalat5->quotePrice = ($quoteTotalat5->costPrice + $quoteTotalat5->profit) * $quoteTotalat5->exchangeRate;
        $quoteTotalat5->reviewName = "張雨行";
        $quoteTotalat5->reviewFillDate = "2023-02-10 00:00:00";
        $quoteTotalat5->reviewGeneralManager = "湯明月";
        $quoteTotalat5->reviewGeneralManagerFillDate = "2023-02-11 00:00:00";
        $quoteTotalat5->reviewFinalGeneralManager = "湯明月";
        $quoteTotalat5->reviewFinalGeneralManagerFillDate = "2023-02-11 00:00:00";
        $quoteTotalat5->save();

        $quoteSub8at6 = QuoteSub8::where('mainId', '=', 6)->first();
        $quoteSub9at6 = QuoteSub9::where('mainId', '=', 6)->first();
        $sub8at6 = json_decode(json_encode($quoteSub8at6), true);
        $quoteTotalat6 = new QuoteTotal();
        $quoteTotalat6->mainId = 6;
        $quoteTotalat6->costPrice = 0;
        for($i = 1;$i < 8;++$i)
            $quoteTotalat6->costPrice += $sub8at6["sub$i". "SubTotal"];
        $quoteTotalat6->costPrice += $quoteSub9at6->freight;
        $quoteTotalat6->profit = 14000;
        $quoteTotalat6->exchangeRate = 1.4;
        $quoteTotalat6->quotePrice = ($quoteTotalat6->costPrice + $quoteTotalat6->profit) * $quoteTotalat6->exchangeRate;
        $quoteTotalat6->reviewName = "張雨行";
        $quoteTotalat6->reviewFillDate = "2023-02-12 00:00:00";
        $quoteTotalat6->reviewGeneralManager = "湯明月";
        $quoteTotalat6->reviewGeneralManagerFillDate = "2023-02-13 00:00:00";
        $quoteTotalat6->reviewFinalGeneralManager = "湯明月";
        $quoteTotalat6->reviewFinalGeneralManagerFillDate = "2023-02-13 00:00:00";
        $quoteTotalat6->save();

        $quoteSub8at7 = QuoteSub8::where('mainId', '=', 7)->first();
        $quoteSub9at7 = QuoteSub9::where('mainId', '=', 7)->first();
        $sub8at7 = json_decode(json_encode($quoteSub8at7), true);
        $quoteTotalat7 = new QuoteTotal();
        $quoteTotalat7->mainId = 7;
        $quoteTotalat7->costPrice = 0;
        for($i = 1;$i < 8;++$i)
            $quoteTotalat7->costPrice += $sub8at7["sub$i". "SubTotal"];
        $quoteTotalat7->costPrice += $quoteSub9at7->freight;
        $quoteTotalat7->profit = 14000;
        $quoteTotalat7->exchangeRate = 1.4;
        $quoteTotalat7->quotePrice = ($quoteTotalat7->costPrice + $quoteTotalat7->profit) * $quoteTotalat7->exchangeRate;
        $quoteTotalat7->reviewName = "張雨行";
        $quoteTotalat7->reviewFillDate = "2023-02-14 00:00:00";
        $quoteTotalat7->reviewGeneralManager = "湯明月";
        $quoteTotalat7->reviewGeneralManagerFillDate = "2023-02-16 00:00:00";
        $quoteTotalat7->reviewFinalGeneralManager = "湯明月";
        $quoteTotalat7->reviewFinalGeneralManagerFillDate = "2023-02-16 00:00:00";
        $quoteTotalat7->save();

        $quoteSub8at8 = QuoteSub8::where('mainId', '=', 8)->first();
        $quoteSub9at8 = QuoteSub9::where('mainId', '=', 8)->first();
        $sub8at8 = json_decode(json_encode($quoteSub8at8), true);
        $quoteTotalat8 = new QuoteTotal();
        $quoteTotalat8->mainId = 8;
        $quoteTotalat8->costPrice = 0;
        for($i = 1;$i < 8;++$i)
            $quoteTotalat8->costPrice += $sub8at8["sub$i". "SubTotal"];
        $quoteTotalat8->costPrice += $quoteSub9at8->freight;
        $quoteTotalat8->profit = 11000;
        $quoteTotalat8->exchangeRate = 1.8;
        $quoteTotalat8->quotePrice = ($quoteTotalat8->costPrice + $quoteTotalat8->profit) * $quoteTotalat8->exchangeRate;
        $quoteTotalat8->reviewName = "張雨行";
        $quoteTotalat8->reviewFillDate = "2023-02-16 00:00:00";
        $quoteTotalat8->reviewGeneralManager = "湯明月";
        $quoteTotalat8->reviewGeneralManagerFillDate = "2023-02-17 00:00:00";
        $quoteTotalat8->reviewFinalGeneralManager = "湯明月";
        $quoteTotalat8->reviewFinalGeneralManagerFillDate = "2023-02-17 00:00:00";
        $quoteTotalat8->save();

        $quoteSub8at9 = QuoteSub8::where('mainId', '=', 9)->first();
        $quoteSub9at9 = QuoteSub9::where('mainId', '=', 9)->first();
        $sub8at9 = json_decode(json_encode($quoteSub8at9), true);
        $quoteTotalat9 = new QuoteTotal();
        $quoteTotalat9->mainId = 9;
        $quoteTotalat9->costPrice = 0;
        for($i = 1;$i < 8;++$i)
            $quoteTotalat9->costPrice += $sub8at9["sub$i". "SubTotal"];
        $quoteTotalat9->costPrice += $quoteSub9at9->freight;
        $quoteTotalat9->profit = 11000;
        $quoteTotalat9->exchangeRate = 1.8;
        $quoteTotalat9->quotePrice = ($quoteTotalat9->costPrice + $quoteTotalat9->profit) * $quoteTotalat9->exchangeRate;
        $quoteTotalat9->reviewName = "張雨行";
        $quoteTotalat9->reviewFillDate = "2023-02-19 00:00:00";
        $quoteTotalat9->reviewGeneralManager = "湯明月";
        $quoteTotalat9->reviewGeneralManagerFillDate = "2023-02-20 00:00:00";
        $quoteTotalat9->reviewFinalGeneralManager = "湯明月";
        $quoteTotalat9->reviewFinalGeneralManagerFillDate = "2023-02-21 00:00:00";
        $quoteTotalat9->save();
    }
}
