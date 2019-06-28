<?php header("content-type:text/html; charset=UTF-8");

include("../../lib/connect.php");
$connect = dbconn(); //DB컨넥트
$member=member(); //회원정보

if(!$member['user_id']){
$member = member2();
}



if(!$member['user_id'])Error("로그인 후 이용해 주세요.");

$no = $_GET['no'];
$id = $_GET['id'];


$user_id = $member['user_id'];


$query = "select * from bbs1 where no = '$no' and user_id = '$user_id'";
$result = mysqli_query($connect,$query);
$data = mysqli_fetch_array($result);

if($data['file01']){
  $del_file =  './data/'.$data['file01'];
  if($data['file01'] && is_file($del_file))unlink($del_file);
}

$query ="delete from bbs1 where no='$no' and id = '$id' and user_id = '$user_id'";
mysqli_query($connect,$query);

$query_1 = "delete from bbs1_comment where bbs1_no = '$no'";  //댓글, 덧글 삭제
$result_1 =  mysqli_query($connect,$query_1);



?>

<script>
window.alert('삭제 되었습니다.');
location.href='./list.php'
</script>
