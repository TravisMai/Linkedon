<?php require_once('initialize.php') ?>
<?php

$servername = DB_SERVER;
$username = DB_USERNAME;
$password = "";
$dbname = DB_NAME;

// Create connection
$conn = new mysqli($servername, $username, $password);

$conn->select_db($dbname);
?>