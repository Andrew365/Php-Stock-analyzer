<?php
require'templates/master.php';
?>
<html>
  <head>
    <link rel="stylesheet" href="public/stylesheets/index.css";
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Dashboard</h1>
    <div class="container">
      <h4>Stocks</h4>
      <hr />
      <?php
      showTickers();
      ?>
    </div>

    <div id="adder">
      <form class="" action="functions/addToTextFile.php" method="post">
        <input type="text" name="newTicker" value="">
        <input class="btn btn-primary" type="submit" name="submit" value="Add Ticker">
      </form>
    </div>

    <div id="downloader">
      <form class="" action="functions/stockDownloader.php" method="post">
          <input class="btn btn-primary" type="submit" name="download" value="Download Stock Data">
      </form>
    </div>

    <div id="analyze_a">
      <form class="" action="analysis/analysis_a.php" method="post">
        <input class="btn btn-primary" type="submit" name="analyze" value="Analyze data with algorithm A">
      </form>
    </div>

  </body>
</html>

<!--
-
-put PHP functions here
-
 -->



<?php
function showTickers(){
$mainTickerFile = fopen("tickerMaster.txt", "r");

$mainTickerFile = fopen("tickerMaster.txt", "r");

while (!feof($mainTickerFile)) {
    $companyTicker = fgets($mainTickerFile);
    $companyTicker = trim($companyTicker);

    echo '<div id ="stocks">'. $companyTicker . '</div><br /> ';
  }
}
?>