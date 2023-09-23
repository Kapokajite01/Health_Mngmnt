<?php
session_start();
 $role = $_SESSION['sess_userrole'];
    if(!($_SESSION['sess_username']) or ($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro') or $role!="Pharmacist"){
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
    <h1 align="center"><strong>Request Medicine For Distribution</strong></h1> 
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
		
        // connect to the database
        include_once('connect_db.php');

        // get results from database
		//$date=CURDATE();
        $result = ("SELECT * FROM prodicts  order by product_name") 
                or die(mysql_error());
		// display data in table
        echo "<table border='0'>";
         echo "<tr><th>Number</th><th><strong>Drug Name</strong></th><th><strong>QTY Distribution</strong></th><th><strong> QTY Blocked</strong> </th><th><strong>QTY In Stock</strong></th><th></th></tr>";

        // loop through results of database query, displaying them in the table
        while($row = mysqli_fetch_assoc( $result )) {
                $num++;
                // echo out the contents of each row into a table
                echo "<tr>";
                echo '<td align="right">' . $num .'</td>';
                echo '<td>' . $row['product_name'] . '</td>';
				echo '<td>' . $row['dist_quantity'] . '</td>';
				echo '<td>' . $row['remain'] . '</td>';
				echo '<td>' . $row['qtity'] . '</td>';
			?>
				
				<td><a href="request_stock.php?id=<?php echo $row['id']?>."><img src="images/prescri.jpg" width="24" height="24" border="0" /><strong>REQUEST</strong></a></td>
				<?php
		 } 
        // close table>
        echo "</table>";
?> 
        </div>  
           
  	
</body>
</html>
