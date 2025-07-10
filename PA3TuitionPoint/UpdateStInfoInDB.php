<?php
include 'Config.php'; 

//InsertMarksInDB.php?Result_IdIns=Nandani&IDIns=pppppppp&searchTestDateIns=2021-01-02&searchSubjectIns=Math&searchExamTitleIns=ttttt&searchTotMarksIns=100&MarksObtainedIns=88;

//url="InsertMarksInDB.php?Result_IdIns="+Result_Id+"&IDIns="+IDIns+"&searchClassIns="+searchClassIns+"&searchTestDateIns="+searchTestDateIns+"&searchSubjectIns="+searchSubjectIns+"&searchExamTitleIns="+searchExamTitleIns+"&searchTotMarksIns="+searchTotMarksIns+"&MarksObtainedIns="+MarksObtainedIns+"&Percentage="+Percentage;

//INSERT INTO `StResult` (`SN`, `Result_Id`, `ID`, `Class`, `ExamDate`, `Subject`, `Level`, `TotMarks`, `MarksObtained`, `Percentage`) VALUES (NULL, '', '', '7', '2021-08-19', 'Math', '', '1000', '10000', '100000.00');





    $ID=$_GET['ID'];
	$Status=$_GET['Status'];

	$sql3 = "UPDATE StInfo SET Status='$Status' WHERE ID='$ID'";

    echo $sql3;
//	$result=mysqli_query($conn, $sql3);

	 if(mysqli_query($conn, $sql3))
     { 
      echo "<br> Updated Database";
	 // echo "<script type='text/javascript'>alert ('Record $ID Inserted successfully.');</script>";
	 }
	 else
	 {
	 echo "<br><span style='font-weight:bold;color:red'>Error: (Pls. Contact to Site Admin) </span>".mysqli_error($conn)."<br></span>";
	    echo $sql3;

		 echo "<script type='text/javascript'>alert ('Error');</script>";
	 }
?>