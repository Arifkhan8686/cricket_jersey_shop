<?php
include 'config.php'; // database connection file

// Input data from form (GET request)
$name    = $_GET['name']    ?? '';
$phone   = $_GET['phone']   ?? '';
$address = $_GET['address'] ?? '';
$team    = $_GET['team']    ?? '';
$player  = $_GET['player']  ?? '';
$number  = $_GET['number']  ?? '';
$size    = $_GET['size']    ?? '';

// Message variable
$message = "";

// Insert data only if name, phone, team are filled
if (!empty($name) && !empty($phone) && !empty($team)) {

    // Use correct column names from "orders" table
    $sql = "INSERT INTO orders (customer_name, email, product_name, total_price)
            VALUES ('$name', '$phone', '$team', '99')";

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
  font-family: 'Poppins', sans-serif;
  text-align: center;
  background: linear-gradient(180deg,#e3f2fd,#bbdefb);
  margin: 0;
  padding: 20px;
}
h2 { color: #0d47a1; }
.card {
  display: inline-block;
  padding: 20px 25px;
  margin-top: 30px;
  text-align: left;
  background: #fff;
  border-radius: 10px;
  box-shadow: 0 5px 20px rgba(0,0,0,0.1);
}
.card h3 { margin-top: 0; color: #1565c0; }
.detail { font-size: 15px; margin: 4px 0; }
.btn, .pay-btn {
  display: inline-block;
  margin-top: 25px;
  padding: 12px 28px;
  border: none;
  border-radius: 8px;
  font-weight: 600;
  color: white;
  cursor: pointer;
  text-decoration: none;
}
.pay-btn {
  background: linear-gradient(90deg,#00c853,#009624);
  font-size: 18px;
  box-shadow: 0 6px 18px rgba(0,0,0,0.1);
}
.pay-btn:hover { background: linear-gradient(90deg,#00e676,#00c853); }
.btn {
  background: linear-gradient(90deg,#1565c0,#1e88e5);
}
.btn:hover { background: linear-gradient(90deg,#1976d2,#0d47a1); }
</style>
</head>
<body>

<h2><?= htmlspecialchars($message) ?></h2>

<div class="card">
  <h3>📋 ऑर्डर विवरण</h3>
  <div class="detail"><b>नाम:</b> <?= htmlspecialchars($name) ?></div>
  <div class="detail"><b>फ़ोन:</b> <?= htmlspecialchars($phone) ?></div>
  <div class="detail"><b>टीम:</b> <?= htmlspecialchars($team) ?></div>
  <div class="detail"><b>प्लेयर:</b> <?= htmlspecialchars($player) ?></div>
  <div class="detail"><b>नंबर:</b> <?= htmlspecialchars($number) ?></div>
  <div class="detail"><b>साइज़:</b> <?= htmlspecialchars($size) ?></div>

  <!-- 💰 UPI Payment Button -->
  <?php
  $upi_id   = "iphone.shop@airtel";
  $upi_name = urlencode("Cricket Jersey Shop");
  $amount   = "99"; // Change amount as needed
  $note     = urlencode("Jersey Payment - $name");
  $upi_link = "upi://pay?pa=$upi_id&pn=$upi_name&am=$amount&tn=$note";
  ?>
  <a href="<?= $upi_link ?>" class="pay-btn">💸 अभी ₹<?= $amount ?> का भुगतान करें</a>
</div>

<a href="index.html" class="btn">⬅️ वापस जाएं</a>

</body>
</html>
