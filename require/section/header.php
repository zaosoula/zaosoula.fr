<?
if(!empty($resume->basics)){
?>
<!-- Header -->
<header id="header" class="alt">
  <span class="logo"><img src="<? echo $resume->basics['picture'];?>" alt="<? echo $resume->basics['name'];?>" /></span>
  <h1><? echo $resume->basics['name'];?></h1>
  <p><? echo $resume->basics['label'];?></p>
  <?
    if(!empty($resume->basics['profiles']))
      require('require/section/sub_profiles.php');
  ?>
</header>
<?}?>
