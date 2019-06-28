<?php header("content-type:text/html; charset=UTF-8");

  include("./lib/connect.php");
$connect = dbconn();


$tablename='member'; //삭제할table명을 ' ' 사이에 입력하면 된다.

$sql="DROP TABLE $tablename";
mysqli_query($connect,$sql);

if(!$sql)die("테이블 생성에 실패했습니다.".mysqli_error($connect));



?>
