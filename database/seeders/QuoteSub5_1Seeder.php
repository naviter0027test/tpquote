<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\QuoteSub5_1;

class QuoteSub5_1Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $quoteSub5_1at1 = new QuoteSub5_1();
        $quoteSub5_1at1->mainId = 1;
        $quoteSub5_1at1->serialNumber = "SLN-20221200001";
        $quoteSub5_1at1->proccessName = "鞋底板";
        $quoteSub5_1at1->firm = "自製";
        $quoteSub5_1at1->save();

        $quoteSub5_1at2 = new QuoteSub5_1();
        $quoteSub5_1at2->mainId = 2;
        $quoteSub5_1at2->serialNumber = "SLN-20221200002";
        $quoteSub5_1at2->proccessName = "裁面板";
        $quoteSub5_1at2->firm = "委外";
        $quoteSub5_1at2->save();

        $quoteSub5_1at3 = new QuoteSub5_1();
        $quoteSub5_1at3->mainId = 3;
        $quoteSub5_1at3->serialNumber = "SLN-20221200003";
        $quoteSub5_1at3->proccessName = "面板滾漆";
        $quoteSub5_1at3->firm = "委外";
        $quoteSub5_1at3->save();

        $quoteSub5_1at4 = new QuoteSub5_1();
        $quoteSub5_1at4->mainId = 4;
        $quoteSub5_1at4->serialNumber = "SLN-20221200004";
        $quoteSub5_1at4->proccessName = "貼紙";
        $quoteSub5_1at4->firm = "自製";
        $quoteSub5_1at4->save();

        $quoteSub5_1at5 = new QuoteSub5_1();
        $quoteSub5_1at5->mainId = 5;
        $quoteSub5_1at5->serialNumber = "SLN-20221200005";
        $quoteSub5_1at5->proccessName = "底板貼紙";
        $quoteSub5_1at5->firm = "自製";
        $quoteSub5_1at5->save();

        $quoteSub5_1at6 = new QuoteSub5_1();
        $quoteSub5_1at6->mainId = 6;
        $quoteSub5_1at6->serialNumber = "SLN-20221200006";
        $quoteSub5_1at6->proccessName = "面板熱轉印";
        $quoteSub5_1at6->firm = "自製";
        $quoteSub5_1at6->save();

        $quoteSub5_1at7 = new QuoteSub5_1();
        $quoteSub5_1at7->mainId = 7;
        $quoteSub5_1at7->serialNumber = "SLN-20221200007";
        $quoteSub5_1at7->proccessName = "鑽孔";
        $quoteSub5_1at7->firm = "自製";
        $quoteSub5_1at7->save();

        $quoteSub5_1at8 = new QuoteSub5_1();
        $quoteSub5_1at8->mainId = 8;
        $quoteSub5_1at8->serialNumber = "SLN-20221200008";
        $quoteSub5_1at8->proccessName = "面板合框+品檢";
        $quoteSub5_1at8->firm = "委外";
        $quoteSub5_1at8->save();

        $quoteSub5_1at9 = new QuoteSub5_1();
        $quoteSub5_1at9->mainId = 9;
        $quoteSub5_1at9->serialNumber = "SLN-20221200009";
        $quoteSub5_1at9->proccessName = "沖壓一刀";
        $quoteSub5_1at9->firm = "委外";
        $quoteSub5_1at9->save();

        $quoteSub5_1at10 = new QuoteSub5_1();
        $quoteSub5_1at10->mainId = 10;
        $quoteSub5_1at10->serialNumber = "SLN-20221200010";
        $quoteSub5_1at10->proccessName = "沖壓二刀+撥取出品檢";
        $quoteSub5_1at10->firm = "委外";
        $quoteSub5_1at10->save();

        $quoteSub5_1at11 = new QuoteSub5_1();
        $quoteSub5_1at11->mainId = 11;
        $quoteSub5_1at11->serialNumber = "SLN-20221200011";
        $quoteSub5_1at11->proccessName = "噴漆";
        $quoteSub5_1at11->firm = "委外";
        $quoteSub5_1at11->save();

        $quoteSub5_1at12 = new QuoteSub5_1();
        $quoteSub5_1at12->mainId = 12;
        $quoteSub5_1at12->serialNumber = "SLN-20221200012";
        $quoteSub5_1at12->proccessName = "絲印";
        $quoteSub5_1at12->firm = "委外";
        $quoteSub5_1at12->save();

        $quoteSub5_1at13 = new QuoteSub5_1();
        $quoteSub5_1at13->mainId = 13;
        $quoteSub5_1at13->serialNumber = "SLN-20221200013";
        $quoteSub5_1at13->proccessName = "修邊";
        $quoteSub5_1at13->firm = "委外";
        $quoteSub5_1at13->save();

        $quoteSub5_1at14 = new QuoteSub5_1();
        $quoteSub5_1at14->mainId = 14;
        $quoteSub5_1at14->serialNumber = "SLN-20221200014";
        $quoteSub5_1at14->proccessName = "底板烙印";
        $quoteSub5_1at14->firm = "自製";
        $quoteSub5_1at14->save();

        $quoteSub5_1at15 = new QuoteSub5_1();
        $quoteSub5_1at15->mainId = 15;
        $quoteSub5_1at15->serialNumber = "SLN-20221200015";
        $quoteSub5_1at15->proccessName = "打磨";
        $quoteSub5_1at15->firm = "自製";
        $quoteSub5_1at15->save();
    }
}
