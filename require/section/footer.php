
<!-- Footer -->
<footer id="footer">
	<?php  
		if(!empty($resume->basics['profiles'])){
	?>
	<section id="contact">
		<h2><?php   echo $resume->param['title_contact'];?></h2>
		<?php  

	      require('require/section/sub_profiles.php');
	  ?>
	</section>
	<?php   } ?>
	<p class="copyright">&copy; Zao Soula. Design: <a href="https://html5up.net">HTML5 UP</a> & <a href="https://zaosoula.fr">Zao Soula.</a></p>
</footer>
