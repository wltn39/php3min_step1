<!-- 값이 비어있는지 검사하기 -->
<?php
// 배열이면 ? 배열이 비어있지 않을 것 : 아니면 좌우 공백을 제거했을 때 빈 문자열이 아닐 것
function valid_required($input)
{
    // 파라미터가 배열이라면 배열이 비어있는지 검사
    return is_array($input) ? empty($input) === False : trim($input) !== '';
    // trim : 좌우 공백을 제거 (ltrim은 좌측, rtrim은 우측만)
}

var_dump(valid_required(""));
var_dump(valid_required(array()));
var_dump(valid_required("php"));
var_dump(valid_required(array(1)));

// 쿼리 스트링인지 유효성 검사하는 함수
function valid_required_get($key){
    return isset($_GET[$key]) && valid_required($_GET[$key]);
}
$is_valid_required = valid_required_get("param"); // 활용
var_dump($is_valid_required)
?>
