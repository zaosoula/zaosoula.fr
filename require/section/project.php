<section id="project" class="main special">
		<header class="major">
			<h2>Projets</h2>
		</header>

		<div class="row uniform projects">
				<?
						foreach($resume->projects as $key => $value){
								echo '<div class="project 4u 12u$(medium)"><div class="content" style=\'background-image: url("'.BaseUrl.'/assets/images/projects/'.$value['picture'].'")\'>';
								if($value['url'])
									echo '<a href="'.$value['url'].'" target="_blank">';
								echo '<div class="overlay">
										<h3>'.$value['name'].'</h3>
										<p>'.$value['summary'].'</p>
									</div>';
								if($value['url'])
									echo '</a>';
								echo '</div></div>';
						}
					?>
			</div>

		<footer class="major">
			<ul class="actions">
				<li><a href="#contact" class="button scroll">Me contacter</a></li>
			</ul>
		</footer>
	</section>
