<?php
error_reporting(0);
session_start();
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!($_SESSION['sess_username']) or ($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro') or $role!="user1"){
      header('Location: logout');
	}
include_once('connect_db.php');

?>
<!DOCTYPE html>
<?php
error_reporting(0);

$sumcarnet=0;
$result1 = ("SELECT carnet from receptions");
while ($row1 = mysqli_fetch_assoc($result1))
{
$sumcarnet=$sumcarnet+$row1['carnet'];	
}

$tm=0;
$today = date("Y-m-d");

$result = ("SELECT patient.id as pid,patient.names,patient.lname,patient.carnet,patient.phtocopy,patient.transfert,patient.affectation,patient.insurance,patient.dob,patient.gender,patient.affiliate_number,consomation.consid,consomation.consultatiobn,consomation.medicament,consomation.upmedicamnet,consomation.qtymedicamnet,sum(consomation.upmedicamnet*consomation.qtymedicamnet) as totmedicament,consomation.consommable,consomation.UPcons,consomation.Qcons,sum(consomation.UPcons*consomation.Qcons) as totconsommables,consomation.actemedicale,consomation.upacte,consomation.qtyacte,sum(consomation.upacte*consomation.qtyacte) AS totacte,consomation.examenmedicale,consomation.upexamen,consomation.qtyexamen,sum(consomation.qtyexamen*consomation.upexamen) as totexamens,consomation.datecunsuption FROM consomation JOIN  patient ON consomation.id=patient.id where datecunsuption ='$today' GROUP BY pid,datecunsuption ORDER BY datecunsuption DESC,consid DESC");
$previous = ''; 
$previous1 = '';
$previous2 = ''; 
$previous3 = ''; 
$previous4 = '';
$previous28 = ''; 
$previous38 = ''; 
$mypreviouscurrent = '';  
$sumconsult=0; 
$sumcarnet=0;
$sumphotocopy=0;
$sumtransfer=0;
$sumtest=0;
$sumpro_mat=0;
$sumother_cons=0;
$sumdrugs=0;
$sumtotala=0;
$sumcopeymt=0;
$suminsured=0;
			while ($row = mysqli_fetch_assoc($result))
{
$originalDate = $row['datecunsuption'];
$newDate = date("d/m/Y", strtotime($originalDate));
$newDate1 = date("m", strtotime($row['datecunsuption']));
$tot=($row['consultatiobn']+$row['totexamens']+$row['totacte']+$row['totconsommables']+$row['totmedicament']);
$parc=$row['parc_insurance'];
$sumconsult=$sumconsult+$row['consultatiobn'];
$sumcarnet=$sumcarnet+$row['carnet'];
$sumphotocopy=$sumphotocopy+$row['phtocopy'];
$sumtransfer=$sumtransfer+$row['transfert'];
$sumtest= $sumtest+$row['totexamens'];
$sumpro_mat= $sumpro_mat+$row['totacte'];
$sumother_cons= $sumother_cons+$row['totconsommables'];
$sumdrugs= $sumdrugs+ $row['totmedicament'];
$sumtotala=$sumtotala+$tot;			
$ass=$row['insurance'];
if($ass == 'MUTUELLE'){
$copeymt=200;
$insured= $tot-200;
}
if($ass == 'RAMA/RSSB'){
$copeymt=$tot*(0.15);
$insured= $tot*(0.85);
}
if($ass == 'MMI'){
$copeymt=$tot*(0.1);
$insured= $tot*(0.9);
}
if($ass == 'MEDIPLA'){
$copeymt=$tot*(0.15);
$insured= $tot*(0.85);
}
if($ass == 'MEDIPLA'){
$copeymt=$tot*(0.15);
$insured= $tot*(0.85);
}
if($ass == 'RADIANT'){
$copeymt=$tot*(0.15);
$insured= $tot*(0.85);
}
if($ass == 'NO INSURANCE'){
$copeymt=$tot*1;
$insured= 0;
}
$sumcopeymt= $sumcopeymt+$copeymt; 
$suminsured= $suminsured+$insured;
}
?>
			
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
	<?php include_once("tpl/top_bar_u.php"); ?>
	

<div class="side-menu fl">
				
				<ul>

				</ul>
                                
                                 
			</div> <!-- end side-menu -->
			<div class="content-module-main cf">
				
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


