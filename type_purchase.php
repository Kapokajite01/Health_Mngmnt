<?php
//error_reporting(0);
    session_start();
    $role = $_SESSION['sess_userrole'];
    if((!$_SESSION['sess_username']) or ($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro') or ($role!="Pharmacist")){
      header('Location: logout');
	}
include_once('connect_db.php');
if(isset($_POST['submit'])){


$update = $_POST['update'];
if($update == 'NewPurchase'){
	$update = "UPDATE prodicts SET Noumber=0 ";
$updatereq = mysqli_query($conn,$update);
	

IF($updatereq){
echo "<script>alert('New Purchase Set')</script>";
echo "<script>window.location='Purchasemedicine';</script>";
}
}
else{
	echo "<script>window.location='Purchasemedicine';</script>";

	
	
}
}
?>
<!DOCTYPE html>

<html lang="en">
<head>
		<meta char-set="utf-8" http-equiv="content-type" content="text/html;">
	<title>Medical Records</title>
	
	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="js/date_pic/date_input.css">
        <link rel="stylesheet" href="lib/auto/css/jquery.autocomplete.css">
	
	<!-- Optimize for mobile devices -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	
	<!-- jQuery & JS files -->
		<link rel="stylesheet" href="css/cmxform.css">
	<script src="js/lib/jquery.min.js" type="text/javascript"></script>
	<script src="js/lib/jquery.hotkeys-0.7.9.min.js" type="text/javascript"></script>
	<script src="js/lib/jquery.validate.min.js" type="text/javascript"></script>

	<script src="js/script.js"></script>  
        <script src="js/date_pic/jquery.date_input.js"></script>  
        <script src="lib/auto/js/jquery.autocomplete.js "></script>  
	 
       
<title><?php echo $user;?> -Pharmacy Sys</title>
<link rel="stylesheet" type="text/css" href="style/mystyle.css">
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" /> 
<link rel="stylesheet" href="style/table.css" type="text/css" media="screen" /> 
<script src="js/function.js" type="text/javascript"></script>
<style>#left-column {height: 477px;}
 #main {height: 477px;}</style>
</head>
<body>
	<!-- TOP BAR -->
	<!-- TOP BAR -->
		<?php include_once('menupp22.php')?>
	
	<!-- MAIN CONTENT -->
		
		<div class="page-full-width cf">

		<ul id="tabs" class="fl">
				<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
				<li><a href="" class=" stock-tab" >Manager Dashbord</a></li>
				<li><a href="" class="active-tab dashboard-tab">Manage Medicine</a></li>
		</ul> <!-- end tabs -->
		<div class="content-module">				

						<div class="content-module-main cf">


</div>
<div class="side-menu fl">
				
				<h3>Quick Links</h3>
				<ul>
					<li><a href="Purchasemedicine">Existing</a></li>
					<li><a href="purchaseconsumable">New  Stock Consumable</a></li>
				</ul>
                                
                                 
			</div> <!-- end side-menu -->
			<div class="content-module-main cf">
		<ul id="tabs" class="fl">
    <h1 align="center">Stock Medicine</h1> 
<hr/>	
      

          
        <div id="content_1" class="content">  
		 <?php 

  $query = "SELECT * from prodicts WHERE Noumber !='1' order by product_name ";

?>			<form  action="" method="POST" >

<div align="center"><br><br><br>

		    <select class="box" name="update" >
      <option "">--Select Purchase----</option>
      <option value = 'Exisiting'>Exisiting</option>
      <option value='NewPurchase'>New Purchase</option>

    </select><br><br><br>
	<input name="submit" type="submit" value="Submit" id="submit"/><br>
</div>
		</form>             
  	
        
<style>
.box {
      width:80%;
      height: 30px;
      border: 1px solid #999;
      font-size: 18px;
      color: #1c87c9;
      background-color: #eee;
      border-radius: 5px;
      box-shadow: 4px 4px #ccc;
      }
</style>


</style>
		
		</body>
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




    if (x==null || x=="" || x==0) {
        alert("PLEASE FILL IN QUANTITY FOR MEDICINE1");
        return false;
	}
	     
    if(xmed2 != ""){
         var xqmed2 = document.forms["selectform"]["qmed2"].value;
    if (xqmed2==null || xqmed2==""|| xqmed2==0) {
        alert("PLEASE FILL IN QUANTITY FOR MEDICINE2");
        return false;
    }
	}
	if(xmed3 != ""){
         var xqmed3 = document.forms["selectform"]["qmed3"].value;
    if (xqmed3==null || xqmed3==""||xqmed2==0) {
        alert("PLEASE FILL IN QUANTITY FOR MEDICINE3");
        return false;
    }
	}
	if(xmed4 != ""){
         var xqmed4 = document.forms["selectform"]["qmed4"].value;
    if (xqmed4==null || xqmed4==""||xqmed4==0) {
        alert("PLEASE FILL IN QUANTITY FOR MEDICINE4");
        return false;
    }
	}
	if(xmed5 != ""){
         var xqmed5 = document.forms["selectform"]["qmed5"].value;
    if (xqmed5==null || xqmed5==""||xqmed5==0) {
        alert("PLEASE FILL IN QUANTITY FOR MEDICINE5");
        return false;
    }
	}
	
	if(xmed6 != ""){
         var xqmed6 = document.forms["selectform"]["qmed6"].value;
    if (xqmed6==null || xqmed6=="" ||xqmed6==0) {
        alert("PLEASE FILL IN QUANTITY FOR MEDICINE6");
        return false;
    }
	}
	
	if(xmed7 != ""){
         var xqmed7 = document.forms["selectform"]["qmed7"].value;
    if (xqmed7==null || xqmed7=="" ||xqmed7==0) {
        alert("PLEASE FILL IN QUANTITY FOR MEDICINE7");
        return false;
    }
	}
  window.close(); 
     
}


</script>

    <script src="js/jquery.min.js"></script>
    <script>
      function insertResults(json){
        $("#up1").val(json["unit_price"]);
		$("#mmed1").val(json["product_name"]);
		$("#nid1").val(json["id"]);
		$("#avel1").val(json["remain"]);

      }

      function clearForm(){
        $("#up1,#mmed1,#nid1,#avel1").val("");
      }

      function makeAjaxRequest(placeId){
        $.ajax({
          type: "POST",
          data: { placeId: placeId },
          dataType: "json", 
          url: "process_ajax.php",
          success: function(json) {
            insertResults(json);
          }
        });
      }
	function setFocusToTextBoxmed1(){
		document.getElementById("qmed1").focus();
		}
      $("#med1").on("change", function(){
        var id = $(this).val();
        if (id === "0"){
          clearForm();
} else {
          makeAjaxRequest(id);
		setFocusToTextBoxmed1();
		document.getElementById('qmed1').value = '';
		document.getElementById('totmed1').value = '';


        }
      });
	function summed1() {
	  var FirstNumberValue = parseInt(document.getElementById('qmed1').value);
      var SecondNumberValue = parseInt(document.getElementById('avel1').value);
      var txtFirstNumberValue = document.getElementById('qmed1').value;
      var txtSecondNumberValue = document.getElementById('avel1').value;
      var result = parseFloat(txtFirstNumberValue) + parseFloat(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('totmed1').value = result;
      }
	  /*if (FirstNumberValue > SecondNumberValue) {
         document.getElementById('med1').value = '';
		 document.getElementById('qmed1').value = '';
		 document.getElementById('totmed1').value = '';


      }*/
}
 function getSector(val) {
	$.ajax({
	type: "POST",
	url: "updatstatus.php",
	data:'update='+val,
	success: function(data){

	}
	});
} 
	
</script>
</html>
