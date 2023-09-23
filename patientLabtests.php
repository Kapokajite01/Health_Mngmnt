<?php
session_start();
include("header.php");
include('connect_db.php');
include("dbconnection.php");
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
$sqlpatient =mysqli_query($conn, "SELECT * FROM appointment WHERE appointmentid = '$appointID'");
while ($row=mysqli_fetch_array($sqlpatient)) {
 $patientName = $row['patient_name'];
 $idPatient = $row['patientid'];
	
}
?>
	
<table><tr><td>
<strong>- Identification</strong>
   <p style="margin-left: 15%;"> Patient Name &nbsp;&nbsp;<strong><?php echo $patientName; ?></strong><br>
        Patient ID &nbsp;&nbsp;<strong><?php echo $idPatient; ?></strong></br>
       Address &nbsp;&nbsp;<strong>Kigali- Gasabo -Kacyiru</strong></br>
        Gender &nbsp;&nbsp;<strong>Male</strong></br>
        Telephone  &nbsp;&nbsp;<strong>0788253614</strong><br>
         Date Of Birth  &nbsp;&nbsp;<strong>01/04/2000</strong></p>
		 </td></tr></table>
</div>

 <input class="radio" id="one" name="group" type="radio" checked>
  
  <div class="tabs" style="margin-left:35%">
    <label class="tab" id="one-tab" for="one"><h1><strong>Examen  </strong></h1></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </div>
   <div class="panels">
    <div class="panel" id="one-panel">
<div class="toggle" style="margin-left:35%">
<form method="POST" action="">

<table  border="0" style="margin: 25px;width:80%">
      <tbody>
      
        <tr>
          <td width="34%">Examen</td>
          <td width="66%">
		  <select name="medicineid" id="medicineid" onchange="loadmedicine(this.value)" required>
		  <option value="">Select Examen</option>
		  <?php
		$sqlmedicine ="SELECT * FROM prodicts order by product_name";
		$qsqlmedicine = mysqli_query($con,$sqlmedicine);
		while($rsmedicine = mysqli_fetch_array($qsqlmedicine))
		{
			echo "<option value='$rsmedicine[id]'>$rsmedicine[product_name]</option>";
		}
		?>
		  </select>
		  </td>
        </tr>
        <tr>
          <td>Cost</td>
          <td><input type="text" name="cost" id="cost" size="5px" readonly required/></td>
        </tr>
        <tr>
          <td>Unit</td>
          <td><input type="number" min="1" name="unit" id="unit" size="5px" onkeyup="calctotalcost(cost.value,this.value)" onchange="calctotalcost(cost.value,this.value)" required /></td>
        </tr>
        <tr>
          <td>Total Cost</td>
          <td><input type="text" name="totcost" id="totcost" size="5px" readonly  required/></td>
        </tr>
        <tr>
          <td colspan="2" align="center"><input type="submit" name="submit" id="submit" value="Add Examen "  style="border-radius: 4px;font-size: 36px;background-color: #4CAF50;" /> </td>
        </tr>
      </tbody>
    </table>
    </p>
	</form>

  </div>
  </div>
    
</div>
		<a href="#" title="Title of Toggle" class="toggle-trigger">Examen</a>
	<!-- Toggle Content to display -->
	<div class="toggle-content">
		<p><?php
        $billappointmentid= $rsappointment[0]; 
		include("viewbilling.php"); ?>
        </p>
	</div>
</div><!-- .toggle (end) -->
 </div>
</div>



<?php
if(isset($_SESSION[adminid]))
{
?>
    <!-- Toggle #6 -->
    <div class="toggle">
        <!-- Toggle Link -->
        <a href="#" title="Title of Toggle" class="toggle-trigger">Payment Report</a>
        <!-- Toggle Content to display -->
        <div class="toggle-content">
            <p><?php
            $billappointmentid= $rsappointment[0]; 
            include("viewpaymentreport.php"); ?>
                      <?php
                if(!isset($_SESSION[patientid]))
                {
					
	$sqlbilling_records ="SELECT * FROM billing WHERE appointmentid='$billappointmentid'";
	$qsqlbilling_records = mysqli_query($con,$sqlbilling_records);
	$rsbilling_records = mysqli_fetch_array($qsqlbilling_records);
	if($rsbilling_records[discharge_date] == "0000-00-00")
	{
				  ?>  
				  <table width="557" border="3">
			  <tbody>
				<tr>
				  <th scope="col"><div align="center"><a href="paymentdischarge.php?appointmentid=<?php echo $rsappointment[0]; ?>&patientid=<?php echo $_GET[patientid]; ?>">Make Payment</a></div></th>
				</tr>
			  </tbody>
			</table>
			<?php
	}
                }
                ?>
            </p>
        </div><!-- .toggle-content (end) -->
    </div><!-- .toggle (end) -->
<?php
}
?>

</div>
  </div>
</div>
<?php
include("footer.php");
?>
