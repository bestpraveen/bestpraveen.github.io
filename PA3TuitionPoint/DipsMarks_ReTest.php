<html>

<head>
    <link rel="stylesheet" href="tableStyling.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <title>PA3 Tuition Point: Results Re Test</title>


	<script language="javascript" type="text/javascript">
 
	function SearchAdvance(searchClass, searchSubject)
	  {		
		window.location.href ='DipsMarks_ReTest.php' + '?SearchAdvance=Yes' + '&searchClass=' + searchClass + '&searchSubject=' + searchSubject;
      }
	  
	
</script>

</head>

<?php
error_reporting(1);
include 'Config.php'; 

$Class=15;
$Subject="All";



if (isset($_GET['Class']))
{
$Class = $_GET['Class'];
}

if (isset($_GET['Subject']))
{
$Subject = $_GET['Subject'];
}

//if ($Class="") ;

$searchClass=15;
$searchSubject="All";

if (isset($_GET['searchClass'])){ $searchClass = $_GET['searchClass'];}
if (isset($_GET['searchSubject'])){ $searchSubject = $_GET['searchSubject'];}

//echo "$searchClass $searchSubject";

?>

<div class="container">
    <table border="1" width="90%" align="Center">
        <tr>
            <th>Rank</th>
			<th style="text-align: center;">Class</th>
            <th style="
            background-color: #04aa6d;
            color: white;
            text-align: center;
            font-size: 1.8rem;
            font-weight: 600;
            font-family: 'Poppins',
            sans-serif !important;">Name</th>
             
            <!-- <th style="text-align: center;">Subject</th> -->
            <!-- <th style="text-align: center;">Level</th> -->
            <!-- <th style="text-align: center;">TotMarks</th> -->
            <!-- <th style="text-align: center;">MarksObtained</th> -->
            <th style="
            background-color: #04aa6d;
            color: white;
            text-align: center;
            font-size: 1.8rem;
            font-weight: 600;
            font-family: 'Poppins',
            sans-serif !important;">

			<?php 
				if ($searchSubject=="Math")
				{
					echo "Math % <br>(Avg.)</th>";
				}
				else if ($searchSubject=="Science")
				{
					echo "Science % <br>(Avg.)</th>";
				}
				else
				{
					echo "Percentage <br>(Avg.)</th>";
					echo "<th style=\"background-color: #04aa6d;color: white;text-align: center;font-size: 1.8rem;font-weight: 600;font-family: 'Poppins',sans-serif !important;\">Math % <br>(Avg.)</th>";
					echo "<th style=\"background-color: #04aa6d;color: white;text-align: center;font-size: 1.8rem;font-weight: 600;font-family: 'Poppins',sans-serif !important;\">Science %<br>(Avg.)</th>";
				}
				
			?>
			

			

			 <th style="
            background-color: #04aa6d;
            color: white;
            text-align: center;
            font-size: 1.8rem;
            font-weight: 600;
            font-family: 'Poppins',
            sans-serif !important;">Details <br>(Marks)</th>
        </tr>
        <form action="DipsMarks_ReTest.php" method="get" id="formControler" style="text-align: center;
        font-size: 30px;">
		<label style="padding: 3px;
        margin: 3px;font-weight: bold;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin: 1rem;
        font-size: 1.6rem;
        margin-bottom: 2rem;color:blue;"><BLINK>Results Re Test</BLINK></label>
            <label for="Class" class="classDiv" style="padding: 5px;
        margin: 5px;font-weight: bold;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin: 1rem;
        font-size: 1.6rem;
        margin-bottom: 2rem;">Class: </label>
            <select name="searchClass" id="Class" class="classDiv" style="padding: 10px;
    width: 15%;
    margin: 1rem;font-size: 1.2rem;
    border-radius: 10px;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande',
        'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.2);
    width: 15%;" onChange="SearchAdvance(this.value, '<?php echo $searchSubject; ?>')">
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
            <label for="Subject" class="classDiv" style="padding: 10px;
        margin: 10px;font-weight: bold;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin: 1rem;
        margin-bottom: 2rem;
        font-size: 1.6rem;">Subject: </label>
            <select name="searchSubject" id="Subject" class="subjectDiv" style="margin-left: 2.9rem;
    width: 15%;padding: 5px;
    width: 15%;
    margin: 1rem;font-size: 1.2rem;
    border-radius: 10px;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande',
        'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.2);
    width: 15%;" onChange="SearchAdvance('<?php echo $searchClass; ?>', this.value)">
             
			 <?php
			 if ($searchSubject=="All")
			 {
			   echo "<option value=\"All\" Selected>All Subjects</option>";
			 }
			 else
			 {
			   echo "<option value=\"All\">All Subjects</option>";
			 }

			 if ($searchSubject=="Math")
			 {
			   echo "<option value=\"Math\" Selected>Math</option>";
			 }
			 else
			 {
			   echo "<option value=\"Math\">Math</option>";
			 }


			if ($searchSubject=="Science")
			 {
			   echo "<option value=\"Science\" Selected>Science</option>";
			 }
			 else
			 {
			   echo "<option value=\"Science\">Science</option>";
			 }

			 ?>
			 
		 
             

            </select>


			 &nbsp;&nbsp;&nbsp;<button type="submit" class="btn" style="color:blue;"><a  style="text-decoration:none;" href="https://pa3tuitionpoint.000webhostapp.com">Home</a></button>

          <!--  <button type="submit" class="btn">Fliter</button> -->


		<!--$valueScienceCol="Green";
		if ($valueScience<90) $valueScienceCol="#39FF33";
		if ($valueScience<80) $valueScienceCol="#BBFF33";
		if ($valueScience<60) $valueScienceCol="#FFCE33";
		if ($valueScience<40) $valueScienceCol="#FF3333";-->

		<!--<span>Color: </span>
		<span style="color:Green;">&gt;90% </span>
		<span style="color:#39FF33;">&lt;90% </span>
		<span style="color:#BBFF33;">&lt;80% </span>
		<span style="color:#FFCE33;">&lt;60% </span>
		<span style="color:#FF3333;">&lt;40% </span>-->

        </form>
<?php


		
		$sql1 = "SELECT DISTINCT(ID) FROM StResult_ReTest";
//$searchClass $searchSubject
        if ($searchClass != "15") {
            $sql1 = $sql1 . " WHERE Class='$searchClass'";
        }

        if ($searchSubject != "All") {
            $sql1 = $sql1 . " AND Subject='$searchSubject'";
        }
		$sql1= str_replace("StResult_ReTest AND Subject", "StResult_ReTest WHERE Subject", $sql1);

		$sql1 = $sql1 . " ORDER BY Percentage DESC";

         //echo "<br>Class= $Class and Subject= $Subject sql1= $sql1 <br>";

        $sn = 0;
        $result1 = $conn->query($sql1);

		//$array['id']['avg']=array();
		$array = array();
		//array_push($array,$array['key1']=>'one',$array['key2']=>'two')
		//print_r($array['key1']['key2']);


//$searchClass $searchSubject
        if ($result1->num_rows >= 0) 
		{
            while ($row = $result1->fetch_assoc()) 
			{
                $ID = $row["ID"];
                //echo "<br> $ID";

                $sqlAVG    = "SELECT Avg(Percentage) FROM StResult_ReTest WHERE ID='$ID'";

				if ($searchClass != "15") {
					$sqlAVG = $sqlAVG . " AND Class='$searchClass'";
				}

				if ($searchSubject != "All") {
					$sqlAVG = $sqlAVG . " AND Subject='$searchSubject'";
				}

                //echo "<br> sqlAVG= $sqlAVG";     


                $resultAVG = $conn->query($sqlAVG);
                $rowAVG    = $resultAVG->fetch_row();
                $AVG       = $rowAVG[0];
				$AVG=round($AVG,2);




				$sqlAVGMath    = "SELECT Avg(Percentage) FROM StResult_ReTest WHERE ID='$ID' AND Subject='Math'";
                //echo "<br> sqlAVG= $sqlAVGMath";
                $resultAVGMath = $conn->query($sqlAVGMath);
                $rowAVGMath    = $resultAVGMath->fetch_row();
                $AVGMath       = $rowAVGMath[0];
				$AVGMath=round($AVGMath,2);



				$sqlAVGScience    = "SELECT Avg(Percentage) FROM StResult_ReTest WHERE ID='$ID' AND Subject='Science'";
                //echo "<br> sqlAVG= $sqlAVGScience";
                $resultAVGScience = $conn->query($sqlAVGScience);
                $rowAVGScience    = $resultAVGScience->fetch_row();
                $AVGScience       = $rowAVGScience[0];
				$AVGScience=round($AVGScience,2);

				$IDNNN="$ID"."_"."$AVGMath"."_"."$AVGScience";                         
				$array["$IDNNN"]="$AVG";                         
            }
        }


			//echo "<br>"; 
			//print_r($array);
			arsort($array);
			//print_r($array);
			
			foreach ($array as $key => $value)
			{
				//echo "<br>$key  $value";

				 $sn++;
				 $sn1=$sn;
                $key1  = explode("_", $key);
                $key2      = $key1[0];
				$ccc      = $key1[1];

				$keyID=$key2."_".$ccc;

				$valueMath      = $key1[2];
				$valueScience      = $key1[3];


				

	            //$value1  = explode("_", $value);
                //$value      = $value1[0];
				//$valueMath      = $value1[1];
				//$valueScience      = $value1[2];

				$valueCol="green";
				if ($value<90) $valueCol="#39FF33";
				if ($value<80) $valueCol="#BBFF33";
				if ($value<60) $valueCol="#FFCE33";
				if ($value<40) $valueCol="#FF3333";

				$valueMathCol="Green";
				if ($valueMath<90) $valueMathCol="#39FF33";
				if ($valueMath<80) $valueMathCol="#BBFF33";
				if ($valueMath<60) $valueMathCol="#FFCE33";
				if ($valueMath<40) $valueMathCol="#FF3333";

				$valueScienceCol="Green";
				if ($valueScience<90) $valueScienceCol="#39FF33";
				if ($valueScience<80) $valueScienceCol="#BBFF33";
				if ($valueScience<60) $valueScienceCol="#FFCE33";
				if ($valueScience<40) $valueScienceCol="#FF3333";


				$valueMath=$valueMath."%";
				if ($valueMath==0) $valueMath="";

				$valueScience=$valueScience."%";
				if ($valueScience==0) $valueScience="";



				if ($sn==1) $sn1="*".$sn."*"; 

                echo "<tr>";
                echo "<td style='text-align: center;'>$sn1</td>";
				echo "<td style='font-size: 1.6rem;  text-align: center;font-family: `Ubuntu`, sans-serif;
    font-weight: 500;'>$ccc</td>";
                echo "<td style='font-size: 1.6rem;  text-align: center;font-family: `Ubuntu`, sans-serif;
    font-weight: 500;'>$key2</td>";				
                echo "<td title='Click for Details' style='color:$valueCol; font-size: 1.6rem;  text-align: center;font-family: `Ubuntu`, sans-serif;
    font-weight: 500;'><a style='color:$valueCol;' target=\"_Blank\" href=\"DipsMarksDetails_ReTest.php?SearchAdvance=Yes&searchClass=15&searchSubject=$Subject&searchExamTitle=All&searchName=$keyID\">$value %</a></td>";


	if ($searchSubject=="All")
	{

		echo " <td title='Click for Details' style='font-size: 1.6rem;  text-align: center;font-family: `Ubuntu`, sans-serif;
		font-weight: 500;'><a style='color:$valueMathCol;'  target=\"_Blank\" href=\"DipsMarksDetails_ReTest.php?SearchAdvance=Yes&searchClass=15&searchSubject=Math&searchExamTitle=All&searchName=$keyID\">$valueMath</a></td> ";

		echo " <td title='Click for Details' style='font-size: 1.6rem;  text-align: center;font-family: `Ubuntu`, sans-serif;
		font-weight: 500;'><a style='color:$valueScienceCol;'  target=\"_Blank\" href=\"DipsMarksDetails_ReTest.php?SearchAdvance=Yes&searchClass=15&searchSubject=Science&searchExamTitle=All&searchName=$keyID\">$valueScience</a></td> ";
	}


	echo "  <td><a target=\"_Blank\" href=\"DipsMarksDetails_ReTest.php?SearchAdvance=Yes&searchClass=15&searchSubject=$Subject&searchExamTitle=All&searchName=$keyID\">Click 4 Details </a></td>";
                echo "</tr>";
			}

        $conn->close();

        ?>

    </table>

<?php


?>

</div>

</html>