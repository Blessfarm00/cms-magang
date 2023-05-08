<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use GuzzleHttp\Middleware;

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
    Route::get('/logout', 'LoginController@logout')->name('logout');
    //  Route::get('/register', 'RegisterController@showRegistrationForm')->name('register');
    //  Route::post('/register', 'RegisterController@register')->name('register');
});

Route::group([
    'middleware'=> 'auth',
    'namespace' => 'App\Http\Controllers',
], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
 
    Route::get('/profile','ProfileController@index');
    Route::get('/profile/{id}', 'ProfileController@edit');
    Route::post('/profile/update/{id}', 'ProfileController@update');

    Route::get('/user', 'UserController@index');
    Route::get('/fn_get_data', 'InventoriController@fnGetData');
    Route::get('/user/create', 'UserController@create');
    Route::post('/user', 'UserController@store');
    Route::get('/user/{id}/edit', 'UserController@edit');
    Route::post('/user/{id}', 'UserController@delete');
    Route::get('/user/cetak', 'UserController@cetak');
    Route::get('/user/filter', 'UserController@index');
    Route::post('/user/update/{id}', 'UserController@update');
    Route::post('/user{id}', 'UserController@destroy');

    Route::get('/inventori', 'InventoriController@index');
    Route::get('/inventori/cetak', 'InventoriController@cetak');
    Route::get('/fn_get_data', 'InventoriController@fnGetData');
    Route::get('/inventori/create', 'InventoriController@create');
    Route::post('/inventori', 'InventoriController@store');
    Route::get('/inventori/{id}/edit', 'InventoriController@edit');
    Route::post('/inventori/{id}', 'InventoriController@delete');
    Route::post('/inventori/update/{id}', 'InventoriController@update');

    Route::get('/absensi', 'AbsensiController@index');
    Route::get('/fn_get_data', 'AbsensiController@fnGetData');
    Route::get('/absensi/create', 'AbsensiController@create');
    Route::post('/absensi', 'AbsensiController@store');
    Route::get('/absensi/{id}/edit', 'AbsensiController@edit');
    Route::post('/absensi/{id}', 'AbsensiController@delete');
    Route::get('/absensi/cetak', 'AbsensiController@cetak');

    Route::get('/pengambilan', 'PengambilanController@index');
    Route::get('/fn_get_data', 'PengambilanController@fnGetData');
    Route::get('/pengambilan/create', 'PengambilanController@create');
    Route::post('/pengambilan', 'PengambilanController@store');
    Route::get('/pengambilan/{id}/edit', 'PengambilanController@edit');
    Route::post('/pengambilan/{id}', 'PengambilanController@delete');
    Route::post('/pengambilan/update/{id}', 'PengambilanController@update');
    Route::get('/pengambilan/cetak', 'PengambilanController@cetak');

    Route::get('/pengeluaran', 'PengeluaranController@index');
    Route::get('/fn_get_data', 'PengeluaranController@fnGetData');
    Route::get('/test/create', 'PengeluaranController@create');
    Route::post('/pengeluaran', 'PengeluaranController@store');
    Route::get('/pengeluaran/{id}/edit', 'PengeluaranController@edit');
    Route::post('/pengeluaran/{id}', 'PengeluaranController@delete');
    Route::post('/pengeluaran/update/{id}', 'PengeluaranController@update');
    Route::get('/pengeluaran/cetak', 'PengeluaranController@cetak');

});