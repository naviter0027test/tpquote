<?php

namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Repositories\MemberRepository;

class HttpMemberTest extends TestCase
{
    public function setUp() : void {
        parent::setUp();
        shell_exec('php artisan migrate --path=/database/migrations/20221026/');
        shell_exec('php artisan migrate --path=/database/migrations/20221102/');
        shell_exec('php artisan db:seed --class=MemPermissionSeeder');
        shell_exec('php artisan db:seed --class=MemberSeeder');
    }

    public function tearDown() : void {
        shell_exec('php artisan DropTables');
    }

    public function testIsLogin() {
        $memberRepo = new MemberRepository();

        $response = $this->get('/member/isLogin');
        $response->assertStatus(200)
            ->assertJson([
                'status' => false,
                'msg' => 'not login',
            ]);

        $param = [
            'account' => 'test1',
            'pass' => '123456',
        ];
        $member = $memberRepo->checkLogin($param);
        $response = $this->withSession(['member' => $member])
            ->get('/member/isLogin');
        $response->assertStatus(200)
            ->assertJson([
                'status' => true,
                'msg' => 'has login',
            ]);
    }
}
