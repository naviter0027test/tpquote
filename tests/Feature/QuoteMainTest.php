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

    public function testGetMainById() {
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

    public function testListsMain() {
        $quoteRepo = new QuoteRepository();

        try {
            $paramSearch1 = [
                'nowPage' => 'aaa',
                'pageNum' => 'a',
            ];
            $quoteRepo->listsMain($paramSearch1);
            $this->assertEquals(true, false);
        }
        catch(Exception $e) {
            $this->assertEquals('頁數請輸入數字', $e->getMessage());
        }

        try {
            $paramSearch2 = [
                'nowPage' => '2',
                'pageNum' => 'a',
            ];
            $quoteRepo->listsMain($paramSearch2);
            $this->assertEquals(true, false);
        }
        catch(Exception $e) {
            $this->assertEquals('單頁數量請輸入數字', $e->getMessage());
        }

        $paramSearch3 = [
            'nowPage' => '1',
            'pageNum' => '10',
        ];
        $items = $quoteRepo->listsMain($paramSearch3);
        $this->assertEquals('P2022120020', $items[0]->customerProductNum);
        $this->assertEquals('C2201020', $items[0]->productNum);
        $this->assertEquals('威士忌名酒', $items[0]->productNameTw);

        $this->assertEquals('P2022120018', $items[2]->customerProductNum);
        $this->assertEquals('C2201018', $items[2]->productNum);
        $this->assertEquals('Product R', $items[2]->productNameEn);
    }

    public function testListsMainAmount() {
        $quoteRepo = new QuoteRepository();

        $paramSearch1 = [
            'nowPage' => '2',
            'pageNum' => '10',
        ];
        $amount1 = $quoteRepo->listsMainAmount($paramSearch1);
        $this->assertEquals(20, $amount1);
    }
}
