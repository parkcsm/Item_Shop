<?php header("content-type:text/html; charset=UTF-8");
date_default_timezone_set('Asia/Seoul');//

      include ("../lib/connect.php");
      $connect = dbconn();
      $member = member();
     if($member['user_id']==""){

$member=member2();
}
$name=$_POST['name'];
$nick_name=$_POST['nick_name'];
$birth=$_POST['birth'];

if(empty($_POST['sex']))$_POST['sex']='';
$sex=$_POST['sex'];


$tel=$_POST['tel'];
$email=$_POST['email'];

$pws=$_POST['pw'];
$npw = $_POST['npw'];
$npwc = $_POST['npwc'];

$addr_1=$_POST['addr_1'];
$addr_2=$_POST['addr_2'];


//닉네임 중복체크
$query = "select * from member where nick_name='$nick_name'";
mysqli_query($connect,"set names utf8");
$result = mysqli_query($connect,$query);
$members = mysqli_fetch_array($result);
if($nick_name==$members['nick_name']){
if($nick_name!=$member['nick_name'])Error("해당 닉네임이 이미 존재합니다. 다른 닉네임을 선택해주세요.");
}
if(!$name)Error("이름을 입력하세요.");
if(strlen($name)<6 or strlen($name)>15)Error("이름은 2자에서 5자까지 허용합니다."); //한글은 1자당 3byte

if(!$birth)Error("생년월일을 입력하세요.");
if(strlen($birth)<8 or strlen($birth)>8)Error("생년월일은 8자를 입력하세요.");

if(!$sex)Error("성별을 선택하세요.");
if(!$tel)Error("연락처를 입력하세요.");
if(strlen($tel)<8 or strlen($birth)>15)Error("연락처는 최소8자리부터 15자리까지 입니다.");

if(!$email)Error("이메일을 입력하세요.");

if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email))
Error("이메일주소가 잘못되었습니다.");


$pw = md5($pws); //비밀번호 암호화

if(!$pws){
Error("비밀번호를 입력하세요.");
}elseif($member['pw']!=$pw)Error("현재 비밀번호를 정확히 입력해 주세요");

if(!$npw){
Error("새로운 비밀번호를 입력하세요");
}elseif($npw != $npwc)Error("새로운 비밀번호와 비밀번호 확인이 같지 않습니다.");

$pw = md5($npw); //새 비밀번호 암호화

if(!$addr_1)Error("처음주소는 필수입니다.");

$regdate = date("YmdHis",time()); //날짜 시간
$ip=getenv("REMOTE_ADDR"); //ip


$user_id = $member['user_id'];
$query="update member set
       name = '$name',
     nick_name = '$nick_name',
     birth = '$birth',
      sex = '$sex',
      tel = '$tel',
     email = '$email',
      pw = '$pw',
    addr_1 = '$addr_1',
    addr_2 = '$addr_2'
    where user_id = '$user_id'";
mysqli_query($connect,"set names utf8");
mysqli_query($connect,$query);
mysqli_close($connect); //mysql끝내기
?>

<script>
window.alert('회원정보가 수정되었습니다.');
location.href='../index.php';
</script>
