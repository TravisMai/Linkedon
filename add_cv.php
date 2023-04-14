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
            <div class="col-7 col-sm-10 col-md-5">
                <ul class="nav nav-tabs flex-column flex-md-row small" id="cv-Tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link  " id="job-objective-tab" onclick="changeTab('objective')">
                            Objective</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="education-tab" onclick="changeTab('education')">Education</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="experience-tab" onclick="changeTab('experience')">Skills</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="history-tab" onclick="changeTab('history')">Work History</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="certi-tab" onclick="changeTab('certification')">Certification</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="additional-tab" onclick="changeTab('additional')">Addtional</a>
                    </li>
                </ul>


                <form id="cv-form">
                    <div class="card border-success rounded">
                        <div class="card-body tab-content">
                            <!-- Personal Information Section -->
                            <div class="tab-pane active" id="personal-section">
                                <p class="card-text h4">Start: Personal Information</p>
                                <p class="text-danger">First, we need to confirm your personal information</p>
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
                                <div class="d-flex justify-content-between mt-4">
                                    <div class="mr-auto"> </div>
                                    <button type="button" class="btn btn-primary ml-auto" id="next-to-objective"
                                        onclick="changeTab('objective')">Next</button>
                                </div>
                            </div>
                            <!-- Job Objective Section -->
                            <div class="tab-pane" id="objective-section">
                                <h4>Step 1/6: Job Objective</h4>
                                <form>
                                    <div class="form-group mt-1">
                                        <label for="job-title">Job Title</label>
                                        <input type="text" class="form-control" id="job-title" name="job-title"
                                            required>
                                    </div>
                                    <div class="form-group mt-1">
                                        <label for="company-name">Company Name</label>
                                        <input type="text" class="form-control" id="company-name" name="company-name">
                                    </div>
                                    <div class="form-group mt-1">
                                        <label for="industry">Industry</label>
                                        <input type="text" class="form-control" id="industry" name="industry">
                                    </div>
                                    <div class="form-group mt-1">
                                        <label for="location">Location</label>
                                        <input type="text" class="form-control" id="location" name="location">
                                    </div>
                                    <div class="form-group mt-1">
                                        <label for="employment-type">Type of Employment</label>
                                        <select class="form-control" id="employment-type" name="employment-type">
                                            <option value="">-- Select --</option>
                                            <option value="full-time">Full-time</option>
                                            <option value="part-time">Part-time</option>
                                            <option value="contract">Contract</option>
                                            <option value="freelance">Freelance</option>
                                            <option value="internship">Internship</option>
                                        </select>
                                    </div>
                                    <div class="form-group mt-1">
                                        <label for="salary-range">Desired Salary Range</label>
                                        <input type="text" class="form-control" id="salary-range" name="salary-range">
                                    </div>
                                    <div class="form-group mt-1">
                                        <label for="qualifications">Qualifications and Career Goals</label>
                                        <textarea class="form-control" id="qualifications" name="qualifications"
                                            rows="5"></textarea>
                                    </div>
                                    <div class="d-flex justify-content-between mt-4">
                                        <button type="button" class="btn btn-secondary mr-auto" id="back-to-personal"
                                            onclick="changeTab('personal')">Back</button>
                                        <button type="button" class="btn btn-primary ml-auto" id="next-to-education"
                                            onclick="changeTab('education')">Next</button>
                                    </div>
                                </form>
                            </div>
                            <!-- Education Section -->
                            <div class="tab-pane" id="education-section">
                                <h4>Step 2/6: Education</h4>
                                <form>
                                    <div class="form-group mt-1">
                                        <label for="school-name">School/University name</label>
                                        <input type="text" class="form-control" id="school-name" name="school-name"
                                            required>
                                    </div>
                                    <div class="form-group mt-1">
                                        <label for="degree-name">Degree/Course name</label>
                                        <input type="text" class="form-control" id="degree-name" name="degree-name"
                                            required>
                                    </div>
                                    <div class="form-group mt-1">
                                        <label for="field-of-study">Field of Study</label>
                                        <input type="text" class="form-control" id="field-of-study"
                                            name="field-of-study" required>
                                    </div>
                                    <div class="form-group mt-1">
                                        <label for="graduation-year">Graduation Year</label>
                                        <input type="text" class="form-control" id="graduation-year"
                                            name="graduation-year">
                                    </div>
                                    <div class="form-group mt-1">
                                        <label for="gpa">GPA</label>
                                        <input type="text" class="form-control" id="gpa" name="gpa">
                                    </div>
                                </form>
                                <div class="d-flex justify-content-between mt-4">
                                    <button type="button" class="btn btn-secondary mr-auto" id="back-to-objective"
                                        onclick="changeTab('objective')">Back</button>
                                    <button type="button" class="btn btn-primary ml-auto" id="next-to-experience"
                                        onclick="changeTab('experience')">Next</button>
                                </div>
                            </div>
                            <!-- Professional Skills -->
                            <div class="tab-pane" id="experience-section" style="display: none;">
                                <p class="card-text h4" id ="exp-count">Step 3/6: Professional Experience</p>
                                <h5>First Experience</h5>
                                <div class="experience-forms">
                                    <div class="form-group">
                                        <label for="job-description">Job Description</label>
                                        <textarea class="form-control" name="job-description[]" rows="5"
                                            required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="job-duration">Duration</label>
                                        <input type="text" class="form-control" name="job-duration[]" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="job-skills">Skills Utilized</label>
                                        <input type="text" class="form-control" name="job-skills[]" required>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-success my-3" id="add-experience-form">Add Another
                                    Experience</button>
                                <!-- Add a Next button to go to the next section -->
                                <div class="d-flex justify-content-between mt-4">
                                    <button type="button" class="btn btn-secondary mr-auto" id="back-to-education"
                                        onclick="changeTab('education')">Back</button>
                                    <button type="button" class="btn btn-primary ml-auto" id="next-to-skills"
                                        onclick="changeTab('skills')">Next</button>
                                </div>
                            </div>
                            <!-- Work history Section -->
                            <div class="tab-pane" id="history-section">
                                <h4>Step 4/6: Work History</h4>
                                <form>
                                    <div class="form-group">
                                        <label for="job-title">Job Title</label>
                                        <input type="text" class="form-control" id="job-title" name="job-title"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="company-name">Company Name</label>
                                        <input type="text" class="form-control" id="company-name" name="company-name"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="employment-type">Type of Employment</label>
                                        <select class="form-control" id="employment-type" name="employment-type">
                                            <option value="">-- Select --</option>
                                            <option value="full-time">Full-time</option>
                                            <option value="part-time">Part-time</option>
                                            <option value="contract">Contract</option>
                                            <option value="freelance">Freelance</option>
                                            <option value="internship">Internship</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="start-date">Start Date</label>
                                        <input type="date" class="form-control" id="start-date" name="start-date"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="end-date">End Date</label>
                                        <input type="date" class="form-control" id="end-date" name="end-date">
                                    </div>
                                    <div class="form-group">
                                        <label for="job-description">Job Description</label>
                                        <textarea class="form-control" id="job-description" name="job-description"
                                            rows="5" required></textarea>
                                    </div>
                                </form>
                                <div class="d-flex justify-content-between mt-4">
                                    <button type="button" class="btn btn-secondary mr-auto" id="back-to-education"
                                        onclick="changeTab('education')">Back</button>
                                    <button type="button" class="btn btn-primary ml-auto" id="next-to-skills"
                                        onclick="changeTab('skills')">Next</button>
                                </div>
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
                                <div class="d-flex justify-content-between mt-4">
                                    <button type="button" class="btn btn-secondary mr-auto" id="back-to-skills"
                                        onclick="changeTab('skills')">Back</button>
                                    <button type="button" class="btn btn-primary ml-auto" id="next-to-additional"
                                        onclick="changeTab('additional')">Next</button>
                                </div>
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
                                <div class="d-flex justify-content-between mt-4">
                                    <button type="button" class="btn btn-secondary mr-auto" id="back-to-certification"
                                        onclick="changeTab('certification')">Back</button>
                                    <button type="submit" class="btn btn-primary ml-auto">Submit</button>
                                </div>
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
function addExperienceForm() {
    let experienceCount = 1;
    document.querySelector('#add-experience-form').addEventListener('click', function() {
        // Create new form elements
        let newForm = document.createElement('div');
        newForm.classList.add('experience-forms');
        newForm.innerHTML = `
            <h5 class="mt-3">Next Experience </h5>
            <div class="form-group">
                <label for="job-description">Job Description</label>
                <textarea class="form-control" name="job-description[]" rows="2" required></textarea>
            </div>
            <div class="form-group">
                <label for="job-duration">Duration</label>
                <input type="text" class="form-control" name="job-duration[]" required>
            </div>
            <div class="form-group">
                <label for="job-skills">Skills Utilized</label>
                <input type="text" class="form-control" name="job-skills[]" required>
            </div>
            <button type="button" class="btn btn-danger my-3 remove-experience-form">Remove Experience</button>
        `;
        // Append the new form elements to the page
        this.parentNode.insertBefore(newForm, this);
        // Increment the experience count
        experienceCount++;
        // Update the text of the p element
        document.querySelector('.card-text.h4').textContent = `Step 3/6: Professional Experience (${experienceCount} experiences)`;
        // Add event listener to the new "Remove Experience" button
        newForm.querySelector('.remove-experience-form').addEventListener('click', function() {
            // Remove the corresponding experience form
            this.parentNode.remove();
            // Decrement the experience count
            experienceCount--;
            // Update the text of the p element
            document.querySelector('#exp-count').textContent = `Step 3/6: Professional Experience (${experienceCount} experiences)`;
        });
    });
}

addExperienceForm();
    </script>
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
            const scrolling = document.getElementById('card-cv');

            scrolling.scrollIntoView();
        }
    </script>

</body>

</html>