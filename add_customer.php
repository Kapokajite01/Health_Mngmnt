<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
$query ="SELECT * FROM province";
$results = $db_handle->runQuery($query);

$query1 ="SELECT * FROM district";
$results1 = $db_handle->runQuery($query1);

$query2 ="SELECT * FROM sector";
$results2 = $db_handle->runQuery($query2);

$query3 ="SELECT * FROM cells";
$results3 = $db_handle->runQuery($query3);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Loan Initialization</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/noui/nouislider.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
<!--===============================================================================================-->
		<meta name="description" content="Mailbox with some customizations as described in docs" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />
		<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
	<body class="no-skin" oncontextmenu="return false">
	
 <script type="text/javascript" src="date_time.js"></script>
 <script type="text/javascript">  

 function getDistrict(val) {
	$.ajax({
	type: "POST",
	url: "getDistrict.php",
	data:'disrict_id='+val,
	success: function(data){
		$("#disrict_liste").html(data);
		getSector();

	}
	});
}


function getSector(val) {
	$.ajax({
	type: "POST",
	url: "getSector.php",
	data:'sector_id='+val,
	success: function(data){
		$("#sector_list").html(data);
				getCell();

	}
	});
}

function getCell(val) {
	$.ajax({
	type: "POST",
	url: "getCell.php",
	data:'cell_id='+val,
	success: function(data){
		$("#cell_list").html(data);
	}
	});
}

</script>
<?php 
error_reporting(0);
session_start();
include'mydb_connection/my_dbconnection.php';

$uname = $_SESSION['uname'];
$userid = $_SESSION['userid'];
if(!$userid){
	header('location:logout');
}
$resultusers = "select * from users_table WHERE id = '$userid'";
$result16r = $conn_db->query($resultusers);
if ($result16r->num_rows > 0) {
while($rowval = $result16r->fetch_assoc()) {
$_SESSION['account'] = $rowval['telephone'];
$_SESSION['role'] = $rowval['role'];
$_SESSION['lname'] = $rowval['lname'];
$_SESSION['fname'] = $rowval['First_Nmae'];
$email = $rowval['email'];	
$fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];	
$account = $_SESSION['account'];
$role = $_SESSION['role'];
}
}

?>
<?php include'left_commercial.php';?>


		<div class="wrap-contact100">
			<form class="contact100-form validate-form" method="POST" ACTION="save_newcustomer">
				<span class="contact100-form-title">
					NEW CUSTOMER<hr>
				</span>
				<div class="card-body" id = "personalinfo"align="center">

                    <p class="card-description" align="left">
                      <strong>Personal information</strong><hr>
                    </p>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">First Name</label>
                          <div class="col-sm-9"><span id="firstnameError" class="errors"></span>
                            <input type="text" class="form-control" id = "firstname" name = "firstname" style="border-color:black" value="<?php echo $firstname;?>" placeholder=" First Name"/>
                          </div>
                        </div>
                      </div>
                      
                    </div>
                     
					<div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Last Name</label>
                          <div class="col-sm-9"><span id="lastnameError" class="errors"></span>
                            <input type="text" class="form-control" id = "lastname" name = "lastname" style="border-color:black" value="<?php echo $lastname;?>" placeholder=" Last Name" /><span id="reqlastname" class="reqError" requ></span>
                          </div>
                        </div>
                      </div>
                      
                    </div>
					<div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">ID Number</label>
                          <div class="col-sm-9"><span id="idnumberError" class="errors"></span>
                            <input type="text" class="form-control" id = "idnumber" name= "idnumber" style="border-color:black"  placeholder=" ID Number"> <span id="reqtelephone" class="reqError" requ></span>
                          </div>
                        </div>
                      </div>
                      
                    </div>
					<div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Telephone</label>
                          <div class="col-sm-9"><span id="telephoneError" class="errors"></span>
                            <input type="text" class="form-control" id = "telephone" name= "telephone" style="border-color:black"  placeholder=" Telephone"> <span id="reqtelephone" class="reqError" requ></span>
                          </div>
                        </div>
                      </div>
                      
                    </div>
                     <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Date of Birth</label>
                          <div class="col-sm-9">
						 <table class="table table-bordered">
					 <tr><td> <select name="DOBDay" id="DOBDay" >
<option value="">---Pick the Day---</option>
<option value="01">1</option>
<option value="02">2</option>
<option value="03">3</option>
<option value="04">4</option>
<option value="05">5</option>
<option value="06">6</option>
<option value="07">7</option>
<option value="08">8</option>
<option value="09">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
</select></td><td>
						  
<select name="DOBMonth" id="DOBMonth">
<option value="">-------- Pick the  Month ---------</option>
<option value="01">January</option>
<option value="02">Febuary</option>
<option value="03">March</option>
<option value="04">April</option>
<option value="05">May</option>
<option value="06">June</option>
<option value="07">July</option>
<option value="08">August</option>
<option value="09">September</option>
<option value="10">October</option>
<option value="11">November</option>
<option value="12">December</option>
</select></td><td>

<select name="DOBYear" id="DOBYear">
<option value="">-- Picke the  Year-</option>
<option value="2010">2010</option>
<option value="2009">2009</option>
<option value="2008">2008</option>
<option value="2007">2007</option>
<option value="2006">2006</option>
<option value="2005">2005</option>
<option value="2004">2004</option>
<option value="2003">2003</option>
<option value="2002">2002</option>
<option value="2001">2001</option>
<option value="2000">2000</option>
<option value="1999">1999</option>
<option value="1998">1998</option>
<option value="1997">1997</option>
<option value="1996">1996</option>
<option value="1995">1995</option>
<option value="1994">1994</option>
<option value="1993">1993</option>
<option value="1992">1992</option>
<option value="1991">1991</option>
<option value="1990">1990</option>
<option value="1989">1989</option>
<option value="1988">1988</option>
<option value="1987">1987</option>
<option value="1986">1986</option>
<option value="1985">1985</option>
<option value="1984">1984</option>
<option value="1983">1983</option>
<option value="1982">1982</option>
<option value="1981">1981</option>
<option value="1980">1980</option>
<option value="1979">1979</option>
<option value="1978">1978</option>
<option value="1977">1977</option>
<option value="1976">1976</option>
<option value="1975">1975</option>
<option value="1974">1974</option>
<option value="1973">1973</option>
<option value="1972">1972</option>
<option value="1971">1971</option>
<option value="1970">1970</option>
<option value="1969">1969</option>
<option value="1968">1968</option>
<option value="1967">1967</option>
<option value="1966">1966</option>
<option value="1965">1965</option>
<option value="1964">1964</option>
<option value="1963">1963</option>
<option value="1962">1962</option>
<option value="1961">1961</option>
<option value="1960">1960</option>
<option value="1959">1959</option>
<option value="1958">1958</option>
<option value="1957">1957</option>
<option value="1956">1956</option>
<option value="1955">1955</option>
<option value="1954">1954</option>
<option value="1953">1953</option>
<option value="1952">1952</option>
<option value="1951">1951</option>
<option value="1950">1950</option>
<option value="1949">1949</option>
<option value="1948">1948</option>
<option value="1947">1947</option>
<option value="1946">1946</option>
<option value="1945">1945</option>
<option value="1944">1944</option>
<option value="1943">1943</option>
<option value="1942">1942</option>
<option value="1941">1941</option>
<option value="1940">1940</option>
<option value="1939">1939</option>
<option value="1938">1938</option>
<option value="1937">1937</option>
<option value="1936">1936</option>
<option value="1935">1935</option>
<option value="1934">1934</option>
<option value="1933">1933</option>
<option value="1932">1932</option>
<option value="1931">1931</option>
<option value="1930">1930</option>
<option value="1929">1929</option>
<option value="1928">1928</option>
<option value="1927">1927</option>
<option value="1926">1926</option>
<option value="1925">1925</option>
<option value="1924">1924</option>
<option value="1923">1923</option>
<option value="1922">1922</option>
<option value="1921">1921</option>
<option value="1920">1920</option>
<option value="1919">1919</option>
<option value="1918">1918</option>
<option value="1917">1917</option>
<option value="1916">1916</option>
<option value="1915">1915</option>
<option value="1914">1914</option>
<option value="1913">1913</option>
<option value="1912">1912</option>
<option value="1911">1911</option>
<option value="1910">1910</option>
<option value="1909">1909</option>
<option value="1908">1908</option>
<option value="1907">1907</option>
<option value="1906">1906</option>
<option value="1905">1905</option>
<option value="1904">1904</option>
<option value="1903">1903</option>
<option value="1902">1902</option>
<option value="1901">1901</option>
<option value="1900">1900</option>
</select></td></tr></table>


                          </div>
                        </div>
                      </div>
                      
                    </div>
                     <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Place of Birth</label>
                          <div class="col-sm-9"><span id="palcebirthError" class="errors"></span>
                            <input type="text" class="form-control" id = "palcebirth" name = "palcebirth" style="border-color:black" placeholder="Place of Birth"/><span id="reqpalcebirth" class="reqError" requ></span>
                          </div>
                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Gender</label>
                          <div class="col-sm-9"><span id="genderError" class="errors"></span>
                            <?php

  $gender = "SELECT * from gender_customization";
?>

    <select class="form-control" id = "gender"  name = "gender" style="border-color:black" required><option value=""><strong>Select Gender<strong></option>

      <?php
	  $resultgender= $conn_db->query($gender);
if ($resultgender->num_rows > 0) {
while($row = $resultgender->fetch_assoc()) {
            echo '<option value="' . $row['gender_name'] . '">' . $row['gender_name'] . '</option>';
        }
}
      ?>
    </select>
                          </div>
                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Civil Status</label>
                          <div class="col-sm-9"><span id="statusError" class="errors"></span>
                             <?php

  $status = "SELECT * from status_customization";
?>

    <select class="form-control" id = "status"  name = "status" style="border-color:black"  onchange='CheckColors(this.value);changetextbox();' required><option value=""><strong>Select Civil Status<strong></option>

      <?php
	  $resultstatus= $conn_db->query($status);
if ($resultstatus->num_rows > 0) {
while($row1 = $resultstatus->fetch_assoc()) {
            echo '<option value="' . $row1['status_name'] . '">' . $row1['status_name'] . '</option>';
        }
}
      ?>
    </select>

                          </div>
						  
                        </div>
                      </div>
                      
                    </div>
					
					<hr>
                    <p class="card-description" align="left">
                      Permanent Address
                    </p><hr>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Province</label>
                          <div class="col-sm-9"><span id="provincelistError" class="errors"></span>
							<select class="form-control" id="provincelist" name="provincelist" style="border-color:black" onChange="getDistrict(this.value);SelectedTextValue(this);""><option value="" >Select Province</option><span id="reqProvince" class="reqError" requ></span>
<?php
foreach($results as $province) {
?>
<option value="<?php echo $province["Province_id"]; ?>"><?php echo $province["province_name"]; ?></option>
<?php
}
?>
			  </select><input name="provinceName" type="text" id="txtContent" style="display:none" required/>
                          </div>
                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">District</label>
                          <div class="col-sm-9"><span id="disrict_listeError" class="errors"></span>
                           <select class="form-control" id="disrict_liste" name="district" style="border-color:black" onChange="getSector(this.value);SelectedTextValue1(this);" > <span id="reqDistrict" class="reqError" requ></span>
<option value="">Select Disrict</option>
</select>			  </select><input name="disrictName" type="text" id="txtContent1" style="display:none" required/>

                          </div>
                        </div>
                      </div>
                     
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Sector</label>
                          <div class="col-sm-9"><span id="sector_listError" class="errors"></span>
 <select class="form-control"id="sector_list"  name="sector" style="border-color:black" onChange="getCell(this.value);SelectedTextValue2(this);" ><span id="reqSector" class="reqError" requ></span>
<option value="">Select Sector</option>
</select>   <input name="sectorName" type="text" id="txtContent2" style="display:none" required/>                       </div>
                        </div>
						</div>
						<br><br><br>
						
                      </div>
					<div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Cell</label>
                          <div class="col-sm-9"><span id="cell_listError" class="errors"></span>
 <select class="form-control"id="cell_list" name="cell" style="border-color:black" onChange="SelectedTextValue3(this);" ><span id="reqCell" class="reqError" requ></span>
<option value="">Select Cell</option>
</select><input name="cellName" type="text" id="txtContent3" style="display:none" required/> 

                          </div>
                        </div>
						</div>
						<br><br><br>
						
                      </div>
					  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Village</label>
                          <div class="col-sm-9"><span id="villageError" class="errors"></span>
                            <input type="text"  name = "village" id = "village" style="border-color:black" class="form-control"  /><span id="reqVillagre" class="reqError" requ></span>
                          </div>
                        </div>
						</div>
						<br><br><br>
						
                      </div><hr>
                 <input type="submit"  class="btn btn-success dropdown-toggle btn-sm" name="savenewcustomer" value="Save">
					<hr>
					
					
					</div>
			</form>
		</div>


 </div>  </div>
          <div class="container-fluid clearfix">
		  <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block"><strong>Copyright © 2019</strong>
              <a href="http://www.qloan.rw" target="_blank"><strong>Q-loan</a>. All rights reserved.</strong></span>
             <span class="text-muted d-block text-right "><strong><i>Your satisfaction is our duty</i></strong>            </span>
          </div>
        </footer><!-- container-scroller -->
  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <script src="vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
</body>
<script src="assets/plugins/ckeditor/ckeditor.js"></script>

<script src="assets/plugins/ckeditor/adapters/jquery.js"></script>
<script src="assets/dist/js/pass_up.js"></script>

<script src="assets/js/jquery-2.1.4.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>


		

		 <script src="jquery-1.5.js"></script><script type="text/javascript">
        function SelectedTextValue(ele) {
            if (ele.selectedIndex > 0) {
                var selectedText = ele.options[ele.selectedIndex].innerHTML;
                var selectedValue = ele.value;
                document.getElementById("txtContent").value = selectedText;
				document.getElementById("txtContent1").value = "";
				document.getElementById("txtContent2").value = "";
				document.getElementById("txtContent3").value = "";
            }
            else {
                document.getElementById("txtContent").value = "";
				document.getElementById("txtContent1").value = "";
				document.getElementById("txtContent2").value = "";
				document.getElementById("txtContent3").value = "";

            }
        }
    </script>
	<script type="text/javascript">
        function SelectedTextValue1(ele) {
            if (ele.selectedIndex > 0) {
                var selectedText = ele.options[ele.selectedIndex].innerHTML;
                var selectedValue = ele.value;
                document.getElementById("txtContent1").value = selectedText;
				document.getElementById("txtContent2").value = "";
				document.getElementById("txtContent3").value = "";
            }
            else {
                document.getElementById("txtContent1").value = "";
				document.getElementById("txtContent2").value = "";
				document.getElementById("txtContent3").value = "";
            }
        }
    </script>
	  <script type="text/javascript">
        function SelectedTextValue2(ele) {
            if (ele.selectedIndex > 0) {
                var selectedText = ele.options[ele.selectedIndex].innerHTML;
                var selectedValue = ele.value;
                document.getElementById("txtContent2").value = selectedText;
				document.getElementById("txtContent3").value = "";

            }
            else {
                document.getElementById("txtContent2").value = "";
				document.getElementById("txtContent3").value = "";

            }
        }
    </script>
	 <script type="text/javascript">
        function SelectedTextValue3(ele) {
            if (ele.selectedIndex > 0) {
                var selectedText = ele.options[ele.selectedIndex].innerHTML;
                var selectedValue = ele.value;
                document.getElementById("txtContent3").value = selectedText;
            }
            else {
                document.getElementById("txtContent3").value = "";
            }
        }
    </script>
   
<style>
  
input#bigbutton {
width:500px;
background: #3e9cbf; /*the colour of the button*/
padding: 8px 14px 10px; /*apply some padding inside the button*/
border:1px solid #3e9cbf; /*required or the default border for the browser will appear*/
cursor:pointer; /*forces the cursor to change to a hand when the button is hovered*/
/*style the text*/
font-size:1.5em;
font-family:Oswald, sans-serif; /*Oswald is available from http://www.google.com/webfonts/specimen/Oswald*/
letter-spacing:.1em;
text-shadow: 0 -1px 0px rgba(0, 0, 0, 0.3); /*give the text a shadow - doesn't appear in Opera 12.02 or earlier*/
color: #fff;
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
color:#dfe7ea;
/*reduce the size of the shadow to give a pushed effect*/
-webkit-box-shadow: inset 0px 1px 0px #3e9cbf, 0px 2px 0px 0px #205c73, 0px 2px 5px #999;
-moz-box-shadow: inset 0px 1px 0px #3e9cbf, 0px 2px 0px 0px #205c73, 0px 2px 5px #999;
box-shadow: inset 0px 1px 0px #3e9cbf, 0px 2px 0px 0px #205c73, 0px 2px 5px #999;
}
	
	</style>	
	<Script>
function popup01(url) 
{
 var width  = 1200;
 var height = 1000;
 var left   = (screen.width  - width)/2;
 var top    = (screen.height - height)/2;
 var params = 'width='+width+', height='+height;
 params += ', top='+top+', left='+left;
 params += ', directories=no';
 params += ', location=no';
 params += ', menubar=no';
 params += ', resizable=no';
 params += ', scrollbars=no';
 params += ', status=no';
 params += ', toolbar=no';
 newwin=window.open(url,'windowname5', params);
 if (window.focus) {newwin.focus()}
 return false;
}
// -->
</script>	
	
	
	
	</script>
</html>