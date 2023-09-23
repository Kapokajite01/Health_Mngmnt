
<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Medical Records</title>
	
	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="js/date_pic/date_input.css">
        <link rel="stylesheet" href="lib/auto/css/jquery.autocomplete.css">
	
	<!-- Optimize for mobile devices -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	
	<!-- jQuery & JS files -->
		<link rel="stylesheet" href="css/cmxform.css">
	<script src="js/lib/jquery.min.js" type="text/javascript"></script>
	<script src="js/lib/jquery.hotkeys-0.7.9.min.js" type="text/javascript"></script>
	<script src="js/lib/jquery.validate.min.js" type="text/javascript"></script>

	<script src="js/script.js"></script>  
        <script src="js/date_pic/jquery.date_input.js"></script>  
        <script src="lib/auto/js/jquery.autocomplete.js "></script>  
	 
	<style>
	.entry:not(:first-of-type)
{
    margin-top: 10px;
}

.glyphicon
{
    font-size: 12px;
}
	</style>
	
	<!-- MAIN CONTENT -->
	<div id="content">
					<div class="content-module-heading cf"  style="margin-left: 8%;">
<ul id="nav" class="fl">
	
				<li class="v-sep"><a href="m_reception" class="round button dark menu-user image-left"><strong>Logged in as &nbsp;&nbsp;&nbsp;<?php echo $myusername.'&nbsp;&nbsp;&nbsp;<stong>'.$role; ?></strong></a>
					<ul>
					<li><a href="logout" class="round button dark menu-user image-left"><strong>Log out</strong></a></li>

					</ul> 
</li>
		<li class="v-sep"><a href="" class="round button dark menu-user image-left"> <strong>New </strong></a>
<?php
if($role=="Receptionist"){
	?>
		<ul>
		<li class="v-sep"><a href="m_reception" ><strong>Patient </strong></a></li>
    <li><a href="m_appointment" style="width:200px;"><strong>New Appointment</strong></a></li>
					</ul> 	
<?php
}
?>					
				</li>
<li class="v-sep">
<a href=" #########" class="round button dark menu-user image-left"><strong>Appointment</strong></a>
  <?php
if($role=="Receptionist"){
	?> 


   <ul>
    <li><a href="viewappointmentpending" style="width:200px;"><strong>View  Appointments</strong></a></li>
    </ul>
	<?php
}
?>
</li>
		<li class="v-sep"><a href="" class="round button dark menu-user image-left"> <strong>Reports </strong></a>

		<ul>
		<li class="v-sep"><a href="" class=" stock-tab" onClick=window.open("zones","Ratting","width=1800,height=2500,scrollbars=yes,left=250,top=150,toolbar=0,status=0,"); value="MEDICINES"><strong>Zone </strong></a></li>
		<li class="v-sep"><a href="" class=" stock-tab" onClick=window.open("hors_zone","Ratting","width=1800,height=2500,scrollbars=yes,left=250,top=150,toolbar=0,status=0,"); value="MEDICINES"><strong>Hors Zone </strong></a></li>
		<li class="v-sep"><a href="" class=" stock-tab" onClick=window.open("hors_disrict","Ratting","width=1800,height=2500,scrollbars=yes,left=250,top=150,toolbar=0,status=0,"); value="MEDICINES"><strong>Hors District </strong></a></li>
		<li class="v-sep"><a href="" class=" stock-tab" onClick=window.open("out_patients","Ratting","width=1800,height=2500,scrollbars=yes,left=250,top=150,toolbar=0,status=0,"); value="MEDICINES"><strong>OUT Patients  </strong></a></li>
		<li class="v-sep"><a href="" class=" stock-tab" onClick=window.open("inp_patients","Ratting","width=1800,height=1800,scrollbars=yes,left=250,top=150,toolbar=0,status=0,"); value="MEDICINES"><strong>In Patients </strong></a></li>
		<li class="v-sep"><a href="" class=" stock-tab" onClick=window.open("nouvaux_cas","Ratting","width=1800,height=1800,scrollbars=yes,left=250,top=150,toolbar=0,status=0,"); value="MEDICINES"><strong>Nouveaux cas  </strong></a></li>
		<li class="v-sep"><a href="" class=" stock-tab" onClick=window.open("anciens_cas","Ratting","width=1800,height=1800,scrollbars=yes,left=250,top=150,toolbar=0,status=0,"); value="MEDICINES"><strong>Ancien cas  </strong></a></li>
					</ul> 	

				</li>
				<li class="v-sep"><a href="" class="round button dark menu-user image-left"> <strong>Records Report </strong></a>
<ul>
		<li class="v-sep"><a href="report_reception_completed" target="_blank"><strong>Completed </strong></a></li>
		<?php
if($role=="Receptionist"){
	?>
		<li class="v-sep"><a href="report_reception_edit" target="_blank"><strong>Edit</strong></a></li>
<?php
}
?>
					</ul> 
				


				</li>

<li class="v-sep"><a href="" class="round button dark menu-user image-left"> <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Records on [<?php echo  date("d-m-Y");?>]</strong></a>
<ul>
					</ul> 
				


				</li>				
		</li>
								
			</ul>	<fieldset style="float: right">
                                    <a href="logout" class="round button dark menu-logoff image-left" style="background-color: #cc0000">Log out</a>
				</fieldset>			</div> 	