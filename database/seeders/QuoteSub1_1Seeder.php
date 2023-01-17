<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\QuoteSub1_1;

class QuoteSub1_1Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sub1_1at1 = new QuoteSub1_1();
        $sub1_1at1->mainId = 1;
        $sub1_1at1->partNo = "SUB1-20221200001";
        $sub1_1at1->materialName = "盒身";
        $sub1_1at1->length = 420;
        $sub1_1at1->width = 120;
        $sub1_1at1->height = 25;
        $sub1_1at1->usageAmount = 50;
        $sub1_1at1->spec = "松木";
        $sub1_1at1->specIllustrate = "3夾";
        $sub1_1at1->content = "四椴七楊";
        $sub1_1at1->level = "A/B";
        $sub1_1at1->business = "E0";
        $sub1_1at1->fsc = "Y";
        $sub1_1at1->materialPrice = 499;
        $sub1_1at1->save();

        $sub1_1at2 = new QuoteSub1_1();
        $sub1_1at2->mainId = 2;
        $sub1_1at2->partNo = "SUB1-20221200002";
        $sub1_1at2->materialName = "MDF-99K";
        $sub1_1at2->length = 80;
        $sub1_1at2->width = 40;
        $sub1_1at2->height = 5;
        $sub1_1at2->usageAmount = 90;
        $sub1_1at2->spec = "櫸木";
        $sub1_1at2->specIllustrate = "5夾";
        $sub1_1at2->content = "二椴九楊";
        $sub1_1at2->level = "A/A";
        $sub1_1at2->business = "E0";
        $sub1_1at2->fsc = "N";
        $sub1_1at2->materialPrice = 499;
        $sub1_1at2->save();

        $sub1_1at3 = new QuoteSub1_1();
        $sub1_1at3->mainId = 3;
        $sub1_1at3->partNo = "SUB1-20221200003";
        $sub1_1at3->materialName = "盒內邊條";
        $sub1_1at3->length = 320;
        $sub1_1at3->width = 480;
        $sub1_1at3->height = 544;
        $sub1_1at3->usageAmount = 30;
        $sub1_1at3->spec = "楊木";
        $sub1_1at3->specIllustrate = "11夾";
        $sub1_1at3->content = "三椴二楊";
        $sub1_1at3->level = "B/B";
        $sub1_1at3->business = "E1";
        $sub1_1at3->fsc = "N";
        $sub1_1at3->materialPrice = 1240;
        $sub1_1at3->save();

        $sub1_1at4 = new QuoteSub1_1();
        $sub1_1at4->mainId = 4;
        $sub1_1at4->partNo = "SUB1-20221200004";
        $sub1_1at4->materialName = "盒身";
        $sub1_1at4->length = 448;
        $sub1_1at4->width = 120;
        $sub1_1at4->height = 90;
        $sub1_1at4->usageAmount = 15;
        $sub1_1at4->spec = "松木";
        $sub1_1at4->specIllustrate = "指接板";
        $sub1_1at4->content = "五椴四楊";
        $sub1_1at4->level = "特A/A";
        $sub1_1at4->business = "E0";
        $sub1_1at4->fsc = "Y";
        $sub1_1at4->materialPrice = 4520;
        $sub1_1at4->save();

        $sub1_1at5 = new QuoteSub1_1();
        $sub1_1at5->mainId = 5;
        $sub1_1at5->partNo = "SUB1-20221200005";
        $sub1_1at5->materialName = "盒蓋短邊條";
        $sub1_1at5->length = 80;
        $sub1_1at5->width = 920;
        $sub1_1at5->height = 20;
        $sub1_1at5->usageAmount = 50;
        $sub1_1at5->spec = "椴木";
        $sub1_1at5->specIllustrate = "刀模板";
        $sub1_1at5->content = "二椴九楊";
        $sub1_1at5->level = "B/B";
        $sub1_1at5->business = "E0";
        $sub1_1at5->fsc = "N";
        $sub1_1at5->materialPrice = 990;
        $sub1_1at5->save();

        $sub1_1at6 = new QuoteSub1_1();
        $sub1_1at6->mainId = 6;
        $sub1_1at6->partNo = "SUB1-20221200006";
        $sub1_1at6->materialName = "盒蓋";
        $sub1_1at6->length = 85;
        $sub1_1at6->width = 620;
        $sub1_1at6->height = 220;
        $sub1_1at6->usageAmount = 520;
        $sub1_1at6->spec = "楊木";
        $sub1_1at6->specIllustrate = "3夾";
        $sub1_1at6->content = "四椴三陽";
        $sub1_1at6->level = "A/B";
        $sub1_1at6->business = "E1";
        $sub1_1at6->fsc = "Y";
        $sub1_1at6->materialPrice = 890;
        $sub1_1at6->save();

        $sub1_1at7 = new QuoteSub1_1();
        $sub1_1at7->mainId = 7;
        $sub1_1at7->partNo = "SUB1-20221200007";
        $sub1_1at7->materialName = "盒內邊條";
        $sub1_1at7->length = 850;
        $sub1_1at7->width = 330;
        $sub1_1at7->height = 190;
        $sub1_1at7->usageAmount = 320;
        $sub1_1at7->spec = "松木";
        $sub1_1at7->specIllustrate = "5夾";
        $sub1_1at7->content = "四椴三陽";
        $sub1_1at7->level = "B/B";
        $sub1_1at7->business = "E0";
        $sub1_1at7->fsc = "N";
        $sub1_1at7->materialPrice = 200;
        $sub1_1at7->save();

        $sub1_1at8 = new QuoteSub1_1();
        $sub1_1at8->mainId = 8;
        $sub1_1at8->partNo = "SUB1-20221200008";
        $sub1_1at8->materialName = "盒蓋短邊條";
        $sub1_1at8->length = 350;
        $sub1_1at8->width = 380;
        $sub1_1at8->height = 290;
        $sub1_1at8->usageAmount = 190;
        $sub1_1at8->spec = "楊木";
        $sub1_1at8->specIllustrate = "7夾";
        $sub1_1at8->content = "三椴二楊";
        $sub1_1at8->level = "A/B";
        $sub1_1at8->business = "E0";
        $sub1_1at8->fsc = "N";
        $sub1_1at8->materialPrice = 240;
        $sub1_1at8->save();

        $sub1_1at9 = new QuoteSub1_1();
        $sub1_1at9->mainId = 9;
        $sub1_1at9->partNo = "SUB1-20221200009";
        $sub1_1at9->materialName = "盒底";
        $sub1_1at9->length = 355;
        $sub1_1at9->width = 320;
        $sub1_1at9->height = 280;
        $sub1_1at9->usageAmount = 290;
        $sub1_1at9->spec = "櫸木";
        $sub1_1at9->specIllustrate = "9夾";
        $sub1_1at9->content = "二椴一楊";
        $sub1_1at9->level = "B/B";
        $sub1_1at9->business = "E0";
        $sub1_1at9->fsc = "N";
        $sub1_1at9->materialPrice = 140;
        $sub1_1at9->save();

        $sub1_1at10 = new QuoteSub1_1();
        $sub1_1at10->mainId = 10;
        $sub1_1at10->partNo = "SUB1-20221200010";
        $sub1_1at10->materialName = "盒蓋";
        $sub1_1at10->length = 295;
        $sub1_1at10->width = 170;
        $sub1_1at10->height = 310;
        $sub1_1at10->usageAmount = 210;
        $sub1_1at10->spec = "櫸木";
        $sub1_1at10->specIllustrate = "11夾";
        $sub1_1at10->content = "三椴二楊";
        $sub1_1at10->level = "A/B";
        $sub1_1at10->business = "E1";
        $sub1_1at10->fsc = "Y";
        $sub1_1at10->materialPrice = 290;
        $sub1_1at10->save();
    }
}
