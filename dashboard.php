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
        <style>

        </style>
    </head>
    <body>



<div id="signalert" style="display:none;text-align: center;border:1px solid #000;width:200px;padding:40px;margin:auto">
<p>Please <a href="method.php" style="text-decoration:none">Sign In</a> To Continue</p>
</div>


<div id="startwork" style="display: none;">
    <div style="float: right;border:2px dashed #736969;height:80vh;width:27%">
    <p style="text-align: center;">Right Side</p>
    </div>


    <div style="float: left;border:1px solid #000;height:80vh;width:67%">
    <p style="text-align: center;">Left Side</p>
    </div>
</div>

<script>
    
function shows_me(rn)
{
if(rn==1)
document.getElementById("signalert").style.display="block";
else
{
    document.getElementById("startwork").style.display="block";
}
}
shows_me(<?php echo $signed ? "0" : "1";?>);

</script>

    </body>
</html>