
<?php
require_once(__dir__ . '/Controller.php');
require_once ('./Model/DashboardModel.php');
  class Dashboard extends Controller {

    public $active = 'Dashboard';
    private $dashboardModel;
    public function __construct(){
      // Safe Zone
      if (!isset($_SESSION['auth_status'])) header('Location: index.php');
      $this->dashboardModel = new DashboardModel();
    }

    function getNews() :array {
      return $this->dashboardModel->getNews();
    }



  }