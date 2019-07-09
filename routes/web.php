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

//加载后台模板
Route::resource("/admin","Admin\AdminController");

Route::resource("/adminuser","Admin\UserController");

//前台首页
Route::resource("/home","Home\IndexController");
//后台无限分类模块
Route::resource("/admincates","Admin\CatesController");