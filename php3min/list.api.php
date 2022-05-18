<?php
header('Content-Type: application/json');

// 로그인 체크
session_start();
if (isset($_SESSION['member_id']) === false){
    echo json_encode(array('result' => false));
    exit();
}

// 파라미터 체크
$last_post_id = isset($_POST['last_post_id']) ? $_POST['last_post_id'] : null;
if ($last_post_id == null){
    echo json_encode(array('result' => false));
    exit();
}

// DB Require
require_once("inc/db.php");
// 로그인, 파라미터 검증 후 글목록 데이터를 tbl_post에서 가져온다
$member_id = $_SESSION['member_id'];
// 더보기 조건은 현재 로그인한 사용자의 글, 마지막 메모 ID보다 PK가 작은 경우
$post_query = "select post_id, post_content from tbl_post where member_id = :member_id and post_id < :post_id order by insert_date desc limit 10";
$post_data = db_select($post_query, array("member_id"=> $member_id, "post_id" => $last_post_id));

echo json_encode(
    array(
        'result' => true,
        'post_data' => $post_data
    )
);