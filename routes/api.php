<?php

use Illuminate\Http\Request;

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
Route::post('/login-api', 'Api\Auth\LoginApiController@login');

Route::post('/upload-gambar', 'Api\Master\KategoriController@demo_upload');
Route::group(['prefix'=>'storage'], function(){
    Route::group(['prefix'=>'get'], function(){
        Route::get('/{id_lapor}', 'Api\Common\ImageController@get_image');
    });
    Route::get('/get_image', 'Api\Common\ImageController@upload');
});
Route::post('/create-user', 'Api\Auth\LoginApiController@create')->middleware('auth:api');
Route::group(['prefix'=>'v1'], function(){
    Route::group(['prefix'=>'transactions'], function(){
        Route::get('/get_data', 'Api\Transaction\LaporController@get_data');
    });
    Route::group(['prefix'=>'master'], function(){
        Route::group(['prefix'=>'kategori'], function(){
            Route::get('/', 'Api\Master\KategoriController@index');
        });        
    });
});
Route::group(['middleware'=>'auth:api'], function(){
    Route::group(['prefix'=>'v1'], function(){
        Route::group(['prefix'=>'auth'], function(){
            Route::get('/user', function (Request $request) {
                if($request->user()->admin == 1){
                    return response()->json($request->user(), 200);
                }else{
                    return response()->json(['status'=>'sukses', 'role'=>"user"], 200);
                }
            });
        });
        Route::group(['prefix'=>'master'], function(){
            Route::group(['prefix'=>'kategori'], function(){
                
                Route::post('/', 'Api\Master\KategoriController@simpan_data');
                Route::delete('/{id_kategori}', 'Api\Master\KategoriController@hapus_data');
                Route::get('/{id_kategori}', 'Api\Master\KategoriController@get_kategori');
            });
            
        });
        Route::group(['prefix'=>'transactions'], function(){
            Route::post('/lapor', 'Api\Transaction\LaporController@store');
            
        });
        Route::group(['prefix'=>'images'], function(){
            Route::post('/upload', 'Api\Common\ImageController@upload');
            Route::get('/get_image', 'Api\Common\ImageController@upload');
        });
    });
});
