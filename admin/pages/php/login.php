<?
$resume = new Resume('loadBDD');

$Page = new PageAdmin(array(
	'title'=>'Login',
	'assets'=>array(
        'js/login.js'
  )
));
if($Page->checkRights('login'))
	header('Location: dashboard');
?>
