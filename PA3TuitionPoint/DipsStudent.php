<html>
<head>
    <link rel="stylesheet" href="tableStyling.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <title>PA3 Tuition Point: Student Info</title>
<script language="javascript" type="text/javascript">
 
	function SearchAdvance(searchClass)
	  {		
		window.location.href ='DipsStudent.php' + '?SearchAdvance=Yes' + '&searchClass=' + searchClass;
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

if (isset($_GET['searchClass'])){ $searchClass = $_GET['searchClass'];}

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
    width: 22%;" onChange="SearchAdvance(this.value)">
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

			&nbsp;&nbsp;&nbsp;<button type="submit" class="btn" style="color:blue;"><a  style="text-decoration:none;" href="https://pa3tuitionpoint.000webhostapp.com">Home</a></button>

					<span>Color: </span>
		<span style="color:Green;">&gt;90% </span>
		<span style="color:#39FF33;">&lt;90% </span>
		<span style="color:#BBFF33;">&lt;80% </span>
		<span style="color:#FFCE33;">&lt;60% </span>
		<span style="color:#FF3333;">&lt;40% </span>


        </form>

    <table border="1" width="98%" align="Center">
        <tr>
            <th>S.N.</th>
            <!--<th style=" background-color: #04aa6d; color: white; text-align: center;
            font-size: 1.8rem; font-weight: 600; font-family: 'Poppins', sans-serif !important;">SN</th>-->

            <th style="text-align: center;">Class</th>
			<th style="text-align: center;">Name</th>
            <th style="text-align: center;">Start<br>Date</th>
			<th style="text-align: center;">Math<br>Avg%</th>
			<th style="text-align: center;">Science<br>Avg%</th>
			<th style="text-align: center;">All<br>Avg%</th>
			<th style="text-align: center;">Fee<br>Details</th>
        </tr>
        

		<?php

		$sql1 = "SELECT * FROM StInfo AND Class='$searchClass' AND Status='Active' AND ID!='Aditya_1' AND ID!='Aniket7_7' AND ID!='Aniket8_8' AND ID!='Aniket9_9' AND ID!='Aniket10_10' AND ID!='Aniket11_11'";

		$sql1 = $sql1 . " ORDER BY Class";

		$sql1= str_replace("StInfo AND", "StInfo WHERE ", $sql1);
		$sql1= str_replace(" Class='15'", "", $sql1);
		$sql1= str_replace(" AND Status='All'", "", $sql1);
		$sql1= str_replace("  ", " ", $sql1);
		$sql1= str_replace("WHERE ORDER", "ORDER", $sql1);
		$sql1= str_replace("WHERE AND", "WHERE ", $sql1);


        //echo "<br>Class=$searchClass, Status= $Status <br> sql1= $sql1 <br>";

		echo "sql1= $sql1 ";

        $sn = 0;
        $result1 = $conn->query($sql1);
        if ($result1->num_rows >= 0) 
		{
            while ($row = $result1->fetch_assoc()) 
			{  
				$ID = $row["ID"];
				$Name = $row["Name"];
				$Class = $row["Class"];
				$StartDate1 = $row["StartDate"];				
				
				$sqlAVGMath    = "SELECT Avg(Percentage) FROM StResult WHERE ID='$ID' AND Subject='Math'";
				$sqlAVGScience    = "SELECT Avg(Percentage) FROM StResult WHERE ID='$ID' AND Subject='Science'";
				$sqlAVGAll    = "SELECT Avg(Percentage) FROM StResult WHERE ID='$ID'";

                ///echo "<br> sqlAVGMath= $sqlAVGMath   <br> sqlAVGScience=$sqlAVGScience <br> sqlAVGAll=$sqlAVGAll";
                $resultAVGMath = $conn->query($sqlAVGMath);
                $rowAVGMath    = $resultAVGMath->fetch_row();
                $AVGMath       = $rowAVGMath[0];
				$AVGMath=round($AVGMath,2);

				$resultAVGScience = $conn->query($sqlAVGScience);
                $rowAVGScience    = $resultAVGScience->fetch_row();
                $AVGScience       = $rowAVGScience[0];
				$AVGScience=round($AVGScience,2);

				
				$resultAVGAll = $conn->query($sqlAVGAll);
                $rowAVGAll    = $resultAVGAll->fetch_row();
                $AVGAll       = $rowAVGAll[0];
				$AVGAll=round($AVGAll,2);


				$valueCol="green";
				if ($AVGAll<90) $valueCol="#39FF33";
				if ($AVGAll<80) $valueCol="#BBFF33";
				if ($AVGAll<60) $valueCol="#FFCE33";
				if ($AVGAll<40) $valueCol="#FF3333";

				$valueMathCol="Green";
				if ($AVGMath<90) $valueMathCol="#39FF33";
				if ($AVGMath<80) $valueMathCol="#BBFF33";
				if ($AVGMath<60) $valueMathCol="#FFCE33";
				if ($AVGMath<40) $valueMathCol="#FF3333";

				$valueScienceCol="Green";
				if ($AVGScience<90) $valueScienceCol="#39FF33";
				if ($AVGScience<80) $valueScienceCol="#BBFF33";
				if ($AVGScience<60) $valueScienceCol="#FFCE33";
				if ($AVGScience<40) $valueScienceCol="#FF3333";






				$sn++;
				$StartDate = date("j M y", strtotime($StartDate1));

				
				$Class1=$Class;

				if (strpos($ID, 'L.K.G') !== false) 
				{
					$Class1="L.K.G";
				}

				if (strpos($ID, 'U.K.G') !== false) 
				{
					$Class1="U.K.G";
				}



				echo "<tr> <td>$sn</td> <td>$Class1</td> <td>$Name</td> <td>$StartDate</td>";


				
				if ($AVGMath==0)
				{
					echo "<td></td>";					
				}
				else
				{
					echo "<td><a style='color:$valueMathCol;'  target=\"_Blank\" href=\"DipsMarksDetails.php?SearchAdvance=Yes&searchClass=15&searchSubject=Math&searchExamTitle=All&searchName=$ID\">$AVGMath %</a></td>";
				}

				if ($AVGScience==0)
				{
					echo "<td></td>";					
				}
				else
				{
					echo "<td><a style='color:$valueScienceCol;'  target=\"_Blank\" href=\"DipsMarksDetails.php?SearchAdvance=Yes&searchClass=15&searchSubject=Science&searchExamTitle=All&searchName=$ID\">$AVGScience %</a></td>";
				}


				if ($AVGAll==0)
				{
					echo " <td></td>";					
				}
				else
				{
					echo "<td><a style='color:$valueCol;' target=\"_Blank\" href=\"DipsMarksDetails.php?SearchAdvance=Yes&searchClass=15&searchSubject=All&searchExamTitle=All&searchName=$ID\">$AVGAll %</a></td> ";
				}



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