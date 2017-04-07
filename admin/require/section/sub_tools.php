<div class="abilities editableTools">
<h2 class="editable" data-editable-mode="input" data-editable-name="param_title_tools"><strong><? echo $resume->param['title_tools'];?></strong></h2>
<div class="row">

  <?
        foreach($resume->tools as $key => $value){
          if($key === 0){
            echo '<div class="6u 12u$(medium)"><ul class="no-bullets">';
          }
          echo '<li class="editableToolsRow"  data-editable-tools-id="'.$value['id'].'">
            <span class="ability-title editableToolsItem" data-editable-mode="input" data-editable-name="name">'.$value['name'].'</span>
            <span class="ability-score editableToolsItem" data-editable-mode="stars" data-editable-name="level"  data-score="'.$value['level'] .'"></span></li>';
          if(ceil(count($resume->tools) / 2) == $key + 1) {
            echo '</ul></div><div class="6u 12u$(medium)"><ul class="no-bullets">';
          }

          if($key == count($resume->tools) - 1){
            echo '</ul></div>';
          }
        }
      ?>
</div>
</div>

<div class="editableToolsTemplate hidden">
  <li class="editableToolsRow" data-editable-tools-action="new">
            <span class="ability-title editableToolsItem" data-editable-mode="input" data-editable-name="name">Notepad++</span>
            <span class="ability-score editableToolsItem" data-editable-mode="stars" data-editable-name="level" data-score="1"></span>
        </li>
</div>
