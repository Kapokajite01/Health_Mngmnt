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

  <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
     
      <!-- partial -->
			
						<!-- /.ace-settings-container -->

						<!-- /.page-header -->

								<!-- PAGE CONTENT BEGINS -->
						
<?php 
require_once 'includes/header.php';
require_once 'connect_db.php';
 ?>
	<div class="col-md-12">
		         <div class="panel panel-default">
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Manage Users</div>
			</div> <!-- /panel-heading -->
			<div class="panel-body">

				<div class="remove-messages"></div>

				<div class="div-action pull pull-right" style="padding-bottom:20px;">
					<button class="btn btn-default button1" data-toggle="modal" data-target="#addBrandModel"> <i class="glyphicon glyphicon-plus-sign"></i> Add User </button>
				</div> <!-- /div-action -->				
				
				<table class="table" id="manageBrandTable">
					<thead>
						<tr>							
							<th>First name</th>
							<th>Last name</th>
							<th>Username</th>
							<th>Telephone</th>
							<th>Email</th>
							<th>Role</th>
							<th>Branch</th>
							<th style="width:15%;">Options</th>
						</tr>
					</thead>
				
<?php
$sql = "SELECT * FROM users_table ";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
		$id=$row['id'];
		echo "<tr>";
        echo "<td>".$row["First_Nmae"]."</td>"."<td>" .$row["lname"]."</td>"."<td>" .$row["username"]."</td>"."<td>".$row["telephone"]."</td>"."<td>".$row["email"]."</td>"."<td>" .$row["role"]."</td>"."<td>" .$row["branch"]."</td>";?>
		<td><a href="user_edit<?php echo '?id='.$id; ?>"><img src="images/edit.png"></a><img src="images/doubleseparater.png"><a href="delete_user<?php echo '?id='.$id; ?>"><img src="images/recyclebin.png"></a></td>
		<?php
		echo "</tr>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>
</table>
				<!-- /table -->

			</div> <!-- /panel-body -->
		</div> <!-- /panel -->		
	</div> <!-- /col-md-12 -->
</div> <!-- /row -->
<div class="modal fade" id="addBrandModel" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    	
    	<form class="form-horizontal" id="submitBrandForm" action="php_action/create_user" method="POST">
	      
	      <div class="modal-body">

	      	<div id="add-brand-messages"></div>

	        <div class="form-group">
	        	<label for="firstname" class="col-sm-3 control-label">First Name: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="firstname" placeholder="First Name" name="firstname" autocomplete="off" required>
				    </div>
	        </div> <!-- /form-group-->	
               <div class="form-group">
	        	<label for="lastname" class="col-sm-3 control-label">Last Name: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="lastname" placeholder="Last Name" name="lastname" autocomplete="off" required>
				    </div>
	        </div> <!-- /form-group-->	
<div class="form-group">
	        	<label for="uname" class="col-sm-3 control-label">Username: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="uname" placeholder="Username" name="uname" autocomplete="off" required>
				    </div>
	        </div> <!-- /form-group-->
<div class="form-group">
	        	<label for="pwd" class="col-sm-3 control-label">Password: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="pwd" placeholder="Password" name="pwd" autocomplete="off" required>
				    </div>
	        </div> <!-- /form-group-->				
	        <div class="form-group">
	        	<label for="rol" class="col-sm-3 control-label">Role: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <select class="form-control" id="rol" name="rol" required>
				      	<option value="">~~SELECT Role~~</option>
				      	<option value="CheifAuditor">Cheif Auditor</option>
				      	<option value="Auditor">Auditor</option>
				      	<option value="Commercial Officer">Commercial Officer</option>
						<option value="Credit Mmanager">Credit Mmanager</option>
				      	<option value="Branch Manager">Branch Manager</option>
				      	<option value="Administrator">Administrator</option>
				      </select>
				    </div>
	        </div> <!-- /form-group-->
                <!-- /form-Directorate-->				
	        <div class="form-group">
	        	<label for="rol" class="col-sm-3 control-label">Branch: </label>
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
				      </select>
				    </div>
	        </div> <!-- /form-Directorate-->			
		<div class="form-group">
	        	<label for="uname" class="col-sm-3 control-label">Email: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="email@yahoo.fr" autocomplete="off" >
				    </div>
	        </div> <!-- /form-group-->

	      </div> <!-- /modal-body -->
	      
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        
	        <button type="submit" class="btn btn-primary" data-loading-text="Loading..." autocomplete="off">Save User</button>
	      </div>
	      <!-- /modal-footer -->
     	</form>
	     <!-- /.form -->
    </div>
    <!-- /modal-content -->
  </div>
  <!-- /modal-dailog -->
</div>
<!-- / add modal -->
<!-- edit brand -->
<div class="modal fade" id="editBrandModel" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    	
    	<form class="form-horizontal" id="editBrandForm" action="php_action/edituser" method="POST">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-edit"></i> Edit User</h4>
	      </div>
	      <div class="modal-body">

	      	<div id="edit-brand-messages"></div>

	      	<div class="modal-loading div-hide" style="width:50px; margin:auto;padding-top:50px; padding-bottom:50px;">
						<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
						<span class="sr-only">Loading...</span>
					</div>

		      <div class="edit-brand-result">
		      	<div class="form-group">
		        	<label for="editfirstname" class="col-sm-3 control-label">First Name: </label>
		        	<label class="col-sm-1 control-label">: </label>
					    <div class="col-sm-8">
					      <input type="text" class="form-control" id="editfirstname" placeholder="First Name" name="editfirstname" autocomplete="off">
					    </div>
		        </div> <!-- /form-group-->	 
<div class="form-group">
		        	<label for="editlastname" class="col-sm-3 control-label">Last Name: </label>
		        	<label class="col-sm-1 control-label">: </label>
					    <div class="col-sm-8">
					      <input type="text" class="form-control" id="editlastname" placeholder="last Name" name="editlastname" autocomplete="off">
					    </div>
		        </div> <!-- /form-group-->
<div class="form-group">
		        	<label for="editUsername" class="col-sm-3 control-label">Username: </label>
		        	<label class="col-sm-1 control-label">: </label>
					    <div class="col-sm-8">
					      <input type="text" class="form-control" id="editUsername" placeholder="Username" name="editUsername" autocomplete="off">
					    </div>
		        </div> <!-- /form-group-->
<div class="form-group">
		        	<label for="editpassword" class="col-sm-3 control-label">Password: </label>
		        	<label class="col-sm-1 control-label">: </label>
					    <div class="col-sm-8">
					      <input type="text" class="form-control" id="editpassword" placeholder="Brand Name" name="editpassword" autocomplete="off">
					    </div>
		        </div> <!-- /form-group-->				
		        <div class="form-group">
		        	<label for="editrole" class="col-sm-3 control-label">Role: </label>
		        	<label class="col-sm-1 control-label">: </label>
					    <div class="col-sm-8">
					      <select class="form-control" id="editrole" name="editrole">
					      	<option value="">~~SELECT~~</option>
					      	<option value="user">User</option>
					      	<option value="admin">Admin</option>
					      </select>
					    </div>
		        </div> <!-- /form-group-->	
		      </div>         	        
		      <!-- /edit brand result -->

	      </div> <!-- /modal-body -->
	      
	      <div class="modal-footer editBrandFooter">
	        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
	        
	        <button type="submit" class="btn btn-success" id="editBrandBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button>
	      </div>
	      <!-- /modal-footer -->
     	</form>
	     <!-- /.form -->
    </div>
    <!-- /modal-content -->
  </div>
  <!-- /modal-dailog -->
</div>
<!-- / add modal -->
<!-- /edit brand -->

<!-- remove brand -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeMemberModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Remove user</h4>
      </div>
      <div class="modal-body">
        <p>Do you really want to remove ?</p>
      </div>
      <div class="modal-footer removeBrandFooter">
        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
        <button type="button" class="btn btn-primary" id="removeBrandBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /remove brand -->

<script src="custom/js/user.js"></script>

<?php require_once 'includes/footer.php'; ?>