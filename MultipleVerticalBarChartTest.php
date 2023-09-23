
	
<?php
session_start();
error_reporting(0);
include('mydb_connection/my_connect_db.php');
include'mydb_connection/my_dbconnection.php';
include'mydb_connection/My_dbinsert.php';
$ctruncate = "TRUNCATE chart";
$conn->query($ctruncate);
$junelcom = "SELECT loan_tracknumber  FROM loan_details WHERE loan_type = 'Commercial Loan' AND MONTH(time_application)=6  AND YEAR(time_application) = YEAR(CURRENT_DATE()) ";
if ($resultjune=mysqli_query($con,$junelcom))
  {
$numjunelcom= mysqli_num_rows($resultjune);
  }
  
  $juneAS = "SELECT loan_tracknumber  FROM loan_details WHERE loan_type = 'Advance Salary' AND MONTH(time_application)=6  AND YEAR(time_application) = YEAR(CURRENT_DATE()) ";
if ($resultas=mysqli_query($con,$juneAS))
  {
$numjuneas= mysqli_num_rows($resultas);
  }
   
   $juneIG= "SELECT loan_tracknumber  FROM loan_details WHERE loan_type = 'Investment Group' AND MONTH(time_application)=6  AND YEAR(time_application) = YEAR(CURRENT_DATE()) ";
if ($resultIG=mysqli_query($con,$juneIG))
  {
$numjuneIG= mysqli_num_rows($resultIG);
  }
   echo '<br>Commercial Loan'.$numjunelcom;
   echo '<br>Advance Salary'.$numjuneas;
   echo '<br>Investment Group'.$numjuneIG;
 $insertjune = "insert into chart(variation_name,keywords,keywords2,keywords3,fist_value,second_value,third_value)VALUES ('JUNE','Commercial Loan','Advance Salary','Investment Group','$numjunelcom','$numjuneas','$numjuneIG')";
		$conn->query($insertjune);
?>
		
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/Chart.min.js"></script>
<?php
	
mysql_connect("localhost", "root","fidele") or die(mysql_error());
mysql_select_db("dirskhpe_rangiro") or die(mysql_error());
$query = "SELECT * FROM chart ";
$result = mysql_query($query) or die(mysql_error()."[".$query."]");
while ($row = mysql_fetch_array($result))
{
	$line1[] = $row['variation_name'];
	$total1[] = $row['fist_value'];
	$line2[] = $row['keywords2'];
	$total2[] = $row['second_value'];	
	$line3[] = $row['keywords3'];
	$total3[] = $row['third_value'];	
}
$N = count($line1);
$N1 = count($line1);
$N2 = count($line1);
$NMAX = max($N,$N1,$N2);
echo $NMAX;
	include "classes/libchart.php";

	$chart = new VerticalBarChart();

	$serie1 = new XYDataSet();
	for($i =0 ; $i<$NMAX; $i++){
	$serie1->addPoint(new Point($line1[$i],$total1[$i]));
	}
		
	$serie2 = new XYDataSet();
	for($j =0 ; $j<$NMAX; $j++){
	$serie2->addPoint(new Point($line2[$j],$total2[$j]));
	}
		$serie3 = new XYDataSet();
	for($k =0 ; $k<$NMAX; $k++){
	$serie3->addPoint(new Point($line3[$k],$total3[$k]));
	}
 $incident1 = 'Commercial Loan';
$incident2 = 'Advance Salary';
$incident3 = 'Investment Group';
	$dataSet = new XYSeriesDataSet();
	$dataSet->addSerie($incident1, $serie1);
	$dataSet->addSerie($incident2, $serie2);
	$dataSet->addSerie($incident3, $serie3);
	$chart->setDataSet($dataSet);
	$chart->getPlot()->setGraphCaptionRatio(0.65);

	$chart->setTitle("All Products Evolution Chart");
	$chart->render("generated/demo7.png");
?>

	<img alt="Line chart" src="generated/demo7.png" style="border: 1px solid gray;"/>


	
	