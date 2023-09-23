<?php
error_reporting(0);
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

</head>
<select class="form-control" id="provincelist" name="provincelist" style="width:250px;height:30px" onChange="getDistrict(this.value);SelectedTextValue(this);" required><?php if($province)echo '<option value='.$province.' >'.$province.'</option>'?><span id="reqProvince" class="reqError" requ></span>
<?php
foreach($results as $prov) {
?>
<option value="<?php echo $prov["Province_id"]; ?>"><?php echo $prov["province_name"]; ?></option>
<?php
}
?>
			  </select><input name="province" type="text" id="txtContent" style="display:NONE" value="<?php if($province){echo $province;}?>"required/></td>
<td><strong>DISTRICT&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</strong><select class="form-control" id="disrict_liste" name="district" style="width:250px;height:30px" onChange="getSector(this.value);SelectedTextValue1(this);" > <span id="reqDistrict" class="reqError" requ></span>

<option value="">Select Disrict</option>
</select>			  </select><input name="district"  style="display:NONE" type="text" id="txtContent1" value="<?php if($district){echo $district;}?>" required/></td><td><strong>SECTOR</strong><select class="form-control"id="sector_list"  name="sector"  style="width:250px;height:30px" onChange="getCell(this.value);SelectedTextValue2(this);" ><span id="reqSector" class="reqError" requ></span>
<option value="">Select Sector</option>
</select>   <input name="sector" type="text"  style="display:NONE" id="txtContent2" value="<?php if($sector){echo $sector;}?>"required/>  </td><td><strong>CELL </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select class="form-control"id="cell_list" name="cell" style="width:250px;height:30px" onChange="SelectedTextValue3(this);" ><span id="reqCell" class="reqError" requ></span>
<option value="">Select Cell</option>
</select>  </table>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="bigbutton" name="bigbutton" type="submit" value="VIEW" onclick="active()" />

</form>

<script src="js/jquery.min.js"></script>
   
</html>
