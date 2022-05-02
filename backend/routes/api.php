<?php

use App\Http\Controllers\API\StocksController;
use App\Http\Middleware\XssSanitization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::middleware([XssSanitization::class])->group(function () {
    Route::get('/stocks', [StocksController::class, 'get_stocks_by_date']);
});