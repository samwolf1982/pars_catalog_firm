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
// write to f groups

$arr= array();
$fname="res/price_des.csv";
if (($handle = fopen($fname, "r")) !== FALSE) {
  $id=1;
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

$t=$id+1;

if(true)                {
        $arr[]= array($data[0], $data[1], $data[2], $data[3]);
      }
    
    $id++;
    }
    fclose($handle);
}


// update bd;

          $db = new PDO("mysql:host=".CURENT_HOST.";dbname=".CURENT_DB, CURENT_USER, CURENT_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));

//   PRICE
if (false) {
  foreach ($arr as $key => $val) {
$stmt = $db->prepare('UPDATE `oc_product` SET `price`= ? WHERE `product_id` = ? ');
$stmt->execute(array($val[1],$val[0]));
$firephp->fb(array($val[1],$val[0]));
/*  break;*/
 } 
}

//   des n meta
if (true) {
  foreach ($arr as $key => $val) {
$stmt = $db->prepare('UPDATE `oc_product_description` SET `description`=  ? ,`meta_description`= ?  WHERE `product_id`= ?');
$stmt->execute(array($val[2],$val[3] ,$val[0]));
/*$firephp->fb(array($val[2],$val[3]));
 break;*/
 } 
}


/*$firephp->fb($arr[1]);*/
$firephp->fb('ok');


die();





//---------------------end
$c=count($arr);
/*$firephp->fb($c);
die();*/
$f_name=array();
$temp=array();
$index=1;
foreach ($arr as $key => $value) { 
            
            	
          foreach ($value['filters'] as $k => $v) {
          	  	if (!in_array($k, $temp)) {
            	     $temp[]=$k;
            	     $f_name[$k]= $index++;       
            	}
          }

           

}

// write to f groups

	 $fp = fopen('res/f_groups.csv', 'ab');
foreach ($f_name as $key => $value) { 
	    fputcsv($fp,array($value,0,$key));   
}
fclose($fp);
//  end write
//----------------------------------------------------
//search n  write to filters

$temp=array();
$index=1;
$prod_arr=array();
$fil_to_group=array();      //  id = ид групы

foreach ($arr as $key => $value) { 
            
/*            $id_p=$arr[0]['id'];*/
            $id_p=$value['id'];
          $for_prod=array();
          foreach ($value['filters'] as $k => $v) {
       
                       // id group
                   $i_group= $f_name[$k];
               /*    $firephp->fb($i_group);*/

                   if (isset($fil_to_group[$i_group])) {
                    $temp_f=$fil_to_group[$i_group];
                   }else{$temp_f=array();}
                    
                       if (!isset($temp_f[$v])) {
                       	   $temp_f[$v]=$index++;
                       	     $temp_f['name']=$v;
                       }
                       $for_prod[]=array($i_group=>$temp_f[$v]);
                 /*    $firephp->fb($for_prod);*/
                          

                   $fil_to_group[$i_group]=$temp_f;                
/*
                   $fil_to_group[$i_group]=array($v=>$index++);*/
          	/*  	if (!in_array($k, $temp)) {
            	     $temp[]=$k;
            	     $f_name[$k]= $index++;       
            	}*/
          }
              /* $firephp->fb($arr[0]);
                              $firephp->fb($fil_to_group);*/
          

           
  $prod_arr[]=array('id'=>$id_p,$for_prod);
/*    $firephp->fb($prod_arr); */
 /*   if (count($prod_arr)>10)   break;	*/
}

//      write  filters

foreach ($fil_to_group as $key => $value) {

/*	$firephp->fb(array( $key,$value));*/
	 $fp = fopen('res/filters.csv', 'ab');
foreach ($value as $k => $v) {
	      if ($k!='name') {
	                  /* 	$firephp->fb(array( $v,$key,0,$k));*/
	                   		fputcsv($fp,array( $v,$key,0,$k));   
	      }
}
	 fclose($fp);
/*	fputcsv($fp,array($value,0,$key));  */ 
     /*die();*/

}




// write prod



 $fp = fopen('res/filters_prod.csv', 'ab');
 $sky=999;
foreach ($prod_arr as $key => $value) {

$id=$value['id'];
             foreach ($value[0] as $k => $v) {
             	//$v       arr      id_gro==key     id_fil== val
             	$ki= array_keys($v)[0];
             	 $vi= $v[$ki];
         /*    	$firephp->fb(array($ki,$vi));*/
/*             	   fputcsv($fp, array($id,$vi,$ki));*/
  fputcsv($fp, array($id,$ki,$vi));
             }
/*die();*/

/* break;*/
/*    $a= array( $value['id']);    */   

              /* fputcsv($fp, $a);*/
       
             }

 fclose($fp);


	
foreach ($f_name as $key => $value) { 
	    
}

//  end write




$c=count($temp);
$firephp->fb($f_name);








die();






$fname="anfloors_paths.txt";
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
    	  $arr[]= array($id, $data[0]);
    	}
    
    $id++;
    }
    fclose($handle);
}




echo json_encode(  $arr);
?>