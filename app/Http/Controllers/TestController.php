<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\UserInfo;
use App\DeviceInfo;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $curl = curl_init();
		// map api
		
      $CURLOPT_URL = 'https://eyecan.tk/rest_api/map_api2';
      $result_json = array(
         'device_id' => '12345',
         'index' => 1,
         'battery' => '99',
         'locationX' => '129.084578',	// 스타벅스
         'locationY' => '35.232096',
         //'locationX' => '129.082765',	// 본관
         //'locationY' => '35.232771',
         'angle' => '277',
      );
	  
	 
	 // sos api
	 /*
	 $CURLOPT_URL = 'https://eyecan.tk/rest_api/sos_api';
      $result_json = array(
         'device_id' => '1234'
      );
	 
	 */
      curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                   'Accept: plan/text',
                        'Content-Type: application/json; charset=UTF-8',
                   'Accept-Language: ko'));
      curl_setopt($curl, CURLOPT_URL, $CURLOPT_URL);    
      curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($result_json));
      //curl_setopt($curl, CURLOPT_POST, 1); 
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); //echo return해주는거 없애는 코드.
      $result = curl_exec($curl);   
      curl_close($curl);
      
      return $result;
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
