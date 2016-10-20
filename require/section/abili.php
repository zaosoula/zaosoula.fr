<?
  if(!empty($resume->skills) || !empty($resume->languages) || !empty($resume->tools)){
?>
<!-- Second Section -->
<section id="abili" class="main special">
  <header class="major">
    <h2>Compétences</h2>
  </header>
<?
    if(!empty($resume->skills))
      require('require/section/sub_skills.php');
    if(!empty($resume->languages))
      require('require/section/sub_languages.php');
    if(!empty($resume->tools))
      require('require/section/sub_tools.php');
?>


<footer class="major">
<ul class="actions">
<li><a href="#project" class="button scroll">Mes projets</a></li>
</ul>
</footer>
</section>
<?}?>
