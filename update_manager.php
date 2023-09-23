<?php
 error_reporting(0);
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!($_SESSION['sess_username']) or ($_SESSION['sess_postdsante'] !='Kulu') or ($role!="Admin")){
      header('Location: logout');
    }
 include_once('connect_db.php');
$userkid = $_GET['userid'];
$select=("SELECT * FROM users WHERE id ='$userkid'");
$result = mysqli_query($conn, $select);
while($rows = mysqli_fetch_assoc($result)) {
$firstname =  $rows['first_name'];
$lastname =   $rows['last_name'];
$telephone =   $rows['phone'];
$Uname =   $rows['username'];
$password =   $rows['role'];
}	

if(isset($_POST['submit'])){
$fname=$_POST['first_name'];
$lname=$_POST['last_name'];
$phone=$_POST['phone'];
$role=$_POST['role'];
$username=$_POST['username'];
$pas=$_POST['password'];
 
// get value of id that sent from address bar
$user=$_POST['user'];

// Retrieve data from database 
$sql="UPDATE users SET first_name='$fname', last_name ='$lname',phone ='$phone',username ='$username', password ='$pas',role = '$role' WHERE id='$userkid'";
$UPDATED = mysqli_query($conn, $sql);
if($UPDATED) {header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/admin.php");
}else{
$message1="<font color=red>Update Failed, Try again</font>";
}}
?>
<!DOCTYPE html>
<html>
<head>
<title><?php $username?> Pharmacy Sys</title>
<link rel="stylesheet" type="text/css" href="style/mystyle.css">
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" /> 
<script src="js/function.js" type="text/javascript"></script>
 <style>#left-column {height: 477px;}
 #main {height: 477px;}</style>
</head>
<body>
<div id="content">
<div id="header">
<h1><a href="#"><img src="images/hd_logo.jpg"></a> Pharmacy Sys</h1></div>
<div id="left_column">
<div id="button">
<ul>
			<li><a href="admin.php">Dashboard</a></li>
			<li><a href="admin_pharmacist.php">Pharmacist</a></li>
			<li><a href="admin_manager.php">Manager</a></li>
			<li><a href="admin_cashier.php">Cashier</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>	
</div>
		</div>
<div id="main">
<div id="tabbed_box" class="tabbed_box">  
    <h4>Manage Users</h4> 
<hr/>	
    <div class="tabbed_area">  
      
        <ul class="tabs">  
            <li><a href="javascript:tabSwitch('tab_1', 'content_1');" id="tab_1" class="active">Update User</a></li>  
              
        </ul>  
          
        <div id="content_1" class="content">  
		<?php echo $message1;?>
       <form action="" method="post" >
			<table width="420" height="106" border="0" >	
				<tr><td><strong>First Name<strong></td><td align="center"><input name="first_name" type="text" style="width:170px" placeholder="First Name" value="<?php echo $firstname;?>" id="first_name" required/></td></tr>
				<tr><td><strong>Last Name<strong></td><td align="center"><input name="last_name" type="text" style="width:170px" placeholder="Last Name" id="last_name" value="<?php echo $lastname;?>" required/></td></tr>
				<tr><td><strong>Telephone<strong></td><td align="center"><input name="phone" type="text" style="width:170px" placeholder="Phone" id="phone" value="<?php echo $telephone;?>"required /></td></tr>  
				<tr><td><strong>Role<strong></td><td align="center"><select name="role"  required>
									<option value="">----SELECT ROLE-----</option>
									<option>Admin</option>
									<option>Manager</option>
									<option>Laboratory</option>
									<option>Receptionist</option>
									</select></td></tr>  
				<tr><td><strong>Username<strong></td><td align="center"> <input name="username" type="text" style="width:170px" placeholder="Username" id="username"value="<?php echo $Uname;?>" /></td></tr>
				<tr><td><strong>Password<strong></td><td align="center"><input name="password" placeholder="Password" id="password" type="password" style="width:170px" required/></td></tr>
				<tr><td></td><td align="center"><input name="submit" type="submit" value="Update"/></td></tr>
            </table>
		</form>
		</div>  
    </div>  
</div>
</div>
<div id="footer" align="Center"> Pharmacy Sys 2019. Copyright All Rights Reserved</div>
</div>
</body>
</html>
