<?php
require '../includes/connect.php';
$ticker = $_POST['ticker'];
 $sql = "DROP TABLE {$ticker}";
 $data = mysqli_query($connect, $sql);

 $sql2 = "DELETE FROM `analysis_a` WHERE ticker = '{$ticker}'";
 $data2 = mysqli_query($connect, $sql2);

 if($data){

   echo "Table {$ticker} deleted" . '<br />';
 }
 else{
echo  mysqli_error($connect);
 }
 if($data2){
   echo "Row {$ticker} deleted from analysis_a";
 }else{
   echo  mysqli_error($connect);
 }