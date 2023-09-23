
<?php
mysql_connect("localhost","root","%9,l6rTDZ=k1");
mysql_select_db("vetting") or die("database could not connect ");
error_reporting(0);
?>
<?php
function valid($id, $purposeofvetting, $firstname,$lastname,$national_ID,$nationality,$organization,$title,$phone,$decision,$remarks,$verification,$suppervisor_comment, $error)
{
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>

    <meta charset="UTF-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>vetting form</title>
    <link href="css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/bootstra.min.css">
    <link href="dist/jquery.simplewi.css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="csheet/divinfo.css"/>
	<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />
	<link rel="stylesheet" href="assets/css/ace.min1.css" class="ace-main-stylesheet" id="main-ace-style" />

<title>Edit Records</title>
</head>
<!--<body bgcolor="#BDB76B">--> 
<style type="text/css">
table.altrowstable {
	font-family: verdana,arial,sans-serif;
	font-size:11px;
	color:#333333;
	border-width: 1px;
	border-color: #a9c6c9;
	border-collapse: collapse;
}
table.altrowstable th {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #a9c6c9;
}
table.altrowstable td {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #a9c6c9;
}
.oddrowcolor{
	background-color:#d4e3e5;
}
.evenrowcolor{
	background-color:#c3dde0;
}

body {
    
    background-color: #008b8b;
}


</style>
<body>

<?php

if ($error != '')
{
echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';
}
?>
 <div class="container">
    <h1>The Purpose of this Vetting is " <?php echo $purposeofvetting; ?>"</h1>
      
 <div class="wizard-header">
             
            </div>
			
			<!--end of header div -->
			
            <div class="wizard-content">
                <div>
				
<div >

<!--**************************************************************************************************************BASIC INFORMATION************************************************************************************************************************************************************************************-->		


<form action="edit_sup.php" method="post">
<input type="hidden" name="id" value="<?php echo $id; ?>"/>


<p align="right"><button type="submit" name="submit" value="Submit Records" class="btn btn-success" > <i class="glyphicon glyphicon-ok-sign"></i> Send</button></p>

<p>
<?php 
session_start();

require_once 'dbconfig.php';
$id = $_GET['id'];
$_SESSION['ID']= $id;
$stmt = $DB_con->prepare("select *  from profile_pic WHERE id=$id") or die (mysql_error());
	$stmt->execute();
	
	if($stmt->rowCount() > 0)
	{
		while($row=$stmt->fetch(PDO::FETCH_ASSOC))
		{
			extract($row);
			?>
			<img src="user_images/<?php echo $row['userPic']; ?>" style="float:left;width:250px;height:250px; border-radius: 30%;padding: 20px 40px;  margin: 5px;" />
			<?php
		}
	}
	else
	{
		?>
       
            	<img src="user_images/profile_avatar.png" style="float:left;width:250px;height:250px; border-radius: 30%;padding: 20px 40px;  margin: 5px;" />
      
        <?php } ?>
		
		
<table style="background-image: url('user_images/logo.png'); background-color:#e5f5e8; background-repeat: no-repeat;background-position: center; width: 65%; border: 0px;">

<tr style="color:#e5f5e8"><td></td><td>.</td><td>.</td></tr>
<tr><td></td><td> First Name</td><td></td></tr>
<tr><td></td><td><strong><input style=" background:transparent; color:#000000; padding: 1px 20px; margin: 8px 0; box-sizing: border-box;border: 2px; border-radius: 4px;" type="text" name="firstname" value="<?php echo $firstname; ?>" /></strong></td><td></td></tr>

<tr><td></td><td> Last Name</td><td></td></tr>
<tr><td></td><td><strong><input style=" background:transparent; color:#000000; padding: 1px 20px; margin: 8px 0; box-sizing: border-box;border: 2px; border-radius: 4px;" type="text" name="lastname" value="<?php echo $lastname; ?>" /></strong></td><td></td></tr>
<tr><td></td><td>Nationality</td><td></td></tr>
<tr><td></td><td><strong><input style=" background:transparent; color:#000000; padding: 1px 20px; margin: 8px 0; box-sizing: border-box;border: 2px; border-radius: 4px;" type="text" name="nationality" value="<?php echo $nationality; ?>" /></strong></td><td></td></tr>
<tr><td></td><td>National ID/Passport number</td><td></td></tr>
<tr><td></td><td><strong><input style=" background:transparent; color:#000000; padding: 1px 20px; margin: 8px 0; box-sizing: border-box;border: 2px; border-radius: 4px;" type="text" name="national_ID" value="<?php echo $national_ID; ?>" /></strong></td><td></td></tr>
<tr><td></td><td>Phone : <strong><input style=" background:transparent; color:#000000; padding: 1px 20px; margin: 8px 0; box-sizing: border-box;border: 2px; border-radius: 4px;" type="text" name="phone" value="<?php echo $phone; ?>" /></strong></td><td></td></tr>
<tr style="color:#e5f5e8"><td></td><td>.</td><td>.</td></tr>


</table>  
</p>





</tr>
</table>
</div>


<table align="center">

<tr bgcolor="#2F4F4F" style="color:#FFFFFF"><th> DECISION </th><th>  REMARKS </th><th>  VERIFICATION </th><th> &nbsp; SUPERVISOR COMMENT </th></tr>
<tr>
<td style="text-align: top;" > <input style="background:transparent;border:none;" type="text" name="decision" value="<?php echo $decision; ?>" /></td>

<td>  <label><textarea style="background:transparent;border:none;" rows="2" cols="30" name="remarks" ><?php echo $remarks; ?></textarea></label> </td>

<td >  <label><select name="verification" style="width: 80%; background:transparent ;border:none; padding: 1px 20px; margin: 8px 0; box-sizing: border-box;border: 2px solid #008b8b; border-radius: 4px;"required>
   <option value=""></option>
   <option value="No Correction">No Correction</option>
   <option value="Make Corrections">Make Corrections</option>
   <option value="Unverified">unverified</option></label> </td>
  
<td style="color:#000000">  <label><strong><textarea style="background-color:#f8dddb;border:none;" rows="2" cols="30" name="suppervisor_comment" ><?php echo $suppervisor_comment; ?></textarea></strong></label </td>
</tr>

</table>
</form>

<!--**************************************************************************************************************BASIC INFORMATION************************************************************************************************************************************************************************************-->		


<?php
}

include('config.php');

if (isset($_POST['submit']))
{

if (is_numeric($_POST['id']))
{

$id = $_POST['id'];
$purposeofvetting = mysql_real_escape_string(htmlspecialchars($_POST['purposeofvetting']));
$firstname = mysql_real_escape_string(htmlspecialchars($_POST['firstname']));
$lastname = mysql_real_escape_string(htmlspecialchars($_POST['lastname']));
$national_ID = mysql_real_escape_string(htmlspecialchars($_POST['national_ID']));
$nationality = mysql_real_escape_string(htmlspecialchars($_POST['nationality']));
$organization = mysql_real_escape_string(htmlspecialchars($_POST['organization']));
$title = mysql_real_escape_string(htmlspecialchars($_POST['title']));
$phone = mysql_real_escape_string(htmlspecialchars($_POST['phone']));
$decision = mysql_real_escape_string(htmlspecialchars($_POST['decision']));
$remarks = mysql_real_escape_string(htmlspecialchars($_POST['remarks']));
$verification = mysql_real_escape_string(htmlspecialchars($_POST['verification']));
$suppervisor_comment = mysql_real_escape_string(htmlspecialchars($_POST['suppervisor_comment']));



if ( $firstname == '' || $lastname == '' || $national_ID == '' || $nationality == '' || $phone == '' || $decision == '' || $remarks == '' || $verification == '' || $suppervisor_comment == '')
{

$error = 'ERROR: Please fill in all required fields!';


valid($id,  $firstname,$lastname,$national_ID,$nationality,$phone,$decision,$remarks,$verification,$suppervisor_comment, $error);
}
else
{

mysql_query("UPDATE indiv_archive SET  firstname='$firstname', lastname='$lastname', national_ID='$national_ID', nationality='$nationality', phone='$phone', decision='$decision', remarks='$remarks', verification='$verification', suppervisor_comment='$suppervisor_comment' WHERE id='$id'")
or die(mysql_error());

header("Location: suppervisor.php");
}
}
else
{

echo 'Error!';
}
}
else

{

if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0)
{

$id = $_GET['id'];
$result = mysql_query("SELECT * FROM indiv_archive WHERE id=$id")
or die(mysql_error());
$row = mysql_fetch_array($result);

if($row)
{

$purposeofvetting = $row['purposeofvetting'];
$firstname = $row['firstname'];
$lastname = $row['lastname'];
$national_ID = $row['national_ID'];
$nationality = $row['nationality'];
$organization = $row['organization'];
$title = $row['title'];
$phone = $row['phone'];
$decision = $row['decision'];
$remarks = $row['remarks'];
$verification = $row['verification'];
$suppervisor_comment = $row['suppervisor_comment'];


valid($id, $purposeofvetting, $firstname, $lastname, $national_ID, $nationality, $organization, $title,$phone,$decision,$remarks,$verification,$suppervisor_comment,'');
}
else
{
echo "No results!";
}
}
else

{
echo 'Error!';
}
}
?>

<!--**************************************************************************************************************FAMILLY BACKGROUND************************************************************************************************************************************************************************************-->		


<form name="search" method="post" action="edit.php">
<div align="center">
<table style="align:center; width: 95%; border: 0px solid black; background:#DCDCDC;">

<tr bgcolor="#2F4F4F" style="color:#FFFFFF">
<td>Relationship</td>
<td>Names</td>
<td>Place of Birth</td>
<td>Date of Birth</td>
<td>Occupation</td>
<td>Address</td>
<td>History</td>


<?php
$search=$_POST["search"];
$flag=0;


echo '<h2>Family Background Records  ';

echo "</h2><br>";


$query="select * from family_bg where id=$id";



$result=mysql_query($query);
 while ($row = mysql_fetch_array($result)) { 
$flag=1;
 echo "<tr ><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td><td>$row[7]</td><td>$row[8]</td></td></tr>";


 }
 if($flag==0)
 echo "<tr><td colspan='3' align='center' style='color:red'>Record not
found</td></tr>";



?>
<tr>
<td colspan="17">&nbsp;</td></tr>
<tr bgcolor="#CCCCCC">
<th colspan="17" align="right"></th>
</table>
<div>
</form>

<!--**************************************************************************************************************PERSONAL DETAILS************************************************************************************************************************************************************************************-->		

<?php
mysql_connect("localhost","root","%9,l6rTDZ=k1");
mysql_select_db("vetting") or die("database could not connect ");
?>

<form name="search" method="post" action="radio_records.php">
<div align="center">
<table style="align:center; width: 95%; border: 0px solid black; background:#DCDCDC;">

<!--<tr>
<td colspan="16" style="background:silver; color:#FFFFFF; fontsize:800px">Search</td>
</tr>
<tr>
<td>Enter Search Keyword</td>
<td><input type="text" name="search" size="17" placeholder="ID" /></td>
<td><input type="submit" value="Search"/></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
-->
<tr bgcolor="#2F4F4F" style="color:#FFFFFF">
<td>Country</td>
<td>Province</td>
<td>District</td>
<td>Secter</td>
<td>Cell</td>
<td>Village</td>
<td><font color="#0b5345">....</font></td>
<?php
$search=$_POST["search"];
$flag=0;

$search=$_POST["search"];
$flag=0;


echo '<h2>Personal Details of:   ';
echo '';

echo $firstname;
echo '        ';
echo $lastname;
echo "</h2><br>";

echo "'<b>'PHYSICAL ADDRESS'</b>'";


//$query="select * from business where certificate='$search' AND (certificate='$myrecords' AND (certificate like '%$search%' OR item like '%$search%' OR quantity like '%$search%' OR price like '%$search%' OR totalprice like '%$search%' OR cash_or_debt like '%$search%' OR dateofentry like '%$search%' OR entryby like '%$search%' OR id like '%$search%')";


$query="select * from personal_details where id=$id";


//$query="select * family_bg  where id_gb like '%$search%' OR relationship like '%$search%' OR names like '%$search%' OR  place_of_birth like '%$search%' OR dob like '%$search%' OR occupation like '%$search%' OR address like '%$search%' OR history like '%$search%'";

$result=mysql_query($query);
 while ($row = mysql_fetch_array($result)) { 
$flag=1;
 echo "<tr ><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td><td>$row[7]</td><td>&nbsp</td></td><td></tr>";
 }
 if($flag==0)
 echo "<tr><td colspan='3' align='center' style='color:red'>Record not
found</td></tr>";



?>
<tr>
<td colspan="17">&nbsp;</td></tr>
<tr bgcolor="#CCCCCC">
<th colspan="17" align="right"></th>
</table>

<!--************************************************************************** Personal Details part2 **************************************************************************-->


<table style="align:center; width: 95%; border: 0px solid black; background:#DCDCDC;">

<!--<tr>
<td colspan="16" style="background:silver; color:#FFFFFF; fontsize:800px">Search</td>
</tr>
<tr>
<td>Enter Search Keyword</td>
<td><input type="text" name="search" size="17" placeholder="ID" /></td>
<td><input type="submit" value="Search"/></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
-->
<tr bgcolor="#2F4F4F" style="color:#FFFFFF">
<td>Marital status</td>
<?php
$search=$_POST["search"];
$flag=0;

$search=$_POST["search"];
$flag=0;
echo "'<b>'MARITAL STATUS'</b>'";

//$query="select * from business where certificate='$search' AND (certificate='$myrecords' AND (certificate like '%$search%' OR item like '%$search%' OR quantity like '%$search%' OR price like '%$search%' OR totalprice like '%$search%' OR cash_or_debt like '%$search%' OR dateofentry like '%$search%' OR entryby like '%$search%' OR id like '%$search%')";


$query="select * from personal_details where id=$id";


//$query="select * family_bg  where id_gb like '%$search%' OR relationship like '%$search%' OR names like '%$search%' OR  place_of_birth like '%$search%' OR dob like '%$search%' OR occupation like '%$search%' OR address like '%$search%' OR history like '%$search%'";

$result=mysql_query($query);
 while ($row = mysql_fetch_array($result)) { 
$flag=1;
 echo "<tr ><td>$row[8]</td></td><td></tr>";
 }
 if($flag==0)
 echo "<tr><td colspan='3' align='center' style='color:red'>Record not
found</td></tr>";



?>
<tr>
<td colspan="17">&nbsp;</td></tr>
<tr bgcolor="#CCCCCC">
<th colspan="17" align="right"></th>
</table>

<!--************************************************************************** Personal Details part3 **************************************************************************-->

<table style="align:center; width: 95%; border: 0px solid black; background:#DCDCDC;">

<!--<tr>
<td colspan="16" style="background:silver; color:#FFFFFF; fontsize:800px">Search</td>
</tr>
<tr>
<td>Enter Search Keyword</td>
<td><input type="text" name="search" size="17" placeholder="ID" /></td>
<td><input type="submit" value="Search"/></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
-->
<tr bgcolor="#2F4F4F" style="color:#FFFFFF">
<td>Country</td>
<td>Province</td>
<td>District</td>
<td>Secter</td>
<td>Cell</td>
<td>Village</td>
<td><font color="#0b5345">..............</font></td>
<?php
$search=$_POST["search"];
$flag=0;

$search=$_POST["search"];
$flag=0;

echo "'<b>'CURRENT DEPLOYMENT'</b>'";

//$query="select * from business where certificate='$search' AND (certificate='$myrecords' AND (certificate like '%$search%' OR item like '%$search%' OR quantity like '%$search%' OR price like '%$search%' OR totalprice like '%$search%' OR cash_or_debt like '%$search%' OR dateofentry like '%$search%' OR entryby like '%$search%' OR id like '%$search%')";


$query="select * from personal_details where id=$id";


//$query="select * family_bg  where id_gb like '%$search%' OR relationship like '%$search%' OR names like '%$search%' OR  place_of_birth like '%$search%' OR dob like '%$search%' OR occupation like '%$search%' OR address like '%$search%' OR history like '%$search%'";

$result=mysql_query($query);
 while ($row = mysql_fetch_array($result)) { 
$flag=1;
 echo "<tr ><td>$row[9]</td><td>$row[10]</td><td>$row[11]</td><td>$row[12]</td><td>$row[13]</td><td>$row[14]</td></td><td></tr>";
 }
 if($flag==0)
 echo "<tr><td colspan='3' align='center' style='color:red'>Record not
found</td></tr>";



?>
<tr>
<td colspan="17">&nbsp;</td></tr>
<tr bgcolor="#CCCCCC">
<th colspan="17" align="right"></th>
</table>
<!--************************************************************************** Personal Details part4 **************************************************************************-->

<table style="align:center; width: 95%; border: 0px solid black; background:#DCDCDC;">

<!--<tr>
<td colspan="16" style="background:silver; color:#FFFFFF; fontsize:800px">Search</td>
</tr>
<tr>
<td>Enter Search Keyword</td>
<td><input type="text" name="search" size="17" placeholder="ID" /></td>
<td><input type="submit" value="Search"/></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
-->
<tr bgcolor="#2F4F4F" style="color:#FFFFFF">

<td>Healthy </td>
<td>Habits</td>
<td>Date of birth</td>
<td>Height</td>
<td>Weight</td>
<td>Pysical marks</td>
<td><font color="#0b5345">.............</font></td>
<?php
$search=$_POST["search"];
$flag=0;

$search=$_POST["search"];
$flag=0;
echo "'<b>'DESCRIPTION OF PERSON'</b>'";
//$query="select * from business where certificate='$search' AND (certificate='$myrecords' AND (certificate like '%$search%' OR item like '%$search%' OR quantity like '%$search%' OR price like '%$search%' OR totalprice like '%$search%' OR cash_or_debt like '%$search%' OR dateofentry like '%$search%' OR entryby like '%$search%' OR id like '%$search%')";


$query="select * from personal_details where id=$id";


//$query="select * family_bg  where id_gb like '%$search%' OR relationship like '%$search%' OR names like '%$search%' OR  place_of_birth like '%$search%' OR dob like '%$search%' OR occupation like '%$search%' OR address like '%$search%' OR history like '%$search%'";

$result=mysql_query($query);
 while ($row = mysql_fetch_array($result)) { 
$flag=1;
 echo "<tr ><td>$row[15]</td><td>$row[16]</td><td>$row[17]</td><td>$row[18]</td><td>$row[19]</td><td>$row[20]</td></td><td></tr>";
 }
 if($flag==0)
 echo "<tr><td colspan='3' align='center' style='color:red'>Record not
found</td></tr>";



?>
<tr>
<td colspan="17">&nbsp;</td></tr>
<tr bgcolor="#CCCCCC">
<th colspan="17" align="right"></th>
</table>
<div>
</form>

<!--**************************************************************************************************************Employment************************************************************************************************************************************************************************************-->		

<?php
mysql_connect("localhost","root","%9,l6rTDZ=k1");
mysql_select_db("vetting") or die("database could not connect ");
?>

<form name="search" method="post" action="radio_records.php">
<div align="center">
<table style="align:center; width: 95%; border: 0px solid black; background:#DCDCDC;">


<tr bgcolor="#2F4F4F" style="color:#FFFFFF">

<td>Employer</td>
<td>Starting Date</td>
<td>Ending Date</td>
<td>Position</td>
<td>Conduct</td>
<td>Competence</td>
<td>Weakness</td>
<td>Motivation</td>



<?php
$search=$_POST["search"];
$flag=0;

echo '<h2>Employment Experience ';

echo "</h2><br>";

$query="select * from employment_exper where id=$id";


$result=mysql_query($query);
 while ($row = mysql_fetch_array($result)) { 
$flag=1;
 echo "<tr ><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td><td>$row[7]</td><td>$row[8]</td><td>$row[9]</td></td></tr>";
 }
 if($flag==0)
 echo "<tr><td colspan='3' align='center' style='color:red'>Record not
found</td></tr>";



?>
<tr>
<td colspan="17">&nbsp;</td></tr>
<tr bgcolor="#CCCCCC">
<th colspan="17" align="right"></th>
</table>
<div>
</form>

<!--**************************************************************************************************************LEGAL CHARGES************************************************************************************************************************************************************************************-->		


<?php
mysql_connect("localhost","root","%9,l6rTDZ=k1");
mysql_select_db("vetting") or die("database could not connect ");
?>

<form name="search" method="post" action="edit.php">
<div align="center">
<table style="align:center; width: 95%; border: 0px solid black; background:#DCDCDC;">

<tr bgcolor="#2F4F4F" style="color:#FFFFFF">

<td>Charges</td>
<td>Starting Date</td>
<td>Ending Date</td>
<td>Penality</td>
<td>Role in Genocide</td>
<td>tendancies</td>



<?php
$search=$_POST["search"];
$flag=0;

echo '<h2>Legal charges Records  ';

echo "</h2><br>";


$query="select * from legal_charges where id=$id";


$result=mysql_query($query);
 while ($row = mysql_fetch_array($result)) { 
$flag=1;
 echo "<tr ><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td><td>$row[7]</td></td></tr>";
 }
 if($flag==0)
 echo "<tr><td colspan='3' align='center' style='color:red'>Record not
found</td></tr>";



?>
<tr>
<td colspan="17">&nbsp;</td></tr>
<tr bgcolor="#CCCCCC">
<th colspan="17" align="right"></th>
</table>
<div>
</form>

<!--**************************************************************************************************************OTHER DETAILS************************************************************************************************************************************************************************************-->		


<?php
mysql_connect("localhost","root","%9,l6rTDZ=k1");
mysql_select_db("vetting") or die("database could not connect ");
?>

<form name="search" method="post" action="edit_general_conduct.php">
<div align="center">
<table style="align:center; width: 95%; border: 0px solid black; background:#DCDCDC;">

<tr bgcolor="#2F4F4F" style="color:#FFFFFF">

<td>Political Affiliation</td>
<td>Attitude</td>
<td>Sympathetic</td>
<td>Participation</td>
<td>Religious Tendencies</td>
<td>Incredible Habits</td>
<td>Close Confidants</td>



<?php
$search=$_POST["search"];
$flag=0;



echo '<h2>General Conduct ';

echo "</h2><br>";

$query="select * from general_conducts where id=$id";

$result=mysql_query($query);
 while ($row = mysql_fetch_array($result)) { 
$flag=1;
 echo "<tr ><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td><td>$row[7]</td><td>$row[8]</td></td></tr>";
 }
 if($flag==0)
 echo "<tr><td colspan='3' align='center' style='color:red'>Record not
found</td></tr>";



?>
<tr>
<td colspan="17">&nbsp;</td></tr>
<tr bgcolor="#CCCCCC">
<th colspan="17" align="right"></th>
</table>
<div>
</form>

<!--**************************************************************************************************************ABILITIES************************************************************************************************************************************************************************************-->		


<?php
mysql_connect("localhost","root","%9,l6rTDZ=k1");
mysql_select_db("vetting") or die("database could not connect ");
?>


<form name="search" method="post" action="edit.php">
<div align="center">
<table style="align:center; width: 95%; border: 0px solid black; background:#DCDCDC;">


<tr bgcolor="#2F4F4F" style="color:#FFFFFF">

<td>Abilities</td>
<td>Skills</td>
<td>Team Work Spirit</td>
<td>Initiative Innovation</td>
<td>Responsibilities</td>
<td>Ability to keep Secret</td>



<?php
$search=$_POST["search"];
$flag=0;


echo '<h2>Qualities  ';

echo "</h2><br>";


$query="select * from quality where id=$id";



$result=mysql_query($query);
 while ($row = mysql_fetch_array($result)) { 
$flag=1;
 echo "<tr ><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td><td>$row[7]</td></td></tr>";
 }
 if($flag==0)
 echo "<tr><td colspan='3' align='center' style='color:red'>Record not
found</td></tr>";



?>
<tr>
<td colspan="17">&nbsp;</td></tr>
<tr bgcolor="#CCCCCC">
<th colspan="17" align="right"></th>
</table>
<div>
</form>

<!--**************************************************************************************************************Assets************************************************************************************************************************************************************************************-->		

<?php
mysql_connect("localhost","root","%9,l6rTDZ=k1");
mysql_select_db("vetting") or die("database could not connect ");
?>


<form name="search" method="post" action="edit.php">
<div align="center">
<table style="align:center; width: 95%; border: 0px solid black; background:#DCDCDC;">


<tr bgcolor="#2F4F4F" style="color:#FFFFFF">

<td>Type of assets</td>
<td>Name of ass</td>
<td>Sharing status</td>
<td>Location</td>
<td>Loan amount</td>
<td>Bank name</td>

<?php
$search=$_POST["search"];
$flag=0;


echo '<h2>Assets  ';

echo "</h2><br>";


$query="select * from assets where id=$id";



$result=mysql_query($query);
 while ($row = mysql_fetch_array($result)) { 
$flag=1;
 echo "<tr ><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td><td>$row[7]</td></td></tr>";
 }
 if($flag==0)
 echo "<tr><td colspan='3' align='center' style='color:red'>Record not
found</td></tr>";



?>
<tr>
<td colspan="17">&nbsp;</td></tr>
<tr bgcolor="#CCCCCC">
<th colspan="17" align="right"></th>
</table>
<div>
</form>