
<html>
<?php
error_reporting(0);
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
<script>
    window.onunload = refreshParent;
    function refreshParent() {
        window.opener.location.reload();
	}
	

</script>
<style>
/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
</style>
<?php
session_start();

include_once('connect_db.php');

  $query = "SELECT * from prodicts order by product_name";
$patient_id =  $_SESSION['sess_name'];
$mydate  = $_SESSION['mydate'];
$tempmedicine  = ("select * from temp_medicament WHERE patient_id  = '$patient_id'  AND date = '$mydate' ");
$temmed = mysqli_query($conn, $tempmedicine);
?>


	
</head>
<body>

	<!-- TOP BAR -->
	<!-- TOP BAR -->
	<?php
	include_once('mymenus.php');

	?>	
	<link rel="stylesheet" href="css/style.css">
	<!-- MAIN CONTENT -->
	<div id="content">
		
		<div class="page-full-width cf">

			 <!-- end side-menu -->
			
			<div class="side-content fr">
<!-- end content-module-heading -->
					
						<div class="content-module-main cf">
				

				
<form method="post" action="add_newmedicine" name="selectform">

    <table style="font-size:10px;width:60%;margin-left:auto;margin-right:auto"><tr><th><strong>Drug Name</strong></th><th style="width:10%;display:none">Stock</th><th><strong>UP</strong></th><th><strong>QTY</strong></th><th  style="display:none"><strong>Total</strong></th> <th style="width:10% display:none"><strong>Usage</strong></th><th style="width:10%"><strong>Add</strong></th></tr>
	
	
	
	<tr ><td style="width:10%"><input type="text" name="patientid" value="<?php echo $patient_id;?>" style="display:none" required><input type="text" name="mydate" value="<?php echo $mydate;?>" style="display:none" required><select name="med1" id="med1"  style='width:250px;height:30px;'required>
	      <option value="0">No Selection</option>

      <?php
 
$medicines = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($medicines)) {
            echo '<option value="' . $row['id'] . '">' . $row['product_name'] . '</option>';
        }
      ?>
    </select><input type="hidden" name="mmed1" id="mmed1"  required /><input type="hidden" name="nid1" id="nid1"  required/><td style="display:none"><input type="hidden" style=" width:80px; height: 25px;" name="fixedqty" id="fixedqty" required> <input type="hidden" style=" width:80px; height: 25px;" name="avel1" id="avel1" required> <input type="hidden" style=" width:80px; height: 25px;" name="requested" id="glstock0"  required><input type="hidden" style=" width:80px; height: 25px;" name="totRequested" id="glstock"  required></td></td><td width="1%"><input name="up1" id="up1" style=" width:80px; height: 25px; "  oninput="summed1();" required/>
	</td><td style="width:10%"><input type="number" id="qmed1" name="qmed1" MIN="1" style=" width:55px; height: 25px;" autofocus oninput="summed1()" onwheel="this.blur()" autocomplete="off" required></td>
    <td style="width:10%;display:none"> <input type="text" id="totmed1" placeholder="Remain" name="totmed1"style=" width:80px; height: 25px ;"  required onkeypress="return false;"/></td>
    <td> <input type="text" id="usage" name="medusage"style=" width:150px; height: 25px" placeholder="      Usage    " required/></td>
	<td> <input type="submit" name="gotoadd" value=" + ADD MEDICINE"></td></tr>

</table>
</form>

    </div>
 

</div></div></div>
				<div id="content">
		
		<div class="page-full-width cf">

			 <!-- end side-menu -->
			
			<div class="side-content fr">
			<br>
 <fieldset style="background:#e1eff2;width: 40%;margin: 0 auto;">
<?PHP

	if ($temmed->num_rows > 0) {
		?>
<table width="10%">
  <?php

while ($rowmed = mysqli_fetch_assoc($temmed)) {
	++$i;
	$rowid = $rowmed['temp_id'];
	$medId = $rowmed['medicament_id'];
	$totalmedic = $rowmed['quantity']*$rowmed['price'];
	?>
	<tr>
	<td><?php echo $i;?></td>
	<td><?php echo $rowmed['medicament_descript'];?></td>
	<td><?php echo number_format($rowmed['quantity']);?></td>
	<td><?php echo $rowmed['price'];?></td>
	<td><strong><?php echo $totalmedic;?></strong></td>
	<td><font color="red"> <input type='button' style="background-color: #f44336;"value='DELETE' onclick="window.open('removemedicine?affideleTE=<?php echo urlencode($patient_id); ?>&rowid=<?php echo urlencode($rowid); ?>&medId=<?php echo urlencode($medId); ?>','popup', 'width=700, height=300, statusbar=0, location=0, menubar=0, toolbar=0,left=350,top=350')"/></font></td>

	<?php
	$grandtotal =  $grandtotal+$totalmedic;
	echo '</tr>';
	}

?>
<tr><td colspan="3"><strong>Total</strong></td><td><strong><?php echo $grandtotal;?></strong></td></tr>  
</table>
<?php
	}
	else{
		echo "<span> <font color='Red'> No Mecine </font></span>";
		
	}
?>
  </fieldset>  <form method="post" action="" name="selectform">
  <table width="10%" style="margin-left: 25%;">
<tr><td></td><td>

<input name="bigbutton" id="bigbutton" type="submit" value=" X Close X" />


</td><td></td></tr>
</table>
</form>

</body>

</html>
<script>
      function insertResults(json){
        $("#up1").val(json["unit_price"]);
		$("#mmed1").val(json["product_name"]);
		$("#nid1").val(json["id"]);
		$("#avel1").val(json["remain"]);
		$("#fixedqty").val(json["qtity"]);
		$("#glstock0").val(json["dist_quantity"]);
		$("#glstock").val(json[" "]);

      }

      function clearForm(){
        $("#up1,#mmed1,#nid1,#avel1,#fixedqty,#glstock0,#glstock").val("");
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
      var txtFirstNumberValue = document.getElementById('up1').value;
	  var txtSecondNumberValue = document.getElementById('qmed1').value;
      var txtRestNumberValue = parseInt(document.getElementById('glstock0').value);
	  var result = parseFloat(SecondNumberValue) - parseFloat(FirstNumberValue);
      var result1 =  parseInt(FirstNumberValue);
      if ((!isNaN(result))&&(!isNaN(result1))) {
         document.getElementById('totmed1').value = result;
         document.getElementById('glstock').value = txtRestNumberValue+result1;
      }
	 /*if ((FirstNumberValue > SecondNumberValue) || (FirstNumberValue == '')) {
		 document.getElementById('qmed1').value = '';
		 document.getElementById('glstock').value = txtRestNumberValue;
		 document.getElementById('totmed1').value = '';


      }*/
}
	function summed() {
	  var FirstNumberValue = parseInt(document.getElementById('qmed1').value);
      var SecondNumberValue = parseInt(document.getElementById('avel1').value);
      var txtFirstNumberValue = document.getElementById('up1').value;
      var txtSecondNumberValue = document.getElementById('qmed1').value;
      var result = parseFloat(SecondNumberValue) - parseFloat(FirstNumberValue);
      if (!isNaN(result)) {
         document.getElementById('totmed1').value = result;
      }
	 if (FirstNumberValue > SecondNumberValue) {
		 document.getElementById('qmed1').value = '';
		 document.getElementById('totmed1').value = '';


      }
}
   </script>
<script language="javascript" type="text/javascript">
function hideline() {
   document.getElementById('lebmedicine1').style.display = "none";
   document.getElementById('med1').style.display = "none";
   document.getElementById('up1').style.display = "none";
   document.getElementById('qmed1').style.display = "none";
   document.getElementById('totmed1').style.display = "none";
   document.getElementById('active1').style.display = "none";
   document.getElementById('remove1').style.display = "none";
   document.getElementById('avel1').style.display = "none";
   document.getElementById('mmed1').value='';
   document.getElementById('up1').value='';
   document.getElementById('qmed1').value='';
   document.getElementById('totmed1').value='';
   document.getElementById('avel1').value='';


}
function showline1() {
   document.getElementById('lebmedicine2').style.display = "block";
   document.getElementById('med2').style.display = "block";
   document.getElementById('up2').style.display = "block";
   document.getElementById('qmed2').style.display = "block";
   document.getElementById('totmed2').style.display = "block";
   document.getElementById('active2').style.display = "block";
   document.getElementById('remove2').style.display = "block";
   document.getElementById('avel2').style.display = "block";


}
function showline3() {
   document.getElementById('lebmedicine3').style.display = "block";
   document.getElementById('med3').style.display = "block";
   document.getElementById('up3').style.display = "block";
   document.getElementById('qmed3').style.display = "block";
   document.getElementById('totmed3').style.display = "block";
   document.getElementById('active3').style.display = "block";
   document.getElementById('remove3').style.display = "block";
   document.getElementById('avel3').style.display = "block";

}

function showline4() {
   document.getElementById('lebmedicine4').style.display = "block";
   document.getElementById('med4').style.display = "block";
   document.getElementById('up4').style.display = "block";
   document.getElementById('qmed4').style.display = "block";
   document.getElementById('totmed4').style.display = "block";
   document.getElementById('active4').style.display = "block";
   document.getElementById('remove4').style.display = "block";
   document.getElementById('avel4').style.display = "block";

}
function showline5() {
   document.getElementById('lebmedicine5').style.display = "block";
   document.getElementById('med5').style.display = "block";
   document.getElementById('up5').style.display = "block";
   document.getElementById('qmed5').style.display = "block";
   document.getElementById('totmed5').style.display = "block";
   document.getElementById('active5').style.display = "block";
   document.getElementById('remove5').style.display = "block";
   document.getElementById('avel5').style.display = "block";

}
function showline6() {
   document.getElementById('lebmedicine6').style.display = "block";
   document.getElementById('med6').style.display = "block";
   document.getElementById('up6').style.display = "block";
   document.getElementById('qmed6').style.display = "block";
   document.getElementById('totmed6').style.display = "block";
   document.getElementById('active6').style.display = "block";
   document.getElementById('remove6').style.display = "block";
   document.getElementById('avel6').style.display = "block";

}
function showline7() {
   document.getElementById('lebmedicine7').style.display = "block";
   document.getElementById('med7').style.display = "block";
   document.getElementById('up7').style.display = "block";
   document.getElementById('qmed7').style.display = "block";
   document.getElementById('totmed7').style.display = "block";
   document.getElementById('active7').style.display = "block";
   document.getElementById('remove7').style.display = "block";
   document.getElementById('avel7').style.display = "block";

}

function hideline1() {
   document.getElementById('lebmedicine2').style.display = "none";
   document.getElementById('med2').style.display = "none";
   document.getElementById('up2').style.display = "none";
   document.getElementById('qmed2').style.display = "none";
   document.getElementById('totmed2').style.display = "none";
   document.getElementById('active2').style.display = "none";
   document.getElementById('remove2').style.display = "none";
   document.getElementById('avel2').style.display = "none";
   document.getElementById('mmed2').value='';
   document.getElementById('up2').value='';
   document.getElementById('qmed2').value='';
   document.getElementById('totmed2').value='';
   document.getElementById('avel2').value='';
}
function hideline3() {
   document.getElementById('lebmedicine3').style.display = "none";
   document.getElementById('med3').style.display = "none";
   document.getElementById('up3').style.display = "none";
   document.getElementById('qmed3').style.display = "none";
   document.getElementById('totmed3').style.display = "none";
   document.getElementById('active3').style.display = "none";
   document.getElementById('remove3').style.display = "none";
   document.getElementById('avel3').style.display = "none";
   document.getElementById('mmed3').value='';
   document.getElementById('up3').value='';
   document.getElementById('qmed3').value='';
   document.getElementById('totmed3').value='';
   document.getElementById('avel3').value='';
}
function hideline4() {
   document.getElementById('lebmedicine4').style.display = "none";
   document.getElementById('med4').style.display = "none";
   document.getElementById('up4').style.display = "none";
   document.getElementById('qmed4').style.display = "none";
   document.getElementById('totmed4').style.display = "none";
   document.getElementById('active4').style.display = "none";
   document.getElementById('remove4').style.display = "none";
   document.getElementById('avel4').style.display = "none";
   document.getElementById('mmed4').value='';
   document.getElementById('up4').value='';
   document.getElementById('qmed4').value='';
   document.getElementById('totmed4').value='';
   document.getElementById('avel4').value='';
}
function hideline5() {
   document.getElementById('lebmedicine5').style.display = "none";
   document.getElementById('med5').style.display = "none";
   document.getElementById('up5').style.display = "none";
   document.getElementById('qmed5').style.display = "none";
   document.getElementById('totmed5').style.display = "none";
   document.getElementById('active5').style.display = "none";
   document.getElementById('remove5').style.display = "none";
   document.getElementById('avel5').style.display = "none";
   document.getElementById('memd5').value='';
   document.getElementById('up5').value='';
   document.getElementById('qmed5').value='';
   document.getElementById('totmed5').value='';
   document.getElementById('avel5').value='';
}
function hideline6() {
   document.getElementById('lebmedicine6').style.display = "none";
   document.getElementById('med6').style.display = "none";
   document.getElementById('up6').style.display = "none";
   document.getElementById('qmed6').style.display = "none";
   document.getElementById('totmed6').style.display = "none";
   document.getElementById('active6').style.display = "none";
   document.getElementById('remove6').style.display = "none";
    document.getElementById('avel6').style.display = "none";
   document.getElementById('mmed6').value='';
   document.getElementById('up6').value='';
   document.getElementById('qmed6').value='';
   document.getElementById('totmed6').value='';
   document.getElementById('avel6').value='';
}
function hideline7() {
   document.getElementById('lebmedicine7').style.display = "none";
   document.getElementById('med7').style.display = "none";
   document.getElementById('up7').style.display = "none";
   document.getElementById('qmed7').style.display = "none";
   document.getElementById('totmed7').style.display = "none";
   document.getElementById('active7').style.display = "none";
   document.getElementById('remove7').style.display = "none";
   document.getElementById('avel7').style.display = "none";
   document.getElementById('mmed7').value='';
   document.getElementById('up7').value='';
   document.getElementById('qmed7').value='';
   document.getElementById('totmed7').value='';
   document.getElementById('avel7').value='';
}
</script>

