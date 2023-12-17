<?php
session_start();
$signed=false;

if(isset($_SESSION['user_id']))
{
    if($_SESSION['user_id']!="0")  {$signed=true;}
}



?>
<!DOCTYPE html>
<html>
    <head>
        <title>Welcome To The Dashboard</title>
    </head>
    <body>

<?php
$htmlform1='<div id="signalert" style="text-align: center;border:1px solid #000;width:200px;padding:40px;margin:auto">
<p>Please <a href="method.php" style="text-decoration:none">Sign In</a> To Continue</p>
</div>';
echo $signed ? "" : $htmlform1;


?>


    </body>
</html>