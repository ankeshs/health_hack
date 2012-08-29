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
   $type=$_POST['type'];
   echo $login." ".$name." ".$mob." ".$gma." ".$yah." ".$fac." ".$type."\n<br>";
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
   if(mysql_fetch_array($check))
   {
       echo "Record already exists";
       exit();
   }   
   $result = mysql_query("INSERT INTO users (name,id,mob,gma,yah,fac,emob,egma,eyah,efac,type) VALUES ('$name','$login','$mob','$gma','$yah','$fac','$emob','$egma','$eyah','$efac','$type');") or die (mysql_error());
   if($result)
   {
       echo "Registration successful!<br>";
       if($emob)
       {
       require_once 'sms.php';
       sendsms($mob,"Registration successful!");       
       }/*
       require_once 'mail.php';
       if($egma)sendmail($gma."@gmail.com","Registration","Registration successful to HC");
       if($eyah)sendmail($yah."@yahoo.com","Registration","Registration successful to HC");
       if($efac)sendmail($fac."@facebook.com","Registration","Registration successful to HC");
       sendmail($login."@iitk.ac.in","Registration","Registration successful to HC");
        
        */
       echo "<a href='profile.php'>Go to user profile</a>";
   }
   else
   {
       echo 'Registration failed';
   }
}
else
{
    echo "User not logged in";
    exit();
}
?>