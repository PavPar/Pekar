<?php
if (isset($_POST['fileToUpload'])) {
    $file=$_POST['fileToUpload'];
    $myfile = fopen($file, "r") or die("Unable to open file!");
    $_SESSION['filedata'] = fread($myfile, filesize($file));
    fclose($myfile);
}

// header("Location: /order__info/bill.php");
