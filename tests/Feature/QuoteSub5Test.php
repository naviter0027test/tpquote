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
}
