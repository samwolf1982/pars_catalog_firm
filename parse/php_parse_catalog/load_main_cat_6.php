<?php

header('Content-Type: text/html; charset=windows-1251');
header('Content-Type: text/html; charset=utf-8');
//                 caci@leeching.net   mail
//    db                us                 pass

require_once ('../phpQuery/phpQuery/phpQuery.php');
require_once 'setings.php';
require_once 'PhpDebuger/debug.php';

$fname="res6/main_cat.csv";
if (($handle = fopen($fname, "r")) !== FALSE) {
	$id=1;
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

$t=$id+1;
/*    	if ($t==357 ||
$t==674 ||
$t==675 ||
$t==1262 || 
$t==1263 || 
$t==1264 || 
$t==1323 || 
$t==1571 || 
$t==1704 || 
$t==2664 || 
$t==2665 || 
$t==2666 || 
$t==3041 || 
$t==3042 || 
$t==3043 ) {
    	  $arr[]= array($id, $data[0]);
    	}*/

/*    	    	if (
$t==1262 || 
$t==2664 || 
$t==3041 
 )
*/
if(true)                {
    	  $arr[]= $data;
    	}
    
    $id++;
    }
    fclose($handle);
}




echo json_encode(  $arr);
?>