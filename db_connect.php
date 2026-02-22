<?php
$servername = "hopper.proxy.rlwy.net";
$username = "render_user";
$password = "Render@123";
$dbname = "railway";
$port = 11176;

$conn = new mysqli($servername, $username, $password, $dbname, $port);

if ($conn->connect_error) {
    die("❌ Connection failed: " . $conn->connect_error);
}
?>
