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

/*$firephp->fb(array( $v['p'],$parent,  $v['id'],$key));*/
$all = array();
foreach ($stmt as $row)
{
	$v=json_decode( $row[0],true );
	$all[]= $v;
/*$firephp->fb($v); die(); */
}
$total=count($all);


/*$firephp->fb(array($all[5]));*/



$parent='home';
 $p_id=427;
 $c_id=428;
$graf=array();
$deep=1;
// хеши для первого прохода 1 
for ($i=0; $i <$total ; $i++) { 
	$key=array_keys($all[$i]['bread'])[$deep];
	$obj=$all[$i]['bread'][$key];

 $hash=  hash('md5',$obj);

if (!isset($graf[$hash])) {
/*	$firephp->fb($hash);*/
$graf[$hash]=array('p' =>$parent,'p_id'=>$p_id,'name_key'=>$key ,'id'=>$c_id++,'url'=>$obj );

/*	$firephp->fb($graf[$hash]);
*/
//  debub
/*$key=array_keys($all[$i]['bread'])[$deep];
	$obj=$all[$i]['bread'][$key];
$firephp->fb($obj);*/

}


}
/*
	$firephp->fb($graf);*/
//      level 1 ok	

$parent='home';
 $p_id=427;
$deep=2;
// хеши для первого прохода 1 
for ($i=0; $i <$total ; $i++) { 


  $c=count($all[$i]['bread']);
     if ($deep>=$c) { // продукт

     		/*$firephp->fb($c);
     		$firephp->fb($all[$i]);*/
$ks = array_keys($all[$i]['bread']);
$last = end($ks);

 $prod_arr[]=  array('prod_id'=>$all[$i]['id'],'cat_id' => $p_id,'name'=>$last);

     }else{     // не продукт

    $key=array_keys($all[$i]['bread'])[$deep];
	$obj=$all[$i]['bread'][$key];

	    $key_p=array_keys($all[$i]['bread'])[$deep-1];
	    $obj_p=$all[$i]['bread'][$key_p];
	
/*	$firephp->fb(array($key,$obj,$key_p,$obj_p));
	die();*/
 $hash=  hash('md5',$obj);

 if (!isset($graf[$hash])) {

// search by hash 
 		$key1=array_keys($all[$i]['bread'])[$deep-1];
	$obj1=$all[$i]['bread'][$key1];
/*$firephp->fb($obj1);*/
$hash1=  hash('md5',$obj1);
$old_obj=$graf[$hash1];
/*$firephp->fb( $old_obj);*/
$graf[$hash]=array('p' =>$old_obj['name_key'],
   	                  'p_id'=>$old_obj['id'],
   	                  'name_key'=>$key ,'id'=>$c_id++,'url'=>$obj );

  /*   	$firephp->fb( $graf[$hash]);*/

/*	die();*/
/*   $graf[$hash]=array('p' =>$parent,'p_id'=>$p_id,'name_key'=>$key ,'id'=>$c_id++,'url'=>$obj );
*/ }
     }


}
/*$firephp->fb($prod_arr);*/
/*	$firephp->fb($graf);*/
//      level 2 ok	






$deep=3;
// хеши для первого прохода 1 
for ($i=0; $i <$total ; $i++) { 


  $c=count($all[$i]['bread']);
     if ($deep>=$c) { // продукт

/*     		$firephp->fb($c);
     		$firephp->fb($all[$i]);

*/        
     if (isset(array_keys($all[$i]['bread'])[$deep-2])) {
     	
     	
        $key_p=array_keys($all[$i]['bread'])[$deep-2]; // ???
       /* $firephp->fb($key_p);*/
	    $obj_p=$all[$i]['bread'][$key_p];
	         /*$firephp->fb($obj_p);*/
	     $hash=  hash('md5',$obj_p);
$cat_last= $graf[$hash];
	    	/*$firephp->fb($cat_last);*/
     		 $p_id=$cat_last['id'];
$ks = array_keys($all[$i]['bread']);
$last = end($ks);

 $prod_arr[]=  array('prod_id'=>$all[$i]['id'],'cat_id' => $p_id,'name'=>$last);
 /*	$firephp->fb($prod_arr);*/
/*die();*/

   }  }else{     // не продукт

    $key=array_keys($all[$i]['bread'])[$deep];
	$obj=$all[$i]['bread'][$key];

	    $key_p=array_keys($all[$i]['bread'])[$deep-1];
	    $obj_p=$all[$i]['bread'][$key_p];
	
/*	$firephp->fb(array($key,$obj,$key_p,$obj_p));
	die();*/
 $hash=  hash('md5',$obj);

 if (!isset($graf[$hash])) {

// search by hash 
 		$key1=array_keys($all[$i]['bread'])[$deep-1];
	$obj1=$all[$i]['bread'][$key1];
/*$firephp->fb($obj1);*/
$hash1=  hash('md5',$obj1);
$old_obj=$graf[$hash1];
/*$firephp->fb( $old_obj);*/
$graf[$hash]=array('p' =>$old_obj['name_key'],
   	                  'p_id'=>$old_obj['id'],
   	                  'name_key'=>$key ,'id'=>$c_id++,'url'=>$obj );

  /*   	$firephp->fb( $graf[$hash]);*/

/*	die();*/
/*   $graf[$hash]=array('p' =>$parent,'p_id'=>$p_id,'name_key'=>$key ,'id'=>$c_id++,'url'=>$obj );
*/ }
     }


}
/*$firephp->fb($prod_arr);
	/*$firephp->fb($graf);*/
//      level 3 ok	
//}      // end deep 3
//----------------------------------------------------



for ($j=4; $j <10 ; $j++) { 
	# code...

$deep=$j;
// хеши для первого прохода 1 
for ($i=0; $i <$total ; $i++) { 


  $c=count($all[$i]['bread']);
     if ($deep==$c) { // продукт

     	/*	$firephp->fb($c);
     		$firephp->fb($all[$i]);*/

        

     if (isset(array_keys($all[$i]['bread'])[$deep-2])) {
/*$firephp->fb('ok');   */  	 
           $key_p=array_keys($all[$i]['bread'])[$deep-2]; // ???
   /*     $firephp->fb($key_p);*/
	    $obj_p=$all[$i]['bread'][$key_p];
	        /* $firephp->fb($obj_p);*/
	     $hash=  hash('md5',$obj_p);
$cat_last= $graf[$hash];
	    /*	$firephp->fb($cat_last);*/
     		 $p_id=$cat_last['id'];
     		/*die();*/

     	$ks = array_keys($all[$i]['bread']);
$last = end($ks);	
 $prod_arr[]=  array('prod_id'=>$all[$i]['id'],'cat_id' => $p_id,'name'=>$last);
 /*	$firephp->fb($prod_arr);*/
/*die();*/

   }  }else{     // не продукт
if ($deep<$c) { 
    $key=array_keys($all[$i]['bread'])[$deep];
	$obj=$all[$i]['bread'][$key];

	    $key_p=array_keys($all[$i]['bread'])[$deep-1];
	    $obj_p=$all[$i]['bread'][$key_p];
	
/*	$firephp->fb(array($key,$obj,$key_p,$obj_p));
	die();*/
 $hash=  hash('md5',$obj);

 if (!isset($graf[$hash])) {

// search by hash 
 		$key1=array_keys($all[$i]['bread'])[$deep-1];
	$obj1=$all[$i]['bread'][$key1];
/*$firephp->fb($obj1);*/
$hash1=  hash('md5',$obj1);
$old_obj=$graf[$hash1];
/*$firephp->fb( $old_obj);*/
$graf[$hash]=array('p' =>$old_obj['name_key'],
   	                  'p_id'=>$old_obj['id'],
   	                  'name_key'=>$key ,'id'=>$c_id++,'url'=>$obj );

  /*   	$firephp->fb( $graf[$hash]);*/

/*	die();*/
/*   $graf[$hash]=array('p' =>$parent,'p_id'=>$p_id,'name_key'=>$key ,'id'=>$c_id++,'url'=>$obj );
*/ }


}
     }


}
/*$firephp->fb($prod_arr);
	/*$firephp->fb($graf);*/
//      level 3 ok	
}      // end deep 4
//----------------------------------------------------









   log_compere(
        array(427,0,'catalog','true',1,20,'','2009-01-03 21:08:57','2009-01-03 21:08:57','','','','',0,'','true'),'categori.csv','ab');   
foreach ($graf as $key => $value) {
/*	$firephp->fb($value);
  die();*/
      log_compere(
        array($value['id'],$value['p_id'],$value['name_key'],'true',1,20,'','2009-01-03 21:08:57','2009-01-03 21:08:57','','','','',0,'','true'),'categori_new.csv','ab');   

  log_compere(
        array($value['id'],$value['url']),'categori_new_url.csv','ab');


}


write_prod_to_cat($prod_arr);
$firephp->fb('ok');
die();












foreach ($stmt as $row)
{
   $res= json_decode( $row['txt'],true );

/*$parent_hash=$res['bread'][0];*/
        	$parent='home'; $p_id=427;
        	      foreach ($res['bread'] as $key => $value) {
/*$firephp->fb($obj);*/

     	// пара хом + кей 


$gate=true;
/*$h_obj=  hash('md5', $parent.$key);*/
/*$h_obj=  hash('md5', $parent.$key);

$pr=isset($graf[$h_obj])?$graf[$h_obj]:false;

if (!$pr) {
	$graf[$h_obj]=array('p' =>$parent,'p_id'=>$p_id,'id'=>$key ,'n_id'=>$n_id,'url'=>$value );
}else{

	
}*/



              foreach ($graf as $k => $v) {

$firephp->fb(array( $v['p'],$parent,  $v['id'],$key));
/*log_compere(array($v['p'],$parent,  $v['id'],$key, count($graf)));*/
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
   /* $firephp->fb($graf); */	     

log_compere(
        array($n_id,$p_id,$key,'true',1,20,'','2009-01-03 21:08:57','2009-01-03 21:08:57','','','','',0,'','true'),'categori.csv','ab');




     	     $parent=$key;
     	     $p_id=$n_id++;

     	 }
              } 
    

     }
     /*  end for bread */
if (count($graf)>10)     break;

}

die();



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