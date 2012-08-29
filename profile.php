<?php
if(isset($_COOKIE['hcapp_id']))
{   
    $login=$_COOKIE['hcapp_id'];
    require_once 'db_connect.php';
    $check=mysql_query("SELECT * from users WHERE id='$login' LIMIT 1;");
    $row=mysql_fetch_array($check);
        $html='
        <!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="profile.css" type="text/css" />
        <title>'.$login.' user profile</title>
    </head>
    <body>
    <div id="logo"></div>
    
    <div id="content">    
    <div id="ptitle">User profile</div>
    <div id="inner">
        Name: '.$row['name'].'<br>        
        Login: '.$row['id'].'<br>
        Mob: '.$row['mob'].'<br>
        Gmail: '.$row['gma'].'<br>
        Yahoo: '.$row['yah'].'<br>
        Facebook: '.$row['fac'].'<br>
        
        <a href="booking.php">Booking</a><br>
        <a href="queue.php">Queue status</a><br>
        <a href="logout.php">Logout</a><br><br>
        <a href="admin.php">Admin</a><br>
        </div>
        </div>
    </body>
</html>
        ';
        echo $html;
}
 else 
     {
    echo "User not logged in";
}
?>
