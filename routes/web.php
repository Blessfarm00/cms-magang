<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;

// /*
// |--------------------------------------------------------------------------
// | Web Routes
// |--------------------------------------------------------------------------
// |
// | Here is where you can register web routes for your application. These
// | routes are loaded by the RouteServiceProvider within a group which
// | contains the "web" middleware group. Now create something great!
// |
//  */

// Route::get('/', function () {
//     return redirect()->route('login');
// })->name('landing');


Route::group([
    // 'middleware' => 'guest',
    'namespace' => 'App\Http\Controllers\Auth',
], function () {
    Route::get('/login', 'LoginController@showLoginForm')->name('login');
    Route::post('/login', 'LoginController@authenticate')->name('authenticate');
    Route::post('/logout', 'LoginController@destroy')->name('destroy');
    //  Route::get('/register', 'RegisterController@showRegistrationForm')->name('register');
    //  Route::post('/register', 'RegisterController@register')->name('register');
});

Route::group([
    'namespace' => 'App\Http\Controllers',
], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
 
});

Route::get('/profile','App\Http\Controllers\ProfileController@index');
Route::get('/profile/{id}', 'App\Http\Controllers\ProfileController@edit');
Route::post('/profile/update/{id}', 'App\Http\Controllers\ProfileController@update');


Route::get('/user', 'App\Http\Controllers\UserController@index');
Route::get('/fn_get_data', 'App\Http\Controllers\InventoriController@fnGetData');
Route::get('/user/create', 'App\Http\Controllers\UserController@create');
Route::post('/user', 'App\Http\Controllers\UserController@store');
Route::get('/user/{id}/edit', 'App\Http\Controllers\UserController@edit');
Route::post('/user/{id}', 'App\Http\Controllers\UserController@delete');
Route::get('/user/cetak', 'App\Http\Controllers\UserController@cetak');
Route::get('/user/filter', 'App\Http\Controllers\UserController@index');
// Route::post('/user/{id}', 'App\Http\Controllers\UserController@update');

Route::get('/inventori', 'App\Http\Controllers\InventoriController@index');
Route::get('/inventori/cetak', 'App\Http\Controllers\InventoriController@cetak');
Route::get('/fn_get_data', 'App\Http\Controllers\InventoriController@fnGetData');
Route::get('/inventori/create', 'App\Http\Controllers\InventoriController@create');
Route::post('/inventori', 'App\Http\Controllers\InventoriController@store');
Route::get('/inventori/{id}/edit', 'App\Http\Controllers\InventoriController@edit');
Route::post('/inventori/{id}', 'App\Http\Controllers\InventoriController@delete');
Route::post('/inventori/update/{id}', 'App\Http\Controllers\InventoriController@update');

Route::get('/absensi', 'App\Http\Controllers\AbsensiController@index');
Route::get('/fn_get_data', 'App\Http\Controllers\AbsensiController@fnGetData');
Route::get('/absensi/create', 'App\Http\Controllers\AbsensiController@create');
Route::post('/absensi', 'App\Http\Controllers\AbsensiController@store');
Route::get('/absensi/{id}/edit', 'App\Http\Controllers\AbsensiController@edit');
Route::post('/absensi/{id}', 'App\Http\Controllers\AbsensiController@delete');
Route::get('/absensi/cetak', 'App\Http\Controllers\AbsensiController@cetak');

Route::get('/pengambilan', 'App\Http\Controllers\PengambilanController@index');
Route::get('/fn_get_data', 'App\Http\Controllers\PengambilanController@fnGetData');
Route::get('/pengambilan/create', 'App\Http\Controllers\PengambilanController@create');
Route::post('/pengambilan', 'App\Http\Controllers\PengambilanController@store');
Route::get('/pengambilan/{id}/edit', 'App\Http\Controllers\PengambilanController@edit');
Route::post('/pengambilan/{id}', 'App\Http\Controllers\PengambilanController@delete');
Route::post('/pengambilan/update/{id}', 'App\Http\Controllers\PengambilanController@update');
Route::get('/pengambilan/cetak', 'App\Http\Controllers\PengambilanController@cetak');

Route::get('/pengeluaran', 'App\Http\Controllers\PengeluaranController@index');
Route::get('/fn_get_data', 'App\Http\Controllers\PengeluaranController@fnGetData');
Route::get('/test/create', 'App\Http\Controllers\PengeluaranController@create');
Route::post('/pengeluaran', 'App\Http\Controllers\PengeluaranController@store');
Route::get('/pengeluaran/{id}/edit', 'App\Http\Controllers\PengeluaranController@edit');
Route::post('/pengeluaran/{id}', 'App\Http\Controllers\PengeluaranController@delete');
Route::post('/pengeluaran/update/{id}', 'App\Http\Controllers\PengeluaranController@update');
Route::get('/pengeluaran/cetak', 'App\Http\Controllers\PengeluaranController@cetak');



