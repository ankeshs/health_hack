<?php
if(isset($_COOKIE['hcapp_id']))
{
    $login=$_COOKIE['hcapp_id'];
    require_once 'db_connect.php';
    require_once 'settings.php';
    $check=mysql_query("SELECT * from users WHERE id='$login' LIMIT 1;");
    $row=mysql_fetch_array($check);
    if($row)
    {
        
        $type=$row['type'];
        if($type=='admin')
        {
            echo "<!DOCTYPE html>
            <html>
            <head>
            <link rel='stylesheet' href='admin.css' type='text/css' />
            <title>
            Admin page
            </title>
            </head>
            <body>
            <div id='logo'></div>
            <div id='content'>
            <div id='ptitle'>Administration of booking queue</div><br> <br>
            <a href='next.php'>Next patient</a>&nbsp;&nbsp;<a href='profile.php'>Admin profile</a>&nbsp;&nbsp;<a href='logout.php'>Logout</a><br><br><br><div><div>".
            "<table><tr><th>id</th><th>patname</th><th>refname</th><th>type</th><th>slot</th><th>doctor</th><th>turn</th><th>Time remaining</th></tr>";
            $check=mysql_query("SELECT * from booking;");
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
        echo '<tr><td>'.$book['id'].'</td><td>'.$book['patname'].'</td><td>'.$book['refname'].'</td><td>'.$book['type'].'</td><td>'.$book['slot'].'</td><td>'.$book['doctor'].'</td>><td>'.$book['turn'].'</td><td>'.$remtime.'</td></tr>';
        
            }
            echo '</table>
                <br>
                
                </div></body></html>';
        }
 else {
    echo "The selected user is not admin";
    exit();
}
    }
 else {
        echo "error in loading user";
        exit();
    }
}
else
{
    echo "User not logged in";
}
?>