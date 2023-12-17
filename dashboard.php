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

            form input {display: block;margin: 5px;width: 300px;padding: 10px;}
            form input[type=radio] {display: inline;width: auto;}
            form label{color:blue;padding: 10px;}
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

    <button class="normalbutton">New enrollment</button><br/>
    <button class="normalbutton">Sales</button><br/>
    <button class="normalbutton">History</button><br/>
    <button class="normalbutton">Check Status</button><br/>
    <button class="normalbutton">Option 5</button><br/>

    </div>
            <!--right side end-->




<!-- ------------------------------------------------------------------- -->




            <!--left side start-->
    <div style="float: left;border:1px solid #000;height:80vh;width:67%">
    <p class="paraback" style="text-align: center;">Left Side</p>
    <hr class="hrline"/>

<div id="screen1">
    <p style="padding: 5px;font-size:30px;">Adding New Member Enrollment </p>
    <form>
        <label>Member Name</label>
        <input type="text" name="mmbr_name"/>

        <label>Phone Number</label>
        <input type="tel"/>

        <label>Date Of Birth</label>
        <input type="date"/>

        <label>Gender :</label>
        <input type="radio" value="Male" name="gender" id="x1">
        <label for="x1" style="color: black;">male</label>
        <input type="radio" value="Female" name="gender" id="x2">
        <label for="x2" style="color: black;">female</label><br/><br/>

        
        <label>First Time?</label>
        <select>
            <option selected disabled hidden></option>
            <option>YES</option>
            <option>NO</option>
        </select><br/><br/>

        <label>Duration</label>
        <select>
            <option selected disabled hidden></option>
            <option>Day</option>
            <option>Week</option>
            <option>Month</option>
        </select><br/><br/>


        <p>Required FEES :  </p>

        <input type="submit"/>
    </form>
</div>
<div id="screen2" style="display: none;"></div>
<div id="screen3" style="display: none;"></div>
<div id="screen4" style="display: none;"></div>
<div id="screen5" style="display: none;"></div>


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