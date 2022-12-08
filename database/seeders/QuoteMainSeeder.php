<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\QuoteMain;

class QuoteMainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $quoteMain1 = new QuoteMain();
        $quoteMain1->id = 1;
        $quoteMain1->quoteCls = 1;
        $quoteMain1->customerProductNum = "P2022120001";
        $quoteMain1->productNum = "C2201001";
        $quoteMain1->productNameTw = "長軒木樑材";
        $quoteMain1->productNameEn = "Product A";
        $quoteMain1->quoteQuality = "高";
        $quoteMain1->quoteQuantity = "MOQ-1K";
        $quoteMain1->productInfo = "product info test";
        $quoteMain1->save();

        $quoteMain2 = new QuoteMain();
        $quoteMain2->id = 2;
        $quoteMain2->quoteCls = 1;
        $quoteMain2->customerProductNum = "P2022120002";
        $quoteMain2->productNum = "C2201002";
        $quoteMain2->productNameTw = "長軒木樑材";
        $quoteMain2->productNameEn = "Product B";
        $quoteMain2->quoteQuality = "中高";
        $quoteMain2->quoteQuantity = "3K";
        $quoteMain2->productInfo = "product info test";
        $quoteMain2->save();

        $quoteMain3 = new QuoteMain();
        $quoteMain3->id = 3;
        $quoteMain3->quoteCls = 1;
        $quoteMain3->customerProductNum = "P2022120003";
        $quoteMain3->productNum = "C2201003";
        $quoteMain3->productNameTw = "換崁山岳羽";
        $quoteMain3->productNameEn = "Product C";
        $quoteMain3->quoteQuality = "低";
        $quoteMain3->quoteQuantity = "10K";
        $quoteMain3->productInfo = "product info test";
        $quoteMain3->save();

        $quoteMain4 = new QuoteMain();
        $quoteMain4->id = 4;
        $quoteMain4->quoteCls = 2;
        $quoteMain4->customerProductNum = "P2022120004";
        $quoteMain4->productNum = "C2201004";
        $quoteMain4->productNameTw = "木宇習維尼";
        $quoteMain4->productNameEn = "Product D";
        $quoteMain4->quoteQuality = "普通";
        $quoteMain4->quoteQuantity = "5K";
        $quoteMain4->productInfo = "product info test";
        $quoteMain4->save();

        $quoteMain5 = new QuoteMain();
        $quoteMain5->id = 5;
        $quoteMain5->quoteCls = 2;
        $quoteMain5->customerProductNum = "P2022120005";
        $quoteMain5->productNum = "C2201005";
        $quoteMain5->productNameTw = "百練成生軒";
        $quoteMain5->productNameEn = "Product E";
        $quoteMain5->quoteQuality = "中高";
        $quoteMain5->quoteQuantity = "3K";
        $quoteMain5->productInfo = "product info test";
        $quoteMain5->save();

        $quoteMain6 = new QuoteMain();
        $quoteMain6->id = 6;
        $quoteMain6->quoteCls = 2;
        $quoteMain6->customerProductNum = "P2022120006";
        $quoteMain6->productNum = "C2201006";
        $quoteMain6->productNameTw = "凍馬鈴薯好吃";
        $quoteMain6->productNameEn = "Product F";
        $quoteMain6->quoteQuality = "普通";
        $quoteMain6->quoteQuantity = "10K";
        $quoteMain6->productInfo = "product info test";
        $quoteMain6->save();

        $quoteMain7 = new QuoteMain();
        $quoteMain7->id = 7;
        $quoteMain7->quoteCls = 2;
        $quoteMain7->customerProductNum = "P2022120007";
        $quoteMain7->productNum = "C2201007";
        $quoteMain7->productNameTw = "橡膠冷凝凍";
        $quoteMain7->productNameEn = "Product G";
        $quoteMain7->quoteQuality = "高";
        $quoteMain7->quoteQuantity = "MOQ-1K";
        $quoteMain7->productInfo = "product info test";
        $quoteMain7->save();

        $quoteMain8 = new QuoteMain();
        $quoteMain8->id = 8;
        $quoteMain8->quoteCls = 1;
        $quoteMain8->customerProductNum = "P2022120008";
        $quoteMain8->productNum = "C2201008";
        $quoteMain8->productNameTw = "天然草本綠";
        $quoteMain8->productNameEn = "Product H";
        $quoteMain8->quoteQuality = "低";
        $quoteMain8->quoteQuantity = "5K";
        $quoteMain8->productInfo = "product info test";
        $quoteMain8->save();

        $quoteMain9 = new QuoteMain();
        $quoteMain9->id = 9;
        $quoteMain9->quoteCls = 1;
        $quoteMain9->customerProductNum = "P2022120009";
        $quoteMain9->productNum = "C2201009";
        $quoteMain9->productNameTw = "陸行草岳明";
        $quoteMain9->productNameEn = "Product I";
        $quoteMain9->quoteQuality = "普通";
        $quoteMain9->quoteQuantity = "3K";
        $quoteMain9->productInfo = "product info test";
        $quoteMain9->save();

        $quoteMain10 = new QuoteMain();
        $quoteMain10->id = 10;
        $quoteMain10->quoteCls = 1;
        $quoteMain10->customerProductNum = "P2022120010";
        $quoteMain10->productNum = "C2201010";
        $quoteMain10->productNameTw = "太行行山丘";
        $quoteMain10->productNameEn = "Product J";
        $quoteMain10->quoteQuality = "高";
        $quoteMain10->quoteQuantity = "MOQ-1K";
        $quoteMain10->productInfo = "product info test";
        $quoteMain10->save();

        $quoteMain11 = new QuoteMain();
        $quoteMain11->id = 11;
        $quoteMain11->quoteCls = 1;
        $quoteMain11->customerProductNum = "P2022120011";
        $quoteMain11->productNum = "C2201011";
        $quoteMain11->productNameTw = "船談閱兵型";
        $quoteMain11->productNameEn = "Product K";
        $quoteMain11->quoteQuality = "中高";
        $quoteMain11->quoteQuantity = "MOQ-1K";
        $quoteMain11->productInfo = "product info test";
        $quoteMain11->save();

        $quoteMain12 = new QuoteMain();
        $quoteMain12->id = 12;
        $quoteMain12->quoteCls = 1;
        $quoteMain12->customerProductNum = "P2022120012";
        $quoteMain12->productNum = "C2201012";
        $quoteMain12->productNameTw = "駢駢站豐原";
        $quoteMain12->productNameEn = "Product L";
        $quoteMain12->quoteQuality = "低";
        $quoteMain12->quoteQuantity = "10K";
        $quoteMain12->productInfo = "product info test";
        $quoteMain12->save();

        $quoteMain13 = new QuoteMain();
        $quoteMain13->id = 13;
        $quoteMain13->quoteCls = 1;
        $quoteMain13->customerProductNum = "P2022120013";
        $quoteMain13->productNum = "C2201013";
        $quoteMain13->productNameTw = "東師安校彭";
        $quoteMain13->productNameEn = "Product M";
        $quoteMain13->quoteQuality = "低";
        $quoteMain13->quoteQuantity = "10K";
        $quoteMain13->productInfo = "product info test";
        $quoteMain13->save();

        $quoteMain14 = new QuoteMain();
        $quoteMain14->id = 14;
        $quoteMain14->quoteCls = 3;
        $quoteMain14->customerProductNum = "P2022120014";
        $quoteMain14->productNum = "C2201014";
        $quoteMain14->productNameTw = "西遠淵長劉";
        $quoteMain14->productNameEn = "Product N";
        $quoteMain14->quoteQuality = "低";
        $quoteMain14->quoteQuantity = "5K";
        $quoteMain14->productInfo = "product info test";
        $quoteMain14->save();

        $quoteMain15 = new QuoteMain();
        $quoteMain15->id = 15;
        $quoteMain15->quoteCls = 3;
        $quoteMain15->customerProductNum = "P2022120015";
        $quoteMain15->productNum = "C2201015";
        $quoteMain15->productNameTw = "到產萬畝金";
        $quoteMain15->productNameEn = "Product O";
        $quoteMain15->quoteQuality = "低";
        $quoteMain15->quoteQuantity = "10K";
        $quoteMain15->productInfo = "product info test";
        $quoteMain15->save();

        $quoteMain16 = new QuoteMain();
        $quoteMain16->id = 16;
        $quoteMain16->quoteCls = 3;
        $quoteMain16->customerProductNum = "P2022120016";
        $quoteMain16->productNum = "C2201016";
        $quoteMain16->productNameTw = "精巧煉獄新";
        $quoteMain16->productNameEn = "Product P";
        $quoteMain16->quoteQuality = "中高";
        $quoteMain16->quoteQuantity = "3K";
        $quoteMain16->productInfo = "product info test";
        $quoteMain16->save();

        $quoteMain17 = new QuoteMain();
        $quoteMain17->id = 17;
        $quoteMain17->quoteCls = 3;
        $quoteMain17->customerProductNum = "P2022120017";
        $quoteMain17->productNum = "C2201017";
        $quoteMain17->productNameTw = "蒙恬電子板";
        $quoteMain17->productNameEn = "Product Q";
        $quoteMain17->quoteQuality = "普通";
        $quoteMain17->quoteQuantity = "3K";
        $quoteMain17->productInfo = "product info test";
        $quoteMain17->save();

        $quoteMain18 = new QuoteMain();
        $quoteMain18->id = 18;
        $quoteMain18->quoteCls = 2;
        $quoteMain18->customerProductNum = "P2022120018";
        $quoteMain18->productNum = "C2201018";
        $quoteMain18->productNameTw = "度月薪新漁";
        $quoteMain18->productNameEn = "Product R";
        $quoteMain18->quoteQuality = "高";
        $quoteMain18->quoteQuantity = "5K";
        $quoteMain18->productInfo = "product info test";
        $quoteMain18->save();

        $quoteMain19 = new QuoteMain();
        $quoteMain19->id = 19;
        $quoteMain19->quoteCls = 2;
        $quoteMain19->customerProductNum = "P2022120019";
        $quoteMain19->productNum = "C2201019";
        $quoteMain19->productNameTw = "忌憚重九重";
        $quoteMain19->productNameEn = "Product S";
        $quoteMain19->quoteQuality = "中高";
        $quoteMain19->quoteQuantity = "MOQ-1K";
        $quoteMain19->productInfo = "product info test";
        $quoteMain19->save();

        $quoteMain20 = new QuoteMain();
        $quoteMain20->id = 20;
        $quoteMain20->quoteCls = 2;
        $quoteMain20->customerProductNum = "P2022120020";
        $quoteMain20->productNum = "C2201020";
        $quoteMain20->productNameTw = "威士忌名酒";
        $quoteMain20->productNameEn = "Product T";
        $quoteMain20->quoteQuality = "高";
        $quoteMain20->quoteQuantity = "MOQ-1K";
        $quoteMain20->productInfo = "product info test";
        $quoteMain20->save();
    }
}
