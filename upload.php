<?php
// print_r($_POST);
// print_r($_FILES);
// echo $_FILES['price_file_2']["tmp_name"];
error_reporting(0);
ini_set('display_errors', 0);

if (isset($_POST['submit_file'])) {
    $components_prices;
    session_start();
    $file = $_FILES['price_file']["tmp_name"];
    $myfile = fopen($file, "r") or die("Unable to open file!");
    $filedata = fread($myfile, filesize($file));

    $split_data = explode(";", $filedata);

    foreach ($split_data as &$value) {
        $value = trim($value);
    }

    function cake_types($value)
    {
        switch (mb_strtoupper($value)) {
            case "ТЕСТО":
                return "dough";
                break;
            case "КРЕМ":
                return "cream";
                break;
        }
    }
    function Parse($split_data__id)
    {
        echo $split_data__id[0];
        echo '<br>';
        $split_data__prices = explode(',', $split_data__id[1]);

        foreach ($split_data__prices as &$value) {
            $value = trim($value);
        }
        print_r($split_data__prices);

        $arr_temp;
        foreach ($split_data__prices as &$value) {
            $vals = explode(' ', $value);
            $arr_temp[mb_strtoupper(trim($vals[0]))] = trim($vals[1]);
        }
        return $arr_temp;
    }

    foreach ($split_data as &$value) {
        $split_data__id = explode(":", $value);
        print_r($split_data__id);
        echo '<br>';
        switch (mb_strtoupper($split_data__id[0])) {
            case "ТЕСТО": {
                    $components_prices[cake_types($split_data__id[0])] = Parse($split_data__id);
                    break 1;
                }
            case "КРЕМ": {
                    $components_prices[cake_types($split_data__id[0])] = Parse($split_data__id);
                    break 1;
                }
        }
        echo '<br>';

        print_r($components_prices);

        $_SESSION['prices'] = $components_prices;
        fclose($myfile);
    }
        // echo "<script>window.close();</script>";
    
    }

