
<?php
	
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
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-left navbar-brand-wrapper d-flex align-items-top justify-content-left">
          <img src="images/logo.jpg" alt="logo" />

      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center"><h5><strong><font color="DarkRed ">[<?php echo $role;?>]</font></strong></h5>
          <ul class="navbar-nav navbar-nav-right"> 
		  <li class="nav-item dropdown d-none d-xl-inline-block">
		   <a href="duration_contract_custom" align="center"><strong>Extraduration Over Contract</strong></a>
			</li>
			<li class="nav-item dropdown d-none d-xl-inline-block">
		   <a href="gender_custom"><strong>Gender</strong></a>
			</li>
			<li class="nav-item dropdown d-none d-xl-inline-block">
		   <a  href="status_custom"><strong>Martial Status</strong></a>
			</li>
		   <li class="nav-item dropdown d-none d-xl-inline-block">
		   <a href="tbl"><strong>Adress</strong></a>
			</li>

          <li class="nav-item dropdown d-none d-xl-inline-block">
		   <a href="activity_custom"><strong>Employer's Activity</strong></a>
			</li>

          <li class="nav-item dropdown d-none d-xl-inline-block">
		   <a  href="tbl"><strong>Age</strong></a>
			</li>

          <li class="nav-item dropdown d-none d-xl-inline-block">
		   <a  href="tbl"><strong>Time in Service</strong></a>
			</li>

          <li class="nav-item dropdown d-none d-xl-inline-block">
		   <a  href="tbl"><strong>Last Credit Payment</strong></a>
			</li>

          <li class="nav-item dropdown d-none d-xl-inline-block">
		   <a  href="tbl"><strong>Incomes</strong></a>
			</li>

          <li class="nav-item dropdown d-none d-xl-inline-block">
		   <a  href="tbl"><strong>Coraterals</strong></a>
			</li>

          <li class="nav-item dropdown d-none d-xl-inline-block">
		   <a  href="tbl"><strong>Users Management</strong></a>
			</li>

          <li class="nav-item dropdown d-none d-xl-inline-block">
		   <a  href="tbl"><strong>Logs</strong></a>
			</li>

          <li class="nav-item dropdown d-none d-xl-inline-block">
            <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <span class="profile-text"><strong><font color="DarkRed ">[Hello, <?php echo  $fname.'&nbsp;&nbsp;&nbsp;&nbsp;'.$lname?>!]</font></strong></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <a class="dropdown-item p-0">
                <div class="d-flex border-bottom">
                  <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                    <i class="mdi mdi-bookmark-plus-outline mr-0 text-gray"></i>
                  </div>
                  <div class="py-3 px-4 d-flex align-items-center justify-content-center border-left border-right">
                    <i class="mdi mdi-account-outline mr-0 text-gray"></i>
                  </div>
                  <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                    <i class="mdi mdi-alarm-check mr-0 text-gray"></i>
                  </div>
                </div>
              </a>
              <a  href = "my_settings" target="_blank" class="dropdown-item mt-2">
                Manage Account
              </a>
                           <a href="logout" class="dropdown-item">
                Sign Out
              </a>
            </div>
          </li>
        </ul>
       
      </div>
	  
    </nav>
	
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
       <nav class="sidebar sidebar-offcanvas" id="sidebar" style=" margin-left: auto;">
          <a href="duration_contract_custom">  
              <span class="menu-title"><strong><font size="3px">Extraduration Over Contract </font></strong></span>   
            </a><hr>
            <a href="gender_custom">  
              <span class="menu-title"><strong><font size="3px">Gender</font></strong></span>   
            </a> <hr> 
            <a href="status_custom"> 
              <span class="menu-title"><strong><font size="3px">Martial Status</font></strong></span>   
            </a> <hr> 
            <a href="#">  
              <span class="menu-title"><strong><font size="3px">Addres</font></strong></span>   
           </a> <hr> 
            <a href="activity_custom">  
              <span class="menu-title"><strong><font size="3px">Activity</font></strong></span>   
            </a> <hr> 		
            <a href="admin_homepage">  
              <span class="menu-title"><strong><font size="3px">Age</font></strong></span>   
            </a> <hr> 
            <a href="admin_homepage">  
              <span class="menu-title"><strong><font size="3px">Time in Service</font></strong></span>   
            </a> <hr> 
            <a href="admin_homepage">  
              <span class="menu-title"><strong><font size="3px">Last Credit Payment</font></strong></span>   
            </a> <hr> 
            <a href="admin_homepage">  
              <span class="menu-title"><strong><font size="3px">Incomes</font></strong></span>   
            </a> <hr> 	            <a href="admin_homepage">  
              <span class="menu-title"><strong><font size="3px">Coraterals</font></strong></span>   
            </a> <hr> 
            <a href="admin_homepage">  
              <span class="menu-title"><strong><font size="3px">Users Management</font></strong></span>   
            </a> <hr> 	
            <a href="admin_homepage">  
              <span class="menu-title"><strong><font size="3px">Logs</font></strong></span>   
            </a> <hr> 				
      </nav>
      <!-- partial -->
      <div class="main-panel">
	          <div class="content-wrapper">
<br><br>
<div class="main-content"><strong><i>Customization Panel</i></strong></h3><hr>
				 
			
				<div class="main-content-inner">
				
					<div class="page-content">
						<!-- /.ace-settings-container -->

						<!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="row">
									<div class="col-xs-12">
										