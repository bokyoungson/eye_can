<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserInfo;
use App\DeviceInfo;

class informationPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	$device_id = $request -> device_id;
		return view('informationPage', ['device_id' => $device_id]);
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
        $user_passwd = $_POST['user_passwd'];
		$protector_phone = $_POST['protector_phone'];
		$user_phone = $_POST['user_phone'];
		$protector_address = $_POST['protector_address'];
		$user_address = $_POST['user_address'];
		
		UserInfo::where('device_id', $device_id)
            ->update(['user_passwd' => $user_passwd]);
		UserInfo::where('device_id', $device_id)
            ->update(['protector_phone' => $protector_phone]);
		UserInfo::where('device_id', $device_id)
            ->update(['user_phone' => $user_phone]);
		UserInfo::where('device_id', $device_id)
            ->update(['user_address' => $user_address]);
		UserInfo::where('device_id', $device_id)
            ->update(['user_passwdagain' => $user_passwd]);
			
		return view('informationPage', ['device_id' => $device_id]);
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
