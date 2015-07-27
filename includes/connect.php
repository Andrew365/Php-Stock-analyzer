<?php

$env = "dev";

if($dev == "dev"){
$connect = mysqli_connect('localhost', 'Andrew', 'baseball365', 'stock2');
if(!$connect){die('connection failed');}
if($connect){}else{echo"connection failed" .mysqli_connect_error();}
}
elseif ($env =="prod") {
  $connect = mysqli_connect('localhost', 'Andrew', 'baseball365', 'stock2');
//change this to prod creditials
}
?>