<?php
error_reporting(0);
if (isset($_POST['bigbutton'])) {
include_once('connect_db.php');
    $gender = addslashes($_POST["gender"]);
    $dob = $_POST["dob"];
    $province = addslashes($_POST["province"]);
    $district = addslashes($_POST["district"]);
    $sector = addslashes($_POST["sector"]);
    $cell = addslashes($_POST["cell"]);
    $village = addslashes($_POST["village"]);
    $afirstn = $_POST["afname"];
    $affectation = addslashes($_POST["affectation"]);
	$number= $_POST['p_id'];
 $sql="update patient set gender = '$gender', dob = '$dob',province='$province',district='$district',
 sector='$sector',cell='$cell',village='$village', affiliate_names='$afirstn',affectation='$affectation'
 where id='$number'";
($sql);
    header("Location:cashier.php");

}
?>