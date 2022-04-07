<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
  font.holy {font-family: tahoma;font-size: 20px;color: #FF6C21;}
  font.blue {font-family: tahoma;font-size: 20px;color: #0000FF;}
  font.black {font-family: tahoma;font-size: 20px;color: #000000;}
  table{border: 3px solid #0000FF; padding: 19px; border-collapse: collapse;
  width: 75%; height: 380px; margin-left: auto; margin-right: auto;}
  th {border: 3px solid #0000FF; text-align: center; background-color: #50bcdf;}
  tr.td {border: 3px solid #0000FF; text-align: right; background-color: #FF3399;}
  td {border: 3px solid #0000FF; font-family:arial;  font-size:22px;}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<?php error_reporting (E_ALL ^ E_NOTICE);
set_time_limit(0); ?>
<h3>문제.1</h3>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
n:
<input type="text" name="n" value="" />
<input type="submit" name="submit" value="입력">
<br>
<?php
#sum
$n = $_POST['n'];
$sum = 0;
for($prod = 1; $prod <= $n; $prod++)
{
  $sum +=$prod;
}
echo "1부터" .$n."까지의 전체 합 =" .$sum. "입니다.<br>";

#factorial
{
  $result = 1;
  for($prod = 1; $prod <= $n; $prod++)
  $result = $result * $prod;
}

echo "1부터 ".$n."까지의 전체 곱 = ".$result."입니다.<br><br><br>";

?>

?>
<h3>문제.2</h3>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
num: 
<input type="text" name="num" value="" />
<input type="submit" name="submit" value="입력">
<?php
$num = $_POST['num'];
function unique_rand($min, $max, $num) {
  $count = 0;
  $return = array();
  while ($count < $num) {
    $return[] = mt_rand($min, $max);
    $return = array_flip(array_flip($return));
    $count = count($return);
  }
  shuffle($return);
  return $return;
}
$ra = unique_rand(1, 100, $num);
$ary = $ra;
$arr = sort($ary);
?>
</form>

<?php
echo "<h5>입력한 수만큼의 결과</h5>";
echo implode($ra, ",");
echo "<br>";
echo implode($ary, ",");
?>


<h3>문제.3</h3>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
fibo: 
<input type="text" name="fibo" value=""/>
<input type="submit" value="입력"/>
<br>
<?PHP
$fibo = $_POST['fibo'];
function fibo($fibo)
{
if($fibo ==  0 || $fibo ==1) return (1);
return (fibo($fibo -1) + fibo($fibo -2));
}
for ($i=1; $i <= $fibo; $i++)
print(fibo($i - 1))." ";
 $a = 1;
 $b = 1;
 $fibo = 0;
 
 for($i = 0; $i < $fibo; $i++)
 {
 $c = $b +$a;
 echo $a." ";
 $a = $b;
 $b = $c;
 }

?>
</form>

<h3>문제.4</h3>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  도형 계산 : 
  <select name="Calculator">
    <option value="Triangular_area" selected>삼각형의 넓이</option>
    <option value="Rectangular_area">직사각형의 넓이</option>
    <option value="Circle_area">원의 넓이</option>
    <option value="Rectangular_parallelepiped_volume">직육면체 부피</option>
    <option value="Cylinder_volume">원통의 부피</option>
    <option value="Sphere_volume">구 부피</option>
  </select> 
  <br>
  가로 : 
  <input type="text" name="Transverse" value="" /><br>
  세로 : 
  <input type="text" name="length" value="" /><br>
  높이 : 
  <input type="text" name="Height" value="" /><br>
  반지름 : 
  <input type="text" name="Radius" value="" /><br>
  밑변 : 
  <input type="text" name="base_side" value="" /><br>
  <input type="submit" value="입력" />
 </form>
 <?php 

//전달받은 데이터를 변수로 저장 
$Calc = $_POST['Calculator'];
$num1 = $_POST['Transverse'];
$num2 = $_POST['length'];
$num3 = $_POST['Height'];
$num4 = $_POST['Radius'];
$num5 = $_POST['base_side'];
//계산한 두 수의 결과값을 저장할 변수 선언
$result = "";

//사칙연산(+,-,*,/) 요청 값에 따라 구분하여 처리.
switch($Calc){
	case("Triangular_area"):
		$result = $num5*$num3/2 ;
		break;
	case("Rectangular_area"):
		$result = $num1*$num2;
		break;
	case("Circle_area"):
		$result = M_PI*$num4**2;
		break;
	case("Rectangular_parallelepiped_volume"):
		$result = $num1*$num2*$num3;
		break;
  case("Cylinder_volume"):
    $result = M_PI*$num4**2*$num3;
    break;
  case("Sphere_volume"):
    $result = 3/4*M_PI*$num4**3;
    break;
}

//계산결과를 화면에 전달.		
echo "계산결과 :".$result."<br>";
?>

<h3>문제.5</h3>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  연도 : 
  <input type="text" name="year" value="" /><br>
  월  : 
  <input type="text" name="month" value="" /><br>
  <input type="submit" value="입력" />
</form>

<?php
//---- 오늘 날짜
$thisyear = date('Y'); // 4자리 연도
$thismonth = date('n'); // 0을 포함하지 않는 월
$today = date('j'); // 0을 포함하지 않는 일

//------ $year, $month 값이 없으면 현재 날짜
$year = $_POST['year'];
$month = $_POST['month'];
$day = isset($_GET['day']) ? $_GET['day'] : $today;

$prev_month = $month - 1;
$next_month = $month + 1;
$prev_year = $next_year = $year;
if ($month == 1) {
    $prev_month = 12;
    $prev_year = $year - 1;
} else if ($month == 12) {
    $next_month = 1;
    $next_year = $year + 1;
}
$preyear = $year - 1;
$nextyear = $year + 1;

$predate = date("Y-m-d", mktime(0, 0, 0, $month - 1, 1, $year));
$nextdate = date("Y-m-d", mktime(0, 0, 0, $month + 1, 1, $year));

// 1. 총일수 구하기
$max_day = date('t', mktime(0, 0, 0, $month, 1, $year)); // 해당월의 마지막 날짜
//echo '총요일수'.$max_day.'<br />';

// 2. 시작요일 구하기
$start_week = date("w", mktime(0, 0, 0, $month, 1, $year)); // 일요일 0, 토요일 6

// 3. 총 몇 주인지 구하기
$total_week = ceil(($max_day + $start_week) / 7);

// 4. 마지막 요일 구하기
$last_week = date('w', mktime(0, 0, 0, $month, $max_day, $year));
?>
<table>
  <th colspan='7'>
    <?php echo $year . '년 ' . $month . '월 ';?>
  </th>
  <tr class="td">
    <td>일</td>
    <td>월</td>
    <td>화</td>
    <td>수</td>
    <td>목</td>
    <td>금</td>
    <td>토</td>
  </tr>

  <?php
    // 5. 화면에 표시할 화면의 초기값을 1로 설정
    $day=1;

    // 6. 총 주 수에 맞춰서 세로줄 만들기
    for($i=1; $i <= $total_week; $i++){?>
  <tr>
    <?php
    // 7. 총 가로칸 만들기
    for ($j = 0; $j < 7; $j++) {
        // 8. 첫번째 주이고 시작요일보다 $j가 작거나 마지막주이고 $j가 마지막 요일보다 크면 표시하지 않음
        echo '<td height="50" valign="top">';
        if (!(($i == 1 && $j < $start_week) || ($i == $total_week && $j > $last_week))) {

            if ($j == 0) {
                // 9. $j가 0이면 일요일이므로 빨간색
                $style = "holy";
            } else if ($j == 6) {
                // 10. $j가 0이면 토요일이므로 파란색
                $style = "blue";
            } else {
                // 11. 그외는 평일이므로 검정색
                $style = "black";
            }

            // 12. 오늘 날짜면 굵은 글씨
            if ($year == $thisyear && $month == $thismonth && $day == date("j")) {
                // 13. 날짜 출력
                echo '<font class='.$style.'>';
                echo $day;
                echo '</font>';
            } else {
                echo '<font class='.$style.'>';
                echo $day;
                echo '</font>';
            }
            // 14. 날짜 증가
            $day++;
        }
        echo '</td>';
    }
 ?>
  </tr>
  <?php } ?>
</table>

</body>
</html>