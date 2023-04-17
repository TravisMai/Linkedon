<?php
include "dbconnect.php";

// Delete data from all tables
$sql_delete_users = "DELETE FROM `users`";
if ($conn->query($sql_delete_users) === TRUE) {
    //echo "users table emptied successfully";
} else {
    die("Error deleting data: " . $conn->error);
}
$sql_delete_resume = "DELETE FROM `resume`";
if ($conn->query($sql_delete_resume) === TRUE) {
    //echo "resume table emptied successfully";
} else {
    die("Error deleting data: " . $conn->error);
}
$sql_delete_education = "DELETE FROM `education`";
if ($conn->query($sql_delete_education) === TRUE) {
    //echo "education table emptied successfully";
} else {
    die("Error deleting data: " . $conn->error);
}
$sql_delete_certificate = "DELETE FROM `certificate`";
if ($conn->query($sql_delete_certificate) === TRUE) {
    //echo "certificate table emptied successfully";
} else {
    die("Error deleting data: " . $conn->error);
}
$sql_delete_experience = "DELETE FROM `experience`";
if ($conn->query($sql_delete_experience) === TRUE) {
    //echo "experience table emptied successfully";
} else {
    die("Error deleting data: " . $conn->error);
}
$sql_delete_working_history = "DELETE FROM `working_history`";
if ($conn->query($sql_delete_working_history) === TRUE) {
    //echo "working_history table emptied successfully";
} else {
    die("Error deleting data: " . $conn->error);
}
$sql_delete_additional_information = "DELETE FROM `additional_information`";
if ($conn->query($sql_delete_additional_information) === TRUE) {
    //echo "additional_information table emptied successfully";
} else {
    die("Error deleting data: " . $conn->error);
}
$sql_delete_reference = "DELETE FROM `reference`";
if ($conn->query($sql_delete_reference) === TRUE) {
    //echo "reference table emptied successfully";
} else {
    die("Error deleting data: " . $conn->error);
}

// Reset all auto increment into 0

$sql_alter_auto_increment = "ALTER TABLE `users` AUTO_INCREMENT = 1";
if ($conn->query($sql_alter_auto_increment) === TRUE) {
    //echo "alter table successfully";
} else {
    die("Error deleting data: " . $conn->error);
}
$sql_alter_auto_increment = "ALTER TABLE `resume` AUTO_INCREMENT = 1";
if ($conn->query($sql_alter_auto_increment) === TRUE) {
    //echo "alter table successfully";
} else {
    die("Error deleting data: " . $conn->error);
}
$sql_alter_auto_increment = "ALTER TABLE `education` AUTO_INCREMENT = 1";
if ($conn->query($sql_alter_auto_increment) === TRUE) {
    //echo "alter table successfully";
} else {
    die("Error deleting data: " . $conn->error);
}
$sql_alter_auto_increment = "ALTER TABLE `certificate` AUTO_INCREMENT = 1";
if ($conn->query($sql_alter_auto_increment) === TRUE) {
    //echo "alter table successfully";
} else {
    die("Error deleting data: " . $conn->error);
}
$sql_alter_auto_increment = "ALTER TABLE `experience` AUTO_INCREMENT = 1";
if ($conn->query($sql_alter_auto_increment) === TRUE) {
    //echo "alter table successfully";
} else {
    die("Error deleting data: " . $conn->error);
}
$sql_alter_auto_increment = "ALTER TABLE `working_history` AUTO_INCREMENT = 1";
if ($conn->query($sql_alter_auto_increment) === TRUE) {
    //echo "alter table successfully";
} else {
    die("Error deleting data: " . $conn->error);
}
$sql_alter_auto_increment = "ALTER TABLE `additional_information` AUTO_INCREMENT = 1";
if ($conn->query($sql_alter_auto_increment) === TRUE) {
    //echo "alter table successfully";
} else {
    die("Error deleting data: " . $conn->error);
}
$sql_alter_auto_increment = "ALTER TABLE `reference` AUTO_INCREMENT = 1";
if ($conn->query($sql_alter_auto_increment) === TRUE) {
    //echo "alter table successfully";
} else {
    die("Error deleting data: " . $conn->error);
}

?>