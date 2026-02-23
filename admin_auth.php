<?php
session_start();
include('config.php'); // Database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // username से data निकालो
    $sql = "SELECT * FROM admin WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // hashed password verify करो
        if (password_verify($password, $row['password'])) {
            $_SESSION['logged_in'] = true;
            header("Location: admin_panel.php");
            exit;
        } else {
            echo "<script>alert('❌ गलत पासवर्ड!'); window.location.href='admin_login.php';</script>";
        }
    } else {
        echo "<script>alert('❌ गलत यूज़रनेम!'); window.location.href='admin_login.php';</script>";
    }
}
?>
