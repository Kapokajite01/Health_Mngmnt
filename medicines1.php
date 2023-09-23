
<html>
<?php
 # Connect
  mysql_connect('localhost', 'root', 'fidele') or die('Could not connect: ' . mysql_error());
   
  # Choose a database
  mysql_select_db('dirskhpe_rangiro') or die('Could not select database');
   
  # Perform database query
  $query = "SELECT * from prodicts order by product_name";

?>


	
</head>
<body>

	<!-- TOP BAR -->
	<!-- TOP BAR -->
	<?php
	include_once('mmenus.php');

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
					<h3 align="center">[CHECK MEDICINE TO ADD TO CONSUMPTIONS]</h3>
					</div> <!-- end content-module-heading -->
					
						<div class="content-module-main cf">
				

				
<form method="post" action="" name="selectform">
    <table  width="20%"><tr ><td width="20px"> <label width="4%" name="lebmedicine1" id="lebmedicine1">Medicine1</label></td><td width="10%"><select name="med1" id="med1"  style=" width:200px; height: 25px ">
      <option value="0">No Selection</option>
      <?php
 
  $result = ($query) or die('Query failed: ' . mysql_error());
        while ($row = mysql_fetch_assoc($result)) {
            echo '<option value="' . $row['id'] . '">' . $row['product_name'] . '</option>';
        }
      ?>
    </select><input type="text" name="mmed1" id="mmed1" style="display:none"/></td><td width="4%"><input name="up1" id="up1" style=" width:80px; height: 25px; " onkeyup="summed1();" readonly/>
	</td><td width="7%"><input type="text" id="qmed1" name="qmed1" style=" width:80px; height: 25px" autofocus onkeyup="summed1()"/></td>
    <td width="7%"> <input type="text" id="totmed1" name="totmed1"style=" width:80px; height: 25px" readonly/></td><td width="25px">
	<input type="button" name="active1" id="active1" value="Add More" onclick="showline1()"></td><td>
<input type="button" name="remove" id="remove1" value="Remove" onclick="hideline()"></td><td></td></tr>

<tr ><td width="20px"> <label width="4%" name="lebmedicine2" id="lebmedicine2" ; style="display: none">Medicine2</label></td><td width="10%"><select name="med2" id="med2"  style=" width:200px; height: 25px ; display: none">
      <option value="0">No Selection</option>
      <?php
 
  $result = ($query) or die('Query failed: ' . mysql_error());
        while ($row = mysql_fetch_assoc($result)) {
            echo '<option value="' . $row['id'] . '">' . $row['product_name'] . '</option>';
        }
      ?>
    </select><input name="mmed2" id="mmed2" style="display:none"/></td><td width="4%"><input name="up2" id="up2" style=" width:80px; height: 25px; display: none" onkeyup="summed2();" readonly/>
	</td><td width="7%"><input type="text" id="qmed2" name="qmed2" style=" width:80px; height: 25px; display: none" autofocus onkeyup="summed2()"/></td>
    <td width="7%"> <input type="text" id="totmed2" name="totmed2" style=" width:80px; height: 25px; display: none" /></td><td width="25px" >
	<input type="button" name="active2" id="active2" value="Add More" onclick="showline3()" style="display: none"></td><td>
<input type="button" name="remove2" id="remove2" value="Remove" onclick="hideline1()" style="display: none"></td><td></td></tr>

			   
<tr ><td width="20px"> <label width="4%" name="lebmedicine3" id="lebmedicine3" ; style="display: none">Medicine3</label></td><td width="10%"><select name="med3" id="med3"  style=" width:200px; height: 25px ; display: none">
      <option value="0">No Selection</option>
      <?php
 
  $result = ($query) or die('Query failed: ' . mysql_error());
        while ($row = mysql_fetch_assoc($result)) {
            echo '<option value="' . $row['id'] . '">' . $row['product_name'] . '</option>';
        }
      ?>
    </select> <input name="mmed3" id="mmed3" style="display:none"/></td><td width="4%"><input name="up3" id="up3" style=" width:80px; height: 25px; display: none" onkeyup="summed3();" readonly/>
	</td><td width="7%"><input type="text" id="qmed3" name="qmed3" style=" width:80px; height: 25px; display: none" autofocus onkeyup="summed3()"/></td>
    <td width="7%"> <input type="text" id="totmed3" name="totmed3"style=" width:80px; height: 25px; display: none"/></td><td width="25px" onkeyup="summed3()">
	<input type="button" name="active3" id="active3" value="Add More" onclick="showline4()" style="display: none"></td><td>
<input type="button" name="remove3" id="remove3" value="Remove" onclick="hideline3()" style="display: none"></td><td></td></tr>
<tr ><td width="20px"> <label width="4%" name="lebmedicine4" id="lebmedicine4" ; style="display: none">Medicine4</label></td><td width="10%"><select name="med4" id="med4"  style=" width:200px; height: 25px ; display: none">
      <option value="0">No Selection</option>
      <?php
 
  $result = ($query) or die('Query failed: ' . mysql_error());
        while ($row = mysql_fetch_assoc($result)) {
            echo '<option value="' . $row['id'] . '">' . $row['product_name'] . '</option>';
        }
      ?>
    </select><input name="mmed4" id="mmed4" style="display:none"/></td><td width="4%"><input name="up4" id="up4" style=" width:80px; height: 25px; display: none" onkeyup="summed4();" readonly/>
	</td><td width="7%"><input type="text" id="qmed4" name="qmed4" style=" width:80px; height: 25px; display: none" autofocus onkeyup="summed4()"/></td>
    <td width="7%"> <input type="text" id="totmed4" name="totmed4"style=" width:80px; height: 25px; display: none"/></td><td width="25px">
	<input type="button" name="active4" id="active4" value="Add More" onclick="showline5()" style="display: none"></td><td>
<input type="button" name="remove4" id="remove4" value="Remove" onclick="hideline4()" style="display: none"></td><td></td></tr>
<tr ><td width="20px"> <label width="4%" name="lebmedicine5" id="lebmedicine5" ; style="display: none">Medicine5</label></td><td width="10%"><select name="med5" id="med5"  style=" width:200px; height: 25px ; display: none">
      <option value="0">No Selection</option>
      <?php
 
  $result = ($query) or die('Query failed: ' . mysql_error());
        while ($row = mysql_fetch_assoc($result)) {
            echo '<option value="' . $row['id'] . '">' . $row['product_name'] . '</option>';
        }
      ?>
    </select><input name="mmed5" id="mmed5" style="display:none"/></td><td width="4%"><input name="up5" id="up5" style=" width:80px; height: 25px; display: none" onkeyup="summed5();" readonly/>
	</td><td width="7%"><input type="text" id="qmed5" name="qmed5" style=" width:80px; height: 25px; display: none" autofocus onkeyup="summed5()"/></td>
    <td width="7%"> <input type="text" id="totmed5" name="totmed5"style=" width:80px; height: 25px; display: none"/></td><td width="25px">
	<input type="button" name="active5" id="active5" value="Add More" onclick="showline6()" style="display: none"></td><td>
<input type="button" name="remove5" id="remove5" value="Remove" onclick="hideline5()" style="display: none"></td><td></td></tr>
<tr ><td width="20px"> <label width="4%" name="lebmedicine6" id="lebmedicine6" ; style="display: none">Medicine6</label></td><td width="10%"><select name="med6" id="med6"  style=" width:200px; height: 25px ; display: none">
      <option value="0">No Selection</option>
      <?php
 
  $result = ($query) or die('Query failed: ' . mysql_error());
        while ($row = mysql_fetch_assoc($result)) {
            echo '<option value="' . $row['id'] . '">' . $row['product_name'] . '</option>';
        }
      ?>
    </select><input name="mmed6" id="mmed6" style="display:none"/></td><td width="4%"><input name="up6" id="up6" style=" width:80px; height: 25px; display: none" onkeyup="summed6();" readonly/>
	</td><td width="7%"><input type="text" id="qmed6" name="qmed6" style=" width:80px; height: 25px; display: none" autofocus onkeyup="summed6()"/></td>
    <td width="7%"> <input type="text" id="totmed6" name="totmed6"style=" width:80px; height: 25px; display: none"/></td><td width="25px">
	<input type="button" name="active6" id="active6" value="Add More" onclick="showline7()" style="display: none"></td><td>
<input type="button" name="remove6" id="remove6" value="Remove" onclick="hideline6()" style="display: none"></td><td></td></tr>
<tr ><td width="20px"> <label width="4%" name="lebmedicine7" id="lebmedicine7" ; style="display: none">Medicine7</label></td><td width="10%"><select name="med7" id="med7"  style=" width:200px; height: 25px ; display: none">
      <option value="0">No Selection</option>
      <?php
 
  $result = ($query) or die('Query failed: ' . mysql_error());
        while ($row = mysql_fetch_assoc($result)) {
            echo '<option value="' . $row['id'] . '">' . $row['product_name'] . '</option>';
        }
      ?>
    </select><input name="mmed7" id="mmed7" style="display: none"/></td><td width="4%"><input name="up7" id="up7" style=" width:80px; height: 25px; display: none" onkeyup="summed7();" readonly/>
	</td><td width="7%"><input type="text" id="qmed7" name="qmed7" style=" width:80px; height: 25px; display: none" autofocus onkeyup="summed7()"/></td>
    <td width="7%"> <input type="text" id="totmed7" name="totmed7"style=" width:80px; height: 25px; display: none"/></td><td width="25px">
	<input type="button" name="active7" id="active7" value="Add More"  style="display: none"></td><td>
<input type="button" name="remove7" id="remove7" value="Remove" onclick="hideline7()" style="display: none"></td><td></td></tr>

</table>

    </div>
 </div>
 

                      <div class="mytable_row ">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type=button value="CONFIRM MEDICINE" onClick="sendValue(this.form.mmed1,this.form.up1,this.form.qmed1),sendValue2(this.form.mmed2,this.form.up2,this.form.qmed2),
sendValue3(this.form.mmed3,this.form.up3,this.form.qmed3),sendValue4(this.form.mmed4,this.form.up4,this.form.qmed4),sendValue5(this.form.mmed5,this.form.up5,this.form.qmed5),
sendValue6(this.form.mmed6,this.form.up6,this.form.qmed6),sendValue7(this.form.mmed7,this.form.up7,this.form.qmed7); "/>
</form>
                      

</body>

</html>
<SCRIPT LANGUAGE="JavaScript">
<!-- Begin
function sendValue (s,x,y){
var selvalue = s.value;
var xvalue =x.value;
var yvalue =y.value;
window.opener.document.getElementById('mmed1').value = selvalue;
window.opener.document.getElementById('up1').value = xvalue;
window.opener.document.getElementById('qmed1').value = yvalue;
 
         var x = document.forms["selectform"]["qmed1"].value;
    if (x==null || x=="") {
        alert("PLEASE FILL IN QUANTITY FOR MEDICINE1");
        return false;
    }
    window.close();    
}
function sendValue2 (s2,x2,y2){
var selvalue2 = s2.value;
var xvalue2 =x2.value;
var yvalue2 =y2.value;
window.opener.document.getElementById('mmed2').value = selvalue2;
window.opener.document.getElementById('up2').value = xvalue2;
window.opener.document.getElementById('qmed2').value = yvalue2;
 
         var x = document.forms["selectform"]["qmed2"].value;
    if (x==null || x=="") {
        alert("PLEASE FILL IN QUANTITY FOR MEDICINE2");
        return false;
    }
    window.close();    
}
function sendValue3 (s3,x3,y3){
var selvalue3 = s3.value;
var xvalue3 =x3.value;
var yvalue3 =y3.value;
window.opener.document.getElementById('mmed3').value = selvalue3;
window.opener.document.getElementById('up3').value = xvalue3;
window.opener.document.getElementById('qmed3').value = yvalue3;
 
         var x = document.forms["selectform"]["qmed3"].value;
    if (x==null || x=="") {
        alert("PLEASE FILL IN QUANTITY FOR MEDICINE3");
        return false;
    }
    window.close();    
}
function sendValue4 (s4,x4,y4){
var selvalue4 = s4.value;
var xvalue4 =x4.value;
var yvalue4 =y4.value;
window.opener.document.getElementById('mmed4').value = selvalue4;
window.opener.document.getElementById('up4').value = xvalue4;
window.opener.document.getElementById('qmed4').value = yvalue4;
 
         var x = document.forms["selectform"]["qmed4"].value;
    if (x==null || x=="") {
        alert("PLEASE FILL IN QUANTITY FOR MEDICINE4");
        return false;
    }
    window.close();    
}
function sendValue5 (s5,x5,y5){
var selvalue5 = s5.value;
var xvalue5 =x5.value;
var yvalue5 =y5.value;
window.opener.document.getElementById('mmed5').value = selvalue5;
window.opener.document.getElementById('up5').value = xvalue5;
window.opener.document.getElementById('qmed5').value = yvalue5;
 
         var x = document.forms["selectform"]["qmed5"].value;
    if (x==null || x=="") {
        alert("PLEASE FILL IN QUANTITY FOR MEDICINE5");
        return false;
    }
    window.close();    
}
function sendValue6 (s6,x6,y6){
var selvalue6 = s6.value;
var xvalue6 =x6.value;
var yvalue6 =y6.value;
window.opener.document.getElementById('mmed6').value = selvalue6;
window.opener.document.getElementById('up6').value = xvalue6;
window.opener.document.getElementById('qmed6').value = yvalue6;
 
         var x = document.forms["selectform"]["qmed6"].value;
    if (x==null || x=="") {
        alert("PLEASE FILL IN QUANTITY FOR MEDICINE6");
        return false;
    }
    window.close();    
}
function sendValue7 (s7,x7,y7){
var selvalue7 = s7.value;
var xvalue7 =x7.value;
var yvalue7 =y7.value;
window.opener.document.getElementById('mmed7').value = selvalue7;
window.opener.document.getElementById('up7').value = xvalue7;
window.opener.document.getElementById('qmed7').value = yvalue7;
 
         var x = document.forms["selectform"]["qmed7"].value;
    if (x==null || x=="") {
        alert("PLEASE FILL IN QUANTITY FOR MEDICINE7");
        return false;
    }
    window.close();    
}

</script>

    <script src="js/jquery.min.js"></script>
    <script>
      function insertResults(json){
        $("#up1").val(json["unit_price"]);
		$("#mmed1").val(json["product_name"]);


      }

      function clearForm(){
        $("#up1,#mmed1").val("");
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
      var txtFirstNumberValue = document.getElementById('up1').value;
      var txtSecondNumberValue = document.getElementById('qmed1').value;
      var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('totmed1').value = result;
      }
}
	 <!--Line2-->
      function insertResults2(json){
        $("#up2").val(json["unit_price"]);
		$("#mmed2").val(json["product_name"]);


      }
	  function setFocusToTextBoxmed2(){
		document.getElementById("qmed2").focus();
		}

      function clearForm2(){
        $("#up2,#mmed2").val("");
      }

      function makeAjaxRequest2(placeId){
        $.ajax({
          type: "POST",
          data: { placeId: placeId },
          dataType: "json", 
          url: "process_ajax.php",
          success: function(json) {
            insertResults2(json);
          }
        });
      }

      $("#med2").on("change", function(){
        var id = $(this).val();
        if (id === "0"){
          clearForm2();
} else {
          makeAjaxRequest2(id);
		  setFocusToTextBoxmed2();
		document.getElementById('qmed2').value = '';
		document.getElementById('totmed2').value = '';
        }
      });
	  function summed2() {
      var txtFirstNumberValue = document.getElementById('up2').value;
      var txtSecondNumberValue = document.getElementById('qmed2').value;
      var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('totmed2').value = result;
      }
}
 <!--Line3-->
      function insertResults3(json){
        $("#up3").val(json["unit_price"]);
		$("#mmed3").val(json["product_name"]);


      }

      function clearForm3(){
        $("#up3,#up3").val("");
      }
   function setFocusToTextBoxmed3(){
		document.getElementById("qmed3").focus();
		}
      function makeAjaxRequest3(placeId){
        $.ajax({
          type: "POST",
          data: { placeId: placeId },
          dataType: "json", 
          url: "process_ajax.php",
          success: function(json) {
            insertResults3(json);
          }
        });
      }

      $("#med3").on("change", function(){
        var id = $(this).val();
        if (id === "0"){
          clearForm3();
} else {
          makeAjaxRequest3(id);
		  setFocusToTextBoxmed3();
		document.getElementById('qmed3').value = '';
		document.getElementById('totmed3').value = '';
        }
      });
	  function summed3() {
      var txtFirstNumberValue = document.getElementById('up3').value;
      var txtSecondNumberValue = document.getElementById('qmed3').value;
      var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('totmed3').value = result;
      }
}
 <!--Line4-->
      function insertResults4(json){
        $("#up4").val(json["unit_price"]);
        $("#mmed4").val(json["product_name"]);

      }

      function clearForm4(){
        $("#up4,#mmed4").val("");
      }
   function setFocusToTextBoxmed4(){
		document.getElementById("qmed4").focus();
		}
      function makeAjaxRequest4(placeId){
        $.ajax({
          type: "POST",
          data: { placeId: placeId },
          dataType: "json", 
          url: "process_ajax.php",
          success: function(json) {
            insertResults4(json);
          }
        });
      }

      $("#med4").on("change", function(){
        var id = $(this).val();
        if (id === "0"){
          clearForm4();
} else {
          makeAjaxRequest4(id);
		  setFocusToTextBoxmed4();
		document.getElementById('qmed4').value = '';
		document.getElementById('totmed4').value = '';
        }
      });
	  function summed4() {
      var txtFirstNumberValue = document.getElementById('up4').value;
      var txtSecondNumberValue = document.getElementById('qmed4').value;
      var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('totmed4').value = result;
      }
}	  
<!--Line5-->
      function insertResults5(json){
        $("#up5").val(json["unit_price"]);
        $("#mmed5").val(json["product_name"]);

      }

      function clearForm5(){
        $("#up5,#mmed5").val("");
      }
   function setFocusToTextBoxmed5(){
		document.getElementById("qmed5").focus();
		}
      function makeAjaxRequest5(placeId){
        $.ajax({
          type: "POST",
          data: { placeId: placeId },
          dataType: "json", 
          url: "process_ajax.php",
          success: function(json) {
            insertResults5(json);
          }
        });
      }

      $("#med5").on("change", function(){
        var id = $(this).val();
        if (id === "0"){
          clearForm5();
} else {
          makeAjaxRequest5(id);
		  setFocusToTextBoxmed5();
		document.getElementById('qmed5').value = '';
		document.getElementById('totmed5').value = '';
        }
      });
	  function summed5() {
      var txtFirstNumberValue = document.getElementById('up5').value;
      var txtSecondNumberValue = document.getElementById('qmed5').value;
      var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('totmed5').value = result;
      }
}	  
<!--Line6-->
      function insertResults6(json){
        $("#up6").val(json["unit_price"]);
        $("#mmed6").val(json["product_name"]);

      }

      function clearForm6(){
        $("#up6,#mmed6").val("");
      }
   function setFocusToTextBoxmed6(){
		document.getElementById("qmed6").focus();
		}
      function makeAjaxRequest6(placeId){
        $.ajax({
          type: "POST",
          data: { placeId: placeId },
          dataType: "json", 
          url: "process_ajax.php",
          success: function(json) {
            insertResults6(json);
          }
        });
      }

      $("#med6").on("change", function(){
        var id = $(this).val();
        if (id === "0"){
          clearForm6();
} else {
          makeAjaxRequest6(id);
		  setFocusToTextBoxmed6();
		document.getElementById('qmed6').value = '';
		document.getElementById('totmed6').value = '';
        }
      });

	  function summed6() {
      var txtFirstNumberValue = document.getElementById('up6').value;
      var txtSecondNumberValue = document.getElementById('qmed6').value;
      var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('totmed6').value = result;
      }
}
<!--Line7-->
      function insertResults7(json){
        $("#up7").val(json["unit_price"]);
        $("#mmed7").val(json["product_name"]);

      }

      function clearForm7(){
        $("#up7,#mmed7").val("");
      }
   function setFocusToTextBoxmed7(){
		document.getElementById("qmed7").focus();
		}
      function makeAjaxRequest7(placeId){
        $.ajax({
          type: "POST",
          data: { placeId: placeId },
          dataType: "json", 
          url: "process_ajax.php",
          success: function(json) {
            insertResults7(json);
          }
        });
      }

      $("#med7").on("change", function(){
        var id = $(this).val();
        if (id === "0"){
          clearForm7();
} else {
          makeAjaxRequest7(id);
		  setFocusToTextBoxmed7();
		document.getElementById('qmed7').value = '';
		document.getElementById('totmed7').value = '';
        }
      });
	  function summed7() {
      var txtFirstNumberValue = document.getElementById('up7').value;
      var txtSecondNumberValue = document.getElementById('qmed7').value;
      var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('totmed7').value = result;
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
}
function showline1() {
   document.getElementById('lebmedicine2').style.display = "block";
   document.getElementById('med2').style.display = "block";
   document.getElementById('up2').style.display = "block";
   document.getElementById('qmed2').style.display = "block";
   document.getElementById('totmed2').style.display = "block";
   document.getElementById('active2').style.display = "block";
   document.getElementById('remove2').style.display = "block";

}
function showline3() {
   document.getElementById('lebmedicine3').style.display = "block";
   document.getElementById('med3').style.display = "block";
   document.getElementById('up3').style.display = "block";
   document.getElementById('qmed3').style.display = "block";
   document.getElementById('totmed3').style.display = "block";
   document.getElementById('active3').style.display = "block";
   document.getElementById('remove3').style.display = "block";

}

function showline4() {
   document.getElementById('lebmedicine4').style.display = "block";
   document.getElementById('med4').style.display = "block";
   document.getElementById('up4').style.display = "block";
   document.getElementById('qmed4').style.display = "block";
   document.getElementById('totmed4').style.display = "block";
   document.getElementById('active4').style.display = "block";
   document.getElementById('remove4').style.display = "block";

}
function showline5() {
   document.getElementById('lebmedicine5').style.display = "block";
   document.getElementById('med5').style.display = "block";
   document.getElementById('up5').style.display = "block";
   document.getElementById('qmed5').style.display = "block";
   document.getElementById('totmed5').style.display = "block";
   document.getElementById('active5').style.display = "block";
   document.getElementById('remove5').style.display = "block";

}
function showline6() {
   document.getElementById('lebmedicine6').style.display = "block";
   document.getElementById('med6').style.display = "block";
   document.getElementById('up6').style.display = "block";
   document.getElementById('qmed6').style.display = "block";
   document.getElementById('totmed6').style.display = "block";
   document.getElementById('active6').style.display = "block";
   document.getElementById('remove6').style.display = "block";
}
function showline7() {
   document.getElementById('lebmedicine7').style.display = "block";
   document.getElementById('med7').style.display = "block";
   document.getElementById('up7').style.display = "block";
   document.getElementById('qmed7').style.display = "block";
   document.getElementById('totmed7').style.display = "block";
   document.getElementById('active7').style.display = "block";
   document.getElementById('remove7').style.display = "block";

}

function hideline1() {
   document.getElementById('lebmedicine2').style.display = "none";
   document.getElementById('med2').style.display = "none";
   document.getElementById('up2').style.display = "none";
   document.getElementById('qmed2').style.display = "none";
   document.getElementById('totmed2').style.display = "none";
   document.getElementById('active2').style.display = "none";
   document.getElementById('remove2').style.display = "none";
}
function hideline3() {
   document.getElementById('lebmedicine3').style.display = "none";
   document.getElementById('med3').style.display = "none";
   document.getElementById('up3').style.display = "none";
   document.getElementById('qmed3').style.display = "none";
   document.getElementById('totmed3').style.display = "none";
   document.getElementById('active3').style.display = "none";
   document.getElementById('remove3').style.display = "none";
}
function hideline4() {
   document.getElementById('lebmedicine4').style.display = "none";
   document.getElementById('med4').style.display = "none";
   document.getElementById('up4').style.display = "none";
   document.getElementById('qmed4').style.display = "none";
   document.getElementById('totmed4').style.display = "none";
   document.getElementById('active4').style.display = "none";
   document.getElementById('remove4').style.display = "none";
}
function hideline5() {
   document.getElementById('lebmedicine5').style.display = "none";
   document.getElementById('med5').style.display = "none";
   document.getElementById('up5').style.display = "none";
   document.getElementById('qmed5').style.display = "none";
   document.getElementById('totmed5').style.display = "none";
   document.getElementById('active5').style.display = "none";
   document.getElementById('remove5').style.display = "none";
}
function hideline6() {
   document.getElementById('lebmedicine6').style.display = "none";
   document.getElementById('med6').style.display = "none";
   document.getElementById('up6').style.display = "none";
   document.getElementById('qmed6').style.display = "none";
   document.getElementById('totmed6').style.display = "none";
   document.getElementById('active6').style.display = "none";
   document.getElementById('remove6').style.display = "none";
}
function hideline7() {
   document.getElementById('lebmedicine7').style.display = "none";
   document.getElementById('med7').style.display = "none";
   document.getElementById('up7').style.display = "none";
   document.getElementById('qmed7').style.display = "none";
   document.getElementById('totmed7').style.display = "none";
   document.getElementById('active7').style.display = "none";
   document.getElementById('remove7').style.display = "none";
}
</script>

