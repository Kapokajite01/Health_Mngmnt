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
    include_once('connect_db.php');
	
$myusername=$_SESSION['sess_username'];
$postedesante = $_SESSION['sess_postdsante'];
?>
<html>
<style>
input#bigbutton {
width:500px;
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
body {font-family: Arial;}

/* Style the tab */
.tab {
  overflow: hidden;
  border: 0px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 10px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 0px solid #ccc;
  border-top: none;
}
.verticalLine {
  border-left: thick solid #ff0000;
}


table.blueTable {
  border: 0px solid #1C6EA4;
  background-color: #EEEEEE;
  width: 60%;
  text-align: left;
  border-collapse: collapse;
  margin: 0 auto;
}
table.blueTable td, table.blueTable th {
  border: 0px solid #AAAAAA;
  padding: 3px 2px;
}
table.blueTable tbody td {
  font-size: 13px;
}
table.blueTable thead {
  background: #1C6EA4;
  background: -moz-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
  background: -webkit-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
  background: linear-gradient(to bottom, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
  border-bottom: 2px solid #444444;
}
table.blueTable thead th {
  font-size: 15px;
  font-weight: bold;
  color: #FFFFFF;
  border-left: 2px solid #D0E4F5;
}
table.blueTable thead th:first-child {
  border-left: none;
}

table.blueTable tfoot {
  font-size: 14px;
  font-weight: bold;
  color: #FFFFFF;
  background: #D0E4F5;
  background: -moz-linear-gradient(top, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
  background: -webkit-linear-gradient(top, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
  background: linear-gradient(to bottom, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
  border-top: 2px solid #444444;
}

table.blueTable tfoot .links {
  text-align: right;
}
table.blueTable tfoot .links a{
  display: inline-block;
  background: #1C6EA4;
  color: #FFFFFF;
  padding: 2px 8px;
  border-radius: 5px;
}
</style>
<title>Autocomplete using PHP/MySQL and jQuery</title>
<link rel="stylesheet" href="cssauto/style.css" />
<script type="text/javascript" src="jsauto/jquery.min.js"></script>
<script type="text/javascript" src="jsauto/script.js"></script>
</head>

<link href="jquery-ui1.css" rel="stylesheet" type="text/css"/>  
 <script src="jquery.min1.js"></script>  
   <script src="jquery-ui.min1.js"></script> 
   <script type="text/javascript">
       $(function() {
               $("#datesearch").datepicker({ dateFormat: "yy-mm-dd" }).val()
               $("#datesearch1").datepicker({ dateFormat: "yy-mm-dd" }).val()
       });

   </script> 
</head>
<body>

	<!-- TOP BAR -->
	<!-- TOP BAR -->
	<?php
	include_once('mmenus.php');

	?>	
	
	<!-- MAIN CONTENT -->
	<div id="content">
		
					<div class="content-module-heading cf">
<ul id="nav" class="fl">
	
				<li class="v-sep"><a href="#" class="round button dark menu-user image-left"><strong>Logged in as &nbsp;&nbsp;&nbsp;<?php echo $myusername.'&nbsp;&nbsp;&nbsp;<stong>'.$role; ?></strong></a>
					<ul>
					<li><a href="logout" class="round button dark menu-user image-left"><strong>Log out</strong></a></li>

					</ul> 
</li>
		<li class="v-sep"><a href="" class="round button dark menu-user image-left"> <strong>New </strong></a>

		<ul>
		<li class="v-sep"><a href="m_reception" ><strong>Patient </strong></a></li>
		<li class="v-sep"><a href="prhotocopy_reception" ><strong>Photocopy </strong></a></li>
					</ul> 		


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
		<li class="v-sep"><a href="report_reception_edit" target="_blank"><strong>Edit</strong></a></li>
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
		<div class="page-full-width cf">

			 <!-- end side-menu -->
			
			<div class="side-content fr">
			
				<div class="content-module">
							<!-- end content-module-heading -->
					
						<div class="content-module-main cf">
				

				<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">


   <?php
  if ($role == "Mutuelle")
   {
	$sqlresult = ("select id,affiliate_number,names,lname,affiliate_names,afilliate_lastname,dob,status,date,insurance patient_id from patient  JOIN consultation ON consultation.patient_id = patient.id and insurance ='MUTUELLE'");
   }
   else{
	$sqlresult = ("select id,affiliate_number,names,lname,affiliate_names,afilliate_lastname,dob,status,date,insurance,patient_id from patient  JOIN consultation ON consultation.patient_id = patient.id");
	   
   }
 	$result = mysqli_query($conn, $sqlresult);

 ?>
<body>
    
				<form method="POST" action="new_reception">
                <div class="label_div" align="center"><strong>Number To Search:</strong> </div>
                <div class="input_container">
                    <input type="text" id="country_id" name="country_id" onkeyup="autocomplet()" autocomplete="off" required aria-required='true' aria-describedby='name-format' placeholder="Search Insurance Number">
                   &nbsp;&nbsp;&nbsp;&nbsp; <ul id="country_list_id"></ul><input type="submit" name="search" value="SEARCH">               </div>

					</div> <!-- end content-module-main -->
							
				
				</div> <!-- end content-module -->
				
				
		
		</div></div> <!-- end full-width -->
			
	</div> <!-- end content --><br>





	<div id="footer" style="margin-top: 5%;">

		<p><strong>Powed By Vision Soft Ltd .</strong></p>
			
	</div> <!-- end footer -->
</body>

</html>