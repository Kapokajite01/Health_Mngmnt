<?php
error_reporting(0);

//db conection
$random =rand();
	if (isset($_FILES) && (bool) $_FILES) {
    $files = array();
    $ext_error = "";



			    // Define allowed extensions
	
    $allowedExtentsoins = array('pdf', 'gif', 'jpeg', 'jpg', 'png','zip');
    foreach ($_FILES as $name => $file) {
        if (!$file['name'] == "") {
            $file_name = $file['name'];
			$file_name = $random.'_'.$file_name;
			$file_name = preg_replace('/\s+/', '_', $file_name);
			$file_name = str_replace('+','_', $file_name);
            $temp_name = $file['tmp_name'];
            $path_part = pathinfo($file_name);
            $ext = $path_part['extension'];

            // Checking for extension of attached files
            if (!in_array($ext, $allowedExtentsoins)) {
                echo "<script>alert('Sorry!!! Only[PDF,GIF,JPEG,JPNG,PNG and ZIP] Files are allowed')</script>";
	            echo "<script>window.location='step_upload';</script>";
}else{
                $ext_error = True;
            }
 
            // Store attached files in uploads folder
            $server_file = dirname(__FILE__) . "/archivebngjgadjagdjadadadasdsa433$3/" . $path_part['basename'];
            move_uploaded_file($temp_name, $server_file);
            array_push($files, $server_file);
            echo $file_name.'<br>';


			/*$sql1=mysql_query("INSERT INTO myfiles(att_id,mail_id,file_name,attachment_level)
VALUES('','$lastid','$file_name','$largestlevel')");*/
	

        }
    }
	
}



?>
