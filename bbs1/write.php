<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
<link type="text/css" href="../lib/m_style.css" rel='stylesheet' />
<title>TEST 게시판 글쓰기</title>
<?php
include ("../../lib/connect.php");
$connect = dbconn();
$member = member();


if(!$member['user_id']){
$member = member2();
}


if(!$member['user_id'])Error("로그인 후 이용해 주세요.");
?>

<script type="text/javascript" src="../../SmartEditor2/workspace/js/service/HuskyEZCreator.js" charset="utf-8"></script>

</head>

<body>

<TABLE BORDER='0' CELLSPACING='0' CELLPADDING='O' WIDTH='100%' HEIGHT='100%' ALIGN='CENTER' VALIGN='TOP'>
<TR>
<TD WIDTH='100%' HEIGHT='70' ALIGN='LEFT' VALIGN='MIDDLE' BGCOLOR='#E89C05'>
<table border='0' width='90%' height='70' bgcolor='#E89C05' align='center' cellspacing='0' cellpadding='0'>
<tr>
   <td width='100%' height='70' align='left' valign='middle'>
   <a href='../../index.php'><strong>[홈]<strong></a>

</td>
   </tr>
   </table>
</TD>

<TR>
<TD WIDTH='100%' HEIGHT='100%' ALIGN='CENTER' VALIGN='TOP'>
<table border='0' width='75%' height='100%' bgcolor='FFFFF' align='center' cellspacing='0' cellpadding='0'>
<tr>
    <td width='100%' height='10' colspan= '2' bgcolor ='FFFFF'>&nbsp;</td>
<tr>
    <td width='100%' height='30' colspan= '2' bgcolor ='FFFFF' align='center'> -자유게시판 글쓰기 -</td>

<form name = 'write' action='write_post.php' method='post' enctype='multipart/form-data'>
<input type = 'hidden' name ='id' value ='bbs1'>

<tr>
<td width='20%' height='30'  align='right' valign='middle'>
<li>아이디
</td>
<td width='80%' height='30' bgcolor='FFFFF' align='left' valign='middle'>
&nbsp; <input type='text' name='user_id' size='15'
value='<?=$member['user_id']?>' readonly='readonly'>
</td>

<tr>
<td width='20%' height='30'  align='right' valign='middle'>
<li>이름
</td>
<td width='80%' height='30' bgcolor='FFFFF' align='left' valign='middle'>
&nbsp; <input type='text' name='name' size='15' value='<?=$member['name']?>' readonly='readonly'>  
&nbsp; &nbsp; &nbsp; 
닉네임:<input type='text' name='nick_name' size='15' value='<?=$member['nick_name']?>' readonly='readonly'>
</td>

<tr>
<td width='20%' height='30'  align='right' valign='middle'>
<li>제목</td>
<td width='80%' height='30' bgcolor='FFFFF' align='left' valign='middle'>
&nbsp;<input type='text' name='subject' style="width:500px; height:30px;">
</td>

<tr>
<td width='100%' height='420'  align='center' valign='middle' colspan='2'>
 <textarea id='ir1'  name='story' style="width:80%; height:400px;"></textarea>
</td>


<script type="text/javascript">
var oEditors = [];

nhn.husky.EZCreator.createInIFrame({
        oAppRef: oEditors,
        elPlaceHolder: "ir1",
        sSkinURI: "../../SmartEditor2/workspace/SmartEditor2Skin.html",      
        fCreator: "createSEditor2"
});
       
function submitContents(elClickedObj) {
        oEditors.getById["ir1"].exec("UPDATE_CONTENTS_FIELD", []);      // 에디터의 내용이 textarea에 적용됩니다.
        
        // 에디터의 내용에 대한 값 검증은 이곳에서 document.getElementById("ir1").value를 이용해서 처리하면 됩니다.
        
        try {
                elClickedObj.form.submit();
        } catch(e) {}
}
</script>


<tr>
<td width='100%' height='30' align='center' valign='middle' colspan='2'>
<input type='file' name='file01'>
</td>

<tr>
<td width='100%' height='30' bgcolor='EDEDED' colspan='2' align='center' valign='middle'>
<input type='Submit' value='전송' onclick='submitContents()'>
</td>
</form>



<tr> 
    <td width='100%' height='100%' colspan='2'  bgcolor='FFFFF'>&nbsp;</td>
</tr>
</table>
</TD>

<TR>
<TD WIDTH='100%'  HEIGHT='100%'  ALIGN='CENTER'  VALIGN='TOP'>&nbsp;</TD>
</TR>

</TABLE>
</body>
</html> 
