<div class="abilities editableLang">
<h2 class="editable" data-editable-mode="input" data-editable-name="param_title_language"><strong><?php   echo $resume->param['title_language'];?></strong></h2>
<div class="row">

  <?php  
          foreach($resume->languages as $key => $value){
            if($key === 0){
              echo '<div class="6u 12u$(medium)"><ul class="no-bullets">';
            }
            echo '<li class="editableLangRow"  data-editable-lang-id="'.$value['id'].'">
              <span class="ability-title editableLangItem" data-editable-mode="input" data-editable-name="name">'.$value['name'].'</span>
              <span class="ability-score editableLangItem" data-editable-mode="stars" data-editable-name="level"  data-score="'.$value['level'] .'"></span></li>';
            if(ceil(count($resume->languages) / 2) == $key + 1) {
              echo '</ul></div><div class="6u 12u$(medium)"><ul class="no-bullets">';
            }

            if($key == count($resume->languages) - 1){
              echo '</ul></div>';
            }
          }
        ?>
</div>
</div>


<div class="editableLangTemplate hidden">
  <li class="editableLangRow" data-editable-lang-action="new">
            <span class="ability-title editableLangItem" data-editable-mode="input" data-editable-name="name">Francais</span>
            <span class="ability-score editableLangItem" data-editable-mode="stars" data-editable-name="level" data-score="1"></span>
        </li>
</div>
