<?php header("content-type:text/html; charset=UTF-8");

   session_start();
 
    unset($_SESSION['user_id']);

setcookie("login","",0,"/") //쿠키 지우기
?>

<script>
window.alert('로그아웃 되었습니다.');
location.href='../index.php';
</script>
