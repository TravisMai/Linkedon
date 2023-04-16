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
                        <a class="nav-link" id="objective-tab" onclick="changeTab('objective')">
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
                        <a class="nav-link" id="certification-tab" onclick="changeTab('certification')">Certification</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="reference-tab" onclick="changeTab('reference')">References</a>
                    </li>
                </ul>
                <!-- FORM START -->
                
                <form id="cv-form">
                    <div class="card border-success rounded">
                        <div class="card-body tab-content">
                            <!-- Personal Information Section -->
                           
                            <div class="tab-pane active" id="personal-section">
                            <input type="hidden" id="activeTabIndex" value="0">
                                <p class="card-text h4">Start: Personal Information</p>
                                <p class="text" style="color: blue">First, we need to confirm your personal information
                                </p>
                                <label for="first-name" class="mt-2 h5">First Name:</label>
                                <input type="text" class="form-control" name="first-name" id="first-name" required disabled value="lấy bên login">
                                <label for="last-name" class="mt-2 h5">Last Name:</label>
                                <input type="text" class="form-control" name="last-name" placeholder="Tell us the field you want to apply" id="last-name" required disabled value="lấy bên login">
                                <label for="email" class="mt-2 h5">Email:</label>
                                <input type="text" id="email" name="email" class="form-control" disabled value="lấy bên Phú@gmail.com">
                                <label for="phone-number" class="mt-2 h5">Phone Number:</label>
                                <input type="text" id="phone-number" name="phone-number" class="form-control" disabled value="093423233232">
                                <label for="address" class="mt-2 h5">Address:</label>
                                <input type="text" id="address" name="address" class="form-control" disabled value="xx/yy abc, P.z, Q.t">
                                <label for="additional-info" class="mt-2 h5">Additional Information:</label>
                                <textarea id="additional-info" name="additional-info" class="form-control" placeholder="Tell us something about your habit and hobby"></textarea>
                                <div class="d-flex justify-content-between mt-4">
                                    <div class="mr-auto"> </div>
                                    <button type="button" class="btn btn-primary ml-auto" id="next-to-objective" onclick="changeTab('objective')">Confirm</button>
                                </div>
                            </div>


                            <!-- Job Objective Section -->
                            <div class="tab-pane" id="objective-section">
                                <input type="hidden" id="activeTabIndex" value="1"> 
                                <h4>Step 1/6: Job Objective</h4>
                                <!-- <form> -->
                                <div class="form-group mt-1">
                                    <label for="job-title">Job Title </label>
                                    <input placeholder="Job Title" type="text" class="form-control" id="job-title" name="job-title" required />
                                </div>
                                <div class="form-group mt-1">
                                    <label for="position">Postion</label>
                                    <input placeholder="Tell us the position you want to apply: fresher, junior, etc.." type="text" class="form-control" id="industry" name="industry">
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
                                    <input placeholder="Ex: 20.000.000VNĐ" type="number" class="form-control" required id="salary-range" name="salary-range">
                                </div>
                                <div class="form-group mt-1">
                                    <label for="qualifications">Qualifications and Career Goals</label>
                                    <textarea placeholder="Tell us about your aim and goal, and expectation about job" required class="form-control" id="qualifications" name="qualifications" rows="2"></textarea>
                                </div>
                                <div class="d-flex justify-content-between mt-4">
                                    <button type="button" class="btn btn-secondary mr-auto" id="back-to-personal" onclick="changeTab('personal')">Back</button>
                                    <button type="button" class="btn btn-primary ml-auto" id="next-to-education" onclick="changeTab('education')">Next</button>
                                </div>
                                <!-- </form> -->
                            </div>

                            <!-- Education Section -->
                            <div class="tab-pane" id="education-section">
                            <input type="hidden" id="activeTabIndex" value="2"> 
                                <h4>Step 2/6: Education</h4>
                                <form>
                                    <div class="form-group mt-1">
                                        <label for="school-name">School/University name</label>
                                        <input type="text" placeholder="Your University/ School" class="form-control" id="school-name" name="school-name" required>
                                    </div>
                                    <div class="form-group mt-1">
                                        <label for="degree-name">Degree/Course name</label>
                                        <input type="text" placeholder="Your majority/ course name" class="form-control" id="degree-name" name="degree-name" required>
                                    </div>
                                    <div class="form-group mt-1">
                                        <label for="education-level">Education level</label>
                                        <select class="form-control" id="education-level" name="education-level" required>
                                            <option value="high-school">High School</option>
                                            <option value="bachelor">Bachelor's Degree</option>
                                            <option value="mba">MBA</option>
                                            <option value="graduate">Graduate Degree</option>
                                            <option value="post-graduate">Post-Graduate Degree</option>
                                        </select>
                                    </div>
                                    <div class="form-group mt-1">
                                        <label for="graduation-year">Graduation Year</label>
                                        <input type="number" min="1990" max="2035" class="form-control" id="graduation-year" placeholder="2024" name="graduation-year">
                                    </div>
                                    <div class="form-group mt-1">
                                        <label for="gpa">GPA</label>
                                        <div class="d-flex align-items-center">
                                            <input type="number" step="0.01" min="1" max="10" class="form-control mr-2" id="gpa-value" placeholder="7.0" name="gpa-value">

                                            <select class="form-control ml-2" id="gpa-scale" name="gpa-scale">
                                                <option value="10">/10</option>
                                                <option value="4">/4</option>
                                            </select>
                                            <div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="d-flex justify-content-between mt-4">
                                    <button type="button" class="btn btn-secondary mr-auto" id="back-to-objective" onclick="changeTab('objective')">Back</button>
                                    <button type="button" class="btn btn-primary ml-auto" id="next-to-experience" onclick="changeTab('experience')">Next</button>
                                </div>
                            </div>


                            <!-- Professional Skills -->
                            <div class="tab-pane" id="experience-section" style="display: none;">
                            <input type="hidden" id="activeTabIndex" value="3"> 
                                <h4>Step 3/6: Professional Experience</h4>
                                <h5>First Experience</h5>
                                <form>

                                    <div class="form-group mt-1">
                                        <label for="job-description">Job Description</label>
                                        <textarea class="form-control" name="job-description[]" placeholder="Tell us something about that job" rows="2" required></textarea>
                                    </div>
                                    <div class="form-group mt-1">
                                        <label for="job-duration">Duration</label>
                                        <input type="month" class="form-control" name="job-duration[]" required>
                                    </div>
                                    <div class="form-group mt-1">
                                        <label for="job-skills">Skills Utilized</label>
                                        <input type="text" class="form-control" placeholder="What you obtain after working at this position" name="job-skills[]" required>
                                    </div>

                                    <button type="button" class="btn btn-success my-3" id="add-experience">Add
                                        Another
                                        Experience</button>
                                    <!-- Add a Next button to go to the next section -->
                                    <div class="d-flex justify-content-between mt-4">
                                        <button type="button" class="btn btn-secondary mr-auto" id="back-to-education" onclick="changeTab('education')">Back</button>
                                        <button type="button" class="btn btn-primary ml-auto" id="next-to-history" onclick="changeTab('history')">Next</button>
                                    </div>
                                </form>
                            </div>


                            <!-- Work history Section -->
                            <div class="tab-pane" id="history-section">
                            <input type="hidden" id="activeTabIndex" value="4"> 
                                <h4>Step 4/6: Work History</h4>
                                <p class="text" style="color: blue">Plese show us your latest job, or your most
                                    impressive experience </p>
                                <form>
                                    <div class="form-group mt-1">
                                        <label for="job-title">Job Title</label>
                                        <input type="text" class="form-control" id="job-title" name="job-title" required>
                                    </div>
                                    <div class="form-group mt-1">
                                        <label for="company-name">Company Name</label>
                                        <input type="text" class="form-control" placeholder="Name of the Company" id="company-name" name="company-name" required>
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
                                        <label for="start-date">Start Date</label>
                                        <input type="date" class="form-control" id="start-date" name="start-date" required>
                                    </div>
                                    <div class="form-group mt-1">
                                        <label for="end-date">End Date</label>
                                        <input type="date" class="form-control" id="end-date" name="end-date">
                                    </div>
                                    <div class="form-group mt-1 ">
                                        <label for="job-description">Job Description</label>
                                        <textarea class="form-control" id="job-description" placeholder="Tell us something about that working experience" name="job-description" rows="5" required></textarea>
                                    </div>
                                </form>
                                <div class="d-flex justify-content-between mt-4">
                                    <button type="button" class="btn btn-secondary mr-auto" id="back-to-experience" onclick="changeTab('experience')">Back</button>
                                    <button type="button" class="btn btn-primary ml-auto" id="next-to-certification" onclick="changeTab('certification')">Next</button>
                                </div>
                            </div>


                            <!-- Certiftication -->
                            <div class="tab-pane" id="certification-section" style="display: none;">
                            <input type="hidden" id="activeTabIndex" value="5"> 
                                <h4>Step 5/6: Certifications</h4>

                                <h5>First Certification</h5>
                                <!-- <form> -->
                                <div class="form-group mt-1">
                                    <label for="certification-name">Certification Name</label>
                                    <input type="text" class="form-control" placeholder="Certification title" name="certification-name[]" required>
                                </div>
                                <div class="form-group mt-1">
                                    <label for="certification-date">Date</label>
                                    <input type="month" class="form-control" name="certification-date[]" required>
                                </div>
                                <div class="form-group mt-1">
                                    <label for="certification-description">Description</label>
                                    <textarea class="form-control" name="certification-description[]" rows="5" required></textarea>
                                </div>
                                <!-- </form> -->

                                <button type="button" class="btn btn-primary mt-3" id="add-certification">Add
                                    More</button>

                                <div class="d-flex justify-content-between mt-4">
                                    <button type="button" class="btn btn-secondary mr-auto" id="back-to-history" onclick="changeTab('history')">Back</button>
                                    <button type="button" class="btn btn-primary ml-auto" id="next-to-reference" onclick="changeTab('reference')">Next</button>
                                </div>
                            </div>


                            <!-- Refernce -->
                            <div class="tab-pane" id="reference-section" style="display: none;">
                            <input type="hidden" id="activeTabIndex" value="6"> 
                                <h4>Step 6/6: References</h4>
                                <h5>First Reference</h5>
                                <form>
                                    <div class="form-group">
                                        <label for="reference-name">Reference Name</label>
                                        <input type="text" class="form-control" name="reference-name[]" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="reference-phone">Major</label>
                                        <input type="text" class="form-control" name="reference-phone[]" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="reference-email">Email</label>
                                        <input type="email" class="form-control" name="reference-email[]" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="reference-relationship">Relationship</label>
                                        <input type="text" class="form-control" name="reference-relationship[]" required>
                                    </div>
                                </form>

                                <button type="button" class="btn btn-primary mt-3" id="add-reference">Add More</button>

                                <div class="d-flex justify-content-between mt-4">
                                    <button type="button" class="btn btn-secondary mr-auto" id="back-to-certification" onclick="changeTab('certification')">Back</button>
                                    <button type="submit" class="btn btn-primary ml-auto">Submit</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
            <div class="col bg-light"> </div>
        </div>

    </div>
    </div>
    <?php require_once('inc/footer.php') ?>
    <div id="scrolltop"><a class="btn btn-secondary" href="#top"><span class="icon"><i class="fas fa-angle-up fa-x"></i></span></a></div>
    <script src="./scripts/imagesloaded.pkgd.min.js?ver=1.2.0"></script>
    <script src="./scripts/masonry.pkgd.min.js?ver=1.2.0"></script>
    <script src="./scripts/BigPicture.min.js?ver=1.2.0"></script>
    <script src="./scripts/purecounter.min.js?ver=1.2.0"></script>
    <script src="./scripts/bootstrap.bundle.min.js?ver=1.2.0"></script>
    <script src="./scripts/aos.min.js?ver=1.2.0"></script>
    <script src="./scripts/main.js?ver=1.2.0"></script>


    <script>
        const tabValues = {
            "personal": 0,
            "objective": 1,
            "education": 2,
            "skills": 3,
            "history": 4,
            "certification": 5,
            "reference": 6,
        };
    </script>

    <!-- GPA handle -->
    <script>
        let gpaValueInput = document.querySelector('#gpa-value');
        let gpaScaleSelect = document.querySelector('#gpa-scale');

        gpaScaleSelect.addEventListener('change', function() {
            let gpaScale = this.value;
            gpaValueInput.setAttribute('max', gpaScale);
        });
    </script>

    <!-- add many experience -->
    <script>
        function addExperienceForm() {
            let experienceCount = 1;
            document.querySelector('#add-experience').addEventListener('click', function() {
                // Create new form elements
                let newForm = document.createElement('div');
                newForm.classList.add('experience-forms');
                newForm.innerHTML = `
            <h5 class="mt-3">Next Experience </h5>
            <div class="form-group">
                    <label for="job-description">Job Description</label>
                    <textarea class="form-control" name="job-description[]" placeholder="Tell us something about that job" rows="2"
                        required></textarea>
                </div>
                <div class="form-group">
                    <label for="job-duration">Duration</label>
                    <input type="month" class="form-control" name="job-duration[]" required>
                </div>
                <div class="form-group">
                    <label for="job-skills">Skills Utilized</label>
                    <input type="text" class="form-control" placeholder="What you obtain after working at this position" name="job-skills[]" required>
                </div>
            <button type="button" class="btn btn-danger my-3 remove-experience-form">Remove Experience</button>
        `;
                // Append the new form elements to the page
                this.parentNode.insertBefore(newForm, this);
                // Increment the experience count
                experienceCount++;
                // Add event listener to the new "Remove Experience" button
                newForm.querySelector('.remove-experience-form').addEventListener('click', function() {
                    if (confirm('Are you sure you want to delete this experience?')) {
                        // Remove the corresponding experience form
                        this.parentNode.remove();
                        // Decrement the experience count
                        experienceCount--;
                        // Update the text of the p element
                    }
                });
            });
        }

        addExperienceForm();
    </script>

    <!-- Add many certification -->
    <script>
        function addCertificationForm() {
            let certificationCount = 1;
            document.querySelector('#add-certification').addEventListener('click', function() {
                // Create new form elements
                let newForm = document.createElement('div');
                newForm.classList.add('certification-forms');
                newForm.innerHTML = `
            <h5 class="mt-3">Next Certification</h5>
            <div class="form-group">
                <label for="certification-name">Certification Name</label>
                <input type="text" class="form-control" name="certification-name[]" required>
            </div>
            <div class="form-group">
                <label for="certification-date">Date</label>
                <input type="month" class="form-control" name="certification-date[]" required>
            </div>
            <div class="form-group">
                <label for="certification-description">Description</label>
                <textarea class="form-control" name="certification-description[]" rows="2" required></textarea>
            </div>
            <button type="button" class="btn btn-danger my-3 remove-certification-form">Remove Certification</button>
        `;

                this.parentNode.insertBefore(newForm, this);

                certificationCount++;

                newForm.querySelector('.remove-certification-form').addEventListener('click', function() {
                    if (confirm('Are you sure you want to delete this certification?')) {
                        // Remove the corresponding experience form
                        this.parentNode.remove();
                        // Decrement the experience count
                        experienceCount--;
                    }
                });
            });
        }
        addCertificationForm();
    </script>

    <!-- Add many reference -->
    <script>
        function addReferenceForm() {
            let referenceCount = 1;
            document.querySelector('#add-reference').addEventListener('click', function() {
                // Create new form elements
                let newForm = document.createElement('div');
                newForm.classList.add('reference-forms');
                newForm.innerHTML = `
            <h5 class="mt-3">Next Reference</h5>
            <div class="form-group">
                <label for="reference-name">Reference Name</label>
                <input type="text" class="form-control" name="reference-name[]" required>
            </div>
            <div class="form-group">
                <label for="reference-email">Email</label>
                <input type="email" class="form-control" name="reference-email[]" required>
            </div>
            <div class="form-group">
                <label for="reference-phone">Phone</label>
                <input type="tel" class="form-control" name="reference-phone[]" required>
            </div>
            <div class="form-group">
                <label for="reference-relationship">Relationship</label>
                <input type="text" class="form-control" name="reference-relationship[]" required>
            </div>
            <button type="button" class="btn btn-danger my-3 remove-reference-form">Remove Reference</button>
        `;

                this.parentNode.insertBefore(newForm, this);

                referenceCount++;

                newForm.querySelector('.remove-reference-form').addEventListener('click', function() {
                    if (confirm('Are you sure you want to delete this reference?')) {
                        // Remove the corresponding reference form
                        this.parentNode.remove();
                        // Decrement the reference count
                        referenceCount--;
                    }
                });
            });
        }

        addReferenceForm();
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
                document.querySelector('.active').style.backgroundColor = "transparent"
            }

            // Add the 'active' class to the selected tab link

            document.getElementById(tab + "-tab").classList.add("active");
            document.querySelector('.active').style.backgroundColor = "lightblue"
            const scrolling = document.getElementById('card-cv');

            scrolling.scrollIntoView();
        }
    </script>


</body>

</html>