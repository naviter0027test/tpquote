<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Repositories\QuoteRepository;
use Tests\TestCase;
use Exception;

class QuoteSub1Test extends TestCase
{
    public function setUp() : void {
        parent::setUp();
        shell_exec('php artisan migrate --path=/database/migrations/20221207/');
        shell_exec('php artisan db:seed --class=QuoteMainSeeder');
        shell_exec('php artisan db:seed --class=QuoteSub1Seeder');
    }

    public function tearDown() : void {
        shell_exec('php artisan DropTables');
    }

    public function testGetSub1ByMainId()
    {
        $quoteRepo = new QuoteRepository();
        $quoteSub1at1 = $quoteRepo->getSub1ByMainId(3);
        $this->assertEquals(3, $quoteSub1at1->mainId);
        $this->assertEquals("SUB1-20221200003", $quoteSub1at1->partNo);
        $this->assertEquals("橡膠系列RR版", $quoteSub1at1->materialName);
        $this->assertEquals(235, $quoteSub1at1->length);
        $this->assertEquals("膠合板", $quoteSub1at1->spec);

        try {
            $quoteMain2 = $quoteRepo->getMainById(99);
        }
        catch(Exception $e) {
            $this->assertEquals("指定資料不存在", $e->getMessage());
        }
    }
}
