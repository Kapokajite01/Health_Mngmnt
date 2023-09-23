<?php
//error_reporting(0);
    session_start();
    $role = $_SESSION['sess_userrole'];
    if((!$_SESSION['sess_username']) or ($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro') or ($role!="Pharmacist")){
      header('Location: logout');
	}
include_once('connect_db.php');

if(isset($_POST['submit'])){
$sname=$_POST['cons_name'];
$scost=$_POST['pcost'];
$pcost=$scost/1.2;
$usage=$_POST['usage'];
$sql=("INSERT INTO prodicts(product_name,pprice,unit_price,destination,date)
VALUES('$sname','$pcost','$scost','$usage','')");
$resultED = mysqli_query($conn, $sql);

if($resultED>0) {header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/manage_medicines");
}else{
$message1="<font color=red>Drug Not Saved, Try again</font>";
}
	}

$selectLastId = "SELECT idmvt,buying_price,sum(buying_price*quantity_in ) as tosales, dateOfOrder  FROM medicine_mvt JOIN orders ON orders.orderId = medicine_mvt.orderId group by medicine_mvt.orderId LIMIT 12";
	$resultMvt = mysqli_query($conn, $selectLastId);	
	$totalPurchases =  mysqli_fetch_assoc($resultMvt);
	
$salesMed = "SELECT SUM(upmedicamnet*qtymedicamnet )as totalpurch,SUM(UPcons*Qcons)as totpurchCons FROM consomation WHERE MONTH(datecunsuption)= MONTH(CURDATE())and YEAR(datecunsuption)= YEAR(CURDATE()) group by datecunsuption";
$resultSalesMVT = mysqli_query($conn, $salesMed);	
$totalSales =  mysqli_fetch_assoc($resultSalesMVT);

	
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pharmacist | Dashboard</title>
	<!-- Stylesheets -->
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
  <link rel="stylesheet" href="pressources/adminlte.min.css">
 	<link rel="stylesheet" href="pressources/bootstrap.min.css">

</head>
		<?php include_once('menupp22.php')?>



  <div class="content-wrapper">

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
              <h6><strong><i>Medicines Purchased in &nbsp;&nbsp;<?php echo date('F') ?></i><br>&nbsp;&nbsp;&nbsp;&nbsp; <?php echo  number_format((float)$totalPurchases['tosales'],0);?></strong></h6>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
              <h6><strong><i>Medicines Saled in &nbsp;&nbsp;<?php echo date('F') ?></i><br>&nbsp;&nbsp;&nbsp;&nbsp; <?php echo  number_format((float)$totalSales['totalpurch'],0);?></strong></h6>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
              <h6><strong><i>Consumables Purchased in &nbsp;&nbsp;<?php echo date('F') ?></i><br>&nbsp;&nbsp;&nbsp;&nbsp; <?php echo  number_format((float)$totalSales['totalpurch'],0);?></strong></h6>

              </div>

            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
              <h6><strong><i>Consumables Saled  in &nbsp;&nbsp;<?php echo date('F') ?></i><br>&nbsp;&nbsp;&nbsp;&nbsp; <?php echo  number_format((float)$totalSales['totpurchCons'],0);?></strong></h6>

              </div>
              </div>
          </div>
        </div>
        <div class="row">
          <section class="col-lg-7 connectedSortable" style=" margin-left: 20%;">
            <div class="card"  >
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  <strong>Purchases</strong>
                </h3>
            
              </div>
              <div class="card-body" >
                <div class="tab-content p-0">
				<table id="dt_example" style="width: 60%; margin-left: auto; margin-right: auto;" border = "1">
				<tr><th><strong>No</strong></th><th><strong>Month</strong></th><th><strong>Purchases</strong></th></tr>
				<?php
	$resultMvt1 = mysqli_query($conn, $selectLastId);	

			while($row = mysqli_fetch_assoc($resultMvt1)) {
	$month = date('F', strtotime($row['dateOfOrder']));
	$originalDate = $row['dateOfOrder'];
$newDate = date("d-m-Y", strtotime($originalDate));
	$IH++;
	?>
	<tr>
	<td><?php echo $IH?></td><td><?php echo $newDate ;?></td><td><strong><?php echo number_format((float)$row['tosales'],1)?></strong></td>
	
	</tr>
	
	<?php
	

			}
 ?>
                </table>  
                </div>
              </div>
            </div>
 
          </section>
         </div>
      </div>
    </section>
  </div>
  <footer class="main-footer">
    <strong>Copyright &copy;  </strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
    </div>
  </footer>
</div>
<script src="pressources/jquery.min.js"></script>
<script src="pressources/adminlte.js"></script>
</body>
</html>
