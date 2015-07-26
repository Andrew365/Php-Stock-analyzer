<?php
function showTickers($algo_name){
require 'includes/connect.php';
  $sql = "SELECT ticker, daysInc, pctOfDaysInc, avgIncPct, daysDec, pctOfDaysDec, avgDecPct, BuyValue, SellValue FROM {$algo_name}";
  $data = mysqli_query($connect, $sql);
  if(!$data){
    echo "No tickers ";
    return false;
  }
  echo '<table class="table">
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
      </thead>';

  while($row = mysqli_fetch_array($data)){
    $i = 0;
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

      echo '
      <tr>
        <td>' . $ticker .'</td>' .
        '<td>' . $daysInc .'</td>' .
        '<td>' . $pctOfDaysInc .'</td>' .
        '<td>' . $avgIncPct .'</td>' .
        '<td>' . $daysDec .'</td>' .
        '<td>' . $pctOfDaysDec.'</td>' .
        '<td>' . $avgDecPct .'</td>' .
        '<td>' . $BuyValue .'</td>' .
        '<td>' . $SellValue .'</td>
         <td> <form class="" action="functions/deleteStock.php" method="post">
             <input class="btn btn-primary" type="submit" name="delete" value="Delete">
           </form>
          <td>
        </tr>';

      }
echo '</table>';
}