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
    return view('home');
})->name('home');

Auth::routes();

Route::get('/home', function () {
    return view('home');
});

Route::get('/shop/{id}','ProductController@show')->name('shop.show');
Route::get('/zene','Zene\ZeneController@index')->name('zene.index');
//Route::get('/zene/{id}','Zene\ZeneController@show');
//Route::get('/muskarci/{id}','Muskarci\MuskarciController@show');

Route::get('/muskarci','Muskarci\MuskarciController@index')->name('muskarci.index');

Route::group(['middleware' =>['auth', 'admin']], function(){
    Route::get('/admin', function () {
        return view('admin.admin');
    });

        Route::get('/role-register','Admin\DashboardController@registered');
        Route::get('/role-edit/{id}','Admin\DashboardController@registeredit');
        Route::put('/role-register-update/{id}','Admin\DashboardController@registerupdate');
        Route::delete('/role-delete/{id}','Admin\DashboardController@registerdelete');

});
