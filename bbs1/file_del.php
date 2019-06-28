<?php header("content-type:text/html; charset=UTF-8");

 include('../../lib/connect.php');
 
 $connect = dbconn();//DB컨넥트
 $member = member(); //회원정보


if(!$member['user_id']){
$member = member2();
}



 if(!$member['user_id'])Error('로그인 후 이용해 주세요');

$no = $_GET['no'];

$user_id = $member['user_id'];
$query="select * from bbs1 where no='$no' and user_id ='$user_id'";
$result = mysqli_query($connect, $query);
$data = mysqli_fetch_array($result);
if(!$result)die("연결에 실패하였습니다.".mysqli_error());
//여기까지 쿠키와get넘버를 사용해서 bbs1로 접근하는 방법


//이후부터는 접근한 db bbs1에서 파일01이 있을시, 삭제함
if($data['file01']){

$user_id_data = $data['user_id'];
$qy = "update bbs1 set
      file01=''
      where no='$no' and user_id='$user_id_data'";
      mysqli_query($connect,$qy);

$del_file = "./data/".$data['file01'];
if($data['file01'] && is_file($del_file))unlink($del_file);
}

mysqli_close($connect);
?>

<script language="JavaScript">
alert("파일이 삭제되었습니다.");
opener.location.reload();
window.close();
</script>
