<?php

use App\UserInfo;
?>
<!DOCTYPE html>
<html>
    <head lang="ko">
        <title>디바이스 등록</title>
        <meta charset="utf-8">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/signup.css" rel="stylesheet">
    </head>
    
    <script>
    	function show(){
    		alert("등록되었습니다.");
    	}
    </script>
    
    <body class="bg-light">
        <h2 class="text-center">디바이스 등록</h2>
        <form name="user_info" action="http://eyecan.tk/" method="post">
        	{!! csrf_field() !!}
            <div class="container">
                <div class="row">
                    <div class="col"></div>
                    <div class="col-7">
                        
                        <div class="row">
                            <div class="col">
                                <label for="user_name">사용자 성명</label><br />
                                <input type="text" name="user_name" id="user_name" class="form-control" />
                            </div>
                            <div class="col">
                                <label for="protector_name">보호자 성명</label><br />
                                <input type="text" name="protector_name" id="protector_name" class="form-control" />
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col">
                                <label for="user_phone">사용자 전화번호</label><br />
                                <input type="tel" name="user_phone" id="user_phone" class="form-control" />
                            </div>
                            <div class="col">
                                <label for="protector_phone">보호자 전화번호</label><br />
                                <input type="tel" name="protector_phone" id="protector_phone" class="form-control" />
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col">
                                <label for="user_passwd">비밀번호</label><br />
                                <input type="password" name="user_passwd" id="user_passwd" class="form-control" />
                            </div>
                            <div class="col">
                                <label for="user_passwdagain">비밀번호 확인</label><br />
                                <input type="password" name="user_passwdagain" id="user_passwdagain" class="form-control" />
                            </div>
                        </div>
                        
                        <div id="mail">
                            <label for="user_email">이메일</label><br />
                            <input type="email" name="user_email" id="user_email" placeholder="you@example.com" class="form-control" />
                        </div>
                        
                        <div id="useradd">
                            <label for="user_address">사용자 주소</label><br />
                            <input type="text" name="user_address" id="user_address" class="form-control" />
                        </div>
                        
                        <div id="protectoradd">
                            <label for="protector_address">보호자 주소</label><br />
                            <input type="text" name="protector_address" id="protector_address" class="form-control" />
                            <small id="emailHelp" class="form-text text-muted">사용자 주소와 동일하다면 같은 주소 입력.</small>
                        </div>
                        
                        <div id="devicenum">
                            <label for="device_id">디바이스 고유번호</label><br />
                            <input type="text" name="device_id" id="device_id" class="form-control" />
                        </div>
                        
                        <hr />
                        
                        <button class="btn btn-info" type="submit" onclick="show();"><a href="#" class="text-dark"><span>등록하기</span></a></button><br />
                        
                        <footer class="text-secondary">&copy;2018&nbsp;&nbsp;Eye can</footer>
                    </div>
                    <div class="col"></div>
                </div>
            </div>
        </form>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </body>
</html>