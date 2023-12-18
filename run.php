//this page to run php functions using jquery

<?php

function test($data){
    return $data+1;
}

if (isset($_POST['callFunc1'])) {
    echo test($_POST['callFunc1']);
}