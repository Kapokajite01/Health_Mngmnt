<?php
include_once('connect_db.php');

   
  $placeId = $_POST['placeId'];

  $AJ7 = "SELECT * from assurance";
$resultAJ7 = mysqli_query($conn, $AJ7);
while ($row = mysqli_fetch_assoc($resultAJ7)) {
    if ($placeId == $row['id']){
      echo json_encode($row);
    }
  }
?>
