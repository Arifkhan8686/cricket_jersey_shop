<?php
session_start();
include('config.php'); // Database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $_SESSION['logged_in'] = true;
        header("Location: admin_panel.php");
        exit;
    } else {
        echo "<script>alert('❌ गलत यूज़रनेम या पासवर्ड!'); window.location.href='admin_login.html';</script>";
    }
}
?>
