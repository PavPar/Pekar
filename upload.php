<?php
// print_r($_POST);
// print_r($_FILES);
// echo $_FILES['price_file_2']["tmp_name"];

if (isset($_POST['submit'])) {
    session_start();    
    $file = $_FILES['price_file']["tmp_name"];
    $myfile = fopen($file, "r") or die("Unable to open file!");
    $_SESSION['filedata'] = fread($myfile, filesize($file));
    echo $_SESSION['filedata'];
    fclose($myfile);
}
// echo "<script>window.close();</script>";
// header("Location: /order__info/bill.php");
