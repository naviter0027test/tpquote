<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\QuoteSub7;

class QuoteSub7Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $quoteSub7at1 = new QuoteSub7();
        $quoteSub7at1->mainId = 1;
        $quoteSub7at1->serialNumber = "SLN-20221200001";
        $quoteSub7at1->processName = "鞋底板";
        $quoteSub7at1->materialName = "膠磁";
        $quoteSub7at1->processMemo = "";
        $quoteSub7at1->localNeedSec = 25;
        $quoteSub7at1->usageAmount = 400;
        $quoteSub7at1->localNeedNum = 35;
        $quoteSub7at1->outProcessPrice = 3570;
        $quoteSub7at1->save();

        $quoteSub7at2 = new QuoteSub7();
        $quoteSub7at2->mainId = 2;
        $quoteSub7at2->serialNumber = "SLN-20221200002";
        $quoteSub7at2->processName = "裁面板";
        $quoteSub7at2->materialName = "單面背膠膠磁";
        $quoteSub7at2->processMemo = "";
        $quoteSub7at2->localNeedSec = 25;
        $quoteSub7at2->usageAmount = 450;
        $quoteSub7at2->localNeedNum = 120;
        $quoteSub7at2->outProcessPrice = 3210;
        $quoteSub7at2->save();

        $quoteSub7at3 = new QuoteSub7();
        $quoteSub7at3->mainId = 3;
        $quoteSub7at3->serialNumber = "SLN-20221200003";
        $quoteSub7at3->processName = "面板滾漆";
        $quoteSub7at3->materialName = "雙面覆膠軟鐵";
        $quoteSub7at3->processMemo = "";
        $quoteSub7at3->localNeedSec = 85;
        $quoteSub7at3->usageAmount = 420;
        $quoteSub7at3->localNeedNum = 220;
        $quoteSub7at3->outProcessPrice = 800;
        $quoteSub7at3->save();

        $quoteSub7at4 = new QuoteSub7();
        $quoteSub7at4->mainId = 4;
        $quoteSub7at4->serialNumber = "SLN-20221200004";
        $quoteSub7at4->processName = "貼紙";
        $quoteSub7at4->materialName = "鉚釘";
        $quoteSub7at4->processMemo = "";
        $quoteSub7at4->localNeedSec = 95;
        $quoteSub7at4->usageAmount = 140;
        $quoteSub7at4->localNeedNum = 90;
        $quoteSub7at4->outProcessPrice = 340;
        $quoteSub7at4->save();

        $quoteSub7at5 = new QuoteSub7();
        $quoteSub7at5->mainId = 5;
        $quoteSub7at5->serialNumber = "SLN-20221200005";
        $quoteSub7at5->processName = "底板貼紙";
        $quoteSub7at5->materialName = "強磁";
        $quoteSub7at5->processMemo = "";
        $quoteSub7at5->localNeedSec = 140;
        $quoteSub7at5->usageAmount = 130;
        $quoteSub7at5->localNeedNum = 105;
        $quoteSub7at5->outProcessPrice = 40;
        $quoteSub7at5->save();

        $quoteSub7at6 = new QuoteSub7();
        $quoteSub7at6->mainId = 6;
        $quoteSub7at6->serialNumber = "SLN-20221200006";
        $quoteSub7at6->processName = "面板熱轉印";
        $quoteSub7at6->materialName = "磁石";
        $quoteSub7at6->processMemo = "";
        $quoteSub7at6->localNeedSec = 240;
        $quoteSub7at6->usageAmount = 175;
        $quoteSub7at6->localNeedNum = 60;
        $quoteSub7at6->outProcessPrice = 505;
        $quoteSub7at6->save();

        $quoteSub7at7 = new QuoteSub7();
        $quoteSub7at7->mainId = 7;
        $quoteSub7at7->serialNumber = "SLN-20221200007";
        $quoteSub7at7->processName = "鑽孔";
        $quoteSub7at7->materialName = "POF膜";
        $quoteSub7at7->processMemo = "";
        $quoteSub7at7->localNeedSec = 500;
        $quoteSub7at7->usageAmount = 215;
        $quoteSub7at7->localNeedNum = 135;
        $quoteSub7at7->outProcessPrice = 180;
        $quoteSub7at7->save();

        $quoteSub7at8 = new QuoteSub7();
        $quoteSub7at8->mainId = 8;
        $quoteSub7at8->serialNumber = "SLN-20221200008";
        $quoteSub7at8->processName = "面板合框+品檢";
        $quoteSub7at8->materialName = "POF袋";
        $quoteSub7at8->processMemo = "";
        $quoteSub7at8->localNeedSec = 80;
        $quoteSub7at8->usageAmount = 320;
        $quoteSub7at8->localNeedNum = 50;
        $quoteSub7at8->outProcessPrice = 3400;
        $quoteSub7at8->save();

        $quoteSub7at9 = new QuoteSub7();
        $quoteSub7at9->mainId = 9;
        $quoteSub7at9->serialNumber = "SLN-20221200009";
        $quoteSub7at9->processName = "沖壓一刀";
        $quoteSub7at9->materialName = "PET袋";
        $quoteSub7at9->processMemo = "";
        $quoteSub7at9->localNeedSec = 95;
        $quoteSub7at9->usageAmount = 500;
        $quoteSub7at9->localNeedNum = 145;
        $quoteSub7at9->outProcessPrice = 4200;
        $quoteSub7at9->save();

        $quoteSub7at10 = new QuoteSub7();
        $quoteSub7at10->mainId = 10;
        $quoteSub7at10->serialNumber = "SLN-20221200010";
        $quoteSub7at10->processName = "沖壓二刀+撥取出品檢";
        $quoteSub7at10->materialName = "自封袋";
        $quoteSub7at10->processMemo = "";
        $quoteSub7at10->localNeedSec = 345;
        $quoteSub7at10->usageAmount = 180;
        $quoteSub7at10->localNeedNum = 290;
        $quoteSub7at10->outProcessPrice = 5100;
        $quoteSub7at10->save();

        $quoteSub7at11 = new QuoteSub7();
        $quoteSub7at11->mainId = 11;
        $quoteSub7at11->serialNumber = "SLN-20221200011";
        $quoteSub7at11->processName = "噴漆";
        $quoteSub7at11->materialName = "OPP袋";
        $quoteSub7at11->processMemo = "";
        $quoteSub7at11->localNeedSec = 360;
        $quoteSub7at11->usageAmount = 190;
        $quoteSub7at11->localNeedNum = 380;
        $quoteSub7at11->outProcessPrice = 6400;
        $quoteSub7at11->save();

        $quoteSub7at12 = new QuoteSub7();
        $quoteSub7at12->mainId = 12;
        $quoteSub7at12->serialNumber = "SLN-20221200012";
        $quoteSub7at12->processName = "絲印";
        $quoteSub7at12->materialName = "OPP自黏袋";
        $quoteSub7at12->processMemo = "";
        $quoteSub7at12->localNeedSec = 410;
        $quoteSub7at12->usageAmount = 20;
        $quoteSub7at12->localNeedNum = 65;
        $quoteSub7at12->outProcessPrice = 7900;
        $quoteSub7at12->save();

        $quoteSub7at13 = new QuoteSub7();
        $quoteSub7at13->mainId = 13;
        $quoteSub7at13->serialNumber = "SLN-20221200013";
        $quoteSub7at13->processName = "修邊";
        $quoteSub7at13->materialName = "PE袋";
        $quoteSub7at13->processMemo = "";
        $quoteSub7at13->localNeedSec = 415;
        $quoteSub7at13->usageAmount = 25;
        $quoteSub7at13->localNeedNum = 240;
        $quoteSub7at13->outProcessPrice = 2350;
        $quoteSub7at13->save();

    }
}
