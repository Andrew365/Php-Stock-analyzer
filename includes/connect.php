<?php
$connect = mysqli_connect('localhost', 'Andrew', 'baseball365', 'stocks');
if(!$connect){die('connection failed');}
if($connect){}else{echo"connection failed" .mysqli_connect_error();}
?>