<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\QuoteSub2_1;

class QuoteSub2_1Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $quoteSub2_1at1 = new QuoteSub2_1();
        $quoteSub2_1at1->mainId = 1;
        $quoteSub2_1at1->serialNumber = "SLN-20221200001";
        $quoteSub2_1at1->partNo = "SUB1-20221200001";
        $quoteSub2_1at1->materialName = "面紙";
        $quoteSub2_1at1->length = 420;
        $quoteSub2_1at1->width = 120;
        $quoteSub2_1at1->height = 25;
        $quoteSub2_1at1->usageAmount = 90;
        $quoteSub2_1at1->paperThickness = "50G";
        $quoteSub2_1at1->paperMaterial = "雙銅";
        $quoteSub2_1at1->printMethod = "單面印刷";
        $quoteSub2_1at1->craftMethod = "裱E瓦楞";
        $quoteSub2_1at1->coatingMethod = "上UV";
        $quoteSub2_1at1->memo = "";
        $quoteSub2_1at1->infoImg = "";
        $quoteSub2_1at1->save();

        $quoteSub2_1at2 = new QuoteSub2_1();
        $quoteSub2_1at2->mainId = 2;
        $quoteSub2_1at2->serialNumber = "SLN-20221200002";
        $quoteSub2_1at2->partNo = "SUB1-20221200002";
        $quoteSub2_1at2->materialName = "底紙";
        $quoteSub2_1at2->length = 380;
        $quoteSub2_1at2->width = 280;
        $quoteSub2_1at2->height = 92;
        $quoteSub2_1at2->usageAmount = 40;
        $quoteSub2_1at2->paperThickness = "100G";
        $quoteSub2_1at2->paperMaterial = "白卡";
        $quoteSub2_1at2->printMethod = "正反雙面";
        $quoteSub2_1at2->craftMethod = "對錶";
        $quoteSub2_1at2->coatingMethod = "上薄UV";
        $quoteSub2_1at2->memo = "";
        $quoteSub2_1at2->infoImg = "";
        $quoteSub2_1at2->save();

        $quoteSub2_1at3 = new QuoteSub2_1();
        $quoteSub2_1at3->mainId = 3;
        $quoteSub2_1at3->serialNumber = "SLN-20221200003";
        $quoteSub2_1at3->partNo = "SUB1-20221200003";
        $quoteSub2_1at3->materialName = "取出紙";
        $quoteSub2_1at3->length = 120;
        $quoteSub2_1at3->width = 80;
        $quoteSub2_1at3->height = 120;
        $quoteSub2_1at3->usageAmount = 15;
        $quoteSub2_1at3->paperThickness = "157G";
        $quoteSub2_1at3->paperMaterial = "灰底白板紙";
        $quoteSub2_1at3->printMethod = "四色印刷";
        $quoteSub2_1at3->craftMethod = "對錶,開窗";
        $quoteSub2_1at3->coatingMethod = "上OPP亮膜";
        $quoteSub2_1at3->memo = "";
        $quoteSub2_1at3->infoImg = "";
        $quoteSub2_1at3->save();

        $quoteSub2_1at4 = new QuoteSub2_1();
        $quoteSub2_1at4->mainId = 4;
        $quoteSub2_1at4->serialNumber = "SLN-20221200004";
        $quoteSub2_1at4->partNo = "SUB1-20221200004";
        $quoteSub2_1at4->materialName = "背標";
        $quoteSub2_1at4->length = 730;
        $quoteSub2_1at4->width = 330;
        $quoteSub2_1at4->height = 410;
        $quoteSub2_1at4->usageAmount = 115;
        $quoteSub2_1at4->paperThickness = "200G";
        $quoteSub2_1at4->paperMaterial = "不乾膠";
        $quoteSub2_1at4->printMethod = "單色印刷";
        $quoteSub2_1at4->craftMethod = "打孔,開窗";
        $quoteSub2_1at4->coatingMethod = "上啞油";
        $quoteSub2_1at4->memo = "";
        $quoteSub2_1at4->infoImg = "";
        $quoteSub2_1at4->save();

        $quoteSub2_1at5 = new QuoteSub2_1();
        $quoteSub2_1at5->mainId = 5;
        $quoteSub2_1at5->serialNumber = "SLN-20221200005";
        $quoteSub2_1at5->partNo = "SUB1-20221200005";
        $quoteSub2_1at5->materialName = "背卡";
        $quoteSub2_1at5->length = 180;
        $quoteSub2_1at5->width = 30;
        $quoteSub2_1at5->height = 40;
        $quoteSub2_1at5->usageAmount = 75;
        $quoteSub2_1at5->paperThickness = "250G";
        $quoteSub2_1at5->paperMaterial = "雙膠紙";
        $quoteSub2_1at5->printMethod = "單色印刷";
        $quoteSub2_1at5->craftMethod = "裱E瓦楞";
        $quoteSub2_1at5->coatingMethod = "上亞膜";
        $quoteSub2_1at5->memo = "";
        $quoteSub2_1at5->infoImg = "";
        $quoteSub2_1at5->save();

        $quoteSub2_1at6 = new QuoteSub2_1();
        $quoteSub2_1at6->mainId = 6;
        $quoteSub2_1at6->serialNumber = "SLN-20221200006";
        $quoteSub2_1at6->partNo = "SUB1-20221200006";
        $quoteSub2_1at6->materialName = "背卡";
        $quoteSub2_1at6->length = 185;
        $quoteSub2_1at6->width = 230;
        $quoteSub2_1at6->height = 45;
        $quoteSub2_1at6->usageAmount = 55;
        $quoteSub2_1at6->paperThickness = "157G";
        $quoteSub2_1at6->paperMaterial = "不乾膠";
        $quoteSub2_1at6->printMethod = "四色印刷";
        $quoteSub2_1at6->craftMethod = "裱E瓦楞,打孔";
        $quoteSub2_1at6->coatingMethod = "上OPP亮膜";
        $quoteSub2_1at6->memo = "";
        $quoteSub2_1at6->infoImg = "";
        $quoteSub2_1at6->save();

        $quoteSub2_1at7 = new QuoteSub2_1();
        $quoteSub2_1at7->mainId = 7;
        $quoteSub2_1at7->serialNumber = "SLN-20221200007";
        $quoteSub2_1at7->partNo = "SUB1-20221200007";
        $quoteSub2_1at7->materialName = "背標";
        $quoteSub2_1at7->length = 190;
        $quoteSub2_1at7->width = 240;
        $quoteSub2_1at7->height = 35;
        $quoteSub2_1at7->usageAmount = 50;
        $quoteSub2_1at7->paperThickness = "100G";
        $quoteSub2_1at7->paperMaterial = "灰底白板紙";
        $quoteSub2_1at7->printMethod = "單面印刷";
        $quoteSub2_1at7->craftMethod = "對錶,打孔";
        $quoteSub2_1at7->coatingMethod = "上薄UV";
        $quoteSub2_1at7->memo = "";
        $quoteSub2_1at7->infoImg = "";
        $quoteSub2_1at7->save();

        $quoteSub2_1at8 = new QuoteSub2_1();
        $quoteSub2_1at8->mainId = 8;
        $quoteSub2_1at8->serialNumber = "SLN-20221200008";
        $quoteSub2_1at8->partNo = "SUB1-20221200008";
        $quoteSub2_1at8->materialName = "底紙";
        $quoteSub2_1at8->length = 90;
        $quoteSub2_1at8->width = 140;
        $quoteSub2_1at8->height = 235;
        $quoteSub2_1at8->usageAmount = 120;
        $quoteSub2_1at8->paperThickness = "300G";
        $quoteSub2_1at8->paperMaterial = "雙銅";
        $quoteSub2_1at8->printMethod = "單面印刷";
        $quoteSub2_1at8->craftMethod = "對錶,開窗";
        $quoteSub2_1at8->coatingMethod = "上亞膜";
        $quoteSub2_1at8->memo = "";
        $quoteSub2_1at8->infoImg = "";
        $quoteSub2_1at8->save();

        $quoteSub2_1at9 = new QuoteSub2_1();
        $quoteSub2_1at9->mainId = 9;
        $quoteSub2_1at9->serialNumber = "SLN-20221200009";
        $quoteSub2_1at9->partNo = "SUB1-20221200009";
        $quoteSub2_1at9->materialName = "取出紙";
        $quoteSub2_1at9->length = 190;
        $quoteSub2_1at9->width = 180;
        $quoteSub2_1at9->height = 285;
        $quoteSub2_1at9->usageAmount = 100;
        $quoteSub2_1at9->paperThickness = "350G";
        $quoteSub2_1at9->paperMaterial = "透明";
        $quoteSub2_1at9->printMethod = "專色印刷";
        $quoteSub2_1at9->craftMethod = "開窗";
        $quoteSub2_1at9->coatingMethod = "不上光";
        $quoteSub2_1at9->memo = "";
        $quoteSub2_1at9->infoImg = "";
        $quoteSub2_1at9->save();

        $quoteSub2_1at10 = new QuoteSub2_1();
        $quoteSub2_1at10->mainId = 10;
        $quoteSub2_1at10->serialNumber = "SLN-20221200010";
        $quoteSub2_1at10->partNo = "SUB1-20221200010";
        $quoteSub2_1at10->materialName = "取出紙";
        $quoteSub2_1at10->length = 195;
        $quoteSub2_1at10->width = 185;
        $quoteSub2_1at10->height = 260;
        $quoteSub2_1at10->usageAmount = 110;
        $quoteSub2_1at10->paperThickness = "250G";
        $quoteSub2_1at10->paperMaterial = "單銅紙";
        $quoteSub2_1at10->printMethod = "熱轉印";
        $quoteSub2_1at10->craftMethod = "對錶";
        $quoteSub2_1at10->coatingMethod = "上薄UV";
        $quoteSub2_1at10->memo = "";
        $quoteSub2_1at10->infoImg = "";
        $quoteSub2_1at10->save();
    }
}
