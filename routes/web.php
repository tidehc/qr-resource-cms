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

// 首页路由
Route::get('/', function () {
    return view('welcome');
});

// 前台登录退出路由
Route::group(['prefix' => 'index', 'namespace' => 'Index'], function () {
    Route::get('login', 'LoginController@login')->name('index.login');
    Route::post('login', 'LoginController@doLogin');
    Route::get('logout', 'IndexController@logout');
});

// 前台管理路由
Route::group(['prefix' => 'index', 'namespace' => 'Index', 'middleware' => 'redirectIndex'], function () {

    // 前台用户中心
    Route::get('/', 'IndexController@index');

    // 用户信息
    Route::get('profile', 'UserController@profile');
    Route::post('updateProfile', 'UserController@updateProfile');
    Route::post('updatePassword', 'UserController@updatePassword');

    // 废弃资源管理
    Route::get('resource/createByQrCode', 'ResourceController@createByQrCode');
    Route::post('resource/storeByQrCode', 'ResourceController@storeByQrCode');
    Route::get('resource/showQrCode/{id}', 'ResourceController@showQrCode');
    Route::get('resource/qrCode/{id}', 'ResourceController@qrCode');
    Route::resource('resource', 'ResourceController');

    // 资源分类管理
    Route::resource('category', 'CategoryController');

    // 交易记录管理
    Route::resource('tradeRecord', 'TradeRecordController');

    // 物流信息管理
    Route::resource('logistics', 'LogisticsController');

    // 回收商
    Route::resource('recycler', 'RecyclerController');

    // 物流商
    Route::resource('logisticsProvider', 'LogisticsProviderController');
});

// 后台登录退出路由
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('login', 'LoginController@login')->name('admin.login');
    Route::post('login', 'LoginController@doLogin');
    Route::get('logout', 'IndexController@logout');
});

// 后台管理路由
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['redirectAdmin', 'entrustRbac']], function () {
    
    // 后台中心
    Route::get('/', 'IndexController@index');

    // 管理员信息
    Route::get('profile', 'AdminController@profile');
    Route::post('updateProfile', 'AdminController@updateProfile');
    Route::post('updatePassword', 'AdminController@updatePassword');
    
    // 废弃资源管理
    Route::get('resource/createByQrCode', 'ResourceController@createByQrCode');
    Route::get('resource/showQrCode/{id}', 'ResourceController@showQrCode');
    Route::get('resource/qrCode/{id}', 'ResourceController@qrCode');
    Route::resource('resource', 'ResourceController');
    Route::post('resource/delete', 'ResourceController@delete');

    // 资源分类管理
    Route::resource('category', 'CategoryController');
    Route::post('category/delete', 'CategoryController@delete');

    // 交易记录管理
    Route::resource('tradeRecord', 'TradeRecordController');
    Route::post('tradeRecord/delete', 'TradeRecordController@delete');

    // 物流信息管理
    Route::resource('logistics', 'LogisticsController');
    Route::post('logistics/delete', 'LogisticsController@delete');

    // 回收商
    Route::resource('recycler', 'RecyclerController');
    Route::post('recycler/delete', 'RecyclerController@delete');

    // 物流商
    Route::resource('logisticsProvider', 'LogisticsProviderController');
    Route::post('logisticsProvider/delete', 'LogisticsProviderController@delete');

    // 用户管理
    Route::resource('user', 'UserController');
    Route::post('user/delete', 'UserController@delete');

    // 管理员管理(rbac权限系统)
    // 管理员
    Route::resource('entrust/admin', 'AdminController');
    Route::post('entrust/admin/delete', 'AdminController@delete');

    // 角色
    Route::resource('entrust/role', 'RoleController');
    Route::post('entrust/role/delete', 'RoleController@delete');

    // 权限
    Route::resource('entrust/permission', 'PermissionController');
    Route::post('entrust/permission/delete', 'PermissionController@delete');
});

// 个人测试路由
Route::get('test', function () {
    dd(\App\Admin::find(3)->can('user-list'));
});