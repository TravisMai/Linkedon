<?php
session_start();
ob_start();
require_once('../config.php');

// Check if the form has been submitted
if (isset($_POST['username']) && isset($_POST['password'])) {
    // Get the username and password from the form
    $username = $_POST['username'];
    $password = $_POST['password'];
    $typeUser = $_POST['typeUser'];
    $email = $_POST['email'];
    $confirm_password = $_POST['confirm_password'];
    $_SESSION['email'] = $email;
    $_SESSION['username'] = $username;

    // Validate password
    if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[.$@$!%*?&])[A-Za-z\d.$@$!%*?&]{8,}$/', $password)) {
        $_SESSION['label'] = "Invalid signup";
        $_SESSION['message'] = 'Password must have 8 letters and contain at least one lowercase letter, one uppercase letter, one number, and one special character.';
        header('Location: ../register.php');
        exit();
      }
      
      // Validate username
      if (preg_match('/[^a-zA-Z0-9]/', $username)) {
        $_SESSION['label'] = "Invalid signup";
        $_SESSION['message'] = 'Username cannot contain special characters!';
        echo "<script>console.log('Username cannot contain special characters!');</script>";
        header('Location: ../register.php');
        exit();
      }
      
      // Check if passwords match
      if ($password !== $confirm_password) {
        $_SESSION['label'] = "Invalid signup";
        $_SESSION['message'] = 'Confirm password must be the same as password!';
        echo "<script>console.log('Confirm password must be the same as password!');</script>";
        header('Location: ../register.php');
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

  // Prepare and execute SELECT statement to check for matching username or email
  $stmt = $conn->prepare("SELECT COUNT(*) as count FROM users WHERE username = ? OR email = ?");
  $stmt->bind_param("ss", $username, $email);
  $stmt->execute();
  
  // Fetch result from SELECT statement
  $result = $stmt->get_result();
  $row = $result->fetch_assoc();

  // Check if count is 0 (i.e. username and email are unique) and return boolean value
  if ($row['count'] != 0){
    echo '<script language="javascript">console.log("Username already exists");</script>';
    $_SESSION['label'] = "Invalid signup";
    $_SESSION['message'] = "Username or email already exists";
    header('Location: ../register.php');
    exit();
  }
  else{

    $password_hashed = password_hash($password, PASSWORD_DEFAULT);

    $sql_insert_users = "INSERT INTO users (username, email, password, type)
    VALUES ('$username', '$email', '$password_hashed', '$typeUser')";
    //Execute SQL statement
    if ($conn->query($sql_insert_users) === TRUE) {
        echo '<script language="javascript"> console.log("Data inserted into users table successfully!");</script>';
    } else {
        echo '<script language="javascript"> console.log("Data inserted into users table NOT successfully!");</script>';
    }
    
    //Set success message and redirect to login page
    $stmt = $conn->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $user_id = $row['id'];

    $_SESSION['user_id'] = $user_id;
    $_SESSION['user_name'] = $username;
    $_SESSION['label'] = "Successful";
    $_SESSION['message'] = "Signup Successful";

    // Set cookie
    $cookie_value = $username . "_" . uniqid();
    setcookie("user_cookie", $cookie_value, time() + (86400 * 30), "/"); // 30 days

    header('Location: ../index.php');
    exit();
  }
} else {
    $_SESSION['label'] = "Invalid register";
    $_SESSION['message'] = "Signup again";
    header("Location: ../register.php");
    exit();
}

?>