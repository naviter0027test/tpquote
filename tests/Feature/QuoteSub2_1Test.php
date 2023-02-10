<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Repositories\QuoteRepository;
use Tests\TestCase;
use Exception;

class QuoteSub2_1Test extends TestCase
{
    public function setUp() : void {
        parent::setUp();
        shell_exec('php artisan migrate --path=/database/migrations/20221207/');
        shell_exec('php artisan migrate --path=/database/migrations/20230111/');
        shell_exec('php artisan db:seed --class=QuoteMainSeeder');
        shell_exec('php artisan db:seed --class=QuoteSub2Seeder');
        shell_exec('php artisan db:seed --class=QuoteSub2_1Seeder');
    }

    public function tearDown() : void {
        shell_exec('php artisan DropTables');
    }

    public function testGetSub2_1ByMainId() {
        $quoteRepo = new QuoteRepository();
        $quoteSub2_1at1 = $quoteRepo->getSub2_1ByMainId(1);
        $this->assertEquals(1, $quoteSub2_1at1->mainId);
        $this->assertEquals("SLN-20221200001", $quoteSub2_1at1->serialNumber);
        $this->assertEquals("面紙", $quoteSub2_1at1->materialName);
        $this->assertEquals(420, $quoteSub2_1at1->length);
        $this->assertEquals("單面印刷", $quoteSub2_1at1->printMethod);

        try {
            $quoteSub2_1at2 = $quoteRepo->getSub2_1ByMainId(99);
            $this->assertEquals(true, false);
        }
        catch(Exception $e) {
            $this->assertEquals("指定資料不存在", $e->getMessage());
        }

        $quoteSub2at3 = $quoteRepo->getSub2_1ByMainId(18);
        $this->assertEquals(18, $quoteSub2at3->mainId);
        $this->assertEquals("SLN-20221200018", $quoteSub2at3->serialNumber);
        $this->assertEquals("背紙", $quoteSub2at3->materialName);
        $this->assertEquals(255, $quoteSub2at3->length);
        $this->assertEquals("專色印刷,熱轉印", $quoteSub2at3->printMethod);
    }
}
