<?php header('content-type/html; charset=UTF-8');

date_default_timezone_set('Asia/Seoul');//

//$user_id = $_SESSION['user_id'];

$id=$_POST['id'];
$bbs1_no=$_POST['bbs1_no']; //게시글 번호
$replys =$_POST['replys']; //코멘트 달글 번호
$memo = $_POST['memo']; //코멘트 내용

include('../../lib/connect.php');
$connect = dbconn(); //DB컨넥트
$member=member(); //회원정보


if(!$member['user_id']){
$member = member2();
}


if(!$member['user_id'])Error('로그인 후 이용하세요.');
if(!$memo)Error('내용을 입력하세요.');
if(!$bbs1_no)Error('접근이 잘못됐습니다.');

$regdate = date("YmdHis",time()); //날짜/시간


$user_id = $member['user_id'];
$name = $member['name'];
$nick_name = $member['nick_name'];


$query = "insert into bbs1_comment(id,bbs1_no,user_id,name,nick_name,memo,replys,regdate)
              values('$id','$bbs1_no','$user_id','$name','$nick_name','$memo','$replys','$regdate')";

mysqli_query($connect,$query);

$query = "update bbs1 set comment=comment+1 where no='$bbs1_no'";
mysqli_query($connect,$query);
?>

<script>
window.alert("댓글이 등록되었습니다.");
location.href='view.php?no=<?=$bbs1_no?>&id=<?=$id?>&lo_reply_1=#lo_reply_1';
</script>
