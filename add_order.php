<?php
include('config.php'); // Database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name   = $_POST['name'];
    $number = $_POST['number'];
    $design = $_POST['design'];

    // Insert data into database
    $sql = "INSERT INTO orders (name, number, design) VALUES ('$name', '$number', '$design')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('✅ Order successfully added!'); window.location.href='admin_panel.php';</script>";
    } else {
        echo "❌ Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="hi">
<head>
    <meta charset="UTF-8">
    <title>नया ऑर्डर जोड़ें</title>
    <style>
        body { font-family: Arial; margin: 40px; background-color: #f4f4f4; }
        form { background: white; padding: 20px; border-radius: 10px; width: 300px; }
        input, button { margin: 8px 0; padding: 8px; width: 100%; }
        button { background: green; color: white; border: none; cursor: pointer; }
        button:hover { background: darkgreen; }
        a { text-decoration: none; color: blue; }
    </style>
</head>
<body>

<h2>🆕 नया ऑर्डर जोड़ें</h2>
<form method="POST">
    <label>नाम:</label>
    <input type="text" name="name" required>

    <label>नंबर:</label>
    <input type="text" name="number" required>

    <label>डिज़ाइन:</label>
    <input type="text" name="design" required>

    <button type="submit">ऑर्डर जोड़ें</button>
</form>

<br>
<a href="admin_panel.php">⬅ वापस जाएं</a>

</body>
</html>
