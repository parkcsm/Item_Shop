<?php header("content-type:text/html; charset=UTF-8");

  include("../lib/connect.php");
$connect = dbconn();


/*
$sql="CREATE TABLE bbs1
     (no int not null auto_increment,
      PRIMARY KEY(no),
      id char(15),
      level int,
      user_id char(15),
      name char(15),
      nick_name char(15),
      pw char(30),
      subject char(150),
      story text,
      hit int,
      regdate char(20),     
      ip char(20)
        )";
*/

//$sql ="alter table bbs1 drop colum level"; //필드 삭제
//$sql ="drop table bbs1"; //테이블 삭제
//$sql="alter table member add level int";//필드명과 타입 추가하기
$sql="alter table member add level int default '3' not null"; //필드명과 타입 추가하기 기본값 주기
//$sql="alter table bbs1 change level level_2 varchar(20)"; //필드명과 타입을 변경
//$sql="alter table bbs1 modify level2 int"; //필드타입반 변경
//$sql="alter table bbs1 rename bbs2"; //테이블 이름 변경


/*
$sql="SHOW TABLES FROM jongwon";
$result = mysqli_query($connect,$sql);
if(!$result){
    echo "MySQL Error".mysqli_error();
    exit;
}
while($row=mysqli_fetch_row($result)){
   echo "Table:".$row[0]."<br>";
}*/

if($sql)echo("정상적으로 실행되었습니다.");

mysqli_query($connect,$sql);
if(!$sql)die("테이블 생성에 실패했습니다.".mysqli_error($connect));

echo "<p>테이블이 정상적으로 생성되었습니다.</p>";

?>
