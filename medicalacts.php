<html>
<script>
    window.onunload = refreshParent;
    function refreshParent() {
        window.opener.location.reload();
	}
</script>
<?php
if(isset($_POST['bigbutton']))
{
?>
<script>
    window.onunload = refreshParent;
    function refreshParent() {
        window.opener.location.reload();
	}
</script>
<script type='text/javascript'>
         self.close();
    </script>

<?php	
}

?>
<style>
input#bigbutton {
width:250px;
background: ; /*the colour of the button*/
padding: 8px 14px 10px; /*apply some padding inside the button*/
border:1px solid #3e9cbf; /*required or the default border for the browser will appear*/
cursor:pointer; /*forces the cursor to change to a hand when the button is hovered*/
/*style the text*/
font-size:1.5em;
font-family:Oswald, sans-serif; /*Oswald is available from http://www.google.com/webfonts/specimen/Oswald*/
letter-spacing:.1em;
text-shadow: 0 -1px 0px rgba(0, 0, 0, 0.3); /*give the text a shadow - doesn't appear in Opera 12.02 or earlier*/
color: red;
/*use box-shadow to give the button some depth - see cssdemos.tupence.co.uk/box-shadow.htm#demo7 for more info on this technique*/
-webkit-box-shadow: inset 0px 1px 0px #3e9cbf, 0px 5px 0px 0px #205c73, 0px 10px 5px #999;
-moz-box-shadow: inset 0px 1px 0px #3e9cbf, 0px 5px 0px 0px #205c73, 0px 10px 5px #999;
box-shadow: inset 0px 1px 0px #3e9cbf, 0px 5px 0px 0px #205c73, 0px 10px 5px #999;
/*give the corners a small curve*/
-moz-border-radius: 10px;
-webkit-border-radius: 10px;
border-radius: 10px;
}
/***SET THE BUTTON'S HOVER AND FOCUS STATES***/
input#bigbutton:hover, input#bigbutton:focus {
color:maroon;
/*reduce the size of the shadow to give a pushed effect*/
-webkit-box-shadow: inset 0px 1px 0px #3e9cbf, 0px 2px 0px 0px #205c73, 0px 2px 5px #999;
-moz-box-shadow: inset 0px 1px 0px #3e9cbf, 0px 2px 0px 0px #205c73, 0px 2px 5px #999;
box-shadow: inset 0px 1px 0px #3e9cbf, 0px 2px 0px 0px #205c73, 0px 2px 5px #999;
}

</style>
<?php
session_start();
include_once('connect_db.php');
$Insurance =  $_SESSION['insurance'];
if($Insurance == 'MUTUELLE')
{
  $query = "SELECT * from actes where Insurer = 'MUTUELLE' OR Insurer = 'ALL' OR Insurer = ''   order by name_acte";
}
if($Insurance == 'RAMA/RSSB')
{
  $query = "SELECT * from actes where Insurer = 'RAMA/RSSB' OR Insurer = 'ALL' OR Insurer = ''   order by name_acte";
}
if($Insurance == 'MMI')
{
  $query = "SELECT * from actes where insurer = 'RAMA/RSSB'  order by name_acte";
}
if($Insurance == 'MEDIPLA')
{
  $query = "SELECT * from actes where insurer = 'MEDIPLA' or insurer = 'RADIANT'   order by name_acte";
}
if($Insurance == 'NO INSURANCE')
{
  $query = "SELECT * from actes where insurer = 'NO INSURANCE' order by name_acte";
}
$patient_id =  $_SESSION['sess_name'];
$mydate  = $_SESSION['mydate'];

$tempmedacte = ("select * from temp_actemed WHERE patient_id  = '$patient_id' AND date = '$mydate' ");
$temmedact= mysqli_query($conn, $tempmedacte);
?>

<link rel="stylesheet" href="css/style.css">
<style>
.custom-Patient_ID {
position: relative;
display: inline-block;
}
.custom-Patient_ID-toggle {
position: absolute;
top: 0;
bottom: 0;
margin-left: -1px;
padding: 0;
/* support: IE7 */
*height: 1.7em;
*top: 0.1em;
}
.custom-Patient_ID-input {
margin: 0;
padding: 0.3em;
}
fieldset {
	border:1px solid #999;
	border-radius:8px;
	box-shadow:0 0 10px #999;
	margin: 0 20%;
}
legend {
	background:#fff;
}
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
	
</head>
<body>

	<!-- TOP BAR -->
	<!-- TOP BAR -->
	<?php
	include_once('mymenus.php');

	?>	
	
	<!-- MAIN CONTENT -->
	<div id="content">
		
		<div class="page-full-width cf">

			 <!-- end side-menu -->
			
			<div class="side-content fr">
			
				<div class="content-module">
				
					 <!-- end content-module-heading -->
					
						<div class="content-module-main cf">
				

				
<form method="post" action=" add_act" name="selectform">
    <table  width="20%">
	<tr><th><strong>Consumption Name</strong><input type="text" name="patientid" value="<?php echo $patient_id;?>"  required  style="display:none"> <input type="text" name="mydate" value="<?php echo $mydate;?>" style="display:none" required></th><th><strong>UP</strong></th><th><strong>QTY</strong></th><th><strong>Total</strong></th><th><strong>Add</strong></th></tr>	
	<tr ><td width="10%"><select name="act1" id="act1"  style=" width:200px; height: 25px ">
      <option value="0">No Selection</option>
      <?php
 
 $acts = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($acts)) {
            echo '<option value="' . $row['id'] . '">' . $row['name_acte'] . '</option>';
        }
      ?>
    </select><input name="aact1" id="aact1" style="display:none" required/></td><td width="4%"><input name="upacte1" id="upacte1" style=" width:80px; height: 25px;"   onkeyup="sumAct1()" readonly required/>
	</td><td width="7%"><input type="number" id="qacte1" name="qacte1" style=" width:80px; height: 25px" autofocus onkeyup="sumAct1()"required/></td>
    <td width="7%"> <input type="text" id="totacte1" name="totacte1"style=" width:80px; height: 25px"/></td>
    <td width="7%"> <input type="submit" name="gotoadd" value=" + ADD NEW"></td></tr>

</table>
      
</form>
       
 </div>
 </div>
 

</div></div></div>
				<div id="content">
		
		<div class="page-full-width cf">

			 <!-- end side-menu -->
			
			<div class="side-content fr">
			<br>
 <fieldset style="background:#e1eff2;width: 40%;margin: 0 auto;">
<?PHP

	if ($temmedact->num_rows > 0) {
		?>
<table width="10%">
<tr><th>No</th><th>Medical Act</th><th>Quantity</th><th>Price</th><th>Total</th><th>Action</th><tr>
  <?php

while ($rowmedact= mysqli_fetch_assoc($temmedact)) {
	++$i;
	$rowcons = $rowmedact['tempact_Id'];
	$totalmediact = $rowmedact['quantity']*$rowmedact['price'];
	?>
	<tr>
	<td><?php echo $i;?></td>
	<td><?php echo $rowmedact['acte_description'];?></td>
	<td><?php echo number_format($rowmedact['quantity']);?></td>
	<td><?php echo number_format($rowmedact['price']);?></td>
	<td><?php echo number_format($totalmediact);?></td>
	<td><font color="red"> <input type='button' style="background-color: #f44336;"value='DELETE' onclick="window.open('removeactemed?affideleTE=<?php echo urlencode($patient_id); ?>&rowid=<?php echo urlencode($rowcons); ?>','popup', 'width=700, height=300, statusbar=0, location=0, menubar=0, toolbar=0,left=350,top=350')"/></font></td>

	<?php
	$grandtotalmediact =  $grandtotalmediact+$totalmediact;
	echo '</tr>';
	}

?>
<tr><td colspan="3"><strong>Total</strong></td><td><strong><?php echo number_format($grandtotalmediact);?></strong></td></tr>  
</table>
<?php
	}
	else{
		echo "<span> <font color='Red'> No Medical Act </font></span>";
		
	}
?>
  </fieldset> <form method="post" action="" name="selectform">
  <table width="10%" style="margin-left: 25%;">
<tr><td></td><td>

<input name="bigbutton" id="bigbutton" type="submit" value=" X Close X" />


</td><td></td></tr>
</table>
</form>

</body>

         <SCRIPT LANGUAGE="JavaScript">
<!-- Begin
function sendValues(s,x,y,s2,x2,y2,s3,x3,y3,s4,x4,y4,s5,x5,y5,s6,x6,y6,s7,x7,y7){
var selvalue = s.value;
var xvalue =x.value;
var yvalue =y.value;

var selvalue2 = s2.value;
var xvalue2 =x2.value;
var yvalue2 =y2.value;

var selvalue3 = s3.value;
var xvalue3 =x3.value;
var yvalue3 =y3.value;

var selvalue4 = s4.value;
var xvalue4 =x4.value;
var yvalue4 =y4.value;

var selvalue5 = s5.value;
var xvalue5 =x5.value;
var yvalue5 =y5.value;

var selvalue6 = s6.value;
var xvalue6 =x6.value;
var yvalue6 =y6.value;

var selvalue7 = s7.value;
var xvalue7 =x7.value;
var yvalue7 =y7.value;

window.opener.document.getElementById('aact1').value = selvalue;
window.opener.document.getElementById('upacte1').value = xvalue;
window.opener.document.getElementById('vaact1').innerHTML = selvalue;
window.opener.document.getElementById('vqacte1').innerHTML = yvalue;
window.opener.document.getElementById('qacte1').value = yvalue;

window.opener.document.getElementById('aact2').value = selvalue2;
window.opener.document.getElementById('upacte2').value = xvalue2;
window.opener.document.getElementById('vaact2').innerHTML = selvalue2;
window.opener.document.getElementById('vqacte2').innerHTML = yvalue2;
window.opener.document.getElementById('qacte2').value = yvalue2;

window.opener.document.getElementById('aact3').value = selvalue3;
window.opener.document.getElementById('upacte3').value = xvalue3;
window.opener.document.getElementById('vaact3').innerHTML = selvalue3;
window.opener.document.getElementById('vqacte3').innerHTML = yvalue3;
window.opener.document.getElementById('qacte3').value = yvalue3;

window.opener.document.getElementById('aact4').value = selvalue4;
window.opener.document.getElementById('upacte4').value = xvalue4;
window.opener.document.getElementById('vaact4').innerHTML = selvalue4;
window.opener.document.getElementById('vqacte4').innerHTML = yvalue4;
window.opener.document.getElementById('qacte4').value = yvalue4;

window.opener.document.getElementById('aact5').value = selvalue5;
window.opener.document.getElementById('upacte5').value = xvalue5;
window.opener.document.getElementById('vaact5').innerHTML = selvalue5;
window.opener.document.getElementById('vqacte5').innerHTML = yvalue5;
window.opener.document.getElementById('qacte5').value = yvalue5;

window.opener.document.getElementById('aact6').value = selvalue6;
window.opener.document.getElementById('upacte6').value = xvalue6;
window.opener.document.getElementById('vaact6').innerHTML = selvalue6;
window.opener.document.getElementById('vqacte6').innerHTML = yvalue6;
window.opener.document.getElementById('qacte6').value = yvalue6;

window.opener.document.getElementById('aact7').value = selvalue7;
window.opener.document.getElementById('upacte7').value = xvalue7;
window.opener.document.getElementById('vaact7').innerHTML = selvalue7;
window.opener.document.getElementById('vqacte7').innerHTML = yvalue7;
window.opener.document.getElementById('qacte7').value = yvalue7;

var xact2= document.forms["selectform"]["aact2"].value;
var xact3= document.forms["selectform"]["aact3"].value;
var xact4= document.forms["selectform"]["aact4"].value;
var xact5= document.forms["selectform"]["aact5"].value;
var xact6= document.forms["selectform"]["aact6"].value;
var xact7= document.forms["selectform"]["aact7"].value;


         var x = document.forms["selectform"]["qacte1"].value;
    if (x==null || x==""|| x == 0) {
        alert("PLEASE FILL IN QUANTITY1");
        return false;
    }
	
	       var Px = document.forms["selectform"]["upacte1"].value;
    if (Px==null || Px==""|| Px == 0) {
        alert("PLEASE FILL IN PRICE");
        return false;
    }
	
	if( xact2 != ""){
         var xqact2 = document.forms["selectform"]["qacte2"].value;
    if (xqact2==null || xqact2=="" || xqact2 == 0) {
        alert("PLEASE FILL IN QUANTITY FOR MEDICAL ACT2");
        return false;
    }
	  var Px2 = document.forms["selectform"]["upacte2"].value;
    if (Px2==null || Px2==""|| Px2 == 0) {
        alert("PLEASE FILL IN PRICE2 ON LINE 2");
        return false;
    }
	}
	if( xact3 != ""){
         var xqact3 = document.forms["selectform"]["qacte3"].value;
    if (xqact3==null || xqact3==""|| xqact3==0) {
        alert("PLEASE FILL IN QUANTITY FOR MEDICAL ACT3");
        return false;
    }
	var Px3 = document.forms["selectform"]["upacte3"].value;
    if (Px3==null || Px3==""|| Px3 == 0) {
        alert("PLEASE FILL IN PRICE3 ON LINE 3");
        return false;
    }
	}
	
	if( xact4 != ""){
         var xqact4 = document.forms["selectform"]["qacte4"].value;
    if (xqact4==null || xqact4=="" || xqact4 == 0) {
        alert("PLEASE FILL IN QUANTITY FOR MEDICAL ACT4");
        return false;
    }
	var Px4 = document.forms["selectform"]["upacte4"].value;
    if (Px4==null || Px4==""|| Px4 == 0) {
        alert("PLEASE FILL IN PRICE4 ON LINE 4");
        return false;
    }
	}
	
	if( xact5 != ""){
         var xqact5 = document.forms["selectform"]["qacte5"].value;
    if (xqact5==null || xqact5=="" || xqact5 == 0) {
        alert("PLEASE FILL IN QUANTITY FOR MEDICAL ACT5");
        return false;
    }
	
	var Px5 = document.forms["selectform"]["upacte5"].value;
    if (Px5==null || Px5==""|| Px5 == 0) {
        alert("PLEASE FILL IN PRICE5 ON LINE 5");
        return false;
    }
	}
	if( xact6 != ""){
         var xqact6 = document.forms["selectform"]["qacte6"].value;
    if (xqact6==null || xqact6==""|| xqact6 == 0 ) {
        alert("PLEASE FILL IN QUANTITY FOR MEDICAL ACT6");
        return false;
    }
	var Px6 = document.forms["selectform"]["upacte6"].value;
    if (Px6==null || Px6==""|| Px6 == 0) {
        alert("PLEASE FILL IN PRICE6 ON LINE 6");
        return false;
    }
	}
	if( xact7 != ""){
         var xqact7 = document.forms["selectform"]["qacte7"].value;
    if (xqact7==null || xqact7==""  || xqact7 == 0) {
        alert("PLEASE FILL IN QUANTITY FOR MEDICAL ACT7");
        return false;
    }
	var Px7 = document.forms["selectform"]["upacte7"].value;
    if (Px7==null || Px7==""|| Px7 == 0) {
        alert("PLEASE FILL IN PRICE7 ON LINE 7");
        return false;
    }
	}
    window.close();    
}

</script> 
    <script src="js/jquery.min.js"></script>
    <script>
       <!-- Acte1-->
	   function insertResultsact1(json){
        $("#upacte1").val(json["unit_price"]);
		$("#aact1").val(json["name_acte"]);


      }

      function clearFormact1(){
        $("#upacte1,#aact1").val("");
      }

      function makeAjaxRequestact1(placeId){
        $.ajax({
          type: "POST",
          data: { placeId: placeId },
          dataType: "json", 
          url: "process_ajax3.php",
          success: function(json) {
            insertResultsact1(json);
          }
        });
      }
function setFocusToTextBoxact1(){
		document.getElementById("qacte1").focus();
		}
      $("#act1").on("change", function(){
        var id = $(this).val();
        if (id === "0"){
          clearFormact1();
} else {
          makeAjaxRequestact1(id);
		  setFocusToTextBoxact1();
			document.getElementById('qacte1').value = '';
		document.getElementById('totacte1').value = '';
        }
      });
	  	  function sumAct1() {
      var txtFirstNumberValue = document.getElementById('upacte1').value;
      var txtSecondNumberValue = document.getElementById('qacte1').value;
      var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('totacte1').value = result;
      }
}
      <!-- Acte2-->
	   function insertResultsact2(json){
        $("#upacte2").val(json["unit_price"]);
		$("#aact2").val(json["name_acte"]);

      }

      function clearFormact2(){
        $("#upacte2,#aact2").val("");
      }
   function setFocusToTextBoxact2(){
		document.getElementById("qacte2").focus();
		}
      function makeAjaxRequestact2(placeId){
        $.ajax({
          type: "POST",
          data: { placeId: placeId },
          dataType: "json", 
          url: "process_ajax3.php",
          success: function(json) {
            insertResultsact2(json);
          }
        });
      }

      $("#act2").on("change", function(){
        var id = $(this).val();
        if (id === "0"){
          clearFormact2();
} else {
          makeAjaxRequestact2(id);
		  setFocusToTextBoxact2();
			document.getElementById('qacte2').value = '';
		document.getElementById('totacte2').value = '';
        }
      });
	  	  function sumAct2() {
      var txtFirstNumberValue = document.getElementById('upacte2').value;
      var txtSecondNumberValue = document.getElementById('qacte2').value;
      var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('totacte2').value = result;
      }
}
      <!-- Acte3-->
	   function insertResultsact3(json){
        $("#upacte3").val(json["unit_price"]);
		$("#aact3").val(json["name_acte"]);

      }

      function clearFormact3(){
        $("#upacte3,#aact3").val("");
      }
  function setFocusToTextBoxact3(){
		document.getElementById("qacte3").focus();
		}
      function makeAjaxRequestact3(placeId){
        $.ajax({
          type: "POST",
          data: { placeId: placeId },
          dataType: "json", 
          url: "process_ajax3.php",
          success: function(json) {
            insertResultsact3(json);
          }
        });
      }

      $("#act3").on("change", function(){
        var id = $(this).val();
        if (id === "0"){
          clearFormact3();
} else {
          makeAjaxRequestact3(id);
		  setFocusToTextBoxact3();
			document.getElementById('qacte3').value = '';
		document.getElementById('totacte3').value = '';
        }
      });
	  	  function sumAct3() {
      var txtFirstNumberValue = document.getElementById('upacte3').value;
      var txtSecondNumberValue = document.getElementById('qacte3').value;
      var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('totacte3').value = result;
      }
}
      <!-- Acte4-->
	   function insertResultsact4(json){
        $("#upacte4").val(json["unit_price"]);
		$("#aact4").val(json["name_acte"]);

      }

      function clearFormact4(){
        $("#upacte4,#aact4").val("");
      }
 function setFocusToTextBoxact4(){
		document.getElementById("qacte4").focus();
		}
      function makeAjaxRequestact4(placeId){
        $.ajax({
          type: "POST",
          data: { placeId: placeId },
          dataType: "json", 
          url: "process_ajax3.php",
          success: function(json) {
            insertResultsact4(json);
          }
        });
      }

      $("#act4").on("change", function(){
        var id = $(this).val();
        if (id === "0"){
          clearFormact4();
} else {
          makeAjaxRequestact4(id);
		  setFocusToTextBoxact4();
			document.getElementById('qacte4').value = '';
		document.getElementById('totacte4').value = '';
        }
      });
  	  function sumAct4() {
      var txtFirstNumberValue = document.getElementById('upacte4').value;
      var txtSecondNumberValue = document.getElementById('qacte4').value;
      var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('totacte4').value = result;
      }
}
      <!-- Acte5-->
	   function insertResultsact5(json){
        $("#upacte5").val(json["unit_price"]);
		$("#aact5").val(json["name_acte"]);

      }

      function clearFormact5(){
        $("#upacte5,#aact5").val("");
      }
 function setFocusToTextBoxact5(){
		document.getElementById("qacte5").focus();
		}
      function makeAjaxRequestact5(placeId){
        $.ajax({
          type: "POST",
          data: { placeId: placeId },
          dataType: "json", 
          url: "process_ajax3.php",
          success: function(json) {
            insertResultsact5(json);
          }
        });
      }

      $("#act5").on("change", function(){
        var id = $(this).val();
        if (id === "0"){
          clearFormact5();
} else {
          makeAjaxRequestact5(id);
		  setFocusToTextBoxact5();
			document.getElementById('qacte5').value = '';
		document.getElementById('totacte5').value = '';
        }
      });
	  	  function sumAct5() {
      var txtFirstNumberValue = document.getElementById('upacte5').value;
      var txtSecondNumberValue = document.getElementById('qacte5').value;
      var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('totacte5').value = result;
      }
}
	  <!-- Acte6-->
	   function insertResultsact6(json){
        $("#upacte6").val(json["unit_price"]);
		$("#aact6").val(json["name_acte"]);


      }

      function clearFormact6(){
        $("#upacte6,#aact6").val("");
      }
function setFocusToTextBoxact6(){
		document.getElementById("qacte6").focus();
		}
      function makeAjaxRequestact6(placeId){
        $.ajax({
          type: "POST",
          data: { placeId: placeId },
          dataType: "json", 
          url: "process_ajax3.php",
          success: function(json) {
            insertResultsact6(json);
          }
        });
      }

      $("#act6").on("change", function(){
        var id = $(this).val();
        if (id === "0"){
          clearFormact6();
} else {
          makeAjaxRequestact6(id);
		  setFocusToTextBoxact6();
			document.getElementById('qacte6').value = '';
		document.getElementById('totacte6').value = '';
        }
      });
	  	  function sumAct6() {
      var txtFirstNumberValue = document.getElementById('upacte6').value;
      var txtSecondNumberValue = document.getElementById('qacte6').value;
      var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('totacte6').value = result;
      }
}
	  <!-- Acte7-->
	   function insertResultsact7(json){
        $("#upacte7").val(json["unit_price"]);
		$("#aact7").val(json["name_acte"]);

      }

      function clearFormact7(){
        $("#upacte7,#aact7").val("");
      }
	function setFocusToTextBoxact7(){
		document.getElementById("qacte7").focus();
		}
      function makeAjaxRequestact7(placeId){
        $.ajax({
          type: "POST",
          data: { placeId: placeId },
          dataType: "json", 
          url: "process_ajax3.php",
          success: function(json) {
            insertResultsact7(json);
          }
        });
      }

      $("#act7").on("change", function(){
        var id = $(this).val();
        if (id === "0"){
          clearFormact7();
} else {
          makeAjaxRequestact7(id);
		  setFocusToTextBoxact7();
			document.getElementById('qacte7').value = '';
		document.getElementById('totacte7').value = '';
        }
      });
	  	  	  function sumAct7() {
      var txtFirstNumberValue = document.getElementById('upacte7').value;
      var txtSecondNumberValue = document.getElementById('qacte7').value;
      var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('totacte7').value = result;
      }
}
   </script>
      
<script language="javascript" type="text/javascript">

function showlineacte2() {
   document.getElementById('medicalact2').style.display = "block";
   document.getElementById('act2').style.display = "block";
   document.getElementById('upacte2').style.display = "block";
   document.getElementById('qacte2').style.display = "block";
   document.getElementById('totacte2').style.display = "block";
   document.getElementById('activeacte2').style.display = "block";
   document.getElementById('removeacte2').style.display = "block";
}
function showlineacte3() {
   document.getElementById('medicalact3').style.display = "block";
   document.getElementById('act3').style.display = "block";
   document.getElementById('upacte3').style.display = "block";
   document.getElementById('qacte3').style.display = "block";
   document.getElementById('totacte3').style.display = "block";
   document.getElementById('activeacte3').style.display = "block";
   document.getElementById('removeacte3').style.display = "block";
}
function showlineacte4() {
   document.getElementById('medicalact4').style.display = "block";
   document.getElementById('act4').style.display = "block";
   document.getElementById('upacte4').style.display = "block";
   document.getElementById('qacte4').style.display = "block";
   document.getElementById('totacte4').style.display = "block";
   document.getElementById('activeacte4').style.display = "block";
   document.getElementById('removeacte4').style.display = "block";
}
function showlineacte5() {
   document.getElementById('medicalact5').style.display = "block";
   document.getElementById('act5').style.display = "block";
   document.getElementById('upacte5').style.display = "block";
   document.getElementById('qacte5').style.display = "block";
   document.getElementById('totacte5').style.display = "block";
   document.getElementById('activeacte5').style.display = "block";
   document.getElementById('removeacte5').style.display = "block";
}
function showlineacte6() {
   document.getElementById('medicalact6').style.display = "block";
   document.getElementById('act6').style.display = "block";
   document.getElementById('upacte6').style.display = "block";
   document.getElementById('qacte6').style.display = "block";
   document.getElementById('totacte6').style.display = "block";
   document.getElementById('activeacte6').style.display = "block";
   document.getElementById('removeacte6').style.display = "block";
}
function showlineacte7() {
   document.getElementById('medicalact7').style.display = "block";
   document.getElementById('act7').style.display = "block";
   document.getElementById('upacte7').style.display = "block";
   document.getElementById('qacte7').style.display = "block";
   document.getElementById('totacte7').style.display = "block";
   document.getElementById('activeacte7').style.display = "block";
   document.getElementById('removeacte7').style.display = "block";
}
function hidelineacte1() {
   document.getElementById('medicalact1').style.display = "none";
   document.getElementById('act1').style.display = "none";
   document.getElementById('aact1').style.display = "none";
   document.getElementById('upacte1').style.display = "none";
   document.getElementById('qacte1').style.display = "none";
   document.getElementById('totacte1').style.display = "none";
   document.getElementById('activeacte1').style.display = "none";
   document.getElementById('removeacte1').style.display = "none";   
   document.getElementById('aact1').value = "";
   document.getElementById('upacte1').value = "";
   document.getElementById('qacte1').value = "";
   document.getElementById('totacte1').value = "";
}
function hidelineacte2() {
   document.getElementById('medicalact2').style.display = "none";
   document.getElementById('aact2').value = "";
   document.getElementById('act2').style.display = "none";
   document.getElementById('upacte2').style.display = "none";
   document.getElementById('qacte2').style.display = "none";
   document.getElementById('totacte2').style.display = "none";
   document.getElementById('activeacte2').style.display = "none";
   document.getElementById('removeacte2').style.display = "none";
   document.getElementById('act2').value = "";
   document.getElementById('upacte2').value = "";
   document.getElementById('qacte2').value = "";
   document.getElementById('totacte2').value = "";
}
function hidelineacte3() {
   document.getElementById('medicalact3').style.display = "none";
   document.getElementById('act3').style.display = "none";
   document.getElementById('aact3').style.display = "none";
   document.getElementById('upacte3').style.display = "none";
   document.getElementById('qacte3').style.display = "none";
   document.getElementById('totacte3').style.display = "none";
   document.getElementById('activeacte3').style.display = "none";
   document.getElementById('removeacte3').style.display = "none";
   document.getElementById('act3').value = "";
   document.getElementById('upacte3').value = "";
   document.getElementById('qacte3').value = "";
   document.getElementById('totacte3').value = "";
}
function hidelineacte4() {
   document.getElementById('medicalact4').style.display = "none";
   document.getElementById('aact4').style.display = "none";
   document.getElementById('upacte4').style.display = "none";
   document.getElementById('qacte4').style.display = "none";
   document.getElementById('totacte4').style.display = "none";
   document.getElementById('activeacte4').style.display = "none";
   document.getElementById('removeacte4').style.display = "none";
   document.getElementById('act4').value = "";
   document.getElementById('upacte4').value = "";
   document.getElementById('qacte4').value = "";
   document.getElementById('totacte4').value = "";
}
function hidelineacte5() {
   document.getElementById('medicalact5').style.display = "none";
   document.getElementById('act5').style.display = "none";
   document.getElementById('aact5').style.display = "none";
   document.getElementById('upacte5').style.display = "none";
   document.getElementById('qacte5').style.display = "none";
   document.getElementById('totacte5').style.display = "none";
   document.getElementById('activeacte5').style.display = "none";
   document.getElementById('removeacte5').style.display = "none";
    document.getElementById('act5').value = "";
   document.getElementById('upacte5').value = "";
   document.getElementById('qacte5').value = "";
   document.getElementById('totacte5').value = "";
}
function hidelineacte6() {
   document.getElementById('medicalact6').style.display = "none";
   document.getElementById('act6').style.display = "none";
   document.getElementById('aact6').style.display = "none"; 
 document.getElementById('upacte6').style.display = "none";
   document.getElementById('qacte6').style.display = "none";
   document.getElementById('totacte6').style.display = "none";
   document.getElementById('activeacte6').style.display = "none";
   document.getElementById('removeacte6').style.display = "none";
   document.getElementById('act6').value = "";
   document.getElementById('upacte6').value = "";
   document.getElementById('qacte6').value = "";
   document.getElementById('totacte6').value = "";
}
function hidelineacte7() {
   document.getElementById('medicalact7').style.display = "none";
   document.getElementById('aact7').style.display = "none";
   document.getElementById('act7').style.display = "none";
   document.getElementById('upacte7').style.display = "none";
   document.getElementById('qacte7').style.display = "none";
   document.getElementById('totacte7').style.display = "none";
   document.getElementById('activeacte7').style.display = "none";
   document.getElementById('removeacte7').style.display = "none";
   document.getElementById('act7').value = "";
   document.getElementById('upacte7').value = "";
   document.getElementById('qacte7').value = "";
   document.getElementById('totacte7').value = "";
}

</script>
</html>





