<?php require_once('initialize.php') ?>
<?php

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
$sql = "
    CREATE DATABASE IF NOT EXISTS co3049;
";
if ($conn->query($sql) === TRUE) {
    //   echo "Database created successfully\n";
} else {
    //   echo "Error creating database: " . $conn->error;
}

// Select database
$conn->select_db("co3049");

// Create products table
// cái type ở đây là dùng để phân ra user là jobseeker hay là nhà tuyển dụng ấy
// nên set 1 là jobseeker
// set 2 là nhà tuyển dụng
// với ai làm khúc register thì xem cách upload hình như thế nào nhá :v rồi trữ cái dường dẫn đó vào database
// file hình thì đc trữ trong folder uploads r trích ra khi xài

$sql = "
    CREATE TABLE IF NOT EXISTS `users` (
        `id` int(50) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        `firstname` varchar(250) NOT NULL,
        `lastname` varchar(250) NOT NULL,
        `username` text NOT NULL,
        `password` text NOT NULL,
        `email` text NOT NULL,
        `phone` int(10) NOT NULL,
        `avatar` text DEFAULT NULL,
        `last_login` datetime DEFAULT NULL,
        `type` tinyint(1) NOT NULL DEFAULT 0,
        `date_added` datetime NOT NULL DEFAULT current_timestamp(),
        `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
";
if ($conn->query($sql) === TRUE) {
    //   echo "Table products created successfully\n";
} else {
    //   echo "Error creating table: " . $conn->error;
}



// resume là chỉ để trữ objective thôi với dùng để phân ra thg jobseeker chỉ tạo 1 CV thôi cho dể check
// rồi từ đó mới link qua 6 table còn lại

$sql = "
CREATE TABLE IF NOT EXISTS `resume` (
    `id` int(50) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `user_id` int(50) NOT NULL,
    `objective` varchar(250) NOT NULL,
    `date_added` datetime NOT NULL DEFAULT current_timestamp(),
    `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp(),
    FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
  
";
if ($conn->query($sql) === TRUE) {
    //   echo "Table products created successfully\n";
} else {
    //   echo "Error creating table: " . $conn->error;
}


// `school` t đang để là trữ tên trường kiểu: HCMUT bla bla
// `degree`là trữ thể loại bằng cấp như: bachelor, master, diploma, doctor, PHD, ...
// `major` là trữ về chuyên ngành: Computer Science, Computer Engineering, Chemistry, ...
// có xài thì ghép 2 thg `degree` vs `major` lại thì ra kiểu: Bachelor of Computer Engineering

$sql = "
CREATE TABLE IF NOT EXISTS `education` (
    `id` int(50) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `resume_id` int(50) NOT NULL,
    `user_id` int(50) NOT NULL,
    `school` varchar(250) NOT NULL,
    `degree` varchar(250) NOT NULL,
    `major` varchar(250) NOT NULL,
    `date_added` datetime NOT NULL DEFAULT current_timestamp(),
    `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp(),
    FOREIGN KEY (`resume_id`) REFERENCES `resume`(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
  
";
if ($conn->query($sql) === TRUE) {
    //   echo "Table products created successfully\n";
} else {
    //   echo "Error creating table: " . $conn->error;
}



// khúc này thì là để trữ mấy cái chứng chỉ như IELTS 10.0 chẳng hạng :v
// nên `title` sẽ là trữ `IELTS`
// `organization` trữ `IDP` hoặc `Cambridge` 
// `value` trữ `10.0`
// `obtained_date`, `expiration_date` trữ ngày nhận đc bằng với ngày hết hạn. 
// Với những cái bằng có giá trị vĩnh viễn thì ko cần set vào `expiration_date` vì t ko set nó bắt buộc
// LƯU Ý LÀ T LẤY VÍ DỤ THÔI NHÉ CHỨ KO PHẢI TRỮ MỖI MÌNH IELTS NHÉ :)

$sql = "
CREATE TABLE IF NOT EXISTS `certificate` (
    `id` int(50) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `resume_id` int(50) NOT NULL,
    `user_id` int(50) NOT NULL,
    `title` varchar(250) NOT NULL,
    `organization` varchar(250) NOT NULL,
    `value` varchar(250) NULL,
    `obtained_date` DATE NOT NULL,
    `expiration_date` DATE,
    `date_added` datetime NOT NULL DEFAULT current_timestamp(),
    `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp(),
    FOREIGN KEY (`resume_id`) REFERENCES `resume`(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
  
";
if ($conn->query($sql) === TRUE) {
    //   echo "Table products created successfully\n";
} else {
    //   echo "Error creating table: " . $conn->error;
}


// nếu như hiểu đúng thì cái này là trữ mấy cái về skill chẳng hạn như:
// skill PHP kinh nghiệm 100 năm 2 tháng

$sql = "
CREATE TABLE IF NOT EXISTS experience (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `resume_id` int(50) NOT NULL,
    `user_id` int(50) NOT NULL,
    `experience` VARCHAR(255) NOT NULL,
    `duration_years` INT(11) NOT NULL,
    `duration_months` INT(11) NOT NULL,
    `description` TEXT,
    PRIMARY KEY (id),
    FOREIGN KEY (`resume_id`) REFERENCES `resume`(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE
  );
  
";
if ($conn->query($sql) === TRUE) {
    //   echo "Table products created successfully\n";
} else {
    //   echo "Error creating table: " . $conn->error;
}


// này là về kinh nghiệm làm việc 
// nên là khúc reference sẽ có link qua bảng này nữa nhé

$sql = "
CREATE TABLE IF NOT EXISTS `working_history` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `resume_id` int(50) NOT NULL,
    `user_id` int(50) NOT NULL,
    `position` varchar(255) NOT NULL,
    `company_name` varchar(255) NOT NULL,
    `start_date` date NOT NULL,
    `end_date` date DEFAULT NULL,
    `tasks` text NOT NULL,  
    PRIMARY KEY (id),
    FOREIGN KEY (`resume_id`) REFERENCES `resume`(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE
  );
  
";
if ($conn->query($sql) === TRUE) {
    //   echo "Table products created successfully\n";
} else {
    //   echo "Error creating table: " . $conn->error;
}

// này t set hobbie habit j đó đều ko bắt buộc cả :v nên lúc user chèn vào có cũng đc ko có cũng chả sao :v

$sql = "
CREATE TABLE IF NOT EXISTS `additional_information` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `resume_id` int(50) NOT NULL,
    `user_id` int(50) NOT NULL,
    `hobbies` TEXT,
    `habits` TEXT,
    `personal_info` TEXT,
    PRIMARY KEY (id),
    FOREIGN KEY (`resume_id`) REFERENCES `resume`(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE
  );
";
if ($conn->query($sql) === TRUE) {
    //   echo "Table products created successfully\n";
} else {
    //   echo "Error creating table: " . $conn->error;
}


// như t nói khúc `working_experience` ở trên thì `reference` này có 3 foregin key lận ấy :v
// nên là có truyền vào thì nhớ truyền cho đủ :v

$sql = "
CREATE TABLE IF NOT EXISTS `reference` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `resume_id` int(50) NOT NULL,
    `user_id` int(50) NOT NULL,
    `firstname` varchar(250) NOT NULL,
    `lastname` varchar(250) NOT NULL,
    `email` text NOT NULL,
    `phone` int(10) NOT NULL,
    `relationship` text NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (`resume_id`) REFERENCES `resume`(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE
  );
";
if ($conn->query($sql) === TRUE) {
    //   echo "Table products created successfully\n";
} else {
    //   echo "Error creating table: " . $conn->error;
}

// Delete existing data, reset id to begin with 1, then insert data again when reload page
include "database/reset_table.php";

// Open file.sql
$sql_file = fopen('database/insertdata.sql', 'r');
// Read content of file.sql
$sql = fread($sql_file, filesize('database/insertdata.sql'));
// Close file.sql
fclose($sql_file);

if ($conn->multi_query($sql) === TRUE) {
    //echo "SQL commands were executed successfully!";
} else {
    //echo "Error executing SQL commands: " . $conn->error;
}

$conn->close();
?>