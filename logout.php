<?php
session_start();
if(isset($_COOKIE['hcapp_id']))
{
   setcookie("hcapp_id", "", time()-60*60*24*100, "/");
}
echo "User logged out <br> Click <a href='loginform.php'>here</a> to log back in";
?>