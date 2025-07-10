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

<h1>PA3 Tuition Point: PROFIT 
		&nbsp;&nbsp;&nbsp;<button type="submit" class="btn" style="color:blue;"><a  style="text-decoration:none;" href="https://pa3tuitionpoint.000webhostapp.com">Home</a></button></h1>
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



<?php
$jsonArray = array();
$label = array();
$data = array();

$StTot0=0;  $StTot1=0;  $StTot2=0; $StTot3=0; $StTot4=0; $StTot5=0;
$StTot6=0;  $StTot7=0;  $StTot8=0; $StTot9=0; $StTot10=0; $StTot11=0;
$StTot12=0; $StTotGrand=0;

for ($a=0; $a<=12; $a++)
 {
	$sqlSt="SELECT COUNT(*) FROM StInfo WHERE Status='Active' AND ID!='Aditya_1' AND ID!='Aniket7_7' AND ID!='Aniket8_8' AND ID!='Aniket9_9' AND ID!='Aniket10_10' AND ID!='Aniket11_11' AND Class='$a'";
	//echo "<br>sqlSt= $sqlSt";     
	$resultSt = $conn->query($sqlSt);
	$rowSt    = $resultSt->fetch_row();
	$ST  = $rowSt[0];
	$StTot=$StTot+$ST;
	//echo "<br>$c Fee= $Fee";
	if ($a==0) $StTot0=$ST;
	if ($a==1) $StTot1=$ST;
	if ($a==2) $StTot2=$ST;
	if ($a==3) $StTot3=$ST;
	if ($a==4) $StTot4=$ST;
	if ($a==5) $StTot5=$ST;
	if ($a==6) $StTot6=$ST;
	if ($a==7) $StTot7=$ST;
	if ($a==8) $StTot8=$ST;
	if ($a==9) $StTot9=$ST;
	if ($a==10) $StTot10=$ST;
	if ($a==11) $StTot11=$ST;
	if ($a==12) $StTot12=$ST;
	$StTotGrand=$StTotGrand+$ST;
 }

?>



<table border="1" width="90%">
    <tr><th>SN.</th>
	<th>Month</th>
	<th>KG<br>(<?php echo $StTot0;?>&nbsp;Stud)</th>
	<th>Class 1<br>(<?php echo $StTot1;?>&nbsp;Stud)</th>
	<th>Class 2<br>(<?php echo $StTot2;?>&nbsp;Stud)</th>
	<th>Class 3<br>(<?php echo $StTot3;?>&nbsp;Stud)</th>
	<th>Class 4<br>(<?php echo $StTot4;?>&nbsp;Stud)</th>
	<th>Class 5<br>(<?php echo $StTot5;?>&nbsp;Stud)</th>
	<th>Class 6<br>(<?php echo $StTot6;?>&nbsp;Stud)</th>
	<th>Class 7<br>(<?php echo $StTot7;?>&nbsp;Stud)</th>
	<th>Class 8<br>(<?php echo $StTot8;?>&nbsp;Stud)</th>
	<th>Class 9<br>(<?php echo $StTot9;?>&nbsp;Stud)</th>
	<th>Class 10<br>(<?php echo $StTot10;?>&nbsp;Stud)</th>
	<th>Class 11<br>(<?php echo $StTot11;?>&nbsp;Stud)</th>
	<th>Class 12<br>(<?php echo $StTot12;?>&nbsp;Stud)</th>
	<th>Total<br>(<?php echo $StTotGrand;?>&nbsp;Stud)</th>
	<th>Month</th>
	</tr>



<?php

$start = $month = strtotime('2021-01-01');
$end = strtotime('2022-12-31');

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
	  
     	  $FeeTot4Graph=$FeeTot;
		//$FeeTot4Graph=$FeeTot/1000;
		//$FeeTot4Graph=round($FeeTot4Graph,1);

		$FeeTotGrand=$FeeTotGrand+$FeeTot;
	  $FeeTot=number_format($FeeTot, 0, '.', ',');

	  echo "<td style='text-align:center;font-size:21px;'><b>$FeeTot</b></td>";
	  echo "<td><b>$month1</b></td>";
	echo "</tr>";
		
		
		
		$ChartColor="rgba(0, 120, 0, 3)"; $ChartLebel="Profit Graph"; //green
		$jsonArrayItem = array();
		$jsonArrayItem['label'] = $month1;
		$jsonArrayItem['value'] = $FeeTot4Graph;
		array_push($jsonArray, $jsonArrayItem);
		array_push($label, $month1);
		array_push($data, $FeeTot4Graph);

	  

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




<br><hr><br>




<?php

//foreach ($jsonArray as $key => $value) echo "<br>jsonArray $key === $value";
//foreach ($label as $key => $value) echo "<br>label $key === $value";
//foreach ($data as $key => $value) echo "<br>data $key === $value";


//Start CHART GRAPH

//$chartConfig = json_encode($jsonArray);



//foreach ($jsonArray as $key => $value) echo "<br>jsonArray $key === $value";
//foreach ($label as $key => $value) echo "<br>label $key === $value";
//foreach ($data as $key => $value) echo "<br>data $key === $value";


/*
$chartConfigArr1 = array(
  'type' => 'bar',
  'data' => array(
    'labels' => array(P2012, 2013, 2014, 2015, 2016),
    'datasets' => array(
      array(
        'label' => 'Users',
        'data' => array(120, 60, 50, 999, 120),
      )
    )
  )
);
*/

//$chartConfigArr = array('type' => 'bar','data' => array('labels' => $label,'datasets' => array(array('label' => 'Monthly bug graph (PXE Development)', 'data' => $data,))));





$chartConfigArr = array(
  'type' => 'bar',
  'data' => array(
    'labels' => $label,
    'datasets' => array(
      array(
        'label' => $ChartLebel,
        'data' => $data,		
		 'backgroundColor' => $ChartColor,
		'borderColor' => 'rgb(54, 162, 235)',
      ),
//	array(        'label' => 'Close bug',        'data' => $dataclose,				 'backgroundColor' => 'rgba(0, 120, 0, 3)','borderColor' => 'rgb(54, 162, 235)',      )
    )
  ),

	'options' => array(
    'plugins' => array(
      'datalabels' => array(
        'anchor' => 'center',
        'align' => 'top',
        'color' => '#fff',
        'font' => array(
          'weight' => 'bold',
        ),
      ),
    ),
  ),



);






$chartConfig = json_encode($chartConfigArr);
//echo $chartConfig;

//$chartUrl = 'https://quickchart.io/chart?w=330&h=200&c=' . urlencode($chartConfig);

$chartUrl = 'https://quickchart.io/chart?w=800&h=300&c=' . urlencode($chartConfig);

echo " <p id='Chart'><img src=\"$chartUrl\"></p>";

?>


<br><br><hr><br>
</body>


</html>