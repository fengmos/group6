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
Route::any('/check_login','LoginController@check_login');
//跳转到首页
Route::any('/index','IndexController@index');
//跳转到商户管理页面
Route::any('/nav_show','NavController@nav_show');
//跳转到商户增加
Route::any('/nav_add','NavController@nav_add');
//跳转到幻灯片展示页面
Route::any('/slide_show','SlideController@slide_show');
//跳转到幻灯片添加页面
Route::any('/slide_add','SlideController@slide_add');
//跳转到文章分类的展示页面
Route::any('/classify_list','ClassifyController@classify_list');
//跳转到文章添加分类
Route::any('/classify_add','ClassifyController@classify_add');
//跳转到文章展示列表
Route::any('/article_list','ArticleController@article_list');
//跳转到文章添加页面
Route::any('/article_add','ArticleController@article_add');
//跳转到数据库列表页面
Route::any('/backup_list','BackupController@backup_list');
//添加新的表
Route::any('/backup_add','BackupController@backup_add');
Route::any('/indexs','DataController@index');
Route::any('/adddata','BackupController@adddata');
//添加导航入库
Route::any('/nav_shows','BackupController@nav_shows');
//采集列表
Route::any('/gather_list','GatherController@gather_list');
//采集页面
Route::any('/gather_add','GatherController@gather_add');
//采集开始并且入库
Route::any('/gather_ads','GatherController@gather_ads');
//采集的详情页面
Route::any('/url1','GatherController@url1');


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

//租户个人信息
Route::get('zf_personal_info','WxController@zf_personal_info');

//我关注的房东
Route::get('My_landlord','WxController@My_landlord');

//QQ登录
Route::get('qqlogin','WxLoginController@qqlogin');

//普通用户
Route::post('odu','WxLoginController@ordinaryUser');







