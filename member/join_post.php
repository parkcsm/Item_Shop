<?php header("content-type:text/html; charset=UTF-8");

date_default_timezone_set('Asia/Seoul');//

      include ("../lib/connect.php");
      $connect = dbconn();
      $member = member();
  
$id=$_POST['id'];
$user_id=$_POST['user_id'];
$name=$_POST['name'];
$nick_name=$_POST['nick_name'];
$birth=$_POST['birth'];

if(empty($_POST['sex']))$_POST['sex']='';
$sex=$_POST['sex'];


$tel=$_POST['tel'];
$email=$_POST['email'];
$pws=$_POST['pw'];
$addr_1=$_POST['addr_1'];
$addr_2=$_POST['addr_2'];



if(!$user_id)Error("아이디를 입력하세요.");
if(substr($user_id,'12'))Error("회원아이디는 12자 까지만 허용됩니다.");
if(!preg_match("/[a-z 0-9]/",$user_id))Error("아이디는 영문 소문자와 숫자만 가능합니다.");
//아이디 존재여부 확인
$query = "select* from member where user_id='$user_id'";
mysqli_query($connect,"set names utf8");
$result = mysqli_query($connect,$query);
$member = mysqli_fetch_array($result);
if($user_id==$member['user_id'])Error("해당 아이디가 이미 존재합니다. 다른 아이디를 선택해주세요.");


if(!$name)Error("이름을 입력하세요.");
if(strlen($name)<6 or strlen($name)>15)Error("이름은 2자에서 5자까지 허용합니다."); //한글은 1자당 3byte

if(!$name)Error("닉네임을 입력하세요.");
if(strlen($nick_name)<6 or strlen($name)>15)Error("닉네임은 2자에서 5자까지 허용합니다."); //한글은 1자당 3byte
//닉네임 존재여부 확인
$query = "select* from member where nick_name='$nick_name'";
mysqli_query($connect,"set names utf8");
$result = mysqli_query($connect,$query);
$member = mysqli_fetch_array($result);
if($nick_name==$member['nick_name'])Error("해당 닉네임이 이미 존재합니다. 다른 닉네임을 선택해주세요.");

if(!$birth)Error("생년월일을 입력하세요.");
if(strlen($birth)<8 or strlen($birth)>8)Error("생년월일은 8자를 입력하세요.");


if(!$sex)Error("성별을 선택하세요.");
if(!$tel)Error("연락처를 입력하세요.");
if(strlen($tel)<8 or strlen($birth)>15)Error("연락처는 최소8자리부터 15자리까지 입니다.");

if(!$email)Error("이메일을 입력하세요.");

if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email))
Error("이메일주소가 잘못되었습니다.");



if(!$pws)Error("비밀번호를 입력하세요.");
if(!$addr_1)Error("처음주소는 필수입니다.");

$pw = md5($pws); //비밀번호 암호화

$regdate=date("YmdHis",time()); //날짜 시간
$ip=getenv("REMOTE_ADDR"); //ip

$query="insert into member(id,user_id,name,nick_name,birth,sex,tel,email,pw,addr_1,addr_2,regdate,ip) values('$id','$user_id','$name','$nick_name','$birth','$sex','$tel','$email','$pw','$addr_1','$addr_2','$regdate','$ip')";
mysqli_query($connect,"set names utf8");
mysqli_query($connect,$query);
mysqli_close($connect); //mysql끝내기
?>

<script>
window.alert('회원가입이 완료되었습니다.');
location.href='../index.php';
</script>
