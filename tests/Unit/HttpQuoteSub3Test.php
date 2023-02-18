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

class HttpQuoteSub3Test extends TestCase
{
    public function setUp() : void {
        parent::setUp();
        shell_exec('php artisan migrate --path=/database/migrations/20221026/');
        shell_exec('php artisan migrate --path=/database/migrations/20221102/');
        shell_exec('php artisan migrate --path=/database/migrations/20221207/');
        shell_exec('php artisan migrate --path=/database/migrations/20230111/');
        shell_exec('php artisan migrate --path=/database/migrations/20230131/');
        shell_exec('php artisan db:seed --class=MemPermissionSeeder');
        shell_exec('php artisan db:seed --class=MemberSeeder');
        shell_exec('php artisan db:seed --class=QuoteMainSeeder');
        shell_exec('php artisan db:seed --class=QuoteSub1Seeder');
        shell_exec('php artisan db:seed --class=QuoteSub2Seeder');
        shell_exec('php artisan db:seed --class=QuoteSub3Seeder');
    }

    public function tearDown() : void {
        shell_exec('php artisan DropTables');
    }

    public function testEditSub3() {
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
            ->get("/quote/edit/sub3/1?$paramEdit1Str");
        $response1->assertStatus(200)
            ->assertJson([
                'status' => false,
                'msg' => 'quoteSub_3 permission denied',
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
            ->get('/quote/edit/sub3/999?'.$paramEdit2Str);
        $response2->assertStatus(200)
            ->assertJson(function (AssertableJson $json) {
                $json->where('status', false)
                    ->where('msg', '指定資料不存在');
            });

        $response3 = $this->withSession(['member' => $member2])
            ->get('/quote/edit/sub3/6?'.$paramEdit2Str);
        $response3->assertStatus(200)
            ->assertJson(function (AssertableJson $json) {
                $json->where('status', true)
                    ->where('msg', 'success')
                    ->where('item.mainId', '6')
                    ->where('item.partNo', 'SUB1-20221200006')
                    ->where('item.usageAmount', '62')
                    ->where('item.spec', '釘帽直徑6mm')
                    ;
            });
    }

    public function testCreateSub3() {
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
            ->post("/quote/create/sub3/1", $paramEdit1);
        $response1->assertStatus(200)
            ->assertJson([
                'status' => false,
                'msg' => 'quoteSub_3 permission denied',
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
            ->post('/quote/create/sub3/18', $paramEdit2);
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
            'partNo' => 'SUB1-20221200018',
            'materialName' => '雙面覆膠軟鐵',
            'length' => 448,
            'width' => 230,
            'height' => 160,
            'usageAmount' => 90,
            'spec' => '孔深8mm',
            'info' => 'created by tdd',
            'infoImg' => UploadedFile::fake()->image('img.jpg'),
        ];
        $response3 = $this->withSession(['member' => $member2])
            ->post('/quote/create/sub3/18', $paramEdit3);
        $response3->assertStatus(200)
            ->assertJson(function (AssertableJson $json) {
                $json->where('status', true)
                    ->where('msg', 'success')
                    ;
            });
        $sub3at1 = $quoteRepo->getSub3ByMainId(18);
        $this->assertEquals('SUB1-20221200018', $sub3at1->partNo);
        $this->assertEquals('雙面覆膠軟鐵', $sub3at1->materialName);
        $this->assertEquals(448, $sub3at1->length);
        $this->assertEquals(230, $sub3at1->width);
        $this->assertEquals(90, $sub3at1->usageAmount);
        $this->assertEquals('孔深8mm', $sub3at1->spec);
        Storage::disk('uploads')->assertExists($sub3at1->infoImg);
        Storage::disk('uploads')->delete($sub3at1->infoImg);
    }
}
