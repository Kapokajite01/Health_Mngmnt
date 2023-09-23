<html>
<head>
<?php
error_reporting(0);
session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username'])  or ($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro')){
		if(($role!="Receptionist") or ($role!="Mutuelle"))
		{
      header('Location: logout');
		}
	}
    include_once('connect_db.php');
	

$affnumber = $_GET['affnumber'];
$dtconsult = $_GET['dtconsult'];
$patientnumber = $_GET['affnumber'];
$dt = $_GET['dtconsult'];
//Patient Identification

$patient ="SELECT * FROM patient WHERE id = '$patientnumber'";
$result = mysqli_query($conn, $patient);
while($rowPAT = mysqli_fetch_assoc($result)) {
	$fname = $rowPAT['names'];
	$lname = $rowPAT['lname'];
    $affiliate_number = $rowPAT['affiliate_number'];
    $gender = $rowPAT['gender'];
    $insurance = $rowPAT['insurance'];
    $dob = $rowPAT['dob'];
    $category = $rowPAT['category'];
    $fcode = $rowPAT['familycode'];
    $province = $rowPAT['province'];
    $district = $rowPAT['district'];
    $sector = $rowPAT['sector'];
    $cell = $rowPAT['cell'];
    $afname = $rowPAT['affiliate_names'];
    $aflname = $rowPAT['afilliate_lastname'];
    $afectation = $rowPAT['affectation'];
    $Nofiche = $rowPAT['policeno'];
}



//Consultation
$resultpa = ("select consultatiobn,datecunsuption FROM consomation_consom  where id ='$patientnumber'");
$pat = mysqli_query($conn, $resultpa);
while ($rowconsult = mysqli_fetch_assoc($pat)) {
$consultation = $rowconsult['consultatiobn'];	
$dateconsum = $rowconsult['datecunsuption'];	
}

//Examens
if($thisstatu == 'Completed' )
{
$labo  = ("select examenmedicale,qtyexamen,upexamen from consomation_consom WHERE id = '$patientnumber' and datecunsuption = '$dtconsult' and examenmedicale !=''");
$labores = mysqli_query($conn, $labo);
while ($rowlab = mysqli_fetch_assoc($labores)) {
$exemens[] = $rowlab['examenmedicale'];	
$qtties[] = $rowlab['qtyexamen'];	
$prices[] = $rowlab['upexamen'];	

}
}
else{
$labo  = ("select examen,examen_qty,examen_price,results,Noexamen from consom_labs WHERE patient_id = '$patientnumber'");
$labores = mysqli_query($conn, $labo);
while ($rowlab = mysqli_fetch_assoc($labores)) {
$exemens[] = $rowlab['examen'];	
$qtties[] = $rowlab['examen_qty'];	
$prices[] = $rowlab['examen_price'];	
$results[] = $rowlab['results'];
$Noexamen[] = $rowlab['Noexamen'];	
}
}
$ntable = COUNT($exemens);
//Medicines
$medi  = ("select medicament,upmedicamnet,qtymedicamnet from consomation_consom WHERE id = '$patientnumber' and medicament !=''");
$labores = mysqli_query($conn, $medi);
while ($rowlab = mysqli_fetch_assoc($labores)) {
$medicament[] = $rowlab['medicament'];	
$upmedicamnet[] = $rowlab['upmedicamnet'];	
$qtymedicamnet[] = $rowlab['qtymedicamnet'];	
}
$nomed = COUNT($medicament);
//Consommables
$labo  = ("select consommable,UPcons,Qcons from consomation_consom WHERE id = '$patientnumber' and consommable !=''");
$labores = mysqli_query($conn, $labo);
while ($rowlab = mysqli_fetch_assoc($labores)) {
$consommable[] = $rowlab['consommable'];	
$UPcons[] = $rowlab['UPcons'];	
$Qcons[] = $rowlab['Qcons'];	
}
$nocons= COUNT($consommable);

//Actes
$labo  = ("select actemedicale,upacte,qtyacte from consomation_consom WHERE id = '$patientnumber'  and actemedicale !=''");
$labores = mysqli_query($conn, $labo);
while ($rowlab = mysqli_fetch_assoc($labores)) {
$actemedicale[] = $rowlab['actemedicale'];	
$upacte[] = $rowlab['upacte'];	
$qtyacte[] = $rowlab['qtyacte'];	
}
$noact= COUNT($actemedicale);

//Hospitalizations
$labo  = ("select hospitalization,uphospitalizations,qtyhoapitalization from consomation_consom WHERE id = '$patientnumber' and hospitalization !=''");
$labores = mysqli_query($conn, $labo);
while ($rowlab = mysqli_fetch_assoc($labores)) {
$hospitalization[] = $rowlab['hospitalization'];	
$uphospitalizations[] = $rowlab['uphospitalizations'];	
$qtyhoapitalization[] = $rowlab['qtyhoapitalization'];	
}
$nohosp= COUNT($hospitalization);

$palainte="SELECT * FROM doctor_comments WHERE  	patient_id = '$patientnumber' and type='Plainte'";
$doctpl = mysqli_query($conn, $palainte);

while($rowpl = mysqli_fetch_assoc($doctpl)){
	$plainte =  $rowpl['comment'];
}

$etgeneral="SELECT * FROM doctor_comments WHERE patient_id = '$patientnumber' and type='Etat Gneneral'";
$docegen = mysqli_query($conn, $etgeneral);

while($roweg = mysqli_fetch_assoc($docegen)){
	$Etatgeneral =  $roweg['comment'];
}

$antecedent="SELECT * FROM doctor_comments WHERE patient_id = '$patientnumber' and type='Antecedent'";
$anteced = mysqli_query($conn, $antecedent);

while($rowant = mysqli_fetch_assoc($anteced)){
	$antedent =  $rowant['comment'];
}
$examenpysique="SELECT * FROM doctor_comments WHERE patient_id = '$patientnumber' and type='Examen Physique'";
$ephysique = mysqli_query($conn, $examenpysique);

?>
    <title>Convert HTML To PDF</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
	 <style>
table, th, td {
 
  border-collapse: collapse;
}
th, td {
  padding: 5px;
  text-align: left;    
}

      body {
      background-color: #eee;
      }
      input {
      border-top-style: hidden;
      border-right-style: hidden;
      border-left-style: hidden;
      border-bottom-style: groove;
      background-color: #eee;
      }
      .no-outline:focus {
      outline: none;
      }
	  hr {
    display: block;
    height: 1px;
    border: 0;
    border-top: 1px solid #ccc;
    margin: 1em 0;
    padding: 0;
}
    </style>
</head>
<body>
    <input type="button" id="create_pdf" value="Generate PDF">
   <form class="form" style="max-width: none; width: 1005px;">
    <h3>DEMO</h3>
    <p style="font-size: large">
        Convert HTML TO PDF:
    </p>
    <table class="table table-border">
        <tbody>
            <tr>
                <th>S.N.</th>
                <th>Employee Name</th>
                <th>Address</th>
                <th>Company</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Mike</td>
                <td>USA</td>
                <td>Microsoft</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Manoj Ranjit</td>
                <td>India</td>
                <td>Tata Motors</td>
            </tr>
            <tr>
                <td>3</td>
                <td>xìng</td>
                <td>China</td>
                <td>Alibaba</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Akari</td>
                <td>Japan</td>
                <td>Mitsubishi </td>
            </tr>
			<tr>
                <td>5</td>
                <td>Binod</td>
                <td>Nepal</td>
                <td>CG </td>
            </tr><tr>
                <th>S.N.</th>
                <th>Employee Name</th>
                <th>Address</th>
                <th>Company</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Mike</td>
                <td>USA</td>
                <td>Microsoft</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Manoj Ranjit</td>
                <td>India</td>
                <td>Tata Motors</td>
            </tr>
            <tr>
                <td>3</td>
                <td>xìng</td>
                <td>China</td>
                <td>Alibaba</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Akari</td>
                <td>Japan</td>
                <td>Mitsubishi </td>
            </tr>
			<tr>
                <td>5</td>
                <td>Binod</td>
                <td>Nepal</td>
                <td>CG </td>
            </tr><tr>
                <th>S.N.</th>
                <th>Employee Name</th>
                <th>Address</th>
                <th>Company</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Mike</td>
                <td>USA</td>
                <td>Microsoft</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Manoj Ranjit</td>
                <td>India</td>
                <td>Tata Motors</td>
            </tr>
            <tr>
                <td>3</td>
                <td>xìng</td>
                <td>China</td>
                <td>Alibaba</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Akari</td>
                <td>Japan</td>
                <td>Mitsubishi </td>
            </tr>
			<tr>
                <td>5</td>
                <td>Binod</td>
                <td>Nepal</td>
                <td>CG </td>
            </tr><tr>
                <th>S.N.</th>
                <th>Employee Name</th>
                <th>Address</th>
                <th>Company</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Mike</td>
                <td>USA</td>
                <td>Microsoft</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Manoj Ranjit</td>
                <td>India</td>
                <td>Tata Motors</td>
            </tr>
            <tr>
                <td>3</td>
                <td>xìng</td>
                <td>China</td>
                <td>Alibaba</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Akari</td>
                <td>Japan</td>
                <td>Mitsubishi </td>
            </tr>
			<tr>
                <td>5</td>
                <td>Binod</td>
                <td>Nepal</td>
                <td>CG </td>
            </tr><tr>
                <th>S.N.</th>
                <th>Employee Name</th>
                <th>Address</th>
                <th>Company</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Mike</td>
                <td>USA</td>
                <td>Microsoft</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Manoj Ranjit</td>
                <td>India</td>
                <td>Tata Motors</td>
            </tr>
            <tr>
                <td>3</td>
                <td>xìng</td>
                <td>China</td>
                <td>Alibaba</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Akari</td>
                <td>Japan</td>
                <td>Mitsubishi </td>
            </tr>
			<tr>
                <td>5</td>
                <td>Binod</td>
                <td>Nepal</td>
                <td>CG </td>
            </tr><tr>
                <th>S.N.</th>
                <th>Employee Name</th>
                <th>Address</th>
                <th>Company</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Mike</td>
                <td>USA</td>
                <td>Microsoft</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Manoj Ranjit</td>
                <td>India</td>
                <td>Tata Motors</td>
            </tr>
            <tr>
                <td>3</td>
                <td>xìng</td>
                <td>China</td>
                <td>Alibaba</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Akari</td>
                <td>Japan</td>
                <td>Mitsubishi </td>
            </tr>
			<tr>
                <td>5</td>
                <td>Binod</td>
                <td>Nepal</td>
                <td>CG </td>
            </tr><tr>
                <th>S.N.</th>
                <th>Employee Name</th>
                <th>Address</th>
                <th>Company</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Mike</td>
                <td>USA</td>
                <td>Microsoft</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Manoj Ranjit</td>
                <td>India</td>
                <td>Tata Motors</td>
            </tr>
            <tr>
                <td>3</td>
                <td>xìng</td>
                <td>China</td>
                <td>Alibaba</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Akari</td>
                <td>Japan</td>
                <td>Mitsubishi </td>
            </tr>
			<tr>
                <td>5</td>
                <td>Binod</td>
                <td>Nepal</td>
                <td>CG </td>
            </tr><tr>
                <th>S.N.</th>
                <th>Employee Name</th>
                <th>Address</th>
                <th>Company</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Mike</td>
                <td>USA</td>
                <td>Microsoft</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Manoj Ranjit</td>
                <td>India</td>
                <td>Tata Motors</td>
            </tr>
            <tr>
                <td>3</td>
                <td>xìng</td>
                <td>China</td>
                <td>Alibaba</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Akari</td>
                <td>Japan</td>
                <td>Mitsubishi </td>
            </tr>
			<tr>
                <td>5</td>
                <td>Binod</td>
                <td>Nepal</td>
                <td>CG </td>
            </tr><tr>
                <th>S.N.</th>
                <th>Employee Name</th>
                <th>Address</th>
                <th>Company</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Mike</td>
                <td>USA</td>
                <td>Microsoft</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Manoj Ranjit</td>
                <td>India</td>
                <td>Tata Motors</td>
            </tr>
            <tr>
                <td>3</td>
                <td>xìng</td>
                <td>China</td>
                <td>Alibaba</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Akari</td>
                <td>Japan</td>
                <td>Mitsubishi </td>
            </tr>
			<tr>
                <td>5</td>
                <td>Binod</td>
                <td>Nepal</td>
                <td>CG </td>
            </tr><tr>
                <th>S.N.</th>
                <th>Employee Name</th>
                <th>Address</th>
                <th>Company</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Mike</td>
                <td>USA</td>
                <td>Microsoft</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Manoj Ranjit</td>
                <td>India</td>
                <td>Tata Motors</td>
            </tr>
            <tr>
                <td>3</td>
                <td>xìng</td>
                <td>China</td>
                <td>Alibaba</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Akari</td>
                <td>Japan</td>
                <td>Mitsubishi </td>
            </tr>
			<tr>
                <td>5</td>
                <td>Binod</td>
                <td>Nepal</td>
                <td>CG </td>
            </tr><tr>
                <th>S.N.</th>
                <th>Employee Name</th>
                <th>Address</th>
                <th>Company</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Mike</td>
                <td>USA</td>
                <td>Microsoft</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Manoj Ranjit</td>
                <td>India</td>
                <td>Tata Motors</td>
            </tr>
            <tr>
                <td>3</td>
                <td>xìng</td>
                <td>China</td>
                <td>Alibaba</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Akari</td>
                <td>Japan</td>
                <td>Mitsubishi </td>
            </tr>
			<tr>
                <td>5</td>
                <td>Binod</td>
                <td>Nepal</td>
                <td>CG </td>
            </tr><tr>
                <th>S.N.</th>
                <th>Employee Name</th>
                <th>Address</th>
                <th>Company</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Mike</td>
                <td>USA</td>
                <td>Microsoft</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Manoj Ranjit</td>
                <td>India</td>
                <td>Tata Motors</td>
            </tr>
            <tr>
                <td>3</td>
                <td>xìng</td>
                <td>China</td>
                <td>Alibaba</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Akari</td>
                <td>Japan</td>
                <td>Mitsubishi </td>
            </tr>
			<tr>
                <td>5</td>
                <td>Binod</td>
                <td>Nepal</td>
                <td>CG </td>
            </tr><tr>
                <th>S.N.</th>
                <th>Employee Name</th>
                <th>Address</th>
                <th>Company</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Mike</td>
                <td>USA</td>
                <td>Microsoft</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Manoj Ranjit</td>
                <td>India</td>
                <td>Tata Motors</td>
            </tr>
            <tr>
                <td>3</td>
                <td>xìng</td>
                <td>China</td>
                <td>Alibaba</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Akari</td>
                <td>Japan</td>
                <td>Mitsubishi </td>
            </tr>
			<tr>
                <td>5</td>
                <td>Binod</td>
                <td>Nepal</td>
                <td>CG </td>
            </tr><tr>
                <th>S.N.</th>
                <th>Employee Name</th>
                <th>Address</th>
                <th>Company</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Mike</td>
                <td>USA</td>
                <td>Microsoft</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Manoj Ranjit</td>
                <td>India</td>
                <td>Tata Motors</td>
            </tr>
            <tr>
                <td>3</td>
                <td>xìng</td>
                <td>China</td>
                <td>Alibaba</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Akari</td>
                <td>Japan</td>
                <td>Mitsubishi </td>
            </tr>
			<tr>
                <td>5</td>
                <td>Binod</td>
                <td>Nepal</td>
                <td>CG </td>
            </tr><tr>
                <th>S.N.</th>
                <th>Employee Name</th>
                <th>Address</th>
                <th>Company</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Mike</td>
                <td>USA</td>
                <td>Microsoft</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Manoj Ranjit</td>
                <td>India</td>
                <td>Tata Motors</td>
            </tr>
            <tr>
                <td>3</td>
                <td>xìng</td>
                <td>China</td>
                <td>Alibaba</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Akari</td>
                <td>Japan</td>
                <td>Mitsubishi </td>
            </tr>
			<tr>
                <td>5</td>
                <td>Binod</td>
                <td>Nepal</td>
                <td>CG </td>
            </tr><tr>
                <th>S.N.</th>
                <th>Employee Name</th>
                <th>Address</th>
                <th>Company</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Mike</td>
                <td>USA</td>
                <td>Microsoft</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Manoj Ranjit</td>
                <td>India</td>
                <td>Tata Motors</td>
            </tr>
            <tr>
                <td>3</td>
                <td>xìng</td>
                <td>China</td>
                <td>Alibaba</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Akari</td>
                <td>Japan</td>
                <td>Mitsubishi </td>
            </tr>
			<tr>
                <td>5</td>
                <td>Binod</td>
                <td>Nepal</td>
                <td>CG </td>
            </tr><tr>
                <th>S.N.</th>
                <th>Employee Name</th>
                <th>Address</th>
                <th>Company</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Mike</td>
                <td>USA</td>
                <td>Microsoft</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Manoj Ranjit</td>
                <td>India</td>
                <td>Tata Motors</td>
            </tr>
            <tr>
                <td>3</td>
                <td>xìng</td>
                <td>China</td>
                <td>Alibaba</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Akari</td>
                <td>Japan</td>
                <td>Mitsubishi </td>
            </tr>
			<tr>
                <td>5</td>
                <td>Binod</td>
                <td>Nepal</td>
                <td>CG </td>
            </tr>
        </tbody>
    </table>
</form>

</body>

</html>
<script>
    (function () {
        var
         form = $('.form'),
         cache_width = form.width(),
         a4 = [595.28, 841.89]; // for a4 size paper width and height

        $('#create_pdf').on('click', function () {
            $('body').scrollTop(0);
            createPDF();
        });
        //create pdf
        function createPDF() {
            getCanvas().then(function (canvas) {
                var
                 img = canvas.toDataURL("image/png"),
                 doc = new jsPDF({
                     unit: 'px',
                     format: 'a4'
                 });
                doc.addImage(img, 'JPEG', 20, 20);
                doc.save('bhavdip-html-to-pdf.pdf');
                form.width(cache_width);
            });
        }

        // create canvas object
        function getCanvas() {
            form.width((a4[0] * 1.33333) - 80).css('max-width', 'none');
            return html2canvas(form, {
                imageTimeout: 2000,
                removeContainer: true
            });
        }

    }());
</script>
<script>
    (function ($) {
        $.fn.html2canvas = function (options) {
            var date = new Date(),
            $message = null,
            timeoutTimer = false,
            timer = date.getTime();
            html2canvas.logging = options && options.logging;
            html2canvas.Preload(this[0], $.extend({
                complete: function (images) {
                    var queue = html2canvas.Parse(this[0], images, options),
                    $canvas = $(html2canvas.Renderer(queue, options)),
                    finishTime = new Date();

                    $canvas.css({ position: 'absolute', left: 0, top: 0 }).appendTo(document.body);
                    $canvas.siblings().toggle();

                    $(window).click(function () {
                        if (!$canvas.is(':visible')) {
                            $canvas.toggle().siblings().toggle();
                            throwMessage("Canvas Render visible");
                        } else {
                            $canvas.siblings().toggle();
                            $canvas.toggle();
                            throwMessage("Canvas Render hidden");
                        }
                    });
                    throwMessage('Screenshot created in ' + ((finishTime.getTime() - timer) / 1000) + " seconds<br />", 4000);
                }
            }, options));

            function throwMessage(msg, duration) {
                window.clearTimeout(timeoutTimer);
                timeoutTimer = window.setTimeout(function () {
                    $message.fadeOut(function () {
                        $message.remove();
                    });
                }, duration || 2000);
                if ($message)
                    $message.remove();
                $message = $('<div ></div>').html(msg).css({
                    margin: 0,
                    padding: 10,
                    background: "#000",
                    opacity: 0.7,
                    position: "fixed",
                    top: 10,
                    right: 10,
                    fontFamily: 'Tahoma',
                    color: '#fff',
                    fontSize: 12,
                    borderRadius: 12,
                    width: 'auto',
                    height: 'auto',
                    textAlign: 'center',
                    textDecoration: 'none'
                }).hide().fadeIn().appendTo('body');
            }
        };
    })(jQuery);
</script>