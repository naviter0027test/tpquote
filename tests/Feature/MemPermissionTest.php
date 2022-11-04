<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Repositories\MemPermissionRepository;
use Exception;

class MemPermissionTest extends TestCase
{
    public function setUp() : void {
        parent::setUp(); //不加這行，會無法使用 Models/MemPermission 或 Repositories/MemPermissionRepository
        shell_exec('php artisan migrate --path=/database/migrations/20221026/');
        shell_exec('php artisan db:seed --class=MemPermissionSeeder');
    }

    public function tearDown() : void {
        shell_exec('php artisan DropTables');
    }

    public function testInit() {
        $memPerRepo = new MemPermissionRepository();
        $memPer = $memPerRepo->getById(1);
        $this->assertEquals('採購部', $memPer->name);
        $this->assertEquals(1, $memPer->quoteSub_1);
        $this->assertEquals(1, $memPer->quoteSub_2);
        $this->assertEquals(1, $memPer->quoteSub_3);
        $this->assertEquals(2, $memPer->quoteSub_4);

        $memPer2 = $memPerRepo->getById(3);
        $this->assertEquals('台北開發', $memPer2->name);
        $this->assertEquals(2, $memPer2->quoteSub_1);
        $this->assertEquals(2, $memPer2->quoteSub_2);
        $this->assertEquals(2, $memPer2->quoteSub_3);
        $this->assertEquals(2, $memPer2->quoteSub_4);

        $memPer3 = $memPerRepo->getById(6);
        $this->assertEquals('財務主管', $memPer3->name);
        $this->assertEquals(1, $memPer3->quoteSub_7);
        $this->assertEquals(1, $memPer3->quoteSub_8);
        $this->assertEquals(0, $memPer3->quoteSub_9);
        $this->assertEquals(1, $memPer3->quoteSub_10);

        try {
            $memPer4 = $memPerRepo->getById(999);
        }
        catch(Exception $e) {
            $this->assertEquals('指定資料不存在', $e->getMessage());
        }
    }

    public function testGetAll() {
        $memPerRepo = new MemPermissionRepository();
        try {
            $lists = $memPerRepo->getAll();
            $memPer1 = $lists[3];
            $this->assertEquals('總經理/業務', $memPer1->name);
            $this->assertEquals(2, $memPer1->quoteSub_3);
            $this->assertEquals(2, $memPer1->quoteSub_4);
            $this->assertEquals(2, $memPer1->quoteSub_5);
            $this->assertEquals(2, $memPer1->quoteSub_6);

            $memPer2 = $lists[4];
            $this->assertEquals('工業成本會計', $memPer2->name);
            $this->assertEquals(1, $memPer2->quoteSub_6);
            $this->assertEquals(1, $memPer2->quoteSub_7);
            $this->assertEquals(2, $memPer2->quoteSub_8);
            $this->assertEquals(0, $memPer2->quoteSub_9);
        }
        catch(Exception $e) {
            $this->assertEquals('error', $e->getMessage());
        }
    }
}
