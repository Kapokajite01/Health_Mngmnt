
<!D<?php
error_reporting(0);
session_start();
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!($_SESSION['sess_username']) or ($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro') or $role!="Manager"){
      header('Location: logout');
	}
include_once('connect_db.php');
?>OCTYPE html>

<html lang="en">
<head>
		<meta char-set="utf-8" http-equiv="content-type" content="text/html;">
	<title>Medical Records</title>
	
	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/style.css">
        
	<?php
error_reporting(0);
session_start();
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!($_SESSION['sess_username']) or ($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro') or $role!="Manager"){
      header('Location: logout');
	}
$id=$_GET[consid];

$query1=("select id,examenmedicale,upexamen,qtyexamen,datecunsuption from consomation where consid='$id'");
$resultselect= mysqli_query($conn, $query1);
     while($query2 = mysqli_fetch_assoc( $resultselect )) { 
	 	 $testid = $query2['id'];
	 $datetest = $query2['datecunsuption'];
	 $testname = $query2['examenmedicale'];
	 $upritest = $query2['upexamen'];
	 $quantitytest = $query2['qtyexamen'];
	 }

?>
       

</head>
<body>
	<!-- TOP BAR -->
	<!-- TOP BAR -->
	<?php include_once("tpl/top_bar1.php"); 
		 include_once("tpl/top_bar.php"); 

	?>
	
	<!-- MAIN CONTENT -->
	
		<div class="page-full-width cf">
<form method="post" action="">
<table class='blueTable'><tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><input type="text" size="50" name="consid"value="<?php echo $id; ?>" required="required" style="display:none"></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></tr>
<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><input type="text" name="id"value="<?php echo $testid ; ?>" required="required" style="display:none"></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></tr>
<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><input type="text" name="date"value="<?php echo $datetest; ?>" required="required" style="display:none"></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></tr>
<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><strong>Test </strong></td><td><input type="text" size="50" name="prodname"value="<?php echo $testname; ?>" ></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></tr>
<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><strong>Unit Price</strong></td><td><input type="text" name="pcost" value="<?php echo $upritest ; ?>" ></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></tr>
<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><strong>Quantity</strong></td><td><input type="text" name="qty" value="<?php echo $quantitytest; ?>" ></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></tr>
<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><input type="submit" name="update" value="Update"></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></tr></table>
</form>
</div>
		
		
		</div>   
					</div> <!-- end content-module-main -->
							
				
				</div> <!-- end content-module -->
				
				
		
		</div></div> <!-- end full-width -->
			
	</div> <!-- end content -->
	
<!-- FOOTER -->
	<div id="footer">
<br><br><br><br><br><br><br><br><br><br>
		<p>Powed By Vision Soft Ltd .</p>
	</div> <!-- end footer -->
</body>
<?php

if(isset($_POST['update']))
{   $id=$_POST['consid'];
	$prodname= $_POST['prodname'];
	$pcost= $_POST['pcost'];
	$qty= $_POST['qty'];

$sql=mysqli_query($conn,"update consomation set examenmedicale = '$prodname', upexamen='$pcost',qtyexamen = '$qty' where consid='$id'");
//mysqli_query($conn, $sql);
$sql1=("INSERT INTO logs(id,name,lname,phone,action,time)
VALUES('','$name','$lname','$tel','Edited Lab Test',now())");
echo "<script>alert('Lab Test  Updated Successfully')</script>";
					    echo "<script>window.location='edit_medicine?patientnumber= $testid&tdat=$datetest';</script>";

}
?>
<style>
input#bigbutton {
width:500px;
background: #3e9cbf; /*the colour of the button*/
padding: 8px 14px 10px; /*apply some padding inside the button*/
border:1px solid #3e9cbf; /*required or the default border for the browser will appear*/
cursor:pointer; /*forces the cursor to change to a hand when the button is hovered*/
/*style the text*/
font-size:1.5em;
font-family:Oswald, sans-serif; /*Oswald is available from http://www.google.com/webfonts/specimen/Oswald*/
letter-spacing:.1em;
text-shadow: 0 -1px 0px rgba(0, 0, 0, 0.3); /*give the text a shadow - doesn't appear in Opera 12.02 or earlier*/
color: #fff;
/*use box-shadow to give the button some depth - see cssdemos.tupence.co.uk/box-shadow.htm#demo7 for more info on this technique*/
-webkit-box-shadow: inset 0px 1px 0px #3e9cbf, 0px 5px 0px 0px #205c73, 0px 10px 5px #999;
-moz-box-shadow: inset 0px 1px 0px #3e9cbf, 0px 5px 0px 0px #205c73, 0px 10px 5px #999;
box-shadow: inset 0px 1px 0px #3e9cbf, 0px 5px 0px 0px #205c73, 0px 10px 5px #999;
/*give the corners a small curve*/
-moz-border-radius: 10px;
-webkit-border-radius: 10px;
border-radius: 10px;
}
body {font-family: Arial;}

/* Style the tab */
.tab {
  overflow: hidden;
  border: 0px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 10px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 0px solid #ccc;
  border-top: none;
}
.verticalLine {
  border-left: thick solid #ff0000;
}


table.blueTable {
  border: 0px solid #1C6EA4;
  background-color: #EEEEEE;
  width: 40%;
  text-align: left;
  border-collapse: collapse;
  margin: 0 auto;
}
table.blueTable td, table.blueTable th {
  border: 0px solid #AAAAAA;
  padding: 3px 2px;
}
table.blueTable tbody td {
  font-size: 13px;
}
table.blueTable tr:nth-child(even) {
  background: #D0E4F5;
}
table.blueTable thead {
  background: #1C6EA4;
  background: -moz-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
  background: -webkit-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
  background: linear-gradient(to bottom, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
  border-bottom: 2px solid #444444;
}
table.blueTable thead th {
  font-size: 15px;
  font-weight: bold;
  color: #FFFFFF;
  border-left: 2px solid #D0E4F5;
}
table.blueTable thead th:first-child {
  border-left: none;
}

table.blueTable tfoot {
  font-size: 14px;
  font-weight: bold;
  color: #FFFFFF;
  background: #D0E4F5;
  background: -moz-linear-gradient(top, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
  background: -webkit-linear-gradient(top, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
  background: linear-gradient(to bottom, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
  border-top: 2px solid #444444;
}
table.blueTable tfoot td {
  font-size: 14px;
}
table.blueTable tfoot .links {
  text-align: right;
}
table.blueTable tfoot .links a{
  display: inline-block;
  background: #1C6EA4;
  color: #FFFFFF;
  padding: 2px 8px;
  border-radius: 5px;
}
</style>
<SCRIPT LANGUAGE="JavaScript">
<!-- Begin
function validate(field) {
var valid = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"
var ok = "yes";
var temp;
for (var i=0; i<field.value.length; i++) {
temp = "" + field.value.substring(i, i+1);
if (valid.indexOf(temp) == "-1") ok = "no";
}
if (ok == "no") {
alert("N'utilisez pas les carateres speciaux");
field.value='';
field.focus();
field.select();
   }
}
//  End -->
</script>
<SCRIPT LANGUAGE="JavaScript">
<!-- Begin
function validate(field) {
var valid = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"
var ok = "yes";
var temp;
for (var i=0; i<field.value.length; i++) {
temp = "" + field.value.substring(i, i+1);
if (valid.indexOf(temp) == "-1") ok = "no";
}
if (ok == "no") {
alert("N'utilisez pas les carateres speciaux");
field.value='';
field.focus();
field.select();
   }
}
//  End -->
</script>
</html>


