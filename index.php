<?php
require'templates/master.php';
?>
<html>
  <head>
    <link rel="stylesheet" href="public/stylesheets/index.css"/>
    <meta charset="utf-8">
    <title></title>

  </head>
  <body>
    <h1>Dashboard</h1>
    <!-- FORMS -->
    <!-- Add Tickers To Text File Form -->
        <div id="adder">
          <form class="" action="functions/addToTextFile.php" method="post">
            <input class="btn btn-primary" type="submit" name="submit" value="Add Ticker">
            <input type="text" name="newTicker" value="">
          </form>
        </div>

    <!-- Download the stock data -->
        <div id="downloader">
          <form class="" action="functions/stockDownloader.php" method="post">
              <input class="btn btn-primary" type="submit" name="download" value="Download Stock Data">
          </form>
        </div>

    <!-- Analyse with algorithm a -->
        <div id="analyze_a">
          <form class="" action="analysis/analysis_a.php" method="post">
            <input class="btn btn-primary" type="submit" name="analyze" value="Analyze data with algorithm A">
          </form>
        </div>

    <!-- END OF FORMS -->

      <div class="container">
        <h4>Stocks</h4>
        <hr />
        <?php
          require 'functions/showTickers.php';
          showTickers('analysis_a');
        ?>
      </div>
  </body>
</html>

<!--
-
-put PHP functions here
-
 -->
