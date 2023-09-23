<?php
error_reporting(0);
session_start();
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!$_SESSION['sess_username']) or ($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro') or $role!="Stock"){
      header('Location: logout');
	}
include_once('connect_db.php');
?>
<!DOCTYPE html>

<html lang="en">
<head>
		<meta char-set="utf-8" http-equiv="content-type" content="text/html;">
	<title>Medical Records</title>
	
	<!-- Stylesheets -->
	
	<link rel="stylesheet" href="css/style.css">
       
</head>
<body>
	<!-- TOP BAR -->
	<!-- TOP BAR -->
	<?php include_once("tpl/top_bar1.php"); ?>
	
	<!-- MAIN CONTENT -->
		
		
<h1 align="center"><strong>Request Medicine For Distribution</strong></h1> 
<hr/>	
      
       
          
       
		 <?php echo $message;
			  echo $message1;
			  ?>
      
		<?php
error_reporting(0);

$result = (" SELECT bdate FROM medicine_mvt WHERE action='Request' and actionb!='Authorize' GROUP BY bdate") 
                or die(mysql_error());?>
				
							<?php	echo "<table border='0' align='center'>";
         echo "<tr><td></td><td></td><td></td><td></td><td></td></tr>";

        // loop through results of database query, displaying them in the table
        while($row = mysqli_fetch_assoc( $result )) {
                $num++;
                // echo out the contents of each row into a table
                echo "<tr>";
                echo '<td></td>';
				 echo '<td> </td>';
                echo '<td></td>';
			?>
				
				<td align='left'><a href="authorize_medicine.php?date=<?php echo $row['bdate']?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/prescri.jpg" width="24" height="24" border="0" /><strong>
				Request ON <?php echo  $row['bdate'] ?></strong></a></td>
				<?php
		 } 
      if($num < 1){
		echo "<tr><td><h1 align='center'><strong>No New Request For Medicine!!!</strong></h1</td></tr>";   
		   
		   
	   }
        echo "</table>";
		 
		
		
		?>
		
		<div class="content-module">				

						<div class="content-module-main cf">


</div>
<div class="side-menu fl">
				
				      
                                 
			</div> <!-- end side-menu -->
			<div class="content-module-main cf">
		<ul id="tabs" class="fl">
    
           
  	
</body>
</html>
