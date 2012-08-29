<?php
session_start();
if(isset($_COOKIE['hcapp_id']))
{
   header("Location: profile.php");
}
 else {
    header("Location: loginform.php");
}
?>