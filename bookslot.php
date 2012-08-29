<?php
if(isset($_COOKIE['hcapp_id']))
{   
    $login=$_COOKIE['hcapp_id'];
    require_once 'db_connect.php';
    require 'settings.php';
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
    
    $check=mysql_query("SELECT * from booking WHERE id='$login' LIMIT $set_maxslot;");
    if($check)
    {
    $regdata=mysql_fetch_assoc($check);
    if(count($regdata)==$set_maxslot) {echo "The given user has maximum possible bookings\n";
        exit();
    }
    }
    $patname=$_POST['patname'];
    $refname=$_POST['refname'];
    $slot=$_POST['slot'];
    $rel=$_POST['rel'];
    $doc=$_POST['doctor'];
    echo $login."<br>".$patname."<br>".$refname."<br>".$slot."<br>".$rel."<br>".$doc."<br>";
    if($slot='any')
    {
    $check=mysql_query("SELECT * from booking");
    }
    else
    {
    $check=mysql_query("SELECT * from booking where slot='$slot'");
    }
    $turn=1;
    $maxturn=0;
    while($row=mysql_fetch_array($check))
    {
        $ctrn=$row['turn'];
        if($ctrn>$maxturn)$maxturn=$ctrn;        
    }
    $turn=$maxturn+1;
    $check=mysql_query("INSERT into booking (patname,refname,id,slot,doctor,turn,type) VALUES ('$patname','$refname','$login','$slot','$doc','$turn','$utype')");
    echo 'Entries added<br><a href="profile.php">Profile</a>';
    //-----------
    if(!($umob=="")){
                require_once 'sms.php';
                sendsms($umob,"booking successful!");       
       }
       require_once 'mail.php';/*
       if(!($ugma==""))sendmail($ugma."@gmail.com","booking","booking successful to HC");
       if(!($uyah==""))sendmail($uyah."@yahoo.com","booking","booking successful to HC");
       if(!($ufac==""))sendmail($ufac."@facebook.com","booking","booking successful to HC");
        * */
       sendmail($login."@iitk.ac.in","booking","booking successful to HC");
                
         //----------       
}
else
{
    echo "User not logged in";
}
?>