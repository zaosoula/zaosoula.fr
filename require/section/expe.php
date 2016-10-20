<?
  if(!empty($resume->education) || !empty($resume->work)){
?>
<!-- Experiences -->
<section id="expe" class="main special">
  <header class="major">
    <h2>Mes expériences</h2>
  </header>
  <?
    if(!empty($resume->education))
      require('require/section/sub_education.php');
    if(!empty($resume->work))
      require('require/section/sub_work.php');
    ?>

  <footer class="major">
    <ul class="actions">
      <li><a href="#abili" class="button scroll">Mes compétences</a></li>
    </ul>
  </footer>
</section>
<?}?>
