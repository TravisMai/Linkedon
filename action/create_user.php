<?php
require_once('../config.php');

// Check if the form has been submitted
if (isset($_POST['username']) && isset($_POST['password'])) {
    // Get the username and password from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Connect to the database
    $dsn = 'mysql:host=localhost;dbname=OnlineStore';
    $dbname = 'root';
    $dbpass = '';
    $options = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    );
    try {
        $pdo = new PDO($dsn, $dbname, $dbpass, $options);
    } catch (PDOException $e) {
        die('Connection failed: ' . $e->getMessage());
    }

    // Check if the username already exists in the database
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user) {
        // Username already exists, show an error message
        echo "<script>alert('Username already exists');</script>";
    } else {
        // Username doesn't exist, insert the user into the database
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$username, $hashed_password]);
        $_SESSION['label'] = "Successful";
        $_SESSION['message'] = "Sign Up Successful";
        // Redirect the user to the login page
        header('Location: ../index.php?page=Login');
        exit();
    }
}

?>