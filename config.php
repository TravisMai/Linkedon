<?php require_once('initialize.php') ?>
<?php

function function_alert($message)
{
    echo '<script type="text/javascript">';
    echo ' alert($message)'; //not showing an alert box.
    echo '</script>';
}


$servername = DB_SERVER;
$username = DB_USERNAME;
$password = "";


// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS OnlineStore";
if ($conn->query($sql) === TRUE) {
    //   echo "Database created successfully\n";
} else {
    //   echo "Error creating database: " . $conn->error;
}

// Select database
$conn->select_db("OnlineStore");

// Create products table
$sql = "CREATE TABLE IF NOT EXISTS products (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50) NOT NULL,
  description text NOT NULL,
  link text NULL,
  type text NOT NULL,
  price DECIMAL(10, 2) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
if ($conn->query($sql) === TRUE) {
    //   echo "Table products created successfully\n";
} else {
    //   echo "Error creating table: " . $conn->error;
}

// Create users table
$sql = "CREATE TABLE IF NOT EXISTS users (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL,
  password text NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
if ($conn->query($sql) === TRUE) {
    //   echo "Table users created successfully\n";
} else {
    //   echo "Error creating table: " . $conn->error;
}

$conn->close();
?>