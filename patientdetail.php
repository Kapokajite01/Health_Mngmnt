<?php
$sqlpatient =mysqli_query($conn, "SELECT * FROM appointment WHERE appointmentid = '$appointID'");
while ($row=mysqli_fetch_array($sqlpatient)) {
 $patientName = $row['patient_name'];
 $idPatient = $row['patientid'];
	
}
?>

    <table style="width:40%; border:0">
        <tr>
          <td><strong>Patient Name </strong></td>
          <td>&nbsp;<strong><?php echo $patientName; ?></strong></td>
          <td><strong>Patient ID</strong></td>
          <td>&nbsp;<strong><?php echo $idPatient; ?></strong></td>
        </tr>
        <tr>
          <td><strong>Address</strong></td>
          <td><strong>Kigali- Gasabo -Kacyiru</strong></td>
          <td><strong>Gender</strong></td>
          <td> <strong>Male</strong></td>
        </tr>
        <tr>
          <td><strong>Telephone </strong></td>
          <td><strong>0788253614</strong></td>
          <td><strong>Date Of Birth </strong></td>
          <td>&nbsp;<strong>01/04/2000</strong></td>
        </tr>
    </table>

<script type="application/javascript">
function validateform()
{
	if(document.frmpatdet.patientname.value == "")
	{
		alert("Patient name should not be empty..");
		document.frmpatdet.patientname.focus();
		return false;
	}
	else if(document.frmpatdet.patientid.value == "")
	{
		alert("Patient ID should not be empty..");
		document.frmpatdet.patientid.focus();
		return false;
	}
	else if(document.frmpatdet.admissiondate.value == "")
	{
		alert("Admission date should not be empty..");
		document.frmpatdet.admissiondate.focus();
		return false;
	}
	else if(document.frmpatdet.admissiontime.value == "")
	{
		alert("Admission time should not be empty..");
		document.frmpatdet.admissiontime.focus();
		return false;
	}
	else if(document.frmpatdet.address.value == "")
	{
		alert("Address should not be empty..");
		document.frmpatdet.address.focus();
		return false;
	}
	else if(document.frmpatdet.select.value == "")
	{
		alert("Gender should not be empty..");
		document.frmpatdet.select.focus();
		return false;
	}
	else if(document.frmpatdet.mobilenumber.value == "")
	{
		alert("Contact number should not be empty..");
		document.frmpatdet.mobilenumber.focus();
		return false;
	}
	else if(document.frmpatdet.dateofbirth.value == "")
	{
		alert("Date Of Birth should not be empty..");
		document.frmpatdet.dateofbirth.focus();
		return false;
	}
	
	else
	{
		return true;
	}
}
</script>