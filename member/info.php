<html>
<head>
<?php
include('../lib/connect.php');
$connect=dbconn(); //DB컨넥트
$member=member(); //회원정보

if(!$member['user_id']){

$member=member2();
}
?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> <!--다국적 언어: UTF-8-->
<link type='text/css' href='../lib/m_style.css' rel='stylesheet'>
<title>회원정보</title>
</head>

<body>
<TABLE BORDER='0' CELLSPACING='0' CELLPADDING='0' WIDTH='100%' HEIGHT='100%' ALIGN='CENTER' VALIGN='TOP'>
<TR>
<TD WIDTH='100%' HEIGHT='70' ALIGN='LEFT' VALIGN='MIDDLE' BGCOLOR='#E89C05'>
&nbsp; &nbsp; <a href="../index.php">[홈]</a>
</TD>

<TR>
<TD WIDTH='100%' HEIGHT='100%' ALIGN='CENTER' VALIGN='TOP'>
<table border='0' width='750' height='100%' bgcolor='FFFFFF' align='center' cellspacing='0' cellpadding='0'>
<tr>
<form action='./info_change.php' name='member' method='post'>
 <td width='100%' height='300' bgcolor='EEEEEE' align='left' valign='top'>
    <strong>[ 회 원 정 보 ]</strong><br><br>



<input type='hidden' name='id' value='test'>
<li>회원아이디 : &nbsp; <?=$member['user_id']?> <br><br>
<li>이름 : <input type='text' name='name' size='10' value=<?=$member['name'] ?>> &nbsp; &nbsp; &nbsp; 닉네임 : <input type='text' name='nick_name' size='10' value=<?=$member['nick_name']?>><br><br>
<li>생년월일 : <input type='text' name='birth' size='10' value=<?=$member['birth']?>> &nbsp; &nbsp; &nbsp;
    성별 : <input type = 'radio' name = 'sex' value="male">남자 &nbsp; &nbsp; <input type ='radio' name='sex' value="female">여자 <br><br>
<li>연락처 : <input type='text' name='tel' size='10' value=<?=$member['tel']?>> &nbsp; &nbsp; 이메일 <input type = 'text' name = 'email' size = '10' value=<?=$member['email']?>> <br><br>
<li>비밀번호 : <input type='password' name='pw' size='10'> <br><br>
<li>새비밀번호 : <input type='password' name='npw' size='10'> <br><br>
<li>비밀번호확인 : <input type='password' name='npwc' size='10'> <br><br>
<li>주소 : <input type = 'text' name = 'addr_1' size='15' value=<?=$member['addr_1']?>> &nbsp; &nbsp;상세주소 <input type='text' name='addr_2' size='15' value=<?=$member['addr_2']?>>
<br><br>
<input type='submit' value="수정하기"> &nbsp; &nbsp;  <a href="./info_deletecheck.php" >회원탈퇴</a>

    </td>
</form>


    <tr>
    <td height='100%' bgcolor='EEEEEE' align='center'> &nbsp;</td>

    <tr>
    </table>

    </TD>
    </TR>
    </TABLE>

</body>
</html>

