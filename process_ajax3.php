<?php
include_once('connect_db.php');
 
  $placeId = $_POST['placeId'];

  $query = "SELECT * from actes order by name_acte";
$resultAJ7 = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($resultAJ7)) {
    if ($placeId == $row['id']){
      echo json_encode($row);
    }
  }
?>
