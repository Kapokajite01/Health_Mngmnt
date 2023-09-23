
<?php
error_reporting(0);
include_once('connect_db.php');
session_start();
    $role = $_SESSION['sess_userrole'];
	$name = $_SESSION['sess_name'];
	$tel= $_SESSION['sess_phone'];
	$lname = $_SESSION['sess_lname'];
    if(!($_SESSION['sess_username']) or ($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro') or $role!="Receptionist"){
      header('Location: logout');
	}
	else{
	$sql=("INSERT INTO logs(id,name,lname,phone,action,time)
VALUES('','$name','$lname','$tel','Login',now())");	
		
	}
$myusername=$_SESSION['sess_username'];

$insurance_number = $_GET['newid'];
$postedesante = $_SESSION['sess_postdsante'];
$result = ("select * from patient where affiliate_number ='$insurance_number' order  by id DESC LIMIT 1");
$resultcheckpatient = mysqli_query($conn, $result);
while ($rowval = mysqli_fetch_assoc($resultcheckpatient)) {
	$p_id = $rowval['id'];
    $number = $rowval['affiliate_number'];
    $fname = $rowval['names'];
    $lastname = $rowval['lname'];
    $gender = $rowval['gender'];
	$dob = $rowval['dob'];
	$insurance=$rowval['insurance'];
	$category=$rowval['category'];
	$fcode=$rowval['familycode'];
	$formnumber=$rowval['pagenumber'];
	$afname=$rowval['affiliate_names'];
	$aflname=$rowval['afilliate_lastname'];
	$afectation=$rowval['affectation'];
	$province=$rowval['province'];
	$district=$rowval['district'];
	$sector=$rowval['sector'];
	$cell=$rowval['cell'];

}	?>
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
<link href="jquery-ui1.css" rel="stylesheet" type="text/css"/>  
 <script src="jquery.min1.js"></script>  
   <script src="jquery-ui.min1.js"></script> 
   <script type="text/javascript">
       $(function() {
               $("#datesearch").datepicker({ dateFormat: "yy-mm-dd" }).val()
               $("#datesearch1").datepicker({ dateFormat: "yy-mm-dd" }).val()
       });

   </script> 
</head>
  	
			
<body  onload="activatescript();">

	<!-- TOP BAR -->
	<!-- TOP BAR -->
	<?php
	
	$ldt = $_POST['lastdatecons'];
	$ddate = $_POST['date'];
	$ldt = strtotime($ldt);
	$ddate  = strtotime($ddate);
$diff = $ddate - $ldt;

	$ncase = "Ancien";

	$mdiff = floor($diff/(60*60*24));
	if($mdiff <= 14){
		$ncase = "Nouveau";
		
	}
	else{
	$ncase = "Ancien";
	}

	include_once('menusr.php');

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


<tr><td></td><td></td><td><strong>Name </strong></td><td><input name="names" type="text" size='15'  required aria-required="true" aria-describedby="name-format" style=' width:250px;height:30px' /></td><td><strong>Last Name <br></strong><input name="lnames"  type="text" size='15' required aria-required="true" aria-describedby="name-format" style=' width:250px;height:30px'/></td><td><strong>Date: <input type="text" name ="mydate" id="datesearch" size="30" placeholder="Enter Date " required aria-required='true' aria-describedby='name-format' autocomplete="off"></td><td></td><td></td><td><td></td><td></td><td></tr>
<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><td></td><td></td><td></tr>
<tr><td></td><td><td><strong>Insurance Number </td><td></strong><input name="insnumber"  id="insnumber" type="text" size='15' value="<?php if($number){echo $number;} else{echo $insurance_number ;}?>" required aria-required="true" aria-describedby="name-format" style=' width:250px;height:30px'/></td><td><strong>Gender</strong><br>     <select id="sensor" onchange="updateText('sensor')" style=' width:250px;height:30px' required>
        <option value=""></option>
        <option value="MALE">M</option>
        <option value="FEMALE">F</option> <input type="text" name="gender" style="display:none" value="<?php echo $gender;?>" id="sensorText"value="" required aria-required="true" aria-describedby="name-format"/ required>
</td><td></td><td><td></td><td></td><td> </td><td></td></tr>
<tr><td></td><td></td><td></td><td><?php

  $query = "SELECT * from assurance";
$resultcins = mysqli_query($conn, $query);
?>

    <select name="selectScript" id="select" style=' width:250px;height:30px'><option value=""><strong>Select Insurance<strong></option>

      <?php
        while ($row = mysqli_fetch_assoc($resultcins)) {
            echo '<option value="' . $row['id'] . '">' . $row['Insurance'] . '</option>';
        }
      ?>
    </select></td><td><B>Year Of Birth</b><select id="voltage" onchange="updateText('voltage')" required>
       <option value=""></option>
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
<tr><td></td><td></td><td><b>ADDRESS</b></td><td><strong>PROVINCE</strong> <select id="voltage1" onchange="updateText('voltage1')" style=' width:250px;height:30px'>
   <option value="DD Province" >DD Province</option>
        <option value="DD PROVINCE" >DD PROVINCE</option>
        <option value="Kigali City" >Kigali City</option>
        <option value="Southern Province" >Southern Province</option>
        <option value="Northern Province" >Northern Province</option>
    </select><input type="text" name="province" style = "display:none" id="voltage1Text"  value="<?php if($province){echo $province;} else{echo 'DD Province';}?>" required aria-required="true" aria-describedby="name-format" /></td>
<td><strong>DISTRICT&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</strong><select id="voltage2" onchange="updateText('voltage2')" style="width:250px;height:30px">
           <option value="Kulu" >Kulu</option>
 
    <option value="Kulu" >Kulu</option>
  <option value="Kulu" >Kulu</option>
        <option value="Bugesera" >Bugesera</option>
        <option value="Gasabo" >Gasabo</option>
        <option value="Muhanga" >Muhanga</option>
        <option value="Burera" >Burera</option>
        <option value="Gakenke" >Gakenke</option>
        <option value="Gicumbi" >Gicumbi</option>
        <option value="Gisagara" >Gisagara</option>
        <option value="Huye" >Huye</option>
        <option value="Kulu" >Kulu</option>
        <option value="Karongi" >Karongi</option>
        <option value="Kicukiro" >Kicukiro</option>
        <option value="Kirehe">Kirehe</option>
        <option value="Musanze">Musanze</option>
        <option value="Ngoma">Ngoma</option>
        <option value="Ngororero">Ngororero</option>
        <option value="Nyabihu">Nyabihu</option>
        <option value="Nyagatare">Nyagatare</option>
        <option value="Nyamagabe">Nyamagabe</option>
        <option value="Nyanza">Nyanza</option>
        <option value="Nyarugenge">Nyarugenge</option>
        <option value="Nyaruguru">Nyaruguru</option>
        <option value="Rubavu">Rubavu</option>
        <option value="Ruhango">Ruhango</option>
        <option value="Rulindo">Rulindo</option>
        <option value="Rusizi" >Rusizi</option>
        <option value="Kulu" >Kulu</option>
        <option value="Rwamagana" >Rwamagana</option>
    </select><input type="text" name="district" style = "display:none"  value="<?php if($district){echo $district;} else{echo 'Bugesera';}?>" id="voltage2Text"  required aria-required="true" aria-describedby="name-format"/></td><td><strong>SECTOR</strong><select id="voltage3" onchange="updateText('voltage3')" style=' width:250px;height:30px'>
        <option value="dirskhpe_rangiro" >Kulu</option>
 <option value="dirskhpe_rangiro" >Kulu</option>
        <option value="Macuba" >Macuba</option>
        <option value="Kirimbi">Kirimbi</option>
        <option value="Kagano" >Kagano</option>
	   <option value="Ruhuha">Ruhuha</option>
		<option value="Kacyiru" >Kacyiru</option>
        <option value="Remera" >Remera</option>
        <option value="Kimironko" >Kimironko</option>
        <option value="Kibangu" >Kibangu</option>
        <option value="Nyabinoni" >Nyabinoni</option>
        <option value="Kabacuzi" >Kabacuzi</option>
        <option value="Kiyumba">Kiyumba</option>
        <option value="Rongi" >Rongi</option>
        <option value="Base">Base</option>
        <option value="Bigogwe" >Bigogwe</option>
        <option value="Boneza" >Boneza</option>
        <option value="Bugarama" >Bugarama</option>
        <option value="Bugeshi" >Bugeshi</option>
        <option value="Bukure" >Bukure</option>
        <option value="Bumbogo" >Bumbogo</option>
        <option value="Bungwe">Bungwe</option>
        <option value="Burega">Burega</option>
        <option value="Buruhukiro">Buruhukiro</option>
        <option value="Busanze">Busanze</option>
        <option value="Busasamana" >Busasamana</option>
        <option value="Bushekeri">Bushekeri</option>
        <option value="Bushenge">Bushenge</option>
        <option value="Bushoki" >Bushoki</option>
        <option value="Busogo" >Busogo</option>
        <option value="Busoro" >Busoro</option>
        <option value="Butare" >Butare</option>
        <option value="Butaro" >Butaro</option>
        <option value="Buyoga" >Buyoga</option>
        <option value="Bweramana" >Bweramana</option>
        <option value="Bwira">Bwira</option>
        <option value="Bwishyura" >Bwishyura</option>
        <option value="Bwisige" >Bwisige</option>
        <option value="Byimana" >Byimana</option>
        <option value="Byumba">Byumba</option>
        <option value="Coko" >Coko</option>
        <option value="Cyabakamyi" >Cyabakamyi</option>
        <option value="Cyabingo" >Cyabingo</option>
        <option value="Cyahinda" >Cyahinda</option>
	    <option value="Cyanika">Cyanika</option>
        <option value="Cyanzarwe" >Cyanzarwe</option>
        <option value="Cyato">Cyato</option>
        <option value="Cyeru">Cyeru</option>
        <option value="Cyeza">Cyeza</option>
        <option value="Cyinzuzi">Cyinzuzi</option>
        <option value="Cyumba">Cyumba</option>
        <option value="Cyungo">Cyungo</option>
        <option value="Cyuve">Cyuve</option>
        <option value="Fumbwe" >Fumbwe</option>
        <option value="Gacaca" >Gacaca</option>
        <option value="Gacurabwenge">Gacurabwenge</option>
        <option value="Gahanga">Gahanga</option>
        <option value="Gahara">Gahara</option>
        <option value="Gahengeri">Gahengeri</option>
        <option value="Gahini" >Gahini</option>
        <option value="Gahunga">Gahunga</option>
        <option value="Gakenke">Gakenke</option>
        <option value="Gasaka ">Gasaka </option>
        <option value="Gasange" >Gasange</option>
        <option value="Gashaki" >Gashaki</option>
        <option value="Gashanda" >Gashanda</option>
        <option value="Gashenyi" >Gashenyi</option>
        <option value="Gashonga" >Gashonga</option>
        <option value="Gashora" >Gashora</option>
        <option value="Gataraga" >Gataraga</option>
        <option value="Gatare" >Gatare</option>
        <option value="Gatebe" >Gatebe</option>
        <option value="Gatenga">Gatenga</option>
        <option value="Gatore" >Gatore</option>
        <option value="Gatsata">Gatsata</option>
        <option value="Kulu" >Kulu</option>
        <option value="Gatumba" >Gatumba</option>
        <option value="Gatunda" >Gatunda</option>
        <option value="Gihango" >Gihango</option>
        <option value="Giheke" >Giheke</option>
        <option value="Gihombo">Gihombo</option>
        <option value="Gihundwe">Gihundwe</option>
        <option value="Gikomero">Gikomero</option>
        <option value="Gikondo" >Gikondo</option>
        <option value="Gikonko">Gikonko</option>
        <option value="Gikundamvura">Gikundamvura</option>
        <option value="Gisenyi">Gisenyi</option>
        <option value="Gishamvu">Gishamvu</option>
        <option value="Gishari">Gishari</option>
        <option value="Gishyita">Gishyita</option>
        <option value="Gisozi" >Gisozi</option>
        <option value="Gitambi" >Gitambi</option>
        <option value="Gitega">Gitega</option>
        <option value="Gitesi">Gitesi</option>
        <option value="Giti" >Giti</option>
        <option value="Gitoki" >Gitoki</option>
        <option value="Gitovu">Gitovu</option>
        <option value="Hindiro">Hindiro</option>
        <option value="Huye" >Huye</option>
        <option value="Jabana">Jabana</option>
        <option value="Jali">Jali</option>
        <option value="Janja">Janja</option>
        <option value="Jarama">Jarama</option>
        <option value="Jenda">Jenda</option>
        <option value="Jomba">Jomba</option>
        <option value="Juru" >Juru</option>
        <option value="Kabagari">Kabagari</option>
        <option value="Kabare">Kabare</option>
        <option value="Kabarondo" >Kabarondo</option>
        <option value="Kabarore">Kabarore</option>
        <option value="Kabatwa" >Kabatwa</option>
        <option value="Kabaya" >Kabaya</option>
        <option value="Kulu">Kulu</option>
        <option value="Karongi" >Karongi</option>
        <option value="Kulu" >Kulu</option>
        <option value="Kicukiro" >Kicukiro</option>
        <option value="Kirehe" >Kirehe</option>
        <option value="Kaduha" >Kaduha</option>
        <option value="Kagarama" >Kagarama</option>
        <option value="Kageyo" >Kageyo</option>
        <option value="Kagogo" >Kagogo</option>
        <option value="Kamabuye">Kamabuye</option>
        <option value="Kamegeri" >Kamegeri</option>
        <option value="Kamembe" >Kamembe</option>
        <option value="Kamubuga" >Kamubuga</option>
        <option value="Kanama">Kanama</option>
        <option value="Kaniga">Kaniga</option>
        <option value="Kanjongo">Kanjongo</option>
        <option value="Kanombe">Kanombe</option>
        <option value="Kansi">Kansi</option>
        <option value="Kanyinya">Kanyinya</option>
        <option value="Karago">Karago</option>
        <option value="Karama">Karama</option>
        <option value="Karambo">Karambo</option>
        <option value="Karangazi" >Karangazi</option>
        <option value="Karembo" >Karembo</option>
        <option value="Karenge">Karenge</option>
        <option value="Karengera" >Karengera</option>
        <option value="Katabagemu" >Katabagemu</option>
        <option value="Kavumu" >Kavumu</option>
        <option value="Kayenzi">Kayenzi</option>
        <option value="Kayumbu">Kayumbu</option>
        <option value="Kazo">Kazo</option>
        <option value="Kibeho">Kibeho</option>
        <option value="Kibilizi">Kibilizi</option>
        <option value="Kibumbwe">Kibumbwe</option>
        <option value="Kibungo" >Kibungo</option>
        <option value="Kicukiro">Kicukiro</option>
        <option value="Kigabiro" >Kigabiro</option>
        <option value="Kigali">Kigali</option>
        <option value="Kigarama">Kigarama</option>
        <option value="Kigembe">Kigembe</option>
        <option value="Kigeyo">Kigeyo</option>
        <option value="Kigina">Kigina</option>
        <option value="Kigoma">Kigoma</option>
        <option value="Kimihurura">Kimihurura</option>
        <option value="Kimisagara">Kimisagara</option>
        <option value="Kimonyi">Kimonyi</option>
        <option value="Kinazi">Kinazi</option>
        <option value="Kinigi">Kinigi</option>
        <option value="Kinihira">Kinihira</option>
        <option value="Kinoni">Kinoni</option>
        <option value="Kintobo">Kintobo</option>
        <option value="Kinyababa" >Kinyababa</option>
        <option value="Kinyinya" >Kinyinya</option>
        <option value="Kiramuruzi">Kiramuruzi</option>
        <option value="Kirehe" >Kirehe</option>
        <option value="Kisaro" >Kisaro</option>
        <option value="Kitabi" >Kitabi</option>
        <option value="Kivu" >Kivu</option>
        <option value="Kivumu" >Kivumu</option>
        <option value="Kivuruga" >Kivuruga</option>
        <option value="Kivuye" >Kivuye</option>
        <option value="Kiyombe" >Kiyombe</option>
        <option value="Kiziguro" >Kiziguro</option>
        <option value="Mageragere" >Mageragere</option>
        <option value="Mahama" >Mahama</option>
        <option value="Mahembe">Mahembe</option>
        <option value="Mamba">Mamba</option>
        <option value="Manihira">Manihira</option>
        <option value="Manyagiro">Manyagiro</option>
        <option value="Maraba" >Maraba</option>
        <option value="Mareba">Mareba</option>
        <option value="Masaka" >Masaka</option>
        <option value="Masoro">Masoro</option>
        <option value="Mata" >Mata</option>
        <option value="Mataba" >Mataba</option>
        <option value="Matimba" >Matimba</option>
        <option value="Matyazo" >Matyazo</option>
        <option value="Mayange" >Mayange</option>
        <option value="Mbazi" >Mbazi</option>
        <option value="Mbogo" >Mbogo</option>
        <option value="Mbuye">Mbuye</option>
        <option value="Mimuli" >Mimuli</option>
        <option value="Minazi" >Minazi</option>
        <option value="MiKulu" >MiKulu</option>
        <option value="Mpanga" >Mpanga</option>
        <option value="Mubuga" >Mubuga</option>
        <option value="Mudende" >Mudende</option>
        <option value="Mugano" >Mugano</option>
        <option value="Muganza" >Muganza</option>
        <option value="Mugesera" >Mugesera</option>
        <option value="Mugina" >Mugina</option>
        <option value="Mugombwa" >Mugombwa</option>
        <option value="Mugunga">Mugunga</option>
        <option value="Muhanga" >Muhanga</option>
        <option value="Muhazi" >Muhazi</option>
        <option value="Muhima">Muhima</option>
        <option value="Muhondo">Muhondo</option>
        <option value="Muhororo">Muhororo</option>
        <option value="Muhoza" >Muhoza</option>
        <option value="Muhura">Muhura</option>
        <option value="Mukama">Mukama</option>
        <option value="Mukamira">Mukamira</option>
        <option value="Mukarange" >Mukarange</option>
        <option value="Mukindo">Mukindo</option>
        <option value="Mukingo" >Mukingo</option>
        <option value="Muko" >Muko</option>
        <option value="Mukura" >Mukura</option>
        <option value="Munini">Munini</option>
        <option value="Munyaga" >Munyaga</option>
        <option value="Munyiginya" >Munyiginya</option>
        <option value="Murama" >Murama</option>
        <option value="Murambi" >Murambi</option>
        <option value="Muringa">Muringa</option>
        <option value="Murunda">Murunda</option>
        <option value="Murundi">Murundi</option>
        <option value="Mururu" >Mururu</option>
        <option value="Musambira">Musambira</option>
        <option value="Musange">Musange</option>
        <option value="Musanze" >Musanze</option>
        <option value="Musaza" >Musaza</option>
        <option value="Musebeya">Musebeya</option>
        <option value="Musenyi" >Musenyi</option>
        <option value="Musha" >Musha</option>
        <option value="Musheli" >Musheli</option>
        <option value="Mushikiri">Mushikiri</option>
        <option value="Mushishiro">Mushishiro</option>
        <option value="Mushonyi">Mushonyi</option>
        <option value="Mushubati">Mushubati</option>
        <option value="Mushubi">Mushubi</option>
        <option value="Mutenderi" >Mutenderi</option>
        <option value="Mutete">Mutete</option>
        <option value="Mutuntu" >Mutuntu</option>
        <option value="Muyira">Muyira</option>
        <option value="Muyongwe">Muyongwe</option>
        <option value="Muyumbu" >Muyumbu</option>
        <option value="Muzo" >Muzo</option>
        <option value="Mwendo">Mwendo</option>
        <option value="Mwiri">Mwiri</option>
        <option value="Mwogo" >Mwogo</option>
        <option value="Mwulire" >Mwulire</option>
        <option value="Nasho" >Nasho</option>
        <option value="Ndaro" >Ndaro</option>
        <option value="Ndego" >Ndego</option>
        <option value="Ndera" >Ndera</option>
        <option value="Ndora">Ndora</option>
        <option value="Nduba" >Nduba</option>
        <option value="Nemba">Nemba</option>
        <option value="Ngamba" >Ngamba</option>
        <option value="Ngarama" >Ngarama</option>
        <option value="Ngera">Ngera</option>
        <option value="Ngeruka">Ngeruka</option>
        <option value="Ngoma">Ngoma</option>
        <option value="Ngororero">Ngororero</option>
        <option value="Niboye">Niboye</option>
        <option value="Nkanka">Nkanka</option>
        <option value="Nkomane">Nkomane</option>
        <option value="Nkombo">Nkombo</option>
        <option value="Nkotsi" >Nkotsi</option>
        <option value="Nkungu">Nkungu</option>
        <option value="Ntarabana" >Ntarabana</option>
        <option value="Ntarama" >Ntarama</option>
        <option value="Ntongwe" >Ntongwe</option>
        <option value="Ntyazo" >Ntyazo</option>
        <option value="Nyabimata" >Nyabimata</option>
        <option value="Nyabirasi" >Nyabirasi</option>
        <option value="Nyabitekeri" >Nyabitekeri</option>
        <option value="Nyagatare" >Nyagatare</option>
        <option value="Nyagihanga" >Nyagihanga</option>
        <option value="Nyagisozi" >Nyagisozi</option>
        <option value="Nyakabanda" >Nyakabanda</option>
        <option value="Nyakabuye" >Nyakabuye</option>
        <option value="Nyakarenzo" >Nyakarenzo</option>
        <option value="Nyakariro" >Nyakariro</option>
        <option value="Nyakiliba" >Nyakiliba</option>
        <option value="Nyamabuye" >Kicukiro</option>
        <option value="Nyamata" >Nyamata</option>
        <option value="Nyamirama" >Nyamirama</option>
        <option value="Nyamirambo" >Nyamirambo</option>
        <option value="Nyamiyaga" >Nyamiyaga</option>
        <option value="Nyamugali" >Nyamugali</option>
        <option value="Nyamyumba" >Nyamyumba</option>
        <option value="Nyange" >Nyange</option>
        <option value="Nyankenke" >Nyankenke</option>
        <option value="Nyanza" >Nyanza</option>
        <option value="Nyarubaka" >Nyarubaka</option>
        <option value="Nyarubuye" >Nyarubuye</option>
        <option value="Nyarugenge" >Nyarugenge</option>
        <option value="Nyarugunga" >Nyarugunga</option>
        <option value="Nyarusange" >Nyarusange</option>
        <option value="Nyundo" >Nyundo</option>
        <option value="Nzahaha" >Nzahaha</option>
        <option value="Nzige" >Nzige</option>
        <option value="Rambura" >Rambura</option>
        <option value="Kulu" >Kulu</option>
        <option value="Rilima" >Rilima</option>
        <option value="Rubavu" >Rubavu</option>
        <option value="Rubaya" >Rubaya</option>
        <option value="Rubengera">Rubengera</option>
        <option value="Rubona" >Rubona</option>
        <option value="Rugabano" >Rugabano</option>
        <option value="Rugalika" >Rugalika</option>
        <option value="Ruganda" >Ruganda</option>
        <option value="Rugarama" >Rugarama</option>
        <option value="Rugendabari" >Rugendabari</option>
        <option value="Rugera" >Rugera</option>
        <option value="Rugerero" >Rugerero</option>
        <option value="Ruhango" >Ruhango</option>
        <option value="Ruharambuga" >Ruharambuga</option>
        <option value="Ruhashya" >Ruhashya</option>
        <option value="Ruheru" >Ruheru</option>
        <option value="Ruhunde" >Ruhunde</option>
        <option value="Rukira" >Rukira</option>
        <option value="Rukoma" >Rukoma</option>
        <option value="Rukomo" >Rukomo</option>
        <option value="Rukozo">Rukozo</option>
        <option value="Rukumberi">Rukumberi</option>
        <option value="Ruli ">Ruli </option>
        <option value="Runda" >Runda</option>
        <option value="Ruramba" >Ruramba</option>
        <option value="Ruramira" >Ruramira</option>
        <option value="Rurembo" Rurembo</option>
        <option value="Rurenge" >Rurenge</option>
        <option value="Rusarabuge" >Rusarabuge</option>
        <option value="Rusasa" >Rusasa</option>
        <option value="Rusatira" >Rusatira</option>
        <option value="Rusebeya">Rusebeya</option>
        <option value="Rusenge" >Rusenge</option>
        <option value="Rushaki" >Rushaki</option>
        <option value="Rushashi" >Rushashi</option>
        <option value="Rusiga" >Rusiga</option>
        <option value="Rusororo">Rusororo</option>
        <option value="Rutare" >Rutare</option>
        <option value="Rutunga">Rutunga</option>
        <option value="Ruvune" >Ruvune</option>
        <option value="Rwabicuma">Rwabicuma</option>
        <option value="Rwamiko">Rwamiko</option>
        <option value="Rwaniro" >Rwaniro</option>
        <option value="Rwankuba" >Rwankuba</option>
        <option value="Rwaza" >Rwaza</option>
        <option value="Rwempasha" >Rwempasha</option>
        <option value="Rwerere" >Rwerere</option>
        <option value="Rweru" >Rweru</option>
        <option value="Rwezamenyo" >Rwezamenyo</option>
        <option value="Rwimbogo" >Rwimbogo</option>
        <option value="Rwimiyaga" >Rwimiyaga</option>
        <option value="Rwinkwavu">Rwinkwavu</option>
        <option value="Sake" >Sake</option>
        <option value="Save" >Save</option>	
        <option value="Shangasha" >Shangasha</option>
        <option value="Shangi">Shangi</option>
        <option value="Shingiro">Shingiro</option>
        <option value="Shyara" >Shyara</option>
        <option value="Shyira" >Shyira</option>
        <option value="Shyogwe">Shyogwe</option>
        <option value="Shyorongi">Shyorongi</option> 
        <option value="Simbi" >Simbi</option>
        <option value="Sovu" >Sovu</option>
        <option value="Tabagwe" >Tabagwe</option>
        <option value="Tare" >Tare</option>
        <option value="Tumba">Tumba</option>
        <option value="Twumba">Twumba</option>
        <option value="Uwinkingi">Uwinkingi</option>
        <option value="Zaza">Zaza</option>
      </select><input type="text" name="sector" style = "display:none" value="<?php if($sector){echo $sector;} else{echo 'Ruhuha';}?>" id="voltage3Text" name="sector" required aria-required="true" aria-describedby="name-format" /></td><td><strong>CELL </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="cell" id="cell" style=' width:250px;height:30px' value="<?php echo $cell;?>"></td><td></td><td><td></td><td></td><td> </td><td></td></tr>
<tr><td></td><td></td><td><B>AFFILLIATE</b></td><td><B>AFFILLIATE NAME</b><input type="text" name="afname" id="afname" value="<?php if(!empty($afname)){echo $afname;}else{echo $fname;}?>"  aria-describedby="name-format" style=' width:250px; ;height:30px'></td>
<td> <B>AFFILLIATE LAST NAME</b><input type="text" name="aflname" id="aflname" value="<?php if(!empty($aflname)){echo $aflname;}else{echo $lastname;}?>"  aria-describedby="name-format" style=' width:250px; ;height:30px'></td><td>
<B>AFFECTATION</b><input type="text" name="affectation" id="affectation" value="<?php echo $afectation;?>" required aria-required="true" aria-describedby="name-format" style=' width:250px; ;height:30px'></td><td><td></td><td></td><td><td></td><td></td><td> </td><td></td></tr>
<tr><td></td><td></td><td></td><td></td>
<td></td><td>
</td><td><td></td><td></td><td><td></td><td></td><td> </td><td></td></tr>

<tr><td></td><td></td><td></td><td><strong>CONSULTATION</strong></td><td></td><td></td><td></td><td></td><td></td><td><td></td><td></td><td></tr>
<tr><td></td><td></td><td></td><td><input type="radio" name="workingday" value="regular"> <strong>WORKING DAYS</strong><br><input type="radio" name="workingday" value="others" required aria-required="true" aria-describedby="name-format"><strong> OTHERS</strong>
 <br> <input type="radio" name="workingday" value="all_null" required aria-required="true" aria-describedby="name-format"><strong> Null</strong>
 <br> <input type="radio" name="workingday" value="DoctorConsultation" required aria-required="true" aria-describedby="name-format"><strong> Doctor Consulation</strong>
 <br> <input type="radio" name="workingday" value="Doctormutuelle" required aria-required="true" aria-describedby="name-format"><strong> Doctor Mutuelle</strong>
 <br> <input type="radio" name="workingday" value="Doctormutuelweekend" required aria-required="true" aria-describedby="name-format"><strong> Doctor Mutuelle OTHERS</strong>
 <br> <input type="radio" name="workingday" value="DoctorMMI" required aria-required="true" aria-describedby="name-format"><strong> Doctor MMI</strong>
 <br> <input type="radio" name="workingday" value="DoctorMMIweekend" required aria-required="true" aria-describedby="name-format"><strong> Doctor MMI OTHERS</strong>
  </td><td><strong>Ticket Moderateur Null</strong><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="nulltm" value="nulltm"></td><td><strong>Cas &nbsp;&nbsp;(Nouvea/Ancien)</strong><br><input type="text" name = "cas" value ="<?php echo $ncase;?>" readonly></td><td><strong>Hospitalization</strong><br>&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="hosp" value="hosp"></td><td><strong>Ambullance</strong><br>&nbsp;&nbsp;&nbsp;<input type="checkbox"  name ="checkamb" value="ambullance" onclick="var input = document.getElementById('ambullance'); if(this.checked){ input.disabled = false; input.focus();}else{input.disabled=true;}" />Km<input id="ambullance" name="ambullance" disabled="disabled" required/></td><td></td><td><td></td><td></td><td></tr>
  </table>
                       <div class="mytable_row ">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="bigbutton" name="bigbutton" type="submit" value="VIEW" onclick="active()" />

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
