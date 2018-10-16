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

Route::get('/katalog', 'FrontController@tampilKatalog');
Route::get('/katalog/{katalog}', 'FrontController@tampilKatalogDetail')->name('katalog-detail');
Route::get('/kategori/{kategori}', 'FrontController@cariKategori')->name('cari-kategori');
Route::post('/cariKategori', 'FrontController@cariKategoriForm')->name('cari-kategori-form');


//---------------------------------------------------Route Panel Admin
Auth::routes();

Route::get('admin/login', function(){
    if(Auth::check()){
        return redirect('/admin/katalog');
    }
    else {
        return view('/login');
    }
    
});

Route::get('admin', 'HomeController@index');

//----controller Katalog
Route::resource('admin/katalog', 'KatalogController');
Route::resource('admin/kategori', 'KategoriController');
