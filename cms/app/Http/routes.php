<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
Route::any('/login','LoginController@login');
Route::any('/classify_ads','ClassifyController@classify_ads');
Route::any('/check_login','LoginController@check_login');
//跳转到后台主页
Route::any('/index','IndexController@index');

//跳转到房东管理
Route::any('/landlord_list','LandlordController@landlord_show');
//跳转到房东增加
Route::any('/landlord_add','LandlordController@landlord_add');

//跳转到租户管理
Route::any('/renter_list','RenterController@renter_list');
//跳转到租户添加
Route::any('/renter_add','RenterController@renter_add');
//住户添加操作
Route::any('/renter_add_pro','RenterController@renter_add_pro');
//住户删除操作
Route::any('/renter_del','RenterController@renter_del');
//用户修改
Route::any('/renter_update','RenterController@renter_update');
//用户修改操作
Route::any('/renter_updatepro','RenterController@renter_updatepro');



//跳转到导航列表
Route::any('/nav_list','NavController@nav_list');
//跳转到导航添加
Route::any('/nav_add','NavController@nav_add');

//跳转到房源列表
Route::any('/house_list','HouseController@house_list');
//跳转到房源添加页面
Route::any('/house_add','HouseController@house_add');
//执行房源添加操作
Route::any('/add_pro','HouseController@add_pro');
//执行房源删除操作
Route::any('/house_del','HouseController@house_del');
//房源修改
Route::any('/house_update','HouseController@house_update');
//执行房源修改操作
Route::any('/house_updatepro','HouseController@house_updatepro');
//执行房源搜索功能
Route::any('/house_search','HouseController@house_search');





