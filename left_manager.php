
<?php

error_reporting(0);
session_start();
	
include('mydb_connection/my_connect_db.php');
$userid = $_SESSION['userid'];
$role = $_SESSION['role'];
if(!$userid or $role != 'Branch Manager'){
	header('location:logout');
}
$result = mysql_query("select * from users_table WHERE id = '$userid'");
while ($rowval = mysql_fetch_array($result)) {
$email = $rowval['email'];	
$fname = $rowval['First_Nmae'];	
$lname = $rowval['lname'];	
}

?> 


 <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
   <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-left navbar-brand-wrapper d-flex align-items-top justify-content-left">
          <img src="images/logo.jpg" alt="logo" />
 
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center"><h3><strong>[<?php echo $role;?>]</strong></h3>
          <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown d-none d-xl-inline-block">
            <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <span class="profile-text"><strong>Hello, <?php echo  $fname.'&nbsp;&nbsp;&nbsp;&nbsp;'.$lname?>!</strong></span>
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
       <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
         <li class="nav-item">
          <a href="q_loan_brach_manager_inbox">  <div class="nav-link" >
              <span class="menu-title"><strong><font size="3px">Dashboard </font></strong></span>   
            </div></a>
          </li>
		        
		<li class="nav-item">
          <a href="check_borrowers">  <div class="nav-link" >
              <span class="menu-title"><font size="3px"><strong>Borrowers</font> </strong></span>   
            </div></a>
          </li>
		   <li class="nav-item">
          <a href="check_loans">  <div class="nav-link" >
              <span class="menu-title"><font size="3px"><strong>Loans</font> </strong></span>   
            </div></a>
          </li>
		  <li class="nav-item">
          <a href="check_Amortization">  <div class="nav-link" >
              <span class="menu-title"><font size="3px"><strong>Repayments</font> </strong></span>   
            </div></a>
          </li>
		  <li class="nav-item">
          <a href="check_Amortization">  <div class="nav-link" >
              <span class="menu-title"><font size="3px"><strong>Collaterals</font> </strong></span>   
            </div></a>
         <li class="nav-item">
          <a href="check_Amortization">  <div class="nav-link" >
              <span class="menu-title"><font size="3px"><strong>Statistics</font> </strong></span>   
            </div></a>
          </li>			  
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
	          <div class="content-wrapper">
<br><br>
<div class="main-content">
				<div class="main-content-inner">
				
					<div class="page-content">
						<!-- /.ace-settings-container -->

						<!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="row">
									<div class="col-xs-12">
										<div class="tabbable">
										
											
											

											<div id="faq-list-1" class="panel-group accordion-style1 accordion-style2">
												<div class="panel panel-default">
													<div class="panel-heading">
														<a href="#faq-1-1" data-parent="#faq-list-1" data-toggle="collapse" class="accordion-toggle collapsed">
															<i class="ace-icon fa fa-chevron-left pull-right" data-icon-hide="ace-icon fa fa-chevron-down" data-icon-show="ace-icon fa fa-chevron-left"></i>
                                                       <h5><i><strong>Waiting for Approval  &nbsp;&nbsp;<?php if ($num_rows>0){echo '<strong><font color="tomato">['. $num_rows.']</font></strong>';}else{echo '<strong>['. $num_rows.']</strong>'; }?></strong></i></h5>
														</a>
													</div>

													<div class="panel-collapse collapse" id="faq-1-1">
														<div class="panel-body">