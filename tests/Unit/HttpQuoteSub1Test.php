<?php

namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;
use App\Repositories\MemberRepository;
use App\Repositories\QuoteRepository;
use Exception;

class HttpQuoteSub1Test extends TestCase
{
    public function setUp() : void {
        parent::setUp();
        shell_exec('php artisan migrate --path=/database/migrations/20221026/');
        shell_exec('php artisan migrate --path=/database/migrations/20221102/');
        shell_exec('php artisan migrate --path=/database/migrations/20221207/');
        shell_exec('php artisan db:seed --class=MemPermissionSeeder');
        shell_exec('php artisan db:seed --class=MemberSeeder');
        shell_exec('php artisan db:seed --class=QuoteMainSeeder');
        shell_exec('php artisan db:seed --class=QuoteSub1Seeder');
    }

    public function tearDown() : void {
        shell_exec('php artisan DropTables');
    }

    public function testEditSub1() {
        $memberRepo = new MemberRepository();
        $quoteRepo = new QuoteRepository();

        $param1 = [
            'account' => 'account22',
            'pass' => '123456',
        ];
        $member1 = $memberRepo->checkLogin($param1);

        $paramEdit1 = [
            'mode' => 'json',
        ];
        $paramEdit1Str = http_build_query($paramEdit1);
        $response1 = $this->withSession(['member' => $member1])
            ->get("/quote/edit/sub1/1?$paramEdit1Str");
        $response1->assertStatus(200)
            ->assertJson([
                'status' => false,
                'msg' => 'quoteSub_1 permission denied',
            ]);

        $param2 = [
            'account' => 'account6',
            'pass' => '123456',
        ];
        $member2 = $memberRepo->checkLogin($param2);
        $paramEdit2 = [
            'mode' => 'json',
        ];
        $paramEdit2Str = http_build_query($paramEdit2);
        $response2 = $this->withSession(['member' => $member2])
            ->get('/quote/edit/sub1/999?'.$paramEdit2Str);
        $response2->assertStatus(200)
            ->assertJson(function (AssertableJson $json) {
                $json->where('status', false)
                    ->where('msg', '指定資料不存在');
            });

        $response3 = $this->withSession(['member' => $member2])
            ->get('/quote/edit/sub1/1?'.$paramEdit2Str);
        $response3->assertStatus(200)
            ->assertJson(function (AssertableJson $json) {
                $json->where('status', true)
                    ->where('msg', 'success')
                    ->where('item.mainId', '1')
                    ->where('item.materialName', '紅檜木')
                    ->where('item.width', '120')
                    ->where('item.specIllustrate', '同向板')
                    ->where('item.fsc', 'Y');
            });
    }

    public function testUpdateSub1() {
        $memberRepo = new MemberRepository();
        $quoteRepo = new QuoteRepository();

        $paramUser1 = [
            'account' => 'account22',
            'pass' => '123456',
        ];
        $member1 = $memberRepo->checkLogin($paramUser1);

        $paramEdit1 = [
            'mode' => 'json',
        ];
        $response1 = $this->withSession(['member' => $member1])
            ->post("/quote/edit/sub1/1", $paramEdit1);
        $response1->assertStatus(200)
            ->assertJson([
                'status' => false,
                'msg' => 'quoteSub_1 permission denied',
            ]);

        $paramUser2 = [
            'account' => 'account19',
            'pass' => '123456',
        ];
        $member2 = $memberRepo->checkLogin($paramUser2);
        $paramEdit2 = [
            'mode' => 'json',
        ];
        $response2 = $this->withSession(['member' => $member2])
            ->post("/quote/edit/sub1/1", $paramEdit2);
        $response2->assertStatus(200)
            ->assertJson(function (AssertableJson $json) {
                $json->where('status', false)
                    ->where('msg', '輸入錯誤')
                    ->has('errors.partNo')
                    ->has('errors.materialName')
                    ->has('errors.length')
                    ->has('errors.width')
                    ->has('errors.height');
            });

        $paramEdit3 = [
            'mode' => 'json',
            'partNo' => 'SD00021',
            'materialName' => '新半導體材料',
            'length' => 400,
            'width' => 500,
            'height' => 600,
        ];
        $response3 = $this->withSession(['member' => $member2])
            ->post("/quote/edit/sub1/1", $paramEdit3);
        $response3->assertStatus(200)
            ->assertJson(function (AssertableJson $json) {
                $json->where('status', true)
                    ->where('msg', 'success');
            });

        $sub1at1 = $quoteRepo->getSub1ByMainId(1);
        $this->assertEquals('SD00021', $sub1at1->partNo);
        $this->assertEquals('新半導體材料', $sub1at1->materialName);
        $this->assertEquals(400, $sub1at1->length);
        $this->assertEquals('同向板', $sub1at1->specIllustrate);
        $this->assertEquals('A/B', $sub1at1->level);
        $this->assertEquals('Y', $sub1at1->fsc);
        $this->assertEquals(1120, $sub1at1->bigLength);
    }

    public function testListsSub1() {
        $memberRepo = new MemberRepository();
        $paramUser1 = [
            'account' => 'account22',
            'pass' => '123456',
        ];
        $member1 = $memberRepo->checkLogin($paramUser1);

        $paramEdit1 = [
            'mode' => 'json',
        ];
        $paramEdit1Str = http_build_query($paramEdit1);
        $response1 = $this->withSession(['member' => $member1])
            ->get("/quote/lists/sub1?$paramEdit1Str");
        $response1->assertStatus(200)
            ->assertJson([
                'status' => false,
                'msg' => 'quoteSub_1 permission denied',
            ]);

        $paramUser2 = [
            'account' => 'account19',
            'pass' => '123456',
        ];
        $member2 = $memberRepo->checkLogin($paramUser2);

        $paramEdit2 = [
            'mode' => 'json',
            'nowPage' => 'O',
            'pageNum' => -1,
        ];
        $paramEdit2Str = http_build_query($paramEdit2);
        $response2 = $this->withSession(['member' => $member2])
            ->get("/quote/lists/sub1?$paramEdit2Str");
        $response2->assertStatus(200)
            ->assertJson(function (AssertableJson $json) {
                $json->where('status', false)
                    ->where('msg', '輸入錯誤')
                    ->has('errors.nowPage')
                    ->has('errors.pageNum');
            });

        $paramEdit3 = [
            'mode' => 'json',
            'nowPage' => 1,
            'pageNum' => 10,
        ];
        $paramEdit3Str = http_build_query($paramEdit3);
        $response3 = $this->withSession(['member' => $member2])
            ->get("/quote/lists/sub1?$paramEdit3Str");
        $response3->assertStatus(200)
            ->assertJson(function (AssertableJson $json) {
                $json->where('status', true)
                    ->where('msg', 'success')
                    ->where('items.0.id', 19)
                    ->where('items.0.partNo', 'SUB1-20221200019')
                    ->where('items.0.materialName', '常構貢木板II')
                    ->where('items.1.id', 18)
                    ->where('items.1.partNo', 'SUB1-20221200018')
                    ->where('amount', 19);
            });
    }

    public function testCreateSub1() {
        $memberRepo = new MemberRepository();
        $quoteRepo = new QuoteRepository();
        $paramUser1 = [
            'account' => 'account22',
            'pass' => '123456',
        ];
        $member1 = $memberRepo->checkLogin($paramUser1);

        $paramEdit1 = [
            'mode' => 'json',
        ];
        $response1 = $this->withSession(['member' => $member1])
            ->post("/quote/create/sub1/20", $paramEdit1);
        $response1->assertStatus(200)
            ->assertJson([
                'status' => false,
                'msg' => 'quoteSub_1 permission denied',
            ]);

        $paramUser2 = [
            'account' => 'account19',
            'pass' => '123456',
        ];
        $member2 = $memberRepo->checkLogin($paramUser2);

        $paramEdit2 = [
            'mode' => 'json',
        ];
        $response2 = $this->withSession(['member' => $member2])
            ->post("/quote/create/sub1/20", $paramEdit2);
        $response2->assertStatus(200)
            ->assertJson(function (AssertableJson $json) {
                $json->where('status', false)
                    ->where('msg', '輸入錯誤')
                    ->has('errors.partNo')
                    ->has('errors.materialName')
                    ->has('errors.length')
                    ->has('errors.width')
                    ->has('errors.height');
            });

        $paramEdit3 = [
            'mode' => 'json',
            'partNo' => "SUB1-20221200020",
            'materialName' => "常構貢木板III",
            'length' => 300,
            'width' => 30,
            'height' => 400,
            'spec' => "實木",
            'specIllustrate' => "指接板",
            'content' => '二椴一楊',
            'level' => 'A/B',
            'business' => 'E0',
            'fsc' => 'Y',
            'memo' => 'from HttpQuoteSub1Test create',
            'bigLength' => 3000,
            'bigWidth' => 5000,
            'bigHeight' => 4000,
        ];
        $response3 = $this->withSession(['member' => $member2])
            ->post("/quote/create/sub1/20", $paramEdit3);
        $response3->assertStatus(200)
            ->assertJson(function (AssertableJson $json) {
                $json->where('status', true)
                    ->where('msg', 'success');
            });

        $sub1at1 = $quoteRepo->getSub1ByMainId(20);
        $this->assertEquals('SUB1-20221200020', $sub1at1->partNo);
        $this->assertEquals('常構貢木板III', $sub1at1->materialName);
        $this->assertEquals(300, $sub1at1->length);
        $this->assertEquals('指接板', $sub1at1->specIllustrate);
        $this->assertEquals('A/B', $sub1at1->level);
        $this->assertEquals('Y', $sub1at1->fsc);
        $this->assertEquals(3000, $sub1at1->bigLength);
    }

    public function testRemoveSub1() {
        $memberRepo = new MemberRepository();
        $quoteRepo = new QuoteRepository();
        $paramUser1 = [
            'account' => 'account22',
            'pass' => '123456',
        ];
        $member1 = $memberRepo->checkLogin($paramUser1);

        $paramEdit1 = [
            'mode' => 'json',
        ];
        $paramEdit1Str = http_build_query($paramEdit1);
        $response2 = $this->withSession(['member' => $member1])
            ->get("/quote/remove/sub1/2?". $paramEdit1Str);
        $response2->assertStatus(200)
            ->assertJson([
                'status' => false,
                'msg' => 'quoteSub_1 permission denied',
            ]);

        $paramUser2 = [
            'account' => 'account19',
            'pass' => '123456',
        ];
        $member2 = $memberRepo->checkLogin($paramUser2);

        $paramEdit2 = [
            'mode' => 'json',
        ];
        $paramEdit2Str = http_build_query($paramEdit2);
        $response2 = $this->withSession(['member' => $member2])
            ->get("/quote/remove/sub1/2?". $paramEdit2Str);
        $response2->assertStatus(200)
            ->assertJson(function (AssertableJson $json) {
                $json->where('status', true)
                    ->where('msg', 'success');
            });

        try {
            $quoteSub1 = $quoteRepo->getSub1ByMainId(2);
            $this->assertEquals(true, false);
        }
        catch(Exception $e) {
            $this->assertEquals("指定資料不存在", $e->getMessage());
        }
    }
}
