<?php
if(isset($_COOKIE['hcapp_id']))
{   
   $login=$_COOKIE['hcapp_id'];
   $name=$_POST['name'];   
   $mob=$_POST['mob'];
   $gma=$_POST['gma'];
   $yah=$_POST['yah'];
   $fac=$_POST['fac'];
   $emob=$_POST['emob'];
   $egma=$_POST['egma'];
   $eyah=$_POST['eyah'];
   $efac=$_POST['efac'];

   echo $login." ".$name." ".$mob." ".$gma." ".$yah." ".$fac."\n<br>";   
   if($emob=='on'){echo "Mobile service activated\n<br>"; $emob=1;}
   else{$emob=0;}
   if($egma=='on'){echo "Gmail service activated\n<br>"; $egma=1;}
   else{$egma=0;}
   if($eyah=='on'){echo "Yahoo service activated\n<br>"; $eyah=1;}
   else{$eyah=0;}
   if($efac=='on'){echo "Facebook service activated\n<br>"; $efac=1;}
   else{$efac=0;}
   
   require_once("db_connect.php");
   $check=mysql_query("SELECT * from users WHERE id='$login' LIMIT 1;");
   $result = mysql_query("UPDATE users SET name='$name' , SET mob='$mob' , SET gma='$gma' , SET yah='$yah' ,SET fac='$fac' , SET emob='$emob' , SET egma='$egma' , SET eyah='$eyah' , SET efac='$efac' WHERE id='$login';") or die (mysql_error());
   if($result)
   {
       echo "updation successful!<br>";
       if($emob)
       {
       require_once 'sms.php';
       sendsms($mob,"updation successful!");       
       }/*
       require_once 'mail.php';
       if($egma)sendmail($gma."@gmail.com","updation","updation successful to HC");
       if($eyah)sendmail($yah."@yahoo.com","updation","updation successful to HC");
       if($efac)sendmail($fac."@facebook.com","updation","updation successful to HC");
       sendmail($login."@iitk.ac.in","updation","updation successful to HC");
        
        */
       echo "<a href='profile.php'>Go to user profile</a>";
   }
   else
   {
       echo 'updation failed';
   }
}
else
{
    echo "User not logged in";
    exit();
}
?>