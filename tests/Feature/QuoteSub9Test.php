<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Repositories\QuoteRepository;
use Tests\TestCase;
use Exception;

class QuoteSub9Test extends TestCase
{
    public function setUp() : void {
        parent::setUp();
        shell_exec('php artisan migrate --path=/database/migrations/20221207/');
        shell_exec('php artisan migrate --path=/database/migrations/20230111/');
        shell_exec('php artisan migrate --path=/database/migrations/20230131/');
        shell_exec('php artisan migrate --path=/database/migrations/20230215/');
        shell_exec('php artisan migrate --path=/database/migrations/20230217/');
        shell_exec('php artisan migrate --path=/database/migrations/20230427/');
        shell_exec('php artisan db:seed --class=QuoteMainSeeder');
        shell_exec('php artisan db:seed --class=QuoteSub2Seeder');
        shell_exec('php artisan db:seed --class=QuoteSub3Seeder');
        shell_exec('php artisan db:seed --class=QuoteSub4Seeder');
        shell_exec('php artisan db:seed --class=QuoteSub5Seeder');
        shell_exec('php artisan db:seed --class=QuoteSub6Seeder');
        shell_exec('php artisan db:seed --class=QuoteSub7Seeder');
        shell_exec('php artisan db:seed --class=QuoteSub8Seeder');
        shell_exec('php artisan db:seed --class=QuoteSub9Seeder');
    }

    public function tearDown() : void {
        shell_exec('php artisan DropTables');
    }

    public function testGetSub9ByMainId() {
        $quoteRepo = new QuoteRepository();
        $quoteSub9at1 = $quoteRepo->getSub9ByMainId(1);
        $this->assertEquals(1, $quoteSub9at1->mainId);
        $this->assertEquals(1, $quoteSub9at1->port);
        $this->assertEquals(1, $quoteSub9at1->formula);
        $this->assertEquals(6200, $quoteSub9at1->freight);

        try {
            $quoteSub9at2 = $quoteRepo->getSub9ByMainId(99);
            $this->assertEquals(true, false);
        }
        catch(Exception $e) {
            $this->assertEquals("指定資料不存在", $e->getMessage());
        }

        $quoteSub9at3 = $quoteRepo->getSub9ByMainId(10);
        $this->assertEquals(10, $quoteSub9at3->mainId);
        $this->assertEquals(3, $quoteSub9at3->port);
        $this->assertEquals(2, $quoteSub9at3->formula);
        $this->assertEquals(4750, $quoteSub9at3->freight);
    }

    public function testCreateSub9() {
        $quoteRepo = new QuoteRepository();
        $paramCreate1 = [
            'mainId' => 99,
        ];
        try {
            $quoteRepo->createSub9($paramCreate1);
            $this->assertEquals(true, false);
        }
        catch(Exception $e) {
            $this->assertEquals("指定資料不存在", $e->getMessage());
        }

        $paramCreate2 = [
            'mainId' => 10,
        ];
        try {
            $quoteRepo->createSub9($paramCreate2);
            $this->assertEquals(true, false);
        }
        catch(Exception $e) {
            $this->assertEquals("子資料已存在", $e->getMessage());
        }

        $paramCreate3 = [
            'mainId' => 11,
            'port' => 3,
            'formula' => 3,
            'freight' => 150 + 500 + 45 + 4400,
        ];
        $quoteRepo->createSub9($paramCreate3);

        $quoteSub9at1 = $quoteRepo->getSub9ByMainId(11);
        $this->assertEquals(11, $quoteSub9at1->mainId);
        $this->assertEquals(3, $quoteSub9at1->port);
        $this->assertEquals(3, $quoteSub9at1->formula);
        $this->assertEquals(5095, $quoteSub9at1->freight);
    }

    public function testUpdateSub9() {
        $quoteRepo = new QuoteRepository();
        try {
            $quoteRepo->updateSub9ByMainId(99, []);
            $this->assertEquals(false, true);
        }
        catch(Exception $e) {
            $this->assertEquals("指定資料不存在", $e->getMessage());
        }

        $paramUpdate1 = [
            'port' => 3,
            'formula' => 4,
            'freight' => 150 + 50 + 45 + 4400,
        ];
        $quoteRepo->updateSub9ByMainId(3, $paramUpdate1);
        $quoteSub9at1 = $quoteRepo->getSub9ByMainId(3);
        $this->assertEquals(3, $quoteSub9at1->mainId);
        $this->assertEquals(3, $quoteSub9at1->port);
        $this->assertEquals(4, $quoteSub9at1->formula);
        $this->assertEquals(4645, $quoteSub9at1->freight);
    }
}
