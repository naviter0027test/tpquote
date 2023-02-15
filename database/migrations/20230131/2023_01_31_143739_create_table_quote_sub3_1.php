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
        Schema::create('QuoteSub3_1', function (Blueprint $table) {
            $table->id();
            $table->integer('mainId')
                ->default(0)
                ->comment('主表id');
            $table->string('serialNumber')
                ->nullable()
                ->comment('序號');
            $table->string('name')
                ->nullable()
                ->comment('名稱 (滾漆、噴漆、絲印)');
            $table->string('painted')
                ->nullable()
                ->comment('上漆面 (二底一面、二底二面、二底三面');
            $table->integer('subtotal')
                ->nullable()
                ->comment('價格小計');
            if(env('DB_CONNECTION', '') == 'testing') {
                $table->string('memo')
                    ->default('')
                    ->comment('備註');
            }
            else {
                $table->mediumText('memo')
                    ->default('')
                    ->comment('備註');
            }
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
        Schema::dropIfExists('QuoteSub3_1');
    }
};
