<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Repositories\QuoteRepository;
use Tests\TestCase;
use Exception;

class QuoteSub7_1Test extends TestCase
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
        shell_exec('php artisan db:seed --class=QuoteSub7_1Seeder');
    }

    public function tearDown() : void {
        shell_exec('php artisan DropTables');
    }

    public function testGetSub7_1ByMainId() {
        $quoteRepo = new QuoteRepository();
        $quoteSub7_1at1 = $quoteRepo->getSub7_1ByMainId(1);
        $this->assertEquals(1, $quoteSub7_1at1->mainId);
        $this->assertEquals("SLN-20221200001", $quoteSub7_1at1->serialNumber);
        $this->assertEquals("鞋底板", $quoteSub7_1at1->processName);
        $this->assertEquals(1200, $quoteSub7_1at1->localNeedSec);
        $this->assertEquals(400, $quoteSub7_1at1->usageAmount);

        try {
            $quoteSub7_1at2 = $quoteRepo->getSub7_1ByMainId(99);
            $this->assertEquals(true, false);
        }
        catch(Exception $e) {
            $this->assertEquals("指定資料不存在", $e->getMessage());
        }

        $quoteSub7_1at3 = $quoteRepo->getSub7_1ByMainId(13);
        $this->assertEquals(13, $quoteSub7_1at3->mainId);
        $this->assertEquals("SLN-20221200013", $quoteSub7_1at3->serialNumber);
        $this->assertEquals("修邊", $quoteSub7_1at3->processName);
        $this->assertEquals(580, $quoteSub7_1at3->localNeedSec);
        $this->assertEquals(170, $quoteSub7_1at3->usageAmount);
    }
}
