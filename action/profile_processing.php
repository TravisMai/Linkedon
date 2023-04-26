<?php
session_start();
ob_start();
require_once('../config.php');

// Check if the form has been submitted
if (isset($_POST['first-name']) && isset($_POST['last-name']) && isset($_POST['phone']) && isset($_POST['email'])) {
    if(!isset($_SESSION['user_id'])){
        $_SESSION['label'] = "Invalid update";
        $_SESSION['message'] = 'Please login first!';
        header('Location: http://localhost/CO3049_WebProgramming_HK222/login.php');
        exit();
    }
    // Get the username and password from the form
    $firstName = $_POST['first-name'];
    $lastName = $_POST['last-name'];
    $phoneNumber = $_POST['phone'];
    $email = $_POST['email'];
    $address = isset($_POST['address']) ? $_POST['address'] : '';

    $_SESSION['email'] = $email;
    $_SESSION['first-name'] = $firstName;
    $_SESSION['last-name'] = $lastName;
    $_SESSION['phone'] = $phoneNumber;
    $_SESSION['address'] = $address;
      
      // Validate name
      if (preg_match('/[^a-zA-Z\x{00C0}-\x{1EF9}\x{1EBF}\x{1EED}\x{1EF7}\x{1EEB}\x{1EED}\x{1EF9}]/u', $firstName)) {
        $_SESSION['label'] = "Invalid first name";
        $_SESSION['message'] = 'Please enter a valid first name (only letters)';
        header('Location: http://localhost/CO3049_WebProgramming_HK222/index.php?page=profile');
        exit();
      }

      if (preg_match('/[^a-zA-Z\x{00C0}-\x{1EF9}\x{1EBF}\x{1EED}\x{1EF7}\x{1EEB}\x{1EED}\x{1EF9}]/u', $lastName)) {
        $_SESSION['label'] = "Invalid last name";
        $_SESSION['message'] = 'Please enter a valid last name (only letters)';
        header('Location: http://localhost/CO3049_WebProgramming_HK222/index.php?page=profile');
        exit();
      }
      
      // Check phone number
      if (preg_match('/[^0-9]/', $phoneNumber)) {
        $_SESSION['label'] = "Invalid phone number";
        $_SESSION['message'] = 'Please enter only numbers!';
        header('Location: http://localhost/CO3049_WebProgramming_HK222/index.php?page=profile');
        exit();
      }
    
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

  $sql_update_userInfo = "UPDATE users SET firstName='$firstName', lastName='$lastName', email='$email', phone='$phoneNumber', address='$address' WHERE id=$user_id";
    //Execute SQL statement
    if ($conn->query($sql_update_userInfo) === TRUE) {
        echo '<script language="javascript"> console.log("Data inserted into users table successfully!");</script>';
    } else {
        echo '<script language="javascript"> console.log("Data inserted into users table NOT successfully!");</script>';
    }
    
    //Set success message and redirect to login page
    $_SESSION['label'] = "Successful";
    $_SESSION['message'] = "Update information successfully";
    $_SESSION['updated'] = 1;
    header("Location: http://localhost/CO3049_WebProgramming_HK222/index.php?page=profile");
    exit();
  
} else {
    $_SESSION['label'] = "Invalid information";
    $_SESSION['message'] = "Add your information again!";
    header("Location: http://localhost/CO3049_WebProgramming_HK222/index.php?page=profile");
    exit();
}

?>