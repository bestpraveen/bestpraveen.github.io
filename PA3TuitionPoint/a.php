<html>

<body>

<?php
echo "pppppppppppp";

exit;


$a="Aniket";

echo " $a";



$servername = "localhost";
$username = "pa3tuition";
$password = "Aniket@123456";
$dbname = "PA3TuitionDBName";


$dbname = "id17448203_pa3tuitiondbname";
$username = "id17448203_pa3tuition";

// Create connection
$conn= mysqli_connect($servername,$username,$password,$dbname);
// Check connection

if (!$conn) 
{
  die("Connection failed: " . mysqli_connect_error());
}

echo "Connected Successfully.";



$sql = "SELECT * FROM StInfo";
$result = $conn->query($sql);

//echo "<table>";

?>


<table border="1" width="90%">
<th>ID</th> 
<th>Name</th> 
<th>Class</th> 


<?php
if ($result->num_rows > 0)
{
     // output data of each row
	  while($row = $result->fetch_assoc()) 
	 {
		echo "<tr> <td>".$row["ID"]. " </td><td>" . $row["Name"]. "</td><td></td></tr>";
	}
} 
else
{
  echo "0 results";
}

$conn->close();
?>

</table>


</html>