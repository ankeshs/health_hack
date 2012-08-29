<?php
if(isset($_COOKIE['hcapp_id']))
{   
    $login=$_COOKIE['hcapp_id'];
    require_once 'db_connect.php';
    require 'settings.php';
    $check=mysql_query("SELECT * from users WHERE id='$login' LIMIT 1;");
    $row=mysql_fetch_array($check);
    $utype=$row['type'];
    $check=mysql_query("SELECT * from booking WHERE id='$login' LIMIT $set_maxslot;");
    echo '
        <!DOCTYPE html>
        <html>
        <head>
        <link rel="stylesheet" type="text/css" href="admin.css" />
        <title>'.$login.' bookings</title></head><body><div id="logo"></div><div id="content"><div id="ptitle">Your booking status</div><br> <br>'.'
<a href="viewbook.php">Refresh timings</a> &nbsp;&nbsp; <a href="profile.php">User profile</a>  &nbsp;&nbsp; <a href="logout.php">Logout</a>    <br> <br><br>      
<table>'.
        '<tr><td>patname</td><td>refname</td><td>id</td><td>type</td><td>slot</td><td>doctor</td><td>turn</td><td>Time remaining</td></tr>
          ';
    $clkevn="";
    while($book[]=  mysql_fetch_array($check)){
                
            }
            foreach ($book as $key => $row) {
    $trn[$key]  = $row['turn'];    
}
array_multisort($trn, SORT_ASC, $book);
$buk=$book;
foreach ($buk as $book)
            {
    if(!isset($book['turn']))continue;                 
        $remtime=0;
        $t=$book['turn']-1;
        if($t>30)
        {
            $t=$t-30;
            $remtime="1 day ".floor($t/10)."hrs ".(($t%10)*6)."minutes remaining ";
        }
        else
        {            
            $remtime=floor($t/10)."hrs ".(($t%10)*6)."minutes remaining ";
        }
        echo '<tr><td>'.$login.'</td><td>'.$book['patname'].'</td><td>'.$book['refname'].'</td><td>'.$book['type'].'</td><td>'.$book['slot'].'</td><td>'.$book['doctor'].'</td>><td>'.$book['turn'].'</td><td>'.$remtime.'</td><td>
            <a href="cancel.php?turn='.$book['turn'].'">Cancel</a></td></tr>';
        
    }
    echo '</table></div></body></html>';
}
else
{
    echo "User not logged in";
}
?>
