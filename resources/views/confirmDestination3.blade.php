<!doctype html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <title>Eye can</title>
      
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/cover_settingDestination.css" rel="stylesheet">
      
      
      
    <script src="https://api2.sktelecom.com/tmap/js?version=1&format=javascript&appKey=a2eb485b-384d-43ca-84e0-9b3dba1a521f"></script>
      
      <script>
			var map;
              
            function initTmap(){
                map = new Tmap.Map({div:"map_div", width:"100%", height:"400px"});
                map.setCenter(new Tmap.LonLat("{{$lon3}}", "{{$lat3}}").transform("EPSG:4326", "EPSG:3857"), 15);
            	markerLayer = new Tmap.Layer.Markers();
            	map.addLayer(markerLayer);
            	
            	var lonlat = new Tmap.LonLat("{{$lon3}}", "{{$lat3}}").transform("EPSG:4326", "EPSG:3857");
            	var size = new Tmap.Size(24, 38);
            	var offset = new Tmap.Pixel(-(size.w/2), -(size.h));
            	var icon = new Tmap.Icon('http://tmapapis.sktelecom.com/upload/tmap/marker/pin_b_m_a.png',size, offset);
            	
            	marker = new Tmap.Marker(lonlat, icon);
            	markerLayer.addMarker(marker);
            }
          
          
      </script>  
    
  </head>

  <body onload="initTmap();">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
      <header class="masthead mb-auto">
        <div class="inner">
          <h3 class="masthead-brand">Eye can</h3>
          <nav class="nav nav-masthead justify-content-center">
            <a class="nav-link" href="http://eyecan.tk/eyecan?device_id={{$device_id}}">메인화면</a>
            <a class="nav-link" href="http://eyecan.tk/device?device_id={{$device_id}}">디바이스 상태</a>
            <a class="nav-link active" href="http://eyecan.tk/destination?device_id={{$device_id}}">목적지 관리</a>
            <a class="nav-link" href="http://eyecan.tk/information?device_id={{$device_id}}">정보 변경</a>
          </nav>
        </div>
      </header>
        
        <div>
            <button class="btn btn-info" id="btn1"><a href="http://eyecan.tk/confirm1?device_id={{$device_id}}" class="deco">첫번째 목적지</a></button>
            <button class="btn btn-info" id="btn2"><a href="http://eyecan.tk/confirm2?device_id={{$device_id}}" class="deco">두번째 목적지</a></button>
            <button class="btn btn-info" id="btn3"><a href="http://eyecan.tk/confirm3?device_id={{$device_id}}" class="deco">세번째 목적지</a></button>
        </div>
        
        <div id="confirm">
			{{$address3}}
			{{$newaddress3}}
		</div>
        
        <br />
        <div id="map_div"></div>
        <br />
        
        <br /><br />

      <footer class="mastfoot mt-auto">
        <div class="inner">
          <p>&copy; 2018 eye can</p>
        </div>
      </footer>
    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="js/jquery-slim.min.js"><\/script>')</script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  </body>
</html>
