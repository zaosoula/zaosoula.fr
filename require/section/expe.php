<!-- Experiences -->
<section id="expe" class="main special">
  <header class="major">
    <h2>Mes expériences</h2>
  </header>

        <div class="experiences">
          <h2><strong>Éducation</strong></h2>
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
                        <span class="hidden-phone">'.$value['summary'].'</span>
                        <span class="experience-details">
                                      <span class="location">
                                        <span class="fa fa-map-marker"></span> '.$value['location'].'</span>
                        </span>
                      </p>
                    </div>
                  </div>';
              }

              ?>
        </div>

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
                    <span class="hidden-phone">'.$value['summary'].'</span>
                    <span class="experience-details">
                                  <span class="location"><span class="fa fa-map-marker"></span> '.$value['location'].'</span>
                    <span class="seperator">|</span>
                    <span class="link"><span class="fa fa-link"></span> <a href="'.$value['website'].'" target="_blank">'.$value['website'].'</a> '.$value['website_status'].'</span>
                    </span>
                  </p>
                </div>
              </div>';
          }
        ?>


    </div>
  <footer class="major">
    <ul class="actions">
      <li><a href="#abili" class="button scroll">Mes compétences</a></li>
    </ul>
  </footer>
</section>
