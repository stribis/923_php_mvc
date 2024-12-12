<?php
class Db {
  protected $dbName = '923_example';
  protected $dbHost = 'localhost';
  protected $dbUser = 'root';
  protected $dbPass = '';

  protected $dbHandler, $dbStmt;

  public function __construct() {
    $Dsn = 'mysql:host=' . $this->dbHost . ';dbname=' . $this->dbName;
    $Options = array(
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_PERSISTENT => true
    );

    try {
      $this->dbHandler = new PDO($Dsn, $this->dbUser, $this->dbPass, $Options);
    } catch (Exception $e) {
      var_dump("Couldn't establish connection: " . $e->getMessage());
    }
  }

  /**
   * @param string SQL Query from Model
   * @return void
   * @desc Creates PDO statement object
   */
  public function query($query) {
    $this->dbStmt = $this->dbHandler->prepare($query);
  }

  public function bind($param, $value, $type = null) {

    if( is_null($type) ) {
      switch(true) {
        case is_int($value):
          $type = PDO::PARAM_INT;
          break;
        case is_bool($value):
          $type = PDO::PARAM_BOOL;
          break;
        case is_null($value):
          $type = PDO::PARAM_NULL;
          break;
        default:
          $type = PDO::PARAM_STR;
          break;
      }
    }

    $this->dbStmt->bindValue($param, $value, $type);
  }

  public function execute() {
    $this->dbStmt->execute();
    return true;
  }

  public function fetch() {
    $this->execute();
    return $this->dbStmt->fetch(PDO::FETCH_ASSOC);
  }

  public function fetchAll() {
    $this->execute();
    return $this->dbStmt->fetchAll(PDO::FETCH_ASSOC);
  }

}