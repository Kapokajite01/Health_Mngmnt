

<?php
 # Connect
  mysql_connect('localhost', 'root', 'fidele') or die('Could not connect: ' . mysql_error());
   
  # Choose a database
  mysql_select_db('dirskhpe_rangiro') or die('Could not select database');
   
  # Perform database query
  $query = "SELECT * from hospitalisation order by name_hospitalisation";

?>


	
</head>
<body>

	<!-- TOP BAR -->
	<!-- TOP BAR -->
	<?php
	include_once('menus.php');

	?>
	
	
	<div id="content">
		
		<div class="page-full-width cf">

			 <!-- end side-menu -->
			
			<div class="side-content fr">
			
				<div class="content-module">
				
					<div class="content-module-heading cf">
						<span class="fr expand-collapse-text"> Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					<h3 align="center">[CHECK HOSPITALISATION TO ADD TO CONSUMPTIONS]</h3>
					</div> <!-- end content-module-heading -->
					
						<div class="content-module-main cf">
				

				
	<form name="consform" id="consform" method="POST" action="patient.php">			
    <table  width="20%"><tr ><td width="20px"> <label width="4%" name="hospit1" id="hospit1">HOSPTALISATION1</label></td><td width="10%"><select name="hop1" id="hop1"  style=" width:200px; height: 25px ">
      <option value="0">No Selection</option>
      <?php
 
  $result = ($query) or die('Query failed: ' . mysql_error());
        while ($row = mysql_fetch_assoc($result)) {
            echo '<option value="' . $row['id'] . '">' . $row['name_hospitalisation'] . '</option>';
        }
      ?>
    </select></td><td width="4%"><input name="phop1" id="phop1" style=" width:80px; height: 25px "/>
	</td><td width="7%"><input type="text" id="qhosp1" name="qhosp1" style=" width:80px; height: 25px"/></td>
    <td width="7%"> <input type="text" id="tothosp1" name="tothosp1"style=" width:80px; height: 25px"/></td><td width="25px">
	<input type="button" name="activehosp1" id="activehosp1" value="Add More" onclick="showlinehosp2()"></td><td>
<input type="button" name="removehosp1" id="removehosp1" value="Remove" onclick="hidelinehosp1()"></td><td></td></tr>
<tr ><td width="20px"> <label width="4%" name="hospit2" id="hospit2" style="display:none">HOSPTALISATION2</label></td><td width="10%"><select name="hop2" id="hop2"  style=" width:200px; height: 25px; display:none ">
      <option value="0">No Selection</option>
      <?php
 
  $result = ($query) or die('Query failed: ' . mysql_error());
        while ($row = mysql_fetch_assoc($result)) {
            echo '<option value="' . $row['id'] . '">' . $row['name_hospitalisation'] . '</option>';
        }
      ?>
    </select></td><td width="4%"><input name="phop2" id="phop2" style=" width:80px; height: 25px; display:none "/>
	</td><td width="7%"><input type="text" id="qhosp2" name="qhosp2" style=" width:80px; height: 25px; display: none"/></td>
    <td width="7%"> <input type="text" id="tothosp2" name="tothosp2"style=" width:80px; height: 25px;display:none"/></td><td width="25px">
	<input type="button" name="activehosp2" id="activehosp2" value="Add More" onclick="showlinehosp3()" style="display:none"></td><td>
<input type="button" name="removehosp2" id="removehosp2" value="Remove" onclick="hidelinehosp2()" style="display:none"></td><td></td></tr>
<tr ><td width="20px"> <label width="4%" name="hospit3" id="hospit3" style="display:none">HOSPTALISATION3</label></td><td width="10%"><select name="hop3" id="hop3"  style=" width:200px; height: 25px; display:none ">
      <option value="0">No Selection</option>
      <?php
 
  $result = ($query) or die('Query failed: ' . mysql_error());
        while ($row = mysql_fetch_assoc($result)) {
            echo '<option value="' . $row['id'] . '">' . $row['name_hospitalisation'] . '</option>';
        }
      ?>
    </select></td><td width="4%"><input name="phop3" id="phop3" style=" width:80px; height: 25px; display:none "/>
	</td><td width="7%"><input type="text" id="qhosp3" name="qhosp3" style=" width:80px; height: 25px; display: none"/></td>
    <td width="7%"> <input type="text" id="tothosp3" name="tothosp3"style=" width:80px; height: 25px;display:none"/></td><td width="25px">
	<input type="button" name="activehosp3" id="activehosp3" value="Add More" onclick="showlinehosp4()" style="display:none"></td><td>
<input type="button" name="removehosp3" id="removehosp3" value="Remove" onclick="hidelinehosp3()" style="display:none"></td><td></td></tr>
<tr ><td width="20px"> <label width="4%" name="hospit4" id="hospit4" style="display:none">HOSPTALISATION4</label></td><td width="10%"><select name="hop4" id="hop4"  style=" width:200px; height: 25px; display:none ">
      <option value="0">No Selection</option>
      <?php
 
  $result = ($query) or die('Query failed: ' . mysql_error());
        while ($row = mysql_fetch_assoc($result)) {
            echo '<option value="' . $row['id'] . '">' . $row['name_hospitalisation'] . '</option>';
        }
      ?>
    </select></td><td width="4%"><input name="phop4" id="phop4" style=" width:80px; height: 25px; display:none "/>
	</td><td width="7%"><input type="text" id="qhosp4" name="qhosp4" style=" width:80px; height: 25px; display: none"/></td>
    <td width="7%"> <input type="text" id="tothosp4" name="tothosp4"style=" width:80px; height: 25px;display:none"/></td><td width="25px">
	<input type="button" name="activehosp4" id="activehosp4" value="Add More" onclick="showlinehosp5()" style="display:none"></td><td>
<input type="button" name="removehosp4" id="removehosp4" value="Remove" onclick="hidelinehosp4()" style="display:none"></td><td></td></tr>
<tr ><td width="20px"> <label width="4%" name="hospit5" id="hospit5" style="display:none">HOSPTALISATION5</label></td><td width="10%"><select name="hop5" id="hop5"  style=" width:200px; height: 25px; display:none ">
      <option value="0">No Selection</option>
      <?php
 
  $result = ($query) or die('Query failed: ' . mysql_error());
        while ($row = mysql_fetch_assoc($result)) {
            echo '<option value="' . $row['id'] . '">' . $row['name_hospitalisation'] . '</option>';
        }
      ?>
    </select></td><td width="4%"><input name="phop5" id="phop5" style=" width:80px; height: 25px; display:none "/>
	</td><td width="7%"><input type="text" id="qhosp5" name="qhosp5" style=" width:80px; height: 25px; display: none"/></td>
    <td width="7%"> <input type="text" id="tothosp5" name="tothosp5"style=" width:80px; height: 25px;display:none"/></td><td width="25px">
	<input type="button" name="activehosp5" id="activehosp5" value="Add More" onclick="showlinehosp6()" style="display:none"></td><td>
<input type="button" name="removehosp5" id="removehosp5" value="Remove" onclick="hidelinehosp5()" style="display:none"></td><td></td></tr>
<tr ><td width="20px"> <label width="4%" name="hospit6" id="hospit6" style="display:none">HOSPTALISATION6</label></td><td width="10%"><select name="hop6" id="hop6"  style=" width:200px; height: 25px; display:none ">
      <option value="0">No Selection</option>
      <?php
 
  $result = ($query) or die('Query failed: ' . mysql_error());
        while ($row = mysql_fetch_assoc($result)) {
            echo '<option value="' . $row['id'] . '">' . $row['name_hospitalisation'] . '</option>';
        }
      ?>
    </select></td><td width="4%"><input name="phop6" id="phop6" style=" width:80px; height: 25px; display:none "/>
	</td><td width="7%"><input type="text" id="qhosp6" name="qhosp6" style=" width:80px; height: 25px; display: none"/></td>
    <td width="7%"> <input type="text" id="tothosp6" name="tothosp6"style=" width:80px; height: 25px;display:none"/></td><td width="25px">
	<input type="button" name="activehosp6" id="activehosp6" value="Add More" onclick="showlinehosp7()" style="display:none"></td><td>
<input type="button" name="removehosp6" id="removehosp6" value="Remove" onclick="hidelinehosp6()" style="display:none"></td><td></td></tr>
<tr ><td width="20px"> <label width="4%" name="hospit7" id="hospit7" style="display:none">HOSPTALISATION7</label></td><td width="10%"><select name="hop7" id="hop7"  style=" width:200px; height: 25px; display:none ">
      <option value="0">No Selection</option>
      <?php
 
  $result = ($query) or die('Query failed: ' . mysql_error());
        while ($row = mysql_fetch_assoc($result)) {
            echo '<option value="' . $row['id'] . '">' . $row['name_hospitalisation'] . '</option>';
        }
      ?>
    </select></td><td width="4%"><input name="phop7" id="phop7" style=" width:80px; height: 25px; display:none "/>
	</td><td width="7%"><input type="text" id="qhosp7" name="qhosp7" style=" width:80px; height: 25px; display: none"/></td>
    <td width="7%"> <input type="text" id="tothosp7" name="tothosp7"style=" width:80px; height: 25px;display:none"/></td><td width="25px">
	<input type="button" name="activehosp7" id="activehosp7" value="Add More" style="display:none"></td><td>
<input type="button" name="removehosp7" id="removehosp7" value="Remove" onclick="hidelinehosp7()" style="display:none"></td><td></td></tr>


</table>

    </div>
 </div>
                       <div class="mytable_row ">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" name="conf" id="conf" value="CONFIRM HOSPITALISATIONS">
</form>
                       </div>
					</div> <!-- end content-module-main --></div> <!-- end content-module -->
		</div></div> <!-- end full-width -->
			
	</div> <!-- end content -->
	<!-- FOOTER -->
	<div id="footer">
		<p>Powed By Vision Soft Ltd .</p>
	
	</div> <!-- end footer -->

</body>
</html>
<script src="js/jquery.min.js"></script>
    <script>
       <!-- Hospitalisation1-->
	   function insertResultshosp1(json){
        $("#phop1").val(json["unit_price"]);

      }

      function clearFormhosp1(){
        $("#phop1").val("");
      }

      function makeAjaxRequesthosp1(placeId){
        $.ajax({
          type: "POST",
          data: { placeId: placeId },
          dataType: "json", 
          url: "process_ajax4.php",
          success: function(json) {
            insertResultshosp1(json);
          }
        });
      }

      $("#hop1").on("change", function(){
        var id = $(this).val();
        if (id === "0"){
          clearFormhosp1();
} else {
          makeAjaxRequesthosp1(id);
        }
      });
       <!-- Hospitalisation2-->
	   function insertResultshosp2(json){
        $("#phop2").val(json["unit_price"]);

      }

      function clearFormhosp2(){
        $("#phop2").val("");
      }

      function makeAjaxRequesthosp2(placeId){
        $.ajax({
          type: "POST",
          data: { placeId: placeId },
          dataType: "json", 
          url: "process_ajax4.php",
          success: function(json) {
            insertResultshosp2(json);
          }
        });
      }

      $("#hop2").on("change", function(){
        var id = $(this).val();
        if (id === "0"){
          clearFormhosp2();
} else {
          makeAjaxRequesthosp2(id);
        }
      });
	  
      <!-- Hospitalisation3-->
	   function insertResultshosp3(json){
        $("#phop3").val(json["unit_price"]);

      }

      function clearFormhosp3(){
        $("#phop3").val("");
      }

      function makeAjaxRequesthosp3(placeId){
        $.ajax({
          type: "POST",
          data: { placeId: placeId },
          dataType: "json", 
          url: "process_ajax4.php",
          success: function(json) {
            insertResultshosp3(json);
          }
        });
      }

      $("#hop3").on("change", function(){
        var id = $(this).val();
        if (id === "0"){
          clearFormhosp3();
} else {
          makeAjaxRequesthosp3(id);
        }
      });
	 <!-- Hospitalisation4-->
	   function insertResultshosp4(json){
        $("#phop4").val(json["unit_price"]);

      }

      function clearFormhosp4(){
        $("#phop4").val("");
      }

      function makeAjaxRequesthosp4(placeId){
        $.ajax({
          type: "POST",
          data: { placeId: placeId },
          dataType: "json", 
          url: "process_ajax4.php",
          success: function(json) {
            insertResultshosp4(json);
          }
        });
      }

      $("#hop4").on("change", function(){
        var id = $(this).val();
        if (id === "0"){
          clearFormhosp4();
} else {
          makeAjaxRequesthosp4(id);
        }
      });
	 <!-- Hospitalisation5-->
	   function insertResultshosp5(json){
        $("#phop5").val(json["unit_price"]);

      }

      function clearFormhosp5(){
        $("#phop5").val("");
      }

      function makeAjaxRequesthosp5(placeId){
        $.ajax({
          type: "POST",
          data: { placeId: placeId },
          dataType: "json", 
          url: "process_ajax4.php",
          success: function(json) {
            insertResultshosp5(json);
          }
        });
      }

      $("#hop5").on("change", function(){
        var id = $(this).val();
        if (id === "0"){
          clearFormhosp5();
} else {
          makeAjaxRequesthosp5(id);
        }
      });
	 <!-- Hospitalisation6-->
	   function insertResultshosp6(json){
        $("#phop6").val(json["unit_price"]);

      }

      function clearFormhosp6(){
        $("#phop6").val("");
      }

      function makeAjaxRequesthosp6(placeId){
        $.ajax({
          type: "POST",
          data: { placeId: placeId },
          dataType: "json", 
          url: "process_ajax4.php",
          success: function(json) {
            insertResultshosp6(json);
          }
        });
      }

      $("#hop6").on("change", function(){
        var id = $(this).val();
        if (id === "0"){
          clearFormhosp6();
} else {
          makeAjaxRequesthosp6(id);
        }
      });
	 <!-- Hospitalisation7-->
	   function insertResultshosp7(json){
        $("#phop7").val(json["unit_price"]);

      }

      function clearFormhosp7(){
        $("#phop7").val("");
      }

      function makeAjaxRequesthosp7(placeId){
        $.ajax({
          type: "POST",
          data: { placeId: placeId },
          dataType: "json", 
          url: "process_ajax4.php",
          success: function(json) {
            insertResultshosp7(json);
          }
        });
      }

      $("#hop7").on("change", function(){
        var id = $(this).val();
        if (id === "0"){
          clearFormhosp7();
} else {
          makeAjaxRequesthosp7(id);
        }
      });
    </script>
<script language="javascript" type="text/javascript">
function hidelinehosp1() {
   document.getElementById('hospit1').style.display = "none";
   document.getElementById('hop1').style.display = "none";
   document.getElementById('phop1').style.display = "none";
   document.getElementById('qhosp1').style.display = "none";
   document.getElementById('tothosp1').style.display = "none";
   document.getElementById('activehosp1').style.display = "none";
   document.getElementById('removehosp1').style.display = "none";
}
function hidelinehosp2() {
   document.getElementById('hospit2').style.display = "none";
   document.getElementById('hop2').style.display = "none";
   document.getElementById('phop2').style.display = "none";
   document.getElementById('qhosp2').style.display = "none";
   document.getElementById('tothosp2').style.display = "none";
   document.getElementById('activehosp2').style.display = "none";
   document.getElementById('removehosp2').style.display = "none";
}
function hidelinehosp3() {
   document.getElementById('hospit3').style.display = "none";
   document.getElementById('hop3').style.display = "none";
   document.getElementById('phop3').style.display = "none";
   document.getElementById('qhosp3').style.display = "none";
   document.getElementById('tothosp3').style.display = "none";
   document.getElementById('activehosp3').style.display = "none";
   document.getElementById('removehosp3').style.display = "none";
}
function hidelinehosp4() {
   document.getElementById('hospit4').style.display = "none";
   document.getElementById('hop4').style.display = "none";
   document.getElementById('phop4').style.display = "none";
   document.getElementById('qhosp4').style.display = "none";
   document.getElementById('tothosp4').style.display = "none";
   document.getElementById('activehosp4').style.display = "none";
   document.getElementById('removehosp4').style.display = "none";
}
function hidelinehosp5() {
   document.getElementById('hospit5').style.display = "none";
   document.getElementById('hop5').style.display = "none";
   document.getElementById('phop5').style.display = "none";
   document.getElementById('qhosp5').style.display = "none";
   document.getElementById('tothosp5').style.display = "none";
   document.getElementById('activehosp5').style.display = "none";
   document.getElementById('removehosp5').style.display = "none";
}
function hidelinehosp6() {
   document.getElementById('hospit6').style.display = "none";
   document.getElementById('hop6').style.display = "none";
   document.getElementById('phop6').style.display = "none";
   document.getElementById('qhosp6').style.display = "none";
   document.getElementById('tothosp6').style.display = "none";
   document.getElementById('activehosp6').style.display = "none";
   document.getElementById('removehosp6').style.display = "none";
}
function hidelinehosp7() {
   document.getElementById('hospit7').style.display = "none";
   document.getElementById('hop7').style.display = "none";
   document.getElementById('phop7').style.display = "none";
   document.getElementById('qhosp7').style.display = "none";
   document.getElementById('tothosp7').style.display = "none";
   document.getElementById('activehosp7').style.display = "none";
   document.getElementById('removehosp7').style.display = "none";
}

function showlinehosp2() {
   document.getElementById('hospit2').style.display = "block";
   document.getElementById('hop2').style.display = "block";
   document.getElementById('phop2').style.display = "block";
   document.getElementById('qhosp2').style.display = "block";
   document.getElementById('tothosp2').style.display = "block";
   document.getElementById('activehosp2').style.display = "block";
   document.getElementById('removehosp2').style.display = "block";
}
function showlinehosp3() {
   document.getElementById('hospit3').style.display = "block";
   document.getElementById('hop3').style.display = "block";
   document.getElementById('phop3').style.display = "block";
   document.getElementById('qhosp3').style.display = "block";
   document.getElementById('tothosp3').style.display = "block";
   document.getElementById('activehosp3').style.display = "block";
   document.getElementById('removehosp3').style.display = "block";
}
function showlinehosp4() {
   document.getElementById('hospit4').style.display = "block";
   document.getElementById('hop4').style.display = "block";
   document.getElementById('phop4').style.display = "block";
   document.getElementById('qhosp4').style.display = "block";
   document.getElementById('tothosp4').style.display = "block";
   document.getElementById('activehosp4').style.display = "block";
   document.getElementById('removehosp4').style.display = "block";
}
function showlinehosp5() {
   document.getElementById('hospit5').style.display = "block";
   document.getElementById('hop5').style.display = "block";
   document.getElementById('phop5').style.display = "block";
   document.getElementById('qhosp5').style.display = "block";
   document.getElementById('tothosp5').style.display = "block";
   document.getElementById('activehosp5').style.display = "block";
   document.getElementById('removehosp5').style.display = "block";
}
function showlinehosp6() {
   document.getElementById('hospit6').style.display = "block";
   document.getElementById('hop6').style.display = "block";
   document.getElementById('phop6').style.display = "block";
   document.getElementById('qhosp6').style.display = "block";
   document.getElementById('tothosp6').style.display = "block";
   document.getElementById('activehosp6').style.display = "block";
   document.getElementById('removehosp6').style.display = "block";
}
function showlinehosp7() {
   document.getElementById('hospit7').style.display = "block";
   document.getElementById('hop7').style.display = "block";
   document.getElementById('phop7').style.display = "block";
   document.getElementById('qhosp7').style.display = "block";
   document.getElementById('tothosp7').style.display = "block";
   document.getElementById('activehosp7').style.display = "block";
   document.getElementById('removehosp7').style.display = "block";
}
</script>


