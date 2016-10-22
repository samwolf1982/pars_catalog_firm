<?php

header('Content-Type: text/html; charset=windows-1251');
header('Content-Type: text/html; charset=utf-8');
//                 caci@leeching.net   mail
//    db                us                 pass

require_once ('../phpQuery/phpQuery/phpQuery.php');
require_once 'setings.php';
require_once 'PhpDebuger/debug.php';


$fname="all_prod2.csv";
$fname2="all_prod2.csv";

if (($handle = fopen($fname, "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
      $arr[]= array( $data[0],$data[1],$data[2]);
    }
    fclose($handle);
}



    $fp = fopen($fname2, 'w');

      
              
foreach ($arr as $key => $value) {
	$str = 'Toster классный сайт'; 
$value[1]=trim( mb_substr($value[1], mb_strpos($value[1], ' ')));
           fputcsv($fp, $value);  
}
fclose($fp);

echo "ok";
?>

