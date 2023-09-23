<?php
include_once('connect_db.php');
error_reporting(0);
    session_start();
    $role = $_SESSION['sess_userrole'];
	$name = $_SESSION['sess_name'];
	$lname = $_SESSION['sess_lname'];
	$tel = $_SESSION['sess_phone'];
    if((!$_SESSION['sess_username']) or ($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro') or $role!="Admin"){
      header('Location: logout');
    }
	else{
	$sql=("INSERT INTO logs(id,name,lname,phone,action,time)
VALUES('','$name','$lname','$tel','Displayed Logs',now())");
	}
	$date = date('Y-m-d'); 

?>
<!DOCTYPE html>
<html>
<head>
<link href="jquery-ui1.css" rel="stylesheet" type="text/css"/>  
   <script src="jquery.min1.js"></script>  
   <script src="jquery-ui.min1.js"></script> 

   <script type="text/javascript">
       $(function() {
               $("#datesearch").datepicker({ dateFormat: "yy-mm-dd" }).val()
               $("#datesearch1").datepicker({ dateFormat: "yy-mm-dd" }).val()
       });

   </script>
<title><?php echo $username;?> - Pharmacy Sys</title>
<link rel="stylesheet" type="text/css" href="style/mystyle.css">
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" /> 
<link rel="stylesheet" href="style/table.css" type="text/css" media="screen" /> 
<script src="js/function.js" type="text/javascript"></script>
<script src="js/validation_script.js" type="text/javascript"></script>

 <style>
<style>#left-column {height: 477px;}
 #main {height: 477px;}</style>
 </style>
</head>
<body>
<div id="content">
<div id="header">
<h1><a href="#"><img src="images/hd_logo.jpg"></a> Pharmacy Sys</h1></div>
<div id="left_column">
<div id="button">
<ul>
					<li><a href="admin">Dashboard</a></li>
			<li><a href="admin_pharmacist">Pharmacist</a></li>
			<li><a href="admin_manager">Manager</a></li>
			<li><a href="admin_reception">Receptionist</a></li>
			<li><a href="admin_stock">Stock Manager</a></li>
			<li><a href="admin_mutuelle">Mutuelle</a></li>
			<li><a href="logs">Logs</a></li>
			<li><a href="logout">Logout</a></li>
		</ul>	
</div>
		</div>
<div id="main">
<div id="tabbed_box" class="tabbed_box">  
    <h4 align="center"><strong>Logs For <?php echo $date;?></strong></h4> 
<hr/>	
<form method="POST" action="logs1">
<td width="41"><input type="text" name="datesearch" id="datesearch" placeholder="Start Date" required aria-required='true' aria-describedby='name-format'placeholder="Start Date"></td>
				<td></td>
                <td width="116"><input type="text" name="datesearch1" id="datesearch1" placeholder="End Date" required aria-required='true' aria-describedby='name-format'placeholder="End Date"></td>
								<td></td>
                <td width="116"><input type="submit" name="submit" value="DISPLAY"></td><br>
    <div class="tabbed_area">            
          
        <div id="content_1" class="content">  
		<?php 


       $result = ("SELECT * FROM logs where time like '$date%' order by id DESC") 
                or die(mysql_error());
		echo "<table border='1' cellpadding='1' align='center'>";
        echo "<tr><th>Firstname </th> <th>Lastname </th> <th>Telephone </th><th>Action </th><th>Time</th></tr>";

        // loop through results of database query, displaying them in the table
        while($row = mysqli_fetch_assoc( $result )) {
               				                 // echo out the contents of each row into a table
                echo "<tr>";
                
                echo '<td>' . $row['name'] . '</td>';
                echo '<td>' . $row['lname'] . '</td>';
				echo '<td>' . $row['phone'] . '</td>';
				echo '<td>' . $row['action'] . '</td>';
				echo '<td>' . $row['time'] . '</td>';
				 } 
        // close table>
        echo "</table>";
?> 
     

</form>
	 </div>  
       
</div>
</body>
</html>
