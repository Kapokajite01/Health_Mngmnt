<?php
 include_once('connect_db.php');
   
  $placeId = $_POST['placeId'];

  $query = "SELECT * from patient";
$resultAJ7 = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($resultAJ7)) {
    if ($placeId == $row['Patient_ID']){
      echo json_encode($row);
    }
  }
 $query1 = "SELECT * from prodicts";
  $result1 = ($query1) or die('Query failed: ' . mysql_error());
  while ($row1 = mysql_fetch_assoc($result1)) {
    if ($placeId == $row['Patient_ID']){
      echo json_encode($row1);
    }
  }
?>
