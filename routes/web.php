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

Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix'=>'admin'], function() {
    //group User
    Route::group(['prefix'=>'user'], function(){
        Route::get('index','UserController@getIndex');
        //get add
        Route::get('add','UserController@getAdd');
        //post add
        Route::post('add','UserController@postAdd');
        //search
        Route::get('search','UserController@search');
    });
    //group Products
    Route::group(['prefix'=>'product'], function(){
        Route::get('index','ProductController@getIndex');
        //get add
        Route::match(['get','post'],'/add',['as' => '/add', 'uses'=> 'ProductController@add']);
        //post edit
        Route::match(['get','post'],'/edit/{id}',['as' => '/edit/{id}', 'uses'=> 'ProductController@edit']);
        //post delete
        Route::post('delete','ProductController@delete');
        //search
        Route::post('search', 'ProductController@search');
        // Route::get('search', 'ProductController@search');
    });

    Route::get('/index','AdminController@index');
    Route::post('/admin-dashboard','AdminController@dashboard');

    Route::group(['prefix'=>'admindemo'], function(){
        //get add
        Route::get('/dashboard','AdminController@show_dashboard');
        //post add
    });
    // Route::group(['prefix'=>'project'], function(){
    //     //get add
    //     Route::get('/index','ProjectController@index');
    //     //post add
    // });




});
Route::get('/','ProjectController@index');

