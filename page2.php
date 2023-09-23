<html>
<script>
function showline1() {
   document.getElementById('var1').style.display = "block";
   document.getElementById('var2').style.display = "block";  

}
</script>
<?php
session_start();
if (isset($_POST['submit'])) {
$_session['nvar1']= $_POST['var1'];
$_session['nvar2']= $_POST['var2'];
$nnvar1= $_POST['var1'];
$nnvar2= $_POST['var2'];
}
?>

Vaariable1:<input type="text" name="var1" id="var1" value="<?php echo $_session['nvar1']; ?>" style="display: none">
Vaariable2:<input type="text" name="var2" id="var2" value="<?php echo $_session['nvar2']; ?>" style="display: none">
<input type="button" name "but1" id="but1" value="activate"onclick="showline1()">
</html>
<?php
if(!empty($nnvar1) and !empty($nnvar2)){
	echo"<script>
   document.getElementById('var1').style.display = 'block';
   document.getElementById('var2').style.display = 'block';
</script>";	
}

?>