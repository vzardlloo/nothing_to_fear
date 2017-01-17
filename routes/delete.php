<?php

/**
 * 删除用户
 * @author 鹿才磊 <vzardlloo@gmail.com>
 * 
 */
Route::get('user','Del_UserController@index');

Route::post('user','Del_UserController@create');
