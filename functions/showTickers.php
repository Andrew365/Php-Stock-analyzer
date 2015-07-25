<?php
function showTickers($algo_name){
require 'includes/connect.php';
// $mainTickerFile = fopen("tickerMaster.txt", "r");
//
// while (!feof($mainTickerFile)) {
//     $companyTicker = fgets($mainTickerFile);
//     $companyTicker = trim($companyTicker);

    // $info_sql = "SELECT *  FROM {$algo_name}";
    // $info_res = mysqli_query($connect, $info_sql);

  //  $sql = "SELECT date, amount_change, percent_change FROM {$ticker}"; //WHERE percent_change < '0' ORDER BY date AS ASC";
  $sql = "SELECT ticker, daysInc, pctOfDaysInc, avgIncPct, daysDec, pctOfDaysDec, avgDecPct, BuyValue, SellValue FROM {$algo_name}";
  $data = mysqli_query($connect, $sql);
  while($row = mysqli_fetch_array($data)){
    $ticker = $row['ticker'];
    $daysInc = $row['daysInc'];
    $pctOfDaysInc = $row['pctOfDaysInc'];
    $avgIncPct = $row['avgIncPct'];
    $daysDec = $row['daysDec'];
    $pctOfDaysDec = $row['pctOfDaysDec'];
    $avgDecPct = $row['avgDecPct'];
    $BuyValue = $row['BuyValue'];
    $SellValue = $row['SellValue'];
//Show data in index
    echo ' <table class="table">
        <thead>
          <tr>
            <th>Ticker</th>
            <th>Days Inc</th>
            <th>pctOfDaysInc</th>
            <th>avgIncPct</th>
            <th>daysDec</th>
            <th>pctOfDaysDec</th>
            <th>avgDecPct</th>
            <th>BuyValue</th>
            <th>SellValue</th>
          </tr>
        </thead>'.
        '<td>' . $ticker .'</td>' .
        '<td>' . $daysInc .'</td>' .
        '<td>' . $pctOfDaysInc .'</td>' .
        '<td>' . $avgIncPct .'</td>' .
        '<td>' . $daysDec .'</td>' .
        '<td>' . $pctOfDaysDec.'</td>' .
        '<td>' . $avgDecPct .'</td>' .
        '<td>' . $BuyValue .'</td>' .
        '<td>' . $SellValue .'</td>
          </tr>

        </table>';

  }
}