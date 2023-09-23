<?php
error_reporting(0);
if (isset($_POST["bigbutton"])) {
    // extract data from form; store in variable
    $consultation = $_POST["consultation"];
	$pid = $_POST["p_id"];
    $num = $_POST["number"];
	$fname= $_POST["name"];
	$lnames=$_POST['lname'];
	$ins=$_POST['insurance'];
    $acte1 = addslashes($_POST["aact1"]);
    $upacte1 = $_POST["upacte1"];
    $qacte1 = $_POST["qacte1"];
    $ex1 = addslashes($_POST["eex1"]);
    $qex1 = $_POST["qex1"];
    $upex1 = $_POST["upex1"];
	
	$acte2 = addslashes($_POST["aact2"]);
    $upacte2 = $_POST["upacte2"];
    $qacte2 = $_POST["qacte2"];
    $ex2 = addslashes($_POST["eexe2"]);
    $qex2 = $_POST["qex2"];
    $upex2 = $_POST["upex2"];
	
	$acte3 = addslashes($_POST["aact3"]);
    $upacte3 = $_POST["upacte3"];
    $qacte3 = $_POST["qacte3"];
    $ex3 = addslashes($_POST["eexe3"]);
    $qex3 = $_POST["qex3"];
    $upex3 = $_POST["upex3"];
	
	$acte4 = addslashes($_POST["aact4"]);
    $upacte4 = $_POST["upacte4"];
    $qacte4 = $_POST["qacte4"];
    $ex4 = addslashes($_POST["eexe4"]);
    $qex4 = $_POST["qex4"];
    $upex4 = $_POST["upex4"];
	
	$acte5 = addslashes($_POST["aact5"]);
    $upacte5 = $_POST["upacte5"];
    $qacte5 = $_POST["qacte5"];
    $ex5 = addslashes($_POST["eexe5"]);
    $qex5 = $_POST["qex5"];
    $upex5 = $_POST["upex5"];
	
	$acte6 = addslashes($_POST["aact6"]);
    $upacte6 = $_POST["upacte6"];
    $qacte6 = $_POST["qacte6"];
    $ex6 = addslashes($_POST["eexe6"]);
    $qex6 = $_POST["qex6"];
    $upex6 = $_POST["upex6"];
    
	$acte7 = addslashes($_POST["aact7"]);
    $upacte7 = $_POST["upacte7"];
    $qacte7 = $_POST["qacte7"];
    $ex7 = addslashes($_POST["eexe7"]);
    $qex7 = $_POST["qex7"];
	$upex7 = $_POST["upex7"];
	$totacte1= $upacte1*$qacte1;
	$totacte2= $upacte2*$qacte2;
	$totacte3= $upacte3*$qacte3;
	$totacte4= $upacte4*$qacte4;
	$totacte5= $upacte5*$qacte5;
	$totacte6= $upacte6*$qacte6;
	$totacte7= $upacte7*$qacte7;
	$totexamen1=$upex1*$qex1;
	$totexamen2=$upex2*$qex2;
	$totexamen3=$upex3*$qex3;
	$totexamen4=$upex4*$qex4;
	$totexamen5=$upex5*$qex5;
	$totexamen6=$upex6*$qex6;
	$totexamen7=$upex7*$qex7;
	$ggrandtotal=$totacte1+$totacte2+$totacte3+$totacte4+$totacte5+
	$totacte6+$totacte7+$totexamen1+$totexamen2+$totexamen3+$totexamen4+
	$totexamen5+$totexamen6+$totexamen7;
}?>

<?php
if (isset($_POST["save"])) {
	$pid=$_POST['patient_id'];
	$consultation=$_POST['cons'];
	$acte1 = addslashes($_POST["mymed1"]);
    $upacte1 = $_POST["upmed1"];
    $qacte1 = $_POST["quantmed1"];
    $ex1 = addslashes($_POST["consum1"]);
    $qex1 = $_POST["quantitcons1"];
    $upex1 = $_POST["unitcons1"];
	
	$acte2 = addslashes($_POST["mymed2"]);
    $upacte2 = $_POST["upmed2"];
    $qacte2 = $_POST["quantmed2"];
    $ex2 = addslashes($_POST["consum2"]);
    $qex2 = $_POST["quantitcons2"];
    $upex2 = $_POST["unitcons2"];
	
    $acte3 = addslashes($_POST["mymed3"]);
    $upacte3 = $_POST["upmed3"];
    $qacte3 = $_POST["quantmed3"];
    $ex3 = addslashes($_POST["consum3"]);
    $qex3 = $_POST["quantitcons3"];
    $upex3 = $_POST["unitcons3"];
	
	$acte4 = addslashes($_POST["mymed4"]);
    $upacte4 = $_POST["upmed4"];
    $qacte4 = $_POST["quantmed4"];
    $ex4 = addslashes($_POST["consum4"]);
    $qex4 = $_POST["quantitcons4"];
    $upex4 = $_POST["unitcons4"];
	
	$acte5 = addslashes($_POST["mymed5"]);
    $upacte5 = $_POST["upmed5"];
    $qacte5 = $_POST["quantmed5"];
    $ex5 = addslashes($_POST["consum5"]);
    $qex5 = $_POST["quantitcons5"];
    $upex5 = $_POST["unitcons5"];
	
	$acte6 = addslashes($_POST["mymed6"]);
    $upacte6 = $_POST["upmed6"];
    $qacte6 = $_POST["quantmed6"];
    $ex6 = addslashes($_POST["consum6"]);
    $qex6 = $_POST["quantitcons6"];
    $upex6 = $_POST["unitcons6"];
	
	$acte7 = addslashes($_POST["mymed7"]);
    $upacte7 = $_POST["upmed7"];
    $qacte7 = $_POST["quantmed7"];
    $ex7 = addslashes($_POST["consum7"]);
    $qex7 = $_POST["quantitcons7"];
    $upex7 = $_POST["unitcons7"];
	
	
	// connect to server
    $conn = mysql_connect('localhost', 'root', 'fidele');
    // check if you can connect; if not then die
    if (!$conn) {
        echo "<center>";
        die('Could Not Connect: ' . mysql_error());
        echo "</center>";
    }
    // check if you can select table; in not then die
    $db = mysql_select_db('dirskhpe_rangiro', $conn);
    if (!$db) {
        echo "<center>";
        die('Database Not Selected: ' . mysql_error());
        echo "</center>";
    }

	$check = "SELECT consid,id from consomation WHERE id= '$number' ORDER BY consid DESC limit 1";
	$result = ($check) or die('Query failed: ' . mysql_error());
        while ($row = mysql_fetch_assoc($result)) {
			$myid=$row['id'];
		   $myconsid = $row['consid'];

		}	
		
	if (!empty($acte1) or !empty($qacte1) or (!empty($ex1) or !empty($qex1))) {
		if (empty($pid)) {
            echo "<center>";
            echo "<h3>!!Data not Saved!!</h3>";
            die("<h4>Attention You did not Check Patient ID</h4>");
            echo "</center>";
        }
		if (empty($consultation) and ($consultation != '0')) {
            echo "<center>";
            echo "<h3>!!Data not Saved!!</h3>";
            die("<h4>Fillout Consultation</h4>");
            echo "</center>";
        }
		
		if (!empty($acte1) and !empty($upacte1)) {
            if (empty($qacte1)) {
                echo "<center>";
                echo "<h3>!!Data not Saved!!</h3>";
                die("<h4>Please Fill  Quantity for Medical Act One</h4>");
                echo "</center>";
            }
        }
		if (!empty($ex1) and !empty($upex1)) {
            if (empty($qex1)) {
                echo "<center>";
                echo "<h3>!!Data not Saved!!</h3>";
                die("<h4>Please Fill  Quantity for Lab Test One</h4>");
                echo "</center>";
            }
        }
			
		$insert1 = ("INSERT INTO consomation (id,consultatiobn,actemedicale,upacte,qtyacte,examenmedicale,upexamen,qtyexamen,datecunsuption)VALUES('$pid','$consultation','$acte1', '$upacte1','$qacte1','$ex1','$upex1','$qex1',CURDATE())");
	}

	if (!empty($acte2) or !empty($qacte2)or(!empty($ex2) or !empty($qex2))) {
		if (empty($pid)) {
            echo "<center>";
            echo "<h3>!!Data not Saved!!</h3>";
            die("<h4>Attention You did not Check Patient ID</h4>");
            echo "</center>";
        }
		if (empty($consultation) and ($consultation != '0')) {
            echo "<center>";
            echo "<h3>!!Data not Saved!!</h3>";
            die("<h4>Fillout Consultation</h4>");
            echo "</center>";
        }
		
		if (!empty($acte2) and !empty($upacte2)) {
            if (empty($qacte2)) {
                echo "<center>";
                echo "<h3>!!Data not Saved!!</h3>";
                die("<h4>Please Fill  Quantity for Medical Act Two</h4>");
                echo "</center>";
            }
       
        }
		if (!empty($ex2) and !empty($upex2)) {
            if (empty($qex2)) {
                echo "<center>";
                echo "<h3>!!Data not Saved!!</h3>";
                die("<h4>Please Fill  Quantity for Lab Test Two</h4>");
                echo "</center>";
            }
        }
		$insert2 = ("INSERT INTO consomation (id,consultatiobn,actemedicale,upacte,qtyacte,examenmedicale,upexamen,qtyexamen,datecunsuption)VALUES('$pid','$consultation','$acte2', '$upacte2','$qacte2','$ex2','$upex2','$qex2',CURDATE())");

	}
	if (!empty($acte3) or !empty($qacte3) or !empty($ex3) or !empty($qex3)) {
		if (empty($pid)) {
            echo "<center>";
            echo "<h3>!!Data not Saved!!</h3>";
            die("<h4>Attention You did not Check Patient ID</h4>");
            echo "</center>";
        }
		if (empty($consultation) and ($consultation != '0')) {
            echo "<center>";
            echo "<h3>!!Data not Saved!!</h3>";
            die("<h4>Fillout Consultation</h4>");
            echo "</center>";
        }
		if (!empty($acte3) and !empty($upacte3)) {
            if (empty($qacte3)) {
                echo "<center>";
                echo "<h3>!!Data not Saved!!</h3>";
                die("<h4>Please Fill  Quantity for Medical Act Three</h4>");
                echo "</center>";
            }
        }
	
	if (!empty($ex3) and !empty($upex3)) {
            if (empty($qex3)) {
                echo "<center>";
                echo "<h3>!!Data not Saved!!</h3>";
                die("<h4>Please Fill  Quantity for Lab Test Three</h4>");
                echo "</center>";
            }
        }
		
$insert3 = ("INSERT INTO consomation (id,consultatiobn,actemedicale,upacte,qtyacte,examenmedicale,upexamen,qtyexamen,datecunsuption)VALUES('$pid','$consultation','$acte3', '$upacte3','$qacte3','$ex3','$upex3','$qex3',CURDATE())");
	
    		
	}
	if (!empty($acte4) or !empty($qacte4)or !empty($ex4) or !empty($qex4)) {
		if (empty($pid)) {
            echo "<center>";
            echo "<h3>!!Data not Saved!!</h3>";
            die("<h4>Attention You did not Check Patient ID</h4>");
            echo "</center>";
        }
		if (empty($consultation) and ($consultation != '0')) {
            echo "<center>";
            echo "<h3>!!Data not Saved!!</h3>";
            die("<h4>Fillout Consultation</h4>");
            echo "</center>";
        }
		
		if (!empty($acte4) and !empty($upacte4)) {
            if (empty($qacte4)) {
                echo "<center>";
                echo "<h3>!!Data not Saved!!</h3>";
                die("<h4>Please Fill  Quantity for Medical Act Four</h4>");
                echo "</center>";
            }
        }		   
   			
		if (!empty($ex4) and !empty($upex4)) {
            if (empty($qex4)) {
                echo "<center>";
                echo "<h3>!!Data not Saved!!</h3>";
                die("<h4>Please Fill  Quantity for Lab Test Four</h4>");
                echo "</center>";
            }
        }
		
		$insert4 = ("INSERT INTO consomation (id,consultatiobn,actemedicale,upacte,qtyacte,examenmedicale,upexamen,qtyexamen,datecunsuption)VALUES('$pid','$consultation','$acte4', '$upacte4','$qacte4','$ex4','$upex4','$qex4',CURDATE())");

   }
   
   
	if (!empty($acte5) or !empty($qacte5) or !empty($ex5) or !empty($qex5)) {
		if (empty($pid)) {
            echo "<center>";
            echo "<h3>!!Data not Saved!!</h3>";
            die("<h4>Attention You did not Check Patient ID</h4>");
            echo "</center>";
        }
		if (empty($consultation) and ($consultation != '0')) {
            echo "<center>";
            echo "<h3>!!Data not Saved!!</h3>";
            die("<h4>Fillout Consultation</h4>");
            echo "</center>";
        }
		
		if (!empty($acte5) and !empty($upacte5)) {
            if (empty($qacte5)) {
                echo "<center>";
                echo "<h3>!!Data not Saved!!</h3>";
                die("<h4>Please Fill  Quantity for Medical Act Five</h4>");
                echo "</center>";
            }
        }
		
			
	if (!empty($ex5) and !empty($upex5)) {
            if (empty($qex5)) {
                echo "<center>";
                echo "<h3>!!Data not Saved!!</h3>";
                die("<h4>Please Fill  Quantity for Lab Test Five</h4>");
                echo "</center>";
            }
        }
		
	$insert5 = ("INSERT INTO consomation (id,consultatiobn,actemedicale,upacte,qtyacte,examenmedicale,upexamen,qtyexamen,datecunsuption)VALUES('$pid','$consultation','$acte5', '$upacte5','$qacte5','$ex5','$upex5','$qex5',CURDATE())");

	}
	
	
	if (!empty($acte6) or !empty($qacte6) or !empty($ex6) or !empty($qex6)) {
		if (empty($pid)) {
            echo "<center>";
            echo "<h3>!!Data not Saved!!</h3>";
            die("<h4>Attention You did not Check Patient ID</h4>");
            echo "</center>";
        }
		if (empty($consultation) and ($consultation != '0')) {
            echo "<center>";
            echo "<h3>!!Data not Saved!!</h3>";
            die("<h4>Fillout Consultation</h4>");
            echo "</center>";
        }
		if (!empty($acte6) and !empty($upacte6)) {
            if (empty($qacte6)) {
                echo "<center>";
                echo "<h3>!!Data not Saved!!</h3>";
                die("<h4>Please Fill  Quantity for Medical Act Six</h4>");
                echo "</center>";
            }
        }
		
			
	
		if (!empty($ex6) and !empty($upex6)) {
            if (empty($qex6)) {
                echo "<center>";
                echo "<h3>!!Data not Saved!!</h3>";
                die("<h4>Please Fill  Quantity for Lab Test Six</h4>");
                echo "</center>";
            }
        }
		
	$insert6 = ("INSERT INTO consomation (id,consultatiobn,actemedicale,upacte,qtyacte,examenmedicale,upexamen,qtyexamen,datecunsuption)VALUES('$pid','$consultation','$acte6', '$upacte6','$qacte6','$ex6','$upex6','$qex6',CURDATE())");

    }
	
	if (!empty($acte7) or !empty($qacte7) or !empty($ex7) or !empty($qex7)) {
		if (empty($pid)) {
            echo "<center>";
            echo "<h3>!!Data not Saved!!</h3>";
            die("<h4>Attention You did not Check Patient ID</h4>");
            echo "</center>";
        }
		if (empty($consultation) and ($consultation != '0')) {
            echo "<center>";
            echo "<h3>!!Data not Saved!!</h3>";
            die("<h4>Fillout Consultation</h4>");
            echo "</center>";
        }
		
		if (!empty($acte7) and !empty($upacte7)) {
            if (empty($qacte7)) {
                echo "<center>";
                echo "<h3>!!Data not Saved!!</h3>";
                die("<h4>Please Fill  Quantity for Medical Act Seven</h4>");
                echo "</center>";
            }
        }
				
		
	
			if (!empty($ex7) and !empty($upex7)) {
            if (empty($qex7)) {
                echo "<center>";
                echo "<h3>!!Data not Saved!!</h3>";
                die("<h4>Please Fill  Quantity for Lab Test Seven</h4>");
                echo "</center>";
            }
        }
		
	$insert7 = ("INSERT INTO consomation (id,consultatiobn,actemedicale,upacte,qtyacte,examenmedicale,upexamen,qtyexamen,datecunsuption)VALUES('$pid','$consultation','$acte7', '$upacte7','$qacte7','$ex7','$upex7','$qex7',CURDATE())");

 		
	}
	
	
	
	if ((!$insert1) or (!$insert2)or (!$insert3)or (!$insert4)or (!$insert5)or (!$insert6)or (!$insert7)){
			echo " <h1 align='center'>Not Saved </h1>";
		}
		if (($insert1) or ($insert2)or ($insert3)or ($insert4)or ($insert5)or ($insert6)or ($insert7)){
		header("location:cashier.php");
	}		

}
?> 
<?php
error_reporting(0);
if (isset($_POST["cancel"])) {
header("location:cashier.php");

}
?>	
<?php

	include_once('menusr1.php');

	?>
	
	<!-- MAIN CONTENT -->
	<div id="content">
		
		<div class="page-full-width cf">

			 <!-- end side-menu -->
			

			
				<div class="content-module">				
					
					<div class="content-module-main cf">
		<div align="center">
		<form method="POST" action="" >
				<table>
		<tr>
		<tr><td></td><td></td><td></td><td><strong>Names</strong></td><td><input type="text" name="names" size="30" value="<?php echo $fname.'&nbsp;&nbsp;'.$lnames;?>" style="border: 0px" readonly required aria-required="true" aria-describedby="name-format"></td><td><strong>Number</strong></td><td><input type="text" name="insurancm" value="<?php echo $num;?>" style="border:0px" readonly required aria-required="true" aria-describedby="name-format">
		</td><td><strong>Insurance</strong></td><td><input type="text" name="insurance" value="<?php echo $ins;?>" style="border: 0px" readonly required aria-required="true" aria-describedby="name-format"></td><td></td><td><strong>Consultation</strong></td><td><input type="text" name="cons" value="<?php echo $consultation;?>" style="border: 0px" readonly></td><td><input type="text" name="patient_id" value="<?php echo $pid;?>" style="display:none"></td><td></td><td></td><td></td>
		</tr>
		<tr></tr>
		<td></td><td></td><td></td><td></td><th>Medicines</th><th>Quantity</th><th>Unit Price</th><th>Total</th><th>Consumables</th><th>Quantity</th><th>Unit Price</th><th>Total</th><td></td><td></td><td></td><td></td>
		</tr>
		<tr><td></td><td></td><td></td><td></td><td> <input type="text" name="mymed1" value="<?php echo $acte1;?>" style="border: 0px" readonly></td><td><input type="text" name="quantmed1" value="<?php echo $qacte1;?>" size="5" style="border:0px" readonly></td><td><input type="text" name="upmed1" value="<?php echo $upacte1;?>"size="8" style="border:0px" readonly></td><td><input type="text" name="totmed1" value="<?php if($totacte1==0){echo'';} else{echo $totacte1;}?>" size="10" style="border:0px" readonly></td><td><input type="text" name="consum1" value="<?php echo $ex1;?>"  style="border:0px" readonly></td><td><input type="text" name="quantitcons1"value="<?php echo $qex1;?>" size="5" style="border:0px" readonly></td><td><input type="text" name="unitcons1" value="<?php echo $upex1;?>" size="8" style="border:0px" readonly></td><td><input type="text" name="totconsom1" value="<?php if($totexamen1==0){echo'';} else{echo$totexamen1;}?>" style="border:0px" readonly> </td><td></td><td></td><td></td><td></td></tr>
		<tr><td></td><td></td><td></td><td></td><td> <input type="text" name="mymed2" value="<?php echo $acte2;?>" style="border: 0px" readonly></td><td><input type="text" name="quantmed2" value="<?php echo $qacte2;?>" size="5" style="border:0px" readonly></td><td><input type="text" name="upmed2" value="<?php echo $upacte2;?>"size="8" style="border:0px" readonly></td><td><input type="text" name="totmed2" value="<?php if($totacte2==0){echo'';} else{echo $totacte2;}?>" size="10" style="border:0px" readonly></td><td><input type="text" name="consum2" value="<?php echo $ex2;?>"  style="border:0px" readonly></td><td><input type="text" name="quantitcons2"value="<?php echo $qex2;?>" size="5" style="border:0px" readonly></td><td><input type="text" name="unitcons2" value="<?php echo $upex2;?>" size="8" style="border:0px" readonly></td><td><input type="text" name="totconsom2" value="<?php if($totexamen2==0){echo'';} else{echo$totexamen2;}?>" style="border:0px" readonly></td><td></td><td></td><td></td><td></td></tr>
		<tr><td></td><td></td><td></td><td></td><td> <input type="text" name="mymed3" value="<?php echo $acte3;?>" style="border: 0px" readonly></td><td><input type="text" name="quantmed3" value="<?php echo $qacte3;?>" size="5" style="border:0px" readonly></td><td><input type="text" name="upmed3" value="<?php echo $upacte3;?>"size="8" style="border:0px" readonly></td><td><input type="text" name="totmed3" value="<?php if($totacte3==0){echo'';} else{echo $totacte3;}?>" size="10" style="border:0px" readonly></td><td><input type="text" name="consum3" value="<?php echo $ex3;?>"  style="border:0px" readonly></td><td><input type="text" name="quantitcons3"value="<?php echo $qex3;?>" size="5" style="border:0px" readonly></td><td><input type="text" name="unitcons3" value="<?php echo $upex3;?>" size="8" style="border:0px" readonly></td><td><input type="text" name="totconsom1" value="<?php if($totexamen3==0){echo'';} else{echo$totexamen3;}?>" style="border:0px" readonly></td><td></td><td></td><td></td><td></td></tr>
		<tr><td></td><td></td><td></td><td></td><td> <input type="text" name="mymed4" value="<?php echo $acte4;?>" style="border: 0px" readonly></td><td><input type="text" name="quantmed4" value="<?php echo $qacte4;?>" size="5" style="border:0px" readonly></td><td><input type="text" name="upmed4" value="<?php echo $upacte4;?>"size="8" style="border:0px" readonly></td><td><input type="text" name="totmed4" value="<?php if($totacte4==0){echo'';} else{echo $totacte4;}?>" size="10" style="border:0px" readonly></td><td><input type="text" name="consum4" value="<?php echo $ex4;?>"  style="border:0px" readonly></td><td><input type="text" name="quantitcons4"value="<?php echo $qex4;?>" size="5" style="border:0px" readonly></td><td><input type="text" name="unitcons4" value="<?php echo $upex4;?>" size="8" style="border:0px" readonly></td><td><input type="text" name="totconsom1" value="<?php if($totexamen4==0){echo'';} else{echo$totexamen4;}?>" style="border:0px" readonly></td><td></td><td></td><td></td><td></td></tr>
		<tr><td></td><td></td><td></td><td></td><td> <input type="text" name="mymed5" value="<?php echo $acte5;?>" style="border: 0px" readonly></td><td><input type="text" name="quantmed5" value="<?php echo $qacte5;?>" size="5" style="border:0px" readonly></td><td><input type="text" name="upmed5" value="<?php echo $upacte5;?>"size="8" style="border:0px" readonly></td><td><input type="text" name="totmed5" value="<?php if($totacte5==0){echo'';} else{echo $totacte5;}?>" size="10" style="border:0px" readonly></td><td><input type="text" name="consum5" value="<?php echo $ex5;?>"  style="border:0px" readonly></td><td><input type="text" name="quantitcons5"value="<?php echo $qex5;?>" size="5" style="border:0px" readonly></td><td><input type="text" name="unitcons5" value="<?php echo $upex5;?>" size="8" style="border:0px" readonly></td><td><input type="text" name="totconsom1" value="<?php if($totexamen5==0){echo'';} else{echo$totexamen5;}?>" style="border:0px" readonly></td><td></td><td></td><td></td><td></td></tr>
		<tr><td></td><td></td><td></td><td></td><td> <input type="text" name="mymed6" value="<?php echo $acte6;?>" style="border: 0px" readonly></td><td><input type="text" name="quantmed6" value="<?php echo $qacte6;?>" size="5" style="border:0px" readonly></td><td><input type="text" name="upmed6" value="<?php echo $upacte6;?>"size="8" style="border:0px" readonly></td><td><input type="text" name="totmed6" value="<?php if($totacte6==0){echo'';} else{echo $totacte6;}?>" size="10" style="border:0px" readonly></td><td><input type="text" name="consum6" value="<?php echo $ex6;?>"  style="border:0px" readonly></td><td><input type="text" name="quantitcons6"value="<?php echo $qex6;?>" size="5" style="border:0px" readonly></td><td><input type="text" name="unitcons6" value="<?php echo $upex6;?>" size="8" style="border:0px" readonly></td><td><input type="text" name="totconsom1" value="<?php if($totexamen6==0){echo'';} else{echo$totexamen6;}?>" style="border:0px" readonly></td><td></td><td></td><td></td><td></td></tr>
		<tr><td></td><td></td><td></td><td></td><td> <input type="text" name="mymed7" value="<?php echo $acte7;?>" style="border: 0px" readonly></td><td><input type="text" name="quantmed7" value="<?php echo $qacte7;?>" size="5" style="border:0px" readonly></td><td><input type="text" name="upmed7" value="<?php echo $upacte7;?>"size="8" style="border:0px" readonly></td><td><input type="text" name="totmed7" value="<?php if($totacte7==0){echo'';} else{echo $totacte7;}?>" size="10" style="border:0px" readonly></td><td><input type="text" name="consum7" value="<?php echo $ex7;?>"  style="border:0px" readonly></td><td><input type="text" name="quantitcons7"value="<?php echo $qex7;?>" size="5" style="border:0px" readonly></td><td><input type="text" name="unitcons7" value="<?php echo $upex7;?>" size="8" style="border:0px" readonly></td><td><input type="text" name="totconsom1" value="<?php if($totexamen7==0){echo'';} else{echo$totexamen7;}?>" style="border:0px" readonly></td><td></td><td></td><td></td><td></td></tr>
		<tr><td></td><td></td><td></td><td></td><td> </td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
		<tr><td></td><td></td><td></td><td></td><td> </td><td></td><td></td><td><strong>Grand Total</strong></td><td><strong><?php echo number_format((float)$ggrandtotal,1);?></strong></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
		</table>
		<br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="save" id="save" value="SAVE">
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="cancel" id="save" value="CANCEL">
			</form>
		</div>
		</div>
		</div>
		</div>