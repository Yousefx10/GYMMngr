<?php
session_start();
echo  $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Welcome To The Dashboard</title>
    </head>
    <body>


        <div id="signalert" style="text-align: center;border:1px solid #000;width:200px;padding:40px;margin:auto">
            <p>Please <a href="method.php" style="text-decoration:none">Sign In</a> To Continue</p>
        </div>


    </body>
</html>