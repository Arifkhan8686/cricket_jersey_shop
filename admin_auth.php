<?php
session_start();
include('config.php'); // Database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Query to find username
    $sql = "SELECT * FROM admin WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // If user found
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        // Verify password (hashed)
        if (password_verify($password, $row['password'])) {
            $_SESSION['logged_in'] = true;
            header("Location: admin_panel.php");
            exit;
        } else {
            echo "<script>alert('❌ गलत पासवर्ड!'); window.location.href='admin_login.php';</script>";
        }
    } else {
        echo "<script>alert('⚠️ यूज़रनेम नहीं मिला!'); window.location.href='admin_login.php';</script>";
    }
}
?>
