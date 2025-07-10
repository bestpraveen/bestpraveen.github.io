<?php session_start();
if(empty($_SESSION['username'])){header("Location:loginAdmin.php?type=addfee"); exit;}
$u=$_SESSION['username'];
//echo "user= $u";
?>
<html>
<head>
    <title>PA3 Tuition Point: Add Fee</title>
    <link rel="stylesheet" href="AddStudent.css" />


<script language="javascript" type="text/javascript">

  function ChangeNxt(Fee_Id) 
  {
    var Fee_Id = Fee_Id; // document.getElementById('in2');
    Fee_Id.value = "Thanks";
  }

	function SearchAdvance(searchClass, searchMonth, searchYear, searchStatus, searchFee)
	  {		
		window.location.href ='AddFee.php' + '?SearchAdvance=Yes' + '&searchClass=' + searchClass + '&searchMonth=' + searchMonth + '&searchYear=' + searchYear + '&searchStatus='  + searchStatus + '&searchFee='  + searchFee;
      }

//'$ID', '$searchFeePaidDate', '$searchSubject','$searchSummary','$searchTotMarks', this.value
    function InsertData(Fee_Id, ID, Class, searchFeePaidDate, FeesPaidIns, searchFeeMonth, searchSummary)
	{
		var Fee_IdIns=Fee_Id;
		var IDIns=ID;
		var Class=Class;

		var searchFeePaidDateIns=searchFeePaidDate;
		var FeesPaidIns=FeesPaidIns;
		var searchFeeMonth=searchFeeMonth;
		var searchSummaryIns=searchSummary;
		
		//alert (typeof(searchTotMarksIns));
		//alert (Percentage);
		

		//alert (IDIns + searchFeePaidDateIns + searchSubjectIns + searchSummaryIns + searchTotMarksIns + // MarksObtainedIns);


		xmlHttp=GetXmlHttpObject();
		if (xmlHttp==null)
		 {
		 alert ("Browser does not support HTTP Request");
		 return;
		 }

		var url="InsertFeeInDB.php";
		url="InsertFeeInDB.php?Fee_IdIns="+Fee_Id+"&IDIns="+IDIns+"&Class="+Class+"&searchFeePaidDateIns="+searchFeePaidDateIns+"&FeesPaidIns="+FeesPaidIns+"&searchFeeMonth="+searchFeeMonth+"&searchSummaryIns="+searchSummaryIns;

		alert (url);

		exit;

		

		url=url+"&sid="+Math.random();
	 	xmlHttp.onreadystatechange=stateChanged;
		var r=xmlHttp.open("GET",url,true);
		xmlHttp.send(null);


	}







	function stateChanged() 
	{ 
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	 { 
	 document.getElementById("RowCol").innerHTML=xmlHttp.responseText;
	 } 
	}

	function GetXmlHttpObject()
	{
	var xmlHttp=null;
	try
	 {
	 // Firefox, Opera 8.0+, Safari
	 xmlHttp=new XMLHttpRequest();
	 }
	catch (e)
	 {
	 //Internet Explorer
	 try
	  {
	  xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
	  }
	 catch (e)
	  {
	  xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	 }
	return xmlHttp;
	}













$(document).ready(function() {
    var table = $('#example').DataTable( {
        scrollY:        "300px",
        scrollX:        true,
        scrollCollapse: true,
        paging:         false,
        fixedColumns:   {
            leftColumns: 1,
            rightColumns: 1
        }
    } );
} );


    </script>
</head>



<body>

<h1>Add Fee Form</h1>



<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);


include 'Config.php'; 
#searchClass, searchMonth, searchYear

$searchMonth=date("n");
$searchYear=date("Y");
$searchClass="All";
$searchStatus="Active";
$searchFee="UnPaid";

if (isset($_GET['searchClass'])) $searchClass = $_GET['searchClass'];
if (isset($_GET['searchMonth'])) $searchMonth = $_GET['searchMonth'];
if (isset($_GET['searchYear'])) $searchYear = $_GET['searchYear'];
if (isset($_GET['searchStatus'])) $searchStatus = $_GET['searchStatus'];
if (isset($_GET['searchFee'])) $searchFee = $_GET['searchFee'];


#if (isset($_GET['FeePaidDate'])) $FeePaidDate = $_GET['FeePaidDate'];
#if (isset($_GET['Class'])) $Class = $_GET['Class'];


//$month = array(1 => "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

$month = array(1 => "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");

$year = array(2017 => "&ndash;Year&ndash;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;", "2018", "2019", "2020");

$yearArr=array ("2020", "2021", "2022", "2023", "2024");

?>



<table border="0" width="90%">
<form action="AddFee.php" method="get" id="formControler">
    <tr>
	<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
        <td>
             <label for="Class" class="classDiv">Select Class: </label>
        </td>
        <td>
            <select name="searchClass" id="Class" class="classDiv"  onChange="SearchAdvance(this.value, '<?php echo $searchMonth; ?>','<?php echo $searchYear; ?>','<?php echo $searchStatus; ?>','<?php echo $searchFee;?>');" required>>

			<option value="All" selected>&ndash;All Class&ndash;</option>

				<?php
				
				for ($i=0; $i<=12; $i++)
				{
					if ($i==0){$c="KG";}
					else {$c=$i;}

					if ($i == 0) echo "<optgroup label=\"KG\">";
					if ($i == 1) echo "</optgroup> <optgroup label=\"Primary\">";
					if ($i == 6) echo "</optgroup> <optgroup label=\"Secondary\">";
					if ($i==$searchClass)
					{
					 echo "<option value=\"$i\" Selected>Class:$c</option>";
					}
					else
					{
					echo "<option value=\"$i\">Class:$c</option>";
					}								
				}
				echo "</optgroup>";
				?>
            </select>
        </td>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
        <td>
            <label for="FeePaidDate" class="startDateDiv">Fee Month-Year: </label>
        
            <select style="max-width:90%;" width="15" name="searchMonth" class="styledselect" onChange="SearchAdvance('<?php echo $searchClass; ?>', this.value,'<?php echo $searchYear; ?>','<?php echo $searchStatus; ?>','<?php echo $searchFee;?>');" required>
				<!--<option value="" selected>&ndash;Select Month&ndash;</option>-->
						<?php
						foreach ($month as $key => $val) {
							if ($key == $searchMonth) {
								echo "<option value=$key selected>&nbsp;&nbsp;&nbsp;$val&nbsp;&nbsp;&nbsp;</option>";
							} else {
								echo "<option value=$key>&nbsp;&nbsp;&nbsp;$val&nbsp;&nbsp;&nbsp;</option>";
							}
						}
						?>
				</select>
        &nbsp;
            <select name="SelectedYear" id="Go" onChange="SearchAdvance('<?php echo $searchClass; ?>','<?php echo $searchMonth; ?>', this.value,'<?php echo $searchStatus; ?>','<?php echo $searchFee;?>');" required>
					  <!--<option value="" selected>&nbsp;&ndash;&nbsp;Select Year&nbsp;&ndash;&nbsp;</option>-->
					     <?php 
						    foreach($yearArr as $YearVal)
							{
						      if (($searchYear == $YearVal)) {
								    echo "<option value=$YearVal selected>$YearVal</option>"; }
							   else {
								echo "<option value='$YearVal'>$YearVal</option>"; }
						   }
						?>
				  </select>  
        </td>


<td><label> Status: </label>

			
            <select name="searchStatus" id="Status" class="StatusDiv"  onChange="SearchAdvance('<?php echo $searchClass; ?>','<?php echo $searchMonth; ?>', '<?php echo $searchYear; ?>', this.value, '<?php echo $searchFee;?>');" required>
             
			 <?php
			 if ($searchStatus=="All")
			 {
			   echo "<option value=\"All\" Selected>All Statuss</option>";
			 }
			 else
			 {
			   echo "<option value=\"All\">All Statuss</option>";
			 }

			 if ($searchStatus=="Active")
			 {
			   echo "<option value=\"Active\" Selected>Active</option>";
			 }
			 else
			 {
			   echo "<option value=\"Active\">Active</option>";
			 }


			if ($searchStatus=="InActive")
			 {
			   echo "<option value=\"InActive\" Selected>InActive</option>";
			 }
			 else
			 {
			   echo "<option value=\"InActive\">InActive</option>";
			 }

			 if ($searchStatus=="NextClass")
			 {
			   echo "<option value=\"NextClass\" Selected>NextClass</option>";
			 }
			 else
			 {
			   echo "<option value=\"NextClass\">NextClass</option>";
			 }

			 ?>
			 
             

            </select>        






		</td>

		<td><label> Fees: </label>
            <select name="searchFee" id="Status" class="StatusDiv"  onChange="SearchAdvance('<?php echo $searchClass; ?>','<?php echo $searchMonth; ?>', '<?php echo $searchYear; ?>', '<?php echo $searchStatus; ?>', this.value);" required>
			 <?php
			 if ($searchFee=="All")
			 {
			   echo "<option value=\"All\" Selected>All </option>";
			 }
			 else
			 {
			   echo "<option value=\"All\">All </option>";
			 }

			 if ($searchFee=="Paid")
			 {
			   echo "<option value=\"Paid\" Selected>Paid</option>";
			 }
			 else
			 {
			   echo "<option value=\"Paid\">Paid</option>";
			 }


			if ($searchFee=="UnPaid")
			 {
			   echo "<option value=\"UnPaid\" Selected>UnPaid</option>";
			 }
			 else
			 {
			   echo "<option value=\"UnPaid\">UnPaid</option>";
			 }
			 ?>
            </select>
		</td>




		<!--<td>
            <input
            type="date"
            name="FeePaidDate"
            id="FeePaidDate"
            placeholder="Test Date"
            required
            class="startDateDiv"
			value="<?php echo $FeePaidDate;?>"			
            />
        </td>-->


		<td>
           &nbsp;&nbsp;&nbsp;<a target="_Blank" href="EditStudent.php?SearchAdvance=Yes&searchClass=15&searchStatus=Active" style="color:green">Edit Student Info</a>
        </td>

		<td>

				&nbsp;&nbsp;&nbsp;<button type="submit" class="btn" style="color:blue;"><a target="_Blank" style="text-decoration:none;" href="https://pa3tuitionpoint.000webhostapp.com/Profit.php"> PROFIT </a></button>



		&nbsp;&nbsp;&nbsp;<button type="submit" class="btn" style="color:blue;"><a  style="text-decoration:none;" href="https://pa3tuitionpoint.000webhostapp.com">Home</a></button>
           &nbsp;&nbsp;&nbsp;<a href="logout.php" style="color:red">Logout</a>
        </td>


    </tr>


        </form>
</table>










<?php
//if (isset($_GET['searchClass']))
if(2==2)
{
//echo "<br>searchClass= $searchClass, searchFee=$searchFee<br>";

//#searchClass, searchMonth, searchYear

   //$searchClass = $_GET['searchClass'];
   if (isset($_GET['searchClass'])) $searchClass = $_GET['searchClass'];

   //$searchMonth = $_GET['searchMonth'];
   //$searchYear = $_GET['searchYear'];
   //$searchStatus = $_GET['searchStatus'];
   //$searchFee = $_GET['searchFee'];

   //$searchTotMarks = $_GET['TotMarks'];


if ($searchMonth==1 OR $searchMonth==3 OR $searchMonth==5 OR $searchMonth==7 OR $searchMonth==8 OR $searchMonth==10 OR $searchMonth==12)
{
	$endday = 31;
}
else
{
	$endday = 30;
}
	
	//echo "<h1>Class=$searchClass, searchMonth=$searchMonth, endDay=$endday,  searchYear=$searchYear</h1>";

	echo "<br><br>";

	echo "<table border=\"1\" width=\"90%\">";
    //echo "<tr><th width='5%'>SN.</th> <th width='20%'>Fee ID</th><th width='5%'>&nbsp;Class&nbsp;</th><th width='10%'>Start Date</th><th width='15%'>Name</th><th width='15%'>Fee&nbsp;Paid&nbsp;Date&nbsp;</th><th width='5%'>MonthlyFee</th><th width='10%'>Paid Amount</th><th width='10%'>Summary</th><th width='5%'>Action</th></tr>";

	echo "<tr><th>SN.</th> <th>Fee ID</th><th>&nbsp;Class&nbsp;</th><th>Start&nbsp;Date</th><th>&nbsp;&nbsp;&nbsp;Name&nbsp;&nbsp;&nbsp;</th><th>&nbsp;Fee&nbsp;Paid&nbsp;Date&nbsp;&nbsp;</th><th title='Monthly Fee'>Monthly</th><th>Paid Amount</th><th>Summary</th><th>Action</th></tr>";


	if ($searchClass == "All")
	{
		$sql = "SELECT * FROM StInfo WHERE Status='$searchStatus' AND ID!='Aditya_1' AND ID!='Aniket7_7' AND ID!='Aniket8_8' AND ID!='Aniket9_9' AND ID!='Aniket10_10' AND ID!='Aniket11_11' AND StartDate<='$searchYear-$searchMonth-$endday' ORDER BY Class, Name";

	}
	else
		{
		$sql = "SELECT * FROM StInfo WHERE Status='$searchStatus' AND ID!='Aditya_1' AND ID!='Aniket7_7' AND ID!='Aniket8_8' AND ID!='Aniket9_9' AND ID!='Aniket10_10' AND ID!='Aniket11_11' AND Class='$searchClass' AND StartDate<='$searchYear-$searchMonth-$endday' ORDER BY Class, Name";
	}

	$sql=str_replace ("Status='All' AND", "", $sql);

	//echo "sql= $sql";


	 $sn=0;
	 $FeesPaidTot=0;
	 $result1 = $conn->query($sql);
	  if ($result1->num_rows >= 0) 
		{
            while ($row = $result1->fetch_assoc()) 
			{
				
                $ID = $row["ID"];
				$Class = $row["Class"];
				$StartDate = $row["StartDate"];
				$Name = $row["Name"];
				$StartDate1 = date("j M y", strtotime($StartDate));
				$searchYear1=date("y", strtotime($searchYear));
				
				 $searchYear1 = substr( $searchYear, -2);
				
				//echo "<br>searchYear= $searchYear and 1 =$searchYear1";
				
				$cDay=date("d");				
				//$Fee_Id=$ID."_$month[$searchMonth]"."_".$searchYear1;
				$Fee_Id=$ID."_$month[$searchMonth]"."_".$searchYear1;
				$MonthlyFee=$row["FeesPerMonth"];
				$MonthlyFeesTot=$MonthlyFeesTot+$MonthlyFee;

				$sqlFe="SELECT Date, FeesPaid, Summary FROM StFees WHERE Fee_Id='$Fee_Id'";

				if ($searchFee=="Paid333")
				{
					$sqlFe="SELECT Date, FeesPaid, Summary FROM StFees WHERE Fee_Id='$Fee_Id' AND FeesPaid!=''";
				}

				if ($searchFee=="UnPaid333")
				{
					$sqlFe="SELECT Date, FeesPaid, Summary FROM StFees WHERE Fee_Id='$Fee_Id' AND FeesPaid=''";
				}
				


                //echo "<br> sqlFe= $sqlFe";     

                $resultFee = $conn->query($sqlFe);

				$num_rows = $resultFee->num_rows;
				//echo "<BR>PPPPPPPPPPPP= $num_rows Rows\n";



		
                $rowFee    = $resultFee->fetch_row();
                $DatePaid  = $rowFee[0];
				$FeesPaid  = $rowFee[1];
				$Summary  = $rowFee[2];

				$DatePaid=date("j M y", strtotime($DatePaid));

				$FeesPaidTot=$FeesPaidTot+$FeesPaid;

			//InsertFeeInDB.php?selday=9&FeesPaid=9999999&searchSummary=aaaa99999&submit=Submit&Fee_Id=Abhay_9_Aug_2021&ID=Abhay_9&Class=9&Date=2021-8-&searchMonth=8
			//$sql3 = "INSERT INTO StFees (`Fee_Id`, `ID`, `Class`, `Date`, `FeesPaid`, `FeeMonth`, `Summary`) VALUES ('$Fee_Id', '$ID', '$Class', '$Date', '$FeesPaid', '$FeeMonth', '$Summary');";
				// and $searchFee=="UnPaid"

			if (($searchFee=="Paid" || $searchFee=="All") AND $FeesPaid!="")
			{
				$sn++;
				$FeesTot=$FeesTot+$MonthlyFee;
				echo "<tr>";
				echo "<td>$sn</td>";
				echo "<td>$Fee_Id </td>";
				echo "<td>$Class</td>";
				echo "<td>$StartDate1</td>";
				echo "<td><a href=\"https://pa3tuitionpoint.000webhostapp.com/StudentFeeDetails.php?&ID=$ID&searchName=$Name&Class=$Class&StartDate=$StartDate1\" target='_Blank' style='text-decoration:none;'>$Name</a></td>";
				echo "<td style='background:#81A352; color:white;'>$DatePaid</td>";
				echo "<td>$MonthlyFee</td>";
				echo "<td style='background:#81A352; color:white'><b>$FeesPaid</b></td>";
				echo "<td>$Summary</td>";
				echo "<td style='background:#81A352; color:white'>Paid</td>";
				echo "</tr>";
			}

			if (($searchFee=="UnPaid" || $searchFee=="All") && $FeesPaid=="")
			{
				$sn++;
				$FeesTot=$FeesTot+$MonthlyFee;
				echo "<form  target=\"_blank\" action=\"InsertFeeInDB.php\" method=\"get\" id=\"formControler\" style=\"text-align: center; font-size: 15px;\">";
				echo "<tr>";
				echo "<td>$sn</td>";
				echo "<td>$Fee_Id </td>";
				echo "<td>$Class</td>";
				echo "<td>$StartDate1</td>";
				echo "<td><a href=\"https://pa3tuitionpoint.000webhostapp.com/StudentFeeDetails.php?&ID=$ID&searchName=$Name&Class=$Class&StartDate=$StartDate1\" target='_Blank' style='text-decoration:none;'>$Name</a></td>";
				echo "<td>";

				echo "<select name=\"selday\" required>";

						    for ($i=1; $i<=$endday; $i++)
							{
						      if ($i == $cDay)
								{
								 echo "<option value=$i selected>$i</option>"; 
								 }
							   else 
							   {
								echo "<option value='$i'>$i</option>"; 
							   }
						    }
				
				  echo "</select>";
				
				echo " $month[$searchMonth] $searchYear</td>";
				echo "<td>$MonthlyFee</td>";
				echo "<td><input style=\"background-color: yellow;\" placeholder=\"Enter Fee\" name=\"FeesPaid\" onchange=ChangeNxt($Fee_Id)></td>";
				echo "<td><input name=\"searchSummary\" id=\"$Fee_Id\"></td>";
				echo "<td>";
				echo "<input name='ID' value='$ID' type='hidden'>";
				echo "<input name=\"Fee_Id\" value=\"$Fee_Id\" type=\"hidden\">";
				echo "<input name=\"Class\" value=\"$Class\" type=\"hidden\">";
				echo "<input name=\"Date\" value=\"$searchYear-$searchMonth-\" type=\"hidden\">";
				echo "<input name=\"searchMonth\" value=\"$searchMonth\" type=\"hidden\">";
				
				echo "<input type=\"Submit\" value=\"Submit\">";

				echo "</td>";
				echo "</tr>";
				echo "</form>";
			}		 
       }
	 }

		$Bal=$MonthlyFeesTot-$FeesPaidTot;
		$MonthlyFeesTot=number_format($MonthlyFeesTot, 0, '.', ',');
		$FeesPaidTot=number_format($FeesPaidTot, 0, '.', ',');
		$Bal=number_format($Bal, 0, '.', ',');
		$FeesTot=number_format($FeesTot, 0, '.', ',');
		

		echo "<tr><td></td><td></td><td></td><td></td><td></td><td><b>Total</b></td><td><b>$FeesTot</b></td><td><b>$FeesPaidTot</b></td><td><b>Balance=$Bal</b></td><td></td></tr>";
		echo "<h1>$month[$searchMonth] $searchYear: Total Fee Paid: $FeesPaidTot (MonthlyFeesTot=$MonthlyFeesTot, Balance=$Bal)</h1>";

		echo "</table>";





echo "<h1></h1>";

//r>
	
	
}
	?>


<br><br><br><br><br>

</body>


</html>