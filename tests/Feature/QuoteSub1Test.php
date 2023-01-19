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

    public function testCreateSub1() {
        $quoteRepo = new QuoteRepository();
        $paramCreate1 = [
            'mainId' => 21,
            'partNo' => 'SUB1-20221200020',
            'materialName' => '常構貢木板III',
            'length' => 180,
            'width' => 40,
            'height' => 10,
            'spec' => '實木',
            'specIllustrate' => '刀模板',
            'content' => '三椴二楊',
            'level' => 'A/B',
            'business' => 'A/B',
            'fsc' => 'N',
            'memo' => 'create by tdd',
            'bigLength' => 0,
            'bigWidth' => 0,
            'bigHeight' => 0,
        ];
        try {
            $quoteRepo->createSub1($paramCreate1);
        }
        catch(Exception $e) {
            $this->assertEquals("指定資料不存在", $e->getMessage());
        }

        $paramCreate1['mainId'] = 20;
        $quoteRepo->createSub1($paramCreate1);
        $quoteSub1at1 = $quoteRepo->getSub1ByMainId(20);
        $this->assertEquals(20, $quoteSub1at1->mainId);
        $this->assertEquals("SUB1-20221200020", $quoteSub1at1->partNo);
        $this->assertEquals("常構貢木板III", $quoteSub1at1->materialName);
        $this->assertEquals(180, $quoteSub1at1->length);
        $this->assertEquals("實木", $quoteSub1at1->spec);
        $this->assertEquals("create by tdd", $quoteSub1at1->memo);
    }

    public function testUpdateSub1ByMainId() {
        $quoteRepo = new QuoteRepository();
        try {
            $quoteRepo->updateSub1ByMainId(99, []);
            $this->assertEquals(false, true);
        }
        catch(Exception $e) {
            $this->assertEquals("指定資料不存在", $e->getMessage());
        }

        $paramUpdate1 = [
            'materialName' => '材料fromTdd',
            'length' => 90,
            'memo' => 'update by tdd',
        ];
        $quoteRepo->updateSub1ByMainId(5, $paramUpdate1);
        $quoteSub1at1 = $quoteRepo->getSub1ByMainId(5);
        $this->assertEquals(5, $quoteSub1at1->mainId);
        $this->assertEquals("材料fromTdd", $quoteSub1at1->materialName);
        $this->assertEquals(90, $quoteSub1at1->length);
        $this->assertEquals("update by tdd", $quoteSub1at1->memo);
    }

    public function testRemoveSub1ByMainId() {
        $quoteRepo = new QuoteRepository();
        $quoteRepo->removeSub1ByMainId(6);
        try {
            $quoteSub1at1 = $quoteRepo->getSub1ByMainId(6);
            $this->assertEquals(false, true);
        }
        catch(Exception $e) {
            $this->assertEquals("指定資料不存在", $e->getMessage());
        }
    }
}
