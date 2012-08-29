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
            $check=mysql_query("SELECT * from booking WHERE turn=1 LIMIT 1;");
            if($check)        
                {
                if($check=mysql_query("DELETE from booking WHERE turn=1 LIMIT 1;"))
                {
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
                            $t=$book['turn']-1;                   
                            $t1=$t+1;
                            echo $t1."<br>";
                            $query=mysql_query("UPDATE booking set turn=$t WHERE turn=$t1;");                            
                        }
                       $check=mysql_query("SELECT * from booking WHERE turn=2 LIMIT 1;");
                        if($urow=mysql_fetch_array($check))
                        {
                            $login=$urow['id'];
                            $check=mysql_query("SELECT * from users WHERE id='$login' LIMIT 1;");
                            $row=mysql_fetch_array($check);
                            
                            //------------------------------------
    $utype=$row['type'];
    if($row['mob'])$umob=$row['mob'];
    else $umob="";
    if($row['gma'])$ugma=$row['gma'];
    else $ugma="";
    if($row['fac'])$ufac=$row['fac'];
    else $ufac="";
    if($row['yah'])$uyah=$row['yah'];
    else $uyah="";
    //------------------------------
    //-----------
    if(!($umob=="")){
                require_once 'sms.php';
                sendsms($umob,"slot due!");       
       }/*
       require_once 'mail.php';
       if(!($ugma==""))sendmail($ugma."@gmail.com","slot","slot due to HC");
       if(!($uyah==""))sendmail($uyah."@yahoo.com","slot","slot due to HC");
       if(!($ufac==""))sendmail($ufac."@facebook.com","slot","slot due to HC");
       sendmail($login."@iitk.ac.in","slot","slot due to HC");
        
        */
         //----------
                        }
                       echo '<br>next user triggered <a href="admin.php">Admin</a>';
                    }
                }
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