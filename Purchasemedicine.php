<?php
//error_reporting(0);
    session_start();
    $role = $_SESSION['sess_userrole'];
    if((!$_SESSION['sess_username']) or ($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro') or ($role!="Pharmacist")){
      header('Location: logout');
	}
include_once('connect_db.php');

$lastId = "SELECT orderId FROM orders order by orderId DESC";
$lastIdRes = mysqli_query($conn,$lastId);
$getRowAssoc = mysqli_fetch_assoc($lastIdRes);
$lastOrder = $getRowAssoc['orderId'];
if(isset($_POST['submit'])){
$idmend = $_POST['med1'];
$PRODUCTrES = "SELECT * FROM  prodicts WHERE id = '$idmend' ";	
$prodRes = mysqli_query($conn,$PRODUCTrES);
$getRowPr = mysqli_fetch_assoc($prodRes);
$Qtty = $getRowPr['qtity'];
$rmn = $getRowPr['remain'];
$distrib = $getRowPr['dist_quantity'];
$reqst = $getRowPr['request_qty'];

$purchaseprice = $_POST['up1'];
$purchaseqty = $_POST['qmed1'];
$NQTTy = $Qtty+$purchaseqty;
$Nrmn = $rmn + $purchaseqty;
//$Ndist = $distrib + $purchaseqty; 
$sellprice = $purchaseprice *1.2;
$avel1 = $_POST['avel1'];
$totnow = $_POST['totmed1'];


$update = "UPDATE prodicts SET pprice = '$purchaseprice',unit_price ='$sellprice',qtity ='$NQTTy',remain='$Nrmn',Noumber=1 WHERE id = '$idmend'";
$updatereq = mysqli_query($conn,$update);
$insertmvt = "INSERT INTO medicine_mvt (idmvt,medicine_id,initial_quantity,quantity_in,buying_price,quantityout,sellingprice,dist_quantity,fixed_quantity,remain,action,adate,orderId) VALUES('','$idmend','$avel1','$purchaseqty','$purchaseprice','','','$distrib','$NQTTy','$Nrmn','Purchase',Now(),'$lastOrder')";
$insMvtRes = mysqli_query($conn,$insertmvt);
//$UpdteProd = mysqli_query($conn,"UPDATE prodicts SET request_qty ='', remain = '' WHERE id= ''");

IF($update){
echo "<script>alert('PURCHASE RECORDED')</script>";
echo "<script>window.location='Purchasemedicine';</script>";
}
ELSE{
	ECHO'<font color="red"> Purchase Not Recorded</font>';
}
}
	  $key = 'bRuD5WYw5wd0rdHR9yLlM6wt2vteuiniQBqE70nAuhU=';
function my_encrypt($data, $key) {
    $encryption_key = base64_decode($key);
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    $encrypted = openssl_encrypt($data, 'aes-256-cbc', $encryption_key, 0, $iv);
    return base64_encode($encrypted . '::' . $iv);
}
?>
<!DOCTYPE html>

<html lang="en">
<head>
		<meta char-set="utf-8" http-equiv="content-type" content="text/html;">
	<title>Medical Records</title>
	
	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="js/date_pic/date_input.css">
        <link rel="stylesheet" href="lib/auto/css/jquery.autocomplete.css">
	
	<!-- Optimize for mobile devices -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	
	<!-- jQuery & JS files -->
		<link rel="stylesheet" href="css/cmxform.css">
	<script src="js/lib/jquery.min.js" type="text/javascript"></script>
	<script src="js/lib/jquery.hotkeys-0.7.9.min.js" type="text/javascript"></script>
	<script src="js/lib/jquery.validate.min.js" type="text/javascript"></script>

	<script src="js/script.js"></script>  
        <script src="js/date_pic/jquery.date_input.js"></script>  
        <script src="lib/auto/js/jquery.autocomplete.js "></script>  
	 
       
<title><?php echo $user;?> -Pharmacy Sys</title>
<link rel="stylesheet" type="text/css" href="style/mystyle.css">
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" /> 
<link rel="stylesheet" href="style/table.css" type="text/css" media="screen" /> 
<script src="js/function.js" type="text/javascript"></script>
<style>#left-column {height: 477px;}
 #main {height: 477px;}</style>
  	<link rel="stylesheet" href="pressources/bootstrap.min.css">

</head>
<body>
	<!-- TOP BAR -->
	<!-- TOP BAR -->
		<?php include_once('menupp22.php')?>
	

<!-- end side-menu -->
		<ul id="tabs" class="fl">
<hr/>	
      

          
		 <?php 

  $query = "SELECT * from prodicts WHERE Noumber !='1' order by product_name ";

?>			<form  action="" method="POST" >

     <class="table" id="manageBrandTable" >
	 <tr><td width="10%"><strong>Medine</strong></td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<td width="4%"><strong>Price</strong></td></td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<td width="4%"><strong>Current Stock</strong></td></td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<td width="4%"><strong>Purchase</strong></td></td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<td width="4%"><strong>New Stock</strong></td></tr><br>
	 	<tr ><td width="10%"><select name="med1" id="med1"  style=" width:200px; height: 25px ">
	      <option value="0">No Selection</option>

      <?php
 
$medicines = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($medicines)) {
            echo '<option value="' . $row['id'] . '">' . $row['product_name'] . '</option>';
        }
      ?>
    </select></td><td width="4%"><input type="number" name="up1" id="up1"  step="0.00000001" min="0.00000001" style=" width:80px; height: 25px; " onkeyup="summed1();" readonly REQUIRED/>
	</td><td width="7%"><input type="text" name="avel1" id="avel1" readonly ></td><td><input type="text" id="qmed1" name="qmed1" style=" width:80px; height: 25px;" autofocus onkeyup="summed1();" autocomplete="off" REQUIRED/></td>
    <td width="7%"> <input type="text" id="totmed1" name="totmed1"style=" width:80px; height: 25px" readonly/></td><td width="25px">
	</td></tr>
        </table>
<div align="center"><input name="submit" type="submit" value="Submit" id="submit"/><br><br><br>
</div>
		</form>  
	
  	<?php
  $queryMadMvt = "SELECT idmvt,medicine_id, product_name,qtity,quantity_in, buying_price,medicine_mvt.remain,fixed_quantity  from medicine_mvt join prodicts ON prodicts.id = medicine_mvt.medicine_id WHERE medicine_mvt.action='Purchase' order by idmvt DESC";
  $medicinesMvt = mysqli_query($conn, $queryMadMvt);
	?>
       <table class="table" id="manageBrandTable" style="width: 100%;" border="1">
					<thead>
						<tr>							
							<th>No</th>
							<th>Medicine</th>
							<th>Price</th>
							<th colspan="5">Quantity</th>
						</tr>
						<tr>							
							<th colspan="2"></th>
							<th>Price</th>
							<th>Purchase</th>
							<th>Total</th>
							<th>Delete</th>
						</tr>
					</thead>
<tbody>

					<?php 
					while ($rowMvt = mysqli_fetch_assoc($medicinesMvt)) {
						$iq++;
						$totalPurchase= $totalPurchase + ($rowMvt['quantity_in']*$rowMvt['buying_price']);
						$id = $rowMvt['idmvt'];
						$medicineId = $rowMvt['medicine_id'];
						$encrypteld2 = my_encrypt($id, $key);

						?>
					<tr><td><?php echo $iq;?></td>
					<td><?php echo $rowMvt['product_name'];?></td>
					<td style="background-color: #16a085 "><?php echo $rowMvt['buying_price'];?></td>
					<td ><?php echo $rowMvt['quantity_in'];?></td>
					<td ><strong><?php echo number_format((float)($rowMvt['quantity_in']*$rowMvt['buying_price']),1);?></strong></td>
					<td><img src="images/doubleseparater.png"><a href="javascript: void(0)"  style="text-decoration: none;" onclick="popup01o('deletePurchaseElement?elementId=<?php echo $encrypteld2; ?>&WXN6Y2I1R2xCVm5=<?php echo $medicineId; ?>')"><img src="images/close_new.png"></a></td>
					</tr>
					<?php
					}
					?>
					<tr><td colspan="5"><strong><font size="2">Total</font></strong></td><td colspan="4"><strong><font size="2"><?php echo number_format((float)$totalPurchase,1); ?></font></strong></td>
					
					
					
					</tr>
										</tbody>
										</table>

		
		</body>
		</div></div></div>	
<SCRIPT LANGUAGE="JavaScript">
<!-- Begin
function validate(field) {
var valid = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"
var ok = "yes";
var temp;
for (var i=0; i<field.value.length; i++) {
temp = "" + field.value.substring(i, i+1);
if (valid.indexOf(temp) == "-1") ok = "no";
}
if (ok == "no") {
alert("N'utilisez pas les carateres speciaux");
field.value='';
field.focus();
field.select();
   }
}
//  End -->




    if (x==null || x=="" || x==0) {
        alert("PLEASE FILL IN QUANTITY FOR MEDICINE1");
        return false;
	}
	     
    if(xmed2 != ""){
         var xqmed2 = document.forms["selectform"]["qmed2"].value;
    if (xqmed2==null || xqmed2==""|| xqmed2==0) {
        alert("PLEASE FILL IN QUANTITY FOR MEDICINE2");
        return false;
    }
	}
	if(xmed3 != ""){
         var xqmed3 = document.forms["selectform"]["qmed3"].value;
    if (xqmed3==null || xqmed3==""||xqmed2==0) {
        alert("PLEASE FILL IN QUANTITY FOR MEDICINE3");
        return false;
    }
	}
	if(xmed4 != ""){
         var xqmed4 = document.forms["selectform"]["qmed4"].value;
    if (xqmed4==null || xqmed4==""||xqmed4==0) {
        alert("PLEASE FILL IN QUANTITY FOR MEDICINE4");
        return false;
    }
	}
	if(xmed5 != ""){
         var xqmed5 = document.forms["selectform"]["qmed5"].value;
    if (xqmed5==null || xqmed5==""||xqmed5==0) {
        alert("PLEASE FILL IN QUANTITY FOR MEDICINE5");
        return false;
    }
	}
	
	if(xmed6 != ""){
         var xqmed6 = document.forms["selectform"]["qmed6"].value;
    if (xqmed6==null || xqmed6=="" ||xqmed6==0) {
        alert("PLEASE FILL IN QUANTITY FOR MEDICINE6");
        return false;
    }
	}
	
	if(xmed7 != ""){
         var xqmed7 = document.forms["selectform"]["qmed7"].value;
    if (xqmed7==null || xqmed7=="" ||xqmed7==0) {
        alert("PLEASE FILL IN QUANTITY FOR MEDICINE7");
        return false;
    }
	}
  window.close(); 
     
}


</script>

    <script src="js/jquery.min.js"></script>
    <script>
      function insertResults(json){
        $("#up1").val(json["pprice"]);
		$("#mmed1").val(json["product_name"]);
		$("#nid1").val(json["id"]);
		$("#avel1").val(json["remain"]);

      }

      function clearForm(){
        $("#up1,#mmed1,#nid1,#avel1").val("");
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
	function setFocusToTextBoxmed1(){
		document.getElementById("qmed1").focus();
		}
      $("#med1").on("change", function(){
        var id = $(this).val();
        if (id === "0"){
          clearForm();
} else {
          makeAjaxRequest(id);
		setFocusToTextBoxmed1();
		document.getElementById('qmed1').value = '';
		document.getElementById('totmed1').value = '';


        }
      });
	function summed1() {
	  var FirstNumberValue = parseInt(document.getElementById('qmed1').value);
      var SecondNumberValue = parseInt(document.getElementById('avel1').value);
      var txtFirstNumberValue = document.getElementById('qmed1').value;
      var txtSecondNumberValue = document.getElementById('avel1').value;
      var result = parseFloat(txtFirstNumberValue) + parseFloat(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('totmed1').value = result;
      }
	  
}
 function getSector(val) {
	$.ajax({
	type: "POST",
	url: "updatstatus.php",
	data:'update='+val,
	success: function(data){

	}
	});
} 
	
</script>
</html>
