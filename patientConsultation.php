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
include("header.php");
include('connect_db.php');

//include("dbconnection.php");
$appointID = $_GET['affid'];
?>
<script src="js/jquery.min.js"></script>

<style>
body {
  font-family: "Lato", sans-serif;
}

h2 {
  color: #000;
  text-align: center;
  font-size: 2em;
  margin: 20px 0;
}

.warpper {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.tab {
  cursor: pointer;
  padding: 10px 20px;
  margin: 0px 2px;
  background: #32557f;
  display: inline-block;
  color: #fff;
  border-radius: 3px 3px 0px 0px;
  box-shadow: 0 0.5rem 0.8rem #00000080;
}

.panels {
  background: #fff;
  box-shadow: 0 2rem 2rem #00000080;
  min-height: 200px;
  width: 100%;
  max-width:  80%;
  border-radius: 3px;
  overflow: hidden;
  padding: 20px;
}

.panel {
  display: none;
  animation: fadein 0.8s;
}

@keyframes fadein {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}

.panel-title {
  font-size: 1.5em;
  font-weight: bold;
}

.radio {
  display: none;
}

#one:checked ~ .panels #one-panel,
#two:checked ~ .panels #two-panel,
#three:checked ~ .panels #three-panel {
  display: block;
}

#one:checked ~ .tabs #one-tab,
#two:checked ~ .tabs #two-tab,
#three:checked ~ .tabs #three-tab {
  background: #fff;
  color: #000;
  border-top: 3px solid #32557f;
}

View Compiled

</style>

<script type="application/javascript">
function loadmedicine(medicineid)
{
	if (window.XMLHttpRequest) 
	{
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
	} else {
		// code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("totcost").value = this.responseText;
			document.getElementById("cost").value = this.responseText;
			document.getElementById("unit").value = 1;
		} 
	};
	xmlhttp.open("GET","ajaxmedicine.php?medicineid="+medicineid,true);
	xmlhttp.send();
}


function loadservice(serviceid)
{
	if (window.XMLHttpRequest) 
	{
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
	} else {
		// code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("acttotcost").value = this.responseText;
			document.getElementById("actcost").value = this.responseText;
			document.getElementById("actunit").value = 1;
		} 
	};
	xmlhttp.open("GET","ajaxservice.php?serviceid="+serviceid,true);
	xmlhttp.send();
}

function calctotalcost(cost,qty)
{
	 document.getElementById("totcost").value = parseFloat(cost) * parseFloat(qty);
} 
function calctotalactcost(actcost,qty1)
{
	 document.getElementById("acttotcost").value = parseFloat(actcost) * parseFloat(qty1);
} 


function validateform()
{
	if(document.frmpresrecord.prescriptionid.value == "")
	{
		alert("Prescription id should not be empty..");
		document.frmpresrecord.prescriptionid.focus();
		return false;
	}
	else if(document.frmpresrecord.medicine.value == "")
	{
		alert("Medicine field should not be empty..");
		document.frmpresrecord.medicine.focus();
		return false;
	}
	else if(document.frmpresrecord.cost.value == "")
	{
		alert("Cost should not be empty..");
		document.frmpresrecord.cost.focus();
		return false;
	}
	else if(document.frmpresrecord.unit.value == "")
	{
		alert("Unit should not be empty..");
		document.frmpresrecord.unit.focus();
		return false;
	}
	else if(document.frmpresrecord.select2.value == "")
	{
		alert("Dosage should not be empty..");
		document.frmpresrecord.select2.focus();
		return false;
	}
	else if(document.frmpresrecord.select.value == "" )
	{
		alert("Kindly select the status..");
		document.frmpresrecord.select.focus();
		return false;
	}
	else
	{
		return true;
	}
	
}
</script>
<div class="wrapper col2">
  <div id="breadcrumb">

<div class="wrapper col4">
  <div id="container">
    <p>
    
    <!-- jQuery Library -->

<div class="toggle">
<?php
$sqlpatient =mysqli_query($conn, "SELECT * FROM patient_reserv");
while ($row=mysqli_fetch_array($sqlpatient)) {
 $patientName = $row['patientFname'];
 $patientLname = $row['patientLname'];
 $idPatient = $row['patientID'];
	
}
?>
<form method="POST" action=" saveConsultaton">
<input type="text" name="patientNumber" value="<?php echo $idPatient; ?>">
<table><tr><td>
<strong>- Identification</strong>
   <p style="margin: 25px;"> Patient Name &nbsp;&nbsp;<strong><?php echo $patientName.'&nbsp;&nbsp;'.$patientLname; ?></strong><br>
        Patient ID &nbsp;&nbsp;<strong><?php echo $idPatient; ?></strong></br>
       Address &nbsp;&nbsp;<strong>Kigali- Gasabo -Kacyiru</strong></br>
        Gender &nbsp;&nbsp;<strong>Male</strong></br>
        Telephone  &nbsp;&nbsp;<strong>0788253614</strong><br>
         Date Of Birth  &nbsp;&nbsp;<strong>01/04/2000</strong></p>
		 </td><td>
	<!-- Toggle Link -->
	<p style="margin: 25px;"><a href="#" title="Title of Toggle" class="toggle-trigger"><strong> - Consultation</strong></strong></a><br><br>
	<!-- Toggle Content to display -->
	
		<textarea name="textarea" id="textarea" cols="45" rows="5" required></textarea></p>
</td></tr>

   <tr><td colspan="2" align="center"> <select class="box" name="destination" id="destination" required >
      <option value="">--Select Destination----</option>
      <option value = 'Laboratoire'>Laboratoire</option>
	 <option value='Prescription'>Prescription</option>

    </select>
	</td></tr>
	<tr><td colspan="2" align="center"><input type="submit" name="submit" id="submit" value="S e n d "  style="border-radius: 4px;font-size: 36px;background-color: #4CAF50;" /><br><br><br><br></td></tr>
	</table>
	</form>
	
</div>

 <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

</div>
  </div>
</div>
<?php
include("footer.php");
?>
