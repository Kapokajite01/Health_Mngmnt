<?php
// PDO connect *********
function connect() {
    return new PDO('mysql:host=localhost;dbname=dirskhpe_rangiro', 'root', 'fidele', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}

$pdo = connect();
$keyword = '%'.$_POST['keyword'].'%';
$sql = "SELECT distinct affiliate_number FROM patient WHERE affiliate_number LIKE (:keyword) ORDER BY id DESC LIMIT 150000";
$query = $pdo->prepare($sql);
$query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
$query->execute();
$list = $query->fetchAll();
foreach ($list as $rs) {
	// put in bold the written text
	$affiliate_number = str_replace($_POST['keyword'], '<b>'.$_POST['keyword'].'</b>', $rs['affiliate_number']);
	// add new option
    echo '<li onclick="set_item(\''.str_replace("'", "\'", $rs['affiliate_number']).'\')">'.$affiliate_number.'</li>';
}
?>