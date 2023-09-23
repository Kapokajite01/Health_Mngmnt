
      <head> 
		   <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">	  
           <title>Compose mail</title>
           <script src="jquery.min.js"></script>
           <link rel="stylesheet" type="text/css" href="css/style.css"/>
           <link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
		    <link rel="stylesheet" type="text/css" href="css/jquery-ui.css"/>
           <link rel="stylesheet" type="text/css" href="css/jquery-1.10.2.js"/>
		             <link rel="stylesheet" type="text/css" href="css/jquery-ui.js"/>
           <script src="js/jquery.js"></script>
		  
<html lang="en">
<link rel="stylesheet" href="http://localhost/sintras/modul/compose/jsautocomplete/jquery-ui.css">
<script src="http://localhost/sintras/modul/compose/jsautocomplete/jquery-1.10.2.js"></script>
<script src="http://localhost/sintras/modul/compose/jquery-ui.js"></script>
<script src="http://localhost/sintras/modul/compose/tes.css"></script>


	
      </head> 
   <section class="content-header">
          <h1>
            SINTRAS
            <small>V 1.0</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">SINTRAS</li>
          </ol>
        </section>
		<section class="content">
<div class="container">
<div class="row inbox">
	
	<div class="col-md-9">
		<div class="panel panel-default">
			<div class="panel-body message">
			<?php
		   
		   if(isset($_GET['fail']))
	{
		
		?>
        <blink><h5 align = "center"><strong><i><font color = "red">&#9888; Email was not sent...</font></i></strong></h5></blink>
        <?php
	}
if(isset($_GET['cluster']))
	{
$Text = urldecode($_REQUEST['cluster']);
$Mixed = json_decode($Text);
$n = count($Mixed);
		?>
        <blink><h5 align = "center"><strong><i><font color = "red">&#9888; You Tried To Send To Unexisting Email(s)&nbsp;&nbsp;&nbsp;&nbsp;</font></i><?php for($i=0; $i <$n; $i++){echo',&nbsp;'. $Mixed[$i].'';}?></strong></h5></blink>
        <?php
	}		
		   
		   
		   ?>
<style>				
#send_to{
  display:none;
}
#bcc{
  display:none;
}</style>

				<form class="form-horizontal" role="form" method="post" action="<?=base_admin();?>modul/compose/MulAttachMail.php" enctype="multipart/form-data"id="myCoolForm">
				<div style="float:right;"><span id="toggle" style="background-color: #fff; border: none;color: #667482;padding: 0px 0px;text-align: left;text-decoration: underline;font-size: 16px;margin: 0px 0px;cursor: pointer;"><strong>Cc</strong></span>
&nbsp;&nbsp;&nbsp;<span id="toggle2" style="background-color: #fff; border: none;color: #667482;padding: 0px 0px;text-align: left;text-decoration: underline;font-size: 16px;margin: 0px 0px;cursor: pointer;"><strong>Bcc</strong></h5></span></div>	
                    <div class="form-group">
				    	<label for="cc" class="col-sm-1 control-label">To</label>
				    	<div class="col-sm-11">
						
                             <input  style="background-color: #fff; width:600px;" type="text" name="rec_id" class="form-control select2-offscreen" id="rec_id" placeholder="To:" tabindex="-1" required>
				    	</div>
				  	</div>
					<?php
					
					if(isset($_GET['clusterc']))
	{
$Text = urldecode($_REQUEST['clusterc']);
$Mixed = json_decode($Text);
$n = count($Mixed);
		?>
        <blink><h5 align = "center"><strong><i><font color = "blue">&#9888; Unexisting Email(s) in Cc&nbsp;&nbsp;&nbsp;&nbsp;</font></i><?php for($i=0; $i <$n; $i++){echo',&nbsp;'. $Mixed[$i].'';}?></strong></h5></blink>
        <?php
	}	?>	
		
<div id="send_to"class="form-group">


				    	<label for="cc" class="col-sm-1 control-label">Cc</label>
				    	<div class="col-sm-11">
						
                              <input style="background-color: #fff; width:600px;" type="text" name="cc"  id="cc" class="form-control select2-offscreen" id="to" placeholder="Cc" tabindex="-1">
				    	</div>
				
				  	</div>
					<div id="bcc"class="form-group">
				    	<label for="cc" class="col-sm-1 control-label">Bcc</label>
				    	<div class="col-sm-11">
						
                              <input style="background-color: #fff; width:600px;" type="text" name="bcc" id="bccc" class="form-control select2-offscreen" id="to" placeholder="Bcc" tabindex="-1">
				    	</div>
				
				  	</div>
					<div class="form-group">
				    	<label for="cc" class="col-sm-1 control-label">Subject:</label>
				    	<div class="col-sm-11">
                              <input style="background-color: #fff; width:600px;" type="text" name="subject" class="form-control select2-offscreen" id="subject" placeholder="Type Object" autocomplete="off" tabindex="-1" required>
				    	</div>
					<div class="input_fields_wrap">
                        <div style = "display: none" ><input type="file" name="attachment" value="Attach File" id="first_attach" >
						<a href="#" class="remove_field"  style="color:red;"><img src="/sintras/modul/compose/img/delattach.png.png" width="15" height="15"/><strong> Remove File 1</strong></a>
						</div>
                    </div>
					
					<a class="add_field_button"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="/sintras/modul/compose/img/attACHMENT.png" width="15" height="15"/>Attach File(s)</strong></a>
					</div>
					

					<div class="form-group">
					
                     <textarea name="message" id="message"  style="border:0;"class="editbox"id="editbox" style="display:none;" required></textarea>  
					</div>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Send" id="bigbutton"/><br>
					
				<div class="form-group">  
                     <input type="hidden" name="mail_id" id="mail_id" ="none"/>  
                     <div id="autoSave"></div>  
                </div>
				</form>
           </div> 	
			</div>
		</div>
		

	</div>

		
	</section>
	
	
 <script>  
 $(document).ready(function(){  
      function autoSave()  
      {  
	       var rec_id = $('#rec_id').val();
           var subject = $('#subject').val();  
           var message = $('#message').val();  
           var mail_id = $('#mail_id').val();  
           if(rec_id != '' && subject != '' && message != '')  
           {  
                $.ajax({  
                     url:"<?=base_admin();?>modul/compose/save_post.php",  
                     method:"POST",  
                     data:{reciever:rec_id, postTitle:subject, postDescription:message, postId:mail_id},  
                     dataType:"text",  
                     success:function(data)  
                     {  
                          if(data != '')  
                          {  
                               $('#mail_id').val(data);  
                          }  
                          $('#autoSave').text("");  
                          setInterval(function(){  
                               $('#autoSave').text('');  
                          }, 1000);  
                     }  
                });  
           }            
      }  
      setInterval(function(){   
           autoSave();   
           }, 1000);  
 });  
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
                        $(wrapper).append('<div style = " margin-left:85px"><input type="file" name="attachment' + x + '"/><a href="#" class="remove_field"  style="color:red;"><img src="/sintras/modul/compose/img/delattach.png.png" width="15" height="15"/><strong> Remove File'+y+'</strong></a></div>'); //add attachment
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
		<script src="<?=base_admin();?>assets/login/js/validate.js"></script>
<script src="<?=base_admin();?>assets/plugins/ckeditor/ckeditor.js"></script>

<script src="<?=base_admin();?>assets/plugins/ckeditor/adapters/jquery.js"></script>
<script src="<?=base_admin();?>assets/dist/js/pass_up.js"></script>

<script>
$("#toggle").on("click", function(){
  $("#send_to").toggle();                 // .fadeToggle() // .slideToggle()
});
$("#toggle2").on("click", function(){
  $("#bcc").toggle();                 // .fadeToggle() // .slideToggle()
});

</script>





<script>
var el = document.getElementById('myCoolForm');

el.addEventListener('submit', function(){
    return confirm('Are you sure you want to send this mail?');
}, false);

</script>
 </section><!-- /.content -->
 <style>
input#bigbutton {
width:150px;
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