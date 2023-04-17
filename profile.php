<!DOCTYPE html>
<html lang="en">
<style>
    .inp-control {
        display: block;
        width: 100%;
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.6;
        color: #212529;
        background-color: #fff;
        background-clip: padding-box;
        border: 2px solid #e9ecef;
        appearance: none;
        border-radius: 10px;
    }
    .inp-control:focus {
        border-color: #007bff; /* new border color on focus */
    }   

</style>
<?php require_once('inc/header.php') ?>

<body id="top">
    <?php require_once('inc/topBarNav.php') ?>
    <div class="page-content">
        <div id="content">
            <div class="section pt-4 px-3 px-lg-4" id="about">
                <div class="container-narrow">
                    <div class="row">
                        <h1 class="text-center">My Profile</h1>
                        <p class= 'text-danger'>Add your information to complete the registration!</p>
                        <div class="col-md-6">
                            <form action="/attraction" method="post">
                                <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="first-name" id="floatingInput" placeholder="Ex: Smai" required pattern="^[a-zA-Z]+$" title="Please enter a valid first name (only letters)">
                                <label for="floatingInput" >First Name<span class='text-danger'>(*)</span></label>
                                </div>
                                
                                <div class="mb-3">
                                <label for="last-name" class="form-label">Last Name<span class='text-danger'>(*)</span>:</label>
                                <input type="text" class="form-control is-invalid" name="last-name" id="last-name" placeholder="Ex: Nghia" required>
                                </div>

                                <div class="mb-3">
                                <label for="location" class="form-label">Email<span class='text-danger'>(*)</span>:</label>
                                <input type="email" class="form-control is-invalid" name="area[location]" id="location" placeholder="Ex: nghia@gmail.com" required>
                                </div>
                                <div class="mb-3">
                                    <label for="image" class="form-label">Phone Number<span class='text-danger'>(*)</span>:</label>
                                    <input type="text" class="form-control is-invalid" name="area[image]" id="image" required>
                                </div>
                                <div class="mb-3">
                                    <label for="image" class="form-label">Address:</label>
                                    <input type="text" class="form-control" name="area[image]" id="image" required>
                                </div>
                                
                                <div class="mb-3">
                                    <button class="btn btn-success">Save</button>
                                </div>
                            </form>                            
                         
                        </div>
                        <div class="col-md-5 offset-md-1" data-aos="fade-left" data-aos-delay="100">
                            <img class="avatar img-fluid mt-2" src="images/avatar.jpg" width="200" height="200" alt="Walter Patterson" />


                        
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
        const inputCont = document.querySelector('.inp-control');
        function checkFname(){
            const firstName = document.getElementById("first-name");
            //firstName.addEventListener("change", function() {
                if(firstName.value.length == 0){
                    firstName.classList.add('border-warning');
                }
                else if(!validateName(firstName)){
                    firstName.classList.add('border-danger');
                }
            
        }

        const lastName = document.getElementById("last-name");
        lastName.addEventListener("change", function() {
            validateName(lastName);
        });

        function validateName(field) {
        var regex = /^[a-zA-Z]+$/;
        if (regex.test(field.value)) {
            return true;
        } else {

            return false;
        }
    }
        



    </script>
</body>

</html>