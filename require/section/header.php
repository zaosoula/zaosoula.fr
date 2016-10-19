<!-- Header -->
<header id="header" class="alt">
  <span class="logo"><img src="<? echo $resume->basics['picture'];?>" alt="<? echo $resume->basics['name'];?>" /></span>
  <h1><? echo $resume->basics['name'];?></h1>
  <p><? echo $resume->basics['label'];?></p>
  <ul class="icons">
    <?
      foreach($resume->basics['profiles'] as $key => $value){
          echo '<li><a href="'.$value['url'].'" target="_blank" class="icon fa-'.strtolower($value['network']).' alt"><span class="label">'.$value['network'].'</span></a></li>';
      }
    ?>
  </ul>
</header>
