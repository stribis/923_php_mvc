
<?php
require_once(__dir__ . '/Controller.php');
require_once ('./Model/LoginModel.php');
  class Login extends Controller {

    public $active = 'Login';
    private $loginModel;
    public function __construct(){
      if (isset($_SESSION['auth_status'])) header("Location: dashboard.php");
      $this->loginModel = new LoginModel();
    }

    public function login($data) {
      $email = stripslashes(strip_tags($data['email']));
      $password = stripslashes(strip_tags($data['password']));

      $EmailRecords = $this->loginModel->fetchEmail($email);

      if ($EmailRecords['status']) {
        if (password_verify($password, $EmailRecords['data']['password'])) {
          $Response = array(
            'status' => true,
          );

          $_SESSION['auth_status'] = true;
          header('Location: dashboard.php');
        }
        $Response = array(
          'status' => false
        );
        return $Response;
      }
      $Response = array(
        'status' => false
      );
      return $Response;
    }


  }