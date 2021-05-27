<?php  
$resume = new Resume('loadBDD');

$Page = new Page(array(
	'title'=>$resume->basics['name'].' - '.$resume->basics['label'],
));
?>
