<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InnerUser;

class UserController extends Controller
{

	 /**
     * 用户注册
     * @author 胡军
     * @date   2016年11月19日15:33:09
     * @return [type]                   [description]
     */	
    public function index()
    {
    	$users = InnerUser::all();
    	return view('user.index', compact('users'));
    }

	 /**
     * 用户注册post响应
     * @author 胡军
     * @date  2016年11月19日15:33:29
     * @return [type]                   [description]
     */	
    public function create(Request $request)
    {
    	$data = $request->all();
    	$data = array_add($data,'level',1);

    	InnerUser::create($data);

    	return back();
    }

}
