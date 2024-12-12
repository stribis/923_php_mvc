
<?php
require_once(__dir__ . '/Controller.php');
require_once ('./Model/RegisterModel.php');
  class Register extends Controller {

    public $active = 'Register';
    private $registerModel;
    public function __construct(){
      if (isset($_SESSION['auth_status'])) header("Location: dashboard.php");
      $this->registerModel = new RegisterModel();
    }

    public function register($data) {
      // Clean Data
      $name = stripslashes(strip_tags($data['name']));
      $email = stripslashes(strip_tags($data['email']));
      $password = stripslashes(strip_tags($data['password']));

      $EmailStatus = $this->registerModel->fetchUser($email)['status'];

      // Validate Data
      $Error = array(
        'name' => '',
        'email' => '',
        'password' => '',
      );

      if( strlen($name) < 5) {
        $Error['name'] = 'Please enter your name';
        return $Error;
      }

      if( strlen($email) < 5) {
        $Error['email'] = 'Please enter your email';
        return $Error;
      }

      if (!empty($EmailStatus)) {
        $Error['email'] = 'Email is already registered';
        return $Error;
      }

      if ( strlen($password) < 5) {
        $Error['password'] = 'Please enter your password';
        return $Error;
      }

      // Handle Data

      $Payload = array(
        'name' => $name,
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT)
      );

      $Response = $this->registerModel->createUser($Payload);

      if(!$Response['status']) {
        $Response['status'] = 'Sorry, something went wrong';
        return $Response;
      }

      // LOG IN THE USER
      //$_SESSION['data']
      $_SESSION['auth_status'] = true;
      header('Location: dashboard.php');
      return true;

    }


  }