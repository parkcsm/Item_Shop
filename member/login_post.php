<?php header("content-type:text/html; charset=UTF-8"); 'ob_start';
include("../lib/connect.php");
$connect=dbconn();

$user_id = $_POST['user_id'];
$pws = $_POST['pw'];
if(isset($_POST['autologin'])){
$autologin='Yes';
}else{
$autologin='No';
}


//$autologin = $_POST['autologin'];

$pws ."<br>"; 
$pw=md5($pws);
//나의 정보 데이터 가지고 오기!

$query = "select * from member where user_id='$user_id'";
mysqli_query($connect,"set names utf8");
$result = mysqli_query($connect, $query);
$member = mysqli_fetch_array($result);

if(!$user_id){
Error("아이디를 입력하세요.");
}

/*
elseif(!$member['user_id']){
Error("존재하지 않는 회원 아이디 입니다.");
}
*/

if(!$pws){
Error("비밀번호를 입력하세요.");
}elseif($member['pw']!=$pw)Error("비밀번호가 같지 않습니다.");

if($member['user_id'] and $member['pw']==$pw){



$tmp = $user_id;
if($autologin=='Yes'){                                                    //자동로그인 구현;
  setcookie("login",$tmp,time()+60*60*24*30, "/");  //자동로그인 시...;
}

//else{

//echo "no";
//  setcookie("login",$tmp,time()+60*60, "/");     //1시간동안 유효;
//}



$tmp = $member['user_id'];
session_start();

$_SESSION['user_id']=$tmp;
//setcookie("COOKIES",$tmp,time()+60*60*24,"/"); // 24시간동안 유효
}
?>

<script>
window. alert('로그인 되었습니다.');
location.href='../index.php';
</script>
