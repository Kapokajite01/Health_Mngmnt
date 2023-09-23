<?php
session_start();
include_once('connect_db.php');
if(isset($_SESSION['username'])){
$id=$_SESSION['cashier_id'];
$fname=$_SESSION['first_name'];
$lname=$_SESSION['last_name'];
$sid=$_SESSION['staff_id'];
$user=$_SESSION['username'];
}else{
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index.php");
exit();
}
?>
<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Medical Records</title>
	
	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/style.css">
	
	<!-- Optimize for mobile devices -->

	<!-- jQuery & JS files -->
       

</head>
<body>

	<!-- TOP BAR -->
	<!-- TOP BAR -->
		<?php include_once('menu2.php')?>
	
	<!-- MAIN CONTENT -->
	<div id="content">
		
		<div class="page-full-width cf">

			 <!-- end side-menu -->	

			
				<div class="content-module">				
					
						<div class="content-module-main cf">
<?php
  # Connect
  mysql_connect('localhost', 'root', 'fidele') or die('Could not connect: ' . mysql_error());
   
  # Choose a database
  mysql_select_db('dirskhpe_rangiro') or die('Could not select database');
   
  # Perform database query
  $query = "SELECT * from patient ORDER BY id DESC";
  $result = ($query) or die('Query failed: ' . mysql_error());
?>


<form id="patient" name="patient" method="POST" action="saveconsumptions.php">
<table> <tr><td>

    <select id="select">
      <option value="0">Please select</option>
      <?php
        while ($row = mysql_fetch_assoc($result)) {
            echo '<option value="' . $row['id'] . '">' . $row['affiliate_number'] . '</option>';
        }
      ?>

    </select></td><td><strong>NUMBER :&nbsp;&nbsp;</strong><input id="number" name="number" class="element text large" type="text"  style=" border: 0px" required aria-required="true" aria-describedby="name-format">
<input type="text" name="p_id" id="p_id" style="display:none" required aria-required="true" aria-describedby="name-format"></td><td><strong>NAME   :&nbsp;&nbsp;<input id="name" name="name" class="element text large" type="text" style="border: 0px" size="50" required aria-required="true" aria-describedby="name-format"></td><td></td><td></tr>
<tr><td></td><td><strong>Consultation :&nbsp;&nbsp;</strong><input id="consultation" name="consultation" class="element text large" type="text" style="border: 0px" required aria-required="true" aria-describedby="name-format"></td><td><strong>INSURANCE   :&nbsp;&nbsp;<input id="insurance" name="insurance" class="element text large" type="text" style="border: 0px" required aria-required="true" aria-describedby="name-format"></td><td></td></tr>
<tr ><td><strong>Medicines</strong></td><td><strong>Consumables</strong></td><td><strong>Medical Acts</strong></td><td><strong>Laboratory Tests</strong></td></tr>
<tr><td><label name="lebmedicine1" id="lebmedicine1" style="float: left"><strong> </strong></label><input type="text" id="mmed1" name="mmed1" value = "" readonly style="float: left; border: 0px"><input type="text" name ="id1" id="id1" style="display:none"><input type="text" id="up1" name="up1" size="4" value="" readonly style="float: right;border: 0px" onkeypress='return event.charCode >= 48 && event.charCode <= 57'><input type="text" id="qmed1" name="qmed1" size="3" value = ""readonly style="float: right; border: 0px"></td><td><label name="leb1" id="lebmedicine1" style="float: left; border: 0px"><strong> </strong></label><input type="text" id="ccons1" name="ccons1" style="float: left; border: 0px"value = "" readonly><input type="text" name="idc1" id="idc1" style="display:none"/><input type="text" id="upcons1" name="upcons1" size="7" style="float: right; border: 0px" value = "" readonly><input type="text" id="qcosum1" name="qcosum1" size="7" style="float: right; border: 0px" value = "" readonly></td><td><label name="lebact1" id="lebact1" style="float: left"><strong> </strong></label><input type="text" id="aact1" name="aact1"value = "" readonly style="float: left; border: 0px"><input type="text" id="upacte1" name="upacte1" size="7" value = "" readonly style="float: right; border: 0px"><input type="text" id="qacte1" name="qacte1" size="7" value = "" readonly style="float: right; border: 0px"></td><td><input type="text" id="eex1" name="eex1" value = "" readonly style="float: left; border: 0px"><input type="text" id="upex1" name="upex1" size="7" value = "" readonly style="float: right; border: 0px"><input type="text" id="qex1" name="qex1" size="7" value = "" readonly style="float: right; border: 0px"></td><td><input type="button" name="activate" value="Edit" onclick="edit1()"/></td></tr>
<tr><td><label name="lebmedicine2" id="lebmedicine2" style="float: left"><strong> </strong></label><input type="text" id="mmed2" name="mmed2" value = "" readonly style="float: left; border: 0px"><input type="text" name ="id2" id="id2" style="display:none"><input type="text" id="up2" name="up2" size="4" value="" readonly style="float: right;border: 0px"><input type="text" id="qmed2" name="qmed2" size="3" value = ""readonly style="float: right; border: 0px"></td><td><label name="leb2" id="lebmedicine2" style="float: left; border: 0px"><strong> </strong></label><input type="text" id="ccons2" name="ccons2" style="float: left; border: 0px"value = "" readonly><input type="text" name="idc2" id="idc2" style="display:none"/><input type="text" id="upcons2" name="upcons2" size="7" style="float: right; border: 0px" value = "" readonly><input type="text" id="qcosum2" name="qcosum2" size="7" style="float: right; border: 0px" value = "" readonly></td><td><label name="lebact2" id="lebact2" style="float: left"><strong> </strong></label><input type="text" id="aact2" name="aact2"value = "" readonly style="float: left; border: 0px"><input type="text" id="upacte2" name="upacte2" size="7" value = "" readonly style="float: right; border: 0px"><input type="text" id="qacte2" name="qacte2" size="7" value = "" readonly style="float: right; border: 0px"></td><td><input type="text" id="eexe2" name="eexe2" value = "" readonly style="float: left; border: 0px"><input type="text" id="upex2" name="upex2" size="7" value = "" readonly style="float: right; border: 0px"><input type="text" id="qex2" name="qex2" size="7" value = "" readonly style="float: right; border: 0px"></td><td><input type="button" name="activate" value="Edit" onclick="edit2()"/></td></tr>
<tr><td><label name="lebmedicine3" id="lebmedicine3" style="float: left"><strong> </strong></label><input type="text" id="mmed3" name="mmed3" value = "" readonly style="float: left; border: 0px"><input type="text" name ="id3" id="id3" style="display:none"><input type="text" id="up3" name="up3" size="4" value="" readonly style="float: right;border: 0px"><input type="text" id="qmed3" name="qmed3" size="3" value = ""readonly style="float: right; border: 0px"></td><td><label name="leb3" id="lebmedicine3" style="float: left; border: 0px"><strong> </strong></label><input type="text" id="ccons3" name="ccons3" style="float: left; border: 0px"value = "" readonly><input type="text" name="idc3" id="idc3" style="display:none"/><input type="text" id="upcons3" name="upcons3" size="7" style="float: right; border: 0px" value = "" readonly><input type="text" id="qcosum3" name="qcosum3" size="7" style="float: right; border: 0px" value = "" readonly></td><td><label name="lebact3" id="lebact3" style="float: left"><strong> </strong></label><input type="text" id="aact3" name="aact3"value = "" readonly style="float: left; border: 0px"><input type="text" id="upacte3" name="upacte3" size="7" value = "" readonly style="float: right; border: 0px"><input type="text" id="qacte3" name="qacte3" size="7" value = "" readonly style="float: right; border: 0px"></td><td><input type="text" id="eexe3" name="eexe3" value = "" readonly style="float: left; border: 0px"><input type="text" id="upex3" name="upex3" size="7" value = "" readonly style="float: right; border: 0px"><input type="text" id="qex3" name="qex3" size="7" value = "" readonly style="float: right; border: 0px"></td><td><input type="button" name="activate" value="Edit" onclick="edit3()"/></td></tr>
<tr><td><label name="lebmedicine4" id="lebmedicine4" style="float: left"><strong> </strong></label><input type="text" id="mmed4" name="mmed4" value = "" readonly style="float: left; border: 0px"><input type="text" name ="id4" id="id4" style="display:none"><input type="text" id="up4" name="up4" size="4" value="" readonly style="float: right;border: 0px"><input type="text" id="qmed4" name="qmed4" size="3" value = ""readonly style="float: right; border: 0px"></td><td><label name="leb4" id="lebmedicine4" style="float: left; border: 0px"><strong> </strong></label><input type="text" id="ccons4" name="ccons4" style="float: left; border: 0px"value = "" readonly><input type="text" name="idc4" id="idc4" style="display:none"/><input type="text" id="upcons4" name="upcons4" size="7" style="float: right; border: 0px" value = "" readonly><input type="text" id="qcosum4" name="qcosum4" size="7" style="float: right; border: 0px" value = "" readonly></td><td><label name="lebact3" id="lebact4" style="float: left"><strong> </strong></label><input type="text" id="aact4" name="aact4"value = "" readonly style="float: left; border: 0px"><input type="text" id="upacte4" name="upacte4" size="7" value = "" readonly style="float: right; border: 0px"><input type="text" id="qacte4" name="qacte4" size="7" value = "" readonly style="float: right; border: 0px"></td><td><input type="text" id="eexe4" name="eexe4" value = "" readonly style="float: left; border: 0px"><input type="text" id="upex4" name="upex4" size="7" value = "" readonly style="float: right; border: 0px"><input type="text" id="qex4" name="qex4" size="7" value = "" readonly style="float: right; border: 0px"></td><td><input type="button" name="activate" value="Edit" onclick="edit4()"/></td></tr>
<tr><td><label name="lebmedicine5" id="lebmedicine5" style="float: left"><strong> </strong></label><input type="text" id="mmed5" name="mmed5" value = "" readonly style="float: left; border: 0px"><input type="text" name ="id5" id="id5" style="display:none"><input type="text" id="up5" name="up5" size="4" value="" readonly style="float: right;border: 0px"><input type="text" id="qmed5" name="qmed5" size="3" value = ""readonly style="float: right; border: 0px"></td><td><label name="leb4" id="lebmedicine5" style="float: left; border: 0px"><strong> </strong></label><input type="text" id="ccons5" name="ccons5" style="float: left; border: 0px"value = "" readonly><input type="text" name="idc5" id="idc5" style="display:none"/><input type="text" id="upcons5" name="upcons5" size="7" style="float: right; border: 0px" value = "" readonly><input type="text" id="qcosum5" name="qcosum5" size="7" style="float: right; border: 0px" value = "" readonly></td><td><label name="lebact4" id="lebact5" style="float: left"><strong> </strong></label><input type="text" id="aact5" name="aact5"value = "" readonly style="float: left; border: 0px"><input type="text" id="upacte5" name="upacte5" size="7" value = "" readonly style="float: right; border: 0px"><input type="text" id="qacte5" name="qacte5" size="7" value = "" readonly style="float: right; border: 0px"></td><td><input type="text" id="eexe5" name="eexe5" value = "" readonly style="float: left; border: 0px"><input type="text" id="upex5" name="upex5" size="7" value = "" readonly style="float: right; border: 0px"><input type="text" id="qex5" name="qex5" size="7" value = "" readonly style="float: right; border: 0px"></td><td><input type="button" name="activate" value="Edit" onclick="edit5()"/></td></tr>
<tr><td><label name="lebmedicine6" id="lebmedicine6" style="float: left"><strong> </strong></label><input type="text" id="mmed6" name="mmed6" value = "" readonly style="float: left; border: 0px"><input type="text" name ="id6" id="id6" style="display:none"><input type="text" id="up6" name="up6" size="4" value="" readonly style="float: right;border: 0px"><input type="text" id="qmed6" name="qmed6" size="3" value = ""readonly style="float: right; border: 0px"></td><td><label name="leb4" id="lebmedicine6" style="float: left; border: 0px"><strong> </strong></label><input type="text" id="ccons6" name="ccons6" style="float: left; border: 0px"value = "" readonly><input type="text" name="idc6" id="idc6" style="display:none"/><input type="text" id="upcons6" name="upcons6" size="7" style="float: right; border: 0px" value = "" readonly><input type="text" id="qcosum6" name="qcosum6" size="7" style="float: right; border: 0px" value = "" readonly></td><td><label name="lebact6" id="lebact6" style="float: left"><strong> </strong></label><input type="text" id="aact6" name="aact6"value = "" readonly style="float: left; border: 0px"><input type="text" id="upacte6" name="upacte6" size="7" value = "" readonly style="float: right; border: 0px"><input type="text" id="qacte6" name="qacte6" size="7" value = "" readonly style="float: right; border: 0px"></td><td><input type="text" id="eexe6" name="eexe6" value = "" readonly style="float: left; border: 0px"><input type="text" id="upex6" name="upex6" size="7" value = "" readonly style="float: right; border: 0px"><input type="text" id="qex6" name="qex6" size="7" value = "" readonly style="float: right; border: 0px"></td><td><input type="button" name="activate" value="Edit" onclick="edit6()"/></td></tr>
<tr><td><label name="lebmedicine7" id="lebmedicine7" style="float: left"><strong> </strong></label><input type="text" id="mmed7" name="mmed7" value = "" readonly style="float: left; border: 0px"><input type="text" name ="id7" id="id7" style="display:none"><input type="text" id="up7" name="up7" size="4" value="" readonly style="float: right;border: 0px"><input type="text" id="qmed7" name="qmed7" size="3" value = ""readonly style="float: right; border: 0px"></td><td><label name="leb4" id="lebmedicine7" style="float: left; border: 0px"><strong> </strong></label><input type="text" id="ccons7" name="ccons7" style="float: left; border: 0px"value = "" readonly><input type="text" name="idc7" id="idc7" style="display:none"/><input type="text" id="upcons7" name="upcons7" size="7" style="float: right; border: 0px" value = "" readonly><input type="text" id="qcosum7" name="qcosum7" size="7" style="float: right; border: 0px" value = "" readonly></td><td><label name="lebact27" id="lebact7" style="float: left"><strong> </strong></label><input type="text" id="aact7" name="aact7"value = "" readonly style="float: left; border: 0px"><input type="text" id="upacte7" name="upacte7" size="7" value = "" readonly style="float: right; border: 0px"><input type="text" id="qacte7" name="qacte7" size="7" value = "" readonly style="float: right; border: 0px"></td><td><input type="text" id="eexe7" name="eexe7" value = "" readonly style="float: left; border: 0px"><input type="text" id="upex7" name="upex7" size="7" value = "" readonly style="float: right; border: 0px"><input type="text" id="qex7" name="qex7" size="7" value = "" readonly style="float: right; border: 0px"></td><td><input type="button" name="activate" value="Edit" onclick="edit7()"/></td></tr>

</table>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="bigbutton" id="bigbutton" type="submit" value="Save" />
</form>
</div>

					</div> <!-- end content-module-main -->
							
				
				</div> <!-- end content-module -->
				
				
		
		</div></div> <!-- end full-width -->
			
	</div> <!-- end content -->
	
<!-- FOOTER -->
	<div id="footer">

		<p>Powed By Vision Soft Ltd .</p>
			<hr></hr>
	</div> <!-- end footer -->
</body>

</html>


<script>
function edit1(){
	var a=document.getElementById('mmed1');
	var a1=document.getElementById('aact1');


	if(a.readOnly= true){
		document.getElementById('mmed1').readOnly=false;
		document.getElementById("mmed1").style.backgroundColor="Gainsboro";	
		document.getElementById('up1').readOnly=false;
		document.getElementById('up1').style.backgroundColor="Gainsboro";	
		document.getElementById('qmed1').readOnly=false;
		document.getElementById('qmed1').style.backgroundColor="Gainsboro";	
		document.getElementById('ccons1').readOnly=false;
		document.getElementById("ccons1").style.backgroundColor="Gainsboro";	
		document.getElementById('upcons1').readOnly=false;
		document.getElementById('upcons1').style.backgroundColor="Gainsboro";	
		document.getElementById('qcosum1').readOnly=false;
		document.getElementById('qcosum1').style.backgroundColor="Gainsboro";	
		
		document.getElementById('aact1').readOnly=false;
		document.getElementById("aact1").style.backgroundColor="Gainsboro";	
		document.getElementById('upacte1').readOnly=false;
		document.getElementById('upacte1').style.backgroundColor="Gainsboro";	
		document.getElementById('qacte1').readOnly=false;
		document.getElementById('qacte1').style.backgroundColor="Gainsboro";	
		
		document.getElementById('eex1').readOnly=false;
		document.getElementById("eex1").style.backgroundColor="Gainsboro";	
		document.getElementById('upex1').readOnly=false;
		document.getElementById('upex1').style.backgroundColor="Gainsboro";	
		document.getElementById('qex1').readOnly=false;
		document.getElementById('qex1').style.backgroundColor="Gainsboro";	

	}
	

}

function edit2(){
	var a=document.getElementById('mmed2');

	if(a.readOnly= true){
		document.getElementById('mmed2').readOnly=false;
		document.getElementById("mmed2").style.backgroundColor="Gainsboro";	
		document.getElementById('up2').readOnly=false;
		document.getElementById('up2').style.backgroundColor="Gainsboro";	
		document.getElementById('qmed2').readOnly=false;
		document.getElementById('qmed2').style.backgroundColor="Gainsboro";	
		document.getElementById('ccons2').readOnly=false;
		document.getElementById("ccons2").style.backgroundColor="Gainsboro";	
		document.getElementById('upcons2').readOnly=false;
		document.getElementById('upcons2').style.backgroundColor="Gainsboro";	
		document.getElementById('qcosum2').readOnly=false;
		document.getElementById('qcosum2').style.backgroundColor="Gainsboro";	
		
		document.getElementById('aact2').readOnly=false;
		document.getElementById("aact2").style.backgroundColor="Gainsboro";	
		document.getElementById('upacte2').readOnly=false;
		document.getElementById('upacte2').style.backgroundColor="Gainsboro";	
		document.getElementById('qacte2').readOnly=false;
		document.getElementById('qacte2').style.backgroundColor="Gainsboro";	
		
		document.getElementById('eexe2').readOnly=false;
		document.getElementById("eexe2").style.backgroundColor="Gainsboro";	
		document.getElementById('upex2').readOnly=false;
		document.getElementById('upex2').style.backgroundColor="Gainsboro";	
		document.getElementById('qex2').readOnly=false;
		document.getElementById('qex2').style.backgroundColor="Gainsboro";	

	}
	

}
function edit3(){
	var a=document.getElementById('mmed3');

	if(a.readOnly= true){
		document.getElementById('mmed3').readOnly=false;
		document.getElementById("mmed3").style.backgroundColor="Gainsboro";	
		document.getElementById('up3').readOnly=false;
		document.getElementById('up3').style.backgroundColor="Gainsboro";	
		document.getElementById('qmed3').readOnly=false;
		document.getElementById('qmed3').style.backgroundColor="Gainsboro";	
		document.getElementById('ccons3').readOnly=false;
		document.getElementById("ccons3").style.backgroundColor="Gainsboro";	
		document.getElementById('upcons3').readOnly=false;
		document.getElementById('upcons3').style.backgroundColor="Gainsboro";	
		document.getElementById('qcosum3').readOnly=false;
		document.getElementById('qcosum3').style.backgroundColor="Gainsboro";	
		
		document.getElementById('aact3').readOnly=false;
		document.getElementById("aact3").style.backgroundColor="Gainsboro";	
		document.getElementById('upacte3').readOnly=false;
		document.getElementById('upacte3').style.backgroundColor="Gainsboro";	
		document.getElementById('qacte3').readOnly=false;
		document.getElementById('qacte3').style.backgroundColor="Gainsboro";	
		
		document.getElementById('eexe3').readOnly=false;
		document.getElementById("eexe3").style.backgroundColor="Gainsboro";	
		document.getElementById('upex3').readOnly=false;
		document.getElementById('upex3').style.backgroundColor="Gainsboro";	
		document.getElementById('qex3').readOnly=false;
		document.getElementById('qex3').style.backgroundColor="Gainsboro";	

	}
	

}
function edit4(){
	var a=document.getElementById('mmed4');

	if(a.readOnly= true){
		document.getElementById('mmed4').readOnly=false;
		document.getElementById("mmed4").style.backgroundColor="Gainsboro";	
		document.getElementById('up4').readOnly=false;
		document.getElementById('up4').style.backgroundColor="Gainsboro";	
		document.getElementById('qmed4').readOnly=false;
		document.getElementById('qmed4').style.backgroundColor="Gainsboro";	
		document.getElementById('ccons4').readOnly=false;
		document.getElementById("ccons4").style.backgroundColor="Gainsboro";	
		document.getElementById('upcons4').readOnly=false;
		document.getElementById('upcons4').style.backgroundColor="Gainsboro";	
		document.getElementById('qcosum4').readOnly=false;
		document.getElementById('qcosum4').style.backgroundColor="Gainsboro";	
		
		document.getElementById('aact4').readOnly=false;
		document.getElementById("aact4").style.backgroundColor="Gainsboro";	
		document.getElementById('upacte4').readOnly=false;
		document.getElementById('upacte4').style.backgroundColor="Gainsboro";	
		document.getElementById('qacte4').readOnly=false;
		document.getElementById('qacte4').style.backgroundColor="Gainsboro";	
		
		document.getElementById('eexe4').readOnly=false;
		document.getElementById("eexe4").style.backgroundColor="Gainsboro";	
		document.getElementById('upex4').readOnly=false;
		document.getElementById('upex4').style.backgroundColor="Gainsboro";	
		document.getElementById('qex4').readOnly=false;
		document.getElementById('qex4').style.backgroundColor="Gainsboro";	

	}
	

}
function edit5(){
	var a=document.getElementById('mmed5');

	if(a.readOnly= true){
		document.getElementById('mmed5').readOnly=false;
		document.getElementById("mmed5").style.backgroundColor="Gainsboro";	
		document.getElementById('up5').readOnly=false;
		document.getElementById('up5').style.backgroundColor="Gainsboro";	
		document.getElementById('qmed5').readOnly=false;
		document.getElementById('qmed5').style.backgroundColor="Gainsboro";	
		document.getElementById('ccons5').readOnly=false;
		document.getElementById("ccons5").style.backgroundColor="Gainsboro";	
		document.getElementById('upcons5').readOnly=false;
		document.getElementById('upcons5').style.backgroundColor="Gainsboro";	
		document.getElementById('qcosum5').readOnly=false;
		document.getElementById('qcosum5').style.backgroundColor="Gainsboro";	
		
		document.getElementById('aact5').readOnly=false;
		document.getElementById("aact5").style.backgroundColor="Gainsboro";	
		document.getElementById('upacte5').readOnly=false;
		document.getElementById('upacte5').style.backgroundColor="Gainsboro";	
		document.getElementById('qacte5').readOnly=false;
		document.getElementById('qacte5').style.backgroundColor="Gainsboro";	
		
		document.getElementById('eexe5').readOnly=false;
		document.getElementById("eexe5").style.backgroundColor="Gainsboro";	
		document.getElementById('upex5').readOnly=false;
		document.getElementById('upex5').style.backgroundColor="Gainsboro";	
		document.getElementById('qex5').readOnly=false;
		document.getElementById('qex5').style.backgroundColor="Gainsboro";	

	}
	

}
function edit6(){
	var a=document.getElementById('mmed6');

	if(a.readOnly= true){
		document.getElementById('mmed6').readOnly=false;
		document.getElementById("mmed6").style.backgroundColor="Gainsboro";	
		document.getElementById('up6').readOnly=false;
		document.getElementById('up6').style.backgroundColor="Gainsboro";	
		document.getElementById('qmed6').readOnly=false;
		document.getElementById('qmed6').style.backgroundColor="Gainsboro";	
		document.getElementById('ccons6').readOnly=false;
		document.getElementById("ccons6").style.backgroundColor="Gainsboro";	
		document.getElementById('upcons6').readOnly=false;
		document.getElementById('upcons6').style.backgroundColor="Gainsboro";	
		document.getElementById('qcosum6').readOnly=false;
		document.getElementById('qcosum6').style.backgroundColor="Gainsboro";	
		
		document.getElementById('aact6').readOnly=false;
		document.getElementById("aact6").style.backgroundColor="Gainsboro";	
		document.getElementById('upacte6').readOnly=false;
		document.getElementById('upacte6').style.backgroundColor="Gainsboro";	
		document.getElementById('qacte6').readOnly=false;
		document.getElementById('qacte6').style.backgroundColor="Gainsboro";	
		
		document.getElementById('eexe6').readOnly=false;
		document.getElementById("eexe6").style.backgroundColor="Gainsboro";	
		document.getElementById('upex6').readOnly=false;
		document.getElementById('upex6').style.backgroundColor="Gainsboro";	
		document.getElementById('qex6').readOnly=false;
		document.getElementById('qex6').style.backgroundColor="Gainsboro";	

	}
	

}
function edit7(){
	var a=document.getElementById('mmed7');

	if(a.readOnly= true){
		document.getElementById('mmed7').readOnly=false;
		document.getElementById("mmed7").style.backgroundColor="Gainsboro";	
		document.getElementById('up7').readOnly=false;
		document.getElementById('up7').style.backgroundColor="Gainsboro";	
		document.getElementById('qmed7').readOnly=false;
		document.getElementById('qmed7').style.backgroundColor="Gainsboro";	
		document.getElementById('ccons7').readOnly=false;
		document.getElementById("ccons7").style.backgroundColor="Gainsboro";	
		document.getElementById('upcons7').readOnly=false;
		document.getElementById('upcons7').style.backgroundColor="Gainsboro";	
		document.getElementById('qcosum7').readOnly=false;
		document.getElementById('qcosum7').style.backgroundColor="Gainsboro";	
		
		document.getElementById('aact7').readOnly=false;
		document.getElementById("aact7").style.backgroundColor="Gainsboro";	
		document.getElementById('upacte7').readOnly=false;
		document.getElementById('upacte7').style.backgroundColor="Gainsboro";	
		document.getElementById('qacte7').readOnly=false;
		document.getElementById('qacte7').style.backgroundColor="Gainsboro";	
		
		document.getElementById('eexe7').readOnly=false;
		document.getElementById("eexe7").style.backgroundColor="Gainsboro";	
		document.getElementById('upex7').readOnly=false;
		document.getElementById('upex7').style.backgroundColor="Gainsboro";	
		document.getElementById('qex7').readOnly=false;
		document.getElementById('qex7').style.backgroundColor="Gainsboro";	

	}
	

}
</script>
    <script src="js/jquery.min.js"></script>
    <script>
      function insertResults(json){
        $("#insurance").val(json["insurance"]);
		$("#name").val(json["names"]);
		$("#number").val(json["affiliate_number"]);
		$("#consultation").val(json["consultatiom"]);
		$("#p_id").val(json["id"]);

      }

      function clearForm(){
        $("#insurance,#name,#number,#consultation,#p_id").val("");
      }

      function makeAjaxRequest(placeId){
        $.ajax({
          type: "POST",
          data: { placeId: placeId },
          dataType: "json", 
          url: "process_ajaxdrop.php",
          success: function(json) {
            insertResults(json);
          }
        });
      }

      $("#select").on("change", function(){
        var id = $(this).val();
        if (id === "0"){
          clearForm();
} else {
          makeAjaxRequest(id);
        }
      });

      function insertResults1(json){
        $("#name").val(json["insurance"]);

      }

      function clearForm1(){
        $("#name").val("");
      }

      function makeAjaxRequest1(placeId){
        $.ajax({
          type: "POST",
          data: { placeId: placeId },
          dataType: "json", 
          url: "process_ajaxdrop.php",
          success: function(json) {
            insertResults1(json);
          }
        });
      }

      $("#select2                            cd").on("change", function(){
        var id = $(this).val();
        if (id === "0"){
          clearForm1();
} else {
          makeAjaxRequest1(id);
        }
      });
	 
    </script>
<style>
input#bigbutton {
width:250px;
background: #3e9cbf; /*the colour of the button*/
padding: 8px 14px 10px; /*apply some padding inside the button*/
border:1px solid #3e9cbf; /*required or the default border for the browser will appear*/
cursor:pointer; /*forces the cursor to change to a hand when the button is hovered*/
/*style the text*/
font-size:1.5em;
font-family:Oswald, sans-serif; /*Oswald is available from http://www.google.com/webfonts/specimen/Oswald*/
letter-spacing:.1em;
text-shadow: 0 -1px 0px rgba(0, 0, 0, 0.3); /*give the text a shadow - doesn't appear in Opera 12.02 or earlier*/
color: #fff;
/*use box-shadow to give the button some depth - see cssdemos.tupence.co.uk/box-shadow.htm#demo7 for more info on this technique*/
-webkit-box-shadow: inset 0px 1px 0px #3e9cbf, 0px 5px 0px 0px #205c73, 0px 10px 5px #999;
-moz-box-shadow: inset 0px 1px 0px #3e9cbf, 0px 5px 0px 0px #205c73, 0px 10px 5px #999;
box-shadow: inset 0px 1px 0px #3e9cbf, 0px 5px 0px 0px #205c73, 0px 10px 5px #999;
/*give the corners a small curve*/
-moz-border-radius: 10px;
-webkit-border-radius: 10px;
border-radius: 10px;
}
/***SET THE BUTTON'S HOVER AND FOCUS STATES***/
input#bigbutton:hover, input#bigbutton:focus {
color:#dfe7ea;
/*reduce the size of the shadow to give a pushed effect*/
-webkit-box-shadow: inset 0px 1px 0px #3e9cbf, 0px 2px 0px 0px #205c73, 0px 2px 5px #999;
-moz-box-shadow: inset 0px 1px 0px #3e9cbf, 0px 2px 0px 0px #205c73, 0px 2px 5px #999;
box-shadow: inset 0px 1px 0px #3e9cbf, 0px 2px 0px 0px #205c73, 0px 2px 5px #999;
}
	
	
	
input#bigbutton1 {
width:250px;
background: #3e9cbf; /*the colour of the button*/
padding: 8px 14px 10px; /*apply some padding inside the button*/
border:1px solid #3e9cbf; /*required or the default border for the browser will appear*/
cursor:pointer; /*forces the cursor to change to a hand when the button is hovered*/
/*style the text*/
font-size:1.5em;
font-family:Oswald, sans-serif; /*Oswald is available from http://www.google.com/webfonts/specimen/Oswald*/
letter-spacing:.1em;
text-shadow: 0 -1px 0px rgba(0, 0, 0, 0.3); /*give the text a shadow - doesn't appear in Opera 12.02 or earlier*/
color: #fff;
/*use box-shadow to give the button some depth - see cssdemos.tupence.co.uk/box-shadow.htm#demo7 for more info on this technique*/
-webkit-box-shadow: inset 0px 1px 0px #3e9cbf, 0px 5px 0px 0px #205c73, 0px 10px 5px #999;
-moz-box-shadow: inset 0px 1px 0px #3e9cbf, 0px 5px 0px 0px #205c73, 0px 10px 5px #999;
box-shadow: inset 0px 1px 0px #3e9cbf, 0px 5px 0px 0px #205c73, 0px 10px 5px #999;
/*give the corners a small curve*/
-moz-border-radius: 10px;
-webkit-border-radius: 10px;
border-radius: 10px;
}
/***SET THE BUTTON'S HOVER AND FOCUS STATES***/
input#bigbutton:hover, input#bigbutton:focus {
color:#dfe7ea;
/*reduce the size of the shadow to give a pushed effect*/
-webkit-box-shadow: inset 0px 1px 0px #3e9cbf, 0px 2px 0px 0px #205c73, 0px 2px 5px #999;
-moz-box-shadow: inset 0px 1px 0px #3e9cbf, 0px 2px 0px 0px #205c73, 0px 2px 5px #999;
box-shadow: inset 0px 1px 0px #3e9cbf, 0px 2px 0px 0px #205c73, 0px 2px 5px #999;
}
</style>



