<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\QuoteSub9;

class QuoteSub9Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $quoteSub9at1 = new QuoteSub9();
        $quoteSub9at1->mainId = 1;
        $quoteSub9at1->port = 1;
        $quoteSub9at1->formula = 1;
        $quoteSub9at1->freight = 150 + 150 + 500 + 5400;
        $quoteSub9at1->save();

        $quoteSub9at2 = new QuoteSub9();
        $quoteSub9at2->mainId = 2;
        $quoteSub9at2->port = 1;
        $quoteSub9at2->formula = 2;
        $quoteSub9at2->freight = 150 + 150 + 50 + 5400;
        $quoteSub9at2->save();

        $quoteSub9at3 = new QuoteSub9();
        $quoteSub9at3->mainId = 3;
        $quoteSub9at3->port = 1;
        $quoteSub9at3->formula = 3;
        $quoteSub9at3->freight = 150 + 500 + 45 + 5400;
        $quoteSub9at3->save();

        $quoteSub9at4 = new QuoteSub9();
        $quoteSub9at4->mainId = 4;
        $quoteSub9at4->port = 1;
        $quoteSub9at4->formula = 4;
        $quoteSub9at4->freight = 150 + 50 + 45 + 5400;
        $quoteSub9at4->save();

        $quoteSub9at5 = new QuoteSub9();
        $quoteSub9at5->mainId = 5;
        $quoteSub9at5->port = 2;
        $quoteSub9at5->formula = 1;
        $quoteSub9at5->freight = 150 + 150 + 500 + 4200;
        $quoteSub9at5->save();

        $quoteSub9at6 = new QuoteSub9();
        $quoteSub9at6->mainId = 6;
        $quoteSub9at6->port = 2;
        $quoteSub9at6->formula = 2;
        $quoteSub9at6->freight = 150 + 150 + 50 + 4200;
        $quoteSub9at6->save();

        $quoteSub9at7 = new QuoteSub9();
        $quoteSub9at7->mainId = 7;
        $quoteSub9at7->port = 2;
        $quoteSub9at7->formula = 3;
        $quoteSub9at7->freight = 150 + 500 + 45 + 4200;
        $quoteSub9at7->save();

        $quoteSub9at8 = new QuoteSub9();
        $quoteSub9at8->mainId = 8;
        $quoteSub9at8->port = 2;
        $quoteSub9at8->formula = 4;
        $quoteSub9at8->freight = 150 + 50 + 45 + 4200;
        $quoteSub9at8->save();

        $quoteSub9at9 = new QuoteSub9();
        $quoteSub9at9->mainId = 9;
        $quoteSub9at9->port = 3;
        $quoteSub9at9->formula = 1;
        $quoteSub9at9->freight = 150 + 150 + 500 + 4400;
        $quoteSub9at9->save();

        $quoteSub9at10 = new QuoteSub9();
        $quoteSub9at10->mainId = 10;
        $quoteSub9at10->port = 3;
        $quoteSub9at10->formula = 2;
        $quoteSub9at10->freight = 150 + 150 + 50 + 4400;
        $quoteSub9at10->save();
    }
}
