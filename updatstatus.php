<?php
require_once ("dbcontroller.php");
$db_handle = new DBController();
if (($_POST["update"])) {
    $myupdate = "UPDATE prodicts SET Noumber =0";
    $resultssector = $db_handle->runQuery($myupdate);

}
?>