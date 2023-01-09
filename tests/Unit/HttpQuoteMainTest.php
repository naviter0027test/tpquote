<?php

namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;
use App\Repositories\MemberRepository;
use App\Repositories\QuoteRepository;

class HttpQuoteMainTest extends TestCase
{
    public function setUp() : void {
        parent::setUp();
        shell_exec('php artisan migrate --path=/database/migrations/20221026/');
        shell_exec('php artisan migrate --path=/database/migrations/20221102/');
        shell_exec('php artisan migrate --path=/database/migrations/20221207/');
        shell_exec('php artisan db:seed --class=MemPermissionSeeder');
        shell_exec('php artisan db:seed --class=MemberSeeder');
        shell_exec('php artisan db:seed --class=QuoteMainSeeder');
    }

    public function tearDown() : void {
        shell_exec('php artisan DropTables');
    }

    public function testCreateMain() {
        $memberRepo = new MemberRepository();
        $quoteRepo = new QuoteRepository();

        $param1 = [
            'account' => 'account1',
            'pass' => '123456',
        ];
        $member1 = $memberRepo->checkLogin($param1);

        $response = $this->withSession(['member' => $member1])
            ->get('/member/isLogin');
        $response->assertStatus(200)
            ->assertJson([
                'status' => true,
                'msg' => 'has login',
            ]);

        $createParam1 = [
            'mode' => 'json',
        ];
        $response1 = $this->withSession(['member' => $member1])
            ->post('/quote/create/main', $createParam1);
        $response1->assertStatus(200)
            ->assertJson([
                'status' => false,
                'msg' => 'quoteMain permission denied',
            ]);

        $param2 = [
            'account' => 'account6',
            'pass' => '123456',
        ];
        $member2 = $memberRepo->checkLogin($param2);
        $createParam2 = [
            'mode' => 'json',
        ];
        $response2 = $this->withSession(['member' => $member2])
            ->post('/quote/create/main', $createParam2);
        $response2->assertStatus(200)
            ->assertJson(function (AssertableJson $json) {
                $json->where('status', false)
                    ->where('msg', '輸入錯誤')
                    ->has('errors.quoteCls')
                    ->has('errors.customerProductNum')
                    ->has('errors.productNum')
                    ->has('errors.productNameTw');
            });

        $createParam3 = [
            'mode' => 'json',
            'quoteCls' => 2,
            'customerProductNum' => 'P2022120021',
            'productNum' => 'C2201021',
            'productNameTw' => '赤兔糖霜林',
            'productNameEn' => 'Product U',
            'quoteQuality' => '高',
            'quoteQuantity' => '3K',
            'productInfo' => 'create by test program',
        ];
        $response3 = $this->withSession(['member' => $member2])
            ->post('/quote/create/main', $createParam3);
        $response3->assertStatus(200)
            ->assertJson(function (AssertableJson $json) {
                $json->where('status', true)
                    ->where('msg', '建立成功');
            });

        $quoteMain1 = $quoteRepo->getMainById(21);
        $this->assertEquals(21, $quoteMain1->id);
        $this->assertEquals(2, $quoteMain1->quoteCls);
        $this->assertEquals("P2022120021", $quoteMain1->customerProductNum);
        $this->assertEquals("赤兔糖霜林", $quoteMain1->productNameTw);
        $this->assertEquals("3K", $quoteMain1->quoteQuantity);
        $this->assertEquals("create by test program", $quoteMain1->productInfo);
    }

    public function testEditMain() {
        $memberRepo = new MemberRepository();
        $paramUser1 = [
            'account' => 'account22',
            'pass' => '123456',
        ];
        $member1 = $memberRepo->checkLogin($paramUser1);

        $response1 = $this->withSession(['member' => $member1])
            ->get('/member/isLogin');
        $response1->assertStatus(200)
            ->assertJson([
                'status' => true,
                'msg' => 'has login',
            ]);

        $paramEdit1 = [
            'mode' => 'json',
        ];
        $paramEdit1Str = http_build_query($paramEdit1);
        $response2 = $this->withSession(['member' => $member1])
            ->get("/quote/edit/main/1?$paramEdit1Str");
        $response2->assertStatus(200)
            ->assertJson([
                'status' => false,
                'msg' => 'quoteMain permission denied',
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
        $response3 = $this->withSession(['member' => $member2])
            ->get("/quote/edit/main/1?$paramEdit2Str");
        $response3->assertStatus(200)
            ->assertJson(function (AssertableJson $json) {
                $json->where('status', true)
                    ->where('msg', 'success')
                    ->where('item.id', 1)
                    ->where('item.quoteCls', '1')
                    ->where('item.customerProductNum', 'P2022120001')
                    ->where('item.productNameTw', '長軒木樑材')
                    ->where('item.quoteQuantity', 'MOQ-1K');
            });

        $response4 = $this->withSession(['member' => $member2])
            ->get("/quote/edit/main/100?$paramEdit2Str");
        $response4->assertStatus(200)
            ->assertJson(function (AssertableJson $json) {
                $json->where('status', false)
                    ->where('msg', '指定資料不存在');
            });
    }
}
