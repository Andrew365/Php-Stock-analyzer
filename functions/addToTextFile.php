<?php
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