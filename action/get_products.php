<?php
require_once('../config.php');

// Check if the connection was successful
header('Content-Type: text/xml');
echo '<?xml version="1.0" encoding="UTF-8"?>';
echo '<products>';
$servername = DB_SERVER;
$username = DB_USERNAME;
$password = DB_PASSWORD;
$dbname = DB_NAME;
$conn = new mysqli($servername, $username, $password, $dbname);
$products = $conn->query("SELECT * FROM products");
while ($row = $products->fetch_assoc()) {
    echo '<product>';
    echo '<name>' . $row['name'] . '</name>';
    echo '<type>' . $row['type'] . '</type>';
    echo '<description>' . $row['description'] . '</description>';
    echo '<link>' . $row['link'] . '</link>';
    echo '</product>';
}
echo '</products>';
?>
