<?php
if(isset($_COOKIE['hcapp_id']))
{
    $login=$_COOKIE['hcapp_id'];
    $turn=$_GET['turn'];
    require_once 'db_connect.php';
    require 'settings.php';
    $check=mysql_query("SELECT * from booking WHERE id='$login' AND turn=$turn LIMIT 1;");
    if($check)        
    {
        if($check=mysql_query("DELETE from booking WHERE id='$login' AND turn=$turn LIMIT 1;"))        
        echo 'Booking successfully deleted<br><a href="viewbook.php">View bookings</a>';
        $check=mysql_query("SELECT * from booking ;");
        
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
            if($book['turn']>$turn)
            {
                $t=$book['turn']-1;
                $t1=$t+1;
                $query=mysql_query("UPDATE booking set turn=$t WHERE turn=$t1;");
            }
        }
        
    }
 else {
        echo "Invalid cancellation request<br><a href='viewbook.php'>View bookings</a>";
    }
}

else
{
    echo "User not logged in";
}
?>