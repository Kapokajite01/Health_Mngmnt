<?php
error_reporting(0);
session_start();
include'mydb_connection/my_dbconnection.php';
$userid = $_SESSION['userid'];
if(!$userid){
	header('location:logout');
}
 include 'left_nav_customizations.php';


?>			
 
<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
        </nav>
        <!-- /. NAV SIDE  -->
		 <section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                      <ul id="menu-top" class="nav navbar-nav navbar-right">
						
						
						 <li>
						 
							<a href="logout.php" >LOGOUT</a>

                        </ul>
						
                    </div>
					
                </div>

            </div>
        </div>
    </section>

	
	
        <div id="page-wrapper" >
	
            <div id="page-inner">
				<div class="container">
                <div class="row" >
                   
				  
        <div class="container">
            <h4 class="page-head-line"><strong><I>DELETE EMPLOYER'S ACTIVITY SCORING DEFINITION</I></strong></h4><HR>
 </div>  

              
                  <!-- /. ROW  --> 		<script type="text/javascript">
// Popup window code
function newPopup(url) {
	popupWindow = window.open(
		url,'popUpWindow','height=1000,width=1200,position= absolute,left=400,top=10,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
}
</script>



       
                      <div class="notice-board">
                        <div class="panel panel-default">
                            <div class="panel-heading">
<a href="lastpayment_custom"class="btn btn-success" style="width:auto; "><i class="glyphicon glyphicon-back"></i>BACK</a>
                         
                            </div>
             
                           
           
                   
                    <hr />
                 
            
										 <strong><h1 align="center"><font color="red">Do You Want Delete Record?</font></h1></strong><br>

					<form method="post" enctype="multipart/form-data" class="form-horizontal" style="margin-left:250px;">
					  <div class="form-group"align="left" style="display:inline">
								
						  <button type="submit" name="Delete" class="btn btn-danger"> Delete</button><br><br>
						  <button type="submit" name="Cancel" class="btn btn-primary"> Cancel</button>
					  </div>
					</form>
							
<?php
if (isset($_POST['Delete'])) {
$ID = $_GET['extr_id'];
						
$deletehist = " DELETE FROM  payment_customization  WHERE payment_id = '$ID ' ";

if ($conn->query($deletehist) === TRUE) {
echo "<script>alert('Successfully Deleted'); window.location='lastpayment_custom'</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


}

if (isset($_POST['Cancel'])) {

echo "<script>alert('Deleted Canceled'); window.location='lastpayment_custom'</script>";


}
?>
	
                            </div>
             
		
            </div>
          
                  <!-- /. ROW  --> 
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
    <div class="footer">
      
    
            <div class="row">
                <div class="col-lg-12" >
                    &copy;  2017 Vision Softproperty | Design by: <a>Digital Star</a>
                </div>
            </div>
        </div>
          

     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>

   
</body>

</html>
