<?php
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $number = $_POST['number'];
    $address = $_POST['address'];

    // SQL insert
    $sql = "INSERT INTO orders (name, number, design) VALUES ('$name', '$number', '$address')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('✅ Order successfully submitted!'); window.location.href='index.html';</script>";
    } else {
        echo "❌ Error: " . $conn->error;
    }
}
?>
