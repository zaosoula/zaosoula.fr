<!-- Header -->
<header id="header" class="alt">
  <span class="logo"><img src="<?php   echo $resume->basics['picture'];?>" alt="<?php   echo $resume->basics['name'];?>" /></span>
  <h1 class="editable" data-editable-mode="input" data-editable-name="basics_name"><?php   echo $resume->basics['name'];?></h1>
  <p class="editable" data-editable-mode="input" data-editable-name="basics_label"><?php   echo $resume->basics['label'];?></p>
  <?php  
      require('require/section/sub_profiles.php');
  ?>
</header>
