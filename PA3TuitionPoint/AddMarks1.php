<html>
<head>
    <title>Add Marks</title>
    <link rel="stylesheet" href="AddStudent.css" />


<script language="javascript" type="text/javascript">



//'$ID', '$searchTestDate', '$searchSubject','$searchExamTitle','$searchTotMarks', this.value
    function InsertData(Result_Id, ID, searchClass, searchTestDate, searchSubject, searchExamTitle, searchTotMarks, searchMarksObtained)
	{
		var Result_IdIns=Result_Id;
		var IDIns=ID;
		var searchTestDateIns=searchTestDate;
		var searchClassIns=searchClass;
		var searchSubjectIns=searchSubject;
		var searchExamTitleIns=searchExamTitle;
		var searchTotMarksIns=Number(searchTotMarks);
		var MarksObtainedIns=Number(searchMarksObtained);
		var Percentage=(MarksObtainedIns/searchTotMarksIns)*100;

		//alert (typeof(searchTotMarksIns));
		//alert (Percentage);
		

		//alert (IDIns + searchTestDateIns + searchSubjectIns + searchExamTitleIns + searchTotMarksIns + // MarksObtainedIns);


		xmlHttp=GetXmlHttpObject();
		if (xmlHttp==null)
		 {
		 alert ("Browser does not support HTTP Request");
		 return;
		 }

		var url="InsertMarksInDB.php";
		url="InsertMarksInDB.php?Result_IdIns="+Result_Id+"&IDIns="+IDIns+"&searchClassIns="+searchClassIns+"&searchTestDateIns="+searchTestDateIns+"&searchSubjectIns="+searchSubjectIns+"&searchExamTitleIns="+searchExamTitleIns+"&searchTotMarksIns="+searchTotMarksIns+"&MarksObtainedIns="+MarksObtainedIns+"&Percentage="+Percentage;

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

<h1>Add Marks Form</h1>



<?php

include 'Config.php'; 

if (isset($_GET['ExamTitle'])) $ExamTitle = $_GET['ExamTitle'];
if (isset($_GET['TotMarks'])) $TotMarks = $_GET['TotMarks'];
if (isset($_GET['Subject'])) $Subject = $_GET['Subject'];
if (isset($_GET['TestDate'])) $TestDate = $_GET['TestDate'];
if (isset($_GET['Class'])) $Class = $_GET['Class'];


?>
<table border="0" width="90%">
<form action="AddMarks.php" method="get" id="formControler">
    <tr>
        <td>
             <label for="Class" class="classDiv">Select Class: </label>
        </td>
        <td>
            <select name="Class" id="Class" class="classDiv">

				<?php
				
				for ($i=0; $i<=12; $i++)
				{
					if ($i==0){$c="KG";}
					else {$c=$i;}

					if ($i == 0) echo "<optgroup label=\"KG\">";
					if ($i == 1) echo "</optgroup> <optgroup label=\"Primary\">";
					if ($i == 6) echo "</optgroup> <optgroup label=\"Secondary\">";
					if ($i==$Class)
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
        <td>
            <label for="Subject" class="classDiv">Subject: </label>
        </td>
        <td>
            <select name="Subject" id="Subject" class="subjectDiv">
			
			<?php
			 if ($Subject=="Math")
			 {
			   echo "<option value=\"Math\" Selected>Math</option>";
			 }
			 else
			 {
			   echo "<option value=\"Math\">Math</option>";
			 }


			if ($Subject=="Science")
			 {
			   echo "<option value=\"Science\" Selected>Science</option>";
			 }
			 else
			 {
			   echo "<option value=\"Science\">Science</option>";
			 }

			 ?>
            </select>
        </td>

        <td>
            <label for="TestDate" class="startDateDiv">Test Date: </label>
        </td>
        <td>
            <input
            type="date"
            name="TestDate"
            id="TestDate"
            placeholder="Test Date"
            required
            class="startDateDiv"
			value="<?php echo $TestDate;?>"
			
			
            />
        </td>

<td>
        <label for="ExamTitle" class="ExamTitleDiv">Exam Title: </label></td>
        <td>
            <input
            type="text"
            name="ExamTitle"
            id="ExamTitle"
            placeholder="Exam Title"
            required
            class="ExamTitleDiv" 
			value="<?php echo $ExamTitle;?>"
            />
        </td>

        <td>
        <label for="TotMarks" class="TotMarksDiv">Total Marks </label></td>
        <td>
            <input
            type="text"
            name="TotMarks"
            id="TotMarks"
            placeholder="Total Marks"
            required
            class="TotMarksDiv" 
			value="<?php echo $TotMarks;?>"
            />
        </td>

        <td>
            <button type="submit">Submit</button>
        </td>

    </tr>


        </form>
</table>


<?php
if (isset($_GET['Class']))
{

echo "pppppppppppppppppppppp";

echo '<script>alert("Message")</script>';
	 
	 
	 
   $searchClass = $_GET['Class'];
   $searchSubject = $_GET['Subject'];
   $searchTestDate = $_GET['TestDate'];
   $searchExamTitle = $_GET['ExamTitle'];
   $searchTotMarks = $_GET['TotMarks'];

    echo "<br><h3>Search Class= $searchClass,   Subject=$searchSubject, Date=$searchTestDate, Title=$searchExamTitle, TotMarks=$searchTotMarks </h3><br>";


    echo "<table border=\"1\" width=\"90%\">";
    echo "<tr> <th>Result ID</th> <th>Name</th><th>Total Marks</th><th>Marks Obtained</th>        </tr>";





    $sql = "SELECT * FROM `StInfo` WHERE Class='$searchClass'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {

            $ID = $row["ID"];
            $Name = $row["Name"];

			$sDate=$searchTestDate;

			$sDate = date("jFY", strtotime($searchTestDate));

			$Result_Id=$ID."_$searchSubject"."_$sDate";


			$sql333    = "SELECT TotMarks, MarksObtained FROM StResult where Result_Id='$Result_Id'";
            //echo "<br> sql333= $sql333";    
            $result333 = $conn->query($sql333);
			$row333    = $result333->fetch_row();
			$valTot       = $row333[0];
			$val       = $row333[1];



            echo "<tr>";
			echo "<td>$Result_Id</td>";
            echo "<td>$Name</td>";
                     
			



			
			if ($val != "")
			{
			echo "<td title='Already Filled'>$valTot</td>";
			echo "<td title='Already Filled'>$val</td>";
			}
			else
			{
			echo "<td>$searchTotMarks</td>";
			echo "<td><input type='number'  onchange=\"InsertData('$Result_Id', '$ID', '$searchClass', '$searchTestDate', '$searchSubject', '$searchExamTitle', '$searchTotMarks', this.value)\">$val</td>";
			}
			
			echo "</td>";

			
			
			echo "</tr>";



            //echo "<tr> <td>" . $row["ID"] . " </td><td>" . $row["Name"] . "</td><td></td></tr>";
        }
    } else {
        echo "0 results";
    }

    $conn->close();

echo "</table>";


echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
echo "<h1></h1>";
}

?>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

</body>



</html>