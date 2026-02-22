<?php
$host = "containers-us-west-123.railway.app";
$user = "root";
$pass = "dFOgFeZLlSgmftxbvmGPGeWrPoukmSXB";
$dbname = "railway";
$port = 3306;

$conn = new mysqli($host, $user, $pass, $dbname, $port);

if ($conn->connect_error) {
    die("❌ Connection failed: " . $conn->connect_error);
}

echo "✅ Connected Successfully<br>";

$sql = "
DROP TABLE IF EXISTS orders;
CREATE TABLE orders (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  phone VARCHAR(20),
  address TEXT,
  team VARCHAR(50),
  player VARCHAR(50),
  number VARCHAR(10),
  size VARCHAR(10)
);
";

if ($conn->multi_query($sql)) {
    echo "✅ orders table recreated successfully!";
} else {
    echo '❌ Error: ' . $conn->error;
}

$conn->close();
?>
