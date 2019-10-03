<?php
// Name of the file
$filename = './dbfile/paperless_office.sql';
// MySQL host
$mysql_host = 'localhost';
// MySQL username
$mysql_username = 'root';
// MySQL password
$mysql_password = '';
// Database name
$mysql_database = 'paperless_office';

$drop_db="DROP DATABASE IF EXISTS `paperless_office`";

// Connect to MySQL server
$link=mysqli_connect($mysql_host, $mysql_username, $mysql_password) or die('Error connecting to MySQL server: ' . mysql_error());
// Select database
mysqli_select_db($link,$mysql_database) or die('Error selecting MySQL database: ' . mysql_error());

// Temporary variable, used to store current query
$templine = '';
// Read in entire file
mysqli_query($link,$drop_db);
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
    mysqli_query($link,$templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysqli_error($link) . '<br /><br />');
    // Reset temp variable to empty
    $templine = '';
}
}
 echo "
 <h3>Tables imported successfully</h3>
 <br>";
 echo "You will Be Redirected Soon!";
 echo 
 '
<script>
window.setTimeout(function(){
window.location.href = "advanced_operations.php";
}, 3000);
</script>
 ';
?>
