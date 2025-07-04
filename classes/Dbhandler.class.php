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
    // Load database credentials from environment variables (Render-friendly)
    $this->host = getenv('DB_HOST');
    $this->user = getenv('DB_USER');
    $this->pass = getenv('DB_PASS');
    $this->db   = getenv('DB_NAME');

    // Create a new MySQL connection
    $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db);

    // Check connection
    if ($this->conn->connect_error) {
      die("Connection failed: " . $this->conn->connect_error);
    }

    // Return connection
    return $this->conn;
  }

  // Optional: getter method for accessing the connection
  public function getConnection() {
    return $this->conn;
  }
}
