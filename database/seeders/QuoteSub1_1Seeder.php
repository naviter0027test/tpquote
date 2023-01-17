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
        $sub1_1at1->usageAmount = 90;
        $sub1_1at2->spec = "櫸木";
        $sub1_1at2->specIllustrate = "5夾";
        $sub1_1at2->content = "二椴九楊";
        $sub1_1at2->level = "A/A";
        $sub1_1at2->business = "E0";
        $sub1_1at2->fsc = "N";
        $sub1_1at2->materialPrice = 499;
        $sub1_1at2->save();
    }
}
