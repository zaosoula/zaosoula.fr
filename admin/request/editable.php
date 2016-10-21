<?
 //Load config file
 require_once('../../configs/config.php');

 //Load common function file
 require_once('../require/basic/commonFunc.php');


 $Page = new PageAdmin();
 if(!$Page->checkRights('login')){
 	exit();
}
$ResumeUpdater = new ResumeUpdater(textareaConvert($_POST));
$Resume = new Resume('loadBDD');
if($ResumeUpdater->update($Resume))
  echo 1;


   function textareaConvert($array){
     foreach($array as $key=>$value){
       if(is_array($value))
          $array[$key]=textareaConvert($value);
      else
          $array[$key]=str_replace("\n", "<br/>", $value);
      }
      return $array;
   }



?>
