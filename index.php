<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Health Center Management System</title>

    <!-- Bootstrap -->
    <link href="ccsss/bootstrap.min.css" rel="stylesheet">
    <link href="ccsss/style.css" rel="stylesheet">
    </head>
  <body>
    <div class="container">
      <div class="info">
         <h2 class="bg-primary">Health Center Management System</h2>
         <div class="bg-info">
          <p class="text-danger">Please use below user combinations</p>
          <table class="col-md-6 col-md-offset-3">
         </table>
         </div>
       
          <div class="col-md-6 col-md-offset-3" border="5"><br><br><br><br><br>
                    <h4></span><strong><font color="white">Log in with your credentials</strong><span class="glyphicon glyphicon-user"></font></h4><br/>
                            <div class="block-margin-top">
                              <?php 

                                $errors = array(
                                    1=>"<font color='white'>Invalid user name or password, Try again</font>",
                                    2=>"<font color='white'>Please login to access this area</font>"
                                  );

                                $error_id = isset($_GET['err']) ? (int)$_GET['err'] : 0;

                                if ($error_id == 1) {
                                        echo '<p class="text-danger">'.$errors[$error_id].'</p>';
                                    }elseif ($error_id == 2) {
                                        echo '<p class="text-danger">'.$errors[$error_id].'</p>';
                                    }
                               ?>  

                              <form action="authenticate" method="POST" class="form-signin col-md-8 col-md-offset-2" role="form">  
                                  <input type="text" name="username" class="form-control" placeholder="Username" required autofocus autocomplete="off"><br/>
                                  <input type="password" name="password" class="form-control" placeholder="Password" required><br/>
								  	<!--<select name="role" class="form-control" required>
									<option value="">----SELECT ROLE-----</option>
									<option>Admin</option>
									<option>Manager</option>
									<option>Laboratory</option>
									<option>Receptionist</option>
									</select><br>
								<select name="postdsante" class="form-control" required>
									<option value="">----SELECT BRANCH-----</option>
									<option>CENTRE DE SANTE Kulu</option>
									<option>POSTE DE SANTE KABUGA</option>
									<option></option>

									</select><br/><br/>-->
                                  <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                             </form>
                           </div>
            </div>

      </div>
      
     
    </div>
  

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="jjss/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="jjss/bootstrap.min.js"></script>
  </body>
</html>