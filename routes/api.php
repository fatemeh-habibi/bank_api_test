<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\V1\HomeController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    // 'middleware' => Transaction::class
], function () {
    Route::get("bank/list", [HomeController::class, "banks"])->name("bank_list");
    Route::get("card/list", [HomeController::class, "cards"])->name("card_list");
    Route::post("transfer", [HomeController::class, "transfer"])->name("bank_tranfer");

    //user
    Route::group(['prefix' => 'user'], function () {
        Route::get('list', [HomeController::class, 'users'])->name('user_list');
    });
 });
