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

        $quoteSub2at6 = new QuoteSub2();
        $quoteSub2at6->mainId = 6;
        $quoteSub2at6->serialNumber = "SLN-20221200006";
        $quoteSub2at6->partNo = "SUB1-20221200006";
        $quoteSub2at6->materialName = "展示盒";
        $quoteSub2at6->length = 880;
        $quoteSub2at6->width = 510;
        $quoteSub2at6->height = 71;
        $quoteSub2at6->usageAmount = 16;
        $quoteSub2at6->boxType = "手提盒型";
        $quoteSub2at6->internalPcsNum = 18;
        $quoteSub2at6->paperThickness = "300G";
        $quoteSub2at6->paperMaterial = "牛皮紙";
        $quoteSub2at6->printMethod = "熱轉印";
        $quoteSub2at6->craftMethod = "開窗,騎馬釘成冊";
        $quoteSub2at6->coatingMethod = "上亞膜";
        $quoteSub2at6->memo = "";
        $quoteSub2at6->infoImg = "";
        $quoteSub2at6->save();

        $quoteSub2at7 = new QuoteSub2();
        $quoteSub2at7->mainId = 7;
        $quoteSub2at7->serialNumber = "SLN-20221200007";
        $quoteSub2at7->partNo = "SUB1-20221200007";
        $quoteSub2at7->materialName = "展示盒";
        $quoteSub2at7->length = 170;
        $quoteSub2at7->width = 210;
        $quoteSub2at7->height = 33;
        $quoteSub2at7->usageAmount = 80;
        $quoteSub2at7->boxType = "pizza盒型";
        $quoteSub2at7->internalPcsNum = 39;
        $quoteSub2at7->paperThickness = "350G";
        $quoteSub2at7->paperMaterial = "雙灰板";
        $quoteSub2at7->printMethod = "單面印刷,正反雙面";
        $quoteSub2at7->craftMethod = "開窗";
        $quoteSub2at7->coatingMethod = "不上光";
        $quoteSub2at7->memo = "";
        $quoteSub2at7->infoImg = "";
        $quoteSub2at7->save();

        $quoteSub2at8 = new QuoteSub2();
        $quoteSub2at8->mainId = 8;
        $quoteSub2at8->serialNumber = "SLN-20221200008";
        $quoteSub2at8->partNo = "SUB1-20221200008";
        $quoteSub2at8->materialName = "彩盒";
        $quoteSub2at8->length = 190;
        $quoteSub2at8->width = 380;
        $quoteSub2at8->height = 45;
        $quoteSub2at8->usageAmount = 71;
        $quoteSub2at8->boxType = "開窗PVC";
        $quoteSub2at8->internalPcsNum = 41;
        $quoteSub2at8->paperThickness = "450G";
        $quoteSub2at8->paperMaterial = "白板紙";
        $quoteSub2at8->printMethod = "單色印刷,專色印刷";
        $quoteSub2at8->craftMethod = "壓刀(折線)";
        $quoteSub2at8->coatingMethod = "上薄UV";
        $quoteSub2at8->memo = "";
        $quoteSub2at8->infoImg = "";
        $quoteSub2at8->save();

        $quoteSub2at9 = new QuoteSub2();
        $quoteSub2at9->mainId = 9;
        $quoteSub2at9->serialNumber = "SLN-20221200009";
        $quoteSub2at9->partNo = "SUB1-20221200009";
        $quoteSub2at9->materialName = "彩盒";
        $quoteSub2at9->length = 195;
        $quoteSub2at9->width = 440;
        $quoteSub2at9->height = 105;
        $quoteSub2at9->usageAmount = 78;
        $quoteSub2at9->boxType = "開窗+PET";
        $quoteSub2at9->internalPcsNum = 49;
        $quoteSub2at9->paperThickness = "1150G";
        $quoteSub2at9->paperMaterial = "灰板";
        $quoteSub2at9->printMethod = "四色印刷";
        $quoteSub2at9->craftMethod = "壓刀(折線),騎馬釘成冊";
        $quoteSub2at9->coatingMethod = "上OPP霧膜";
        $quoteSub2at9->memo = "";
        $quoteSub2at9->infoImg = "";
        $quoteSub2at9->save();

        $quoteSub2at10 = new QuoteSub2();
        $quoteSub2at10->mainId = 10;
        $quoteSub2at10->serialNumber = "SLN-20221200010";
        $quoteSub2at10->partNo = "SUB1-20221200010";
        $quoteSub2at10->materialName = "彩盒";
        $quoteSub2at10->length = 205;
        $quoteSub2at10->width = 445;
        $quoteSub2at10->height = 125;
        $quoteSub2at10->usageAmount = 92;
        $quoteSub2at10->boxType = "不開窗";
        $quoteSub2at10->internalPcsNum = 80;
        $quoteSub2at10->paperThickness = "200G";
        $quoteSub2at10->paperMaterial = "三層瓦楞";
        $quoteSub2at10->printMethod = "正反雙面";
        $quoteSub2at10->craftMethod = "裱E瓦楞";
        $quoteSub2at10->coatingMethod = "不上光";
        $quoteSub2at10->memo = "";
        $quoteSub2at10->infoImg = "";
        $quoteSub2at10->save();
    }
}
