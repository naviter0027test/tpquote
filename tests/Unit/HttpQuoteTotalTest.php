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

class HttpQuoteTotalTest extends TestCase
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
        shell_exec('php artisan db:seed --class=QuoteSub9Seeder');
        shell_exec('php artisan db:seed --class=QuoteTotalSeeder');
    }

    public function tearDown() : void {
        shell_exec('php artisan DropTables');
    }

    public function testEditTotal() {
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
            ->get("/quote/edit/total/1?$paramEdit1Str");
        $response1->assertStatus(200)
            ->assertJson([
                'status' => false,
                'msg' => 'quoteSub_10 permission denied',
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
            ->get('/quote/edit/total/999?'.$paramEdit2Str);
        $response2->assertStatus(200)
            ->assertJson(function (AssertableJson $json) {
                $json->where('status', false)
                    ->where('msg', '指定資料不存在');
            });

        $response3 = $this->withSession(['member' => $member2])
            ->get('/quote/edit/total/9?'.$paramEdit2Str);
        $response3->assertStatus(200)
            ->assertJson(function (AssertableJson $json) {
                $json->where('status', true)
                    ->where('msg', 'success')
                    ->where('item.mainId', '9')
                    ->where('item.profit', '11000.00')
                    ->where('item.exchangeRate', '1.80')
                    ->where('item.reviewGeneralManager', '湯明月')
                    ;
            });
    }

    public function testCreateTotal() {
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
            ->post("/quote/create/total/1", $paramEdit1);
        $response1->assertStatus(200)
            ->assertJson([
                'status' => false,
                'msg' => 'quoteSub_10 permission denied',
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
            ->post('/quote/create/total/10', $paramEdit2);
        $response2->assertStatus(200)
            ->assertJson(function (AssertableJson $json) {
                $json->where('status', false)
                    ->where('msg', '輸入錯誤')
                    ->has('errors.costPrice')
                    ->has('errors.profit')
                    ->has('errors.exchangeRate')
                    ;
            });

        $paramEdit3 = [
            'mode' => 'json',
            'costPrice' => 56700,
            'profit' => 12500,
            'exchangeRate' => 1.5,
        ];
        $response3 = $this->withSession(['member' => $member2])
            ->post('/quote/create/total/10', $paramEdit3);
        $response3->assertStatus(200)
            ->assertJson(function (AssertableJson $json) {
                $json->where('status', true)
                    ->where('msg', 'success')
                    ;
            });
        $quoteTotalat1 = $quoteRepo->getTotalByMainId(10);
        $this->assertEquals(10, $quoteTotalat1->mainId);
        $this->assertEquals(56700, $quoteTotalat1->costPrice);
        $this->assertEquals(1.5, $quoteTotalat1->exchangeRate);
        $this->assertEquals(103800, $quoteTotalat1->quotePrice);
    }

    public function testUpdateTotal() {
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
            ->post("/quote/edit/total/1", $paramEdit1);
        $response1->assertStatus(200)
            ->assertJson([
                'status' => false,
                'msg' => 'quoteSub_10 permission denied',
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
            ->post('/quote/edit/total/9', $paramEdit2);
        $response2->assertStatus(200)
            ->assertJson(function (AssertableJson $json) {
                $json->where('status', false)
                    ->where('msg', '輸入錯誤')
                    ->has('errors.costPrice')
                    ->has('errors.profit')
                    ->has('errors.exchangeRate')
                    ;
            });

        $paramEdit3 = [
            'mode' => 'json',
            'costPrice' => 56700,
            'profit' => 12500,
            'exchangeRate' => 1.5,
        ];
        $response3 = $this->withSession(['member' => $member2])
            ->post('/quote/edit/total/9', $paramEdit3);
        $response3->assertStatus(200)
            ->assertJson(function (AssertableJson $json) {
                $json->where('status', true)
                    ->where('msg', 'success')
                    ;
            });
        $quoteTotalat1 = $quoteRepo->getTotalByMainId(9);
        $this->assertEquals(9, $quoteTotalat1->mainId);
        $this->assertEquals(56700, $quoteTotalat1->costPrice);
        $this->assertEquals(1.5, $quoteTotalat1->exchangeRate);
        $this->assertEquals(103800, $quoteTotalat1->quotePrice);
    }
}
