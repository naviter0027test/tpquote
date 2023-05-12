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
}
