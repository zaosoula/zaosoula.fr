<!-- Nav -->
<nav id="nav">
  <ul>
    <?
    if(!empty($resume->basics))
      echo '<li><a href="#intro">'.$resume->param['title_intro'].'</a></li>';
    if(!empty($resume->education) || !empty($resume->work))
      echo '<li><a href="#expe">'.$resume->param['title_expe'].'</a></li>';
    if(!empty($resume->skills) || !empty($resume->languages) || !empty($resume->tools))
      echo '<li><a href="#abili">'.$resume->param['title_abili'].'</a></li>';
    if(!empty($resume->projects))
      echo '<li><a href="#project">'.$resume->param['title_project'].'</a></li>';
    if(!empty($resume->basics['profiles']))
      echo '<li><a href="#contact">'.$resume->param['title_contact'].'</a></li>';
    ?>
  </ul>
</nav>
