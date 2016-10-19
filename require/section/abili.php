<!-- Second Section -->
<section id="abili" class="main special">
  <header class="major">
    <h2>Compétences</h2>
  </header>
  <div class="abilities">
    <h2><strong>Compétences</strong></h2>

    <div class="row">
      <?
          foreach($resume->skills as $key => $value){
            if($key === 0){
              echo '<div class="6u 12u$(medium)"><ul class="no-bullets">';
            }
            echo '<li>
              <span class="ability-title">'.$value['name'].'</span>
              <span class="ability-score">';
              for($stars = 1; $stars <= 5; $stars++) {
                  $fill = ($value['level'] >= $stars) ? '' : '-o';
                  echo '<span class="fa fa-star'.$fill.'"></span>';
              }

              echo '</span></li>';
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
<div class="abilities">
<h2><strong>Langues</strong></h2>
<div class="row">

  <?
          foreach($resume->languages as $key => $value){
            if($key === 0){
              echo '<div class="6u 12u$(medium)"><ul class="no-bullets">';
            }
            echo '<li>
              <span class="ability-title">'.$value['name'].'</span>
              <span class="ability-score">';
              for($stars = 1; $stars <= 5; $stars++) {
                  $fill = ($value['level'] >= $stars) ? '' : '-o';
                  echo '<span class="fa fa-star'.$fill.'"></span>';
              }

              echo '</span></li>';
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
<div class="abilities">
<h2><strong>Logiciels</strong></h2>
<div class="row">

  <?
        foreach($resume->tools as $key => $value){
          if($key === 0){
            echo '<div class="6u 12u$(medium)"><ul class="no-bullets">';
          }
          echo '<li>
            <span class="ability-title">'.$value['name'].'</span>
            <span class="ability-score">';
            for($stars = 1; $stars <= 5; $stars++) {
                $fill = ($value['level'] >= $stars) ? '' : '-o';
                echo '<span class="fa fa-star'.$fill.'"></span>';
            }

            echo '</span></li>';
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
<footer class="major">
<ul class="actions">
<li><a href="#project" class="button scroll">Mes projets</a></li>
</ul>
</footer>
</section>
