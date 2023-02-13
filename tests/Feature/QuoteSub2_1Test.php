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

    public function testCreateSub2_1() {
        $quoteRepo = new QuoteRepository();
        $createParam1 = [
            'mainId' => 1,
        ];
        try {
            $quoteRepo->createSub2_1($createParam1);
            $this->assertEquals(true, false);
        }
        catch(Exception $e) {
            $this->assertEquals("子資料已存在", $e->getMessage());
        }

        $createParam2 = [
            'mainId' => 19,
            'serialNumber' => 'SLN-20221200019',
            'partNo' => 'SUB1-20221200019',
            'materialName' => '底紙',
            'length' => 140,
            'width' => 40,
            'height' => 210,
            'usageAmount' => 20,
            'paperThickness' => '350G',
            'paperMaterial' => '白卡',
            'printMethod' => '四色印刷',
            'craftMethod' => '開窗',
            'coatingMethod' => '上UV',
            'memo' => 'create sub2-1 by tdd',
        ];
        $quoteRepo->createSub2_1($createParam2);
        $quoteSub2_1at1 = $quoteRepo->getSub2_1ByMainId(19);
        $this->assertEquals(19, $quoteSub2_1at1->mainId);
        $this->assertEquals("SLN-20221200019", $quoteSub2_1at1->serialNumber);
        $this->assertEquals("底紙", $quoteSub2_1at1->materialName);
        $this->assertEquals(140, $quoteSub2_1at1->length);
        $this->assertEquals("四色印刷", $quoteSub2_1at1->printMethod);
    }

    public function testUpdateSub2_1() {
        $quoteRepo = new QuoteRepository();
        try {
            $quoteRepo->updateSub2_1ByMainId(99, []);
            $this->assertEquals(false, true);
        }
        catch(Exception $e) {
            $this->assertEquals("指定資料不存在", $e->getMessage());
        }

        $paramUpdate1 = [
            'materialName' => 'Sub2-1 from tdd',
            'usageAmount' => 90,
            'craftMethod' => '開窗',
            'memo' => 'update by tdd',
        ];
        $quoteRepo->updateSub2_1ByMainId(2, $paramUpdate1);
        $quoteSub2_1at1 = $quoteRepo->getSub2_1ByMainId(2);
        $this->assertEquals(2, $quoteSub2_1at1->mainId);
        $this->assertEquals("Sub2-1 from tdd", $quoteSub2_1at1->materialName);
        $this->assertEquals(90, $quoteSub2_1at1->usageAmount);
        $this->assertEquals('開窗', $quoteSub2_1at1->craftMethod);
        $this->assertEquals("update by tdd", $quoteSub2_1at1->memo);
    }
}
