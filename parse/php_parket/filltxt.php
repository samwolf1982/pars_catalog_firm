<?php

header('Content-Type: text/html; charset=windows-1251');
header('Content-Type: text/html; charset=utf-8');
//                 caci@leeching.net   mail
//    db                us                 pass

require_once ('../phpQuery/phpQuery/phpQuery.php');
require_once 'setings.php';
require_once 'PhpDebuger/debug.php';


$fname='all_prod2.csv';
     $db = new PDO("mysql:host=".CURENT_HOST.";dbname=".CURENT_DB, CURENT_USER, CURENT_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
 
       $sql="SELECT * FROM `oc_product_description` WHERE 1";

       $stmt = $db->query($sql);


           $fp = fopen($fname, 'w');


       while ($row = $stmt->fetch())
{

               fputcsv($fp, array( $row['product_id'],$row['name'],$row['name']));
               
}
fclose($fp);



echo "OK ";
?>