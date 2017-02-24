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



//访问微信端主页
Route::get('wx','WxController@index');
//租房
Route::get('rentlist',"WxController@rentlist");
//房屋详情页面
Route::get('housedetail/{id}.html','WxController@housedetail');
//房东登录
Route::get('fd_login','WxLoginController@index');

//百度地图模块
Route::get('map','WxController@map');

//注册页面
Route::get('register','WxLoginController@register');

//密码找回
Route::get('newPassword','WxLoginController@newPassword');

//房东个人页面
Route::get('fd_personal','WxController@fd_personal');
//房东登录
Route::post('fd_personal','WxLoginController@fd_login');

//房东发布房源
Route::get('add_housing','WxController@add_housing');
Route::post('add_housing','WxController@add_housing');

//房东房源列表
Route::get('agent','WxController@agent_list');

//房东下租客
Route::get('tenants','WxController@tenants');

//房东列表
Route::get('landlord','WxController@landlord');

//租房
Route::get('zf','WxLoginController@zf_login');

//租户个人中心
Route::get('zf_personal','WxController@zf_personal');
Route::post('zf_personal','WxController@zf_personal');

//房东修改密码
Route::get('update_pass','WxController@update_pass');

//租户修改密码
Route::get('zf_update_pass','WxController@zf_update_pass');

//房东个人信息
Route::get('personal_info','WxController@personal_info');
Route::post('personal_info','WxController@personal_info');

//租户个人信息
Route::get('zf_personal_info','WxController@zf_personal_info');

//我关注的房东
Route::get('My_landlord','WxController@My_landlord');

//QQ登录
Route::get('qqlogin','WxLoginController@qqlogin');

//普通用户
Route::post('odu','WxLoginController@ordinaryUser');

//房东图片上传
Route::post('fileUpload','WxController@fileUpload');
Route::get('fileUpload','WxController@fileUpload');

//房东退出登录
Route::get('outlogin','WxLoginController@outlogin');







