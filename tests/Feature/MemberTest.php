<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Repositories\MemberRepository;
use Tests\TestCase;
use Exception;

class MemberTest extends TestCase
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

    public function testGetById() {
        $memberRepo = new MemberRepository();
        try {
            $item = $memberRepo->getById(1);
            $this->assertEquals('account1', $item->account);
            $this->assertEquals('採購人員1', $item->userName);
            $this->assertEquals('採購部', $item->permissionName);
            $this->assertEquals(0, $item->member);
        }
        catch(Exception $e) {
            $this->assertEquals('錯誤', $e->getMessage());
        }

        try {
            $item = $memberRepo->getById(20);
        }
        catch(Exception $e) {
            $this->assertEquals('指定資料不存在', $e->getMessage());
        }
    }

    public function testCheckByAccount() {
        $memberRepo = new MemberRepository();
        try {
            $result = $memberRepo->checkByAccount('account9');
            $this->assertEquals(true, $result);
        }
        catch(Exception $e) {
            $this->assertEquals('錯誤', $e->getMessage());
        }

        try {
            $result = $memberRepo->checkByAccount('account20');
            $this->assertEquals(false, $result);
        }
        catch(Exception $e) {
            $this->assertEquals('錯誤', $e->getMessage());
        }
    }

    public function testCreate() {
        $memberRepo = new MemberRepository();
        try {
            $param = [
                'account' => 'account20',
                'pass' => '123456',
                'userName' => '測試人員',
                'memPermissionId' => 7,
            ];
            $memberRepo->create($param);

            $item = $memberRepo->getById(20);
            $this->assertEquals('account20', $item->account);
            $this->assertEquals('測試人員', $item->userName);
            $this->assertEquals('系統管理者', $item->permissionName);
        }
        catch(Exception $e) {
            $this->assertEquals('錯誤', $e->getMessage());
        }

        try {
            $param = [
                'account' => 'account20',
                'pass' => '123456',
                'userName' => '測試人員',
                'memPermissionId' => 7,
            ];
            $memberRepo->create($param);
        }
        catch(Exception $e) {
            $this->assertEquals('帳號重複', $e->getMessage());
        }
    }
}
