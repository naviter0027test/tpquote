<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\QuoteSub7_1;

class QuoteSub7_1Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $quoteSub7_1at1 = new QuoteSub7_1();
        $quoteSub7_1at1->mainId = 1;
        $quoteSub7_1at1->serialNumber = "SLN-20221200001";
        $quoteSub7_1at1->outOrSelf = 1;
        $quoteSub7_1at1->processName = "鞋底板";
        $quoteSub7_1at1->materialName = "膠磁";
        $quoteSub7_1at1->processMemo = "";
        $quoteSub7_1at1->localNeedSec = 1200;
        $quoteSub7_1at1->usageAmount = 400;
        $quoteSub7_1at1->outProcessPrice = 3570;
        $quoteSub7_1at1->save();

        $quoteSub7_1at2 = new QuoteSub7_1();
        $quoteSub7_1at2->mainId = 2;
        $quoteSub7_1at2->serialNumber = "SLN-20221200002";
        $quoteSub7_1at2->outOrSelf = 1;
        $quoteSub7_1at2->processName = "裁面板";
        $quoteSub7_1at2->materialName = "單面背膠膠磁";
        $quoteSub7_1at2->processMemo = "";
        $quoteSub7_1at2->localNeedSec = 180;
        $quoteSub7_1at2->usageAmount = 330;
        $quoteSub7_1at2->outProcessPrice = 3690;
        $quoteSub7_1at2->save();

        $quoteSub7_1at3 = new QuoteSub7_1();
        $quoteSub7_1at3->mainId = 3;
        $quoteSub7_1at3->serialNumber = "SLN-20221200003";
        $quoteSub7_1at3->outOrSelf = 1;
        $quoteSub7_1at3->processName = "面板滾漆";
        $quoteSub7_1at3->materialName = "雙面覆膠軟鐵";
        $quoteSub7_1at3->processMemo = "";
        $quoteSub7_1at3->localNeedSec = 240;
        $quoteSub7_1at3->usageAmount = 410;
        $quoteSub7_1at3->outProcessPrice = 4600;
        $quoteSub7_1at3->save();

        $quoteSub7_1at4 = new QuoteSub7_1();
        $quoteSub7_1at4->mainId = 4;
        $quoteSub7_1at4->serialNumber = "SLN-20221200004";
        $quoteSub7_1at4->outOrSelf = 1;
        $quoteSub7_1at4->processName = "貼紙";
        $quoteSub7_1at4->materialName = "鉚釘";
        $quoteSub7_1at4->processMemo = "";
        $quoteSub7_1at4->localNeedSec = 500;
        $quoteSub7_1at4->usageAmount = 230;
        $quoteSub7_1at4->outProcessPrice = 5900;
        $quoteSub7_1at4->save();

        $quoteSub7_1at5 = new QuoteSub7_1();
        $quoteSub7_1at5->mainId = 5;
        $quoteSub7_1at5->serialNumber = "SLN-20221200005";
        $quoteSub7_1at5->outOrSelf = 1;
        $quoteSub7_1at5->processName = "底板貼紙";
        $quoteSub7_1at5->materialName = "強磁";
        $quoteSub7_1at5->processMemo = "";
        $quoteSub7_1at5->localNeedSec = 180;
        $quoteSub7_1at5->usageAmount = 110;
        $quoteSub7_1at5->outProcessPrice = 2340;
        $quoteSub7_1at5->save();

        $quoteSub7_1at6 = new QuoteSub7_1();
        $quoteSub7_1at6->mainId = 6;
        $quoteSub7_1at6->serialNumber = "SLN-20221200006";
        $quoteSub7_1at6->outOrSelf = 1;
        $quoteSub7_1at6->processName = "面板熱轉印";
        $quoteSub7_1at6->materialName = "磁石";
        $quoteSub7_1at6->processMemo = "";
        $quoteSub7_1at6->localNeedSec = 660;
        $quoteSub7_1at6->usageAmount = 480;
        $quoteSub7_1at6->outProcessPrice = 9280;
        $quoteSub7_1at6->save();

        $quoteSub7_1at7 = new QuoteSub7_1();
        $quoteSub7_1at7->mainId = 7;
        $quoteSub7_1at7->serialNumber = "SLN-20221200007";
        $quoteSub7_1at7->outOrSelf = 2;
        $quoteSub7_1at7->processName = "鑽孔";
        $quoteSub7_1at7->materialName = "POF膜";
        $quoteSub7_1at7->processMemo = "";
        $quoteSub7_1at7->localNeedSec = 490;
        $quoteSub7_1at7->usageAmount = 640;
        $quoteSub7_1at7->outProcessPrice = 8870;
        $quoteSub7_1at7->save();

        $quoteSub7_1at8 = new QuoteSub7_1();
        $quoteSub7_1at8->mainId = 8;
        $quoteSub7_1at8->serialNumber = "SLN-20221200008";
        $quoteSub7_1at8->outOrSelf = 2;
        $quoteSub7_1at8->processName = "面板合框+品檢";
        $quoteSub7_1at8->materialName = "POF袋";
        $quoteSub7_1at8->processMemo = "";
        $quoteSub7_1at8->localNeedSec = 470;
        $quoteSub7_1at8->usageAmount = 740;
        $quoteSub7_1at8->outProcessPrice = 5180;
        $quoteSub7_1at8->save();

        $quoteSub7_1at9 = new QuoteSub7_1();
        $quoteSub7_1at9->mainId = 9;
        $quoteSub7_1at9->serialNumber = "SLN-20221200009";
        $quoteSub7_1at9->outOrSelf = 2;
        $quoteSub7_1at9->processName = "沖壓一刀";
        $quoteSub7_1at9->materialName = "PET袋";
        $quoteSub7_1at9->processMemo = "";
        $quoteSub7_1at9->localNeedSec = 870;
        $quoteSub7_1at9->usageAmount = 120;
        $quoteSub7_1at9->outProcessPrice = 4910;
        $quoteSub7_1at9->save();

        $quoteSub7_1at10 = new QuoteSub7_1();
        $quoteSub7_1at10->mainId = 10;
        $quoteSub7_1at10->serialNumber = "SLN-20221200010";
        $quoteSub7_1at10->outOrSelf = 2;
        $quoteSub7_1at10->processName = "沖壓二刀+撥取出品檢";
        $quoteSub7_1at10->materialName = "自封袋";
        $quoteSub7_1at10->processMemo = "";
        $quoteSub7_1at10->localNeedSec = 320;
        $quoteSub7_1at10->usageAmount = 230;
        $quoteSub7_1at10->outProcessPrice = 3820;
        $quoteSub7_1at10->save();

        $quoteSub7_1at11 = new QuoteSub7_1();
        $quoteSub7_1at11->mainId = 11;
        $quoteSub7_1at11->serialNumber = "SLN-20221200011";
        $quoteSub7_1at11->outOrSelf = 2;
        $quoteSub7_1at11->processName = "噴漆";
        $quoteSub7_1at11->materialName = "OPP袋";
        $quoteSub7_1at11->processMemo = "";
        $quoteSub7_1at11->localNeedSec = 430;
        $quoteSub7_1at11->usageAmount = 190;
        $quoteSub7_1at11->outProcessPrice = 2120;
        $quoteSub7_1at11->save();

        $quoteSub7_1at12 = new QuoteSub7_1();
        $quoteSub7_1at12->mainId = 12;
        $quoteSub7_1at12->serialNumber = "SLN-20221200012";
        $quoteSub7_1at12->outOrSelf = 2;
        $quoteSub7_1at12->processName = "絲印";
        $quoteSub7_1at12->materialName = "OPP自黏袋";
        $quoteSub7_1at12->processMemo = "";
        $quoteSub7_1at12->localNeedSec = 370;
        $quoteSub7_1at12->usageAmount = 240;
        $quoteSub7_1at12->outProcessPrice = 4590;
        $quoteSub7_1at12->save();

        $quoteSub7_1at13 = new QuoteSub7_1();
        $quoteSub7_1at13->mainId = 13;
        $quoteSub7_1at13->serialNumber = "SLN-20221200013";
        $quoteSub7_1at13->outOrSelf = 2;
        $quoteSub7_1at13->processName = "修邊";
        $quoteSub7_1at13->materialName = "PE袋";
        $quoteSub7_1at13->processMemo = "";
        $quoteSub7_1at13->localNeedSec = 580;
        $quoteSub7_1at13->usageAmount = 170;
        $quoteSub7_1at13->outProcessPrice = 5100;
        $quoteSub7_1at13->save();
    }
}
