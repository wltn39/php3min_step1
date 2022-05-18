
<p style='text-align:right'>            
    <?php
    // 세션이 시작하지 않닸다면 시작한다.
    if (isset($_SESSION) === false){session_start();}
    // 로그인 상태 여부 확인 (member_id 키가 있는지 검사)
    if (isset($_SESSION['member_id']) === false){
    ?>
    <!-- 로그아웃 상태라면 회원가입, 로그인 보여주고  -->
    <a href="/regist.php">회원가입</a>
    <a href="/login.php">로그인</a>
    <?php
    // 로그인 상태면 고르아웃 버튼을 보여줌
    }else{
    ?>
    <a href="/logout.php">로그아웃</a>
    <?php
    }
    ?>
</p>