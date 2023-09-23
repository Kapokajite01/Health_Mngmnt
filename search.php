<?php 
header('Content-Type: text/html; charset=ISO-8859-1');
?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="bootstrap.min.css" rel="stylesheet">
<?php
error_reporting(0);
    session_start();



    ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
	<title>Data Search</title>
	<link rel="stylesheet" type="text/css" href="jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="shCore.css">
	<link rel="stylesheet" type="text/css" href="demo.css">
 
	<script type="text/javascript" language="javascript" src="jquery-1.12.3.min.js">
	</script>
	<script type="text/javascript" language="javascript" src="jquery.dataTables.js">
	</script>
 
 <style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #6c757d;
  color: white;
}
</style>
<body>
    
<div style="margin-left: 2%;margin-right: 2%;" >


<div style="row">
		<div class="col-md-12" >
						<h5 class="card-header">All Docuements In Archive</h5>
					<div class="card-body">
						<form name="search" action="search.php" method="post">
								<div class="input-group">           
											<input type="text" name="searchtitle" class="form-control" placeholder="Search for..." required>
												<span class="input-group-btn">
												<button class="btn btn-info" type="submit">Go!</button>
												</span>
								</div>
						</form> 
					</div>
		</div>  

</div>   
<div class="row">

  <!-- Blog Entries Column -->
  <div class="col-md-12" >
  <table id="customers">
		 
			<thead  >
				<tr>
					<th>No</th>
					<th>Origin</th>
					<th>Initiator</th>
					<th>Classification</th>
					<th>Subject</th>
					<th>Content Summary</th>
					<th>File Name</th>
					<th>Date On Document</th>
					<th>Date Recorded</th>
					<th>View</th>
					<th>Edit</th>
				</tr>
			</thead>
            <tbody>
  <?php 
        include('config.php');
        if($_POST['searchtitle']!=''){
            $st=$_SESSION['searchtitle']=$_POST['searchtitle'];
            }
          $st;
          if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 5000;
        $offset = ($pageno-1) * $no_of_records_per_page;


        $total_pages_sql = "SELECT COUNT(*) FROM docs_recptions";
        $result = mysqli_query($con,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);


$query=mysqli_query($con,"Select * FROM docs_recptions WHERE (subject like '%$st%' or origine like '%$st%' or code_user like '%$st%' or classifiacation like '%$st%' or summary like '%$st%'  or file like '%$st%' or date_reception like '%$st%'  or date_recorded like '%$st%'   or folder like '%$st%') and archive = 'yes'  order by id ASC  LIMIT $offset, $no_of_records_per_page");
$rowcount=mysqli_num_rows($query);
if($rowcount==0)
{
echo "<tr><td> no record found </td></tr>";
}
else {
while ($row=mysqli_fetch_array($query)) {
    $i++;
$edited = $row['edit_history'];

  ?>

  <tr> 
  <td><?php echo $i;?></td>
<td><?php echo $row['origine'];?></td>
<td><?php echo $row['code_user']?></td>
<td><?php echo $row['classifiacation'];?></td>
<td ><p  style=" width: 200px; 
    overflow: hidden;
     white-space: nowrap;"><?php echo $row['subject'];?><p></td>
<td  ><p  style=" width: 200px; 
    overflow: hidden;
     white-space: nowrap;"><?php echo $row['summary'];?><p></td>
<td  ><p  style=" width: 200px; 
    overflow: hidden;
     white-space: nowrap;"><?php echo $row['file'];?><p></td>
<td><strong><?php echo $row['date_reception'];?></strong></td>
<td><strong><?php echo $row['date_recorded'];?></strong></td>
<td><strong><a href="../track?id=<?php echo $row['number']?>" target="_blank"class="btn btn-info">View</a></td>
<td><a href="../track_edit?id=<?php echo $row['id']?>" target="_blank"class="btn btn-danger">Edit</a></td>
<?php
if( $edited =='edited'){
	?>
	<td><a href="initiateheadofficeEdited?edId=<?php echo $row['number']?>"><font color="green">Edited</font></a></td>
	
	<?php
	
	
}
?>
</tr>


  <?php } }?>
  </tbody>
</table>

 




  </div>
</div>

     
<div class="row" style="margin-top: 4%">

  <!-- Blog Entries Column -->
  <div class="col-md-12">
  <ul class="pagination justify-content-center mb-4">
        <li class="page-item"><a href="?pageno=1"  class="page-link">First</a></li>
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?> page-item">
            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>" class="page-link">Prev</a>
        </li>
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?> page-item">
            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?> " class="page-link">Next</a>
        </li>
        <li class="page-item"><a href="?pageno=<?php echo $total_pages; ?>" class="page-link">Last</a></li>
    </ul>
</div>
</div>
</div>

 
</html>