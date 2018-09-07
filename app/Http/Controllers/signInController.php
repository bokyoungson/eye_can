<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserInfo;
use App\DeviceInfo;
use config\database;

use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class signInController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		return view('signIn');
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
    	$user_name = $_POST['user_name'];
		$protector_name = $_POST['protector_name'];
		$user_phone = $_POST['user_phone'];
		$protector_phone = $_POST['protector_phone'];
		$user_passwd_bf = $_POST['user_passwd'];
		$user_passwd = Hash::make($user_passwd_bf);
		$user_passwdagain_bf = $_POST['user_passwdagain'];
		$user_passwdagain = Hash::make($user_passwdagain_bf);
		$user_email = $_POST['user_email'];
		$user_address = $_POST['user_address'];
		$protector_address = $_POST['protector_address'];
		$device_id = $_POST['device_id'];
			
		UserInfo::insert([
			['user_name' => $user_name,
			 'protector_name' => $protector_name,
			 'user_phone' => $user_phone,
			 'protector_phone' => $protector_phone,
			 'user_passwd' => $user_passwd,
			 'user_passwdagain' => $user_passwdagain,
			 'user_email' => $user_email,
			 'user_address' => $user_address,
			 'protector_address' => $protector_address,
			 'device_id' => $device_id]
		]);
		
		return view('signIn');
    	
		
	   
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
