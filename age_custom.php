<?php
error_reporting(0);
session_start();
include'mydb_connection/my_dbconnection.php';
include'mydb_connection/My_dbinsert.php';
$userid = $_SESSION['userid'];
if(!$userid){
	header('location:logout');
}
?>


  <?php include 'left_nav_customizations.php';
?>
<?php
if (isset($_POST['save'])){
$ageminimum=$_POST['ageminimum'];
$agemaximum=$_POST['agemaximum'];
$score=$_POST['score'];
$quwry = "INSERT INTO age_custom (aage_id,age_minimum,	age_maximum,age_score)
					 VALUES ('','$ageminimum','$agemaximum','$score')";
IF ($conn->query($quwry) === TRUE) {
						echo "<script>alert('New Age  score added successfully !!!'); window.location='age_custom'</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}		


?>			
  <div id="id01" class="modal" >
  
  
    <form class="modal-contentes animate" action="" method="post" enctype="multipart/form-data" name="form1" id="form1"> 
    
    <div class="container" >
	  <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">X</button><br>
<table>

<h1>DEFINE AGE SCORE</h1>
<tr><td>From</td><td><input type="text" name="ageminimum" class="form-control" id="inputEmail3" placeholder=" Minimum Age" required/> </td></tr>		 
<tr><td>To</td><td><input type="text" name="agemaximum" class="form-control" id="inputEmail3" placeholder="Maximum Age" required/> </td></tr>		 
<tr><td>Score</td><td><input type="number" name="score" class="form-control" placeholder="Score" required /></td></tr>
   
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
            <h4 class="page-head-line"><strong><I>AGE SCORING DEFINITION</I></strong></h4><HR>
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
                         <button class="btn btn-success" onclick="document.getElementById('id01').style.display='block'" style="width:auto; "><i class="glyphicon glyphicon-plus"></i><strong>DEFINE AGE SCORING</strong></button>
                         
                            </div>
             
                           
           
                   
                    <hr />
                 
            
                       <table id="myTable" style="background-image: url('user_images/logo1.png'); width:100%; background-color:#ffffff; background-repeat: no-repeat;background-position: center;" >
                                    <thead>
                                     <tr class="header" style="background-color: #008b8b; color:#ffffff;">
                                           	<th>No</th>
                                           	<th>MINIMUM AGE</th>
                                           	<th>MAXIMUM AGE</th>
						                    <th>Score</th>
						                    <th>Edit</th>
						                    <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                <?php
							$customercare= "select * from age_custom ";
							$result = $conn_db->query($customercare);
							if ($result->num_rows > 0) {
							while($row = $result->fetch_assoc()) {
							$id=$row['aage_id'];
							?>
                              <tr>
						<td><?php echo ++$i; ?></td>
						<td> >= <?php echo $row['age_minimum']; ?></td>
						<td> < <?php echo $row['age_maximum']; ?></td>
						<td><span class="label-primary label label-default"><?php echo $row['age_score']; ?> %</span></td>
						<td class="center">
							<!--<a class="btn btn-success" href="#">
								<i class="glyphicon glyphicon-zoom-in icon-white"></i>
								View
							</a>-->
							<a href="edit_age<?php echo '?extr_id='.$id; ?>">
								<i class="glyphicon glyphicon-edit icon-white"></i>
							</a>
							
						</td><td class="center">
							<!--<a class="btn btn-success" href="#">
								<i class="glyphicon glyphicon-zoom-in icon-white"></i>
								View
							</a>-->
							
							<a class="btn btn-danger" href="delete_age <?php echo '?extr_id='.$id; ?>">
								<i class="glyphicon glyphicon-trash icon-white"></i>
							</a>
						</td>
					</tr>
							<?php } }?>
					</tbody>
                                </table>
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
