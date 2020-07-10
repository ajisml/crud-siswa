<?php
//STEP 1 Start

if(isset($_POST['db_server']) AND isset($_POST['db_user']) AND isset($_POST['db_pass']) AND isset($_POST['db_name'])){
 $db_server=$_POST['db_server'];
 $db_user=$_POST['db_user'];
 $db_pass=$_POST['db_pass'];
 $db_name=$_POST['db_name'];


 

$filename = 'ukom.sql';

$mysql_host = $db_server;
// MySQL username
$mysql_username = $db_user;
// MySQL password
$mysql_password = $db_pass;
// Database name
$mysql_database = $db_name;

// Connect to MySQL server
$kon=mysqli_connect($mysql_host, $mysql_username, $mysql_password, $mysql_database);

// Temporary variable, used to store current query
$templine = '';
// Read in entire file
$lines = file($filename);
// Loop through each line
foreach ($lines as $line)
{
// Skip it if it's a comment
if (substr($line, 0, 2) == '--' || $line == '')
    continue;

// Add this line to the current segment
$templine .= $line;
// If it has a semicolon at the end, it's the end of the query
if (substr(trim($line), -1, 1) == ';')
{
    // Perform the query
    $do=mysqli_query($kon,$templine);    
    $templine = '';
}
}

if($do){
 $dataindb='<?php

$kon=mysqli_connect(\''.$db_server.'\',\''.$db_user.'\',\''.$db_pass.'\',\''.$db_name.'\');

if(!$kon){
 echo \'Database connection failed!\';
exit;
}

?>';
 file_put_contents('koneksi.php',$dataindb);
 header('Location:login.php');
 echo "<meta http-equiv='refresh' content='2;login.php'>";
 unlink('ukom.sql');
  unlink('install.php');
}
else {
 echo '<font color="red">Error in Installation!</font>';
}
}

echo '<form method="post"><p>MySql Host:<br/><input type="text" name="db_server" value="localhost"/></p><p>MySql User:<br/><input type="text" name="db_user"/><p/></p>MySql User Password:<br/><input type="text" name="db_pass"/></p><p>Database Name:<br/><input type="text" name="db_name"/></p><p><input type="submit" class="button" value="Simpan"/></form></div>';

//Step 1 End
?>