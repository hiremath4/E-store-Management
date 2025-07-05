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
    // Use environment variables with defaults
    $this->host = getenv('DB_HOST') ?: 'db';         // ← 'db' is the docker-compose MySQL service name
    $this->user = getenv('DB_USER') ?: 'user';
    $this->pass = getenv('DB_PASS') ?: 'pass';
    $this->db   = getenv('DB_NAME') ?: 'ogtech';

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
