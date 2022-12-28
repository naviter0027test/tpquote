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
    }
}
