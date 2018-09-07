<?php
  header('Content-Type: text/html; charset=utf-8');
  $client_id = "jrighen3yj";
  $client_secret = "RcQs9AQEsgfObrskj1sxz8k4wfin7MKeqAqaUd3t";
  $str = "";
  foreach($argv as $data){
        if($data != "tts.php"){
            $str = $str.$data."";
        }
  }
  $encText = urlencode("$str");
  $postvars = "speaker=mijin&speed=0&text=".$encText;
  $url = "https://naveropenapi.apigw.ntruss.com/voice/v1/tts";
  $is_post = true;
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_POST, $is_post);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch,CURLOPT_POSTFIELDS, $postvars);
  $headers = array();
  $headers[] = "X-NCP-APIGW-API-KEY-ID: ".$client_id;
  $headers[] = "X-NCP-APIGW-API-KEY: ".$client_secret;
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  $response = curl_exec ($ch);
  $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
  echo "status_code:".$status_code."<br>";
  curl_close ($ch);
  if($status_code == 200) {
    //echo $response;
    $fp = fopen("tts.mp3", "w+");
    fwrite($fp, $response);
    fclose($fp);
    echo "$str";
	} else {
    echo "Error 내용:".$response;
  }
?>
