<?
class ResumeUpdater extends Resume
{
  public $param = array();
  public $basics = array();
  public $work = array();
  public $education = array();
  public $skills = array();
  public $languages = array();
  public $projects = array();
  public $tools = array();

  public function __construct($data = array())
  {
      if(!empty($data))
          $this->hydrate($data);
  }

  public function hydrate($donnees)
  {
      foreach ($donnees as $key => $valeur)
      {
        $this->$key = $valeur;
      }
  }

  public function update($data){
    $return = array();
     /// PARAM //////
    foreach($data->param as $key => $valeur)
    {
      if($valeur != $this->param[$key]){
        try{
          $sql = "UPDATE `param` SET `value`= :NewValue WHERE `name` = :Name  AND `value` = :LastValue";
          $pdo = Connexion::getInstance ();
          $sth = $pdo->prepare ( $sql );
          $sth->bindParam ( ':NewValue',  $this->param[$key], PDO::PARAM_STR);
          $sth->bindParam ( ':LastValue',  $valeur, PDO::PARAM_STR);
          $sth->bindParam ( ':Name', $key, PDO::PARAM_STR);
          $sth->execute();
            logger("ResumeUpdater update : \"$key\"  changé de \"$valeur\" a \"".$this->param[$key]."\"");
        } catch ( PDOException $e ) {
            logger('ResumeUpdater update Error - PDOException : '.json_encode($e)); //Add in log
        }
      }
    }
    /// BASICS //////
   foreach($this->basics as $key => $valeur)
   {
     if($valeur != $data->basics[$key] && $key != 'profiles'){
       try{
         $sql = "UPDATE `basics` SET `value`= :NewValue WHERE `name` = :Name  AND `value` = :LastValue";
         $pdo = Connexion::getInstance ();
         $sth = $pdo->prepare ( $sql );
         $sth->bindParam ( ':NewValue',  $valeur, PDO::PARAM_STR);
         $sth->bindParam ( ':LastValue',  $data->basics[$key], PDO::PARAM_STR);
         $sth->bindParam ( ':Name', $key, PDO::PARAM_STR);
         $sth->execute();
           logger("ResumeUpdater update : \"$key\"  changé de \"".$data->basics[$key]."\" a \"$valeur\"");
       } catch ( PDOException $e ) {
           logger('ResumeUpdater update Error - PDOException : '.json_encode($e)); //Add in log
       }
     }
   }
   /// PROFILES //////
  foreach($this->basics['profiles'] as $key => $valeur)
  {
    if($valeur['action'] == 'created'){
      try{
        $sql = "INSERT INTO `profiles`(`url`, `icon`) VALUES ( :Url , :Icon )";
        $pdo = Connexion::getInstance ();
        $sth = $pdo->prepare ( $sql );
        $sth->bindParam ( ':Url',  $valeur['url'], PDO::PARAM_STR);
        $sth->bindParam ( ':Icon',  $valeur['icon'], PDO::PARAM_STR);
        $sth->execute();
          logger("ResumeUpdater create : \"".$valeur['url']."\"  ajouté avec l'icon \"".$valeur['icon']."\"");
      } catch ( PDOException $e ) {
          logger('ResumeUpdater create Error - PDOException : '.json_encode($e)); //Add in log
      }
    }
    if($valeur['action'] == 'removed'){
      try{
        $sql = "DELETE FROM `profiles` WHERE `id` = :Id";
        $pdo = Connexion::getInstance ();
        $sth = $pdo->prepare ( $sql );
        $sth->bindParam ( ':Id',  $valeur['id'], PDO::PARAM_INT);
        $sth->execute();
          logger("ResumeUpdater delete : \"".$valeur['url']."\"  supprimé");
      } catch ( PDOException $e ) {
          logger('ResumeUpdater delete Error - PDOException : '.json_encode($e)); //Add in log
      }
    }
  }
  /// EDUCATION //////
   foreach($this->education as $key => $valeur)
   {
     if($valeur['action'] == 'new'){
       try{
         $sql = "INSERT INTO `education`(`institution`, `startDate`, `endDate`, `location`, `area`, `studyType`, `summary`) VALUES
         (:Institution,:StartDate,:EndDate,:Location,:Area,:StudyType,:Summary)";
         $pdo = Connexion::getInstance ();
         $sth = $pdo->prepare ( $sql );
         $sth->bindParam ( ':Institution',  $valeur['institution'], PDO::PARAM_STR);
         $sth->bindParam ( ':StartDate',  $valeur['startDate'], PDO::PARAM_STR);
         $sth->bindParam ( ':EndDate',  $valeur['endDate'], PDO::PARAM_STR);
         $sth->bindParam ( ':Location',  $valeur['location'], PDO::PARAM_STR);
         $sth->bindParam ( ':Area',  $valeur['area'], PDO::PARAM_STR);
         $sth->bindParam ( ':StudyType',  $valeur['studyType'], PDO::PARAM_STR);
         $sth->bindParam ( ':Summary',  $valeur['summary'], PDO::PARAM_STR);
         $sth->execute();
         $return['education'][$valeur['uniqueId']] = array(
           'id' => $pdo->lastInsertId(),
         );
           logger("ResumeUpdater create : \"".$valeur['institution'].":".$valeur['studyType']."\"  à été ajouté");
       } catch ( PDOException $e ) {
           logger('ResumeUpdater create Error - PDOException : '.json_encode($e)); //Add in log
       }
     }elseif($valeur['action'] == 'remove'){
       try{
         $sql = "DELETE FROM `education` WHERE `id` = :Id";
         $pdo = Connexion::getInstance ();
         $sth = $pdo->prepare ( $sql );
         $sth->bindParam ( ':Id',  $valeur['id'], PDO::PARAM_INT);
         $sth->execute();
         $return['education'][$valeur['uniqueId']] = array(
           'action' => 'remove',
         );
           logger("ResumeUpdater delete : education  id/".$value['id']." à été remove");
       } catch ( PDOException $e ) {
           logger('ResumeUpdater delete Error - PDOException : '.json_encode($e)); //Add in log
       }
     }elseif(!empty($valeur['id'])){

       foreach($data->education as $dataKey => $dataValeur)
       {
         if($dataValeur['id'] == $valeur['id']){
           logger('Match for education id/'.$valeur['id']); //Add in log
           $updateNeed = false;
           foreach($dataValeur as $dataValeurKey => $dataValeurValeur)
           {
             if($dataValeurValeur != $valeur[$dataValeurKey]){
               logger('Update nedd for education id/'.$dataValeur['id'] .'because '.$dataValeurKey.' : '.$dataValeurValeur.' != '.$valeur[$dataValeurKey]); //Add in log
               $updateNeed = true;
             }
           }

           if($updateNeed === true){
             try{
               $sql = "UPDATE `education` SET `institution`=:Institution,`startDate`=:StartDate,`endDate`=:EndDate,`location`=:Location,`area`=:Area,`studyType`=:StudyType,`summary`=:Summary WHERE `id`= :Id";
               $pdo = Connexion::getInstance ();
               $sth = $pdo->prepare ( $sql );
               $sth->bindParam ( ':Id',  $dataValeur['id'] , PDO::PARAM_INT);
               $sth->bindParam ( ':Institution',  $valeur['institution'], PDO::PARAM_STR);
               $sth->bindParam ( ':StartDate',  $valeur['startDate'], PDO::PARAM_STR);
               $sth->bindParam ( ':EndDate',  $valeur['endDate'], PDO::PARAM_STR);
               $sth->bindParam ( ':Location',  $valeur['location'], PDO::PARAM_STR);
               $sth->bindParam ( ':Area',  $valeur['area'], PDO::PARAM_STR);
               $sth->bindParam ( ':StudyType',  $valeur['studyType'], PDO::PARAM_STR);
               $sth->bindParam ( ':Summary',  $valeur['summary'], PDO::PARAM_STR);
               $sth->execute();
                 logger("ResumeUpdater Update : education id/".$dataValeur['id']." updated");
             } catch ( PDOException $e ) {
                 logger('ResumeUpdater Update Error - PDOException : '.json_encode($e)); //Add in log
             }
           }


         }
       }

     }

  }
  $return['status'] = 'success';
  return $return;
}
}
