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
    <title>Student Info</title>
<script language="javascript" type="text/javascript">
 
	function SearchAdvance(searchClass, searchStatus)
	  {		
		window.location.href ='DipsStudentAdmin.php' + '?SearchAdvance=Yes' + '&searchClass=' + searchClass + '&searchStatus=' + searchStatus;
      }
	  
	
</script>

</head>

<body>
<?php
include 'Config.php'; 
?>


<?php

$Status="All";
$searchClass = 15;
$searchStatus = "All";


if (isset($_GET['searchStatus']))
{
$Status = $_GET['searchStatus'];
}

if (isset($_GET['searchClass'])){ $searchClass = $_GET['searchClass'];}
if (isset($_GET['searchStatus'])){ $searchStatus = $_GET['searchStatus'];}

?>


<div class="container">



<form action="" method="get" id="formControler" style="text-align: center;
        font-size: 15px;">

            <label for="Class" class="classDiv" style="padding: 10px;
        margin: 10px;font-weight: bold;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin: 1rem;
        font-size: 1.6rem;
        margin-bottom: 2rem;">Class: </label>
            <select name="searchClass" id="Class" class="classDiv" style="padding: 10px;
    width: 20%;
    margin: 1rem;font-size: 1.2rem;
    border-radius: 10px;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande',
        'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.2);
    width: 22%;" onChange="SearchAdvance(this.value, '<?php echo $searchStatus; ?>')">
                <option value="15">All Classes</option>
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


                </optgroup>
            </select>


			<label for="Status" class="classDiv" style="padding: 10px;
        margin: 10px;font-weight: bold;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin: 1rem;
        margin-bottom: 2rem;
        font-size: 1.6rem;">Status: </label>
            <select name="searchStatus" id="Status" class="StatusDiv" style="margin-left: 2.9rem;
    width: 22%;padding: 10px;
    width: 20%;
    margin: 1rem;font-size: 1.2rem;
    border-radius: 10px;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande',
        'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.2);
    width: 22%;" onChange="SearchAdvance('<?php echo $searchClass; ?>', this.value)">
             
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

			
        &nbsp;&nbsp;&nbsp;<button type="submit" class="btn" style="color:blue;"><a  style="text-decoration:none;" href="https://pa3tuitionpoint.000webhostapp.com">Home</a></button>
        </form> 






    <table border="1" width="98%" align="Center">
        <tr>
            <th>S.N.</th>
            <!--<th style=" background-color: #04aa6d; color: white; text-align: center;
            font-size: 1.8rem; font-weight: 600; font-family: 'Poppins', sans-serif !important;">SN</th>-->

            <th style="text-align: center;">Class</th>
			<th style="text-align: center;">Name</th>
            <th style="text-align: center;">ID</th>
            <th style="text-align: center;">Start<br>Date</th>
            <th style="text-align: center;">Status</th>
            <th style="text-align: center;">Address</th>
			<th style="text-align: center;">Mobile</th>
			<th style="text-align: center;">Monthly<br>Fee</th>
			<th style="text-align: center;">Tot_Fee<br>Paid</th>
			<th style="text-align: center;">Fee<br>Details</th>
        </tr>
        

       

		<?php

		$sql1 = "SELECT * FROM StInfo AND Class='$searchClass' AND Status='$searchStatus'";

		$sql1 = $sql1 . " ORDER BY FeePaidTotal DESC";

		$sql1= str_replace("StInfo AND", "StInfo WHERE ", $sql1);
		$sql1= str_replace(" Class='15'", "", $sql1);
		$sql1= str_replace(" AND Status='All'", "", $sql1);
		$sql1= str_replace("  ", " ", $sql1);
		$sql1= str_replace("WHERE ORDER", "ORDER", $sql1);
		$sql1= str_replace("WHERE AND", "WHERE ", $sql1);


        echo "<br>Class=$searchClass, Status= $Status <br> sql1= $sql1 <br>";

        $sn = 0;
		$FeesPerMonthTot=0;
		$FeesTotGrand=0;
        $result1 = $conn->query($sql1);
        if ($result1->num_rows >= 0) 
		{
            while ($row = $result1->fetch_assoc()) 
			{  
				$ID = $row["ID"];
				$Name = $row["Name"];
				$Class = $row["Class"];
				$StartDate1 = $row["StartDate"];
				$Status = $row["Status"];
				$Address = $row["Address"];
				$Mobile = $row["Mobile"];
				$FeesPerMonth = $row["FeesPerMonth"];

				$sqlFeTot="SELECT SUM(FeesPaid) FROM StFees WHERE ID='$ID'";
                //echo "<br> sqlFe= $sqlFe";     
                $FeePaidTotalQ = $conn->query($sqlFeTot);
                $FeePaidTotalR= $FeePaidTotalQ->fetch_row();
                $FeePaidTotal  = $FeePaidTotalR[0];


				//$FeePaidTotal = $row["FeePaidTotal"];


				
				$FeesTotGrand=$FeesTotGrand+$FeePaidTotal;
				$FeesPerMonthTot=$FeesPerMonthTot+$FeesPerMonth;


				$sn++;
				$StartDate = date("j M y", strtotime($StartDate1));
				
				//$StartDate=str_replace(" ", "&nbsp;", $StartDate);

				
				$Class1=$Class;

				if (strpos($ID, 'L.K.G') !== false) 
				{
					$Class1="L.K.G";
				}

				if (strpos($ID, 'U.K.G') !== false) 
				{
					$Class1="U.K.G";
				}



				echo "<tr> <td>$sn</td> <td>$Class1</td> <td>$Name</td> <td>$ID</td> <td>$StartDate</td> <td>$Status</td> <td>$Address</td><td>$Mobile</td><td>$FeesPerMonth</td><td>$FeePaidTotal</td><td><a target=\"_Blank\" href=\"StudentFeeDetailsAdmin.php?&ID=$ID&searchName=$Name&Class=$Class&StartDate=$StartDate\">Details</a></td></tr>";



            }
        }



        $conn->close();
		$FeesPerMonthTot=number_format($FeesPerMonthTot, 0, '.', ',');
		$FeesTotGrand=number_format($FeesTotGrand, 0, '.', ',');
		$FeesTotGrand1=number_format($FeesTotGrand1, 0, '.', ',');

		echo "<tr><td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td><b>G Total = </b> </td> <td><b>$FeesPerMonthTot</b></td> <td><b>$FeesTotGrand</b></td><td></td></tr>";
		
		echo "<h1><span><b>(Monthly Fee=$FeesPerMonthTot) And Total Profit = $FeesTotGrand</b></span></h1>";

        ?>

    </table>












</body>

</html>



<!-- $stmt = $connect->prepare("INSERT INTO tablename(name, password) VALUES(:name, :pass)");
$stmt->execute(array(
  "name" => $name,
  "pass" => $password
)); -->