<?php
 error_reporting(0);
 include_once('connect_db.php');
    session_start();
    $role = $_SESSION['sess_userrole'];
	$name = $_SESSION['sess_name'];
	$lname = $_SESSION['sess_lname'];
	$tel = $_SESSION['sess_phone'];

    if(!$_SESSION['sess_username']) or ($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro') or $role!="Admin"){
      header('Location: logout');
    }
	else{
	$sql=("INSERT INTO logs(id,name,lname,phone,action,time)
VALUES('','$name','$lname','$tel','Cleaned Patient Table',now())");
	}
	?>
<!DOCTYPE html>
<html>
<head>
<title> Star Records System</title>
<link rel="stylesheet" type="text/css" href="style/mystyle.css">
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" /> 
<link rel="stylesheet" href="style/table.css" type="text/css" media="screen" /> 
<script src="js/function.js" type="text/javascript"></script>
<script src="js/validation_script.js" type="text/javascript"></script>
<style>
<style>#left-column {height: 477px;}
 #main {height: 477px;}</style>
 </style>
</head>
<body>
<div id="content">
<div id="header">
<h1 align="center"><a href="#"><img src="images/hd_logo.jpg"></a> Star Records System</h1></div>
<?php 
error_reporting(0);
// Define your username and password 
$username = "jack01"; 
$password = "Kulu1"; 

if ($_POST['txtUsername'] != $username || $_POST['txtPassword'] != $password) { 

?>
<h4 align="center"><font face="verdana" color="red"><a href="logout" style="text-decoration:none"> &#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
CLOSE </a></font></h4>
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
&#160;&#160;&#160;&#160;&#160;&#160;<img src="images/attention.jpg" alt="Mountain View" style="width:170px;height:80px;left:50px" align="middle">

<h2 align="center"><font face="verdana" color="red">Read This<hr/></font></h2> 
<p align="center"><font face="verdana" color="red">
By clicking on the [DELETE ALL] Button; <br> You will Loose all the Data you have in your Database;<br>
Including All Patients and Consumptions.<br>
<h3 align="center"><font face="verdana" color="red">Authentification Required To Delete All Records</font></h3> 

<form name="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"> 
    <p align="center"><label for="txtUsername">Username:</label> 
    <br /><input type="text" title="Enter your Username" name="txtUsername" /></p> 

    <p align="center"><label for="txtpassword">Password:</label> 
    <br /><input type="password" title="Enter your password" name="txtPassword" /></p> 

    <p align="center"><input type="submit" name="Submit" value="DELETE ALL" /></p> 


</form> 

<?php 

} 
else { 
$deleted=0;
$results=("select id,affiliate_number,count(*) from patient group by affiliate_number having count(*)>5");
    while($row=mysqli_fetch_assoc($results)){
        ("delete from patient where affiliate_number='{$row['affiliate_number']}' and id <> {$row['id']}");
		$deleted=$deleted+1;
    }
?> 
<br><br>
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;<img src="images/attention.jpg" alt="Mountain View" style="width:170px;height:80px;left:50px" align="middle">

<h2 align="center"><font face="verdana" color="red"><?php echo   $deleted. "&nbsp;&nbsp;Rows Deleted" ?><br><hr/>
<a href="logout" style="text-decoration:none"> CLOSE </a>

</font></h2> 


<?php 

} 

?> 



</div>
<hr/>	

	


</body>
</html>
