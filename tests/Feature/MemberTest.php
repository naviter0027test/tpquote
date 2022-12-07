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
            $this->assertEquals(1, $item->member);
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
            $result = $memberRepo->checkByAccount('account999');
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
                'account' => 'account30',
                'pass' => '123456',
                'userName' => '測試人員',
                'memPermissionId' => 7,
            ];
            $memberRepo->create($param);

            $item = $memberRepo->getById(23);
            $this->assertEquals('account30', $item->account);
            $this->assertEquals('測試人員', $item->userName);
            $this->assertEquals('系統管理者', $item->permissionName);
        }
        catch(Exception $e) {
            $this->assertEquals('錯誤', $e->getMessage());
        }

        try {
            $param = [
                'account' => 'account30',
                'pass' => '123456',
                'userName' => '測試人員',
                'memPermissionId' => 7,
            ];
            $memberRepo->create($param);
        }
        catch(Exception $e) {
            $this->assertEquals('帳號重複', $e->getMessage());
        }

        try {
            $param = [
                'account' => '',
                'pass' => '123456',
                'userName' => '測試人員',
                'memPermissionId' => 7,
            ];
            $memberRepo->create($param);
        }
        catch(Exception $e) {
            $this->assertEquals('帳號不得為空', $e->getMessage());
        }
    }

    public function testCheckLogin() {
        $memberRepo = new MemberRepository();
        try {
            $param = [
                'account' => 'account999',
                'pass' => '123456',
            ];
            $this->assertEquals(false, $memberRepo->checkLogin($param));
        }
        catch(Exception $e) {
            $this->assertEquals('error', $e->getMessage());
        }

        try {
            $param = [
                'account' => 'account19',
                'pass' => '123456',
            ];
            $item = $memberRepo->checkLogin($param);
            $this->assertEquals('管理員', $item->userName);
            $this->assertEquals(7, $item->memPermissionId);
        }
        catch(Exception $e) {
            $this->assertEquals('error', $e->getMessage());
        }
    }

    public function testLists() {
        $memberRepo = new MemberRepository();
        try {
            $param = [
                'nowPage' => '1acco',
                'pageNum' => 'rrr',
            ];
            $memberRepo->lists($param);
        }
        catch(Exception $e) {
            $this->assertEquals('頁數請輸入數字', $e->getMessage());
        }

        /*
        try {
            $param = [
                'nowPage' => '1',
                'pageNum' => 'rrr',
            ];
            $memberRepo->lists($param);
        }
        catch(Exception $e) {
            $this->assertEquals('頁數限制請輸入數字', $e->getMessage());
        }
        */

        $param = [
            'nowPage' => 1,
            'pageNum' => 20,
        ];
        $items = $memberRepo->lists($param);
        $this->assertEquals(20, count($items));

        $item = $items[3];
        $this->assertEquals('account19', $item->account);
        $this->assertEquals('管理員', $item->userName);
        $this->assertEquals('系統管理者', $item->permissionName);
        $this->assertEquals(2, $item->member);

        $item = $items[5];
        $this->assertEquals('account17', $item->account);
        $this->assertEquals('工廠成本會計', $item->userName);
        $this->assertEquals('工業成本會計', $item->permissionName);
        $this->assertEquals(1, $item->member);
    }

    public function testListsAmount() {
        $memberRepo = new MemberRepository();
        $param = [];
        $amount = $memberRepo->listsAmount($param);
        $this->assertEquals(22, $amount);
    }

    public function testUpdateById() {
        $memberRepo = new MemberRepository();
        try {
            $param = [];
            $memberRepo->updateById(999, $param);
        }
        catch(Exception $e) {
            $this->assertEquals('指定資料不存在', $e->getMessage());
        }

        $item = $memberRepo->getById(20);
        $param = [];
        $param['userName'] = '測試員999';
        $param['memPermissionId'] = 3;
        $memberRepo->updateById($item->id, $param);

        $item = $memberRepo->getById(20);
        $this->assertEquals('測試員999', $item->userName);
        $this->assertEquals(3, $item->memPermissionId);

        $param = [];
        $param['pass'] = '12345678';
        $memberRepo->updateById(20, $param);

        $param = [
            'account' => 'account20',
            'pass' => '12345678',
        ];
        $this->assertNotEquals(false, $memberRepo->checkLogin($param));
    }

    public function testRemoveById() {
        $memberRepo = new MemberRepository();
        $memberRepo->removeById(21);

        $param = [];
        $amount = $memberRepo->listsAmount($param);
        $this->assertEquals(21, $amount);
    }
}
