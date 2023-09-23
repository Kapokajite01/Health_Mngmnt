<?php 
 error_reporting(0);
 include_once('connect_db.php');
    session_start();
    $role = $_SESSION['sess_userrole'];
	$name = $_SESSION['sess_name'];
	$lname = $_SESSION['sess_lname'];
	$tel = $_SESSION['sess_phone'];
    if(!($_SESSION['sess_username']) or ($_SESSION['sess_postdsante'] !='Kulu') or ($role!="Admin")){
      header('Location: logout');
    }
	else{
	$sql=("INSERT INTO logs(id,name,lname,phone,action,time)
VALUES('','$name','$lname','$tel','Login',now())");
	$logsinserted = mysqli_query($conn, $sql);

	}
?>

<!DOCTYPE html>
<html>
<head>
<title>Heath Center Mngt Sys</title>
<link rel="stylesheet" type="text/css" href="style/mystyle.css">
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" /> 
<link rel="stylesheet" type="text/css" href="style/dashboard_styles.css"  media="screen" />
<script src="js/function.js" type="text/javascript"></script>
<style>
#left_column{
height: 470px;
}

</style>
</head>
<body>
<div id="content">
<div id="header">
<h1><a href="#"><img src="images/hd_logo.jpg"></a>Health Center Management System</h1></div>
<div id="left_column">
<div id="button">
<ul>
			<li><a href="admin">Dashboard</a></li>
			<li><a href="">Pharmacist</a></li>
			<li><a href="admin_manager">Manage Users</a></li>
			<li><a href="">Receptionist</a></li>
			<li><a href="">Stock Manager</a></li>
			<li><a href="">Mutuelle</a></li>
			<li><a href="logs">Logs</a></li>
			<li><a href="logout">Logout</a></li>
		</ul>	
</div>
		</div>
<div id="main">
    
 <!-- Dashboard icons -->
            <div >
            	<a href="admin" class="dashboard-module">
                	<img src="images/admin_icon.jpg" width="75" height="75" alt="edit" />
                	<span>Dashboard</span>
                </a>
  
                
                <a href="admin_manager" class="dashboard-module">
                	<img src="images/manager_icon.png"  width="75" height="75" alt="edit" />
                	<span>Manage Users</span>
                </a>
				</div>
				<div >
                <!--  
                <a href="" class="dashboard-module">
                	<img src="images/patients_1.png" width="75" height="75" alt="edit" />
                	<span>Receptionist</span>
                </a>	
                              <a href="" class="dashboard-module">
                	<img src="images/pharmacist_icon.jpg"  width="75" height="75" alt="edit" />
                	<span>Laboratory</span>
                </a>
				<a href="" class="dashboard-module">
                	<img src="images/invoic_ 1.jpg" width="75" height="75" alt="edit" />
                	<span>Manager</span>-->
                </a>
                <a href="logs" class="dashboard-module">
                	<img src="images/cashier_icon.jpg" width="75" height="75" alt="edit" />
                	<span>Logs</span>
                </a>				
			</div>
</div>
<div id="footer" align="Center"><font color="white"><strong> Designed By Digital Star.</strong></font></div>
</div>
</body>
</html>
