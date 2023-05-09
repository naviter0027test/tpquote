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
        Schema::create('QuoteSub9', function (Blueprint $table) {
            //運費
            //報關費:150, 商檢費:150, 提單費:500, 封船費:50, 場站費:45
            //港口:高雄(5400)、東京(4200)、首爾(4400)
            //公式1:報關費+商檢費+提單費+港口 
            //公式2:報關費+商檢費+封船費+港口 
            //公式3:報關費+提單費+場站費+港口 
            //公式4:報關費+封船費+場站費+港口 
            $table->id();
            $table->integer('mainId')
                ->default(0)
                ->comment('主表id');
            $table->integer('port')
                ->default(0)
                ->comment('港口 1:高雄, 2:東京, 3:首爾');
            $table->integer('formula')
                ->default(0)
                ->comment('公式 1:報關費+商檢費+提單費+港口, 2:報關費+商檢費+封船費+港口, 3:報關費+提單費+場站費+港口, 4:報關費+封船費+場站費+港口');
            $table->integer('freight')
                ->default(0)
                ->comment('運費');
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
        Schema::dropIfExists('QuoteSub9');
    }
};
