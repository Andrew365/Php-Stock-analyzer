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
//  $contents = file_get_contents($file);
//  $contents = str_replace($ticker, '', $contents);
// $del = file_put_contents($file, $contents);
//  if($del){
//    echo "ticker delted from text file";
//  }
//  $lines = file($file, FILE_IGNORE_NEW_LINES);
//  $remove = " ";
//  foreach($lines as $key => $line)
//    if(stristr($line, $remove)) unset($lines[$key]);
//
//  $data = implode('\n', array_values($lines));
//
//  $file = fopen($file, "r");
//  fwrite($file, $data);
//  fclose($file);