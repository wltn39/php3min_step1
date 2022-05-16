<!--  GET  -->

<?php

// $name = $_GET['name']; // 연관배열 형식의 슈퍼글로벌 변수 $_GET['파라미터키']
// $age = $_GET['age'];
// echo "name is $name, age is $age";
// => http://localhost/php_study/php3min/ch_3.php?name=jisu&age=27
?>

<!-- POST -->

<!-- <form method="post">
    name : <input type="text" name="name" />
    age : <input type="text" name="age" />
    <input type="submit" />
</form> -->

<?php
// // HTTP 메소드가 POST 일때 실행되는 부분
// if ($_SERVER['REQUEST_METHOD'] == 'POST') { 

//     $name = $_POST['name'];
//     $age = $_POST['age'];

//     echo "name is $name, age is $age";
// }
?>

<!-- 리다이렉트 -->
<?php
// header("Location: /target_url");
// exit(); 
// php 끝내는 표시로 이후 코드가 리다릭트가 아닌 다른 상태로 바꿀 가능성을 차단하기 위해 사용
?>

<!-- 세션다루기 -->
<?php
// // redirect 함수는 여러곳에 쓰이므로 편의상 만들어둠
// function redirect($url){
//     header('Location: ' . $url);
//     exit();
// }

// // php 세션 사용 전 session_start();로 반드시 준비해야한다.
// // 기본 세션은 단순한 파일로 저장되기 때문에 파일을 읽어오는 것
// session_start();

// // $action 변수는 파라미터에 따라 하는 일을 구분하기 위해 쿼리스트링으로 입력 받음 
// $action = $_GET['action'];
// // $action 값이 set일 경우 세션을 설정, 
// if ($action == "set"){
//     $_SESSION['key'] = 'session_value'; // 세션을 넣는 방법 
//     redirect("?action=get");
// // get 이면 세션을 가지고 오고
// }elseif ($action == "get"){
//     if (isset($_SESSION['key'])){ // isset 변수존재여부 확인
//         echo $_SESSION['key'];
//     }else{
//         echo "NO SESSION";
//     }
// }elseif ($action == "remove"){ // remove는 삭제
//     if (isset($_SESSION['key'])){
//         unset($_SESSION['key']); // 세션값 삭제
//     }
//     redirect("?action=get");
// }

// // 세션이 이미 시작했는지 확인하기 위해 보통 session_start()는 아래와 같이 사용
// // if (isset($_SESSION) == false){
// //     session_start();
// //   }
?>

<!-- 이스케이프(escape) -->
<?php
// // HTML 특수기호를 문자데이터로 인식시키기 위한 변환도구 
// $html = <<<CDATA
// A 'quote' is <b>bold</b> "한글" 데이터
// CDATA;
// // htmlspecialchar 함수는 
// $encode = htmlspecialchars($html); // 인코딩결과 출력
// echo $encode;echo PHP_EOL;
// echo "<br />";
// // decoding 결과 출력
// $decode = htmlspecialchars_decode($encode); 
// echo $decode;
?>

<!-- 비밀번호 암호화 및 매칭 -->
<?php
// $origin_pw = "1234asdf";
// // password_hash 암호화함수 , PASSWORD_BCRYPT 는 Bcrypt 알고리즘 사용을 의미
// $hash_pw = password_hash($origin_pw, PASSWORD_BCRYPT);

// // 검증을 위한 password_verify 함수
// $match = password_verify($origin_pw, $hash_pw);
// $not_match = password_verify($origin_pw . "zxcv", $hash_pw);

// var_dump($origin_pw);
// echo "<br />";
// var_dump($hash_pw); // 암호화된 비밀번호 
// echo "<br />";
// var_dump($match); // password_verify 활용한 검증
// echo "<br />";
// var_dump($not_match);
// echo "<br />";
?>

<!-- 파일 읽고 쓰기 -->
<?php
// $data = "hi";
// // 데이터를 저장할 땐 file_put_contents 함수
// file_put_contents("data.txt", $data);

// // 파일 읽어올 땐 file_get_contents 함수
// $load_data = file_get_contents('data.txt');

// echo $load_data;
?>

<!-- 직렬화와 역직렬화 -->
<?php
// $data = array(1, 2, 3, 4);
// // 직렬화 함수 적용
// $serial_data = serialize($data);
// file_put_contents("data.txt", $serial_data); // 파일로저장

// $load_data = file_get_contents('data.txt'); // 직렬화 데이터 불러오기
// $unserial_data = unserialize($load_data); // 역직렬화

// var_dump($load_data);
// echo "<br />";
// var_dump($unserial_data);
?>

<!-- 다른 파일 포함하기 -->
<?php
// require("before.php");
// require("before.php");
// require("before.php");

// echo "this is main page : ";
// echo $var;
// echo "<br />";

// require_once("after.php");
// require_once("after.php");
// require_once("after.php");
?>

<!-- 날짜 시간 계산하기 -->
<?php
// $date1 = date("Y-m-d H:i:s");
// $date2 = new DateTime(); // 날짜타입 (초까지 다나옴, 연산가능)
// $date2_str = $date2->format("Y-m-d H:i:s"); // date2 의 형식을 변경

// var_dump($date1); echo "<br />";
// var_dump($date2); echo "<br />";
// var_dump($date2_str); echo "<br />";
// // 날짜를 더하고 싶으면 add 함수 활용
// // DateInterval 객체 활용, P1D 는 하루간격이란 뜻
// $tomorrow = $date2->add(new DateInterval("P1D")); 
// var_dump($tomorrow); echo "<br />";
?>

<!-- JSON 다루기 -->
<?php
$data = array(
    'key1' => `value1`,
    'key2' => 2,
    'key3' => array(
        'name' => 'yse',
        'age' => 105
    )
);
// json_encode => PHP타입을 JSON 문자열로 변경
$json_data = json_encode($data);
// json_decode => JSON을 PHP 로 변경 
$decode_object = json_decode($json_data);
// 두번째 인자로 true를 전달하면 PHP 객체 대신 배열로 바꿈
$decode_array = json_decode($json_data, true);

var_dump($data); // 원래 PHP 배열 
echo "<br /><br />";
var_dump($json_data); // JSON 타입으로 변경
echo "<br /><br />";
var_dump($decode_object); // PHP 객체로 변경
echo "<br /><br />";
var_dump($decode_array); // PHP 배열로 변경
echo "<br /><br />";