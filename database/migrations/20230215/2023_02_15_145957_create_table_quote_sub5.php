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
        Schema::create('QuoteSub5', function (Blueprint $table) {
            $table->id();
            $table->integer('mainId')
                ->default(0)
                ->comment('主表id');
            $table->string('serialNumber')
                ->nullable()
                ->comment('序號');
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
            $table->integer('orderNum')
                ->nullable()
                ->comment('訂單數量');
            $table->integer('priceSubtotal')
                ->nullable()
                ->comment('價格小計');
            $table->integer('flattenSubtotal')
                ->nullable()
                ->comment('攤平小計');
            $table->string('packageMethod')
                ->nullable()
                ->comment('包裝方式 (展示盒、收縮、木盒、彩盒)');
            $table->string('boxMethod')
                ->nullable()
                ->comment('裝箱方式 (展示盒、內箱、外箱)');
            $table->dateTime('fillDate')
                ->nullable()
                ->comment('填表人訊息日期');
            $table->dateTime('devFillDate')
                ->nullable()
                ->comment('開發填表人日期');
            $table->dateTime('auditDate')
                ->nullable()
                ->comment('審核人日期');
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
        Schema::dropIfExists('QuoteSub5');
    }
};
