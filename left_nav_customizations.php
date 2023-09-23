
<!DOCTYPE html>
<style>
/* Full-width input fields */
input[type=text] {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  font-size: 16px;
  border: 1px solid #ddd;
  margin-bottom: 0px;
}


/* Full-width input fields submit */
.buttonx1 {
    background-color: #A9DFBF  ;; 
    color: #145A32; 
    border: 2px solid #D6EAF8;
	padding: 10px;
	border-radius: 3px;
}

/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border-radius: 5px;
    cursor: pointer;
    width: 50%;
	height:100%;
}

/* Extra styles for the cancel button */
.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color:#CB4858  ;
	border-radius: 50px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;

}

/* Modal Contentes/Box */
.modal-contentes {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 3px solid #008b8b;
	border-radius: 5%;
    width: 45%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
	border-radius: 50%;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
}
    
@keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 50%;
    }
}
</style>
   <style>
* {
  box-sizing: border-box;
}
#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  font-size: 16px;
  border: 1px solid #ddd;
  margin-bottom: 0px;
}
#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 15px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 10px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #b4d5d5;
}
</style>
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Scoring Customization</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="as/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="as/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="as/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
	      <!-- GOOGLE FONTS-->
	   <link href="aassets/css/bootstrap1.css" rel="stylesheet" />
    <!-- FONT AWESOME ICONS  -->
    <link href="aassets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="aassets/css/style.css" rel="stylesheet" />
   
</head>
<?php
include'mydb_connection/My_dbinsert.php';
include('mydb_connection/my_connect_db.php');
$userid = $_SESSION['userid'];
$role = $_SESSION['role'];
if(!$userid or $role != 'Administrator'){
	header('location:logout');
}
$email = $rowval['email'];	
$fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];	
$account = $_SESSION['account'];

?>
<body>

	
      
           
          
    <div id="wrapper" >
         <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">
          <img src="images/logo.jpg" alt="logo" />

                    </a>
			
				
					
					
                </div>
				
              <?php
					include('include/database.php');
					
				?>
			
                <span class="logout-spn" >
                  <a href="logout.php" style="color:#fff;">LOGOUT</a>  
                </span>
            </div>
				<div align="left">
				<ul>
					<strong>Welcome &nbsp;</strong><a style="color:#fff;"><?php echo $row['fname'];echo '&nbsp';echo $row['lname'];?></a>
					</ul>
					
					</div>
        </div>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation"style=" margin-left: auto;">
            <div class="sidebar-collapse" >
                <ul class="nav" id="main-menu">
                 


                    <li class="active-link">
                        <a href="admin_homepage" ><i class="fa fa-home "></i><span >DASHBOARD</span></a>
                    </li>
                   

                    <li align="centered">
                        <a href="duration_contract_custom"><span>Extraduration Over Contract</span></a>
                    </li>
                                        <li align="centered">
                        <a href="gender_custom"><span>Gender</span></a>
                    </li>
                                        <li align="centered">
                        <a href="status_custom"><span>Martial Status</span></a>
                    </li>
                                        <li align="centered">
                        <a href="#"><span>Addres</span></a>
                    </li>
                                        <li align="centered">
                        <a href="activity_custom"><span>Activity</span></a>
                    </li>
                                        <li align="centered">
                        <a href="age_custom"><span>Age</span></a>
                    </li>
                                        <li align="centered">
                        <a href="inservice_custom"><span>Time in Bank</span></a>
                    </li>
                                        <li align="centered">
                        <a href="lastpayment_custom"><span>Last Credit Payment</span></a>
                    </li>
                                        <li align="centered">
                        <a href="duration_contract_custom"><span>Incomes</span></a>
                    </li>
                                        <li align="centered">
                        <a href="duration_contract_custom"><span>Coraterals</span></a>
                    </li>
                    <li>
                    <li align="centered">
                        <a href="users_homepage"><span>Users Management</span></a>
                    </li>
					                   <li align="centered">
                        <a href="duration_contract_custom"><span>Logs</span></a>
                    </li>
					                   <li align="centered">
                        <a href="logout"><span>Logout</span></a>
                    </li>
                    
                    </li>
                  
                    
                </ul>
            </div>