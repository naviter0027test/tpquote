<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Member', function (Blueprint $table) {
            $table->id();
            $table->string('account')
                ->comment('登入帳號');
            $table->string('pass')
                ->comment('登入密碼 md5()');
            $table->string('userName')
                ->nullable()
                ->comment('使用者名稱');
            $table->integer('memPermissionId')
                ->default(0)
                ->comment('MemPermission.id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Member');
    }
};
