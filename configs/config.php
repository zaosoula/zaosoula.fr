<?php  
if (file_exists(dirname(__FILE__) . '/local.php'))//If local file config exist load it
	include(dirname(__FILE__) . '/local.php');

	ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
/*
	* If value is not defined, define it
*/
if (!defined('LOG_FILE'))
  define('LOG_FILE',__DIR__.'/../tmp/trace.log');

if (!defined('SqlHost'))
	define('SqlHost','localhost');

if (!defined('SqlUsername'))
	define('SqlUsername','opencv');

if (!defined('SqlPass'))
	define('SqlPass','opencv');

if (!defined('SqlDb'))
	define('SqlDb','opencv');

if (!defined('BaseUrl'))
	define('BaseUrl','http://localhost/zaosoula.fr/');

if (!defined('BaseUrlAdmin'))
	define('BaseUrlAdmin','http://localhost/zaosoula.fr/admin');
?>
