<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Farmer;
use App\ProvinceRegion;
use App\CityRegion;
use App\AreaRegion;
use App\TownRegion;
use App\CountryRegion;

class FarmerController extends Controller
{
    
    /**
     * 登录认证
     * @author 胡军
     * @date   2016年11月21日10:58:32
     * @return [type]                   [description]
     */
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function index()
    {
    	$farmers = Farmer::paginate(8);
    	$provinces = ProvinceRegion::all();
    	$cities = CityRegion::all();
    	$areaes = AreaRegion::all();
    	$towns = TownRegion::all();
    	$countries = CountryRegion::all();
    	return view('add.farmer',compact('farmers','provinces','cities','areaes','towns','countries'));
    }

    public function create(Request $request)
    {
        $farmer_info = $request->all();
        $farmer_address = '';
        foreach ($farmer_info as $farmer => $info) {
            if(starts_with($farmer,'place_')){
                $farmer_address.=$info.',';
            }
        }
        $farmer_info = array_add($farmer_info, 'farmer_address', $farmer_address);
        Farmer::create($farmer_info);
    	return back();
    }

    public function txt2sql(Request $request)
    {
        $txt = $request->file->storeAs('public','farmer.txt');
        $file = fopen($request->file, "r");
        if($file){
            while(($line = fgets($file)) !== false){
                //$str = split(',', $line);
                $str = explode(',', $line);
                $farmer = array();
                $farmer=array_add($farmer,'farmer_name',$str[0]);
                $farmer=array_add($farmer,'farmer_phone',$str[1]);
                $farmer=array_add($farmer,'farmer_place',$str[2]);
                $farmer=array_add($farmer,'farmer_area',floatval($str[3]));

                Farmer::create($farmer);
            }
        }else{
            exit();
        }

    }

    public function txt()
    {
        return view('txt2sql');
    }

    public function info(Request $request)
    {
        $id = $request->get('id');
        $farmer_info = Farmer::where('id','=',$id)->get();
        $info = $farmer_info[0];
        return view('farmer.info',compact('info'));
    }
}
