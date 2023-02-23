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
        Schema::create('QuoteSub4', function (Blueprint $table) {
            $table->id();
            $table->integer('mainId')
                ->default(0)
                ->comment('主表id');
            $table->string('serialNumber')
                ->nullable()
                ->comment('序號');
            $table->string('partNo')
                ->nullable()
                ->comment('料號');
            $table->string('materialName')
                ->nullable()
                ->comment('材料名稱 (POF膜、POF袋、PET袋、自封袋、OPP袋、OPP自黏袋、PE袋、PE夾縫袋)');
            $table->integer('length')
                ->nullable()
                ->comment('長');
            $table->integer('width')
                ->nullable()
                ->comment('寬');
            $table->integer('height')
                ->nullable()
                ->comment('高');
            $table->string('origin')
                ->nullable()
                ->comment('產地 (國產、進口)');
            $table->double('thickness', 8, 5)
                ->nullable()
                ->comment('厚度 (0.019, 0.025, 0.037)');
            $table->integer('usageAmount')
                ->nullable()
                ->comment('用量');
            $table->integer('loss')
                ->nullable()
                ->comment('耗損');
            $table->integer('price')
                ->nullable()
                ->comment('單價');
            if(env('DB_CONNECTION', '') == 'testing') {
                $table->string('memo')
                    ->default('')
                    ->comment('備註說明');
            }
            else {
                $table->mediumText('memo')
                    ->default('')
                    ->comment('備註說明');
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
        Schema::dropIfExists('QuoteSub4');
    }
};
