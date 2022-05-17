<?php
function string_starts_with($input, $value) {  
  // strrpos (문자열의 위치를 오른쪽에서부터 찾는다)
  // 음수값은 문자열이 끝나기 전 임의의 지점에서 검색을 중지
  // strlen은 문자열의 길이를 세는 함수 
    return $value === "" ||  mb_strrpos($input, $value, -mb_strlen($input)) !== false;
}

var_dump(string_starts_with("안녕하세요.", "안녕"));
var_dump(string_starts_with("안녕하세요.", "하이"));