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
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet'>
	<link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="js/date_pic/date_input.css">
        <link rel="stylesheet" href="lib/auto/css/jquery.autocomplete.css">
	
	<!-- Optimize for mobile devices -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	
	<!-- jQuery & JS files -->
		<link rel="stylesheet" href="css/cmxform.css">

       
<title><?php echo $user;?> -Pharmacy Sys</title>

</head>
<body>
	<!-- TOP BAR -->
	<!-- TOP BAR -->
	<?php include_once("tpl/top_bar1.php"); ?>
	
	<!-- MAIN CONTENT -->
		
		<div class="page-full-width cf">

		
		<div class="content-module">				

						<div class="content-module-main cf">


</div>
<div class="side-menu fl">
				
				      
                                 
			</div> <!-- end side-menu -->
			<div class="content-module-main cf">
		<ul id="tabs" class="fl">
    <h1 align="center"><strong>Authorize Consumable For Distribution</strong></h1> 
<hr/>	
      
       
          
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
		$fdate=$_GET[vals];
		$date=$_GET[date];
		// connect to the database
        include_once('connect_db.php');

        // get results from database
		//$date=CURDATE();
        $result = ("SELECT consommables.id,consommables.name_consommable,consomable_mvt.idmvt,consomable_mvt.request_qty,consomable_mvt.dist_quantity,consomable_mvt.qntity,
			consomable_mvt.remain,consomable_mvt.movment,consomable_mvt.bdate,consomable_mvt.movmentb FROM consomable_mvt JOIN consommables ON consomable_mvt.id= consommables.id where (consomable_mvt.movment='Request' AND movmentb!= 'Authorize' AND(bdate = '$date' OR bdate='$fdate'))
			 ORDER BY bdate DESC") 
                or die(mysql_error());
		// display data in table
        echo "<table border='0'>";
         echo "<tr><th>Number</th><th><strong>Drug Name</strong></th><th><strong>Requested QTY</strong></th><th><strong>QTY In Distribution</strong></th><th><strong>Blocked</strong> </th><th><strong>QTY In Stock</strong></th><th><strong>Date</strong></th><th><strong>Action</strong></th></th></tr>";

        // loop through results of database query, displaying them in the table
        while($row = mysqli_fetch_assoc( $result )) {
                $num++;
                // echo out the contents of each row into a table
                echo "<tr>";
                echo '<td align="right">' . $num .'</td>';
                echo '<td>' . $row['name_consommable'] . '</td>';
				echo '<td>' . $row['request_qty'] . '</td>';
				echo '<td>' . $row['dist_quantity'] . '</td>';
				echo '<td>' . $row['remain'] . '</td>';
				echo '<td>' . $row['qntity'] . '</td>';
				echo '<td>' . $row['bdate'] . '</td>';

			?>
				
				<td><a href="authorize_cstock.php?id=<?php echo $row['idmvt']?>"><img src="images/confirm.png" width="34" height="34" border="0" /><strong>Authorize</strong></a></td>
				<?php
		 } 
        // close table>
        echo "</table>";
		 if($num < 1){
			
			echo"<h1 align='center'>No Request To Display</h1>";
			} 
?> 
        </div>  
           
  	
</body>
</html>
