<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\QuoteSub4;

class QuoteSub4Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $quoteSub4at1 = new QuoteSub4();
        $quoteSub4at1->mainId = 1;
        $quoteSub4at1->serialNumber = "SLN-20221200001";
        $quoteSub4at1->partNo = "SUB1-20221200001";
        $quoteSub4at1->materialName = "POF膜";
        $quoteSub4at1->length = 380;
        $quoteSub4at1->width = 120;
        $quoteSub4at1->height = 25;
        $quoteSub4at1->origin = "國產";
        $quoteSub4at1->thickness = 0.019;
        $quoteSub4at1->usageAmount = 35;
        $quoteSub4at1->loss = 5;
        $quoteSub4at1->price = 600;
        $quoteSub4at1->memo = "";
        $quoteSub4at1->save();

        $quoteSub4at2 = new QuoteSub4();
        $quoteSub4at2->mainId = 2;
        $quoteSub4at2->serialNumber = "SLN-20221200002";
        $quoteSub4at2->partNo = "SUB1-20221200002";
        $quoteSub4at2->materialName = "POF袋";
        $quoteSub4at2->length = 230;
        $quoteSub4at2->width = 460;
        $quoteSub4at2->height = 80;
        $quoteSub4at2->origin = "國產";
        $quoteSub4at2->thickness = 0.025;
        $quoteSub4at2->usageAmount = 90;
        $quoteSub4at2->loss = 5;
        $quoteSub4at2->price = 980;
        $quoteSub4at2->memo = "";
        $quoteSub4at2->save();

        $quoteSub4at3 = new QuoteSub4();
        $quoteSub4at3->mainId = 3;
        $quoteSub4at3->serialNumber = "SLN-20221200003";
        $quoteSub4at3->partNo = "SUB1-20221200003";
        $quoteSub4at3->materialName = "PET袋";
        $quoteSub4at3->length = 290;
        $quoteSub4at3->width = 580;
        $quoteSub4at3->height = 120;
        $quoteSub4at3->origin = "國產";
        $quoteSub4at3->thickness = 0.037;
        $quoteSub4at3->usageAmount = 1190;
        $quoteSub4at3->loss = 95;
        $quoteSub4at3->price = 2380;
        $quoteSub4at3->memo = "";
        $quoteSub4at3->save();

        $quoteSub4at4 = new QuoteSub4();
        $quoteSub4at4->mainId = 4;
        $quoteSub4at4->serialNumber = "SLN-20221200004";
        $quoteSub4at4->partNo = "SUB1-20221200004";
        $quoteSub4at4->materialName = "自封袋";
        $quoteSub4at4->length = 450;
        $quoteSub4at4->width = 330;
        $quoteSub4at4->height = 810;
        $quoteSub4at4->origin = "國產";
        $quoteSub4at4->thickness = 0.025;
        $quoteSub4at4->usageAmount = 620;
        $quoteSub4at4->loss = 235;
        $quoteSub4at4->price = 1670;
        $quoteSub4at4->memo = "";
        $quoteSub4at4->save();

        $quoteSub4at5 = new QuoteSub4();
        $quoteSub4at5->mainId = 5;
        $quoteSub4at5->serialNumber = "SLN-20221200005";
        $quoteSub4at5->partNo = "SUB1-20221200005";
        $quoteSub4at5->materialName = "OPP袋";
        $quoteSub4at5->length = 870;
        $quoteSub4at5->width = 140;
        $quoteSub4at5->height = 110;
        $quoteSub4at5->origin = "國產";
        $quoteSub4at5->thickness = 0.037;
        $quoteSub4at5->usageAmount = 320;
        $quoteSub4at5->loss = 160;
        $quoteSub4at5->price = 1900;
        $quoteSub4at5->memo = "";
        $quoteSub4at5->save();

        $quoteSub4at6 = new QuoteSub4();
        $quoteSub4at6->mainId = 6;
        $quoteSub4at6->serialNumber = "SLN-20221200006";
        $quoteSub4at6->partNo = "SUB1-20221200006";
        $quoteSub4at6->materialName = "OPP自黏袋";
        $quoteSub4at6->length = 710;
        $quoteSub4at6->width = 370;
        $quoteSub4at6->height = 80;
        $quoteSub4at6->origin = "國產";
        $quoteSub4at6->thickness = 0.019;
        $quoteSub4at6->usageAmount = 490;
        $quoteSub4at6->loss = 290;
        $quoteSub4at6->price = 4850;
        $quoteSub4at6->memo = "";
        $quoteSub4at6->save();

        $quoteSub4at7 = new QuoteSub4();
        $quoteSub4at7->mainId = 7;
        $quoteSub4at7->serialNumber = "SLN-20221200007";
        $quoteSub4at7->partNo = "SUB1-20221200007";
        $quoteSub4at7->materialName = "PE袋";
        $quoteSub4at7->length = 610;
        $quoteSub4at7->width = 430;
        $quoteSub4at7->height = 390;
        $quoteSub4at7->origin = "國產";
        $quoteSub4at7->thickness = 0.019;
        $quoteSub4at7->usageAmount = 510;
        $quoteSub4at7->loss = 188;
        $quoteSub4at7->price = 3490;
        $quoteSub4at7->memo = "";
        $quoteSub4at7->save();

        $quoteSub4at8 = new QuoteSub4();
        $quoteSub4at8->mainId = 8;
        $quoteSub4at8->serialNumber = "SLN-20221200008";
        $quoteSub4at8->partNo = "SUB1-20221200008";
        $quoteSub4at8->materialName = "PE夾縫袋";
        $quoteSub4at8->length = 670;
        $quoteSub4at8->width = 560;
        $quoteSub4at8->height = 124;
        $quoteSub4at8->origin = "國產";
        $quoteSub4at8->thickness = 0.037;
        $quoteSub4at8->usageAmount = 390;
        $quoteSub4at8->loss = 160;
        $quoteSub4at8->price = 2190;
        $quoteSub4at8->memo = "";
        $quoteSub4at8->save();

        $quoteSub4at9 = new QuoteSub4();
        $quoteSub4at9->mainId = 9;
        $quoteSub4at9->serialNumber = "SLN-20221200009";
        $quoteSub4at9->partNo = "SUB1-20221200009";
        $quoteSub4at9->materialName = "POF膜";
        $quoteSub4at9->length = 455;
        $quoteSub4at9->width = 805;
        $quoteSub4at9->height = 133;
        $quoteSub4at9->origin = "進口";
        $quoteSub4at9->thickness = 0.019;
        $quoteSub4at9->usageAmount = 330;
        $quoteSub4at9->loss = 210;
        $quoteSub4at9->price = 3400;
        $quoteSub4at9->memo = "";
        $quoteSub4at9->save();

        $quoteSub4at10 = new QuoteSub4();
        $quoteSub4at10->mainId = 10;
        $quoteSub4at10->serialNumber = "SLN-20221200010";
        $quoteSub4at10->partNo = "SUB1-20221200010";
        $quoteSub4at10->materialName = "POF袋";
        $quoteSub4at10->length = 105;
        $quoteSub4at10->width = 230;
        $quoteSub4at10->height = 80;
        $quoteSub4at10->origin = "進口";
        $quoteSub4at10->thickness = 0.019;
        $quoteSub4at10->usageAmount = 290;
        $quoteSub4at10->loss = 15;
        $quoteSub4at10->price = 3200;
        $quoteSub4at10->memo = "";
        $quoteSub4at10->save();

        $quoteSub4at11 = new QuoteSub4();
        $quoteSub4at11->mainId = 11;
        $quoteSub4at11->serialNumber = "SLN-20221200011";
        $quoteSub4at11->partNo = "SUB1-20221200011";
        $quoteSub4at11->materialName = "PET袋";
        $quoteSub4at11->length = 175;
        $quoteSub4at11->width = 120;
        $quoteSub4at11->height = 65;
        $quoteSub4at11->origin = "進口";
        $quoteSub4at11->thickness = 0.025;
        $quoteSub4at11->usageAmount = 55;
        $quoteSub4at11->loss = 20;
        $quoteSub4at11->price = 650;
        $quoteSub4at11->memo = "";
        $quoteSub4at11->save();

        $quoteSub4at12 = new QuoteSub4();
        $quoteSub4at12->mainId = 12;
        $quoteSub4at12->serialNumber = "SLN-20221200012";
        $quoteSub4at12->partNo = "SUB1-20221200012";
        $quoteSub4at12->materialName = "自封袋";
        $quoteSub4at12->length = 244;
        $quoteSub4at12->width = 103;
        $quoteSub4at12->height = 92;
        $quoteSub4at12->origin = "進口";
        $quoteSub4at12->thickness = 0.019;
        $quoteSub4at12->usageAmount = 398;
        $quoteSub4at12->loss = 16;
        $quoteSub4at12->price = 340;
        $quoteSub4at12->memo = "";
        $quoteSub4at12->save();

        $quoteSub4at13 = new QuoteSub4();
        $quoteSub4at13->mainId = 13;
        $quoteSub4at13->serialNumber = "SLN-20221200013";
        $quoteSub4at13->partNo = "SUB1-20221200013";
        $quoteSub4at13->materialName = "OPP袋";
        $quoteSub4at13->length = 280;
        $quoteSub4at13->width = 96;
        $quoteSub4at13->height = 70;
        $quoteSub4at13->origin = "進口";
        $quoteSub4at13->thickness = 0.037;
        $quoteSub4at13->usageAmount = 450;
        $quoteSub4at13->loss = 18;
        $quoteSub4at13->price = 465;
        $quoteSub4at13->memo = "";
        $quoteSub4at13->save();

        $quoteSub4at14 = new QuoteSub4();
        $quoteSub4at14->mainId = 14;
        $quoteSub4at14->serialNumber = "SLN-20221200014";
        $quoteSub4at14->partNo = "SUB1-20221200014";
        $quoteSub4at14->materialName = "OPP自黏袋";
        $quoteSub4at14->length = 235;
        $quoteSub4at14->width = 157;
        $quoteSub4at14->height = 115;
        $quoteSub4at14->origin = "進口";
        $quoteSub4at14->thickness = 0.025;
        $quoteSub4at14->usageAmount = 880;
        $quoteSub4at14->loss = 130;
        $quoteSub4at14->price = 890;
        $quoteSub4at14->memo = "";
        $quoteSub4at14->save();

        $quoteSub4at15 = new QuoteSub4();
        $quoteSub4at15->mainId = 15;
        $quoteSub4at15->serialNumber = "SLN-20221200015";
        $quoteSub4at15->partNo = "SUB1-20221200015";
        $quoteSub4at15->materialName = "PE袋";
        $quoteSub4at15->length = 260;
        $quoteSub4at15->width = 120;
        $quoteSub4at15->height = 130;
        $quoteSub4at15->origin = "進口";
        $quoteSub4at15->thickness = 0.037;
        $quoteSub4at15->usageAmount = 980;
        $quoteSub4at15->loss = 85;
        $quoteSub4at15->price = 60;
        $quoteSub4at15->memo = "";
        $quoteSub4at15->save();

        $quoteSub4at16 = new QuoteSub4();
        $quoteSub4at16->mainId = 16;
        $quoteSub4at16->serialNumber = "SLN-20221200016";
        $quoteSub4at16->partNo = "SUB1-20221200016";
        $quoteSub4at16->materialName = "PE夾縫袋";
        $quoteSub4at16->length = 265;
        $quoteSub4at16->width = 165;
        $quoteSub4at16->height = 125;
        $quoteSub4at16->origin = "進口";
        $quoteSub4at16->thickness = 0.019;
        $quoteSub4at16->usageAmount = 50;
        $quoteSub4at16->loss = 3;
        $quoteSub4at16->price = 9950;
        $quoteSub4at16->memo = "";
        $quoteSub4at16->save();
    }
}
