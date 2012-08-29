<?php
if(isset($_COOKIE['hcapp_id']))
{
   require_once("db_connect.php");
   $login=$_COOKIE['hcapp_id'];
   require_once 'db_connect.php';
    $check=mysql_query("SELECT * from users WHERE id='$login' LIMIT 1;");
    $row=mysql_fetch_array($check);
     if($row['emob'])$row['emob']='yes';
     if($row['egma'])$row['egma']='yes';
     if($row['eyah'])$row['eyah']='yes';
     if($row['efac'])$row['efac']='yes';     
              
   $html='
   <!DOCTYPE html>
   <html>
   <head>
       <title>
           Register user
       </title>
       <link rel="stylesheet" href="register.css" type="text/css" />
   </head>
   <body>
   <div id="logo"></div>
    <div id="content">
       <div id="ptitle"> '.$login.' : update user profile </div>
       <form action="edituser.php" method="post">
       <table>
       <tr><td>
           <label>Name</label></td><td>
           <input name="name" type="text" value="'.$row['name'].'"/>
           </td></tr><tr><td>
           <label>Mobile no.</label>
           </td><td>
           <input name="mob" type="text" value="'.$row['mob'].'"/>
           </td></tr><tr><td>
           <label>Gmail ID</label>
           </td><td>
           <input name="gma" type="text"  value="'.$row['gma'].'"/>
           </td></tr><tr><td>
           <label>Yahoo ID</label></td><td>
           <input name="yah" type="text" value="'.$row['yah'].'"/>
           </td></tr><tr><td>           
           <label>Facebook</label></td><td>
           <input name="fac" type="text" value="'.$row['fac'].'"/>
           </td>
           </tr>
           </table>
           <input type="checkbox" name="emob" checked="'.$row['emob'].'" /><label>Enable sms service</label>
           <br>
           <input type="checkbox" name="egma" checked="'.$row['egma'].'" /><label>Enable gmail IMs</label>
           <br>
           <input type="checkbox" name="eyah" checked="'.$row['eyah'].'" /><label>Enable yahoo IMs</label>
           <br>
           <input type="checkbox" name="efac"  checked="'.$row['efac'].'" /><label>Enable facebook notifications</label>
           <br>
           
           <input type="submit" value="Update"/>
           </br>
           <input type="reset" value="Clear"/>
       </form>
       </div>
   </body>
   </html>   
   ';
   echo $html;
}
else
{
echo "User not logged in";
exit();
}
?>