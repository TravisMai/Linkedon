<?php require_once('initialize.php') ?>
<?php

$servername = DB_SERVER;
$username = DB_USERNAME;
$password = "";
$dbname = DB_NAME;

// Create connection
$conn = new mysqli($servername, $username, $password);

$conn->select_db($dbname);
/*
// Open file.sql
$sql_file = fopen('functions.sql', 'r');
// Read content of file.sql
$sql = fread($sql_file, filesize('functions.sql'));
// Close file.sql
fclose($sql_file);

if ($conn->multi_query($sql) === TRUE) {
    //echo "SQL commands were executed successfully!";
} else {
    //echo "Error executing SQL commands: " . $conn->error;
}*/
?>