<?php 

error_reporting(0);
include('mydb_connection/my_connect_db.php');
include'mydb_connection/my_dbconnection.php';
include'mydb_connection/My_dbinsert.php';
$mtruncate = "TRUNCATE chart_multiple";
$conn->query($mtruncate);

$m = date(m);
$Y =date(Y);
//Count for January

$january = "SELECT loan_tracknumber  FROM loan_details WHERE MONTH(time_application)=1  AND YEAR(time_application) = YEAR(CURRENT_DATE()) ";
if ($resultjanuary=mysqli_query($con,$january))
  {
$numjanuary= mysqli_num_rows($resultjanuary);
  }
  if(!$numjanuary){
	$numjanuary=0;  
  }
 //Count for February

$february = "SELECT loan_tracknumber  FROM loan_details WHERE MONTH(time_application)=2  AND YEAR(time_application) = YEAR(CURRENT_DATE()) ";
if ($resultfebruary=mysqli_query($con,$february))
  {
$numfebruary= mysqli_num_rows($resultfebruary);
  }
  if(!$numfebruary){
	$numfebruary=0;  
  }
 
 //Count for March
$march = "SELECT loan_tracknumber  FROM loan_details WHERE MONTH(time_application)=3 AND YEAR(time_application) = YEAR(CURRENT_DATE()) ";
if ($resultmarch=mysqli_query($con,$march))
  {
$nummarch= mysqli_num_rows($resultmarch);
  }
   if(!$nummarch){
	$nummarch=0;  
  }

 //Count for April
$april = "SELECT loan_tracknumber  FROM loan_details WHERE MONTH(time_application)=4 AND YEAR(time_application) = YEAR(CURRENT_DATE()) ";
if ($resulapril=mysqli_query($con,$april))
  {
$numapril= mysqli_num_rows($resulapril);
  }
   if(!$numapril){
	$numapril=0;  
  } //Count for May
$may = "SELECT loan_tracknumber  FROM loan_details WHERE MONTH(time_application)=5 AND YEAR(time_application) = YEAR(CURRENT_DATE()) ";
if ($resulmay=mysqli_query($con,$may))
  {
$nummay= mysqli_num_rows($resulmay);
  }
   if(!$nummay){
	$nummay=0;  
  }  
 //Count for June
$june = "SELECT loan_tracknumber  FROM loan_details WHERE MONTH(time_application)=6  AND YEAR(time_application) = YEAR(CURRENT_DATE()) ";
if ($resultjune=mysqli_query($con,$june))
  {
$numjune= mysqli_num_rows($resultjune);
  }
  if(!$numjune){
	$numjune=0;  
  }
 //Count for July
$july = "SELECT loan_tracknumber  FROM loan_details WHERE MONTH(time_application)=7  AND YEAR(time_application) = YEAR(CURRENT_DATE()) ";
if ($resultjuly=mysqli_query($con,$july))
  {
$numjuly= mysqli_num_rows($resultjuly);
  }
  if(!$numjuly){
	$numjuly=0;  
  }
  
 //Count for August
$august = "SELECT loan_tracknumber  FROM loan_details WHERE MONTH(time_application)=8  AND YEAR(time_application) = YEAR(CURRENT_DATE()) ";
if ($resultaugust=mysqli_query($con,$august))
  {
$numaugust= mysqli_num_rows($resultaugust);
  }
  if(!$numaugust){
	$numaugust=0;  
  }  
  
 //Count for Septemeber
$september = "SELECT loan_tracknumber  FROM loan_details WHERE MONTH(time_application)=9  AND YEAR(time_application) = YEAR(CURRENT_DATE()) ";
if ($resultseptemeber=mysqli_query($con,$september))
  {
$numseptember= mysqli_num_rows($resultseptemeber);
  }
  if(!$numseptember){
	$numseptember=0;  
  }  
 //Count for October
$october = "SELECT loan_tracknumber  FROM loan_details WHERE MONTH(time_application)=10  AND YEAR(time_application) = YEAR(CURRENT_DATE()) ";
if ($resuloctober=mysqli_query($con,$october))
  {
$numoctober= mysqli_num_rows($resuloctober);
  }
  if(!$numoctober){
	$numoctober=0;  
  }  
 //Count for November
$november = "SELECT loan_tracknumber  FROM loan_details WHERE MONTH(time_application)=11  AND YEAR(time_application) = YEAR(CURRENT_DATE()) ";
if ($resulnovember=mysqli_query($con,$november))
  {
$numnovember= mysqli_num_rows($resulnovember);
  }
  if(!$numnovember){
	$numnovember=0;  
  }  
    
   //Count for December
$december = "SELECT loan_tracknumber  FROM loan_details WHERE MONTH(time_application)=12  AND YEAR(time_application) = YEAR(CURRENT_DATE()) ";
if ($resuldecmber=mysqli_query($con,$december))
  {
$numdecember= mysqli_num_rows($resuldecmber);
  }
  if(!$numdecember){
	$numdecember=0;  
  }  
       
 $insertchart ="INSERT INTO chart_multiple (year,january,february,march,april,may,june,july,august,septemeber,october,november,december)VALUES('2018','$numjanuary','$numfebruary','$nummarch','$numapril','$nummay','$numjune','$numjuly','$numaugust','$numseptember','$numoctober','$numnovember','$numdecember')";
$conn->query($insertchart);

$queryselect = "SELECT * FROM chart_multiple";
$resultchart = $conn_db->query($queryselect);
 if ($resultchart->num_rows > 0) {
while($rowselect= $resultchart->fetch_assoc()) {
	$januaryqty = $rowselect['january'];
	$februaryqty = $rowselect['february'];
	$marchqty = $rowselect['march'];
	$aprilqty = $rowselect['april'];
	$mayqty = $rowselect['may'];
	$juneqty = $rowselect['june'];
	$julyqty = $rowselect['july'];
	$augustqty = $rowselect['august'];
	$septemebrqty = $rowselect['septemeber'];
	$octoberqty = $rowselect['october'];
	$novemberqty = $rowselect['november'];
	$decemberqty = $rowselect['december'];
}
 }
?>


    
 
<div id="chartContainer" style="height: 370px; max-width: 920px; margin: 0px auto;"></div></div>
              
 
	<script>
window.onload = function () {

var options = {
	exportEnabled: true,
	animationEnabled: true,
	title:{
		text: "Applications Received"
	},
	subtitles: [{
		text: ""
	}],
	axisX: {
		title: "Months"
	},
	axisY: {
		title: "Number of Applications",
		titleFontColor: "#4F81BC",
		lineColor: "#4F81BC",
		labelFontColor: "#4F81BC",
		tickColor: "#4F81BC",
		includeZero: false
	},
	
	toolTip: {
		shared: true
	},
	legend: {
		cursor: "pointer",
		itemclick: toggleDataSeries
	},
	data: [{
		type: "spline",
		name: "Number of Applications",
		showInLegend: true,
		xValueFormatString: "MMM YYYY",
		yValueFormatString: "#,##0 ",
		dataPoints: [
			{ x: new Date(<?php echo $Y;?>, 0, 1),  y: <?php echo $januaryqty;?> },
			{ x: new Date(<?php echo $Y;?>, 1, 1), y: <?php echo $februaryqty;?>},
			{ x: new Date(<?php echo $Y;?>, 2, 1), y: <?php echo $marchqty;?>},
			{ x: new Date(<?php echo $Y;?>, 3, 1),  y: <?php echo $aprilqty;?> },
			{ x: new Date(<?php echo $Y;?>, 4, 1),  y: <?php echo $mayqty;?> },
			{ x: new Date(<?php echo $Y;?>, 5, 1),  y: <?php echo $juneqty;?> },
			{ x: new Date(<?php echo $Y;?>, 6, 1), y: <?php echo $julyqty;?> },
			{ x: new Date(<?php echo $Y;?>, 7, 1), y: <?php echo $augustqty;?> },
			{ x: new Date(<?php echo $Y;?>, 8, 1),  y: <?php echo $septemebrqty;?> },
			{ x: new Date(<?php echo $Y;?>, 9, 1),  y: <?php echo $octoberqty;?> },
			{ x: new Date(<?php echo $Y;?>, 10, 1),  y: <?php echo $novemberqty;?> },
			{ x: new Date(<?php echo $Y;?>, 11, 1), y: <?php echo $decemberqty;?> }
		]
	}]
};
$("#chartContainer").CanvasJSChart(options);

function toggleDataSeries(e) {
	if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	} else {
		e.dataSeries.visible = true;
	}
	e.chart.render();
}

}
</script>	

  </body>
</html>

<script src="jquery-1.11.1.min.js"></script>
<script src="jquery.canvasjs.min.js"></script>
