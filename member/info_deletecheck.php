<html>
<head>
<?php
include('../lib/connect.php');
$connect=dbconn(); //DB컨넥트
$member=member(); //회원정보
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
<form action='./info_delete.php' name='member' method='post'>
 <td width='100%' height='300' bgcolor='EEEEEE' align='left' valign='top'>
   
 <strong>[ 회 원 탈 퇴 진 행 ]</strong><br><br>
<input type='hidden' name='id' value='test'>
<li>회원아이디 : &nbsp; <?=$member['user_id']?> <br><br>
<li>비밀번호 : <input type='password' name='pw' size='10'> <br><br>

<input type='submit' value='회원탈퇴진행' onclick="return confirm('회원 탈퇴를 진행하게 되면 다시 되돌릴 수 없습니다. 정말 진행하시겠습니까?');" >

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

