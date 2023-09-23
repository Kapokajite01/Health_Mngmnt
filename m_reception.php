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
$_SESSION['redirect']  = 'no'
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
</head>
<body>

	<!-- TOP BAR -->
	<!-- TOP BAR -->
	<?php
	include_once('mmenus.php');
  $key = 'bRuD5WYw5wd0rdHR9yLlM6wt2vteuiniQBqE70nAuhU=';
 
function my_encrypt($data, $key) {
    $encryption_key = base64_decode($key);
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    $encrypted = openssl_encrypt($data, 'aes-256-cbc', $encryption_key, 0, $iv);
    return base64_encode($encrypted . '::' . $iv);
}
	?>	

		

		<div class="page-full-width cf">

			 <!-- end side-menu -->
			
			<div class="side-content fr">
			
				<div class="content-module">
							<!-- end content-module-heading -->
					
						<div class="content-module-main cf">
				

				<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>Autocomplete </title>
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
   <?php
  if ($role == "Mutuelle")
   {
	$sqlresult = ("select id,consultation_id, affiliate_number,names,lname,affiliate_names,afilliate_lastname,dob,status,date,origine,insurance,branch, patient_id from patient  JOIN consultation ON consultation.patient_id = patient.id and insurance ='MUTUELLE'");
   }
   else{
	$sqlresult = ("select id,consultation_id,affiliate_number,names,lname,affiliate_names,afilliate_lastname,dob,status,date,origine,insurance,branch,patient_id from patient  JOIN consultation ON consultation.patient_id = patient.id");
	   
   }
 	$result = mysqli_query($conn, $sqlresult);

 ?>
<body>
    
				<form method="POST" action="new_reception">
                <div class="label_div" align="center"><strong>Number To Search:</strong> </div>
                <div class="input_container">
                    <input type="text" id="country_id" name="country_id" onkeyup="autocomplet()" autocomplete="off" required aria-required='true' aria-describedby='name-format' placeholder="Search Insurance Number">
                   &nbsp;&nbsp;&nbsp;&nbsp; <ul id="country_list_id"></ul><input type="submit" name="search" value="SEARCH">               </div>
				   </form>

					</div> <!-- end content-module-main -->
							
				
				</div> <!-- end content-module -->
				
				
		
		</div></div> <!-- end full-width -->
			
	</div> <!-- end content --><br>
		 <?php
	 					if ($result->num_rows > 0) 
					{
						?>
		<form  method="POST" action="CusnsultationDelete">
	<input type="submit" name="deleteCons" style="background-color: #ff6347" value="Remove Patient(s)          X" >
	 <br><br>

	 <table  class='blueTable'>

				<tr><th>Check</th><th>No</th><th>Affiliation Number</th><th>Beneficiary Names</th><th>Age</th><th>Status</th><th>Date <br>of <br>Reception</th><th>Select</th><th> Print File</th></tr>
				<?php 

			while($rowval = mysqli_fetch_assoc($result)) {
             $mstatus= $rowval['status'];
			 $myinsurance = $rowval['insurance'];
			$consulID = $rowval['consultation_id'];
			 $sdate = $rowval['date'];
			 $plainID = $rowval['affiliate_number'];
			 $affnumber = $rowval['id'];
			 $encrypteld2 = my_encrypt($plainID, $key);
			 $affnumber = my_encrypt($affnumber, $key);

	if($mstatus == 'Completed')
	{
		?>	
	<tr bgcolor="green">
	<td></td>
	<td><font color="white"><strong><?php echo ++$i;?>&nbsp;&nbsp;&nbsp;</td>
	<td><font color="white"><strong><?php echo $rowval['affiliate_number'];?></td>
	<td><font color="white"><strong><?php echo $rowval['names'].'&nbsp;&nbsp;&nbsp;'.$rowval['lname'];?></td>
	<td><font color="white"><strong><?php echo $rowval['dob'];?></td>
	<td><font color="white"><strong><?php echo $rowval['status'];?></td>
	<td><font color="white"><strong><?php echo $rowval['date'];?></td>
	<td><a href="javascript: void(0)"   onclick="popup('distribution?affid=<?php echo $encrypteld2; ?>&amp;affnumber=<?php echo $affnumber; ?> &amp;dtconsult=<?php echo urlencode($sdate); ?>')"><font color="white"><strong>Select</strong></font></a></td><td>
	
	
	<font color="black"><strong><a href="formPrintRec?affid=<?php echo urlencode($rowval['affiliate_number']); ?>&amp;affnumber=<?php echo urlencode($rowval['id']); ?>&amp;affid=<?php echo urlencode($rowval['consid']); ?>&amp;fname=<?php echo urlencode($rowval['names']); ?>&amp;lastname=<?php echo urlencode($rowval['lname']); ?>&amp;filenumber=<?php echo $i; ?>"  target="_blank"><font color="white"><strong>print File</font></strong></a></td>
	
	
	
	<?php
	echo '</tr>';
	}
	else{
	?>
	<tr> 
	<td>

	<input type="checkbox" id="checkItem" name="check[]" value="<?php echo $consulID; ?>">
	</td>
	<td><font color="black"><strong><?php echo ++$i;?>&nbsp;&nbsp;&nbsp;</td>

	
	<td><font color="black"><strong><?php echo $rowval['affiliate_number'];?></td>
	<td><font color="black"><strong><?php echo $rowval['names'].'&nbsp;&nbsp;&nbsp;'.$rowval['lname'];?></td>
	<td><font color="black"><strong><?php echo $rowval['dob'];?></td>
	<td><font color="black"><strong><?php echo $rowval['status'];?></td>
	<td><font color="black"><strong><?php echo $rowval['date'];?></td>
	<?php 
	
	$branch  =  $rowval['branch'];
	if($branch == 'Redcted'){
		?>
		<td><font color="#d92626"><strong>Redirected</strong></td>
		
		<?php
		
	}
	else{
	?>
		<td><font color="black"><strong><?php echo $origine;?></td>


<?php	
		
		
	}
	
	
	
	?>
	

<?php	
		
	}
	}
					
	echo "<tr><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th></tr>";		
	}
	else
	{
	echo '<font color="red"><strong> No patient In Reception</strong></font>';	
		
	}
?>

	</table>

</form>


	<div id="footer" style="margin-top: 5%;">

		<p><strong>Powed By Vision Soft Ltd .</strong></p>
			
	</div> <!-- end footer -->
</body>
<script type="text/javascript">
<!--
function popup(url) 
{
 var width  = 1300;
 var height = 800;
 var left   = (screen.width  - width)/2;
 var top    = (screen.height - height)/2;
 var params = 'width='+width+', height='+height;
 params += ', top='+top+', left='+left;
 params += ', directories=no';
 params += ', location=no';
 params += ', menubar=no';
 params += ', resizable=no';
 params += ', scrollbars=no';
 params += ', status=no';
 params += ', toolbar=no';
 newwin=window.open(url,'windowname5', params);
 if (window.focus) {newwin.focus()}
 return false;
}
</script>
</html>