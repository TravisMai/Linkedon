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
            <div class="col-sm-5">
                <ul class="nav nav-tabs" id="CV-Tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="personal-tab" data-toggle="tab" href="#personal" role="tab"
                            aria-controls="personal" aria-selected="true">Personal Info</a>
                    <li class="nav-item">
                        <a class="nav-link" id="education-tab" data-toggle="tab" role="tab" aria-controls="education"
                            aria-selected="false" href="#education">Education</a>
                    <li class="nav-item">
                        <a class="nav-link" id="experience-tab" data-toggle="tab" role="tab" aria-controls="experience"
                            aria-selected="false" href="#menu3">Experience</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="skills-tab" data-toggle="tab" role="tab" aria-controls="skills"
                            aria-selected="false" href="#menu3">Skills</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="certi-tab" data-toggle="tab" role="tab" aria-controls="certifi  cation"
                            aria-selected="false" href="#menu3">Certification</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="additional-tab" data-toggle="tab" role="tab" aria-controls="additional"
                            aria-selected="false" href="#menu3">Addtional</a>
                    </li>

                </ul>
                <form id="cv-form">
                    <div class="card border border-dangerous rounded tab-content">
                        <div class="card-body" class="tab-pane fade in active">
                            <!-- Personal Information Section -->
                            <div id="personal-info-section">
                                <p class="card-text h4">Page 1/6: Personal Information</p>
                                <label for="first-name" class="mt-2 h5">First Name:</label>
                                <input type="text" class="form-control" name="first-name" id="first-name" required
                                    disabled value="lấy bên login">
                                <label for="last-name" class="mt-2 h5">Last Name:</label>
                                <input type="text" class="form-control" name="last-name" id="last-name" required
                                    disabled value="lấy bên login">
                                <label for="email" class="mt-2 h5">Email:</label>
                                <input type="text" class="form-control" disabled value="lấy bên Phú@">
                                <label for="phone-number" class="mt-2 h5">Phone Number:</label>
                                <input type="text" class="form-control" disabled value="+84xxxxxx">
                                <label for="phone-number" class="mt-2 h5">Address:</label>
                                <input type="text" class="form-control" disabled value="xx/yy abc, P.z, Q.t">
                                <button type="button" class="btn btn-primary mt-4" id="next-to-education">Next</button>
                            </div>
                            <!-- Education Section -->
                            <div id="education-section" style="display:none;">
                                <h5 class="mt-2">School/University name:</h5>
                                <input type="text" class="form-control" name="school-name" required>
                                <h5 class="mt-2">Degree/Course name:</h5>
                                <input type="text" class="form-control" name="degree-name" required>
                                <h5 class="mt-2">Field of Study:</h5>
                                <input type="text" class="form-control" name="field-of-study" required>

                                <!-- Add a Next button to go to the next section -->
                                <button type="button" class="btn btn-primary mt-4"
                                    id="next-to-work-experience">Next</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col  bg-light"> </div>
        </div>

        <div class="input-container">
            <label for="major" class="mt-2 h5">Major:</label>
            <select class="form-select" name="" id="">
                <option value="">Computer Science</option>
                <option value="">Electrical Engineer</option>
            </select>
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