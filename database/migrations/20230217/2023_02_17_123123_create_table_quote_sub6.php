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
        Schema::create('QuoteSub6', function (Blueprint $table) {
            $table->id();
            $table->integer('mainId')
                ->default(0)
                ->comment('主表id');
            $table->string('serialNumber')
                ->nullable()
                ->comment('序號');
            $table->string('processName')
                ->nullable()
                ->comment('工序名稱 (鞋底板、裁面板、面板滾漆、貼紙、底板貼紙、面板熱轉印、鑽孔、面板合框+品檢、沖壓一刀、沖壓二刀+撥取出品檢、噴漆、絲印、修邊、底板烙印、打磨、取出品檢 打磨、敲定、取出敲木釘+鐵釘5)');
            $table->string('materialName')
                ->nullable()
                ->comment('材料名稱 (彩盒、展示盒、盒身、盒底、盒內邊條、盒蓋、盒蓋長邊條、盒蓋短邊條、膠磁、單面背膠膠磁、雙面覆膠軟鐵、鉚釘、強磁、磁石、PVC片、PVC盒)');
            if(env('DB_CONNECTION', '') == 'testing') {
                $table->string('processMemo')
                    ->default('')
                    ->comment('工序備註');
            }
            else {
                $table->mediumText('processMemo')
                    ->default('')
                    ->comment('工序備註');
            }
            $table->integer('localNeedSec')
                ->nullable()
                ->comment('本廠需求秒數');
            $table->integer('usageAmount')
                ->nullable()
                ->comment('用量');
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
        Schema::dropIfExists('QuoteSub6');
    }
};
