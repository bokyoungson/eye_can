<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserInfo;
use App\DeviceInfo;

class settingDestinationPage1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	/*if(isset($request->address)){
    		echo "$request->address";
    	}else{
    		echo "no";
    	}*/
    	
		//$user = UserInfo::where('device_id', '12345')->get();
		
		$device_id = $request->device_id;
		
		
    	return view('settingDestination', ['device_id'=>$device_id]);
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$device_id = $request->device_id;
        $destination1_str = $_POST['address'];
		$destination1_newstr = $_POST['newaddress'];
		$destination1_lon = $_POST['lon'];
		$destination1_lat = $_POST['lat'];
		
		UserInfo::where('device_id', $device_id)
            ->update(['destination1_str' => $destination1_str]);
		UserInfo::where('device_id', $device_id)
            ->update(['destination1_newstr' => $destination1_newstr]);
		UserInfo::where('device_id', $device_id)
            ->update(['destination1_lon' => $destination1_lon]);
		UserInfo::where('device_id', $device_id)
            ->update(['destination1_lat' => $destination1_lat]);
			
		return view('settingDestination', ['device_id'=>$device_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
