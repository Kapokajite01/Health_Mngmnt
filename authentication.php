<?Php
session_start();
//error_reporting(0);


$con=mysqli_connect("localhost","root","fidele","dirskhpe_rangiro");
// Check connection
$_SESSION['uname'] = $_POST['username'];
$uname = $_SESSION['uname'];
$password = $_POST['password'];
$password = sha1($password );

$sql="SELECT *  FROM users_table  WHERE username = '$uname' AND password = '$password' ";

if ($result=mysqli_query($con,$sql))
  {


	  	$chars = "GHIJKLMNOPQR016789ABCDEFSTUV2345WXYZ";
$res = "";
for ($i = 0; $i < 4; $i++) {
    $res .= $chars[mt_rand(0, strlen($chars)-1)];
}
  // Fetch one and one row
  while ($rowval=mysqli_fetch_row($result))
    {
		$_SESSION['error'] = "";
    $email = $rowval[6];
$_SESSION['uname'] = $rowval[7];
$_SESSION['userid'] = $rowval[0];
$userid = $_SESSION['userid'];
$uname = $_SESSION['uname'];	
$existemail= "yes";
$_SESSION['account'] = $rowval[5];
$account = $_SESSION['account'];
$_SESSION['fname'] = $rowval[1];
$fname = $_SESSION['fname'];
$_SESSION['lname'] = $rowval[2];
$lname = $_SESSION['lname'];
require('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->isSMTP();
$mail->Host ='smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls';
$mail->Username = 'kapokajitetest@gmail.com';
$mail->Password = 'fidele';
$mail->setFrom('kapokajitetest@gmail.com','Qloan System');
$mail->addAddress($email);
$mail->addReplyTo('kapokajitetest@gmail.com');
$mail->isHTML(true);
$mail->Subject='Verify';
$mail->Body ='<h1>'.$res.'</h1> Is your Verification Code for Qloan';
/*if(!$mail->send()){
		header('location:authentication_check');
}else{/
*/
	
}
		header('location:authentication_check');

 // Free result set
  mysqli_free_result($result);
    }
 


mysqli_close($con);
?>