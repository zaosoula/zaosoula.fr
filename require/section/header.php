<?php  
if(!empty($resume->basics)){
?>
<!-- Header -->
<header id="header" class="alt">
  <span class="logo"><img src="<?php   echo $resume->basics['picture'];?>" alt="<?php   echo $resume->basics['name'];?>" /></span>
  <h1><?php   echo $resume->basics['name'];?></h1>
  <p><?php   echo $resume->basics['label'];?></p>
  <?php  
    if(!empty($resume->basics['profiles']))
      require('require/section/sub_profiles.php');
  ?>
</header>
<?php   } ?>
