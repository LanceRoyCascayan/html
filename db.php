<?php
$host = "localhost";
$user = "root";    // your DB Username
$password = "";   // your DB Username
$database = "marketplace";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
	die("connection failed: " . $conn->connect_error);
}
?>