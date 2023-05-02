<!DOCTYPE html>
<html lang="en">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.19.3/js/vendor/jquery.ui.widget.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.19.3/js/jquery.iframe-transport.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.19.3/js/jquery.fileupload.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cloudinary-core/2.11.0/cloudinary-core-shrinkwrap.min.js"></script>


<?php 
require_once('inc/header.php');
    if(!isset($_SESSION['setup'])){
     require_once('action/setup_profile.php');
    }
 ?>


<body id="top">
    <?php require_once('inc/topBarNav.php') ?>
    <div class="page-content">
        <div id="content">
            <div class="section pt-4 px-3 px-lg-4" id="about">
                <div class="container-narrow">
                    <div class="row">
                        <h1 class="text-center">My Profile</h1>
                        <?php       
                            if(!isset($_SESSION['updated'])){
                                echo '<div class= "text-danger registration-message" >Add your information to complete the registration!</div>';
                            }
                        ?>

                        <div class="col-md-5">
                            <form action="./action/profile_processing.php" method="post">
                                <div class="form-floating mb-3 mt-2">
                                <input type="text" class="form-control" name="first-name" id="first-name" placeholder="Ex: Smai" value="<?php echo isset($_SESSION['first-name']) ? $_SESSION['first-name'] : ''; ?>" required pattern="[\p{L}\p{N}]+" title="Please enter a valid first name (only letters)">
                                <label for="first-name" >First Name<span class='text-danger'>(*)</span></label>
                                </div>
                                
                                <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="last-name" id="last-name" placeholder="Ex: Nghia" value="<?php echo isset($_SESSION['last-name']) ? $_SESSION['last-name'] : ''; ?>" required pattern="[\p{L}\p{N}]+" title="Please enter a valid last name (only letters)">
                                <label for="last-name" >Last Name<span class='text-danger'>(*)</span></label>
                                </div>

                                <div class="form-floating mb-3">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Ex: nghia@gmail.com" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>" required>
                                <label for="email" class="form-label">Email<span class='text-danger'>(*)</span>:</label>
                                </div>

                                <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="phone" id="phone" placeholder="Ex: 0546565846" value="<?php echo isset($_SESSION['phone']) ? $_SESSION['phone'] : ''; ?>" required pattern="[0-9]*" title="Please enter only numbers!">
                                <label for="phone" class="form-label">Phone Number<span class='text-danger'>(*)</span>:</label>    
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="address" placeholder="Ex: HCM city" id="address" value="<?php echo isset($_SESSION['address']) ? $_SESSION['address'] : ''; ?>">
                                    <label for="address" class="form-label">Address:</label>  
                                </div>
                                
                                <div class="mb-3">
                                    <button class="btn btn-success">Save</button>
                                </div>
                            </form>                            
                         
                        </div>

                        <div class="col-2"></div>

                        <div class="col-md-5" data-aos="fade-left" data-aos-delay="100">
                            <div class="form-floating mb-5 ">
                                <img class="avatar img-fluid mt-2" src="images/avatar.jpg" width="200" height="200" alt="Walter Patterson" />
                            </div>
                            <form method="post" enctype="multipart/form-data">
                                <div><h6>Select your avatar:</h6></div>
                                <div class="input-group mb-3">
                                    <input class="form-control" type="file" id="avatar" name="avatar" accept="image/*"><br>                                     
                                    <button class="input-group-text" type="submit">Upload</button>
                                </div>
                            </form>
 
                        </div>
                        
                        
                    </div>
                </div>
            </div>
        </div>
        
    </div>
        <?php require_once('inc/footer.php') ?>
        <div id="scrolltop"><a class="btn btn-secondary" href="#top"><span class="icon"><i
                        class="fas fa-angle-up fa-x"></i></span></a></div>
        <script src="./scripts/imagesloaded.pkgd.min.js?ver=1.2.0"></script>
        <script src="./scripts/masonry.pkgd.min.js?ver=1.2.0"></script>
        <script src="./scripts/BigPicture.min.js?ver=1.2.0"></script>
        <script src="./scripts/purecounter.min.js?ver=1.2.0"></script>
        <script src="./scripts/bootstrap.bundle.min.js?ver=1.2.0"></script>
        <script src="./scripts/aos.min.js?ver=1.2.0"></script>
        <script src="./scripts/main.js?ver=1.2.0"></script>

    <script>
        const formCont = document.querySelector('.form-control');

        const firstName = document.getElementById("first-name");
        const lastName = document.getElementById("last-name");
        const email = document.getElementById("email");
        const phoneNum = document.getElementById("phone");
        const regisMess = document.querySelector(".registration-message");
        // formCont.addEventListener("change", function(){
        //     if(firstName.value.length > 0 && lastName.value.length > 0 && email.value.length > 0 && phoneNum.value.length > 0){
        //     regisMess.style.display = "none";
        //     }
        // });
        const formInputs = [firstName, lastName, email, phoneNum];

        formInputs.forEach(input => {
        input.addEventListener("input", function() {
            if (firstName.value.length > 0 && lastName.value.length > 0 && email.value.length > 0 && phoneNum.value.length > 0) {
            regisMess.style.display = "none";
            }
        });
        });


    </script>
   <?php
    // Check if form is submitted
    if(isset($_POST['submit'])) {

        // Check if file was uploaded without errors
        if(isset($_FILES["avatar"]) && $_FILES["avatar"]["error"] == 0) {
            $uploadDir = 'uploads/'; // Specify the directory where the uploaded file will be stored
            $fileName = basename($_FILES["avatar"]["name"]); // Get the name of the uploaded file
            $targetFilePath = $uploadDir . $fileName; // Set the path where the file will be saved

            // Check if the file already exists in the directory
            if(file_exists($targetFilePath)) {
                echo "File already exists.";
            } else{
                // Move the uploaded file to the specified directory
                if(move_uploaded_file($_FILES["avatar"]["tmp_name"], $targetFilePath)) {
                    echo "The file ".$fileName. " has been uploaded.";
                    
                    // Save the path of the uploaded file to MySQL
                    $dbHost = 'localhost';
                    $dbUsername = 'root';
                    $dbPassword = '';
                    $dbName = 'co3049';
                    $conn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);
                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }
                    $path = mysqli_real_escape_string($conn, $targetFilePath);
                    $sql = "INSERT INTO users (avatar) VALUES ('$path')";
                    if (mysqli_query($conn, $sql)) {
                        echo "Path saved to MySQL successfully.";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                    mysqli_close($conn);
                    
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        } else {
            echo "Error: " . $_FILES["avatar"]["error"];
        }
    }
?>




</body>

</html>
