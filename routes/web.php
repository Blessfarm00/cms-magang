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


// Route::group([
//     'middleware' => 'guest',
//     'namespace' => 'App\Http\Controllers\Auth',
// ], function () {
//     Route::get('/login', 'LoginController@showLoginForm')->name('login');
//     Route::post('/login', 'LoginController@authenticate')->name('authenticate');
//      Route::get('/register', 'RegisterController@showRegistrationForm')->name('register');
//      Route::post('/register', 'RegisterController@register')->name('register');
// });

// Route::group([
//     'middleware' => 'auth',
//     'namespace' => 'App\Http\Controllers',
// ], function () {
//     Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
//     Route::post('logout', 'Auth\LoginController@logout')->name('logout');

//     Route::group([
//         'prefix' => 'admin',
//     ], function () {
//         Route::get('/', 'UserController@index')->name('index.admin');
//         Route::get('/fn_get_data', 'UserController@fnGetData');
//         Route::get('/create', 'UserController@create');
//         Route::post('/create', 'UserController@store');
//         Route::get('/{id}', 'UserController@edit');
//         Route::post('/{id}', 'UserController@update');
//         Route::get('delete/{id}', 'UserController@delete');
//     });

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

 
// });

// Route::get('/register',function(){
//     return view('layouts.auth.register');
// });

// Route::get('/dashboard',function(){
//     return view('pages.dashboard');
// });

// Route::get('/user',function(){
//     return view('pages.Administrator.user.index');
// });

// Route::get('/user.create', function () {
//     return view('pages.Administrator.user.create');
// });

// Route::get('/inventori',function(){
//     return view('pages.Administrator.inventori.index');
// });

// Route::post('inventori', 'App\Http\Controllers\InventoriController@store');

// Route::get('inventori', 'App\Http\Controllers\InventoriController@getInventori');

// Route::resource('inventori', App\Http\Controllers\InventoriController::class);

// Route::resource('testing', FrontendController::class);

// Route::get('/absensi', function () {
//     return view('pages.Administrator.absensi.index');
// });

// Route::get('/absensi.create', function () {
//     return view('pages.Administrator.absensi.create');
// });

// Route::get('/pengambilan', function () {
//     return view('pages.Administrator.pengambilan.index');
// });

// Route::get('/pengambilan.create', function () {
//     return view('pages.Administrator.pengambilan.create');
// });

// Route::get('pengambilan', 'App\Http\Controllers\PengambilanController@getPengambilan');


// Route::get('/pemasukan', function () {
//     return view('pages.Administrator.pemasukan.index');
// });




// Route::get('/pengeluaran.create', function () {
//     return view('pages.Administrator.pengeluaran.create');
// });

// Route::get('/produk', function () {
//     return view('pages.Administrator.produk.index');
// });

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

// Route::group([
//     'prefix' => 'inventori',
// ],
//     function () {

//     }
// );

Route::get('/inventori', 'App\Http\Controllers\InventoriController@index');
Route::get('/fn_get_data', 'App\Http\Controllers\InventoriController@fnGetData');
Route::get('/inventori/create', 'App\Http\Controllers\InventoriController@create');
Route::post('/create', 'App\Http\Controllers\InventoriController@store');
// Route::get('/{id}', 'App\Http\Controllers\InventoriController@edit');
// Route::post('/{id}', 'App\Http\Controllers\InventoriController@update');
// Route::get('delete/{id}', 'App\Http\Controllers\InventoriController@delete');
// Route::resource('/inventori', App\Http\Controllers\InventoriController::class );


Route::get('/pemasukan', 'App\Http\Controllers\PemasukanController@index');
Route::get('/fn_get_data', 'App\Http\Controllers\PemasukanController@fnGetData');
Route::get('/pemasukan/create', 'App\Http\Controllers\PemasukanController@create');
Route::post('/pemasukan', 'App\Http\Controllers\PemasukanController@store');
// Route::resource('/pemasukan', App\Http\Controllers\PemasukanController::class);

Route::get('/pengambilan', 'App\Http\Controllers\PengambilanController@index');
Route::get('/fn_get_data', 'App\Http\Controllers\PengambilanController@fnGetData');
Route::get('/pengambilan/create', 'App\Http\Controllers\PengambilanController@create');
Route::post('/pengambilan', 'App\Http\Controllers\PengambilanController@store');

Route::get('/produk', 'App\Http\Controllers\ProdukController@index');
Route::get('/fn_get_data', 'App\Http\Controllers\ProdukController@fnGetData');
Route::get('/produk/create', 'App\Http\Controllers\ProdukController@create');
Route::post('/produk', 'App\Http\Controllers\ProdukController@store');

Route::get('/pengeluaran', 'App\Http\Controllers\PengeluaranController@index');
Route::get('/fn_get_data', 'App\Http\Controllers\PengeluaranController@fnGetData');
Route::get('/test/create', 'App\Http\Controllers\PengeluaranController@create');
Route::post('/pengeluaran', 'App\Http\Controllers\PengeluaranController@store');