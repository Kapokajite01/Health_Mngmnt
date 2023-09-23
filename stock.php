<?php
error_reporting(0);
include_once('connect_db.php');
    session_start();
    $role = $_SESSION['sess_userrole'];
	$name = $_SESSION['sess_name'];
	$lname = $_SESSION['sess_lname'];
	$tel = $_SESSION['sess_phone'];

    if(!$_SESSION['sess_username']) or ($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro') or $role!="Stock"){
      header('Location: logout');
	}
else{
	$sql=("INSERT INTO logs(id,name,lname,phone,action,time)
VALUES('','$name','$lname','$tel','Login',now())");
	}
?>
<!DOCTYPE html>
<?php
error_reporting(0);

$result = (" SELECT bdate FROM medicine_mvt WHERE action='Request' and actionb!='Authorize' GROUP BY bdate") 
                or die(mysql_error());
$resultc = (" SELECT bdate FROM consomable_mvt WHERE	movment='Request' AND movmentb != 'Authorize' GROUP BY bdate") 
                or die(mysql_error());
?>
     
			
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Medical Records</title>
	
	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/style.css">

</head>
<body>

	<?php include_once("tpl/top_barp.php"); ?>
	
	<!-- MAIN CONTENT -->
	<div id="content">
		
		<div class="page-full-width cf">

		<ul id="tabs" class="fl">
				
				<li></li>
				<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
				<li><a href="stock" class=" stock-tab" >Stock Dashbord</a></li>
				<li><a href="manage_medicines" class=" stock-tab" >Manage Medicine</a></li>
				<li><a href="manage_consumable" class="sales-tab">Manage Consumable</a></li>

		</ul> <!-- end tabs -->
				<div class="content-module">				

						<div class="content-module-main cf">


</div><div class="side-menu fl">
				
				<h3>Quick Links</h3>
				<ul>
					<li><a href="manage_medicines">Add/Edit Mdicine</a></li>
					<li><a href="manage_consumable">Add/Edit Consumable</a></li>

				</ul>
                                
                                 
			</div> <!-- end side-menu -->

			<div class="content-module-main cf">
				
							<h1 align="center"><strong>Requests For Medicine &nbsp;&nbsp;&nbsp;&nbsp; </strong><br><br><hr></hr> </h1>
							<?php	       
        while($row = mysqli_fetch_assoc( $result )) {
                $num++;
                
			?>
				
				<a href="#" onClick="window.open('authorize_medicine?date=<?php echo $row['bdate']?>','pagename','resizable,height=1800,width=1800'); return false;">
<h1 align="center"><img src="images/prescri.jpg" width="24" height="24" border="0" /><strong>	Request ON <?php echo  $row['bdate'] ?></strong></h1></a></td>
				<?php
		 } 
       if($num < 1){
		echo "<h1 align='center'><strong>No New Request For Medicine!!!</strong></h1";   
		   
		   
	   }
       ?><hr></hr>
<h1 align="center"><strong>Requests For Consumables  </strong> </h1>
								
				<?php	

        // loop through results of database query, displaying them in the table
        while($rowc = mysqli_fetch_assoc( $resultc )) {
                $numc++;
                // echo out the contents of each row into a table
               	?>
				
				<td><a href="" onClick="window.open('authorize_consumable?date=<?php echo $rowc['bdate']?>','pagename','resizable,toolbar=1,resizable=1,scrollbars=yes,height=1800,width=1800'); return false;">
				<h1 align="center"><img src="images/prescri.jpg" width="24" height="24" border="0" /><strong>
				Request ON <?php echo  $rowc['bdate'] ?></strong></h1></a></td>
				<?php
		 } 
          if($numc < 1){
		echo "<h1 align='center'><strong>No New Request For Consumables!!!</strong></h1";   
		   
		   
	   }
      ?>				
					</div> <!-- end content-module-main -->
							
				
				</div> <!-- end content-module -->
				
				
		
		</div></div> <!-- end full-width -->
			
	</div> <!-- end content -->
	
<!-- FOOTER -->
	<div id="footer">

		<p>Powed By Vision Soft Ltd .</p>
	</div> <!-- end footer -->
</body>

</html>


