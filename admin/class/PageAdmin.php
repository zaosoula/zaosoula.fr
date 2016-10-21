<?
class PageAdmin extends Page
{
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
              echo '<script src="'.BaseUrlAdmin.'/assets/'.$asset.'"></script>';
              break;
            case 'css':
              echo '<link href="'.BaseUrlAdmin.'/assets/'.$asset.'" rel="stylesheet">';
                break;
            default:
          }
        }
      }
    }
  }
  public function getAssets(){
      return $this->assets;
  }

  public function setAssets($assets){
      $this->assets = $assets;
      return $this;
  }
}
