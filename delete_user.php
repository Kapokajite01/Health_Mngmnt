<!DOCTYPE html>
<html lang="en">

<head>
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
$account = $_SESSION['account'];
if(!$account){
	header('location:logout');
}
?>
  <?php include 'left_admin.php';?>

<body>
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
 ?>

<?php  

$ID=$_GET['id'];


?>
<div class="row">
	<div class="col-md-12">
              
		<div class="panel panel-default">
			 <!-- /panel-heading -->
			<div class="panel-body">
   <?php

  $query="select * from users_table where id='$ID'";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
	$firstname = $row['First_Nmae'];	
	$lastname =$row['lname'];
	$username = $row['username'];
	$password = $row['password'];
	$role = $row['role'];
	$branch = $row['branch'];
		
	}
}
  ?>
		<div class="modal-body">
        <form method="post" enctype="multipart/form-data" class="form-horizontal" style="margin-left:250px;">
	      	<div id="add-brand-messages"></div>

	        <div class="form-group">
	        	<label for="firstname" class="col-sm-3 control-label">First Name: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="lname" placeholder="First Name" name="fname" value="<?php echo $firstname; ?>" autocomplete="off" required>
				    </div>
	        </div> <!-- /form-group-->	
               <div class="form-group">
	        	<label for="lastname" class="col-sm-3 control-label">Last Name: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="lname" placeholder="Last Name" name="lname" value="<?php echo $lastname; ?>"autocomplete="off" required>
				    </div>
	        </div> <!-- /form-group-->	
<div class="form-group">
	        	<label for="uname" class="col-sm-3 control-label">Username: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="username" placeholder="Username" name="username" value="<?php echo $username; ?>"autocomplete="off" required>
				    </div>
	        </div> <!-- /form-group-->
<div class="form-group">
	        	<label for="pwd" class="col-sm-3 control-label">Password: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="Password" class="form-control" id="password" placeholder="Password" name="password" value="<?php echo $password; ?>"autocomplete="off" required>
				    </div>
	        </div> <!-- /form-group-->				
	        <div class="form-group">
	        	<label for="rol" class="col-sm-3 control-label">Role: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				       <input type="text" class="form-control" id="role" placeholder="Password" name="role" value="<?php echo $role; ?>"autocomplete="off" required>
				    </div>
	        </div> <!-- /form-group-->
                <!-- /form-Directorate-->				
	        <div class="form-group">
	        	<label for="directorate" class="col-sm-3 control-label">Branch: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				        <input type="text" class="form-control" id="directorate" placeholder="Password" name="directorate" value="<?php echo $branch; ?>"autocomplete="off" required>
				    </div>
	        </div> <!-- /form-Directorate-->	
			
	        <button type="submit" name="delete" class="btn btn-success"  style="float:right;"> <i class="glyphicon glyphicon-trash"></i> Delete</button>
	        
		</form>
		<a href="users_homepage"><button type="text" class="btn btn-default" style="float:right;"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button></a>
	      </div> <!-- /modal-body -->
			<?php

if (isset($_POST['delete'])) {

{
$mydelete = (" DELETE FROM users_table WHERE id='$ID' ");
$resultdelete = mysqli_query($conn, $mydelete);
if($resultdelete){
echo "<script>alert('User Successfully Deleted!'); window.location='users_homepage'</script>";
}
}

}

?>	
				
				
				
				
				

			</div> <!-- /panel-body -->
		</div> <!-- /panel -->		
	</div> <!-- /col-md-12 -->
</div> <!-- /row -->
<?php require_once 'includes/footer.php'; ?>