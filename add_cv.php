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
                    <div class="mt-5" id="card-cv">
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
                <ul class="nav nav-tabs justify-content-center small" id="cv-Tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="personal-tab" onclick="changeTab('personal')">
                            Personal Info</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="education-tab" onclick="changeTab('education')">Education</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="experience-tab" onclick="changeTab('experience')">Experience</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="skills-tab" onclick="changeTab('skills')">Skills</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="certi-tab" onclick="changeTab('certification')">Certification</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="additional-tab" onclick="changeTab('additional')">Addtional</a>
                    </li>
                </ul>


                <form id="cv-form">
                    <div class="card bg-success rounded">
                        <div class="card-body tab-content">
                            <!-- Personal Information Section -->
                            <div class="tab-pane active" id="personal-section">
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
                                <button type="button" class="btn btn-primary mt-4 pull-right" id="next-to-education"
                                    onclick="changeTab('education')">Next</button>
                            </div>
                            <!-- Education Section -->
                            <div class="tab-pane" id="education-section" style="display: none;">
                                <p class="card-text h4">Page 2/6: Education</p>
                                <h5 class="mt-2">School/University name:</h5>
                                <input type="text" class="form-control" name="school-name" required>
                                <h5 class="mt-2">Degree/Course name:</h5>
                                <input type="text" class="form-control" name="degree-name" required>
                                <h5 class="mt-2">Field of Study:</h5>
                                <input type="text" class="form-control" name="field-of-study" required>

                                <!-- Add a Next button to go to the next section -->
                                <button type="button" class="btn btn-primary mt-4 pull-right"
                                    id="next-to-work-experience" onclick="changeTab('experience')">Next
                                </button>
                            </div>
                            <div class="tab-pane" id="experience-section" style="display: none;">
                                <p class="card-text h4">Page 3/6: Work Experience</p>
                                <h5 class="mt-2">lmeo:</h5>
                                <input type="text" class="form-control" name="school-name" required>
                                <h5 class="mt-2">lmao:</h5>
                                <input type="text" class="form-control" name="degree-name" required>
                                <h5 class="mt-2">Field bủh b Study:</h5>
                                <input type="text" class="form-control" name="field-of-study" required>

                                <!-- Add a Next button to go to the next section -->
                                <button type="button" class="btn btn-primary mt-4" id="next-to-work-experience"
                                    onclick="changeTab('skills')">Next
                                </button>
                            </div>
                            <div class="tab-pane" id="skills-section" style="display: none;">
                                <p class="card-text h4">Page 4/6: Personal Skills</p>
                                <h5 class="mt-2">wqefwef</h5>
                                <input type="text" class="form-control" name="school-name" required>
                                <h5 class="mt-2">qwef</h5>
                                <input type="text" class="form-control" name="degree-name" required>
                                <h5 class="mt-2">wef:</h5>
                                <input type="text" class="form-control" name="field-of-study" required>

                                <!-- Add a Next button to go to the next section -->
                                <button type="button" class="btn btn-primary mt-4" id="next-to-work-experience"
                                    onclick="changeTab('certification')">Next
                                </button>
                            </div>
                            <div class="tab-pane" id="certification-section" style="display: none;">
                                <p class="card-text h4">Page 5/6: Certification</p>
                                <h5 class="mt-2">qewf</h5>
                                <input type="text" class="form-control" name="school-name" required>
                                <h5 class="mt-2">qwef</h5>
                                <input type="text" class="form-control" name="degree-name" required>
                                <h5 class="mt-2">qwef</h5>
                                <input type="text" class="form-control" name="field-of-study" required>

                                <!-- Add a Next button to go to the next section -->
                                <button type="button" class="btn btn-primary mt-4" id="next-to-work-experience"
                                    onclick="changeTab('additional')">Next
                                </button>
                            </div>
                            <div class="tab-pane" id="additional-section" style="display: none;">
                                <p class="card-text h4">Page 6/6: Additional Information</p>
                                <h5 class="mt-2">wqef</h5>
                                <input type="text" class="form-control" name="school-name" required>
                                <h5 class="mt-2">qwef</h5>
                                <input type="text" class="form-control" name="degree-name" required>
                                <h5 class="mt-2">wqef</h5>
                                <input type="text" class="form-control" name="field-of-study" required>

                                <!-- Add a Next button to go to the next section -->
                                <button type="button" class="btn btn-primary mt-4" id="next-to-work-experience">Next
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col  bg-light"> </div>
        </div>

        <!-- <div class="input-container">
            <label for="major" class="mt-2 h5">Major:</label>
            <select class="form-select" name="" id="">
                <option value="">Computer Science</option>
                <option value="">Electrical Engineer</option>
            </select>
        </div> -->
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
        function changeTab(tab) {
            // Get all tab content elements
            var tabs = document.getElementsByClassName("tab-pane");

            // Loop through each tab content element and hide them
            for (var i = 0; i < tabs.length; i++) {
                tabs[i].style.display = "none";
            }

            // Show the selected tab content element
            document.getElementById(tab + "-section").style.display = "block";

            // Remove the 'active' class from all tab links
            var links = document.getElementsByClassName("nav-link");
            for (var i = 0; i < links.length; i++) {
                links[i].classList.remove("active");
            }

            // Add the 'active' class to the selected tab link
            document.getElementById(tab + "-tab").classList.add("active");
            const julie = document.getElementById('card-cv');

            julie.scrollIntoView();
        }
    </script>

</body>

</html>