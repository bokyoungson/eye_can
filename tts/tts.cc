#include <iostream>
#include <cstring>
#include <cstdlib>
using namespace std;

int main(){
    // text변수에 원하는 text 집어넣으면 되용 함수로 만드실거면 함수 파라미터로 받아서 집어넣으셔도 되고!
    string text = "안녕하세요. 반갑습니다. 40m남았습니다. 야호!";
  
    // tts.php파일을 실행시켜 tts.mp3 파일을 만드는 코드
    string cmd = "php tts.php "+text;
    system(cmd.c_str());
   
    // mp3 실행 코드 추가 시켜주세요

    return 0;
}
