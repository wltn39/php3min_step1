<?php
$datas = [1,2,"3","4","오","률",7];
$checker = 2;

// array_filter 함수는 조건에 맞는 항목만 뽑아내는 함수 
// 인수로 콜백(callback)함수를 받는다 (아래 예시)

// datas 요소를 하나씩 checker와 일치하는지 확인
// 확인된 것 중 true로 리턴된 것만 반환
$filter_data = array_filter($datas, 
// 익명함수이자 콜백함수로 쓰인 부분 
// use는 익명함수에서 클로져를 이용하기 위해 use(사용할 외부 변수)형식으로 사용
// 클로져는 함수가 스코프 밖의 범위에 접근하기 위해 사용되는 것
    function($item) use ($checker) {
        return $item == $checker;
    }
);

var_dump($filter_data);