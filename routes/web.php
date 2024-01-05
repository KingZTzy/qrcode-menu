<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/login-kasir', function () {
    return view('login-user');
});

Route::get('403', function(){
    abort(403);
})->name('403');

Route::group(['namespace' => 'App\Http\Controllers\Admin', 'middleware' => 'auth'],function(){
    Route::get('admin/dashboard', 'DashboardController@index');
    Route::get('admin/dashboard/destroy/{id}', 'DashboardController@destroy');
    Route::post('admin/dashboard/update/{id}', 'DashboardController@update');
    Route::post('admin/dashboard/posts', 'DashboardController@store');

    //Menu
    Route::get('admin/menu', 'MenuController@index')->name('menu');
    Route::post('admin/menu/posts', 'MenuController@store')->name('menu-store');
    Route::post('admin/menu/update/{id}', 'MenuController@update')->name('menu-update');
    Route::get('admin/menu/destroy/{id}', 'MenuController@destroy')->name('admin.menu.destroy');
    Route::get('admin/menu/update-toogle', 'MenuController@updatetoogle')->name('admin.menu.updatetoogle');

    //Meja Makan
    // Route::get('admin/meja-makan', 'MejaMakanController@index');
    // Route::get('admin/kasirOffline', 'MejaMakanController@kasir');
    // Route::post('admin/meja-makan/posts', 'MejaMakanController@store')->name('meja-makan-store');
    // Route::post('admin/meja-makan/update/{id}', 'MejaMakanController@update')->name('meja-makan-update');
    // Route::get('admin/meja-makan/destroy/{id}', 'MejaMakanController@destroy');

    //QrCode
    // Route::get('admin/qrcode/{id}', 'QrCodeController@index');

    //Generate PDF
    Route::get('/admin/generate/{id}','DashboardController@create_pdf');
});

// Route::get('/', '\App\Http\Controllers\HomeController@index');

Route::get('/order', function () {
    return view('orderPlaced');
});

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::get('/{id}', 'Home2Controller@index')->name('index');
    Route::post('add-to-cart/{id}', 'Home2Controller@addToCart');
    Route::get('update-cart/{id}', 'Home2Controller@update');
    Route::get('/cart/{id}', 'Cart2Controller@cart');
    Route::post('/checkout/{id}', 'Cart2Controller@checkout');
    Route::get('/transaction/{id}/{id_transaction}', 'TransactionController@index');
    Route::get('/invoice/{id}/{id_transaction}', 'TransactionController@transaction');
    Route::get('/invoice/{id}/{id_transaction}/update', 'TransactionController@update');
});

// Route::get('/cart/{id}', '\App\Http\Controllers\Cart2Controller@cart');

Route::controller(LoginController::class)->group(function () {
    Route::get('login', 'index')->name('login.index');
    Route::post('login', 'store')->name('login.store');
    Route::post('logout', 'logout')->name('logout');
});

// Route::group(['namespace' => 'App\Http\Controllers'], function () {
//     Route::get('/home', 'HomeController@index')->name('index');
//     Route::post('add-to-cart/{id}', 'HomeController@addToCart');

//     Route::get('update-cart/{id}', 'HomeController@update');
// });

// Route::get('/menu', [ProductsController::class, 'index']);

// Route::get('add-to-cart/{id}', '\App\Http\Controllers\ProductsController@addToCart');

// Route::patch('update-cart', '\App\Http\Controllers\ProductsController@update');

// Route::delete('remove-from-cart', '\App\Http\Controllers\ProductsController@remove');
