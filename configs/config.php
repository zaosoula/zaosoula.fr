<?
if (file_exists(dirname(__FILE__) . '/local.php'))//If local file config exist load it
	include(dirname(__FILE__) . '/local.php');

/*
	* If value is not defined, define it
*/
if (!defined('LOG_FILE'))
  define('LOG_FILE',__DIR__.'/../tmp/trace.log');

if (!defined('SqlHost'))
	define('SqlHost','localhost');

if (!defined('SqlUsername'))
	define('SqlUsername','root');

if (!defined('SqlPass'))
	define('SqlPass','');

if (!defined('SqlDb'))
	define('SqlDb','database');

	if (!defined('BaseUrl'))
		define('BaseUrl','');
?>
