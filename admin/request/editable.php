<?
 //Load config file
 require_once('../../configs/config.php');

 //Load common function file
 require_once('../require/basic/commonFunc.php');


 function textareaConvert($array){
   foreach($array as $key=>$value){
     if(is_array($value))
        $array[$key]=textareaConvert($value);
    else
        $array[$key]=str_replace("\n", "<br/>", $value);
    }
    return $array;
 }


 $Page = new PageAdmin();
 if(!$Page->checkRights('login') && $_SERVER['REMOTE_ADDR'] != '::1'){
 	exit();
}
$ResumeUpdater = new ResumeUpdater(textareaConvert($_POST));
$Resume = new Resume('loadBDD');
echo json_encode($ResumeUpdater->update($Resume));
?>
