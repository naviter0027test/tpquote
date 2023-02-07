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
        Schema::create('QuoteSub2_1', function (Blueprint $table) {
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
                ->comment('材料名稱 (面紙、底紙、取出紙、背標、背卡、轉角卡、警告標、背紙)');
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
            $table->string('paperThickness')
                ->nullable()
                ->comment('紙材厚度 (50G, 100G, 157G, 200G, 250G, 300G, 350G, 450G, 1150G)');
            $table->string('paperMaterial')
                ->nullable()
                ->comment('紙材 (雙銅、白卡、灰底白板紙、不乾膠、雙膠紙、透明、單銅紙、牛皮紙、雙灰板、白板紙、灰板、透明不乾膠、三層瓦楞、五層瓦楞、熱轉印模)');
            $table->string('printMethod')
                ->nullable()
                ->comment('印刷方式 (單面印刷、正反雙面、四色印刷、單色印刷、專色印刷、熱轉印) 可複選');
            $table->string('craftMethod')
                ->nullable()
                ->comment('工藝方式 (裱E瓦楞、對錶、開窗、打孔) 可複選 最多三個');
            $table->string('coatingMethod')
                ->nullable()
                ->comment('上膜方式 (上UV、上薄UV、上OPP亮膜、上啞油、上亞膜、不上光)');
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
        Schema::dropIfExists('QuoteSub2_1');
    }
};
