<?php
header('Content-Type: text/html; charset=windows-1251');
header('Content-Type: text/html; charset=utf-8');
//                 caci@leeching.net   mail
//    db                us                 pass

require_once ('../phpQuery/phpQuery/phpQuery.php');
require_once 'setings.php';
require_once 'PhpDebuger/debug.php';


if (!isset($argv[1])) {
	# code...
	echo "NOt argv[1]".PHP_EOL;
	die();
}


//$_POST['param']='http://light-glass.com.ua/p48667710-lobovoe-steklo-pontiac.html';
$xml=simplexml_load_file("sitemap".$argv[1].".xml") or die("Error: Cannot create object");

  // ПРОВЕРКА НА СОВПАДЕНИЕ В БД
     $db = new PDO("mysql:host=".CURENT_HOST.";dbname=".CURENT_DB, CURENT_USER, CURENT_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
 
    

/*      // echo $sql;

 //$document=phpQuery::newDocument($xml);
$counter=0;
 //echo $xml->url[0].PHP_EOL;

for ($i=0; $i < count($xml->children()); $i++) { 
	# code...
	//echo $xml[$i]->eq($i)->loc.PHP_EOL;
	$o=$xml[0][$i]->url->loc;
	//var_dump($o[0]->url->loc);
	echo $o;
	//echo $o[$i]->url->loc;



	//die();
	//break;
}



die();*/
 foreach($xml->children() as $books) {
  // echo $books->loc. PHP_EOL;
       $sql="SELECT `catid` FROM `product` WHERE `url`='".$books->loc."'";
$stmt = $db->query($sql);
$result = $stmt->FETCH(PDO::FETCH_LAZY);
if (isset($result['catid'])) {
  # code...
echo " is present ".$counter++ .PHP_EOL;
        $dom=dom_import_simplexml($books->loc);
        $dom->parentNode->removeChild($dom);
//die();
}
else{
   //  write to xml
echo " new el ".$counter++.PHP_EOL;
}
   
} 

$xml->asXml('updated'.$argv[1].'.xml');



$db=null;
die();

//echo $result['catid'];
//echo "ok";
     







//print_r($xml);
?>
