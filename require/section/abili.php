<?php  
  if(!empty($resume->skills) || !empty($resume->languages) || !empty($resume->tools)){
?>
<!-- Second Section -->
<section id="abili" class="main special">
  <header class="major">
    <h2><?php   echo $resume->param['title_abili'];?></h2>
  </header>
<?php  
    if(!empty($resume->skills))
      require('require/section/sub_skills.php');
    if(!empty($resume->languages))
      require('require/section/sub_languages.php');
    if(!empty($resume->tools))
      require('require/section/sub_tools.php');
?>
</section>
<?php   } ?>
