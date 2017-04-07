<?
$resume = new Resume('loadBDD');

$Page = new PageAdmin(array(
	'title'=>'Dashboard',
	'assets'=>array(
				'plugins/sweetalert/sweetalert.min.js',
				'plugins/autosize/jquery.autosize.min.js',
				'plugins/Autolinker/Autolinker.min.js',
				'plugins/raty-fa/jquery.raty-fa.js',
        'js/dashboard.js',
        'js/editableEducation.js',
        'js/editableWork.js',
				'js/editableProjects.js',
				'js/editableSkills.js',
				'js/editableLang.js',
				'plugins/sweetalert/sweetalert.css',
  )
));

if(!$Page->checkRights('login') && 	$_SERVER['REMOTE_ADDR'] != '::1')
	header('Location: login');

?>
