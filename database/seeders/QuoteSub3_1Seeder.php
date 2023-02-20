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

        $quoteSub3_1at2 = new QuoteSub3_1();
        $quoteSub3_1at2->mainId = 2;
        $quoteSub3_1at2->serialNumber = "SLN-20221200002";
        $quoteSub3_1at2->name = "滾漆";
        $quoteSub3_1at2->painted = "二底二面";
        $quoteSub3_1at2->subtotal = 2380;
        $quoteSub3_1at2->memo = "";
        $quoteSub3_1at2->save();

        $quoteSub3_1at3 = new QuoteSub3_1();
        $quoteSub3_1at3->mainId = 3;
        $quoteSub3_1at3->serialNumber = "SLN-20221200003";
        $quoteSub3_1at3->name = "滾漆";
        $quoteSub3_1at3->painted = "二底三面";
        $quoteSub3_1at3->subtotal = 4250;
        $quoteSub3_1at3->memo = "";
        $quoteSub3_1at3->save();

        $quoteSub3_1at4 = new QuoteSub3_1();
        $quoteSub3_1at4->mainId = 4;
        $quoteSub3_1at4->serialNumber = "SLN-20221200004";
        $quoteSub3_1at4->name = "噴漆";
        $quoteSub3_1at4->painted = "二底一面";
        $quoteSub3_1at4->subtotal = 5650;
        $quoteSub3_1at4->memo = "";
        $quoteSub3_1at4->save();

        $quoteSub3_1at5 = new QuoteSub3_1();
        $quoteSub3_1at5->mainId = 5;
        $quoteSub3_1at5->serialNumber = "SLN-20221200005";
        $quoteSub3_1at5->name = "噴漆";
        $quoteSub3_1at5->painted = "二底二面";
        $quoteSub3_1at5->subtotal = 1480;
        $quoteSub3_1at5->memo = "";
        $quoteSub3_1at5->save();

        $quoteSub3_1at6 = new QuoteSub3_1();
        $quoteSub3_1at6->mainId = 6;
        $quoteSub3_1at6->serialNumber = "SLN-20221200006";
        $quoteSub3_1at6->name = "噴漆";
        $quoteSub3_1at6->painted = "二底三面";
        $quoteSub3_1at6->subtotal = 1990;
        $quoteSub3_1at6->memo = "";
        $quoteSub3_1at6->save();

        $quoteSub3_1at7 = new QuoteSub3_1();
        $quoteSub3_1at7->mainId = 7;
        $quoteSub3_1at7->serialNumber = "SLN-20221200007";
        $quoteSub3_1at7->name = "絲印";
        $quoteSub3_1at7->painted = "二底三面";
        $quoteSub3_1at7->subtotal = 6700;
        $quoteSub3_1at7->memo = "";
        $quoteSub3_1at7->save();

        $quoteSub3_1at8 = new QuoteSub3_1();
        $quoteSub3_1at8->mainId = 8;
        $quoteSub3_1at8->serialNumber = "SLN-20221200008";
        $quoteSub3_1at8->name = "絲印";
        $quoteSub3_1at8->painted = "二底二面";
        $quoteSub3_1at8->subtotal = 7150;
        $quoteSub3_1at8->memo = "";
        $quoteSub3_1at8->save();

        $quoteSub3_1at9 = new QuoteSub3_1();
        $quoteSub3_1at9->mainId = 9;
        $quoteSub3_1at9->serialNumber = "SLN-20221200009";
        $quoteSub3_1at9->name = "絲印";
        $quoteSub3_1at9->painted = "二底一面";
        $quoteSub3_1at9->subtotal = 9130;
        $quoteSub3_1at9->memo = "";
        $quoteSub3_1at9->save();

        $quoteSub3_1at10 = new QuoteSub3_1();
        $quoteSub3_1at10->mainId = 10;
        $quoteSub3_1at10->serialNumber = "SLN-20221200010";
        $quoteSub3_1at10->name = "滾漆";
        $quoteSub3_1at10->painted = "二底三面";
        $quoteSub3_1at10->subtotal = 1890;
        $quoteSub3_1at10->memo = "";
        $quoteSub3_1at10->save();
    }
}
