<?php

require_once (__dir__ . '/Db.php');
class LoginModel extends Db {


  public function fetchEmail(string $email) :array {
    $this->query("SELECT * FROM `users` WHERE email = :email");
    $this->bind("email", $email);
    $this->execute();

    $Email = $this->fetch();
    if (!empty($email)) {
      $Response = array(
        'status' => true,
        'data' => $Email
      );
      return $Response;
    }

    if (empty($Email)) {
      $Response = array(
      'status' => false,
      'data' => $Email
      );
      return $Response;
    }

  }

}