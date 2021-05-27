<div class="abilities editableSkill">
  <h2 class="editable" data-editable-mode="input" data-editable-name="param_title_skills"><strong><?php   echo $resume->param['title_skills'];?></strong></h2>

  <div class="row">
    <?php  
        foreach($resume->skills as $key => $value){
          if($key === 0){
            echo '<div class="6u 12u$(medium)"><ul class="no-bullets">';
          }
          echo '<li class="editableSkillRow" data-editable-skill-id="'.$value['id'].'">
            <span class="ability-title editableSkillItem" data-editable-mode="input" data-editable-name="name">'.$value['name'].'</span>
            <span class="ability-score editableSkillItem" data-editable-mode="stars" data-editable-name="level"  data-score="'.$value['level'] .'"></span></li>';
          if(ceil(count($resume->skills) / 2) == $key + 1) {
            echo '</ul></div><div class="6u 12u$(medium)"><ul class="no-bullets">';
          }
          if($key == count($resume->skills) - 1){
            echo '</ul></div>';
          }
        }
      ?>
  </div>
</div>


<div class="editableSkillTemplate hidden">
  <li class="editableSkillRow" data-editable-skill-action="new">
            <span class="ability-title editableSkillItem" data-editable-mode="input" data-editable-name="name">PHP</span>
            <span class="ability-score editableSkillItem" data-editable-mode="stars" data-editable-name="level" data-score="1"></span>
        </li>
</div>
