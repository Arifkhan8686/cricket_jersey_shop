<?php
include('config.php'); // database connection file

$name    = $_GET['name']    ?? '';
$phone   = $_GET['phone']   ?? '';
$address = $_GET['address'] ?? '';
$team    = $_GET['team']    ?? '';
$player  = $_GET['player']  ?? '';
$number  = $_GET['number']  ?? '';
$size    = $_GET['size']    ?? '';

if (!empty($name) && !empty($phone) && !empty($team)) {
    $sql = "INSERT INTO orders (name, phone, address, team, player, number, size)
            VALUES ('$name', '$phone', '$address', '$team', '$player', '$number', '$size')";
    if ($conn->query($sql) === TRUE) {
        $message = "✅ आपका ऑर्डर सफलतापूर्वक दर्ज हो गया!";
    } else {
        $message = "❌ Error: " . $conn->error;
    }
} else {
    $message = "⚠️ कृपया सभी आवश्यक जानकारी भरें।";
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
    background: linear-gradient(180deg,#e3f2fd,#bbdefb);
    margin: 0;
    padding: 30px;
  }
  h2 { color: #2e7d32; }
  .card {
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 6px 20px rgba(0,0,0,0.1);
    display: inline-block;
    padding: 20px 25px;
    margin-top: 30px;
    text-align: left;
  }
  .card h3 { margin-top: 0; color: #1565c0; }
  .detail {
    font-size: 15px;
    margin: 4px 0;
  }
  .btn {
    display: inline-block;
    margin-top: 20px;
    padding: 10px 20px;
    background: linear-gradient(90deg,#0b65d3,#0066cc);
    color: #fff;
    border: none;
    border-radius: 8px;
    text-decoration: none;
    font-weight: 600;
  }
  .btn:hover { background: linear-gradient(90deg,#0a5bc5,#004fb8); }

  .pay-btn {
    background: linear-gradient(90deg,#00c853,#009624);
    padding: 14px 32px;
    border-radius: 10px;
    font-size: 18px;
    color: white;
    border: none;
    cursor: pointer;
    margin-top: 25px;
    box-shadow: 0 6px 18px rgba(0,0,0,0.1);
  }
  .pay-btn:hover {
    background: linear-gradient(90deg,#00b248,#007e33);
  }
</style>
</head>
<body>

  <h2><?= $message ?></h2>

  <div class="card">
    <h3>🧾 Order Details</h3>
    <div class="detail"><b>नाम:</b> <?= htmlspecialchars($name) ?></div>
    <div class="detail"><b>फोन:</b> <?= htmlspecialchars($phone) ?></div>
    <div class="detail"><b>पता:</b> <?= htmlspecialchars($address) ?></div>
    <div class="detail"><b>टीम:</b> <?= htmlspecialchars($team) ?></div>
    <div class="detail"><b>खिलाड़ी:</b> <?= htmlspecialchars($player) ?></div>
    <div class="detail"><b>जर्सी नंबर:</b> <?= htmlspecialchars($number) ?></div>
    <div class="detail"><b>साइज़:</b> <?= htmlspecialchars($size) ?></div>

    <!-- 💰 UPI Payment Button -->
    <?php
      // Dynamic UPI Payment Link
      $upi_id = "iphone.shop@airtel";
      $upi_name = urlencode("Cricket Jersey Shop");
      $amount = "99"; // change amount as needed
      $note = urlencode("Jersey Payment - $name");

      $upi_link = "upi://pay?pa=$upi_id&pn=$upi_name&am=$amount&cu=INR&tn=$note";
    ?>

    <a href="<?= $upi_link ?>" class="pay-btn">💰 अभी ₹<?= $amount ?> पेमेंट करें</a>
  </div>

  <a href="index.html" class="btn">⬅️ वापस जाएं</a>

</body>
</html>
