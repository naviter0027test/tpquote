<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Repositories\QuoteRepository;
use Tests\TestCase;
use Exception;

class QuoteSub1_1Test extends TestCase
{
    public function setUp() : void {
        parent::setUp();
        shell_exec('php artisan migrate --path=/database/migrations/20221207/');
        shell_exec('php artisan migrate --path=/database/migrations/20230111/');
        shell_exec('php artisan db:seed --class=QuoteMainSeeder');
        shell_exec('php artisan db:seed --class=QuoteSub1Seeder');
        shell_exec('php artisan db:seed --class=QuoteSub1_1Seeder');
    }

    public function tearDown() : void {
        shell_exec('php artisan DropTables');
    }

    public function testGetSub1_1ByMainId() {
        $quoteRepo = new QuoteRepository();
        $quoteSub1at1 = $quoteRepo->getSub1_1ByMainId(1);
        $this->assertEquals(1, $quoteSub1at1->mainId);
        $this->assertEquals("SUB1-20221200001", $quoteSub1at1->partNo);
        $this->assertEquals("盒身", $quoteSub1at1->materialName);
        $this->assertEquals(420, $quoteSub1at1->length);
        $this->assertEquals("松木", $quoteSub1at1->spec);

        try {
            $sub1_1at2 = $quoteRepo->getSub1_1ByMainId(99);
            $this->assertEquals(true, false);
        }
        catch(Exception $e) {
            $this->assertEquals("指定資料不存在", $e->getMessage());
        }
    }

    public function testListsSub1_1() {
        $quoteRepo = new QuoteRepository();

        try {
            $paramSearch1 = [
                'nowPage' => 'aaa',
                'pageNum' => 'a',
            ];
            $quoteRepo->listsSub1_1($paramSearch1);
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
            $quoteRepo->listsSub1_1($paramSearch2);
            $this->assertEquals(true, false);
        }
        catch(Exception $e) {
            $this->assertEquals('單頁數量請輸入數字', $e->getMessage());
        }

        $paramSearch3 = [
            'nowPage' => '1',
            'pageNum' => '10',
        ];
        $items = $quoteRepo->listsSub1_1($paramSearch3);
        $this->assertEquals(10, count($items));
        $this->assertEquals('SUB1-20221200019', $items[0]->partNo);
        $this->assertEquals('二椴九楊', $items[0]->content);
        $this->assertEquals('B/B', $items[0]->level);

        $this->assertEquals('SUB1-20221200014', $items[5]->partNo);
        $this->assertEquals('五椴二楊', $items[5]->content);
        $this->assertEquals('A/B', $items[5]->level);
    }

    public function testListsSub1_1Amount() {
        $quoteRepo = new QuoteRepository();

        $paramSearch1 = [
            'nowPage' => '2',
            'pageNum' => '10',
        ];
        $amount1 = $quoteRepo->listsSub1_1Amount($paramSearch1);
        $this->assertEquals(19, $amount1);
    }

    public function testCreateSub1_1() {
        $quoteRepo = new QuoteRepository();

        $paramCreate1 = [
            'mainId' => 1,
        ];
        try {
            $quoteRepo->createSub1_1($paramCreate1);
            $this->assertEquals(true, false);
        }
        catch(Exception $e) {
            $this->assertEquals("子資料已存在", $e->getMessage());
        }

        $paramCreate2 = [
            'mainId' => 21,
            'partNo' => 'SUB1-20221200020',
            'materialName' => '盒身',
            'length' => 380,
            'width' => 49,
            'height' => 15,
            'usageAmount' => 95,
            'spec' => '松木',
            'specIllustrate' => '5夾',
            'content' => '二椴九楊',
            'level' => 'B/B',
            'business' => 'E0',
            'fsc' => 'N',
            'materialPrice' => 1250,
        ];
        try {
            $quoteRepo->createSub1_1($paramCreate2);
        }
        catch(Exception $e) {
            $this->assertEquals("指定資料不存在", $e->getMessage());
        }

        $paramCreate2['mainId'] = 20;
        $quoteRepo->createSub1_1($paramCreate2);
        $quoteSub1_1at1 = $quoteRepo->getSub1_1ByMainId(20);
        $this->assertEquals(20, $quoteSub1_1at1->mainId);
        $this->assertEquals("SUB1-20221200020", $quoteSub1_1at1->partNo);
        $this->assertEquals("盒身", $quoteSub1_1at1->materialName);
        $this->assertEquals(380, $quoteSub1_1at1->length);
        $this->assertEquals(1250, $quoteSub1_1at1->materialPrice);

    }

    public function testUpdateSub1_1() {
        $quoteRepo = new QuoteRepository();
        try {
            $quoteRepo->updateSub1_1ByMainId(99, []);
            $this->assertEquals(false, true);
        }
        catch(Exception $e) {
            $this->assertEquals("指定資料不存在", $e->getMessage());
        }

        $paramUpdate1 = [
            'materialName' => 'sub 1-1 from tdd',
            'length' => 90,
            'materialPrice' => 1250,
        ];
        $quoteRepo->updateSub1_1ByMainId(5, $paramUpdate1);
        $quoteSub1_1at1 = $quoteRepo->getSub1_1ByMainId(5);
        $this->assertEquals(5, $quoteSub1_1at1->mainId);
        $this->assertEquals("sub 1-1 from tdd", $quoteSub1_1at1->materialName);
        $this->assertEquals(90, $quoteSub1_1at1->length);
        $this->assertEquals(1250, $quoteSub1_1at1->materialPrice);
    }
}
