<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TaskMark;
use App\TaskInfo;
class MarkController extends Controller
{
    public function index(Request $request)
    {
    	$mark_info = TaskMark::all();
    	$task_id = $request->get('task_id');
    	$task_info = TaskInfo::where('task_id','=',$task_id)->get();

    	return view('add.mark',compact('mark_info', 'task_info'));
    }

    public function create(Request $request)
    {		

    	return back();
    }
}
