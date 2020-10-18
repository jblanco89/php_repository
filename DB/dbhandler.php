<?php
$hostname = "localhost";
$dbUsername = "root";
$dbPassword = "";
$database ="alumnos";

// Create connection
$conn = new mysqli($hostname, $dbUsername, $dbPassword, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
};
?>