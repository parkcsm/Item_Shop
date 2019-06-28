<?php

function dbconn(){
$host_name="localhost"; //호스트네임
$db_user_id="root"; // DB user id
$db_name="jongwon"; // DB name
$db_pw="VLFKS12"; // DB password

$connect = mysqli_connect($host_name,$db_user_id,$db_pw,$db_name);
if(!$connect)die("연결에 실패했습니다.".mysqli_error());
mysqli_query($connect,"set names utf8");
  return $connect;
}


//에러메세지 출력
function Error($msg){
echo "
    <script>
    window.alert('$msg');
    history.back(1);
    </script>
    ";
    exit; //위에 에러메시지만 띄운다.
}


  function member(){
  
  session_start();
  global $connect;
 
 if(empty($_SESSION['user_id']))($_SESSION['user_id']="");
  $temps = $_SESSION['user_id'];
   $cookies =   explode("//",$temps);

  //아이디 $cookies[0];
  //비밀번호 $cookies[1];





  ///////회원정보////////
  $query = "select* from member where user_id='$temps'";
 mysqli_query($connect,"set names utf8");
 $result = mysqli_query($connect,$query);
 $member = mysqli_fetch_array($result);
 return $member;
  }



 function member2(){
;
  global $connect;

 if(empty($_COOKIE['login']))($_COOKIE['login']="");
  $temps = $_COOKIE['login'];
 //  $cookies =   explode("//",$temps);

  //아이디 $cookies[0];
  //비밀번호 $cookies[1];





  ///////회원정보////////
  $query = "select* from member where user_id='$temps'";
 mysqli_query($connect,"set names utf8");
 $result = mysqli_query($connect,$query);
 $member = mysqli_fetch_array($result);
 return $member;
  }


?>
