<?php
error_reporting(0);
if (isset($_POST["bigbutton"])) {
    // extract data from form; store in variable
    $consultation = $_POST["consultation"];
	$pid = $_POST["p_id"];
    $num = $_POST["number"];
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
	$id1 = $_POST["id1"];
	$id2 = $_POST["id2"];
	$id3 = $_POST["id3"];
	$id4 = $_POST["id4"];
	$id5 = $_POST["id5"];
	$id6 = $_POST["id6"];
	$id7 = $_POST["id7"];
	$idc1 = $_POST["idc1"];
	$idc2 = $_POST["idc2"];
	$idc3 = $_POST["idc3"];
	$idc4 = $_POST["idc4"];
	$idc5 = $_POST["idc5"];
	$idc6 = $_POST["idc6"];
	$idc7 = $_POST["idc7"];
	$number=$_POST["p_id"];
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
		
	if (!empty($acte1) or !empty($qacte1)) {
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
			
		$update1="update consomation set actemedicale='$acte1',upacte='$upacte1',qtyacte='$qacte1' where consid= $myconsid ";
	($update1);

	}
	if (!empty($ex1) or !empty($qex1)) {
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
		
		if (!empty($ex1) and !empty($upex1)) {
            if (empty($qex1)) {
                echo "<center>";
                echo "<h3>!!Data not Saved!!</h3>";
                die("<h4>Please Fill  Quantity for Lab Test One</h4>");
                echo "</center>";
            }
        }
		
	
		$update11="update consomation set examenmedicale='$ex1',upexamen='$upex1',qtyexamen='$qex1' where consid= $myconsid ";
	($update11);

	}
	if (!empty($acte2) or !empty($qacte2)) {
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
		
		$update2="update consomation set actemedicale='$acte2',upacte='$upacte2',qtyacte='$qacte2' where consid= ($myconsid-1) AND id = $myid ";
	($update2);		
	}

	if (!empty($ex2) or !empty($qex2)) {
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
		
		if (!empty($ex2) and !empty($upex2)) {
            if (empty($qex2)) {
                echo "<center>";
                echo "<h3>!!Data not Saved!!</h3>";
                die("<h4>Please Fill  Quantity for Lab Test Two</h4>");
                echo "</center>";
            }
        }
		
		$update21="update consomation set examenmedicale='$ex2',
upexamen='$upex2',qtyexamen='$qex2' where consid= ($myconsid-1) AND id = $myid ";
	($update21);		
	}
	
	if (!empty($acte3) or !empty($qacte3)) {
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
		
		
		$update3="update consomation set actemedicale='$acte3',upacte='$upacte3',qtyacte='$qacte3' where consid= ($myconsid-2)AND id = $myid ";
	($update3);
    		
	}
	if (!empty($ex3) or !empty($qex3)) {
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
		if (!empty($ex3) and !empty($upex3)) {
            if (empty($qex3)) {
                echo "<center>";
                echo "<h3>!!Data not Saved!!</h3>";
                die("<h4>Please Fill  Quantity for Lab Test Three</h4>");
                echo "</center>";
            }
        }
		
		$update31="update consomation set examenmedicale='$ex3',upexamen='$upex3',qtyexamen='$qex3' where consid= ($myconsid-2)AND id = $myid ";
	($update31);
    		
	}
	if (!empty($acte4) or !empty($qacte4)) {
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
			
		$update4="update consomation set actemedicale='$acte4',upacte='$upacte4',qtyacte='$qacte4' where consid= ($myconsid-3)AND id = $myid ";
	($update4);
   }
   
   if (!empty($ex4) or !empty($qex4)) {
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
		
		if (!empty($ex4) and !empty($upex4)) {
            if (empty($qex4)) {
                echo "<center>";
                echo "<h3>!!Data not Saved!!</h3>";
                die("<h4>Please Fill  Quantity for Lab Test Four</h4>");
                echo "</center>";
            }
        }
		
		$update41="update consomation set actemedicale=examenmedicale='$ex4',
upexamen='$upex4',qtyexamen='$qex4' where consid= ($myconsid-3)AND id = $myid ";
	($update41);
   }
   
   
	if (!empty($acte5) or !empty($qacte5)) {
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
		
		$update5="update consomation set actemedicale='$acte5',upacte='$upacte5',qtyacte='$qacte5' where consid= ($myconsid-4)AND id = $myid ";
	($update5);
	}
	
	if  (!empty($ex5) or !empty($qex5)) {
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
		
		if (!empty($ex5) and !empty($upex5)) {
            if (empty($qex5)) {
                echo "<center>";
                echo "<h3>!!Data not Saved!!</h3>";
                die("<h4>Please Fill  Quantity for Lab Test Five</h4>");
                echo "</center>";
            }
        }
		
		$update51="update consomation set examenmedicale='$ex5',
upexamen='$upex5',qtyexamen='$qex5' where consid= ($myconsid-4)AND id = $myid ";
	($update51);
	}
	
	
	if (!empty($acte6) or !empty($qacte6)) {
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
		
		$update6="update consomation set actemedicale='$acte6',upacte='$upacte6',qtyacte='$qacte6' where consid= ($myconsid-5)AND id = $myid ";
	($update6);
    }
	
	if (!empty($ex6) or !empty($qex6)) {
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
		
		if (!empty($ex6) and !empty($upex6)) {
            if (empty($qex6)) {
                echo "<center>";
                echo "<h3>!!Data not Saved!!</h3>";
                die("<h4>Please Fill  Quantity for Lab Test Six</h4>");
                echo "</center>";
            }
        }
		
		$update61="update consomation set examenmedicale='$ex6',
upexamen='$upex6',qtyexamen='$qex6' where consid= ($myconsid-5)AND id = $myid ";
	($update61);
    }
	
	if (!empty($acte7) or !empty($qacte7)) {
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
				
		$update7="update consomation set actemedicale='$acte7',upacte='$upacte7',qtyacte='$qacte7' where consid= ($myconsid-6)AND id = $myid ";
	($update7);
 		
	}
	
	if (!empty($ex7) or !empty($qex7)) {
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
		if (!empty($ex7) and !empty($upex7)) {
            if (empty($qex7)) {
                echo "<center>";
                echo "<h3>!!Data not Saved!!</h3>";
                die("<h4>Please Fill  Quantity for Lab Test Seven</h4>");
                echo "</center>";
            }
        }
		
		$update71="update consomation set examenmedicale='$ex7',
upexamen='$upex7',qtyexamen='$qex7' where consid= ($myconsid-6)AND id = $myid ";
	($update71);
 		
	}
	
	
	
	if ((!$insert1) and (!$insert2)and (!$insert3)and (!$insert4)and (!$insert5)and (!$insert6)and (!$insert7)){
			echo "Saved";
		}
		if (($insert1) or ($insert2)or ($insert3)or ($insert4)or ($insert5)or ($insert6)or ($insert7)){
		header("location:cashier.php");
	}		

}
?>  