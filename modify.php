<?php
error_reporting(0);
session_start();
    $role = $_SESSION['sess_userrole'];
    if(!($_SESSION['sess_username']) or ($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro') or $role!="Mutuelle"){
      header('Location: logout');
	}
include_once('connect_db.php');
$consid=$_GET[nid];
$date = $_SESSION['date'];
$date1= $_SESSION['date1'];
$result = ("SELECT patient.id as pid,patient.names,patient.afilliate_lastname,patient.lname,patient.affiliate_names,patient.familycode,patient.affectation,patient.insurance,patient.dob,patient.category,patient.gender,
patient.affiliate_number,consomation.consid,consomation.consultatiobn,consomation.medicament,consomation.upmedicamnet,consomation.qtymedicamnet,(consomation.upmedicamnet*consomation.qtymedicamnet) 
as totmedicament,consomation.consommable,consomation.UPcons,consomation.Qcons,(consomation.UPcons*consomation.Qcons) as totconsommables,consomation.actemedicale,consomation.upacte,consomation.qtyacte,(consomation.upacte*consomation.qtyacte) AS totacte,consomation.examenmedicale,consomation.upexamen,consomation.qtyexamen,(consomation.qtyexamen*consomation.upexamen) as totexamens,consomation.datecunsuption FROM consomation JOIN  patient ON consomation.id=patient.id where consid= '$consid' AND insurance='MUTUELLE' and datecunsuption >= '$date' and datecunsuption <= '$date1' ORDER BY datecunsuption DESC,consid DESC");
$query=mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>

			
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Medical Records</title>
	
	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/style.css">

	 
       

</head>
<body>

	<!-- TOP BAR -->
	<!-- TOP BAR -->
	<?php include_once("tpl/top_bar_u1.php"); ?>
	

<div class="side-menu fl">
				
				<ul>

				</ul>
                                
                                 
			</div> <!-- end side-menu -->
			<div class="content-module-main cf">
		<form method="POST" action="verification_mutuelle11">	
<input type="text" name="consid" value="<?php echo $query['consid']; ?>" required="required" style="display:none" >	
<input type="text" name="pid" value="<?php echo $query['pid']; ?>" required="required" style="display:none" >	
<input type="text" name="datesearch" value="<?php echo $date; ?>" required="required" style="display:none" >
<input type="text" name="datesearch1" value="<?php echo $date1; ?>" required="required" style="display:none" >			
	
				<table>
<tr><th>Date</th><th>Inurance Number</th><th> Lab Tests</th><th>Price</th><th>Qty</th><th>Medical Act</th><th>Price</th><th>Qty</th><th>Procedures and materials</th><th>Price</th><th>Qty</th><th>Medicines</th><th>Price</th><th>Qty</th></tr>
<tr><td><input type="text" name="date" value="<?php echo $query['datecunsuption']; ?>" ></td><td><input type="text" name="insumber" value="<?php echo $query['affiliate_number']; ?>"></td><td><input type="text" name="lab" size="30" value="<?php echo $query['examenmedicale']; ?>" ></td><td><input type="text" name="pricelab" size="4" value="<?php echo $query['upexamen']; ?>" ></td><td><input type="text" name="qtylab" size="3" value="<?php echo $query['qtyexamen']; ?>" ></td><td><input type="text" name="actes" size="30" value="<?php echo $query['actemedicale']; ?>" ></td>

<td><input type="text" name="priceacte" size="4" value="<?php echo $query['upacte']; ?>" ></td><td><input type="text" name="qtyeacte" size="3" value="<?php echo $query['qtyacte']; ?>" ></td><td><input type="text" name="cons" size="30" value="<?php echo $query['consommable']; ?>" ></td><td><input type="text" name="pricecons" size="4" value="<?php echo $query['UPcons']; ?>" ></td><td><input type="text" name="qtycons" size="3" value="<?php echo $query['Qcons']; ?>" ></td><td>
<input type="text" name="medicine" size="30" value="<?php echo $query['medicament']; ?>" ></td><td><input type="text" name="pricemedicine" size="4" value="<?php echo $query['upmedicamnet']; ?>" ></td><td><input type="text" name="qtymedicine" size="3" value="<?php echo $query['qtymedicamnet']; ?>" ></td></tr>

<tr><td></td><td></td><td></td><td></td><td></td><td><textarea rows="4" cols="23" name="comments" maxlength="100" required="required"> </textarea></td>

<td></td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
<tr><td></td><td></td><td></td><td></td><td></td><td align="center"><input type="submit" name="comment" value="submit"></td>
<td></td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
<tr><td></td></tr>
</table>				
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
