<html>
<?php 
error_reporting(0);
$host = 'localhost';
$user = 'root';
$pass = 'fidele';
$name = 'dirskhpe_rangiro';
function backup_tables($host,$user,$pass,$name,$tables = '*')
{

    $link = mysqli_connect($host,$user,$pass);
    mysqli_select_db($link,$name);
    ("SET NAMES 'utf8'");

    //get all of the tables
    if($tables == '*')
    {
        $tables = array();
        $result = ('SHOW TABLES');
        while($row = mysqli_fetch_row($result))
        {
            $tables[] = $row[0];
        }
    }
    else
    {
        $tables = is_array($tables) ? $tables : explode(',',$tables);
    }
    $return='';
    //cycle through
    foreach($tables as $table)
    {
        $result = ('SELECT * FROM '.$table);
        $num_fields = mysqli_num_fields($result);

        $return.= 'DROP TABLE '.$table.';';
        $row2 = mysqli_fetch_row(('SHOW CREATE TABLE '.$table));
        $return.= "\n\n".$row2[1].";\n\n";

        for ($i = 0; $i < $num_fields; $i++) 
        {
            while($row = mysqli_fetch_row($result))
            {
                $return.= 'INSERT INTO '.$table.' VALUES(';
                for($j=0; $j<$num_fields; $j++) 
                {
                    $row[$j] = addslashes($row[$j]);
                    $row[$j] = str_replace("\n","\\n",$row[$j]);
                    if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
                    if ($j<($num_fields-1)) { $return.= ','; }
                }
                $return.= ");\n";
            }
        }
        $return.="\n\n\n";
    }

    //save file
	$nm='Backup/backup On '. date('d-m-Y'). ' @ '. date('h.i.s') .'.sql';
	 $handle = fopen($nm,'w+');
	 echo $nm;
    fwrite($handle,$return);
    fclose($handle);
}

backup_tables($dbhost,$dbuser,$dbpass,$dbname);
echo '<script> window.close();</script>';  ?>
   <html>
<head>
<script>
  function Exit() {
     var x=confirm('Are You sure want to exit:');
     if(x) window.close();
   }
</script>
