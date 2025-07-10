<?php session_start();
if(empty($_SESSION['username'])){header("Location:loginAdmin.php?type=addstudent"); exit;}
$u=$_SESSION['username'];
//echo "user= $u";
?>

<?php
include 'Config.php'; 


$StName = $_POST['StName'];
$Class = $_POST['Class'];
$Subject = $_POST['Subject'];
$FeesPerMonth = $_POST['FeesPerMonth'];
$Address = $_POST['Address'];
$Mobile = $_POST['Mobile'];
$StDate = $_POST['StDate'];





//$StFname = explode(" ", $StName);
//$ID = $StFname[0] . "_" . $Class;


$StID=$StName;
$StID = str_replace(" ", "-", $StID);
$ID = $StID . "_" . $Class;

if ($Class=="L.K.G" OR $Class=="U.K.G")
{
	$Class=0;
}


$StDate = date("Y-m-d", strtotime($StDate));

// sql query to insert a new record
$sql = "INSERT INTO StInfo (ID, Name, Class, StartDate, Status, Address, Mobile, Summary, FeesPerMonth, FeePaidTotal) VALUES ('$ID', '$StName', '$Class', '$StDate', 'Active', '$Address', '$Mobile', '', '$FeesPerMonth', '0')";

// checking if the insertion is successful
if ($conn->query($sql) === TRUE) {
    echo "record inserted successfully";

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// closing connection
$conn->close();
?>