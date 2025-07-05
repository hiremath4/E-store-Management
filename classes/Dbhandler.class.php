<?php 

class Dbhandler {
  private $host;
  private $user;
  private $pass;
  private $db;
  public $conn;

  public function __construct() {
    $this->connect();
  }

  private function connect() {
    // Use environment variables instead of hardcoding
    $this->host = getenv('DB_HOST');
    $this->user = getenv('DB_USER');
    $this->pass = getenv('DB_PASS');
    $this->db   = getenv('DB_NAME');

    // Create connection
    $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db);

    // Check connection
    if ($this->conn->connect_error) {
      die("Connection failed: " . $this->conn->connect_error);
    }

    return $this->conn;
  }

  public function getConnection() {
    return $this->conn;
  }
}
