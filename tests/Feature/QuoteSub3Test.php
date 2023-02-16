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

    public function testCreateSub3() {
        $quoteRepo = new QuoteRepository();
        $paramCreate1 = [
            'mainId' => 99,
        ];
        try {
            $quoteRepo->createSub3($paramCreate1);
            $this->assertEquals(true, false);
        }
        catch(Exception $e) {
            $this->assertEquals("指定資料不存在", $e->getMessage());
        }

        $paramCreate2 = [
            'mainId' => 17,
        ];
        try {
            $quoteRepo->createSub3($paramCreate2);
            $this->assertEquals(true, false);
        }
        catch(Exception $e) {
            $this->assertEquals("子資料已存在", $e->getMessage());
        }

        $paramCreate3 = [
            'mainId' => 18,
            'partNo' => "SUB1-20221200018",
            'materialName' => "PET袋",
            'length' => 45,
            'width' => 95,
            'height' => 80,
            'usageAmount' => 89,
            'spec' => "H9mm",
            'info' => "created by tdd",
            'infoImg' => "",
        ];
        $quoteRepo->createSub3($paramCreate3);
        $quoteSub3at1 = $quoteRepo->getSub3ByMainId(18);
        $this->assertEquals(18, $quoteSub3at1->mainId);
        $this->assertEquals("SUB1-20221200018", $quoteSub3at1->partNo);
        $this->assertEquals("PET袋", $quoteSub3at1->materialName);
        $this->assertEquals(45, $quoteSub3at1->length);
        $this->assertEquals("H9mm", $quoteSub3at1->spec);
        $this->assertEquals("created by tdd", $quoteSub3at1->info);
    }
}
