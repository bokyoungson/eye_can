<!doctype html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Eye can - 개인정보</title>
      
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/cover_information.css" rel="stylesheet">
    
    <script>
    	function show(){
    		alert("수정되었습니다.");
    	}
    </script>
    
  </head>

  <body>
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
      <header class="masthead mb-auto">
        <div class="inner">
          <h3 class="masthead-brand">Eye can</h3>
          <nav class="nav nav-masthead justify-content-center">
            <a class="nav-link" href="http://eyecan.tk/eyecan?device_id={{$device_id}}">메인화면</a>
            <a class="nav-link" href="http://eyecan.tk/device?device_id={{$device_id}}">디바이스 상태</a>
            <a class="nav-link" href="http://eyecan.tk/destination?device_id={{$device_id}}">목적지 관리</a>
            <a class="nav-link active" href="http://eyecan.tk/information?device_id={{$device_id}}">정보 변경</a>
          </nav>
        </div>
      </header>
        
        <div class="container">
            <form name="user_info" action="http://eyecan.tk/information?device_id={{$device_id}}" method="post">
            	{!! csrf_field() !!}
                <div>
                    <h5 style="margin-bottom:0.7em" class="font-weight-bold">비밀번호 수정</h5>
                    <div class="row" style="margin-bottom:3em">
                        <div class="col">
                            <label for="user_passwdOld">기존 비밀번호</label><br />
                            <input type="password" name="user_passwdOld" id="user_passwdOld" class="form-control" />
                        </div>
                        <div class="col">
                            <label for="user_passwd">새로운 비밀번호</label><br />
                            <input type="password" name="user_passwd" id="user_passwd" class="form-control" />
                        </div>
                    </div>
                </div>
                
                <div>
                    <h5 style="margin-bottom:0.7em" class="font-weight-bold">연락처 수정</h5>
                    <div class="row" style="margin-bottom:0.5em">
                        <div class="col">
                            <label for="protector_phoneOld">기존 보호자 연락처</label><br />
                            <input type="tel" name="protector_phoneOld" id="protector_phoneOld" class="form-control" />
                        </div>
                        <div class="col">
                            <label for="protector_phone">새로운 보호자 연락처</label><br />
                            <input type="tel" name="protector_phone" id="protector_phone" class="form-control" />
                        </div>
                    </div>
                    <div class="row" style="margin-bottom:3em">
                        <div class="col">
                            <label for="user_phoneOld">기존 사용자 연락처</label><br />
                            <input type="tel" name="user_phoneOld" id="user_phoneOld" class="form-control" />
                        </div>
                        <div class="col">
                            <label for="user_phone">새로운 사용자 연락처</label><br />
                            <input type="tel" name="user_phone" id="user_phone" class="form-control" />
                        </div>
                    </div>
                </div>
                
                <div>
                    <h5 style="margin-bottom:0.7em" class="font-weight-bold">주소 수정</h5>
                    <label for="protector_address">새로운 보호자 주소</label><br />
                    <input type="text" name="protector_address" id="protector_address" class="form-control" />
                    <label for="user_address" style="margin-top:0.3em">새로운 사용자 주소</label><br />
                    <input type="text" name="user_address" id="user_address" class="form-control" />
                </div>
                
                <div>
                    <div class="row">
                        <div class="col">
                            <input type="submit" value="수정하기" class="btn btn-info" onclick="show();" />
                        </div>
                        <div class="col">
                            <input type="reset" value="취소하기" class="btn btn-info" />
                        </div>
                    </div>
                </div>
            </form>
        </div>

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
