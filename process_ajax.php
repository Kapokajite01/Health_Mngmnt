<?php
include_once('connect_db.php');
   
  $placeId = $_POST['placeId'];

  $query = "SELECT * from prodicts  ";
$resultAJ = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($resultAJ)) {
    if ($placeId == $row['id']){
      echo json_encode($row);
    }
  }
?>
