<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckMemberLoginMiddle;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MemPermissionController;

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
        Route::post('update', [MemberController::class, 'update']);

        Route::get('permission/lists', [MemPermissionController::class, 'lists']);

        Route::get('logout', [MemberController::class, 'logout']);
    });
});

Route::group(['prefix' => 'member'], function() {
    Route::get('isLogin', [MemberController::class, 'isLogin']);
});
