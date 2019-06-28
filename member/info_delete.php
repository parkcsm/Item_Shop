<?php header("content-type:text/html; charset=UTF-8");

include("../lib/connect.php");
$connect = dbconn(); //DB컨넥트
$member=member(); //회원정보

if(!$member['user_id'])Error("로그인 후 이용해 주세요.");

$pws=$_POST['pw'];

$pw = md5($pws); //비밀번호 암호화
if(!$pws){
Error("비밀번호를 입력하세요.");
}elseif($member['pw']!=$pw)Error("현재 비밀번호를 정확히 입력해 주세요!");


$user_id = $member['user_id'];
$query ="delete from member where user_id = '$user_id'";
mysqli_query($connect,$query);


?>

<script>
window.alert('회원탈퇴에 성공하였습니다.');
location.href='../index.php'
</script>
