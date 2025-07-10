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
		window.location.href ='EditStudent.php' + '?SearchAdvance=Yes' + '&searchClass=' + searchClass + '&searchStatus=' + searchStatus;
      }


	function test()
	  {		
		alert("Hello, World!"); 
      }

function EditStatus(ID, Status)
	{		
		xmlHttp=GetXmlHttpObject();
		if (xmlHttp==null)
		 {
		 alert ("Browser does not support HTTP Request");
		 return;
		 }
		
		var url="UpdateStInfoInDB.php";
		url="UpdateStInfoInDB.php?ID="+ID+"&Status="+Status;
		
		alert (url);

		//exit;

		

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
	  
	
</script>

</head>

<body>
<?php
include 'Config.php'; 
?>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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
        margin-bottom: 2rem;">Edit Student Info: </label>

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
            <th style="text-align: center;">StartDate</th>
            <th style="text-align: center;">Status</th>
            <th style="text-align: center;">Address</th>
			<th style="text-align: center;">Fee Details</th>
        </tr>
        

       

		<?php

		$sql1 = "SELECT * FROM StInfo AND Class='$searchClass' AND Status='$searchStatus'";

		$sql1 = $sql1 . " ORDER BY Name";

		$sql1= str_replace("StInfo AND", "StInfo WHERE ", $sql1);
		$sql1= str_replace(" Class='15'", "", $sql1);
		$sql1= str_replace(" AND Status='All'", "", $sql1);
		$sql1= str_replace("  ", " ", $sql1);
		$sql1= str_replace("WHERE ORDER", "ORDER", $sql1);
		$sql1= str_replace("WHERE AND", "WHERE ", $sql1);


        echo "<br>Class=$searchClass, Status= $Status sql1= $sql1 <br>";

        $sn = 0;
        $result1 = $conn->query($sql1);
        if ($result1->num_rows >= 0) 
		{
            while ($row = $result1->fetch_assoc()) 
			{  
				$ID = $row["ID"];
				$Name = $row["Name"];
				$Class = $row["Class"];
				$StartDate = $row["StartDate"];
				$Status = $row["Status"];
				$Address = $row["Address"];
				$Mobile = $row["Mobile"];
				$FeesPerMonth = $row["FeesPerMonth"];
				$sn++;



				echo "<tr> <td>$sn</td> <td>$Class</td> <td>$Name</td> <td>$ID</td> <td>$StartDate</td>";
				
//               echo "<td><input type='number' onchange=\"InsertData(this.value)\">val</td>";


				echo " <td title='$Status'>";
				echo "<select name=\"EditStatus\" id=\"Status\" class=\"StatusDiv\" style1=\"width:30%;\" onChange=\"EditStatus('$ID', this.value)\">";
             
			 
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

            echo "</select>";
				
				echo "</td>";

				echo "<td>$Address</td>";
				echo "<td><a target=\"_Blank\" href=\"StudentFeeDetails.php?&ID=$ID&searchName=$Name&Class=$Class&StartDate=$StartDate\">Details</a></td></tr>";



            }
        }



        $conn->close();
        ?>
    </table>



</body>
</html>
<!-- $stmt = $connect->prepare("INSERT INTO tablename(name, password) VALUES(:name, :pass)");
$stmt->execute(array(
  "name" => $name,
  "pass" => $password
)); -->