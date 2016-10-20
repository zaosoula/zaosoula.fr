<ul class="icons">
  <?
    foreach($resume->basics['profiles'] as $key => $value){
        echo '<li><a href="'.$value['url'].'" target="_blank" class="icon fa-'.strtolower($value['network']).' alt"><span class="label">'.$value['network'].'</span></a></li>';
    }
  ?>
</ul>
