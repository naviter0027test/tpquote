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
        Schema::create('QuoteSub3', function (Blueprint $table) {
            $table->id();
            $table->integer('mainId')
                ->default(0)
                ->comment('主表id');
            $table->string('partNo')
                ->nullable()
                ->comment('料號');
            $table->string('materialName')
                ->nullable()
                ->comment('材料名稱 (膠磁、單面背膠膠磁、雙面覆膠軟鐵、鉚釘、強磁、磁石、PVC片、PVC盒、PVC板、PVC吸塑、PET片、PET袋、PET盒、PET罐)');
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
                ->comment('規格 (H9mm, 釘帽直徑6mm, 孔徑2mm, 孔深8mm)');
            if(env('DB_CONNECTION', '') == 'testing') {
                $table->string('info')
                    ->default('')
                    ->comment('說明');
            }
            else {
                $table->mediumText('info')
                    ->default('')
                    ->comment('說明');
            }
            $table->string('infoImg')
                ->nullable()
                ->comment('插入說明圖片');
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
        Schema::dropIfExists('QuoteSub3');
    }
};
