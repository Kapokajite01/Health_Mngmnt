<?php
error_reporting(0);
session_start();
    session_start();
    $role = $_SESSION['sess_userrole'];
    if((!$_SESSION['sess_username']) or ($role!="Manager")){
		if($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro')
		{
      header('Location: logout');
		}
	 }
include_once('connect_db.php');

if(isset($_POST['submit'])){
$sname=$_POST['drug_name'];
$cost=$_POST['cost'];

$sql=("INSERT INTO examens(name_examen,unit_price)
VALUES('$sname','$cost')");
$resultinsert = mysqli_query($conn, $sql);		// display data in table

if($resultinsert>0) {header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/manage_lab_test");
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
<body>
	<!-- TOP BAR -->
	<!-- TOP BAR -->
	<?php include_once("tpl/top_barp.php"); ?>
	
	<!-- MAIN CONTENT -->
		
		<div class="page-full-width cf">

		<ul id="tabs" class="fl">
				<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
				<li><a href="manager" class=" stock-tab" >Manager Dashbord</a></li>
				<li><a href="manage_Lab Tests" class="active-tab dashboard-tab">Manage Lab Test</a></li>
		</ul> <!-- end tabs -->
		<div class="content-module">				

						<div class="content-module-main cf">


</div>
<div class="side-menu fl">
				
								<h3>Quick Links</h3>
				<ul>
					<li><a href="manage_lab_test">Add/Edit Lab Tests</a></li>
					              
			</div> <!-- end side-menu -->
			<div class="content-module-main cf">
		<ul id="tabs" class="fl">
    <h1 align="center">Manage Laboratory Test</h1> 
<hr/>	
      
        <ul class="tabs">  
            <li><a href="javascript:tabSwitch('tab_1', 'content_1');" id="tab_1" class="active">View Laboratory Test</a></li>  
            <li><a href="javascript:tabSwitch('tab_2', 'content_2');" id="tab_2">Add Laboratory Test</a></li>  
             
        </ul>  
          
        <div id="content_1" class="content">  
		 <?php echo $message;
			  echo $message1;
			  ?>
      
		<?php
		/* 
		View
        Displays all data from 'Stock' table
		*/
		$num=0;
        // connect to the database
        include_once('connect_db.php');

        // get results from database
		
        $result = ("SELECT * FROM examens order by name_examen") ;
$resultselect = mysqli_query($conn, $result);		// display data in table
        echo "<table border='1'>";
         echo "<tr><th>Number</th><th>Name</th><th>Unit Price</th><th>Update</th><th>Delete </th></tr>";

        // loop through results of database query, displaying them in the table
        while($row = mysqli_fetch_assoc( $resultselect )) {
                $num++;
                // echo out the contents of each row into a table
                echo "<tr>";
                echo '<td>' . $num .'</td>';
                echo '<td>' . $row['name_examen'] . '</td>';
				echo '<td>' . $row['unit_price'] . '</td>';?>
				<td><a href="update_test?id=<?php echo $row['id']?>"><img src="images/update-icon.png" width="24" height="24" border="0" /></a></td>
				<td><a href="delete_test?id=<?php echo $row['id']?>"><img src="images/delete-icon.jpg" width="24" height="24" border="0" /></a></td>
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
			<form name="myform" onsubmit="return validateForm(this);" action="manage_lab_test" method="post" >
			<table width="420" height="106" border="0" >	
				<tr><td align="center"><input name="drug_name" type="text" style="width:170px" placeholder="Test Name" required="required" id="drug_name" /></td></tr>
				<tr><td align="center"><input name="cost" type="text" style="width:170px" placeholder="Unit Cost" required="required" id="cost" /></td></tr>  
				<tr><td align="center"><input name="submit" type="submit" value="Submit" id="submit"/></td></tr>
            </table>
		</form>             
  	
</body>
</html>
