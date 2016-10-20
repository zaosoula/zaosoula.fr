<?
if(!empty($resume->basics)){
?>
<!-- Introduction -->
<section id="intro" class="main">
  <div class="spotlight">
    <div class="content">
      <header class="major">
        <h2>Qui suis-je ?</h2>
      </header>
      <p><? echo $resume->basics['summary'];?></p>
      <ul class="actions">
        <li><a href="#expe" class="button scroll">Mes expériences</a></li>
      </ul>
    </div>
    <span class="hidden-phone image"><img src="<? echo $resume->basics['picture'];?>" alt="<? echo $resume->basics['name'];?>" /></span>
  </div>
</section>
<?}?>
