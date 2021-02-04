<?php
use  Gloudemans\Shoppingcart\Facades\Cart;
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
 URL::forceRootUrl('https://studenti.sum.ba/projekti/fsre/2019/g10');
Auth::routes();




Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/home', function () {
    return view('home');
});
 Route::get('/about', function () {
 return view('about'); })->name('about');

Route::get('/create', function () {
    return view('admin.product.dodaj');
})->name('product.dodaj');

Route::get('/shop/{id}','ProductController@show')->name('shop.show');
Route::get('/zene','Zene\ZeneController@index')->name('zene.index');


Route::get('/muskarci','Muskarci\MuskarciController@index')->name('muskarci.index');

Route::group(['middleware' =>['auth', 'admin']], function(){
    Route::get('/admin', function () {
        return view('admin.admin');
    });

        Route::get('/role-register','Admin\DashboardController@registered');
        Route::get('/role-edit/{id}','Admin\DashboardController@registeredit');
        Route::put('/role-register-update/{id}','Admin\DashboardController@registerupdate');
        Route::delete('/role-delete/{id}','Admin\DashboardController@registerdelete');
        Route::get('/orders','Admin\DashboardController@orders');
        Route::get('/orders-edit/{id}','Admin\DashboardController@ordersedit');
        Route::put('/orders-update/{id}','Admin\DashboardController@ordersupdate');
        Route::delete('/orders-delete/{id}','Admin\DashboardController@ordersdelete');
        Route::get('/product/create','ProductController@create')->name('product.create');
        Route::get('/product/createten','ProductController@createten')->name('product.createten');
        Route::get('/product/index','ProductController@index')->name('product.index');
        Route::post('/product/store','ProductController@store')->name('product.store');
        Route::delete('/product-delete/{id}','ProductController@delete');
        Route::put('/product-update/{id}','ProductController@update');
          Route::get('/products-edit/{id}','ProductController@edit')->name('product.edit');

});
Route::group(['middleware' =>'auth'], function(){
	Route::get('/cart','CartController@index')->name('cart.index');

Route::post('/cart','CartController@store')->name('cart.store');
Route::get('empty',function(){
  Cart::destroy();
});
Route::patch('/cart/{product}', 'CartController@update')->name('cart.update');
Route::delete('/cart/{product}', 'CartController@destroy')->name('cart.destroy');

  Route::get('/checkout','CheckoutController@index')->name('checkout.index');
  Route::post('/checkout','CheckoutController@store')->name('checkout.store');
  Route::get('/thankyou', 'ConfirmationController@index')->name('confirmation.index');
});
