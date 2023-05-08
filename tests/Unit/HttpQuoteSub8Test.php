<?php

namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;
use App\Repositories\MemberRepository;
use App\Repositories\QuoteRepository;
use Exception;

class HttpQuoteSub8Test extends TestCase
{
    public function setUp() : void {
        parent::setUp();
        shell_exec('php artisan migrate --path=/database/migrations/20221026/');
        shell_exec('php artisan migrate --path=/database/migrations/20221102/');
        shell_exec('php artisan migrate --path=/database/migrations/20221207/');
        shell_exec('php artisan migrate --path=/database/migrations/20230111/');
        shell_exec('php artisan migrate --path=/database/migrations/20230131/');
        shell_exec('php artisan migrate --path=/database/migrations/20230215/');
        shell_exec('php artisan migrate --path=/database/migrations/20230217/');
        shell_exec('php artisan migrate --path=/database/migrations/20230427/');
        shell_exec('php artisan db:seed --class=MemPermissionSeeder');
        shell_exec('php artisan db:seed --class=MemberSeeder');
        shell_exec('php artisan db:seed --class=QuoteMainSeeder');
        shell_exec('php artisan db:seed --class=QuoteSub1Seeder');
        shell_exec('php artisan db:seed --class=QuoteSub2Seeder');
        shell_exec('php artisan db:seed --class=QuoteSub3Seeder');
        shell_exec('php artisan db:seed --class=QuoteSub4Seeder');
        shell_exec('php artisan db:seed --class=QuoteSub5Seeder');
        shell_exec('php artisan db:seed --class=QuoteSub6Seeder');
        shell_exec('php artisan db:seed --class=QuoteSub7Seeder');
        shell_exec('php artisan db:seed --class=QuoteSub8Seeder');
    }

    public function tearDown() : void {
        shell_exec('php artisan DropTables');
    }

    public function testEditSub8() {
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
            ->get("/quote/edit/sub8/1?$paramEdit1Str");
        $response1->assertStatus(200)
            ->assertJson([
                'status' => false,
                'msg' => 'quoteSub_8 permission denied',
            ]);

        $param2 = [
            'account' => 'account19',
            'pass' => '123456',
        ];
        $member2 = $memberRepo->checkLogin($param2);
        $paramEdit2 = [
            'mode' => 'json',
        ];
        $paramEdit2Str = http_build_query($paramEdit2);
        $response2 = $this->withSession(['member' => $member2])
            ->get('/quote/edit/sub8/999?'.$paramEdit2Str);
        $response2->assertStatus(200)
            ->assertJson(function (AssertableJson $json) {
                $json->where('status', false)
                    ->where('msg', '指定資料不存在');
            });

        $response3 = $this->withSession(['member' => $member2])
            ->get('/quote/edit/sub8/10?'.$paramEdit2Str);
        $response3->assertStatus(200)
            ->assertJson(function (AssertableJson $json) {
                $json->where('status', true)
                    ->where('msg', 'success')
                    ->where('item.mainId', '10')
                    ->where('item.sub7Price', '2200')
                    ->where('item.sub7SubTotal', '8800')
                    ->where('item.reviewName', '唐憲中')
                    ->where('item.reviewFillDate', '2023-02-03 00:00:00')
                    ;
            });
    }

    public function testCreateSub8() {
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
        $response1 = $this->withSession(['member' => $member1])
            ->post("/quote/create/sub8/1", $paramEdit1);
        $response1->assertStatus(200)
            ->assertJson([
                'status' => false,
                'msg' => 'quoteSub_8 permission denied',
            ]);

        $param2 = [
            'account' => 'account19',
            'pass' => '123456',
        ];
        $member2 = $memberRepo->checkLogin($param2);
        $paramEdit2 = [
            'mode' => 'json',
        ];
        $response2 = $this->withSession(['member' => $member2])
            ->post('/quote/create/sub8/14', $paramEdit2);
        $response2->assertStatus(200)
            ->assertJson(function (AssertableJson $json) {
                $json->where('status', false)
                    ->where('msg', '輸入錯誤')
                    ->has('errors.sub1Price')
                    ->has('errors.sub1SubTotal')
                    ->has('errors.sub2Price')
                    ->has('errors.sub2SubTotal')
                    ->has('errors.sub3Price')
                    ->has('errors.sub3SubTotal')
                    ->has('errors.sub3_1Price')
                    ->has('errors.sub3_1SubTotal')
                    ->has('errors.sub4Price')
                    ->has('errors.sub4SubTotal')
                    ->has('errors.sub5Price')
                    ->has('errors.sub5SubTotal')
                    ->has('errors.sub6Price')
                    ->has('errors.sub6SubTotal')
                    ->has('errors.sub7Price')
                    ->has('errors.sub7SubTotal')
                    ;
            });

        $paramEdit3 = [
            'mode' => 'json',
            'sub1Price' => 4580,
            'sub1SubTotal' =>  9160,
            'sub2Price' => 3000,
            'sub2SubTotal' => 12000,
            'sub3Price' => 3600,
            'sub3SubTotal' => 7200,
            'sub3_1Price' => 4800,
            'sub3_1SubTotal' => 4800,
            'sub4Price' => 4580,
            'sub4SubTotal' =>  9160,
            'sub5Price' => 3000,
            'sub5SubTotal' => 12000,
            'sub6Price' => 4580,
            'sub6SubTotal' =>  9160,
            'sub7Price' => 3000,
            'sub7SubTotal' => 12000,
        ];
        $response3 = $this->withSession(['member' => $member2])
            ->post('/quote/create/sub8/12', $paramEdit3);
        $response3->assertStatus(200)
            ->assertJson(function (AssertableJson $json) {
                $json->where('status', true)
                    ->where('msg', 'success')
                    ;
            });
        $quoteSub8at1 = $quoteRepo->getSub8ByMainId(12);
        $this->assertEquals(12, $quoteSub8at1->mainId);
        $this->assertEquals(4580, $quoteSub8at1->sub1Price);
        $this->assertEquals(7200, $quoteSub8at1->sub3SubTotal);
        $this->assertEquals(3000, $quoteSub8at1->sub7Price);
        $this->assertEquals(12000, $quoteSub8at1->sub7SubTotal);
    }

    public function testUpdateSub8() {
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
        $response1 = $this->withSession(['member' => $member1])
            ->post("/quote/edit/sub8/1", $paramEdit1);
        $response1->assertStatus(200)
            ->assertJson([
                'status' => false,
                'msg' => 'quoteSub_8 permission denied',
            ]);

        $param2 = [
            'account' => 'account19',
            'pass' => '123456',
        ];
        $member2 = $memberRepo->checkLogin($param2);
        $paramEdit2 = [
            'mode' => 'json',
        ];
        $response2 = $this->withSession(['member' => $member2])
            ->post('/quote/edit/sub8/11', $paramEdit2);
        $response2->assertStatus(200)
            ->assertJson(function (AssertableJson $json) {
                $json->where('status', false)
                    ->where('msg', '輸入錯誤')
                    ->has('errors.sub1Price')
                    ->has('errors.sub1SubTotal')
                    ->has('errors.sub2Price')
                    ->has('errors.sub2SubTotal')
                    ->has('errors.sub3Price')
                    ->has('errors.sub3SubTotal')
                    ->has('errors.sub3_1Price')
                    ->has('errors.sub3_1SubTotal')
                    ->has('errors.sub4Price')
                    ->has('errors.sub4SubTotal')
                    ->has('errors.sub5Price')
                    ->has('errors.sub5SubTotal')
                    ->has('errors.sub6Price')
                    ->has('errors.sub6SubTotal')
                    ->has('errors.sub7Price')
                    ->has('errors.sub7SubTotal')
                    ;
            });

        $paramEdit3 = [
            'mode' => 'json',
            'sub1Price' => 4580,
            'sub1SubTotal' =>  9160,
            'sub2Price' => 3000,
            'sub2SubTotal' => 12000,
            'sub3Price' => 3600,
            'sub3SubTotal' => 7200,
            'sub3_1Price' => 4800,
            'sub3_1SubTotal' => 4800,
            'sub4Price' => 4580,
            'sub4SubTotal' =>  9160,
            'sub5Price' => 3000,
            'sub5SubTotal' => 12000,
            'sub6Price' => 4580,
            'sub6SubTotal' =>  9160,
            'sub7Price' => 3000,
            'sub7SubTotal' => 12000,
        ];
        $response3 = $this->withSession(['member' => $member2])
            ->post('/quote/edit/sub8/11', $paramEdit3);
        $response3->assertStatus(200)
            ->assertJson(function (AssertableJson $json) {
                $json->where('status', true)
                    ->where('msg', 'success')
                    ;
            });
        $quoteSub8at1 = $quoteRepo->getSub8ByMainId(11);
        $this->assertEquals(11, $quoteSub8at1->mainId);
        $this->assertEquals(4580, $quoteSub8at1->sub1Price);
        $this->assertEquals(7200, $quoteSub8at1->sub3SubTotal);
        $this->assertEquals(3000, $quoteSub8at1->sub7Price);
        $this->assertEquals(12000, $quoteSub8at1->sub7SubTotal);
    }
}
