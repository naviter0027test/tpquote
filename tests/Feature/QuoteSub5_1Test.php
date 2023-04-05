<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Repositories\QuoteRepository;
use Tests\TestCase;
use Exception;

class QuoteSub5_1Test extends TestCase
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
        shell_exec('php artisan db:seed --class=QuoteSub3_1Seeder');
        shell_exec('php artisan db:seed --class=QuoteSub4Seeder');
        shell_exec('php artisan db:seed --class=QuoteSub5Seeder');
        shell_exec('php artisan db:seed --class=QuoteSub5_1Seeder');
    }

    public function tearDown() : void {
        shell_exec('php artisan DropTables');
    }

    public function testGetSub5_1ByMainId() {
        $quoteRepo = new QuoteRepository();
        $quoteSub5_1at1 = $quoteRepo->getSub5_1ByMainId(1);
        $this->assertEquals(1, $quoteSub5_1at1->mainId);
        $this->assertEquals("SLN-20221200001", $quoteSub5_1at1->serialNumber);
        $this->assertEquals("鞋底板", $quoteSub5_1at1->proccessName);
        $this->assertEquals("自製", $quoteSub5_1at1->firm);

        try {
            $quoteSub5_1at2 = $quoteRepo->getSub5_1ByMainId(99);
            $this->assertEquals(true, false);
        }
        catch(Exception $e) {
            $this->assertEquals("指定資料不存在", $e->getMessage());
        }

        $quoteSub5_1at3 = $quoteRepo->getSub5_1ByMainId(15);
        $this->assertEquals(15, $quoteSub5_1at3->mainId);
        $this->assertEquals("SLN-20221200015", $quoteSub5_1at3->serialNumber);
        $this->assertEquals("打磨", $quoteSub5_1at3->proccessName);
        $this->assertEquals("自製", $quoteSub5_1at3->firm);
    }
}
