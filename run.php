<?php
//this page to run php functions using jquery



if (isset($_POST['showhistory'])) {
include 'connect.php';


$sql = "SELECT * FROM history"; // Select all columns

    $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($result)) {

      // Access data using column names as array keys
      $name = $row["personalname"];
      $phone = $row["personalphone"];


      // Display data or use it within your template/logic
      echo nl2br("your name is ".$name . "- and your phone is : ".$phone ."<br/>"); 
       
    }
    





    echo"end of table";
}