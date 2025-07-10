<html>
<head>
    <link rel="stylesheet" href="tableStyling.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <title>PA3 Tuition Point : Books and Sample Papers</title>
<script language="javascript" type="text/javascript">
 
	function SearchAdvance(searchClass, searchSubject)
	  {		
		window.location.href ='SamplePaper.php' + '?SearchAdvance=Yes' + '&searchClass=' + searchClass + '&searchSubject=' + searchSubject;
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


if (isset($_GET['searchSubject']))
{
$Subject = $_GET['searchSubject'];
}

if (isset($_GET['searchClass'])){ $searchClass = $_GET['searchClass'];}
if (isset($_GET['searchSubject'])){ $searchSubject = $_GET['searchSubject'];}
?>



<div class="container">



<form action="" method="get" id="formControler" style="text-align: center;
        font-size: 15px;">

            <label for="Class" class="classDiv" style="padding: 10px;
        margin: 10px;font-weight: bold;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin: 1rem;
        font-size: 1.6rem;
        margin-bottom: 2rem;">Books and Sample Papers: Class: </label>
            <select name="searchClass" id="Class" class="classDiv" style="padding: 10px;
    width: 20%;
    margin: 1rem;font-size: 1.2rem;
    border-radius: 10px;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande',
        'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.2);
    width: 12%;" onChange="SearchAdvance(this.value, '<?php echo $searchSubject; ?>')"> 
                <!--<option value="15">All Classes</option>-->
				<?php
				
				for ($i=6; $i<=12; $i++)
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

				if ($searchClass=="MissionIIT")
					{
					 echo "<optgroup label=\"Mission IIT\"><option value=\"MissionIIT\" Selected>Mission IIT</option> </optgroup>";
					}
					else
					{
 					 echo "<optgroup label=\"Mission IIT\"><option value=\"MissionIIT\">Mission IIT</option> </optgroup>";
					}
				
				?>


                </optgroup>
            </select>


			<label for="Subject" class="classDiv" style="padding: 10px;
        margin: 10px;font-weight: bold;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin: 1rem;
        margin-bottom: 2rem;
        font-size: 1.6rem;">Subject: </label>
            <select name="searchSubject" id="Subject" class="SubjectDiv" style="margin-left: 2.9rem;
    width: 22%;padding: 10px;
    width: 20%;
    margin: 1rem;font-size: 1.2rem;
    border-radius: 10px;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande',
        'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.2);
    width: 10%;" onChange="SearchAdvance('<?php echo $searchClass; ?>', this.value)">
             
			 <?php
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
        </form> 



<!-- src="https://drive.google.com/viewerng/viewer?embedded=true&url=http://infolab.stanford.edu/pub/papers/google.pdf#toolbar=0& -->


<?php

$chA  = explode("-", $searchChapter);
$ch  = $chA[0];
$ch=str_replace(" ", "", $ch);

$Path="SamplePapers/Class".$searchClass."/".$searchSubject;
$PathNotFound="SamplePapers/PathNotFound.html";
//echo "<br>Path= $Path";

echo "<h1>Class $searchClass : $searchSubject</h1>";


$sn=0;
//$files = scandir($Path);
$files = array_diff(scandir($Path), array('.', '..'));
foreach($files as $file)
{
	if (file_exists("$Path//$file"))
	{
			$sn++;
	$file1=$file;
	$file1=str_replace("_", " ", $file1);
	$file1=str_replace("Class$searchClass", " ", $file1);
	$file1=str_replace("$searchSubject", " ", $file1);
	  echo "<br><br><b>$sn.</b> <a target='_Blank' style='text-decoration: none;' href='$Path//$file'>$file1</a>";
	} 
	else
	{
		echo "<iframe id=\"myFrame\" name=\"myFrame\" width=\"100%\" frameBorder=\"1\" height=\"1000\" scrolling=\"no\" marginwidth=\"0\" marginheight=\"0\" style=\"overflow: auto; display: block;\" src=\"$PathNotFound\"> </iframe>";
	}
}




if ($searchClass=="7" AND $searchSubject=="Math")
$IIT_LevelSample="https://drive.google.com/drive/folders/1QBELcNwWAHl0y_H-OcMZuQihpPFO-sck?usp=sharing"; //Full Math Folder


if ($searchClass=="8" AND $searchSubject=="Math")
//$IIT_LevelSample="https://drive.google.com/drive/folders/1-OILU0BRyyoOYH_07Q8slURhWvlbdSza?usp=sharing";
$IIT_LevelSample="https://drive.google.com/drive/folders/1rCuk9BcuAu-gM_ct8GrG7WBSksTCpPAX?usp=sharing"; //Full Math Folder

if ($searchClass=="8" AND $searchSubject=="Science")
$IIT_LevelSample="https://drive.google.com/drive/folders/1lzBcywf1lKP5SNuawQ6lghE_F-xif8GE?usp=sharing";




if ($searchClass=="9" AND $searchSubject=="Math")
//$IIT_LevelSample="https://drive.google.com/drive/folders/1GLAbjv3x4Lo2apV88gjli5LNaj9hwnZJ?usp=sharing";
$IIT_LevelSample="https://drive.google.com/drive/folders/1lHrH6mrRXOtte6ylHNeBy5pV0QqihgM3?usp=sharing"; //Full Math Folder

if ($searchClass=="9" AND $searchSubject=="Science")
$IIT_LevelSample="https://drive.google.com/drive/folders/1RNXwMht5-tU40ejOgp-QZ5k62wgT7rJa?usp=sharing";


if ($searchClass=="10" AND $searchSubject=="Math")
//$IIT_LevelSample="https://drive.google.com/drive/folders/138smtxXME3Nk1OjJifp-poReDqc-toiY?usp=sharing";
$IIT_LevelSample="https://drive.google.com/drive/folders/1d-LwPW2WpisYNnoLTURdnPq22nlqdjka?usp=sharing"; //Full Math Folder

if ($searchClass=="10" AND $searchSubject=="Science")
$IIT_LevelSample="https://drive.google.com/drive/folders/16AS-TkeffYSW5fWT-IPJ-cDZPElve7J0?usp=sharing";


if ($searchClass=="12" AND $searchSubject=="Math")
$IIT_LevelSample="https://drive.google.com/drive/folders/16fBWnxvax8najLarhwAPVR2siogZAzrk?usp=sharing";




$MCQFile="MCQ\\Class".$searchClass."_".$searchSubject."\\MCQ_".$searchClass."_".$searchSubject.".html";

$NCERT="NCERT\\Class".$searchClass."_".$searchSubject."\\NCERT_".$searchClass."_".$searchSubject.".html";
$RS="RS\\Class".$searchClass."_".$searchSubject."\\RS_".$searchClass."_".$searchSubject.".html";



if ($searchClass=="8" OR $searchClass=="11")
echo "<br><br><h1><a target='_Blank' href=\"$NCERT\">NCERT With Solution</a></h1>";

if ($searchClass=="7" OR $searchClass=="8" OR $searchClass=="10" OR $searchClass=="11")
echo "<br><br><h1><a target='_Blank' href=\"$RS\">RS Aggarwal With Solution</a></h1>";



if ($searchClass=="9" OR $searchClass=="10" OR $searchClass=="11" OR $searchClass=="12")
echo "<br><br><h1><a target='_Blank' href=\"$MCQFile\">multiple-choice questions (MCQ)</a></h1>";

if ($searchClass=="6" OR $searchClass=="7" OR $searchClass=="8" OR $searchClass=="9" OR $searchClass=="10" OR $searchClass=="11" OR $searchClass=="12")
echo "<br><br><h1><a target='_Blank' href=\"$IIT_LevelSample\">Click for (Extra Books and Sample Papers)</a></h1>";


if ($searchClass=="MissionIIT")
echo "<br><br><h1><a target='_Blank' href=\"$MCQFile\">multiple-choice questions (MCQ)</a></h1>";


if (file_exists($Path))
{
 //echo "<br>The file $Path exists";
 
 
 
 //echo "<iframe id=\"myFrame\" name=\"myFrame\" width=\"100%\" frameBorder=\"1\" height=\"1000\" scrolling=\"no\" marginwidth=\"0\" marginheight=\"0\" style=\"overflow: auto; display: block;\" src=\"$Path\"> </iframe>";




} 
else
{
   // echo "<br>The file $Path does not exist";
	echo "<iframe id=\"myFrame\" name=\"myFrame\" width=\"100%\" frameBorder=\"1\" height=\"1000\" scrolling=\"no\" marginwidth=\"0\" marginheight=\"0\" style=\"overflow: auto; display: block;\" src=\"$PathNotFound\"> </iframe>";
}

?>

</body>
</html>