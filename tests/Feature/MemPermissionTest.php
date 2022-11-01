<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MemPermissionTest extends TestCase
{
    public function setUp() : void {
        shell_exec('php artisan migrate --path=/database/migrations/20221026/');
        shell_exec('php artisan db:seed --class=MemPermissionSeeder');
    }

    public function tearDown() : void {
        shell_exec('php artisan DropTables');
    }

    public function testInit() {
        $this->assertTrue(true);
    }
}
