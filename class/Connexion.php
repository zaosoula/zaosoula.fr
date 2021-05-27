<?php  
abstract class Connexion {

	private static $instance;

	private static $nb = 0;

	static function getNb() {
		return self::$nb;
	}

	public static function getInstance() {

		if (! isSet ( self::$instance )) {
			$dsn = "mysql:host=" . SqlHost . ";dbname=" . SqlDb;
			self::$instance = new PDO ( $dsn, SqlUsername, SqlPass, array (
					PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true
			) );

			self::$instance->exec ( 'SET NAMES utf8' );
			self::$instance->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			self::$nb ++;
		}else{
			self::$nb ++;
		}
		return self::$instance;
	}

}
?>
