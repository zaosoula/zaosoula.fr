<ul class="icons socialEditable">
  <?php  
    foreach($resume->basics['profiles'] as $key => $value){
        echo '<li><a href="'.$value['url'].'" target="_blank" class="icon fa-'.$value['icon'].' alt" data-icon="'.$value['icon'].'" data-id="'.$value['id'].'"><span class="label">'.$value['network'].'</span></a></li>';
    }
  ?>
</ul>
