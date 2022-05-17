<!-- 값이 숫자인지 검사하기 -->

<?php
function valid_number($input)
{    
    // strval 변수를 문자열로 변환
    $input = strval($input);
    // preg_match() 는 정규식 검사 후 조건에 맞으면 true, 아니면 false 반환
    return (bool) preg_match('/^[\-+]?[0-9]*\.?[0-9]+$/', $input);
    // - +로 시작, 0-9까지 숫자가 0개이상, .이 0개아니면 1개, 0-9 1개 이상으로 끝나야 한다
}

function var_dump_br($val)
{
    var_dump($val);
    echo "<br />";
}

$vals = array(1, 3, 0.14, "5", "9.7", "asd", "024", "051.3" , "1337e0"); 
// 1337e0 = 1259488 (valid_number는 false, is_numberic은 true)

foreach($vals as $val){ // php for문 형식
    echo $val;  

    var_dump_br(valid_number($val)); // 위에서 정의한 숫자검사 함수 (정규표현식)
    var_dump_br(is_numeric($val)); // 타입구분하지 않고 float로 캐스팅되는지 체크
    echo "<hr />";
}