<html>
<head>
    <link rel="stylesheet" href="tableStyling.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <title>PA3 Tuition Point: Notes</title>
<script language="javascript" type="text/javascript">
 
	function SearchAdvance(searchClass, searchSubject, searchChapter)
	  {		
		window.location.href ='Notes.php' + '?SearchAdvance=Yes' + '&searchClass=' + searchClass + '&searchSubject=' + searchSubject + '&searchChapter=' + searchChapter;
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
if (isset($_GET['searchChapter'])){ $searchChapter = $_GET['searchChapter'];}

?>


<?php

//https://www.vedantu.com/ncert-solutions/ncert-solutions-class-10-maths

$Class6Math = array("Ch 1 - Knowing Our Numbers", "Ch 2 - Whole Numbers", "Ch 3 - Playing with Numbers", "Ch 4 - Basic Geometrical Ideas", "Ch 5 - Understanding Elementary Shapes", "Ch 6 - Integers", "Ch 7 - Fractions", "Ch 8 - Decimals", "Ch 9 - Data Handling", "Ch 10 - Mensuration", "Ch 11 - Algebra", "Ch 12 - Ratio and Proportion", "Ch 13 - Symmetry", "Ch 14 - Practical Geometry");

$Class6Math = array();

$Class6Math = array("Ch 1 - Knowing Our Numbers", "Ch 2 - Whole Numbers");

$Class7Math = array("Ch 1 - Integers", "Ch 2 - Fractions and Decimals", "Ch 3 - Data Handling", "Ch 4 - Simple Equations", "Ch 5 - Lines and Angles", "Ch 6 - The Triangle and Its Properties", "Ch 7 - Congruence of Triangles", "Ch 8 - Comparing Quantities", "Ch 9 - Rational Numbers", "Ch 10 - Practical Geometry", "Ch 11 - Perimeter and Area", "Ch 12 - Algebraic Expressions", "Ch 13 - Exponents and Powers", "Ch 14 - Symmetry", "Ch 15 - Visualising Solid Shapes");

$Class7Math = array("Ch 1 - Integers", "Ch 2 - Fractions and Decimals", "Ch 6 - The Triangle and Its Properties", "Ch 12 - Algebraic Expressions");


$Class8Math = array("Ch 1 - Rational Numbers", "Ch 2 - Linear Equations in One Variable", "Ch 3 - Understanding Quadrilaterals", "Ch 4 - Practical Geometry", "Ch 5 - Data Handling", "Ch 6 - Squares and Square Roots", "Ch 7 - Cubes and Cube Roots", "Ch 8 - Comparing Quantities", "Ch 9 - Algebraic Expressions and Identities", "Ch 10 - Visualising Solid Shapes", "Ch 11 - Mensuration", "Ch 12 - Exponents and Powers", "Ch 13 - Direct and Inverse Proportions", "Ch 14 - Factorisation", "Ch 15 - Introduction to Graphs", "Ch 16 - Playing with Numbers");

$Class8Math = array("Ch 1 - Rational Numbers", "Ch 3 - Understanding Quadrilaterals", "Ch 10 - Visualising Solid Shapes", "Ch 11 - Mensuration");


$Class9Math = array("Ch 1 - Number Systems", "Ch 2 - Polynomials", "Ch 3 - Coordinate Geometry", "Ch 4 - Linear Equations in Two Variables", "Ch 5 - Introduction to Euclids Geometry", "Ch 6 - Lines and Angles", "Ch 7 - Triangles", "Ch 8 - Quadrilaterals", "Ch 9 - Areas of Parallelograms and Triangles", "Ch 10 - Circles", "Ch 11 - Constructions", "Ch 12 - Heron's Formula", "Ch 13 - Surface Areas and Volumes", "Ch 14 - Statistics", "Ch 15 - Probability");

$Class9Math = array();

$Class10Math = array("Ch 1 - Real Numbers", "Ch 2 - Polynomials", "Ch 3 - Pair of Linear Equations in Two Variables", "Ch 4 - Quadratic Equations", "Ch 5 - Arithmetic Progressions", "Ch 6 - Triangles", "Ch 7 - Coordinate Geometry", "Ch 8 - Introduction to Trigonometry", "Ch 9 - Some Applications of Trigonometry", "Ch 10 - Circles", "Ch 11 - Constructions", "Ch 12 - Areas Related to Circles", "Ch 13 - Surface Areas and Volumes", "Ch 14 - Statistics", "Ch 15 - Probability");

$Class10Math = array();


$Class10Science = array("Ch 1 - Chemical Reactions and Equations");


//https://www.vedantu.com/ncert-solutions/ncert-solutions-class-10-maths

if ($searchClass==6 AND $searchSubject=="Math") $ChapList=$Class6Math;  
if ($searchClass==7 AND $searchSubject=="Math") $ChapList=$Class7Math;
if ($searchClass==8 AND $searchSubject=="Math") $ChapList=$Class8Math;
if ($searchClass==9 AND $searchSubject=="Math") $ChapList=$Class9Math;
if ($searchClass==10 AND $searchSubject=="Math") $ChapList=$Class10Math;

if ($searchClass==10 AND $searchSubject=="Science") $ChapList=$Class10Science;
//$ChapList="$$"."Class".$searchClass.$searchSubject;

$ChapListlength=count($ChapList);



?>



<div class="container">



<form action="" method="get" id="formControler" style="text-align: center;
        font-size: 15px;">

            <label for="Class" class="classDiv" style="padding: 10px;
        margin: 10px;font-weight: bold;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin: 1rem;
        font-size: 1.6rem;
        margin-bottom: 2rem;">Notes: Class: </label>
            <select name="searchClass" id="Class" class="classDiv" style="padding: 10px;
    width: 20%;
    margin: 1rem;font-size: 1.2rem;
    border-radius: 10px;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande',
        'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.2);
    width: 12%;" onChange="SearchAdvance(this.value, '<?php echo $searchSubject; ?>', '<?php echo $searchChapter; ?>')"> 
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
    width: 10%;" onChange="SearchAdvance('<?php echo $searchClass; ?>', this.value, '<?php echo $searchChapter; ?>')">
             
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

					<label for="Chapter" class="classDiv" style="padding: 10px;
        margin: 10px;font-weight: bold;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin: 1rem;
        margin-bottom: 2rem;
        font-size: 1.6rem;">Chapter: </label>



		<select name="searchChapter" id="Chapter" class="ChapterDiv" style="margin-left: 2.9rem;
    width: 22%;padding: 10px;
    width: 20%;
    margin: 1rem;font-size: 1.2rem;
    border-radius: 10px;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande',
        'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.2);
    width: 15%;" onChange="SearchAdvance('<?php echo $searchClass; ?>', '<?php echo $searchSubject; ?>', this.value)">
			
			<?php
			

			 for($x = 0; $x < $ChapListlength; $x++)
			 {
			   //echo $FieldList[$x];
			   echo "<option value='$ChapList[$x]' ";
			   if($searchChapter==$ChapList[$x]) echo "selected";
			   #echo ">$JournalListArray[$x] PPP $searchJournal</option>";
			   echo ">$ChapList[$x]</option>";
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

$Path="../Notes/Class".$searchClass."/".$searchSubject."/Notes_Class".$searchClass."_".$searchSubject."_".$ch.".pdf";

$Path="Notes/Class".$searchClass."/".$searchSubject."/Notes_Class".$searchClass."_".$searchSubject."_".$ch.".pdf";
$PathNotFound="Notes/PathNotFound.html";


$YouTubeLink="";

echo "<br>$searchClass  $searchSubject  $ch <br>";

if ($searchClass=="6" AND $searchSubject=="Math" AND $ch=="Ch1")
$YouTubeLink="https://www.youtube.com/embed?v=pdd-1xwV4Rk&list=PLVsAToyblOtgAQwhcnlSuNgYPfQDVm6jP&index=1";

if ($searchClass=="6" AND $searchSubject=="Math" AND $ch=="Ch2")
$YouTubeLink="https://www.youtube.com/embed?v=5l9BLntw9Fo&list=PLVsAToyblOtgAQwhcnlSuNgYPfQDVm6jP&index=7";


if ($searchClass=="7" AND $searchSubject=="Math" AND $ch=="Ch1")
$YouTubeLink="https://www.youtube.com/embed?v=AorcoOxi3xo&list=PLVsAToyblOtgtyfKoJZo3szksgYbwAM5f&index=1";

if ($searchClass=="7" AND $searchSubject=="Science" AND $ch=="Ch1")
$YouTubeLink="https://www.youtube.com/embed?v=Qssyo1VjQiw&list=PLVsAToyblOtgQj47UReKzd2T4XFUc3wbQ";



if ($searchClass=="8" AND $searchSubject=="Science" AND $ch=="Ch1")
$YouTubeLink="https://www.youtube.com/embed?v=jOTqeD9Wl0k&list=PLVsAToyblOthN7yWs2VTYeOcepDMSUSmA";

if ($searchClass=="10" AND $searchSubject=="Science" AND $ch=="Ch1")
$YouTubeLink="https://www.youtube.com/embed?v=DAXu8RcH_Yg";


//echo "<br>Path= $Path";


if ($YouTubeLink=="")
{
	echo "<h1><a href=\"https://www.youtube.com/channel/UCkLAaV2RfpqjmatYhQlRyag\" target='_Blank'>Click for YouTube: PA3 Tuition Point </a></h1>";
}
else
{
	echo "<h3 style=\"text-align:center;\"><iframe  width=\"600\" height=\"315\" class=\"pvs_video\" src=\"$YouTubeLink\" frameborder=\"1\" allowfullscreen=\"\"></iframe></h3>";
}




if (file_exists($Path))
{
 //echo "<br>The file $Path exists";


// <div class="col-sm-6">
  //                      <div class="thumbnail videosection">
              //                   <iframe class="pvs_video" src="https://www.youtube.com/embed?v=AorcoOxi3xo&list=PLVsAToyblOtgtyfKoJZo3szksgYbwAM5f&index=1" frameborder="0" allowfullscreen=""></iframe>
    //                        <div class="caption">
      //                          <h4><strong>  Multipliers: What makes us No. 1  </strong></h4>
        //                    </div>
          //              </div>
            //        </div>

//echo "<table with =\"100%\" border=\"1\"> <tr>";



//echo "<td with =\"20%\">";


//echo "</td><td with =\"80%\">";
 echo "<iframe id=\"myFrame\" name=\"myFrame\" width=\"100%\" frameBorder=\"1\" height=\"1000\" scrolling=\"no\" marginwidth=\"0\" marginheight=\"0\" style=\"overflow: auto; display: block;\" src=\"$Path\"> </iframe>";
//echo "</td></tr> </table>";

} 
else
{
   // echo "<br>The file $Path does not exist";


	echo "<iframe id=\"myFrame\" name=\"myFrame\" width=\"100%\" frameBorder=\"1\" height=\"1000\" scrolling=\"no\" marginwidth=\"0\" marginheight=\"0\" style=\"overflow: auto; display: block;\" src=\"$PathNotFound\"> </iframe>";
}

?>
</body>

</html>