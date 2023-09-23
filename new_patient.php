 <link href="jquery-ui1.css" rel="stylesheet" type="text/css"/>  
 <script src="jquery.min1.js"></script>  
   <script src="jquery-ui.min1.js"></script> 
   <script type="text/javascript">
       $(function() {
               $("#datesearch").datepicker({ dateFormat: "yy-mm-dd" }).val()
               $("#datesearch1").datepicker({ dateFormat: "yy-mm-dd" }).val()
       });

   </script>


<html>
  <head>
    <!-- Load jQuery from Google's CDN -->
    <!-- Load jQuery UI CSS  -->
    <link rel="stylesheet" href="jquery-ui.css" />
    
    <!-- Load jQuery JS -->
    <script src="new 1.js"></script>
    <!-- Load jQuery UI Main JS  -->
    <script src="jquery-ui.js"></script>
    
    <!-- Load SCRIPT.JS which will create datepicker for input field  -->
    <script src="script.js"></script>
    
    <link rel="stylesheet" href="runnable.css" />
	<script>
  $(document).ready(
  
  /* This is the function that will get executed after the DOM is fully loaded */
  function () {
    $( "#datepicker" ).datepicker({
      changeMonth: true,//this option for allowing user to select month
      changeYear: true //this option for allowing user to select from year range
    });
  }

);
  </script>
  <style>
  h1 {
  font-family: Helvetica;
  font-weight: 100;
}
body {
  color:#333;
	text-align:center;
}
  </style>
  </head>
  <body>
  		
<body>

	<!-- TOP BAR -->
	<!-- TOP BAR -->
	<?php
	include_once('menus1.php');

	?>
	
	<!-- MAIN CONTENT -->
	<div id="content">
		
		<div class="page-full-width cf">

			 <!-- end side-menu -->
			
<?php
  # Connect
  mysql_connect('localhost', 'root', 'fidele') or die('Could not connect: ' . mysql_error());
   
  # Choose a database
  mysql_select_db('dirskhpe_rangiro') or die('Could not select database');
   
  # Perform database query
  $query = "SELECT * from patient ORDER BY id DESC";
  $result = ($query) or die('Query failed: ' . mysql_error());
?>
			
				<div class="content-module">				
					
						<div class="content-module-main cf">
<form  method="POST" action="savepatient1.php"><table>
<tr><td><b>AFFILIATE NUMBER </b></td><td> <select id="select">
      <option value="0">Please select</option>
      <?php
        while ($row = mysql_fetch_assoc($result)) {
            echo '<option value="' . $row['id'] . '">' . $row['affiliate_number'] . '</option>';
        }
      ?>

    </select></td><td><strong>NUMBER &nbsp;&nbsp;</strong><input size="25" id="number" name="number" class="element text large" type="text"  style=" border: 5px" required aria-required="true" aria-describedby="name-format"></td> <td>
	<input type="text" name="p_id" id="p_id" style="display:none" required aria-required="true" aria-describedby="name-format"></td><td><strong>NAME   &nbsp;&nbsp;<input id="name" name="name" class="element text large" type="text" style="border: 0px" size="35" required aria-required="true" aria-describedby="name-format"></td><td><strong>INSURANCE   &nbsp;&nbsp;<input id="insurance" name="insurance" class="element text large" type="text" style="border: 0px" required aria-required="true" aria-describedby="name-format"></td></tr> 
<tr><td><b>GENDER </b></td><td> <select id="OP1" name="gender" value="" required aria-required="true" aria-describedby="name-format" style=' width:250px;height:30px'>
        <option value=""></option>
        <option value="MALE">MALE</option>
        <option value="FEMALE">FEMALE</option>
      </select></td><td></td> <td></td></tr>              

	  <tr><td><b>Date Of Birth</b> </td><td>
     <input type="text" name="datepicker" id="datesearch1" value="" required aria-required="true" aria-describedby="name-format" style=' width:250px;height:30px' placeholder="Pick Date of Birth"/> <td><td></td> <td></td></tr>
<tr><td><b>ADDRESS</b></td><td><b>PROVINCE</b> </td><td><b>DISTRICT</b></td><td ><b>SECTOR</b></td><td><b>CELL</b></td><td><b>VILLAGE</b></td></tr>
<tr><td></td><td><select id="province" name="province" value="" required aria-required="true" aria-describedby="name-format" style=' width:250px;height:30px'>
        <option value=""></option>
        <option value="Kigali City" >Kigali City</option>
        <option value="Southern Province" >Southern Province</option>
        <option value="Northern Province" >Northern Province</option>
        <option value="DD Province" >DD Province</option>
        <option value="DD PROVINCE" >DD PROVINCE</option>

      </select> </td><td><select id="district" name="district" value="" required aria-required="true" aria-describedby="name-format" style=' width:150px;height:30px'>
        <option value=""></option>
        <option value="Gasabo" >Gasabo</option>
        <option value="Muhanga" >Muhanga</option>
        <option value="Bugesera" >Bugesera</option>
        <option value="Burera" >Burera</option>
        <option value="Gakenke" >Gakenke</option>
        <option value="Kulu" >Kulu</option>
        <option value="Gicumbi" >Gicumbi</option>
        <option value="Gisagara" >Gisagara</option>
        <option value="Huye" >Huye</option>
        <option value="Kulu" >Kulu</option>
        <option value="Karongi" >Karongi</option>
        <option value="Kulu" >Kulu</option>
        <option value="Kicukiro" >Kicukiro</option>
        <option value="Kirehe">Kirehe</option>
        <option value="Musanze">Musanze</option>
        <option value="Ngoma">Ngoma</option>
        <option value="Ngororero">Ngororero</option>
        <option value="Nyabihu">Nyabihu</option>
        <option value="Nyagatare">Nyagatare</option>
        <option value="Nyamagabe">Nyamagabe</option>
        <option value="Kulu" >Kulu</option>
        <option value="Nyanza">Nyanza</option>
        <option value="Nyarugenge">Nyarugenge</option>
        <option value="Nyaruguru">Nyaruguru</option>
        <option value="Rubavu">Rubavu</option>
        <option value="Ruhango">Ruhango</option>
        <option value="Rulindo">Rulindo</option>
        <option value="Rusizi" >Rusizi</option>
        <option value="Kulu" >Kulu</option>
        <option value="Rwamagana" >Rwamagana</option>
      </select></td><td><select id="sector" name="sector" value="" required aria-required="true" aria-describedby="name-format" style='width:150px;height:30px'>
        <option value=""></option>
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
        <option value="Kacyiru" >Kacyiru</option>
        <option value="Kaduha" >Kaduha</option>
        <option value="Kagano" >Kagano</option>
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
        <option value="dirskhpe_rangiro" >Kulu</option>
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
        <option value="Kirimbi">Kirimbi</option>
        <option value="Kisaro" >Kisaro</option>
        <option value="Kitabi" >Kitabi</option>
        <option value="Kivu" >Kivu</option>
        <option value="Kivumu" >Kivumu</option>
        <option value="Kivuruga" >Kivuruga</option>
        <option value="Kivuye" >Kivuye</option>
        <option value="Kiyombe" >Kiyombe</option>
        <option value="Kiziguro" >Kiziguro</option>
        <option value="Macuba" >Macuba</option>
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
        <option value="Ruhuha">Ruhuha</option>
        <option value="Ruhunde" >Ruhunde</option>
        <option value="dirskhpe_rangiro" >Kulu</option>
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
      </select></td><td><input type="text" name="cell" id="cell" value=""></td><td><input type="text" name="village" id="village" value="" style='height:30px' ></td></tr>
<tr><td><b>AFFILIATE</b></td><td><b>AFFILIATE NAMES</b> </td><td><b>AFFECTATION</b></td><td></td><td></td></tr>
<tr><td></td><td><input type="text" name="afname" id="afname" value="" required aria-required="true" aria-describedby="name-format" style=' width:250px; ;height:30px'></td><td><input type="text" name="affectation" id="affectation" value="" required aria-required="true" aria-describedby="name-format" style=' width:150px'></td><td>
</td><td>
</td></tr><tr></tr>

</table>
                       <div class="mytable_row ">
<input id="bigbutton" name="bigbutton" type="submit" value="Save Patient" />

</form>
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
<script src="js3/jquery.min.js"></script>
    <script>
      function insertResults(json){
        $("#insurance").val(json["insurance"]);
		$("#name").val(json["names"]);
		$("#number").val(json["affiliate_number"]);
		$("#consultation").val(json["consultatiom"]);
		$("#p_id").val(json["id"]);

      }

      function clearForm(){
        $("#insurance,#name,#number,#consultation,#p_id").val("");
      }

      function makeAjaxRequest(placeId){
        $.ajax({
          type: "POST",
          data: { placeId: placeId },
          dataType: "json", 
          url: "process_ajaxdrop.php",
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

      function insertResults1(json){
        $("#name").val(json["insurance"]);

      }

      function clearForm1(){
        $("#name").val("");
      }

      function makeAjaxRequest1(placeId){
        $.ajax({
          type: "POST",
          data: { placeId: placeId },
          dataType: "json", 
          url: "process_ajaxdrop.php",
          success: function(json) {
            insertResults1(json);
          }
        });
      }

      $("#select2                            cd").on("change", function(){
        var id = $(this).val();
        if (id === "0"){
          clearForm1();
} else {
          makeAjaxRequest1(id);
        }
      });
	 
    </script>
