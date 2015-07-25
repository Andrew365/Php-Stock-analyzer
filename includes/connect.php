<?php
$connect = mysqli_connect('localhost', 'Andrew', 'baseball365', 'stocks');
if(!$connect){die('connection failed');}
if($connect){echo"connected".'<br />';}else{echo"connection failed" .mysqli_connect_error();}
?>