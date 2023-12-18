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
      $createddate = $row["nowdate"];
      $birthdate = $row["birthdate"];
      $gender = $row["gender"];
      $firstvisit = $row["firstvisit"];
      $durationvisit = $row["duration"];
      $notes = $row["notes"];


      // Display data or use it within your template/logic
      //echo nl2br("your name is ".$name . "- and your phone is : ".$phone ."<br/>"); 


      $currentrow ="<tr class='information'>".
      "<td class='tdcreatedate'>" .$createddate. "</td>".
      "<td>".$name."</td>".
      "<td>".$phone."</td>".
      "<td>".$birthdate."</td>".
      "<td>".$gender."</td>".
      "<td>".$firstvisit."</td>".
      "<td>".$durationvisit."</td>".
      "<td class='tdclick' onclick='shownotes(this)' data-note='".$notes."'>SHOW</td>".
  "</tr>";
  echo $currentrow;
    }
    





    
}