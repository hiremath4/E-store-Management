<?php
$host = 'db';
$db = 'ogtech';
$user = 'user';
$pass = 'pass';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
