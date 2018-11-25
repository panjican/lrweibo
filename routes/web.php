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

Route::get('test/info', 'TestController@info');

//Route::get('test/info', ['uses' => 'TestController@info']);

//路由别名
Route::any('test/info', [
	'uses' => 'TestController@info',
	'as'  => 'testinfo'
	]);

Route::any('redis/test', [
    'uses' => 'RedisController@testRedis'
]);




Route::any('user/index', [
    'uses' => 'UserController@index'
]);
Route::any('user/toregister', [
    'uses' => 'UserController@toregister'
]);
Route::any('user/tologin', [
    'uses' => 'UserController@tologin'
]);

Route::any('user/register', [
    'uses' => 'UserController@register'
]);
Route::any('user/login', [
    'uses' => 'UserController@login'
]);


Route::any('user/logout', [
    'uses' => 'UserController@logout'
]);
Route::any('user/home', [
    'uses' => 'UserController@home'
]);
Route::any('user/saveweibo', [
    'uses' => 'UserController@saveweibo'
]);

