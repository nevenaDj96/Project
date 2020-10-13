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


Route::post('/vote','ImageController@create');
Route::get('/dokumentacija', "HomeController@dokumentacija");

Route::get('/', 'HomeController@index');
Route::get('/questions', 'QuestionController@index');
Route::post('/questions/store','QuestionController@store')->name('question');
Route::post('/subscribe', 'HomeController@subscribe')->name('subscribe');

//Login Controller
Route::post('/login',"LoginController@login")->name("login");
Route::post('/register',"LoginController@register")->name("register");
Route::get('/logout',"LoginController@logout");

//ImageController

Route::get('/image', 'ImageController@index');
Route::get('/image/show/{id}','ImageController@show');

//contactController

Route::get('/contact','ContactController@index');
Route::get('/author','HomeController@autor');
Route::post('/contacta','ContactController@store')->name('contact');

//user
    Route::group(["prefix"=>"/user",'middleware'=>'user'], function (){
    Route::get('/','ImageController@user');
    Route::post('/store','ImageController@store')->name('user.upload');
    Route::get('/image/edit/{id}','ImageController@edit');
    Route::get('/image/delete/{id}','ImageController@destroy');
    Route::post('/image/update','ImageController@update')->name('user.update');

    Route::post('/like','ImageController@like');
    Route::post('/unlike','ImageController@unlike');
});

//admin
    Route::group(["prefix"=>"/admin",'middleware'=>'admin'], function (){

    Route::get("/users","LoginController@users");
    Route::get("/home/user/{id}/delete","LoginController@destroy");
    Route::get("/home/user/{id}/role","LoginController@role");
    Route::get("/home/user/{id}/role/user","LoginController@roleuser");

    Route::get("/questions","QuestionController@index");
    Route::post('/answer/{id}/reply','QuestionController@create');
    Route::get('/questions/{id}/delete','QuestionController@destroy');

    Route::get('/image','ImageController@index');
    Route::get('/image/delete/{id}','ImageController@destroyimgadmin');
    Route::get('/vote','ImageController@showvote');
    Route::get('/contact','ContactController@show');
    Route::get('/contact/{id}/delete','ContactController@destroy');
    Route::get('/sub','HomeController@show');
    Route::get('/nav','HomeController@navbar');
    Route::get('/footer','HomeController@footer');
    Route::get('/nav/delete/{id}','HomeController@navdelete');
    Route::get('/nav/edit/{id}','HomeController@navedit');
    Route::post('/nav/update','HomeController@navupdate')->name('nav.update');
    Route::post('/nav/store','HomeController@navstore')->name('nav.store');
    Route::get('/footer/delete/{id}','HomeController@footerdelete');
    Route::get('/footer/edit/{id}','HomeController@footeredit');
    Route::post('/footer/update','HomeController@footerupdate')->name('footer.update');
    Route::post('/footer/store','HomeController@footerstore')->name('footer.store');
});