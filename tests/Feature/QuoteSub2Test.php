<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Repositories\QuoteRepository;
use Tests\TestCase;
use Exception;

class QuoteSub2Test extends TestCase
{
    public function setUp() : void {
        parent::setUp();
        shell_exec('php artisan migrate --path=/database/migrations/20221207/');
        shell_exec('php artisan migrate --path=/database/migrations/20230111/');
        shell_exec('php artisan db:seed --class=QuoteMainSeeder');
        shell_exec('php artisan db:seed --class=QuoteSub2Seeder');
    }

    public function tearDown() : void {
        shell_exec('php artisan DropTables');
    }

    public function testGetSub2ByMainId() {
        $quoteRepo = new QuoteRepository();
        $quoteSub2at1 = $quoteRepo->getSub2ByMainId(1);
        $this->assertEquals(1, $quoteSub2at1->mainId);
        $this->assertEquals("SLN-20221200001", $quoteSub2at1->serialNumber);
        $this->assertEquals("彩盒", $quoteSub2at1->materialName);
        $this->assertEquals(420, $quoteSub2at1->length);
        $this->assertEquals("天地蓋", $quoteSub2at1->boxType);

        try {
            $quoteSub2at2 = $quoteRepo->getSub2ByMainId(99);
            $this->assertEquals(true, false);
        }
        catch(Exception $e) {
            $this->assertEquals("指定資料不存在", $e->getMessage());
        }

        $quoteSub2at3 = $quoteRepo->getSub2ByMainId(18);
        $this->assertEquals(18, $quoteSub2at3->mainId);
        $this->assertEquals("SLN-20221200018", $quoteSub2at3->serialNumber);
        $this->assertEquals("展示盒", $quoteSub2at3->materialName);
        $this->assertEquals(96, $quoteSub2at3->length);
        $this->assertEquals("天地蓋", $quoteSub2at3->boxType);
    }
}
