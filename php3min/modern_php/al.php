<?php
// 클래스가 호출되고 생성되기 전에 실행할 함수를 정의하는 내장함수 
// PHP 내부 동작을 가로채는 메타 함수 중 하나
// 오토로드는 결국 네임스페이스와 클래스명으로 파일의 위치를 찾아가는 것
spl_autoload_register(function ($class) {    
    include "$class.php";
});

use yse\Sample;

$sample = Sample::factory();
$sample->tell();

echo "<br />";
$sample = new yse\Sample();
$sample->add_age(5)->tell();