

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
	include_once('menus.php');

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
					<h3 align="center">[CHECK CONSUMPTIONS TO ADD TO CONSUMPTIONS]</h3>
					</div> <!-- end content-module-heading -->
					
						<div class="content-module-main cf">
				
				<div class="my-form">

   <p class="text-box">
  <label for="box1">Medicine <span class="box-number">1</span></label>
    <select id="select"  name="select[]" style=" width:300px; height: 25px ">
      <option value="0">Please select</option>
      <?php
 
  $result = ($query) or die('Query failed: ' . mysql_error());
        while ($row = mysql_fetch_assoc($result)) {
            echo '<option value="' . $row['id'] . '">' . $row['product_name'] . '</option>';
        }
      ?>
    </select>

                  <input name="boxes[]" value="" id="box1" style=" width:80px; height: 25px"/>
		<input type="text" name="boxes1[]" value="" id="box11" style=" width:80px; height: 25px"/>
                <input type="text" name="boxes1[]" value="" id="box11" style=" width:80px; height: 25px"/>
                <a class="add-box" href="">Add More</a>
</p>
</div>
    </div>
 </div>
                       <div class="mytable_row ">

                                      



&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input  class="button round blue image-right ic-add text-upper" type="submit" name="Submit" value="Check Items">


                       </div>

						
				
					</div> <!-- end content-module-main -->
							
				
				</div> <!-- end content-module -->
				
				
		
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
      function insertResults(json){
        $("#box1").val(json["unit_price"]);

      }

      function clearForm(){
        $("#box1").val("");
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

      $("#select").on("change", function(){
        var id = $(this).val();
        if (id === "0"){
          clearForm();
} else {
          makeAjaxRequest(id);
        }
      });
    </script>


