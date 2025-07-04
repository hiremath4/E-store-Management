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
    // default XAMPP credentials 
    $this->host = getenv('DB_HOST'); // ✅ instead of '127.0.0.1'
$this->user = getenv('DB_USER');
$this->pass = getenv('DB_PASS');
$this->db   = getenv('DB_NAME');

    // connect to db
    $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db);
    return $this->conn;

    /* check connection */
    if (!$this->conn) 
      die("Connection failed: " . mysqli_connect_error());
  }

  public function conn() {
    // connect to db
    $this->conn = new mysqli("https://e-store-management.onrender.com/", "root", "", "ogtech");
    return $this->conn;

    /* check connection */
    if (!$this->conn) 
      die("Connection failed: " . mysqli_connect_error());
  }
}
