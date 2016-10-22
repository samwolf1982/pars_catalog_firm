<?php
header('Content-Type: text/html; charset=windows-1251');
header('Content-Type: text/html; charset=utf-8');
//                 caci@leeching.net   mail
//    db                us                 pass

require_once ('../phpQuery/phpQuery/phpQuery.php');
require_once 'setings/setings6.php';
require_once 'PhpDebuger/debug.php';
require('PhpDebuger/lib/FirePHPCore/FirePHP.class.php');



     $_POST['param']='http://asakim.golan.org.il/';

if (isset($_POST['param'])) {
  # code...
/*   $firephp = FirePHP::getInstance(true);
  $firephp->fb(array($_POST['param'])); 
  die();*/
    

  scanx($_POST['param']);
 //echo $_POST['param'][1];
 


  die();




}else
echo "empty";

die();
 function scanx($path_site)
{
 
     $db=null;
      $resultARR=[];
$firephp = FirePHP::getInstance(true);
/*  $firephp->fb($path_site); 

die();
*/
        phpQuery::ajaxAllowHost($GLOBALS['curent_host']); 




       try {
  phpQuery::get($path_site,function ($do) use ($path_site)
    {

      $document=phpQuery::newDocument($do);
     // парс ст. +отправка и сверка
      parse($document,$path_site);

        
  die();
    }); 

} catch (Exception $e) {

     $res1=array($_POST['param']);

$file = fopen("res4/errrofile.csv","ab");
 fputcsv($file,$res1);
fclose($file);
      echo "ERRROR ".$_POST['param'];
       die();
    }


// end fun scanx    
}


 function parse($value2,$path_site)
 {
        $firephp = FirePHP::getInstance(true);
  $resultARR=[];
  $document=$value2;
/*  $firephp->fb($path_site); 

die();
*/

$b1=array();

       $bread1='.index a';

         $bread1a=$document->find($bread1);
 
 $a_name=array();




//   write main cat;
$file = fopen("res6/main_cat.csv","ab");

foreach ($bread1a as $key => $value) {

/*   $firephp->fb(array('http://asakim.golan.org.il'.pq($value)->attr('href'),pq($value)->text())); */
 fputcsv($file,array('http://asakim.golan.org.il'.pq($value)->attr('href'),pq($value)->text()));

}

fclose($file);
die();

foreach ($bread1a as $key => $value) {

/*$n=  iconv('UTF-8', 'ISO-8859-1//TRANSLIT//IGNORE',  pq($value)->text()); 
*/
$t=pq($value)->text();
if ($t!='') {
$a_name[]=$t;  
}


}




   $bread1='.inner_txt_cont p';

         $bread1a=$document->find($bread1);
 
 $mail_name=array();


 foreach ($bread1a as $key => $value) {
   

$text=pq($value)->text();
preg_match_all('/([A-Za-z0-9_\-]+\.)*[A-Za-z0-9_\-]+@([A-Za-z0-9][A-Za-z0-9\-]*[A-Za-z0-9]\.)+[A-Za-z]{2,4}/u',$text,$pEmail);

$t=$pEmail[0][0];
if ($t!=''&& $t!=null) {
   $mail_name[]=$t;
}



 }


$r=array();
for ($i=0; $i <count($a_name) ; $i++) { 
       
        $m='';
        $n='';
         if (isset($mail_name[$i])) {
           $m=$mail_name[$i];
         }
          if (isset($a_name[$i])) {
           $n=$a_name[$i];
         }
       $r=array( $m,$m, $n,'','',$_POST['param']);

        $firephp->fb($r); 
$file = fopen("res5/s5_ready.csv","ab");
 fputcsv($file,$r);
fclose($file);

   
}


  die();



     $firephp->fb($r); 

/*     $firephp->fb($mail_name); */
die();
   $name= pq($bread1a)->text();

/*   $name = iconv("ISO-8859-8", "UTF-8//TRANSLIT", hebrev(iconv("UTF-8", "ISO-8859-8//TRANSLIT", $name)));*/
$name =  iconv('UTF-8', 'ISO-8859-1//TRANSLIT//IGNORE',  $name); 
$name=trim($name);

     $bread1="td > a[href^='mailto:']";
$mail=pq($bread1)->attr('href');

     /*$firephp->fb($name,$mail); */

   $bread1=".PadR10";
$txt=pq($bread1)->text(); 



$p =  iconv('UTF-8', 'ISO-8859-1//TRANSLIT//IGNORE',  $txt); 
$res = array($mail ,str_replace('mailto:','', $mail), $name,'',$p,$_POST['param']);

 $firephp->fb($res); 
$file = fopen("res4/s4_ready.csv","ab");
 fputcsv($file,$res);
fclose($file);

     die();
/* $name=str_replace('|',"",$name);*/

/*$name = iconv("ISO-8859-8", "UTF-8//TRANSLIT", hebrev(iconv("UTF-8", "ISO-8859-8//TRANSLIT", $name)));*/



     $bread1='#listing-email a';

         $bread1a=$document->find($bread1);
         $mail=pq($bread1a)->attr('href');
      

$bread1='#main div[itemprop="location"] a';
  $bread1a=$document->find($bread1);
         $txt=pq($bread1a)->text();


$res = array($mail ,str_replace('mailto:','', $mail), $name,'',$txt,$_POST['param'][0]);


$file = fopen("res4/s1_ready.csv","ab");
 fputcsv($file,$res);
fclose($file);

die();
 $firephp->fb($res);
/*  $bread1='html body form#form1 div#wrap div#content div.left div div#index_right table tbody tr td';*/

 $bread1='#index_right table tr';

   $bread1a=$document->find($bread1);
/*$model = pq($bread1a)->find("tr:eq(1) td:eq(1)")->text();*/
  $c=count($bread1a);
       /*$arr=array();*/
       $mail='';
       foreach ($bread1a as $key => $value) {
         $t=pq($value)->find("td:eq(1)")->text();
$pos = strpos($t, "@");
                    if ($pos===false) { }else{
                      $mail=$t;
                    }
       }

 $bread1='#index_right';
   $bread1a=$document->find($bread1);
$txt=pq($bread1a)->text();
  $firephp->fb(array($txt,$name ,$mail,$_POST['param'] )); 


    $res=array($mail,$mail,$name,'',$txt,$_POST['param']);
     /*$firephp->fb($res);*/

$file = fopen("res3/s3_ready.csv","ab");
 fputcsv($file,$res);
fclose($file);



die();



  
  foreach ($bread1a as $key => $value) {
    
    
        $name= pq($value)->find('.comp_text > b')->text();
        $txt= pq($value)->find('.comp_text')->text();
        
/*        $url=pq($value)->find('a')->attr('href');*/
        $mail=pq($value)->find(".comp_text > a[href^='mailto:']")->attr('href');
        /*$url=pq($value)->find(".comp_text > a")->not(".comp_text > a [href^='mailto:']")->attr('href');*/
          
        /*$url=pq($value)->find(".comp_text > a")->attr('href');*/
   
   
       /* $url2='';

        if (count($url>1)) {
           $url=$url[0];
        }
        $url=pq($value)->attr('href');*/
         

  

    /*    $mail= pq($value)->find('.comp_text > b')->text();*/

        // mail mail name url
    $res=array($mail,str_replace('mailto:','', $mail), $name, $_POST['param'][1], $txt,$_POST['param'][0]);
     /*$firephp->fb($res);*/

$file = fopen("res1/s1_ready.csv","ab");
 fputcsv($file,$res);
fclose($file);

  }
     echo "in parse ok" ;

 die();
     echo "in parse ok" ;
/*     echo json_encode($b1) ; die();*/
/*$json= json_encode( $b1,JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE); */
$main_arr=array();
$main_arr['id']=$_POST['param'][0];
$main_arr['bread']=$b1;

$main_arr= json_encode( $main_arr,JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE); 
file_put_contents('cat.txt', $main_arr.PHP_EOL, FILE_APPEND | LOCK_EX);
echo $json;
 die();
          $bread1= pq($bread1a)->text();

     //echo $bread1; die();

            $breadh=pq($bread1a)->find('a')->attr('href');


           //echo "$breadh";
//die();
           $b1[trim($bread1)]=trim($breadh);
        $resultARR['bread1']=json_encode( $b1,JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);








$b1=array();
       $bread1='.catalog > li';
         $bread1a=$document->find($bread1);








if(count($bread1a)===1){
 //  echo "in ok count". count($bread1a);
         
           $a=pq($bread1a)->find('.c-name a');   
           $r= $a->attr('href');
           echo $r;
           $fp = fopen('ok.csv', 'ab');

//    id search fullname
 $id=$_POST['param'][0];
 $url=$r;
 $name=$_POST['param'][2];
 $search_name=$_POST['param'][1];
               fputcsv($fp, array($id,$name,$search_name,$url));
               fclose($fp);

}
else{
    $fp = fopen('bad.csv', 'ab');
//    id search fullname
 $id=$_POST['param'][0];

 $name=$_POST['param'][2];
 $search_name=$_POST['param'][1];
               fputcsv($fp, array($id,$name,$search_name));
               fclose($fp);
}



  die(); 
          $bread1=pq($bread1a)->text();

            $breadh=pq($bread1a)->find('a')->attr('href');
          

           //echo "$breadh";
//die();
           $b1[trim($bread1)]=trim($breadh);
        $resultARR['bread1']=json_encode( $b1,JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
       //$resultARR['price']=$price;
$b1=array();
         // повтор кода 
      $bread1='.b-breadcrumb__item:nth-child(4)';
         $bread1a=$document->find($bread1);
  
          $bread1=pq($bread1a)->text();

            $breadh=pq($bread1a)->find('a')->attr('href');
          

           //echo "$breadh";
//die();
           $b1[trim($bread1)]=trim($breadh);
        $resultARR['bread2']=json_encode( $b1,JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
       //$resultARR['price']=$price;

       // $resultARR['bread2']=$bread2;
  //      print_r($resultARR);
     
//die();
       $price='.b-product__price > span:nth-child(1)';
       // price
       $price=$document->find($price)->attr('content');
       $resultARR['price']=$price;

        // name
       $name='.b-product__name';
       $name=$document->find($name)->text();
       $resultARR['name']=$name;

        // descript
       $descriptions='div.b-user-content:nth-child(2)';
       $descriptions=$document->find($descriptions)->text();
       //echo $descriptions;
       $resultARR['descriptions']=$descriptions;

          // tables a b
       $tabletr='.b-product-info tr';
       $tabletr=$document->find($tabletr);
       $state=0;
       $tabA=[];
       $tabB=[];
        foreach ($tabletr as $key => $value) {
          # code...
            $td=pq($value)->find('td');
             
          if (count($td)==0) {$state++; continue;}
            $val1= pq($value)->find('td:first')->text() ; ;$val2= pq($value)->find('td:last')->text() ;
            if ($state==1) {
              # code...
               $tabA[trim($val1)]=trim( $val2);
            }else
                if ($state==2) {
              # code...
               $tabB[trim($val1)]=trim($val2);
            }
        }

          $resultARR['tabA']=json_encode( $tabA,JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
          $resultARR['tabB']=json_encode( $tabB,JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
      

        // title
       $title='title';
       $title=$document->find($title)->text();
       //echo $title;
       $resultARR['title']=$title;



         // meta
       $meta='meta';
       $meta=$document->find($meta);
      // echo "Count ".count($meta);
       $ind=0;
       foreach ($meta as $key => $value) {
         # code...
       $m=pq($value)->attr('content');
       switch ($ind) {
           case 2:
           # code...
  $resultARR['metaDesc']=$m;
           break;
           case 3:
           # code...
            $resultARR['metaAbst']=$m;
           break;
           case 4:
           $resultARR['metaKey']=$m;
           # code...
           break;
           case 7:
           # code...
           $resultARR['metaImg']=$m;
           break;
         
         default:
           # code...
           break;
       }
       $ind++;
       }
      //    
      // $resultARR['meta']=$meta;
       
 // READY  PRODUCT 
      // print_r($resultARR);

  

           $db = new PDO("mysql:host=".CURENT_HOST.";dbname=".CURENT_DB, CURENT_USER, CURENT_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
 
/* $stmt = $db->prepare("INSERT INTO users (name, login) VALUES (:name, :login)");
$stmt->bindParam(':name', $name);
$stmt->bindParam(':login', $login);

// Вставим одну строку с такими значениями
$name = 'vasya';
$login = 'vasya123';
$stmt->execute();*/
 //  print_r($resultARR);
    $catid=25;
    $stmt = $db->prepare("INSERT INTO `product`(`catid`, `price`, `name`, `bred1`, `bred2`, `descriptions`, `taba`, `tabb`, `title`, `metades`, `metakey`, `metaabstr`, `metaimg`, `url`) VALUES (:val1,:val2,:val3,:val3b,:val3c,:val4,:val5,:val6,:val7,:val8,:val9,:val10,:val11,:val12)");
        $stmt->bindParam(':val1', $catid);
        $stmt->bindParam(':val2',   $resultARR['price']);
        $stmt->bindParam(':val3',   $resultARR['name']); 
        $stmt->bindParam(':val3b',   $resultARR['bread1']); 
        $stmt->bindParam(':val3c',   $resultARR['bread2']); 
        $stmt->bindParam(':val4',   $resultARR['descriptions']);
        $stmt->bindParam(':val5',  $resultARR['tabA']);
        $stmt->bindParam(':val6',   $resultARR['tabB']);
        $stmt->bindParam(':val7',   $resultARR['title']);
        $stmt->bindParam(':val8',   $resultARR['metaDesc']);
        $stmt->bindParam(':val9',   $resultARR['metaAbst']);
        $stmt->bindParam(':val10',  $resultARR['metaKey']);
        $stmt->bindParam(':val11',  $resultARR['metaImg']);
        $stmt->bindParam(':val12',  $_POST['param'][1]);
        $result = $stmt->execute();
        
         

    /*    $stmt = $db->prepare("INSERT INTO `product`(`catid`, `price`, `name`, `descriptions`, `taba`, `tabb`, `title`, `metades`, `metakey`, `metaabstr`, `metaimg`) VALUES (78,25,:val,:val4,:val,:val,:val,:val,:val,:val,:val)");
        //$stmt->bindParam(':val1',   245);
        $stmt->bindParam(':val',   $resultARR['title']);
        $stmt->bindParam(':val4',   $resultARR['title']);
        $result = $stmt->execute();*/
        
 echo $_POST['param'][1]. " __OK";

    //  echo "Result ". $result;
       die();
 
$resultLi=$document->find($s);
echo $document;
echo $resultLi;
die();
  
     foreach ($resultLi as $key => $value) {
       # code...

      $a=pq($value)->find('a');
    
     $r= $a->attr('href');
      echo $r;
    
      $r= pq($value)->text();
      echo $r;
     echo "string";
     }
       die();
  
          // поиск поста с id edit
      /*  $s='div[id^="edit"]';
        $el1 =$document->find($s);
      */
          // $c=count($el1);

            //  search td -post
$s='td[id^="td_post_"]';          //  10 шт
$s='div[id^="post_message_"]';   // 10 
        $el1 =$document->find($s);
       
       
   //     echo   $c=count($el1);
   foreach ($el1 as $key => $value) {
     # code...
    $res['text']=array();
          $res['img']=array();
    // take text
             $res['text'][]= pq($value)->text();
    // find image
            $im= pq($value)->find('img[src$=".jpg"]');
           // echo "<br>cddd ".count($im).'<br>';
            // take foto
            foreach ($im as $key1 => $value1) {
              # code...
                   $res['img'][]=pq($value1)->attr('src');
            }
               //echo "<br>----------------<br>";
              // var_dump($res);

$txt=$res['text'][0];

            // проверка на совпадение  сделать     false    go to wp 
if( is_present(hash('ripemd160', $txt))==false){

$res['fotos']= $res['img'];
$res['text']=$txt;


// post to wp

$path_parts = pathinfo($path_site);
 



$data='title='.$path_parts['dirname'].'&'.create_content($res);
// UNCOMENT
$wp=send('root',$data);
//var_dump($res);
//print_r($res);

}else{
  $file_c = file_get_contents($GLOBALS['path_hash']);
        $all_hasess = explode(",",trim($file_c));
        $count=count($all_hasess);


  echo 'Есть совпадение  дальше обрабатываеться но не добавлено \r\n'.($count-$GLOBALS['counter']).'  <br/>';
  //$i=count($child_links);
   //break;
   
}





   //echo "<br><br><br><br><br><br>";
        /// end loop        
   }
   

    
 }

// dont move
function find_last_button($value='')
{
  # code...
 $arrayName = array('main' =>'div.b-boast-list__item:nth-child() ', 'links_add_a'=>'div.b-boast-list__item:nth-child(' ); //x

         // заход на любую страницу пускай 31
         //', 'http://anti-free.ru/forum/showthread.php?t=58815&page=31 
         // поиск а указателя на ссилку на последниюю ссілку

      $document=phpQuery::newDocument($do);
   //  echo "$document";
  //   echo $document;

              // взвять адресс посследней ссилки
 $el =$document->find($str=str_replace('>', ' ','#twocol > tbody:nth-child(1) > tr:nth-child(1) > td:nth-child(1) > div:nth-child(14) > div:nth-child(1) > div:nth-child(1) > table:nth-child(1) > tbody:nth-child(1) > tr:nth-child(1) > td:nth-child(2) > div:nth-child(1) > table:nth-child(1) > tbody:nth-child(1) > tr:nth-child(1) > td:nth-child(8) > a:nth-child(1)'));
 
  $el='a.smallfont:last';   // брать последню

  $el1 =$document->find($el );

      $last_page= pq($el1)->attr('href');   // количество елементов
       
       $last_page=$GLOBALS['forum'].$last_page;
   
     $last_page= parse_url($last_page);

                     
     parse_str($last_page['query'],$output);   

}





//    fasle если нету
function is_present($value)
	{

$path=$GLOBALS['path_hash'];
		if (!file_exists($path)) {
$myfile = fopen($path, "w") or die("Unable to open file!");
fclose($myfile);
}
         // добавить блокировку
		$file_c = file_get_contents($GLOBALS['path_hash']);
        $all_hasess = explode(",",trim($file_c));
		# code...
		if(!in_array($value, $all_hasess)){
                   //$all_hasess[]=$value;
                   // работа дальше
                   file_put_contents($path,','.$value,FILE_APPEND | LOCK_EX);

            
                   return false;
		}
		else {
			//die();
     // return false; //    //remove later
			 return true;
		}
	// end	is_present
	}
	 function create_content($data)
{
  $res='';
  foreach ($data['fotos'] as $key => $value) {
    # code...

   $res.=('<p><img src="'.$value.'" /></p>');
   
  }

     $res.='<p>'.$data['text'].'</p>';
  # code...

  return 'content='.$res;
 // end create_content
}

	 function send($autor,$data)
	{
		


$path=$GLOBALS['path_to_WP']; 

//error_log('curl  ',3,'log.txt');
		# code...
 if( $curl = curl_init() ) {
    curl_setopt($curl, CURLOPT_URL, $path);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
    curl_setopt($curl, CURLOPT_POST, false);

$data2='json=posts/create_post&autor='.$autor.'&'.$data;

    curl_setopt($curl, CURLOPT_POSTFIELDS,$data2);
    $out = curl_exec($curl);

    curl_close($curl);
   echo 'отправлено<br>\n';
   //echo " $path ** $data2";
  }

 // end send 
  
	}


                    // 50 el
if(isset($argv)){
   
  if (isset($argv[2]) && is_numeric($argv[2])) {
  set_time_limit(intval($argv[2])*30); 

  for ($i=1; $i <=intval($argv[2]) ; $i++) {

    # code...else{
  
    if($i==1){
   

  
 try {
 //echo "<br>i==".$i;

     scanx($argv[1]); 

  
 } catch (Exception $e) {
   echo 'Выброшено исключение: для  scanx ',  $e->getMessage(), "\n";
 }


    }
    else
{ 
  
       /* for ($i=0; $i < ; $i++) { 
          # code...
        }*/
 try {
  echo "<br>page i==".$i;
  scanx($argv[1].'&page='.$i);

  
 } catch (Exception $e) {
   echo 'Выброшено исключение: для  scanx ',  $e->getMessage(), "\n";
 }




}
      //end for
             sleep(rand(1,3));
  }
    }

  else
 {
  if (isset($argv[1])) {
    # code...
     try {
  
        scanx($argv[1]);
  

  
 } catch (Exception $e) {
   echo 'Выброшено исключение: для  scanx ',  $e->getMessage(), "\n";
 }
  }

 }
// end console
} 



if(isset($_GET['path'])){

  if(isset($_GET['path'])){

    
   

  scanx($_GET['path']);


    die();
        // echo $_GET['path'];
  //die();
    if(isset($_GET['count'])){
   set_time_limit(intval($_GET['count'])*20); 
       for ($i=1; $i <=intval($_GET['count']) ; $i++) { 
        # code...
        if($i==1){
 try{scanx($_GET['path']);}catch (Exception $e) {
   echo 'Выброшено исключение: для  scanx ',  $e->getMessage(), "\n";
 }
          }
        


        else{
 try {
               scanx($_GET['path'].'&page='.$i);

  

  
 } catch (Exception $e) {
   echo 'Выброшено исключение: для  scanx ',  $e->getMessage(), "\n";
 }



              }
              // end for
              sleep(rand(1,3));
       }

    }else{
try{
   scanx($_GET['path']);

  

  
 } catch (Exception $e) {
   echo 'Выброшено исключение: для  scanx ',  $e->getMessage(), "\n";
 }


  }
  }
    else{
      try{
  $path_site='http://alitrust.ru/boasts/odezhda-i-obuv';
echo "117";
 echo $_GET ;
           scanx($path_site);

  

  
 } catch (Exception $e) {
   echo 'Выброшено исключение: для  scanx ',  $e->getMessage(), "\n";
 }


       }

}

 try {
  

  
 } catch (Exception $e) {
   echo 'Выброшено исключение: для  scanx ',  $e->getMessage(), "\n";
 }





/*if(isset($_POST['path'])){

  if(isset($_POST['path'])){
        // echo $_POST['path'];
  //die();
    if(isset($_POST['count'])){
   set_time_limit(intval($_POST['count'])*20); 
       for ($i=1; $i <=intval($_POST['count']) ; $i++) { 
        # code...
        if($i==1){
 try{scanx($_POST['path']);}catch (Exception $e) {
   echo 'Выброшено исключение: для  scanx ',  $e->getMessage(), "\n";
 }
          }
        


        else{
 try {
               scanx($_POST['path'].'&page='.$i);

  

  
 } catch (Exception $e) {
   echo 'Выброшено исключение: для  scanx ',  $e->getMessage(), "\n";
 }



              }
              // end for
              sleep(rand(1,3));
       }

    }else{
try{
   scanx($_POST['path']);

  

  
 } catch (Exception $e) {
   echo 'Выброшено исключение: для  scanx ',  $e->getMessage(), "\n";
 }


  }
  }
    else{
      try{
  $path_site=',''http://alitrust.ru/boasts/odezhda-i-obuv';
echo "117";
 echo $_POST ;
           scanx($path_site);

  

  
 } catch (Exception $e) {
   echo 'Выброшено исключение: для  scanx ',  $e->getMessage(), "\n";
 }


       }

}

 try {
  

  
 } catch (Exception $e) {
   echo 'Выброшено исключение: для  scanx ',  $e->getMessage(), "\n";
 }


*/

?>