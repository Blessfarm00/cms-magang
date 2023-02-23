<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KulinerController;

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

Route::get('/', function () {
    return redirect()->route('login');
})->name('landing');

Route::group([
    'middleware' => 'guest',
    'namespace' => 'App\Http\Controllers\Auth',
], function () {
    Route::get('/login', 'LoginController@showLoginForm')->name('login');
    Route::post('/login', 'LoginController@authenticate')->name('authenticate');
     Route::get('/register', 'RegisterController@showRegistrationForm')->name('register');
     Route::post('/register', 'RegisterController@register')->name('register');
});

Route::group([
    'middleware' => 'auth',
    'namespace' => 'App\Http\Controllers',
], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');

    Route::group([
        'prefix' => 'admin',
    ], function () {
        Route::get('/', 'UserController@index')->name('index.admin');
        Route::get('/fn_get_data', 'UserController@fnGetData');
        Route::get('/create', 'UserController@create');
        Route::post('/create', 'UserController@store');
        Route::get('/{id}', 'UserController@edit');
        Route::post('/{id}', 'UserController@update');
        Route::get('delete/{id}', 'UserController@delete');
    });

    Route::group([
        'prefix' => 'role',
    ], function () {
        Route::get('/', 'RoleController@index')->name('index.role');
        Route::get('/fn_get_data', 'RoleController@fnGetData');
        Route::get('/create', 'RoleController@create');
        Route::post('/create', 'RoleController@store');
        Route::get('/{id}', 'RoleController@edit');
        Route::post('/{id}', 'RoleController@update');
        Route::get('delete/{id}', 'RoleController@delete');
    });

 
});

Route::get('/user',function(){
    return view('pages.Administrator.user.index');
});

Route::get('/user.create', function () {
    return view('pages.Administrator.user.create');
});

Route::get('/inventori',function(){
    return view('pages.Administrator.inventori.index');
});

Route::get('/inventori.create',function(){
    return view('pages.Administrator.inventori.create');
});

Route::get('/absensi', function () {
    return view('pages.Administrator.absensi.index');
});

Route::get('/absensi.create', function () {
    return view('pages.Administrator.absensi.create');
});

Route::get('/pengambilan', function () {
    return view('pages.Administrator.pengambilan.index');
});

Route::get('/pengambilan.create', function () {
    return view('pages.Administrator.pengambilan.create');
});

Route::get('/pengeluaran', function () {
    return view('pages.Administrator.pengeluaran.index');
});

Route::get('/pengeluaran.create', function () {
    return view('pages.Administrator.pengeluaran.create');
});

Route::get('/pemasukan', function () {
    return view('pages.Administrator.pemasukan.index');
});

Route::get('/pemasukan.create', function () {
    return view('pages.Administrator.pemasukan.create');
});

Route::get('/menu', function () {
    return view('pages.Administrator.menu.index');
});

Route::get('/menu.create', function () {
    return view('pages.Administrator.menu.create');
});

Route::get('/print', function () {
    return view('pages.Administrator.print.laporan');
});

Route::group([
    'prefix' => 'kuliner',
], function () {
    Route::get('/', 'App\Http\Controllers\KulinerController@index');
    Route::get('/fn_get_data', 'KulinerController@fnGetData');
    Route::get('/create', 'KulinerController@create');
    Route::post('/create', 'KulinerController@store');
    Route::get('/{id}', 'KulinerController@edit');
    Route::post('/{id}', 'KulinerController@update');
    Route::get('delete/{id}', 'KulinerController@delete');
});