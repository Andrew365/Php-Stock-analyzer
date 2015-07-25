<?php
require'templates/master.php';
?>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Dashboard</h1>
    <div class="container">
      <h4>Stocks</h4>
      <hr />
      <?php
      $mainTickerFile = fopen("tickerMaster.txt", "r");

      $mainTickerFile = fopen("tickerMaster.txt", "r");

      while (!feof($mainTickerFile)) {
          $companyTicker = fgets($mainTickerFile);
          $companyTicker = trim($companyTicker);

          echo '<div id ="stocks">'. $companyTicker . '</div><br /> ';
        }

      ?>
    </div>
  </body>
</html>