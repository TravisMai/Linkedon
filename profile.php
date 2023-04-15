<!DOCTYPE html>
<html lang="en">

<?php require_once('inc/header.php') ?>

<body id="top">
    <?php require_once('inc/topBarNav.php') ?>
    <div class="page-content">
        <div id="content">
            <div class="section pt-4 px-3 px-lg-4" id="about">
                <div class="container-narrow">
                    <div class="row">
                        <h1 class="text-center">My Profile</h1>
                        <div class="col-md-6">
                            <form action="/attraction" method="post" novalidate class="validated-form">
                                <div class="mb-3">
                                <label for="title" class="form-label">First Name<span class='text-danger'>(*)</span>:</label>
                                <input type="text" class="form-control" name="area[title]" id="title" placeholder="Ex: Smai" required>
                                </div>
                                
                                <div class="mb-3">
                                <label for="title" class="form-label">Last Name<span class='text-danger'>(*)</span>:</label>
                                <input type="text" class="form-control" name="area[title]" id="title" placeholder="Ex: Nghia" required>
                                </div>

                                <div class="mb-3">
                                <label for="location" class="form-label">Email<span class='text-danger'>(*)</span>:</label>
                                <input type="text" class="form-control" name="area[location]" id="location" placeholder="Ex: nghia@gmail.com" required>
                                </div>
                                <div class="mb-3">
                                    <label for="image" class="form-label">Phone Number<span class='text-danger'>(*)</span>:</label>
                                    <input type="text" class="form-control" name="area[image]" id="image" required>
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
</body>

</html>