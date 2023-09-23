<!--JavaScript - Required Field Validator for TextBox on Submit.-->

		<style type="text/css">
			.reqError{
				color: #ff0000; /*Red Color*/
				font-weight: bold;
			}
		</style>
		<script type="text/javascript">
			//function to check validation (Required field)
			function checkReqFields(){
				var returnValue;
				var name=document.getElementById("fname").value;
				var address=document.getElementById("gender").value;
				
				returnValue=true;
				if(name.trim()==""){
					document.getElementById("reqTxtName").innerHTML="* Name is required.";
					returnValue=false;
				}
				if(address.trim()==""){
					document.getElementById("reqTxtAddress").innerHTML="* Address is required.";
					returnValue=false;
				}								
				return returnValue;
			}
		</script>
	
		<b>Enter Name: </b><br>
		<input type="text" id="fname"/>
		<span id="reqTxtName" class="reqError"></span>
	
		
		<b>Enter Address: </b><br>
		<input type="text" id="gender"/>
		<span id="reqTxtAddress" class="reqError"></span>
		
		<p><input type="submit" value="Submit"/></p>
	