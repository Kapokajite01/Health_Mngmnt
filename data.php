<div class="page-full-width cf">

			 <!-- end side-menu -->
			
			<div class="side-content fr">
			
				<div class="content-module">
							<!-- end content-module-heading -->
					
						<div class="content-module-main cf">
				

				<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

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
	 <table  class='blueTable'>

				<tr><th>No</th><th>Affiliation Number</th><th>Beneficiary Names</th><th>Age</th><th>Status</th><th>Date <br>of <br>Reception</th><th>Select</th></tr>
				<?php 
	
			while($rowval = mysqli_fetch_assoc($result)) {
             $mstatus= $rowval['status'];
			 $myinsurance = $rowval['insurance'];

	if($mstatus == 'Completed')
	{
		?>	
	<tr bgcolor="green">
	<td><font color="white"><strong><?php echo ++$i;?>&nbsp;&nbsp;&nbsp;</td>
	<td><font color="white"><strong><?php echo $rowval['affiliate_number'];?></td>
	<td><font color="white"><strong><?php echo $rowval['names'].'&nbsp;&nbsp;&nbsp;'.$rowval['lname'];?></td>
	<td><font color="white"><strong><?php echo $rowval['dob'];?></td>
	<td><font color="white"><strong><?php echo $rowval['status'];?></td>
	<td><font color="white"><strong><?php echo $rowval['date'];?></td>
	<td><a href = "distribution?affid=<?php echo urlencode($rowval['affiliate_number']); ?>&amp;affnumber=<?php echo urlencode($rowval['id']); ?>&amp;fname=<?php echo urlencode($rowval['names']); ?>&amp;lastname=<?php echo urlencode($rowval['lname']); ?>&amp;dtconsult=<?php echo urlencode($rowval['date']); ?>" target="_blank"><font color="white"><strong>Select</strong></font></a></td>
	<?php
	echo '</tr>';
	}
	else{
	?>
	<tr> 
	<td><font color="black"><strong><?php echo ++$i;?>&nbsp;&nbsp;&nbsp;</td>
	<td><font color="black"><strong><?php echo $rowval['affiliate_number'];?></td>
	<td><font color="black"><strong><?php echo $rowval['names'].'&nbsp;&nbsp;&nbsp;'.$rowval['lname'];?></td>
	<td><font color="black"><strong><?php echo $rowval['dob'];?></td>
	<td><font color="black"><strong><?php echo $rowval['status'];?></td>
	<td><font color="black"><strong><?php echo $rowval['date'];?></td>
	<td><font color="black"><strong><?php echo $mstatus;?></td>
	

<?php	
		
	}
	}
	echo "<tr><th></th><th></th><th></th><th></th><th></th><th></th><th></th></tr>";		
	
?>

	</table>
