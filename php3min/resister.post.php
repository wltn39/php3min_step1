<?php
require_once("inc/db.php");
// 파라미터 변수 세팅 (전달받은 값이 있다면 세팅되고 없다면 null이 된다)
$login_id = isset($_POST['login_id']) ? $_POST['login_id'] : null;
$login_pw = isset($_POST['login_pw']) ? $_POST['login_pw'] : null;
$login_name = isset($_POST['login_name']) ? $_POST['login_name'] : null;

// 파라미터가 모두 있는지 체크
if ($login_id == null || $login_pw == null || $login_name == null){    
    header("Location: /regist.php");
    exit();
}

// 회원 가입이 되어 있는지 검사
$member_count = db_select("select count(member_id) cnt from tbl_member where login_id = ?" , array($login_id));
if ($member_count && $member_count[0]['cnt'] == 1){    
    header("Location: /regist.php");
    exit();
}

// 비밀번호 암호화
$bcrypt_pw = password_hash($login_pw, PASSWORD_BCRYPT);

// 회원정보 저장
db_insert("insert into tbl_member (login_id, login_name, login_pw) values (:login_id, :login_name, :login_pw )",
    array(
        'login_id' => $login_id,
        'login_name' => $login_name,
        'login_pw' => $bcrypt_pw
    )
);

// 로그인 페이지로 이동
header("Location: /login.php");