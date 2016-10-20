<?
  if(!empty($resume->education) || !empty($resume->work)){
?>
<!-- Experiences -->
<section id="expe" class="main special">
  <header class="major">
    <h2><? echo $resume->param['title_expe'];?></h2>
  </header>
  <?
    if(!empty($resume->education))
      require('require/section/sub_education.php');
    if(!empty($resume->work))
      require('require/section/sub_work.php');
    ?>
</section>
<?}?>
