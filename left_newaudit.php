
<?php
	
include('../mydb_connection/my_connect_db.php');
$userid = $_SESSION['userid'];
$role = $_SESSION['role'];
if(!$userid or $role != 'CheifAuditor'){

	header('../location:logout');

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
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-left navbar-brand-wrapper d-flex align-items-top justify-content-left">
          <img src="../images/logo.jpg" />

      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center"><h5><strong>[<?php echo $role;?>]</strong></h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <div class="topnav" id="myTopnav" align="">
  <div class="dddropdown">
    <button class="dropbtn">Products 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dddropdown-content">
     </div>
  </div> 
    <div class="dddropdown">
    <button class="dropbtn">Loan 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dddropdown-content">
      </div>
  </div>

  <div class="dddropdown">
    <button class="dropbtn">Financial Information 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dddropdown-content">
      </div>
  </div>
  <div class="dddropdown">
    <button class="dropbtn">Customers 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dddropdown-content">
    </div>
  </div> 
  <div class="dddropdown">
    <button class="dropbtn">Reports 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dddropdown-content">
    </div>
  </div>
  <div class="dddropdown">
    <button class="dropbtn">Satistics 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dddropdown-content">
      </div>
  </div>
  
</div>
 <li class="nav-item dropdown d-none d-xl-inline-block" style= "float:right;">
            <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <span class="profile-text"><strong><font color="white">Hello, <?php echo  $fname.'&nbsp;&nbsp;&nbsp;&nbsp;'.$lname?>!</strong></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown" >
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
              <a  href = "#" target="_blank" class="dropdown-item mt-2">
                Manage Security
              </a>
                           <a href="../logout" class="dropdown-item">
                Sign Out
              </a>
            </font></div>
          </li> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href ="../logout"><span><strong><font color="#D2691E">LOGOUT</font></strong></span></a>		  
      </div>
	  
    </nav>
	
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
       <nav class="sidebar sidebar-offcanvas" id="sidebar">
         <ul class="nav" id="main-menu">
                 


                    <li class="active-link">
                        <a href="../auditor_homepage" ><i class="fa fa-home "></i><span >DASHBOARD</span></a>
                    </li>
                   

                    <li align="centered">
                        <a href="../New_audit"><span>Audit Record</span></a>
                    </li>
										<?php if($role=='CheifAuditor'){?>
                     <li align="centered">
                        <a href="../negative_accounts"><span>Accounts With Negative Balances</span></a>
                    </li>
                     <li align="centered">
                        <a href="../not_balancing"><span>Accounts Not Balancing</span></a>
                    </li>
                     <li align="centered">
                        <a href="upload_newAudit"><span>Upload_newAudit</span></a>
                    </li>
					<?php }?>
                      <li align="centered">
                        <a href="../logout"><span>Logout</span></a>
                    </li>                   
                    </li>
                  
                    
                </ul>
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
										