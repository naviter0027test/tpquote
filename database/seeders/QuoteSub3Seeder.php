<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\QuoteSub3;

class QuoteSub3Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $quoteSub3at1 = new QuoteSub3();
        $quoteSub3at1->mainId = 1;
        $quoteSub3at1->partNo = "SUB1-20221200001";
        $quoteSub3at1->materialName = "膠磁";
        $quoteSub3at1->length = 420;
        $quoteSub3at1->width = 120;
        $quoteSub3at1->height = 25;
        $quoteSub3at1->usageAmount = 90;
        $quoteSub3at1->spec = "H9mm";
        $quoteSub3at1->info = "";
        $quoteSub3at1->infoImg = "";
        $quoteSub3at1->save();

        $quoteSub3at2 = new QuoteSub3();
        $quoteSub3at2->mainId = 2;
        $quoteSub3at2->partNo = "SUB1-20221200002";
        $quoteSub3at2->materialName = "單面背膠膠磁";
        $quoteSub3at2->length = 230;
        $quoteSub3at2->width = 80;
        $quoteSub3at2->height = 65;
        $quoteSub3at2->usageAmount = 100;
        $quoteSub3at2->spec = "H9mm";
        $quoteSub3at2->info = "";
        $quoteSub3at2->infoImg = "";
        $quoteSub3at2->save();

        $quoteSub3at3 = new QuoteSub3();
        $quoteSub3at3->mainId = 3;
        $quoteSub3at3->partNo = "SUB1-20221200003";
        $quoteSub3at3->materialName = "雙面覆膠軟鐵";
        $quoteSub3at3->length = 180;
        $quoteSub3at3->width = 70;
        $quoteSub3at3->height = 105;
        $quoteSub3at3->usageAmount = 80;
        $quoteSub3at3->spec = "釘帽直徑6mm";
        $quoteSub3at3->info = "";
        $quoteSub3at3->infoImg = "";
        $quoteSub3at3->save();

        $quoteSub3at4 = new QuoteSub3();
        $quoteSub3at4->mainId = 4;
        $quoteSub3at4->partNo = "SUB1-20221200004";
        $quoteSub3at4->materialName = "鉚釘";
        $quoteSub3at4->length = 40;
        $quoteSub3at4->width = 55;
        $quoteSub3at4->height = 15;
        $quoteSub3at4->usageAmount = 30;
        $quoteSub3at4->spec = "H9mm";
        $quoteSub3at4->info = "";
        $quoteSub3at4->infoImg = "";
        $quoteSub3at4->save();

        $quoteSub3at5 = new QuoteSub3();
        $quoteSub3at5->mainId = 5;
        $quoteSub3at5->partNo = "SUB1-20221200005";
        $quoteSub3at5->materialName = "強磁";
        $quoteSub3at5->length = 45;
        $quoteSub3at5->width = 35;
        $quoteSub3at5->height = 18;
        $quoteSub3at5->usageAmount = 40;
        $quoteSub3at5->spec = "孔深8mm";
        $quoteSub3at5->info = "";
        $quoteSub3at5->infoImg = "";
        $quoteSub3at5->save();
    }
}
