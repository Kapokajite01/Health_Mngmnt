<?php
error_reporting(0);
session_start();
include_once('connect_db.php');
	$userid = $_SESSION['sess_user_id'];
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username'])  or ($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro')){
		if(($role!="Receptionist") or ($role!="Mutuelle"))
		{
      header('Location: logout');
		}
	}
	
$myusername=$_SESSION['sess_username'];
$postedesante = $_SESSION['sess_postdsante'];
include_once('connect_db.php');
require_once("dbcontroller.php");
$db_handle = new DBController();
$query ="SELECT * FROM province ORDER BY province_name  DESC";
$results = $db_handle->runQuery($query);

$query1 ="SELECT * FROM district";
$results1 = $db_handle->runQuery($query1);

$query2 ="SELECT * FROM sector";
$results2 = $db_handle->runQuery($query2);

$query3 ="SELECT * FROM cells";
$results3 = $db_handle->runQuery($query3);
	$insurancenumber = $_POST['country_id'];
	$date = $_POST['date'];
$patient ="SELECT * FROM patient WHERE affiliate_number = '$insurancenumber'";
$result = mysqli_query($conn, $patient);
while($rowPAT = mysqli_fetch_assoc($result)) {
	$affiliate_number =$rowPAT['affiliate_number'];
	$fname = $rowPAT['names'];
    $lastname = $rowPAT['lname'];
    $gender = $rowPAT['gender'];
    $insurance = $rowPAT['insurance'];
    $dob = $rowPAT['dob'];
    $category = $rowPAT['category'];
    $fcode = $rowPAT['familycode'];
    $province = $rowPAT['province'];
    $district = $rowPAT['district'];
    $sector = $rowPAT['sector'];
    $cell = $rowPAT['cell'];
    $afname = $rowPAT['affiliate_names'];
    $aflname = $rowPAT['afilliate_lastname'];
    $afectation = $rowPAT['affectation'];
}
	?>

<script>
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
function getSector1(val) {
	$.ajax({
	type: "POST",
	url: "getSector1.php",
	data:'sector_id1='+val,
	success: function(data){
		$("#sector_list1").html(data);
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
		
		function SelectedInsurance(ele) {
            if (ele.selectedIndex > 0) {
                var selectedText = ele.options[ele.selectedIndex].innerHTML;
                var selectedValue = ele.value;
				if(selectedValue == 'Select'){
					document.getElementById("insurancename").value ="";
				}
                document.getElementById("insurancename").value = selectedText;
            }
            else {
                document.getElementById("insurancename").value = "";

            }
}
    </script>

<html>
  <script>
      function countChar(val) {
        var len = val.value.length;
        if (len >= 100) {
          val.value = val.value.substring(0, 100);
        } else {
          $('#charNum').text(100 - len);
        }
      };
    </script>
	<script src="jquerydis1.min.js"></script>

</head>
<body>

	<!-- TOP BAR -->
	<!-- TOP BAR -->
	<?php
	include_once('mmenus.php');

	?>	
	
					 	
		<div class="page-full-width cf">

			 <!-- end side-menu -->
			
			<div class="side-content fr">
			
				<div class="content-module">
							<!-- end content-module-heading -->
					
						<div class="content-module-main cf">
				

				<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>Autocomplete using PHP/MySQL and jQuery</title>
<link rel="stylesheet" href="cssauto/style.css" />
<script type="text/javascript" src="jsauto/jquery.min.js"></script>
<script type="text/javascript" src="jsauto/script.js"></script>
</head>

<link href="jquery-ui1.css" rel="stylesheet" type="text/css"/>  
 <script src="jquery.min1.js"></script>  
   <script src="jquery-ui.min1.js"></script> 
   <script type="text/javascript">
       $(function() {
               $("#datesearch").datepicker({ dateFormat: "yy-mm-dd" }).val()
               $("#datesearch1").datepicker({ dateFormat: "yy-mm-dd" }).val()
       });

   </script> 
 <body>


<div class="wrapper col4">
  <div id="container">
   <form method="post" action="save_appointment" name="frmappnt">
    <input type="hidden" name="select2" value="Offline" > 
	<br><br>
    <table style="width:70%" border="3">                
        <tr><td colspan="2"> <h1> <strong>Add New Appointment</strong></h1></td></tr>
          <td><strong>Number</strong></td>
          <td><input type="text"  name="patient_id"  autocomplete="off" required aria-required='true' aria-describedby='name-format' value="<?php echo $insurancenumber;?>"  placeholder="Insurance Number"></td>
				   
        </tr>
		        <tr>
          <td><strong>Name</strong> </td>
          <td><input type="text"  name="patient_name" onkeyup="autocomplet()" autocomplete="off" required aria-required='true' aria-describedby='name-format'  value="<?php echo $fname;?>"  placeholder="First Name" size="40%">
		     <input type="text"  name="patient_lname" onkeyup="autocomplet()" autocomplete="off" required aria-required='true' aria-describedby='name-format' value="<?php echo $lastname;?>"  placeholder="Last Name" size="40%"></td>
				   
        </tr>
		 <tr>
          <td><strong>Gender</strong> </td>
          <td><select id="sensor" name="gender" onchange="updateText('sensor')" style=' width:150px;' required>
		  <?php if($gender)
		  {
			  ?>
		          <option value="<?php echo $gender;?>"> <?php echo $gender;?></option>
				  <?php 
		  }
		  ?>

		  <option value="">---SELECT GENDER---</option>
        <option value="MALE">Male</option>
        <option value="FEMALE">Female</option></select></td>
				   
        </tr>
				        <tr>
          <td><strong>Telephone</strong> </td>
          <td><input type="text"  name="telephone" onkeyup="autocomplet()" autocomplete="off" required aria-required='true' aria-describedby='name-format' placeholder="Telephone" size="30%"></td>
				   
        </tr>
		<tr>
          <td><strong>Address</strong> </td>
          <td><select class="form-control" id="provincelist" name="provincelist"  onChange="getDistrict(this.value);SelectedProvince(this);" required><span id="reqProvince" class="reqError" requ></span>
		  <?php if($province)
		  {
			  ?>
	<option value="<?php echo $province;?>" selected><?php echo $province;?></option>
		  <?php
		  }
		  ?>

<option value="">Select Province</option>

<?php
foreach($results as $prov) {
?>
<option value="<?php echo $prov["Province_id"]; ?>"><?php echo $prov["province_name"]; ?></option>
<?php
}
?>
			  </select><input name="provinceName" type="text" id="provinceName"  style="display:none" value="<?php if($province){echo $province;}?>"required/>

</strong><select class="form-control" id="disrict_liste" name="district"  onChange="getSector(this.value);SelectedDistrict(this);" required>
<?php 
if($district)
{
?>
<option value="<?php echo $district;?>" selected><?php echo $district;?></option>

<?php
}
?>
<option value="<?php if($district){echo $district;}?>"><?php if($district){echo $district;}?></option>
<option value="">Select Disrict</option>
</select>			  </select><input name="districtName"  id="districtName"   type="text" id="txtContent1"  style="display:none" value="<?php if($district){echo $district;}?>" required/>
<select class="form-control"id="sector_list"  name="sector" onChange="getCell(this.value);SelectedTextValue2(this);" required><span id="reqSector" class="reqError" requ></span>
<?php 
if($sector)
{
?>
<option value="<?php echo $sector;?>" selected><?php echo $sector;?></option>

<?php
}
?>  <option value="<?php if($sector){echo $sector;}?>"><?php if($sector){echo $sector;}?></option>
</select>   <input name="sectorName" type="text"  id="txtContent2"  style="display:none"  value="<?php if($sector){echo $sector;}?>"required/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<select class="form-control"id="cell_list" name="cell" onChange="SelectedTextValue3(this);" required >
<?php 
if($cell)
{
?>
<option value="<?php echo $cell;?>" selected><?php echo $cell;?></option>

<?php
}
?> 
</select><input name="cellName" type="text"  id="txtContent3"  value="<?PHP if($cell){echo $cell;}?>" style="display:none" required/> </td>
				   
        </tr>
      		        <tr>
          <td><strong>Age</strong> </td>
          <td><select id="voltage" name= "dobage" onchange="updateText('voltage')" required>
		  <?php 
if($dob)
{
?>
<option value="<?php echo $dob;?>" selected><?php echo $dob;?></option>

<?php
}
?>
        <option value="2023">2023</option>
        <option value="2022">2022</option>
        <option value="2021">2021</option>
        <option value="2020">2020</option>
        <option value="2019">2019</option>
        <option value="2018">2018</option>
        <option value="2017">2017</option>
        <option value="2016">2016</option>
        <option value="2015">2015</option>
        <option value="2014">2014</option>
        <option value="2013">2013</option>
        <option value="2012">2012</option>
        <option value="2011">2011</option>
        <option value="2010">2010</option>
        <option value="2009">2009</option>
        <option value="2008">2008</option>
        <option value="2007">2007</option>
        <option value="2006">2006</option>
        <option value="2005">2005</option>
        <option value="2004">2004</option>
        <option value="2003" >2003</option>
        <option value="2002">2002</option>
        <option value="2001">2001</option>
        <option value="2000">2000</option>
        <option value="1999">1999</option>
        <option value="1998">1998</option>
        <option value="1997">1997</option>
        <option value="1996" >1996</option>
        <option value="1995">1995</option>
        <option value="1994" >1994</option>
        <option value="1993" >1993</option>
        <option value="1992">1992</option>
        <option value="1991" >1991</option>
        <option value="1990">1990</option>
        <option value="1989">1989</option>
        <option value="1988">1988</option>
        <option value="1987" >1987</option>
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
        <option value="1976" >1976</option>
        <option value="1975">1975</option>
        <option value="1974">1974</option>
		<option value="1973" >1973</option>
        <option value="1972" >1972</option>
        <option value="1971">1971</option>
        <option value="1970" >1970</option>
        <option value="1969">1969</option>
        <option value="1968" >1968</option>
        <option value="1967">1967</option>
        <option value="1966">1966</option>
        <option value="1965">1965</option>
        <option value="1964">1964</option>
        <option value="1963">1963</option>
        <option value="1962">1962</option>
        <option value="1961">1961</option>
        <option value="1960" >1960</option>
        <option value="1959" >1959</option>
        <option value="1958">1958</option>
        <option value="1957" >1957</option>
        <option value="1956">1956</option>
        <option value="1955" >1955</option>
        <option value="1954" >1954</option>
        <option value="1953">1953</option>
        <option value="1952" >1952</option>
        <option value="1951" >1951</option>
        <option value="1950" >1950</option>
        <option value="1949" >1949</option>
        <option value="1948">1948</option>
        <option value="1947" >1947</option>
        <option value="1946">1946</option>
        <option value="1945" >1945</option>
        <option value="1944">1944</option>
        <option value="1943" >1943</option>
        <option value="1942">1942</option>
		<option value="1941" >1941</option>
        <option value="1940">1940</option>
        <option value="1939">1939</option>
        <option value="1938">1938</option>
        <option value="1937">1937</option>
        <option value="1936" >1936</option>
        <option value="1935">1935</option>
        <option value="1934">1934</option>
        <option value="1933" >1933</option>
        <option value="1932" >1932</option>
        <option value="1931" >1931</option>
        <option value="1930" >1930</option>
        <option value="1929">1929</option>
        <option value="1928">1928</option>
        <option value="1927">1927</option>
        <option value="1926">1926</option>
        <option value="1925" >1925</option>
        <option value="1924" >1924</option>
        <option value="1923">1923</option>
        <option value="1922" >1922</option>
        <option value="1921" >1921</option>
        <option value="1920" >1920</option>
        <option value="1919" >1919</option>
        <option value="1918" >1918</option>
        <option value="1917" >1917</option>
        <option value="1916" >1916</option>
        <option value="1915" >1915</option>
        <option value="1914" >1914</option>
        <option value="1913" >1913</option>
        <option value="1912" >1912</option>
        <option value="1911">1911</option>
        <option value="1910">1910</option>
    </select></td>
				   
        </tr>
		<tr>
          <td><strong>Insurance</strong> </td>
          <td>
		      <select name="selectScript" id="select" onchange="SelectedInsurance(this);" required>
<?php
		  if($insurance)
		  {

			  ?>
	<option value="<?php echo $insurance;?>" selected><?php echo $insurance;?></option>

<?php			 
			  
		  }
		  
  $listinsu = "SELECT * from assurance";
$resultinsurance = mysqli_query($conn, $listinsu);
?>
<option value="">--Select Insurance---</option>
	<option value="<?php echo $insurance;?>" ><strong><?php echo $insurance;?><strong></option>
      <?php
while ($row = mysqli_fetch_assoc($resultinsurance)) {
            echo '<option value="' . $row['id'] . '">' . $row['Insurance'] . '</option>';
        
		  }
      ?>
    </select><input type="text" name="insurancename" id="insurancename"   style="display:none" value="<?php echo $insurance; ?>"  required></td>
				   
        </tr>
        <tr>
          <td><strong>Department</strong></td>
          <td><select name="department" id="select5" onchange="SelectedTextValue(this);" required>
           <option value="">Select</option>
            <?php
		  	$sqldepartment= "SELECT DISTINCT role FROM users";
			$qsqldepartment = mysqli_query($conn,$sqldepartment);
			while($rsdepartment=mysqli_fetch_assoc($qsqldepartment))
			{
				?>
	<option value="<?php echo $rsdepartment['id']?>"><?php echo $rsdepartment['role'];?></option>
			
				
			<?php
			}
		  ?>
          </select><input type="text" name="departname" id="departname" style="display:none"  required></td>
       
        </tr>
        <tr>
          <td><strong>Appointment Date</strong></td>
          <td><input type="date" name="appointmentdate" id="appointmentdate" required /></td>
        </tr>
        <tr>
          <td><strong>Appointment Time</strong></td>
          <td><input type="time" name="apointmenttime" id="time" value="<?php //echo $rsedit[appointmenttime]; ?>" required/></td>
        </tr>
       
        <tr>
          <td><strong>Doctor</strong></td>
          <td>
          <select name="doctor" id="doctor"  onchange="SelectedTextValue1(this);" required>
            <option value="">Select</option>
            <?php
          	$sqldoctor= "SELECT * FROM users WHERE role = 'Consultation'";
			$qsqldoctor = mysqli_query($conn,$sqldoctor);
			while($rsdoctor = mysqli_fetch_array($qsqldoctor))
			{
				?>
			<option value="<?php echo $rsdoctor['id'];?>" ><?php echo $rsdoctor['first_name'].'  '.$rsdoctor['last_name'];?> </option>
			<?PHP
			}
		  ?>
          </select><input type="text" name="doctorname" id="doctorname" style="display:none" required></td>
         
        </tr>
       
         <tr>
          <td><strong>Appointment reason</strong></td>
          <td><textarea name="appreason" id="appreason" style="width:300px;height:100px;" onkeyup="countChar(this)" required ><?php //echo $rsedit[app_reason]; ?></textarea><font color="black"><strong><br><strong>Characters Remain <div id="charNum" style="margin-left: 15%"></div ></strong></font></td>
         
        </tr>		        
       
        <tr>
          <td colspan="2" align="center"><input type="submit" name="saveappointment"  value="Submit" style="border-radius: 4px;font-size: 16px;background-color: #4CAF50;"/></td>
        </tr>
      </tbody>
    </table>
	
    </form>
    <p>&nbsp;</p>
  </div>
</div>
					</div> <!-- end content-module-main -->
							
				
				</div> <!-- end content-module -->
				
				
		
		</div></div> <!-- end full-width -->
			
	</div> <!-- end content --><br>
	




	<div id="footer" style="margin-top: 5%;">

		<p><strong>Powed By Vision Soft Ltd .</strong></p>
			
	</div> <!-- end footer -->
</body>
<script type="text/javascript">
function SelectedTextValue(ele) {
            if (ele.selectedIndex > 0) {
                var selectedText = ele.options[ele.selectedIndex].innerHTML;
                var selectedValue = ele.value;
                document.getElementById("departname").value = selectedText;
            }
            else {
                document.getElementById("departname").value = "";

            }
}

function SelectedTextValue1(ele) {
            if (ele.selectedIndex > 0) {
                var selectedText = ele.options[ele.selectedIndex].innerHTML;
                var selectedValue = ele.value;
                document.getElementById("doctorname").value = selectedText;
            }
            else {
                document.getElementById("doctorname").value = "";

            }
}


function SelectedProvince(ele) {
            if (ele.selectedIndex > 0) {
                var selectedText = ele.options[ele.selectedIndex].innerHTML;
                var selectedValue = ele.value;
                document.getElementById("provinceName").value = selectedText;
            }
            else {
                document.getElementById("provinceName").value = "";

            }
}


function SelectedDistrict(ele) {
            if (ele.selectedIndex > 0) {
                var selectedText = ele.options[ele.selectedIndex].innerHTML;
                var selectedValue = ele.value;
                document.getElementById("districtName").value = selectedText;
            }
            else {
                document.getElementById("districtName").value = "";

            }
}

<!--
function popup(url) 
{
 var width  = 1500;
 var height = 800;
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
</script>
</html>