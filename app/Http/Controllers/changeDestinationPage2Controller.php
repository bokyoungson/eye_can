<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserInfo;
use App\DeviceInfo;

class changeDestinationPage2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	$device_id = $request -> device_id;
    	return view('changeDestination2', ['device_id'=>$device_id]);
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
        $destination2_str = $_POST['address'];
		$destination2_newstr = $_POST['newaddress'];
		$destination2_lon = $_POST['lon'];
		$destination2_lat = $_POST['lat'];
		
		UserInfo::where('device_id', $device_id)
            ->update(['destination2_str' => $destination2_str]);
		UserInfo::where('device_id', $device_id)
            ->update(['destination2_newstr' => $destination2_newstr]);
		UserInfo::where('device_id', $device_id)
            ->update(['destination2_lon' => $destination2_lon]);
		UserInfo::where('device_id', $device_id)
            ->update(['destination2_lat' => $destination2_lat]);
			
		return view('changeDestination2', ['device_id'=>$device_id]);
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
