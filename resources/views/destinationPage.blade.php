<!doctype html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Eye can - 목적지</title>
      
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/cover_destination.css" rel="stylesheet">
    
  </head>

  <body class="text-center">
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
        
        
      <main role="main" class="inner cover">
        <div class="container">
            <div class="row">
                    <div class="col">
                        <br /><br />
                        <h3>목적지 등록</h3>
                        <div><br />최대 3개의 목적지를<br /> 등록할 수 있습니다.<br /></div><br /><br />
                        <a href="http://eyecan.tk/setting1?device_id={{$device_id}}"><button class="btn btn-info">바로가기</button></a>
                        <br /><br />
                    </div>
                    <div class="col" id="destination1">
                        <br /><br />
                        <h3>목적지 확인</h3>
                        <div><br />등록된 목적지를 <br /> 확인할 수 있습니다.<br /></div><br /><br />
                        <a href="http://eyecan.tk/confirm1?device_id={{$device_id}}"><button class="btn btn-info">바로가기</button></a>
                        <br /><br />
                    </div>
                    <div class="col" id="destination2">
                        <br /><br />
                        <h3>목적지 변경</h3>
                        <div><br />등록된 목적지를 <br /> 수정할 수 있습니다.<br /></div><br /><br />
                        <a href="http://eyecan.tk/change1?device_id={{$device_id}}"><button class="btn btn-info">바로가기</button></a>
                        <br />
                    </div>
            </div>
        </div>
      </main>

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
    <script src="js/vendor/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
     <script src="js/destination.js"></script>
  </body>
</html>
