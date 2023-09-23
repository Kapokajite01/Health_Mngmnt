<?php
error_reporting(0);
session_start();
include_once('connect_db.php');
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

?>
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
      width:10%;
      height: 30px;
      border: 1px solid #999;
      font-size: 18px;
      color: #1c87c9;
      background-color: #eee;
      border-radius: 5px;
      box-shadow: 4px 4px #ccc;
      }
</style>
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
    </script>

</head>
	<script src="media/js/jquery-1.8.2.min.js"></script>
        <script src="media/js/jquery-ui.js" type="text/javascript"></script>
		
<script type="text/javascript">

function updateText(type) { 
 var id = type+'Text';
 document.getElementById(id).value = document.getElementById(type).value;
}
</script>
<script type="text/javascript">
function active() {
	var catm=document.getElementById('catmember').value;
	var famcode=document.getElementById('famcode').value;
	var pagenum=document.getElementById('pagecode').value;
	if(catm){
document.getElementById('catmember').disabled = false; 
	}
if(famcode){
document.getElementById('famcode').disabled = false; 
	}
if(pagenum){
document.getElementById('pagecode').disabled = false; 
	}}
</script>
<script type="text/javascript">
function activatescript() {
	var catminsurance=document.getElementById('insurance').value;
	if(catminsurance='MUTUELLE'){
document.getElementById('catmember').disabled = false; 
document.getElementById('famcode').disabled = false; 
	}
	if(catminsurance != 'MUTUELLE'){
	document.getElementById('catmember').disabled = true; 
document.getElementById('famcode').disabled = true; 
	
	}

}

</script>	
</head>
  	
			
<body  onload="activatescript();">

	<!-- TOP BAR -->
	<!-- TOP BAR -->
	<?php
	include_once('mmenus.php');

	$insurancenumber = $_POST['country_id'];
	$date = $_POST['date'];
$patient ="SELECT * FROM patient WHERE affiliate_number = '$insurancenumber'";
$result = mysqli_query($conn, $patient);
while($rowPAT = mysqli_fetch_assoc($result)) {
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
	
	
	<!-- MAIN CONTENT -->
	<div id="content">
		
		<div class="page-full-width cf">

			 <!-- end side-menu -->
			

			
				<div class="content-module">				
					
						<div class="content-module-main cf">
						<link href="jquery-ui1.css" rel="stylesheet" type="text/css"/>  
 
<form  method="POST" action="savepatient">
<input name="mydate" value="<?php echo $date;?>" style="display:none">
<table align="center">


<tr><td></td><td></td><td><strong>Name </strong></td><td><input name="names"  id="names" type="text" size='15' value="<?php echo $fname;?>" required aria-required="true" aria-describedby="name-format" style=' width:250px;height:30px' oninput="afname.value = names.value; return true;"/></td><td><strong>Last Name <br></strong><input name="lnames"  id="lnames" type="text" size='15' value="<?php echo $lastname;?>" required aria-required="true" aria-describedby="name-format" style=' width:250px;height:30px'oninput="aflname.value = lnames.value; return true;"/></td><td></td><td></td><td></td><td><td></td><td></td><td></tr>
<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><td></td><td></td><td></tr>
<tr><td></td><td><td><strong>Insurance Number </td><td></strong><input name="insnumber"  id="insnumber" type="text" size='15' value="<?php if($insurancenumber){echo $insurancenumber;}?>" required aria-required="true" aria-describedby="name-format" style=' width:250px;height:30px'/></td><td><strong>Gender</strong><br>     <select id="sensor" onchange="updateText('sensor')" style=' width:250px;height:30px'>
        <option value="<?php echo $gender;?>"> <?php echo $gender;?></option>
        <option value="MALE">M</option>
        <option value="FEMALE">F</option> <input type="text" name="gender" style="display:none" value="<?php echo $gender;?>" id="sensorText"value="" required aria-required="true" aria-describedby="name-format"/ required>
</td><td></td><td><td></td><td></td><td> </td><td></td></tr>
<tr><td></td><td></td><td></td><td><?php
  $listinsu = "SELECT * from assurance";
$resultinsurance = mysqli_query($conn, $listinsu);
?>

    <select name="selectScript" id="select" style=' width:250px;height:30px'><option value="<?php echo $insurance;?>" ><strong><?php echo $insurance;?><strong></option>
      <?php
while ($row = mysqli_fetch_assoc($resultinsurance)) {
            echo '<option value="' . $row['id'] . '">' . $row['Insurance'] . '</option>';
        }
      ?>
    </select></td><td><B>Year Of Birth</b><select id="voltage" onchange="updateText('voltage')">
       <option value="<?php echo $dob;?>"> <?php echo $dob;?></option>
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
    </select><input type="text" name="dob" value="<?php echo $dob;?>" style="display:none" id="voltageText" required aria-required="true" aria-describedby="name-format"/></td><td></td><td><td></td><td></td><td><td></td><td></td><td> </td><td></td></tr>
<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><td></td><td></td><td></tr>
<tr><td></td><td></td><td><strong>Insurance</strong></td><td><strong>Insurance</strong><br><input name="insurance"  id="insurance" type="text" size='15' pattern="^(MUTUELLE|RAMA/RSSB|MMI|MEDIPLA|RADIANT|TRANSIT|NO INSURANCE).*$"  value="<?php echo $insurance;?>"  required aria-required="true" aria-describedby="name-format" style=' width:250px;height:30px'/></td>
<td><strong>Member's Category</strong></br><input name="catmember"  id="catmember" type="number" min="1" max="5" size='15' value="<?php echo $category;?>" required aria-required="true" style=' width:250px;height:30px' disabled="disabled" placeholder="Mutuelle Only"/></td><td>
<strong>Family Code</strong><br><input name="famcode"  id="famcode" type="text" size='15' required aria-required="true" value="<?php echo $fcode; ?>"  style=' width:250px;height:30px' disabled="disabled" placeholder="Mutuelle Only"/></td><td><strong>Form Number</strong><br><input name="pagecode"  id="pagecode" type="text" value="<?php echo $formnumber;?>" size='15' style=' width:250px;height:30px'  value="" placeholder="Form No" disabled="disabled" required aria-required="true" aria-describedby="name-format"/></td><td></td><td><td></td><td></td><td> </td><td></td></tr>
<tr><td></td><td></td><td><b>ADDRESS</b></td><td><strong>PROVINCE</strong><select class="form-control" id="provincelist" name="provincelist" style="width:250px;height:30px" onChange="getDistrict(this.value);SelectedTextValue(this);" required><span id="reqProvince" class="reqError" requ></span>
<option value="<?php if($province){echo $province;}?>"><?php if($province){echo $province;}?></option>

<option value="">Select Province</option>

<?php
foreach($results as $prov) {
?>
<option value="<?php echo $prov["Province_id"]; ?>"><?php echo $prov["province_name"]; ?></option>
<?php
}
?>
			  </select><input name="province" type="text" id="txtContent" style='display:none'  value="<?php if($province){echo $province;}?>"required/></td>
<td><strong>DISTRICT&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</strong><select class="form-control" id="disrict_liste" name="district" style="width:250px;height:30px" onChange="getSector(this.value);SelectedTextValue1(this);" >
<option value="<?php if($district){echo $district;}?>"><?php if($district){echo $district;}?></option>
<option value="">Select Disrict</option>
</select>			  </select><input name="district"   type="text" id="txtContent1" style='display:none'  value="<?php if($district){echo $district;}?>" required/></td><td><strong>SECTOR</strong><select class="form-control"id="sector_list"  name="sector"  style="width:250px;height:30px" onChange="getCell(this.value);SelectedTextValue2(this);" ><span id="reqSector" class="reqError" requ></span>
<option value="<?php if($sector){echo $sector;}?>"><?php if($sector){echo $sector;}?></option>
</select>   <input name="sector" type="text"  id="txtContent2" style='display:none'  value="<?php if($sector){echo $sector;}?>"required/>  </td><td><strong>CELL </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select class="form-control"id="cell_list" name="cell" style="width:250px;height:30px" onChange="SelectedTextValue3(this);" >
<option value="<?php if($cell){echo $cell;}?>"><?php if($cell){echo $cell;}?></option>
<option value="">Select Cell</option>
</select><input name="cellName" type="text"  id="txtContent3" style='display:none'  value="<?PHP if($cell){echo $cell;}?>" required/> </td><td></td><td><td></td><td></td><td> </td><td></td></tr>
<tr><td></td><td></td><td><B>AFFILLIATE</b></td><td><B>AFFILLIATE NAME</b><input type="text" name="afname" id="afname" value="<?php if(!empty($afname)){echo $afname;}else{echo $fname;}?>"  aria-describedby="name-format" style=' width:250px; ;height:30px'></td>
<td> <B>AFFILLIATE LAST NAME</b><input type="text" name="aflname" id="aflname" value="<?php if(!empty($aflname)){echo $aflname;}else{echo $lastname;}?>"  aria-describedby="name-format" style=' width:250px; ;height:30px'></td><td>
<B>AFFECTATION</b><input type="text" name="affectation" id="affectation" value="<?php echo $afectation;?>" required aria-required="true" aria-describedby="name-format" style=' width:250px; ;height:30px'></td><td><td></td><td></td><td><td></td><td></td><td> </td><td></td></tr>
<tr><td></td><td></td><td></td><td></td>
<td></td><td>
</td><td><td></td><td></td><td><td></td><td></td><td> </td><td></td></tr>

<tr><td></td><td></td><td></td><td><strong>CONSULTATION</strong></td><td></td><td></td><td></td><td></td><td></td><td><td></td><td></td><td></tr>
<tr><td></td><td></td><td></td><td><input type="radio" name="workingday" value="regular"> <strong>WORKING DAYS</strong><br><input type="radio" name="workingday" value="others" required aria-required="true" aria-describedby="name-format"><strong> OTHERS</strong>
 <br> <input type="radio" name="workingday" value="all_null" required aria-required="true" aria-describedby="name-format"><strong> Null</strong>
  </td><td><strong>Ticket Moderateur Null</strong><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="nulltm" value="nulltm"></td><td></td><td></td><td></td><td></td><td><td></td><td></td><td></tr>
  </table><br>
      <div align="center"> <select class="box" name="destination" required >
      <option value="">--Select Destination----</option>
      <option value = 'Consultation'>Consultation</option>
      <option value='Maternite'>Maternite</option>
      <option value='CPN'>CPN</option>
      <option value='Planning'>Planning Familial</option>

    </select>
	</div><br>
<div class="mytable_row" align="center">
<input id="bigbutton" name="bigbutton" type="submit" value="VIEW" onclick="active()" />

</form>
		</div>

	
	
				
					</div> <!-- end content-module-main -->
<?php

$sql = ("SELECT DISTINCT affiliate_number FROM patient where date = CURDATE()");
$result = mysqli_query($conn, $sql);

$sql1 = ("SELECT DISTINCT affiliate_number FROM patient where MONTH(date)= MONTH(CURDATE())and YEAR(date)= YEAR(CURDATE())");
$result1 = mysqli_query($conn, $sql1);

$num_rows = mysqli_num_rows($result);
$num_rows1 = mysqli_num_rows($result1);
echo "<h1 align='center'>$num_rows Patients Today\n</h1>";
echo "<h1 align='center'>$num_rows1 Patients In  ". date('F')."   \n</h1>";

?>

				</div> <!-- end content-module -->
				
				
		
		</div></div> <!-- end full-width -->
			
	</div> <!-- end content -->
	
	
	
	<!-- FOOTER -->
	<div id="footer">
		<p>Powed By Vision Soft Ltd .</p>
	
	</div> <!-- end footer -->

        
</body>

<script src="js/jquery.min.js"></script>
    <script>
      function insertResults(json){
		 $("#insurance").val(json["Insurance"]);
             }

      function clearForm(){
        $("#insurance").val("");
      }

      function makeAjaxRequest(placeId){
        $.ajax({
          type: "POST",
          data: { placeId: placeId },
          dataType: "json", 
          url: "process_ajax7.php",
          success: function(json) {
            insertResults(json);
			 var des=document.getElementById('insurance').value;
			 var des1=document.getElementById('select').value;
		  if( des=="MUTUELLE" || des=="RAMA/RSSB" ||des=="MMI"||des=="MEDIPLA"||des=="RADIANT"){	
		  document.getElementById('pagecode').disabled = false;  
		  }
		  if( des1=="Select Insurance"){	
		  document.getElementById('insurance').value = '';  
		  }
		 	  
		  if( des=="MUTUELLE"){	
		  document.getElementById('catmember').disabled = false;  
		  }
		  if( des=="RAMA/RSSB" || des=="MMI" || des=="MEDIPLA" || des=="NO INSURANCE" || des=="RADIANT"){	
		  document.getElementById('catmember').disabled = true;  
		  }
		  
		  if( des=="MUTUELLE"){	
		  document.getElementById('famcode').disabled = false;  
		  }
		  if( des=="MUTUELLE"){	
		  document.getElementById('pagecode').disabled = true;  
		  }
		  if( des=="RAMA/RSSB" || des=="MMI" || des=="MEDIPLA" || des=="NO INSURANCE" || des=="RADIANT"){	
		  document.getElementById('famcode').disabled = true;  
		  }
		  
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
<script type="text/javascript">
function toggleTextbox(opt)
{
    if (opt == 'yes')
        document.getElementById('numtransf').disabled = false;
    else
        document.getElementById('numtransf').disabled = true;
}
function toggleTextbox1(opt)
{
    if (opt == 'yes')
        document.getElementById('numcopy').disabled = false;
    else
        document.getElementById('numcopy').disabled = true;
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
</html>
