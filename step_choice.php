<?php
session_start();
error_reporting(0);
include'mydb_connection/my_dbconnection.php';
$uname = $_SESSION['uname'];
$userid = $_SESSION['userid'];
if(!$userid){
	header('location:logout');
}
$check= "select * from users_table WHERE 	id = '$userid'";
$resultcheck = $conn_db->query($check);
if ($resultcheck->num_rows > 0) {
while($rowval = $resultcheck->fetch_assoc()) {
$_SESSION['telephone'] = $rowval['telephone'];
$_SESSION['role'] = $rowval['role'];
$_SESSION['lname'] = $rowval['lname'];
$_SESSION['fname'] = $rowval['First_Nmae'];
$email = $rowval['email'];	
$fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];	
$role = $_SESSION['role'];
}
}
$newACCOUNTNUMBER  = $_POST['country_id'];?>
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
<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <!-- Required meta tags -->
  
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Loan Review</title>
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
	
 
   <link href="css/jquery-ui1.css" rel="stylesheet" type="text/css"/>  
   <script src="js/jquery.min1.js"></script>  
   <script src="js/jquery-ui.min1.js"></script> 

   <script type="text/javascript">
       $(function() {
               $("#datesearch").datepicker({ dateFormat: "yy-mm-dd" }).val()
               $("#datesearch1").datepicker({ dateFormat: "yy-mm-dd" }).val()
       });

   </script>
   </head>


<script src="js/jquery-ui.js"></script>
</head>

<?php include'left_commercial.php';?>

				
						<!-- /.ace-settings-container -->

						<!-- /.page-header -->

							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="row">
									<div class="col-xs-12">

			
						<div class="wrap-contact100" style="margin-left:auto;margin-right:auto;">
							<form style="margin-left:100px;width:90%" method="POST" action="step_one">

				<input type="text" name ="accontnumber" value="<?php echo $newACCOUNTNUMBER;?>" style="display:none" required>
				

				<div class="wrap-input100 validate-input" data-validate="Name is required">
					<span class="label-input100"><strong>BRANCH *</strong></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<select  name="branch"  style="border-color:black" Required>
							<option value="">SELECT BRANCH</option>
							<option value= "NYARUGENGE" >NYARUGENGE</option>
							<option value= "RWAMAGANA" >RWAMAGANA</option>
							<option value= "MUSANZE" >MUSANZE</option>
							<option value= "MUHANGA" >MUHANGA</option>
							<option value= "HUYE" >HUYE</option>
							<option value= "GICUMBI" >GICUMBI</option>
							<option value= "BUGESERA" >BUGESERA</option>
							<option value= "RULINDO" >RULINDO</option>
						</select>
				</div>
				<div class="wrap-input100 validate-input" data-validate="Name is required">
					<span class="label-input100"><strong>LOAN AMOUNT *</strong></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input  type="text" size = "25" style="border: 1px solid #555;" name="loanamount"  id="firstNumber" onkeyup="format(this)" placeholder="Loan Amount" style="border-color:black" Required>

				</div>
				
				<div class="wrap-input100 validate-input" data-validate="Name is required">
					<span class="label-input100"><strong>LOAN TYPE *</strong></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<select class="js-select2" name="loantype"  style="border-color:black"  Required>
							<option value="">SELECT LOAN TYPE</option>
							<option value= "Advance Salary" >Advance Salary</option>
							<option value= "Commercial Loan" >Commerical Loan</option>
							<option value= "Investment Group" >Investment Group Loan/ Cooperatives</option>
						</select>
				</div>

				<div class="wrap-input100 validate-input" data-validate="Name is required">
					<span class="label-input100"><strong>LOAN TERM *</strong></span><br>
					<input type="radio"  class="cb" name ="checkradio" value="years" required  onclick="var inputyear = document.getElementById('years');var inputmonth = document.getElementById('months');var inputweek = document.getElementById('weeks'); if(this.checked){ inputyear.disabled = false;inputmonth.disabled=true; inputweek.disabled=true;mycheckweek.checked=false; inputyear.focus();}else{inputyear.disabled=true;}" /><strong> Years&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong><input type="number" id="years" name="years" style="width:80px; ;height:30px" disabled="disabled" required/><br><br>
					<input type="radio"  class="cb" name ="checkradio" value="Months" required onclick="var inputmonth = document.getElementById('months'); var inputyear1 = document.getElementById('years');var inputweek1 = document.getElementById('weeks');if(this.checked){ inputmonth.disabled = false;inputyear1.disabled = true; inputweek1.disabled=true; inputmonth.focus();}else{input.disabled=true;}" /><strong> Months&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong><input id="months" type="number"  name="months"  style="width:80px; ;height:30px" disabled="disabled" required/><br><br>
					<input type="radio"  class="cb" name ="checkradio" value="Weeks" required onclick="var inputweek = document.getElementById('weeks');var inputmonth11 = document.getElementById('months');var inputyear11 = document.getElementById('years'); if(this.checked){ inputyear11.disabled = true;inputmonth11.disabled=true;inputweek.disabled = false; inputweek.focus();}else{inputweek.disabled=true;}" /><strong> Weeks&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong><input id="weeks" type="number"  name="weeks" style="width:80px; ;height:30px" disabled="disabled"  required/><br><br>
							</div>
				<div class="wrap-input100 validate-input" data-validate="Name is required">
					<span class="label-input100"><strong>Customer For *</strong></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<select class="js-select2" name="duration"  style="border-color:black"  Required>
							<option value=""></option>
							<option value= "new" > - 1 Year</option>
							<option value= "old" >1 - 5 Years</option>
							<option value= "elder" > +5 Years</option>
						</select>
				</div>


				
					<input type="submit" name="fill" value="Start" id="bigbutton"/>
<br><br>								</form>
		
         </div>
          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4><strong>Types of Loans&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript: void(0)" class="btn btn-success "  aria-haspopup="true" aria-expanded="false" onclick="popup01('calculations')">Check Repayment &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></h4><hr>
                    <div class="wrap">
<div class="btn-group dropdown">
                          <button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="myFunction1()">
                          1.  Advance Salary
                          </button>
                         
                        </div>

<div class="article-container sidebar-no"  id = "advsalary" style="display:none">
    <!--
                        <jdoc:include type="modules" name="article_menu" />
                    -->
<div class="aside">
    <div class="account-menu">
    	  </div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('ul li:empty').remove();
		var items = '0';
		
		if(parseInt(items) > 0 && $(".article-container").length > 0){
			$(".article-container").addClass("sidebar-yes").removeClass("sidebar-no");
		}else{
			$(".article-container").addClass("sidebar-no").removeClass("sidebar-yes");
		}
	})
</script>
    <div class="article-textsheet pull-left">
        <!--
                        <jdoc:include type="modules" name="product_section" style="xhtml" />
                        <jdoc:include type="modules" name="social_share" style="xhtml" />
                    -->
<style type="text/css"></style>

<div class="account-detail">
	<div class="product-wrap">
		<div class="product-page-left">
			<div class="loan-desc">
				
<p><span style="color: #000000;">&nbsp;Salary Advance&nbsp;<strong>(“Meeting Your Needs – Instantly!”)</strong>&nbsp;is a facility afforded to salaried employees for securing small&nbsp;</span><span style="color: #000000;">amounts of short-term credit to finance emergency needs.</span></p>
<p><span style="color: #000000;">The loan is advanced up to four (4) times the average monthly net salary to help the salaried customers meet emergency needs.</span></p>								<div class="benefits-wrap">
                	
                                                	<div class="benefit-col">
                                    <h5><strong>Benefits</strong></h5>
                                    <ol>
<li>
<p><span style="color: #000000;">It is Easy:</span></p>
<p><span style="color: #000000;">- Automatic debits from customers accounts for repayments (on instruction), no need to travel to the bank and queue.</span></p>
</li>
<li>
<p><span style="color: #000000;">It is Fast:&nbsp;</span></p>
<p><span style="color: #000000;">-  Quick loan processing and disbursement</span></p>
</li>
<li>
<p><span style="color: #000000;">It has Added Value:&nbsp;</span></p>
<p><span style="color: #000000;">- Free loan insurance against death and disability.</span></p>
<p><span style="color: #000000;">- Advance of up to 4 times the customer’s salary which is higher than most competing products e.g. from Sacco’s.</span></p>
</li>
</ol>                                </div>
                    </div>
                   
                   
                  </div>
                </div>
              </div>
            </div>
          </div>   </div>   </div> 

		  </div>

 <div class="card-body">
<button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="myFunction()">
                           2.  Commercial loan
                          </button>                        

    

<div class="loan-desc" id= "commercial" style="display:none">        <p><p><span style="color: #000000;">Suitable for individual or a company looking for financing to build or construct an income generating housing project</p>
                                    <h5><strong>Benefits</strong></h5>
<ul>
<li><p><span style="color: #000000;">- Loan financing of up to 70% value of construction component with a repayment of up to 10 years.</li>
<li><p><span style="color: #000000;">- Competitive interest rate.</li>
<li><p><span style="color: #000000;">- Moratorium on principle- Maximum 6 months on completion.</li>
<li><p><span style="color: #000000;">- Flexibility on disbursement.</li>
<li><p><span style="color: #000000;">- Access to all other  banking products (e.g. Overdrafts, credit cards, current, savings and investment accounts).</li>
</ul>
<h5><strong>Standard Requirements</strong></h5>
<ul>
<li><p><span style="color: #000000;">Proof that you can meet the 30% financing and other related costs e.g. Notary fees, valuation report, insurance payment, transfer fees, registration fees, etc.</li>
</ul>
<h5><strong>Rates &amp; Fees</strong></h5>
<ul>
<li><p><span style="color: #000000;">- Competitive interest rate</li>
<li><p><span style="color: #000000;">- Appraisal Fee-2% of loan amount</li>
<li><p><span style="color: #000000;">- Ledger Fee- RWF 1,000 per month</li>
<li><p><span style="color: #000000;">- Notary Fees</li>
<li><p><span style="color: #000000;">- Valuation fees</li>
<li><p><span style="color: #000000;">- Transfer fee</li>   </div> 

		  </div> 



<div class="card-body">
<button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="myFunction10()">
3. Investment Group Loans/Cooperatives </button>
                        

    

    <div itemprop="articleBody" id="invest" style="display:none">
        <p><span style="color: #000000;">Suitable for an investment group seeking to invest in property either straight purchase or construction.</p>
<h5><strong>Benefits</strong></h5>
<ul>
<li><p><span style="color: #000000;">Competitive interest rate</li>
<li><p><span style="color: #000000;">Loan financing of up to 70% value of property with a repayment of up to 10 years.</li>
</ul>
<h5><strong>Standard Requirements</strong></h5>
<ul>
<li><p><span style="color: #000000;">Proof of contributions month on month</li>
<li><p><span style="color: #000000;">Proof of ability to meet the 30% financing and other related costs e.g. Notary fees, valuation report, insurance payment, transfer fees, registration fees, etc.</li>
</ul>
<h5><Strong>Rates &amp; Fees</strong></h5>
<ul>
<li><p><span style="color: #000000;">- Transfer fees</li>
<li><p><span style="color: #000000;">- Appraisal Fee-2% of loan amount</li>
<li><p><span style="color: #000000;">- Ledger Fee- RWF 1,000 per month</li>
<li><p><span style="color: #000000;">- Competitive Interest rates</li>
<li><p><span style="color: #000000;">- Insurance premium- Payable monthly with the mortgage loan installments</li>
<li><p><span style="color: #000000;">- Notary Fees</li>
<li><p><span style="color: #000000;">- Valuation fees</li>
<li><p><span style="color: #000000;">- Transfer fees</li>
<li><p><span style="color: #000000;">- Appraisal Fee-2% of loan amount</li>
<li><p><span style="color: #000000;">- Ledger Fee- RWF 1,000 per month</li>
<li><p><span style="color: #000000;">- Valuation fees</li>
<li><p><span style="color: #000000;">- Transfer fees</li>
<li><p><span style="color: #000000;">- Appraisal Fee-2% of loan amount</li>
<li><p><span style="color: #000000;">- Ledger Fee- RWF 1,000 per month</li>
<li><p><span style="color: #000000;">- Valuation fees</li>
</ul>    </div>
    

    </div>

                        
		  </div>  		  <!--  ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="container-fluid clearfix">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2019
              <a href="" target="_blank">Digital Star</a>. All rights reserved.</span>
           
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  
</body>
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
                        alert('Atleast one attachment is required!!!');
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
                        $(wrapper).append('<div style = " margin-left:85px"><input type="file" name="attachment' + x + '"/><a href="#" class="remove_field"  style="color:red;"><img src="img/delattach.png.png" width="15" height="15"/><strong> Remove File'+y+'</strong></a></div>'); //add attachment
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
		<script>
function myFunction() {
  var x = document.getElementById("commercial");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
function myFunction1() {
  var x1 = document.getElementById("advsalary");
  if (x1.style.display === "none") {
    x1.style.display = "block";
  } else {
    x1.style.display = "none";
  }
}
function myFunction10() {
  var x10 = document.getElementById("invest");
  if (x10.style.display === "none") {
    x10.style.display = "block";
  } else {
    x10.style.display = "none";
  }
}
</script>
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
<style>
.button {
  background-color: #f4511e;
  border: none;
  color: white;
  padding: 0.5px 102px;
  text-align: center;
  font-size: 16px;
  opacity: 0.6;

  display: inline-block;
  text-decoration: none;
  cursor: pointer;
}

.button:hover {opacity: 1}

input#bigbutton {
width:350px;
background: #3e9cbf; /*the colour of the button*/
padding: 8px 14px 10px; /*apply some padding inside the button*/
border:1px solid #3e9cbf; /*required or the default border for the browser will appear*/
cursor:pointer; /*forces the cursor to change to a hand when the button is hovered*/
/*style the text*/
font-size:1.5em;
font-family:Oswald, sans-serif; 
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