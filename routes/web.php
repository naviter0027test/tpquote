<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckMemberLoginMiddle;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MemPermissionController;
use App\Http\Controllers\TstController;
use App\Http\Controllers\QuoteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware([CheckMemberLoginMiddle::class])->group(function() {
    Route::get('/', [MemberController::class, 'loginPage']);

    Route::group(['prefix' => 'member'], function() {
        Route::get('login', [MemberController::class, 'loginPage']);
        Route::post('login', [membercontroller::class, 'login']);
        Route::get('home', [MemberController::class, 'home']);
        Route::get('password', [MemberController::class, 'passwordPage']);
        Route::post('password', [MemberController::class, 'password']);
        Route::get('proccess', [MemberController::class, 'proccess']);

        Route::get('lists', [MemberController::class, 'lists']);
        Route::get('create', [MemberController::class, 'createPage']);
        Route::post('create', [MemberController::class, 'create']);
        Route::get('edit', [MemberController::class, 'edit']);
        Route::post('update/{id}', [MemberController::class, 'update']);
        Route::get('remove/{id}', [MemberController::class, 'remove']);

        Route::get('permission/lists', [MemPermissionController::class, 'lists']);

        Route::get('logout', [MemberController::class, 'logout']);
    });

    Route::group(['prefix' => 'quote'], function() {
        Route::get('lists/main', [QuoteController::class, 'listsMain']);
        Route::get('create/main', [QuoteController::class, 'createMainPage']);
        Route::post('create/main', [QuoteController::class, 'createMain']);
        Route::get('edit/main/{id}', [QuoteController::class, 'editMain']);
        Route::post('edit/main/{id}', [QuoteController::class, 'updateMain']);
        Route::get('remove/main/{id}', [QuoteController::class, 'removeMain']);
        Route::get('subs/main/{id}', [QuoteController::class, 'subsMain']);

        Route::get('create/sub1/{mainId}', [QuoteController::class, 'createSub1Page']);
        Route::post('create/sub1/{mainId}', [QuoteController::class, 'createSub1']);
        Route::get('edit/sub1/{mainId}', [QuoteController::class, 'editSub1']);
        Route::post('edit/sub1/{mainId}', [QuoteController::class, 'updateSub1']);
        Route::get('lists/sub1', [QuoteController::class, 'listsSub1']);
        Route::get('remove/sub1/{mainId}', [QuoteController::class, 'removeSub1']);

        Route::get('create/sub1-1/{mainId}', [QuoteController::class, 'createSub1_1Page']);
        Route::post('create/sub1-1/{mainId}', [QuoteController::class, 'createSub1_1']);
        Route::get('edit/sub1-1/{mainId}', [QuoteController::class, 'editSub1_1']);
        Route::post('edit/sub1-1/{mainId}', [QuoteController::class, 'updateSub1_1']);

        Route::get('create/sub2/{mainId}', [QuoteController::class, 'createSub2Page']);
        Route::post('create/sub2/{mainId}', [QuoteController::class, 'createSub2']);
        Route::get('edit/sub2/{mainId}', [QuoteController::class, 'editSub2']);
        Route::post('edit/sub2/{mainId}', [QuoteController::class, 'updateSub2']);

        Route::get('create/sub2-1/{mainId}', [QuoteController::class, 'createSub2_1Page']);
        Route::post('create/sub2-1/{mainId}', [QuoteController::class, 'createSub2_1']);
        Route::get('edit/sub2-1/{mainId}', [QuoteController::class, 'editSub2_1']);
        Route::post('edit/sub2-1/{mainId}', [QuoteController::class, 'updateSub2_1']);

        Route::get('create/sub3/{mainId}', [QuoteController::class, 'createSub3Page']);
        Route::post('create/sub3/{mainId}', [QuoteController::class, 'createSub3']);
        Route::get('edit/sub3/{mainId}', [QuoteController::class, 'editSub3']);
        Route::post('edit/sub3/{mainId}', [QuoteController::class, 'updateSub3']);

        Route::get('create/sub3-1/{mainId}', [QuoteController::class, 'createSub3_1Page']);
        Route::get('edit/sub3-1/{mainId}', [QuoteController::class, 'editSub3_1']);
        Route::post('create/sub3-1/{mainId}', [QuoteController::class, 'createSub3_1']);
        Route::post('edit/sub3-1/{mainId}', [QuoteController::class, 'updateSub3_1']);

        Route::get('create/sub4/{mainId}', [QuoteController::class, 'createSub4Page']);
        Route::get('edit/sub4/{mainId}', [QuoteController::class, 'editSub4']);
        Route::post('create/sub4/{mainId}', [QuoteController::class, 'createSub4']);
        Route::post('edit/sub4/{mainId}', [QuoteController::class, 'updateSub4']);

        Route::get('create/sub5/{mainId}', [QuoteController::class, 'createSub5Page']);
        Route::get('edit/sub5/{mainId}', [QuoteController::class, 'editSub5']);
        Route::post('create/sub5/{mainId}', [QuoteController::class, 'createSub5']);
        Route::post('edit/sub5/{mainId}', [QuoteController::class, 'updateSub5']);

        Route::get('create/sub5-1/{mainId}', [QuoteController::class, 'createSub5_1Page']);
        Route::get('edit/sub5-1/{mainId}', [QuoteController::class, 'editSub5_1']);
        Route::post('create/sub5-1/{mainId}', [QuoteController::class, 'createSub5_1']);
        Route::post('edit/sub5-1/{mainId}', [QuoteController::class, 'updateSub5_1']);

        Route::get('create/sub6/{mainId}', [QuoteController::class, 'createSub6Page']);
        Route::get('edit/sub6/{mainId}', [QuoteController::class, 'editSub6']);
        Route::post('create/sub6/{mainId}', [QuoteController::class, 'createSub6']);
        Route::post('edit/sub6/{mainId}', [QuoteController::class, 'updateSub6']);

        Route::get('create/sub7/{mainId}', [QuoteController::class, 'createSub7Page']);
        Route::get('edit/sub7/{mainId}', [QuoteController::class, 'editSub7']);
        Route::post('create/sub7/{mainId}', [QuoteController::class, 'createSub7']);
        Route::post('edit/sub7/{mainId}', [QuoteController::class, 'updateSub7']);

        Route::get('create/sub7-1/{mainId}', [QuoteController::class, 'createSub7_1Page']);
        Route::get('edit/sub7-1/{mainId}', [QuoteController::class, 'editSub7_1']);
        Route::post('create/sub7-1/{mainId}', [QuoteController::class, 'createSub7_1']);
        Route::post('edit/sub7-1/{mainId}', [QuoteController::class, 'updateSub7_1']);

        Route::get('create/sub8/{mainId}', [QuoteController::class, 'createSub8Page']);
        Route::get('edit/sub8/{mainId}', [QuoteController::class, 'editSub8']);
        Route::post('create/sub8/{mainId}', [QuoteController::class, 'createSub8']);
        Route::post('edit/sub8/{mainId}', [QuoteController::class, 'updateSub8']);

        Route::get('create/sub9/{mainId}', [QuoteController::class, 'createSub9Page']);
        Route::get('edit/sub9/{mainId}', [QuoteController::class, 'editSub9']);
        Route::post('create/sub9/{mainId}', [QuoteController::class, 'createSub9']);
        Route::post('edit/sub9/{mainId}', [QuoteController::class, 'updateSub9']);

        Route::get('create/total/{mainId}', [QuoteController::class, 'createTotalPage']);
        Route::get('edit/total/{mainId}', [QuoteController::class, 'editTotal']);
        Route::post('create/total/{mainId}', [QuoteController::class, 'createTotal']);
        Route::post('edit/total/{mainId}', [QuoteController::class, 'updateTotal']);

        Route::get('pdf/main/{mainId}', [QuoteController::class, 'pdfMain']);
        Route::get('pdf/test', [QuoteController::class, 'pdfTest']);
    });
});

Route::group(['prefix' => 'member'], function() {
    Route::get('isLogin', [MemberController::class, 'isLogin']);
});

Route::get('tst/iframe/mother', [TstController::class, 'iframeMother']);
Route::get('tst/iframe/child', [TstController::class, 'iframeChild']);
