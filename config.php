<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$database = "cricket_jersey_shop";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Database Connection Failed: " . $conn->connect_error);
}
?>
