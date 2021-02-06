<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'WelcomeController@index')->name('welcome');
Route::get('/reklame', 'WelcomeController@creklame')->name('creklame');
Route::get('/reklame/{id}/order', 'WelcomeController@order')->name('order');
Route::post('/reklame/order', 'WelcomeController@porder')->name('porder');
Route::get('/riwayat', 'WelcomeController@riwayat')->name('riwayat');
Route::delete('/riwayat/{id}', 'WelcomeController@driwayat');
Route::get('/riwayat/{id}/payment', 'WelcomeController@payment');
Route::post('/riwayat/{id}/payment', 'WelcomeController@upayment');
Route::get('/riwayat/{id}/cetak', 'WelcomeController@cetak');

Route::get('/cregister', 'WelcomeController@cregister')->name('cregister');
Route::post('/cregister', 'WelcomeController@pregister')->name('pregister');
Route::patch('/profil', 'WelcomeController@uprofil')->name('uprofil');

Route::get('/clogin', 'WelcomeController@clogin')->name('clogin');
Route::post('/clogin', 'WelcomeController@plogin')->name('plogin');
Route::get('/clogout', 'WelcomeController@clogout')->name('clogout');
Route::get('/profil', 'WelcomeController@profil')->name('profil');

// -------------------- 
Route::get('/login', 'AuthController@login')->name('login');
Route::post('/loginpost', 'AuthController@loginpost');
Route::get('/logout', 'AuthController@logout')->name('logout');

Route::group(['middleware' => 'auth'], function(){
	Route::get(config('app.root').'/dashboard', function () {
	    return view('auths.dashboard');
	})->name('dashboard');

	Route::resource(config('app.root').'/users', 'UsersController', [
		'names' => [
			'index'  => 'users',
			'create' => 'users.add',
			'store'  => 'users.store'
		]
	]);

	Route::resource(config('app.root').'/reklame', 'ReklameController', [
		'names' => [
			'index'  => 'reklame',
			'create' => 'reklame.add',
			'store'  => 'reklame.store'
		]
	]);

	Route::resource(config('app.root').'/titik', 'TitikReklameController', [
		'names' => [
			'index'  => 'titik',
			'create' => 'titik.add',
			'store'  => 'titik.store'
		]
	]);

	Route::get(config('app.root').'/customer/{id}', 'CustomerController@show');
	Route::resource(config('app.root').'/customer', 'CustomerController', [
		'names' => [
			'index'  => 'customer',
		]
	]);

	Route::get(config('app.root').'/pemesanan/{id}', 'PemesananController@show');
	Route::get(config('app.root').'/pemesanan/{id}/perizinan', 'PemesananController@perizinan');
	Route::get(config('app.root').'/pemesanan/{id}/bayar', 'PemesananController@bayar');
	Route::get(config('app.root').'/pemesanan/{id}/reklame', 'PemesananController@reklame');
	Route::patch(config('app.root').'/pemesanan/{id}/harga', 'PemesananController@update');
	Route::resource(config('app.root').'/pemesanan', 'PemesananController', [
		'names' => [
			'index'  => 'pemesanan',
		]
	]);

	Route::resource(config('app.root').'/pelaporan', 'PelaporanController', [
		'names' => [
			'index'  => 'pelaporan',
		]
	]);
});
