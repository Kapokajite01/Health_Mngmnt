<?php

error_reporting(0);

include_once('connect_db.php');



session_start();

    session_start();

    $role = $_SESSION['sess_userrole'];

	$name = $_SESSION['sess_name'];

	$lname = $_SESSION['sess_lname'];

	$tel = $_SESSION['sess_phone'];

  

    if(!($_SESSION['sess_username']) or ($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro') or ($role!="Manager")){

      header('Location: logout');

	}

else{
	$datebellow = $_POST['datebellow'];
$sql="delete from consultation where time_reception  <='$datebellow'";
mysqli_query($conn, $sql);
echo '<script type="text/javascript"> setTimeout("self.close()", 1000); </script>';
}
?>


