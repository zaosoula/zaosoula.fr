
<!-- Footer -->
<footer id="footer">
	<?
		if(!empty($resume->basics['profiles'])){
	?>
	<section id="contact">
		<h2>Me contacter</h2>
		<?
	    
	      require('require/section/sub_profiles.php');
	  ?>
	</section>
	<?}?>
	<p class="copyright">&copy; Zao Soula. Design: <a href="https://html5up.net">HTML5 UP</a> & <a href="https://zaosoula.fr">Zao Soula.</a></p>
					</footer>
