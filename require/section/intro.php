<?
if(!empty($resume->basics)){
?>
<!-- Introduction -->
<section id="intro" class="main">
  <div class="spotlight">
    <div class="content">
      <header class="major">
        <h2><? echo $resume->param['title_intro'];?></h2>
      </header>
      <p><? echo $resume->basics['summary'];?></p>
    </div>
    <span class="hidden-phone image"><img src="<? echo $resume->basics['picture'];?>" alt="<? echo $resume->basics['name'];?>" /></span>
  </div>
</section>
<?}?>
