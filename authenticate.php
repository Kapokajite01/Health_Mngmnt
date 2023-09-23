<?php 
include_once('connect_db.php');

	session_start();

	$username = "";
	$password = "";

	if(isset($_POST['role'])){
		$role1 = $_POST['role'];
	}
	if(isset($_POST['username'])){
		$username = $_POST['username'];
	}
	if (isset($_POST['password'])) {
		$password = $_POST['password'];

	}
	
	$q ="SELECT *  FROM users  WHERE username = '$username' AND password = '$password' ";
	$result = mysqli_query($conn, $q);
	
	  	while($row = mysqli_fetch_assoc($result)) {
			$exist =1;
	    $_SESSION['sess_user_id'] = $row['id'];
		$_SESSION['sess_username'] = $row['username'];
  		$_SESSION['sess_name'] = $row['first_name'];
		$_SESSION['sess_lname'] = $row['last_name'];
		$_SESSION['sess_phone'] = $row['phone'];
        $_SESSION['sess_userrole'] = $row['role'];
        $_SESSION['sess_userrole1'] = $role1;
		$_SESSION['dirskhpe_rangiro'] = 'dirskhpe_rangiro';
		$_SESSION['sess_postdsante'] ='Kulu';

	}
	if($exist == 1){
		if( $_SESSION['sess_userrole'] == "Admin"){
			header('Location: admin');
			}
		elseif( $_SESSION['sess_userrole'] == "Pharmacist"){
			header('Location: pharmacy');
		}
		elseif( $_SESSION['sess_userrole'] == "Laboratory"){
			header('Location: laboratory');
		}
		elseif( $_SESSION['sess_userrole'] == "Consultation"){
			header('Location: consultation');
		}
		elseif( $_SESSION['sess_userrole'] == "cashier"){
			header('Location: cashier');
		}
		elseif(( $_SESSION['sess_userrole'] == "Receptionist") OR($_SESSION['sess_userrole'] == "Mutuelle")){
			header('Location: m_reception');
		}
		elseif( $_SESSION['sess_userrole'] == "Family_planning"){
			header('Location: family_palnning');
		}
		elseif( $_SESSION['sess_userrole'] == "Manager"){
			header('Location: manager');
		}
		elseif( $_SESSION['sess_userrole'] == "Maternite"){
			header('Location: maternite');
		}		
		elseif( $_SESSION['sess_userrole'] == "Mutuelle"){
			header('Location: u_mutuelle');
		}
		elseif( $_SESSION['sess_userrole'] == "CPN"){
			header('Location: cprenatale');
		}		
		else{
		header('Location: logout');
	}
		
	}
	else{
		header('Location: logout');
	}
  
	


?>