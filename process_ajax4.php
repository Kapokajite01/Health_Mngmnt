<?php
include_once('connect_db.php');

   
  $placeId = $_POST['placeId'];

  $query = "SELECT * from hospitalisation order by name_hospitalisation";
$resultAJ7 = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($resultAJ7)) {
    if ($placeId == $row['id']){
      echo json_encode($row);
    }
  }
?>
