<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
<title>로그인 페이지</title>
</head>

<body>
<table border='0' width='600' height='100%' align='center' cellspacing ='0' cellpadding= '0' bgcolor ='#EEEEEE'>

<td width='100%' height='40' align = 'left' valign ='middle'>
&nbsp; &nbsp;   <a href='../index.php'><strong>[홈]</strong></a>
   

&nbsp; &nbsp;   <a href='./join.php'><strong>[회원가입]</strong></a>
   </td>



<tr>
<td width='100%' height='80' align='center'>
<  로그인 >
</td>

<tr>
<form action='./login_post.php' name='login' method='POST'>

<td width='100%' height='60' align='center'>
<li>아이디 &nbsp; : <input type='text' name='user_id' size='10' >
</td>

<tr>
<td width='100%' height='60' align='center'>
<li>비밀번호: <input type='password' name='pw' size='15'>
</td>

<tr>

<td colspan='2' width='100%' height='50' align='center' valign="bottom">
		&nbsp; &nbsp; &nbsp;
	<input type=checkbox name=autologin  value='1' onclick="window.alert('개인용 PC에서만 사용하시기 바랍니다.');"> &nbsp; 로그인 유지(하루)
	<br>
<hr size='3'  width='100%' color='E9A0E3' />
</td>


<tr>
<td width='100%' height='65' align='center'>
<input type='submit' value='전송'>
<br><br>"참고사항 - 로그인유지를 체크하지 않아도  <br><br> 모든 인터넷창을 종료하기까지  로그인이 유지됩니다! "
</td>
</form>

<tr>
<td width='100%' height='100%' align='center'> 
</td>

</tr>
</table>
</body>


</html>
