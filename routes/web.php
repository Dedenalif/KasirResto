<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('welcome');
});
Route::middleware(['auth', 'role:admin'])->group(function () {
    //Admin Dashboard
    Route::get('admin/dashboard', 'Admin\DashboardController@index')->name('admin-dashboard');

    //Kasir
    Route::get('admin/kasir', 'Admin\KasirController@index')->name('admin-kasir');
    Route::get('kasir/add', 'Admin\KasirController@add')->name('kasir-add');
    Route::post('kasir/store', 'Admin\KasirController@store')->name('kasir-store');
    Route::get('kasir/{id}/edit', 'Admin\KasirController@edit')->name('kasir-edit');
    Route::post('kasir/{id}/update', 'Admin\KasirController@update')->name('kasir-update');
    Route::get('admin/kasir/{id}/delete', 'Admin\KasirController@delete')->name('kasir-delete');

    //Manajer
    Route::get('admin/manajer', 'Admin\ManajerController@index')->name('admin-manajer');
    Route::get('manajer/add', 'Admin\ManajerController@add')->name('manajer-add');
    Route::post('manajer/store', 'Admin\ManajerController@store')->name('manajer-store');
    Route::get('manajer/{id}/edit', 'Admin\ManajerController@edit')->name('manajer-edit');
    Route::post('manajer/{id}/update', 'Admin\ManajerController@update')->name('manajer-update');
    Route::get('admin/manajer/{id}/delete', 'Admin\ManajerController@delete')->name('manajer-delete');
});

Route::middleware(['auth', 'role:manajer'])->group(function () {
    //Manajer Dashboard
    Route::get('manajer/dashboard', 'Manajer\DashboardController@index')->name('manajer-dashboard');

    // Manajer Menu
    Route::get('makanan', 'Manajer\MenuController@makanan')->name('makanan');
    Route::get('minuman', 'Manajer\MenuController@minuman')->name('minuman');
    Route::get('menu/add', 'Manajer\MenuController@add')->name('menu-add');
    Route::post('menu/store', 'Manajer\MenuController@store')->name('menu-store');
    Route::get('menu/{id}/edit', 'Manajer\MenuController@edit')->name('menu-edit');
    Route::post('menu/{id}/update', 'Manajer\MenuController@update')->name('menu-update');
    Route::get('menu/{id}/delete', 'Manajer\MenuController@delete')->name('menu-delete');
    Route::get('status/{id}/edit', 'Manajer\MenuController@status')->name('menu-status');
});

Route::middleware(['auth', 'role:kasir'])->group(function () {
    // Kasir Pesanan
    Route::get('pesanan', 'Kasir\PesananController@index')->name('pesanan');
    Route::post('pesanan/store', 'Kasir\PesananController@store')->name('pesanan-store');
    Route::post('pesanan/{id}/update', 'Kasir\PesananController@update')->name('pesanan-update');
    Route::get('pesanan/{id}/delete', 'Kasir\PesananController@delete')->name('pesanan-delete');

    //Kasir Transaksi
    Route::post('transaksi', 'Kasir\PesananController@transaksiStore')->name('transaksi-store');

    //Kasir Catatan
    Route::get('kasir/catatan', 'Kasir\CatatanController@index')->name('kasir-catatan');
});

Auth::routes();

Route::get('logout', function () {
    Auth::logout();
    return redirect('login');
});

Route::get('/home', 'HomeController@index')->name('home');
