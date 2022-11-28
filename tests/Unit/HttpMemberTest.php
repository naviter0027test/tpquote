<?php

namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
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

    public function testLogin() {
        $test1Param = [
            'account' => 'aaaaa',
            'pass' => 'bbbbb',
            'mode' => 'json',
        ];
        $response = $this->call('POST', '/member/login', $test1Param);
        $response->assertStatus(200)
            ->assertJson([
                'status' => false,
                'msg' => 'login failure',
            ]);

        $test2Param = [
            'account' => 'test1',
            'pass' => '123456',
            'mode' => 'json',
        ];
        $response = $this->call('POST', '/member/login', $test2Param);
        $response->assertStatus(200)
            ->assertJson([
                'status' => false,
                'msg' => 'login failure',
            ]);
    }

    public function testLogout() {
        $memberRepo = new MemberRepository();

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

        $test1Param = [
            'mode' => 'json',
        ];
        $response = $this->get('/member/logout?'. http_build_query($test1Param) );
        $response->assertStatus(200)
            ->assertJson([
                'status' => true,
                'msg' => 'logout success',
            ]);
        $response = $this->get('/member/isLogin');
        $response->assertStatus(200)
            ->assertJson([
                'status' => false,
                'msg' => 'not login',
            ]);
    }

    public function testCheckMemberLoginMiddle() {
        $response = $this->get('/member/home');
        $response->assertStatus(302)
            ->assertRedirect('/member/login')
            ->assertLocation('/member/login');

        $response = $this->get('/member/login');
        $response->assertStatus(200);

        $memberRepo = new MemberRepository();

        $param = [
            'account' => 'test1',
            'pass' => '123456',
        ];
        $member = $memberRepo->checkLogin($param);

        $response = $this->withSession(['member' => $member])
            ->get('/member/home');
        $response->assertStatus(200);

        $response = $this->get('/member/login');
        $response->assertStatus(302)
            ->assertRedirect('/member/home');
    }

    public function testUpdatePassword() {
        $memberRepo = new MemberRepository();
        $param = [
            'account' => 'account1',
            'pass' => '123456',
        ];
        $member = $memberRepo->checkLogin($param);

        $updateParam = [
            'oldPass' => '1234567',
            'pass' => '12345678',
            'mode' => 'json',
        ];
        $response = $this->withSession(['member' => $member])
            ->post('/member/password', $updateParam);
        $response->assertStatus(200)
            ->assertJson([
                'status' => false,
                'msg' => '舊密碼錯誤',
            ]);

        $updateParam2 = [
            'oldPass' => '123456',
            'pass' => '12345678',
            'mode' => 'json',
        ];
        $response = $this->withSession(['member' => $member])
            ->post('/member/password', $updateParam2);
        $response->assertStatus(200)
            ->assertJson([
                'status' => true,
                'msg' => '密碼更新成功',
            ]);
    }

    public function testLists() {
        $memberRepo = new MemberRepository();
        $param = [
            'account' => 'account1',
            'pass' => '123456',
        ];
        $member = $memberRepo->checkLogin($param);

        $searchParam = [
            'mode' => 'json',
        ];
        $response = $this->withSession(['member' => $member])
            ->get('/member/lists?'. http_build_query($searchParam));
        $response->assertStatus(200)
            ->assertJson(function (AssertableJson $json) {
            $json->where('status', true)
                ->where('msg', '成員列表成功')
                ->where('amount', 22)
                ->has('items.3', function($item2) {
                    $item2->where('id', 19)
                        ->where('userName', '管理員')
                        ->where('permissionName', '系統管理者')
                        ->etc();
                })
                ->has('items.19', function($item19) {
                    $item19->where('id', 3)
                        ->where('userName', '採購人員3')
                        ->where('permissionName', '採購部')
                        ->etc();
                });
            });
    }

    public function testCreate() {
        $memberRepo = new MemberRepository();
        $param = [
            'account' => 'account1',
            'pass' => '123456',
        ];
        $member = $memberRepo->checkLogin($param);

        $createParam = [
            'mode' => 'json',
        ];
        $response = $this->withSession(['member' => $member])
            ->post('/member/create', $createParam);
        $response->assertStatus(200)
            ->assertJson(function (AssertableJson $json) {
                $json->where('status', false)
                    ->where('msg', '權限不足');
            });

        $sysParam = [
            'account' => 'account19',
            'pass' => '123456',
        ];
        $member2 = $memberRepo->checkLogin($sysParam);

        $createParam2 = [
            'mode' => 'json',
        ];
        $response = $this->withSession(['member' => $member2])
            ->post('/member/create', $createParam2);
        $response->assertStatus(200)
            ->assertJson(function (AssertableJson $json) {
                $json->where('status', false)
                    ->where('msg', '輸入錯誤')
                    ->has('errors.account')
                    ->has('errors.pass')
                    ->has('errors.userName')
                    ->has('errors.memPermissionId');
            });

        $createParam2 = [
            'mode' => 'json',
            'account' => 'account33',
            'pass' => '123456',
            'userName' => '李順生',
            'memPermissionId' => 1,
        ];
        $response = $this->withSession(['member' => $member2])
            ->post('/member/create', $createParam2);
        $response->assertStatus(200)
            ->assertJson(function (AssertableJson $json) {
                $json->where('status', true)
                    ->where('msg', '新增成功');
            });

        $searchParam = [
            'account' => 'account33',
            'pass' => '123456',
        ];
        $member33 = $memberRepo->checkLogin($searchParam);
        $this->assertNotEquals(false, $member33);
    }

    public function testUpdate() {
        $memberRepo = new MemberRepository();
        $param = [
            'account' => 'account1',
            'pass' => '123456',
        ];
        $member = $memberRepo->checkLogin($param);

        $updateParam = [
            'mode' => 'json',
        ];
        $response = $this->withSession(['member' => $member])
            ->post('/member/update/22', $updateParam);
        $response->assertStatus(200)
            ->assertJson(function (AssertableJson $json) {
                $json->where('status', false)
                    ->where('msg', '權限不足');
            });

        $sysParam = [
            'account' => 'account19',
            'pass' => '123456',
        ];
        $member2 = $memberRepo->checkLogin($sysParam);

        $updateParam2 = [
            'mode' => 'json',
        ];
        $response2 = $this->withSession(['member' => $member2])
            ->post('/member/update/22', $updateParam2);
        $response2->assertStatus(200)
            ->assertJson(function (AssertableJson $json) {
                $json->where('status', false)
                    ->where('msg', '輸入錯誤')
                    ->has('errors.userName')
                    ->has('errors.memPermissionId');
            });

        $updateParam3 = [
            'mode' => 'json',
            'userName' => '陳炯明',
            'memPermissionId' => 1,
        ];
        $response3 = $this->withSession(['member' => $member2])
            ->post('/member/update/22', $updateParam3);
        $response3->assertStatus(200)
            ->assertJson(function (AssertableJson $json) {
                $json->where('status', true)
                    ->where('msg', '修改成功');
            });

        $loginParam = [
            'account' => 'account22',
            'pass' => '123456',
        ];
        $member22 = $memberRepo->checkLogin($loginParam);
        $this->assertNotEquals('測試員3', $member22->userName);
        $this->assertNotEquals(8, $member22->memPermissionId);
    }
}
