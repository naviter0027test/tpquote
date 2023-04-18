<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Repositories\QuoteRepository;
use Tests\TestCase;
use Exception;

class QuoteSub5Test extends TestCase
{
    public function setUp() : void {
        parent::setUp();
        shell_exec('php artisan migrate --path=/database/migrations/20221207/');
        shell_exec('php artisan migrate --path=/database/migrations/20230111/');
        shell_exec('php artisan migrate --path=/database/migrations/20230131/');
        shell_exec('php artisan migrate --path=/database/migrations/20230215/');
        shell_exec('php artisan db:seed --class=QuoteMainSeeder');
        shell_exec('php artisan db:seed --class=QuoteSub2Seeder');
        shell_exec('php artisan db:seed --class=QuoteSub3Seeder');
        shell_exec('php artisan db:seed --class=QuoteSub4Seeder');
        shell_exec('php artisan db:seed --class=QuoteSub5Seeder');
    }

    public function tearDown() : void {
        shell_exec('php artisan DropTables');
    }

    public function testGetSub5ByMainId() {
        $quoteRepo = new QuoteRepository();
        $quoteSub5at1 = $quoteRepo->getSub5ByMainId(1);
        $this->assertEquals(1, $quoteSub5at1->mainId);
        $this->assertEquals(53, $quoteSub5at1->orderNum);
        $this->assertEquals(120, $quoteSub5at1->priceSubtotal);
        $this->assertEquals(25, $quoteSub5at1->flattenSubtotal);
        $this->assertEquals("展示盒", $quoteSub5at1->packageMethod);
        $this->assertEquals("展示盒", $quoteSub5at1->boxMethod);
        $this->assertEquals("2023-03-01 12:00:00", $quoteSub5at1->fillDate);

        try {
            $quoteSub5at2 = $quoteRepo->getSub5ByMainId(99);
            $this->assertEquals(true, false);
        }
        catch(Exception $e) {
            $this->assertEquals("指定資料不存在", $e->getMessage());
        }

        $quoteSub5at3 = $quoteRepo->getSub5ByMainId(15);
        $this->assertEquals(15, $quoteSub5at3->mainId);
        $this->assertEquals(85, $quoteSub5at3->orderNum);
        $this->assertEquals(1900, $quoteSub5at3->priceSubtotal);
        $this->assertEquals(3800, $quoteSub5at3->flattenSubtotal);
        $this->assertEquals("展示盒", $quoteSub5at3->packageMethod);
        $this->assertEquals("外箱", $quoteSub5at3->boxMethod);
        $this->assertEquals("2023-03-01 16:00:00", $quoteSub5at3->fillDate);
    }

    public function testCreateSub5() {
        $quoteRepo = new QuoteRepository();
        $paramCreate1 = [
            'mainId' => 99,
        ];
        try {
            $quoteRepo->createSub5($paramCreate1);
            $this->assertEquals(true, false);
        }
        catch(Exception $e) {
            $this->assertEquals("指定資料不存在", $e->getMessage());
        }

        $paramCreate2 = [
            'mainId' => 15,
        ];
        try {
            $quoteRepo->createSub5($paramCreate2);
            $this->assertEquals(true, false);
        }
        catch(Exception $e) {
            $this->assertEquals("子資料已存在", $e->getMessage());
        }

        $paramCreate3 = [
            'mainId' => 16,
            'serialNumber' => 'SLN-20221200016',
            'memo' => 'created from tdd',
            'orderNum' => 350,
            'priceSubtotal' => 2280,
            'flattenSubtotal' => 1600,
            'packageMethod' => "木盒",
            'boxMethod' => "外箱",
            'fillDate' => "2023-03-01 17:00:00",
            'devFillDate' => "2023-03-01 17:00:00",
            'auditDate' => "2023-03-01 17:00:00",
        ];
        $quoteRepo->createSub5($paramCreate3);

        $quoteSub5at1 = $quoteRepo->getSub5ByMainId(16);
        $this->assertEquals(16, $quoteSub5at1->mainId);
        $this->assertEquals(350, $quoteSub5at1->orderNum);
        $this->assertEquals(2280, $quoteSub5at1->priceSubtotal);
        $this->assertEquals(1600, $quoteSub5at1->flattenSubtotal);
        $this->assertEquals("木盒", $quoteSub5at1->packageMethod);
        $this->assertEquals("外箱", $quoteSub5at1->boxMethod);
        $this->assertEquals("2023-03-01 17:00:00", $quoteSub5at1->fillDate);
    }

    public function testUpdateSub5() {
        $quoteRepo = new QuoteRepository();
        try {
            $quoteRepo->updateSub5ByMainId(99, []);
            $this->assertEquals(false, true);
        }
        catch(Exception $e) {
            $this->assertEquals("指定資料不存在", $e->getMessage());
        }

        $paramUpdate1 = [
            'serialNumber' => "SLN-20221200999",
            'orderNum' => 95,
            'priceSubtotal' => 645,
            'flattenSubtotal' => 85,
            'packageMethod' => '收縮',
            'memo' => 'updated by tdd',
        ];
        $quoteRepo->updateSub5ByMainId(3, $paramUpdate1);
        $quoteSub5at1 = $quoteRepo->getSub5ByMainId(3);
        $this->assertEquals(3, $quoteSub5at1->mainId);
        $this->assertEquals("SLN-20221200999", $quoteSub5at1->serialNumber);
        $this->assertEquals(95, $quoteSub5at1->orderNum);
        $this->assertEquals(645, $quoteSub5at1->priceSubtotal);
        $this->assertEquals(85, $quoteSub5at1->flattenSubtotal);
        $this->assertEquals('收縮', $quoteSub5at1->packageMethod);
        $this->assertEquals("updated by tdd", $quoteSub5at1->memo);
    }
}
