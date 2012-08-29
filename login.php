<?php
session_start();
if(isset($_COOKIE['hcapp_id']))
{
   setcookie("hcapp_id", "", time()-60*60*24*100, "/");
}


$login = $_POST['login'];
$password = $_POST['pass'];
$conn_id = ftp_connect("vyom.cc.iitk.ac.in");
$login_result = ftp_login ($conn_id, $login, $password);

if ((!$conn_id) || (!$login_result))
{
die ("Incorrect login or password");
}

require_once("db_connect.php");

$check = mysql_query("SELECT * FROM users WHERE id='$login' LIMIT 1;")or die(mysql_error());
if (mysql_num_rows($check))
{
$row = mysql_fetch_array($check);
$expire=time()+60*60*24*1;
setcookie("hcapp_id", $login, $expire, "/");
echo "Entry for ".$login." exists in the db<br>";

echo "<a href='profile.php'>Go to profile</a>";
}
else
{
setcookie("hcapp_id", $login, $expire, "/");
echo "will create a new entry for ".$login." now<br>";
echo "<a href='register.php'>Register user</a>";
}
?>