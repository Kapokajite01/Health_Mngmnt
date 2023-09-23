<?php
require_once ("dbcontroller.php");
$db_handle = new DBController();
if (! empty($_POST["sector_id"])) {
    $querysector = "SELECT * FROM sector WHERE district_id = '" . $_POST["sector_id"] . "' order by sector_name asc";
    $resultssector = $db_handle->runQuery($querysector);
    ?>
<option value="0"  disabled selected>Select Sector</option>
<?php
    foreach ($resultssector as $sector) {
        ?>
<option value="<?php echo $sector["sector_id"]; ?>"><?php echo $sector["sector_name"]; ?></option>
<?php
    }
}
?>