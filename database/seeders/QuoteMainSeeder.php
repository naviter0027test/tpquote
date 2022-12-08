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
    }
}
