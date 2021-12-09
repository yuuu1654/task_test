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

Route::get("tests/test", "TestController@index");



//コンタクトに関するルーティングをひとまとめにする＆認証されていたら表示する
Route::group(["prefix" => "contact", "middleware" => "auth"], function(){
    Route::get("index", "ContactFormController@index")->name("contact.index");
    Route::get("create", "ContactFormController@create")->name("contact.create");
    Route::post("store", "ContactFormController@store")->name("contact.store");
});

//REST
//Route::resource("contacts", "ContactFormController");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
