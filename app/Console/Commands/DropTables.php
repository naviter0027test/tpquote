<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;

class DropTables extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'DropTables';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'tdd 測試專用 一段測試結束時會將 memory 所有資料表>刪除';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if(env('DB_CONNECTION', '') != 'testing') {
            echo "非測試模式\n";
            return false;
        }
        echo "開始刪除資料表 (Memory Mode)\n";
        Schema::dropIfExists('MemPermission');
        Schema::dropIfExists('migrations');
        echo "刪除完成\n";
        return Command::SUCCESS;
    }
}
