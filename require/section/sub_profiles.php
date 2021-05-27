<ul class="icons">
  <?php  
    foreach($resume->basics['profiles'] as $key => $value){
        echo '<li><a href="'.$value['url'].'" target="_blank" class="icon fa-'.$value['icon'].' alt"><span class="label">'.$value['network'].'</span></a></li>';
    }
  ?>
</ul>
