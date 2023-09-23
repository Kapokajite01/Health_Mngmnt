<html>
<script>
    window.onunload = refreshParent;
    function refreshParent() {
        window.opener.location.reload();
	}
</script>
<?php
session_start();

include_once('connect_db.php');

  $query = "SELECT * from consommables order by name_consommable";
$patient_id =  $_SESSION['sess_name'];
$mydate  = $_SESSION['mydate'];
$tempcons  = ("select * from temp_consommable WHERE patient_id  = '$patient_id' AND date = '$mydate' ");
$tempco = mysqli_query($conn, $tempcons);
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
				
					
						<div class="content-module-main cf"> 
<form name="selectform" action="add_consumable" method="POST">
    <table  width="20%" style="font-size:10px;">
	    <tr><th style="width:5%"><strong>Name</strong></th><th  style="display:none"><strong>Stock</strong></th><th  style=" width:2%"><strong>UP</strong></th><th   style=" width:2%"><strong>QTY</strong></th><th   style=" width:2%"><strong>Total</strong></th><th   style=" width:2%"><strong>Add</strong></th></tr>
	<tr ><td style="width:5%"><input type="text" name="patientid" value="<?php echo $patient_id;?>"  required  style="display:none"> <input type="text" name="mydate" value="<?php echo $mydate;?>" style="display:none" required><select name="cons1" id="cons1"    required>
      <option value="0">No Selection</option>
      <?php
 
 $conusmptions = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($conusmptions)) {
            echo '<option value="' . $row['id'] . '">' . $row['name_consommable'] . '</option>';
        }
      ?>
    </select><input name="ccons1" id="ccons1"  style="display:none"/> <input type="text" name="nidc1" id="nidc1" required style="display:none"/></td><td  style="display:none"><input type="text" name="avelc1" id="avelc1" style=" width:80px; height: 25px;" readonly required></td><td ><input name="upcons1" id="upcons1" style=" width:80px; height: 25px; " onkeyup="sumConsum1()" readonly  required/>
	</td><td><input type="number" id="qcosum1" name="qcosum1" style=" width:80px; height: 25px; " autofocus onkeyup="sumConsum1()" autocomplete="off" required/></td>
    <td> <input type="text" id="totconsum1" name="totconsum1" style=" width:80px; height: 25px; " readonly /></td>
	<td> <input type="submit"  name="gotoadd" value=" + ADD"></td></tr>
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

	if ($tempco->num_rows > 0) {
		?>
<table width="10%">
  <?php

while ($rowc= mysqli_fetch_assoc($tempco)) {
	++$i;
	$rowcons = $rowc['temp_consId'];
	$totalcons = $rowc['quantity']*$rowc['price'];
	?>
	<tr>
	<td><?php echo $i;?></td>
	<td><?php echo $rowc['cons_description'];?></td>
	<td><?php echo number_format($rowc['quantity']);?></td>
	<td><?php echo $rowc['price'];?></td>
	<td><?php echo $totalcons;?></td>
	<td><font color="red"> <input type='button' style="background-color: #f44336;"value='DELETE' onclick="window.open('removeconsumable?affideleTE=<?php echo urlencode($patient_id); ?>&rowid=<?php echo urlencode($rowcons); ?>','popup', 'width=700, height=300, statusbar=0, location=0, menubar=0, toolbar=0,left=350,top=350')"/></font></td>

	<?php
	$grandtotalcons =  $grandtotalcons+$totalcons;
	echo '</tr>';
	}

?>
<tr><td colspan="3"><strong>Total</strong></td><td><strong><?php echo number_format($grandtotalcons);?></strong></td></tr>  
</table>
<?php
	}
	else{
		echo "<span> <font color='Red'> No Consumable </font></span>";
		
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
function sendValue (s,x,y,z,s2,x2,y2,z2,s3,x3,y3,z3,s4,x4,y4,z4,s5,x5,y5,z5,s6,x6,y6,z6,s7,x7,y7,z7){
var selvalue = s.value;
var xvalue =x.value;
var yvalue =y.value;
var zvalue =z.value;


var selvalue2 = s2.value;
var xvalue2 =x2.value;
var yvalue2 =y2.value;
var zvalue2 =z2.value;


var selvalue3 = s3.value;
var xvalue3 =x3.value;
var yvalue3 =y3.value;
var zvalue3 =z3.value;


var selvalue4 = s4.value;
var xvalue4 =x4.value;
var yvalue4 =y4.value;
var zvalue4 =z4.value;


var selvalue5 = s5.value;
var xvalue5 =x5.value;
var yvalue5 =y5.value;
var zvalue5 =z5.value;


var selvalue6 = s6.value;
var xvalue6 =x6.value;
var yvalue6 =y6.value;
var zvalue6 =z6.value;

var selvalue7 = s7.value;
var xvalue7 =x7.value;
var yvalue7 =y7.value;
var zvalue7 =z7.value;

window.opener.document.getElementById('ccons1').value = selvalue;
window.opener.document.getElementById('upcons1').value = xvalue;
window.opener.document.getElementById('qcosum1').value = yvalue; 
window.opener.document.getElementById('vccons1').innerHTML = selvalue;
window.opener.document.getElementById('vqcosum1').innerHTML = yvalue; 
window.opener.document.getElementById('nidc1').value = zvalue; 

window.opener.document.getElementById('ccons2').value = selvalue2;
window.opener.document.getElementById('upcons2').value = xvalue2;
window.opener.document.getElementById('qcosum2').value = yvalue2; 
window.opener.document.getElementById('vccons2').innerHTML = selvalue2;
window.opener.document.getElementById('vqcosum2').innerHTML = yvalue2; 
window.opener.document.getElementById('nidc2').value = zvalue2; 

window.opener.document.getElementById('ccons3').value = selvalue3;
window.opener.document.getElementById('upcons3').value = xvalue3;
window.opener.document.getElementById('qcosum3').value = yvalue3; 
window.opener.document.getElementById('vccons3').innerHTML = selvalue3;
window.opener.document.getElementById('vqcosum3').innerHTML = yvalue3; 
window.opener.document.getElementById('nidc3').value = zvalue3; 

window.opener.document.getElementById('ccons4').value = selvalue4;
window.opener.document.getElementById('upcons4').value = xvalue4;
window.opener.document.getElementById('qcosum4').value = yvalue4;
window.opener.document.getElementById('vccons4').innerHTML = selvalue4;
window.opener.document.getElementById('vqcosum4').innerHTML = yvalue4; 
window.opener.document.getElementById('nidc4').value = zvalue4; 

window.opener.document.getElementById('ccons5').value = selvalue5;
window.opener.document.getElementById('upcons5').value = xvalue5;
window.opener.document.getElementById('qcosum5').value = yvalue5;
window.opener.document.getElementById('vccons5').innerHTML = selvalue5;
window.opener.document.getElementById('vqcosum5').innerHTML = yvalue5;  
window.opener.document.getElementById('nidc5').value = zvalue5; 

window.opener.document.getElementById('ccons6').value = selvalue6;
window.opener.document.getElementById('upcons6').value = xvalue6;
window.opener.document.getElementById('qcosum6').value = yvalue6;
window.opener.document.getElementById('vccons6').innerHTML = selvalue6;
window.opener.document.getElementById('vqcosum6').innerHTML = yvalue6;  
window.opener.document.getElementById('nidc6').value = zvalue6; 

window.opener.document.getElementById('ccons7').value = selvalue7;
window.opener.document.getElementById('upcons7').value = xvalue7;
window.opener.document.getElementById('qcosum7').value = yvalue7; 
window.opener.document.getElementById('vccons7').innerHTML = selvalue7;
window.opener.document.getElementById('vqcosum7').innerHTML = yvalue7; 
window.opener.document.getElementById('nidc7').value = zvalue7; 


var x = document.forms["selectform"]["qcosum1"].value;
var Px = document.forms["selectform"]["upcons1"].value;

var xcons2= document.forms["selectform"]["ccons2"].value;
var xcons3= document.forms["selectform"]["ccons3"].value;
var xcons4= document.forms["selectform"]["ccons4"].value;
var xcons5= document.forms["selectform"]["ccons5"].value;
var xcons6= document.forms["selectform"]["ccons6"].value;
var xcons7= document.forms["selectform"]["ccons7"].value;






    if (x==null || x=="" || x==0) {
        alert("PLEASE FILL IN QUANTITY FOR CONSUMABLE1");
        return false;
	}
	  if (Px==null || Px=="" || Px==0) {
        alert("PLEASE FILL IN PRICE  FOR CONSUMABLE1");
        return false;
	}
	if( xcons2 != ""){
         var xqcons2 = document.forms["selectform"]["qcosum2"].value;
    if (xqcons2==null || xqcons2=="" || xqcons2==0) {
        alert("PLEASE FILL IN QUANTITY FOR CONSUMABLE2");
        return false;
    }
	     var Pxqcons2 = document.forms["selectform"]["upcons2"].value;
    if (Pxqcons2==null || Pxqcons2=="" || Pxqcons2==0) {
        alert("PLEASE FILL IN PRICE FOR CONSUMABLE2");
        return false;
    }
	}
	if( xcons3 != ""){
         var xqcons3 = document.forms["selectform"]["qcosum3"].value;
    if (xqcons3==null || xqcons3=="" || xqcons3==0) {
        alert("PLEASE FILL IN QUANTITY FOR CONSUMABLE3");
        return false;
    }
	     var Pxqcons3 = document.forms["selectform"]["upcons3"].value;
    if (Pxqcons3=null || Pxqcons3=="" || Pxqcons3==0) {
        alert("PLEASE FILL IN PRICE FOR CONSUMABLE3");
        return false;
    }
	}
	
	if( xcons4 != ""){
         var xqcons4 = document.forms["selectform"]["qcosum4"].value;
    if (xqcons4==null || xqcons4=="" || xqcons4==0) {
        alert("PLEASE FILL IN QUANTITY FOR CONSUMABLE4");
        return false;
    }
	     var Pxqcons4 = document.forms["selectform"]["upcons4"].value;
    if (Pxqcons4==null || Pxqcons4=="" || Pxqcons4==0) {
        alert("PLEASE FILL IN PRICE FOR CONSUMABLE4");
        return false;
    }
	}
	if( xcons5 != ""){
         var xqcons5 = document.forms["selectform"]["qcosum5"].value;
    if (xqcons5==null || xqcons5=="" || xqcons5==0) {
        alert("PLEASE FILL IN QUANTITY FOR CONSUMABLE5");
        return false;
    }
	     var Pxqcons5 = document.forms["selectform"]["upcons5"].value;
    if (Pxqcons5==null || Pxqcons5=="" || Pxqcons5==0) {
        alert("PLEASE FILL IN PRICE FOR CONSUMABLE5");
        return false;
    }
	}
	if( xcons6 != ""){
         var xqcons6 = document.forms["selectform"]["qcosum6"].value;
    if (xqcons6==null || xqcons6==""  || xqcons6==0) {
        alert("PLEASE FILL IN QUANTITY FOR CONSUMABLE6");
        return false;
    }
	var Pxqcons6 = document.forms["selectform"]["upcons6"].value;
    if (Pxqcons6==null || Pxqcons6=="" || Pxqcons6==0) {
        alert("PLEASE FILL IN PRICE FOR CONSUMABLE6");
        return false;
    }
	}
	if( xcons7 != ""){
         var xqcons7 = document.forms["selectform"]["qcosum7"].value;
    if (xqcons7==null || xqcons7==""  || xqcons7==0) {
        alert("PLEASE FILL IN QUANTITY FOR CONSUMABLE7");
        return false;
    }
	var Pxqcons7 = document.forms["selectform"]["upcons7"].value;
    if (Pxqcons7==null || Pxqcons7=="" || Pxqcons7==0) {
        alert("PLEASE FILL IN PRICE FOR CONSUMABLE7");
        return false;
    }
	}
      
window.close();
}

</script>



    <script>
       <!-- Consumable1-->
	   function insertResultscons1(json){
        $("#upcons1").val(json["unit_price"]);
		$("#ccons1").val(json["name_consommable"]);
		$("#nidc1").val(json["id"]);
		$("#avelc1").val(json["dist_quantity"]);
      }

      function clearFormcons1(){
        $("#upcons1,#ccons1,#nidc1,#avelc1").val("");
      }
function setFocusToTextBoxcons1(){
		document.getElementById("qcosum1").focus();
		}
		
      function makeAjaxRequestcons1(placeId){
        $.ajax({
          type: "POST",
          data: { placeId: placeId },
          dataType: "json", 
          url: "process_ajax2.php",
          success: function(json) {
            insertResultscons1(json);
          }
        });
      }

      $("#cons1").on("change", function(){
        var id = $(this).val();
        if (id === "0"){
          clearFormcons1();
} else {
          makeAjaxRequestcons1(id);
		  setFocusToTextBoxcons1()
		document.getElementById('qcosum1').value = '';
		document.getElementById('totconsum1').value = '';
        }
      });
	  function sumConsum1() {
	  var FirstNumberValue = parseInt(document.getElementById('qcosum1').value);
      var SecondNumberValue = parseInt(document.getElementById('avelc1').value);
      var txtFirstNumberValue = document.getElementById('upcons1').value;
      var txtSecondNumberValue = document.getElementById('qcosum1').value;
      var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('totconsum1').value = result;
      }
	/*  if (FirstNumberValue > SecondNumberValue) {
         document.getElementById('cons1').value = '';
		 document.getElementById('qcosum1').value = '';
		 document.getElementById('totconsum1').value = '';


      }*/
}
	  <!-- Consumable2-->
	   function insertResultscons2(json){
        $("#upcons2").val(json["unit_price"]);
		$("#ccons2").val(json["name_consommable"]);
		$("#nidc2").val(json["id"]);
		$("#avelc2").val(json["dist_quantity"]);


      }

      function clearFormcons2(){
        $("#upcons2,#ccons2,#nidc2,#avelc2").val("");
      }
function setFocusToTextBoxcons2(){
		document.getElementById("qcosum2").focus();
		}
      function makeAjaxRequestcons2(placeId){
        $.ajax({
          type: "POST",
          data: { placeId: placeId },
          dataType: "json", 
          url: "process_ajax2.php",
          success: function(json) {
            insertResultscons2(json);
          }
        });
      }

      $("#cons2").on("change", function(){
        var id = $(this).val();
        if (id === "0"){
          clearFormcons2();
} else {
          makeAjaxRequestcons2(id);
		  setFocusToTextBoxcons2()
		document.getElementById('qcosum2').value = '';
		document.getElementById('totconsum2').value = '';
        }
      });
	  function sumConsum2() {
      var FirstNumberValue = parseInt(document.getElementById('qcosum2').value);
      var SecondNumberValue = parseInt(document.getElementById('avelc2').value);
	  var txtFirstNumberValue = document.getElementById('upcons2').value;
      var txtSecondNumberValue = document.getElementById('qcosum2').value;
      var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('totconsum2').value = result;
      }
	 /* if (FirstNumberValue > SecondNumberValue) {
         document.getElementById('cons2').value = '';
		 document.getElementById('qcosum2').value = '';
		 document.getElementById('totconsum2').value = '';


      }*/
}	  	  <!-- Consumable3-->
	   function insertResultscons3(json){
        $("#upcons3").val(json["unit_price"]);
		$("#ccons3").val(json["name_consommable"]);
		$("#nidc3").val(json["id"]);
		$("#avelc3").val(json["dist_quantity"]);

      }

      function clearFormcons3(){
        $("#upcons3,#ccons3,#nidc3,#avelc3").val("");
      }
function setFocusToTextBoxcons3(){
		document.getElementById("qcosum3").focus();
		}
      function makeAjaxRequestcons3(placeId){
        $.ajax({
          type: "POST",
          data: { placeId: placeId },
          dataType: "json", 
          url: "process_ajax2.php",
          success: function(json) {
            insertResultscons3(json);
          }
        });
      }

      $("#cons3").on("change", function(){
        var id = $(this).val();
        if (id === "0"){
          clearFormcons3();
} else {
          makeAjaxRequestcons3(id);
		  setFocusToTextBoxcons3()
		document.getElementById('qcosum3').value = '';
		document.getElementById('totconsum3').value = '';		
        }
      });
	  function sumConsum3() {
      var FirstNumberValue = parseInt(document.getElementById('qcosum3').value);
      var SecondNumberValue = parseInt(document.getElementById('avelc3').value);
      var txtFirstNumberValue = document.getElementById('upcons3').value;
      var txtSecondNumberValue = document.getElementById('qcosum3').value;
      var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('totconsum3').value = result;
      }
	  /*if (FirstNumberValue > SecondNumberValue) {
         document.getElementById('cons3').value = '';
		 document.getElementById('qcosum3').value = '';
		 document.getElementById('totconsum3').value = '';


      }*/
}	 	  	  	  <!-- Consumable4-->
	   function insertResultscons4(json){
        $("#upcons4").val(json["unit_price"]);
		$("#ccons4").val(json["name_consommable"]);
		$("#nidc4").val(json["id"]);
		$("#avelc4").val(json["dist_quantity"]);

      }

      function clearFormcons4(){
        $("#upcons4,#ccons4,#nidc4,#avelc4").val("");
      }
function setFocusToTextBoxcons4(){
		document.getElementById("qcosum4").focus();
		}
      function makeAjaxRequestcons4(placeId){
        $.ajax({
          type: "POST",
          data: { placeId: placeId },
          dataType: "json", 
          url: "process_ajax2.php",
          success: function(json) {
            insertResultscons4(json);
          }
        });
      }

      $("#cons4").on("change", function(){
        var id = $(this).val();
        if (id === "0"){
          clearFormcons4();
} else {
          makeAjaxRequestcons4(id);
		  setFocusToTextBoxcons4()
		document.getElementById('qcosum4').value = '';
		document.getElementById('totconsum4').value = '';		

        }
      });

	  function sumConsum4() {
      var FirstNumberValue = parseInt(document.getElementById('qcosum4').value);
      var SecondNumberValue = parseInt(document.getElementById('avelc4').value);
      var txtFirstNumberValue = document.getElementById('upcons4').value;
      var txtSecondNumberValue = document.getElementById('qcosum4').value;
      var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('totconsum4').value = result;
      }
	 /* if (FirstNumberValue > SecondNumberValue) {
         document.getElementById('cons4').value = '';
		 document.getElementById('qcosum4').value = '';
		 document.getElementById('totconsum4').value = '';


      }*/
}		  <!-- Consumable5-->
	   function insertResultscons5(json){
        $("#upcons5").val(json["unit_price"]);
		$("#ccons5").val(json["name_consommable"]);
		$("#nidc5").val(json["id"]);
		$("#avelc5").val(json["dist_quantity"]);

      }

      function clearFormcons5(){
        $("#upcons5,#ccons5,#nidc5,#avelc5").val("");
      }
	function setFocusToTextBoxcons5(){
		document.getElementById("qcosum5").focus();
		}
      function makeAjaxRequestcons5(placeId){
        $.ajax({
          type: "POST",
          data: { placeId: placeId },
          dataType: "json", 
          url: "process_ajax2.php",
          success: function(json) {
            insertResultscons5(json);
          }
        });
      }

      $("#cons5").on("change", function(){
        var id = $(this).val();
        if (id === "0"){
          clearFormcons5();
} else {
          makeAjaxRequestcons5(id);
		  setFocusToTextBoxcons5()
		document.getElementById('qcosum5').value = '';
		document.getElementById('totconsum5').value = '';		
        }
      });
	  function sumConsum5() {
      var FirstNumberValue = parseInt(document.getElementById('qcosum5').value);
      var SecondNumberValue = parseInt(document.getElementById('avelc5').value);
      var txtFirstNumberValue = document.getElementById('upcons5').value;
      var txtSecondNumberValue = document.getElementById('qcosum5').value;
      var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('totconsum5').value = result;
      }
	  /*if (FirstNumberValue > SecondNumberValue) {
         document.getElementById('cons5').value = '';
		 document.getElementById('qcosum5').value = '';
		 document.getElementById('totconsum5').value = '';
      }*/
}			
	<!-- Consumable6-->
	   function insertResultscons6(json){
        $("#upcons6").val(json["unit_price"]);
		$("#ccons6").val(json["name_consommable"]);
		$("#nidc6").val(json["id"]);
		$("#avelc6").val(json["dist_quantity"]);


      }

      function clearFormcons6(){
        $("#upcons6,#ccons6,#nidc6,#avelc6").val("");
      }
	function setFocusToTextBoxcons6(){
		document.getElementById("qcosum6").focus();
		}
      function makeAjaxRequestcons6(placeId){
        $.ajax({
          type: "POST",
          data: { placeId: placeId },
          dataType: "json", 
          url: "process_ajax2.php",
          success: function(json) {
            insertResultscons6(json);
          }
        });
      }

      $("#cons6").on("change", function(){
        var id = $(this).val();
        if (id === "0"){
          clearFormcons6();
} else {
          makeAjaxRequestcons6(id);
		  setFocusToTextBoxcons6()
		document.getElementById('qcosum6').value = '';
		document.getElementById('totconsum6').value = '';
        }
      });
	  function sumConsum6() {
      var FirstNumberValue = parseInt(document.getElementById('qcosum6').value);
      var SecondNumberValue = parseInt(document.getElementById('avelc6').value);
      var txtFirstNumberValue = document.getElementById('upcons6').value;
      var txtSecondNumberValue = document.getElementById('qcosum6').value;
      var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('totconsum6').value = result;
      }
	 /* if (FirstNumberValue > SecondNumberValue) {
         document.getElementById('cons6').value = '';
		 document.getElementById('qcosum6').value = '';
		 document.getElementById('totconsum6').value = '';


      }*/
}	
	<!-- Consumable7-->
	   function insertResultscons7(json){
        $("#upcons7").val(json["unit_price"]);
		$("#ccons7").val(json["name_consommable"]);
		$("#nidc7").val(json["id"]);
		$("#avelc7").val(json["dist_quantity"]);

      }

      function clearFormcons7(){
        $("#upcons7,#ccons7,#nidc7,#avelc7").val("");
      }
	function setFocusToTextBoxcons7(){
		document.getElementById("qcosum7").focus();
		}
      function makeAjaxRequestcons7(placeId){
        $.ajax({
          type: "POST",
          data: { placeId: placeId },
          dataType: "json", 
          url: "process_ajax2.php",
          success: function(json) {
            insertResultscons7(json);
          }
        });
      }

      $("#cons7").on("change", function(){
        var id = $(this).val();
        if (id === "0"){
          clearFormcons7();
} else {
          makeAjaxRequestcons7(id);
		  setFocusToTextBoxcons7()
		document.getElementById('qcosum7').value = '';
		document.getElementById('totconsum7').value = '';
        }
      });
	  function sumConsum7() {
      var FirstNumberValue = parseInt(document.getElementById('qcosum7').value);
      var SecondNumberValue = parseInt(document.getElementById('avelc7').value); 
	  var txtFirstNumberValue = document.getElementById('upcons7').value;
      var txtSecondNumberValue = document.getElementById('qcosum7').value;
      var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('totconsum7').value = result;
      }
	  	 /* if (FirstNumberValue > SecondNumberValue) {
         document.getElementById('cons7').value = '';
		 document.getElementById('qcosum7').value = '';
		 document.getElementById('totconsum7').value = '';


      }*/
}		
   </script>
<script language="javascript" type="text/javascript">
function showlineconsum2() {
   document.getElementById('consumable2').style.display = "block";
   document.getElementById('cons2').style.display = "block";
   document.getElementById('upcons2').style.display = "block";
   document.getElementById('qcosum2').style.display = "block";
   document.getElementById('totconsum2').style.display = "block";
   document.getElementById('activecons2').style.display = "block";
   document.getElementById('removeconsum2').style.display = "block";
   document.getElementById('avelc2').style.display = "block";

}
function showlineconsum3() {
   document.getElementById('consumable3').style.display = "block";
   document.getElementById('cons3').style.display = "block";
   document.getElementById('upcons3').style.display = "block";
   document.getElementById('qcosum3').style.display = "block";
   document.getElementById('totconsum3').style.display = "block";
   document.getElementById('activecons3').style.display = "block";
   document.getElementById('removeconsum3').style.display = "block";
   document.getElementById('avelc3').style.display = "block";
}
function showlineconsum4() {
   document.getElementById('consumable4').style.display = "block";
   document.getElementById('cons4').style.display = "block";
   document.getElementById('upcons4').style.display = "block";
   document.getElementById('qcosum4').style.display = "block";
   document.getElementById('totconsum4').style.display = "block";
   document.getElementById('activecons4').style.display = "block";
   document.getElementById('removeconsum4').style.display = "block";
   document.getElementById('avelc4').style.display = "block";
}
function showlineconsum5() {
   document.getElementById('consumable5').style.display = "block";
   document.getElementById('cons5').style.display = "block";
   document.getElementById('upcons5').style.display = "block";
   document.getElementById('qcosum5').style.display = "block";
   document.getElementById('totconsum5').style.display = "block";
   document.getElementById('activecons5').style.display = "block";
   document.getElementById('removeconsum5').style.display = "block";
   document.getElementById('avelc5').style.display = "block";
}
function showlineconsum6() {
   document.getElementById('consumable6').style.display = "block";
   document.getElementById('cons6').style.display = "block";
   document.getElementById('upcons6').style.display = "block";
   document.getElementById('qcosum6').style.display = "block";
   document.getElementById('totconsum6').style.display = "block";
   document.getElementById('activecons6').style.display = "block";
   document.getElementById('removeconsum6').style.display = "block";
   document.getElementById('avelc6').style.display = "block";
}
function showlineconsum7() {
   document.getElementById('consumable7').style.display = "block";
   document.getElementById('cons7').style.display = "block";
   document.getElementById('upcons7').style.display = "block";
   document.getElementById('qcosum7').style.display = "block";
   document.getElementById('totconsum7').style.display = "block";
   document.getElementById('activecons7').style.display = "block";
   document.getElementById('removeconsum7').style.display = "block";
   document.getElementById('avelc7').style.display = "block";
}
function hidelineconsum1() {
   document.getElementById('consumable1').style.display = "none";
   document.getElementById('cons1').style.display = "none";
   document.getElementById('upcons1').style.display = "none";
   document.getElementById('qcosum1').style.display = "none";
   document.getElementById('totconsum1').style.display = "none";
   document.getElementById('activecons1').style.display = "none";
   document.getElementById('removeconsum1').style.display = "none";
   document.getElementById('avelc1').style.display = "none";
   document.getElementById('cons1').value="";
     document.getElementById('ccons1').value="";
   document.getElementById('upcons1').value="";
   document.getElementById('qcosum1').value="";
   document.getElementById('totconsum1').value="";
   
}
function hidelineconsum2() {
   document.getElementById('consumable2').style.display = "none";
   document.getElementById('cons2').style.display = "none";
   document.getElementById('upcons2').style.display = "none";
   document.getElementById('qcosum2').style.display = "none";
   document.getElementById('totconsum2').style.display = "none";
   document.getElementById('activecons2').style.display = "none";
   document.getElementById('removeconsum2').style.display = "none";
   document.getElementById('avelc2').style.display = "none";
   document.getElementById('cons2').value="";
   document.getElementById('ccons2').value="";
   document.getElementById('upcons2').value="";
   document.getElementById('qcosum2').value="";
   document.getElementById('totconsum2').value="";   
}
function hidelineconsum3() {
   document.getElementById('consumable3').style.display = "none";
   document.getElementById('cons3').style.display = "none";
   document.getElementById('upcons3').style.display = "none";
   document.getElementById('qcosum3').style.display = "none";
   document.getElementById('totconsum3').style.display = "none";
   document.getElementById('activecons3').style.display = "none";
   document.getElementById('removeconsum3').style.display = "none";
   document.getElementById('avelc3').style.display = "none";
   document.getElementById('cons3').value="";
   document.getElementById('upcons3').value="";
   document.getElementById('qcosum3').value="";
   document.getElementById('totconsum3').value="";
   document.getElementById('ccons3').value="";

}
function hidelineconsum4() {
   document.getElementById('consumable4').style.display = "none";
   document.getElementById('cons4').style.display = "none";
   document.getElementById('upcons4').style.display = "none";
   document.getElementById('qcosum4').style.display = "none";
   document.getElementById('totconsum4').style.display = "none";
   document.getElementById('activecons4').style.display = "none";
   document.getElementById('removeconsum4').style.display = "none";
   document.getElementById('avelc4').style.display = "none";
   document.getElementById('cons4').value="";
   document.getElementById('upcons4').value="";
   document.getElementById('qcosum4').value="";
   document.getElementById('totconsum4').value="";
    document.getElementById('ccons4').value="";

   }
function hidelineconsum5() {
   document.getElementById('consumable5').style.display = "none";
   document.getElementById('cons5').style.display = "none";
   document.getElementById('upcons5').style.display = "none";
   document.getElementById('qcosum5').style.display = "none";
   document.getElementById('totconsum5').style.display = "none";
   document.getElementById('activecons5').style.display = "none";
   document.getElementById('removeconsum5').style.display = "none";
   document.getElementById('avelc5').style.display = "none";
   document.getElementById('cons5').value="";
   document.getElementById('upcons5').value="";
   document.getElementById('qcosum5').value="";
   document.getElementById('totconsum5').value="";
   document.getElementById('ccons5').value="";

   }
function hidelineconsum6() {
   document.getElementById('consumable6').style.display = "none";
   document.getElementById('cons6').style.display = "none";
   document.getElementById('upcons6').style.display = "none";
   document.getElementById('qcosum6').style.display = "none";
   document.getElementById('totconsum6').style.display = "none";
   document.getElementById('activecons6').style.display = "none";
   document.getElementById('removeconsum6').style.display = "none";
   document.getElementById('avelc6').style.display = "none";
   document.getElementById('cons6').value="";
   document.getElementById('upcons6').value="";
   document.getElementById('qcosum6').value="";
   document.getElementById('totconsum6').value="";
   document.getElementById('ccons6').value="";

   }
function hidelineconsum7() {
   document.getElementById('consumable7').style.display = "none";
   document.getElementById('cons7').style.display = "none";
   document.getElementById('upcons7').style.display = "none";
   document.getElementById('qcosum7').style.display = "none";
   document.getElementById('totconsum7').style.display = "none";
   document.getElementById('activecons7').style.display = "none";
   document.getElementById('removeconsum7').style.display = "none";
   document.getElementById('avelc7').style.display = "none";
   document.getElementById('cons7').value="";
   document.getElementById('upcons7').value="";
   document.getElementById('qcosum7').value="";
   document.getElementById('totconsum7').value="";
   document.getElementById('ccons7').value="";

   }
</script>
</html>
