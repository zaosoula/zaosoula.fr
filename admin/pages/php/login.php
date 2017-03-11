<?
$resume = new Resume('loadBDD');

$Page = new PageAdmin(array(
	'title'=>'Login',
	'assets'=>array(
	'plugins/sweetalert/sweetalert.min.js',
	'js/login.js',
	'plugins/sweetalert/sweetalert.css'
  )
));
if($Page->checkRights('login'))
	header('Location: dashboard');

	if($_SERVER['REMOTE_ADDR'] == '::1'){
		$_SESSION['user'] = array(
			"status"=>"auth",
			"username"=>'autologin'
		);
		header('Location: dashboard');
	}
?>
