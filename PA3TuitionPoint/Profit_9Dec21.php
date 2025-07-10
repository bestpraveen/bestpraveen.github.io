<?php session_start();
if(empty($_SESSION['username'])){header("Location:loginAdmin.php?type=addfee"); exit;}
$u=$_SESSION['username'];
//echo "user= $u";
?>
<html>
<head>
    <title>PA3 Tuition Point: PROFIT</title>
    <link rel="stylesheet" href="AddStudent.css" />


<script language="javascript" type="text/javascript">
</script>
</head>



<body>

<h1>PA3 Tuition Point: PROFIT</h1>
<br>


<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);


include 'Config.php'; 
#searchClass, searchMonth, searchYear

$searchMonth=date("n");
$searchYear=date("Y");
$searchClass="All";

if (isset($_GET['searchClass'])) $searchClass = $_GET['searchClass'];
if (isset($_GET['searchMonth'])) $searchMonth = $_GET['searchMonth'];
if (isset($_GET['searchYear'])) $searchYear = $_GET['searchYear'];

#if (isset($_GET['FeePaidDate'])) $FeePaidDate = $_GET['FeePaidDate'];
#if (isset($_GET['Class'])) $Class = $_GET['Class'];


//$month = array(1 => "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

$month = array(1 => "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");

$year = array(2017 => "&ndash;Year&ndash;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;", "2018", "2019", "2020");

$yearArr=array ("2020", "2021", "2022", "2023", "2024");

?>



<table border="1" width="90%">
    <tr><th>SN.</th>
	<th>Month</th>
	<th>KG</th>
	<th>Class 1</th>
	<th>Class 2</th>
	<th>Class 3</th>
	<th>Class 4</th>
	<th>Class 5</th>
	<th>Class 6</th>
	<th>Class 7 (10 Student)</th>
	<th>Class 8</th>
	<th>Class 9</th>
	<th>Class 10</th>
	<th>Class 11</th>
	<th>Class 12</th>
	<th>Total</th>
	<th>Month</th>
	</tr>



<?php

$start = $month = strtotime('2021-01-01');
$end = strtotime('2021-12-31');

//$end =strtotime(date("YY-MM-DD"));

//echo "<br>start $start  end=$end";

//SN	Month	KG	Class 1-5	Class 6	Class 7	Class 8	Class 9	Class 10	Class 11	Class 12	Total


$FeeTotGrand0=0;  $FeeTotGrand1=0;  $FeeTotGrand2=0; $FeeTotGrand3=0; $FeeTotGrand4=0; $FeeTotGrand5=0;
$FeeTotGrand6=0;  $FeeTotGrand7=0;  $FeeTotGrand8=0; $FeeTotGrand9=0; $FeeTotGrand10=0; $FeeTotGrand11=0;
$FeeTotGrand12=0; $FeeTotGrand=0;


while($month < $end)
{
   $ii++;
   if($ii%2==0)
	 {
	  $bg= "#FFFFFF";
	 }
	 else
	 {
	   $bg= "#FFEBCD";
	 }
     //echo "<br>". date('F Y', $month), PHP_EOL;

	 $y=date('Y', $month);
	 $m=date('n', $month);
	 $month1=date('M-y', $month);

//SELECT SUM(FeesPaid) FROM `StFees` WHERE Class='8' AND  YEAR(Date)='2021' AND MONTH(Date)='08'
		$sn++;
		echo "<tr  bgcolor=\"$bg\"><td>$sn</td>";
		echo "<td><b>$month1</b></td>";
$FeeTot=0;
	  for ($c=0; $c<=12; $c++)
	  {
		$sqlFe="SELECT SUM(FeesPaid) FROM `StFees` WHERE Class='$c' AND  YEAR(Date)='$y' AND MONTH(Date)='$m'";

		//echo "<br>sqlFe= $sqlFe";     
		$resultFee = $conn->query($sqlFe);
		$rowFee    = $resultFee->fetch_row();
		$Fee  = $rowFee[0];
		$FeeTot=$FeeTot+$Fee;

		//echo "<br>$c Fee= $Fee";
		echo "<td>".number_format($Fee, 0, '.', ',')."</td>";

		if ($c==0) $FeeTotGrand0=$FeeTotGrand0+$Fee;
		if ($c==1) $FeeTotGrand1=$FeeTotGrand1+$Fee;
		if ($c==2) $FeeTotGrand2=$FeeTotGrand2+$Fee;
		if ($c==3) $FeeTotGrand3=$FeeTotGrand3+$Fee;
		if ($c==4) $FeeTotGrand4=$FeeTotGrand4+$Fee;
		if ($c==5) $FeeTotGrand5=$FeeTotGrand5+$Fee;
		if ($c==6) $FeeTotGrand6=$FeeTotGrand6+$Fee;
		if ($c==7) $FeeTotGrand7=$FeeTotGrand7+$Fee;
		if ($c==8) $FeeTotGrand8=$FeeTotGrand8+$Fee;
		if ($c==9) $FeeTotGrand9=$FeeTotGrand9+$Fee;
		if ($c==10) $FeeTotGrand10=$FeeTotGrand10+$Fee;
		if ($c==11) $FeeTotGrand11=$FeeTotGrand11+$Fee;
		if ($c==12) $FeeTotGrand12=$FeeTotGrand12+$Fee;




	  }
	  $FeeTotGrand=$FeeTotGrand+$FeeTot;
	  $FeeTot=number_format($FeeTot, 0, '.', ',');

	  echo "<td style='text-align:center;font-size:21px;'><b>$FeeTot</b></td>";
	  echo "<td><b>$month1</b></td>";
	echo "</tr>";

	  

     $month = strtotime("+1 month", $month);




}

$FeeTotGrand=number_format($FeeTotGrand, 0, '.', ',');

echo "<tr style='text-align:center;font-size:21px;background:#81A352; color:white;'>";
echo "<th></th><th>Total</th>";
echo "<th>".number_format($FeeTotGrand0, 0, '.', ',')."</th>";
echo "<th>".number_format($FeeTotGrand1, 0, '.', ',')."</th>";
echo "<th>".number_format($FeeTotGrand2, 0, '.', ',')."</th>";
echo "<th>".number_format($FeeTotGrand3, 0, '.', ',')."</th>";
echo "<th>".number_format($FeeTotGrand4, 0, '.', ',')."</th>";
echo "<th>".number_format($FeeTotGrand5, 0, '.', ',')."</th>";
echo "<th>".number_format($FeeTotGrand6, 0, '.', ',')."</th>";
echo "<th>".number_format($FeeTotGrand7, 0, '.', ',')."</th>";
echo "<th>".number_format($FeeTotGrand8, 0, '.', ',')."</th>";
echo "<th>".number_format($FeeTotGrand9, 0, '.', ',')."</th>";
echo "<th>".number_format($FeeTotGrand10, 0, '.', ',')."</th>";
echo "<th>".number_format($FeeTotGrand11, 0, '.', ',')."</th>";
echo "<th>".number_format($FeeTotGrand12, 0, '.', ',')."</th>";
echo "<th>$FeeTotGrand</th>";
echo "<th>Grand Frofit</th>";

echo "</tr>";

?>


</table>




<br><br><br>

		&nbsp;&nbsp;&nbsp;<button type="submit" class="btn" style="color:blue;"><a  style="text-decoration:none;" href="https://pa3tuitionpoint.000webhostapp.com">Home</a></button>


<br><br>

</body>


</html>