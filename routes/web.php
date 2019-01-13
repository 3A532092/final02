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

Auth::routes();

Route::get('/', function () {
    return view('homepage');
});

Route::get('/index',['as'=>'index.show','uses'=>'GraphicController@getindex']);

Route::post('graphic/search','GraphicController@search');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/order',['as' => 'order.index' , 'uses' => 'OrderController@index']);

//Route::get('/order/create',['as'=>'order.create','uses'=>'OrderController@create']);

Route::get('/order/{id}/create',['as'=>'order.create','uses'=>'OrderController@create']);

Route::get('order/{id}/index', ['as' => 'detail.index'  , 'uses' => 'OrderController@getindex']);

Route::post('/orders',['as'=>'order.store','uses'=>'OrderController@store']);

Route::post('/cart',['as' => 'cart.add' , 'uses' => 'CartController@add']);

Route::get('/cart/index',['as' => 'cart.index' , 'uses' => 'CartController@index']);

Route::get('cart/{id}/{q}',['as' => 'cart.update', 'uses'=>'CartController@update']);

Route::delete('/cart/{id}'  , ['as' => 'cart.destroy', 'uses' => 'CartController@destroy']);

Route::delete('/checkout',['as'=>'shop.checkout','uses'=>'OrderController@checkout']);

Route::group(['prefix' => 'admin'], function() {
    Route::get('/', ['as' => 'admin.dashboard.index', 'uses' => 'AdminDashboardController@index']);
    Route::get('graphic'          , ['as' => 'admin.graphic.index' , 'uses' => 'AdminGraphicController@index']);
    Route::get('graphic/create'   , ['as' => 'admin.graphic.create', 'uses' => 'AdminGraphicController@create']);
    Route::get('graphic/{id}/edit', ['as' => 'admin.graphic.edit'  , 'uses' => 'AdminGraphicController@edit']);
    Route::patch('graphic/{id}',    ['as' => 'admin.graphic.update', 'uses' => 'AdminGraphicController@update']);
    Route::post('graphic', ['as' => 'admin.graphic.store'  , 'uses' => 'AdminGraphicController@store']);
    Route::delete('graphic/{id}'  , ['as' => 'admin.graphic.destroy', 'uses' => 'AdminGraphicController@destroy']);
});

