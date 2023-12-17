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
            .normalbutton
            {
             background-color: transparent;
             border:1px solid #000;
             padding: 20px;
             min-width: 50%;
             cursor: pointer;
             font-size: 20px;
             margin: 10px;
            }

            .normalbutton:hover
            {
                background-color: greenyellow;
            }
            .paraback{background-color: LightGray;padding: 20px;margin: 0;}
            .hrline{margin: 0;}
        </style>
    </head>
    <body>



<div id="signalert" style="display:none;text-align: center;border:1px solid #000;width:200px;padding:40px;margin:auto">
<p>Please <a href="method.php" style="text-decoration:none">Sign In</a> To Continue</p>
</div>


<div id="startwork" style="display: none;">




            <!--right side start-->
    <div style="text-align:center;float: right;border:2px dashed #736969;height:80vh;width:27%">
    <p class="paraback">Right Side</p>
    <hr class="hrline"/>

    <button class="normalbutton">Option 1</button><br/>
    <button class="normalbutton">Option 2</button><br/>
    <button class="normalbutton">Option 3</button><br/>
    <button class="normalbutton">Option 4</button><br/>
    <button class="normalbutton">Option 5</button><br/>

    </div>
            <!--right side end-->




<!-- ------------------------------------------------------------------- -->




            <!--left side start-->
    <div style="float: left;border:1px solid #000;height:80vh;width:67%">
    <p class="paraback" style="text-align: center;">Left Side</p>
    <hr class="hrline"/>
    </div>
            <!--left side end-->






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