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

// 后台登录退出路由
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('login', 'LoginController@login')->name('admin.login');
    Route::post('login', 'LoginController@doLogin');
    Route::get('logout', 'IndexController@logout');
});

// 后台管理路由
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'redirectAdmin'], function () {
    
    // 后台中心
    Route::get('/', 'IndexController@index');

    // 管理员信息
    Route::get('profile', 'AdminController@profile');
    Route::post('updateProfile', 'AdminController@updateProfile');
    Route::post('updatePassword', 'AdminController@updatePassword');

    // 分类管理
    Route::resource('category', 'CategoryController');
    Route::post('category/delete', 'CategoryController@delete');

    // 回收商
    Route::resource('recycler', 'RecyclerController');
    Route::post('recycler/delete', 'RecyclerController@delete');

    // 物流商
    Route::resource('logisticsProvider', 'LogisticsProviderController');
    Route::post('logisticsProvider/delete', 'LogisticsProviderController@delete');

    // 用户
    Route::resource('user', 'UserController');
    Route::post('user/delete', 'UserController@delete');
});

// 个人测试路由
Route::get('test', function () {
    dd(method_field('delete'));
});