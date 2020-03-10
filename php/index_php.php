<?php
if (isset($_GET['submit'])) {
    $myfile = fopen($_GET['price_file'], "r") or die("Unable to open file!");
    $_SESSION['filedata'] = fread($myfile, filesize($_GET['price_file']));
    fclose($myfile);
}

header("Location: /order__info/bill.php");
