<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('login', 'LoginController@showLoginForm')->name('admin.login');
Route::post('login', 'LoginController@login');
Route::get('logout', 'LoginController@logout');
Route::post('logout', 'LoginController@logout');

Route::get('index', ['as' => 'admin.index', 'uses' => function () {
    return redirect('/admin/log-viewer');
}]);


Route::group(['middleware' => ['auth:admin', 'menu', 'authAdmin']], function () {

    //权限管理路由
    Route::get('permission/{cid}/create', ['as' => 'admin.permission.create', 'uses' => 'PermissionController@create']);
    Route::get('permission/manage', ['as' => 'admin.permission.manage', 'uses' => 'PermissionController@index']);
    Route::get('permission/{cid?}', ['as' => 'admin.permission.index', 'uses' => 'PermissionController@index']);
    Route::post('permission/index', ['as' => 'admin.permission.index', 'uses' => 'PermissionController@index']); //查询
    Route::resource('permission', 'PermissionController', ['names' => ['update' => 'admin.permission.edit', 'store' => 'admin.permission.create']]);


    //角色管理路由
    Route::get('role/index', ['as' => 'admin.role.index', 'uses' => 'RoleController@index']);
    Route::post('role/index', ['as' => 'admin.role.index', 'uses' => 'RoleController@index']);
    Route::resource('role', 'RoleController', ['names' => ['update' => 'admin.role.edit', 'store' => 'admin.role.create']]);


    //用户管理路由
    Route::get('user/index', ['as' => 'admin.user.index', 'uses' => 'UserController@index']);  //用户管理
    Route::post('user/index', ['as' => 'admin.user.index', 'uses' => 'UserController@index']);
    Route::resource('user', 'UserController', ['names' => ['update' => 'admin.role.edit', 'store' => 'admin.role.create']]);

    //植保作业任务路由
    Route::get('task/index',  ['as' => 'admin.task.index', 'uses'=> 'TaskController@index']);
    Route::post('task/index', ['as' => 'admin.task.index', 'uses'=> 'TaskController@index']);
    Route::resource('task', 'TaskController', ['names' =>['update' => 'admin.task.edit', 'store' => 'admin.task.create']]);

    //无人机管理路由
    Route::get('uav/index', ['as' => 'admin.uav.index', 'uses' => 'UavController@index']);
    Route::post('uav/index',['as' => 'admin.uav.index', 'uses' => 'UavController@index']);
    Route::resource('uav', 'UavController', ['names' => ['update' => 'admin.uav.edit', 'store' => 'admin.uav.create']]);

    Route::get('team/index', ['as' => 'admin.team.index', 'uses'=> 'TeamController@index']);

    //植保员工管理路由
    Route::get('staff/index', ['as' => 'admin.staff.index', 'uses'=> 'StaffController@index']);
    Route::post('staff/index',['as' => 'admin.staff.index', 'uses'=> 'StaffController@index']);
    Route::resource('staff', 'StaffController', ['names' => ['update' => 'admin.staff.edit', 'store' => 'admin.staff.create']]);

    //种粮大户管理路由
    Route::get('farmer/index', ['as' => 'admin.farmer.index', 'uses'=> 'FarmerController@index']);
    Route::post('farmer/index',['as' => 'admin.farmer.index', 'uses'=> 'FarmerController@index']);
    Route::resource('farmer', 'FarmerController', ['names'=>['update'=>'admin.farmer.edit', 'store'=>'admin.farmer.create']]);
});

Route::get('/', function () {
    return redirect('/admin/index');
});


