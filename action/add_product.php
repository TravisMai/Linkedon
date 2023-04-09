<?php

require_once('../config.php');

// Get user input from form
$name = $_POST['name'];
$description = $_POST['description'];
$type = $_POST['type'];
$link = $_POST['link'];
$price = $_POST['price'];

// Connect to database
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert user input into database
$sql = "INSERT INTO products (name, description, type, link, price) VALUES ('$name', '$description', '$type', '$link', '$price')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
header("Location: ../index.php?page=products");
// Close database connection
$conn->close();

?>
