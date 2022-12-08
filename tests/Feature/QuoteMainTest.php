<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Repositories\QuoteRepository;
use Tests\TestCase;
use Exception;

class QuoteMainTest extends TestCase
{
    public function setUp() : void {
        parent::setUp();
        shell_exec('php artisan migrate --path=/database/migrations/20221207/');
        shell_exec('php artisan db:seed --class=QuoteMainSeeder');
    }

    public function tearDown() : void {
        shell_exec('php artisan DropTables');
    }

    public function testGetMainById()
    {
        $quoteRepo = new QuoteRepository();
        $quoteMain1 = $quoteRepo->getMainById(1);
        $this->assertEquals(1, $quoteMain1->id);
        $this->assertEquals(1, $quoteMain1->quoteCls);
        $this->assertEquals("P2022120001", $quoteMain1->customerProductNum);
        $this->assertEquals("長軒木樑材", $quoteMain1->productNameTw);
        $this->assertEquals("MOQ-1K", $quoteMain1->quoteQuantity);

        try {
            $quoteMain2 = $quoteRepo->getMainById(99);
        }
        catch(Exception $e) {
            $this->assertEquals("指定資料不存在", $e->getMessage());
        }
    }
}
