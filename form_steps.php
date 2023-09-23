<script src="media/js/jquery-1.8.2.min.js"></script>
        <script src="media/js/jquery-ui.js" type="text/javascript"></script>


   
<?php require ('include/database.php'); ?>
<?php if (!isset($no_visible_elements) || !$no_visible_elements) { ?>
<?php
error_reporting(0);
        include('include/database.php');
		session_start();
$mynpumber= $_GET[pid];
$_SESSION['mynpumber']=250;
$id_session=$_SESSION['mynpumber']; 
							$result= mysql_query("select *  from indiv_archive where id='$id_session'") or die (mysql_error());
							while ($row= mysql_fetch_array ($result) ){
						
							$id=$row['id'];
							?> 
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/bootstrap1.min.css">
    <link href="dist/jquery.simplewizard1.css" rel="stylesheet" />

	<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />
	<link rel="stylesheet" href="assets/css/ace.min1.css" class="ace-main-stylesheet" id="main-ace-style" />
	
	
	
</head>

<body>


</div>
    <div class="container" bgcolor="blue" >
    <h1 style="margin-bottom:50px" ><?php echo $row['firstname']; ?>&nbsp;<?php echo $row['lastname']; ?>'s information</h1>
	
        <form method="POST" enctype="multipart/form-data" id="wizard1" class="wizard" action="form__steps.php">
            <div class="wizard-header">
                <ul class="nav nav-tabs">
                             <li role="presentation" class="wizard-step-indicator"><a href="#start">Start</a></li>
                    <li role="presentation" class="wizard-step-indicator"><a href="#family_background">Family background</a></li>
                    <li role="presentation" class="wizard-step-indicator"><a href="#details">Personal details</a></li>
					<li role="presentation" class="wizard-step-indicator"><a href="#education">Education Background</a></li>
					<li role="presentation" class="wizard-step-indicator"><a href="#employment">Employment experience</a></li>
					 <li role="presentation" class="wizard-step-indicator"><a href="#abilities">Abilities</a></li>
					  <li role="presentation" class="wizard-step-indicator"><a href="#conduct">General conduct</a></li>
					  <li role="presentation" class="wizard-step-indicator"><a href="#legal">Legal charges</a></li>
                       <li role="presentation" class="wizard-step-indicator"><a href="#assets">Assets</a></li>
					   <li role="presentation" class="wizard-step-indicator"><a href="#details">other details</a></li>
                    <li role="presentation" class="wizard-step-indicator"><a href="#finish">Finish</a></li>
                </ul>
            </div>
<style>
.start input{
    width: 140px;
    color: #505050;
    float: right;
    margin-right: px;
	border: 0px;
	background-color:#f0f8ff;
}
.start input[type=text]
{
    
    height: 20px;
}
</style>
            <div class="wizard-content">
                <div id="start" class="wizard-step" >
				
			<table class="start">
			<tr><td>
			
				
<?php 
require_once 'dbconfig.php';
$stmt = $DB_con->prepare("select *  from indiv_archive  JOIN profile_pic ON(indiv_archive.id=profile_pic.id)where indiv_archive.id='$id_session'") or die (mysql_error());
	$stmt->execute();
	
	if($stmt->rowCount() > 0)
	{
		while($row=$stmt->fetch(PDO::FETCH_ASSOC))
		{
			extract($row);
			?>
			<img src="user_images/<?php echo $row['userPic']; ?>" class="img-rounded" width="250px" height="250px" />
			<?php
		}
	}
	else
	{
		?>
       
            	<img src="user_images/profile_avatar.png" class="img-rounded" width="250px" height="250px" />
      
        <?php } ?>
			
	</td>
	
	<?php require ('include/database.php'); 
							$result= mysql_query("select *  from indiv_archive where id='$id_session'") or die (mysql_error());
							while ($row= mysql_fetch_array ($result) ){
							$firstname= $row['firstname'];
							$national_ID= $row['national_ID'];
							$lastname= $row['lastname'];
							$nationality= $row['nationality'];
							$gender= $row['gender'];
							$id=$row['id'];
							?> 
	
	<td>    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp First name &nbsp;&nbsp: <?php echo $row['firstname'];  ?>  <br> 
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp Last name &nbsp;&nbsp:&nbsp;<?php echo $row['lastname'];  ?>  <br> 
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp ID Number &nbsp:&nbsp; <?php echo $row['national_ID'];?> <br>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp Gender &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp:&nbsp; <?php echo $row['gender'];?> <br>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp Nationality &nbsp;&nbsp:&nbsp;<?php echo $row['nationality']; ?> <br></td></tr>	
</table>
			
                    <button type="button" class="wizard-next btn btn-primary">Start</button>
                    <button type="button" class="wizard-goto btn btn-primary" value="10">Go to last</button>
                </div><?php } ?><?php } ?>
			<!-- end of href="#start" and stepup to the next div -->
			
			
                <div id="family_background" class="wizard-step" required>
                    <div class="form-group">
						<table border='0' id="dynamic_field">  
							   			  <tr><td>Relationship</td><td> Names</td><td>place of birth</td><td>date of birth</td><td>Occupation</td><td>address</td><td>history</td><td>Action</td>
                                   <tr>  
								   
                                         <td>
										 <script type="text/javascript">
                                          function showfield(name){
                                          if(name=='relationship')document.getElementById('div1').innerHTML='<input type="text" name="relationship" />';
                                          else document.getElementById('div1').innerHTML='';
                                               }
                                          </script>

										 <select name="relationship" id="relationship" style="width:120px"; onchange="showfield(this.options[this.selectedIndex].value)"><option></option><option>Father</option><option>Mother</option><option>Brother</option><option>Sister</option> <option value="relationship">Other</option></select><div id="div1"></div><?php if(isset($_POST['relationship'])) $_SESSION['relationship']=$_POST['relationship'];?></td>
										
										 
										 
										 
										 <td><input type="text" name="names" id="names" value="<?php echo $_SESSION['names'];?>" style="width:120px"; ></td> 
										 
										 
										 
										 <td><input type="text" name="place_of_birth" id="place_of_birth" value="<?php echo $_SESSION['place_of_birth'];?>"style="width:120px"; ></td> 
										 
										 
										 
										  <td><input type="date" name="date_of_birth" id="date_of_birth" value="<?php echo $_SESSION['date_of_birth'];?>"  ></td>
										 
										
										 <td><input type="text" name="occupation"  id="occupation" style="width:120px"; value="<?php echo $_SESSION['occupation'];?>" ></td> 
										 <td><input type="text" name="address"  id="address" style="width:120px"; value="<?php echo $_SESSION['address'];?>" /></td> 
										 <td><input type="text" name="history" id="history" style="width:120px"; value="<?php echo $_SESSION['history'];?>" /></td>
										<td><input type="button" name="active" id="active" class="btn btn-success" value="Add More" onclick="showline1()"></td>
										<td><input type="button" name="remove" id="remove" value="Remove" class="btn btn-danger btn_remove"  onclick="hideline()"></td>                                      										 
                                        
                                    </tr>
									<tr>  
                                         <td> 
										 
										 <script type="text/javascript">
                                          function showfield2(name){
                                          if(name=='relationship1')document.getElementById('div2').innerHTML='<input type="text" name="relationship1" />';
                                          else document.getElementById('div2').innerHTML='';
                                               }
                                          </script>
										  <select name="relationship1" id="relationship1" style="display: none" style="width:120px"; onchange="showfield2(this.options[this.selectedIndex].value)"><option></option><option>Father</option><option>Mother</option><option>Brother</option><option>Sister</option> <option value="relationship1">Other</option></select><div id="div2"></div><?php if(isset($_POST['relationship1'])) $_SESSION['relationship1']=$_POST['relationship1'];?></td>
										<td><input type="text" name="names1" id="names1" value="<?php echo $_SESSION['names1'];?>" class="form-control name_list" style="display: none"/></td> 
										 <td><input type="text" name="place_of_birth1" id="place_of_birth1" value="<?php echo $_SESSION['place_of_birth1'];?>" class="form-control name_list" style="display: none"/></td> 
										 <td><input type="date" name="date_of_birth1" id="date_of_birth1" value="<?php echo $_SESSION['date_of_birth1'];?>" class="form-control name_list" style="display: none"/></td> 
										 <td><input type="text" name="occupation1"  id="occupation1"  value="<?php echo $_SESSION['occupation1'];?>" class="form-control name_list" style="display: none"/></td> 
										 <td><input type="text" name="address1"  id="address1" value="<?php echo $_SESSION['address1'];?>" class="form-control name_list" style="display: none" /></td> 
										 <td><input type="text" name="history1" id="history1" value="<?php echo $_SESSION['history1'];?>" class="form-control name_list" style="display: none"/></td>
   										  <td><input type="button" name="active1" id="active1" value="Add More" class="btn btn-success" onclick="showline2()" style="display: none"></td>
   										  <td><input type="button" name="remove2" id="remove1" value="Remove" class="btn btn-danger btn_remove" onclick="hideline1()" style="display: none"></td></tr>
                                      										 
                                        
                                    </tr>	
									<tr>  
                                         <td>
										  <script type="text/javascript">
                                          function showfield3(name){
                                          if(name=='relationship2')document.getElementById('div3').innerHTML='<input type="text" name="relationship2" />';
                                          else document.getElementById('div3').innerHTML='';
                                               }
                                          </script>
										  <select name="relationship2" id="relationship2" style="display: none" style="width:120px"; onchange="showfield3(this.options[this.selectedIndex].value)"><option></option><option>Father</option><option>Mother</option><option>Brother</option><option>Sister</option> <option value="relationship2">Other</option></select><div id="div3"></div><?php if(isset($_POST['relationship2'])) $_SESSION['relationship2']=$_POST['relationship2'];?></td>
										<td><input type="text" name="names2" id="names2" value="<?php echo $_SESSION['names2'];?>" class="form-control name_list" style="display: none"/></td> 
										 <td><input type="text" name="place_of_birth2" id="place_of_birth2" value="<?php echo $_SESSION['place_of_birth2'];?>" class="form-control name_list" style="display: none"/></td> 
										 <td><input type="date" name="date_of_birth2" id="date_of_birth2" value="<?php echo $_SESSION['date_of_birth2'];?>" class="form-control name_list" style="display: none"/></td> 
										 <td><input type="text" name="occupation2"  id="occupation2" value="<?php echo $_SESSION['history2'];?>" class="form-control name_list" style="display: none"/></td> 
										 <td><input type="text" name="address2"  id="address2" class="form-control name_list" value="<?php echo $_SESSION['address2'];?>" style="display: none" /></td> 
										 <td><input type="text" name="history2" id="history2" value="<?php echo $_SESSION['history2'];?>" class="form-control name_list" style="display: none"/></td>
   										  <td><input type="button" name="active2" id="active2" value="Add More" class="btn btn-success" onclick="showline3()" style="display: none"></td>
   										  <td><input type="button" name="remove2" id="remove2" value="Remove" class="btn btn-danger btn_remove" onclick="hideline2()" style="display: none"></td></tr>
                                      										 
                                        
                                    </tr>	<tr>  
                                         <td>
										   <script type="text/javascript">
                                          function showfield4(name){
                                          if(name=='relationship3')document.getElementById('div4').innerHTML='<input type="text" name="relationship3" />';
                                          else document.getElementById('div4').innerHTML='';
                                               }
                                          </script>
										  <select name="relationship3" id="relationship3" style="display: none" style="width:120px"; onchange="showfield4(this.options[this.selectedIndex].value)"><option></option><option>Father</option><option>Mother</option><option>Brother</option><option>Sister</option> <option value="relationship3">Other</option></select><div id="div4"></div><?php if(isset($_POST['relationship3'])) $_SESSION['relationship3']=$_POST['relationship3'];?></td>
										<td><input type="text" name="names3" id="names3" value="<?php echo $_SESSION['names3'];?>" class="form-control name_list" style="display: none"/></td> 
										 <td><input type="text" name="place_of_birth3" id="place_of_birth3" value="<?php echo $_SESSION['place_of_birth3'];?>" class="form-control name_list" style="display: none"/></td> 
										 <td><input type="date" name="date_of_birth3" id="date_of_birth3" value="<?php echo $_SESSION['date_of_birth3'];?>" class="form-control name_list" style="display: none"/></td> 
										 <td><input type="text" name="occupation3"  id="occupation3" value="<?php echo $_SESSION['occupation3'];?>" class="form-control name_list" style="display: none"/></td> 
										 <td><input type="text" name="address3"  id="address3" value="<?php echo $_SESSION['address3'];?>" class="form-control name_list" style="display: none" /></td> 
										 <td><input type="text" name="history3" id="history3" value="<?php echo $_SESSION['history3'];?>" class="form-control name_list" style="display: none"/></td>
   										  <td><input type="button" name="active3" id="active3" value="Add More" class="btn btn-success" onclick="showline4()" style="display: none"></td>
   										  <td><input type="button" name="remove3" id="remove3" value="Remove" class="btn btn-danger btn_remove" onclick="hideline3()" style="display: none"></td></tr>
                                      										 
                                        
                                    </tr>
<tr>  
                                         <td>
										 
										   <script type="text/javascript">
                                          function showfield5(name){
                                          if(name=='relationship4')document.getElementById('div5').innerHTML='<input type="text" name="relationship4" />';
                                          else document.getElementById('div5').innerHTML='';
                                               }
                                          </script>
										  <select name="relationship4" id="relationship4" style="display: none" style="width:120px"; onchange="showfield5(this.options[this.selectedIndex].value)"><option></option><option>Father</option><option>Mother</option><option>Brother</option><option>Sister</option> <option value="relationship4">Other</option></select><div id="div5"></div><?php if(isset($_POST['relationship4'])) $_SESSION['relationship4']=$_POST['relationship4'];?></td>
										<td><input type="text" name="names4" id="names4" value="<?php echo $_SESSION['names4'];?>" class="form-control name_list" style="display: none"/></td> 
										 <td><input type="text" name="place_of_birth4" id="place_of_birth4" value="<?php echo $_SESSION['place_of_birth4'];?>" class="form-control name_list" style="display: none"/></td> 
										 <td><input type="date" name="date_of_birt4" id="date_of_birth4" value="<?php echo $_SESSION['place_of_birth4'];?>"  class="form-control name_list" style="display: none"/></td> 
										 <td><input type="text" name="occupation4"  id="occupation4" value="<?php echo $_SESSION['occupation4'];?>"  class="form-control name_list" style="display: none"/></td> 
										 <td><input type="text" name="address4"  id="address4" value="<?php echo $_SESSION['address4'];?>" class="form-control name_list" style="display: none" /></td> 
										 <td><input type="text" name="history4" id="history4" value="<?php echo $_SESSION['history4'];?>" class="form-control name_list" style="display: none"/></td>
   										  <td><input type="button" name="active4" id="active4" value="Add More" class="btn btn-success" onclick="showline5()" style="display: none"></td>
   										  <td><input type="button" name="remove4" id="remove4" value="Remove" class="btn btn-danger btn_remove" onclick="hideline4()" style="display: none"></td></tr>
                                      										 
                                        
                                    </tr>	
<tr>  
                                         <td>
										 
										    <script type="text/javascript">
                                          function showfield6(name){
                                          if(name=='relationship5')document.getElementById('div6').innerHTML='<input type="text" name="relationship5" />';
                                          else document.getElementById('div6').innerHTML='';
                                               }
                                          </script>
										  <select name="relationship5" id="relationship5" style="display: none" style="width:120px"; onchange="showfield6(this.options[this.selectedIndex].value)"><option></option><option>Father</option><option>Mother</option><option>Brother</option><option>Sister</option> <option value="relationship5">Other</option></select><div id="div6"></div><?php if(isset($_POST['relationship5'])) $_SESSION['relationship5']=$_POST['relationship5'];?></td>
										<td><input type="text" name="names5" id="names5" value="<?php echo $_SESSION['names5'];?>"class="form-control name_list" style="display: none"/></td> 
										 <td><input type="text" name="place_of_birth5" id="place_of_birth5" class="form-control name_list" style="display: none"/></td> 
										 <td><input type="date" name="date_of_birt5" id="date_of_birth5"  class="form-control name_list" style="display: none"/></td> 
										 <td><input type="text" name="occupation5"  id="occupation5" class="form-control name_list" style="display: none"/></td> 
										 <td><input type="text" name="address5"  id="address5" class="form-control name_list" style="display: none" /></td> 
										 <td><input type="text" name="history5" id="history5" class="form-control name_list" style="display: none"/></td>
   										  <td><input type="button" name="active5" id="active5" value="Add More" class="btn btn-success" onclick="showline6()" style="display: none"></td>
   										  <td><input type="button" name="remove5" id="remove5" value="Remove" class="btn btn-danger btn_remove" onclick="hideline5()" style="display: none"></td></tr>
                                      										 
                                        
                                    </tr>	
<tr>  
                                         <td>
										 
										     <script type="text/javascript">
                                          function showfield7(name){
                                          if(name=='relationship6')document.getElementById('div7').innerHTML='<input type="text" name="relationship6" />';
                                          else document.getElementById('div7').innerHTML='';
                                               }
                                          </script>
										  <select name="relationship6" id="relationship6" style="display: none" style="width:120px"; onchange="showfield7(this.options[this.selectedIndex].value)"><option></option><option>Father</option><option>Mother</option><option>Brother</option><option>Sister</option> <option value="relationship6">Other</option></select><div id="div7"></div><?php if(isset($_POST['relationship6'])) $_SESSION['relationship6']=$_POST['relationship6'];?></td>
										<td><input type="text" name="names6" id="names6" value="<?php echo $_SESSION['names6'];?>"class="form-control name_list" style="display: none"/></td> 
										 <td><input type="text" name="place_of_birth6" id="place_of_birth6" class="form-control name_list" style="display: none"/></td> 
										 <td><input type="text" name="date_of_birt6" id="date_of_birth6"  class="form-control name_list" style="display: none"/></td> 
										 <td><input type="text" name="occupation6"  id="occupation6" class="form-control name_list" style="display: none"/></td> 
										 <td><input type="text" name="address6"  id="address6" class="form-control name_list" style="display: none" /></td> 
										 <td><input type="text" name="history6" id="history6" class="form-control name_list" style="display: none"/></td>
   										  <td><input type="button" name="active6" id="active6" value="Add More" class="btn btn-success" onclick="showline7()" style="display: none"></td>
   										  <td><input type="button" name="remove6" id="remove6" value="Remove" class="btn btn-danger btn_remove" onclick="hideline6()" style="display: none"></td></tr>
                                      										 
                                        
                                    </tr>	
<tr>  
                                         <td>
										      <script type="text/javascript">
                                          function showfield8(name){
                                          if(name=='relationship7')document.getElementById('div8').innerHTML='<input type="text" name="relationship7" />';
                                          else document.getElementById('div8').innerHTML='';
                                               }
                                          </script>
										  <select name="relationship7" id="relationship7" style="display: none" style="width:120px"; onchange="showfield8(this.options[this.selectedIndex].value)"><option></option><option>Father</option><option>Mother</option><option>Brother</option><option>Sister</option> <option value="relationship7">Other</option></select><div id="div8"></div><?php if(isset($_POST['relationship7'])) $_SESSION['relationship7']=$_POST['relationship7'];?></td>
										 <td><input type="text" name="names7" id="names7" value="<?php echo $_SESSION['names7'];?>"class="form-control name_list" style="display: none"/></td> 
										 <td><input type="text" name="place_of_birth7" id="place_of_birth7" class="form-control name_list" style="display: none"/></td> 
										 <td><input type="text" name="date_of_birt7" id="date_of_birth7"  class="form-control name_list" style="display: none"/></td> 
										 <td><input type="text" name="occupation7"  id="occupation7" class="form-control name_list" style="display: none"/></td> 
										 <td><input type="text" name="address7"  id="address7" class="form-control name_list" style="display: none" /></td> 
										 <td><input type="text" name="history7" id="history7" class="form-control name_list" style="display: none"/></td>
   										  <td><input type="button" name="active7" id="active7" value="Add More" class="btn btn-success" onclick="showline8()" style="display: none"></td>
   										  <td><input type="button" name="remove7" id="remove7" value="Remove" class="btn btn-danger btn_remove" onclick="hideline7()" style="display: none"></td></tr>
                                      										 
                                        
                                    </tr>		
<tr>  
                                         <td>
										       <script type="text/javascript">
                                          function showfield9(name){
                                          if(name=='relationship8')document.getElementById('div9').innerHTML='<input type="text" name="relationship8" />';
                                          else document.getElementById('div9').innerHTML='';
                                               }
                                          </script>
										  <select name="relationship8" id="relationship8" style="display: none" style="width:120px"; onchange="showfield9(this.options[this.selectedIndex].value)"><option></option><option>Father</option><option>Mother</option><option>Brother</option><option>Sister</option> <option value="relationship8">Other</option></select><div id="div9"></div><?php if(isset($_POST['relationship8'])) $_SESSION['relationship8']=$_POST['relationship8'];?></td>
										 <td><input type="text" name="names8" id="names8" class="form-control name_list" style="display: none"/></td> 
										 <td><input type="text" name="place_of_birth8" id="place_of_birth8" class="form-control name_list" style="display: none"/></td> 
										 <td><input type="text" name="date_of_birt8" id="date_of_birth8"  class="form-control name_list" style="display: none"/></td> 
										 <td><input type="text" name="occupation8"  id="occupation8" class="form-control name_list" style="display: none"/></td> 
										 <td><input type="text" name="address8"  id="address8" class="form-control name_list" style="display: none" /></td> 
										 <td><input type="text" name="history8" id="history8" class="form-control name_list" style="display: none"/></td>
   										  <td><input type="button" name="active8" id="active8" value="Add More" class="btn btn-success" onclick="showline9()" style="display: none"></td>
   										  <td><input type="button" name="remove8" id="remove8" value="Remove" class="btn btn-danger btn_remove" onclick="hideline8()" style="display: none"></td></tr>
                                      										 
                                        
                                    </tr>									
								   
                               </table>
                    </div>
                    <button type="button" class="wizard-prev btn btn-primary">Previous</button>
                    <button type="button" class="wizard-next btn btn-primary">Next</button>
					


                </div>

                <div id="details" class="wizard-step" style="background-color: #E9F1F1;" required>
				
								<div id="RRA_mandatory" style="background-color: #ffffff ; color: red;">
									<span>(*)</span>Mandatory Fields
								</div>
                    <div class="form-group">

						 <table align="center">
						 <tr><td><h4 style="color: green";>PHYSICAL ADDRESS<span></span></h4></td></tr>

											<tr><td> Country:<span>*</span></td><td align="left"><input type="text" name="p_country" id="p_country" value="<?php echo $_SESSION['p_country'];?>" ></td></tr>

											<tr><td> Province: <span>*</span></td><td><input type="text" name="p_province" id="p_province"value="<?php echo $_SESSION['p_province'];?>" ></td></tr>

											<tr><td>District:<span>*</span></td><td><input type="text" name="p_district" id="p_district"value="<?php echo $_SESSION['p_district'];?>" ></td></tr>
											
											<tr><td>Sector:<span>*</span></td><td><input type="text" name="p_sector" id="p_sector"value="<?php echo $_SESSION['p_sector'];?>" ></td></tr>
											
											<tr><td>Cell:<span>*</span></td><td><input type="text" name="p_cell" id="p_cell"value="<?php echo $_SESSION['p_cell'];?>" ></td></tr>
											
											<tr><td>Village:<span>*</span></td><td><input type="text" name="p_village" id="p_village"value="<?php echo $_SESSION['p_village'];?>" ></td></tr>
		
		
		<tr><td><h4 style="color: green";>MARITAL STATUS<span></span></h4></td></tr>

			  <tr><td>	Marital Status:</td><td><select name="marital_status" id="marital_status" style="width:200px";><option></option>
			  <option>Single</option><option>Married</option><option>Widow</option><option>Widower</option></select><?php if(isset($_POST['marital_status'])) $_SESSION['marital_status']=$_POST['marital_status']; ?></td></tr>
		<tr><td><h4 style="color: green";>CURRENT DEPLOYMENT<span></span></h4></td></tr>	  

	<tr><td> Country:</td><td align="left"><input type="text" name="cur_country" id="cur_country" value="<?php echo $_SESSION['cur_country'];?>" /></td></tr>

											<tr><td> Province: <span>*</span></td><td><input type="text" name="cur_province" id="cur_province"value="<?php echo $_SESSION['cur_province'];?>"/></td></tr>

											<tr><td>District:<span>*</span></td><td><input type="text" name="cur_district" id="cur_district"value="<?php echo $_SESSION['cur_district'];?>"/></td></tr>
											
											<tr><td>Sector:<span>*</span></td><td><input type="text" name="cur_sector" id="cur_sector"value="<?php echo $_SESSION['cur_sector'];?>" /></td></tr>
											
											<tr><td>Cell:<span>*</span></td><td><input type="text" name="cur_cell" id="cur_cell"value="<?php echo $_SESSION['cur_cell'];?>" /></td></tr>
											
											<tr><td>Village:<span>*</span></td><td><input type="text" name="cur_village" id="cur_village"value="<?php echo $_SESSION['cur_village'];?>" /></td></tr>
											

	
	<tr><td><h4 style="color: green";>DETAILS ON PERSONAL<span></span></h4></td></tr>
	                                        <tr><td> Healthy:<span>*</span></td><td align="left"><input type="text" name="healthy" id="healthy" value="<?php echo $_SESSION['healthy'];?>" /></td></tr>

											<tr><td> Habits: <span>*</span></td><td><input type="text" name="habits" id="habits"value="<?php echo $_SESSION['habits'];?>"/></td></tr>
	<tr><td><h4 style="color: green";>DESCRIPTION OF PERSON<span></span></h4></td></tr>

	
	
	                                        <tr><td> Date of birth:</td><td align="left"><input type="date" name="dob" id="dob" value="<?php echo $_SESSION['dob'];?>" /></td></tr>

											<tr><td> height: <span>*</span></td><td><input type="text" name="height" id="height"value="<?php echo $_SESSION['height'];?>"/></td></tr>
											<tr><td> weight: <span>*</span></td><td><input type="text" name="weight" id="weight"value="<?php echo $_SESSION['weight'];?>"/></td></tr>
											<tr><td> Pysical marks: <span>*</span></td><td><input type="text" name="physical_marks" id="physical_marks"value="<?php echo $_SESSION['physical_marks'];?>"/></td></tr>

		

			 </table>
					
                    </div>
                    <button type="button" class="wizard-prev btn btn-primary">Previous</button>
                    <button type="button" class="wizard-next btn btn-primary">Next</button>
										

                </div>
	
				      <div id="education" class="wizard-step" required>
                    <div class="form-group">
                        
							<table border='0' id="dynamic_field">  
							   			  <tr><td>Education</td><td> Name of school/university</td><td>start date</td><td>End date</td><td>Performance</td><td>Award</td><td>responsability(if any)</td><td>Action</td>
                               <tr>  
                                         <td><input type="text" name="education" id="education" value="<?php echo $_SESSION['education'];?>" class="form-control name_list" style="background: #f5fffa"; placeholder="Primary" /></td>  
										 <td><input type="text" name="name_of_school" id="name_of_school" value="<?php echo $_SESSION['name_of_school'];?>"  class="form-control name_list" ></td> 
										 <td><input type="text" name="start_date" id="start_date" value="<?php echo $_SESSION['start_date'];?>"class="form-control name_list"  ></td> 
										 <td><input type="text" name="end_date" id="end_date"  class="form-control name_list" value="<?php echo $_SESSION['end_date'];?>" ></td> 
										 <td><input type="text" name="performance"  id="performance" class="form-control name_list" value="<?php echo $_SESSION['performance'];?>" ></td> 
										 <td><input type="text" name="award"  id="award" class="form-control name_list" value="<?php echo $_SESSION['award'];?>" ></td> 
										 <td><input type="text" name="responsabilty" id="responsabilty" class="form-control name_list" value="<?php echo $_SESSION['responsabilty'];?>" ></td>
										<td><input type="button" name="display" id="display" class="btn btn-success" value="Add More" onclick="displayline1()"></td>
										<td><input type="button" name="hide" id="hide" value="Remove" class="btn btn-danger btn_remove"  onclick="hidline()"></td>                                      										 
                                        
                                    </tr>
									<tr>  
                                         <td><input type="text" name="education1" id="education1"value="<?php echo $_SESSION['education1'];?>" style="display: none" class="form-control name_list" style="background: #f5fffa"; placeholder="Secondary" /></td>  
										 <td><input type="text" name="name_of_school1" id="name_of_school1" value="<?php echo $_SESSION['name_of_school1'];?>" class="form-control name_list" style="display: none"/></td> 
										 <td><input type="text" name="start_date1" id="start_date1" value="<?php echo $_SESSION['start_date1'];?>" class="form-control name_list" style="display: none"/></td> 
										 <td><input type="text" name="end_date1" id="end_date1" value="<?php echo $_SESSION['end_date1'];?>" class="form-control name_list" style="display: none"/></td> 
										 <td><input type="text" name="performance1"  id="performance1"  value="<?php echo $_SESSION['performance1'];?>" class="form-control name_list" style="display: none"/></td> 
										 <td><input type="text" name="award1"  id="award1" value="<?php echo $_SESSION['award1'];?>" class="form-control name_list" style="display: none" /></td> 
										 <td><input type="text" name="responsabilty1" id="responsabilty1" value="<?php echo $_SESSION['responsabilty1'];?>" class="form-control name_list" style="display: none"/></td>
   										  <td><input type="button" name="display1" id="display1" value="Add More" class="btn btn-success" onclick="displayline2()" style="display: none"></td>
   										  <td><input type="button" name="hide2" id="hide1" value="Remove" class="btn btn-danger btn_remove" onclick="hidline1()" style="display: none"></td></tr>
                                      										 
                                        
                                    </tr>	
									<tr>  
                                         <td><input type="text" name="education2" id="education2" value="<?php echo $_SESSION['education2'];?>" style="display: none" class="form-control name_list" style="background: #f5fffa"; placeholder="University"  /></td>  
										 <td><input type="text" name="name_of_school2" id="name_of_school2" value="<?php echo $_SESSION['name_of_school2'];?>" class="form-control name_list" style="display: none"/></td> 
										 <td><input type="text" name="start_date2" id="start_date2" value="<?php echo $_SESSION['start_date2'];?>" class="form-control name_list" style="display: none"/></td> 
										 <td><input type="text" name="end_date2" id="end_date2" value="<?php echo $_SESSION['end_date2'];?>" class="form-control name_list" style="display: none"/></td> 
										 <td><input type="text" name="performance2"  id="performance2" value="<?php echo $_SESSION['performance2'];?>" class="form-control name_list" style="display: none"/></td> 
										 <td><input type="text" name="award2"  id="award2" class="form-control name_list" value="<?php echo $_SESSION['award2'];?>" style="display: none" /></td> 
										 <td><input type="text" name="responsabilty2" id="responsabilty2" value="<?php echo $_SESSION['responsabilty2'];?>" class="form-control name_list" style="display: none"/></td>
   										  <td><input type="button" name="display2" id="display2" value="Add More" class="btn btn-success" onclick="displayline3()" style="display: none"></td>
   										  <td><input type="button" name="hide2" id="hide2" value="Remove" class="btn btn-danger btn_remove" onclick="hidline2()" style="display: none"></td></tr>
                                      										 
                                        
                                    </tr>	<tr>  
                                         <td><input type="text" name="education3" id="education3" value="<?php echo $_SESSION['education3'];?>" style="display: none" class="form-control name_list" style="background: #f5fffa"; placeholder="Masters" /></td>  
										 <td><input type="text" name="name_of_school3" id="name_of_school3" value="<?php echo $_SESSION['name_of_school3'];?>" class="form-control name_list" style="display: none"/></td> 
										 <td><input type="text" name="start_date3" id="start_date3" value="<?php echo $_SESSION['start_date3'];?>" class="form-control name_list" style="display: none"/></td> 
										 <td><input type="text" name="end_date3" id="end_date3" value="<?php echo $_SESSION['end_date3'];?>" class="form-control name_list" style="display: none"/></td> 
										 <td><input type="text" name="performance3"  id="performance3" value="<?php echo $_SESSION['performance3'];?>" class="form-control name_list" style="display: none"/></td> 
										 <td><input type="text" name="award3"  id="award3" value="<?php echo $_SESSION['award3'];?>" class="form-control name_list" style="display: none" /></td> 
										 <td><input type="text" name="responsabilty3" id="responsabilty3" value="<?php echo $_SESSION['responsabilty3'];?>" class="form-control name_list" style="display: none"/></td>
   										  <td><input type="button" name="display3" id="display3" value="Add More" class="btn btn-success" onclick="displayline4()" style="display: none"></td>
   										  <td><input type="button" name="hide3" id="hide3" value="Remove" class="btn btn-danger btn_remove" onclick="hidline3()" style="display: none"></td></tr>
                                    <tr>  
                                         <td><input type="text" name="education4" id="education4" value="<?php echo $_SESSION['education4'];?>" style="display: none" class="form-control name_list" style="background: #f5fffa"; placeholder="other"/></td>  
										 <td><input type="text" name="name_of_school4" id="name_of_school4" value="<?php echo $_SESSION['name_of_school4'];?>" class="form-control name_list" style="display: none"/></td> 
										 <td><input type="text" name="start_date4" id="start_date4" value="<?php echo $_SESSION['start_date4'];?>" class="form-control name_list" style="display: none"/></td> 
										 <td><input type="text" name="end_date4" id="end_date4" value="<?php echo $_SESSION['end_date4'];?>" class="form-control name_list" style="display: none"/></td> 
										 <td><input type="text" name="performance4"  id="performance4" value="<?php echo $_SESSION['performance4'];?>" class="form-control name_list" style="display: none"/></td> 
										 <td><input type="text" name="award4"  id="award4" value="<?php echo $_SESSION['award4'];?>" class="form-control name_list" style="display: none" /></td> 
										 <td><input type="text" name="responsabilty4" id="responsabilty4" value="<?php echo $_SESSION['responsabilty4'];?>" class="form-control name_list" style="display: none"/></td>
   										  <td><input type="button" name="display4" id="display4" value="Add More" class="btn btn-success" onclick="displayline5()" style="display: none"></td>
   										  <td><input type="button" name="hide4" id="hide4" value="Remove" class="btn btn-danger btn_remove" onclick="hidline4()" style="display: none"></td></tr>
                                    <tr>  
                                         <td><input type="text" name="education5" id="education5" value="<?php echo $_SESSION['education5'];?>" style="display: none" class="form-control name_list" style="background: #f5fffa"; /></td>  
										 <td><input type="text" name="name_of_school5" id="name_of_school5" value="<?php echo $_SESSION['name_of_school5'];?>" class="form-control name_list" style="display: none"/></td> 
										 <td><input type="text" name="start_date5" id="start_date5" value="<?php echo $_SESSION['start_date5'];?>" class="form-control name_list" style="display: none"/></td> 
										 <td><input type="text" name="end_date5" id="end_date5" value="<?php echo $_SESSION['end_date5'];?>" class="form-control name_list" style="display: none"/></td> 
										 <td><input type="text" name="performance5"  id="performance5" value="<?php echo $_SESSION['performance5'];?>" class="form-control name_list" style="display: none"/></td> 
										 <td><input type="text" name="award5"  id="award5" value="<?php echo $_SESSION['award5'];?>" class="form-control name_list" style="display: none" /></td> 
										 <td><input type="text" name="responsabilty5" id="responsabilty5" value="<?php echo $_SESSION['responsabilty5'];?>" class="form-control name_list" style="display: none"/></td>
   										  <td><input type="button" name="display5" id="display5" value="Add More" class="btn btn-success" onclick="displayline6()" style="display: none"></td>
   										  <td><input type="button" name="hide5" id="hide5" value="Remove" class="btn btn-danger btn_remove" onclick="hidline5()" style="display: none"></td></tr>
                                    
									</table>
						
                    </div>
                    <button type="button" class="wizard-prev btn btn-primary">Previous</button>
                    <button type="button" class="wizard-next btn btn-primary">Next</button>
					
					
                </div>
				<!-- end of personal details div -->
				
				 <div id="employment" class="wizard-step" required>
                    <div class="form-group">
           <table border='0' id="dynamic_field">  
							   			  <tr><td>Employer</td><td>Starting<br>date</td><td>Ending<br>date</td><td>Position</td><td>Conduct</td><td>Competence</td><td>Weakness</td><td>Motivation</td><td>Action</td><td></td></tr>
                                   <tr>  
                                         <td><input type="text" name="emplayer" id="emplayer" value="<?php echo $_SESSION['emplayer'];?>" class="form-control name_list" /></td>  
										 <td><input type="text" name="Startingdate" id="Startingdate" value="<?php echo $_SESSION['Startingdate'];?>" class="form-control name_list" /></td> 
										 <td><input type="text" name="Endingdate" id="Endingdate" value="<?php echo $_SESSION['Endingdate'];?>" class="form-control name_list" /></td> 
										 <td><input type="text" name="position" id="position" value="<?php echo $_SESSION['position'];?>"  class="form-control name_list"  ></td> 
										 <td><input type="text" name="conduct"  id="conduct" value="<?php echo $_SESSION['conduct'];?>" class="form-control name_list"  ></td> 
										 <td><input type="text" name="competence"  id="competence" value="<?php echo $_SESSION['competence'];?>" class="form-control name_list" ></td> 
										 <td><input type="text" name="weakness" id="weakness" value="<?php echo $_SESSION['weakness'];?>" class="form-control name_list" /></td>
										 <td><input type="text" name="motivation" id="motivation" value="<?php echo $_SESSION['motivation'];?>" class="form-control name_list" /></td>
                                         <td><input type="button" name="active" id="active" class="btn btn-success" value="Add More" onclick="showline11()"></td>
										 <td><input type="button" name="remove" id="remove" value="Remove" class="btn btn-danger btn_remove"  onclick="hideline()" ></td>										 
                                        
                                    </tr>
									
									 <tr>  
                                         <td><input type="text" name="emplayer11" id="emplayer11" value="<?php echo $_SESSION['emplayer11'];?>" class="form-control name_list" style="display: none" /></td>  
										 <td><input type="text" name="Startingdate11" id="Startingdate11" value="<?php echo $_SESSION['Startingdate11'];?>" class="form-control name_list" style="display: none" /></td> 
										 <td><input type="text" name="Endingdate11" id="Endingdate11" value="<?php echo $_SESSION['Endingdate11'];?>" class="form-control name_list" style="display: none" /></td> 
										 <td><input type="text" name="position11" id="position11" value="<?php echo $_SESSION['position11'];?>"  class="form-control name_list" style="display: none" /></td> 
										 <td><input type="text" name="conduct11"  id="conduct11" value="<?php echo $_SESSION['conduct11'];?>" class="form-control name_list" style="display: none" /></td> 
										 <td><input type="text" name="competence11"  id="competence11" value="<?php echo $_SESSION['competence11'];?>" class="form-control name_list"  style="display: none"/></td> 
										 <td><input type="text" name="weakness11" id="weakness11" value="<?php echo $_SESSION['weakness11'];?>" class="form-control name_list"  style="display: none"/></td>
										 <td><input type="text" name="motivation11" id="motivation11" value="<?php echo $_SESSION['motivation11'];?>" class="form-control name_list"  style="display: none"/></td>
                                         <td><input type="button" name="active11" id="active11" class="btn btn-success" value="Add More" onclick="showline12()" style="display: none"></td>
										 <td><input type="button" name="remove11" id="remove11" value="Remove" class="btn btn-danger btn_remove"  onclick="hideline11()" style="display: none"></td>										 
                                        
                                    </tr>
									
									
									 <tr>  
                                         <td><input type="text" name="emplayer12" id="emplayer12" value="<?php echo $_SESSION['emplayer12'];?>" class="form-control name_list"  style="display: none" /></td>  
										 <td><input type="text" name="Startingdate12" id="Startingdate12" value="<?php echo $_SESSION['Startingdate12'];?>" class="form-control name_list"  style="display: none"/></td> 
										 <td><input type="text" name="Endingdate12" id="Endingdate12" value="<?php echo $_SESSION['Endingdate12'];?>" class="form-control name_list"  style="display: none"/></td> 
										 <td><input type="text" name="position12" id="position12" value="<?php echo $_SESSION['position12'];?>"  class="form-control name_list"  style="display: none"/></td> 
										 <td><input type="text" name="conduct12"  id="conduct12" value="<?php echo $_SESSION['conduct12'];?>" class="form-control name_list" style="display: none" /></td> 
										 <td><input type="text" name="competence12"  id="competence12" value="<?php echo $_SESSION['competence12'];?>" class="form-control name_list" style="display: none" /></td> 
										 <td><input type="text" name="weakness12" id="weakness12" value="<?php echo $_SESSION['weakness12'];?>" class="form-control name_list" style="display: none" /></td>
										 <td><input type="text" name="motivation12" id="motivation12" value="<?php echo $_SESSION['motivation12'];?>" class="form-control name_list" style="display: none" /></td>
                                         <td><input type="button" name="active12" id="active12" class="btn btn-success" value="Add More" onclick="showline13()" style="display: none"></td>
										 <td><input type="button" name="remove12" id="remove12" value="Remove" class="btn btn-danger btn_remove"  onclick="hideline12()" style="display: none"></td>										 
                                        
                                    </tr>
									
									
									<tr>  
                                         <td><input type="text" name="emplayer13" id="emplayer13" value="<?php echo $_SESSION['emplayer13'];?>" class="form-control name_list"  style="display: none" /></td>  
										 <td><input type="text" name="Startingdate13" id="Startingdate13" value="<?php echo $_SESSION['Startingdate13'];?>" class="form-control name_list"  style="display: none"/></td> 
										 <td><input type="text" name="Endingdate13" id="Endingdate13" value="<?php echo $_SESSION['Endingdate13'];?>" class="form-control name_list" style="display: none" /></td> 
										 <td><input type="text" name="position13" id="position13" value="<?php echo $_SESSION['position13'];?>"  class="form-control name_list" style="display: none" /></td> 
										 <td><input type="text" name="conduct13"  id="conduct13" value="<?php echo $_SESSION['conduct13'];?>" class="form-control name_list"  style="display: none"/></td> 
										 <td><input type="text" name="competence13"  id="competence13" value="<?php echo $_SESSION['competence13'];?>" class="form-control name_list" style="display: none" /></td> 
										 <td><input type="text" name="weakness13" id="weakness13" value="<?php echo $_SESSION['weakness13'];?>" class="form-control name_list"  style="display: none"/></td>
										 <td><input type="text" name="motivation13" id="motivation13" value="<?php echo $_SESSION['motivation13'];?>" class="form-control name_list"  style="display: none"/></td>
                                         <td><input type="button" name="active13" id="active13" class="btn btn-success" value="Add More" onclick="showline14()" style="display: none"></td>
										 <td><input type="button" name="remove13" id="remove13" value="Remove" class="btn btn-danger btn_remove"  onclick="hideline13()" style="display: none"></td>										 
                                        
                                    </tr>
									
									<tr>  
                                         <td><input type="text" name="emplayer14" id="emplayer14" value="<?php echo $_SESSION['emplayer14'];?>" class="form-control name_list"  style="display: none" /></td>  
										 <td><input type="text" name="Startingdate14" id="Startingdate14" value="<?php echo $_SESSION['Startingdate14'];?>" class="form-control name_list" style="display: none" /></td> 
										 <td><input type="text" name="Endingdate14" id="Endingdate14" value="<?php echo $_SESSION['Endingdate14'];?>" class="form-control name_list" style="display: none" /></td> 
										 <td><input type="text" name="position14" id="position14" value="<?php echo $_SESSION['position14'];?>"  class="form-control name_list"  style="display: none"/></td> 
										 <td><input type="text" name="conduct14"  id="conduct14" value="<?php echo $_SESSION['conduct14'];?>" class="form-control name_list" style="display: none" /></td> 
										 <td><input type="text" name="competence14"  id="competence14" value="<?php echo $_SESSION['competence14'];?>" class="form-control name_list" style="display: none" /></td> 
										 <td><input type="text" name="weakness14" id="weakness14" value="<?php echo $_SESSION['weakness14'];?>" class="form-control name_list"  style="display: none"/></td>
										 <td><input type="text" name="motivation14" id="motivation14" value="<?php echo $_SESSION['motivation14'];?>" class="form-control name_list" style="display: none" /></td>
                                         <td><input type="button" name="active14" id="active14" class="btn btn-success" value="Add More" onclick="showline15()" style="display: none"></td>
										 <td><input type="button" name="remove14" id="remove14" value="Remove" class="btn btn-danger btn_remove"  onclick="hideline14()" style="display: none"></td>										 
                                        
                                    </tr>
									
									<tr>  
                                         <td><input type="text" name="emplayer15" id="emplayer15" value="<?php echo $_SESSION['emplayer15'];?>" class="form-control name_list" style="display: none"  /></td>  
										 <td><input type="text" name="Startingdate15" id="Startingdate15" value="<?php echo $_SESSION['Startingdate15'];?>" class="form-control name_list" style="display: none" /></td> 
										 <td><input type="text" name="Endingdate15" id="Endingdate15" value="<?php echo $_SESSION['Endingdate15'];?>" class="form-control name_list" style="display: none" /></td> 
										 <td><input type="text" name="position15" id="position15" value="<?php echo $_SESSION['position15'];?>"  class="form-control name_list" style="display: none" /></td> 
										 <td><input type="text" name="conduct15"  id="conduct15" value="<?php echo $_SESSION['conduct15'];?>" class="form-control name_list" style="display: none" /></td> 
										 <td><input type="text" name="competence15"  id="competence15" value="<?php echo $_SESSION['competence15'];?>" class="form-control name_list" style="display: none" /></td> 
										 <td><input type="text" name="weakness15" id="weakness15" value="<?php echo $_SESSION['weakness15'];?>" class="form-control name_list" style="display: none" /></td>
										 <td><input type="text" name="motivation15" id="motivation15" value="<?php echo $_SESSION['motivation15'];?>" class="form-control name_list" style="display: none" /></td>
                                         <td><input type="button" name="active15" id="active15" class="btn btn-success" value="Add More" onclick="showline16()" style="display: none"></td>
										 <td><input type="button" name="remove15" id="remove15" value="Remove" class="btn btn-danger btn_remove"  onclick="hideline15()" style="display: none"></td>										 
                                        
                                    </tr>
									
									<tr>  
                                         <td><input type="text" name="emplayer16" id="emplayer16" value="<?php echo $_SESSION['emplayer16'];?>" class="form-control name_list"  style="display: none" /></td>  
										 <td><input type="text" name="Startingdate16" id="Startingdate16" value="<?php echo $_SESSION['Startingdate16'];?>" class="form-control name_list" style="display: none" /></td> 
										 <td><input type="text" name="Endingdate16" id="Endingdate16" value="<?php echo $_SESSION['Endingdate16'];?>" class="form-control name_list" style="display: none" /></td> 
										 <td><input type="text" name="position16" id="position16" value="<?php echo $_SESSION['position16'];?>"  class="form-control name_list" style="display: none" /></td> 
										 <td><input type="text" name="conduct16"  id="conduct16" value="<?php echo $_SESSION['conduct16'];?>" class="form-control name_list" style="display: none" /></td> 
										 <td><input type="text" name="competence16"  id="competence16" value="<?php echo $_SESSION['competence16'];?>" class="form-control name_list" style="display: none" /></td> 
										 <td><input type="text" name="weakness16" id="weakness16" value="<?php echo $_SESSION['weakness16'];?>" class="form-control name_list" style="display: none" /></td>
										 <td><input type="text" name="motivation16" id="motivation16" value="<?php echo $_SESSION['motivation16'];?>" class="form-control name_list" style="display: none" /></td>
                                         <td><input type="button" name="active16" id="active16" class="btn btn-success" value="Add More" onclick="showline17()" style="display: none"></td>
										 <td><input type="button" name="remove16" id="remove16" value="Remove" class="btn btn-danger btn_remove"  onclick="hideline16()" style="display: none"></td>										 
                                        
                                    </tr>
									
									<tr>  
                                         <td><input type="text" name="emplayer17" id="emplayer17" value="<?php echo $_SESSION['emplayer17'];?>" class="form-control name_list"  style="display: none" /></td>  
										 <td><input type="text" name="Startingdate17" id="Startingdate17" value="<?php echo $_SESSION['Startingdate17'];?>" class="form-control name_list"  style="display: none"/></td> 
										 <td><input type="text" name="Endingdate17" id="Endingdate17" value="<?php echo $_SESSION['Endingdate17'];?>" class="form-control name_list" style="display: none" /></td> 
										 <td><input type="text" name="position17" id="position17" value="<?php echo $_SESSION['position17'];?>"  class="form-control name_list"  style="display: none"/></td> 
										 <td><input type="text" name="conduct17"  id="conduct17" value="<?php echo $_SESSION['conduct17'];?>" class="form-control name_list"  style="display: none"/></td> 
										 <td><input type="text" name="competence17"  id="competence17" value="<?php echo $_SESSION['competence17'];?>" class="form-control name_list"  style="display: none"/></td> 
										 <td><input type="text" name="weakness17" id="weakness17" value="<?php echo $_SESSION['weakness17'];?>" class="form-control name_list"  style="display: none"/></td>
										 <td><input type="text" name="motivation17" id="motivation17" value="<?php echo $_SESSION['motivation17'];?>" class="form-control name_list"  style="display: none"/></td>
                                         <td><input type="button" name="active17" id="active17" class="btn btn-success" value="Add More" onclick="showline18()" style="display: none"></td>
										 <td><input type="button" name="remove17" id="remove17" value="Remove" class="btn btn-danger btn_remove"  onclick="hideline17()" style="display: none"></td>										 
                                        
                                    </tr>
									
									<tr>  
                                         <td><input type="text" name="emplayer18" id="emplayer18" value="<?php echo $_SESSION['emplayer18'];?>" class="form-control name_list"  style="display: none" /></td>  
										 <td><input type="text" name="Startingdate18" id="Startingdate18" value="<?php echo $_SESSION['Startingdate18'];?>" class="form-control name_list" style="display: none"/></td> 
										 <td><input type="text" name="Endingdate18" id="Endingdate18" value="<?php echo $_SESSION['Endingdate18'];?>" class="form-control name_list" style="display: none" /></td> 
										 <td><input type="text" name="position18" id="position18" value="<?php echo $_SESSION['position18'];?>"  class="form-control name_list"  style="display: none"/></td> 
										 <td><input type="text" name="conduct18"  id="conduct18" value="<?php echo $_SESSION['conduct18'];?>" class="form-control name_list"  style="display: none"/></td> 
										 <td><input type="text" name="competence18"  id="competence18" value="<?php echo $_SESSION['competence18'];?>" class="form-control name_list"  style="display: none"/></td> 
										 <td><input type="text" name="weakness18" id="weakness18" value="<?php echo $_SESSION['weakness18'];?>" class="form-control name_list"  style="display: none"/></td>
										 <td><input type="text" name="motivation18" id="motivation18" value="<?php echo $_SESSION['motivation18'];?>" class="form-control name_list" style="display: none" /></td>
                                         <td><input type="button" name="active18" id="active18" class="btn btn-success" value="Add More" onclick="showline19()" style="display: none"></td>
										 <td><input type="button" name="remove18" id="remove18" value="Remove" class="btn btn-danger btn_remove"  onclick="hideline18()" style="display: none"></td>										 
                                        
                                    </tr>
									
									<tr>  
                                         <td><input type="text" name="emplayer19" id="emplayer19" value="<?php echo $_SESSION['emplayer19'];?>" class="form-control name_list"  style="display: none" /></td>  
										 <td><input type="text" name="Startingdate19" id="Startingdate19" value="<?php echo $_SESSION['Startingdate19'];?>" class="form-control name_list" style="display: none" /></td> 
										 <td><input type="text" name="Endingdate19" id="Endingdate19" value="<?php echo $_SESSION['Endingdate19'];?>" class="form-control name_list" style="display: none" /></td> 
										 <td><input type="text" name="position19" id="position19" value="<?php echo $_SESSION['position19'];?>"  class="form-control name_list"  style="display: none"/></td> 
										 <td><input type="text" name="conduct19"  id="conduct19" value="<?php echo $_SESSION['conduct19'];?>" class="form-control name_list" style="display: none" /></td> 
										 <td><input type="text" name="competence19"  id="competence19" value="<?php echo $_SESSION['competence19'];?>" class="form-control name_list" style="display: none" /></td> 
										 <td><input type="text" name="weakness19" id="weakness19" value="<?php echo $_SESSION['weakness19'];?>" class="form-control name_list"  style="display: none"/></td>
										 <td><input type="text" name="motivation19" id="motivation19" value="<?php echo $_SESSION['motivation19'];?>" class="form-control name_list" style="display: none" /></td>
										 <td><input type="button" name="remove19" id="remove19" value="Remove" class="btn btn-danger btn_remove"  onclick="hideline19()" style="display: none"></td>										 
                                        
                                    </tr>
									
                               </table>
		   
                    </div>
                    <button type="button" class="wizard-prev btn btn-primary">Previous</button>
                    <button type="button" class="wizard-next btn btn-primary">Next</button>
                </div>
				
								<div id="abilities" class="wizard-step" style="background-color: #E9F1F1;" required>
                    <div class="form-group">
                        <table align="center">
						
						
						
														<div style="background-color: #ffffff ; color: red;">
									<span>(*)</span>Mandatory Fields
								</div>              

						 <table align="center">
						 <tr><td><h4 style="color: green";>PROFICIENCY, QUALITY & ABILITIES<span></span></h4></td></tr>

											<tr><td> Abilities & Capasity:<span>*</span></td><td align="left"><input type="text" name="Abilities_Capasity" id="Abilities_Capasity" value="<?php echo $_SESSION['Abilities_Capasity'];?>"></td></tr>

											<tr><td> Qualities & Skills: <span>*</span></td><td><input type="text" name="Qualities_Skills" id="Qualities_Skills"value="<?php echo $_SESSION['Qualities_Skills'];?>"></td></tr>

											<tr><td> Team Work Spirit:<span>*</span></td><td><input type="text" name="Team_Work_Spirit" id="Team_Work_Spirit"value="<?php echo $_SESSION['Team_Work_Spirit'];?>" ></td></tr>
											
											<tr><td> Initiative and Innovation:<span>*</span></td><td><input type="text" name="Initiative_Innovation" id="Initiative_Innovation"value="<?php echo $_SESSION['Initiative_Innovation'];?>" ></td></tr>
											
											<tr><td> Responsibility, Confident & Maturity:<span>*</span></td><td><input type="text" name="Responsibilities" id="Responsibilities"value="<?php echo $_SESSION['Responsibilities'];?>" ></td></tr>
											
											<tr><td> Ability to Keep Secret:<span>*</span></td><td><input type="text" name="Ability_Secret" id="Ability_Secret"value="<?php echo $_SESSION['Ability_Secret'];?>" ></td></tr>
		
		
						</table>
                    </div>
                    <button type="button" class="wizard-prev btn btn-primary">Previous</button>
                    <button type="button" class="wizard-next btn btn-primary">Next</button>
					
                </div>
				

				<div id="conduct" class="wizard-step" style="background-color: #E9F1F1;" required>
                    <div class="form-group">
                        <label for="message">General Conduct</label>
						
						
						
						<table align="center">
						
														<div style="background-color: #ffffff ; color: red;">
									<span>(*)</span>Mandatory Fields
								</div>
						 <tr><td><h4 style="color: green";>GENERAL CONDUCT<span></span></h4></td></tr>

											<tr><td> Political Affiliation(political party):<span>*</span></td><td align="left"><input type="text" name="Political_Affiliations" id="Political_Affiliations" value="<?php echo $_SESSION['Political_Affiliations'];?>" ></td></tr>

											<tr><td> Attitude towards current Government: <span>*</span></td><td><input type="text" name="Attitudes" id="Attitudes"value="<?php echo $_SESSION['Attitudes'];?>" required/></td></tr>

											<tr><td>Sympathetic to negative individual ideologists:<span>*</span></td><td align="left"><input type="text" name="Sympathetics" id="Sympathetics" value="<?php echo $_SESSION['Sympathetics'];?>" ></td></tr>

											<tr><td> Participation & response to national policies: <span>*</span></td><td><input type="text" name="Participations" id="Participations"value="<?php echo $_SESSION['Participations'];?>" ></td></tr>

											<tr><td> Religious tendencies:<span>*</span></td><td><input type="text" name="Religious_tendenciess" id="Religious_tendenciess"value="<?php echo $_SESSION['Religious_tendenciess'];?>" ></td></tr>

											<tr><td>Alcoholic & other incredible habits: <span>*</span></td><td><input type="text" name="incredible_habitss" id="incredible_habitss"value="<?php echo $_SESSION['incredible_habitss'];?>" ></td></tr>

										    <tr><td>Close confidants & friends:<span>*</span></td><td align="left"><input type="text" name="close_confidantss" id="close_confidantss" value="<?php echo $_SESSION['close_confidantss'];?>" ></td></tr>

											
		
		
						</table>

                    </div>
                    <button type="button" class="wizard-prev btn btn-primary">Previous</button>
                    <button type="button" class="wizard-next btn btn-primary">Next</button>
					
                </div>
				
				
				<div id="legal" class="wizard-step" required>
                    <div class="form-group">
                        <label for="message">Legal charges</label>
<table border='0' id="dynamic_field">  
							   			  <tr><td><strong><br>Charges<strong></td><td><strong><br>Start Date</strong></td><td><strong><br>End Date</strong></td><td><strong><br>Penality</strong></td><td><strong><br>Action</strong></td></tr>
                                   <tr>  
                                        <td><input type="text" name="Charges" id="Charges" value="<?php echo $_SESSION['Charges'];?>" placeholder="Charges " class="form-control name_list" /></td> 
                                        <td><input type="text" name="Starting" id="Starting" value="<?php echo $_SESSION['Starting'];?>" placeholder="Starting date " class="form-control name_list" /></td> 
                                        <td><input type="text" name="Ending" id="Ending" value="<?php echo $_SESSION['Ending'];?>" placeholder="Ending date " class="form-control name_list" /></td> 
										<td><input type="text" name="penality" id="penality" value="<?php echo $_SESSION['penality'];?>" placeholder="Penality " class="form-control name_list" /></td> 
										<td><input type="button" name="active" id="active" class="btn btn-success" value="Add More" onclick="showline20()"></td>
										<td><input type="button" name="remove" id="remove" value="Remove" class="btn btn-danger btn_remove"  onclick="hideline()"></td>	
							                                                          										 
							       </tr>

                                   <tr>  
                                        <td><input type="text" name="Charges20" id="Charges20" value="<?php echo $_SESSION['Charges20'];?>" placeholder="Charges " class="form-control name_list" style="display: none" /></td> 
                                        <td><input type="text" name="Starting20" id="Starting20" value="<?php echo $_SESSION['Starting20'];?>" placeholder="Starting date " class="form-control name_list" style="display: none" /></td> 
                                        <td><input type="text" name="Ending20" id="Ending20" value="<?php echo $_SESSION['Ending20'];?>" placeholder="Ending date " class="form-control name_list" style="display: none" /></td> 
										<td><input type="text" name="penality20" id="penality20" value="<?php echo $_SESSION['penality20'];?>" placeholder="Penality " class="form-control name_list" style="display: none" /></td> 
										<td><input type="button" name="active20" id="active20" class="btn btn-success" value="Add More" onclick="showline21()" style="display: none"></td>
										<td><input type="button" name="remove20" id="remove20" value="Remove" class="btn btn-danger btn_remove"  onclick="hideline20()" style="display: none"></td>	
							                                                          										 
							       </tr>

                                   <tr>  
                                        <td><input type="text" name="Charges21" id="Charges21" value="<?php echo $_SESSION['Charges21'];?>" placeholder="Charges " class="form-control name_list" style="display: none" /></td> 
                                        <td><input type="text" name="Starting21" id="Starting21" value="<?php echo $_SESSION['Starting21'];?>" placeholder="Starting date " class="form-control name_list" style="display: none" /></td> 
                                        <td><input type="text" name="Ending21" id="Ending21" value="<?php echo $_SESSION['Ending21'];?>" placeholder="Ending date " class="form-control name_list" style="display: none" /></td> 
										<td><input type="text" name="penality21" id="penality21" value="<?php echo $_SESSION['penality21'];?>" placeholder="Penality " class="form-control name_list" style="display: none" /></td> 
										<td><input type="button" name="active21" id="active21" class="btn btn-success" value="Add More" onclick="showline22()" style="display: none"></td>
										<td><input type="button" name="remove21" id="remove21" value="Remove" class="btn btn-danger btn_remove"  onclick="hideline21()" style="display: none"></td>	
							                                                          										 
							       </tr>

                                   <tr>  
                                        <td><input type="text" name="Charges22" id="Charges22" value="<?php echo $_SESSION['Charges22'];?>" placeholder="Charges " class="form-control name_list" style="display: none" /></td> 
                                        <td><input type="text" name="Starting22" id="Starting22" value="<?php echo $_SESSION['Starting22'];?>" placeholder="Starting date " class="form-control name_list" style="display: none" /></td> 
                                        <td><input type="text" name="Ending22" id="Ending22" value="<?php echo $_SESSION['Ending22'];?>" placeholder="Ending date " class="form-control name_list" style="display: none" /></td> 
										<td><input type="text" name="penality22" id="penality22" value="<?php echo $_SESSION['penality22'];?>" placeholder="Penality " class="form-control name_list" style="display: none" /></td> 
										<td><input type="button" name="active22" id="active22" class="btn btn-success" value="Add More" onclick="showline23()" style="display: none"></td>
										<td><input type="button" name="remove22" id="remove22" value="Remove" class="btn btn-danger btn_remove"  onclick="hideline22()" style="display: none"></td>	
							                                                          										 
							       </tr>

                                   <tr>  
                                        <td><input type="text" name="Charges23" id="Charges23" value="<?php echo $_SESSION['Charges23'];?>" placeholder="Charges " class="form-control name_list" style="display: none" /></td> 
                                        <td><input type="text" name="Starting23" id="Starting23" value="<?php echo $_SESSION['Starting23'];?>" placeholder="Starting date " class="form-control name_list" style="display: none" /></td> 
                                        <td><input type="text" name="Ending23" id="Ending23" value="<?php echo $_SESSION['Ending23'];?>" placeholder="Ending date " class="form-control name_list" style="display: none" /></td> 
										<td><input type="text" name="penality23" id="penality23" value="<?php echo $_SESSION['penality23'];?>" placeholder="Penality " class="form-control name_list" style="display: none" /></td> 
										<td><input type="button" name="active23" id="active23" class="btn btn-success" value="Add More" onclick="showline24()" style="display: none"></td>
										<td><input type="button" name="remove23" id="remove23" value="Remove" class="btn btn-danger btn_remove"  onclick="hideline23()" style="display: none"></td>	
							                                                          										 
							       </tr>

                                   <tr>  
                                        <td><input type="text" name="Charges24" id="Charges24" value="<?php echo $_SESSION['Charges24'];?>" placeholder="Charges " class="form-control name_list" style="display: none" /></td> 
                                        <td><input type="text" name="Starting24" id="Starting24" value="<?php echo $_SESSION['Starting24'];?>" placeholder="Starting date " class="form-control name_list" style="display: none" /></td> 
                                        <td><input type="text" name="Ending24" id="Ending24" value="<?php echo $_SESSION['Ending24'];?>" placeholder="Ending date " class="form-control name_list" style="display: none" /></td> 
										<td><input type="text" name="penality24" id="penality24" value="<?php echo $_SESSION['penality24'];?>" placeholder="Penality " class="form-control name_list" style="display: none" /></td> 
										<td><input type="button" name="active24" id="active24" class="btn btn-success" value="Add More" onclick="showline25()" style="display: none"></td>
										<td><input type="button" name="remove24" id="remove24" value="Remove" class="btn btn-danger btn_remove"  onclick="hideline24()" style="display: none"></td>	
							                                                          										 
							       </tr>

                                   <tr>  
                                        <td><input type="text" name="Charges25" id="Charges25" value="<?php echo $_SESSION['Charges25'];?>" placeholder="Charges " class="form-control name_list" style="display: none" /></td> 
                                        <td><input type="text" name="Starting25" id="Starting25" value="<?php echo $_SESSION['Starting25'];?>" placeholder="Starting date " class="form-control name_list" style="display: none" /></td> 
                                        <td><input type="text" name="Ending25" id="Ending25" value="<?php echo $_SESSION['Ending25'];?>" placeholder="Ending date " class="form-control name_list" style="display: none" /></td> 
										<td><input type="text" name="penality25" id="penality25" value="<?php echo $_SESSION['penality25'];?>" placeholder="Penality " class="form-control name_list" style="display: none" /></td> 
										<td><input type="button" name="active25" id="active25" class="btn btn-success" value="Add More" onclick="showline26()" style="display: none"></td>
										<td><input type="button" name="remove25" id="remove25" value="Remove" class="btn btn-danger btn_remove"  onclick="hideline25()" style="display: none"></td>	
							                                                          										 
							       </tr>

                                   <tr>  
                                        <td><input type="text" name="Charges26" id="Charges26" value="<?php echo $_SESSION['Charges26'];?>" placeholder="Charges " class="form-control name_list" style="display: none" /></td> 
                                        <td><input type="text" name="Starting26" id="Starting26" value="<?php echo $_SESSION['Starting26'];?>" placeholder="Starting date " class="form-control name_list" style="display: none" /></td> 
                                        <td><input type="text" name="Ending26" id="Ending26" value="<?php echo $_SESSION['Ending26'];?>" placeholder="Ending date " class="form-control name_list" style="display: none" /></td> 
										<td><input type="text" name="penality26" id="penality26" value="<?php echo $_SESSION['penality26'];?>" placeholder="Penality " class="form-control name_list" style="display: none" /></td> 
										<td><input type="button" name="active26" id="active26" class="btn btn-success" value="Add More" onclick="showline27()" style="display: none"></td>
										<td><input type="button" name="remove26" id="remove26" value="Remove" class="btn btn-danger btn_remove"  onclick="hideline26()" style="display: none"></td>	
							                                                          										 
							       </tr>

                                   <tr>  
                                        <td><input type="text" name="Charges27" id="Charges27" value="<?php echo $_SESSION['Charges27'];?>" placeholder="Charges " class="form-control name_list" style="display: none" /></td> 
                                        <td><input type="text" name="Starting27" id="Starting27" value="<?php echo $_SESSION['Starting27'];?>" placeholder="Starting date " class="form-control name_list" style="display: none" /></td> 
                                        <td><input type="text" name="Ending27" id="Ending27" value="<?php echo $_SESSION['Ending27'];?>" placeholder="Ending date " class="form-control name_list" style="display: none" /></td> 
										<td><input type="text" name="penality27" id="penality27" value="<?php echo $_SESSION['penality27'];?>" placeholder="Penality " class="form-control name_list" style="display: none" /></td> 
										<td><input type="button" name="active27" id="active27" class="btn btn-success" value="Add More" onclick="showline28()" style="display: none"></td>
										<td><input type="button" name="remove27" id="remove27" value="Remove" class="btn btn-danger btn_remove"  onclick="hideline27()" style="display: none"></td>	
							                                                          										 
							       </tr>

                                   <tr>  
                                        <td><input type="text" name="Charges28" id="Charges28" value="<?php echo $_SESSION['Charges28'];?>" placeholder="Charges " class="form-control name_list" style="display: none" /></td> 
                                        <td><input type="text" name="Starting28" id="Starting28" value="<?php echo $_SESSION['Starting28'];?>" placeholder="Starting date " class="form-control name_list" style="display: none" /></td> 
                                        <td><input type="text" name="Ending28" id="Ending28" value="<?php echo $_SESSION['Ending28'];?>" placeholder="Ending date " class="form-control name_list" style="display: none" /></td> 
										<td><input type="text" name="penality28" id="penality28" value="<?php echo $_SESSION['penality28'];?>" placeholder="Penality " class="form-control name_list" style="display: none" /></td> 
										<td><input type="button" name="remove28" id="remove28" value="Remove" class="btn btn-danger btn_remove"  onclick="hideline28()" style="display: none"></td>	
							                                                          										 
							       </tr>								   
								  
                               </table><br>
						   <table>
							   <tr><td><strong>Role in Genocide </strong></td>
							   <td><input type="radio" name="rolgen" id="rolgen" value="<?php echo $_SESSION['rolgen']="yes";?>" onclick="toggleTextbox1('yes')"> <strong>YES</strong><br><br>
                                   <input type="radio" name="rolgen" id="rolgen" value="<?php echo $_SESSION['rolgen']="no";?>" required aria-required="true" aria-describedby="name-format"  onclick="toggleTextbox1('no')"><strong>No</strong><br></td>
                               </tr>
                               <tr><td><br><br><strong>Divisive Tendencies </strong></td><td><br><br>
							   <input type="radio" name="numcopy" value="<?php echo $_SESSION['numcopy']=="yes";?>"  onclick="toggleTextbox1('yes')"> <strong>YES</strong></td>
							   <td><br><br>
							   <input type="text" name="numcopy" id="numcopy" required aria-required="true" aria-describedby="name-format" disabled="disabled"  placeholder="Divisive Tendencies " class="form-control name_list"size="14"></td></tr>
                               <tr><td></td><td> 
							   <input type="radio" name="numcopy" id="numcopy" value="<?php echo $_SESSION['rolgen']="no";?>" required aria-required="true" aria-describedby="name-format"  onclick="toggleTextbox1('no')"><strong>No</strong></td></tr></table>	
                    													
						
													   
                    </div>
                    <button type="button" class="wizard-prev btn btn-primary">Previous</button>
                    <button type="button" class="wizard-next btn btn-primary">Next</button>
                </div>
				
			
			
				
				
							<div id="legal" class="wizard-step" required>
                    <div class="form-group">
                        <label for="message">Assets</label>
                              <table border='0' id="dynamic_field">  
							   			  <tr><td><strong><br>Type of Asset<strong></td><td><strong><br>Name</strong></td><td><strong><br>share with/ if any</strong></td><td><strong><br>Asset location</strong></td>
										  <td><strong><br>Action</strong></td>
										  </tr>
                                   
<!--**************************************************************************************************************************************************************************************************************************-->
								   <tr>  
                                        <td><input type="text" name="type_of_ass40" id="type_of_ass40" value="<?php echo $_SESSION['type_of_ass40'];?>" placeholder="movable or immovable" style="width:140px;"/></td> 
										<td><input type="text" name="name_of_ass40" id="assets40" value="<?php echo $_SESSION['name_of_ass40'];?>"  style="width:140px;"/></td> 
                                        <td><input type="text" name="sharing_status40" id="sharing_status40" value="<?php echo $_SESSION['sharing_status40'];?>" placeholder="sharing status" style="width:140px;"/></td>  
										<td><input type="text" name="location40" id="location40" value="<?php echo $_SESSION['location40'];?>"  style="width:140px;"/></td>
										<td><input type="button" name="active40" id="active40" class="btn btn-success" value="Add More" onclick="showline41()"></td>
										<td><input type="button" name="remove40" id="remove40" value="Remove" class="btn btn-danger btn_remove"  onclick="hideline40()"></td>	
							                                                          										 
							       </tr>
								   
                                   <tr>  
                                        <td><input type="text" name="type_of_ass41" id="type_of_ass41"style="display: none" value="<?php echo $_SESSION['type_of_ass41'];?>" placeholder="movable or immovable " style="width:140px;" /></td> 
                                        <td><input type="text" name="name_of_ass41" id="assets41"style="display: none" value="<?php echo $_SESSION['name_of_ass41'];?>"  style="width:140px;" /></td> 
                                        <td><input type="text" name="sharing_status41" id="sharing_status41"style="display: none" value="<?php echo $_SESSION['sharing_status41'];?>" placeholder="sharing status " style="width:140px;" /></td>
									     <td><input type="text" name="location41" id="location41"style="display: none" value="<?php echo $_SESSION['location41'];?>"  style="width:140px;" /></td>
									     <td><input type="button" name="active41" id="active41" class="btn btn-success" value="Add More" onclick="showline42()" style="display: none" ></td>
										<td><input type="button" name="remove41" id="remove41" value="Remove" class="btn btn-danger btn_remove"  onclick="hideline41()" style="display: none" ></td>	
							                                                          										 
							       </tr>
								   
								   <tr>  
                                        <td><input type="text" name="type_of_ass42" id="type_of_ass42"style="display: none" value="<?php echo $_SESSION['type_of_ass42'];?>" placeholder="movable or immovable " style="width:140px;" /></td> 
										<td><input type="text" name="name_of_ass42" id="assets42"style="display: none" value="<?php echo $_SESSION['name_of_ass42'];?>"  style="width:140px;" /></td> 
                                        <td><input type="text" name="sharing_status42" id="sharing_status42"style="display: none" value="<?php echo $_SESSION['sharing_status42'];?>" placeholder="sharing status " style="width:140px;" /></td> 
                                        <td><input type="text" name="location42" id="location42"style="display: none" value="<?php echo $_SESSION['location42'];?>"  style="width:140px;" /></td> 
                                        <td><input type="button" name="active42" id="active42" class="btn btn-success" value="Add More" onclick="showline43()" style="display: none" ></td>
										<td><input type="button" name="remove42" id="remove42" value="Remove" class="btn btn-danger btn_remove"  onclick="hideline42()" style="display: none" ></td>	
							                                                          										 
							       </tr>
								   
								   <tr>  
                                        <td><input type="text" name="type_of_ass43" id="type_of_ass43"style="display: none" value="<?php echo $_SESSION['type_of_ass43'];?>" placeholder="movable or immovable " style="width:140px;" /></td> 
                                        <td><input type="text" name="name_of_ass43" id="assets43"style="display: none" value="<?php echo $_SESSION['name_of_ass43'];?>"  style="width:140px;" /></td> 
                                        <td><input type="text" name="sharing_status43" id="sharing_status43"style="display: none" value="<?php echo $_SESSION['sharing_status43'];?>" placeholder="sharing status" style="width:140px;" /></td> 
                                         <td><input type="text" name="location43" id="location43"style="display: none" value="<?php echo $_SESSION['location43'];?>"  style="width:140px;" /></td> 
                                        <td><input type="button" name="active43" id="active43" class="btn btn-success" value="Add More" onclick="showline44()" style="display: none" ></td>
										<td><input type="button" name="remove43" id="remove43" value="Remove" class="btn btn-danger btn_remove"  onclick="hideline43()" style="display: none" ></td>	
							                                                          										 
							       </tr>
								   
								   <tr>  
                                        <td><input type="text" name="type_of_ass44" id="type_of_ass44"style="display: none" value="<?php echo $_SESSION['type_of_ass44'];?>" placeholder="movable or immovable " style="width:140px;" /></td> 
                                        <td><input type="text" name="name_of_ass44" id="assets44"style="display: none" value="<?php echo $_SESSION['name_of_ass44'];?>"  style="width:140px;" /></td> 
                                        <td><input type="text" name="sharing_status44" id="sharing_status44"style="display: none" value="<?php echo $_SESSION['sharing_status44'];?>" placeholder="sharing status" style="width:140px;" /></td> 
                                        <td><input type="text" name="location44" id="location44"style="display: none" value="<?php echo $_SESSION['location44'];?>" style="width:140px;" /></td> 
                                        <td><input type="button" name="remove44" id="remove44" value="Remove" class="btn btn-danger btn_remove"  onclick="hideline44()" style="display: none" ></td>	
							                                                          										 
							       </tr>
								   
                                 
                             </table><hr>
							 

							 
							 
							 
							 
							 
							   <label for="message">Loans acquired</label>
						   <table>
						   	  <tr><td><strong><br>Loan Amount<strong></td><td><strong><br>Bank name</strong></td><td><strong><br>Action</strong></td></tr>

							        <tr>  
                                        <td><input type="text" name="loan30" id="loan30" value="<?php echo $_SESSION['loan30'];?>" placeholder="Loan"/></td> 
                                        <td><input type="text" name="bank_name30" id="bank_name30" value="<?php echo $_SESSION['bank_name30'];?>" placeholder="Bank name "/></td> 
                                        
										<td><input type="button" name="active30" id="active30" class="btn btn-success" value="Add More" onclick="showline31()"></td>
										<td><input type="button" name="remove30" id="remove30" value="Remove" class="btn btn-danger btn_remove"  onclick="hideline30()"></td>	
							                                                          										 
							       </tr>
								   
								   <tr>  
                                        <td><input type="text" name="loan31" id="loan31" value="<?php echo $_SESSION['loan31'];?>" placeholder="Loan2" class="form-control name_list" style="display: none" /></td> 
                                        <td><input type="text" name="bank_name31" id="bank_name31" value="<?php echo $_SESSION['bank_name31'];?>" placeholder="Bank name" class="form-control name_list" style="display: none"/></td> 
                                        
										<td><input type="button" name="active31" id="active31" class="btn btn-success" value="Add More" onclick="showline32()" style="display: none"></td>
										<td><input type="button" name="remove31" id="remove31" value="Remove" class="btn btn-danger btn_remove"  onclick="hideline31()" style="display: none"></td>	
							                                                          										 
							       </tr>
								   
								   <tr>  
                                        <td><input type="text" name="loan32" id="loan32" value="<?php echo $_SESSION['loan32'];?>" placeholder="Loan3" class="form-control name_list" style="display: none" /></td> 
                                        <td><input type="text" name="bank_name32" id="bank_name32" value="<?php echo $_SESSION['bank_name32'];?>" placeholder="Bank name " class="form-control name_list" style="display: none"/></td> 
                                        
										<td><input type="button" name="active32" id="active32" class="btn btn-success" value="Add More" onclick="showline33()" style="display: none"></td>
										<td><input type="button" name="remove32" id="remove32" value="Remove" class="btn btn-danger btn_remove"  onclick="hideline32()" style="display: none"></td>	
							                                                          										 
							       </tr>
								   
								   <tr>  
                                        <td><input type="text" name="loan33" id="loan33" value="<?php echo $_SESSION['loan33'];?>" placeholder="Loan4" class="form-control name_list" style="display: none" /></td> 
                                        <td><input type="text" name="bank_name33" id="bank_name33" value="<?php echo $_SESSION['bank_name33'];?>" placeholder="Bank name " class="form-control name_list" style="display: none"/></td> 
                                        
										<td><input type="button" name="active33" id="active33" class="btn btn-success" value="Add More" onclick="showline34()" style="display: none"></td>
										<td><input type="button" name="remove33" id="remove33" value="Remove" class="btn btn-danger btn_remove"  onclick="hideline33()" style="display: none"></td>	
							                                                          										 
							       </tr>
								   
								   <tr>  
                                        <td><input type="text" name="loan34" id="loan34" value="<?php echo $_SESSION['loan34'];?>" placeholder="Loan5" class="form-control name_list" style="display: none" /></td> 
                                        <td><input type="text" name="bank_name34" id="bank_name34" value="<?php echo $_SESSION['bank_name34'];?>" placeholder="Bank name " class="form-control name_list" style="display: none"/></td> 
                                        
										<td><input type="button" name="remove34" id="remove34" value="Remove" class="btn btn-danger btn_remove"  onclick="hideline34()" style="display: none"></td>	
							                                                          										 
							       </tr>
								   
							  </table>	
                    													
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
													   
                    </div>
                    <button type="button" class="wizard-prev btn btn-primary">Previous</button>
                    <button type="button" class="wizard-next btn btn-primary">Next</button>
                </div>


					<div id="conduct" class="wizard-step" required>
                    <div class="form-group">
                        <label for="message">Other details</label>
              <table align="center">
			           <h3>Tracels abroad</h3>
						<tr><td>   </td><td><b>Travel Period&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp:&nbsp</b><input type="text" name="travel_period" id="travel_period" value="<?php echo $_SESSION['travel_period'];?>"/></td></tr>
						<tr><td>  </td><td><b>Travels Motivation:</b><input type="text" name="travels_motivation" id="travels_motivation" value="<?php echo $_SESSION['travels_motivation'];?>" /></td></tr>
						<tr><td>  </td><td><b>Foreign Acquaintances <br>and connection:</b><input type="text" name="f_acq_connections" id="f_acq_connections" value="<?php echo $_SESSION['f_acq_connections'];?>"/></td></tr>
   			  </table>
                    </div>
                    <button type="button" class="wizard-prev btn btn-primary">Previous</button>
                    <button type="button" class="wizard-next btn btn-primary">Next</button>
					
                </div>
				
				
				
                <div id="finish" class="wizard-step" align="center">
				 <legend>GENERAL ASSESSMENT/ OBSERVATION</legend>
          
                <h4>General remark</h4>
                    <p><textarea rows="3" cols="45" name="remarks" value="<?php echo $_SESSION['remarks'];?>"></textarea></p>
                
				<h4>Decision</h4>
				<table><tr><td>
				<select name="decision" id="decision">
				<option></option>
				<option>cleared</option>
				<option>Not cleared</option></select>
				<?php 
				if(isset($_POST['decision']))
					$_SESSION['decision']=$_POST['decision'];
				?></td> </tr></table><br><br>

				
                    <button type="submit" class="wizard-prev btn btn-primary">Previous</button>
                    <button name="submit" type="submit"  class="btn btn-danger" value="view">View</button>
                    <button type="submit" class="wizard-goto btn btn-primary" value="0">Go to first</button>
                </div>
            </div>
        </form>
    </div>

				
				
				
				

    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="dist/jquery.simplewizard.js"></script>
	
    <script>
        $(function () {
            $("#wizard1").simpleWizard({
                cssClassStepActive: "active",
                cssClassStepDone: "done",
                onFinish: function() {
                    alert("information has been saved")
                }
            });
        });
    </script>
	
	<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<script>
function showline1() {
   document.getElementById('relationship1').style.display = "block";
   document.getElementById('names1').style.display = "block";
   document.getElementById('place_of_birth1').style.display = "block";
   document.getElementById('date_of_birth1').style.display = "block";
   document.getElementById('occupation1').style.display = "block";
   document.getElementById('address1').style.display = "block";
   document.getElementById('history1').style.display = "block";
   document.getElementById('active1').style.display = "block";
   document.getElementById('remove1').style.display = "block";


}
function showline2() {
   document.getElementById('relationship2').style.display = "block";
   document.getElementById('names2').style.display = "block";
   document.getElementById('place_of_birth2').style.display = "block";
   document.getElementById('date_of_birth2').style.display = "block";
   document.getElementById('occupation2').style.display = "block";
   document.getElementById('address2').style.display = "block";
   document.getElementById('history2').style.display = "block";
   document.getElementById('active2').style.display = "block";
   document.getElementById('remove2').style.display = "block";


}
function showline3() {
   document.getElementById('relationship3').style.display = "block";
   document.getElementById('names3').style.display = "block";
   document.getElementById('place_of_birth3').style.display = "block";
   document.getElementById('date_of_birth3').style.display = "block";
   document.getElementById('occupation3').style.display = "block";
   document.getElementById('address3').style.display = "block";
   document.getElementById('history3').style.display = "block";
   document.getElementById('active3').style.display = "block";
   document.getElementById('remove3').style.display = "block";


}
function showline4() {
   document.getElementById('relationship4').style.display = "block";
   document.getElementById('names4').style.display = "block";
   document.getElementById('place_of_birth4').style.display = "block";
   document.getElementById('date_of_birth4').style.display = "block";
   document.getElementById('occupation4').style.display = "block";
   document.getElementById('address4').style.display = "block";
   document.getElementById('history4').style.display = "block";
   document.getElementById('active4').style.display = "block";
   document.getElementById('remove4').style.display = "block";


}
function showline5() {
   document.getElementById('relationship5').style.display = "block";
   document.getElementById('names5').style.display = "block";
   document.getElementById('place_of_birth5').style.display = "block";
   document.getElementById('date_of_birth5').style.display = "block";
   document.getElementById('occupation5').style.display = "block";
   document.getElementById('address5').style.display = "block";
   document.getElementById('history5').style.display = "block";
   document.getElementById('active5').style.display = "block";
   document.getElementById('remove5').style.display = "block";


}
function showline6() {
   document.getElementById('relationship6').style.display = "block";
   document.getElementById('names6').style.display = "block";
   document.getElementById('place_of_birth6').style.display = "block";
   document.getElementById('date_of_birth6').style.display = "block";
   document.getElementById('occupation6').style.display = "block";
   document.getElementById('address6').style.display = "block";
   document.getElementById('history6').style.display = "block";
   document.getElementById('active6').style.display = "block";
   document.getElementById('remove6').style.display = "block";


}
function showline7() {
   document.getElementById('relationship7').style.display = "block";
   document.getElementById('names7').style.display = "block";
   document.getElementById('place_of_birth7').style.display = "block";
   document.getElementById('date_of_birth7').style.display = "block";
   document.getElementById('occupation7').style.display = "block";
   document.getElementById('address7').style.display = "block";
   document.getElementById('history7').style.display = "block";
   document.getElementById('active7').style.display = "block";
   document.getElementById('remove7').style.display = "block";


}
function showline8() {
   document.getElementById('relationship8').style.display = "block";
   document.getElementById('names8').style.display = "block";
   document.getElementById('place_of_birth8').style.display = "block";
   document.getElementById('date_of_birth8').style.display = "block";
   document.getElementById('occupation8').style.display = "block";
   document.getElementById('address8').style.display = "block";
   document.getElementById('history8').style.display = "block";
   document.getElementById('active8').style.display = "block";
   document.getElementById('remove8').style.display = "block";


}
function hideline1() {
   document.getElementById('relationship1').style.display = "none";
   document.getElementById('names1').style.display = "none";
   document.getElementById('place_of_birth1').style.display = "none";
   document.getElementById('date_of_birth1').style.display = "none";
   document.getElementById('occupation1').style.display = "none";
   document.getElementById('address1').style.display = "none";
   document.getElementById('history1').style.display = "none";
   document.getElementById('active1').style.display = "none";
   document.getElementById('remove1').style.display = "none";
}
function hideline2() {
   document.getElementById('relationship2').style.display = "none";
   document.getElementById('names2').style.display = "none";
   document.getElementById('place_of_birth2').style.display = "none";
   document.getElementById('date_of_birth2').style.display = "none";
   document.getElementById('occupation2').style.display = "none";
   document.getElementById('address2').style.display = "none";
   document.getElementById('history2').style.display = "none";
   document.getElementById('active2').style.display = "none";
   document.getElementById('remove2').style.display = "none";
}
function hideline3() {
   document.getElementById('relationship3').style.display = "none";
   document.getElementById('names3').style.display = "none";
   document.getElementById('place_of_birth3').style.display = "none";
   document.getElementById('date_of_birth3').style.display = "none";
   document.getElementById('occupation3').style.display = "none";
   document.getElementById('address3').style.display = "none";
   document.getElementById('history3').style.display = "none";
   document.getElementById('active3').style.display = "none";
   document.getElementById('remove3').style.display = "none";
}
function hideline4() {
   document.getElementById('relationship4').style.display = "none";
   document.getElementById('names4').style.display = "none";
   document.getElementById('place_of_birth4').style.display = "none";
   document.getElementById('date_of_birth4').style.display = "none";
   document.getElementById('occupation4').style.display = "none";
   document.getElementById('address4').style.display = "none";
   document.getElementById('history4').style.display = "none";
   document.getElementById('active4').style.display = "none";
   document.getElementById('remove4').style.display = "none";
}
function hideline5() {
   document.getElementById('relationship5').style.display = "none";
   document.getElementById('names5').style.display = "none";
   document.getElementById('place_of_birth5').style.display = "none";
   document.getElementById('date_of_birth5').style.display = "none";
   document.getElementById('occupation5').style.display = "none";
   document.getElementById('address5').style.display = "none";
   document.getElementById('history5').style.display = "none";
   document.getElementById('active5').style.display = "none";
   document.getElementById('remove5').style.display = "none";
}
function hideline6() {
   document.getElementById('relationship6').style.display = "none";
   document.getElementById('names6').style.display = "none";
   document.getElementById('place_of_birth6').style.display = "none";
   document.getElementById('date_of_birth6').style.display = "none";
   document.getElementById('occupation6').style.display = "none";
   document.getElementById('address6').style.display = "none";
   document.getElementById('history6').style.display = "none";
   document.getElementById('active6').style.display = "none";
   document.getElementById('remove6').style.display = "none";
}
function hideline7() {
   document.getElementById('relationship7').style.display = "none";
   document.getElementById('names7').style.display = "none";
   document.getElementById('place_of_birth7').style.display = "none";
   document.getElementById('date_of_birth7').style.display = "none";
   document.getElementById('occupation7').style.display = "none";
   document.getElementById('address7').style.display = "none";
   document.getElementById('history7').style.display = "none";
   document.getElementById('active7').style.display = "none";
   document.getElementById('remove7').style.display = "none";
}
function hideline8() {
   document.getElementById('relationship8').style.display = "none";
   document.getElementById('names8').style.display = "none";
   document.getElementById('place_of_birth8').style.display = "none";
   document.getElementById('date_of_birth8').style.display = "none";
   document.getElementById('occupation8').style.display = "none";
   document.getElementById('address8').style.display = "none";
   document.getElementById('history8').style.display = "none";
   document.getElementById('active8').style.display = "none";
   document.getElementById('remove8').style.display = "none";
}
function hideline9() {
   document.getElementById('relationship9').style.display = "none";
   document.getElementById('names9').style.display = "none";
   document.getElementById('place_of_birth9').style.display = "none";
   document.getElementById('date_of_birth9').style.display = "none";
   document.getElementById('occupation9').style.display = "none";
   document.getElementById('address9').style.display = "none";
   document.getElementById('history9').style.display = "none";
   document.getElementById('active9').style.display = "none";
   document.getElementById('remove9').style.display = "none";
}
function hideline10() {
   document.getElementById('relationship10').style.display = "none";
   document.getElementById('names10').style.display = "none";
   document.getElementById('place_of_birth10').style.display = "none";
   document.getElementById('date_of_birth10').style.display = "none";
   document.getElementById('occupation10').style.display = "none";
   document.getElementById('address10').style.display = "none";
   document.getElementById('history10').style.display = "none";
   document.getElementById('active10').style.display = "none";
   document.getElementById('remove10').style.display = "none";
}
</script>


<script>
function displayline1() {
   document.getElementById('education1').style.display = "block";
   document.getElementById('name_of_school1').style.display = "block";
   document.getElementById('start_date1').style.display = "block";
   document.getElementById('end_date1').style.display = "block";
   document.getElementById('performance1').style.display = "block";
   document.getElementById('award1').style.display = "block";
   document.getElementById('responsabilty1').style.display = "block";
   document.getElementById('display1').style.display = "block";
   document.getElementById('hide1').style.display = "block";
}

function displayline2() {
   document.getElementById('education2').style.display = "block";
   document.getElementById('name_of_school2').style.display = "block";
   document.getElementById('start_date2').style.display = "block";
   document.getElementById('end_date2').style.display = "block";
   document.getElementById('performance2').style.display = "block";
   document.getElementById('award2').style.display = "block";
   document.getElementById('responsabilty2').style.display = "block";
   document.getElementById('display2').style.display = "block";
   document.getElementById('hide2').style.display = "block";


}
function displayline3() {
   document.getElementById('education3').style.display = "block";
   document.getElementById('name_of_school3').style.display = "block";
   document.getElementById('start_date3').style.display = "block";
   document.getElementById('end_date3').style.display = "block";
   document.getElementById('performance3').style.display = "block";
   document.getElementById('award3').style.display = "block";
   document.getElementById('responsabilty3').style.display = "block";
   document.getElementById('display3').style.display = "block";
   document.getElementById('hide3').style.display = "block";


}
function displayline4() {
   document.getElementById('education4').style.display = "block";
   document.getElementById('name_of_school4').style.display = "block";
   document.getElementById('start_date4').style.display = "block";
   document.getElementById('end_date4').style.display = "block";
   document.getElementById('performance4').style.display = "block";
   document.getElementById('award4').style.display = "block";
   document.getElementById('responsabilty4').style.display = "block";
   document.getElementById('display4').style.display = "block";
   document.getElementById('hide4').style.display = "block";


}
function displayline5() {
   document.getElementById('education5').style.display = "block";
   document.getElementById('name_of_school5').style.display = "block";
   document.getElementById('start_date5').style.display = "block";
   document.getElementById('end_date5').style.display = "block";
   document.getElementById('performance5').style.display = "block";
   document.getElementById('award5').style.display = "block";
   document.getElementById('responsabilty5').style.display = "block";
   document.getElementById('display5').style.display = "block";
   document.getElementById('hide5').style.display = "block";


}
function hidline1() {
   document.getElementById('education1').style.display = "none";
   document.getElementById('name_of_school1').style.display = "none";
   document.getElementById('start_date1').style.display = "none";
   document.getElementById('end_date1').style.display = "none";
   document.getElementById('performance1').style.display = "none";
   document.getElementById('award1').style.display = "none";
   document.getElementById('responsabilty1').style.display = "none";
   document.getElementById('display1').style.display = "none";
   document.getElementById('hide1').style.display = "none";
}
function hidline2() {
   document.getElementById('education2').style.display = "none";
   document.getElementById('name_of_school2').style.display = "none";
   document.getElementById('start_date2').style.display = "none";
   document.getElementById('end_date2').style.display = "none";
   document.getElementById('performance2').style.display = "none";
   document.getElementById('award2').style.display = "none";
   document.getElementById('responsabilty2').style.display = "none";
   document.getElementById('display2').style.display = "none";
   document.getElementById('hide2').style.display = "none";
}
function hidline3() {
   document.getElementById('education3').style.display = "none";
   document.getElementById('name_of_school3').style.display = "none";
   document.getElementById('start_date3').style.display = "none";
   document.getElementById('end_date3').style.display = "none";
   document.getElementById('performance3').style.display = "none";
   document.getElementById('award3').style.display = "none";
   document.getElementById('responsabilty3').style.display = "none";
   document.getElementById('display3').style.display = "none";
   document.getElementById('hide3').style.display = "none";
}
function hidline4() {
   document.getElementById('education4').style.display = "none";
   document.getElementById('name_of_school4').style.display = "none";
   document.getElementById('start_date4').style.display = "none";
   document.getElementById('end_date4').style.display = "none";
   document.getElementById('performance4').style.display = "none";
   document.getElementById('award4').style.display = "none";
   document.getElementById('responsabilty4').style.display = "none";
   document.getElementById('display4').style.display = "none";
   document.getElementById('hide4').style.display = "none";
}
function hidline5() {
   document.getElementById('education5').style.display = "none";
   document.getElementById('name_of_school5').style.display = "none";
   document.getElementById('start_date5').style.display = "none";
   document.getElementById('end_date5').style.display = "none";
   document.getElementById('performance5').style.display = "none";
   document.getElementById('award5').style.display = "none";
   document.getElementById('responsabilty5').style.display = "none";
   document.getElementById('display5').style.display = "none";
   document.getElementById('hide5').style.display = "none";
}
</script>
<script>
function showline11() {
   document.getElementById('emplayer11').style.display = "block";
   document.getElementById('Startingdate11').style.display = "block";
   document.getElementById('Endingdate11').style.display = "block";
   document.getElementById('position11').style.display = "block";
   document.getElementById('conduct11').style.display = "block";
   document.getElementById('competence11').style.display = "block";
   document.getElementById('weakness11').style.display = "block";
   document.getElementById('motivation11').style.display = "block";
   document.getElementById('active11').style.display = "block";
   document.getElementById('remove11').style.display = "block";


}
function showline12() {
   document.getElementById('emplayer12').style.display = "block";
   document.getElementById('Startingdate12').style.display = "block";
   document.getElementById('Endingdate12').style.display = "block";
   document.getElementById('position12').style.display = "block";
   document.getElementById('conduct12').style.display = "block";
   document.getElementById('competence12').style.display = "block";
   document.getElementById('weakness12').style.display = "block";
   document.getElementById('motivation12').style.display = "block";
   document.getElementById('active12').style.display = "block";
   document.getElementById('remove12').style.display = "block";


}
function showline13() {
   document.getElementById('emplayer13').style.display = "block";
   document.getElementById('Startingdate13').style.display = "block";
   document.getElementById('Endingdate13').style.display = "block";
   document.getElementById('position13').style.display = "block";
   document.getElementById('conduct13').style.display = "block";
   document.getElementById('competence13').style.display = "block";
   document.getElementById('weakness13').style.display = "block";
   document.getElementById('motivation13').style.display = "block";
   document.getElementById('active13').style.display = "block";
   document.getElementById('remove13').style.display = "block";


}
function showline14() {
   document.getElementById('emplayer14').style.display = "block";
   document.getElementById('Startingdate14').style.display = "block";
   document.getElementById('Endingdate14').style.display = "block";
   document.getElementById('position14').style.display = "block";
   document.getElementById('conduct14').style.display = "block";
   document.getElementById('competence14').style.display = "block";
   document.getElementById('weakness14').style.display = "block";
   document.getElementById('motivation14').style.display = "block";
   document.getElementById('active14').style.display = "block";
   document.getElementById('remove14').style.display = "block";


}
function showline15() {
   document.getElementById('emplayer15').style.display = "block";
   document.getElementById('Startingdate15').style.display = "block";
   document.getElementById('Endingdate15').style.display = "block";
   document.getElementById('position15').style.display = "block";
   document.getElementById('conduct15').style.display = "block";
   document.getElementById('competence15').style.display = "block";
   document.getElementById('weakness15').style.display = "block";
   document.getElementById('motivation15').style.display = "block";
   document.getElementById('active15').style.display = "block";
   document.getElementById('remove15').style.display = "block";


}
function showline16() {
   document.getElementById('emplayer16').style.display = "block";
   document.getElementById('Startingdate16').style.display = "block";
   document.getElementById('Endingdate16').style.display = "block";
   document.getElementById('position16').style.display = "block";
   document.getElementById('conduct16').style.display = "block";
   document.getElementById('competence16').style.display = "block";
   document.getElementById('weakness16').style.display = "block";
   document.getElementById('motivation16').style.display = "block";
   document.getElementById('active16').style.display = "block";
   document.getElementById('remove16').style.display = "block";


}
function showline17() {
   document.getElementById('emplayer17').style.display = "block";
   document.getElementById('Startingdate17').style.display = "block";
   document.getElementById('Endingdate17').style.display = "block";
   document.getElementById('position17').style.display = "block";
   document.getElementById('conduct17').style.display = "block";
   document.getElementById('competence17').style.display = "block";
   document.getElementById('weakness17').style.display = "block";
   document.getElementById('motivation17').style.display = "block";
   document.getElementById('active17').style.display = "block";
   document.getElementById('remove17').style.display = "block";


}
function showline18() {
   document.getElementById('emplayer18').style.display = "block";
   document.getElementById('Startingdate18').style.display = "block";
   document.getElementById('Endingdate18').style.display = "block";
   document.getElementById('position18').style.display = "block";
   document.getElementById('conduct18').style.display = "block";
   document.getElementById('competence18').style.display = "block";
   document.getElementById('weakness18').style.display = "block";
   document.getElementById('motivation18').style.display = "block";
   document.getElementById('active18').style.display = "block";
   document.getElementById('remove18').style.display = "block";


}
function showline19() {
   document.getElementById('emplayer19').style.display = "block";
   document.getElementById('Startingdate19').style.display = "block";
   document.getElementById('Endingdate19').style.display = "block";
   document.getElementById('position19').style.display = "block";
   document.getElementById('conduct19').style.display = "block";
   document.getElementById('competence19').style.display = "block";
   document.getElementById('weakness19').style.display = "block";
   document.getElementById('motivation19').style.display = "block";
   document.getElementById('remove19').style.display = "block";


}

function hideline11() {
   document.getElementById('emplayer11').style.display = "none";
      document.getElementById('emplayer11').value="";
   document.getElementById('Startingdate11').style.display = "none";
      document.getElementById('Startingdate11').value="";
   document.getElementById('Endingdate11').style.display = "none";
      document.getElementById('Endingdate11').value="";
   document.getElementById('position11').style.display = "none";
      document.getElementById('position11').value="";
   document.getElementById('conduct11').style.display = "none";
      document.getElementById('conduct11').value="";
   document.getElementById('competence11').style.display = "none";
      document.getElementById('competence11').value="";
   document.getElementById('weakness11').style.display = "none";
      document.getElementById('weakness11').value="";
   document.getElementById('motivation11').style.display = "none";
      document.getElementById('motivation11').value="";
   document.getElementById('active11').style.display = "none";
   document.getElementById('remove11').style.display = "none";
}
function hideline12() {
    document.getElementById('emplayer12').style.display = "none";
      document.getElementById('emplayer12').value="";
   document.getElementById('Startingdate12').style.display = "none";
      document.getElementById('Startingdate12').value="";
   document.getElementById('Endingdate12').style.display = "none";
      document.getElementById('Endingdate12').value="";
   document.getElementById('position12').style.display = "none";
      document.getElementById('position12').value="";
   document.getElementById('conduct12').style.display = "none";
      document.getElementById('conduct12').value="";
   document.getElementById('competence12').style.display = "none";
      document.getElementById('competence12').value="";
   document.getElementById('weakness12').style.display = "none";
      document.getElementById('weakness12').value="";
   document.getElementById('motivation12').style.display = "none";
      document.getElementById('motivation12').value="";
   document.getElementById('active12').style.display = "none";
   document.getElementById('remove12').style.display = "none";
}
function hideline13() {
  document.getElementById('emplayer13').style.display = "none";
      document.getElementById('emplayer13').value="";
   document.getElementById('Startingdate13').style.display = "none";
      document.getElementById('Startingdate13').value="";
   document.getElementById('Endingdate13').style.display = "none";
      document.getElementById('Endingdate13').value="";
   document.getElementById('position13').style.display = "none";
      document.getElementById('position13').value="";
   document.getElementById('conduct13').style.display = "none";
      document.getElementById('conduct13').value="";
   document.getElementById('competence13').style.display = "none";
      document.getElementById('competence13').value="";
   document.getElementById('weakness13').style.display = "none";
      document.getElementById('weakness13').value="";
   document.getElementById('motivation13').style.display = "none";
      document.getElementById('motivation13').value="";
   document.getElementById('active13').style.display = "none";
   document.getElementById('remove13').style.display = "none";
}
function hideline14() {
   document.getElementById('emplayer14').style.display = "none";
      document.getElementById('emplayer14').value="";
   document.getElementById('Startingdate14').style.display = "none";
      document.getElementById('Startingdate14').value="";
   document.getElementById('Endingdate14').style.display = "none";
      document.getElementById('Endingdate14').value="";
   document.getElementById('position14').style.display = "none";
      document.getElementById('position14').value="";
   document.getElementById('conduct14').style.display = "none";
      document.getElementById('conduct14').value="";
   document.getElementById('competence14').style.display = "none";
      document.getElementById('competence14').value="";
   document.getElementById('weakness14').style.display = "none";
      document.getElementById('weakness14').value="";
   document.getElementById('motivation14').style.display = "none";
      document.getElementById('motivation14').value="";
   document.getElementById('active14').style.display = "none";
   document.getElementById('remove14').style.display = "none";
}
function hideline15() {
   document.getElementById('emplayer15').style.display = "none";
      document.getElementById('emplayer15').value="";
   document.getElementById('Startingdate15').style.display = "none";
      document.getElementById('Startingdate15').value="";
   document.getElementById('Endingdate15').style.display = "none";
      document.getElementById('Endingdate15').value="";
   document.getElementById('position15').style.display = "none";
      document.getElementById('position15').value="";
   document.getElementById('conduct15').style.display = "none";
      document.getElementById('conduct15').value="";
   document.getElementById('competence15').style.display = "none";
      document.getElementById('competence15').value="";
   document.getElementById('weakness15').style.display = "none";
      document.getElementById('weakness15').value="";
   document.getElementById('motivation15').style.display = "none";
      document.getElementById('motivation15').value="";
   document.getElementById('active15').style.display = "none";
   document.getElementById('remove15').style.display = "none";
}
function hideline16() {
   document.getElementById('emplayer16').style.display = "none";
      document.getElementById('emplayer16').value="";
   document.getElementById('Startingdate16').style.display = "none";
      document.getElementById('Startingdate16').value="";
   document.getElementById('Endingdate16').style.display = "none";
      document.getElementById('Endingdate16').value="";
   document.getElementById('position16').style.display = "none";
      document.getElementById('position16').value="";
   document.getElementById('conduct16').style.display = "none";
      document.getElementById('conduct16').value="";
   document.getElementById('competence16').style.display = "none";
      document.getElementById('competence16').value="";
   document.getElementById('weakness16').style.display = "none";
      document.getElementById('weakness16').value="";
   document.getElementById('motivation16').style.display = "none";
      document.getElementById('motivation16').value="";
   document.getElementById('active16').style.display = "none";
   document.getElementById('remove16').style.display = "none";
}
function hideline17() {
   document.getElementById('emplayer17').style.display = "none";
      document.getElementById('emplayer17').value="";
   document.getElementById('Startingdate17').style.display = "none";
      document.getElementById('Startingdate17').value="";
   document.getElementById('Endingdate17').style.display = "none";
      document.getElementById('Endingdate17').value="";
   document.getElementById('position17').style.display = "none";
      document.getElementById('position17').value="";
   document.getElementById('conduct17').style.display = "none";
      document.getElementById('conduct17').value="";
   document.getElementById('competence17').style.display = "none";
      document.getElementById('competence17').value="";
   document.getElementById('weakness17').style.display = "none";
      document.getElementById('weakness17').value="";
   document.getElementById('motivation17').style.display = "none";
      document.getElementById('motivation17').value="";
   document.getElementById('active17').style.display = "none";
   document.getElementById('remove17').style.display = "none";
}
function hideline18() {
   document.getElementById('emplayer18').style.display = "none";
      document.getElementById('emplayer18').value="";
   document.getElementById('Startingdate18').style.display = "none";
      document.getElementById('Startingdate18').value="";
   document.getElementById('Endingdate18').style.display = "none";
      document.getElementById('Endingdate18').value="";
   document.getElementById('position18').style.display = "none";
      document.getElementById('position18').value="";
   document.getElementById('conduct18').style.display = "none";
      document.getElementById('conduct18').value="";
   document.getElementById('competence18').style.display = "none";
      document.getElementById('competence18').value="";
   document.getElementById('weakness18').style.display = "none";
      document.getElementById('weakness18').value="";
   document.getElementById('motivation18').style.display = "none";
      document.getElementById('motivation18').value="";
   document.getElementById('active18').style.display = "none";
   document.getElementById('remove18').style.display = "none";
}
function hideline19() {
   document.getElementById('emplayer19').style.display = "none";
      document.getElementById('emplayer19').value="";
   document.getElementById('Startingdate19').style.display = "none";
      document.getElementById('Startingdate19').value="";
   document.getElementById('Endingdate19').style.display = "none";
      document.getElementById('Endingdate19').value="";
   document.getElementById('position19').style.display = "none";
      document.getElementById('position19').value="";
   document.getElementById('conduct19').style.display = "none";
      document.getElementById('conduct19').value="";
   document.getElementById('competence19').style.display = "none";
      document.getElementById('competence19').value="";
   document.getElementById('weakness19').style.display = "none";
      document.getElementById('weakness19').value="";
   document.getElementById('motivation19').style.display = "none";
      document.getElementById('motivation19').value="";
     document.getElementById('remove19').style.display = "none";
}
</script>
<script>
function showline20() {
   document.getElementById('Charges20').style.display = "block";
   document.getElementById('Starting20').style.display = "block";
   document.getElementById('Ending20').style.display = "block";
   document.getElementById('penality20').style.display = "block";
   document.getElementById('active20').style.display = "block";
   document.getElementById('remove20').style.display = "block";
}
function showline21() {
   document.getElementById('Charges21').style.display = "block";
   document.getElementById('Starting21').style.display = "block";
   document.getElementById('Ending21').style.display = "block";
   document.getElementById('penality21').style.display = "block";
   document.getElementById('active21').style.display = "block";
   document.getElementById('remove21').style.display = "block";
}
function showline22() {
   document.getElementById('Charges22').style.display = "block";
   document.getElementById('Starting22').style.display = "block";
   document.getElementById('Ending22').style.display = "block";
   document.getElementById('penality22').style.display = "block";
   document.getElementById('active22').style.display = "block";
   document.getElementById('remove22').style.display = "block";
}
function showline23() {
   document.getElementById('Charges23').style.display = "block";
   document.getElementById('Starting23').style.display = "block";
   document.getElementById('Ending23').style.display = "block";
   document.getElementById('penality23').style.display = "block";
   document.getElementById('active23').style.display = "block";
   document.getElementById('remove23').style.display = "block";
}
function showline24() {
   document.getElementById('Charges24').style.display = "block";
   document.getElementById('Starting24').style.display = "block";
   document.getElementById('Ending24').style.display = "block";
   document.getElementById('penality24').style.display = "block";
   document.getElementById('active24').style.display = "block";
   document.getElementById('remove24').style.display = "block";
}
function showline25() {
   document.getElementById('Charges25').style.display = "block";
   document.getElementById('Starting25').style.display = "block";
   document.getElementById('Ending25').style.display = "block";
   document.getElementById('penality25').style.display = "block";
   document.getElementById('active25').style.display = "block";
   document.getElementById('remove25').style.display = "block";
}
function showline26() {
   document.getElementById('Charges26').style.display = "block";
   document.getElementById('Starting26').style.display = "block";
   document.getElementById('Ending26').style.display = "block";
   document.getElementById('penality26').style.display = "block";
   document.getElementById('active26').style.display = "block";
   document.getElementById('remove26').style.display = "block";
}
function showline27() {
   document.getElementById('Charges27').style.display = "block";
   document.getElementById('Starting27').style.display = "block";
   document.getElementById('Ending27').style.display = "block";
   document.getElementById('penality27').style.display = "block";
   document.getElementById('active27').style.display = "block";
   document.getElementById('remove27').style.display = "block";
}
function showline28() {
   document.getElementById('Charges28').style.display = "block";
   document.getElementById('Starting28').style.display = "block";
   document.getElementById('Ending28').style.display = "block";
   document.getElementById('penality28').style.display = "block";
   document.getElementById('remove28').style.display = "block";
}



function hideline20() {
   document.getElementById('Charges20').style.display = "none";
      document.getElementById('Charges20').value="";
   document.getElementById('Starting20').style.display = "none";
      document.getElementById('Starting20').value="";
   document.getElementById('Ending20').style.display = "none";
      document.getElementById('Ending20').value="";
   document.getElementById('penality20').style.display = "none";
      document.getElementById('penality20').value="";
   document.getElementById('active20').style.display = "none";
   document.getElementById('remove20').style.display = "none";
}
function hideline21() {
   document.getElementById('Charges21').style.display = "none";
      document.getElementById('Charges21').value="";
   document.getElementById('Starting21').style.display = "none";
      document.getElementById('Starting21').value="";
   document.getElementById('Ending21').style.display = "none";
      document.getElementById('Ending21').value="";
   document.getElementById('penality21').style.display = "none";
      document.getElementById('penality21').value="";
   document.getElementById('active21').style.display = "none";
   document.getElementById('remove21').style.display = "none";
}
function hideline22() {
   document.getElementById('Charges22').style.display = "none";
      document.getElementById('Charges22').value="";
   document.getElementById('Starting22').style.display = "none";
      document.getElementById('Starting22').value="";
   document.getElementById('Ending22').style.display = "none";
      document.getElementById('Ending22').value="";
   document.getElementById('penality22').style.display = "none";
      document.getElementById('penality22').value="";
   document.getElementById('active22').style.display = "none";
   document.getElementById('remove22').style.display = "none";
}
function hideline23() {
   document.getElementById('Charges23').style.display = "none";
      document.getElementById('Charges23').value="";
   document.getElementById('Starting23').style.display = "none";
      document.getElementById('Starting23').value="";
   document.getElementById('Ending23').style.display = "none";
      document.getElementById('Ending23').value="";
   document.getElementById('penality23').style.display = "none";
      document.getElementById('penality23').value="";
   document.getElementById('active23').style.display = "none";
   document.getElementById('remove23').style.display = "none";
}
function hideline24() {
   document.getElementById('Charges24').style.display = "none";
      document.getElementById('Charges24').value="";
   document.getElementById('Starting24').style.display = "none";
      document.getElementById('Starting24').value="";
   document.getElementById('Ending24').style.display = "none";
      document.getElementById('Ending24').value="";
   document.getElementById('penality24').style.display = "none";
      document.getElementById('penality24').value="";
   document.getElementById('active24').style.display = "none";
   document.getElementById('remove24').style.display = "none";
}
function hideline25() {
   document.getElementById('Charges25').style.display = "none";
      document.getElementById('Charges25').value="";
   document.getElementById('Starting25').style.display = "none";
      document.getElementById('Starting25').value="";
   document.getElementById('Ending25').style.display = "none";
      document.getElementById('Ending25').value="";
   document.getElementById('penality25').style.display = "none";
      document.getElementById('penality25').value="";
   document.getElementById('active25').style.display = "none";
   document.getElementById('remove25').style.display = "none";
}
function hideline26() {
   document.getElementById('Charges26').style.display = "none";
      document.getElementById('Charges26').value="";
   document.getElementById('Starting26').style.display = "none";
      document.getElementById('Starting26').value="";
   document.getElementById('Ending26').style.display = "none";
      document.getElementById('Ending26').value="";
   document.getElementById('penality26').style.display = "none";
      document.getElementById('penality26').value="";
   document.getElementById('active26').style.display = "none";
   document.getElementById('remove26').style.display = "none";
}
function hideline27() {
   document.getElementById('Charges27').style.display = "none";
      document.getElementById('Charges27').value="";
   document.getElementById('Starting27').style.display = "none";
      document.getElementById('Starting27').value="";
   document.getElementById('Ending27').style.display = "none";
      document.getElementById('Ending27').value="";
   document.getElementById('penality27').style.display = "none";
      document.getElementById('penality27').value="";
   document.getElementById('active27').style.display = "none";
   document.getElementById('remove27').style.display = "none";
}
function hideline28() {
   document.getElementById('Charges28').style.display = "none";
      document.getElementById('Charges28').value="";
   document.getElementById('Starting28').style.display = "none";
      document.getElementById('Starting28').value="";
   document.getElementById('Ending28').style.display = "none";
      document.getElementById('Ending28').value="";
   document.getElementById('penality28').style.display = "none";
      document.getElementById('penality28').value="";
    document.getElementById('remove28').style.display = "none";
}
 
</script>
<script>
function showline40() {
   document.getElementById('type_of_ass40').style.display = "block";
   document.getElementById('assets40').style.display = "block";
   document.getElementById('sharing_status40').style.display = "block";
   document.getElementById('location40').style.display = "block";
   document.getElementById('active40').style.display = "block";
   document.getElementById('remove40').style.display = "block";
}
function showline41() {
   document.getElementById('type_of_ass41').style.display = "block";
   document.getElementById('assets41').style.display = "block";
   document.getElementById('sharing_status41').style.display = "block";
   document.getElementById('location41').style.display = "block";
   document.getElementById('active41').style.display = "block";
   document.getElementById('remove41').style.display = "block";
}
function showline42() {
   document.getElementById('type_of_ass42').style.display = "block";
   document.getElementById('assets42').style.display = "block";
   document.getElementById('sharing_status42').style.display = "block";
   document.getElementById('location42').style.display = "block";
   document.getElementById('active42').style.display = "block";
   document.getElementById('remove42').style.display = "block";
}
function showline43() {
   document.getElementById('type_of_ass43').style.display = "block";
   document.getElementById('assets43').style.display = "block";
   document.getElementById('sharing_status43').style.display = "block";
   document.getElementById('location43').style.display = "block";
   document.getElementById('active43').style.display = "block";
   document.getElementById('remove43').style.display = "block";
}
function showline44() {
   document.getElementById('type_of_ass44').style.display = "block";
   document.getElementById('assets44').style.display = "block";
   document.getElementById('sharing_status44').style.display = "block";
   document.getElementById('location44').style.display = "block";
   document.getElementById('remove44').style.display = "block";
}


function hideline40() {
     document.getElementById('type_of_ass40').value="";
     document.getElementById('assets40').value="";
	 document.getElementById('sharing_status40').value="";
	 document.getElementById('location40').value="";
    document.getElementById('remove').style.display = "none";
}
function hideline41() {
   document.getElementById('type_of_ass41').style.display = "none";
     document.getElementById('type_of_ass41').value="";
   document.getElementById('assets41').style.display = "none";
     document.getElementById('assets41').value="";
   document.getElementById('sharing_status41').style.display = "none";
     document.getElementById('sharing_status41').value="";
   document.getElementById('location41').style.display = "none";
     document.getElementById('location41').value="";
   document.getElementById('active41').style.display = "none";
   document.getElementById('remove41').style.display = "none";
}
function hideline42() {
   document.getElementById('type_of_ass42').style.display = "none";
     document.getElementById('type_of_ass42').value="";
   document.getElementById('assets42').style.display = "none";
     document.getElementById('assets42').value="";
   document.getElementById('sharing_status42').style.display = "none";
     document.getElementById('sharing_status42').value="";
   document.getElementById('location42').style.display = "none";
     document.getElementById('location42').value="";
   document.getElementById('active42').style.display = "none";
   document.getElementById('remove42').style.display = "none";
}
function hideline43() {
   document.getElementById('type_of_ass43').style.display = "none";
     document.getElementById('type_of_ass43').value="";
   document.getElementById('assets43').style.display = "none";
     document.getElementById('assets43').value="";
   document.getElementById('sharing_status43').style.display = "none";
     document.getElementById('sharing_status43').value="";
   document.getElementById('location43').style.display = "none";
     document.getElementById('location43').value="";
   document.getElementById('active43').style.display = "none";
   document.getElementById('remove43').style.display = "none";
}
function hideline44() {
   document.getElementById('type_of_ass44').style.display = "none";
     document.getElementById('type_of_ass44').value="";
   document.getElementById('assets44').style.display = "none";
     document.getElementById('assets44').value="";
   document.getElementById('sharing_status44').style.display = "none";
     document.getElementById('sharing_status44').value="";
   document.getElementById('location44').style.display = "none";
     document.getElementById('location44').value="";
   document.getElementById('remove44').style.display = "none";
}
</script>
<script>
function showline30() {
   document.getElementById('loan30').style.display = "block";
   document.getElementById('bank_name30').style.display = "block";
   document.getElementById('active30').style.display = "block";
   document.getElementById('remove30').style.display = "block";
}
function showline31() {
   document.getElementById('loan31').style.display = "block";
   document.getElementById('bank_name31').style.display = "block";
   document.getElementById('active31').style.display = "block";
   document.getElementById('remove31').style.display = "block";
}
function showline32() {
   document.getElementById('loan32').style.display = "block";
   document.getElementById('bank_name32').style.display = "block";
   document.getElementById('active32').style.display = "block";
   document.getElementById('remove32').style.display = "block";
}
function showline33() {
   document.getElementById('loan33').style.display = "block";
   document.getElementById('bank_name33').style.display = "block";
   document.getElementById('active33').style.display = "block";
   document.getElementById('remove33').style.display = "block";
}
function showline34() {
   document.getElementById('loan34').style.display = "block";
   document.getElementById('bank_name34').style.display = "block";
   document.getElementById('remove34').style.display = "block";
}


function hideline30() {
     document.getElementById('loan30').value="";
     document.getElementById('bank_name30').value="";
     document.getElementById('remove30').style.display = "none";
}
function hideline31() {
   document.getElementById('loan31').style.display = "none";
     document.getElementById('loan31').value="";
   document.getElementById('bank_name31').style.display = "none";
     document.getElementById('bank_name31').value="";
   document.getElementById('active31').style.display = "none";
   document.getElementById('remove31').style.display = "none";
}
function hideline32() {
   document.getElementById('loan32').style.display = "none";
     document.getElementById('loan32').value="";
   document.getElementById('bank_name32').style.display = "none";
     document.getElementById('bank_name32').value="";
   document.getElementById('active32').style.display = "none";
   document.getElementById('remove32').style.display = "none";
}
function hideline33() {
   document.getElementById('loan33').style.display = "none";
     document.getElementById('loan33').value="";
   document.getElementById('bank_name33').style.display = "none";
     document.getElementById('bank_name33').value="";
   document.getElementById('active33').style.display = "none";
   document.getElementById('remove33').style.display = "none";
}
function hideline34() {
   document.getElementById('loan34').style.display = "none";
     document.getElementById('loan34').value="";
   document.getElementById('bank_name34').style.display = "none";
     document.getElementById('bank_name34').value="";
   document.getElementById('remove34').style.display = "none";
}

</script>
</body>
<?php } ?>
</html>

 



 

