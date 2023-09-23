<?php
session_start();
include_once('connect_db.php');
if(isset($_SESSION['username'])){
$id=$_SESSION['manager_id'];
$user=$_SESSION['username'];
}else{
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."index.php");
exit();
}
if(isset($_POST['submit'])){
$sname=$_POST['drug_name'];
$cost=$_POST['cost'];
$consult=$_POST['consult'];

$sql=("INSERT INTO assurance(Insurance, percentage,consultation)
VALUES('$sname','$cost','$consult')");
if($sql>0) {header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/insurances.php");
}else{
$message1="<font color=red>Save Failed, Try again</font>";
}
	}
?>
<!DOCTYPE html>

<html lang="en">
<head>
		<meta char-set="utf-8" http-equiv="content-type" content="text/html;">
	<title>Medical Records</title>
	
	<!-- Stylesheets -->
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet'>
	<link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="js/date_pic/date_input.css">
        <link rel="stylesheet" href="lib/auto/css/jquery.autocomplete.css">
	
	<!-- Optimize for mobile devices -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	
	<!-- jQuery & JS files -->
		<link rel="stylesheet" href="css/cmxform.css">
	<script src="js/lib/jquery.min.js" type="text/javascript"></script>
	<script src="js/lib/jquery.hotkeys-0.7.9.min.js" type="text/javascript"></script>
	<script src="js/lib/jquery.validate.min.js" type="text/javascript"></script>

	<script src="js/script.js"></script>  
        <script src="js/date_pic/jquery.date_input.js"></script>  
        <script src="lib/auto/js/jquery.autocomplete.js "></script>  
	 
       
<title><?php echo $user;?> -Pharmacy Sys</title>
<link rel="stylesheet" type="text/css" href="style/mystyle.css">
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" /> 
<link rel="stylesheet" href="style/table.css" type="text/css" media="screen" /> 
<script src="js/function.js" type="text/javascript"></script>
<style>#left-column {height: 477px;}
 #main {height: 477px;}</style>
</head>
			
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Medical Records</title>
	
	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/style.css">

	 
       

</head>
<body>

	<!-- TOP BAR -->
	<!-- TOP BAR -->
	<?php include_once("tpl/top_bar.php"); ?>
	
          
			
		<?php
		/* 
		View
        Displays all data from 'Stock' table
		*/
		$num=0;
        // connect to the database
        include_once('connect_db.php');

        // get results from database
		
        $result = ("SELECT * FROM assurance where Insurance!=''") 
                or die(mysql_error());
		// display data in table
        echo "<table border='1'>";
         echo "<tr><th>Number</th><th>Name</th><th>Parcentage</th><th>Consultation</th><th>Update</th><th>Delete </th></tr>";

        // loop through results of database query, displaying them in the table
        while($row = mysqli_fetch_assoc( $result )) {
                $num++;
                // echo out the contents of each row into a table
                echo "<tr>";
                echo '<td>' . $num .'</td>';
                echo '<td>' . $row['Insurance'] . '</td>';
				echo '<td>' . $row['percentage'] . '</td>';
				echo '<td>' . $row['consultation'] . '</td>';?>

				<td><a href="update_ass.php?id=<?php echo $row['id']?>"><img src="images/update-icon.png" width="24" height="24" border="0" /></a></td>
				<td><a href="delete_ass.php?id=<?php echo $row['id']?>"><img src="images/delete-icon.jpg" width="24" height="24" border="0" /></a></td>
				<?php
		 } 
        // close table>
        echo "</table>";
?> 
        </div>  
        <div id="content_2" class="content">  
         <!--Add Drug-->
		 <?php echo $message;
			  echo $message1;
			  ?>
			<form name="myform" onsubmit="return validateForm(this);" action="insurances.php" method="post" >
			<table width="420" height="106" border="0" >	
				<tr><td align="center"><input name="drug_name" type="text" style="width:170px" placeholder="Insurance" required="required" id="drug_name" /></td></tr>
				<tr><td align="center"><input name="cost" type="text" style="width:170px" placeholder="Percentage" required="required" id="cost" /></td></tr>  
				<tr><td align="center"><input name="consult" type="text" style="width:170px" placeholder="Consultation" required="required" id="consult" /></td></tr>  
	<tr><td align="center"><input name="submit" type="submit" value="Submit" id="submit"/></td></tr>
            </table>
		</form>             
  	
</body>
</html>
