<!DOCTYPE html>
<html lang="en">

	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>


 <link rel="stylesheet" href="css/bootstrap.min.css" />  
    <script src="js/jquery11.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	
	
	
	

<?php
error_reporting(0);
session_start();
include'mydb_connection/my_dbconnection.php';
$userid = $_SESSION['userid'];
$role = $_SESSION['role'];
if(!$userid){
	header('location:logout');
}
$myuser = "select * from customers WHERE id = '$userid'";
$resultcheckuser = $conn_db->query($myuser);
if ($resultcheckuser->num_rows > 0) {
while($rowval = $resultcheckuser->fetch_assoc()) {
$email = $rowval['email'];	
$fname = $rowval['First_Nmae'];	
$lname = $rowval['lname'];	
	
}
}
$myaccount  = $_POST['accontnumber'];;
$customer = "select * from customers WHERE affiliate_number = '$myaccount'";
$resultcustomer= $conn_db->query($customer);
if ($resultcustomer->num_rows > 0) {
while($rowcust = $resultcustomer->fetch_assoc()) {
$firstname = $rowcust['names'];	
$lastname = $rowcust['lname'];	
}
}

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
<script>
function yirmibes() {
  num1 = document.getElementById("firstNumber").value;
  document.getElementById("result").value = (num1 / 100) * 25;
}

function elli() {
  num1 = document.getElementById("firstNumber").value;
  document.getElementById("result").value = (num1 / 100) * 50;
}

function format(input) {
  var nStr = input.value + '';  
  nStr = nStr.replace(/\,/g, "");
  x = nStr.split('.');
  x1 = x[0];
  x2 = x.length > 1 ? '.' + x[1] : '';  
  var rgx = /(\d+)(\d{3})/;
  while (rgx.test(x1)) {
    x1 = x1.replace(rgx, '$1' + ',' + '$2');
  }
  input.value = x1 + x2;
}


</script>
<style>
body {margin:0;font-family:Arial}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.active {
  background-color: #4CAF50;
  color: white;
}

.topnav .icon {
  display: none;
}

.dddropdown {
  float: left;
  overflow: hidden;
}

.dddropdown .dropbtn {
  font-size: 17px;    
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.dddropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dddropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.topnav a:hover, .dddropdown:hover .dropbtn {
  background-color: #555;
  color: white;
}

.dddropdown-content a:hover {
  background-color: #ddd;
  color: black;
}

.dddropdown:hover .dddropdown-content {
  display: block;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child), .dddropdown .dropbtn {
    display: none;
  }
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
  .topnav.responsive .dddropdown {float: none;}
  .topnav.responsive .dddropdown-content {position: relative;}
  .topnav.responsive .dddropdown .dropbtn {
    display: block;
    width: 100%;
    text-align: left;
  }
}
</style>

	
<body>
<style>
.errors
{
	color:#FF0000;
}

</style>

<style>
table, th, td {
  border: 1px solid black;
  padding: 5px;
  width:100%;
}
table {
  border-spacing: 15px;
}
</style>
		<link href="jquery-ui1.css" rel="stylesheet" type="text/css"/>  
   <script src="jquery.min1.js"></script>  
   <script src="jquery-ui.min1.js"></script> 

   <script type="text/javascript">
       $(function() {
               $("#datesearch").datepicker({ dateFormat: "dd/mm/yy" }).val()
               $("#datesearch1").datepicker({ dateFormat: "dd/mm/yy" }).val()
       });

   </script>
   
	 <link rel="stylesheet" href="css/bootstrap.min.css" />  
    <script src="js/jquery11.min.js"></script>
    <script src="js/bootstrap.min.js"></script>	
</head>

<body>
     <form class="form-sample" method="POST" action="save_file" enctype="multipart/form-data"id="myCoolForm">
    
    <!-- partial:partials/_navbar.html -->
    
	
    <!-- partial -->
    <div style=" height: 200px;  width: 90%;margin:AUTO">
      <!-- partial:partials/_sidebar.html -->
      
	
			 <h1><strong>COPEC  <input type="text" name="amazinaCOOPEC"  style="border:1px solid #000000"  value="TWITEZIMBERE" placeholder="......................................................................................"    autocomplete="off"  ></strong></h1><HR>
			 <H3><strong><i>IFISHI ISABA INGUIZANYO No <input type="text" name="Noifishi"  style="border:1px solid #000000"  placeholder="...................................................."    autocomplete="off"  ></i></strong></H3><hr>
			 
	<strong>Amazina *&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="amazina"  size="45px" style="border:1px solid #000000"  placeholder="......................................................................................"    autocomplete="off"  >&nbsp;&nbsp;&nbsp;&nbsp;<strong>Igitsina *&nbsp;&nbsp;&nbsp;&nbsp; </strong></span>    <select  id = "gender"  name = "gender" style="border-color:black" ><option value=""><strong>--------------<strong></option><option value="GABO"><strong>GABO<strong></option><option value="GORE"><strong>GORE<strong></option></select><strong>Umwuga *&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="umwuga"  style="border:1px solid #000000"  placeholder="......................................................................................"    autocomplete="off"  ><br><br>

				<strong>Mwene *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="ise"  size="45px" style="border:1px solid #000000" placeholder="............................................................................."    autocomplete="off"  >&nbsp;&nbsp;&nbsp;&nbsp;<strong>Na *&nbsp;&nbsp;&nbsp;&nbsp; </strong></span><input type="text" name="nyina"  size="45px" style="border:1px solid #000000" placeholder=".............................................................................."   autocomplete="off" ><br><br>
			<strong>Aho abarizwa *&nbsp;&nbsp;<i>(Province/District/Secteur/Village)</i>&nbsp;&nbsp; </strong></span><select  id="provincelist" name="provincelist" style="border-color:black" onChange="getDistrict(this.value);SelectedTextValue(this);"><option value="" >---------Intara----------</option><span id="reqProvince" class="reqError" requ>
<?php
foreach($results as $province) {
?>
<option value="<?php echo $province["Province_id"]; ?>"><?php echo $province["province_name"]; ?></option>
<?php
}
?> </select><input name="provinceName" type="text" id="txtContent" style="display:none" /><select  id="disrict_liste" name="district" style="border-color:black" onChange="getSector(this.value);sSelectedTextValue1(this);" > <span id="reqDistrict" class="reqError" requ></span>
<option value="">------Akarere-----------</option>
</select>			  </select><input name="employerDistrictName" type="text" id="ttxtContent1"  style="display:none" />
<select id="sector_list"  name="sector" style="border-color:black" onChange="getCell(this.value);sSelectedTextValue2(this);" ><span id="reqSector" class="reqError" requ></span>
<option value="">Umurenge</option>
</select>     <input name="employerSectorName" type="text" id="ttxtContent2"  style="display:none" />
<select id="cell_list" name="cell" style="border-color:black" onChange="sSelectedTextValue3(this);" ><span id="reqCell" class="reqError" requ></span>
<option value="">Akagari</option>
</select><input name="employerCellName" type="text" id="ttxtContent3" style="display:none"  /> <input type="text"  name = "village" id = "village"  placeholder="    Umudugudu" style="border:1px solid #000000" />
<span id="reqVillagre" class="reqError" requ></span>

<table class="users">
<tr><td class= "row1"><b>Inzu NIYE</b>&nbsp;&nbsp;&nbsp;<input class="form-radio" type="radio" name="niye" value="INZU NIYE" ><br>
ARAKODESHA</b>&nbsp;&nbsp;&nbsp;<input class="form-radio" type="radio" name="niye" value="ARAKODESHA" ></td>
<td class= "row2"><table><tr><td><strong>Indangamuntu No</td><td>Telephone No</strong></td></tr><tr><td><input type="text"  name = "noindangamuntu" id = "village"  placeholder="    No Indangamuntu" style="border:1px solid #000000" /></td><td><input type="text"  name = "notelephone" id = "village"  placeholder="    Telephone" style="border:1px solid #000000" /></td></tr></table>
<td >Arubatse <input type="radio" class="form-radio" name="kubaka" value="Arubatse" > <br>Umupfakazi <input type="radio" class="form-radio" name="kubaka" value="Umupfakazi" ><br>Ingaragu <input type="radio" class="form-radio" name="kubaka" value="Ingaragu" ><hr>Umubare w'abana atunze <input type="number"  name = "abanaatunze" id = "village" size="5px" style="border:1px solid #000000" /><br>Umubare w'abandi bantu atunze<input type="number"  name = "abandiatunze" id = "village" size="1px" style="border:1px solid #000000" /></td></tr>
</table>
<table class="user"><tr><td class="row3"><h5><strong>Bwana /  Madamu Perezida,</strong></h5>
Nshimishijwe no kubasaba inguzanyo  ingana na <input  type="text" size = "10" style="border: 1px solid #555;" name="loanamount"  id="firstNumber" onkeyup="format(this)" placeholder="Inguzanyo" style="border-color:black" > Frw</br>
Mu nyuguti <input  type="text" size = "80" style="border: 1px solid #555;" name="loanamountcharacter"   placeholder=".............................................................................................................................................................." style="border-color:black" > <br>
Nkazayishyura mu byiciro &nbsp;&nbsp;&nbsp;<input type="number"  name = "ibyiciro" id = "village" size="1px" style="border:1px solid #000000" /> Mugihe cyose kingana n'amezi <input type="number"  name = "igihecyokwishyura" id = "village" size="1px" style="border:1px solid #000000" /><br>
Impamvu y'inguzanyo &nbsp;&nbsp;<input  type="text" size = "80" style="border: 1px solid #555;" name="impamvuinguzanyo"   placeholder=".............................................................................................................................................................." style="border-color:black" > <br>
Ndi umunyamuryango wa COOPEC kuri No <input  type="text" size = "20" style="border: 1px solid #555;" name="Noumunyamuryango"   placeholder=".............................................................................................................................................................." style="border-color:black" > Kuwa <input type="text" name="datekuvaumunya" id="datesearch"   aria-='true' aria-describedby='name-format' placeholder="........./........../......." ><br>
Kuri Konti No <input  type="text" size = "20" style="border: 1px solid #555;" name="nokonti"   placeholder=".............................................................................................................................................................." style="border-color:black" > Iriho <input type="text" name="arikurikonti" id="arikurikonti"   aria-='true' aria-describedby='name-format' placeholder="......................." > Kuwa <input type="text" name="datesearch" id="datesearch1"   aria-='true' aria-describedby='name-format' placeholder="........./........../......." ><br>
Kurayo mafaranga mpaye COOPEC uburenganzira bwo gufatira  <input  type="text" size = "20" style="border: 1px solid #555;" name="afatirwakurikonti"  onkeyup="format(this)" placeholder=".............................................................................................................................................................." style="border-color:black" > Frw<br>
Kugira ngo twongere ingwate y'amafaranga tuvuze haruguru</td>
<td  class="row3"><h3><strong>Impamvu Y'inguzanyo</strong></h3><hr>
<input type="radio" class="form-radio" name="obwokoinguzanyo" value="Ubuhinzi" >&nbsp;&nbsp;&nbsp;Ubuhinzi<br>
<input type="radio" class="form-radio" name="obwokoinguzanyo" value="Ubworozi_uburobyi" >&nbsp;&nbsp;&nbsp;Ubworozi , Uburobyi<br>
<input type="radio" class="form-radio" name="obwokoinguzanyo" value="ubwubatsi_inganda" >&nbsp;&nbsp;&nbsp;Ubwubatsi bwa Leta, Ibigega/Anterepurize, Inganda n'ibindi<br>
<input type="radio" class="form-radio" name="obwokoinguzanyo" value="ubucuruzi+amahoteri" >&nbsp;&nbsp;&nbsp;Ubucuruzi, Resitora, Hoteri<br>
<input type="radio" class="form-radio" name="obwokoinguzanyo" value="ubugeni_inganda" >&nbsp;&nbsp;&nbsp;Transformation des produits, Ubuhinzi n'ubugeni / Inganda<br>
<input type="radio" class="form-radio" name="obwokoinguzanyo" value="ubwikorezi" >&nbsp;&nbsp;&nbsp;Ubwikorezi,Ububiko, Itumanaho<br>
<input type="radio" class="form-radio" name="obwokoinguzanyo" value="ibindi_byagaciro" >&nbsp;&nbsp;&nbsp;Ibindi by'agaciro<br>
</td></tr></table><br>
 <table class="user" id="dynamic_field3" width="50%">  
				<tr><td  colspan="4"><h3><strong>A - Ntanze </strong>ibikoresho bikurikira ho ingwate</td><td   colspan="4"><strong>Amazina n'aho abarizwa</strong></td></tr>
				<tr><td class="rowid">No</td><td class="row1">Ibikoresho</td><td  class="row1">Uko Bimeze n'aho bibarizwa</td><td  class="row1">agaciro</td><td><strong>Amazina n'aho abarizwa Umukono</strong></td></tr>
                    <tr>
                        <td class="rowid">1</td>  
                        <td class="row1"><input type="text" name="igikoresho[]"    placeholder="Ubwoko Igikoresho"  /></td>  
                        <td  class="row1"><input type="text" name="ukokimeze[]"  id="firstNumber"  placeholder="Ukokimeze Aho kibarizwa"  /></td>  
                        <td  class="row1"><input type="text" name="agaciroigikoresho[]"  id="firstNumber" onkeyup="format(this)" placeholder="Agaciro" /></td>  
                        <td  colspan="2"><input type="text" name="ahobabrizwa[]"  id="firstNumber" size="70px" placeholder="Amazina- Aho Abarizwa"  /></td>  
                        <td><button type="button" name="add3" id="add3" class="btn btn-success"> + Add More</button></td>  
                    </tr>  
					</table><br>
 <table class="user" id="dynamic_field4" width="50%">  
				<tr><td  colspan="8"><h3><strong><p>B - Twebwe </strong>twemeye<strong> Ubwihsingizi magirirane</strong> kunguzanyo<strong> yasabwe haruguru </strong>kandi twiyemeje kuzayishyura igihe icyo aricyo cyose uwayisabye azananirwa kubahiriza amasezerano.</p></td></tr>
				<tr><td class="rowid">No</td><td class="row1">Amazina</td><td  class="row5">Icyo Bakora n'aho Babarizwa</td><td  class="row1">Amafaranga y'ingwante</td><td><strong>Konti No</strong></td><td><strong>Itariki</strong></td><td><strong>Umukono</strong></td><td></td></tr>
                    <tr>
                        <td class="rowid">1</td>  
                        <td class="row1"><input type="text" name="Amazinaref[]"    placeholder="Amazina"  /></td>  
                        <td  class="row5"><input type="text" name="icyorefbakora[]"  id="firstNumber"  placeholder="Icyo bakora "  />&nbsp;&nbsp;&nbsp;<input type="text" name="addressref[]"  id="firstNumber"  placeholder="Aho babarizwa"  /></td>  
                        <td  class="row1"><input type="text" name="agaciroingwate[]"  id="firstNumber" onkeyup="format(this)" placeholder="Agaciro k'ingwate" /></td>  
                        <td  class="row1"><input type="text" name="kontiref[]"  id="firstNumber" placeholder="Konti No"  /></td>  
                        <td  class="row1"><input type="text" name="dateref[]"  id="firstNumber" placeholder="........./......../........."  /></td>  
                        <td  class="row1"></td>  
                        <td><button type="button" name="add4" id="add4" class="btn btn-success"> + Add More</button></td>  
                    </tr>  
					</table><br>
					<p> <font size='4'><i>
					Ndemeza mvugishije ukuri ko amakuru ari muri iyi dosiye ko ari yo kandi mpaye uburenganzira COOPEC kuyagenzura ikayuzuza ikoresheje uburyo bwose ibona bushoboka.
					</font></p>
       <p> <font size='4'><strong>
	  Itariki n'umukono </strong> by'usaba igihe yabisabiye &nbsp;&nbsp;&nbsp; <strong><?php echo date("d/m/Y") ;?> </strong>&nbsp;&nbsp;&nbsp;   Ibyangombwa yatanze.</i>
	   </font></p>
	   <p class="card-description" align="left">
<div class="card-body" id = "attachments" align="center">


                    
                   
                    <div class="row">
                      <div class="input_fields_wrap">
                        <div style = "display: none" ><input type="file" name="attachment" value="Attach File" id="first_attach">
						<a href="#" class="remove_field"  style="color:red;"><img src="img/delattach.png.png" width="15" height="15"/><strong> Remove File 1</strong></a>
						</div>
                    </div>
                    </div>
                  					<a class="add_field_button" style="float:center"><strong><img src="img/attACHMENT.png" style="float: center; " width="35" height="35"/><font size="3">Add_Document</strong></a></font><br><br><br>
            </div>                    </p>
                    
                   
                    
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	&nbsp;&nbsp;&nbsp;	&nbsp;&nbsp;&nbsp;	<input type="checkbox" name="confirmation"  id="confirmation"  onclick="activation()" >	
					
						<span style="color:red">Do you want to save information ?</span>
					<button type="button" class="btn btn-success dropdown-toggle btn-sm" id = "view" style="float: center;">View</button>
					<br><br>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input id="bigbutton" name="bigbutton" type="submit" value="Save" style="display:none" /><hr>
</div >	
</form>
<style type="text/css">

.form-radio
{
     -webkit-appearance: none;
     -moz-appearance: none;
     appearance: none;
     display: inline-block;
     position: relative;
     background-color: #283747;
     color: #283747;
     top: 10px;
     height: 20px;
     width: 20px;
     border: 0;
     border-radius: 50px;
     cursor: pointer;     
     margin-right: 7px;
     outline: none;
}
.form-radio:checked::before
{
     position: absolute;
     font: 13px/1 'Open Sans', sans-serif;
     left: 11px;
     top: 7px;
     content: '\02143';
     transform: rotate(40deg);
}
.form-radio:hover
{
     background-color: #f7f7f7;
}
.form-radio:checked
{
     background-color: #f1f1f1;
}
label
{
     font: 15px/1.7 'Open Sans', sans-serif;
     color: #333;
     -webkit-font-smoothing: antialiased;
     -moz-osx-font-smoothing: grayscale;
     cursor: pointer;
} 
.users {
  table-layout: fixed;
  width: 100%;
  white-space: nowrap;
}
.users td {
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}

/* Column widths are based on these cells */
.row1 {
  width: 20%;
  
}
.row2 {
  width: 45%;
}
.row3 {
  width: 80%;
}.rowid {
  width: 2%;
}
.row5 {
  width: 40%;
  
}

</style>
	   <script type="text/javascript">
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
        function sSelectedTextValue1(ele) {
            if (ele.selectedIndex > 0) {
                var selectedText = ele.options[ele.selectedIndex].innerHTML;
                var selectedValue = ele.value;
                document.getElementById("ttxtContent1").value = selectedText;
				document.getElementById("ttxtContent2").value = "";
				document.getElementById("ttxtContent3").value = "";
            }
            else {
                document.getElementById("ttxtContent1").value = "";
				document.getElementById("ttxtContent2").value = "";
				document.getElementById("ttxtContent3").value = "";
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
        function sSelectedTextValue2(ele) {
            if (ele.selectedIndex > 0) {
                var selectedText = ele.options[ele.selectedIndex].innerHTML;
                var selectedValue = ele.value;
                document.getElementById("ttxtContent2").value = selectedText;
				document.getElementById("ttxtContent3").value = "";

            }
            else {
                document.getElementById("ttxtContent2").value = "";
				document.getElementById("ttxtContent3").value = "";

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
	   <script type="text/javascript">
        function sSelectedTextValue3(ele) {
            if (ele.selectedIndex > 0) {
                var selectedText = ele.options[ele.selectedIndex].innerHTML;
                var selectedValue = ele.value;
                document.getElementById("ttxtContent3").value = selectedText;
            }
            else {
                document.getElementById("ttxtContent3").value = "";
            }
        }
    </script>
		<script>
            jQuery(document).ready(function() {
                jQuery("#submit").click(function(e) {
                    var sen_email = jQuery('.sen_email').val();
                    var rec_email = jQuery('.rec_email').val();
                    if (sen_email == "") {
                        alert('Sender\'s Email Address cannot be empty.');
                         e.preventDefault();
                    }
                    if (rec_email == "") {
                        alert('Receiver\'s Email Address cannot be empty.');
                         e.preventDefault();
                    }
                   /* var attach = jQuery('#first_attach').val();
                    if (attach == "") {
                        alert('Atleast one attachment is !!!');
                        e.preventDefault();
                    }*/
                    
                });
                // Code for creating more attachment file
                // Maximum attachment allowed
                var max_fields = 11;
                //Fields wrapper
                var wrapper = $(".input_fields_wrap");
                // Add button ID
                var add_button = $(".add_field_button");
                // Initlal attachment field count
                var x = 1;

                // Add attachment field on per click
                $(add_button).click(function(e) {
                    e.preventDefault();
                    // Max attachment allowed
                    if (x < max_fields) {
                        // Attachment increment
                        x++;
						y = x-1;
                        $(wrapper).append('<div style = " margin-left:85px"><input type="file" name="attachment' + x + '"/><a href="#" class="remove_field"  style="color:red;"><img src="img/delattach.png.png" width="15" height="15"/><strong> Remove Document'+y+'</strong></a></div>'); //add attachment
                        if (x == max_fields) {
                            // Hide add more attachment link
                            $(".add_field_button").hide();
                        }
						
                    }

                });
                // Remove attachment on per click
                $(wrapper).on("click", ".remove_field", function(e) { //user click on to remove attachment
                    e.preventDefault();
                    $(this).parent('div').remove();
                    x--;

                    if (x < max_fields) {
                        // Show add more attachment link when field < max_fields
                        $(".add_field_button").show();
                    }
                })
            });
        </script>
		 <script src="jquery-1.5.js"></script>
<script>
function activation(){
var check = document.getElementById('confirmation');
var btn = document.getElementById('bigbutton');	
var view = document.getElementById('view');	
var back = document.getElementById('back');	
if(check.checked){
btn.style.display='inline';	
back.style.display='none';	
view.style.display='none';	
}
else{
btn.style.display='none';	
back.style.display='inline';	
view.style.display='inline';
}
}

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
function getDistrict1(val) {
	$.ajax({
	type: "POST",
	url: "getDistrict1.php",
	data:'disrict_id1='+val,
	success: function(data){
		$("#disrict_liste1").html(data);
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
function getCell1(val) {
	$.ajax({
	type: "POST",
	url: "getCell1.php",
	data:'cell_id1='+val,
	success: function(data){
		$("#cell_list1").html(data);
	}
	});
}

</script>


		

 <link rel="stylesheet" href="css/bootstrap.min.css" />  
    <script src="js/jquery11.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	   

<script type="text/javascript">
    $(document).ready(function(){      
      var i=1;  
      $('#add3').click(function(){  
           i++;  
           $('#dynamic_field3').append('<tr id="row'+i+'" class="dynamic-added"><td class="rowid">'+i+'</td><td class="row1"><input type="text" name="igikoresho[]"    placeholder="Ubwoko Igikoresho"  /></td> <td  class="row1"><input type="text" name="ukokimeze[]"  id="firstNumber"  placeholder="Ukokimeze Aho kibarizwa"  /></td><td  class="row1"><input type="text" name="agaciroigikoresho[]"  id="firstNumber" onkeyup="format(this)" placeholder="Agaciro" /></td> <td  colspan="2"><input type="text" name="ahobabrizwa[]"  id="firstNumber" size="70px" placeholder="Amazina- Aho Abarizwa"  /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X Remove</button></td></tr>');  
      });
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  
      $('#submit').click(function(){            
           $.ajax({  
                url:postURL,  
                method:"POST",  
                data:$('#add_name').serialize(),
                type:'json',
                success:function(data)  
                {
                  	i=1;
                  	$('.dynamic-added').remove();
                  	$('#add_name')[0].reset();
    				        alert('Record Inserted Successfully.');
                }  
           });  
      });
    });  

</script>
<script type="text/javascript">
    $(document).ready(function(){      
      var i=1;  
      $('#add4').click(function(){  
           i++;  
           $('#dynamic_field4').append('<tr id="row'+i+'" class="dynamic-added"><td class="rowid">'+i+'</td><td class="row1"><input type="text" name="Amazinaref[]"    placeholder="Amazina"  /></td><td  class="row5"><input type="text" name="icyorefbakora[]"  id="firstNumber"  placeholder="Icyo bakora "  />&nbsp;&nbsp;&nbsp;<input type="text" name="addressref[]"  id="firstNumber"  placeholder="Aho babarizwa"  /></td><td  class="row1"><input type="text" name="agaciroingwate[]"  id="firstNumber" onkeyup="format(this)" placeholder="Agaciro kingwate" /></td> <td  class="row1"><input type="text" name="kontiref[]"  id="firstNumber" placeholder="Konti No"  /></td><td  class="row1"><input type="text" name="nimerokonti[]"  id="firstNumber" placeholder="........./......../........."  /></td><td></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X Remove</button></td></tr>');  
      });
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  
      $('#submit').click(function(){            
           $.ajax({  
                url:postURL,  
                method:"POST",  
                data:$('#add_name').serialize(),
                type:'json',
                success:function(data)  
                {
                  	i=1;
                  	$('.dynamic-added').remove();
                  	$('#add_name')[0].reset();
    				        alert('Record Inserted Successfully.');
                }  
           });  
      });
    });  

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
