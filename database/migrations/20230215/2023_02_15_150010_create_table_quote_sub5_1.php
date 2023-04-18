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
        Schema::create('QuoteSub5_1', function (Blueprint $table) {
            //工序總表
            $table->id();
            $table->integer('mainId')
                ->default(0)
                ->comment('主表id');
            $table->string('serialNumber')
                ->nullable()
                ->comment('序號');
            $table->string('proccessName')
                ->nullable()
                ->comment('工序名稱 (鞋底板、裁面板、面板滾漆、貼紙、底板貼紙、面板熱轉印、鑽孔、面板合框+品檢、沖壓一刀、沖壓二刀+撥取出品檢、噴漆、絲印、修邊、底板烙印、打磨、取出品檢 打磨、敲定、取出敲木釘+鐵釘5)');
            $table->string('firm')
                ->nullable()
                ->comment('廠商 (自製、委外)');
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
        Schema::dropIfExists('QuoteSub5_1');
    }
};
