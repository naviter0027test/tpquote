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

    public function testCreateMain() {
        $quoteRepo = new QuoteRepository();

        $paramCreate1 = [
            'quoteCls' => 2,
            'customerProductNum' => 'P2022120021',
            'productNum' => 'C2201021',
            'productNameTw' => '赤兔糖霜林',
            'productNameEn' => 'Product U',
            'quoteQuality' => '高',
            'quoteQuantity' => '3K',
            'productInfo' => 'create by test program',
        ];
        try {
            $quoteRepo->createMain($paramCreate1);
            $quoteMain1 = $quoteRepo->getMainById(21);
            $this->assertEquals(21, $quoteMain1->id);
            $this->assertEquals(2, $quoteMain1->quoteCls);
            $this->assertEquals("P2022120021", $quoteMain1->customerProductNum);
            $this->assertEquals("赤兔糖霜林", $quoteMain1->productNameTw);
            $this->assertEquals("3K", $quoteMain1->quoteQuantity);
            $this->assertEquals("create by test program", $quoteMain1->productInfo);
        }
        catch(Exception $e) {
            $this->assertEquals("error", $e->getMessage());
        }
    }

    public function testUpdateMainById() {
        $quoteRepo = new QuoteRepository();

        $paramUpdate1 = [
            'quoteCls' => 1,
            'productNameTw' => '木棉客家林',
            'productNameEn' => 'Product V',
            'quoteQuality' => '低',
            'productInfo' => 'update by test program',
        ];
        try {
            $quoteRepo->updateMainById(99, $paramUpdate1);
            $this->assertEquals(true, false);
        }
        catch(Exception $e) {
            $this->assertEquals("指定資料不存在", $e->getMessage());
        }

        $quoteRepo->updateMainById(17, $paramUpdate1);
        $quoteMain1 = $quoteRepo->getMainById(17);
        $this->assertEquals(1, $quoteMain1->quoteCls);
        $this->assertEquals("木棉客家林", $quoteMain1->productNameTw);
        $this->assertEquals("Product V", $quoteMain1->productNameEn);
        $this->assertEquals("低", $quoteMain1->quoteQuality);
        $this->assertEquals("update by test program", $quoteMain1->productInfo);
    }

    public function testRemoveMainById() {
        $quoteRepo = new QuoteRepository();

        $quoteRepo->removeMainById(6);
        try {
            $quoteMain1 = $quoteRepo->getMainById(6);
            $this->assertEquals(true, false);
        }
        catch(Exception $e) {
            $this->assertEquals("指定資料不存在", $e->getMessage());
        }

        $quoteMain2 = $quoteRepo->getMainById(7);
        $this->assertEquals(7, $quoteMain2->id);
        $this->assertEquals("橡膠冷凝凍", $quoteMain2->productNameTw);
    }
}
