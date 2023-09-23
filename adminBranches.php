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
$branch_name=$_POST['branch_name'];
$branchlevel=$_POST['branchlevel'];
$select=("SELECT * FROM   branches   WHERE brancheName='$branch_name' LIMIT 1");
$result = mysqli_query($conn, $select);
while($rows = mysqli_fetch_assoc($result)) {
$usernm = $rows['brancheName'];
$exist = "Yes";
}
 if($exist =="Yes"){
$message="<font color=red>Sorry The Branch  You Entered Already Exists Try Again!!!!!</font>";
 }
 else{
	 $insert=("INSERT INTO branches (brancheName,branchlevel)
VALUES('$branch_name','$branchlevel')");
$insertresult = mysqli_query($conn, $insert);
$message1="<font color=blue>Branch Added Succesfully</font>";
$logsinser=("INSERT INTO logs(id,name,lname,phone,action,time)
VALUES('','$name','$lname','$tel','Added New Branch',now())");		
	header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/adminBranches");
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
 <script type="text/javascript">
    function deleteConfirm(){
        var result = confirm("Do you really want to delete branch?");
        if(result){
            return true;
        }else{
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
			<li><a href="adminBranches">Branches</a></li>
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
            <li><a href="javascript:tabSwitch('tab_1', 'content_1');" id="tab_1" class="active">View Branches</a></li>  
            <li><a href="javascript:tabSwitch('tab_2', 'content_2');" id="tab_2">Add Branch</a></li>  
              
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
		
        $Mselect = ("SELECT * FROM Branches "); 
         $result = mysqli_query($conn, $Mselect);      
				
					    
        // display data in table
        
        echo "<table border='1' cellpadding='5' align='center'>";
        echo "<tr> <th>ID</th><th>Branch Name </th> <th>Level </th><th>Update </th><th>Delete</th></tr>";

        // loop through results of database query, displaying them in the table
        while($row = mysqli_fetch_assoc( $result )) {
                $patientid = $row['brancheId'];
                // echo out the contents of each row into a table
                echo "<tr>";
                
                echo '<td>' . ++$I. '</td>';
                echo '<td>' . $row['brancheName'] . '</td>';
				echo '<td>' . $row['branchlevel'] . '</td>';
				?>
				
				<td><a href="updateBranch?branchId=<?php echo $row['brancheId']?>"><img src="images/update-icon.png" width="35" height="35" border="0" /></a></td>
				<td><a href="deleteBranch?branchId=<?php echo $row['brancheId']?>"><img src="images/delete-icon.jpg" width="35" height="35" border="0" /></a></td>
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
		<form name="form1" onsubmit="return validateForm(this);" action="" method="POST" >
			<table width="220" height="106" border="0" >	
				<tr><td><strong>Branch Name</strong></td><td align="center"><input name="branch_name" type="text" style="width:170px" placeholder="Branch Name" required="required" id="first_name" /></td></tr>
				<tr><td><strong>Level</strong></td><td align="center"><select name="branchlevel"  required>
									<option value="">----SELECT Level-----</option>
									<option value="Headquarter">Head Quarter</option>
									<option value="Brach">Branch</option>
									</select>
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
