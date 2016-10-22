<?php

header('Content-Type: text/html; charset=windows-1251');
header('Content-Type: text/html; charset=utf-8');
//                 caci@leeching.net   mail
//    db                us                 pass

require_once ('../phpQuery/phpQuery/phpQuery.php');
require_once 'setings.php';
require_once 'PhpDebuger/debug.php';

require('PhpDebuger/lib/FirePHPCore/FirePHP.class.php');
$firephp = FirePHP::getInstance(true);

$count_folder=200;
$url='http://anfloors.ru';
$fname="res1/cat_urls.csv";
$arr= array();
if (($handle = fopen($fname, "r")) !== FALSE) {
  $id=1;
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

$t=$id+1;
if(true){
    //     url name count

            
        $arr[]= $data;
    

      }
    
    $id++;
    }
    fclose($handle);
}


array_shift($arr);     //    remove firest el

            $n=18;
$resultArr=array();
foreach ($arr as $key => $value) {

        if ($value[2]<=$n) {
        $resultArr[]=$value;
        }else{

           $res= floor( $value[2]/  $n);
       
       for ($i=1; $i <=$res ; $i++) {

              if ($i===1) {
        $resultArr[]=$value;
              }else{
         $temp=$value;
           $temp[0]= $temp[0].'/'.$i;
          $resultArr[]=$temp;
      }
       }

        }

/*$firephp->fb(array( $value[2],$res)); 
die();*/


}




echo json_encode(  $resultArr);

die();


$count=10;


	# code...
$r=1;
for ($i=0; $i < count($arr) ; $i++) { 


$pt=$url.$arr[$i][1];
$dest='img/';
 if($i%count_folder==0) {$r++;}
$pref='gogi'.strval($r).'/';
$dest.=$pref;

$firephp->fb($dest); 
if (@!mkdir($dest, 0777, true)) {
    /*die('Не удалось создать директории...');*/
}
 
 $path_parts = pathinfo($arr[$i][1]);

/*echo $path_parts['dirname'], "\n";
echo $path_parts['basename'], "\n";
echo $path_parts['extension'], "\n";*/
 $n= $path_parts['filename'].'.'.$path_parts['extension']; // начиная с PHP 5.2.0

$firephp->fb($n);
/*die();*/
//   copy file 

stream_copy($pt, $dest.$n);

if ($count-- <0) {
break;
}
// write to db;
}






die();

echo json_encode(  $arr);


 function stream_copy($src, $dest)
    {
        $fsrc = fopen($src,'r');
        $fdest = fopen($dest,'w+');
        $len = stream_copy_to_stream($fsrc,$fdest);
        fclose($fsrc);
        fclose($fdest);
        return $len;
    } 
?>