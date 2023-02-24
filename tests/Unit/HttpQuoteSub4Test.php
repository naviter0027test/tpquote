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

class HttpQuoteSub4Test extends TestCase
{
    public function setUp() : void {
        parent::setUp();
        shell_exec('php artisan migrate --path=/database/migrations/20221026/');
        shell_exec('php artisan migrate --path=/database/migrations/20221102/');
        shell_exec('php artisan migrate --path=/database/migrations/20221207/');
        shell_exec('php artisan migrate --path=/database/migrations/20230111/');
        shell_exec('php artisan migrate --path=/database/migrations/20230131/');
        shell_exec('php artisan migrate --path=/database/migrations/20230215/');
        shell_exec('php artisan db:seed --class=MemPermissionSeeder');
        shell_exec('php artisan db:seed --class=MemberSeeder');
        shell_exec('php artisan db:seed --class=QuoteMainSeeder');
        shell_exec('php artisan db:seed --class=QuoteSub1Seeder');
        shell_exec('php artisan db:seed --class=QuoteSub2Seeder');
        shell_exec('php artisan db:seed --class=QuoteSub3Seeder');
        shell_exec('php artisan db:seed --class=QuoteSub4Seeder');
    }

    public function tearDown() : void {
        shell_exec('php artisan DropTables');
    }

    public function testEditSub4() {
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
            ->get("/quote/edit/sub4/1?$paramEdit1Str");
        $response1->assertStatus(200)
            ->assertJson([
                'status' => false,
                'msg' => 'quoteSub_4 permission denied',
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
            ->get('/quote/edit/sub4/999?'.$paramEdit2Str);
        $response2->assertStatus(200)
            ->assertJson(function (AssertableJson $json) {
                $json->where('status', false)
                    ->where('msg', '指定資料不存在');
            });

        $response3 = $this->withSession(['member' => $member2])
            ->get('/quote/edit/sub4/7?'.$paramEdit2Str);
        $response3->assertStatus(200)
            ->assertJson(function (AssertableJson $json) {
                $json->where('status', true)
                    ->where('msg', 'success')
                    ->where('item.mainId', '7')
                    ->where('item.partNo', 'SUB1-20221200007')
                    ->where('item.usageAmount', '510')
                    ->where('item.origin', '國產')
                    ->where('item.price', '3490')
                    ;
            });
    }

    public function testCreateSub4() {
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
            ->post("/quote/create/sub4/1", $paramEdit1);
        $response1->assertStatus(200)
            ->assertJson([
                'status' => false,
                'msg' => 'quoteSub_4 permission denied',
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
            ->post('/quote/create/sub4/18', $paramEdit2);
        $response2->assertStatus(200)
            ->assertJson(function (AssertableJson $json) {
                $json->where('status', false)
                    ->where('msg', '輸入錯誤')
                    ->has('errors.serialNumber')
                    ->has('errors.partNo')
                    ->has('errors.materialName')
                    ->has('errors.length')
                    ->has('errors.width')
                    ->has('errors.height')
                    ->has('errors.usageAmount')
                    ;
            });

        $paramEdit3 = [
            'mode' => 'json',
            'serialNumber' => 'SLN-20221200017',
            'partNo' => 'SUB1-20221200017',
            'materialName' => 'PE袋',
            'length' => 350,
            'width' => 230,
            'height' => 160,
            'origin' => '進口',
            'thickness' => 0.037,
            'usageAmount' => 45,
            'loss' => 4,
            'price' => 210,
            'memo' => 'create sub4 by tdd',
        ];
        $response3 = $this->withSession(['member' => $member2])
            ->post('/quote/create/sub4/17', $paramEdit3);
        $response3->assertStatus(200)
            ->assertJson(function (AssertableJson $json) {
                $json->where('status', true)
                    ->where('msg', 'success')
                    ;
            });
        $quoteSub4at1 = $quoteRepo->getSub4ByMainId(17);
        $this->assertEquals(17, $quoteSub4at1->mainId);
        $this->assertEquals("SUB1-20221200017", $quoteSub4at1->partNo);
        $this->assertEquals("PE袋", $quoteSub4at1->materialName);
        $this->assertEquals(350, $quoteSub4at1->length);
        $this->assertEquals(0.037, $quoteSub4at1->thickness);
    }

    public function testUpdateSub4() {
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
            ->post("/quote/edit/sub4/1", $paramEdit1);
        $response1->assertStatus(200)
            ->assertJson([
                'status' => false,
                'msg' => 'quoteSub_4 permission denied',
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
            ->post('/quote/edit/sub4/10', $paramEdit2);
        $response2->assertStatus(200)
            ->assertJson(function (AssertableJson $json) {
                $json->where('status', false)
                    ->where('msg', '輸入錯誤')
                    ->has('errors.serialNumber')
                    ->has('errors.partNo')
                    ->has('errors.materialName')
                    ->has('errors.length')
                    ->has('errors.width')
                    ->has('errors.height')
                    ->has('errors.usageAmount')
                    ;
            });

        $paramEdit3 = [
            'mode' => 'json',
            'serialNumber' => 'SLN-20221209910',
            'partNo' => 'SUB1-20221209910',
            'materialName' => 'PE袋',
            'length' => 350,
            'width' => 230,
            'height' => 160,
            'origin' => '進口',
            'thickness' => 0.037,
            'usageAmount' => 45,
            'loss' => 4,
            'price' => 210,
            'memo' => 'create sub4 by tdd',
        ];
        $response3 = $this->withSession(['member' => $member2])
            ->post('/quote/edit/sub4/10', $paramEdit3);
        $response3->assertStatus(200)
            ->assertJson(function (AssertableJson $json) {
                $json->where('status', true)
                    ->where('msg', 'success')
                    ;
            });
        $quoteSub4at1 = $quoteRepo->getSub4ByMainId(10);
        $this->assertEquals(10, $quoteSub4at1->mainId);
        $this->assertEquals("SUB1-20221209910", $quoteSub4at1->partNo);
        $this->assertEquals("PE袋", $quoteSub4at1->materialName);
        $this->assertEquals(350, $quoteSub4at1->length);
        $this->assertEquals(0.037, $quoteSub4at1->thickness);
    }
}
