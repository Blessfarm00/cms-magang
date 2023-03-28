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
    Route::post('/logout', 'LoginController@logout');
    Route::post('logout', 'LoginController@ogout')->name('logout');
    //  Route::get('/register', 'RegisterController@showRegistrationForm')->name('register');
    //  Route::post('/register', 'RegisterController@register')->name('register');
});

Route::group([
    'namespace' => 'App\Http\Controllers',
], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    

    // Route::group([
    //     'prefix' => 'admin',
    // ], function () {
    //     Route::get('/', 'UserController@index')->name('index.admin');
    //     Route::get('/fn_get_data', 'UserController@fnGetData');
    //     Route::get('/create', 'UserController@create');
    //     Route::post('/create', 'UserController@store');
    //     Route::get('/{id}', 'UserController@edit');
    //     Route::post('/{id}', 'UserController@update');
    //     Route::get('delete/{id}', 'UserController@delete');
    // });

//     Route::group([
//         'prefix' => 'role',
//     ], function () {
//         Route::get('/', 'RoleController@index')->name('index.role');
//         Route::get('/fn_get_data', 'RoleController@fnGetData');
//         Route::get('/create', 'RoleController@create');
//         Route::post('/create', 'RoleController@store');
//         Route::get('/{id}', 'RoleController@edit');
//         Route::post('/{id}', 'RoleController@update');
//         Route::get('delete/{id}', 'RoleController@delete');
//     });

 
});

// // });

// Route::get('/print', function () {
//     return view('pages.Administrator.print.laporan');
// });


// Route::group([
//     'prefix' => 'kuliner',
// ], function () {
//     Route::get('/', 'App\Http\Controllers\KulinerController@index');
//     Route::get('/fn_get_data', 'KulinerController@fnGetData');
//     Route::get('/create', 'KulinerController@create');
//     Route::post('/create', 'KulinerController@store');
//     Route::get('/{id}', 'KulinerController@edit');
//     Route::post('/{id}', 'KulinerController@update');
//     Route::get('delete/{id}', 'KulinerController@delete');

//     Route::get('/', 'App\Http\Controllers\InventoriController@index');
//     Route::get('/fn_get_data', 'InventoriController@fnGetData');
//     Route::get('/create', 'InventoriController@create');
//     Route::post('/create', 'InventoriController@store');
//     Route::get('/{id}', 'InventoriController@edit');
//     Route::post('/{id}', 'InventoriController@update');
//     Route::get('delete/{id}', 'InventoriController@delete');
// });

Route::get('/user', 'App\Http\Controllers\UserController@index');
Route::get('/fn_get_data', 'App\Http\Controllers\InventoriController@fnGetData');
Route::get('/user/create', 'App\Http\Controllers\UserController@create');
Route::post('/user', 'App\Http\Controllers\UserController@store');
Route::get('/user/{id}/edit', 'App\Http\Controllers\UserController@edit');
Route::delete('/user/{id}', 'App\Http\Controllers\UserController@delete');

Route::get('/inventori', 'App\Http\Controllers\InventoriController@index');
Route::get('/fn_get_data', 'App\Http\Controllers\InventoriController@fnGetData');
Route::get('/inventori/create', 'App\Http\Controllers\InventoriController@create');
Route::post('/inventori', 'App\Http\Controllers\InventoriController@store');
Route::get('/inventori/{id}/edit', 'App\Http\Controllers\InventoriController@edit');
Route::post('/inventori/{id}/', 'App\Http\Controllers\InventoriController@delete');

Route::get('/absensi', 'App\Http\Controllers\AbsensiController@index');
Route::get('/fn_get_data', 'App\Http\Controllers\AbsensiController@fnGetData');
Route::get('/absensi/create', 'App\Http\Controllers\AbsensiController@create');
Route::post('/absensi', 'App\Http\Controllers\AbsensiController@store');
Route::get('/absensi/{id}/edit', 'App\Http\Controllers\AbsensiController@edit');
Route::post('/absensi/{id}', 'App\Http\Controllers\AbsensiController@delete');

Route::get('/pengambilan', 'App\Http\Controllers\PengambilanController@index');
Route::get('/fn_get_data', 'App\Http\Controllers\PengambilanController@fnGetData');
Route::get('/pengambilan/create', 'App\Http\Controllers\PengambilanController@create');
Route::post('/pengambilan', 'App\Http\Controllers\PengambilanController@store');
Route::get('/pengambilan/{id}/edit', 'App\Http\Controllers\PengambilanController@edit');

Route::get('/pengeluaran', 'App\Http\Controllers\PengeluaranController@index');
Route::get('/fn_get_data', 'App\Http\Controllers\PengeluaranController@fnGetData');
Route::get('/test/create', 'App\Http\Controllers\PengeluaranController@create');
Route::post('/pengeluaran', 'App\Http\Controllers\PengeluaranController@store');
Route::get('/pengeluaran/{id}/edit', 'App\Http\Controllers\PengeluaranController@edit');
