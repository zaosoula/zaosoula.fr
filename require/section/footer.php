
<!-- Footer -->
<footer id="footer">
	<section id="contact">
		<h2>Me contacter</h2>
		<ul class="icons">
			<?
				foreach($resume->basics['profiles'] as $key => $value){
						echo '<li><a href="'.$value['url'].'" target="_blank" class="icon fa-'.strtolower($value['network']).' alt"><span class="label">'.$value['network'].'</span></a></li>';
				}
			?>
		</ul>
	</section>
	<p class="copyright">&copy; Zao Soula. Design: <a href="https://html5up.net">HTML5 UP</a> & <a href="https://zaosoula.fr">Zao Soula.</a></p>
					</footer>
