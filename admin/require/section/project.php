
<section id="project" class="main special">
		<header class="major">
			<h2 class="editable" data-editable-mode="input" data-editable-name="param_title_project"><? echo $resume->param['title_project'];?></h2>
		</header>

		<div class="row uniform projects editableProjects">
				<?
						foreach($resume->projects as $key => $value){
								echo '<div class="project 4u 12u$(medium)" data-editable-project-id="'.$value['id'].'"><div class="content" style=\'background-image: url("'.$value['picture'].'")\'>';
								if($value['url'])
									echo '<a data-href="'.$value['url'].'" data-picture="'.$value['picture'].'">';
								echo '<div class="overlay">
										<h3 class="editableProjectsItem" data-editable-mode="input" data-editable-name="name">'.$value['name'].'</h3>
										<p class="editableProjectsItem" data-editable-mode="input" data-editable-name="summary">'.$value['summary'].'</p>
									</div>';
								if($value['url'])
									echo '</a>';
								echo '</div></div>';
						}
					?>
			</div>
	</section>
