<?php
// db_update.php
// WARNING: Run this once and then delete the file (it drops/creates the orders table).

$host = "containers-us-west-123.railway.app";   // तुम्हारे DB host (railway पर जो host दिखता है)
$user = "root";                                 // username (जैसा तुम्हारे UI में है)
$pass = "dFOgFeZLlSgmftxbvmGPGeWrPoukmSXB";     // तुम्हारा root पासवर्ड (जो तुमने बताया)
$dbname = "railway";                            // database name (Railway का default)
$port = 3306;                                   // port

$conn = new mysqli($host, $user, $pass, $dbname, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected to DB successfully.<br>";

// IMPORTANT: This will DROP the orders table if it exists, then create it.
$sql = "
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(100),
  `phone` VARCHAR(20),
  `address` TEXT,
  `team` VARCHAR(50),
  `player` VARCHAR(50),
  `number` VARCHAR(10),
  `size` VARCHAR(10),
  `product_name` VARCHAR(255),
  `quantity` INT,
  `total_price` DECIMAL(10,2),
  `order_date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
";

if ($conn->multi_query($sql)) {
    echo "orders table created successfully.<br>";
    // flush remaining results
    while ($conn->more_results()) { $conn->next_result(); }
} else {
    echo "Error executing query: " . $conn->error;
}

$conn->close();
echo "<br>Script finished. **Delete this file after use.**";
?>
