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
$sname=$_POST['cons_name'];
$scost=$_POST['pcost'];
$pcost=$scost/1.2;
$usage= $_POST['usage'];

$sql=("INSERT INTO consommables(name_consommable,purchaseprice,unit_price)
VALUES('$sname','$pcost','$scost')");
$resultED = mysqli_query($conn, $sql);

if($resultED>0) {header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/manage_consumable");
}else{
$message1="<font color=red>Consumable Not Saved, Try again</font>";
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
	
				<li><a href="manage_consumable" class="sales-tab">Manage Consumable</a></li>

		</ul> <!-- end tabs -->
		<div class="content-module">				

						<div class="content-module-main cf">


</div>
<div class="side-menu fl">
				
				<h3>Quick Links</h3>
				<ul>
					<li><a href="manage_consumable">Add/Edit Consumable</a></li>
				</ul>
                                
                                 
			</div> <!-- end side-menu -->
			<div class="content-module-main cf">
		<ul id="tabs" class="fl">
    <h1 align="center">Manage Consumable</h1> 
<hr/>	
      
        <ul class="tabs">  
            <li><a href="javascript:tabSwitch('tab_1', 'content_1');" id="tab_1" class="active">View Stock Consubale</a></li>  
            <li><a href="javascript:tabSwitch('tab_2', 'content_2');" id="tab_2">Add Consumable</a></li>  
             
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
		
        $result = ("SELECT * FROM consommables order by name_consommable"); 
$resultselect = mysqli_query($conn, $result);
		// display data in table
        echo "<table border='1'>";
         echo "<tr><th>No</th><th>Name</th><th>Purchasing UP</th><th>Selling UP</th><th>Update</th><th>Delete </th></tr>";

        // loop through results of database query, displaying them in the table
        while($row = mysqli_fetch_assoc( $resultselect )) {
                $num++;
                // echo out the contents of each row into a table
                echo "<tr>";
                echo '<td>' . $num .'</td>';
                echo '<td>' . $row['name_consommable'] . '</td>';
				echo '<td>' . $row['purchaseprice'] . '</td>';
				echo '<td>' . $row['unit_price'] . '</td>';
				?>

				<td><a href="update_consumable?id=<?php echo $row['id']?>"><img src="images/update-icon.png" width="24" height="24" border="0" /></a></td>
				<td><a href="delete_consumabl?id=<?php echo $row['id']?>"><img src="images/delete-icon.jpg" width="24" height="24" border="0" /></a></td>
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
			<form name="myform" onsubmit="return validateForm(this);" action="manage_consumable" method="post" >
			<table width="420" height="106" border="0" >	
				<tr><td align="center"><input name="cons_name" type="text" style="width:170px" placeholder="Consumable Name" required="required" id="drug_name"/></td></tr>
				<tr><td align="center"><input name="pcost" type="text" style="width:170px" placeholder="Unit Purchase Cost" required="required" id="cost" /></td></tr>  
				<tr><td align="center"><select   name="usage" style=' width:180px;height:30px' required="required">
          <option value="" >-Select Stock-</option>
        <option value="Ordinary Stock" >ORDINARY STOCK</option>
        <option value="ARV" >ARV</option>
        <option value="Tuberculose" >TUBERCULOSE</option>
        <option value="labo" >LABO</option>
        <option value="planning" >PLANNING</option>
    </select></td></tr>  
				<tr><td align="center"><input name="submit" type="submit" value="Submit" id="submit"/></td></tr>
            </table>
		</form>             
  	
</body>
<SCRIPT LANGUAGE="JavaScript">
<!-- Begin
function validate(field) {
var valid = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"
var ok = "yes";
var temp;
for (var i=0; i<field.value.length; i++) {
temp = "" + field.value.substring(i, i+1);
if (valid.indexOf(temp) == "-1") ok = "no";
}
if (ok == "no") {
alert("N'utilisez pas les carateres speciaux");
field.value='';
field.focus();
field.select();
   }
}
//  End -->
</script>
</html>
