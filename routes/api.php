<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::get('increment/{product_id}/{session}', 'Home2Controller@incrementQuantity')->name('increment_qty');
    Route::get('decrement/{product_id}/{session}', 'Home2Controller@decrementQuantity')->name('decrement_qty');
    Route::get('delete/{product_id}/{session}', 'Home2Controller@delete');
    Route::get('getCart/{session}', 'Home2Controller@getCart')->name('decrement_qty');
    Route::get('getSubTotal/{session}', 'Home2Controller@getSubTotal');
    Route::get('getCount/{session}', 'Home2Controller@getCount');
});
