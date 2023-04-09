<?php
require_once('../config.php');

if (isset($_POST['query'])) {
    $conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    $query = $_POST['query'];
    $products = $conn->query("SELECT * FROM products WHERE name LIKE '%$query%' OR type LIKE '%$query%' OR description LIKE '%$query%'");
    if ($products->num_rows > 0) {
        while ($row = $products->fetch_assoc()) {
            echo '<a href="' . $row['link'] . '" class="list-group-item list-group-item-action">' . $row['name'] . '</a>';
        }
    } else {
        echo '<div class="list-group-item">No results found.</div>';
    }
}
?>