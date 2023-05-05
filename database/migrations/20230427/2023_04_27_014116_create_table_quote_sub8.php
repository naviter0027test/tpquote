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
        Schema::create('QuoteSub8', function (Blueprint $table) {
            //步驟5 材料單價
            $table->id();
            $table->integer('mainId')
                ->default(0)
                ->comment('主表id');

            $table->integer('sub1Price')
                ->default(0)
                ->comment('sub1 單價');
            $table->integer('sub1SubTotal')
                ->default(0)
                ->comment('sub1 小計');
            $table->integer('sub2Price')
                ->default(0)
                ->comment('sub2 單價');
            $table->integer('sub2SubTotal')
                ->default(0)
                ->comment('sub2 小計');

            $table->integer('sub3Price')
                ->default(0)
                ->comment('sub3 單價');
            $table->integer('sub3SubTotal')
                ->default(0)
                ->comment('sub3 小計');
            $table->integer('sub3_1Price')
                ->default(0)
                ->comment('sub3-1 單價');
            $table->integer('sub3_1SubTotal')
                ->default(0)
                ->comment('sub3-1 小計');

            $table->integer('sub4Price')
                ->default(0)
                ->comment('sub4 單價');
            $table->integer('sub4SubTotal')
                ->default(0)
                ->comment('sub4 小計');
            $table->integer('sub5Price')
                ->default(0)
                ->comment('sub5 單價');
            $table->integer('sub5SubTotal')
                ->default(0)
                ->comment('sub5 小計');

            $table->integer('sub6Price')
                ->default(0)
                ->comment('sub6 單價');
            $table->integer('sub6SubTotal')
                ->default(0)
                ->comment('sub6 小計');
            $table->integer('sub7Price')
                ->default(0)
                ->comment('sub7 單價');
            $table->integer('sub7SubTotal')
                ->default(0)
                ->comment('sub7 小計');

            $table->string('purchaseName')
                ->nullable()
                ->comment('採購填表人');
            $table->dateTime('purchaseFillDate')
                ->nullable()
                ->comment('採購填表人日期');
            $table->string('reviewName')
                ->nullable()
                ->comment('審核填表人');
            $table->dateTime('reviewFillDate')
                ->nullable()
                ->comment('審核填表人日期');
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
        Schema::dropIfExists('QuoteSub8');
    }
};
