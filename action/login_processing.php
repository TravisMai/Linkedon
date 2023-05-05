<?php
session_start();
include '../config.php'; // contains the database connection settings

$host = 'localhost';
$dbname = 'co3049';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}

// Check if username and password are submitted
if (isset($_POST['username']) && isset($_POST['password'])) {

    // Validate username and password
    $username = filter_var($_POST['username'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        // function_alert("Please enter username and password");
        $_SESSION['label'] = "Missing login information";
        $_SESSION['message'] = "Please enter username and password";
        header("Location: ../login.php");
        exit();
    }

    // Retrieve user record from database
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verify password
    if (!password_verify($password, $user['password'])) {
        // function_alert("Wrong password");
        $_SESSION['label'] = "Invalid login";
        $_SESSION['message'] = "Incorrect username or password";
        header("Location: ../login.php");
        exit();
    } else {
        // Set session variables
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['username'];
        $_SESSION['type'] = $user['type'];
        $_SESSION['label'] = "Successful";
        $_SESSION['message'] = "Login successful";

        // Set cookie
        $cookie_value = $username . "_" . uniqid();
        setcookie("user_cookie", $cookie_value, time() + (86400 * 30), "/"); // 30 days


        // Redirect to dashboard
        header("Location: ../index.php");
        exit();
    }
} else {
    $_SESSION['label'] = "Invalid login";
    $_SESSION['message'] = "Incorrect username or password";
    header("Location: ../login.php");
    exit();
}
?>