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

    public function testCreateSub2() {
        $quoteRepo = new QuoteRepository();
        $paramCreate1 = [
            'mainId' => 99,
        ];
        try {
            $quoteRepo->createSub2($paramCreate1);
            $this->assertEquals(true, false);
        }
        catch(Exception $e) {
            $this->assertEquals("指定資料不存在", $e->getMessage());
        }

        $paramCreate2 = [
            'mainId' => 18,
        ];
        try {
            $quoteRepo->createSub2($paramCreate2);
            $this->assertEquals(true, false);
        }
        catch(Exception $e) {
            $this->assertEquals("子資料已存在", $e->getMessage());
        }

        $paramCreate3 = [
            'mainId' => 19,
            'serialNumber' => "SLN-20221200019",
            'partNo' => "SUB1-20221200019",
            'materialName' => "彩盒",
            'length' => 45,
            'width' => 95,
            'height' => 80,
            'usageAmount' => 89,
            'boxType' => "天地蓋",
            'internalPcsNum' => 49,
            'paperThickness' => "100G",
            'paperMaterial' => "白卡",
            'printMethod' => "四色印刷",
            'craftMethod' => "開窗",
            'coatingMethod' => "上OPP亮膜",
            'memo' => "create by tdd",
            'infoImg' => "",
        ];
        $quoteRepo->createSub2($paramCreate3);
        $quoteSub2at1 = $quoteRepo->getSub2ByMainId(19);
        $this->assertEquals(19, $quoteSub2at1->mainId);
        $this->assertEquals("SUB1-20221200019", $quoteSub2at1->partNo);
        $this->assertEquals("彩盒", $quoteSub2at1->materialName);
        $this->assertEquals(45, $quoteSub2at1->length);
        $this->assertEquals("天地蓋", $quoteSub2at1->boxType);
        $this->assertEquals("create by tdd", $quoteSub2at1->memo);
    }

    public function testUpdateSub2ByMainId() {
        $quoteRepo = new QuoteRepository();
        try {
            $quoteRepo->updateSub2ByMainId(99, []);
            $this->assertEquals(false, true);
        }
        catch(Exception $e) {
            $this->assertEquals("指定資料不存在", $e->getMessage());
        }

        $paramUpdate1 = [
            'materialName' => '材料 from tdd',
            'usageAmount' => 90,
            'memo' => 'update by tdd',
        ];
        $quoteRepo->updateSub2ByMainId(5, $paramUpdate1);
        $quoteSub2at1 = $quoteRepo->getSub2ByMainId(5);
        $this->assertEquals(5, $quoteSub2at1->mainId);
        $this->assertEquals("材料 from tdd", $quoteSub2at1->materialName);
        $this->assertEquals(90, $quoteSub2at1->usageAmount);
        $this->assertEquals("update by tdd", $quoteSub2at1->memo);
    }
}
