<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Repositories\QuoteRepository;
use Tests\TestCase;
use Exception;

class QuoteSub6Test extends TestCase
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
    }

    public function tearDown() : void {
        shell_exec('php artisan DropTables');
    }

    public function testGetSub6ByMainId() {
        $quoteRepo = new QuoteRepository();
        $quoteSub6at1 = $quoteRepo->getSub6ByMainId(1);
        $this->assertEquals(1, $quoteSub6at1->mainId);
        $this->assertEquals("SLN-20221200001", $quoteSub6at1->serialNumber);
        $this->assertEquals("鞋底板", $quoteSub6at1->processName);
        $this->assertEquals(25, $quoteSub6at1->localNeedSec);
        $this->assertEquals(400, $quoteSub6at1->usageAmount);

        try {
            $quoteSub6at2 = $quoteRepo->getSub6ByMainId(99);
            $this->assertEquals(true, false);
        }
        catch(Exception $e) {
            $this->assertEquals("指定資料不存在", $e->getMessage());
        }

        $quoteSub6at3 = $quoteRepo->getSub6ByMainId(14);
        $this->assertEquals(14, $quoteSub6at3->mainId);
        $this->assertEquals("底板烙印", $quoteSub6at3->processName);
        $this->assertEquals("PVC盒", $quoteSub6at3->materialName);
        $this->assertEquals(220, $quoteSub6at3->localNeedSec);
        $this->assertEquals(170, $quoteSub6at3->usageAmount);
    }

    public function testCreateSub6() {
        $quoteRepo = new QuoteRepository();
        $paramCreate1 = [
            'mainId' => 99,
        ];
        try {
            $quoteRepo->createSub6($paramCreate1);
            $this->assertEquals(true, false);
        }
        catch(Exception $e) {
            $this->assertEquals("指定資料不存在", $e->getMessage());
        }

        $paramCreate2 = [
            'mainId' => 14,
        ];
        try {
            $quoteRepo->createSub6($paramCreate2);
            $this->assertEquals(true, false);
        }
        catch(Exception $e) {
            $this->assertEquals("子資料已存在", $e->getMessage());
        }

        $paramCreate3 = [
            'mainId' => 15,
            'serialNumber' => 'SLN-20221200015',
            'processName' =>  '噴漆',
            'materialName' => "鉚釘",
            'processMemo' => "",
            'localNeedSec' => 350,
            'usageAmount' => 220,
        ];
        $quoteRepo->createSub6($paramCreate3);

        $quoteSub6at1 = $quoteRepo->getSub6ByMainId(15);
        $this->assertEquals(15, $quoteSub6at1->mainId);
        $this->assertEquals("噴漆", $quoteSub6at1->processName);
        $this->assertEquals("鉚釘", $quoteSub6at1->materialName);
        $this->assertEquals(350, $quoteSub6at1->localNeedSec);
        $this->assertEquals(220, $quoteSub6at1->usageAmount);
    }

    public function testUpdateSub6() {
        $quoteRepo = new QuoteRepository();
        try {
            $quoteRepo->updateSub6ByMainId(99, []);
            $this->assertEquals(false, true);
        }
        catch(Exception $e) {
            $this->assertEquals("指定資料不存在", $e->getMessage());
        }

        $paramUpdate1 = [
            'serialNumber' => "SLN-20221200999",
            'processName' =>  '噴漆',
            'materialName' => "鉚釘",
            'processMemo' => "updated by tdd",
            'localNeedSec' => 350,
            'usageAmount' => 220,
        ];
        $quoteRepo->updateSub6ByMainId(3, $paramUpdate1);
        $quoteSub6at1 = $quoteRepo->getSub6ByMainId(3);
        $this->assertEquals(3, $quoteSub6at1->mainId);
        $this->assertEquals("SLN-20221200999", $quoteSub6at1->serialNumber);
        $this->assertEquals("噴漆", $quoteSub6at1->processName);
        $this->assertEquals("鉚釘", $quoteSub6at1->materialName);
        $this->assertEquals(350, $quoteSub6at1->localNeedSec);
        $this->assertEquals(220, $quoteSub6at1->usageAmount);
        $this->assertEquals("updated by tdd", $quoteSub6at1->processMemo);

    }
}
