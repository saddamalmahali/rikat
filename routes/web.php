<?php

use App\Http\Middleware\CheckUserConfirmed;
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
    if(auth()->check()){
        return redirect('/home');
    }else{
        return redirect('/login');
    }
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('confirmed');
Route::get('/get_data_user', 'HomeController@get_data_user');
Route::get('register/verify/{confirmation_code}', 'Auth\RegisterController@konfirmasi_akun');
Route::get('/success_registration', 'HomeController@not_verified');

Route::group(['prefix'=>'admin', 'as'=>'admin.'], function(){
    Route::group(['prefix'=>'master', 'as'=>'master.'], function(){
        Route::group(['prefix'=>'kategori', 'as'=>'kategori.'], function(){
            Route::get('/', 'Master\KategoriController@index')->name('index');
            Route::post('/get_data_tabel', 'Master\KategoriController@get_data_tabel');
            Route::post('/simpan', 'Master\KategoriController@simpan');
            Route::post('/hapus', 'Master\KategoriController@hapus_data');
        });
    });
});