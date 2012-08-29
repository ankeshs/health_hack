<?php
if(isset($_COOKIE['hcapp_id']))
{
   require_once("db_connect.php");
   $login=$_COOKIE['hcapp_id'];
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
       <div id="ptitle"> '.$login.' </div>
       <form action="adduser.php" method="post">
       <table>
       <tr><td>
           <label>Name</label></td><td>
           <input name="name" type="text"/>
           </td></tr><tr><td>
           <label>Mobile no.</label>
           </td><td>
           <input name="mob" type="text"/>
           </td></tr><tr><td>
           <label>Gmail ID</label>
           </td><td>
           <input name="gma" type="text"/>
           </td></tr><tr><td>
           <label>Yahoo ID</label></td><td>
           <input name="yah" type="text"/>
           </td></tr><tr><td>           
           <label>Facebook</label></td><td>
           <input name="fac" type="text"/>
           </td>
           </tr>
           </table>
           <input type="checkbox" name="emob" /><label>Enable sms service</label>
           <br>
           <input type="checkbox" name="egma" /><label>Enable gmail IMs</label>
           <br>
           <input type="checkbox" name="eyah" /><label>Enable yahoo IMs</label>
           <br>
           <input type="checkbox" name="efac" /><label>Enable facebook notifications</label>
           <br>
           User type:
           <input type="radio" name="type" checked="yes" value="stud" />Student
           <input type="radio" name="type" value="fac" />Faculty
           <input type="radio" name="type" value="emp" />Employee
           
           <br>
           <input type="submit" value="Register"/>
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