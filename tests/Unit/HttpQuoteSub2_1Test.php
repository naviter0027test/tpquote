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

class HttpQuoteSub2_1Test extends TestCase
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
        shell_exec('php artisan db:seed --class=QuoteSub2_1Seeder');
    }

    public function tearDown() : void {
        shell_exec('php artisan DropTables');
    }

    public function testEditSub2_1() {
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
            ->get("/quote/edit/sub2-1/1?$paramEdit1Str");
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
        $paramEdit2Str = http_build_query($paramEdit2);
        $response2 = $this->withSession(['member' => $member2])
            ->get('/quote/edit/sub2-1/999?'.$paramEdit2Str);
        $response2->assertStatus(200)
            ->assertJson(function (AssertableJson $json) {
                $json->where('status', false)
                    ->where('msg', '指定資料不存在');
            });

        $response3 = $this->withSession(['member' => $member2])
            ->get('/quote/edit/sub2-1/1?'.$paramEdit2Str);
        $response3->assertStatus(200)
            ->assertJson(function (AssertableJson $json) {
                $json->where('status', true)
                    ->where('msg', 'success')
                    ->where('item.mainId', '1')
                    ->where('item.serialNumber', 'SLN-20221200001')
                    ->where('item.usageAmount', '90')
                    ->where('item.paperThickness', '50G')
                    ->where('item.coatingMethod', '上UV');
            });
    }

    public function testCreateSub2_1() {
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
            ->post("/quote/create/sub2-1/19", $paramEdit1);
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
            'partNo' => 'SUB1-20221200019',
            //'serialNumber' => 'SLN-20221200019',
        ];
        $response2 = $this->withSession(['member' => $member2])
            ->post("/quote/create/sub2-1/19", $paramEdit2);
        $response2->assertStatus(200)
            ->assertJson(function (AssertableJson $json) {
                $json->where( 'status', false)
                    ->where('msg', '輸入錯誤')
                    ->has('errors.serialNumber')
                    ->has('errors.materialName')
                    ->has('errors.length')
                    ->has('errors.width')
                    ->has('errors.height')
                    ->has('errors.usageAmount')
                    ;
            });

        $paramEdit3 = [
            'mode' => 'json',
            'partNo' => 'SUB1-20221200019',
            'serialNumber' => 'SLN-20221200019',
            'materialName' => '背卡',
            'length' => 455,
            'width' => 90,
            'height' => 199,
            'usageAmount' => 20,
            'paperThickness' => '450G',
            'paperMaterial' => '五層瓦楞',
            'printMethod' => '熱轉印',
            'craftMethod' => '開窗',
            'coatingMethod' => '上薄UV',
            'memo' => 'created by tdd',
            'infoImg' => UploadedFile::fake()->image('img.jpg'),
        ];
        $response3 = $this->withSession(['member' => $member2])
            ->post("/quote/create/sub2-1/19", $paramEdit3);
        $response3->assertStatus(200)
            ->assertJson(function (AssertableJson $json) {
                $json->where( 'status', true)
                    ->where('msg', 'success')
                    ;
            });
        $sub2_1at1 = $quoteRepo->getSub2_1ByMainId(19);
        $this->assertEquals('SLN-20221200019', $sub2_1at1->serialNumber);
        $this->assertEquals('背卡', $sub2_1at1->materialName);
        $this->assertEquals(455, $sub2_1at1->length);
        $this->assertEquals(90, $sub2_1at1->width);
        $this->assertEquals(20, $sub2_1at1->usageAmount);
        $this->assertEquals('開窗', $sub2_1at1->craftMethod);
        Storage::disk('uploads')->assertExists($sub2_1at1->infoImg);
        Storage::disk('uploads')->delete($sub2_1at1->infoImg);
    }

    public function testUpdateSub2_1() {
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
            ->post("/quote/edit/sub2-1/1", $paramEdit1);
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
            ->post("/quote/edit/sub2-1/1", $paramEdit2);
        $response2->assertStatus(200)
            ->assertJson(function (AssertableJson $json) {
                $json->where( 'status', false)
                    ->where('msg', '輸入錯誤')
                    ->has('errors.partNo')
                    ->has('errors.serialNumber')
                    ->has('errors.materialName')
                    ->has('errors.length')
                    ->has('errors.width')
                    ->has('errors.height')
                    ->has('errors.usageAmount')
                    ;
            });
    }
}
