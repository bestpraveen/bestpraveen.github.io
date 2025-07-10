<?php
include 'Config.php'; 

//InsertMarksInDB.php?Result_IdIns=Nandani&IDIns=pppppppp&searchTestDateIns=2021-01-02&searchSubjectIns=Math&searchExamTitleIns=ttttt&searchTotMarksIns=100&MarksObtainedIns=88;

//url="InsertMarksInDB_ReTest.php?Result_IdIns="+Result_Id+"&IDIns="+IDIns+"&searchClassIns="+searchClassIns+"&searchTestDateIns="+searchTestDateIns+"&searchSubjectIns="+searchSubjectIns+"&searchExamTitleIns="+searchExamTitleIns+"&searchTotMarksIns="+searchTotMarksIns+"&MarksObtainedIns="+MarksObtainedIns+"&Percentage="+Percentage;


//InsertMarksInDB_ReTest.php?Result_IdIns=yash_8&IDIns=yas_8&searchClassIns=8&searchTestDateIns=2021-11-01&searchSubjectIns=Math&searchExamTitleIns=Testdfdfdfd&searchTotMarksIns=55&MarksObtainedIns=55&Percentage=100;


//INSERT INTO `StResult_ReTest` (`SN`, `Result_Id`, `ID`, `Class`, `ExamDate`, `Subject`, `Level`, `TotMarks`, `MarksObtained`, `Percentage`) VALUES (NULL, '', '', '7', '2021-08-19', 'Math', '', '1000', '10000', '100000.00');


	$Result_Id=$_GET['Result_IdIns'];
    $ID=$_GET['IDIns'];
	$ExamDate=$_GET['searchTestDateIns'];
	$Class=$_GET['searchClassIns'];
	$Subject=$_GET['searchSubjectIns'];

	$Level=$_GET['searchExamTitleIns'];
	$TotMarks=$_GET['searchTotMarksIns'];
    $MarksObtained=$_GET['MarksObtainedIns'];
	$Percentage=$_GET['Percentage'];


    $sql3 = "INSERT INTO `StResult_ReTest` (`Result_Id`, `ID`, `Class`, `ExamDate`, `Subject`, `Level`, `TotMarks`, `MarksObtained`, `Percentage`) VALUES ('$Result_Id', '$ID', '$Class', '$ExamDate', '$Subject', '$Level', '$TotMarks', '$MarksObtained', '$Percentage')";

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