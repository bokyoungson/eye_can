<!DOCTYPE html>
<html>
    <head lang="ko">
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link href="css/signIn.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic" rel="stylesheet">
        <title>Eye can - 로그인</title>
    </head>
    
    <body class="text-center">
        <div class="row">
            <div class="col">
            </div>
            <div class="col-4">
                <h1 class="font-weight-light">Eye can</h1>
                <form name="myform" action="http://eyecan.tk/eyecan" method="post">
                	{!! csrf_field() !!}
                    <input type="email" name="user_email" placeholder="이메일" class="form-control form-control-lg" required autofocus/><br />
                    <input type="password" name="user_passwd" placeholder="비밀번호" class="form-control form-control-lg" /><br />
                    <button class="btn btn-info" type="submit">로그인</button><br />
                    <div class="form-group form-check" id="checke">
                        <input type="checkbox" id="remem" />
                        <label for="remem">로그인 상태 유지</label>
                    </div>
                </form>
                <hr />
                <p><a href="http://eyecan.tk/signUp" class="text-dark">디바이스 등록하기</a></p>
                <footer class="text-secondary">&copy;2018 Eye can</footer>
            </div>
            <div class="col">
            </div>
        </div>
    </body>
</html>