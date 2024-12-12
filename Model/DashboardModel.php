<?php
require_once (__dir__ . '/Db.php');
class DashboardModel extends Db {

  public function getNews() :array {
    $this->query("SELECT * FROM `news` ORDER BY `id` DESC");
    $this->execute();

    $News = $this->fetchAll();

    if( count($News) > 0 ) {
      $Response = array(
        'status' => true,
        'data' => $News,
      );
      return $Response;
    }

    $Response = array(
      'status' => false,
      'data' => [],
    );
    return $Response;
  }




}