

<?php
error_reporting(0);
session_start();
include_once('connect_db.php');
	$userid = $_SESSION['sess_user_id'];
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username'])  or ($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro')){
		if(($role!="Receptionist") or ($role!="Mutuelle"))
		{
      header('Location: logout');
		}
	}
	$pymt = $_GET['payment'];
$_SESSION['tosave']= "";

    $role = $_SESSION['sess_userrole'];

	$name = $_SESSION['sess_name'];

	$tel= $_SESSION['sess_phone'];

	$lname = $_SESSION['sess_lname'];
	$postedesante = $_SESSION['sess_postdsante'];
$patientnumber = $_SESSION['patientnumb'];
$myndate = $_POST['thisdate'];
     if(!($_SESSION['sess_username']) or ($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro') or $role!="Receptionist"){

      header('Location: logout');

	}

include_once('connect_db.php');
$userid = $_SESSION['sess_username'];
$userident = ("SELECT id,first_name,last_name FROM users WHERE username = '$userid'");
$resultUSER = mysqli_query($conn, $userident);
while($rownurnmse = mysqli_fetch_assoc($resultUSER)){
    $nURSENAME =  $rownurnmse['first_name'];
    $nURSEid =  $rownurnmse['id'];
    $nURSElname=  $rownurnmse['last_name'];
    
}	

$resultpa = ("select id,names,lname,insurance,affiliate_number,consultatiom,category,consultatiom from patient where id ='$patientnumber' ");
$pat = mysqli_query($conn, $resultpa);
while ($rowval = mysqli_fetch_assoc($pat)) {
   $afnumber= $rowval['affiliate_number'];
   $patumber= $rowval['affiliate_number'];
   $firstname=  $rowval['names'];
   $lastname=  $rowval['lname'];
   $insurance=  $rowval['insurance'];
   $cosnult= $rowval['consultatiom'];
   $patinetid= $rowval['id'];
   $category = $rowval['category'];
   $consulta= $rowval['consultatiom'];
}



?>





	<!-- MAIN CONTENT -->

	<div id="content">

		

		<div class="page-full-width cf">



			 <!-- end side-menu -->

			



			

				<div class="content-module">				

					

					<div class="content-module-main cf">

		<div align="center">

		<form  method="POST" action="" >


		

		

		
		<br><br>

		<div id="invoice-POS" style="border: 5px solid red; width:40%">

    

    <center id="top">



    </center><!--End InvoiceTop-->

    

    <div id="mid" align="center">

      <div class="info">
             <strong><span style= "font-size:25px"><font color="ffbf00"><blink>MTN Mibile Money Payment</blink></font></strong><br><br><hr>
			 <br><br>

        <p> 


<img src="images/MTNimage.png" width="64" height="64" border="0" /><br>
				  <strong>Kulu HEALTH CENTER</strong><br>
				  <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>

        </p><br>

      </div>

    </div><!--End Invoice Mid-->

    

    <div id="bot"  align="center">

NAME: <STRONG><?php echo $firstname.'&nbsp;&nbsp;'.$lastname;?></STRONG></BR>
Insurance Number: <STRONG><?php echo $afnumber;?></STRONG></BR></BR></BR>

			

				 
<strong>Payable Amount :</strong>&nbsp;&nbsp;<input type="text" name="ttl1" style="border: none;border-color: transparent;font-weight:bold;" size="2px" readOnly value=<?php echo $pymt; ?>>Rwf</BR></BR>
<strong>Telephone Number :</strong><input type="text" name="ttl1" style="border: 3px solid #73AD21;" value="078"></BR></BR></BR>

				</div><!--End InvoiceBot-->

  </div>
  </div>
  </div>
  </div>
  </div>
<link rel="stylesheet" href="css/font-awesome.min.css">
<br><br>
  <div align="center">
  <table>
  <tr>
<td>
<input type="submit" name="save" id="bigbutton" value="Payment">
</td>

</tr>

</table>

</div>
<br><br><br><br>
		</form>

		</div>

		</div>

		</div>

		</div>
		<?php
	if (isset($_POST["save"])) {
		$patientnumber = $_POST['patientID'];
		$myndate = $_POST['thisdate'];
		$_SESSION['patientnumb']= $patientnumber;

	$_SESSION['tosave'] = "Yes";
$resultpa = ("select id,names,lname,insurance,affiliate_number,consultatiom,category,consultatiom from patient where id ='$patientnumber' ");
$pat = mysqli_query($conn, $resultpa);
while ($rowval = mysqli_fetch_assoc($pat)) {
   $afnumber= $rowval['affiliate_number'];
   $patumber= $rowval['affiliate_number'];
   $firstname=  $rowval['names'];
   $lastname=  $rowval['lname'];
   $insurance=  $rowval['insurance'];
   $cosnult= $rowval['consultatiom'];
   $patinetid= $rowval['id'];
   $category = $rowval['category'];
   $consulta= $rowval['consultatiom'];
}

$mymaximum = MAX($nomed,$nocons,$noact,$ntable,$nohosp);
for($isave = 0; $isave< $mymaximum ; $isave++){
$insert1 = ("INSERT INTO consomation (id,consultatiobn,medicament,upmedicamnet,qtymedicamnet,consommable,UPcons,Qcons,actemedicale,upacte,qtyacte,examenmedicale,upexamen,qtyexamen,hospitalization,uphospitalizations,qtyhoapitalization,datecunsuption,user,postedesante)
		     VALUES('$patientnumber','$cosnult','$medicament[$isave]', '$upmedicamnet[$isave]','$qtymedicamnet[$isave]','$consommable[$isave]','$UPcons[$isave]','$Qcons[$isave] ','$actemedicale[$isave]', '$qtyacte[$isave]','$upacte[$isave]','$exemens[$isave]','$prices[$isave]','$qtties[$isave]','$hospitalization[$isave]','$uphospitalizations[$isave]','$qtyhoapitalization[$isave]','$myndate','$userid','$postedesante')");
$resultsave1 = mysqli_query($conn, $insert1);	
}
if($insert1){
$deleteCONSULTAT = "DELETE from consultation WHERE  	patient_id   ='$patientnumber' "; 
mysqli_query($conn,$deleteCONSULTAT);
}
																																									
echo "<script>alert('Payment done Successfully')</script>";
echo "<script>window.location='saveconsumptions';</script>";
?>
<script>
    window.onunload = refreshParent;
    function refreshParent() {
        window.opener.location.reload();
	}
</script>
<script type='text/javascript'>
         self.close();
    </script>

<?php


}

?>

</div>	
<script>

    var childWindow = "";
    var newTabUrl="m_reception";

    function openNewTab(){
        childWindow = window.open(newTabUrl);
    }

    function refreshExistingTab(){
        newTabUrl.reload();;
    }

</script>	
<script>
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : evt.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
function preventBackspace(e) {
  var evt = e || window.event;
  if (evt) {
      var keyCode = evt.charCode || evt.keyCode;
      if (keyCode === 8 || keyCode === 46) {
          if (evt.preventDefault) {
              evt.preventDefault();
          } else {
              evt.returnValue = false;
          }
      }
  }
}
function calculatevalues() {
	var List1;
	if(document.getElementById("List1").checked)
	{
	 List1 = parseInt(document.getElementById("List1").value);
	}
	else{
	 List1 = 0;
		
	}
	var List2 = parseInt(document.getElementById("List2").value);
	
	if(document.getElementById("List3").checked)
	{
	 var List3 = parseInt(document.getElementById("List3").value);
	}
	else{
	 var List3 = 0;
		
	}
	var total = parseInt(document.getElementById("ttltemp").value);
	var tottickemod = document.getElementById("ttl1");
	var totalticketmod = parseInt(document.getElementById("ttl1temp").value);
	
	var hidden_field = parseInt(document.getElementById("hidden_field").value);
	var calcphtotcopy =  hidden_field * List2;
	var allval = total + calcphtotcopy + List1 + List3;
	var tottickmodval= totalticketmod + calcphtotcopy + List1 + List3;
	ttl.value =  allval;
	tottickemod.value=tottickmodval;
    
}

</script>
<script type="text/javascript">

total = 0;

List1 = 1;

List2 = 1;

List3 = 1;

List4 = 1;



function addUp(num, x)

	 {	

	 	if (x == "List1" && List1 == 1) {

			temp = document.patient.ttl.value;

		 	tempo = parseInt(temp);

		 	numo = parseInt(num);

			nwTemp = tempo + numo;

		 	document.patient.ttl.value = nwTemp;

			//copymt

			temp1 = document.patient.ttl1.value;

		 	tempo1 = parseInt(temp1);

		 	numo1 = parseInt(num);

			nwTemp1 = tempo1 + numo1;

		 	document.patient.ttl1.value = nwTemp1;

			List1 = 0;

			return List1;

		}

		if (x == "List1" && List1 == 0) {

			temp = document.patient.ttl.value;

		 	tempo = parseInt(temp);

		 	numo = parseInt(num);

			nwTemp = tempo - numo;

		 	document.patient.ttl.value = nwTemp;

				//copymnt

			temp1 = document.patient.ttl1.value;

		 	tempo1 = parseInt(temp1);

		 	numo1 = parseInt(num);

			nwTemp1 = tempo1 - numo1;

		 	document.patient.ttl1.value = nwTemp1;

			List1 = 1;

		}

		if (x == "List2" && List2 == 1) {

			temp = document.patient.ttl.value;

		 	tempo = parseInt(temp);

		 	numo = parseInt(num);

			nwTemp = tempo + numo;

		 	document.patient.ttl.value = nwTemp;

			//copymnt

			temp1 = document.patient.ttl1.value;

		 	tempo1 = parseInt(temp1);

		 	numo1 = parseInt(num);

			nwTemp1 = tempo1 + numo1;

		 	document.patient.ttl1.value = nwTemp1;

			List2 = 0;

			return List2;

		}

		if (x == "List2" && List2 == 0) {

			temp = document.patient.ttl.value;

		 	tempo = parseInt(temp);

		 	numo = parseInt(num);

			nwTemp = tempo - numo;

		 	document.patient.ttl.value = nwTemp;

				//copymnt

			temp1 = document.patient.ttl1.value;

		 	tempo1 = parseInt(temp1);

		 	numo1 = parseInt(num);

			nwTemp1 = tempo1 - numo1;

		 	document.patient.ttl1.value = nwTemp1;

			List2 = 1;

		}

		

		if (x == "List3" && List3 == 1) {

			temp = document.patient.ttl.value;

		 	tempo = parseInt(temp);

		 	numo = parseInt(num);

			nwTemp = tempo + numo;

		 	document.patient.ttl.value = nwTemp;

			//copymt

			temp1 = document.patient.ttl1.value;

		 	tempo1 = parseInt(temp1);

		 	numo1 = parseInt(num);

			nwTemp1 = tempo1 + numo1;

		 	document.patient.ttl1.value = nwTemp1;

			List3 = 0;

			return List3;

		}

		if (x == "List3" && List3 == 0) {

			temp = document.patient.ttl.value;

		 	tempo = parseInt(temp);

		 	numo = parseInt(num);

			nwTemp = tempo - numo;

		 	document.patient.ttl.value = nwTemp;

				//copymnt

			temp1 = document.patient.ttl1.value;

		 	tempo1 = parseInt(temp1);

		 	numo1 = parseInt(num);

			nwTemp1 = tempo1 - numo1;

		 	document.patient.ttl1.value = nwTemp1;

			List3 = 1;

		}

		

		if (x == "List4" && List4 == 1) {

			temp = document.patient.ttl.value;

		 	tempo = parseInt(temp);

		 	numo = parseInt(num);

			nwTemp = tempo - numo;

		 	document.patient.ttl.value = nwTemp;

			//copymt

			

			temp1 = document.patient.ttl1.value;

		 	tempo1 = parseInt(temp1);

		 	numo1 = parseInt(num);

			nwTemp1 = tempo1 - numo1;

		 	document.patient.ttl1.value = nwTemp1;

			List4 = 0;

			return List4;

		}

		if (x == "List4" && List4 == 0) {

			temp = document.patient.ttl.value;

		 	tempo = parseInt(temp);

		 	numo = parseInt(num);

			nwTemp = tempo + numo;

		 	document.patient.ttl.value = nwTemp;

				//copymnt

			temp1 = document.patient.ttl1.value;

		 	tempo1 = parseInt(temp1);

		 	numo1 = parseInt(num);

			nwTemp1 = tempo1 + numo1;

		 	document.patient.ttl1.value = nwTemp1;

			List4 = 1;

		}

	}

	//for coopeymnt



</script>



<script type="text/javascript">

total = 0;

List1 = 1;

List2 = 1;

List3 = 1;

List4 = 1;



function addUp1(num, x)

	 {	

	 	if (x == "List1" && List1 == 1) {

			temp = document.patient.ttl.value;

		 	tempo = parseInt(temp);

		 	numo = parseInt(num);

			nwTemp = tempo - numo;

		 	document.patient.ttl.value = nwTemp;

			//copymt

			temp1 = document.patient.ttl1.value;

		 	tempo1 = parseInt(temp1);

		 	numo1 = parseInt(num);

			nwTemp1 = tempo1 - numo1;

		 	document.patient.ttl1.value = nwTemp1;

			List1 = 0;

			return List1;

		}

		if (x == "List1" && List1 == 0) {

			temp = document.patient.ttl.value;

		 	tempo = parseInt(temp);

		 	numo = parseInt(num);

			nwTemp = tempo + numo;

		 	document.patient.ttl.value = nwTemp;

				//copymnt

			temp1 = document.patient.ttl1.value;

		 	tempo1 = parseInt(temp1);

		 	numo1 = parseInt(num);

			nwTemp1 = tempo1 + numo1;

		 	document.patient.ttl1.value = nwTemp1;

			List1 = 1;

		}

		if (x == "List2" && List2 == 1) {

			temp = document.patient.ttl.value;

		 	tempo = parseInt(temp);

		 	numo = parseInt(num);

			nwTemp = tempo - numo;

		 	document.patient.ttl.value = nwTemp;

			//copymnt

			temp1 = document.patient.ttl1.value;

		 	tempo1 = parseInt(temp1);

		 	numo1 = parseInt(num);

			nwTemp1 = tempo1 - numo1;

		 	document.patient.ttl1.value = nwTemp1;

			List2 = 0;

			return List2;

		}

		if (x == "List2" && List2 == 0) {

			temp = document.patient.ttl.value;

		 	tempo = parseInt(temp);

		 	numo = parseInt(num);

			nwTemp = tempo + numo;

		 	document.patient.ttl.value = nwTemp;

				//copymnt

			temp1 = document.patient.ttl1.value;

		 	tempo1 = parseInt(temp1);

		 	numo1 = parseInt(num);

			nwTemp1 = tempo1 + numo1;

		 	document.patient.ttl1.value = nwTemp1;

			List2 = 1;

		}

		

		if (x == "List3" && List3 == 1) {

			temp = document.patient.ttl.value;

		 	tempo = parseInt(temp);

		 	numo = parseInt(num);

			nwTemp = tempo - numo;

		 	document.patient.ttl.value = nwTemp;

			//copymt

			temp1 = document.patient.ttl1.value;

		 	tempo1 = parseInt(temp1);

		 	numo1 = parseInt(num);

			nwTemp1 = tempo1 - numo1;

		 	document.patient.ttl1.value = nwTemp1;

			List3 = 0;

			return List3;

		}

		if (x == "List3" && List3 == 0) {

			temp = document.patient.ttl.value;

		 	tempo = parseInt(temp);

		 	numo = parseInt(num);

			nwTemp = tempo+numo;

		 	document.patient.ttl.value = nwTemp;

				//copymnt

			temp1 = document.patient.ttl1.value;

		 	tempo1 = parseInt(temp1);

		 	numo1 = parseInt(num);

			nwTemp1 = tempo1 + numo1;

		 	document.patient.ttl1.value = nwTemp1;

			List3 = 1;

		}

		

		if (x == "List4" && List4 == 1) {

			temp = document.patient.ttl.value;

		 	tempo = parseInt(temp);

		 	numo = parseInt(num);

			nwTemp = tempo + numo;

		 	document.patient.ttl.value = nwTemp;

			//copymt

			

			temp1 = document.patient.ttl1.value;

		 	tempo1 = parseInt(temp1);

		 	numo1 = parseInt(num);

			nwTemp1 = tempo1 + numo1;

		 	document.patient.ttl1.value = nwTemp1;

			List4 = 0;

			return List4;

		}

		if (x == "List4" && List4 == 0) {

			temp = document.patient.ttl.value;

		 	tempo = parseInt(temp);

		 	numo = parseInt(num);

			nwTemp = tempo - numo;

		 	document.patient.ttl.value = nwTemp;

				//copymnt

			temp1 = document.patient.ttl1.value;

		 	tempo1 = parseInt(temp1);

		 	numo1 = parseInt(num);

			nwTemp1 = tempo1- numo1;

		 	document.patient.ttl1.value = nwTemp1;

			List4 = 1;

		}

	}

	//for coopeymnt



</script>

				

 <script type="text/javascript">

function printpage() {
  var x = document.getElementById("printButton1");
  var x1 = document.getElementById("bigbutton");
    var x2 = document.getElementById("imagespan");

 x.style.display = "none";
 x1.style.display = "none";
 x2.style.display = "none";
alert('Printing Invoice');

window.print();
}
function printpage1() {
  var x = document.getElementById("printButton1");
  var x1 = document.getElementById("bigbutton");
1
 x.style.display = "none";
 x1.style.display = "none";
alert('Printing Invoice');

window.print();
}
</script>

 <script> 
   $(function() {
  var checkbox = $("#List2");
  var hidden = $("#hidden_field");
  hidden.hide();
  checkbox.change(function() {
    if (checkbox.is(':checked')) {
      hidden.show();
	  document.getElementById("hidden_field").disabled = false;
	  document.getElementById("hidden_field").value = "1";
    } else {
      hidden.hide();
	  document.getElementById("hidden_field").disabled = true;
	  	  document.getElementById("hidden_field").value = "";


    }
  });
});
</script> 
<style>
input[type="checkbox"][readonly] {
  pointer-events: none;
}
input#bigbutton {
width:100px;
background: #ee9784; /*the colour of the button*/
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


input#printButton1 {
width:100px;
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
input#printButton1:hover, input#printButton1:focus {
color:#dfe7ea;
/*reduce the size of the shadow to give a pushed effect*/
-webkit-box-shadow: inset 0px 1px 0px #3e9cbf, 0px 2px 0px 0px #205c73, 0px 2px 5px #999;
-moz-box-shadow: inset 0px 1px 0px #3e9cbf, 0px 2px 0px 0px #205c73, 0px 2px 5px #999;
box-shadow: inset 0px 1px 0px #3e9cbf, 0px 2px 0px 0px #205c73, 0px 2px 5px #999;
}
</style>
<style>
.container {
		width: 1%;
		margin: 0 auto;
		padding: 20px;
	}
* {
    font-size: 12px;
    font-family: 'Times New Roman';
	    margin: auto;

}

td,
th,
tr,
table {
    border-top: 1px solid black;
    border-collapse: collapse;
}

td.description,
th.description {
    width: 75px;
    max-width: 75px;
}

td.quantity,
th.quantity {
    width: 40px;
	align:center
    max-width: 40px;
    word-break: break-all;
}

td.price,
th.price {
    width: 40px;
    max-width: 40px;
    word-break: break-all;
}

.centered {
    text-align: center;
    align-content: center;
}

.ticket {
    width: 255px;
    max-width: 255px;
}

img {
    max-width: inherit;
    width: inherit;
}

@media print {
    .hidden-print,
    .hidden-print * {
        display: none !important;
    }
}

</style>