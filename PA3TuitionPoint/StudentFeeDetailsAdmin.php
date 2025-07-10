<?php session_start();
if(empty($_SESSION['username'])){header("Location:loginAdmin.php?type=DipsStudentAdmin"); exit;}
$u=$_SESSION['username'];
//echo "user= $u";
?>
<html>
<head>
    <link rel="stylesheet" href="tableStyling.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    
	<title>Student Fee Details</title>
<script language="javascript" type="text/javascript">

function SearchAdvance(searchName, Class, StartDate)
	  {		
// window.location.href = 'main.php' + '?SearchAdvance=Yes' + '&searchJournalName=' + searchJournalName + '&searchColHead=' + searchColHead + '&searchColHeadValue=' + searchColHeadValue;

window.location.href = 'StudentFeeDetailsAdmin.php' + '?SearchAdvance=Yes' + '&searchName=' + searchName + '&Class=' + Class + '&StartDate=' + StartDate;
      }
	  
	
</script>

</head>

<body>
<?php
include 'Config.php'; 
?>

<?php
if (isset($_GET['ID'])){ $ID = $_GET['ID'];}
if (isset($_GET['searchName'])){ $searchName = $_GET['searchName'];}
if (isset($_GET['Class'])){ $Class = $_GET['Class'];}
if (isset($_GET['StartDate'])){ $StartDate = $_GET['StartDate'];}

?>


<div class="container">

	<table width="99%" border="1">	
	<td>
            <label for="class" class="YearDiv" style="padding: 10px;
        margin: 10px;font-weight: bold;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin: 1rem;
        font-size: 1.6rem;
        margin-bottom: 2rem;">Name: <?php echo "$searchName";?> </label> 

</td>

<td>
            <label for="Year" class="YearDiv" style="padding: 10px;
        margin: 10px;font-weight: bold;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin: 1rem;
        font-size: 1.6rem;
        margin-bottom: 2rem;"><?php echo "Class: $Class";?> </label> 

</td>
<td>
            <label for="Year" class="YearDiv" style="padding: 10px;
        margin: 10px;font-weight: bold;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin: 1rem;
        font-size: 1.6rem;
        margin-bottom: 2rem;">
		<?php 
		$StDate=date('d M Y', strtotime($StartDate));

		$StDate=str_replace (" ","&nbsp;",$StDate);

		echo "Start Date: $StDate";
		?> 
		</label> 

</td>

<td>
    &nbsp;&nbsp;&nbsp;<button type="submit" class="btn" style="color:blue;"><a  style="text-decoration:none;" href="https://pa3tuitionpoint.000webhostapp.com">Home</a></button>
    </td>

</table>










<!--

	<table border="1" width="98%" align="Center">
	<tr><th>SN.</th><th>Fee Due</th><th>Fee Paid</th><th>Summary</th></tr>

		<?php
		$sn=0;

//$StartDate
$today=date("Y-m-d");
//$searchYear1=$searchYear+1;
//$start = $month = strtotime("$searchYear-04-01");
$start = $month = strtotime("$StartDate");
//$end = strtotime("$searchYear1-3-31");
$end = strtotime("$today");


while($month < $end)
{
	$month1 = strtotime("+1 month", $month);
	$sn++;
	$m1=date('d M y', $month);
	$m2=date('d M y', $month1);

	$yy=date('Y', $month1);
	$mm=date('n', $month1);
	//$mm=date('n', $month);

	$sql2 = "SELECT Date, Summary FROM StFees WHERE ID='$ID' and FeeMonth='$mm'";
	$sql2 = "SELECT Date, Summary FROM StFees WHERE ID='$ID' and YEAR(Date)='$yy' and MONTH(Date)='$mm'";
	
	//echo "<br>ID=$ID, Class=$Class sql2= $sql2";
	$result2 = $conn->query($sql2);

	if ($result2) 
	{		
		$row2   = $result2->fetch_row();	//echo " RUNNN";
		$feeDate   = $row2[0];
		$Summary = $row2[1];		
	}
	else
	{	
		//echo "<br>eeeeeeeee". $conn->error;
		$feeDate   = "";
		$Summary = "";
	}


     echo "<tr><td>$sn</td><td>$m1 - $m2</td>";
	 
	if ($feeDate!="")
	{
	 $feeDate11=date('d M y', strtotime($feeDate));
	 echo "<td bgcolor='#bfff00'>$feeDate11</td>";
	 echo "<td bgcolor='#bfff00'>$Summary</td>";
	}
	else
 	{
   	 echo "<td bgcolor='Yellow'>Pending</td>";
	 echo "<td></td>";	 
	}

	echo "</tr>";

	 $month =$month1;
     
}


?>


       
    </table>
<br><h1>More Details</h1><br>
<table border="1" width="45%" align="Center">
	<tr><th>SN.</th><th>Fee Paid Date</th><th>Summary</th></tr>

		<?php
	$sn=0;
	$sn++;
	$sql2 = "SELECT Date, Summary FROM StFees WHERE ID='$ID' Order By Date";
	echo "<br>sql2= $sql2";
	$result1 = $conn->query($sql2);
	  if ($result1->num_rows >= 0) 
		{
            while ($row = $result1->fetch_assoc()) 
			{
				$mon=date('M', $month);
				$month = strtotime("+1 month", $month);
				$sn++;
                $feeDate = $row["Date"];
				$Summary = $row["Summary"];
				$feeDate11=date('d M y', strtotime($feeDate));
				echo "<tr><td>$sn</td><td>$feeDate11</td><td>$Summary</td></tr>";
			}
		}

?>
</table>

-->

</div>







<table border="1" width="100%">
<tr>
<td width="20%">

	<table border="1" width="100%" align="Center">
	<!-- <tr><th>SN.</th><th>Fee Due</th><th>Fee Paid</th><th>Summary</th></tr> -->

	<tr><th>SN.</th><th>Fee&nbsp;Due</th></tr>

		<?php
		$sn=0;

//$StartDate
$today=date("Y-m-d");
//$searchYear1=$searchYear+1;
//$start = $month = strtotime("$searchYear-04-01");
$start = $month = strtotime("$StartDate");
//$end = strtotime("$searchYear1-3-31");
$end = strtotime("$today");


while($month < $end)
{
	$month1 = strtotime("+1 month", $month);
	$sn++;
	$m1=date('d M y', $month);
	$m2=date('d M y', $month1);

	$yy=date('Y', $month1);
	$mm=date('n', $month1);
	//$mm=date('n', $month);

	$sql2 = "SELECT Date, Summary FROM StFees WHERE ID='$ID' and FeeMonth='$mm'";
	$sql2 = "SELECT Date, Summary FROM StFees WHERE ID='$ID' and YEAR(Date)='$yy' and MONTH(Date)='$mm'";
	
	//echo "<br>ID=$ID, Class=$Class sql2= $sql2";
	$result2 = $conn->query($sql2);

	if ($result2) 
	{		
		$row2   = $result2->fetch_row();	//echo " RUNNN";
		$feeDate   = $row2[0];
		$Summary = $row2[1];		
	}
	else
	{	
		//echo "<br>eeeeeeeee". $conn->error;
		$feeDate   = "";
		$Summary = "";
	}

     $m1=str_replace (" ","&nbsp;",$m1);
     $m2=str_replace (" ","&nbsp;",$m2);
     
	 if($sn%2==0)
	 {
		 $bg="Orange";
	 }
	 else
	{
	 $bg="#5F9EA0";
	 }
	 echo "<tr style='background-color: $bg'>";
	 echo "<td>$sn</td><td>$m1&nbsp;-&nbsp;$m2</td>";
	 
    /*
	if ($feeDate!="")
	{
	 $feeDate11=date('d M y', strtotime($feeDate));
	 echo "<td bgcolor='#bfff00'>$feeDate11</td>";
	 echo "<td bgcolor='#bfff00'>$Summary</td>";
	}
	else
 	{
   	 echo "<td bgcolor='Yellow'>Pending</td>";
	 echo "<td></td>";	 
	}
	*/

	echo "</tr>";

	 $month =$month1;
     
}


?>


       
    </table>



</td>

<td valign="top">

   <table border="1" width="100%" align="Center">
	<tr><th>SN.</th><th>Fee&nbsp;Paid&nbsp;Date</th><th>Fee&nbsp;Amount</th><th>Summary</th></tr>

	<?php
		$sn=0;
		//$sn++;
		$sql2 = "SELECT Date, FeesPaid, Summary FROM StFees WHERE ID='$ID' Order By Date";
		//echo "<br>sql2= $sql2";
		$result1 = $conn->query($sql2);
		  if ($result1->num_rows >= 0) 
		  {
            while ($row = $result1->fetch_assoc()) 
			{
				$mon=date('M', $month);
				$month = strtotime("+1 month", $month);
				$sn++;
                $feeDate = $row["Date"];
				$FeesPaid = $row["FeesPaid"];
				$Summary = $row["Summary"];
				$feeDate11=date('d M y', strtotime($feeDate));
				$feeDate11=str_replace (" ","&nbsp;",$feeDate11);
				$Summary=str_replace (" ","&nbsp;",$Summary);

				echo "<tr><td>$sn</td><td>$feeDate11</td><td>$FeesPaid</td><td>$Summary</td></tr>";
			}
		}
	?>
   </table>

</td>
</table>






</body>
</html>