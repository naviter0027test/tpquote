<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Repositories\QuoteRepository;
use Tests\TestCase;
use Exception;

class QuoteSub3Test extends TestCase
{
    public function setUp() : void {
        parent::setUp();
        shell_exec('php artisan migrate --path=/database/migrations/20221207/');
        shell_exec('php artisan migrate --path=/database/migrations/20230111/');
        shell_exec('php artisan migrate --path=/database/migrations/20230131/');
        shell_exec('php artisan db:seed --class=QuoteMainSeeder');
        shell_exec('php artisan db:seed --class=QuoteSub2Seeder');
        shell_exec('php artisan db:seed --class=QuoteSub3Seeder');
    }

    public function tearDown() : void {
        shell_exec('php artisan DropTables');
    }

    public function testGetSub3ByMainId() {
        $quoteRepo = new QuoteRepository();
        $quoteSub3at1 = $quoteRepo->getSub3ByMainId(1);
        $this->assertEquals(1, $quoteSub3at1->mainId);
        $this->assertEquals("SUB1-20221200001", $quoteSub3at1->partNo);
        $this->assertEquals("膠磁", $quoteSub3at1->materialName);
        $this->assertEquals(420, $quoteSub3at1->length);
        $this->assertEquals("H9mm", $quoteSub3at1->spec);

        try {
            $quoteSub3at2 = $quoteRepo->getSub3ByMainId(99);
            $this->assertEquals(true, false);
        }
        catch(Exception $e) {
            $this->assertEquals("指定資料不存在", $e->getMessage());
        }
    }
}
