
<?php
require_once(__dir__ . '/Controller.php');
require_once ('./Model/NewsModel.php');
class News extends Controller {

  public $active = 'Dashboard';
  private $newsModel;
  public function __construct(){
    if (!isset($_SESSION['auth_status'])) header('Location: index.php');
    $this->newsModel = new NewsModel();
  }

  public function create($data) {

    $title = stripslashes(strip_tags($data['title']));
    $content = stripslashes(strip_tags($data['content']));


    $Error = array(
      'title' => '',
      'content' => '',
    );

    if( strlen($title) < 5) {
      $Error['title'] = 'Please enter your name';
      return $Error;
    }

    if( strlen($content) < 15) {
      $Error['content'] = 'Please enter your email';
      return $Error;
    }

    $Payload = array(
      'title' => $title,
      'content' => $content,
    );

    $Response = $this->newsModel->createNews($Payload);

    if( !$Response['status'] ) {
      $Response['status'] = 'Sorry, something went wrong';
      return $Response;
    }
    return true;
  }


}