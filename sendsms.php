
<?php
if(isset($_POST['code'])AND isset($_POST['mobile'])){
	
	// Authorisation details.
	$username = "nsabimanajeandelacroix@yahoo.fr";
	$hash = "b2f300e893a92906f42718ecfc9498e59a4ad983c150c29fc713cda23224ede6";

	// Config variables. Consult http://api.txtlocal.com/docs for more info.
	$test = "0";

	// Data for text message. This is the text message data.
	$sender = "API Test"; // This is who the message appears to be from.
	$numbers = $_POST['code'].$_POST['mobile']; // A single number or a comma-seperated list of numbers
	$message = $_POST['smg'];
	// 612 chars or less
	// A single number or a comma-seperated list of numbers
	$message = urlencode($message);
	$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
	$ch = curl_init('http://api.txtlocal.com/send/?');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch); // This is the result from the API
	curl_close($ch);
	if($result== true){
		echo"Weldone";
		
	}
}
?>

<html>
<head>
    <title>SMS sending by PHP5 and MySQL</title>
<body>
<form action="" method="POST">
    <table border="0" align="center">
        <tr>
            <td colspan="2" align="center">
                <font style="font-weight: bold; font-size: 16px;">Compose message</font>
                <br /><br />
            </td>
        </tr>
        <tr>
            <td align="top">Code: </td>
            <td>
                <select  name = "code"> 
				<option value="250">Kulu +250</option>
				
				</select>
            </td>
        </tr>
		  <tr>
            <td align="top">Mobile: </td>
            <td>
                <input name = "mobile" placeholder="Mobile">
            </td>
        </tr>
        <tr>
            <td align="top">Message text: </td>
            <td>
                <textarea name="smg" cols="40" rows="10"placeholder="Message"></textarea>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" value="Send Now">
            </td>
        </tr>
        <tr>
    </table>
</form>


</body>
</html>