<?php
session_start();
include_once('connect_db.php');
if(isset($_SESSION['username'])){
$id=$_SESSION['manager_id'];
$user=$_SESSION['username'];
}
if(isset($_POST['submit'])){
$sname=$_POST['drug_name'];
$upurchase=$_POST['pprice'];
$usell=$upurchase * 1.2 ;

$sql=("INSERT INTO prodicts(product_name,pprice,unit_price,date)
VALUES('$sname','$upurchase','$usell','')");
if($sql>0) {header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/stock.php");
}else{
$message1="<font color=red>Drug Not Saved, Try again</font>";
}
	}
?>
<!DOCTYPE html>

<html lang="en">
<head>
		<meta char-set="utf-8" http-equiv="content-type" content="text/html;">
	<title>Medical Records</title>
	
	<!-- Stylesheets -->
		<link rel="stylesheet" href="css/style.css">
      
<title><?php echo $user;?> -Pharmacy Sys</title>
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" /> 
<script src="js/function.js" type="text/javascript"></script>
<style>#left-column {height: 477px;}
<style>#left-column {height: 477px;}
 #main {height: 477px;}</style>
 
 <script type="text/javascript">

            function validateInp(elem) {
                var validChars = /[0-9]/;
                var strIn = elem.value;
                var strOut = '';
                for(var i=0; i < strIn.length; i++) {
                  strOut += (validChars.test(strIn.charAt(i)))? strIn.charAt(i) : '';
                }
                elem.value = strOut;
            }

        </script>
</head>
<body>
	<!-- TOP BAR -->
	<!-- TOP BAR -->
	<?php include_once("tpl/top_bar.php"); ?>
	
	<div class="content-module">				

						<div class="content-module-main cf">


</div>
<div class="side-menu fl">
				
				<h3>Quick Links</h3>
				<ul>
					<li><a href="stockm.php">Add/Edit Mdicine</a></li>
					<li><a href="manage_consumablem.php">Add/Edit Consumable</a></li>
					<li><a href="manage_actm.php">Add/Edit Medical Act</a></li>
					<li><a href="lab_testm.php">Add/Edit Lab test </a></li>
					<li><a href="insurancesm.php">Add/Edit Insurance</a></li>

				</ul>
                                
                                 
			</div> <!-- end side-menu -->
			<div class="content-module-main cf">
		<ul id="tabs" class="fl">
    <h1 align="center">Manage Stock</h1> 
<hr/>	
      
        <ul class="tabs">  
            <li><a href="javascript:tabSwitch('tab_1', 'content_1');" id="tab_1" class="active">View Stock Medicine</a></li>  
            <li><a href="javascript:tabSwitch('tab_2', 'content_2');" id="tab_2">Add Medicine</a></li>  
             
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
		
        $result = ("SELECT * FROM prodicts  order by product_name") 
                or die(mysql_error());
		// display data in table
        echo "<table border='1'>";
         echo "<tr><th>Number</th><th>Drug Name</th><th>Purchase UP</th><th>Selling UP</th><th>Update</th><th>Delete </th></tr>";

        // loop through results of database query, displaying them in the table
        while($row = mysqli_fetch_assoc( $result )) {
                $num++;
                // echo out the contents of each row into a table
                echo "<tr>";
                echo '<td>' . $num .'</td>';
                echo '<td>' . $row['product_name'] . '</td>';
				echo '<td>' . $row['pprice'] . '</td>';
				echo '<td>' . $row['unit_price'] . '</td>';
			?>
				
				<td><a href="update_stockm.php?id=<?php echo $row['id']?>"><img src="images/update-icon.png" width="24" height="24" border="0" /></a></td>
				<td><a href="delete_stockm.php?id=<?php echo $row['id']?>"><img src="images/delete-icon.jpg" width="24" height="24" border="0" /></a></td>
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
			<form name="myform" onsubmit="return validateForm(this);" action="stock.php" method="post" >
			<table width="420" height="106" border="0" >	
				<tr><td align="center"><input name="drug_name" type="text" style="width:170px" placeholder="Drug Name" required="required" id="drug_name" onBlur="validate(this)" /></td></tr>
				<tr><td align="center"><input name="pprice" type="text" style="width:170px" placeholder="Unit Purchase Price" required="required" id="cost" /></td></tr>  
				<tr><td align="center"><input name="submit" type="submit" value="Submit" id="submit"/></td></tr>
            </table>
		</form>             
  	
</body>
<SCRIPT LANGUAGE="JavaScript">
<!-- Begin
function validate(field) {
var valid = "abcdefghijklmnopqrstuvwxy zABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"
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
