<?php session_start();
?>
<html>
<script type="text/javascript" src="js/jquery.min.js"></script>
<SCRIPT language="javascript">window.history.forward(1);</script>
<SCRIPT language="javascript">
	function Validate()
	{
		if (document.myForm.username.value=="")
		{
			alert(' Login Id cannot be left blank. ');
			document.myForm.username.focus();
			return false;		
		}
		
		if (document.myForm.pswd.value=="")
		{
			alert(' Password cannot be left blank. ');
			document.myForm.pswd.focus();
			return false;		

		}
		myform.submit();
	}
function doResizeWindow()
{
 var oHeight=window.innerHeight-$("#header").height()-10;
 $("#container").height(oHeight);
}

</SCRIPT>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>PA3 Tuition Point</title>
<link href="style1.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
</head>
<body onLoad="document.myForm.username.focus();doResizeWindow()" oncontextmenu="return false">
<?php
//        error_reporting(1);
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


//include 'Config.php'; 
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

$dispMsg="";

if(isset($_POST['validateLogin']))
{
	

	$uid = $_POST['username'];	
	$pwd = $_POST['pswd'];

    //$encrypted_mypassword= md5($pwd);
	//$encrypted_mypassword= $pwd;

    $Query="SELECT * from tblusers_Portland where UserId='$uid' AND Password='$encrypted_mypassword'";
	
	$Result=mysqli_query($dbLink, $Query);
	$res=mysqli_fetch_object($Result);
    $_SESSION['username']=$res->UserId;
    $_SESSION['password']=$res->Password;
	$_SESSION['userid']=$res->id;
	$_SESSION['UserDisplayName']=$res->UserDisplayName;
	$_SESSION['usertype']=$res->UserType;
    $usid=$_SESSION['username'];
	$pass=$_SESSION['password'];

	$UserDisplayName=$_SESSION['UserDisplayName'];

if (!empty($usid))
		{

			if ($usid == "vzn")
			{
//				echo " TRUUUUUUUUUUUUUUUU";
			 header("Location:AddMarks.php");

			 exit();
			}
			else
			{
			 header("Location:AddMarks.php");
			 exit();
			}
		}
		else
		{
//			echo " FALSSSSSSSSSS";
			header("Location:loginAdmin.php?errMsg=y");
			exit();
		}
}
if(isset($_REQUEST['errMsg']))
{
	$dispMsg = "Invalid Login Id or Password. Please try again.";
}
?>
<div id="container" class="container">
<div id="header">
	<div class="logo_base">
	<div class="logo-img">
        <a href="" rel="home" title="PA3TuitionPoint"><img src="img/Newlogo.png" border="0" alt="PA3TuitionPoint" id="logo"></a> 
		</div>
		</div>
	</div>
<div id="container_demo" >	
 <div id="wrapper">

	<div id="login" class="animate form">
		<form name=myForm method="post" action="<?=$_SERVER['PHP_SELF']?>"> 
			<h1>Log in</h1>
			<div><img src="img/sep_bg.jpg"></div>
			<p> 
				<label for="username" class="uname" data-icon="u" > Your username </label>
				<input id="username" name="username" type="text" placeholder="my username "/>
			</p>
			<p> 
				<label for="password" class="youpasswd" data-icon="p"> Your password </label>
				<input id="pswd" name="pswd" type="password" placeholder="eg. X8df!90EO" /> 
				
			</p>
			<p class="inval_msg1"><?=$dispMsg?></p>
			<p class="login button"> 
				<input name="validateLogin" type="submit" id="Submit" value="Login" onClick="return Validate();" > &nbsp; 
				<input name="Cancel" type="button" id="Cancel" value="Cancel" onClick="document.location='loginAdmin.php'">
			</p>
			

		</form>
		</div>
     </div>	
    </div>
</div>
<div class="footer_panel"><div class="copyrights">Powered by PA3 Tuition Point</div><div>
</body>
</html>