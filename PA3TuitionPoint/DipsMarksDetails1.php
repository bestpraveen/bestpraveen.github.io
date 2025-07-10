<html>
<head>
    <link rel="stylesheet" href="tableStyling.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <title>Results</title>
<script language="javascript" type="text/javascript">

 
	function SearchAdvance(searchClass, searchSubject, searchExamTitle, searchName)
	  {		

// window.location.href = 'DipsMarksDetails.php' + '?SearchAdvance=Yes' + '&searchClass=' + searchClass + '&searchSubject=' + searchSubject + '&searchExamTitle=' + searchExamTitle + '&searchName=' + searchName;

// window.location.href = 'main.php' + '?SearchAdvance=Yes' + '&searchJournalName=' + searchJournalName + '&searchColHead=' + searchColHead + '&searchColHeadValue=' + searchColHeadValue;

window.location.href = 'DipsMarksDetails1.php' + '?SearchAdvance=Yes' + '&searchClass=' + searchClass + '&searchSubject=' + searchSubject + '&searchExamTitle=' + searchExamTitle + '&searchName=' + searchName;
      }
	  
	
</script>

</head>

<body>
<?php
include 'Config.php'; 
?>

<?php

$Subject="All";
$searchClass = 15;
$searchSubject = "All";
$searchExamTitle = "All";
$searchName = "All";


if (isset($_GET['searchName']))
{
$id = $_GET['searchName'];
$searchName = $_GET['searchName'];
}

if (isset($_GET['searchSubject']))
{
$Subject = $_GET['searchSubject'];
}


if (isset($_GET['searchClass'])){ $searchClass = $_GET['searchClass'];}
if (isset($_GET['searchSubject'])){ $searchSubject = $_GET['searchSubject'];}
if (isset($_GET['searchExamTitle'])){ $searchExamTitle = $_GET['searchExamTitle'];}
//if (isset($_GET['searchName'])){ $searchName = $_GET['searchName'];  $id = $_GET['searchName'];}

?>









<?php
$name=array();

if ($searchClass==15)
{
	$sqlR = "SELECT DISTINCT(ID) FROM StResult ORDER BY Class ASC";
}
else
{
	$sqlR = "SELECT DISTINCT(ID) FROM StResult WHERE Class='$searchClass' ORDER BY ID ASC";
}

$sn = 0;
$resultR = $conn->query($sqlR);
if ($resultR->num_rows >= 0) 
{
	while ($row = $resultR->fetch_assoc()) 
	{                
		$ID = $row["ID"];
		array_push($name, $ID);		
	}
}

$ColHeadValueArray=explode("|",$ColHeadValue);
$nameLen = count($name);

 for($x = 0; $x < $nameLen; $x++)
			 {
			   //echo " $name[$x] , ";
			  // echo "<option value='$ColHeadValueArray[$x]' ";
			   //if($searchColHeadValue==$ColHeadValueArray[$x]) echo "selected";
			   #echo ">$JournalListArray[$x] PPP $searchJournal</option>";
			   //echo ">$ColHeadValueArray[$x]</option>";
			 }


?>




<?php
$title=array();

if ($searchClass==15)
{
	$sqlL = "SELECT DISTINCT(Level) FROM StResult ";
}
else
{
	$sqlL = "SELECT DISTINCT(Level) FROM StResult WHERE Class='$searchClass'";
}



if ($searchSubject=="All")
{
	//$sqlL =$sqlL.  "SELECT DISTINCT(Level) FROM StResult ORDER BY Class ASC";
}
else
{
	$sqlL =$sqlL.  " AND Subject='$searchSubject'";
}

$sqlL =$sqlL. " ORDER BY Class ASC";
$sqlL= str_replace("  ", " ", $sqlL);
$sqlL= str_replace("StResult AND", "StResult WHERE ", $sqlL);

//echo "<br>$sqlL";
$sn = 0;
$resultL = $conn->query($sqlL);
if ($resultL->num_rows >= 0) 
{
	while ($row = $resultL->fetch_assoc()) 
	{                
		$Level = $row["Level"];
		array_push($title, $Level);		
	}
}


$titleLen = count($title);

 for($x = 0; $x < $titleLen; $x++)
			 {
			   //echo " $title[$x] , ";
			 }


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
    width: 15%;" onChange="SearchAdvance(this.value, '<?php echo $searchSubject; ?>','<?php echo $searchExamTitle; ?>','<?php echo $searchName; ?>');">
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
    width: 22%;padding: 10px;
    width: 20%;
    margin: 1rem;font-size: 1.2rem;
    border-radius: 10px;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande',
        'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.2);
    width: 15%;" onChange="SearchAdvance('<?php echo $searchClass; ?>', this.value, '<?php echo $searchExamTitle; ?>','<?php echo $searchName; ?>');">
             
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

			<span>Color: </span>
		<span style="color:Green;">&gt;90% </span>
		<span style="color:#39FF33;">&lt;90% </span>
		<span style="color:#BBFF33;">&lt;80% </span>
		<span style="color:#FFCE33;">&lt;60% </span>
		<span style="color:#FF3333;">&lt;40% </span>

             <br> 

			<label for="Subject" class="classDiv" style="padding: 10px;
        margin: 10px;font-weight: bold;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin: 1rem;
        margin-bottom: 2rem;
        font-size: 1.6rem;">Exam Title: </label>
            <select name="Subject" id="Subject" class="subjectDiv" style="margin-left: 2.9rem;
    width: 22%;padding: 10px;
    width: 20%;
    margin: 1rem;font-size: 1.2rem;
    border-radius: 10px;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande',
        'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.2);
    width: 15%;"  onChange="SearchAdvance('<?php echo $searchClass; ?>', '<?php echo $searchSubject; ?>', this.value, '<?php echo $searchName; ?>');">>
             
			 <?php
			 
			   echo "<option value=\"All\" Selected>All Title Level</option>";

			    	 for($x = 0; $x < $titleLen; $x++)
					 {			  
					   echo "<option value='$title[$x]' ";
					   if($searchExamTitle==$title[$x]) echo "selected";
					   echo ">$title[$x]</option>";
					 }				
				

			 ?>
			 
             

            </select>


			

            <label for="Class" class="classDiv" style="padding: 10px;
        margin: 10px;font-weight: bold;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin: 1rem;
        font-size: 1.6rem;
        margin-bottom: 2rem;">Name: </label>
            <select name="searchName" id="Class" class="classDiv" style="padding: 10px;
    width: 20%;
    margin: 1rem;font-size: 1.2rem;
    border-radius: 10px;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande',
        'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.2);
    width: 15%;" onChange="SearchAdvance('<?php echo $searchClass; ?>', '<?php echo $searchSubject; ?>', '<?php echo $searchExamTitle; ?>', this.value);">
                <option value="All">All</option>
				
				<?php				
					 for($x = 0; $x < $nameLen; $x++)
					 {			  
					   echo "<option value='$name[$x]' ";
					   if($searchName==$name[$x]) echo "selected";
					   #echo ">$JournalListArray[$x] PPP $searchJournal</option>";
					   echo ">$name[$x]</option>";
					 }				
				?>

            </select>
            

            <!--<button type="submit" class="btn">Filter</button>-->
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="btn" style="color:blue;"><a  style="text-decoration:none;" href="https://pa3tuitionpoint.000webhostapp.com" target="_Blank">Home</a></button>

        </form> 






    <table border="1" width="96%" align="Center">
        <tr>
            <th>S.N.</th>
            <th style="
            background-color: #04aa6d;
            color: white;
            text-align: center;
            font-size: 1.8rem;
            font-weight: 600;
            font-family: 'Poppins',
            sans-serif !important;">Name</th>

            <th style="text-align: center;">Class</th>
			<th style="text-align: center;">Date</th>
            <th style="text-align: center;">Subject</th>
            <th style="text-align: center;">&nbsp;&nbsp;Level&nbsp;&nbsp;</th>
            <th style="text-align: center;">Total<br>Marks</th>
            <th style="text-align: center;">Marks<br>Obtained</th>
            <th style="
            background-color: #04aa6d;
            color: white;
            text-align: center;
            font-size: 1.8rem;
            font-weight: 600;
            font-family: 'Poppins',
            sans-serif !important;">%</th>
        </tr>
        

       

		<?php
		
$jsonArray = array();
$label = array();
$data = array();


        $sql1 = "SELECT * FROM StResult WHERE ID='$id'";

		if ($Subject != "All") {
            $sql1 = $sql1 . " AND Subject='$Subject'";
        }

		$sql1 = $sql1 . " ORDER BY ExamDate DESC";



		$sql1 = "SELECT * FROM StResult AND Class='$searchClass' AND Subject='$searchSubject' AND Level='$searchExamTitle' AND ID='$searchName'";

		//$sql1 = $sql1 . " ORDER BY Percentage DESC";
		$sql1 = $sql1 . " ORDER BY ExamDate";

		$sql1= str_replace("  ", " ", $sql1);
		$sql1= str_replace("  ", " ", $sql1);
		$sql1= str_replace("  ", " ", $sql1);
		//echo "<br>1 sql1= $sql1";

		$sql1= str_replace("StResult AND", "StResult WHERE ", $sql1);
		//echo "<br>2 sql1= $sql1";

		$sql1= str_replace(" Class='15'", "", $sql1);
		$sql1= str_replace(" AND Subject='All'", "", $sql1);
		$sql1= str_replace(" AND Level='All'", "", $sql1);
		$sql1= str_replace(" AND ID='All'", "", $sql1);

		$sql1= str_replace("  ", " ", $sql1);

		
		$sql1= str_replace("WHERE ORDER", "ORDER", $sql1);

		$sql1= str_replace("WHERE AND", "WHERE ", $sql1);


       //echo "<br>Class=$searchClass, Subject= $Subject, title=$searchTitle, ID= $id,  Name=$searchName <br> sql1= $sql1 <br>";

        $sn = 0;
        $result1 = $conn->query($sql1);
        if ($result1->num_rows >= 0) 
		{
            while ($row = $result1->fetch_assoc()) 
			{                
				$ID = $row["ID"];
				$Class = $row["Class"];
				$ExamDate = $row["ExamDate"];
				$Subject = $row["Subject"];
				$Level = $row["Level"];
				$TotMarks = $row["TotMarks"];
				$MarksObtained = $row["MarksObtained"];
				$Percentage = $row["Percentage"];
				$sn++;


				$ExamDate1=$ExamDate;
				$ExamDate1 = date("j M y", strtotime($ExamDate));

				$PercentageR=round($Percentage);


				$jsonArrayItem = array();
			    $jsonArrayItem['label'] = $ExamDate1;
			    $jsonArrayItem['value'] = $PercentageR;
				array_push($jsonArray, $jsonArrayItem);
				array_push($label, $ExamDate1);
				array_push($data, $PercentageR);




				$PercentageCol="green";
				if ($Percentage<90) $PercentageCol="#39FF33";
				if ($Percentage<80) $PercentageCol="#BBFF33";
				if ($Percentage<60) $PercentageCol="#FFCE33";
				if ($Percentage<40) $PercentageCol="#FF3333";



				echo "<tr> <td>$sn</td> <td>$ID</td> <td>$Class</td> <td>$ExamDate1</td> <td>$Subject</td> <td>$Level</td> <td>$TotMarks</td> <td>$MarksObtained</td>  <td style='color:$PercentageCol;'><b>$Percentage %</b></td></tr>";



            }
        }



        $conn->close();

        ?>

    </table>



<?php

//foreach ($jsonArray as $key => $value) echo "<br>jsonArray $key === $value";
//foreach ($label as $key => $value) echo "<br>label $key === $value";
//foreach ($data as $key => $value) echo "<br>data $key === $value";


//Start CHART GRAPH

$chartConfig = json_encode($jsonArray);



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
        'label' => 'Percentage %',
        'data' => $data,		
		 'backgroundColor' => 'rgba(0, 120, 0, 3)',
		'borderColor' => 'rgb(54, 162, 235)',
      ),
//	array(        'label' => 'Close bug',        'data' => $dataclose,				 'backgroundColor' => 'rgba(0, 120, 0, 3)','borderColor' => 'rgb(54, 162, 235)',      )
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


if ($searchName!="All")
{
$chartUrl = 'https://quickchart.io/chart?w=330&h=200&c=' . urlencode($chartConfig);
echo " <p><img src=\"$chartUrl\"></p>";
}

//END ############## Chart Graph





?>

</div>
</body>
</html>