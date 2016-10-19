<?php

/**
 * @package    Resume
 * @author     Zao Soula - Zarque
 * @version    1.0

 */

class Resume {
    public $basics = array();
    public $work = array();
    public $education = array();
    public $skills = array();
    public $languages = array();
    public $projects = array();
    public $tools = array();

    public function __construct($command = null)
    {
        if(!empty($command) && is_callable(array($this, $command)))
            $this->$command();
    }


    public function loadBDD(){
      if(empty($this->basics))
        $this->loadBDDBasics();
      if(empty($this->education))
        $this->loadBDDEducation();
      if(empty($this->languages))
        $this->loadBDDLanguages();
      if(empty($this->work))
        $this->loadBDDWork();
      if(empty($this->skills))
        $this->loadBDDSkills();
      if(empty($this->basics['profiles']))
        $this->loadBDDProfiles();
      if(empty($this->projects))
        $this->loadBDDProjects();
      if(empty($this->tools))
        $this->loadBDDTools();
    }

    private function loadBDDBasics(){
      try{
      	$sql = "SELECT * FROM basics";
      	$pdo = Connexion::getInstance ();
      	$sth = $pdo->query ( $sql );
      	$res = $sth->fetchAll (PDO::FETCH_ASSOC);

      	foreach ( $res as $row ) {
      		$this->basics[$row['name']] = $row['value'];
      	}
      } catch ( PDOException $e ) {
      	logger('Resume loadBDDBasics Error - PDOException : '.json_encode($e)); //Add in log
      }
    }
    private function loadBDDEducation(){
      try{
      	$sql = "SELECT * FROM education ORDER BY `order` ASC";
      	$pdo = Connexion::getInstance ();
      	$sth = $pdo->query ( $sql );
      	$res = $sth->fetchAll (PDO::FETCH_ASSOC);


      	foreach ( $res as $row ) {
      		$this->education[] = array(
      		"institution"=>$row['institution'],
      		"startDate"=>$row['startDate'],
      		"endDate"=>$row['endDate'],
      		"location"=>$row['location'],
      		"area"=>$row['area'],
      		"studyType"=>$row['studyType'],
      		"summary"=>$row['summary'],
      		);
      	}

      } catch ( PDOException $e ) {
      	logger('Resume loadBDDEducation Error - PDOException : '.json_encode($e)); //Add in log
      }
    }
    private function loadBDDLanguages(){
      try{
        $sql = "SELECT * FROM languages ORDER BY level DESC";
        $pdo = Connexion::getInstance ();
        $sth = $pdo->query ( $sql );
        $res = $sth->fetchAll (PDO::FETCH_ASSOC);


        foreach ( $res as $row ) {
          $this->languages[] = array(
            "name"=>$row['name'],
            "level"=>$row['level']
          );
        }

      } catch ( PDOException $e ) {
      	logger('Resume loadBDDLanguages Error - PDOException : '.json_encode($e)); //Add in log
      }
    }
    private function loadBDDWork(){
      try{
        $sql = "SELECT * FROM work ORDER BY `order` ASC";
        $pdo = Connexion::getInstance ();
        $sth = $pdo->query ( $sql );
        $res = $sth->fetchAll (PDO::FETCH_ASSOC);


        foreach ( $res as $row ) {
        	$this->work[] = array(
        	"company"=>$row['company'],
        	"startDate"=>$row['startDate'],
        	"endDate"=>$row['endDate'],
        	"location"=>$row['location'],
        	"website"=>$row['website'],
        	"website_status"=>$row['website_status'],
        	"position"=>$row['position'],
        	"summary"=>$row['summary'],
        	);
        }

      } catch ( PDOException $e ) {
      	logger('Resume loadBDDWork Error - PDOException : '.json_encode($e)); //Add in log
      }
    }
    private function loadBDDSkills(){
      try{
        $sql = "SELECT * FROM skills ORDER BY level DESC";
        $pdo = Connexion::getInstance ();
        $sth = $pdo->query ( $sql );
        $res = $sth->fetchAll (PDO::FETCH_ASSOC);


        foreach ( $res as $row ) {
          $this->skills[] = array(
            "name"=>$row['name'],
            "level"=>$row['level']
          );
        }

      } catch ( PDOException $e ) {
      	logger('Resume loadBDDSkills Error - PDOException : '.json_encode($e)); //Add in log
      }
    }
    private function loadBDDProfiles(){
      try{
        $sql = "SELECT * FROM profiles ORDER BY `order` ASC";
        $pdo = Connexion::getInstance ();
        $sth = $pdo->query ( $sql );
        $res = $sth->fetchAll (PDO::FETCH_ASSOC);


        foreach ( $res as $row ) {
          $this->basics['profiles'][] = array(
            "network"=>$row['network'],
            "username"=>$row['username'],
            "url"=>$row['url']
          );
        }

      } catch ( PDOException $e ) {
      	logger('Resume loadBDDProfiles Error - PDOException : '.json_encode($e)); //Add in log
      }
    }
    private function loadBDDProjects(){
      try{
        $sql = "SELECT * FROM projects ORDER BY id DESC";
      	$pdo = Connexion::getInstance ();
      	$sth = $pdo->query ( $sql );
      	$res = $sth->fetchAll (PDO::FETCH_ASSOC);


      	foreach ( $res as $row ) {
        	$this->projects[] = array(
          	"name"=>$row['name'],
          	"summary"=>$row['summary'],
          	"picture"=>$row['picture'],
          	"url"=>$row['url']
        	);
      	}

      } catch ( PDOException $e ) {
        logger('Resume loadBDDProjects Error - PDOException : '.json_encode($e)); //Add in log
      }
    }
    private function loadBDDTools(){
      try{
        $sql = "SELECT * FROM tools ORDER BY level DESC";
        $pdo = Connexion::getInstance ();
        $sth = $pdo->query ( $sql );
        $res = $sth->fetchAll (PDO::FETCH_ASSOC);


        foreach ( $res as $row ) {
          $this->tools[] = array(
            "name"=>$row['name'],
            "level"=>$row['level'],
          );
        }
      } catch ( PDOException $e ) {
        logger('Resume loadBDDTools Error - PDOException : '.json_encode($e)); //Add in log
      }
    }

}
?>
