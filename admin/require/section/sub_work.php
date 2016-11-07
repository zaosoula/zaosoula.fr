<div class="experiences editableWork">
  <h2 class="editable" data-editable-mode="input" data-editable-name="param_title_work"><strong><? echo $resume->param['title_work'];?></strong></h2>
  <?
      foreach($resume->work as $key => $value){
        $value['website_status'] = ($value['website_status'])?'':'<span class="status">(Hors ligne)</span>';
          echo '<div class="experience row editableWorkRow" data-editable-work-id="'.$value['id'].'">
            <div class="4u 12u$(medium)">
              <h4 class="editableWorkItem" data-editable-mode="input" data-editable-name="company">'.$value['company'].'</h4>
              <p class="experience-period">
                <span class="editableWorkItem" data-editable-mode="input" data-editable-name="startDate">'.$value['startDate'].'</span>
                 -
                <span class="editableWorkItem" data-editable-mode="input" data-editable-name="endDate">'.$value['endDate'].'</span>
              </p>
            </div>
            <div class="8u 12u$(medium)">
              <p>
                <strong class="editableWorkItem" data-editable-mode="input" data-editable-name="position">'.$value['position'].'</strong>
                <span class="hidden-phone editableWorkItem" data-editable-mode="textarea" data-editable-name="summary"">'.$value['summary'].'</span>';

              if(!empty($value['location']) || $value['website']){
                echo '<span class="experience-details">';
                if(!empty($value['location']))
                  echo '<span class="location"><span class="fa fa-map-marker"></span>
                    <span class="editableWorkItem" data-editable-mode="input" data-editable-name="location">'.$value['location'].'</span>
                  </span>';
                if(!empty($value['location']) && !empty($value['website']))
                  echo '<span class="seperator"> | </span>';
                if(!empty($value['website']))
                  echo '<span class="link"><span class="fa fa-link"></span> <span class="editableWorkItem" data-editable-mode="input" data-editable-name="website">'.$value['website'].'</span> '.$value['website_status'].'</span>';
                echo '</span>';
              }
              echo '</p>
            </div>
          </div>';
      }
    ?>
</div>
<div class="editableWorkTemplate hidden">
  <div class="experience row editableWorkRow" data-editable-work-action="new">
    <div class="4u 12u$(medium)">
      <h4 class="editableWorkItem" data-editable-mode="input" data-editable-name="company">Company</h4>
      <p class="experience-period">
        <span class="editableWorkItem" data-editable-mode="input" data-editable-name="startDate">2011</span>
         -
        <span class="editableWorkItem" data-editable-mode="input" data-editable-name="endDate">2017</span>
      </p>
    </div>
    <div class="8u 12u$(medium)">
      <p>
        <strong class="editableWorkItem" data-editable-mode="input" data-editable-name="position">President</strong>
        <span class="hidden-phone editableWorkItem" data-editable-mode="textarea" data-editable-name="summary">Description...</span>
        <span class="experience-details">
          <span class="location"><span class="fa fa-map-marker"></span>
            <span class="editableWorkItem" data-editable-mode="input" data-editable-name="location">USA</span>
          </span>
          <span class="seperator"> | </span>
          <span class="link"><span class="fa fa-link"></span> <span class="editableWorkItem" data-editable-mode="input" data-editable-name="website">http://company.com</span></span>
        </span>
      </p>
    </div>
  </div>
</div>
