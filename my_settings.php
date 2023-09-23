<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Users Management</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  
<?php
error_reporting(0);
session_start();
	
include('mydb_connection/my_connect_db.php');
$telephone = $_SESSION['telephone'];
if(!$telephone){
	header('location:logout');
}
?>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
	
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
     
      <!-- partial -->
      <div class="main-panel">
	          <div class="content-wrapper">
<div class="main-content">
				<div class="main-content-inner">
				
					<div class="page-content">
						<!-- /.ace-settings-container -->

						<!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="row">
									<div class="col-xs-12">
										<div class="tabbable">
						
<?php 
require_once 'includes/header.php';
require_once 'connect_db.php';
$id = $_SESSION['id'];
$sql = "SELECT * FROM users_table WHERE id =$id";
$query = $connect->query($sql);
$result = $query->fetch_assoc();

$connect->close();
?>
<script type="text/javascript">
$(document).ready(function(){
      $('#txtInput').bind("cut copy paste",function(e) {
          e.preventDefault();
      });
    });
</script>
<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb">
		  <li><a href="setting">Home</a></li>		  
		  <li class="active">Setting</li>
		</ol>
				
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-wrench"></i> Setting</div>
			</div> <!-- /panel-heading -->

			<div class="panel-body">

				
				<form action="php_action/changeUsername" method="post" class="form-horizontal" id="changeUsernameForm">
					<fieldset>
						<legend>Change Username</legend>

						<div class="changeUsenrameMessages"></div>			

						<div class="form-group">
					    <label for="fname" class="col-sm-2 control-label">First name</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" id="fname" name="fname" placeholder="fname" value="<?php echo $result['First_Nmae']; ?>"disabled/>
					    </div></div>
						<div class="form-group">
						
						 <label for="lname" class="col-sm-2 control-label">Last name</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" id="lname" name="lname" placeholder="Usename" value="<?php echo $result['lname']; ?>"disabled/>
					    </div>
						
					  </div>
						<div class="form-group">
						
						 <label for="username" class="col-sm-2 control-label">Username</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" id="username" name="username" placeholder="Usename" value="<?php echo $result['username']; ?>" required/>
					    </div>
						
					  </div>

					  <div class="form-group">
					    <div class="col-sm-offset-2 col-sm-10">
					    	<input type="hidden" name="user_id" id="user_id" value="<?php echo $result['user_id'] ?>" /> 
					      <button type="submit" class="btn btn-success" data-loading-text="Loading..." id="changeUsernameBtn"> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes </button>
					    </div>
					  </div>
					</fieldset>
				</form>

				<form action="php_action/changePassword" method="post" class="form-horizontal" id="changePasswordForm">
					<fieldset>
						<legend>Change Password</legend>

						<div class="changePasswordMessages"></div>

						<div class="form-group">
					    <label for="password" class="col-sm-2 control-label">Current Password</label>
					    <div class="col-sm-10">
					      <input type="password" class="form-control" id="password" name="password" placeholder="Current Password">
					    </div>
					  </div>

					  <div class="form-group">
					    <label for="npassword" class="col-sm-2 control-label">New password</label>
					    <div class="col-sm-10">
					      <input type="password" class="form-control" id="npassword" name="npassword" placeholder="New Password">
					    </div>
					  </div>

					  <div class="form-group">
					    <label for="cpassword" class="col-sm-2 control-label">Confirm Password</label>
					    <div class="col-sm-10" id="txtInput">
					      <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password">
					    </div>
					  </div>

					  <div class="form-group">
					    <div class="col-sm-offset-2 col-sm-10">
					    	<input type="hidden" name="user_id" id="user_id" value="<?php echo $result['user_id'] ?>" /> 
					      <button type="submit" class="btn btn-primary"> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes </button>
					      
					    </div>
					  </div>


					</fieldset>
				</form>

			</div> <!-- /panel-body -->		

		</div> <!-- /panel -->		
	</div> <!-- /col-md-12 -->	
</div> <!-- /row-->


<script src="custom/js/setting.js"></script>
<?php require_once 'includes/footer.php'; ?>