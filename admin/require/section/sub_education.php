<div class="experiences editableEducation">
  <h2 class="editable" data-editable-mode="input" data-editable-name="param_title_education"><strong><? echo $resume->param['title_education'];?></strong></h2>
    <?
    if(!empty($resume->education)){

        foreach($resume->education as $key => $value){
            echo '<div class="experience row editableEducationRow" data-editable-education-id="'.$value['id'].'">
                    <div class="4u 12u$(medium)">
                      <h4 class="editableEducationItem" data-editable-mode="input" data-editable-name="institution">'.$value['institution'].'</h4>
                      <p class="experience-period">
                      <span class="editableEducationItem" data-editable-mode="input" data-editable-name="startDate">'.$value['startDate'].'</span>
                       -
                      <span class="editableEducationItem" data-editable-mode="input" data-editable-name="endDate">'.$value['endDate'].'</span>
                      </p>
                    </div>
                    <div class="8u 12u$(medium)">
                      <p>
                        <strong>
                        <span class="editableEducationItem" data-editable-mode="input" data-editable-name="area">'.$value['area'].'</span>
                        -
                        <span class="editableEducationItem" data-editable-mode="input" data-editable-name="studyType">'.$value['studyType'].'</span>
                        </strong>
                        <span class="hidden-phone editableEducationItem" data-editable-mode="textarea" data-editable-name="summary">'.$value['summary'].'</span>';
                if(!empty($value['location'])){
                  echo '<span class="experience-details">
                          <span class="location">
                            <span class="fa fa-map-marker"></span> <span class="editableEducationItem" data-editable-mode="input" data-editable-name="location">'.$value['location'].'</span>
                          </span>
                        </span>';
                }
                    echo'</p>
                    </div>
                  </div>';
        }
      }
      ?>
</div>
<div class="editableEducationTemplate hidden">
  <div class="experience row editableEducationRow" data-editable-education-action="new">
          <div class="4u 12u$(medium)">
            <h4 class="editableEducationItem" data-editable-mode="input" data-editable-name="institution">University</h4>
            <p class="experience-period">
            <span class="editableEducationItem" data-editable-mode="input" data-editable-name="startDate">2011</span>
             -
            <span class="editableEducationItem" data-editable-mode="input" data-editable-name="endDate">2017</span>
            </p>
          </div>
          <div class="8u 12u$(medium)">
            <p>
              <strong>
              <span class="editableEducationItem" data-editable-mode="input" data-editable-name="area">Software Development</span>
              -
              <span class="editableEducationItem" data-editable-mode="input" data-editable-name="studyType">Bachelor</span>
              </strong>
              <span class="hidden-phone editableEducationItem" data-editable-mode="textarea" data-editable-name="summary">DB1101 - Basic SQL</span>
              <span class="experience-details">
                      <span class="location">
                        <span class="fa fa-map-marker"></span> <span class="editableEducationItem" data-editable-mode="input" data-editable-name="location">USA</span>
                      </span>
                    </span>
                  </p>
                  </div>
                </div>
</div>
