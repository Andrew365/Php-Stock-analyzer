<?php
require('includes/connect.php');

function createURL($ticker){

    $curMonth = date("n");
    $curMonth = $curMonth - 1;
    $curDay = date("j");
    $curYear = date("Y");

    $fromMonth = 6; //this will be one more than said
    $fromDay = 1;
    $fromYear = 2014;

 return "http://real-chart.finance.yahoo.com/table.csv?s={$ticker}&d={$curMonth}&e={$curDay}&f={$curYear}&g=d&a={$fromMonth}&b={$fromDay}&c={$fromYear}&ignore=.csv";
}


function getCsvFile($url, $outputFile){

    $content = file_get_contents($url);
    $content = str_replace("Date,Open,High,Low,Close,Volume,Adj Close", "", $content);
    $content = trim($content);

    file_put_contents($outputFile, $content);
}

function fileToDatabase($txtfile, $tablename){

    $file = fopen($txtfile, "r");

    while(!feof($file)){
        $line = fgets($file);
        $pieces = explode(",", $line);

        $date = $pieces[0];
        $open = $pieces[1];
        $high = $pieces[2];
        $low = $pieces[3];
        $close = $pieces[4];
        $volume = $pieces[5];
       // $adj_close = $pieces[6];

        $change = $close - $open;
        $percent_change = ($change/$open)*100;

        $sql = "SELECT * FROM {$tablename}";
        $connect = mysqli_connect('localhost', 'Andrew', 'baseball365', 'stocks');
        $result = mysqli_query($connect, $sql);

        if(!$result){
            $sql2 = "CREATE TABLE IF NOT EXISTS {$tablename}(date DATE,
                PRIMARY KEY(date),
                open FLOAT, high FLOAT,
                 low FLOAT, close FLOAT,
                  volume INT, amount_change FLOAT,
                  percent_change FLOAT )";
                $result2 = mysqli_query($connect, $sql2);
            if($result2){
                echo 'success';
            }else{
                echo'<br />'. "error with the tables " . '<br />'. mysqli_error($connect) . '<br />';
            }
        }

        $sql3 = "INSERT INTO {$tablename} (date, open, high, low, close, volume, amount_change, percent_change)
        VALUES ('$date','$open','$high','$low','$close','$volume','$change','$percent_change')";
        $result3 = mysqli_query($connect, $sql3);

        //ini_set('max_execution_time', 300); //300 seconds = 5 minutes

        if($result3){
            echo 'success';
        }else{
            echo'<br />'. "error with the database " . mysqli_error($connect);
        }
    }
    fclose($file);
}


function main(){

    $mainTickerFile = fopen("tickerMaster.txt", "r");

    while(!feof($mainTickerFile)){
        $companyTicker = fgets($mainTickerFile);
        $companyTicker = trim($companyTicker);

        $fileURL = createURL($companyTicker);
        $companyTextFile = "TextFiles/". $companyTicker.".txt";

        getCsvFile($fileURL, $companyTextFile);

        fileToDatabase($companyTextFile, $companyTicker);
    }

}

main();
?>