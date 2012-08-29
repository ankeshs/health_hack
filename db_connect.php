<?php
$host="localhost";
$uname="root";
$pass="newfolder";
$connection = mysql_connect($host, $uname, $pass) or die ('Could not connect: '.mysql_error()); 
$select = mysql_select_db("hcapp") or die(mysql_error());
if (! $connection)
{
    die ("A connection to the Server could not be established!<br>");
}
else
{
    //echo "User root logged into to MySQL server ",$host," successfully.<br>";
}
if (! $select)
{
    die ("DATABASE Could not be selected<br>");
}
else
{
    //echo "database selected<br>";
}
?>
