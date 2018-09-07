<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserInfo;
use App\DeviceInfo;

class devicePageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		
		/*$user_email = $request->user_email;
	    $row = UserInfo::where('user_email', $user_email)->first();
	    $device_id = $row->device_id;*/
	    $device_id = $request->device_id;
    	$info = DeviceInfo::where('device_id', $device_id)->first();
		$battery = $info->battery;
		
		$row = UserInfo::where('device_id', $device_id)->first();
		$user_phone = $row->user_name;
		$protector_phone = $row->protector_phone;
		
		return view('devicePage', ['battery' => $battery,
								   'device_id' => $device_id,
								   'user_phone' => $user_phone,
								   'protector_phone' => $protector_phone]);
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
        //
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