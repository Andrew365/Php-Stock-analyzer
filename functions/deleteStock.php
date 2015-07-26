<?php
require '../includes/connect.php';
$file = "../tickerMaster.txt";
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
 $sql4 = "DELETE FROM `tickers` WHERE ticker = '{$ticker}'";
 $result4 = mysqli_query($connect, $sql4);
 if($result4){
   echo "ticker {$ticker} removed from tickers";
 }elseif (!$result4) {
  echo mysqli_error($connect);
 }