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

Route::get('/', [MemberController::class, 'loginPage']);

Route::middleware([CheckMemberLoginMiddle::class])->group(function() {
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
        Route::get('lists', [QuoteController::class, 'lists']);
        Route::get('create-1', [QuoteController::class, 'create1']);
        Route::get('edit-1/{id}', [QuoteController::class, 'edit1']);
    });
});

Route::group(['prefix' => 'member'], function() {
    Route::get('isLogin', [MemberController::class, 'isLogin']);
});

Route::get('tst/iframe/mother', [TstController::class, 'iframeMother']);
Route::get('tst/iframe/child', [TstController::class, 'iframeChild']);
