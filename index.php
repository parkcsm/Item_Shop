<html>
<head>
<meta http-equiv="Content=type" content="text/html;charset=UTF-8" />
<link type='text/css' href='./lib/m_style.css' rel='stylesheet'>
<title>터랍페 정보 공유 (터키어, 아랍어, 이란어)</title>
</head>
<body>

<?php
include ("./lib/connect.php");
$connect = dbconn();
$member = member(); //세션
$member2 = member2(); //쿠키

echo "세션사용 ".$member['user_id']."<br>";
echo "쿠키 ".$member2['user_id'];
//if(empty($_COOKIE['login']))($_COOKIE['login']=="");
//$temps = $_COOKIE['login'];
//$cookies =   explode("//",$temps);
?>

<table border='0' width='100%' height='100%' align='center' cellspacing='0' cellpadding='0'>
<tr>
<td width='100%' height='80' align='center' bgcolor='#764300'>
<font color='#FFFFFF'>터키어 &nbsp;&  아랍어 &nbsp;&  페르시아어 &nbsp; 공부정보공유 &nbsp; 커뮤니티 &nbsp;</font></td>

<tr>
<td width='100%' height='50' align='right'>

<?php if($member['user_id'] or $member2['user_id'] !=""){

if($member['user_id']){
echo $member['name']."(".$member['user_id'].")님 환영합니다.";
}else{

echo $member2['name']."(".$member2['user_id'].")님 환영합니다.";
}

}else{?>
<a href="./member/join.php"><strong>[회원가입]</strong></a>
&nbsp; &nbsp; &nbsp;
<a href="./member/login.php"><strong>[로그인]</strong></a>
<?php }?>
&nbsp; &nbsp;

<?php if($member['user_id']or $member2['user_id']){?>

<a href="./member/info.php"<strong>[회원정보]</strong></a>
&nbsp;
<a href="./member/logout.php"<strong>[로그아웃]</strong></a>
<?php }?>
</td>

<tr>
<td width='100%' height='30' align='left' valign='top' bgcolor='#452403'>
&nbsp; &nbsp; &nbsp;
<a href='./board/bbs1/list.php'><font color='#FFFFFF'>[자유게시판]</font></a>


</td>






<tr>

<td width='50%' height='300' align='center' bgcolor='#FFFFFF'>
<img src="arab" width="600" height="200">
&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
<img src="arab2" width="600" height="200">
&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
<img src="arabic" width="580" height="200">
</td>

<tr>
<td width='50%' height='300' align='center' bgcolor='#FFFFFF'>
<img src="persian lang" width="600" height="200">
&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
<img src="arabpic" width="600" height="200">
&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
<img src="language" width="580" height="200">
</td>

<tr>
<td width='50%' height='300' align='center' bgcolor='#FFFFFF'>
<img src="turkish" width="600" height="200">
&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
<img src="persian" width="600" height="200">
&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
<img src="turkish2" width="580" height="200">
</td>




<tr>
<td width='100%' height='100%' align='center' bgcolor='#FFFFFF'>&nbsp;</td>

</tr>
</table>
</body>
</html>
