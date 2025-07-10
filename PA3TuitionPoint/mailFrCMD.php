<?php include 'mailFrCMD_QA_Release.php';?>

<?php



$con = mysqli_connect('192.168.192.203', 'bugreport', 'bug@123', 'bugzilla');
	if (!$con)
	{
		echo (" <br>Prob in Connection" . mysqli_error());
		echo (" \n\n <br>" . mysqli_connect_error());
		exit();
	}
	else
	{
	//echo "Connect ";
	}








//Start ############## ***************************** Monthly Report

//OPEN BUG Monthly
$start = $month = strtotime('2020-01-01');
$end = strtotime('2020-10-01');
$end=date("Y-m-d"); //$end="2020-10-14";
$begin=date('Y-m-d', strtotime($end. ' - 5 month'));
//echo "<br>\n begin=$begin, end=$end <br>";
$month=strtotime($begin);
$end = strtotime($end);

$jsonArray = array();
$label = array();
$data = array();
$dataClose = array();

while($month <= $end)
{
	 $m1=date('M y', $month);
	 $y=date('Y', $month);
	 $m=date('m', $month);
	 //$m=date('Y-mm-dd', $month); //echo "<br>\n $y $m $m1";
     $month = strtotime("+1 month", $month);
	 $query = "SELECT COUNT(*) from bugs where YEAR(date(creation_ts))=$y AND MONTH(date(creation_ts))=$m AND (product_id='14' OR product_id='46' OR product_id='64' OR product_id='84' OR product_id='88' OR product_id='92' OR product_id='94')";

	 $dd="$m1";	
//	 echo "\n<br> dd=$dd, query=$query";
	$result=mysqli_query($con, $query);
	$row = mysqli_fetch_array($result);
	$total = $row[0];

	 $jsonArrayItem = array();
	 $jsonArrayItem['label'] = $dd;
	 $jsonArrayItem['value'] = $total;
	 array_push($jsonArray, $jsonArrayItem);
	 array_push($label, $dd);
	 array_push($data, $total);
}

$chartConfig = json_encode($jsonArray);





//CLOSE BUG Monthly

$start = $month = strtotime('2020-01-01');
$end = strtotime('2020-10-01');
$end=date("Y-m-d"); //$end="2020-10-14";
$begin=date('Y-m-d', strtotime($end. ' - 5 month'));
//echo "<br>\n begin=$begin, end=$end <br>";
$month=strtotime($begin);
$end = strtotime($end);

$jsonArrayclose = array();
$labelclose = array();
$dataclose = array();

while($month <= $end)
{
	 $m1=date('M y', $month);
	 $y=date('Y', $month);
	 $m=date('m', $month);
	 //$m=date('Y-mm-dd', $month); //echo "<br>\n $y $m $m1";
     $month = strtotime("+1 month", $month);
	 $queryClose = "SELECT COUNT(*) from bugs where bug_status='Closed' and YEAR(date(delta_ts))=$y AND MONTH(date(delta_ts))=$m AND (product_id='14' OR product_id='46' OR product_id='64' OR product_id='84' OR product_id='88' OR product_id='92' OR product_id='94')";

	 $dd="$m1";		 
//	 echo "\n<br> dd=$dd, query=$queryClose";

	$result=mysqli_query($con, $queryClose);
	$row = mysqli_fetch_array($result);
	$total = $row[0];

	 $jsonArrayItem = array();
	 $jsonArrayItem['label'] = $dd;
	 $jsonArrayItem['value'] = $total;
	 array_push($jsonArrayclose, $jsonArrayItem);

	 array_push($labelclose, $dd);
	 array_push($dataclose, $total);
}

$chartConfigclose = json_encode($jsonArrayclose);



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
        'label' => 'Open bug',
        'data' => $data,		
		 'backgroundColor' => 'rgba(150, 0, 0, 2)',
		'borderColor' => 'rgb(54, 162, 235)',
      ),
	array(
        'label' => 'Close bug',
        'data' => $dataclose,		
		 'backgroundColor' => 'rgba(0, 120, 0, 3)',
		'borderColor' => 'rgb(54, 162, 235)',
      )
    )
  ),

	'options' => array(
    'plugins' => array(
      'datalabels' => array(
        'anchor' => 'center',
        'align' => 'center',
        'color' => '#fff',
        'font' => array(
          'weight' => 'bold',
        ),
      ),
    ),
  ),



);




/*
type:'bar',
	data:
	{
	labels:['January','February', 'March','April', 'May'], datasets:[{label:'Dogs',data:[50,60,70,180,190]},{label:'Cats',data:[100,200,300,400,500]}]
	}

*/

//<img src="https://quickchart.io/chart?c={type:'bar',data:{labels:['January','February', 'March','April', 'May'], datasets:[{label:'Dogs',data:[50,60,70,180,190]},{label:'Cats',data:[100,200,300,400,500]}]}}">




//$chartConfigArr = array('type' => 'bar','data' => array('labels' => $label,'datasets' => array(array('label' => 'Monthly', 'data' => $data,'label' => 'Closed', 'data' => $data))));

/*
type:'bar',data:
	{
	labels:['January','February', 'March','April', 'May'], datasets:[{label:'Dogs',data:[50,60,70,180,190]},
		{
		label:'Cats',data:[100,200,300,400,500]
			}]
		}
*/


//<img src="https://quickchart.io/chart?c={type:'bar',data:{labels:['January','February', 'March','April', 'May'], datasets:[{label:'Dogs',data:[50,60,70,180,190]},{label:'Cats',data:[100,200,300,400,500]}]}}">

$chartConfig = json_encode($chartConfigArr);
//echo $chartConfig;

$chartUrl = 'https://quickchart.io/chart?w=330&h=200&c=' . urlencode($chartConfig);
echo " <p><img src=\"$chartUrl\"></p>";
//END ############## ***************************** Monthly Report












/*
//Start ############## ***************************** Weekly Report
$end=date("Y-m-d");
//$end="2020-10-14";
$begin=date('Y-m-d', strtotime($end. ' - 30 days'));
$d3 = date('D', strtotime($begin));
//echo "<br>\n begin=$begin, d3=$d3 <br>";
if ($d3=="Tue") $begin=date('Y-m-d', strtotime($end. ' - 31 days'));
if ($d3=="Wed") $begin=date('Y-m-d', strtotime($end. ' - 32 days'));
if ($d3=="Thu") $begin=date('Y-m-d', strtotime($end. ' - 33 days'));
if ($d3=="Fri") $begin=date('Y-m-d', strtotime($end. ' - 34 days'));
if ($d3=="Sat") $begin=date('Y-m-d', strtotime($end. ' - 35 days'));
if ($d3=="Sun") $begin=date('Y-m-d', strtotime($end. ' - 36 days'));
$d3 = date('D', strtotime($begin));
//echo "<br>\n begin=$begin, d3=$d3 <br>";

$jsonArray = array();
$label = array();
$data = array();

for($i = $begin; $i <= $end;)
{
	$d=$i;
	$d1=$d; //->modify('+1 day')	//date_add($d1,"2 days");
	$d1=date('Y-m-d', strtotime($d1. ' + 7 days'));
	$i=$d1; //	$dd=date("d",$d);
	//$dd = date('d', strtotime($d)) . "-". date('M', strtotime($d));
	$dd = date('d', strtotime($d)) . "-". date('M', strtotime($d))." To ". date('d', strtotime($d1)) . "-". date('M', strtotime($d1));
	//echo "\n<br> $d   $dd";
	$query = "SELECT COUNT(*) from bugs where (creation_ts >='$d' and creation_ts <='$d1') AND (product_id='14' OR product_id='46' OR product_id='64' OR product_id='84' OR product_id='88' OR product_id='92' OR product_id='94')";
	$result=mysqli_query($con, $query);
	$row = mysqli_fetch_array($result);
	$total = $row[0];
	 $jsonArrayItem = array();
	 $jsonArrayItem['label'] = $dd;
	 $jsonArrayItem['value'] = $total;
	 array_push($jsonArray, $jsonArrayItem);

	 array_push($label, $dd);
	 array_push($data, $total);
}
$chartConfig = json_encode($jsonArray);

$chartConfigArr = array('type' => 'bar','data' => array('labels' => $label,'datasets' => array(array('label' => 'No of Bug', 'data' => $data,))));

$chartConfig = json_encode($chartConfigArr);
//echo $chartConfig;

$chartUrl = 'https://quickchart.io/chart?w=500&h=200&c=' . urlencode($chartConfig);
//echo " <p><img src=\"$chartUrl\"></p>";

//END ############## ***************************** Weekly Report
*/







$today = date("F j, Y, g:i a");   // October 30, 2019, 10:42 pm
//$today = date("D M j G:i:s T Y"); // Wed Oct 30 22:42:18 UTC 2019
//$today = date("Y-m-d H:i:s");     // 2019-10-30 22:42:18(MySQL DATETIME format)
$day1 = date("j-M-Y");  
$today = date("j-M-Y, g:i A");   // October 30, 2019, 10:42 pm
//echo $today;echo "\n\n\n";

//$myfile = fopen("ReportOutput.html", "r") or die("Unable to open file!"); 	//echo fread($myfile,filesize("ReportOutput.html"));
//$output=fgets($myfile);
//fclose($myfile);
$output=file_get_contents("ReportOutput.html");
//$output="<h3><a href=\"https://mmkservlnx.aptaracorp.com/extra/BugzillaReport\">Click here to Current Report</a></h3><br>".$output;
//$output=str_replace("Priority Bugs"," Click here for &nbsp; <a href=\"https://mmkservlnx.aptaracorp.com/extra/BugzillaReport\">Current Report</a> &nbsp;&nbsp;<a href=\"Suggestion.php\" target=\"_blank\">Suggestion</a>",$output);

$output=str_replace("Priority Bugs","&nbsp;<a href=\"https://mmkservlnx.aptaracorp.com/extra/BugzillaReport\">Current Report</a>",$output);

$output=str_replace("target='_blank' ","",$output);
$output=str_replace("<td></td>","<td>&nbsp;</td>",$output);
//$output=$output."<br><h2>Thanks\n\r <br>Bugzilla</h2>\n\n</body>\n</html>";
//$output=$output."<br><img src=\"$chartUrl\">"."<br><h2>Thanks\n\r <br>Bugzilla</h2>\n\n</body>\n</html>";

$output=$output."<br><h2>Thanks\n\r <br>Bugzilla</h2>\n\n</body>\n</html>";
$output=str_replace("<br title=graph>","<br><img src=\"$chartUrl\">",$output);

//$output="<img src=\"$chartUrl\">".$output;

//echo "$output <br><br><br><br>";

$myfile1 = fopen("ReportOutputFinal.html", "w") or die("Unable to open file!");
fwrite($myfile1, $output);
fclose($myfile1);

$to = "pxeconfig@aptaracorp.com, pxedev@aptaracorp.com, pxeqa@aptaracorp.com"; //Uncomment for LIVE
//$to = "praveen.chauhan@aptaracorp.com"; //Comment for Live
//$to = "gaurav.trikha@aptaracorp.com"; //Comment for Live

$subject = "Bugzilla Report: $day1";
$txt = "Hello world!";
$txt=$output;

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
//$headersFR= 'From: Praveen Chauhan1<praveen.chauhan@aptaracorp.com>' . "\r\n";
//$headersFR= 'From: praveen.chauhan@aptaracorp.com' . "\r\n";
$headersFR= 'From: BugZilla Report<praveen.chauhan@aptaracorp.com>' . "\r\n";

$headersCC= 'Cc: mkhalid@aptaracorp.com' . "\r\n"; // uncomment for Live

//$headersCC= 'Cc: praveen.chauhan@aptaracorp.com, Narendra.Kumar@aptaracorp.com' . "\r\n"; // comment for Live
//$headersCC= 'Cc: praveen.chauhan333@aptaracorp.com' . "\r\n"; // comment For Live

$headersBCC= 'BCc: praveen.chauhan@aptaracorp.com, gaurav.trikha@aptaracorp.com, Dhirender.Negi@aptaracorp.com' . "\r\n"; // comment For Live
$headers=$headers.$headersFR.$headersCC.$headersBCC;

$retval = mail($to,$subject,$txt,$headers);         
	 if( $retval == true ) 
	 {
		echo "<br><br><br>$headersFR <br> Email To $to <br>$headersCC <br>$headersBCC <br><br>Email Message sent successfully...";
		echo "<br><br><h1><a href=\"https://mmkservlnx.aptaracorp.com/extra/BugzillaReport/\">Home Page</a></h1>";
	 }
	 else
	 {
		echo "Email Message could not be sent...<br>";
		$errorMessage = error_get_last()['message'];
		echo $errorMessage;
	 }
?>



