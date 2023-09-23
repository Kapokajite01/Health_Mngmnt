<?php
error_reporting(0);
session_start();
include'mydb_connection/my_dbconnection.php';
include'mydb_connection/My_dbinsert.php';
$userid = $_SESSION['userid'];
if(!$userid){
	header('location:logout');
}
 include 'left_nav_customizations.php';


?>			
  <div id="id01" class="modal" >
  
  
    <form class="modal-contentes animate" action="" method="post" enctype="multipart/form-data" name="form1" id="form1"> 
    
    <div class="container" >
	  <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">X</button><br>
<table>

<h1>ADD NEW SCORE</h1>
<tr><td>Minimum Days</td><td><input type="number" name="minimum" class="form-control"  placeholder="Minimum days <=" required /></td></tr>
<tr><td>Maximum Days</td><td><input type="number" name="maximum" class="form-control" id="inputEmail3" placeholder="Maximum Days < " required/></td></tr>		 
<tr><td>Score</td><td><input type="number" name="score" class="form-control" id="inputPassword3" placeholder="Score" required /></td></tr>
   
</table>
    </div>

    <div style="background-color:#f1f1f1">
	 <br>
	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp
	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp
	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp
	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp
	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp
   	<br> <button type="submit" name="save" class="btn btn-primary"><i class="glyphicon glyphicon-save"></i> Save</button><br><br>
    </div>
     </form>
  </div>
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
            <h4 class="page-head-line"><strong><I>EMPLOYER'S ACTIVITY SCORING DEFINITION EDIT</I></strong></h4><HR>
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
<a href="activity_custom"class="btn btn-success" style="width:auto; "><i class="glyphicon glyphicon-back"></i>BACK</a>
                         
                            </div>
             
                           
           
                   
                    <hr />
                 
            
<?php
$ID = $_GET['extr_id'];
  $query="select * from activity_custom where activity_id='$ID'";
$result = $conn_db->query($query);
  if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
$activityname = $row['activity_name'];
$activityscore = $row['activity_score'];

  }}  ?>					
					<form method="post" enctype="multipart/form-data" class="form-horizontal" style="margin-left:250px;">
					  
					  <div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label"><Strong>Activity Name</strong></label>
						<div class="col-sm-4">
						  <input type="text" name="activityname" value="<?php echo $activityname; ?>" class="form-control" id="inputEmail3" required />
						</div>
						
					  </div>
					  
					 
					  
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label"><strong>Score</strong></label>
						<div class="col-sm-4">
						  <input type="text" name="score" value="<?php echo $activityscore; ?>" class="form-control" id="inputPassword3"  required />
						</div>

						<label for="inputPassword3" class="col-sm-2 control-label"></label>
						<div class="col-sm-7">
						  <button type="submit" name="update" class="btn btn-primary"><i class="glyphicon glyphicon-save"></i> Update</button>
						</div>
					  </div>
					</form>
							
<?php
if (isset($_POST['update'])) {

						$activityname=$_POST['activityname'];
						$score=$_POST['score'];
$activityupdate = " UPDATE activity_custom SET activity_name='$activityname', activity_score='$score' WHERE activity_id = '$ID ' ";
if ($conn->query($activityupdate) === TRUE) {
echo "<script>alert('Successfully Updated Employer Activity Scoring!'); window.location='activity_custom'</script>";

}
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
