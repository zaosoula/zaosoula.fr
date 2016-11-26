<?
 //Load config file
 require_once('../../configs/config.php');

 //Load common function file
 require_once('../require/basic/commonFunc.php');

 try{
   $sql = "SELECT * FROM param  WHERE `name` LIKE 'auth_%'";
   $pdo = Connexion::getInstance ();
   $sth = $pdo->query ( $sql );
   $res = $sth->fetchAll (PDO::FETCH_ASSOC);

   $auth_info = array();
   foreach ( $res as $row ) {
     $auth_info[$row['name']] = $row['value'];
   }
 } catch ( PDOException $e ) {
   logger('Get Auth Info Error - PDOException : '.json_encode($e)); //Add in log
 }
if(!empty($auth_info['auth_username']) && !empty($auth_info['auth_password'])){
   if($auth_info['auth_username'] == $sPOST['username'] && password_verify($sPOST['password'], $auth_info['auth_password']) == true){
     $_SESSION['user'] = array(
       "status"=>"auth",
       "username"=>$sPOST['username']
     );
     echo '1';
   }
}
?>
