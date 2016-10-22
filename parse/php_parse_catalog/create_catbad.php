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











           $db = new PDO("mysql:host=".CURENT_HOST.";dbname=".CURENT_DB, CURENT_USER, CURENT_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
 
$stmt = $db->prepare('SELECT txt FROM a_cat WHERE 1');
$stmt->execute();


$graf=array();
$prod_arr=array();
$cat_csv=array();
// clear
/*log_compere(array(),'log.csv','w');*/
$n_id=427;

$all = array();
foreach ($stmt as $row)
{
	$all[]=$row;

}






$total=count($all);

$deep=1;
$id=428;
$a1=array();
$full=array();
$temp=array();
$divode=100;

$all_res=array();
for ($i=0; $i <$total /$divode ; $i++) { 
     $all_res[]=  json_decode( $all[$i]['txt'],true );
 }

/*$firephp->fb($all_res);*/
 /* Defaults to FirePHP::LOG */   
/*   die();*/










for ($i=0; $i <$total /$divode; $i++) { 
    /* $res=  json_decode( $all[$i]['txt'],true );*/
    $all_res[$i]['p_id']=427;
$obj=$all_res[$i]['bread'][array_keys($all_res[$i]['bread'])[$deep]];
$obj=$all_res[$i];

       /* $obj=$res['bread'][array_keys($res['bread'])[$deep]];*/
      /*  $res['bread']['p_id']=;*/
            /* $full[]=array( 'name'=>array_keys($res['bread'])[$deep],'url'=>$obj,'id'=>$id ,'p_id'=>427);*/

     /*   if (!in_array($obj, $temp)) {

          $a1[]=array( 'name'=>array_keys($res['bread'])[$deep],'url'=>$obj,'id'=>$id++ ,'p_id'=>427);
          $temp[]= $obj;   
        }*/

       /* $id++;*/
}
/////////////////////////////////////   
$firephp->fb($obj);
die();


$id++;
$deep=2;
$temp=array();
$full2=array();
$temp_pid=-111;
for ($i=0; $i <$total ; $i++) { 
     $res=  json_decode( $all[$i]['txt'],true );
$firephp->fb($res); /* Defaults to FirePHP::LOG */  die();  
        if (count($res['bread'])>2) {
           $obj=$res['bread'][array_keys($res['bread'])[$deep]];                       
           $full2[] =array( 'name'=>array_keys($res['bread'])[$deep],'url'=>$obj,'id'=>$id ,'p_id'=>$full[$i]['id']);
          $p_id= $full[$i]['id'];
          // если один родитель тогда проверка на совпадение категории
           if ($temp_pid==$p_id) {
           	   if (!in_array($obj, $temp)) {

             $a1[]=array( 'name'=>array_keys($res['bread'])[$deep],'url'=>$obj,'id'=>$id ,'p_id'=>$p_id);
     
          $temp[]= $obj;   
        }
           }else{$temp=array();}      // обнгулить массив 

             
         $temp_pid=$p_id;

     
      
        }
     


$id++;
}



$firephp->fb($a1); /* Defaults to FirePHP::LOG */      die(); 




echo count($full2);

echo "ok" .json_encode( $full2,JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
/*echo "ok" .json_encode( $a1,JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);*/










die();




















foreach ($stmt as $row)
{
   $res= json_decode( $row['txt'],true );

/*$parent_hash=$res['bread'][0];*/
        	$parent='home'; $p_id=427;
        	      foreach ($res['bread'] as $key => $value) {


     	// пара хом + кей 


$gate=true;

/*$h_obj=  hash('md5', $parent.$key);

$pr=isset($graf[$h_obj])?$graf[$h_obj]:false;

if (!$pr) {
	$graf[$h_obj]=array('p' =>$parent,'p_id'=>$p_id,'id'=>$key ,'n_id'=>$n_id,'url'=>$value );
}else{

	
}*/



              foreach ($graf as $k => $v) {


log_compere(array($v['p'],$parent,  $v['id'],$key, count($graf)));
                   if ($v['p']==$parent & $v['id']==$key) {

                   	 $gate=false;
$p_id=$v['p_id'];
/*log_compere(array($v['p'],$parent,  $v['id'],$key, count($graf),'OK'));*/
break;

                   }
              }


              if ($gate) {
              	 		// если не существует, создать новый граф

              	if (empty($value)) {
              		$prod_arr[]=  array('prod_id'=>$res['id'],'cat_id' => $p_id, 'cat_name' => $key);
              	}else{

$graf[]=array('p' =>$parent,'p_id'=>$p_id,'id'=>$key ,'n_id'=>$n_id,'url'=>$value );
              /*	array_unshift ($graf,array('p' =>$parent,'p_id'=>$p_id,'id'=>$key ,'n_id'=>$n_id,'url'=>$value ));	*/
     	     

log_compere(
        array($n_id,$p_id,$key,'true',1,20,'','2009-01-03 21:08:57','2009-01-03 21:08:57','','','','',0,'','true'),'categori.csv','ab');




     	     $parent=$key;
     	     $p_id=$n_id++;

     	 }
              } 
    

     }
     /*  end for bread */
if (count($graf)>50)     break;

}





write_prod_to_cat($prod_arr);

//  write csv cat

foreach ($graf as $key => $v) {
log_compere(
        array($v['n_id'],$v['p_id'],$v['id'],'true',1,20,'','2009-01-03 21:08:57','2009-01-03 21:08:57','','','','',0,'','true'),'categori2.csv','ab');
}


$main_arr= json_encode( $prod_arr,JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE); 
echo $main_arr.PHP_EOL;


$main_arr= json_encode( $graf,JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE); 
echo $main_arr;






function log_compere($arr,$fname='log.csv',$mode='ab')
{
	 $fp = fopen($fname, $mode);
               fputcsv($fp,$arr);         
fclose($fp);
}

function write_prod_to_cat($arr,$fname='prod_to_cat.csv',$mode='ab')
{
foreach ($arr as $key => $value) {
        log_compere($value, $fname, $mode);
}
}

?>