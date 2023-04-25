<?php
session_start();
ob_start();
require_once('../config.php');
  
  // Connect to the database
  $servername = "localhost";
  $password_db = "";
  $dbname = "co3049";
  $conn = new mysqli($servername, "root", $password_db, $dbname);

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  $user_id = $_SESSION['user_id'];

// Prepare SQL statement
$sql = "SELECT firstname, lastname, email, phone FROM users WHERE id = $user_id";

// Execute SQL statement
$result = $conn->query($sql);

// Check if any rows returned
if ($result->num_rows > 0) {
    // Loop through each row
    while ($row = $result->fetch_assoc()) {
        $firstName = $row["firstname"];
        $lastName = $row["lastname"];
        $email = $row["email"];
        $phoneNumber = $row["phone"];
        // Do something with the retrieved values
    }
} else {
    header('Location: http://localhost/CO3049_WebProgramming_HK222/index.php?page=profile');
    exit();
}
    
    //Set success message and redirect to login page
    $_SESSION['email'] = $email;
    $_SESSION['first-name'] = $firstName;
    $_SESSION['last-name'] = $lastName;
    $_SESSION['phone'] = $phoneNumber;
    $_SESSION['updated'] = 1;
    header('Location: http://localhost/CO3049_WebProgramming_HK222/index.php?page=profile');
    exit();

?>