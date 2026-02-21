<?php
include('config.php'); // database connection file

// Get form data (from GET method)
$name    = $_GET['name']    ?? '';
$phone   = $_GET['phone']   ?? '';
$address = $_GET['address'] ?? '';
$team    = $_GET['team']    ?? '';
$player  = $_GET['player']  ?? '';
$number  = $_GET['number']  ?? '';
$size    = $_GET['size']    ?? '';

// Insert data into database
if (!empty($name) && !empty($phone) && !empty($team)) {
    $sql = "INSERT INTO orders (name, phone, address, team, player, number, size)
            VALUES ('$name', '$phone', '$address', '$team', '$player', '$number', '$size')";
    if ($conn->query($sql) === TRUE) {
        $message = "✅ आपका ऑर्डर सफलतापूर्वक दर्ज हो गया!";
    } else {
        $message = "❌ Error: " . $conn->error;
    }
} else {
    $message = "⚠️ कृपया सभी आवश्यक जानकारी भरें!";
}
?>

<!DOCTYPE html>
<html lang="hi">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>पेमेंट पेज</title>
<style>
body {
    font-family: "Poppins", sans-serif;
    text-align: center;
    background: linear-gradient(180deg, #e3f2fd, #bbdefb);
}
.card {
    display: inline-block;
    padding: 20px 25px;
    margin-top: 30px;
    text-align: left;
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 6px 18px rgba(0,0,0,0.1);
}
.card h3 { margin-top: 0; color: #1565c0; }
.detail { font-size: 15px; margin: 4px 0; }

.btn, .pay-btn {
    display: inline-block;
    margin-top: 25px;
    padding: 12px 25px;
    border-radius: 10px;
    border: none;
    font-weight: 600;
    color: white;
    cursor: pointer;
    text-decoration: none;
}
.btn {
    background: linear-gradient(90deg, #0b65d3, #0066cc);
}
.pay-btn {
    background: linear-gradient(90deg, #00c853, #009624);
}
.btn:hover, .pay-btn:hover {
    opacity: 0.9;
}
</style>
</head>
<body>

<h2><?= $message ?></h2>

<div class="card">
    <h3>📋 ऑर्डर विवरण</h3>
    <div class="detail"><b>नाम:</b> <?= htmlspecialchars($name) ?></div>
    <div class="detail"><b>फ़ोन:</b> <?= htmlspecialchars($phone) ?></div>
    <div class="detail"><b>पता:</b> <?= htmlspecialchars($address) ?></div>
    <div class="detail"><b>टीम:</b> <?= htmlspecialchars($team) ?></div>
    <div class="detail"><b>प्लेयर:</b> <?= htmlspecialchars($player) ?></div>
    <div class="detail"><b>जर्सी नंबर:</b> <?= htmlspecialchars($number) ?></div>
    <div class="detail"><b>साइज़:</b> <?= htmlspecialchars($size) ?></div>

    <?php
    // 🪙 Dynamic UPI Payment Button
    $upi_id = "iphone.shop@airtel";
    $upi_name = urlencode("Cricket Jersey Shop");
    $amount = "99"; // change as needed
    $note = urlencode("Jersey Payment - $name");

    $upi_link = "upi://pay?pa=$upi_id&pn=$upi_name&am=$amount&tn=$note";
    ?>
    
    <a href="<?= $upi_link ?>" class="pay-btn">💰 अभी ₹<?= $amount ?> पे करें</a>
</div>

<a href="index.html" class="btn">⬅️ वापस जाएं</a>

</body>
</html>
