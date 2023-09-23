<?php
error_reporting(0);
if (isset($_POST["bigbutton"])) {
	session_start();	
    $_SESSION["consultation"]=$_POST["consultation"];
    $consultation = $_SESSION["consultation"];
	$_SESSION["p_id"]=$_POST["p_id"];
	$pid = $_SESSION["p_id"];
	$_SESSION["number"]=$_POST["number"];
    $num = $_SESSION["number"];
	$_SESSION["mmed1"]=$_POST['mmed1'];
    $med1 = $_SESSION["mmed1"];
    $_SESSION["up1"] = $_POST["up1"];
	$up1=$_SESSION["up1"];
    $_SESSION["qmed1"] = $_POST["qmed1"];
	$qt1= $_SESSION["qmed1"];
	$_SESSION["cons1"]=$_POST['ccons1'];
    $cons1 = $_SESSION["cons1"];
	$_SESSION["upcons1"]=$_POST["upcons1"];
    $upcons1 = $_SESSION["upcons1"];
    $_SESSION["qcons1"] = $_POST["qcosum1"];
    $qcons1=$_SESSION["qcons1"];
	$_SESSION["mmed2"]=$_POST['mmed2'];
    $med2 = $_SESSION["mmed2"];
    $_SESSION["up2"] = $_POST["up2"];
	$up2=$_SESSION["up2"];
    $_SESSION["qmed2"] = $_POST["qmed2"];
	$qt2= $_SESSION["qmed2"];
	$_SESSION["cons2"]=$_POST['ccons2'];
    $cons2 = $_SESSION["cons2"];
	$_SESSION["upcons2"]=$_POST["upcons2"];
    $upcons2 = $_SESSION["upcons2"];
    $_SESSION["qcons2"] = $_POST["qcosum2"];
    $qcons2=$_SESSION["qcons2"];

	$_SESSION["mmed3"]=$_POST['mmed3'];
    $med3 = $_SESSION["mmed3"];
    $_SESSION["up3"] = $_POST["up3"];
	$up3=$_SESSION["up3"];
    $_SESSION["qmed3"] = $_POST["qmed3"];
	$qt3= $_SESSION["qmed3"];
	$_SESSION["cons3"]=$_POST['ccons3'];
    $cons3 = $_SESSION["cons3"];
	$_SESSION["upcons3"]=$_POST["upcons3"];
    $upcons3 = $_SESSION["upcons3"];
    $_SESSION["qcons3"] = $_POST["qcosum3"];
    $qcons3=$_SESSION["qcons3"];

	$_SESSION["mmed4"]=$_POST['mmed4'];
    $med4 = $_SESSION["mmed4"];
    $_SESSION["up4"] = $_POST["up4"];
	$up4=$_SESSION["up4"];
    $_SESSION["qmed4"] = $_POST["qmed4"];
	$qt4= $_SESSION["qmed4"];
	$_SESSION["cons4"]=$_POST['ccons4'];
    $cons4 = $_SESSION["cons4"];
	$_SESSION["upcons4"]=$_POST["upcons4"];
    $upcons4 = $_SESSION["upcons4"];
    $_SESSION["qcons4"] = $_POST["qcosum4"];
    $qcons4=$_SESSION["qcons4"];

	$_SESSION["mmed5"]=$_POST['mmed5'];
    $med5 = $_SESSION["mmed5"];
    $_SESSION["up5"] = $_POST["up5"];
	$up5=$_SESSION["up5"];
    $_SESSION["qmed5"] = $_POST["qmed5"];
	$qt5= $_SESSION["qmed5"];
	$_SESSION["cons5"]=$_POST['ccons5'];
    $cons5 = $_SESSION["cons5"];
	$_SESSION["upcons5"]=$_POST["upcons5"];
    $upcons5 = $_SESSION["upcons5"];
    $_SESSION["qcons5"] = $_POST["qcosum5"];
    $qcons5=$_SESSION["qcons5"];

	$_SESSION["mmed6"]=$_POST['mmed6'];
    $med6 = $_SESSION["mmed6"];
    $_SESSION["up6"] = $_POST["up6"];
	$up6=$_SESSION["up6"];
    $_SESSION["qmed6"] = $_POST["qmed6"];
	$qt6= $_SESSION["qmed6"];
	$_SESSION["cons6"]=$_POST['ccons6'];
    $cons6 = $_SESSION["cons6"];
	$_SESSION["upcons6"]=$_POST["upcons6"];
    $upcons6 = $_SESSION["upcons6"];
    $_SESSION["qcons6"] = $_POST["qcosum6"];
    $qcons6=$_SESSION["qcons6"];

    $_SESSION["mmed7"]=$_POST['mmed7'];
    $med7 = $_SESSION["mmed7"];
    $_SESSION["up7"] = $_POST["up7"];
	$up7=$_SESSION["up7"];
    $_SESSION["qmed7"] = $_POST["qmed7"];
	$qt7= $_SESSION["qmed7"];
	$_SESSION["cons7"]=$_POST['ccons7'];
    $cons7 = $_SESSION["cons7"];
	$_SESSION["upcons7"]=$_POST["upcons7"];
    $upcons7 = $_SESSION["upcons7"];
    $_SESSION["qcons7"] = $_POST["qcosum7"];
    $qcons7=$_SESSION["qcons7"];

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
	$_SESSION['number']=$_POST["p_id"];
	$number=$_SESSION['number'];
$totmedic1=$up1*$qt1;
$totmedic2=$up2*$qt2;
$totmedic3=$up3*$qt3;
$totmedic4=$up4*$qt4;
$totmedic5=$up5*$qt5;
$totmedic6=$up6*$qt6;
$totmedic7=$up7*$qt7;
$totcons1=$upcons1*$qcons1;
$totcons2=$upcons2*$qcons2;
$totcons3=$upcons3*$qcons3;
$totcons4=$upcons4*$qcons4;
$totcons5=$upcons5*$qcons5;
$totcons6=$upcons6*$qcons6;
$totcons7=$upcons7*$qcons7;
$ggrandtotal=$totmedic1+$totmedic2+$totmedic3+$totmedic4+$totmedic5+$totmedic6+$totmedic7
+$totcons1+$totcons2+$totcons3+$totcons4+$totcons5+$totcons6+$totcons7;
}
?> 
<?php
if (isset($_POST["save"])) {
	session_start();
    $consultation = $_SESSION["consultation"];
	$pid = $_SESSION["p_id"];
    $num = $_SESSION["number"];
    $med1 = $_SESSION["mmed1"];
	$up1=$_SESSION["up1"];
	$qt1= $_SESSION["qmed1"];
    $cons1 = $_SESSION["cons1"];
    $upcons1 = $_SESSION["upcons1"];
    $qcons1=$_SESSION["qcons1"];
	
	$med2 = $_SESSION["mmed2"];
	$up2=$_SESSION["up2"];
	$qt2= $_SESSION["qmed2"];
    $cons2 = $_SESSION["cons2"];
    $upcons2 = $_SESSION["upcons2"];
    $qcons2=$_SESSION["qcons2"];
	
	$med3 = $_SESSION["mmed3"];
	$up3=$_SESSION["up3"];
	$qt3= $_SESSION["qmed3"];
    $cons3 = $_SESSION["cons3"];
    $upcons3 = $_SESSION["upcons3"];
    $qcons3=$_SESSION["qcons3"];
	
	$med4 = $_SESSION["mmed4"];
	$up4=$_SESSION["up4"];
	$qt4= $_SESSION["qmed4"];
    $cons4 = $_SESSION["cons4"];
    $upcons4 = $_SESSION["upcons4"];
    $qcons4=$_SESSION["qcons4"];
	
	$med5 = $_SESSION["mmed5"];
	$up5=$_SESSION["up5"];
	$qt5= $_SESSION["qmed5"];
    $cons5 = $_SESSION["cons5"];
    $upcons5 = $_SESSION["upcons5"];
    $qcons5=$_SESSION["qcons5"];
	
	$med6 = $_SESSION["mmed6"];
	$up6=$_SESSION["up6"];
	$qt6= $_SESSION["qmed6"];
    $cons6 = $_SESSION["cons6"];
    $upcons6 = $_SESSION["upcons6"];
    $qcons6=$_SESSION["qcons6"];
	
	$med7 = $_SESSION["mmed7"];
	$up7=$_SESSION["up7"];
	$qt7= $_SESSION["qmed7"];
    $cons7 = $_SESSION["cons7"];
    $upcons7 = $_SESSION["upcons7"];
    $qcons7=$_SESSION["qcons7"];
	$number=$_SESSION['number'];
	$conn = mysql_connect('localhost', 'root', 'fidele');
     //check if you can connect; if not then die
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
	$check = "SELECT consid,id,medicament,consommable from consomation WHERE id= '$number' ORDER BY consid DESC limit 1";
	$result = ($check) or die('Query failed: ' . mysql_error());
        while ($row = mysql_fetch_assoc($result)) {
		$myid=$row['id'];
		$myconsid = $row['consid'];
        $mycons=$row['consommable'];
		$mymed=$row['medicament'];
		}
   $check2 = "SELECT consid,id,medicament,consommable from consomation WHERE consid= ($myconsid-1) AND id = $myid";
	$result2 = ($check2) or die('Query failed: ' . mysql_error());
        while ($row2 = mysql_fetch_assoc($result2)) {
		   $nmyid2=$row2['id'];
		   $nmyconsid2 = $row2['consid'];
		   $mymed2= $row2['medicament'];
		   $mycons2=$row2['consommable'];
		}
		
			
		if (!empty($med1) or !empty($up1)) {
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
		if (!empty($med1) and !empty($up1)) {
            if (empty($qt1)) {
                echo "<center>";
                echo "<h3>!!Data not Saved!!</h3>";
                die("<h4>Please Fill Quantity for Medicine One</h4>");
                echo "</center>";
            }
        }
		
		if(($myid)and empty($mymed)){
		$update01="update consomation set medicament='$med1',upmedicamnet='$up1',qtymedicamnet='$qt1' where consid= $myconsid ";
	($update01);
		}
		
	}	
			
	if (!empty($cons1) or !empty($upcons1)) {
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
		
		if (!empty($cons1) and !empty($upcons1)) {
            if (empty($qcons1)) {
                echo "<center>";
                echo "<h3>!!Data not Saved!!</h3>";
                die("<h4>Please Fill  Quantity for Consumable One</h4>");
                echo "</center>";
            }
        }
		if(($myid)and empty($mycons)){
		$updatec1="update consomation set consommable='$cons1',UPcons='$upcons1',Qcons='$qcons1' where consid= $myconsid ";
	($updatec1);
		}
	
    		
	}
	if((!$myid)){
		$insert1 = ("INSERT INTO consomation (id,consultatiobn,medicament,upmedicamnet,qtymedicamnet,consommable,UPcons,Qcons,datecunsuption)VALUES('$pid','$consultation','$med1', '$up1','$qt1','$cons1','$upcons1','$qcons1',CURDATE())");
        }
	if(($myid) and (!empty($mymed) and !empty($mycons))){
		$insert01 = ("INSERT INTO consomation (id,consultatiobn,medicament,upmedicamnet,qtymedicamnet,consommable,UPcons,Qcons,datecunsuption)VALUES('$pid','$consultation','$med1', '$up1','$qt1','$cons1','$upcons1','$qcons1',CURDATE())");
        }
	if(($myid) and (empty($mymed) and !empty($mycons))){
		$insert11 = ("INSERT INTO consomation (id,consultatiobn,consommable,UPcons,Qcons,datecunsuption)VALUES('$pid','$consultation','$cons1','$upcons1','$qcons1',CURDATE())");
        }
	if(($myid) and (!empty($mymed) and empty($mycons))){
		$insert111 = ("INSERT INTO consomation (id,consultatiobn,medicament,upmedicamnet,qtymedicamnet,datecunsuption)VALUES('$pid','$consultation','$med1', '$up1','$qt1',CURDATE())");
        }
		
		
		
		
if (!empty($med2) or !empty($up2)) {
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
		if (!empty($med2) and !empty($up2)) {
            if (empty($qt2)) {
                echo "<center>";
                echo "<h3>!!Data not Saved!!</h3>";
                die("<h4>Please Fill Quantity for Medicine Two</h4>");
                echo "</center>";
            }
        }
		
	if(($nmyid2==$myid)and empty($mymed2)){
	$update2="update consomation set medicament='$med2',upmedicamnet='$up2',qtymedicamnet='$qt2' where consid= ($myconsid-1) AND id = $myid ";
	($update2);	
		  	$mymed2=='';		
		   }	 
			
}
	if (!empty($cons2) or !empty($upcons2)) {
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
		if (!empty($cons2) and !empty($upcons2)) {
            if (empty($qcons2)) {
                echo "<center>";
                echo "<h3>!!Data not Saved!!</h3>";
                die("<h4>Please Fill  Quantity for Consumable Two</h4>");
                echo "</center>";
            }
          }
		  
		if(($nmyid2==$myid)and empty($mymedc2)){
	$updatec2="update consomation set consommable='$cons2',UPcons='$upcons2',Qcons='$qcons2' where consid= ($myconsid-1) AND id = $myid ";
	($updatec2);	
		   }
	}
	if($nmyid2!=$myid){
		$insert2 = ("INSERT INTO consomation (id,consultatiobn,medicament,upmedicamnet,qtymedicamnet,consommable,UPcons,Qcons,datecunsuption)VALUES('$pid','$consultation','$med2', '$up2','$qt2','$cons2','$upcons2','$qcons2',CURDATE())");
        	
		   }
	if(($nmyid2=$myid)and (!empty($mymed2) and !empty($mycons2))){
		$insert02 = ("INSERT INTO consomation (id,consultatiobn,medicament,upmedicamnet,qtymedicamnet,consommable,UPcons,Qcons,datecunsuption)VALUES('$pid','$consultation','$med2', '$up2','$qt2','$cons2','$upcons2','$qcons2',CURDATE())");
	
	}
	
		   
	/*if((($nmyid2!=$myid) or $nmyidc2!=$myid) or !empty( $mymedc2) or !empty(mymed2)){
		$insert2 = ("INSERT INTO consomation (id,consultatiobn,medicament,upmedicamnet,qtymedicamnet,consommable,UPcons,Qcons,datecunsuption)VALUES('$pid','$consultation','$med2', '$up2','$qt2','$cons2','$upcons2','$qcons2',CURDATE())");
        	
		   }
	if (!empty($med3) or !empty($up3)) {
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
		if (!empty($med3) and !empty($up3)) {
            if (empty($qt3)) {
                echo "<center>";
                echo "<h3>!!Data not Saved!!</h3>";
                die("<h4>Please Fill Quantity for Medicine THREE</h4>");
                echo "</center>";
            }
        }
		
		$check3 = "SELECT consid,id,medicament from consomation WHERE consid= ($myconsid-2) AND id = $myid";
	$result3 = ($check3) or die('Query failed: ' . mysql_error());
        while ($row3 = mysql_fetch_assoc($result3)) {
			$nmyid3=$row3['id'];
		   $nmyconsid3 = $row3['consid'];
		   $mymed3= $row3['medicament'];
		
		}
		if(($nmyid3==$myid)and empty($mymed3)){
	$update3="update consomation set medicament='$med3',upmedicamnet='$up3',qtymedicamnet='$qt3' where consid= ($myconsid-2) AND id = $myid ";
	($update3);	
		   }
		}
		if (!empty($cons3) or !empty($upcons3)) {
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
		if (!empty($cons3) and !empty($upcons3)) {
            if (empty($qcons3)) {
                echo "<center>";
                echo "<h3>!!Data not Saved!!</h3>";
                die("<h4>Please Fill  Quantity for Consumable THREE</h4>");
                echo "</center>";
            }
          }
		  $checkc3 = "SELECT consid,id,consommable from consomation WHERE consid= ($myconsid-2) AND id = $myid";
	$resultc3 = ($checkc3) or die('Query failed: ' . mysql_error());
        while ($rowc3 = mysql_fetch_assoc($resultc3)) {
			$nmyidc3=$rowc3['id'];
		   $nmyconsidc3 = $rowc3['consid'];
		   $mymedc3= $rowc3['consommable'];
		}
		if(($nmyidc3==$myid)and empty($mymedc3)){
	$updatec3="update consomation set consommable='$cons3',UPcons='$upcons3',Qcons='$qcons3' where consid= ($myconsid-2) AND id = $myid ";
	($updatec3);	
		   }
		 
		}	 
		/*if((($nmyid3!=$myid) or $nmyidc3!=$myid)){
		$insert3 = ("INSERT INTO consomation (id,consultatiobn,medicament,upmedicamnet,qtymedicamnet,consommable,UPcons,Qcons,datecunsuption)VALUES('$pid','$consultation','$med3', '$up3','$qt3','$cons3','$upcons3','$qcons3',CURDATE())");
        	
		   }*/
			
	/*if (!empty($med3) or !empty($up3) or !empty($cons3) or !empty($upcons3)) {
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
		if (!empty($med3) and !empty($up3)) {
            if (empty($qt3)) {
                echo "<center>";
                echo "<h3>!!Data not Saved!!</h3>";
                die("<h4>Please Fill Quantity for Medicine Three</h4>");
                echo "</center>";
            }
        }
		if (!empty($cons3) and !empty($upcons3)) {
            if (empty($qcons3)) {
                echo "<center>";
                echo "<h3>!!Data not Saved!!</h3>";
                die("<h4>Please Fill  Quantity for Consumable Three</h4>");
                echo "</center>";
            }
        }
		
		$insert3 = ("INSERT INTO consomation (id,consultatiobn,medicament,upmedicamnet,qtymedicamnet,consommable,UPcons,Qcons,datecunsuption)VALUES('$pid','$consultation','$med3', '$up3','$qt3','$cons3','$upcons3','$qcons3',CURDATE())");
        if ($insert3) {
 $query = "SELECT * from prodicts where id = '$id3'"; 
 $queryc = "SELECT * from consommables where id = '$idc3'"; 
		
 $result = ($query) or die('Query failed: ' . mysql_error());
        while ($row = mysql_fetch_assoc($result)) {
			$qntity=$row['qtity'] ;
			$distr= $row['dist_quantity'];
			$newquantity3=$qntity-$qt3 ;
			$newdist3 = $distr-$qt3;
            $remain3=$newquantity3-$newdist;
		}
$resultc = ($queryc) or die('Query failed: ' . mysql_error());
        while ($rowc = mysql_fetch_assoc($resultc)) {
			$qntityc=$rowc['quantity'] ;
			$distrc= $rowc['dist_quantity'];
			$newquantityc3=$qntityc-$qcons3 ;
			$newdistc = $distrc-$qcons3;
            $remainc=$newquantityc3-$newdistc;           
		}
	if(!empty($id3) and ($id3!= 0)){
	$insert = ("insert into medicine_mvt(id,quantityout,sellingprice,dist_quantity,fixed_quantity,remain,action,bdate)values ('$id3',' $qt3','$up3','$newdist3','$newquantity3','$remain3','OUT',CURDATE())");
	$sql="update prodicts set dist_quantity = '$newdist3', qtity = '$newquantity3' , date = CURDATE() where id='$id3'";
		($sql);
	}
	if(!empty($idc3) and ($idc3!= 0)){
	$insertc = ("insert into consomable_mvt(id,qtyout,selling_price,dist_quantity,qntity,remain,movment,bdate)
	                                                   values ('$idc3','$qcons3','$upcons3','$newdistc','$newquantityc3','$remainc','OUT',CURDATE())");
	$sqlc = "update consommables set dist_quantity='$newdistc', quantity = '$newquantityc3' , date = CURDATE() where id='$idc3'";
		($sqlc);
		}
    
		
	}
		
	}
	if (!empty($med4) or !empty($up4) or !empty($cons4) or !empty($upcons4)) {
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
		if (!empty($med4) and !empty($up4)) {
            if (empty($qt4)) {
                echo "<center>";
                echo "<h3>!!Data not Saved!!</h3>";
                die("<h4>Please Fill Quantity for Medicine Four</h4>");
                echo "</center>";
            }
        }
		if (!empty($cons4) and !empty($upcons4)) {
            if (empty($qcons4)) {
                echo "<center>";
                echo "<h3>!!Data not Saved!!</h3>";
                die("<h4>Please Fill  Quantity for Consumable Four</h4>");
                echo "</center>";
            }
        }
				
		$insert4 = ("INSERT INTO consomation (id,consultatiobn,medicament,upmedicamnet,qtymedicamnet,consommable,UPcons,Qcons,datecunsuption)VALUES('$pid','$consultation','$med4', '$up4','$qt4','$cons4','$upcons4','$qcons4',CURDATE())");
        if ($insert4) {
 $query = "SELECT * from prodicts where id = '$id4'"; 
 $queryc = "SELECT * from consommables where id = '$idc4'"; 
		
 $result = ($query) or die('Query failed: ' . mysql_error());
        while ($row = mysql_fetch_assoc($result)) {
			$qntity=$row['qtity'] ;
			$distr= $row['dist_quantity'];
			$newquantity4=$qntity-$qt4 ;
			$newdist4 = $distr-$qt4;
            $remain4=$newquantity4-$newdist;
		}
$resultc = ($queryc) or die('Query failed: ' . mysql_error());
        while ($rowc = mysql_fetch_assoc($resultc)) {
			$qntityc=$rowc['quantity'] ;
			$distrc= $rowc['dist_quantity'];
			$newquantityc4=$qntityc-$qcons4 ;
			$newdistc = $distrc-$qcons4;
            $remainc=$newquantityc4-$newdistc;           
		}
	if(!empty($id4) and ($id4!= 0)){
	$insert = ("insert into medicine_mvt(id,quantityout,sellingprice,dist_quantity,fixed_quantity,remain,action,bdate)values ('$id4',' $qt4','$up4','$newdist4','$newquantity4','$remain4','OUT',CURDATE())");
	$sql="update prodicts set dist_quantity = '$newdist4', qtity = '$newquantity4' , date = CURDATE() where id='$id4'";
		($sql);
	}
	if(!empty($idc4) and ($idc4!= 0)){
	$insertc = ("insert into consomable_mvt(id,qtyout,selling_price,dist_quantity,qntity,remain,movment,bdate)
	                                                   values ('$idc4','$qcons4','$upcons4','$newdistc','$newquantityc4','$remainc','OUT',CURDATE())");
	$sqlc = "update consommables set dist_quantity='$newdistc', quantity = '$newquantityc4' , date = CURDATE() where id='$idc4'";
		($sqlc);
		}
    
		
	}
		
	}
	if (!empty($med5) or !empty($up5) or !empty($cons5) or !empty($upcons5)) {
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
		if (!empty($med5) and !empty($up5)) {
            if (empty($qt5)) {
                echo "<center>";
                echo "<h3>!!Data not Saved!!</h3>";
                die("<h4>Please Fill Quantity for Medicine Five</h4>");
                echo "</center>";
            }
        }
		if (!empty($cons5) and !empty($upcons5)) {
            if (empty($qcons5)) {
                echo "<center>";
                echo "<h3>!!Data not Saved!!</h3>";
                die("<h4>Please Fill  Quantity for Consumable Five</h4>");
                echo "</center>";
            }
        }
				
		$insert5 = ("INSERT INTO consomation (id,consultatiobn,medicament,upmedicamnet,qtymedicamnet,consommable,UPcons,Qcons,datecunsuption)VALUES('$pid','$consultation','$med5', '$up5','$qt5','$cons5','$upcons5','$qcons5',CURDATE())");
        if ($insert5) {
 $query = "SELECT * from prodicts where id = '$id5'"; 
 $queryc = "SELECT * from consommables where id = '$idc5'"; 
		
 $result = ($query) or die('Query failed: ' . mysql_error());
        while ($row = mysql_fetch_assoc($result)) {
			$qntity=$row['qtity'] ;
			$distr= $row['dist_quantity'];
			$newquantity5=$qntity-$qt5 ;
			$newdist5 = $distr-$qt5;
            $remain5=$newquantity5-$newdist;
		}
$resultc = ($queryc) or die('Query failed: ' . mysql_error());
        while ($rowc = mysql_fetch_assoc($resultc)) {
			$qntityc=$rowc['quantity'] ;
			$distrc= $rowc['dist_quantity'];
			$newquantityc5=$qntityc-$qcons5 ;
			$newdistc = $distrc-$qcons5;
            $remainc=$newquantityc5-$newdistc;           
		}
	if(!empty($id5) and ($id5!= 0)){
	$insert = ("insert into medicine_mvt(id,quantityout,sellingprice,dist_quantity,fixed_quantity,remain,action,bdate)values ('$id5',' $qt5','$up5','$newdist5','$newquantity5','$remain5','OUT',CURDATE())");
	$sql="update prodicts set dist_quantity = '$newdist5', qtity = '$newquantity5' , date = CURDATE() where id='$id5'";
		($sql);
	}
	if(!empty($idc5) and ($idc5!= 0)){
	$insertc = ("insert into consomable_mvt(id,qtyout,selling_price,dist_quantity,qntity,remain,movment,bdate)
	                                                   values ('$idc5','$qcons5','$upcons5','$newdistc','$newquantityc5','$remainc','OUT',CURDATE())");
	$sqlc = "update consommables set dist_quantity='$newdistc', quantity = '$newquantityc5' , date = CURDATE() where id='$idc5'";
		($sqlc);
		}
    
		
	}
		
	}
	if (!empty($med6) or !empty($up6) or !empty($cons6) or !empty($upcons6)) {
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
		if (!empty($med6) and !empty($up6)) {
            if (empty($qt6)) {
                echo "<center>";
                echo "<h3>!!Data not Saved!!</h3>";
                die("<h4>Please Fill Quantity for Medicine Six</h4>");
                echo "</center>";
            }
        }
		if (!empty($cons6) and !empty($upcons6)) {
            if (empty($qcons6)) {
                echo "<center>";
                echo "<h3>!!Data not Saved!!</h3>";
                die("<h4>Please Fill  Quantity for Consumable Six</h4>");
                echo "</center>";
            }
        }
			
		$insert6 = ("INSERT INTO consomation (id,consultatiobn,medicament,upmedicamnet,qtymedicamnet,consommable,UPcons,Qcons,datecunsuption)VALUES('$pid','$consultation','$med6', '$up6','$qt6','$cons6','$upcons6','$qcons6',CURDATE())");
        if ($insert6) {
 $query = "SELECT * from prodicts where id = '$id6'"; 
 $queryc = "SELECT * from consommables where id = '$idc6'"; 
		
 $result = ($query) or die('Query failed: ' . mysql_error());
        while ($row = mysql_fetch_assoc($result)) {
			$qntity=$row['qtity'] ;
			$distr= $row['dist_quantity'];
			$newquantity6=$qntity-$qt6 ;
			$newdist6 = $distr-$qt6;
            $remain6=$newquantity6-$newdist;
		}
$resultc = ($queryc) or die('Query failed: ' . mysql_error());
        while ($rowc = mysql_fetch_assoc($resultc)) {
			$qntityc=$rowc['quantity'] ;
			$distrc= $rowc['dist_quantity'];
			$newquantityc6=$qntityc-$qcons6 ;
			$newdistc = $distrc-$qcons6;
            $remainc=$newquantityc6-$newdistc;           
		}
	if(!empty($id6) and ($id6!= 0)){
	$insert = ("insert into medicine_mvt(id,quantityout,sellingprice,dist_quantity,fixed_quantity,remain,action,bdate)values ('$id6',' $qt6','$up6','$newdist6','$newquantity6','$remain6','OUT',CURDATE())");
	$sql="update prodicts set dist_quantity = '$newdist6', qtity = '$newquantity6' , date = CURDATE() where id='$id6'";
		($sql);
	}
	if(!empty($idc6) and ($idc6!= 0)){
	$insertc = ("insert into consomable_mvt(id,qtyout,selling_price,dist_quantity,qntity,remain,movment,bdate)
	                                                   values ('$idc6','$qcons6','$upcons6','$newdistc','$newquantityc6','$remainc','OUT',CURDATE())");
	$sqlc = "update consommables set dist_quantity='$newdistc', quantity = '$newquantityc6' , date = CURDATE() where id='$idc6'";
		($sqlc);
		}
    
		
	}
		
	}
	if (!empty($med7) or !empty($up7) or !empty($cons7) or !empty($upcons7)) {
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
		if (!empty($med7) and !empty($up7)) {
            if (empty($qt7)) {
                echo "<center>";
                echo "<h3>!!Data not Saved!!</h3>";
                die("<h4>Please Fill Quantity for Medicine Seven</h4>");
                echo "</center>";
            }
        }
		if (!empty($cons7) and !empty($upcons7)) {
            if (empty($qcons7)) {
                echo "<center>";
                echo "<h3>!!Data not Saved!!</h3>";
                die("<h4>Please Fill  Quantity for Consumable Seven</h4>");
                echo "</center>";
            }
        }
				
		$insert7 = ("INSERT INTO consomation (id,consultatiobn,medicament,upmedicamnet,qtymedicamnet,consommable,UPcons,Qcons,datecunsuption)VALUES('$pid','$consultation','$med7', '$up7','$qt7','$cons7','$upcons7','$qcons7',CURDATE())");
        if ($insert7) {
 $query = "SELECT * from prodicts where id = '$id7'"; 
 $queryc = "SELECT * from consommables where id = '$idc7'"; 
		
 $result = ($query) or die('Query failed: ' . mysql_error());
        while ($row = mysql_fetch_assoc($result)) {
			$qntity=$row['qtity'] ;
			$distr= $row['dist_quantity'];
			$newquantity7=$qntity-$qt7 ;
			$newdist7 = $distr-$qt7;
            $remain7=$newquantity7-$newdist;
		}
$resultc = ($queryc) or die('Query failed: ' . mysql_error());
        while ($rowc = mysql_fetch_assoc($resultc)) {
			$qntityc=$rowc['quantity'] ;
			$distrc= $rowc['dist_quantity'];
			$newquantityc7=$qntityc-$qcons7 ;
			$newdistc = $distrc-$qcons7;
            $remainc=$newquantityc7-$newdistc;           
		}
	if(!empty($id7) and ($id7!= 0)){
	$insert = ("insert into medicine_mvt(id,quantityout,sellingprice,dist_quantity,fixed_quantity,remain,action,bdate)values ('$id7',' $qt7','$up7','$newdist7','$newquantity7','$remain7','OUT',CURDATE())");
	$sql="update prodicts set dist_quantity = '$newdist7', qtity = '$newquantity7' , date = CURDATE() where id='$id7'";
		($sql);
	}
	if(!empty($idc7) and ($idc7!= 0)){
	$insertc = ("insert into consomable_mvt(id,qtyout,selling_price,dist_quantity,qntity,remain,movment,bdate)
	                                                   values ('$idc7','$qcons7','$upcons7','$newdistc','$newquantityc7','$remainc','OUT',CURDATE())");
	$sqlc = "update consommables set dist_quantity='$newdistc', quantity = '$newquantityc7' , date = CURDATE() where id='$idc7'";
		($sqlc);
		}
    
		
	}
		
	}
	if ((!$insert1) and (!$insert2)and (!$insert3)and (!$insert4)and (!$insert5)and (!$insert6)and (!$insert7)){
			echo "Not Saved";
		}
		if (($insert1) or ($insert2)or ($insert3)or ($insert4)or ($insert5)or ($insert6)or ($insert7)){
		header("location:pharmacien.php");
		}/*/
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
		<td></td><td></td><td></td><td></td><th>Medicines</th><th>Quantity</th><th>Unit Price</th><th>Total</th><th>Consumables</th><th>Quantity</th><th>Unit Price</th><th>Total</th><td></td><td></td><td></td><td></td>
		</tr>
		<tr><td></td><td></td><td></td><td></td><td> <?php echo $med1;?></td><td><?php echo $qt1;?></td><td><?php echo $up1;?></td><td><?php if($totmedic1==0){echo'';} else{echo $totmedic1;}?></td><td><?php echo $cons1;?></td><td><?php echo $qcons1;?></td><td><?php echo $upcons1;?></td><td><?php if($totcons1==0){echo"";} else{echo$totcons1;}?></td><td></td><td></td><td></td><td></td></tr>
		<tr><td></td><td></td><td></td><td></td><td> <?php echo $med2;?></td><td><?php echo $qt2;?></td><td><?php echo $up2;?></td><td><?php if($totmedic2==0){echo'';} else{echo $totmedic2;}?></td><td><?php echo $cons2;?></td><td><?php echo $qcons2;?></td><td><?php echo $upcons2;?></td><td><?php if($totcons2==0){echo"";} else{echo$totcons2;}?></td><td></td><td></td><td></td><td></td></tr>
		<tr><td></td><td></td><td></td><td></td><td> <?php echo $med3;?></td><td><?php echo $qt3;?></td><td><?php echo $up3;?></td><td><?php if($totmedic3==0){echo'';} else{echo $totmedic3;}?></td><td><?php echo $cons3;?></td><td><?php echo $qcons3;?></td><td><?php echo $upcons3;?></td><td><?php if($totcons3==0){echo"";} else{echo$totcons3;}?></td><td></td><td></td><td></td><td></td></tr>
		<tr><td></td><td></td><td></td><td></td><td> <?php echo $med4;?></td><td><?php echo $qt4;?></td><td><?php echo $up4;?></td><td><?php if($totmedic4==0){echo'';} else{echo $totmedic4;}?></td><td><?php echo $cons4;?></td><td><?php echo $qcons4;?></td><td><?php echo $upcons4;?></td><td><?php if($totcons4==0){echo"";} else{echo$totcons4;}?></td><td></td><td></td><td></td><td></td></tr>
		<tr><td></td><td></td><td></td><td></td><td> <?php echo $med5;?></td><td><?php echo $qt5;?></td><td><?php echo $up5;?></td><td><?php if($totmedic5==0){echo'';} else{echo $totmedic5;}?></td><td><?php echo $cons5;?></td><td><?php echo $qcons5;?></td><td><?php echo $upcons5;?></td><td><?php if($totcons5==0){echo"";} else{echo$totcons5;}?></td><td></td><td></td><td></td><td></td></tr>
		<tr><td></td><td></td><td></td><td></td><td> <?php echo $med6;?></td><td><?php echo $qt6;?></td><td><?php echo $up6;?></td><td><?php if($totmedic6==0){echo'';} else{echo $totmedic6;}?></td><td><?php echo $cons6;?></td><td><?php echo $qcons6;?></td><td><?php echo $upcons6;?></td><td><?php if($totcons6==0){echo"";} else{echo$totcons6;}?></td><td></td><td></td><td></td><td></td></tr>
		<tr><td></td><td></td><td></td><td></td><td> <?php echo $med7;?></td><td><?php echo $qt7;?></td><td><?php echo $up7;?></td><td><?php if($totmedic7==0){echo'';} else{echo $totmedic7;}?></td><td><?php echo $cons7;?></td><td><?php echo $qcons7;?></td><td><?php echo $upcons7;?></td><td><?php if($totcons7==0){echo"";} else{echo$totcons7;}?></td><td></td><td></td><td></td><td></td></tr>
		<tr><td></td><td></td><td></td><td></td><td> </td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
		<tr><td></td><td></td><td></td><td></td><td> </td><td></td><td></td><td><strong>Grand Total</strong></td><td><strong><?php echo number_format((float)$ggrandtotal,1);?></strong></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
		</table>
		<br><br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="save" id="save" value="SAVE">
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		</form>
		</div>
		</div>
		</div>
		</div>