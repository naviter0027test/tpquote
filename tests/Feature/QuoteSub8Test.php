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
}
