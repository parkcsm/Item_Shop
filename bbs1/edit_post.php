<?php header("content-type:text/html; charset=UTF-8");

date_default_timezone_set('Asia/Seoul');//

include("../../lib/connect.php");
$connect = dbconn(); //DB컨넥트
$member = member(); //회원정보


if(!$member['user_id']){
$member = member2();
}



if(!$member['user_id'])Error("로그인 후 이용해주세요.");

$subject = $_POST['subject'];
$story = $_POST['story'];
$id = $_POST['id'];
$no = $_POST['no'];

if(!$subject)Error("제목을 입력하세요.");
if(!$story)Error("내용을 1자 이상 작성하세요.");


if(empty($_FILES['file01']['name']))$newfile01=''; //undefined variable 때문에 집어넣음
                                                   // newfile이 null값으로 들어올 가능성 때문에 본 코드를 안치면 바로 꺼져버림
if($_FILES['file01']['name']!=''){

$size = $_FILES['file01']['size'];
  if($size>2097152)Error('파일용량:2MB 제한합니다.');

$file01_name=strtolower($_FILES['file01']['name']); //파일명과 확장자를 소문자로 변경
$file01_split = explode(".",$file01_name); //파일명과 확장자를 분리
$extexplode = $file01_split[count($file01_split)-2.3]; //파일명만 가져오기
$file01_type = $file01_split[count($file01_split)-1]; //확장자만 가져오기
$img_ext = array('jpg','jpeg','gif','png');//이미지 확장자 종류를 배열에 넣는다.
    if(array_search($file01_type,$img_ext) === false)Error('이미지 파일이 아닙니다.');
$tates = date("mdhis",time()); //날짜 (월,일,시간,분,초)
$newfile01 = chr(rand(97,122)).chr(rand(97,122)).$tates.rand(1,9).rand(1,9).".".$file01_type; //파일명 생성;

$dir="./data/"; //업로드할 디렉터리 지정
move_uploaded_file($_FILES['file01']['tmp_name'],$dir.$newfile01); //파일업로드;
$mode = '0777';
chmod($dir.$newfile01,$mode);

$query ="update bbs1 set
        file01='$newfile01'
        where id='$id' and no = '$no'";
        mysqli_query($connect,$query);

}





$query="update bbs1 set
         subject='$subject',
         story = '$story'
         where id='$id' and no='$no'";
mysqli_query($connect,"set names utf8");
mysqli_query($connect,$query);

mysqli_close($connect);
?>

<script>
window.alert('수정 되었습니다.');
location.href='./view.php?id=<?=$id?>&no=<?=$no?>';
</script>
