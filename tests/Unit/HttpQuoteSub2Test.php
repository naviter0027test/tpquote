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

class HttpQuoteSub2Test extends TestCase
{
    public function setUp() : void {
        parent::setUp();
        shell_exec('php artisan migrate --path=/database/migrations/20221026/');
        shell_exec('php artisan migrate --path=/database/migrations/20221102/');
        shell_exec('php artisan migrate --path=/database/migrations/20221207/');
        shell_exec('php artisan migrate --path=/database/migrations/20230111/');
        shell_exec('php artisan db:seed --class=MemPermissionSeeder');
        shell_exec('php artisan db:seed --class=MemberSeeder');
        shell_exec('php artisan db:seed --class=QuoteMainSeeder');
        shell_exec('php artisan db:seed --class=QuoteSub1Seeder');
        shell_exec('php artisan db:seed --class=QuoteSub2Seeder');
    }

    public function tearDown() : void {
        shell_exec('php artisan DropTables');
    }

    public function testEditSub2() {
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
            ->get("/quote/edit/sub2/1?$paramEdit1Str");
        $response1->assertStatus(200)
            ->assertJson([
                'status' => false,
                'msg' => 'quoteSub_2 permission denied',
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
            ->get('/quote/edit/sub2/999?'.$paramEdit2Str);
        $response2->assertStatus(200)
            ->assertJson(function (AssertableJson $json) {
                $json->where('status', false)
                    ->where('msg', '指定資料不存在');
            });

        $response3 = $this->withSession(['member' => $member2])
            ->get('/quote/edit/sub2/5?'.$paramEdit2Str);
        $response3->assertStatus(200)
            ->assertJson(function (AssertableJson $json) {
                $json->where('status', true)
                    ->where('msg', 'success')
                    ->where('item.mainId', '5')
                    ->where('item.serialNumber', 'SLN-20221200005')
                    ->where('item.usageAmount', '99')
                    ->where('item.paperThickness', '250G')
                    ->where('item.coatingMethod', '上啞油');
            });
    }

    public function testUpdateSub2() {
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
            ->post("/quote/edit/sub2/1", $paramEdit1);
        $response1->assertStatus(200)
            ->assertJson([
                'status' => false,
                'msg' => 'quoteSub_2 permission denied',
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
            ->post('/quote/edit/sub2/1', $paramEdit2);
        $response2->assertStatus(200)
            ->assertJson(function (AssertableJson $json) {
                $json->where('status', false)
                    ->where('msg', '輸入錯誤')
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
            'partNo' => 'DSL-202323213892',
            'materialName' => '常案山匹瑞',
            'length' => 488,
            'width' => 390,
            'height' => 90,
            'usageAmount' => 80,
        ];
        $response3 = $this->withSession(['member' => $member2])
            ->post('/quote/edit/sub2/1', $paramEdit3);
        $response3->assertStatus(200)
            ->assertJson(function (AssertableJson $json) {
                $json->where('status', true)
                    ->where('msg', 'success')
                    ;
            });

        $sub2at1 = $quoteRepo->getSub2ByMainId(1);
        $this->assertEquals('DSL-202323213892', $sub2at1->partNo);
        $this->assertEquals('常案山匹瑞', $sub2at1->materialName);
        $this->assertEquals(488, $sub2at1->length);
        $this->assertEquals(390, $sub2at1->width);
        $this->assertEquals(90, $sub2at1->height);
        $this->assertEquals(80, $sub2at1->usageAmount);

        $paramEdit4 = [
            'mode' => 'json',
            'partNo' => 'DSL-202323213892',
            'materialName' => '常案山匹瑞',
            'length' => 488,
            'width' => 390,
            'height' => 90,
            'usageAmount' => 80,
            'infoImg' => UploadedFile::fake()->image('img.jpg'),
        ];
        $response3 = $this->withSession(['member' => $member2])
            ->post('/quote/edit/sub2/1', $paramEdit4);
        $response3->assertStatus(200)
            ->assertJson(function (AssertableJson $json) {
                $json->where('status', true)
                    ->where('msg', 'success')
                    ;
            });
        $sub2at2 = $quoteRepo->getSub2ByMainId(1);
        Storage::disk('uploads')->assertExists($sub2at2->infoImg);
        Storage::disk('uploads')->delete($sub2at2->infoImg);
    }

    public function testCreateSub2() {
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
            ->post("/quote/create/sub2/1", $paramEdit1);
        $response1->assertStatus(200)
            ->assertJson([
                'status' => false,
                'msg' => 'quoteSub_2 permission denied',
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
            ->post('/quote/create/sub2/19', $paramEdit2);
        $response2->assertStatus(200)
            ->assertJson(function (AssertableJson $json) {
                $json->where('status', false)
                    ->where('msg', '輸入錯誤')
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
            'serialNumber' => 'SLN-20221200019',
            'partNo' => 'SUB1-20221200019',
            'materialName' => '彩盒',
            'length' => 455,
            'width' => 300,
            'height' => 230,
            'usageAmount' => 30,
            'boxType' => 'pizza盒型',
            'internalPcsNum' => 90,
            'paperThickness' => '300G',
            'paperMaterial' => '雙灰板',
            'printMethod' => '正反雙面',
            'craftMethod' => '壓刀(折線)',
            'coatingMethod' => '上亞膜',
            'memo' => 'created by http tdd',
            'infoImg' => UploadedFile::fake()->image('img.jpg'),
        ];
        $response3 = $this->withSession(['member' => $member2])
            ->post('/quote/create/sub2/19', $paramEdit3);
        $response3->assertStatus(200)
            ->assertJson(function (AssertableJson $json) {
                $json->where('status', true)
                    ->where('msg', 'success')
                    ;
            });
        $sub2at1 = $quoteRepo->getSub2ByMainId(19);
        $this->assertEquals('SLN-20221200019', $sub2at1->serialNumber);
        $this->assertEquals('彩盒', $sub2at1->materialName);
        $this->assertEquals(455, $sub2at1->length);
        $this->assertEquals(300, $sub2at1->width);
        $this->assertEquals(30, $sub2at1->usageAmount);
        $this->assertEquals('壓刀(折線)', $sub2at1->craftMethod);
        Storage::disk('uploads')->assertExists($sub2at1->infoImg);
        Storage::disk('uploads')->delete($sub2at1->infoImg);
    }
}
