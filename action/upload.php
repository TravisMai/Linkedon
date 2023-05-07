
<?php
    session_start();
    ob_start();
    require_once('../config.php');

        // Check if file was uploaded without errors
        if(isset($_FILES["avatar"]) && $_FILES["avatar"]["error"] == 0) {
            
            $user_id = $_SESSION['user_id'];
            $user_name = $_SESSION['user_name'];
            
            // Specify the directory where the uploaded file will be stored
            $uploadDir = '../uploads/';
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            // Get the extension of the uploaded file
            $fileExt = pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION);

            // Set the filename to the user's ID with the extension of the uploaded file
            $fileName = $user_name . '.' . $fileExt;

            // Set the path where the file will be saved
            $targetFilePath = $uploadDir . $fileName;
            $savedFilePath = 'uploads/'. $fileName;
            // // Check if the file already exists in the directory
            // if(file_exists($targetFilePath)) {
            //     echo "File already exists. ";
            //     echo $targetFilePath;
            //     //header('Location: ../index.php?page=profile');
            //     exit();   
            // } else{
                // Move the uploaded file to the specified directory
                if(move_uploaded_file($_FILES["avatar"]["tmp_name"], $targetFilePath)) {
                    echo "The file ".$fileName. " has been uploaded.";
                    
                    // Save the path of the uploaded file to MySQL
                    $dbHost = 'localhost:3307';
                    $dbUsername = 'root';
                    $dbPassword = '';
                    $dbName = 'co3049';
                    
                    $conn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);
                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }
                    $path = mysqli_real_escape_string($conn, $savedFilePath);
                    $sql = "UPDATE users SET avatar = '$path' WHERE id = $user_id";
                    if (mysqli_query($conn, $sql)) {
                        echo "Path saved to MySQL successfully.";
                        mysqli_close($conn);
                        $_SESSION['setup'] = 0;
                        header('Location: ../index.php?page=profile');
                        exit();
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                    mysqli_close($conn);
                    
                } else {
                    echo "Sorry, there was an error uploading your file.";
                    
                }
            //}
        } else {
            echo "Error: " . $_FILES["avatar"]["error"];
            // header('Location: ../profile.php');
            // exit();
        }

?>
