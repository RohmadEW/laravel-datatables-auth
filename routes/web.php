<?php

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

Auth::routes();

Route::post('wilayah/{wilayah}', ['as' => 'guest.wilayah', 'uses' => 'Backend\AkunController@get_wilayah']);

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'backend', 'middleware' => ['auth', 'role:admin|wilayah|cabang|sekolah|operator']], function() {
    Route::get('file/{folder}/{filename}', ['as' => 'file', 'uses' => 'Backend\FileController@getFile'])->where('filename', '^[^/]+$');

    Route::resource('profil', 'Backend\ProfilController');

    Route::group(['middleware' => ['auth', 'role:admin|wilayah|cabang']], function() {
        Route::resource('akun', 'Backend\AkunController');
        Route::post('akun/datatables', ['as' => 'akun.datatables', 'uses' => 'Backend\AkunController@index']);
        Route::post('akun/change_suspend', ['as' => 'akun.change_suspend', 'uses' => 'Backend\AkunController@change_suspend']);
    });
    Route::group(['middleware' => ['auth', 'role:admin']], function() {
        Route::get('pengaturan', ['as' => 'pengaturan.index', 'uses' => 'Backend\PengaturanController@index']);
        Route::post('pengaturan/datatables', ['as' => 'pengaturan.datatables', 'uses' => 'Backend\PengaturanController@index']);
        Route::post('pengaturan/simpan', ['as' => 'pengaturan.simpan', 'uses' => 'Backend\PengaturanController@update']);

        Route::post('akun/change_role', ['as' => 'akun.change_role', 'uses' => 'Backend\AkunController@change_role']);
        Route::post('akun/simpan_wilayah', ['as' => 'akun.simpan_wilayah', 'uses' => 'Backend\AkunController@save_wilayah']);
        Route::post('akun/reset_wilayah', ['as' => 'akun.reset_wilayah', 'uses' => 'Backend\AkunController@reset_wilayah']);
    });
});
