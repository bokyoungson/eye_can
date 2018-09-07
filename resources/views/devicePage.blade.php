<!doctype html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Eye can - 디바이스</title>
      
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/cover.css" rel="stylesheet">
    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
  </head>

  <body class="text-center">

    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
      <header class="masthead mb-auto">
        <div class="inner">
          <h3 class="masthead-brand">Eye can</h3>
          <nav class="nav nav-masthead justify-content-center">
            <a class="nav-link" href="http://eyecan.tk/eyecan?device_id={{$device_id}}">메인화면</a>
            <a class="nav-link active" href="http://eyecan.tk/device?device_id={{$device_id}}">디바이스 상태</a>
            <a class="nav-link" href="http://eyecan.tk/destination?device_id={{$device_id}}">목적지 관리</a>
            <a class="nav-link" href="http://eyecan.tk/information?device_id={{$device_id}}">정보 변경</a>
          </nav>
        </div>
      </header>

    
        
      <main role="main" class="inner cover">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h3>배터리 잔량</h3>
                    <i class="material-icons md-48">battery_std</i>
                    <span class="h4">{{$battery}}%</span>
                </div>
                <div class="col">
                	<h3>디바이스 기본정보</h3>
                    
                    <div>
                    	디바이스 아이디:{{$device_id}}<br />
                    	사용자 연락처:{{$user_phone}}<br />
                    	보호자 연락처:{{$protector_phone}}<br />
                    </div>
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
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
