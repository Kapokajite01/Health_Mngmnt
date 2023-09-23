
<?php
	
include('mydb_connection/my_connect_db.php');
$userid = $_SESSION['userid'];
$role = $_SESSION['role'];
if(!$userid or !$role){
	header('location:logout');
}
$email = $rowval['email'];	
$fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];	
$account = $_SESSION['account'];

?>
<style>
body {margin:0;font-family:Arial}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.active {
  background-color: #4CAF50;
  color: white;
}

.topnav .icon {
  display: none;
}

.dddropdown {
  float: left;
  overflow: hidden;
}

.dddropdown .dropbtn {
  font-size: 17px;    
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.dddropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dddropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.topnav a:hover, .dddropdown:hover .dropbtn {
  background-color: #555;
  color: white;
}

.dddropdown-content a:hover {
  background-color: #ddd;
  color: black;
}

.dddropdown:hover .dddropdown-content {
  display: block;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child), .dddropdown .dropbtn {
    display: none;
  }
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
  .topnav.responsive .dddropdown {float: none;}
  .topnav.responsive .dddropdown-content {position: relative;}
  .topnav.responsive .dddropdown .dropbtn {
    display: block;
    width: 100%;
    text-align: left;
  }
}
</style>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
   
	
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
       <nav class="sidebar sidebar-offcanvas" id="sidebar">
       
      </nav>
      <!-- partial -->
      <div class="main-panel">
	          <div class="content-wrapper">
<div class="main-content" align="center">
				<div class="main-content-inner">
				
					<div class="page-content">
						<!-- /.ace-settings-container -->

						<!-- /.page-header -->

								<!-- PAGE CONTENT BEGINS -->
										