<?php
require_once("yse/sample.php");
// 네임스페이스 활용할 땐 use
use yse\Sample;
$sample = Sample::factory();
// 위 두줄은 다음과 같이 변경 가능 
// $sample = new yse\Sample();


$sample->tell();

echo "<br />";
$sample = new yse\Sample();
$sample->add_age(5)->tell();