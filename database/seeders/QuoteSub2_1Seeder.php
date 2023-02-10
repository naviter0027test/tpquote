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

        $quoteSub2_1at11 = new QuoteSub2_1();
        $quoteSub2_1at11->mainId = 11;
        $quoteSub2_1at11->serialNumber = "SLN-20221200011";
        $quoteSub2_1at11->partNo = "SUB1-20221200011";
        $quoteSub2_1at11->materialName = "底紙";
        $quoteSub2_1at11->length = 295;
        $quoteSub2_1at11->width = 385;
        $quoteSub2_1at11->height = 60;
        $quoteSub2_1at11->usageAmount = 10;
        $quoteSub2_1at11->paperThickness = "350G";
        $quoteSub2_1at11->paperMaterial = "牛皮紙";
        $quoteSub2_1at11->printMethod = "正反雙面";
        $quoteSub2_1at11->craftMethod = "對錶,打孔";
        $quoteSub2_1at11->coatingMethod = "上OPP亮膜";
        $quoteSub2_1at11->memo = "";
        $quoteSub2_1at11->infoImg = "";
        $quoteSub2_1at11->save();

        $quoteSub2_1at12 = new QuoteSub2_1();
        $quoteSub2_1at12->mainId = 12;
        $quoteSub2_1at12->serialNumber = "SLN-20221200012";
        $quoteSub2_1at12->partNo = "SUB1-20221200012";
        $quoteSub2_1at12->materialName = "警告標";
        $quoteSub2_1at12->length = 180;
        $quoteSub2_1at12->width = 400;
        $quoteSub2_1at12->height = 90;
        $quoteSub2_1at12->usageAmount = 150;
        $quoteSub2_1at12->paperThickness = "50G";
        $quoteSub2_1at12->paperMaterial = "雙灰板";
        $quoteSub2_1at12->printMethod = "正反雙面,專色印刷";
        $quoteSub2_1at12->craftMethod = "開窗";
        $quoteSub2_1at12->coatingMethod = "上啞油";
        $quoteSub2_1at12->memo = "";
        $quoteSub2_1at12->infoImg = "";
        $quoteSub2_1at12->save();

        $quoteSub2_1at13 = new QuoteSub2_1();
        $quoteSub2_1at13->mainId = 13;
        $quoteSub2_1at13->serialNumber = "SLN-20221200013";
        $quoteSub2_1at13->partNo = "SUB1-20221200013";
        $quoteSub2_1at13->materialName = "警告標";
        $quoteSub2_1at13->length = 260;
        $quoteSub2_1at13->width = 370;
        $quoteSub2_1at13->height = 50;
        $quoteSub2_1at13->usageAmount = 250;
        $quoteSub2_1at13->paperThickness = "157G";
        $quoteSub2_1at13->paperMaterial = "白板紙";
        $quoteSub2_1at13->printMethod = "專色印刷";
        $quoteSub2_1at13->craftMethod = "裱E瓦楞";
        $quoteSub2_1at13->coatingMethod = "上亞膜";
        $quoteSub2_1at13->memo = "";
        $quoteSub2_1at13->infoImg = "";
        $quoteSub2_1at13->save();

        $quoteSub2_1at14 = new QuoteSub2_1();
        $quoteSub2_1at14->mainId = 14;
        $quoteSub2_1at14->serialNumber = "SLN-20221200014";
        $quoteSub2_1at14->partNo = "SUB1-20221200014";
        $quoteSub2_1at14->materialName = "背紙";
        $quoteSub2_1at14->length = 265;
        $quoteSub2_1at14->width = 325;
        $quoteSub2_1at14->height = 70;
        $quoteSub2_1at14->usageAmount = 180;
        $quoteSub2_1at14->paperThickness = "157G";
        $quoteSub2_1at14->paperMaterial = "灰板";
        $quoteSub2_1at14->printMethod = "單面印刷,專色印刷";
        $quoteSub2_1at14->craftMethod = "對錶";
        $quoteSub2_1at14->coatingMethod = "不上光";
        $quoteSub2_1at14->memo = "";
        $quoteSub2_1at14->infoImg = "";
        $quoteSub2_1at14->save();

        $quoteSub2_1at15 = new QuoteSub2_1();
        $quoteSub2_1at15->mainId = 15;
        $quoteSub2_1at15->serialNumber = "SLN-20221200015";
        $quoteSub2_1at15->partNo = "SUB1-20221200015";
        $quoteSub2_1at15->materialName = "面紙";
        $quoteSub2_1at15->length = 275;
        $quoteSub2_1at15->width = 140;
        $quoteSub2_1at15->height = 170;
        $quoteSub2_1at15->usageAmount = 110;
        $quoteSub2_1at15->paperThickness = "250G";
        $quoteSub2_1at15->paperMaterial = "透明不乾膠";
        $quoteSub2_1at15->printMethod = "正反雙面";
        $quoteSub2_1at15->craftMethod = "對錶,打孔";
        $quoteSub2_1at15->coatingMethod = "不上光";
        $quoteSub2_1at15->memo = "";
        $quoteSub2_1at15->infoImg = "";
        $quoteSub2_1at15->save();

        $quoteSub2_1at16 = new QuoteSub2_1();
        $quoteSub2_1at16->mainId = 16;
        $quoteSub2_1at16->serialNumber = "SLN-20221200016";
        $quoteSub2_1at16->partNo = "SUB1-20221200016";
        $quoteSub2_1at16->materialName = "背卡";
        $quoteSub2_1at16->length = 140;
        $quoteSub2_1at16->width = 190;
        $quoteSub2_1at16->height = 110;
        $quoteSub2_1at16->usageAmount = 200;
        $quoteSub2_1at16->paperThickness = "450G";
        $quoteSub2_1at16->paperMaterial = "三層瓦楞";
        $quoteSub2_1at16->printMethod = "正反雙面,熱轉印";
        $quoteSub2_1at16->craftMethod = "打孔";
        $quoteSub2_1at16->coatingMethod = "上OPP亮膜";
        $quoteSub2_1at16->memo = "";
        $quoteSub2_1at16->infoImg = "";
        $quoteSub2_1at16->save();

        $quoteSub2_1at17 = new QuoteSub2_1();
        $quoteSub2_1at17->mainId = 17;
        $quoteSub2_1at17->serialNumber = "SLN-20221200017";
        $quoteSub2_1at17->partNo = "SUB1-20221200017";
        $quoteSub2_1at17->materialName = "底紙";
        $quoteSub2_1at17->length = 145;
        $quoteSub2_1at17->width = 195;
        $quoteSub2_1at17->height = 130;
        $quoteSub2_1at17->usageAmount = 220;
        $quoteSub2_1at17->paperThickness = "1150G";
        $quoteSub2_1at17->paperMaterial = "五層瓦楞";
        $quoteSub2_1at17->printMethod = "熱轉印";
        $quoteSub2_1at17->craftMethod = "開窗";
        $quoteSub2_1at17->coatingMethod = "上薄UV";
        $quoteSub2_1at17->memo = "";
        $quoteSub2_1at17->infoImg = "";
        $quoteSub2_1at17->save();

        $quoteSub2_1at18 = new QuoteSub2_1();
        $quoteSub2_1at18->mainId = 18;
        $quoteSub2_1at18->serialNumber = "SLN-20221200018";
        $quoteSub2_1at18->partNo = "SUB1-20221200018";
        $quoteSub2_1at18->materialName = "背紙";
        $quoteSub2_1at18->length = 255;
        $quoteSub2_1at18->width = 95;
        $quoteSub2_1at18->height = 170;
        $quoteSub2_1at18->usageAmount = 20;
        $quoteSub2_1at18->paperThickness = "50G";
        $quoteSub2_1at18->paperMaterial = "熱轉印模";
        $quoteSub2_1at18->printMethod = "專色印刷,熱轉印";
        $quoteSub2_1at18->craftMethod = "開窗";
        $quoteSub2_1at18->coatingMethod = "上UV";
        $quoteSub2_1at18->memo = "";
        $quoteSub2_1at18->infoImg = "";
        $quoteSub2_1at18->save();
    }
}