<div id="particles-js"></div>

<!-- Wrapper -->
<div id="wrapper">

	<!-- Header -->
	<header id="header" class="alt">
		<span class="logo"><img src="<?echo BaseUrl?>/assets/images/zao.png" alt="Zao Soula" /></span>
		<h1>Zao Soula</h1>
		<p>Développeur Web</p>
		<ul class="icons">
			<li><a href="https://twitter.com/zarque7" target="_blank" class="icon fa-twitter alt"><span class="label">Twitter</span></a></li>
			<li><a href="https://www.facebook.com/Zao-Soula-142126902851327" class="icon fa-facebook alt"><span class="label">Facebook</span></a></li>
			<li><a href="https://instagram.com/zarque7" target="_blank" class="icon fa-instagram alt"><span class="label">Instagram</span></a></li>
			<li><a href="https://github.com/zarque" target="_blank" class="icon fa-github alt"><span class="label">GitHub</span></a></li>
			<li><a href="https://linkedin.com/in/zaosoula" target="_blank" class="icon fa-linkedin alt"><span class="label">Linkedin</span></a></li>
			<li><a href="https://youtube.com/zaosoula" target="_blank" class="icon fa-youtube alt"><span class="label">Youtube</span></a></li>
		</ul>
	</header>

	<!-- Nav -->
	<nav id="nav">
		<ul>
			<li><a href="#me" class="active">Qui suis-je ?</a></li>
			<li><a href="#expe">Expériences</a></li>
			<li><a href="#abili">Compétences</a></li>
			<li><a href="#project">Projets</a></li>
			<li><a href="#contact">Contact</a></li>
		</ul>
	</nav>

	<!-- Main -->
	<div id="main">

		<!-- Introduction -->
		<section id="me" class="main">
			<div class="spotlight">
				<div class="content">
					<header class="major">
						<h2>Qui suis-je ?</h2>
					</header>
					<p>Je m'appelle Zao Soula, j'ai <?echo date(Y)-2002?> ans et je suis passionné d'informatique et d'électronique. Depuis maintenant <?echo date(Y)-2012?> ans je pratique le développement web, et maitrise aujourd'hui l'HTML, le PHP, le CSS et le Javascript.</p>
					<ul class="actions">
						<li><a href="#expe" class="button scroll">Mes expériences</a></li>
					</ul>
				</div>
				<span class="hidden-phone image"><img src="<?echo BaseUrl?>/assets/images/zao.png" alt="Zao Soula" /></span>
			</div>
		</section>

		<!-- First Section -->
		<section id="expe" class="main special">
			<header class="major">
				<h2>Mes expériences</h2>
			</header>
			<div class="experiences">

				<h2><strong>Éducation</strong></h2>
				<?
						foreach($resume['experiences']['educations'] as $key => $value){
								echo '<div class="experience row">

									<div class="4u 12u$(medium)">
										<h4>'.$value['school'].'</h4>
										<p class="experience-period"> '.$value['start'].' - '.$value['end'].'</p>
									</div>
									<div class="8u 12u$(medium)">
										<p>
											<strong>'.$value['title'].'</strong>
											<span class="hidden-phone">'.$value['descrip'].'</span>
											<span class="experience-details">
				                  					<span class="location">
				                  						<span class="fa fa-map-marker"></span> '.$value['location'].'</span>
											</span>
										</p>
									</div>
								</div>';
						}
					?>


			</div>
			<div class="experiences">

				<h2><strong>Parcours</strong></h2>

				<?
						foreach($resume['experiences']['careers'] as $key => $value){
							$value['website_status'] = ($value['website_status'])?'':'<span class="status">(Hors ligne)</span>';
								echo '<div class="experience row">
									<div class="4u 12u$(medium)">
										<h4>'.$value['company'].'</h4>
										<p class="experience-period"> '.$value['start'].' - '.$value['end'].'</p>
									</div>
									<div class="8u 12u$(medium)">
										<p>
											<strong>'.$value['title'].'</strong>
											<span class="hidden-phone">'.$value['descrip'].'</span>
											<span class="experience-details">
				                  					<span class="location"><span class="fa fa-map-marker"></span> '.$value['location'].'</span>
											<span class="seperator">|</span>
											<span class="link"><span class="fa fa-link"></span> <a href="'.$value['website'].'" target="_blank">'.$value['website'].'</a> '.$value['website_status'].'</span>
											</span>
										</p>
									</div>
								</div>';
						}
					?>


			</div>
			<footer class="major">
				<ul class="actions">
					<li><a href="#abili" class="button scroll">Mes compétences</a></li>
				</ul>
			</footer>
		</section>

		<!-- Second Section -->
		<section id="abili" class="main special">
			<header class="major">
				<h2>Compétences</h2>
			</header>
			<div class="abilities">
				<h2><strong>Compétences</strong></h2>

				<div class="row">
					<?
							foreach($resume['abilities']['skills'] as $key => $value){
								if($key === 0){
									echo '<div class="6u 12u$(medium)"><ul class="no-bullets">';
								}
								echo '<li>
									<span class="ability-title">'.$value['title'].'</span>
									<span class="ability-score">';
									for($stars = 1; $stars <= 5; $stars++) {
											$fill = ($value['score'] >= $stars) ? '' : '-o';
											echo '<span class="fa fa-star'.$fill.'"></span>';
									}

									echo '</span></li>';
								if(ceil(count($resume['abilities']['skills']) / 2) == $key + 1) {
									echo '</ul></div><div class="6u 12u$(medium)"><ul class="no-bullets">';
								}
								if($key == count($resume['abilities']['skills']) - 1){
									echo '</ul></div>';
								}
							}
						?>
				</div>
			</div>
	<div class="abilities">
		<h2><strong>Langues</strong></h2>
		<div class="row">

			<?
							foreach($resume['abilities']['languages'] as $key => $value){
								$value['descrip'] = (!empty($value['descrip']))?'('.$value['descrip'].')':'';
								if($key === 0){
									echo '<div class="6u 12u$(medium)"><ul class="no-bullets">';
								}
								echo '<li>
									<span class="ability-title">'.$value['title'].' '.$value['descrip'].'</span>
									<span class="ability-score">';
									for($stars = 1; $stars <= 5; $stars++) {
											$fill = ($value['score'] >= $stars) ? '' : '-o';
											echo '<span class="fa fa-star'.$fill.'"></span>';
									}

									echo '</span></li>';
								if(ceil(count($resume['abilities']['languages']) / 2) == $key + 1) {
									echo '</ul></div><div class="6u 12u$(medium)"><ul class="no-bullets">';
								}

								if($key == count($resume['abilities']['languages']) - 1){
									echo '</ul></div>';
								}
							}
						?>
		</div>
	</div>
	<div class="abilities">
		<h2><strong>Logiciels</strong></h2>
		<div class="row">

			<?
						foreach($resume['abilities']['tools'] as $key => $value){
							$value['descrip'] = (!empty($value['descrip']))?'('.$value['descrip'].')':'';
							if($key === 0){
								echo '<div class="6u 12u$(medium)"><ul class="no-bullets">';
							}
							echo '<li>
								<span class="ability-title">'.$value['title'].' '.$value['descrip'].'</span>
								<span class="ability-score">';
								for($stars = 1; $stars <= 5; $stars++) {
										$fill = ($value['score'] >= $stars) ? '' : '-o';
										echo '<span class="fa fa-star'.$fill.'"></span>';
								}

								echo '</span></li>';
							if(ceil(count($resume['abilities']['tools']) / 2) == $key + 1) {
								echo '</ul></div><div class="6u 12u$(medium)"><ul class="no-bullets">';
							}

							if($key == count($resume['abilities']['tools']) - 1){
								echo '</ul></div>';
							}
						}
					?>
	</div>
</div>
<footer class="major">
	<ul class="actions">
		<li><a href="#project" class="button scroll">Mes projets</a></li>
	</ul>
</footer>
</section>
<section id="project" class="main special">
		<header class="major">
			<h2>Projets</h2>
		</header>

		<div class="row uniform projects">
				<?
						foreach($resume['projects'] as $key => $value){
								echo '<div class="project 4u 12u$(medium)"><div class="content" style=\'background-image: url("'.BaseUrl.'/assets/images/projects/'.$value['image'].'")\'>';
								if($value['link'])
									echo '<a href="'.$value['link'].'" target="_blank">';
								echo '<div class="overlay">
										<h3>'.$value['title'].'</h3>
										<p>'.$value['descrip'].'</p>
									</div>';
								if($value['link'])
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
</div>

<!-- Footer -->
<footer id="footer">
	<section id="contact">
		<h2>Me contacter</h2>
		<ul class="icons">
			<li><a href="https://twitter.com/zarque7" target="_blank" class="icon fa-twitter alt"><span class="label">Twitter</span></a></li>
			<li><a href="https://www.facebook.com/Zao-Soula-142126902851327" class="icon fa-facebook alt"><span class="label">Facebook</span></a></li>
			<li><a href="https://instagram.com/zarque7" target="_blank" class="icon fa-instagram alt"><span class="label">Instagram</span></a></li>
			<li><a href="https://github.com/zarque" target="_blank" class="icon fa-github alt"><span class="label">GitHub</span></a></li>
			<li><a href="https://linkedin.com/in/zaosoula" target="_blank" class="icon fa-linkedin alt"><span class="label">Linkedin</span></a></li>
			<li><a href="https://youtube.com/zaosoula" target="_blank" class="icon fa-youtube alt"><span class="label">Youtube</span></a></li>
		</ul>
	</section>
	<p class="copyright">&copy; Zao Soula. Design: <a href="https://html5up.net">HTML5 UP</a> & <a href="https://zaosoula.fr">Zao Soula.</a></p>
					</footer>

			</div>
