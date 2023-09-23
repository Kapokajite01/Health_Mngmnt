<?php
require_once ("dbcontroller.php");
$db_handle = new DBController();
if (! empty($_POST["disrict_id1"])) {
    $query = "SELECT * FROM district WHERE prov_id = '" . $_POST["disrict_id1"] . "'";
    $results = $db_handle->runQuery($query);
    ?>
<option value disabled selected>Select District</option>
<?php
    foreach ($results as $district) {
        ?>
<option value="<?php echo $district["district_id"]; ?>"><?php echo $district["name"]; ?></option>
<?php
    }
}
?>