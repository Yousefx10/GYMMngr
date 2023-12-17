<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

     //$btn= $_POST['submit_1'];
    if(isset($_POST['submit_1']))
    {
        echo "yes it's logform and it's correct clicked button";
          $username = $_POST['username_1'];
          $password = $_POST['password_1'];
         include "connect.php";

      // Check username existence

$stmt = $conn->prepare("SELECT * FROM users WHERE username = $username");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
       
        if ($result->num_rows === 0) {die("Invalid username!");}
         
    }


  }


?>



<!DOCTYPE html>
<html>
    <head>
        <title>Login To Continue</title>

        <style>
            form input{padding: 2px;margin: 20px;}
            form label{display: inline-block;width: 200px;text-align: left;}
            form input[type=submit]{font-size: 30px;padding: 20px;}
        </style>
    </head>
    <body>

        <div style="width: 500px;margin:auto;text-align:center;border:2px dotted #000">
            <form action="method.php" method="post" name="logform">
                <label>Enter Your LOGIN ID :</label>
                <input type="text" name="username_1"/><br/>
                <label>Enter Password :</label>
                <input type="password" name="password_1"/><br/>
                <input type="submit" value="Log In" name="submit_1"/><br/>
            </form>
        </div>


    </body>
</html>