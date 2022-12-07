<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Exception;

class QuoteTest extends TestCase
{
    public function setUp() : void {
        parent::setUp();
        shell_exec('php artisan migrate --path=/database/migrations/20221207/');
    }

    public function tearDown() : void {
        shell_exec('php artisan DropTables');
    }

    public function testInit()
    {
        $this->assertEquals(true, true);
    }
}
