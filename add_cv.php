<!DOCTYPE html>
<html lang="en">

<?php require_once('inc/header.php') ?>

<body id="top">
    <?php require_once('inc/topBarNav.php') ?>
    <div class="page-content bg-light">
        <div id="content ">
            <header>
                <div class="cover bg-light">
                    <div class="row bg-success">
                        <div class="container container-fluid text-center py-5">
                            <h1 data-v-c0c0f1ee="" class="title">
                                Step 1: Upload CV
                            </h1>
                        </div>
                    </div>
            </header>
            <div class="container bg-light px-3">
                <div class="col-lg-6">
                    <div class="mt-5">
                        <p> <u class="title text-uppercase h2 text-warning mb-1">submit your cv!</u> </p>
                        <h4 class="intro-title  h4 marker" data-aos="fade-left" data-aos-delay="50">
                            Upload your CV and we will do the rest</u>
                            <p class="lead fw-normal mt-3" data-aos="fade-up" data-aos-delay="100"></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col bg-light"> </div>
            <div class= "col-sm-5"> 
                <form> 
            <div class="card border border-dangerous rounded" style="width:4">
                <div class="card-body">
                    <h5 class="card-title  text-center">Submit CV form</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.
                    </p>
                    <h5>First name:</h5>
                    <input type="text" class="form-control my-1">
                    <h5>Last name:</h5>
                    <input type="text" class="form-control my-1">
                    <h5>Phone number:</h5>
                    <input type="text" class="form-control my-1" value="+84">
                    <div class="input-container">
                    <h5>Major:</h5>
                  <select class="form-select" name="" id="">
                    <option value="">Computer Science</option>
                    <option value="">Electrical Engineer</option>
                  </select>
                </div>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
            </form>
        </div>
            <div class="col  bg-light"> </div>
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