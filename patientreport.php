<?php
session_start();
include("header.php");
include("dbconnection.php");
?>

<div class="wrapper col2">
  <div id="breadcrumb">
    <ul>
      <li class="first">Patient Report Panel</li></ul>
  </div>
</div>
<div class="wrapper col4">
  <div id="container">
    <p>
    
    <!-- jQuery Library -->
<script src="js/jquery.min.js"></script>
<script type="text/javascript">
jQuery(document).ready(function($) { 

	// Find the toggles and hide their content
	$('.toggle').each(function(){
		$(this).find('.toggle-content').hide();
	});

	// When a toggle is clicked (activated) show their content
	$('.toggle a.toggle-trigger').click(function(){
		var el = $(this), parent = el.closest('.toggle');

		if( el.hasClass('active') )
		{
			parent.find('.toggle-content').slideToggle();
			el.removeClass('active');
		}
		else
		{
			parent.find('.toggle-content').slideToggle();
			el.addClass('active');
		}
		return false;
	});

});  //End
</script>
<!-- Toggle CSS -->
<style type="text/css">

/* Main toggle */
.toggle { 
	font-size: 13px;
	line-height:20px;
	font-family: "HelveticaNeue", "Helvetica Neue", Helvetica, Arial, sans-serif;
	background: #ffffff; /* Main background */
	margin-bottom: 10px;
	border: 1px solid #e5e5e5;
	-webkit-border-radius: 5px;
	   -moz-border-radius: 5px;
	        border-radius: 5px;	
}

/* Toggle Link text */
.toggle a.toggle-trigger {
	display:block;
	padding: 10px 20px 15px 20px;
	position:relative;
	text-decoration: none;
	color: #666;
}

/* Toggle Link hover state */
.toggle a.toggle-trigger:hover {
	opacity: .8;
	text-decoration: none;
}

/* Toggle link when clicked */
.toggle a.active {
	text-decoration: none;
	border-bottom: 1px solid #e5e5e5;
	-webkit-box-shadow: 0 8px 6px -6px #ccc;
	   -moz-box-shadow: 0 8px 6px -6px #ccc;
	        box-shadow: 0 8px 6px -6px #ccc;
	color: #000;
}

/* Lets add a "-" before the toggle link */
.toggle a.toggle-trigger:before {
	content: "-";	/* You can add any symbol, font icon, or graphic icon */
	margin-right: 10px;
	font-size: 1.3em;	
}

/* When the toggle is active, change the "-" to a "+" */
.toggle a.active.toggle-trigger:before {
	content: "+";
}

/* The content of the toggle */
.toggle .toggle-content {
	padding: 10px 20px 15px 20px;
	color:#666;
}

</style>
<!-- Toggle #1 -->
<div class="toggle">
	<!-- Toggle Link -->
	<a href="#" title="Title of Toggle" class="toggle-trigger">Patient Profile</a>
	<!-- Toggle Content to display -->
	<div class="toggle-content">
		<p><?php include("patientdetail.php"); ?></p>
	</div><!-- .toggle-content (end) -->
</div><!-- .toggle (end) -->

<!-- Toggle #2 -->
<div class="toggle">
	<!-- Toggle Link -->
	<a href="#" title="Title of Toggle" class="toggle-trigger">Appointment record</a>
	<!-- Toggle Content to display -->
	<div class="toggle-content">
		<p><?php include("appointmentdetail.php"); ?></p>
	</div><!-- .toggle-content (end) -->
</div><!-- .toggle (end) -->


<!-- Toggle #3 -->
<div class="toggle">
	<!-- Toggle Link -->
	<a href="#" title="Title of Toggle" class="toggle-trigger">Treatment record</a>
	<!-- Toggle Content to display -->
	<div class="toggle-content">
		<p><?php include("treatmentdetail.php"); ?></p>
	</div><!-- .toggle-content (end) -->
</div><!-- .toggle (end) -->

<!-- Toggle #4 -->
<div class="toggle">
	<!-- Toggle Link -->
	<a href="#" title="Title of Toggle" class="toggle-trigger">Prescription record</a>
	<!-- Toggle Content to display -->
	<div class="toggle-content">
		<p><?php
        include("prescriptiondetail.php");
		?></p>
	</div><!-- .toggle-content (end) -->
</div><!-- .toggle (end) -->

<!-- Toggle #5 -->
<div class="toggle">
	<!-- Toggle Link -->
	<a href="#" title="Title of Toggle" class="toggle-trigger">Billing Report</a>
	<!-- Toggle Content to display -->
	<div class="toggle-content">
		<p><?php
        $billappointmentid= $rsappointment[0]; 
		include("viewbilling.php"); ?>
        </p>
	</div><!-- .toggle-content (end) -->
</div><!-- .toggle (end) -->


<?php
if(isset($_SESSION[adminid]))
{
?>
    <!-- Toggle #6 -->
    <div class="toggle">
        <!-- Toggle Link -->
        <a href="#" title="Title of Toggle" class="toggle-trigger">Payment Report</a>
        <!-- Toggle Content to display -->
        <div class="toggle-content">
            <p><?php
            $billappointmentid= $rsappointment[0]; 
            include("viewpaymentreport.php"); ?>
                      <?php
                if(!isset($_SESSION[patientid]))
                {
					
	$sqlbilling_records ="SELECT * FROM billing WHERE appointmentid='$billappointmentid'";
	$qsqlbilling_records = mysqli_query($con,$sqlbilling_records);
	$rsbilling_records = mysqli_fetch_array($qsqlbilling_records);
	if($rsbilling_records[discharge_date] == "0000-00-00")
	{
				  ?>  
				  <table width="557" border="3">
			  <tbody>
				<tr>
				  <th scope="col"><div align="center"><a href="paymentdischarge.php?appointmentid=<?php echo $rsappointment[0]; ?>&patientid=<?php echo $_GET[patientid]; ?>">Make Payment</a></div></th>
				</tr>
			  </tbody>
			</table>
			<?php
	}
                }
                ?>
            </p>
        </div><!-- .toggle-content (end) -->
    </div><!-- .toggle (end) -->
<?php
}
?>
    </p>
  </div>
</div>
</div>
 <div class="clear"></div>
  </div>
</div>
<?php
include("footer.php");
?>
