<?php
// HTTP 헤더에 브라우저의 모든 응답이 JSON 형식임을 명시
header('Content-Type: application/json');

// 로그인 체크
session_start();
if (isset($_SESSION['member_id']) === false){
    // php 코드를 JSON 형식으로 변경하는 json_encode
    echo json_encode(array('result' => false));
    exit();
}

// 파라미터 체크
$post_id = isset($_POST['post_id']) ? $_POST['post_id'] : null;
if ($post_id == null){
    echo json_encode(array('result' => false));
    exit();
}

// DB Require
require_once("inc/db.php");

$member_id = $_SESSION['member_id'];

// 글 삭제. 작성자 체크를 위해 writer_id 도 함께 검사.
$result = db_update_delete("delete from tbl_post where post_id = :post_id and member_id = :member_id",
    array(
        'post_id' => $post_id,
        'member_id' => $member_id
    )
);

echo json_encode(array('result' => $result));