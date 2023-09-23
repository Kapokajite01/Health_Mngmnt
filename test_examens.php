
<html>

<?php
include_once('connect_db.php');
  $query = "SELECT * from examens order by name_examen";

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
					<h3 align="center">[CHECK LAB TEST TO ADD TO CONSUMPTIONS]</h3>
					</div> <!-- end content-module-heading -->
					
						<div class="content-module-main cf">
				

				
<form method="post" action="add_test" name="selectform">
    <table  width="20%"><tr ><td width="20px"> <label width="4%" name="labtest1" id="labtest1">LAB_TEST1</label></td><td width="10%"><select name="ex1" id="ex1"  style=" width:200px; height: 25px ">
      <option value="0">No Selection</option>
      <?php
 $hiosp = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($hiosp)) {
            echo '<option value="' . $row['id'] . '">' . $row['name_examen'] . '</option>';
        }
      ?>
    </select><input name="eex1" id="eex1" style="display:none"></td><td width="4%"><input name="upex1" id="upex1" style=" width:80px; height: 25px" readonly onkeyup="sumEx1()"/>
	</td><td width="7%"><input type="text" id="qex1" name="qex1" style=" width:80px; height: 25px" autofocus onkeyup="sumEx1()"></td>
    <td width="7%"> <input type="text" id="totex1" name="totex1"style=" width:80px; height: 25px"/></td><td width="25px">
	<input type="button" name="activex1" id="activex1" value="Add More" onclick="showlinex2()"></td><td>
<input type="button" name="removex1" id="removex1" value="Remove" onclick="hidelinex1()"></td><td></td></tr>
<tr ><td width="20px"> <label width="4%" name="labtest2" id="labtest2" style="display:none">LAB_TEST2</label></td><td width="10%"><select name="ex2" id="ex2"  style=" width:200px; height: 25px;display:none">
      <option value="0">No Selection</option>
      <?php
 
 $hiosp = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($hiosp)) {
            echo '<option value="' . $row['id'] . '">' . $row['name_examen'] . '</option>';
        }
      ?>
    </select><input name="eexe2" id="eexe2" style="display:none"></td><td width="4%"><input name="upex2" id="upex2" style=" width:80px; height: 25px;display: none " readonly onkeyup="sumEx2()"/>
	</td><td width="7%"><input type="text" id="qex2" name="qex2" style=" width:80px; height: 25px; display: none"  onkeyup="sumEx2()"/></td>
    <td width="7%"> <input type="text" id="totex2" name="totex2"style=" width:80px; height: 25px; display:none"/></td><td width="25px">
	<input type="button" name="activex2" id="activex2" value="Add More" onclick="showlinex3()" style="display:none"></td><td>
<input type="button" name="removex2" id="removex2" value="Remove" onclick="hidelinex2()" style="display: none"></td><td></td></tr>
<tr ><td width="20px"> <label width="4%" name="labtest3" id="labtest3" style="display:none">LAB_TEST3</label></td><td width="10%"><select name="ex3" id="ex3"  style=" width:200px; height: 25px;display:none">
      <option value="0">No Selection</option>
      <?php
 
 $hiosp = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($hiosp)) {
            echo '<option value="' . $row['id'] . '">' . $row['name_examen'] . '</option>';
        }
      ?>
    </select><input name="eexe3" id="eexe3" style="display:none"></td><td width="4%"><input name="upex3" id="upex3" style=" width:80px; height: 25px;display: none " readonly onkeyup="sumEx3()"/>
	</td><td width="7%"><input type="text" id="qex3" name="qex3" style=" width:80px; height: 25px; display: none" onkeyup="sumEx3()"/></td>
    <td width="7%"> <input type="text" id="totex3" name="totex3"style=" width:80px; height: 25px; display:none"/></td><td width="25px">
	<input type="button" name="activex3" id="activex3" value="Add More" onclick="showlinex4()" style="display:none"></td><td>
<input type="button" name="removex3" id="removex3" value="Remove" onclick="hidelinex3()" style="display: none"></td><td></td></tr>
<tr ><td width="20px"> <label width="4%" name="labtest4" id="labtest4" style="display:none">LAB_TEST4</label></td><td width="10%"><select name="ex4" id="ex4"  style=" width:200px; height: 25px;display:none">
      <option value="0">No Selection</option>
      <?php
 $hiosp = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($hiosp)) {
            echo '<option value="' . $row['id'] . '">' . $row['name_examen'] . '</option>';
        }
      ?>
    </select><input name="eexe4" id="eexe4" style="display:none"></td><td width="4%"><input name="upex4" id="upex4" style=" width:80px; height: 25px;display: none " readonly onkeyup="sumEx4()"/>
	</td><td width="7%"><input type="text" id="qex4" name="qex4" style=" width:80px; height: 25px; display: none" onkeyup="sumEx4()"/></td>
    <td width="7%"> <input type="text" id="totex4" name="totex4"style=" width:80px; height: 25px; display:none"/></td><td width="25px">
	<input type="button" name="activex4" id="activex4" value="Add More" onclick="showlinex5()" style="display:none"></td><td>
<input type="button" name="removex4" id="removex4" value="Remove" onclick="hidelinex4()" style="display: none"></td><td></td></tr>
<tr ><td width="20px"> <label width="4%" name="labtest5" id="labtest5" style="display:none">LAB_TEST5</label></td><td width="10%"><select name="ex5" id="ex5"  style=" width:200px; height: 25px;display:none">
      <option value="0">No Selection</option>
      <?php
 $hiosp = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($hiosp)) {
            echo '<option value="' . $row['id'] . '">' . $row['name_examen'] . '</option>';
        }
      ?>
    </select><input name="eexe5" id="eexe5" style="display:none"></td><td width="4%"><input name="upex5" id="upex5" style=" width:80px; height: 25px;display: none " readonly onkeyup="sumEx5()"/>
	</td><td width="7%"><input type="text" id="qex5" name="qex5" style=" width:80px; height: 25px; display: none" onkeyup="sumEx5()"/></td>
    <td width="7%"> <input type="text" id="totex5" name="totex5"style=" width:80px; height: 25px; display:none"/></td><td width="25px">
	<input type="button" name="activex5" id="activex5" value="Add More" onclick="showlinex6()" style="display:none"></td><td>
<input type="button" name="removex5" id="removex5" value="Remove" onclick="hidelinex5()" style="display: none"></td><td></td></tr>
<tr ><td width="20px"> <label width="4%" name="labtest6" id="labtest6" style="display:none">LAB_TEST6</label></td><td width="10%"><select name="ex6" id="ex6"  style=" width:200px; height: 25px;display:none">
      <option value="0">No Selection</option>
      <?php
 $hiosp = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($hiosp)) {
            echo '<option value="' . $row['id'] . '">' . $row['name_examen'] . '</option>';
        }
      ?>
    </select><input name="eexe6" id="eexe6" style="display:none"></td><td width="4%"><input name="upex6" id="upex6" style=" width:80px; height: 25px;display: none " readonly onkeyup="sumEx6()"/>
	</td><td width="7%"><input type="text" id="qex6" name="qex6" style=" width:80px; height: 25px; display: none"  onkeyup="sumEx6()"/></td>
    <td width="7%"> <input type="text" id="totex6" name="totex6"style=" width:80px; height: 25px; display:none"/></td><td width="25px">
	<input type="button" name="activex6" id="activex6" value="Add More" onclick="showlinex7()" style="display:none"></td><td>
<input type="button" name="removex6" id="removex6" value="Remove" onclick="hidelinex6()" style="display: none"></td><td></td></tr>
<tr ><td width="20px"> <label width="4%" name="labtest7" id="labtest7" style="display:none">LAB_TEST7</label></td><td width="10%"><select name="ex7" id="ex7"  style=" width:200px; height: 25px;display:none">
      <option value="0">No Selection</option>
      <?php
 
  $hiosp = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($hiosp)) {
            echo '<option value="' . $row['id'] . '">' . $row['name_examen'] . '</option>';
        }
      ?>
    </select><input name="eexe7" id="eexe7" style="display:none"></td><td width="4%"><input name="upex7" id="upex7" style=" width:80px; height: 25px;display: none " readonly onkeyup="sumEx7()"/>
	</td><td width="7%"><input type="text" id="qex7" name="qex7" style=" width:80px; height: 25px; display: none"  onkeyup="sumEx7()"/></td>
    <td width="7%"> <input type="text" id="totex7" name="totex7"style=" width:80px; height: 25px; display:none"/></td><td width="25px">
	<input type="button" name="activex6" id="activex7" value="Add More" style="display:none"></td><td>
<input type="button" name="removex7" id="removex7" value="Remove" onclick="hidelinex7()" style="display: none"></td><td></td></tr>

</table>

    </div>
 </div>
                       <div class="mytable_row ">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type=button value="CONFIRM LAB TESTS" onClick="sendValues(this.form.eex1,this.form.upex1,this.form.qex1,this.form.eexe2,this.form.upex2,this.form.qex2,this.form.eexe3,this.form.upex3,this.form.qex3,this.form.eexe4,this.form.upex4,this.form.qex4
,this.form.eexe5,this.form.upex5,this.form.qex5,this.form.eexe6,this.form.upex6,this.form.qex6,this.form.eexe7,this.form.upex7,this.form.qex7); "/>

<br><br><br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" name="gotoadd" value="ADD NEW LAB TEST"></form>
                       </div>
					</div> <!-- end content-module-main --></div> <!-- end content-module -->
		</div></div> <!-- end full-width -->
			
	</div> <!-- end content -->
	<!-- FOOTER -->
	<div id="footer">
		<p>Powed By Vision Soft Ltd .</p>
	
	</div> <!-- end footer -->

</body>
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


window.opener.document.getElementById('eex1').value = selvalue;
window.opener.document.getElementById('upex1').value = xvalue;
window.opener.document.getElementById('qex1').value = yvalue;

window.opener.document.getElementById('eexe2').value = selvalue2;
window.opener.document.getElementById('upex2').value = xvalue2;
window.opener.document.getElementById('qex2').value = yvalue2;

window.opener.document.getElementById('eexe3').value = selvalue3;
window.opener.document.getElementById('upex3').value = xvalue3;
window.opener.document.getElementById('qex3').value = yvalue3;

window.opener.document.getElementById('eexe4').value = selvalue4;
window.opener.document.getElementById('upex4').value = xvalue4;
window.opener.document.getElementById('qex4').value = yvalue4;
 
window.opener.document.getElementById('eexe5').value = selvalue5;
window.opener.document.getElementById('upex5').value = xvalue5;
window.opener.document.getElementById('qex5').value = yvalue5;

window.opener.document.getElementById('eexe6').value = selvalue6;
window.opener.document.getElementById('upex6').value = xvalue6;
window.opener.document.getElementById('qex6').value = yvalue6;

window.opener.document.getElementById('eexe7').value = selvalue7;
window.opener.document.getElementById('upex7').value = xvalue7;
window.opener.document.getElementById('qex7').value = yvalue7;

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
	
	if( xtest2 != ""){
         var xqex2 = document.forms["selectform"]["qex2"].value;
    if (xqex2==null || xqex2==""|| xqex2==0) {
        alert("PLEASE FILL IN QUANTITY FOR TEST2");
        return false;
    }
	}
	if( xtest3 != ""){
         var xqex3 = document.forms["selectform"]["qex3"].value;
    if (xqex3==null || xqex3=="" || xqex3==0) {
        alert("PLEASE FILL IN QUANTITY FOR TEST3");
        return false;
    }
	}
	if( xtest4 != ""){
         var xqex4 = document.forms["selectform"]["qex4"].value;
    if (xqex4==null || xqex4=="" || xqex4==0) {
        alert("PLEASE FILL IN QUANTITY FOR TEST4");
        return false;
    }
	}
	if( xtest5 != ""){
         var xqex5 = document.forms["selectform"]["qex5"].value;
    if (xqex5==null || xqex5=="" || xqex5==0) {
        alert("PLEASE FILL IN QUANTITY FOR TEST5");
        return false;
    }
	}
	
	if( xtest6 != ""){
         var xqex6 = document.forms["selectform"]["qex6"].value;
    if (xqex6==null || xqex6=="" || xqex6==0) {
        alert("PLEASE FILL IN QUANTITY FOR TEST6");
        return false;
    }
	}
	
	if( xtest7 != ""){
         var xqex7 = document.forms["selectform"]["qex7"].value;
    if (xqex7==null || xqex7==""  || xqex7==0) {
        alert("PLEASE FILL IN QUANTITY FOR TEST7");
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


      }

      function clearFormex1(){
        $("#upex1,#eex1").val("");
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
		document.getElementById("qex1").focus();
		}

      $("#ex1").on("change", function(){
        var id = $(this).val();
        if (id === "0"){
          clearFormex1();
} else {
          makeAjaxRequestex1(id);
		  setFocusToTextBoxex1();
		document.getElementById('qex1').value = '';
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

      }

      function clearFormex2(){
        $("#upex2,#eexe2").val("");
      }
	function setFocusToTextBoxex2(){
		document.getElementById("qex2").focus();
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
		document.getElementById('qex2').value = '';
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


      }

      function clearFormex3(){
        $("#upex3,#eexe3").val("");
      }
	function setFocusToTextBoxex3(){
		document.getElementById("qex3").focus();
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
		document.getElementById('qex3').value = '';
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

      }

      function clearFormex4(){
        $("#upex4,#eexe4").val("");
      }
	function setFocusToTextBoxex4(){
		document.getElementById("qex4").focus();
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
		document.getElementById('qex4').value = '';
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

      }

      function clearFormex5(){
        $("#upex5,#eexe5").val("");
      }
	function setFocusToTextBoxex5(){
		document.getElementById("qex5").focus();
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
		document.getElementById('qex5').value = '';
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

      }

      function clearFormex6(){
        $("#upex6,#eexe6").val("");
      }
	function setFocusToTextBoxex6(){
		document.getElementById("qex6").focus();
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
		document.getElementById('qex6').value = '';
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

      }

      function clearFormex7(){
        $("#upex7,#eexe7").val("");
      }
	function setFocusToTextBoxex7(){
		document.getElementById("qex7").focus();
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
		document.getElementById('qex7').value = '';
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





