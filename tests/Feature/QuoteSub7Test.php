<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Repositories\QuoteRepository;
use Tests\TestCase;
use Exception;

class QuoteSub7Test extends TestCase
{
    public function setUp() : void {
        parent::setUp();
        shell_exec('php artisan migrate --path=/database/migrations/20221207/');
        shell_exec('php artisan migrate --path=/database/migrations/20230111/');
        shell_exec('php artisan migrate --path=/database/migrations/20230131/');
        shell_exec('php artisan migrate --path=/database/migrations/20230215/');
        shell_exec('php artisan migrate --path=/database/migrations/20230217/');
        shell_exec('php artisan db:seed --class=QuoteMainSeeder');
        shell_exec('php artisan db:seed --class=QuoteSub2Seeder');
        shell_exec('php artisan db:seed --class=QuoteSub3Seeder');
        shell_exec('php artisan db:seed --class=QuoteSub4Seeder');
        shell_exec('php artisan db:seed --class=QuoteSub5Seeder');
        shell_exec('php artisan db:seed --class=QuoteSub6Seeder');
        shell_exec('php artisan db:seed --class=QuoteSub7Seeder');
    }

    public function tearDown() : void {
        shell_exec('php artisan DropTables');
    }

    public function testGetSub7ByMainId() {
        $quoteRepo = new QuoteRepository();
        $quoteSub7at1 = $quoteRepo->getSub7ByMainId(1);
        $this->assertEquals(1, $quoteSub7at1->mainId);
        $this->assertEquals("SLN-20221200001", $quoteSub7at1->serialNumber);
        $this->assertEquals("鞋底板", $quoteSub7at1->processName);
        $this->assertEquals(25, $quoteSub7at1->localNeedSec);
        $this->assertEquals(400, $quoteSub7at1->usageAmount);

        try {
            $quoteSub7at2 = $quoteRepo->getSub7ByMainId(99);
            $this->assertEquals(true, false);
        }
        catch(Exception $e) {
            $this->assertEquals("指定資料不存在", $e->getMessage());
        }

        $quoteSub7at3 = $quoteRepo->getSub7ByMainId(13);
        $this->assertEquals(13, $quoteSub7at3->mainId);
        $this->assertEquals("SLN-20221200013", $quoteSub7at3->serialNumber);
        $this->assertEquals("修邊", $quoteSub7at3->processName);
        $this->assertEquals(415, $quoteSub7at3->localNeedSec);
        $this->assertEquals(25, $quoteSub7at3->usageAmount);
    }

    public function testCreateSub7() {
        $quoteRepo = new QuoteRepository();
        $paramCreate1 = [
            'mainId' => 99,
        ];
        try {
            $quoteRepo->createSub7($paramCreate1);
            $this->assertEquals(true, false);
        }
        catch(Exception $e) {
            $this->assertEquals("指定資料不存在", $e->getMessage());
        }

        $paramCreate2 = [
            'mainId' => 13,
        ];
        try {
            $quoteRepo->createSub7($paramCreate2);
            $this->assertEquals(true, false);
        }
        catch(Exception $e) {
            $this->assertEquals("子資料已存在", $e->getMessage());
        }

        $paramCreate3 = [
            'mainId' => 14,
            'serialNumber' => 'SLN-20221200014',
            'processName' =>  '敲定',
            'materialName' => "OPP袋",
            'processMemo' => "",
            'localNeedSec' => 320,
            'usageAmount' => 210,
            'localNeedNum' => 270,
            'outProcessPrice' => 180,
        ];
        $quoteRepo->createSub7($paramCreate3);

        $quoteSub7at1 = $quoteRepo->getSub7ByMainId(14);
        $this->assertEquals(14, $quoteSub7at1->mainId);
        $this->assertEquals("敲定", $quoteSub7at1->processName);
        $this->assertEquals("OPP袋", $quoteSub7at1->materialName);
        $this->assertEquals(320, $quoteSub7at1->localNeedSec);
        $this->assertEquals(210, $quoteSub7at1->usageAmount);
        $this->assertEquals(270, $quoteSub7at1->localNeedNum);
        $this->assertEquals(180, $quoteSub7at1->outProcessPrice);
    }

    public function testUpdateSub7() {
        $quoteRepo = new QuoteRepository();
        try {
            $quoteRepo->updateSub7ByMainId(99, []);
            $this->assertEquals(false, true);
        }
        catch(Exception $e) {
            $this->assertEquals("指定資料不存在", $e->getMessage());
        }

        $paramUpdate1 = [
            'serialNumber' => "SLN-20221200999",
            'processName' =>  '敲定',
            'materialName' => "OPP袋",
            'processMemo' => "updated by tdd",
            'localNeedSec' => 320,
            'usageAmount' => 210,
            'localNeedNum' => 270,
            'outProcessPrice' => 180,
        ];
        $quoteRepo->updateSub7ByMainId(3, $paramUpdate1);
        $quoteSub7at1 = $quoteRepo->getSub7ByMainId(3);
        $this->assertEquals(3, $quoteSub7at1->mainId);
        $this->assertEquals("SLN-20221200999", $quoteSub7at1->serialNumber);
        $this->assertEquals("敲定", $quoteSub7at1->processName);
        $this->assertEquals("OPP袋", $quoteSub7at1->materialName);
        $this->assertEquals(320, $quoteSub7at1->localNeedSec);
        $this->assertEquals(210, $quoteSub7at1->usageAmount);
        $this->assertEquals(270, $quoteSub7at1->localNeedNum);
        $this->assertEquals(180, $quoteSub7at1->outProcessPrice);
        $this->assertEquals("updated by tdd", $quoteSub7at1->processMemo);
    }
}
