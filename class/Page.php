<?php

/**
 * @package    Page
 * @author     Zao Soula - Zarque
 * @version    1.0

 */

class Page {
    private $title = 'Zao Soula - Développeur Web';
    private $require = array('header','footer');
    private $assets;


    public function __construct($data = array())
    {
        if(!empty($data))
            $this->hydrate($data);
    }

    public function hydrate($donnees)
    {
        foreach ($donnees as $attribut => $valeur)
        {
        $methode = 'set'.str_replace(' ', '', ucwords(str_replace('_', ' ', $attribut)));

        if (is_callable(array($this, $methode)))
        {
            $this->$methode($valeur);
        }
        }
    }

    public function load(){
      if(!empty($this->assets)){
        foreach($this->assets as $asset){
          if(file_exists('assets/'.$asset)){
            switch (pathinfo('assets/'.$asset)['extension']) {
              case 'js':
                echo '<script src="'.BaseUrl.'/assets/'.$asset.'"></script>';
                break;
              case 'css':
                echo '<link href="'.BaseUrl.'/assets/'.$asset.'" rel="stylesheet">';
                  break;
              default:
            }
          }
        }
      }
    }

    public function checkRights($right){
      switch ($right) {
        case 'login':
          if(!empty($_SESSION['user']) && $_SESSION['user']['status']=="auth")
            return true;
          else
            return false;
          break;
        default:
          return true;
      }
    }

  public function getTitle(){
      return $this->title;
  }

  public function setTitle($title){
      $this->title = $title;
      return $this;
  }

  public function getRequire(){
      return $this->require;
  }

  public function setRequire($require){
      $this->require = $require;
      return $this;
  }

  public function getAssets(){
      return $this->assets;
  }

  public function setAssets($assets){
      $this->assets = $assets;
      return $this;
  }

}
?>
