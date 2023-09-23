<link href="jquery-ui1.css" rel="stylesheet" type="text/css"/>  
 <script src="jquery.min1.js"></script>  
   <script src="jquery-ui.min1.js"></script> 
   <script type="text/javascript">
       $(function() {
               $("#datesearch").datepicker({ dateFormat: "yy-mm-dd" }).val()
               $("#datesearch1").datepicker({ dateFormat: "yy-mm-dd" }).val()
       });

   </script>
<?php
error_reporting(0);
session_start();
    $role = $_SESSION['sess_userrole'];
	$name = $_SESSION['sess_name'];
	$lname = $_SESSION['sess_lname'];
	$tel = $_SESSION['sess_phone'];
    if(!($_SESSION['sess_username']) or ($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro') or $role!="Manager"){
      header('Location: logout');
	}
include_once('connect_db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	
</head>
<body>

	
<?php

if(isset($_POST['update']))
{   $id=$_POST['pitentid'];
	$name= $_POST['fname'];
	$lname= $_POST['lname'];
	$insumber= $_POST['afnumber'];
	$gender= $_POST['gender'];
	$dob= $_POST['dob'];
	$fcat= $_POST['familycat'];
	$province= $_POST['province'];
	$district= $_POST['district'];
	$sector= $_POST['sector'];
	$afname= $_POST['afname'];
	$aflname= $_POST['aflastname'];
	$affectation= $_POST['affectation'];
	$insurance= $_POST['insurance'];
	$conultation=$_POST['consultation'];
	$date= $_POST['date'];
	$pagenumber= $_POST['pagenumber'];
	$fcode= $_POST['hfamilycode'];

echo $id;
$sql="update patient set
 names = '$name',
 lname='$lname',
 gender = '$gender', 
 dob = '$dob',
 category='$fcat',
 province = '$province', 
 district = '$district',
 sector='$sector',
 affiliate_number = '$insumber', 
 affiliate_names = '$afname',
 afilliate_lastname='$aflname',
 affectation = '$qty',
 insurance='$insurance',
 consultatiom='$conultation',
 familycode='$fcode',
 pagenumber='$pagenumber',
 date='$date'
 where id='$id'";
($sql);
$sql1=("INSERT INTO logs(id,name,lname,phone,action,time)
VALUES('','$name','$lname','$tel','Edited Patient',now())");
header("location:edit_patient");

}
?>
  
						  </form>
						  		
                     </div>   
					</div> <!-- end content-module-main -->
							

				</div> <!-- end content-module -->
				
				
		
		</div></div> <!-- end full-width -->
			
	</div> <!-- end content -->
	
<!-- FOOTER -->
	<div id="footer">

		<p>Powed By Vision Soft Ltd .</p>
	</div> <!-- end footer -->
</body>

</html>


