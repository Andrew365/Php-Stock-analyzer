<?php
include('../includes/connect.php');

function masterLoop(){
    $mainTickerFile = fopen("../tickerMaster.txt", "r");
    while(!feof($mainTickerFile)){
        $ticker = fgets($mainTickerFile);
        $ticker = trim($ticker);
    }
}

?>