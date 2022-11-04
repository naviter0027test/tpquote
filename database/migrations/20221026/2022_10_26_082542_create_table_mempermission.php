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
        Schema::create('MemPermission', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('quoteSub_1')
                ->default(0)
                ->comment('板材 木盒 主材料 0:無權限 1:查詢 2:編輯');
            $table->integer('quoteSub_2')
                ->default(0)
                ->comment('印刷品 標籤 0:無權限 1:查詢 2:編輯');
            $table->integer('quoteSub_3')
                ->default(0)
                ->comment('輔料 0:無權限 1:查詢 2:編輯');
            $table->integer('quoteSub_4')
                ->default(0)
                ->comment('包材 紙箱 收縮膜 0:無權限 1:查詢 2:編輯');
            $table->integer('quoteSub_5')
                ->default(0)
                ->comment('起始費用 0:無權限 1:查詢 2:編輯');
            $table->integer('quoteSub_6')
                ->default(0)
                ->comment('工序工時說明(本廠) 0:無權限 1:查詢 2:編輯');
            $table->integer('quoteSub_7')
                ->default(0)
                ->comment('工序工時說明(委外) 0:無權限 1:查詢 2:編輯');
            $table->integer('quoteSub_8')
                ->default(0)
                ->comment('商辦 0:無權限 1:查詢 2:編輯');
            $table->integer('quoteSub_9')
                ->default(0)
                ->comment('運費 0:無權限 1:查詢 2:編輯');
            $table->integer('quoteSub_10')
                ->default(0)
                ->comment('實際下單成本 0:無權限 1:查詢 2:編輯');
            $table->integer('member')
                ->default(0)
                ->comment('成員管理 0:無權限 1:查詢 2:編輯');
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
        Schema::dropIfExists('MemPermission');
    }
};
