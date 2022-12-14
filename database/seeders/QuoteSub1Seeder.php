<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\QuoteSub1;

class QuoteSub1Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $quoteSub1at1 = new QuoteSub1();
        $quoteSub1at1->mainId = 1;
        $quoteSub1at1->partNo = "SUB1-20221200001";
        $quoteSub1at1->materialName = "紅檜木";
        $quoteSub1at1->length = 120;
        $quoteSub1at1->width = 60;
        $quoteSub1at1->height = 25;
        $quoteSub1at1->spec = "實木";
        $quoteSub1at1->specIllustrate = "同向板";
        $quoteSub1at1->content = "四椴七楊";
        $quoteSub1at1->level = "A/B";
        $quoteSub1at1->business = "E0";
        $quoteSub1at1->fsc = "Y";
        $quoteSub1at1->memo = "";
        $quoteSub1at1->bigLength = 1120;
        $quoteSub1at1->bigWidth = 360;
        $quoteSub1at1->bigHeight = 125;
        $quoteSub1at1->save();

        $quoteSub1at2 = new QuoteSub1();
        $quoteSub1at2->mainId = 2;
        $quoteSub1at2->partNo = "SUB1-20221200002";
        $quoteSub1at2->materialName = "MDF-99K";
        $quoteSub1at2->length = 80;
        $quoteSub1at2->width = 40;
        $quoteSub1at2->height = 5;
        $quoteSub1at2->spec = "MDF";
        $quoteSub1at2->specIllustrate = "5夾";
        $quoteSub1at2->content = "二椴九楊";
        $quoteSub1at2->level = "A/A";
        $quoteSub1at2->business = "E0";
        $quoteSub1at2->fsc = "N";
        $quoteSub1at2->memo = "";
        $quoteSub1at2->bigLength = 800;
        $quoteSub1at2->bigWidth = 400;
        $quoteSub1at2->bigHeight = 50;
        $quoteSub1at2->save();

        $quoteSub1at3 = new QuoteSub1();
        $quoteSub1at3->mainId = 3;
        $quoteSub1at3->partNo = "SUB1-20221200003";
        $quoteSub1at3->materialName = "橡膠系列RR版";
        $quoteSub1at3->length = 235;
        $quoteSub1at3->width = 410;
        $quoteSub1at3->height = 100;
        $quoteSub1at3->spec = "膠合板";
        $quoteSub1at3->specIllustrate = "11夾";
        $quoteSub1at3->content = "五椴四楊";
        $quoteSub1at3->level = "特A/A";
        $quoteSub1at3->business = "E0";
        $quoteSub1at3->fsc = "Y";
        $quoteSub1at3->memo = "test memo on seeder 3";
        $quoteSub1at3->bigLength = 2350;
        $quoteSub1at3->bigWidth = 4000;
        $quoteSub1at3->bigHeight = 800;
        $quoteSub1at3->save();

        $quoteSub1at4 = new QuoteSub1();
        $quoteSub1at4->mainId = 4;
        $quoteSub1at4->partNo = "SUB1-20221200004";
        $quoteSub1at4->materialName = "灰紙系列-RPX";
        $quoteSub1at4->length = 300;
        $quoteSub1at4->width = 300;
        $quoteSub1at4->height = 200;
        $quoteSub1at4->spec = "灰紙板";
        $quoteSub1at4->specIllustrate = "7夾";
        $quoteSub1at4->content = "四椴七楊";
        $quoteSub1at4->level = "B/B";
        $quoteSub1at4->business = "E1";
        $quoteSub1at4->fsc = "Y";
        $quoteSub1at4->memo = "test memo on seeder 4";
        $quoteSub1at4->bigLength = 3000;
        $quoteSub1at4->bigWidth = 3000;
        $quoteSub1at4->bigHeight = 500;
        $quoteSub1at4->save();

        $quoteSub1at5 = new QuoteSub1();
        $quoteSub1at5->mainId = 5;
        $quoteSub1at5->partNo = "SUB1-20221200005";
        $quoteSub1at5->materialName = "大荷木";
        $quoteSub1at5->length = 400;
        $quoteSub1at5->width = 80;
        $quoteSub1at5->height = 80;
        $quoteSub1at5->spec = "荷木";
        $quoteSub1at5->specIllustrate = "3夾";
        $quoteSub1at5->content = "三椴二楊";
        $quoteSub1at5->level = "A/B";
        $quoteSub1at5->business = "E1";
        $quoteSub1at5->fsc = "N";
        $quoteSub1at5->memo = "";
        $quoteSub1at5->bigLength = 4000;
        $quoteSub1at5->bigWidth = 800;
        $quoteSub1at5->bigHeight = 800;
        $quoteSub1at5->save();
    }
}
