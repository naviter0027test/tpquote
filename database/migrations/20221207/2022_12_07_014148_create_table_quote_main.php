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
        Schema::create('QuoteMain', function (Blueprint $table) {
            $table->id();
            $table->integer('quoteCls')
                ->default(0)
                ->comment('報價類別 1:業務一部 2:業務二部 3:公司品項');
            $table->string('customerProductNum')
                ->nullable()
                ->comment('客人產品編號');
            $table->string('productNum')
                ->nullable()
                ->comment('產品編號');
            $table->string('productNameTw')
                ->nullable()
                ->comment('中文產品名稱');
            $table->string('productNameEn')
                ->nullable()
                ->comment('英文產品名稱');
            $table->string('quoteQuality')
                ->nullable()
                ->comment('品質要求: 高 中高 普通 低');
            $table->string('quoteQuantity')
                ->nullable()
                ->comment('報價數量: MOQ-1K 3K 5K 10K');
            $table->string('image')
                ->nullable()
                ->comment('插入圖片');
            if(env('DB_CONNECTION', '') == 'testing') {
                $table->string('productInfo', 512)
                    ->default('')
                    ->comment('產品說明');
            }
            else {
                $table->mediumText('productInfo')
                    ->default('')
                    ->comment('產品說明');
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
        Schema::dropIfExists('QuoteMain');
    }
};
