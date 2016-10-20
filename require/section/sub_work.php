<div class="experiences">
  <h2><strong>Parcours</strong></h2>
  <?
      foreach($resume->work as $key => $value){
        $value['website_status'] = ($value['website_status'])?'':'<span class="status">(Hors ligne)</span>';
          echo '<div class="experience row">
            <div class="4u 12u$(medium)">
              <h4>'.$value['company'].'</h4>
              <p class="experience-period"> '.$value['startDate'].' - '.$value['endDate'].'</p>
            </div>
            <div class="8u 12u$(medium)">
              <p>
                <strong>'.$value['position'].'</strong>
                <span class="hidden-phone">'.$value['summary'].'</span>';

              if(!empty($value['location']) || $value['website']){
                echo '<span class="experience-details">';
                if(!empty($value['location']))
                  echo '<span class="location"><span class="fa fa-map-marker"></span> '.$value['location'].'</span>';
                if(!empty($value['location']) && !empty($value['website']))
                  echo '<span class="seperator"> | </span>';
                if(!empty($value['website']))
                  echo '<span class="link"><span class="fa fa-link"></span> <a href="'.$value['website'].'" target="_blank">'.$value['website'].'</a> '.$value['website_status'].'</span>';
                echo '</span>';
              }
              echo '</p>
            </div>
          </div>';
      }
    ?>
</div>
