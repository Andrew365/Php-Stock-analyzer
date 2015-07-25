<?php
include('../includes/connect.php');


//Algorithm that checks if price goes up after going down
function masterLoop(){
    $mainTickerFile = fopen("../tickerMaster.txt", "r");
    while(!feof($mainTickerFile)){
        $ticker = fgets($mainTickerFile);
        $ticker = trim($ticker);

        $nextDayIncrease = 0;
        $nextDayDecrease = 0;
        $nextDayNoChange = 0;

        $sumOfIncreases = 0;
        $sumOfDecreases = 0;

        $connect = mysqli_connect('localhost', 'Andrew', 'baseball365', 'stocks');

        $sql = "SELECT date, amount_change, percent_change FROM {$ticker}"; //WHERE percent_change < '0' ORDER BY date AS ASC";
        $data = mysqli_query($connect, $sql);

        if($data){
            echo "query successful" . '<br />';
            while($row = mysqli_fetch_array($data)){

                $date = $row['date'];
                $percent_change = $row['percent_change'];
                $sql2 = "SELECT date, percent_change FROM {$ticker} WHERE date > {$date} ORDER BY date ASC LIMIT 1";

                $data2 = mysqli_query($connect, $sql2);
                $numberOfRows = mysqli_num_rows($data2);


                if($numberOfRows == 1) {

                    $row2 = mysqli_fetch_row($data2);
                    $tom_date = $row2[0];
                    $tom_percent_change = $row[2];

                    if ($tom_percent_change > 0) {
                        $nextDayIncrease += $tom_percent_change;
                        $sumOfIncreases += $tom_percent_change;
                        $total = 0;
                        $total++;
                    } elseif ($tom_percent_change < 0) {
                        $nextDayDecrease++;
                        $sumOfDecreases += $tom_percent_change;
                        $total = 0;
                        $total++;
                    } else {
                        $nextDayNoChange++;
                        $total = 0;
                        $total++;
                    }
                }elseif($numberOfRows==0){
                    //no more data after today
                }else{
                    echo "you have an error in analysis_a";
                }
            }
        }
        else{
            echo "unable to select blah {$ticker} <br />" .  mysqli_error($connect);
            //we are ending up here
        }
        $nextDayIncreasePercent = ($nextDayIncrease/$total) * 100;
        $nextDayDecreasePercent = ($nextDayDecrease/$total) * 100;

        $averageIncreasePercent = $sumOfIncreases/$nextDayIncrease;
        $averageDecreasePercent = $sumOfDecreases/$nextDayDecrease;

        insertIntoResultTable($ticker, $nextDayIncrease, $nextDayIncreasePercent, $averageIncreasePercent, $nextDayDecrease, $nextDayDecreasePercent, $averageDecreasePercent);
    }
}



//insert data into the result table
function  insertIntoResultTable($ticker, $nextDayIncrease, $nextDayIncreasePercent, $averageIncreasePercent, $nextDayDecrease, $nextDayDecreasePercent, $averageDecreasePercent){

    $connect = mysqli_connect('localhost', 'Andrew', 'baseball365', 'stocks');

    $table_sql = "CREATE TABLE IF NOT EXISTS analysis_a (
                  ticker VARCHAR(8),
                  daysInc INTEGER,
                  pctOfDaysInc FLOAT,
                  avgIncPct FLOAT,
                  daysDec INTEGER,
                  pctOfDaysDec FLOAT,
                  avgDecPct FLOAT,
                  BuyValue FLOAT,
                  SellValue FLOAT
                   )";
    mysqli_query($connect, $table_sql);

    $BuyValue = $nextDayIncreasePercent * $averageIncreasePercent;
    $SellValue = $nextDayDecreasePercent * $averageDecreasePercent;

    $query="SELECT * FROM analysis_a WHERE ticker='$ticker' ";
    $result=mysqli_query($connect, $query);
    $numberOfRows = mysqli_num_rows($result);

    if($numberOfRows==1){
        $sql = "UPDATE analysis_a SET ticker='$ticker',daysInc='$nextDayIncrease',pctOfDaysInc='$nextDayIncreasePercent',avgIncPct='$averageIncreasePercent',daysDec='$nextDayDecrease',pctOfDaysDec='$nextDayDecreasePercent',avgDecPct='$averageDecreasePercent',BuyValue='$BuyValue',SellValue='$SellValue' WHERE ticker='$ticker' ";
        mysqli_query($connect, $sql);
    }else{
        $sql="INSERT INTO analysis_a (ticker,daysInc,pctOfDaysInc,avgIncPct,daysDec,pctOfDaysDec,avgDecPct,BuyValue,SellValue) VALUES ('$ticker', '$nextDayIncrease', '$nextDayIncreasePercent', '$averageIncreasePercent', '$nextDayDecrease', '$nextDayDecreasePercent', '$averageDecreasePercent', '$BuyValue', '$SellValue')";
        mysqli_query($connect, $sql);
    }

}
//call your function
masterLoop();

?>