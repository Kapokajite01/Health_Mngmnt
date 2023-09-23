<?php
 error_reporting(0);
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!($_SESSION['sess_username']) or ($_SESSION['sess_postdsante'] !='Kulu') or ($role!="Admin")){
      header('Location: logout');
    }
 include_once('connect_db.php');
$userkid = $_GET['branchId'];
$select=("SELECT * FROM  branches  WHERE brancheId ='$userkid'");
$result = mysqli_query($conn, $select);
while($rows = mysqli_fetch_assoc($result)) {
$brancheName =  $rows['brancheName'];
$branchlevel  =   $rows['branchlevel '];
}	

if(isset($_POST['submit'])){
$brancheName=$_POST['branchname'];
$branchlevel =$_POST['branchlevel'];
 $sql="UPDATE  branches  SET brancheName='$brancheName', branchlevel ='$branchlevel' WHERE brancheId='$userkid'";
$UPDATED = mysqli_query($conn, $sql);
if($UPDATED) {header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/adminBranches");
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
			<li><a href="admin">Dashboard</a></li>
			<li><a href="admin_pharmacist">Pharmacist</a></li>
			<li><a href="admin_manager">Manager</a></li>
			<li><a href="adminBranches">Branches</a></li>
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
				<tr><td><strong>Branch Name<strong></td><td align="center"><input name="branchname" type="text" style="width:170px" placeholder="First Name" value="<?php echo $brancheName;?>" id="first_name" required/></td></tr>
				<tr><td><strong>Level<strong></td><td align="center"><?php
  $branch = "SELECT * from branches";
$resbranc = mysqli_query($conn, $branch);
?>

    <!--<select name="selectScript" id="select" style=' width:250px;height:30px'><option value="<?php echo $insurance;?>" ><strong><?php echo $insurance;?><strong></option>
      <?php
while ($row = mysqli_fetch_assoc($resbranc)) {
            echo '<option value="' . $row['brancheI'] . '">' . $row['brancheName'] . '</option>';
        }
      ?>
    </select>--><select name="branchlevel"  required>
									<option value="">----SELECT Level-----</option>
									<option value="Headquarter">Head Quarter</option>
									<option value="Brach">Branch</option>
									</select></td></tr>  
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
