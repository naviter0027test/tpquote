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

class HttpQuoteSub6Test extends TestCase
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
        shell_exec('php artisan db:seed --class=MemPermissionSeeder');
        shell_exec('php artisan db:seed --class=MemberSeeder');
        shell_exec('php artisan db:seed --class=QuoteMainSeeder');
        shell_exec('php artisan db:seed --class=QuoteSub1Seeder');
        shell_exec('php artisan db:seed --class=QuoteSub2Seeder');
        shell_exec('php artisan db:seed --class=QuoteSub3Seeder');
        shell_exec('php artisan db:seed --class=QuoteSub4Seeder');
        shell_exec('php artisan db:seed --class=QuoteSub5Seeder');
        shell_exec('php artisan db:seed --class=QuoteSub6Seeder');
    }

    public function tearDown() : void {
        shell_exec('php artisan DropTables');
    }

    public function testEditSub6() {
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
            ->get("/quote/edit/sub6/1?$paramEdit1Str");
        $response1->assertStatus(200)
            ->assertJson([
                'status' => false,
                'msg' => 'quoteSub_6 permission denied',
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
            ->get('/quote/edit/sub6/999?'.$paramEdit2Str);
        $response2->assertStatus(200)
            ->assertJson(function (AssertableJson $json) {
                $json->where('status', false)
                    ->where('msg', '指定資料不存在');
            });

        $response3 = $this->withSession(['member' => $member2])
            ->get('/quote/edit/sub6/5?'.$paramEdit2Str);
        $response3->assertStatus(200)
            ->assertJson(function (AssertableJson $json) {
                $json->where('status', true)
                    ->where('msg', 'success')
                    ->where('item.mainId', '5')
                    ->where('item.serialNumber', 'SLN-20221200005')
                    ->where('item.processName', '底板貼紙')
                    ->where('item.materialName', '盒內邊條')
                    ->where('item.localNeedSec', '185')
                    ;
            });
    }

    public function testCreateSub6() {
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
            ->post("/quote/create/sub6/1", $paramEdit1);
        $response1->assertStatus(200)
            ->assertJson([
                'status' => false,
                'msg' => 'quoteSub_6 permission denied',
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
            ->post('/quote/create/sub6/15', $paramEdit2);
        $response2->assertStatus(200)
            ->assertJson(function (AssertableJson $json) {
                $json->where('status', false)
                    ->where('msg', '輸入錯誤')
                    ->has('errors.serialNumber')
                    ->has('errors.processName')
                    ->has('errors.materialName')
                    ->has('errors.localNeedSec')
                    ->has('errors.usageAmount')
                    ;
            });

        $paramEdit3 = [
            'mode' => 'json',
            'serialNumber' => 'SLN-20221200015',
            'processName' =>  '噴漆',
            'materialName' => "鉚釘",
            'processMemo' => "",
            'localNeedSec' => 350,
            'usageAmount' => 220,
        ];
        $response3 = $this->withSession(['member' => $member2])
            ->post('/quote/create/sub6/15', $paramEdit3);
        $response3->assertStatus(200)
            ->assertJson(function (AssertableJson $json) {
                $json->where('status', true)
                    ->where('msg', 'success')
                    ;
            });
        $quoteSub6at1 = $quoteRepo->getSub6ByMainId(15);
        $this->assertEquals(15, $quoteSub6at1->mainId);
        $this->assertEquals("噴漆", $quoteSub6at1->processName);
        $this->assertEquals("鉚釘", $quoteSub6at1->materialName);
        $this->assertEquals(350, $quoteSub6at1->localNeedSec);
        $this->assertEquals(220, $quoteSub6at1->usageAmount);
    }

    public function testUpdateSub6() {
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
            ->post("/quote/edit/sub6/1", $paramEdit1);
        $response1->assertStatus(200)
            ->assertJson([
                'status' => false,
                'msg' => 'quoteSub_6 permission denied',
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
            ->post('/quote/edit/sub6/11', $paramEdit2);
        $response2->assertStatus(200)
            ->assertJson(function (AssertableJson $json) {
                $json->where('status', false)
                    ->where('msg', '輸入錯誤')
                    ->has('errors.serialNumber')
                    ->has('errors.processName')
                    ->has('errors.materialName')
                    ->has('errors.localNeedSec')
                    ->has('errors.usageAmount')
                    ;
            });

        $paramEdit3 = [
            'mode' => 'json',
            'serialNumber' => 'SLN-20221209911',
            'processName' =>  '噴漆',
            'materialName' => "鉚釘",
            'processMemo' => "",
            'localNeedSec' => 350,
            'usageAmount' => 220,
        ];
        $response3 = $this->withSession(['member' => $member2])
            ->post('/quote/edit/sub6/11', $paramEdit3);
        $response3->assertStatus(200)
            ->assertJson(function (AssertableJson $json) {
                $json->where('status', true)
                    ->where('msg', 'success')
                    ;
            });
        $quoteSub6at1 = $quoteRepo->getSub6ByMainId(11);
        $this->assertEquals(11, $quoteSub6at1->mainId);
        $this->assertEquals("SLN-20221209911", $quoteSub6at1->serialNumber);
        $this->assertEquals("噴漆", $quoteSub6at1->processName);
        $this->assertEquals("鉚釘", $quoteSub6at1->materialName);
        $this->assertEquals(350, $quoteSub6at1->localNeedSec);
        $this->assertEquals(220, $quoteSub6at1->usageAmount);
    }
}
