<?php
// 로그인 체크 (본인의 목록만 볼 수 있도록)
session_start();
if (isset($_SESSION['member_id']) === false){
    header("Location: /");
    exit();
}

// DB Require
require_once("inc/db.php");
// 세션에서 현재 로그인된 사용자의 PK를 가지고 온다
$member_id = $_SESSION['member_id'];
// 로그인한 사용자의 최근 글 10개를 데이터베이스에서 가져온다.
$post_query = "select post_id, post_content from tbl_post where member_id = ? order by insert_date desc limit 10";
$post_data = db_select($post_query, array($member_id));

// 페이지가 처음 렌더링될 때 마지막 메모 PK를 가지고 온다
// 마지막 메모 ID는 글이 0개 초과일 경우 배열의 마지막 항목 ($post_data[count($post_data) - 1])의 post_id 이며, 글이 0개 일때는 0이다. 
// tbl_post.post_id 는 UNSIGNED BIGINT 타입이므로 1보다 작은 수는 없기 때문에 가장 작은 값으로 설정
$last_post_id = count($post_data) > 0 ? $post_data[count($post_data) - 1]['post_id'] : "0";
// 마지막 메모 ID는 보이지 않는 숨김 태그에 넣어둔다
?>
<!DOCTYPE html>
<html>
    <head>
        <title>php-memo 목록</title>
        <!-- Ajax를 편하게 활용하기 위해 jQuery 사용 , 참고로 CDN은 정적 컨텐츠를 빠르게 불러오기 위한 웹 저장소 -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script type="text/javascript">
            // 비동기로 글을 삭제하는 글 삭제 API를 호출하는 함수 작성
            function post_delete(post_id){
                // $.post - POST 메소드 이용하여 php 페이지 호출 (파라미터 {'post_id'})                
                $.post("/delete.api.php", {'post_id' : post_id})
                // 정상적으로 서버가 값을 리턴하면 결과가 result 변수에 담김                
                .done(function(result){
                    // result.result == true면 삭제 메세지 
                    if (result['result']){
                        alert('삭제되었습니다.');
                        // html 에서도 글이 삭제되었음을 표시해야해서 HTML ID 항목 찾아 삭제
                        $('#post_' + post_id).remove();
                    }
                });
            }
            // 글 목록 API 호출하는 함수
            function next_list(){
                // 숨김태그에 설정된 마지막 메모 ID
                var last_post_id = $('#last_post_id').val();
                // 더보기 데이터를 서버에 비동기로 요청
                $.post("/list.api.php", {'last_post_id' : last_post_id})
                .done(function(result){                    
                    if (result['result'] == false){
                        alert('글을 불러오는 데 실패했습니다.');
                        return;
                    }
                    // 더이상 불러올 데이터가 없을 경우 알림창을 보여줌
                    if (result['post_data'].length == 0){
                        alert("더이상 글이 없습니다.");
                        return;
                    }
                    // 서버에서 반환한 JSON 데이터로 목록에 HTML 추가
                    var ul_list_data = $('#ul_list_data');                    
                    for (var i=0;i<result['post_data'].length;i++) {
                        var post = result['post_data'][i];            
                        var append_li = '<li id="post_' + post['post_id'] + '">"';
                        append_li += post['post_content'];
                        append_li += '<input type="button" value="삭제" onclick="post_delete(\'' + post['post_id'] + '\');return false;" />';
                        append_li += "</li>";
                        ul_list_data.append(append_li);
                        $('#last_post_id').val(post['post_id']);
                    }
                });
            }
        </script>
    </head>
    <body>
        <?php require_once("inc/header.php"); ?>
        <h1>php-memo 목록</h1>
        <!-- 글쓰기 폼은 write.post.php를 post 방식으로 호출한다 -->
        <form method="POST" action="write.post.php">
            <p>
                <input type="text" id="post_content" name="post_content" style="width:100%" />
            </p>
            <p>
                <input type="submit" id="post_write" value="글 저장" />
            </p>
        </form>
        <!-- 최신 메모 목록을 화면에 보여준다 -->
        <ul id='ul_list_data'>
            <?php
            // 메모목록을 foreach 구문으로 하나씩 반복한다.
            foreach($post_data as $post){                
            ?>
            <!-- 각 메모마다 post_ 문자열 + tbl_post.post_id 값을 붙여 유일한 HTML 식별자를 만들어낸다 -->
            <!-- 이 식별자는 개별 글 삭제 기능 구현에 쓰임 -->
            <li id="post_<?= $post['post_id'] ?>"> <!-- li id="post_6" 식으로 보여진다 -->
                <?= $post['post_content'] ?> <!-- php echo $post['post_content']와 같은 뜻 -->
                <!-- 글 삭제 함수를 호출하는 html 버튼을 만듦 -->
                <!-- <input type="button" value="삭제" onclick="post_delete('6');return false;" /> 와 같음 -->
                <input type="button" value="삭제" onclick="post_delete('<?= $post['post_id'] ?>');return false;" />
            </li>
            <?php
            }
            ?>
        </ul>
        <a href="#" id='more' onclick="next_list();">더보기</a>
        <input type='hidden' id='last_post_id' value="<?php echo $last_post_id ?>" />
    </body>
</html>