<?php
session_start();
if(isset($_COOKIE['hcapp_id']))
{
   setcookie("hcapp_id", "", time()-60*60*24*100, "/");
}

?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="loginform.css" type="text/css" />
        <title>
            Login user
        </title>
        
    </head>
    <body>
        <div id="logo"></div>
        <div id="content">
        <div id="ptitle">Register user</div>
        <form action="login.php" method="post">
            CC Login <input type="text" name="login" /><br>
            Password <input type="password" name="pass" /><br>
            <input type="submit" />
                
        </form>
        </div>
    </body>
</html>