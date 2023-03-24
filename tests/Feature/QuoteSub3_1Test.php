<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Repositories\QuoteRepository;
use Tests\TestCase;
use Exception;

class QuoteSub3_1Test extends TestCase
{
    public function setUp() : void {
        parent::setUp();
        shell_exec('php artisan migrate --path=/database/migrations/20221207/');
        shell_exec('php artisan migrate --path=/database/migrations/20230111/');
        shell_exec('php artisan migrate --path=/database/migrations/20230131/');
        shell_exec('php artisan db:seed --class=QuoteMainSeeder');
        shell_exec('php artisan db:seed --class=QuoteSub2Seeder');
        shell_exec('php artisan db:seed --class=QuoteSub3Seeder');
        shell_exec('php artisan db:seed --class=QuoteSub3_1Seeder');
    }

    public function tearDown() : void {
        shell_exec('php artisan DropTables');
    }

    public function testGetSub3_1ByMainId() {
        $quoteRepo = new QuoteRepository();
        $quoteSub3_1at1 = $quoteRepo->getSub3_1ByMainId(1);
        $this->assertEquals(1, $quoteSub3_1at1->mainId);
        $this->assertEquals("SLN-20221200001", $quoteSub3_1at1->serialNumber);
        $this->assertEquals("滾漆", $quoteSub3_1at1->name);
        $this->assertEquals("二底一面", $quoteSub3_1at1->painted);
        $this->assertEquals(1500, $quoteSub3_1at1->subtotal);

        try {
            $quoteSub3_1at2 = $quoteRepo->getSub3_1ByMainId(99);
            $this->assertEquals(true, false);
        }
        catch(Exception $e) {
            $this->assertEquals("指定資料不存在", $e->getMessage());
        }

        $quoteSub3_1at3 = $quoteRepo->getSub3_1ByMainId(17);
        $this->assertEquals(17, $quoteSub3_1at3->mainId);
        $this->assertEquals("SLN-20221200017", $quoteSub3_1at3->serialNumber);
        $this->assertEquals("噴漆", $quoteSub3_1at3->name);
        $this->assertEquals("二底一面", $quoteSub3_1at3->painted);
        $this->assertEquals(4550, $quoteSub3_1at3->subtotal);
    }

    public function testCreateSub3_1() {
        $quoteRepo = new QuoteRepository();
        $createParam1 = [
            'mainId' => 1,
        ];
        try {
            $quoteRepo->createSub3_1($createParam1);
            $this->assertEquals(true, false);
        }
        catch(Exception $e) {
            $this->assertEquals("子資料已存在", $e->getMessage());
        }

        $createParam2 = [
            'mainId' => 18,
            'serialNumber' => 'SLN-20221200018',
            'name' => '絲印',
            'painted' => '二底三面',
            'subtotal' => 2000,
            'memo' => 'create sub3-1 by tdd',
        ];
        $quoteRepo->createSub3_1($createParam2);
        $quoteSub3_1at1 = $quoteRepo->getSub3_1ByMainId(18);
        $this->assertEquals(18, $quoteSub3_1at1->mainId);
        $this->assertEquals("SLN-20221200018", $quoteSub3_1at1->serialNumber);
        $this->assertEquals("絲印", $quoteSub3_1at1->name);
        $this->assertEquals("二底三面", $quoteSub3_1at1->painted);
        $this->assertEquals(2000, $quoteSub3_1at1->subtotal);
    }

    public function testUpdateSub3_1() {
        $quoteRepo = new QuoteRepository();
        try {
            $quoteRepo->updateSub3_1ByMainId(99, []);
            $this->assertEquals(false, true);
        }
        catch(Exception $e) {
            $this->assertEquals("指定資料不存在", $e->getMessage());
        }

        $updateParam1 = [
            'serialNumber' => 'SLN-20221200998',
            'name' => '絲印',
            'painted' => '二底三面',
            'subtotal' => 2400,
            'memo' => 'create sub3-1 by tdd',
        ];
        $quoteRepo->updateSub3_1ByMainId(2, $updateParam1);
        $quoteSub3_1at1 = $quoteRepo->getSub3_1ByMainId(2);
        $this->assertEquals(2, $quoteSub3_1at1->mainId);
        $this->assertEquals("SLN-20221200998", $quoteSub3_1at1->serialNumber);
        $this->assertEquals("絲印", $quoteSub3_1at1->name);
        $this->assertEquals("二底三面", $quoteSub3_1at1->painted);
        $this->assertEquals(2400, $quoteSub3_1at1->subtotal);
    }
}
