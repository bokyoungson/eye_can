<!doctype html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <title>Eye can - 목적지 변경</title>
      
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
                map.setCenter(new Tmap.LonLat("129.08381836763243", "35.23299431315871").transform("EPSG:4326", "EPSG:3857"), 15);
                $("#signup").hide();
                $("#address").hide();
                $("#newaddress").hide();
                $("#lon").hide();
                $("#lat").hide();
            }
            
            function show(){
                var str="";
                str = $("#destination").val();
                $.ajax({
                    method:"GET",
                    url:"https://api2.sktelecom.com/tmap/geo/fullAddrGeo?version=1&format=xml&callback=result",
                    async:false,
                    data:{
                        "coordType":"WGS84GEO",
                        "fullAddr":str,
                        "page":"1",
                        "count":"20",
                        "appKey":"a2eb485b-384d-43ca-84e0-9b3dba1a521f",
                    },
                    success:function(response){
                        
                        var prtcl = response;
                        var prtclString = new XMLSerializer().serializeToString(prtcl);
                        xmlDoc = $.parseXML(prtclString),
                            $xml = $(xmlDoc),
                            $intRate = $xml.find("coordinate");
                        
                        if($intRate.length==0){
                            $intError = $xml.find("error");
                            
                            if($intError.context.all[0].nodeName=="error"){
                                $("#result").text("요청 데이터가 올바르지 않습니다.");
                            }
                        }
                        
                        var lon, lat;
                        if($intRate[0].getElementsByTagName("lon").length>0){
                            lon = $intRate[0].getElementsByTagName("lon")[0].childNodes[0].nodeValue;
                            lat = $intRate[0].getElementsByTagName("lat")[0].childNodes[0].nodeValue;
                        }
                        else{
                            lon = $intRate[0].getElementsByTagName("newLon")[0].childNodes[0].nodeValue;
                            lat = $intRate[0].getElementsByTagName("newLat")[0].childNodes[0].nodeValue;
                        }
                        
                        $("#lon").val(lon);
                        $("#lat").val(lat);
                        
                        var markerStartLayer = new Tmap.Layer.Markers("marker");
                        map.addLayer(markerStartLayer);
                        
                        var size = new Tmap.Size(24, 38);
                        var offset = new Tmap.Pixel(-(size.w/2), -size.h);
                        var icon = new Tmap.IconHtml("<img src='http://tmapapis.sktelecom.com/upload/tmap/marker/pin_b_m_a.png' />", size, offset);
                        var marker_s = new Tmap.Marker(new Tmap.LonLat(lon, lat).transform("EPSG:4326", "EPSG:3857"), icon);
                        markerStartLayer.addMarker(marker_s);
                        
                        map.setCenter(new Tmap.LonLat(lon, lat).transform("EPSG:4326","EPSG:3857"), 16);
                        
                        var matchFlag, newMatchFlag;
                        var address = "", newAddress="";
                        var city, gu_gun, eup_myun, legalDong, adminDong, ri, bunji;
                        var buildingName, buildingDong, newRoadName, newBuildingIndex, newBuildingName, newBuildingDong;
                        
                        if($intRate[0].getElementsByTagName("newMatchFlag").length>0){
                            newMatchFlag = $intRate[0].getElementsByTagName("newMatchFlag")[0].childNodes[0].nodeValue;
                            
                            if($intRate[0].getElementsByTagName("city_do").length>0){
                                city = $intRate[0].getElementsByTagName("city_do")[0].childNodes[0].nodeValue;
                                newAddress+=city+"\n";
                            }
                            
                            if($intRate[0].getElementsByTagName("gu_gun").length>0){
                                gu_gun = $intRate[0].getElementsByTagName("gu_gun")[0].childNodes[0].nodeValue;
                                newAddress+=gu_gun+"\n";
                            }
                            
                            if($intRate[0].getElementsByTagName("eup_myun").length>0){
                                eup_myun = $intRate[0].getElementsByTagName("eup_myun")[0].childNodes[0].nodeValue;
                                newAddress+=eup_myun+"\n";
                            }
                            
                            if($intRate[0].getElementsByTagName("legalDong").length>0){
                                legalDong = $intRate[0].getElementsByTagName("legalDong")[0].childNodes[0].nodeValue;
                                newAddress+=legalDong+"\n";
                            }
                            
                            if($intRate[0].getElementsByTagName("adminDong").length>0){
                                adminDong = $intRate[0].getElementsByTagName("adminDong")[0].childNodes[0].nodeValue;
                                newAddress+=adminDong+"\n";
                            }
                            
                            if($intRate[0].getElementsByTagName("ri").length>0){
                                ri = $intRate[0].getElementsByTagName("ri")[0].childNodes[0].nodeValue;
                                newAddress+=ri+"\n";
                            }
                            
                            if($intRate[0].getElementsByTagName("bunji").length>0){
                                bunji = $intRate[0].getElementsByTagName("bunji")[0].childNodes[0].nodeValue;
                                newAddress+=bunji+"\n";
                            }
                            
                            if($intRate[0].getElementsByTagName("newRoadName").length>0){
                                newRoadName = $intRate[0].getElementsByTagName("newRoadName")[0].childNodes[0].nodeValue;
                                newAddress+=newRoadName+"\n";
                            }
                            
                            if($intRate[0].getElementsByTagName("newBuildingIndex").length>0){
                                newBuildingIndex = $intRate[0].getElementsByTagName("newBuildingIndex")[0].childNodes[0].nodeValue;
                                newAddress+=newBuildingIndex+"\n";
                            }
                            
                            if($intRate[0].getElementsByTagName("newBuildingName").length>0){
                                newBuildingName = $intRate[0].getElementsByTagName("newBuildingName")[0].childNodes[0].nodeValue;
                                newAddress+=newBuildingName+"\n";
                            }
                            
                            if($intRate[0].getElementsByTagName("newBuildingDong").length>0){
                                newBuildingDong = $intRate[0].getElementsByTagName("newBuildingDong")[0].childNodes[0].nodeValue;
                                newAddress+=newBuildingDong+"\n";
                            }
                            
                            $("#result").html("검색결과(새주소):"+newAddress+"<br />"+"검색결과가 맞다면 등록버튼을 눌러 등록하세요.");
                            $("#signup").show();
                            
                            $("#newaddress").val(newAddress);
                            
                        }
                        
                        if($intRate[0].getElementsByTagName("matchFlag").length>0){
                            matchFlag = $intRate[0].getElementsByTagName("matchFlag")[0].childNodes[0].nodeValue;
                            
                            if($intRate[0].getElementsByTagName("city_do").length>0){
                                city = $intRate[0].getElementsByTagName("city_do")[0].childNodes[0].nodeValue;
                                address+=city+"\n";
                            }
                            
                            if($intRate[0].getElementsByTagName("gu_gun").length>0){
                                gu_gun = $intRate[0].getElementsByTagName("gu_gun")[0].childNodes[0].nodeValue;
                                address+=gu_gun+"\n";
                            }
                            
                            if($intRate[0].getElementsByTagName("eup_myun").length>0){
                                eup_myun = $intRate[0].getElementsByTagName("eup_myun")[0].childNodes[0].nodeValue;
                                address+=eup_myun+"\n";
                            }
                            
                            if($intRate[0].getElementsByTagName("legalDong").length>0){
                                legalDong = $intRate[0].getElementsByTagName("legalDong")[0].childNodes[0].nodeValue;
                                address+=legalDong+"\n";
                            }
                            
                            if($intRate[0].getElementsByTagName("adminDong").length>0){
                                adminDong = $intRate[0].getElementsByTagName("adminDong")[0].childNodes[0].nodeValue;
                                address+=adminDong+"\n";
                            }
                            
                            if($intRate[0].getElementsByTagName("ri").length>0){
                                ri = $intRate[0].getElementsByTagName("ri")[0].childNodes[0].nodeValue;
                                address+=ri+"\n";
                            }
                            
                            if($intRate[0].getElementsByTagName("bunji").length>0){
                                bunji = $intRate[0].getElementsByTagName("bunji")[0].childNodes[0].nodeValue;
                                address+=bunji+"\n";
                            }
                            
                            if($intRate[0].getElementsByTagName("buildingName").length>0){
                                buildingName = $intRate[0].getElementsByTagName("buildingName")[0].childNodes[0].nodeValue;
                                address+=buildingName+"\n";
                            }
                            
                            if($intRate[0].getElementsByTagName("buildingDong").length>0){
                                buildingDong = $intRate[0].getElementsByTagName("buildingDong")[0].childNodes[0].nodeValue;
                                address+=buildingDong+"\n";
                            }
                            
                            $("#result").html("검색결과(지번주소):"+address+"<br />"+"검색결과가 맞다면 등록버튼을 눌러 등록하세요.");
                            $("#signup").show();
                            
                            $("#address").val(address);
                        }
                    },
                    
                    error:function(request,status,error){
		              console.log("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
	               }
                });
            }
            function warn(){
                alert("수정되었습니다.");
                //window.location.href = "https://eyecan.tk/setting1?addr=1234";
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
            <button class="btn btn-info" id="btn1"><a href="http://eyecan.tk/change1?device_id={{$device_id}}" class="deco">첫번째 목적지</a></button>
            <button class="btn btn-info" id="btn2"><a href="http://eyecan.tk/change2?device_id={{$device_id}}" class="deco">두번째 목적지</a></button>
            <button class="btn btn-info" id="btn3"><a href="http://eyecan.tk/change3?device_id={{$device_id}}" class="deco">세번째 목적지</a></button>
        </div>
        
        <div class="row">
            <div class="col-10">
                <input type="text" name="destination" id="destination" class="form-control" placeholder="도로명/지번주소를 정확히 입력해주세요."/>
            </div>
            <div class="col-2">
                <button class="btn btn-outline-info" onclick="show();">주소검색</button>
            </div>
        </div>
        
        <br />
        <div id="map_div"></div>
        <br />
        
        
        
        <div class="row">
            <div class="col-10">
                <p id="result"></p>
            </div>
            <div class="col-2">
            	<form id="info" action="http://eyecan.tk/change1?device_id={{$device_id}}" method="post">
		        	{!! csrf_field() !!}
		        	<input type="text" name="address" id="address" />
		        	<input type="text" name="newaddress" id="newaddress" />
		        	<input type="text" name="lon" id="lon" />
		        	<input type="text" name="lat" id="lat" />
		        	<button class="btn btn-outline-info" id="signup" onclick="warn();" type="submit">수정하기</button>
		        </form>
                
            </div>
        </div>
        
        
        
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
