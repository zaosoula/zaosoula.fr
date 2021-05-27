<?php  
if(!empty($resume->basics)){
?>
<!-- Introduction -->
<section id="intro" class="main">
  <div class="spotlight">
    <div class="content">
      <header class="major">
        <h2><?php   echo $resume->param['title_intro'];?></h2>
      </header>
      <p><?php   echo $resume->basics['summary'];?></p>
    </div>
    <span class="hidden-phone image"><img src="<?php   echo $resume->basics['picture'];?>" alt="<?php   echo $resume->basics['name'];?>" /></span>
  </div>
</section>
<?php   } ?>
