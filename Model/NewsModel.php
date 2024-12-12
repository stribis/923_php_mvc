<?php

require_once (__dir__ . '/Db.php');
class NewsModel extends Db {

  public function createNews(array $news) :array {
    $this->query("INSERT INTO `news` (title, content) VALUES (:title, :content)");
    $this->bind("title", $news["title"]);
    $this->bind("content", $news["content"]);

    if($this->execute()) {
      $Response = array(
        'status' => true,
      );
      return $Response;
    } else {
      $Response = array(
        'status' => false,
      );
      return $Response;
    }

  }


}