<?php
include 'Config.php'; 

//InsertMarksInDB.php?Result_IdIns=Nandani&IDIns=pppppppp&searchTestDateIns=2021-01-02&searchSubjectIns=Math&searchExamTitleIns=ttttt&searchTotMarksIns=100&MarksObtainedIns=88;

//url="InsertMarksInDB.php?Result_IdIns="+Result_Id+"&IDIns="+IDIns+"&searchClassIns="+searchClassIns+"&searchTestDateIns="+searchTestDateIns+"&searchSubjectIns="+searchSubjectIns+"&searchExamTitleIns="+searchExamTitleIns+"&searchTotMarksIns="+searchTotMarksIns+"&MarksObtainedIns="+MarksObtainedIns+"&Percentage="+Percentage;

//INSERT INTO `StFees` (`Fee_Id`, `ID`, `Class`, `Date`, `FeesPaid`, `FeeMonth`, `Summary`) VALUES ('nanda7_555', 'nanani_7', '7', '2021-01-02', '2000', 'aug', 'Summary');

//InsertFeeInDB.php?selday=9&FeesPaid=9999999&searchSummary=aaaa99999&submit=Submit&Fee_Id=Abhay_9_Aug_2021&ID=Abhay_9&Class=9&Date=2021-8-&searchMonth=8



	$Fee_Id=$_GET['Fee_Id'];
    $ID=$_GET['ID'];
	$Class=$_GET['Class'];
	$Date=$_GET['Date'];
	$FeesPaid=$_GET['FeesPaid'];
	$FeeMonth=$_GET['searchMonth'];
	$Summary=$_GET['searchSummary'];

	$selday=$_GET['selday'];
	$Date=$Date.$selday;





    $sql3 = "INSERT INTO StFees (`Fee_Id`, `ID`, `Class`, `Date`, `FeesPaid`, `FeeMonth`, `Summary`) VALUES ('$Fee_Id', '$ID', '$Class', '$Date', '$FeesPaid', '$FeeMonth', '$Summary');";

   //echo $sql3;
  

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




//UPDATE StInfo SET FeePaidTotal = FeePaidTotal+1000 WHERE ID='Abhay_9';
$sql333 = "UPDATE StInfo SET FeePaidTotal = FeePaidTotal+$FeesPaid WHERE ID='$ID'";
//echo $sql333;
	 if(mysqli_query($conn, $sql333))
     { 
      echo "<br> Updated Database";
	 // echo "<script type='text/javascript'>alert ('Record $ID Inserted successfully.');</script>";
	 }
	 else
	 {
	 echo "<br><span style='font-weight:bold;color:red'>Error: (Pls. Contact to Site Admin) </span>".mysqli_error($conn)."<br></span>";
	    echo $sql333;
		 echo "<script type='text/javascript'>alert ('Error');</script>";
	 }




?>

<br><br><br><br><br>

<form>
 <input type="button" value="Go back!" onclick="history.back()">
</form>