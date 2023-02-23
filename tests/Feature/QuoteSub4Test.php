<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Repositories\QuoteRepository;
use Tests\TestCase;
use Exception;

class QuoteSub4Test extends TestCase
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
    }

    public function tearDown() : void {
        shell_exec('php artisan DropTables');
    }

    public function testGetSub4ByMainId() {
        $quoteRepo = new QuoteRepository();
        $quoteSub4at1 = $quoteRepo->getSub4ByMainId(1);
        $this->assertEquals(1, $quoteSub4at1->mainId);
        $this->assertEquals("SUB1-20221200001", $quoteSub4at1->partNo);
        $this->assertEquals("POF膜", $quoteSub4at1->materialName);
        $this->assertEquals(380, $quoteSub4at1->length);
        $this->assertEquals(0.019, $quoteSub4at1->thickness);

        try {
            $quoteSub4at2 = $quoteRepo->getSub4ByMainId(99);
            $this->assertEquals(true, false);
        }
        catch(Exception $e) {
            $this->assertEquals("指定資料不存在", $e->getMessage());
        }

        $quoteSub4at3 = $quoteRepo->getSub4ByMainId(16);
        $this->assertEquals(16, $quoteSub4at3->mainId);
        $this->assertEquals("SUB1-20221200016", $quoteSub4at3->partNo);
        $this->assertEquals("PE夾縫袋", $quoteSub4at3->materialName);
        $this->assertEquals(265, $quoteSub4at3->length);
        $this->assertEquals(0.019, $quoteSub4at3->thickness);
    }
}
