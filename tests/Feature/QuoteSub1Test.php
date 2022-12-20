<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Repositories\QuoteRepository;
use Tests\TestCase;
use Exception;

class QuoteSub1Test extends TestCase
{
    public function setUp() : void {
        parent::setUp();
        shell_exec('php artisan migrate --path=/database/migrations/20221207/');
        shell_exec('php artisan db:seed --class=QuoteMainSeeder');
        shell_exec('php artisan db:seed --class=QuoteSub1Seeder');
    }

    public function tearDown() : void {
        shell_exec('php artisan DropTables');
    }

    public function testGetSub1ByMainId() {
        $quoteRepo = new QuoteRepository();
        $quoteSub1at1 = $quoteRepo->getSub1ByMainId(3);
        $this->assertEquals(3, $quoteSub1at1->mainId);
        $this->assertEquals("SUB1-20221200003", $quoteSub1at1->partNo);
        $this->assertEquals("橡膠系列RR版", $quoteSub1at1->materialName);
        $this->assertEquals(235, $quoteSub1at1->length);
        $this->assertEquals("膠合板", $quoteSub1at1->spec);

        try {
            $quoteMain2 = $quoteRepo->getMainById(99);
        }
        catch(Exception $e) {
            $this->assertEquals("指定資料不存在", $e->getMessage());
        }
    }

    public function testListsSub1() {
        $quoteRepo = new QuoteRepository();

        try {
            $paramSearch1 = [
                'nowPage' => 'aaa',
                'pageNum' => 'a',
            ];
            $quoteRepo->listsSub1($paramSearch1);
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
            'pageNum' => '20',
        ];
        $items = $quoteRepo->listsSub1($paramSearch3);
        $this->assertEquals(19, count($items));
        $this->assertEquals('SUB1-20221200018', $items[1]->partNo);
        $this->assertEquals('三椴二楊', $items[1]->content);
        $this->assertEquals('B/B', $items[1]->level);

        $this->assertEquals('SUB1-20221200014', $items[5]->partNo);
        $this->assertEquals('四椴七楊', $items[5]->content);
        $this->assertEquals('B/B', $items[5]->level);
    }

    public function testListsSub1Amount() {
        $quoteRepo = new QuoteRepository();

        $paramSearch1 = [
            'nowPage' => '2',
            'pageNum' => '10',
        ];
        $amount1 = $quoteRepo->listsSub1Amount($paramSearch1);
        $this->assertEquals(19, $amount1);
    }
}
