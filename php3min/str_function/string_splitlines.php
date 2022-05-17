<?php
function string_splitlines($input)
{
    // EOL 은 end of lint의 약자로 줄바꿈 기호를 의미
    return explode(PHP_EOL, $input);
}
// heredoc 문밥 (변수치환) cf. 나우닥(변수치환X)
$data = <<<CDATA
안녕
하신가
요?
CDATA;

var_dump(string_splitlines($data));