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
        Schema::create('QuoteTotal', function (Blueprint $table) {
            //總費用計算 牽扯到成本、匯率、獲利
            $table->id();
            $table->integer('mainId')
                ->default(0)
                ->comment('主表id');
            $table->double('costPrice', 8, 2)
                ->default(0)
                ->comment('總成本價格');
            $table->double('profit', 8, 2)
                ->default(0)
                ->comment('獲利值');
            $table->double('exchangeRate', 8, 2)
                ->default(1.0)
                ->comment('匯率');
            $table->double('quotePrice', 8, 2)
                ->default(0)
                ->comment('報價單價');
            $table->string('reviewName')
                ->nullable()
                ->comment('審核填表人');
            $table->dateTime('reviewFillDate')
                ->nullable()
                ->comment('審核填表人日期');
            $table->string('reviewGeneralManager')
                ->nullable()
                ->comment('總經理初審核');
            $table->dateTime('reviewGeneralManagerFillDate')
                ->nullable()
                ->comment('總經理初審核日期');
            $table->string('reviewFinalGeneralManager')
                ->nullable()
                ->comment('總經理最終審核');
            $table->dateTime('reviewFinalGeneralManagerFillDate')
                ->nullable()
                ->comment('總經理最終審核日期');
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
        Schema::dropIfExists('QuoteTotal');
    }
};
