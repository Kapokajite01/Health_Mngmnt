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
  $query = "SELECT * from examens order by name_examen";
$patient_id =  $_SESSION['affnumber'];
$mydate  = $_SESSION['dtconsult'];
$testtemp = ("select * from consom_labs WHERE patient_id   = '$patient_id' ");
$temtest = mysqli_query($conn, $testtemp);
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

		<?php 	include_once('mymenus.php');
?>

	
	
	<!-- MAIN CONTENT -->
	<div id="content">
		
		<div class="page-full-width cf">

			 <!-- end side-menu -->
			
			<div class="side-content fr">
			
				<div class="content-module">
				
					<div class="content-module-heading cf">
						<span class="fr expand-collapse-text"> Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					<h3 align="center">[CHECK LAB TEST TO ADD TO CONSUMPTIONS]</h3>
					</div> <!-- end content-module-heading -->
					
						<div class="content-module-main cf">
				

				
<form method="post" action="add_test_new" name="selectform">
    <table  width="20%">
<tr><th>Examen</th><th>Price</th><th>Quantity</th><th>Add</th><tr>
	
	<tr ><td><input type="text" name="patientid" value="<?php echo $patient_id;?>" style="display:none" required><input type="text" name="mydate" value="<?php echo $mydate;?>"  style="display:none"  required><input type="text" id ="id1" name ="id1" style="display:none"><select name="ex1" id="ex1"  style=" width:200px; height: 25px;" required>
      <option value="0">No Selection</option>
      <?php
 $hiosp = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($hiosp)) {
            echo '<option value="' . $row['id'] . '">' . $row['name_examen'] . '</option>';
        }
      ?>
    </select><input name="eex1" id="eex1" style="display:none"></td><td ><input name="upex1" id="upex1"   onchange="sumEx1()"  style="height: 25px; width: 55px; " required/>
	</td><td ><input type="text" id="qex1" name="qex1"  style="height: 25px; width: 55px;" autofocus onkeyup="sumEx1()" required></td>
	<td><input type="submit" name="gotoadd" value=" + Add New Test"></td>
    </tr>
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

	if ($temtest->num_rows > 0) {
		?>
<table width="50%" style="font-size:10px;">
<tr><th>No</th><th>Medicine</th><th>Quantity</th><th>Price</th><th>Total</th><th>Action</th><tr>
  <?php

while ($rowmed = mysqli_fetch_assoc($temtest)) {
	++$i;
	$rowid = $rowmed['lbaconsid'];
	$totalmedic = $rowmed['examen_qty']*$rowmed['examen_price'];
	?>
	<tr>
	<td><?php echo $i;?></td>
	<td><?php echo $rowmed['examen'];?></td>
	<td><?php echo number_format($rowmed['examen_qty']);?></td>
	<td><?php echo number_format($rowmed['examen_price']);?></td>
	<td><?php echo number_format($totalmedic);?></td>
	<td><font color="red"> <input type='button' style="background-color: #f44336;"value='DELETE' onclick="window.open('removetest?affideleTE=<?php echo urlencode($patient_id); ?>&rowid=<?php echo urlencode($rowid); ?>','popup', 'width=700, height=300, statusbar=0, location=0, menubar=0, toolbar=0,left=350,top=350')"/></font></td>

	<?php
	$grandtotal =  $grandtotal+$totalmedic;
	echo '</tr>';
	}

?>
<tr><td colspan="3"><strong>Total</strong></td><td><strong><?php echo number_format($grandtotal);?></strong></td></tr>  
</table>
<?php
	}
	else{
		echo "<span> <font color='Red'> No Test </font></span>";
		
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

</html>
<SCRIPT LANGUAGE="JavaScript">
<!-- Begin
function sendValues (n,s,x,y,n2,s2,x2,y2,n3,s3,x3,y3,n4,s4,x4,y4,n5,s5,x5,y5,n6,s6,x6,y6,n7,s7,x7,y7){
var nvalue = n.value;
var selvalue = s.value;
var xvalue =x.value;
var yvalue =y.value;

var nvalue2 = n2.value;
var selvalue2 = s2.value;
var xvalue2 =x2.value;
var yvalue2 =y2.value;

var nvalue3 = n3.value;
var selvalue3 = s3.value;
var xvalue3 =x3.value;
var yvalue3 =y3.value;

var nvalue4 = n4.value;
var selvalue4 = s4.value;
var xvalue4 =x4.value;
var yvalue4 =y4.value;

var nvalue5 = n5.value;
var selvalue5 = s5.value;
var xvalue5 =x5.value;
var yvalue5 =y5.value;

var nvalue6 = n6.value;
var selvalue6 = s6.value;
var xvalue6 =x6.value;
var yvalue6 =y6.value;

var nvalue7= n7.value;
var selvalue7 = s7.value;
var xvalue7 =x7.value;
var yvalue7 =y7.value;


window.opener.document.getElementById('testid1').value = nvalue;
window.opener.document.getElementById('eex1').value = selvalue;
window.opener.document.getElementById('upex1').value = xvalue;
window.opener.document.getElementById('veex1').innerHTML = selvalue;
window.opener.document.getElementById('vqex1').innerHTML = yvalue;
window.opener.document.getElementById('qex1').value = yvalue;


window.opener.document.getElementById('testid2').value = nvalue2;
window.opener.document.getElementById('eexe2').value = selvalue2;
window.opener.document.getElementById('upex2').value = xvalue2;
window.opener.document.getElementById('qex2').value = yvalue2;
window.opener.document.getElementById('vqex2').innerHTML = yvalue2;
window.opener.document.getElementById('veexe2').innerHTML = selvalue2;

window.opener.document.getElementById('testid3').value = nvalue3;
window.opener.document.getElementById('eexe3').value = selvalue3;
window.opener.document.getElementById('upex3').value = xvalue3;
window.opener.document.getElementById('qex3').value = yvalue3;
window.opener.document.getElementById('vqex3').innerHTML = yvalue3;
window.opener.document.getElementById('veexe3').innerHTML = selvalue3;

window.opener.document.getElementById('testid4').value = nvalue4;
window.opener.document.getElementById('eexe4').value = selvalue4;
window.opener.document.getElementById('upex4').value = xvalue4;
window.opener.document.getElementById('qex4').value = yvalue4;
window.opener.document.getElementById('vqex4').innerHTML = yvalue4;
window.opener.document.getElementById('veexe4').innerHTML = selvalue4;
 
window.opener.document.getElementById('testid5').value = nvalue5;
window.opener.document.getElementById('eexe5').value = selvalue5;
window.opener.document.getElementById('upex5').value = xvalue5;
window.opener.document.getElementById('qex5').value = yvalue5;
window.opener.document.getElementById('vqex5').innerHTML = yvalue5;
window.opener.document.getElementById('veexe5').innerHTML = selvalue5;

window.opener.document.getElementById('testid6').value = nvalue6;
window.opener.document.getElementById('eexe6').value = selvalue6;
window.opener.document.getElementById('upex6').value = xvalue6;
window.opener.document.getElementById('qex6').value = yvalue6;
window.opener.document.getElementById('vqex6').innerHTML = yvalue6;
window.opener.document.getElementById('veexe6').innerHTML = selvalue6;

window.opener.document.getElementById('testid7').value = nvalue7;
window.opener.document.getElementById('eexe7').value = selvalue7;
window.opener.document.getElementById('upex7').value = xvalue7;
window.opener.document.getElementById('qex7').value = yvalue7;
window.opener.document.getElementById('vqex7').innerHTML = yvalue7;
window.opener.document.getElementById('veexe7').innerHTML = selvalue7;

var xtest2= document.forms["selectform"]["eexe2"].value;
var xtest3= document.forms["selectform"]["eexe3"].value;
var xtest4= document.forms["selectform"]["eexe4"].value;
var xtest5= document.forms["selectform"]["eexe5"].value;
var xtest6= document.forms["selectform"]["eexe6"].value;
var xtest7= document.forms["selectform"]["eexe7"].value;


 
         var x = document.forms["selectform"]["qex1"].value;
    if (x==null || x==""  || x==0) {
        alert("PLEASE FILL IN QUANTITY FOR TEST1");
        return false;
    }
       var Px = document.forms["selectform"]["upex1"].value;
    if (Px==null || Px==""  || Px==0) {
        alert("PLEASE FILL IN PRICE1 ON LINE1");
        return false;
    }
	if( xtest2 != ""){
         var xqex2 = document.forms["selectform"]["qex2"].value;
    if (xqex2==null || xqex2==""|| xqex2==0) {
        alert("PLEASE FILL IN QUANTITY FOR TEST2");
        return false;
    }
	    var Px2 = document.forms["selectform"]["upex2"].value;
    if (Px2==null || Px2==""  || Px2==0) {
        alert("PLEASE FILL IN PRICE2 ON LINE2");
        return false;
    }
	}
	if( xtest3 != ""){
         var xqex3 = document.forms["selectform"]["qex3"].value;
    if (xqex3==null || xqex3=="" || xqex3==0) {
        alert("PLEASE FILL IN QUANTITY FOR TEST3");
        return false;
    }
	   var Px3 = document.forms["selectform"]["upex3"].value;
    if (Px3==null || Px3==""  || Px3==0) {
        alert("PLEASE FILL IN PRICE3 ON LINE3");
        return false;
    }
	}
	if( xtest4 != ""){
         var xqex4 = document.forms["selectform"]["qex4"].value;
    if (xqex4==null || xqex4=="" || xqex4==0) {
        alert("PLEASE FILL IN QUANTITY FOR TEST4");
        return false;
    }
	   var Px4 = document.forms["selectform"]["upex4"].value;
    if (Px4==null || Px4==""  || Px4==0) {
        alert("PLEASE FILL IN PRICE4 ON LINE4");
        return false;
    }
	}
	if( xtest5 != ""){
         var xqex5 = document.forms["selectform"]["qex5"].value;
    if (xqex5==null || xqex5=="" || xqex5==0) {
        alert("PLEASE FILL IN QUANTITY FOR TEST5");
        return false;
    }
	   var Px5= document.forms["selectform"]["upex5"].value;
    if (Px5==null || Px5==""  || Px5==0) {
        alert("PLEASE FILL IN PRICE5 ON LINE5");
        return false;
    }
	}
	
	if( xtest6 != ""){
         var xqex6 = document.forms["selectform"]["qex6"].value;
    if (xqex6==null || xqex6=="" || xqex6==0) {
        alert("PLEASE FILL IN QUANTITY FOR TEST6");
        return false;
    }
	   var Px6 = document.forms["selectform"]["upex6"].value;
    if (Px6==null || Px6==""  || Px6==0) {
        alert("PLEASE FILL IN PRICE6 ON LINE6");
        return false;
    }
	}
	
	if( xtest7 != ""){
         var xqex7 = document.forms["selectform"]["qex7"].value;
    if (xqex7==null || xqex7==""  || xqex7==0) {
        alert("PLEASE FILL IN QUANTITY FOR TEST7");
        return false;
    }
	   var Px7 = document.forms["selectform"]["upex7"].value;
    if (Px7==null || Px7==""  || Px7==0) {
        alert("PLEASE FILL IN PRICE7 ON LINE7");
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
        $("#upex1").val(json["unit_price"]);
		$("#eex1").val(json["name_examen"]);
		$("#id1").val(json["id"]);


      }

      function clearFormex1(){
        $("#upex1,#eex1,#id1").val("");
      }

      function makeAjaxRequestex1(placeId){
        $.ajax({
          type: "POST",
          data: { placeId: placeId },
          dataType: "json", 
          url: "process_ajax5.php",
          success: function(json) {
            insertResultsex1(json);
          }
        });
      }
function setFocusToTextBoxex1(){
		document.getElementById("qex1").value=1;
		}

      $("#ex1").on("change", function(){
        var id = $(this).val();
        if (id === "0"){
          clearFormex1();
} else {
          makeAjaxRequestex1(id);
		  setFocusToTextBoxex1();
		document.getElementById('qex1').value = 1;
		document.getElementById('totex1').value = '';
        }
      });
	  	  function sumEx1() {
      var txtFirstNumberValue = document.getElementById('upex1').value;
      var txtSecondNumberValue = document.getElementById('qex1').value;
      var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('totex1').value = result;
      }
}
	 <!-- Lab Test2-->
	   function insertResultsex2(json){
        $("#upex2").val(json["unit_price"]);
		$("#eexe2").val(json["name_examen"]);
		$("#id2").val(json["id"]);

      }

      function clearFormex2(){
        $("#upex2,#eexe2,#id2").val("");
      }
	function setFocusToTextBoxex2(){
		document.getElementById("qex2").value=1;;
		}
      function makeAjaxRequestex2(placeId){
        $.ajax({
          type: "POST",
          data: { placeId: placeId },
          dataType: "json", 
          url: "process_ajax5.php",
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
		document.getElementById('qex2').value=1;;
		document.getElementById('totex2').value = '';
        }
      });
	  
	  	  function sumEx2() {
      var txtFirstNumberValue = document.getElementById('upex2').value;
      var txtSecondNumberValue = document.getElementById('qex2').value;
      var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('totex2').value = result;
      }
}
	 <!-- Lab Test3-->
	   function insertResultsex3(json){
        $("#upex3").val(json["unit_price"]);
		$("#eexe3").val(json["name_examen"]);
		$("#id3").val(json["id"]);


      }

      function clearFormex3(){
        $("#upex3,#eexe3,#id3").val("");
      }
	function setFocusToTextBoxex3(){
		document.getElementById("qex3").value=1
		}
      function makeAjaxRequestex3(placeId){
        $.ajax({
          type: "POST",
          data: { placeId: placeId },
          dataType: "json", 
          url: "process_ajax5.php",
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
		document.getElementById('qex3').value=1
		document.getElementById('totex3').value = '';
        }
      });

	  function sumEx3() {
      var txtFirstNumberValue = document.getElementById('upex3').value;
      var txtSecondNumberValue = document.getElementById('qex3').value;
      var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('totex3').value = result;
      }
}
	 <!-- Lab Test4-->
	   function insertResultsex4(json){
        $("#upex4").val(json["unit_price"]);
		$("#eexe4").val(json["name_examen"]);
		$("#id4").val(json["id"]);

      }

      function clearFormex4(){
        $("#upex4,#eexe4,#id4").val("");
      }
	function setFocusToTextBoxex4(){
		document.getElementById("qex4").value=1
		}
      function makeAjaxRequestex4(placeId){
        $.ajax({
          type: "POST",
          data: { placeId: placeId },
          dataType: "json", 
          url: "process_ajax5.php",
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
		document.getElementById('qex4').value=1
		document.getElementById('totex4').value = '';
        }
      });
	  	  	  function sumEx4() {
      var txtFirstNumberValue = document.getElementById('upex4').value;
      var txtSecondNumberValue = document.getElementById('qex4').value;
      var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('totex4').value = result;
      }
}
	<!-- Lab Test5-->
	   function insertResultsex5(json){
        $("#upex5").val(json["unit_price"]);
		$("#eexe5").val(json["name_examen"]);
		$("#id5").val(json["id"]);

      }

      function clearFormex5(){
        $("#upex5,#eexe5,#id5").val("");
      }
	function setFocusToTextBoxex5(){
		document.getElementById("qex5").value=1
		}
      function makeAjaxRequestex5(placeId){
        $.ajax({
          type: "POST",
          data: { placeId: placeId },
          dataType: "json", 
          url: "process_ajax5.php",
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
		document.getElementById('qex5').value=1
		document.getElementById('totex5').value = '';
        }
      });
	  	  function sumEx5() {
      var txtFirstNumberValue = document.getElementById('upex5').value;
      var txtSecondNumberValue = document.getElementById('qex5').value;
      var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('totex5').value = result;
      }
}
	<!-- Lab Test6-->
	   function insertResultsex6(json){
        $("#upex6").val(json["unit_price"]);
		$("#eexe6").val(json["name_examen"]);
		$("#id6").val(json["id"]);

      }

      function clearFormex6(){
        $("#upex6,#eexe6,#id6").val("");
      }
	function setFocusToTextBoxex6(){
		document.getElementById("qex6").value=1
		}
      function makeAjaxRequestex6(placeId){
        $.ajax({
          type: "POST",
          data: { placeId: placeId },
          dataType: "json", 
          url: "process_ajax5.php",
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
		document.getElementById('qex6').value=1
		document.getElementById('totex6').value = '';
        }
      });
	  	  function sumEx6() {
      var txtFirstNumberValue = document.getElementById('upex6').value;
      var txtSecondNumberValue = document.getElementById('qex6').value;
      var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('totex6').value = result;
      }
}
	<!-- Lab Test7-->
	   function insertResultsex7(json){
        $("#upex7").val(json["unit_price"]);
		$("#eexe7").val(json["name_examen"]);
		$("#id7").val(json["id"]);

      }

      function clearFormex7(){
        $("#upex7,#eexe7,$id7").val("");
      }
	function setFocusToTextBoxex7(){
		document.getElementById("qex7").value=1
		}
      function makeAjaxRequestex7(placeId){
        $.ajax({
          type: "POST",
          data: { placeId: placeId },
          dataType: "json", 
          url: "process_ajax5.php",
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
		document.getElementById('qex7').value=1
		document.getElementById('totex7').value = '';
        }
      });
	  	  function sumEx7() {
      var txtFirstNumberValue = document.getElementById('upex7').value;
      var txtSecondNumberValue = document.getElementById('qex7').value;
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
   document.getElementById('upex2').style.display = "block";
   document.getElementById('qex2').style.display = "block";
   document.getElementById('totex2').style.display = "block";
   document.getElementById('activex2').style.display = "block";
   document.getElementById('removex2').style.display = "block";
}
function showlinex3() {
   document.getElementById('labtest3').style.display = "block";
   document.getElementById('ex3').style.display = "block";
   document.getElementById('upex3').style.display = "block";
   document.getElementById('qex3').style.display = "block";
   document.getElementById('totex3').style.display = "block";
   document.getElementById('activex3').style.display = "block";
   document.getElementById('removex3').style.display = "block";
}
function showlinex4() {
   document.getElementById('labtest4').style.display = "block";
   document.getElementById('ex4').style.display = "block";
   document.getElementById('upex4').style.display = "block";
   document.getElementById('qex4').style.display = "block";
   document.getElementById('totex4').style.display = "block";
   document.getElementById('activex4').style.display = "block";
   document.getElementById('removex4').style.display = "block";
}
function showlinex5() {
   document.getElementById('labtest5').style.display = "block";
   document.getElementById('ex5').style.display = "block";
   document.getElementById('upex5').style.display = "block";
   document.getElementById('qex5').style.display = "block";
   document.getElementById('totex5').style.display = "block";
   document.getElementById('activex5').style.display = "block";
   document.getElementById('removex5').style.display = "block";
}
function showlinex6() {
   document.getElementById('labtest6').style.display = "block";
   document.getElementById('ex6').style.display = "block";
   document.getElementById('upex6').style.display = "block";
   document.getElementById('qex6').style.display = "block";
   document.getElementById('totex6').style.display = "block";
   document.getElementById('activex6').style.display = "block";
   document.getElementById('removex6').style.display = "block";
}
function showlinex7() {
   document.getElementById('labtest7').style.display = "block";
   document.getElementById('ex7').style.display = "block";
   document.getElementById('upex7').style.display = "block";
   document.getElementById('qex7').style.display = "block";
   document.getElementById('totex7').style.display = "block";
   document.getElementById('activex7').style.display = "block";
   document.getElementById('removex7').style.display = "block";
}

function hidelinex1() {
   document.getElementById('labtest1').style.display = "none";
   document.getElementById('ex1').style.display = "none";
   document.getElementById('eex1').style.display = "none";
   document.getElementById('upex1').style.display = "none";
   document.getElementById('qex1').style.display = "none";
   document.getElementById('totex1').style.display = "none";
   document.getElementById('activex1').style.display = "none";
   document.getElementById('removex1').style.display = "none";
   document.getElementById('ex1').value='';
   document.getElementById('ex1').value='';
   document.getElementById('upex1').value='';
   document.getElementById('qex1').value='';
   document.getElementById('totex1').value='';

}
function hidelinex2() {
   document.getElementById('labtest2').style.display = "none";
   document.getElementById('ex2').style.display = "none";
   document.getElementById('eexe2').style.display = "none";
   document.getElementById('upex2').style.display = "none";
   document.getElementById('qex2').style.display = "none";
   document.getElementById('totex2').style.display = "none";
   document.getElementById('activex2').style.display = "none";
   document.getElementById('removex2').style.display = "none";
   document.getElementById('ex2').value='';
   document.getElementById('upex2').value='';
   document.getElementById('qex2').value='';
   document.getElementById('totex2').value='';
   document.getElementById('eexe2').value='';

}
function hidelinex3() {
   document.getElementById('labtest3').style.display = "none";
   document.getElementById('ex3').style.display = "none";
      document.getElementById('eexe3').style.display = "none";
   document.getElementById('upex3').style.display = "none";
   document.getElementById('qex3').style.display = "none";
   document.getElementById('totex3').style.display = "none";
   document.getElementById('activex3').style.display = "none";
   document.getElementById('removex3').style.display = "none";
    document.getElementById('ex3').value='';
   document.getElementById('upex3').value='';
   document.getElementById('qex3').value='';
   document.getElementById('totex3').value='';
   document.getElementById('eexe3').value='';

}
function hidelinex4() {
   document.getElementById('labtest4').style.display = "none";
   document.getElementById('ex4').style.display = "none";
      document.getElementById('eexe4').style.display = "none";
   document.getElementById('upex4').style.display = "none";
   document.getElementById('qex4').style.display = "none";
   document.getElementById('totex4').style.display = "none";
   document.getElementById('activex4').style.display = "none";
   document.getElementById('removex4').style.display = "none";
   document.getElementById('ex4').value='';
   document.getElementById('upex4').value='';
   document.getElementById('qex4').value='';
   document.getElementById('totex4').value='';
   document.getElementById('eexe4').value='';

}
function hidelinex5() {
   document.getElementById('labtest5').style.display = "none";
   document.getElementById('ex5').style.display = "none";
      document.getElementById('eexe5').style.display = "none";
   document.getElementById('upex5').style.display = "none";
   document.getElementById('qex5').style.display = "none";
   document.getElementById('totex5').style.display = "none";
   document.getElementById('activex5').style.display = "none";
   document.getElementById('removex5').style.display = "none";
   document.getElementById('ex5').value='';
   document.getElementById('upex5').value='';
   document.getElementById('qex5').value='';
   document.getElementById('totex5').value='';
   document.getElementById('eexe5').value='';

   }
function hidelinex6() {
   document.getElementById('labtest6').style.display = "none";
   document.getElementById('ex6').style.display = "none";
      document.getElementById('eexe6').style.display = "none";
   document.getElementById('upex6').style.display = "none";
   document.getElementById('qex6').style.display = "none";
   document.getElementById('totex6').style.display = "none";
   document.getElementById('activex6').style.display = "none";
   document.getElementById('removex6').style.display = "none";
   document.getElementById('ex6').value='';
   document.getElementById('upex6').value='';
   document.getElementById('qex6').value='';
   document.getElementById('totex6').value='';
   document.getElementById('eexe6').value='';

   }
function hidelinex7() {
   document.getElementById('labtest7').style.display = "none";
   document.getElementById('ex7').style.display = "none";
      document.getElementById('eexe7').style.display = "none";
   document.getElementById('upex7').style.display = "none";
   document.getElementById('qex7').style.display = "none";
   document.getElementById('totex7').style.display = "none";
   document.getElementById('activex7').style.display = "none";
   document.getElementById('removex7').style.display = "none";
   document.getElementById('ex7').value='';
   document.getElementById('upex7').value='';
   document.getElementById('qex7').value='';
   document.getElementById('totex7').value='';
   document.getElementById('eexe7').value='';

   }
</script>
</html>





