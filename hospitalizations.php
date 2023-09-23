<html>
<script>
    window.onunload = refreshParent;
    function refreshParent() {
        window.opener.location.reload();
	}
</script>

<?php
session_start();
$Insurance =  $_SESSION['insurance'];
include_once('connect_db.php');
  $Insurance =  $_SESSION['insurance'];
if($Insurance == 'MUTUELLE')
{
  $query = "SELECT * from hospitalisation  where Insurer= 'MUTUELLE'  order by name_hospitalisation";
}
if($Insurance == 'RAMA/RSSB')
{
  $query = "SELECT * from hospitalisation  where Insurer= 'RAMA/RSSB'  order by name_hospitalisation";
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

$temphospi = ("select * from temp_hospitlzation WHERE patient_id  = '$patient_id' AND date = '$mydate' ");
$temhosp= mysqli_query($conn, $temphospi);


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
				
					<!-- end content-module-heading -->
					
						<div class="content-module-main cf">
				

				
<form method="post" action="add_hospitalization" name="selectform">
    <table  width="20%">
		<tr><th><strong>HOSPITALIZATION</strong><input type="text" name="patientid" value="<?php echo $patient_id;?>"  required  style="display:none"> <input type="text" name="mydate" value="<?php echo $mydate;?>" style="display:none" required></th><th><strong>UP</strong></th><th colspan="2"><strong>From  -  To - Days</strong></th><th><strong>Total</strong></th><th><strong>Add</strong></th></tr>	

	<tr ><td width="20px"><input type="text" name="patientid" value="<?php echo $patient_id;?>"  required  style="display:none"><input type="text" name="mydate" value="<?php echo $mydate;?>" style="display:none" required><select name="ex1" id="ex1"  style=" width:200px; height: 25px required">
      <option value="0">No Selection</option>
      <?php
 $hiosp = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($hiosp)) {
            echo '<option value="' . $row['id'] . '">' . $row['name_hospitalisation'] . '</option>';
        }
      ?>
    </select><input name="hhosp1" id="hhosp1" style="display:none" required ></td><td width="10%"><input name="uphosp1" id="uphosp1" style=" width:80px; height: 25px"  onkeyup="sumEx1()" onchange="sumEx1()" readonly  required/>
	</td><td width="%"><input type="date" id="qhosp1" name="qhosp1" style=" width:80px; height: 25px" autofocus  oninput="findDiff();" onchange="sumEx1()" placeholder = "Start Date" required></td>
	<td width="20%"><input type="date" id="qhosp2" name="qhosp2" style=" width:80px; height: 25px" autofocus  oninput="findDiff();" onchange="sumEx1()" placeholder = "End Date" required>&nbsp;&nbsp;<input type="number" name="days" id="days" MIN="1" onchange="sumEx1()"  style=" width:60px; height: 35px" MIN="1" required readonly/></td>
    <td width="7%"> <input type="text" id="totex1" name="totex1"style=" width:80px; height: 25px"/></td>
    <td width="7%"><input type="submit" name="gotoadd" onclick="checkGooddate()" value=" + ADD "></td></tr>
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

	if ($temhosp->num_rows > 0) {
		?>
<table width="10%">
<tr><th>No</th><th>Medical Act</th><th>Days</th><th>Price</th><th>Total</th><th>Action</th><tr>
  <?php

while ($rowmedact= mysqli_fetch_assoc($temhosp)) {
	++$i;
	$rowcons = $rowmedact['temp_hospId'];
	$totalmediact = $rowmedact['quantity']*$rowmedact['price'];
	?>
	<tr>
	<td><?php echo $i;?></td>
	<td><?php echo $rowmedact['temphospdescr'];?></td>
	<td><?php echo number_format($rowmedact['quantity']);?></td>
	<td><?php echo number_format($rowmedact['price']);?></td>
	<td><?php echo number_format($totalmediact);?></td>
	<td><font color="red"> <input type='button' style="background-color: #f44336;"value='DELETE' onclick="window.open('removehospitalz?affideleTE=<?php echo urlencode($patient_id); ?>&rowid=<?php echo urlencode($rowcons); ?>','popup', 'width=700, height=300, statusbar=0, location=0, menubar=0, toolbar=0,left=350,top=350')"/></font></td>

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
		echo "<span> <font color='Red'> No Hospitalization </font></span>";
		
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
<script type="text/javascript">
function findDiff(){
var dob1= document.getElementById("qhosp1").value;
var dob2= document.getElementById("qhosp2").value;
var date1 = new Date(dob1);
var date2=new Date(dob2);

var Difference_In_Time = date2.getTime() - date1.getTime();
var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24); 
document.getElementById("days").value=Difference_In_Days;
}

function checkGooddate(){
var numberdays = document.getElementById("days").value;	
if(numberdays <=0 ){
alert("Check dates Interaval");
document.getElementById("qhosp2").focus();

return;	
	
}	
}
</script>
<SCRIPT LANGUAGE="JavaScript">
<!-- Begin
function sendValues (s,x,y,s2,x2,y2,s3,x3,y3,s4,x4,y4,s5,x5,y5,s6,x6,y6,s7,x7,y7){
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


window.opener.document.getElementById('hhosp1').value = selvalue;
window.opener.document.getElementById('uphosp1').value = xvalue;
window.opener.document.getElementById('qhosp1').value = yvalue;
window.opener.document.getElementById('vhhosp1').innerHTML = selvalue;
window.opener.document.getElementById('vqhosp1').innerHTML = yvalue;

window.opener.document.getElementById('hhosp2').value = selvalue2;
window.opener.document.getElementById('uphosp2').value = xvalue2;
window.opener.document.getElementById('qhosp2').value = yvalue2;
window.opener.document.getElementById('vhhosp2').innerHTML = selvalue2;
window.opener.document.getElementById('vqhosp2').innerHTML = yvalue2;

window.opener.document.getElementById('hhosp3').value = selvalue3;
window.opener.document.getElementById('uphosp3').value = xvalue3;
window.opener.document.getElementById('qhosp3').value = yvalue3;
window.opener.document.getElementById('vhhosp3').innerHTML = selvalue3;
window.opener.document.getElementById('vqhosp3').innerHTML = yvalue3;

window.opener.document.getElementById('hhosp4').value = selvalue4;
window.opener.document.getElementById('uphosp4').value = xvalue4;
window.opener.document.getElementById('qhosp4').value = yvalue4;
window.opener.document.getElementById('vhhosp4').innerHTML = selvalue4;
window.opener.document.getElementById('vqhosp4').innerHTML = yvalue4;
 
window.opener.document.getElementById('hhosp5').value = selvalue5;
window.opener.document.getElementById('uphosp5').value = xvalue5;
window.opener.document.getElementById('qhosp5').value = yvalue5;
window.opener.document.getElementById('vhhosp5').innerHTML = selvalue5
window.opener.document.getElementById('vqhosp5').innerHTML = yvalue5;

window.opener.document.getElementById('hhosp6').value = selvalue6;
window.opener.document.getElementById('uphosp6').value = xvalue6;
window.opener.document.getElementById('qhosp6').value = yvalue6;
window.opener.document.getElementById('vhhosp6').innerHTML = selvalue6;
window.opener.document.getElementById('vqhosp6').innerHTML = yvalue6;

window.opener.document.getElementById('hhosp7').value = selvalue7;
window.opener.document.getElementById('uphosp7').value = xvalue7;
window.opener.document.getElementById('qhosp7').value = yvalue7;
window.opener.document.getElementById('vhhosp7').innerHTML = selvalue7;
window.opener.document.getElementById('vqhosp7').innerHTML = yvalue7;

var xtest2= document.forms["selectform"]["hhosp2"].value;
var xtest3= document.forms["selectform"]["hhosp3"].value;
var xtest4= document.forms["selectform"]["hhosp4"].value;
var xtest5= document.forms["selectform"]["hhosp5"].value;
var xtest6= document.forms["selectform"]["hhosp6"].value;
var xtest7= document.forms["selectform"]["hhosp7"].value;


 
         var x = document.forms["selectform"]["qhosp1"].value;
    if (x==null || x==""  || x==0) {
        alert("PLEASE FILL IN QUANTITY FOR TEST1");
        return false;
    }
	
	         var Px = document.forms["selectform"]["uphosp1"].value;
    if (Px==null || Px==""  || Px==0) {
        alert("PLEASE FILL IN PRICE  FOR HOSP LINE 1");
        return false;
    }
	
	if( xtest2 != ""){
         var xqhosp2 = document.forms["selectform"]["qhosp2"].value;
    if (xqhosp2==null || xqhosp2==""|| xqhosp2==0) {
        alert("PLEASE FILL IN QUANTITY FOR TEST2");
        return false;
    }
	
	         var Px2 = document.forms["selectform"]["uphosp2"].value;
    if (Px2==null || Px2==""  || Px2==0) {
        alert("PLEASE FILL IN PRICE  FOR HOSP LINE 2");
        return false;
    }
	}
	if( xtest3 != ""){
         var xqhosp3 = document.forms["selectform"]["qhosp3"].value;
    if (xqhosp3==null || xqhosp3=="" || xqhosp3==0) {
        alert("PLEASE FILL IN QUANTITY FOR TEST3");
        return false;
    }
	         var Px3 = document.forms["selectform"]["uphosp3"].value;
    if (Px3==null || Px3==""  || Px3==0) {
        alert("PLEASE FILL IN PRICE  FOR HOSP LINE 3");
        return false;
    }
	}
	if( xtest4 != ""){
         var xqhosp4 = document.forms["selectform"]["qhosp4"].value;
    if (xqhosp4==null || xqhosp4=="" || xqhosp4==0) {
        alert("PLEASE FILL IN QUANTITY FOR TEST4");
        return false;
    }
	         var Px4 = document.forms["selectform"]["uphosp4"].value;
    if (Px4==null || Px4==""  || Px4==0) {
        alert("PLEASE FILL IN PRICE  FOR HOSP LINE 4");
        return false;
    }
	}
	if( xtest5 != ""){
         var xqhosp5 = document.forms["selectform"]["qhosp5"].value;
    if (xqhosp5==null || xqhosp5=="" || xqhosp5==0) {
        alert("PLEASE FILL IN QUANTITY FOR TEST5");
        return false;
    }
	         var Px5 = document.forms["selectform"]["uphosp5"].value;
    if (Px5==null || Px5==""  || Px5==0) {
        alert("PLEASE FILL IN PRICE  FOR HOSP LINE 5");
        return false;
    }
	}
	
	if( xtest6 != ""){
         var xqhosp6 = document.forms["selectform"]["qhosp6"].value;
    if (xqhosp6==null || xqhosp6=="" || xqhosp6==0) {
        alert("PLEASE FILL IN QUANTITY FOR TEST6");
        return false;
    }
	         var Px6 = document.forms["selectform"]["uphosp6"].value;
    if (Px6==null || Px6==""  || Px6==0) {
        alert("PLEASE FILL IN PRICE  FOR HOSP LINE 6");
        return false;
    }
	}
	
	if( xtest7 != ""){
         var xqhosp7 = document.forms["selectform"]["qhosp7"].value;
    if (xqhosp7==null || xqhosp7==""  || xqhosp7==0) {
        alert("PLEASE FILL IN QUANTITY FOR TEST7");
        return false;
    }
	         var Px7 = document.forms["selectform"]["uphosp7"].value;
    if (Px7==null || Px7==""  || Px7==0) {
        alert("PLEASE FILL IN PRICE  FOR HOSP LINE 7");
        return false;
    }
	}
    window.close();    
}

</script> 


    <script src="js/jquery.min.js"></script>
    <script>
       <!-- Lab Test1-->
	   function insertResultsex1(json){
        $("#uphosp1").val(json["unit_price"]);
		$("#hhosp1").val(json["name_hospitalisation"]);


      }

      function clearFormex1(){
        $("#uphosp1,#hhosp1").val("");
      }

      function makeAjaxRequestex1(placeId){
        $.ajax({
          type: "POST",
          data: { placeId: placeId },
          dataType: "json", 
          url: "process_ajax50.php",
          success: function(json) {
            insertResultsex1(json);
          }
        });
      }
function setFocusToTextBoxex1(){
		document.getElementById("qhosp1").focus();
		}

      $("#ex1").on("change", function(){
        var id = $(this).val();
        if (id === "0"){
          clearFormex1();
} else {
          makeAjaxRequestex1(id);
		  setFocusToTextBoxex1();
		document.getElementById('qhosp1').value = '';
		document.getElementById('totex1').value = '';
        }
      });
	  	  function sumEx1() {
      var txtFirstNumberValue = document.getElementById('uphosp1').value;
      var txtSecondNumberValue = document.getElementById('days').value;
      var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('totex1').value = result;
      }
}
	 <!-- Lab Test2-->
	   function insertResultsex2(json){
        $("#uphosp2").val(json["unit_price"]);
		$("#hhosp2").val(json["name_hospitalisation"]);

      }

      function clearFormex2(){
        $("#uphosp2,#hhosp2").val("");
      }
	function setFocusToTextBoxex2(){
		document.getElementById("qhosp2").focus();
		}
      function makeAjaxRequestex2(placeId){
        $.ajax({
          type: "POST",
          data: { placeId: placeId },
          dataType: "json", 
          url: "process_ajax50.php",
          success: function(json) {
            insertResultsex2(json);
          }
        });
      }

      $("#ex2").on("change", function(){
        var id = $(this).val();
        if (id === "0"){
          clearFormex2();
} else {
          makeAjaxRequestex2(id);
		  setFocusToTextBoxex2();
		document.getElementById('qhosp2').value = '';
		document.getElementById('totex2').value = '';
        }
      });
	  
	  	  function sumEx2() {
      var txtFirstNumberValue = document.getElementById('uphosp2').value;
      var txtSecondNumberValue = document.getElementById('qhosp2').value;
      var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('totex2').value = result;
      }
}
	 <!-- Lab Test3-->
	   function insertResultsex3(json){
        $("#uphosp3").val(json["unit_price"]);
		$("#hhosp3").val(json["name_hospitalisation"]);


      }

      function clearFormex3(){
        $("#uphosp3,#hhosp3").val("");
      }
	function setFocusToTextBoxex3(){
		document.getElementById("qhosp3").focus();
		}
      function makeAjaxRequestex3(placeId){
        $.ajax({
          type: "POST",
          data: { placeId: placeId },
          dataType: "json", 
          url: "process_ajax50.php",
          success: function(json) {
            insertResultsex3(json);
          }
        });
      }

      $("#ex3").on("change", function(){
        var id = $(this).val();
        if (id === "0"){
          clearFormex3();
} else {
          makeAjaxRequestex3(id);
		 setFocusToTextBoxex3();
		document.getElementById('qhosp3').value = '';
		document.getElementById('totex3').value = '';
        }
      });

	  function sumEx3() {
      var txtFirstNumberValue = document.getElementById('uphosp3').value;
      var txtSecondNumberValue = document.getElementById('qhosp3').value;
      var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('totex3').value = result;
      }
}
	 <!-- Lab Test4-->
	   function insertResultsex4(json){
        $("#uphosp4").val(json["unit_price"]);
		$("#hhosp4").val(json["name_hospitalisation"]);

      }

      function clearFormex4(){
        $("#uphosp4,#hhosp4").val("");
      }
	function setFocusToTextBoxex4(){
		document.getElementById("qhosp4").focus();
		}
      function makeAjaxRequestex4(placeId){
        $.ajax({
          type: "POST",
          data: { placeId: placeId },
          dataType: "json", 
          url: "process_ajax50.php",
          success: function(json) {
            insertResultsex4(json);
          }
        });
      }

      $("#ex4").on("change", function(){
        var id = $(this).val();
        if (id === "0"){
          clearFormex4();
} else {
          makeAjaxRequestex4(id);
		setFocusToTextBoxex4();
		document.getElementById('qhosp4').value = '';
		document.getElementById('totex4').value = '';
        }
      });
	  	  	  function sumEx4() {
      var txtFirstNumberValue = document.getElementById('uphosp4').value;
      var txtSecondNumberValue = document.getElementById('qhosp4').value;
      var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('totex4').value = result;
      }
}
	<!-- Lab Test5-->
	   function insertResultsex5(json){
        $("#uphosp5").val(json["unit_price"]);
		$("#hhosp5").val(json["name_hospitalisation"]);

      }

      function clearFormex5(){
        $("#uphosp5,#hhosp5").val("");
      }
	function setFocusToTextBoxex5(){
		document.getElementById("qhosp5").focus();
		}
      function makeAjaxRequestex5(placeId){
        $.ajax({
          type: "POST",
          data: { placeId: placeId },
          dataType: "json", 
          url: "process_ajax50.php",
          success: function(json) {
            insertResultsex5(json);
          }
        });
      }

      $("#ex5").on("change", function(){
        var id = $(this).val();
        if (id === "0"){
          clearFormex5();
} else {
          makeAjaxRequestex5(id);
			  setFocusToTextBoxex5();
		document.getElementById('qhosp5').value = '';
		document.getElementById('totex5').value = '';
        }
      });
	  	  function sumEx5() {
      var txtFirstNumberValue = document.getElementById('uphosp5').value;
      var txtSecondNumberValue = document.getElementById('qhosp5').value;
      var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('totex5').value = result;
      }
}
	<!-- Lab Test6-->
	   function insertResultsex6(json){
        $("#uphosp6").val(json["unit_price"]);
		$("#hhosp6").val(json["name_hospitalisation"]);

      }

      function clearFormex6(){
        $("#uphosp6,#hhosp6").val("");
      }
	function setFocusToTextBoxex6(){
		document.getElementById("qhosp6").focus();
		}
      function makeAjaxRequestex6(placeId){
        $.ajax({
          type: "POST",
          data: { placeId: placeId },
          dataType: "json", 
          url: "process_ajax50.php",
          success: function(json) {
            insertResultsex6(json);
          }
        });
      }

      $("#ex6").on("change", function(){
        var id = $(this).val();
        if (id === "0"){
          clearFormex6();
} else {
          makeAjaxRequestex6(id);
		 setFocusToTextBoxex6();
		document.getElementById('qhosp6').value = '';
		document.getElementById('totex6').value = '';
        }
      });
	  	  function sumEx6() {
      var txtFirstNumberValue = document.getElementById('uphosp6').value;
      var txtSecondNumberValue = document.getElementById('qhosp6').value;
      var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('totex6').value = result;
      }
}
	<!-- Lab Test7-->
	   function insertResultsex7(json){
        $("#uphosp7").val(json["unit_price"]);
		$("#hhosp7").val(json["name_hospitalisation"]);

      }

      function clearFormex7(){
        $("#uphosp7,#hhosp7").val("");
      }
	function setFocusToTextBoxex7(){
		document.getElementById("qhosp7").focus();
		}
      function makeAjaxRequestex7(placeId){
        $.ajax({
          type: "POST",
          data: { placeId: placeId },
          dataType: "json", 
          url: "process_ajax50.php",
          success: function(json) {
            insertResultsex7(json);
          }
        });
      }

      $("#ex7").on("change", function(){
        var id = $(this).val();
        if (id === "0"){
          clearFormex7();
} else {
          makeAjaxRequestex7(id);
			  setFocusToTextBoxex7();
		document.getElementById('qhosp7').value = '';
		document.getElementById('totex7').value = '';
        }
      });
	  	  function sumEx7() {
      var txtFirstNumberValue = document.getElementById('uphosp7').value;
      var txtSecondNumberValue = document.getElementById('qhosp7').value;
      var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('totex7').value = result;
      }
}
 </script>
      
<script language="javascript" type="text/javascript">

function showlinex2() {
   document.getElementById('labtest2').style.display = "block";
   document.getElementById('ex2').style.display = "block";
   document.getElementById('uphosp2').style.display = "block";
   document.getElementById('qhosp2').style.display = "block";
   document.getElementById('totex2').style.display = "block";
   document.getElementById('activex2').style.display = "block";
   document.getElementById('removex2').style.display = "block";
}
function showlinex3() {
   document.getElementById('labtest3').style.display = "block";
   document.getElementById('ex3').style.display = "block";
   document.getElementById('uphosp3').style.display = "block";
   document.getElementById('qhosp3').style.display = "block";
   document.getElementById('totex3').style.display = "block";
   document.getElementById('activex3').style.display = "block";
   document.getElementById('removex3').style.display = "block";
}
function showlinex4() {
   document.getElementById('labtest4').style.display = "block";
   document.getElementById('ex4').style.display = "block";
   document.getElementById('uphosp4').style.display = "block";
   document.getElementById('qhosp4').style.display = "block";
   document.getElementById('totex4').style.display = "block";
   document.getElementById('activex4').style.display = "block";
   document.getElementById('removex4').style.display = "block";
}
function showlinex5() {
   document.getElementById('labtest5').style.display = "block";
   document.getElementById('ex5').style.display = "block";
   document.getElementById('uphosp5').style.display = "block";
   document.getElementById('qhosp5').style.display = "block";
   document.getElementById('totex5').style.display = "block";
   document.getElementById('activex5').style.display = "block";
   document.getElementById('removex5').style.display = "block";
}
function showlinex6() {
   document.getElementById('labtest6').style.display = "block";
   document.getElementById('ex6').style.display = "block";
   document.getElementById('uphosp6').style.display = "block";
   document.getElementById('qhosp6').style.display = "block";
   document.getElementById('totex6').style.display = "block";
   document.getElementById('activex6').style.display = "block";
   document.getElementById('removex6').style.display = "block";
}
function showlinex7() {
   document.getElementById('labtest7').style.display = "block";
   document.getElementById('ex7').style.display = "block";
   document.getElementById('uphosp7').style.display = "block";
   document.getElementById('qhosp7').style.display = "block";
   document.getElementById('totex7').style.display = "block";
   document.getElementById('activex7').style.display = "block";
   document.getElementById('removex7').style.display = "block";
}

function hidelinex1() {
   document.getElementById('labtest1').style.display = "none";
   document.getElementById('ex1').style.display = "none";
   document.getElementById('hhosp1').style.display = "none";
   document.getElementById('uphosp1').style.display = "none";
   document.getElementById('qhosp1').style.display = "none";
   document.getElementById('totex1').style.display = "none";
   document.getElementById('activex1').style.display = "none";
   document.getElementById('removex1').style.display = "none";
   document.getElementById('ex1').value='';
   document.getElementById('ex1').value='';
   document.getElementById('uphosp1').value='';
   document.getElementById('qhosp1').value='';
   document.getElementById('totex1').value='';

}
function hidelinex2() {
   document.getElementById('labtest2').style.display = "none";
   document.getElementById('ex2').style.display = "none";
   document.getElementById('hhosp2').style.display = "none";
   document.getElementById('uphosp2').style.display = "none";
   document.getElementById('qhosp2').style.display = "none";
   document.getElementById('totex2').style.display = "none";
   document.getElementById('activex2').style.display = "none";
   document.getElementById('removex2').style.display = "none";
   document.getElementById('ex2').value='';
   document.getElementById('uphosp2').value='';
   document.getElementById('qhosp2').value='';
   document.getElementById('totex2').value='';
   document.getElementById('hhosp2').value='';

}
function hidelinex3() {
   document.getElementById('labtest3').style.display = "none";
   document.getElementById('ex3').style.display = "none";
      document.getElementById('hhosp3').style.display = "none";
   document.getElementById('uphosp3').style.display = "none";
   document.getElementById('qhosp3').style.display = "none";
   document.getElementById('totex3').style.display = "none";
   document.getElementById('activex3').style.display = "none";
   document.getElementById('removex3').style.display = "none";
    document.getElementById('ex3').value='';
   document.getElementById('uphosp3').value='';
   document.getElementById('qhosp3').value='';
   document.getElementById('totex3').value='';
   document.getElementById('hhosp3').value='';

}
function hidelinex4() {
   document.getElementById('labtest4').style.display = "none";
   document.getElementById('ex4').style.display = "none";
      document.getElementById('hhosp4').style.display = "none";
   document.getElementById('uphosp4').style.display = "none";
   document.getElementById('qhosp4').style.display = "none";
   document.getElementById('totex4').style.display = "none";
   document.getElementById('activex4').style.display = "none";
   document.getElementById('removex4').style.display = "none";
   document.getElementById('ex4').value='';
   document.getElementById('uphosp4').value='';
   document.getElementById('qhosp4').value='';
   document.getElementById('totex4').value='';
   document.getElementById('hhosp4').value='';

}
function hidelinex5() {
   document.getElementById('labtest5').style.display = "none";
   document.getElementById('ex5').style.display = "none";
      document.getElementById('hhosp5').style.display = "none";
   document.getElementById('uphosp5').style.display = "none";
   document.getElementById('qhosp5').style.display = "none";
   document.getElementById('totex5').style.display = "none";
   document.getElementById('activex5').style.display = "none";
   document.getElementById('removex5').style.display = "none";
   document.getElementById('ex5').value='';
   document.getElementById('uphosp5').value='';
   document.getElementById('qhosp5').value='';
   document.getElementById('totex5').value='';
   document.getElementById('hhosp5').value='';

   }
function hidelinex6() {
   document.getElementById('labtest6').style.display = "none";
   document.getElementById('ex6').style.display = "none";
      document.getElementById('hhosp6').style.display = "none";
   document.getElementById('uphosp6').style.display = "none";
   document.getElementById('qhosp6').style.display = "none";
   document.getElementById('totex6').style.display = "none";
   document.getElementById('activex6').style.display = "none";
   document.getElementById('removex6').style.display = "none";
   document.getElementById('ex6').value='';
   document.getElementById('uphosp6').value='';
   document.getElementById('qhosp6').value='';
   document.getElementById('totex6').value='';
   document.getElementById('hhosp6').value='';

   }
function hidelinex7() {
   document.getElementById('labtest7').style.display = "none";
   document.getElementById('ex7').style.display = "none";
      document.getElementById('hhosp7').style.display = "none";
   document.getElementById('uphosp7').style.display = "none";
   document.getElementById('qhosp7').style.display = "none";
   document.getElementById('totex7').style.display = "none";
   document.getElementById('activex7').style.display = "none";
   document.getElementById('removex7').style.display = "none";
   document.getElementById('ex7').value='';
   document.getElementById('uphosp7').value='';
   document.getElementById('qhosp7').value='';
   document.getElementById('totex7').value='';
   document.getElementById('hhosp7').value='';

   }
</script>
</html>





