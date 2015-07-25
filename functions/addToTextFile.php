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
}
else {
//everything went fine
if(isset($_POST['newTicker']) && isset($_POST['submit'])) {
    $data = "\n" . $_POST['newTicker'];
    $ret = file_put_contents('../tickerMaster.txt', $data, FILE_APPEND | LOCK_EX);
    if($ret === false) {
        die('There was an error writing this file');
    }
    else {
        echo "$ret bytes written to file";
    }
}
else {
   die('no post data to process');
}
}