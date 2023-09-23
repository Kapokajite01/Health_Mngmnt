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
<?php 
require_once 'includes/header.php';
require_once 'connect_db.php';
 
$ID=$_GET['id'];


?>
<div class="row">
	<div class="col-md-12">

		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Manage Users</div>
			</div> <!-- /panel-heading -->
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
	$telephone = $row['telephone'];
		
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
				      <input type="Password" class="form-control" id="password" placeholder="Password" name="password" value="newqloan"autocomplete="off" required>
				    </div>
	        </div> <!-- /form-group-->				
<div class="form-group">
	        	<label for="uname" class="col-sm-3 control-label">Telephone: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="Telephone" placeholder="Telephone" name="telephone" value="<?php $telephone; ?>"autocomplete="off" required>
				    </div>
	        </div> <!-- /form-group-->

			

	        <div class="form-group">
	        	<label for="rol" class="col-sm-3 control-label">Role: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <select class="form-control" id="rol" name="role" required>
				      	<option value="">~~SELECT Role~~</option>
				      	<option value="CheifAuditor">Cheif Auditor</option>
				      	<option value="Auditor">Auditor</option>
				      	<option value="Commercial Officer">Commercial Officer</option>
						<option value="Credit Mmanager">Credit Mmanager</option>
				      	<option value="Branch Manager">Branch Manager</option>
				      	<option value="Administrator">Administrator</option>
				      </select>				    </div>
	        </div> <!-- /form-group-->
                <!-- /form-Directorate-->				
	        <div class="form-group">
	        	<label for="directorate" class="col-sm-3 control-label">Branch: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
 <select class="form-control" id="branch" name="branch" required>
				      	<option value="">~~SELECT Branch</option>
				      	<option value="Audit">Audit</option>
				      	<option value="Nyarugenge">Nyarugenge</option>
				      	<option value="Rwamagana">Rwamagana</option>
						<option value="Muhanga">Muhanga</option>
						<option value="Musanze">Musanze</option>
						<option value="Huye">Huye</option>
						<option value="Nyagatare">Nyagatare</option>
				      </select>				    </div>
	        </div> <!-- /form-Directorate-->	
			<div class="form-group">
	        	<label for="directorate" class="col-sm-3 control-label">Email: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				        <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="email@yahoo.fr" "autocomplete="off" >
				    </div>
	        </div> <!-- /form-Directorate-->	
			
	        <button type="submit" name="update" class="btn btn-success"  style="float:right;"> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button>
	        
		</form>
		<a href="users_homepage"><button type="text" class="btn btn-default" style="float:right;"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button></a>
	      </div> <!-- /modal-body -->
			<?php

if (isset($_POST['update'])) {

						$fname=$_POST['fname'];
						$lname=$_POST['lname'];
						$username=$_POST['username'];
						$password=sha1($_POST['password']);
						$role=$_POST['role'];
						$branch= $_POST['branch'];
						$email= $_POST['email'];
						$telephone = $_POST['telephone'];

$history_record=mysql_query("select * from users_table where id=$ID");

{
mysql_query(" UPDATE users_table SET First_Nmae='$fname',lname='$lname',username='$username',telephone = '$telephone', password='$password', role='$role',  branch='$branch',  email='$email' WHERE id = '$ID' ")or die(mysql_error());
echo "<script>alert('Successfully Updated User Info!'); window.location='users_homepage'</script>";
}

}

?>	
				
				
				
				
				

			</div> <!-- /panel-body -->
		</div> <!-- /panel -->		
	</div> <!-- /col-md-12 -->
</div> <!-- /row -->
<?php require_once 'includes/footer.php'; ?>