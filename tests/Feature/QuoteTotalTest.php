<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Repositories\QuoteRepository;
use Tests\TestCase;
use Exception;

class QuoteTotalTest extends TestCase
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
        shell_exec('php artisan db:seed --class=QuoteTotalSeeder');
    }

    public function tearDown() : void {
        shell_exec('php artisan DropTables');
    }

    public function testGetSub9ByMainId() {
        $quoteRepo = new QuoteRepository();
        $quoteTotalat1 = $quoteRepo->getTotalByMainId(1);
        $this->assertEquals(1, $quoteTotalat1->mainId);
        $this->assertEquals(15000, $quoteTotalat1->profit);
        $this->assertEquals(1.5, $quoteTotalat1->exchangeRate);
        $this->assertEquals("趙山春", $quoteTotalat1->reviewGeneralManager);

        try {
            $quoteTotalat2 = $quoteRepo->getTotalByMainId(99);
            $this->assertEquals(true, false);
        }
        catch(Exception $e) {
            $this->assertEquals("指定資料不存在", $e->getMessage());
        }

        $quoteTotalat3 = $quoteRepo->getTotalByMainId(9);
        $this->assertEquals(9, $quoteTotalat3->mainId);
        $this->assertEquals(11000, $quoteTotalat3->profit);
        $this->assertEquals(1.8, $quoteTotalat3->exchangeRate);
        $this->assertEquals("湯明月", $quoteTotalat3->reviewGeneralManager);
        $this->assertEquals("2023-02-21 00:00:00", $quoteTotalat3->reviewFinalGeneralManagerFillDate);
    }

    public function testCreateTotal() {
        $quoteRepo = new QuoteRepository();
        $paramCreate1 = [
            'mainId' => 99,
        ];
        try {
            $quoteRepo->createTotal($paramCreate1);
            $this->assertEquals(true, false);
        }
        catch(Exception $e) {
            $this->assertEquals("指定資料不存在", $e->getMessage());
        }

        $paramCreate2 = [
            'mainId' => 9,
        ];
        try {
            $quoteRepo->createTotal($paramCreate2);
            $this->assertEquals(true, false);
        }
        catch(Exception $e) {
            $this->assertEquals("子資料已存在", $e->getMessage());
        }

        $paramCreate3 = [
            'mainId' => 10,
            'costPrice' => 39000,
            'profit' => 12000,
            'exchangeRate' => 1.2,
            'reviewName' => '鐘糖其',
            'reviewFillDate' => '2023-02-24 00:00:00',
            'reviewGeneralManager' => '簡於生',
            'reviewGeneralManagerFillDate' => '2023-02-25 00:00:00',
            'reviewFinalGeneralManager' => '簡於生',
            'reviewFinalGeneralManagerFillDate' => '2023-02-26 00:00:00',
        ];
        $quoteRepo->createTotal($paramCreate3);

        $quoteTotalat1 = $quoteRepo->getTotalByMainId(10);
        $this->assertEquals(10, $quoteTotalat1->mainId);
        $this->assertEquals(39000, $quoteTotalat1->costPrice);
        $this->assertEquals(12000, $quoteTotalat1->profit);
        $this->assertEquals('簡於生', $quoteTotalat1->reviewGeneralManager);
        $this->assertEquals('2023-02-25 00:00:00', $quoteTotalat1->reviewGeneralManagerFillDate);
    }
}
