<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Repositories\QuoteRepository;
use Tests\TestCase;
use Exception;

class QuoteSub8Test extends TestCase
{
    public function setUp() : void {
        parent::setUp();
        shell_exec('php artisan migrate --path=/database/migrations/20221207/');
        shell_exec('php artisan migrate --path=/database/migrations/20230111/');
        shell_exec('php artisan migrate --path=/database/migrations/20230131/');
        shell_exec('php artisan migrate --path=/database/migrations/20230215/');
        shell_exec('php artisan migrate --path=/database/migrations/20230217/');
        shell_exec('php artisan migrate --path=/database/migrations/20230427/');
        shell_exec('php artisan db:seed --class=QuoteMainSeeder');
        shell_exec('php artisan db:seed --class=QuoteSub2Seeder');
        shell_exec('php artisan db:seed --class=QuoteSub3Seeder');
        shell_exec('php artisan db:seed --class=QuoteSub4Seeder');
        shell_exec('php artisan db:seed --class=QuoteSub5Seeder');
        shell_exec('php artisan db:seed --class=QuoteSub6Seeder');
        shell_exec('php artisan db:seed --class=QuoteSub7Seeder');
        shell_exec('php artisan db:seed --class=QuoteSub8Seeder');
    }

    public function tearDown() : void {
        shell_exec('php artisan DropTables');
    }

    public function testGetSub8ByMainId() {
        $quoteRepo = new QuoteRepository();
        $quoteSub8at1 = $quoteRepo->getSub8ByMainId(1);
        $this->assertEquals(1, $quoteSub8at1->mainId);
        $this->assertEquals(7800, $quoteSub8at1->sub2Price);
        $this->assertEquals(15600, $quoteSub8at1->sub2SubTotal);
        $this->assertEquals("莊鴻瑜", $quoteSub8at1->purchaseName);
        $this->assertEquals("2023-02-01 00:00:00", $quoteSub8at1->purchaseFillDate);

        try {
            $quoteSub8at2 = $quoteRepo->getSub8ByMainId(99);
            $this->assertEquals(true, false);
        }
        catch(Exception $e) {
            $this->assertEquals("指定資料不存在", $e->getMessage());
        }

        $quoteSub8at3 = $quoteRepo->getSub8ByMainId(11);
        $this->assertEquals(11, $quoteSub8at3->mainId);
        $this->assertEquals(1500, $quoteSub8at3->sub6Price);
        $this->assertEquals(6000, $quoteSub8at3->sub6SubTotal);
        $this->assertEquals("莊鴻瑜", $quoteSub8at3->purchaseName);
        $this->assertEquals("2023-02-02 00:00:00", $quoteSub8at3->purchaseFillDate);
    }

    public function testCreateSub8() {
        $quoteRepo = new QuoteRepository();
        $paramCreate1 = [
            'mainId' => 99,
        ];
        try {
            $quoteRepo->createSub8($paramCreate1);
            $this->assertEquals(true, false);
        }
        catch(Exception $e) {
            $this->assertEquals("指定資料不存在", $e->getMessage());
        }

        $paramCreate2 = [
            'mainId' => 11,
        ];
        try {
            $quoteRepo->createSub8($paramCreate2);
            $this->assertEquals(true, false);
        }
        catch(Exception $e) {
            $this->assertEquals("子資料已存在", $e->getMessage());
        }

        $paramCreate3 = [
            'mainId' => 12,
            'sub1Price' => 3200,
            'sub1SubTotal' => 3200,
            'sub2Price' => 2700,
            'sub2SubTotal' => 5400,
            'sub3Price' => 4200,
            'sub3SubTotal' => 8400,
            'sub3_1Price' => 8000,
            'sub3_1SubTotal' => 8000,
            'sub4Price' => 3200,
            'sub4SubTotal' => 3200,
            'sub5Price' => 2700,
            'sub5SubTotal' => 5400,
            'sub6Price' => 3200,
            'sub6SubTotal' => 3200,
            'sub7Price' => 2700,
            'sub7SubTotal' => 5400,
            'purchaseName' => '鍾漢強',
            'purchaseFillDate' =>  '2023-04-01 00:00:00',
            'reviewName' => "李佳君",
            'reviewFillDate' => "2023-04-02 00:00:00",
        ];
        $quoteRepo->createSub8($paramCreate3);

        $quoteSub8at1 = $quoteRepo->getSub8ByMainId(12);
        $this->assertEquals(12, $quoteSub8at1->mainId);
        $this->assertEquals(3200, $quoteSub8at1->sub1Price);
        $this->assertEquals(3200, $quoteSub8at1->sub1SubTotal);
        $this->assertEquals(2700, $quoteSub8at1->sub7Price);
        $this->assertEquals(5400, $quoteSub8at1->sub7SubTotal);
        $this->assertEquals("李佳君", $quoteSub8at1->reviewName);
        $this->assertEquals("2023-04-02 00:00:00", $quoteSub8at1->reviewFillDate);
    }

    public function testUpdateSub8() {
        $quoteRepo = new QuoteRepository();
        try {
            $quoteRepo->updateSub8ByMainId(99, []);
            $this->assertEquals(false, true);
        }
        catch(Exception $e) {
            $this->assertEquals("指定資料不存在", $e->getMessage());
        }

        $paramUpdate1 = [
            'sub1Price' => 3200,
            'sub1SubTotal' => 3200,
            'sub2Price' => 2700,
            'sub2SubTotal' => 5400,
            'sub3Price' => 4200,
            'sub3SubTotal' => 8400,
            'sub3_1Price' => 8000,
            'sub3_1SubTotal' => 8000,
            'sub4Price' => 3200,
            'sub4SubTotal' => 3200,
            'sub5Price' => 2700,
            'sub5SubTotal' => 5400,
            'sub6Price' => 3200,
            'sub6SubTotal' => 3200,
            'sub7Price' => 2700,
            'sub7SubTotal' => 5400,
            'purchaseName' => '鍾漢強2',
            'purchaseFillDate' =>  '2023-04-01 00:00:00',
            'reviewName' => "李佳君",
            'reviewFillDate' => "2023-04-02 00:00:00",
        ];
        $quoteRepo->updateSub8ByMainId(3, $paramUpdate1);
        $quoteSub8at1 = $quoteRepo->getSub8ByMainId(3);
        $this->assertEquals(3, $quoteSub8at1->mainId);
        $this->assertEquals(4200, $quoteSub8at1->sub3Price);
        $this->assertEquals(8400, $quoteSub8at1->sub3SubTotal);
        $this->assertEquals(3200, $quoteSub8at1->sub6Price);
        $this->assertEquals(3200, $quoteSub8at1->sub6SubTotal);
        $this->assertEquals("鍾漢強2", $quoteSub8at1->purchaseName);
        $this->assertEquals("2023-04-01 00:00:00", $quoteSub8at1->purchaseFillDate);
    }
}
