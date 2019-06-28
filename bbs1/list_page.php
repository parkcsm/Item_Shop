<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> <!--다국어 언어: UTF-8-->  

<style type='text/css'>
table, tr, td{margin:0px;}

#page_1{font-family:굴림,돋음,sans-serif; font-size:13px; font-weight:normal; color:#676460; text-align:center;
line-height:50px;
background-color:#FBDAAE;
}
#font1{font-family:굴림,돋음,sans-serif; font-size:15px; font-weight:bold; color:#676460; text-align:center;  float:left;
}

</style>
</head>

<div id='page_1'>
<?php

//총게시물                 $totals

//한페이지 나타날 게시글수 $view_total

$rr=ceil($totals/$view_total);





//이전 페이지 구하기

 $before= $_page-1; //현재 페이지수 에서 -1을 준다.

 if($before<1)($before=1); 



//다음 페이지 구하기

$next= $_page + 1; 

if($next>$rr)($next=$rr);





//그룹페이지 구성//

//(처음)

if($_page%10){$goto=$_page-$_page%10+1; //한 그룹당 10개 페이지를 지정 '10'을 넘기면 1을 증가.

     }elseif($goto=$_page -9); // '10'배수가 아니면 -'9' 



//(끝)



//그룹페이지 구성 (끝)//

$last= $goto + 10; //예) $goto='1'이라면 $last='11'이 되어야 합니다. 



//이전페이지 그룹 출력


$PHP_SELF = './list.php';
$before_group= $goto -1;

if($before_group<1)($before_group=1);

if($_page !=1) echo ("<a href=$PHP_SELF?_page=$before_group>[◀]</a>&nbsp;"); //이전 페이지 그룹출력

 



//페이지 번호 출력

for($e=$goto; $e<$last; $e++){ //현재페이지가 전체페이지 보다 작으면 페이지를 증가

	if($e>$rr) break; //총 나타날 페이지 번호 보다 크면 멈추고 다음을 실행.

	if($e==$_page) echo ("<strong>$e</strong>");  //$e 와 $_page번호가 서로 같으면....

                      else{
	             echo ("&nbsp; <a href=$PHP_SELF?_page=$e>[$e]</a>&nbsp;");  //$e와 $_page번호가 서로 같지 않으면...

				   }

}





//다음페이지 그룹 출력

$next_group= $last;

if($next_group > $rr)($next_group=$rr); //$next_group는 $rr보다 크면 $rr은 $next_group가 된다.

if($_page !=$rr) echo ("&nbsp; <a href=$PHP_SELF?_page=$next_group>[▶]</a>");

?>

</div>
