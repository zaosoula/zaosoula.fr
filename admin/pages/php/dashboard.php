<?
$resume = new Resume('loadBDD');

$Page = new PageAdmin(array(
	'title'=>'Dashboard',
	'assets'=>array(
				'plugins/sweetalert/sweetalert.min.js',
				'plugins/autosize/jquery.autosize.min.js',
        'js/dashboard.js',
				'plugins/sweetalert/sweetalert.css',
  )
));
if(!$Page->checkRights('login'))
	header('Location: login');

?>