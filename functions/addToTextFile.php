<?php
require 'stockDownloader.php';

$curMonth = date("n");
$curMonth = $curMonth - 1;
$curDay   = date("j");
$curYear  = date("Y");

$fromMonth = 6; //this will be one more than said
$fromDay   = 1;
$fromYear  = 2015;
//checks if the data entered into the add ticker box is valid and will return an if if not
$ticker = $_POST['newTicker'];
$file = "http://real-chart.finance.yahoo.com/table.csv?s={$ticker}&d={$curMonth}&e={$curDay}&f={$curYear}&g=d&a={$fromMonth}&b={$fromDay}&c={$fromYear}&ignore=.csv";
$file_headers = @get_headers($file);
if($file_headers[0] == 'HTTP/1.1 404 Not Found') {
require 'errors.php';
$error = new error();
$error->fileNotFound();
return false;
}
else {
//everything went fine
if(isset($_POST['newTicker']) && isset($_POST['submit'])) {
    require '../includes/connect.php';

    $sql = "SELECT * FROM tickers";
    $result = mysqli_query($connect, $sql);
    if(!$result){
      $sql_table = "CREATE TABLE IF NOT EXISTS tickers(
        ticker VARCHAR(8)
      )";
      $table_result = mysqli_query($connect, $sql_table);
    }
    $sql2 = "INSERT INTO tickers (ticker) VALUES ('$ticker')";
    $insert_query = mysqli_query($connect, $sql2);
    if($insert_query){
      echo 'ticker insert succesfully';
    }elseif(!$insert_query){
      echo mysqli_error($connect);
    }

}

}