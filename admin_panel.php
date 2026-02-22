<?php
include 'db_connect.php';
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit;
}

$sql = "SELECT * FROM orders ORDER BY id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="hi">
<head>
<meta charset="UTF-8">
<title>ऑर्डर मैनेजमेंट पैनल</title>
<style>
  body { font-family: Arial; background: #e9f4ff; text-align: center; }
  table { margin: 20px auto; border-collapse: collapse; width: 90%; background: white; border-radius: 8px; overflow: hidden; }
  th, td { padding: 10px; border: 1px solid #ccc; }
  th { background: #007bff; color: white; }
  .delete { color: red; text-decoration: none; font-weight: bold; }
</style>
</head>
<body>
<h2>📋 ऑर्डर मैनेजमेंट पैनल</h2>
<a href="logout.php">🔐 लॉगआउट करें</a>
<table>
<tr>
  <th>ID</th>
  <th>नाम</th>
  <th>नंबर</th>
  <th>पता</th>
  <th>टीम</th>
  <th>खिलाड़ी</th>
  <th>जर्सी नंबर</th>
  <th>आकार</th>
  <th>डिलीट</th>
</tr>

<?php
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>{$row['id']}</td>
        <td>{$row['name']}</td>
        <td>{$row['phone']}</td>
        <td>{$row['address']}</td>
        <td>{$row['team']}</td>
        <td>{$row['player']}</td>
        <td>{$row['number']}</td>
        <td>{$row['size']}</td>
        <td><a class='delete' href='delete_order.php?id={$row['id']}'>❌ Delete</a></td>
        </tr>";
    }
} else {
    echo "<tr><td colspan='9'>⚠️ कोई ऑर्डर नहीं मिला</td></tr>";
}
$conn->close();
?>
</table>
</body>
</html>
