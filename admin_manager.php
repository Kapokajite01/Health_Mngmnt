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
VALUES('','$name','$lname','$tel','Displayed Users Manager',now())");
	}
if(isset($_POST['submit'])){
$fname=$_POST['first_name'];
$lname=$_POST['last_name'];
$phone=$_POST['phone'];
$user=$_POST['username'];
$pas=$_POST['password'];
$rol=$_POST['role'];
$select=("SELECT * FROM users WHERE username='$user' LIMIT 1");
$result = mysqli_query($conn, $select);
while($rows = mysqli_fetch_assoc($result)) {
$usernm = $rows['username'];
$exist = "Yes";
}
 if($exist =="Yes"){
$message="<font color=red>Sorry The Username You Entered Already Exists Try Again!!!!!</font>";
 }
 else{
	 $insert=("INSERT INTO users(first_name,last_name,phone,username,password,role)
VALUES('$fname','$lname','$phone','$user','$pas','$rol')");
$insertresult = mysqli_query($conn, $insert);
$message1="<font color=blue>User Added Succesfully</font>";
$logsinser=("INSERT INTO logs(id,name,lname,phone,action,time)
VALUES('','$name','$lname','$tel','Added New User',now())");		
	header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/admin_manager");
	$insertlogs = mysqli_query($conn, $logsinser);
}
	}
?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $username;?> - Pharmacy Sys</title>
<link rel="stylesheet" type="text/css" href="style/mystyle.css">
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" /> 
<link rel="stylesheet" href="style/table.css" type="text/css" media="screen" /> 
<script src="js/function.js" type="text/javascript"></script>
<script>
function validateForm()
{

//for alphabet characters only
var str=document.form1.first_name.value;
	var valid="abcdefghijklmnopqrstuvwxyz ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	//comparing user input with the characters one by one
	for(i=0;i<str.length;i++)
	{
	//charAt(i) returns the position of character at specific index(i)
	//indexOf returns the position of the first occurence of a specified value in a string. this method returns -1 if the value to search for never ocurs
	if(valid.indexOf(str.charAt(i))==-1)
	{
	alert("First Name Cannot Contain Numerical Values");
	document.form1.first_name.value="";
	document.form1.first_name.focus();
	return false;
	}}
	
if(document.form1.first_name.value=="")
{
alert("Name Field is Empty");
return false;
}

//for alphabet characters only
var str=document.form1.last_name.value;
	var valid="abcdefghijklmnopqrstuvwxyz ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	//comparing user input with the characters one by one
	for(i=0;i<str.length;i++)
	{
	//charAt(i) returns the position of character at specific index(i)
	//indexOf returns the position of the first occurence of a specified value in a string. this method returns -1 if the value to search for never ocurs
	if(valid.indexOf(str.charAt(i))==-1)
	{
	alert("Last Name Cannot Contain Numerical Values");
	document.form1.last_name.value="";
	document.form1.last_name.focus();
	return false;
	}}
	

if(document.form1.last_name.value=="")
{
alert("Name Field is Empty");
return false;
}

}

</script>
 <style>
<style>#left-column {height: 477px;}
 #main {height: 477px;}</style>
 </style>
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
			<li><a href="admin_reception">Receptionist</a></li>
			<li><a href="admin_stock">Stock Manager</a></li>
			<li><a href="admin_mutuelle">Mutuelle</a></li>
			<li><a href="logs">Logs</a></li>
			<li><a href="logout">Logout</a></li>
			</ul>	
</div>
		</div>
<div id="main">
<div id="tabbed_box" class="tabbed_box">  
    <h4>Manage Manager</h4> 
<hr/>	
    <div class="tabbed_area">  

      
        <ul class="tabs">  
            <li><a href="javascript:tabSwitch('tab_1', 'content_1');" id="tab_1" class="active">View User</a></li>  
            <li><a href="javascript:tabSwitch('tab_2', 'content_2');" id="tab_2">Add User</a></li>  
              
        </ul>  
          
        <div id="content_1" class="content">  
			<?php echo $message;
			  echo $message1;
			  
		/* 
		View
        Displays all data from 'Manager' table
		*/

        // connect to the database
        // get results from database
		
        $Mselect = ("SELECT * FROM users  order by first_name "); 
         $result = mysqli_query($conn, $Mselect);      
				
					    
        // display data in table
        
        echo "<table border='1' cellpadding='5' align='center'>";
        echo "<tr> <th>ID</th><th>Firstname </th> <th>Lastname </th> <th>Username </th><th>Role </th><th>Signature </th><th>Update </th><th>Delete</th></tr>";

        // loop through results of database query, displaying them in the table
        while($row = mysqli_fetch_assoc( $result )) {
                $patientid = $row['id'];
                // echo out the contents of each row into a table
                echo "<tr>";
                
                echo '<td>' . ++$I. '</td>';
                echo '<td>' . $row['first_name'] . '</td>';
				echo '<td>' . $row['last_name'] . '</td>';
				echo '<td>' . $row['username'] . '</td>';
				echo '<td>' . $row['role'] . '</td>';
				?>
				<td>
				<?php 
				$selectfile = ("SELECT sigature from signatures WHERE patient_id = '$patientid'");
				         $resultsign = mysqli_query($conn, $selectfile);      

        while($rowsign = mysqli_fetch_assoc( $resultsign )) {
				$signature = $rowsign['sigature'];	
				echo '<img src="sigantures/'.$signature.'" width="35" height="15" border="0" />';
				}
				?>
				</td>
				<td><a href="uploadsignature?userid=<?php echo $row['id']?>">Upload Signature</a></td>
				<td><a href="update_manager?userid=<?php echo $row['id']?>"><img src="images/update-icon.png" width="35" height="35" border="0" /></a></td>
				<td><a href="delete_manager?manager_id=<?php echo $row['id']?>"><img src="images/delete-icon.jpg" width="35" height="35" border="0" /></a></td>
				<?php
		 } 
        // close table>
        echo "</table>";
?> 
        </div>  
        <div id="content_2" class="content">  
		           <!--Cashier-->
		<?php echo $message;
			  echo $message1;
			  ?>
		<form name="form1" onsubmit="return validateForm(this);" action="admin_manager" method="post" >
			<table width="220" height="106" border="0" >	
				<tr><td><strong>First Name</strong></td><td align="center"><input name="first_name" type="text" style="width:170px" placeholder="First Name" required="required" id="first_name" /></td></tr>
				<tr><td><strong>Last Name</strong></td><td align="center"><input name="last_name" type="text" style="width:170px" placeholder="Last Name" required="required" id="last_name" /></td></tr>
				<tr><td><strong>Telephone</strong></td><td align="center"><input name="phone" type="text" style="width:170px"placeholder="Phone"  required="required" id="phone" /></td></tr>  
				<tr><td><strong>Role</strong></td><td align="center"><select name="role"  required>
									<option value="">----SELECT ROLE-----</option>
									<option value="Admin">Admin</option>
									<option value="Manager">Manager</option>
									<option value="Laboratory">Laboratory</option>
									<option value="Receptionist">Receptionist</option>
									<option  value="Consultation">Consultation</option>
									<option value="Mutuelle">Mutuelle</option>
									<option value="Maternite">Maternite</option>
									<option value="Pharmacist">Pharmacist</option>
									<option value="Family_planning">Family Planning</option>
									</select></td></tr>
				<tr><td><strong>Username</strong></td><td align="center"><input name="username" type="text" style="width:170px" placeholder="Username" required="required" id="username" /></td></tr>
				<tr><td><strong>Password</strong></td><td align="center"><input name="password" type="password" style="width:170px" placeholder="Password" required="required" id="password"/></td></tr>
				<tr><td></td><td align="right"><input name="submit" type="submit" value="Submit"/></td></tr>
            </table>
		</form>
        </div>   
        
      
    </div>  
  
</div>
 
</div>
</div>
</body>
</html>
