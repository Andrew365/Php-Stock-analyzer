
<div id="link-bar">
  <ul class="list-inline">
    <li>
    <div id="adder">
      <form class="" action="functions/addToTextFile.php" method="post">
        <div class="form-group">
        <input class="btn btn-primary" type="submit" name="submit" value="Add Ticker">
        <input class="form-group" type="text" name="newTicker" value="">
      </div>
      </form>
    </div>
  </li>
  <li>
<!-- Download the stock data -->
    <div id="downloader">
      <form class="" action="functions/stockDownloader.php" method="post">
          <input class="btn btn-primary" type="submit" name="download" value="Download Stock Data">
      </form>
    </div>
  </li>
  <li>
<!-- Analyse with algorithm a -->
    <div id="analyze_a">
      <form class="" action="analysis/analysis_a.php" method="post">
        <input class="btn btn-primary" type="submit" name="analyze" value="Analyze data with algorithm A">
      </form>
    </div>
  </li>
<!-- END OF FORMS -->
  </ul>
</div>