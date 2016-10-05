<?
session_start();

function logger($message){
  $debug_backtrace = debug_backtrace();
  $error = '['.date("Y-m-d H:i:s").'] "'.$message.'" in '.$debug_backtrace[0]['file'].' line '.$debug_backtrace[0]['line'];
  error_log($error."\n" , 3, LOG_FILE);
}

spl_autoload_register('classAutoload');
function classAutoload($class)
{
	include __DIR__.'/../class/' . $class . '.php';
}

//Secure $_GET in $sGET & $_POST in $sPost
foreach($_GET as $key=>$value){if(is_array($value))$sGET[$key]=secureArray($value);$sGET[$key]=htmlentities($value,ENT_QUOTES);}
foreach($_POST as $key=>$value){if(is_array($value))$sPOST[$key]=secureArray($value);else$sPOST[$key]=htmlentities($value,ENT_QUOTES);}
function secureArray($array_sec){foreach($array_sec as $key=>$value){if(is_array($value)){$array_sec[$key]=secureArray($value);}else{$array_sec[$key]=htmlentities($value,ENT_QUOTES);}}return $array_sec;}

?>
