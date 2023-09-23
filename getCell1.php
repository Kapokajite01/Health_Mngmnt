<?php
require_once ("dbcontroller.php");
$db_handle = new DBController();
if (! empty($_POST["cell_id1"])) {
    $querycell = "SELECT * FROM cells WHERE sector_id = '" . $_POST["cell_id1"] . "' order by cell_name asc";
    $resultscell = $db_handle->runQuery($querycell);
    ?>
<option value disabled selected>Select Cell</option>
<?php
    foreach ($resultscell as $cell) {
        ?>
<option value="<?php echo $cell["cell_id"]; ?>"><?php echo $cell["cell_name"]; ?></option>
<?php
    }
}
?>