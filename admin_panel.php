<?php
session_start();
include('config.php');

if (!isset($_SESSION['logged_in'])) {
    header("Location: admin_login.html");
    exit;
}
?>

<?php
session_start();
include('config.php');

// अगर login नहीं है तो redirect
if (!isset($_SESSION['logged_in'])) {
    header("Location: admin_login.html");
    exit();
}

// Delete order if requested
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $conn->query("DELETE FROM orders WHERE id=$id");
}

// Fetch all orders
$result = $conn->query("SELECT * FROM orders ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="hi">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ऑर्डर मैनेजमेंट पैनल</title>
<style>
  body {
    font-family: "Poppins", sans-serif;
    background: linear-gradient(180deg, #e3f2fd, #bbdefb);
    margin: 0;
    padding: 20px;
  }
  h1 {
    color: #0d47a1;
    text-align: center;
    margin-bottom: 10px;
  }
  .links {
    text-align: center;
    margin-bottom: 25px;
  }
  .links a {
    text-decoration: none;
    color: #1565c0;
    font-weight: 600;
    margin: 0 10px;
  }
  .links a:hover {
    color: #0d47a1;
  }
  table {
    width: 95%;
    margin: 0 auto;
    border-collapse: collapse;
    background: #fff;
    box-shadow: 0 6px 18px rgba(0,0,0,0.08);
    border-radius: 10px;
    overflow: hidden;
  }
  th, td {
    border-bottom: 1px solid #ddd;
    text-align: center;
    padding: 10px 8px;
  }
  th {
    background-color: #1976d2;
    color: white;
    font-weight: 600;
  }
  tr:hover {
    background-color: #f1f8ff;
  }
  .delete-btn {
    color: #d32f2f;
    text-decoration: none;
    font-weight: 600;
  }
  .delete-btn:hover {
    color: #b71c1c;
  }
</style>
</head>
<body>

<h1>📋 ऑर्डर मैनेजमेंट पैनल</h1>

<div class="links">
  <a href="new_order.php">🆕 नया ऑर्डर जोड़ें</a> |
  <a href="logout.php">🚪 लॉगआउट करें</a>
</div>

<table>
  <tr>
    <th>ID</th>
    <th>नाम</th>
    <th>नंबर</th>
    <th>पता</th>
    <th>टीम</th>
    <th>खिलाड़ी</th>
    <th>जर्सी नंबर</th>
    <th>साइज़</th>
    <th>एक्शन</th>
  </tr>
  <?php while ($row = $result->fetch_assoc()) { ?>
    <tr>
      <td><?= htmlspecialchars($row["id"]) ?></td>
      <td><?= htmlspecialchars($row["name"]) ?></td>
      <td><?= htmlspecialchars($row["phone"]) ?></td>
      <td><?= htmlspecialchars($row["address"]) ?></td>
      <td><?= htmlspecialchars($row["team"]) ?></td>
      <td><?= htmlspecialchars($row["player"]) ?></td>
      <td><?= htmlspecialchars($row["number"]) ?></td>
      <td><?= htmlspecialchars($row["size"]) ?></td>
      <td><a class="delete-btn" href="?delete=<?= $row["id"] ?>">❌ Delete</a></td>
    </tr>
  <?php } ?>
</table>

</body>
</html>
