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
	$PATIENTID = $_GET['userid'];
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
    <h4>Siganture Upload</h4> 
<hr/>	
    <div class="tabbed_area">  

      
             <form action="" method="POST" enctype="multipart/form-data">

          
        <div id="content_1" class="content">  
			<strong>Upload File</strong><input type="file" name="file"  required aria-required="true" aria-describedby="name-format"/><br><br>
			<input name="btn-upload" id="bigbutton" type="submit" value="Submit" class="button"/> 
        </div>  
       
       </form> 
      
    </div>  
  
</div>
 
</div>
</div>
</body>
<?php
if(isset($_POST['btn-upload']))
{
	$random =rand();

	$file = $_FILES['file']['name'];
	$file_size = $_FILES['file']['size'];
	$file_type = $_FILES['file']['type'];
    $uploadfile = $uploaddir . basename($_FILES['file']['name']);
	$new_file_name = strtolower($file);
	// make file name in lower case
	$final_file=str_replace('-','',$new_file_name);
	//$final_file=str_replace(' ','_',$new_file_name);
$final_file = $random.'_'.$final_file;
	if(move_uploaded_file($_FILES["file"]["tmp_name"], "sigantures/".$final_file))
	{
	 $insert=("INSERT INTO signatures(sign_id,patient_id,sigature)
VALUES('','$PATIENTID','$final_file')");
$insertresult = mysqli_query($conn, $insert);	

	?>
		<script>
		alert('successfully uploaded');
        </script>
		<?php
		echo "<script>window.location='admin_manager';</script>";

	}
	else
	{
		?>
		<script>
		alert('error while uploading file');
        </script>
		<?php
				echo "<script>window.location='admin_manager';</script>";

	}
}




?>
</html>
