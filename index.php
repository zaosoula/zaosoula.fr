<?
 //Load config file
 require_once('configs/config.php');

 //Load common function file
 require_once('require/basic/commonFunc.php');

 //Load load page
 if(!empty($sGET['p'])){ //Check if url attribute p is not empty
   $pageName = $sGET['p']; //Define page name
   if(file_exists('pages/php/'.$pageName.'.php')){ //Check if the php file exist
    if(file_exists('pages/html/'.$pageName.'.php')){ //Check if the html file exist
      require_once('pages/php/'.$pageName.'.php'); //Include php file
    }else{
      logger('pages/html/'.$pageName.'.php don\'t exist'); //Add in log
      $pageName = 'home'; //Define page name
      require_once('pages/php/home.php'); //Include 404 php file
    }
   }else{
      logger('pages/php/'.$pageName.'.php don\'t exist'); //Add in log
      $pageName = 'home'; //Define page name
      require_once('pages/php/home.php'); //Include 404 php file
   }
 }else{ //If p attribute is empty load the home page
   $pageName = 'home'; //Define page name
   require_once('pages/php/home.php');  //Include home php file
 }

 //Load page HTML template
 require('require/basic/html.php');


?>
