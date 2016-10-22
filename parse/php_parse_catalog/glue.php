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
$f=["res1/s1_ready.csv","res2/s2_ready.csv","res3/s3_ready.csv","res4/s4_ready.csv","res5/s5_ready.csv","res6/s6_ready.csv"];

$res="FIN/glue_fin.csv";


$main_arr=array();


foreach ($f as $key => $fname) {

if (($handle = fopen($fname, "r")) !== FALSE) {
  $id=1;
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
         

         if (!empty($data[0])) {

         	            if (!isset($data[1]))$data[1]='';
         	            if (!isset($data[2]))$data[2]='';
        $main_arr[]= array($data[0],$data[1],$data[2]);
         }
      
    

      
   
    }
    fclose($handle);
}

echo("ok".PHP_EOL);

$file = fopen($res,"ab");
foreach ($main_arr as $key => $value) {
	  
    
 fputcsv($file,$value);

}
fclose($file);



}
echo(count($main_arr));












die();
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