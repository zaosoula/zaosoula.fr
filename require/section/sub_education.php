<div class="experiences">
  <h2><strong><? echo $resume->param['title_education'];?></strong></h2>
    <?
      foreach($resume->education as $key => $value){
          echo '<div class="experience row">
                  <div class="4u 12u$(medium)">
                    <h4>'.$value['institution'].'</h4>
                    <p class="experience-period"> '.$value['startDate'].' - '.$value['endDate'].'</p>
                  </div>
                  <div class="8u 12u$(medium)">
                    <p>
                      <strong>'.$value['area'].'- '.$value['studyType'].'</strong>
                      <span class="hidden-phone">'.$value['summary'].'</span>';
              if(!empty($value['location'])){
                echo '<span class="experience-details">
                        <span class="location">
                          <span class="fa fa-map-marker"></span> '.$value['location'].'
                        </span>
                      </span>';
              }
                  echo'</p>
                  </div>
                </div>';
      }
      ?>
</div>
