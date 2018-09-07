<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserInfo;
use App\DeviceInfo;

class settingDestinationPage3Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	$device_id = $request->device_id;
    	return view('settingDestination2', ['device_id'=>$device_id]);
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
    	$device_id = $request -> device_id;
        $destination3_str = $_POST['address'];
		$destination3_newstr = $_POST['newaddress'];
		$destination3_lon = $_POST['lon'];
		$destination3_lat = $_POST['lat'];
		
		UserInfo::where('device_id', $device_id)
            ->update(['destination3_str' => $destination3_str]);
		UserInfo::where('device_id', $device_id)
            ->update(['destination3_newstr' => $destination3_newstr]);
		UserInfo::where('device_id', $device_id)
            ->update(['destination3_lon' => $destination3_lon]);
		UserInfo::where('device_id', $device_id)
            ->update(['destination3_lat' => $destination3_lat]);
			
		return view('settingDestination2', ['device_id'=>$device_id]);
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
