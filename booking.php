<?php
require_once 'settings.php';
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
    <link rel="stylesheet" href="register.css" type="text/css" />
        <title>
           '. $login.' booking
        </title>
        <script type="text/javascript">
        function selfupdate()
        {      
        //alert((document.getElementById("rel")).value);
            if((document.getElementById("rel")).value=="SELF")
            {
                document.getElementById("patname").value="'.$row['name'].'";
            }
            else
            {
            if(document.getElementById("patname").value=="'.$row['name'].'"){
            document.getElementById("patname").value="";}
            }
        }
        </script>
    </head>
    <body onload="selfupdate()">
    <div id="logo"></div>
    <div id="content">
        <div id="ptitle">
            Book a slot
        </div>
        <form action="bookslot.php" method="post">
        <table><tr><td>
            Referer name: </td><td><input type="text" readonly="readonly" name="refname" id="refname" value="'.$row['name'].'" />
             </td></tr><tr><td>Patient name:  </td><td><input type="text" id="patname" name="patname" /><br>
            </td></tr><tr><td>Relationship: </td><td> <select size="1" id="rel" name="rel" onchange="selfupdate()">
                <option selected vaue="self" >SELF</option>                
                <option value="father">Father</option>
                <option value="mother">Mother</option>
                <option value="spouse">Spouse</option>
                <option value="other">Other</option>
            </select>
            </td></tr><tr><td>Preferred slot: </td><td> <select size="1" name="slot" id="slot">
            <option selected value="any">Any</option>
            <option value="morning">Morning</option>
            <option value="evening">Evening</option>
            </select>
            </td></tr><tr><td>Doctor: </td><td><select size="1" name="doctor" id="doctor">
            <option selected value="any">Any</option>
            </select></td></tr></table>
            <input type="submit" value="Register" />
        </form><br>
        <a href="viewbook.php">View bookings</a>
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
