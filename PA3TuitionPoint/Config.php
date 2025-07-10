 <?php
        error_reporting(1);
        $servername = "localhost";
        $username   = "id17448203_pa3tuition";
        $password   = "Praveen12345#";
        $dbname     = "id17448203_pa3tuitiondbname";
        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        // Check connection

		if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
		else
		{
		   //echo "Database Connected";
		}
?>