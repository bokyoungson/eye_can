<?php
 
namespace App\Http\Controllers;
                                                        
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Redirect;
use Validator;

use App\UserInfo;
use App\DeviceInfo;

class RestApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return "im eyecan rest api. you entered in get type!!";
    }

    
	
	public function mapApi(Request $request){
		
		
		$validator = Validator::make($request->all(), [
            'device_id' => 'required',
            'index' => 'required',
            'battery' => 'required',
        ]);
		if ($validator->fails()) {
            $response_json = array(
            	'code_num' => '9990',
            	'message' => '필수 파라미터 부족',
            );
			$response_json = json_encode($response_json, JSON_UNESCAPED_UNICODE);
			return response($response_json)
					->header('Content-Type', 'application/json; charset=UTF-8')
					->header('Accept', 'application/json')
					->header('Accept-Language', 'ko');
        }
		
		$device_id = trim($request->device_id);
		$index = trim($request->index);
		$battery = trim($request->battery);
		DeviceInfo::where('device_id', $device_id)->update(['request' => json_encode($request, JSON_UNESCAPED_UNICODE)]);
        
		$isExist = UserInfo::where('device_id', $device_id)->count();
		if($isExist == 0){
			$response_json = array(
            	'code_num' => '1002',
            	'message' => '웹 사이트에 등록 정보 없음',
            );
			DeviceInfo::where('device_id', $device_id)->update(['index' => $index,
																'battery' => $battery,
																'code_num' => '1002',
																'message' => '웹 사이트에 등록 정보 없음']);
			$response_json = json_encode($response_json, JSON_UNESCAPED_UNICODE);
			return response($response_json)
					->header('Content-Type', 'application/json; charset=UTF-8')
					->header('Accept', 'application/json')
					->header('Accept-Language', 'ko');
		}
		if($index >= 8){
			$code_num = '1101';
			if($index == 8){
				$code_num = '1001';
			}
			$response_json = array(
				'code_num' => $code_num,
				'message' => "response OK",
			);
			DeviceInfo::where('device_id', $device_id)->update(['device_id' => $device_id,
																'index' => $index,
																'battery' => $battery,
																'code_num' => $code_num,
																'message' => "response OK",
																]);
			$response_json = json_encode($response_json, JSON_UNESCAPED_UNICODE);
			return response($response_json)
				->header('Content-Type', 'application/json; charset=UTF-8')
				->header('Accept', 'application/json')
				->header('Accept-Language', 'ko');
		}else{
			$validator = Validator::make($request->all(), [
	            'locationX' => 'required',
	            'locationY' => 'required',
	            'angle' => 'required',
	        ]);
	
	        if ($validator->fails()) {
	            $response_json = array(
	            	'code_num' => '9990',
	            	'message' => '필수 파라미터 부족',
	            );
				DeviceInfo::where('device_id', $device_id)->update(['device_id' => $device_id,
													            	'index' => $index,
													            	'battery' => $battery,
													            	'code_num' => '9990',
													            	'message' => '필수 파라미터 부족',
													            	]);
				$response_json = json_encode($response_json, JSON_UNESCAPED_UNICODE);
				return response($response_json)
					->header('Content-Type', 'application/json; charset=UTF-8')
					->header('Accept', 'application/json')
					->header('Accept-Language', 'ko');
				
	        }
			$locationX = trim($request->locationX);
			$locationY = trim($request->locationY);
			$angle = trim($request->angle);
			$user_row = UserInfo::where('device_id', $device_id)->first();
			$device_row = DeviceInfo::where('device_id', $device_id)->first();
			$pre_index = $device_row->index;
			DeviceInfo::where('device_id', $device_id)->update([
															'index' => $index,
															'battery' => $battery,
															'locationX' => $locationX,
															'locationY' => $locationY,
															'angle' => $angle]);
		 
			
			$isAddr = 1;
			$response_json;
			if($index == 1){
				if($user_row->destination1_lon == null){
					$response_json = array(
						'code_num' => '9001',
						'message' => $index."번째 주소가 등록되지 않았습니다.",
					);
					DeviceInfo::where('device_id', $device_id)->update([					
																'code_num' => '9001',
																'message' => $index." 번째 주소가 등록되지 않았습니다.",
																]);
					$response_json = json_encode($response_json, JSON_UNESCAPED_UNICODE);
					return response($response_json)
						->header('Content-Type', 'application/json; charset=UTF-8')
						->header('Accept', 'application/json')
						->header('Accept-Language', 'ko');
				}
				$code_num = '1001';
				$endX = $user_row->destination1_lon;
				$endY = $user_row->destination1_lat;
			}else if($index == 2){
				if($user_row->destination2_lon == null){
					$response_json = array(
						'code_num' => '9010',
						'message' => $index."번째 주소가 등록되지 않았습니다.",
					);
					DeviceInfo::where('device_id', $device_id)->update([					
																'code_num' => '9010',
																'message' => $index." 번째 주소가 등록되지 않았습니다.",
																]);
					$response_json = json_encode($response_json, JSON_UNESCAPED_UNICODE);
					return response($response_json)
						->header('Content-Type', 'application/json; charset=UTF-8')
						->header('Accept', 'application/json')
						->header('Accept-Language', 'ko');
				}
				$code_num = '1010';
				$endX = $user_row->destination2_lon;
				$endY = $user_row->destination2_lat;
			}else if($index == 3){
				if($user_row->destination3_lon == null){
					$response_json = array(
						'code_num' => '9011',
						'message' => $index."번째 주소가 등록되지 않았습니다.",
					);
					DeviceInfo::where('device_id', $device_id)->update([					
																'code_num' => '9011',
																'message' => $index." 번째 주소가 등록되지 않았습니다.",
																]);
					$response_json = json_encode($response_json, JSON_UNESCAPED_UNICODE);
					return response($response_json)
						->header('Content-Type', 'application/json; charset=UTF-8')
						->header('Accept', 'application/json')
						->header('Accept-Language', 'ko');
				} 
				$code_num = '1011';
				$endX = $user_row->destination3_lon;
				$endY = $user_row->destination3_lat;
			}else{
				$response_json = array(
					'code_num' => '9009',
					'message' => "유효하지 않은 인덱스",
				);
				DeviceInfo::where('device_id', $device_id)->update([					
																'code_num' => '9009',
																'message' => "유효하지 않은 인덱스",
																]);
				$response_json = json_encode($response_json, JSON_UNESCAPED_UNICODE);
				return response($response_json)
					->header('Content-Type', 'application/json; charset=UTF-8')
					->header('Accept', 'application/json')
					->header('Accept-Language', 'ko');
				
			}
			$map_json = $this->tmapApi($locationX, $locationY, $endX, $endY, $angle);
			$map_json = json_decode($map_json);
			if(isset($map_json->error)){
				$response_json = array(
					'code_num' => '9900',
					'message' => $map_json->description,
					'type' => $map_json->type,
				);
				DeviceInfo::where('device_id', $device_id)->update([					
																'code_num' => '9900',
																'message' => $map_json->description,
																
																]);
				$response_json = json_encode($response_json, JSON_UNESCAPED_UNICODE);
				return response($response_json)
					->header('Content-Type', 'application/json; charset=UTF-8')
					->header('Accept', 'application/json')
					->header('Accept-Language', 'ko');
			}else if(isset($map_json->success)){
				$response_json = array(
					'code_num' => '1111',
					'message' => $map_json->description,
				);
				DeviceInfo::where('device_id', $device_id)->update([					
																'code_num' => '1111',
																'message' => $map_json->description,
																]);
				$response_json = json_encode($response_json, JSON_UNESCAPED_UNICODE);
				return response($response_json)
					->header('Content-Type', 'application/json; charset=UTF-8')
					->header('Accept', 'application/json')
					->header('Accept-Language', 'ko');
			}
			$message = "$map_json->description";
			
			if($pre_index != $index){
				$minute = $map_json->total_time / 60;
				$minute = (int)$minute;
				
				$addr = "";
				if($index == 1){
					$addr = $user_row->destination1_str;
				}else if($index == 2){
					$addr = $user_row->destination2_str;
				}else if($index == 3){
					$addr = $user_row->destination3_str;
				}
			
				$message = "$addr 까지의 거리는 $map_json->total_distance 미터이고 약 $minute 분 걸립니다. 안내를 시작합니다. $map_json->description";
			}
			
			$response_json = array(
				'total_time' => $map_json->total_time,
				'total_distance' => $map_json->total_distance,	
				'code_num' => $code_num,
				'message' => $message,
			);
			
			
			DeviceInfo::where('device_id', $device_id)->update([				
																'code_num' => $code_num,
																'message' => $message,
																]);
			$response_json = json_encode($response_json, JSON_UNESCAPED_UNICODE);
			return response($response_json)
				->header('Content-Type', 'application/json; charset=UTF-8')
				->header('Accept', 'application/json')
				->header('Accept-Language', 'ko');
		} 
		
		return response()->json([
			'code_num' => '9999',
			'message' => "unexpected error",
		]);
		 
	}

	public function mapApi2(Request $request){
		
		
		$validator = Validator::make($request->all(), [
            'device_id' => 'required',
            'index' => 'required',
            'battery' => 'required',
        ]);
		if ($validator->fails()) {
            $response_json = array(
            	'code_num' => '9990',
            	'message' => '필수 파라미터 부족',
            );
			$response_json = json_encode($response_json, JSON_UNESCAPED_UNICODE);
			return response($response_json)
					->header('Content-Type', 'application/json; charset=UTF-8')
					->header('Accept', 'application/json')
					->header('Accept-Language', 'ko');
        }
		
		$device_id = trim($request->device_id);
		$index = trim($request->index);
		$battery = trim($request->battery);
		DeviceInfo::where('device_id', $device_id)->update(['request' => json_encode($request, JSON_UNESCAPED_UNICODE)]);
        
		$isExist = UserInfo::where('device_id', $device_id)->count();
		if($isExist == 0){
			$response_json = array(
            	'code_num' => '1002',
            	'message' => '웹 사이트에 등록 정보 없음',
            );
			DeviceInfo::where('device_id', $device_id)->update(['index' => $index,
																'battery' => $battery,
																'code_num' => '1002',
																'message' => '웹 사이트에 등록 정보 없음',
																'distance'=>-1
																]);
			$response_json = json_encode($response_json, JSON_UNESCAPED_UNICODE);
			return response($response_json)
					->header('Content-Type', 'application/json; charset=UTF-8')
					->header('Accept', 'application/json')
					->header('Accept-Language', 'ko');
		}
		if($index <= 0){
			$code_num = '1101';
			if($index == 0){
				$code_num = '1001';
			}
			$response_json = array(
				'code_num' => $code_num,
				'message' => "response OK",
			);
			DeviceInfo::where('device_id', $device_id)->update(['device_id' => $device_id,
																'index' => $index,
																'battery' => $battery,
																'code_num' => $code_num,
																'message' => "response OK",
																'distance'=>-1
																]);
			$response_json = json_encode($response_json, JSON_UNESCAPED_UNICODE);
			return response($response_json)
				->header('Content-Type', 'application/json; charset=UTF-8')
				->header('Accept', 'application/json')
				->header('Accept-Language', 'ko');
		}else{
			$validator = Validator::make($request->all(), [
	            'locationX' => 'required',
	            'locationY' => 'required',
	            'angle' => 'required',
	        ]);
	
	        if ($validator->fails()) {
	            $response_json = array(
	            	'code_num' => '9990',
	            	'message' => '필수 파라미터 부족',
	            );
				DeviceInfo::where('device_id', $device_id)->update(['device_id' => $device_id,
													            	'index' => $index,
													            	'battery' => $battery,
													            	'code_num' => '9990',
													            	'message' => '필수 파라미터 부족',
													            	'distance'=>-1
													            	]);
				$response_json = json_encode($response_json, JSON_UNESCAPED_UNICODE);
				return response($response_json)
					->header('Content-Type', 'application/json; charset=UTF-8')
					->header('Accept', 'application/json')
					->header('Accept-Language', 'ko');
				
	        }
			$locationX = trim($request->locationX);
			$locationY = trim($request->locationY);
			$angle = trim($request->angle);
			$user_row = UserInfo::where('device_id', $device_id)->first();
			$device_row = DeviceInfo::where('device_id', $device_id)->first();
			$pre_index = $device_row->index;
			DeviceInfo::where('device_id', $device_id)->update([
															'index' => $index,
															'battery' => $battery,
															'locationX' => $locationX,
															'locationY' => $locationY,
															'angle' => $angle]);
		 
			
			$isAddr = 1;
			$response_json;
			if($index == 1){
				if($user_row->destination1_lon == null){
					$response_json = array(
						'code_num' => '9001',
						'message' => $index."번째 주소가 등록되지 않았습니다.",
					);
					DeviceInfo::where('device_id', $device_id)->update([					
																'code_num' => '9001',
																'message' => $index." 번째 주소가 등록되지 않았습니다.",
																'distance'=>-1
																]);
					$response_json = json_encode($response_json, JSON_UNESCAPED_UNICODE);
					return response($response_json)
						->header('Content-Type', 'application/json; charset=UTF-8')
						->header('Accept', 'application/json')
						->header('Accept-Language', 'ko');
				}
				$code_num = '1001';
				$endX = $user_row->destination1_lon;
				$endY = $user_row->destination1_lat;
			}else if($index == 2){
				if($user_row->destination2_lon == null){
					$response_json = array(
						'code_num' => '9010',
						'message' => $index."번째 주소가 등록되지 않았습니다.",
					);
					DeviceInfo::where('device_id', $device_id)->update([					
																'code_num' => '9010',
																'message' => $index." 번째 주소가 등록되지 않았습니다.",
																'distance'=>-1
																]);
					$response_json = json_encode($response_json, JSON_UNESCAPED_UNICODE);
					return response($response_json)
						->header('Content-Type', 'application/json; charset=UTF-8')
						->header('Accept', 'application/json')
						->header('Accept-Language', 'ko');
				}
				$code_num = '1010';
				$endX = $user_row->destination2_lon;
				$endY = $user_row->destination2_lat;
			}else if($index == 3){
				if($user_row->destination3_lon == null){
					$response_json = array(
						'code_num' => '9011',
						'message' => $index."번째 주소가 등록되지 않았습니다.",
					);
					DeviceInfo::where('device_id', $device_id)->update([					
																'code_num' => '9011',
																'message' => $index." 번째 주소가 등록되지 않았습니다.",
																'distance'=>-1
																]);
					$response_json = json_encode($response_json, JSON_UNESCAPED_UNICODE);
					return response($response_json)
						->header('Content-Type', 'application/json; charset=UTF-8')
						->header('Accept', 'application/json')
						->header('Accept-Language', 'ko');
				} 
				$code_num = '1011';
				$endX = $user_row->destination3_lon;
				$endY = $user_row->destination3_lat;
			}else{
				$response_json = array(
					'code_num' => '9009',
					'message' => "유효하지 않은 인덱스",
				);
				DeviceInfo::where('device_id', $device_id)->update([					
																'code_num' => '9009',
																'message' => "유효하지 않은 인덱스",
																'distance'=>-1
																]);
				$response_json = json_encode($response_json, JSON_UNESCAPED_UNICODE);
				return response($response_json)
					->header('Content-Type', 'application/json; charset=UTF-8')
					->header('Accept', 'application/json')
					->header('Accept-Language', 'ko');
				
			}
			$map_json = $this->tmapApi2($locationX, $locationY, $endX, $endY, $angle, $device_id, $pre_index);
			$map_json = json_decode($map_json);
			if(isset($map_json->error)){
				$response_json = array(
					'code_num' => '9900',
					'message' => $map_json->description,
					'type' => $map_json->type,
				);
				DeviceInfo::where('device_id', $device_id)->update([					
																'code_num' => '9900',
																'message' => $map_json->description,
																'distance'=>-1
																
																]);
				$response_json = json_encode($response_json, JSON_UNESCAPED_UNICODE);
				return response($response_json)
					->header('Content-Type', 'application/json; charset=UTF-8')
					->header('Accept', 'application/json')
					->header('Accept-Language', 'ko');
			}else if(isset($map_json->success)){
				$response_json = array(
					'code_num' => '1111',
					'message' => $map_json->description,
				);
				DeviceInfo::where('device_id', $device_id)->update([					
																'code_num' => '1111',
																'message' => $map_json->description,
																'distance' => -1
																]);
				$response_json = json_encode($response_json, JSON_UNESCAPED_UNICODE);
				return response($response_json)
					->header('Content-Type', 'application/json; charset=UTF-8')
					->header('Accept', 'application/json')
					->header('Accept-Language', 'ko');
			}
			$message = "$map_json->description";
			
			
			
			$response_json = array(
				'total_time' => $map_json->total_time,
				'total_distance' => $map_json->total_distance,	
				'code_num' => $code_num,
				'message' => $map_json->description,
			);
			
			
			DeviceInfo::where('device_id', $device_id)->update([				
																'code_num' => $code_num,
																'message' => $message,
																'distance'=>$map_json->total_distance
																]);
			$response_json = json_encode($response_json, JSON_UNESCAPED_UNICODE);
			return response($response_json)
				->header('Content-Type', 'application/json; charset=UTF-8')
				->header('Accept', 'application/json')
				->header('Accept-Language', 'ko');
		} 
		
		return response()->json([
			'code_num' => '9999',
			'message' => "unexpected error",
		]);
		 
	}

	public function sosApi(Request $request){
		if(!isset($request->device_id)){
			$response_json = array(
				'code_num' => '9008',
				'message' => '디바이스 아이디를 입력해 주세요.',
			);
			
			$response_json = json_encode($response_json, JSON_UNESCAPED_UNICODE);
			return response($response_json)
				->header('Content-Type', 'application/json; charset=UTF-8')
				->header('Accept', 'application/json')
				->header('Accept-Language', 'ko');
		}
		$device_id = trim($request->device_id);
	$phoneNum = UserInfo::where('device_id', $device_id)->first();
      $location = DeviceInfo::where('device_id', $device_id)->first();
      $protector_phone = $phoneNum->protector_phone;
	  $user_name = $phoneNum->user_name;
      $locationX = $location->locationX;
      $locationY = $location->locationY;
       
      $curl = curl_init();
         $CURLOPT_URL = 'https://api-sens.ncloud.com/v1/sms/services/ncp:sms:kr:253820163054:smtest/messages';
         $result_json = array(
            'type' => 'sms',
            'contentType' => 'COMM',
            'countryCode' => '82',
            'from' => '01062940116',
            'to' => [$protector_phone],
            'content' => "[eyecan SOS] \n 위도 : ".$locationX." 경도 : ".$locationY." \n 지역에서 ".$user_name."님이 도움을 요청하였습니다.",
         );
         curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                      "accept: application/json",
                      "X-NCP-auth-key: T3yzjlKPntUxX5YWQZXr",
                      "X-NCP-service-secret: b9762de1cdde4bc58c4bbe7e3608d73d",
                      "content-type: application/json"));
         curl_setopt($curl, CURLOPT_URL, $CURLOPT_URL);    
         curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($result_json));
         curl_setopt($curl, CURLOPT_POST, 1); 
         curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); //echo return해주는거 없애는 코드.
         $result = curl_exec($curl);   
         curl_close($curl);
         
		 $result_array = json_decode($result);
		 
		 if($result_array->status != '200'){
		 	$response_json = array(
				'code_num' => '9008',
				'message' => ''.$result,
			);
		 }else{
		 	$response_json = array(
				'code_num' => '1008',
				'message' => '성공적으로 구조 요청을 보냈습니다.',
			);
		 }
		 
		$response_json = json_encode($response_json, JSON_UNESCAPED_UNICODE);
		return response($response_json)
			->header('Content-Type', 'application/json; charset=UTF-8')
			->header('Accept', 'application/json')
			->header('Accept-Language', 'ko');
	}



	public function tmapApi2($startX, $startY, $endX, $endY, $angle, $device_id, $pre_index){
		$curl = curl_init();
		$CURLOPT_URL = 'https://api2.sktelecom.com/tmap/routes/pedestrian?startX='.$startX.'&startY='.$startY.'&angle='.$angle.'&endX='.$endX.'&endY='.$endY.'&startName=start&endName=end';
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
						'Accept: application/json',
						'Content-Type: application/json; charset=UTF-8',
						'appKey:a2eb485b-384d-43ca-84e0-9b3dba1a521f',
						'Accept-Language: ko'));
		curl_setopt($curl, CURLOPT_URL, $CURLOPT_URL); 	
		curl_setopt($curl, CURLOPT_POST, 1); 
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); //echo return해주는거 없애는 코드.
		$result = curl_exec($curl);   
		curl_close($curl);
		$result = json_decode($result);
		
		if(isset($result->error)){
			$return_json = array(
				'error' => 'error',
				'description' => '도보로 갈 수 없는 경로입니다.',
				'type' => json_encode($result, JSON_UNESCAPED_UNICODE),
			);
			
			$return_json = json_encode($return_json, JSON_UNESCAPED_UNICODE);
			return $return_json;
		}
		if($result == null){
			$return_json = array(
				'error' => 'error',
				'description' => '도보로 갈 수 없는 경로 입니다.',
				'type' => 'null type',

			);
			
			$return_json = json_encode($return_json, JSON_UNESCAPED_UNICODE);
			return $return_json;
		}	
		
		$row = DeviceInfo::where('device_id', $device_id)->first();
		$user_row = UserInfo::where('device_id', $device_id)->first();
		$index = $row->index;
		$pre_dis = $row->distance;
		$description = $result->features[0]->properties->description;
		$total_distance = (int)$result->features[0]->properties->totalDistance;
		$total_time = (int)$result->features[0]->properties->totalTime;
		$distance = (int)$result->features[1]->properties->distance;
		$start_lon = (double)$result->features[0]->geometry->coordinates[0];
		$start_lat = (double)$result->features[0]->geometry->coordinates[1];
		$end_lon = (double)$result->features[2]->geometry->coordinates[0];
		$end_lat = (double)$result->features[2]->geometry->coordinates[1];
		if($total_distance <= 3){
				$return_json = array(
				'success' => 'OK',
				'total_distance' => $total_distance,
				'total_time' => $total_time,
				'description' => "목적지에서 3m 이내입니다. 길찾기를 종료합니다.",
				'start_lon' => $start_lon,
				'start_lat' => $start_lat,
				'end_lon' => $end_lon,
				'end_lat' => $end_lat,
			);
			
			$return_json = json_encode($return_json, JSON_UNESCAPED_UNICODE);
			
			return $return_json;
		}
		
		if($distance <= 5){
			$tmp = $result->features[2]->properties->description;
			$description = "잠시 후 ".$distance."m 직진 후 ".$tmp;
		}
		
		$degree = $this->findDegree($start_lon, $start_lat, $end_lon, $end_lat);
		
		$diff = $angle - $degree;
		$angle_message = "";
		if(abs($diff) > 60){
			if($diff < 0){
				$diff = 360 - $diff;
			}
			$h_angle = $diff / 30;
			$description = "현재 위치에서 ".(int)$h_angle."시 방향입니다. ".$description;
		}
		
		if($pre_index != $index){
				$minute = $total_time / 60;
				$minute = (int)$minute;
				
				$addr = "";
				if($index == 1){
					$addr = $user_row->destination1_str;
				}else if($index == 2){
					$addr = $user_row->destination2_str;
				}else if($index == 3){
					$addr = $user_row->destination3_str;
				}
				$description = "$addr 까지의 거리는 $total_distance 미터이고 약 $minute 분 걸립니다. 안내를 시작합니다. $description";
			}else if($pre_dis == -1){
			
		}else if(abs($pre_dis - $total_distance) <= 3){
			$description = "NO";
			$total_distance = $pre_dis;
		}
		
		$return_json = array(
			'total_distance' => $total_distance,
			'total_time' => $total_time,
			'description' => "$description",
			'start_lon' => $start_lon,
			'start_lat' => $start_lat,
			'end_lon' => $end_lon,
			'end_lat' => $end_lat,
		);
		
		$return_json = json_encode($return_json, JSON_UNESCAPED_UNICODE);
		
		return $return_json;
	}

	public function tmapApi($startX, $startY, $endX, $endY, $angle){
		$curl = curl_init();
		$CURLOPT_URL = 'https://api2.sktelecom.com/tmap/routes/pedestrian?startX='.$startX.'&startY='.$startY.'&angle='.$angle.'&endX='.$endX.'&endY='.$endY.'&startName=start&endName=end';
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
						'Accept: application/json',
						'Content-Type: application/json; charset=UTF-8',
						'appKey:a2eb485b-384d-43ca-84e0-9b3dba1a521f',
						'Accept-Language: ko'));
		curl_setopt($curl, CURLOPT_URL, $CURLOPT_URL); 	
		curl_setopt($curl, CURLOPT_POST, 1); 
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); //echo return해주는거 없애는 코드.
		$result = curl_exec($curl);   
		curl_close($curl);
		$result = json_decode($result);
		
		if(isset($result->error)){
			$return_json = array(
				'error' => 'error',
				'description' => '도보로 갈 수 없는 경로입니다.',
				'type' => json_encode($result, JSON_UNESCAPED_UNICODE),
			);
			
			$return_json = json_encode($return_json, JSON_UNESCAPED_UNICODE);
			return $return_json;
		}
		if($result == null){
			$return_json = array(
				'error' => 'error',
				'description' => '도보로 갈 수 없는 경로 입니다.',
				'type' => 'null type',

			);
			
			$return_json = json_encode($return_json, JSON_UNESCAPED_UNICODE);
			return $return_json;
		}	
		
		
		$description = $result->features[0]->properties->description;
		$total_distance = (int)$result->features[0]->properties->totalDistance;
		$total_time = (int)$result->features[0]->properties->totalTime;
		$distance = (int)$result->features[1]->properties->distance;
		$start_lon = (double)$result->features[0]->geometry->coordinates[0];
		$start_lat = (double)$result->features[0]->geometry->coordinates[1];
		$end_lon = (double)$result->features[2]->geometry->coordinates[0];
		$end_lat = (double)$result->features[2]->geometry->coordinates[1];
		if($total_distance <= 3){
				$return_json = array(
				'success' => 'OK',
				'total_distance' => $total_distance,
				'total_time' => $total_time,
				'description' => "목적지에서 3m 이내입니다. 길찾기를 종료합니다.",
				'start_lon' => $start_lon,
				'start_lat' => $start_lat,
				'end_lon' => $end_lon,
				'end_lat' => $end_lat,
			);
			
			$return_json = json_encode($return_json, JSON_UNESCAPED_UNICODE);
			
			return $return_json;
		}
		
		if($distance <= 5){
			$tmp = $result->features[2]->properties->description;
			$description = "잠시 후 ".$distance."m 직진 후 ".$tmp;
		}
		
		$degree = $this->findDegree($start_lon, $start_lat, $end_lon, $end_lat);
		
		$diff = $angle - $degree;
		$angle_message = "";
		if(abs($diff) > 60){
			if($diff < 0){
				$diff = 360 - $diff;
			}
			$h_angle = $diff / 30;
			$angle_message = "현재 위치에서 ".(int)$h_angle."시 방향입니다.";
		}
		
		
		
		
		
		$return_json = array(
			'total_distance' => $total_distance,
			'total_time' => $total_time,
			'description' => $angle_message.' '.$description,
			'start_lon' => $start_lon,
			'start_lat' => $start_lat,
			'end_lon' => $end_lon,
			'end_lat' => $end_lat,
		);
		
		$return_json = json_encode($return_json, JSON_UNESCAPED_UNICODE);
		
		return $return_json;
	}
	
	public function findDegree($start_lon, $start_lat, $end_lon, $end_lat){
		$start_lat = (double)$start_lat;
		$start_lon = (double)$start_lon;
		$end_lat = (double)$end_lat;
		$end_lon = (double)$end_lon;
		
		$start_lat_r = $start_lat * (3.141592 / 180);
		$start_lon_r = $start_lon * (3.141592 / 180);
		$end_lat_r = $end_lat * (3.141592 / 180);
		$end_lon_r = $end_lon * (3.141592 / 180);
		
		$radian_distance = acos(sin($start_lat_r)*sin($end_lat_r)+cos($start_lat_r)*cos($end_lat_r)*cos($start_lon_r-$end_lon_r));
		
		$degree = acos((sin($end_lat_r)-sin($start_lat_r)*cos($radian_distance))/(cos($start_lat_r)*sin($radian_distance)));
		
		
		$true_degree = 0;
		if(sin($end_lon_r - $start_lat_r) < 0){
			$true_degree = $degree * (180 / 3.141592);
			$true_degree = 360 - $true_degree;
		}else{
			$true_degree = $degree * (180 / 3.141592);
		}
		return (int)$true_degree;
	}
	
	

	
}
