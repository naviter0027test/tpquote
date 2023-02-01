<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\QuoteSub2;

class QuoteSub2Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $quoteSub2at1 = new QuoteSub2();
        $quoteSub2at1->mainId = 1;
        $quoteSub2at1->serialNumber = "SLN-20221200001";
        $quoteSub2at1->partNo = "SUB1-20221200001";
        $quoteSub2at1->materialName = "彩盒";
        $quoteSub2at1->length = 420;
        $quoteSub2at1->width = 120;
        $quoteSub2at1->height = 25;
        $quoteSub2at1->usageAmount = 90;
        $quoteSub2at1->boxType = "天地蓋";
        $quoteSub2at1->internalPcsNum = 30;
        $quoteSub2at1->paperThickness = "50G";
        $quoteSub2at1->paperMaterial = "雙銅";
        $quoteSub2at1->printMethod = "單面印刷";
        $quoteSub2at1->craftMethod = "裱E瓦楞";
        $quoteSub2at1->coatingMethod = "上UV";
        $quoteSub2at1->memo = "";
        $quoteSub2at1->infoImg = "";
        $quoteSub2at1->save();

        $quoteSub2at2 = new QuoteSub2();
        $quoteSub2at2->mainId = 2;
        $quoteSub2at2->serialNumber = "SLN-20221200002";
        $quoteSub2at2->partNo = "SUB1-20221200002";
        $quoteSub2at2->materialName = "展示盒";
        $quoteSub2at2->length = 820;
        $quoteSub2at2->width = 320;
        $quoteSub2at2->height = 225;
        $quoteSub2at2->usageAmount = 70;
        $quoteSub2at2->boxType = "牙膏盒/左右開口型";
        $quoteSub2at2->internalPcsNum = 40;
        $quoteSub2at2->paperThickness = "100G";
        $quoteSub2at2->paperMaterial = "白卡";
        $quoteSub2at2->printMethod = "正反雙面";
        $quoteSub2at2->craftMethod = "壓刀(折線)";
        $quoteSub2at2->coatingMethod = "上薄UV";
        $quoteSub2at2->memo = "";
        $quoteSub2at2->infoImg = "";
        $quoteSub2at2->save();

        $quoteSub2at3 = new QuoteSub2();
        $quoteSub2at3->mainId = 3;
        $quoteSub2at3->serialNumber = "SLN-20221200003";
        $quoteSub2at3->partNo = "SUB1-20221200003";
        $quoteSub2at3->materialName = "展示盒";
        $quoteSub2at3->length = 560;
        $quoteSub2at3->width = 190;
        $quoteSub2at3->height = 230;
        $quoteSub2at3->usageAmount = 10;
        $quoteSub2at3->boxType = "火柴盒型";
        $quoteSub2at3->internalPcsNum = 60;
        $quoteSub2at3->paperThickness = "157G";
        $quoteSub2at3->paperMaterial = "白卡";
        $quoteSub2at3->printMethod = "四色印刷";
        $quoteSub2at3->craftMethod = "開窗";
        $quoteSub2at3->coatingMethod = "上OPP亮膜";
        $quoteSub2at3->memo = "";
        $quoteSub2at3->infoImg = "";
        $quoteSub2at3->save();

        $quoteSub2at4 = new QuoteSub2();
        $quoteSub2at4->mainId = 4;
        $quoteSub2at4->serialNumber = "SLN-20221200004";
        $quoteSub2at4->partNo = "SUB1-20221200004";
        $quoteSub2at4->materialName = "彩盒";
        $quoteSub2at4->length = 510;
        $quoteSub2at4->width = 230;
        $quoteSub2at4->height = 30;
        $quoteSub2at4->usageAmount = 45;
        $quoteSub2at4->boxType = "抽屜盒型";
        $quoteSub2at4->internalPcsNum = 90;
        $quoteSub2at4->paperThickness = "200G";
        $quoteSub2at4->paperMaterial = "灰底白板紙";
        $quoteSub2at4->printMethod = "單色印刷";
        $quoteSub2at4->craftMethod = "騎馬釘成冊";
        $quoteSub2at4->coatingMethod = "上OPP霧膜";
        $quoteSub2at4->memo = "";
        $quoteSub2at4->infoImg = "";
        $quoteSub2at4->save();

        $quoteSub2at5 = new QuoteSub2();
        $quoteSub2at5->mainId = 5;
        $quoteSub2at5->serialNumber = "SLN-20221200005";
        $quoteSub2at5->partNo = "SUB1-20221200005";
        $quoteSub2at5->materialName = "展示盒";
        $quoteSub2at5->length = 670;
        $quoteSub2at5->width = 280;
        $quoteSub2at5->height = 50;
        $quoteSub2at5->usageAmount = 99;
        $quoteSub2at5->boxType = "圓筒型";
        $quoteSub2at5->internalPcsNum = 32;
        $quoteSub2at5->paperThickness = "250G";
        $quoteSub2at5->paperMaterial = "單銅紙";
        $quoteSub2at5->printMethod = "專色印刷";
        $quoteSub2at5->craftMethod = "裱E瓦楞";
        $quoteSub2at5->coatingMethod = "上啞油";
        $quoteSub2at5->memo = "";
        $quoteSub2at5->infoImg = "";
        $quoteSub2at5->save();
    }
}
