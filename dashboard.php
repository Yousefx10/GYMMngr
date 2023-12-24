<?php
session_start();
$signed=false;

if(isset($_SESSION['user_id']))
{
    if($_SESSION['user_id']!="0")  
    {
        $signed=true;

        if($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            if(isset($_POST['newenroll']))
            {

                echo "saving is on process \n";
                $mmbr_name = $_POST['mmbr_name'];
                $mmbr_phone = $_POST['mmbr_phone'];
                $mmbr_date = $_POST['mmbr_date'];
                $mmbr_gender = $_POST['mmbr_gender'];
                $mmber_visit = $_POST['mmbr_visit'];
                $mmber_duration = $_POST['mmbr_duration'];
                $mmbr_notes = $_POST['mmbr_notes'];




               include "connect.php";
      
               $currentDate = date("Y-m-d H:i:s");
               $currentuser =$_SESSION['user_id'] ."," . $_SESSION['user_name'];
               $sql = "INSERT INTO history (nowdate, personalname,personalphone,birthdate,gender,firstvisit,duration,notes,user)".
               "VALUES ('$currentDate','$mmbr_name', '$mmbr_phone','$mmbr_date','$mmbr_gender','$mmber_visit','$mmber_duration','$mmbr_notes','$currentuser')";

               // Execute the query
               if ($conn->query($sql) === TRUE) {
                   echo "New record created successfully!";
               } else {
                   echo "Error: " . $conn->error;
               }
               
               // Close connection
               $conn->close();
               


            }
            else if(isset($_POST['updateme']))
            {
                $set_daily = $_POST['set_daily'];
                $set_weekly = $_POST['set_weekly'];
                $set_monthly = $_POST['set_monthly'];

                $set_currency = $_POST['set_currency'];

                $vatstatus = $_POST['vatstatus'];
                $set_vat="0,0";
                if($vatstatus=="YES")
                {
                    $set_vat = $_POST['set_vat'];
                    //echo $set_vat;
                    $set_vat="1,".$set_vat;
                }
                

                // echo $set_daily;
                // echo $set_weekly;
                // echo $set_monthly;

                // echo $set_currency;
                // echo $vatstatus;

                include "connect.php";
                $sql = "UPDATE settings SET currency='$set_currency',daily='$set_daily',weekly='$set_weekly',monthly='$set_monthly',vat='$set_vat' WHERE id=1";
               
                if ($conn->query($sql) === TRUE) {
                    echo "settings updated!";
                } else {
                    echo "Error: " . $conn->error;
                }
                               // Close connection
               $conn->close();
               
            }
        }
    }
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

            #screen1 form input {display: block;margin: 5px;width: 300px;padding: 10px;}
            #screen1 form input[type=radio] {display: inline;width: auto;}
            #screen1 form label{color:blue;padding: 10px;}

           .information td{padding:15px}
           .tdclick{color: blue;cursor: pointer;}
           .tdcreatedate{background-color: #736969;color: white;}

           #screen5 label input{width: 50px;}
        </style>
    </head>
    <body>



<div id="signalert" style="display:none;text-align: center;border:1px solid #000;width:200px;padding:40px;margin:auto">
<p>Please <a href="method.php" style="text-decoration:none">Sign In</a> To Continue</p>
</div>


<div id="startwork" style="display: none;">




            <!--right side start-->
    <div style="overflow:auto;text-align:center;float: right;border:2px dashed #736969;height:85vh;width:27%">
    <p class="paraback">Right Side</p>
    <hr class="hrline"/>

    <button class="normalbutton" onclick="update_page('screen1');">New enrollment</button><br/>
    <button class="normalbutton">Sales</button><br/>
    <button class="normalbutton" onclick="update_page('screen3');showOPTION('screen3');">History</button><br/>
    <button class="normalbutton">Check Status</button><br/>
    <button class="normalbutton" onclick="update_page('screen5');showOPTION('screen5');">Settings</button><br/>

    </div>
            <!--right side end-->




<!-- ------------------------------------------------------------------- -->




            <!--left side start-->
    <div style="overflow-y: auto;float: left;border:1px solid #000;height:85vh;width:67%">
    <p class="paraback" style="text-align: center;">Left Side</p>
    <hr class="hrline"/>

<div id="screen1" style="height:inherit">
    <p style="padding: 5px;font-size:30px;">Adding New Member Enrollment </p>
    <form action="dashboard.php" method="post">
        <label>Member Name</label>
        <input type="text" name="mmbr_name" required/>

        <label>Phone Number</label>
        <input type="tel" name="mmbr_phone" required/>

        <label>Date Of Birth</label>
        <input type="date" name="mmbr_date" required/>

        <label>Gender :</label>
        
        <label  style="color: black;">
            <input type="radio" value="1" name="mmbr_gender" required>
        male</label>


        
        <label style="color: black;">
            <input type="radio" value="0" name="mmbr_gender">
        female</label><br/><br/>

        
        <label>First Time?</label>
        <select name="mmbr_visit" required>
            <option selected disabled hidden></option>
            <option value="1">YES</option>
            <option value="0">NO</option>
        </select>

        <label>Duration</label>
        <select name="mmbr_duration" required>
            <option selected disabled hidden></option>
            <option value="day">Day</option>
            <option value="week">Week</option>
            <option value="month">Month</option>
        </select><br/><br/>
            <label>
                NOTES ABOUT MEMBER :
                <br/>
                <textarea name="mmbr_notes"style="width:400px;height:50px;resize:none"></textarea>
            </label>

        <p>Required FEES :  </p>

        <input type="submit" name="newenroll"/>
    </form>
</div>
<div id="screen2" style="display: none;"></div>


<div id="screen3" style="display: none;text-align:center">
<table border="1px" style="margin: auto;" id="ourtable">

            
<!-- 
                <tr>
                <td>Create Date :</td>
                <td>Member Name :</td>
                <td>Member Phone :</td>
                <td>Birthdate :</td>
                <td>Gender :</td>
                <td>First Visit?</td>
                <td>Duration :</td>
                <td>Notes :</td>
            </tr>


    this is just test stamp
            <tr class="information">
                <td class="tdcreatedate">2020-12-24</td>
                <td>Test NameTest</td>
                <td>00112233</td>
                <td>1999-04-13</td>
                <td>Male</td>
                <td>Yes</td>
                <td>Week</td>
                <td class="tdclick" onclick="shownotes(this)" data-note="hello world">SHOW</td>
            </tr>

 -->

</table>
</div>


<div id="screen4" style="display: none;"></div>

<div id="screen5" style="display: none;">
<p style="text-align: center;">Welcome To Settings Area</p>
<hr/>



<form method="post" action="dashboard.php">


<p>Prices :</p>
<label>
    Daily Price :
    <input type="number" max="5000" min="0" id="inp1" name="set_daily"/>
</label>

<label>
    Weekly Price :
    <input type="number" max="5000" min="0" id="inp2" name="set_weekly"/>
</label>

<label>
    Monthly Price :
    <input type="number" max="5000" min="0" id="inp3" name="set_monthly"/>
</label>

<label>Currency :
<select id="inp4" name="set_currency">
    <option selected disabled require ></option>
    <option>EGP</option>
    <option>SAR</option>
    <option>GBP</option>
    <option>USD</option>
    <option>EUR</option>
</select>
</label>
<hr/>

<p>Enable VAT?</p>
<label onclick="changevat(1);">
YES
<input type="radio" id="inp5" name="vatstatus" value="YES"/>
</label>
<label  onclick="changevat(0);">
NO
<input type="radio" id="inp6" name="vatstatus" value="NO"/>
</label>

<label>
    Vat Value :
    <input type="number" max="100" min="0" id="inp7" name="set_vat"/>
</label>
<hr/>


<input type="submit" value="Update Settings" name="updateme"/>
</form>
</div>


    </div>
            <!--left side end-->






</div>
<script src="jquery.js"></script>
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
var pg1 = document.getElementById("screen1");
var pg2 = document.getElementById("screen2");
var pg3 = document.getElementById("screen3");
var pg4 = document.getElementById("screen4");
var pg5 = document.getElementById("screen5");

function update_page(rn)
{
    pg1.style.display="none";
    pg2.style.display="none";
    pg3.style.display="none";
    pg4.style.display="none";
    pg5.style.display="none";
    document.getElementById(rn).style.display="block";
    
}


function showOPTION(rn)
{
    if(rn=="screen3")
    {
        //$.ajax({ url: 'dashboard.php?doit=true?screen=history' });
        //return;
        $.ajax({
        url: 'run.php',
        type: 'post',
        data: { "showhistory": "1"},
        success: 
        function(response) 
        { 
            var currenttitletable="<tr><td>Create Date :</td><td>Member Name :</td><td>Member Phone :</td><td>Birthdate :</td><td>Gender :</td><td>First Visit?</td><td>Duration :</td><td>Notes :</td></tr>";
            
            document.getElementById("ourtable").innerHTML= (currenttitletable+response);
        
        }});


    }
    else if (rn=="screen5")
    {
        $.ajax({
        url: 'run.php',
        type: 'post',
        data: { "showsettings": "1"},
        success: 
        function(response) 
        { 
            
            var allvalues = response.split(",");
            document.getElementById("inp1").value=allvalues[0];
            document.getElementById("inp2").value=allvalues[1];
            document.getElementById("inp3").value=allvalues[2];
            document.getElementById("inp4").value=allvalues[3];
           if(allvalues[4]==0)
           {
            document.getElementById("inp5").checked = false;
            document.getElementById("inp6").checked = true;
            document.getElementById("inp7").value=0;
            document.getElementById("inp7").disabled = true;
           }
           else
           {
            document.getElementById("inp5").checked = true;
            document.getElementById("inp6").checked = false;
            document.getElementById("inp7").value=allvalues[5];
            document.getElementById("inp7").disabled = false;
           }
            
        }});
    }
}


function shownotes(notess)
{
    alert(notess.getAttribute('data-note'));
}


function changevat(yesorno)
{
    var inputyesorno = document.getElementById("inp7");
    if(yesorno ==1)
    {
            inputyesorno.disabled = false;
    }
    else
    {
            inputyesorno.value=0;
            inputyesorno.disabled = true;
    }
}
</script>




    </body>
</html>