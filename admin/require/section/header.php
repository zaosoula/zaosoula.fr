<!-- Header -->
<header id="header" class="alt">
  <span class="logo"><img src="<? echo $resume->basics['picture'];?>" alt="<? echo $resume->basics['name'];?>" /></span>
  <h1 class="editable" data-editable-mode="input" data-editable-name="basics_name"><? echo $resume->basics['name'];?></h1>
  <p class="editable" data-editable-mode="input" data-editable-name="basics_label"><? echo $resume->basics['label'];?></p>
  <?
      require('require/section/sub_profiles.php');
  ?>
</header>
