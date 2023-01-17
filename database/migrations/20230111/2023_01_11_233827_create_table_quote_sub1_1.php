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
        Schema::create('QuoteSub1_1', function (Blueprint $table) {
            $table->id();
            $table->integer('mainId')
                ->default(0)
                ->comment('主表id');
            $table->string('partNo')
                ->nullable()
                ->comment('料號');
            $table->string('materialName')
                ->nullable()
                ->comment('材料名稱 (盒身、盒底、盒內邊條、盒蓋、盒蓋長邊條、盒蓋短邊條)');
            $table->integer('length')
                ->nullable()
                ->comment('長');
            $table->integer('width')
                ->nullable()
                ->comment('寬');
            $table->integer('height')
                ->nullable()
                ->comment('高');
            $table->integer('usageAmount')
                ->nullable()
                ->comment('用量');
            $table->string('spec')
                ->nullable()
                ->comment('規格 (松木、椴木、譁木、楊木、櫸木)');
            $table->string('specIllustrate')
                ->nullable()
                ->comment('說明 (3夾, 5夾, 7夾, 9夾, 11夾, 刀模板, 指接板, 同向板)');
            $table->string('content')
                ->nullable()
                ->comment('內容 (二椴一楊、二椴九楊、三椴二楊、四椴三陽、四椴五楊、四椴七楊、五椴二楊、五椴四楊)');
            $table->string('level')
                ->nullable()
                ->comment('等級 (特A/A, A/A, A/B, B/B)');
            $table->string('business')
                ->nullable()
                ->comment('業務選擇一 (E0, E1)');
            $table->string('fsc')
                ->nullable()
                ->comment('業務選擇二 (Y, N)');
            $table->integer('materialPrice')
                ->nullable()
                ->comment('材料單價');
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
        Schema::dropIfExists('QuoteSub1_1');
    }
};
