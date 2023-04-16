<!DOCTYPE html>
<html lang="en">

<?php require_once('inc/header.php') ?>

<script>
    var tabIndex = {
        "personal": [0, 1],
        "objective": [1, 0],
        "education": [2, 0],
        "experience": [3, 0],
        "history": [4, 0],
        "certification": [5, 0],
        "reference": [6, 0],
        "end": [7, 0]
    };
    var experienceCount = 0;
    var certificationCount = 0;
    var referenceCount = 0;

</script>

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
                <ul class="nav nav-tabs flex-column flex-md-row small" id="cv-Tab">
                    <li class="nav-item">
                        <a class="nav-link" id="personal-tab" disabled onclick="changeTab('personal')"
                            style="display: none">
                        </a>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" id="objective-tab" onclick="changeTab('objective')">
                            Objective</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" id="education-tab" onclick="changeTab('education')">Education</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" id="experience-tab" onclick="changeTab('experience')">Skills</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" id="history-tab" onclick="changeTab('history')">Work History</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" id="certification-tab"
                            onclick="changeTab('certification')">Certification</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" id="reference-tab" onclick="changeTab('reference')">References</button>
                    </li>
                </ul>
                <!-- FORM START -->

                <form id="cv-form" method="POST" action="./action/add_cv_processing.php">
                    <div class="card border-success rounded">
                        <div class="card-body tab-content">
                            <!-- Personal Information Section -->
                            <div class="tab-pane active" id="personal-section">
                                <input type="hidden" id="activeTabIndex" value="0">
                                <p class="card-text h4">Start: Personal Information</p>
                                <p class="text" style="color: blue">First, we need to confirm your personal information
                                </p>
                                <label for="first-name" class="mt-2">First Name</label>
                                <input type="text" class="form-control" name="first-name" id="first-name" disabled
                                    value="lấy bên login">
                                <label for="last-name" class="mt-2">Last Name</label>
                                <input type="text" class="form-control" name="last-name"
                                    placeholder="Tell us the field you want to apply" id="last-name" disabled
                                    value="lấy bên login">
                                <label for="email" class="mt-2">Email</label>
                                <input type="text" id="email" name="email" class="form-control" disabled
                                    value="lấy bên Phú@gmail.com">
                                <label for="phone-number" class="mt-2">Phone Number:</label>
                                <input type="text" id="phone-number" name="phone-number" class="form-control" disabled
                                    value="093423233232">
                                <label for="address" class="mt-2">Address</label>
                                <input type="text" id="address" name="address" class="form-control" disabled
                                    value="xx/yy abc, P.z, Q.t">
                                <label for="additional-info" class="mt-2">Additional Information:</label>
                                <textarea id="additional-info" name="additional-info" class="form-control"
                                    placeholder="Tell us something about your habit and hobby"></textarea>
                                <div class="d-flex justify-content-between mt-4">
                                    <div class="mr-auto"> </div>
                                    <button type="button" class="btn btn-primary ml-auto" id="next-to-objective"
                                        onclick="changeTab('objective')">Confirm</button>
                                </div>
                            </div>


                            <!-- Job Objective Section -->
                            <div class="tab-pane" id="objective-section">
                                <input type="hidden" id="activeTabIndex" value="1">
                                <h4>Step 1/6: Job Objective</h4>
                                <!-- <form> -->
                                <div class="form-group mt-1">
                                    <label for="job-title">Job Title</label>
                                    <input placeholder="Job Title" type="text" class="form-control" id="job-title"
                                        name="job-title" required>
                                </div>
                                <div class="form-group mt-1">
                                    <label for="position">Postion</label>
                                    <input placeholder="Tell us the position you want to apply: fresher, junior, etc.."
                                        type="text" class="form-control" id="position" name="position" required>
                                </div>
                                <div class="form-group mt-1">
                                    <label for="employment-type">Type of Employment</label>
                                    <select class="form-control" required id="employment-type" name="employment-type">
                                        <option value="">-- Select --</option>
                                        <option value="full-time">Full-time</option>
                                        <option value="part-time">Part-time</option>
                                        <option value="contract">Contract</option>
                                        <option value="freelance">Freelance</option>
                                        <option value="internship">Internship</option>
                                    </select>
                                </div>
                                <div class="form-group mt-1">
                                    <label for="">Desired Salary Range</label>
                                    <div class="input-group">
                                        <label class="input-group-text" for="salary-range">Apprx</label>
                                        <input placeholder="Ex: 20." type="number" min="1" step="1" class="form-control"
                                            required id="salary-range" name="salary-range">

                                        <span class="input-group-text">.000.000 VND</span>

                                    </div>
                                </div>
                                <div class="form-group mt-1">
                                    <label for="qualifications">Qualifications and Career Goals</label>
                                    <textarea placeholder="Tell us about your aim and goal, and expectation about job"
                                        required class="form-control" id="qualifications" name="qualifications"
                                        rows="2"></textarea>
                                </div>
                                <div class="d-flex justify-content-between mt-4">
                                    <button type="button" class="btn btn-secondary mr-auto" id="back-to-personal"
                                        onclick="changeTab('personal')">Back</button>
                                    <button type="button" class="btn btn-primary ml-auto" id="next-to-education"
                                        onclick="changeTab('education')">Next</button>
                                </div>
                                <!-- </form> -->
                            </div>

                            <!-- Education Section -->
                            <div class="tab-pane" id="education-section">
                                <input type="hidden" id="activeTabIndex" value="2">
                                <h4>Step 2/6: Education</h4>
                                <!-- <form> -->
                                <div class="form-group mt-1">
                                    <label for="school-name">School/University name</label>
                                    <input type="text" placeholder="Your University/ School" class="form-control"
                                        id="school-name" name="school-name" required>
                                </div>
                                <div class="form-group mt-1">
                                    <label for="degree-name">Degree/Course name</label>
                                    <input type="text" placeholder="Your majority/ course name" class="form-control"
                                        id="degree-name" name="degree-name" required>
                                </div>
                                <div class="form-group mt-1">
                                    <label for="education-level">Education level</label>
                                    <select class="form-control" id="education-level" name="education-level" required>
                                        <option value="">-- Select --</option>
                                        <option value="high-school">High School</option>
                                        <option value="bachelor">Bachelor's Degree</option>
                                        <option value="mba">MBA</option>
                                        <option value="graduate">Graduate Degree</option>
                                        <option value="post-graduate">Post-Graduate Degree</option>
                                    </select>
                                </div>
                                <div class="form-group mt-1">
                                    <label for="graduation-year">Graduation Year</label>
                                    <select class="form-control" id="graduation-year" name="graduation-year">
                                        <option value="">-- Select Year --</option>
                                        <option value="1234">High School</option>
                                        <!-- Generate options for years from 1990 to 2023 -->
                                        <?php
                                        for ($i = 2030; $i >= 1990; $i--) {
                                            echo "<option value='$i'>$i</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group mt-1">
                                    <label for="">GPA</label>
                                    <div class="input-group">
                                        <label class="input-group-text" for="gpa"> </label>
                                        <input type="number" step="0.01" max="10" required class="form-control" id="gpa"
                                            placeholder="7.0" name="gpa">

                                        <select class="form-control" id="gpa-scale" name="gpa-scale">
                                            <option value="10">/10</option>
                                            <option value="4">/4</option>
                                        </select>
                                        <div>
                                        </div>
                                    </div>
                                </div>
                                <!-- </form> -->
                                <div class="d-flex justify-content-between mt-4">
                                    <button type="button" class="btn btn-secondary mr-auto" id="back-to-objective"
                                        onclick="changeTab('objective')">Back</button>
                                    <button type="button" class="btn btn-primary ml-auto" id="next-to-experience"
                                        onclick="changeTab('experience')">Next</button>
                                </div>
                            </div>


                            <!-- Professional Skills -->
                            <div class="tab-pane" id="experience-section" style="display: none;">
                                <input type="hidden" id="activeTabIndex" value="3">
                                <h4>Step 3/6: Professional Experience</h4>
                                <h5>First Experience</h5>
                                <!-- <form> -->

                                <div class="form-group mt-1">
                                    <label for="job-description">Job Description</label>
                                    <textarea class="form-control" name="job-description[]"
                                        placeholder="Tell us something about that job" rows="2" required></textarea>
                                </div>
                                <div class="form-group mt-1">
                                    <label for="job-duration[0]">Duration</label>
                                    <input type="month" class="form-control" id="job-duration[0]" name="job-duration[0]"
                                        required>
                                </div>
                                <div class="form-group mt-1">
                                    <label for="job-skills">Skills Utilized</label>
                                    <input type="text" class="form-control" id="job-skills"
                                        placeholder="What you obtain after working at this position" name="job-skills[]"
                                        required>
                                </div>

                                <button type="button" class="btn btn-success my-3" id="add-experience">Add
                                    Another
                                    Experience</button>
                                <!-- Add a Next button to go to the next section -->
                                <div class="d-flex justify-content-between mt-4">
                                    <button type="button" class="btn btn-secondary mr-auto" id="back-to-education"
                                        onclick="changeTab('education')">Back</button>
                                    <button type="button" class="btn btn-primary ml-auto" id="next-to-history"
                                        onclick="changeTab('history')">Next</button>
                                </div>
                                <!-- </form> -->
                            </div>


                            <!-- Work history Section -->
                            <div class="tab-pane" id="history-section">
                                <input type="hidden" id="activeTabIndex" value="4">
                                <h4>Step 4/6: Work History</h4>
                                <p class="text" style="color: blue">Plese show us your latest job, or your most
                                    impressive experience </p>
                                <form>
                                    <div class="form-group mt-1">
                                        <label for="job-name">Job Title</label>
                                        <input type="text" class="form-control" id="job-name" name="job-name" required>
                                    </div>
                                    <div class="form-group mt-1">
                                        <label for="company-name">Company Name</label>
                                        <input type="text" class="form-control" placeholder="Name of the Company"
                                            id="company-name" name="company-name" required>
                                    </div>
                                    <div class="form-group mt-1">
                                        <label for="employment-degree">Type of Employment</label>
                                        <select class="form-control" id="employment-degree" required
                                            name="employment-degree">
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
                                        <input type="date" class="form-control" id="start-date" name="start-date"
                                            required>
                                    </div>
                                    <div class="form-group mt-1">
                                        <label for="end-date">End Date</label>
                                        <input type="date" class="form-control" id="end-date" name="end-date">
                                    </div>
                                    <div class="form-group mt-1 ">
                                        <label for="job-description">Job Description</label>
                                        <textarea class="form-control" id="job-description[0]"
                                            placeholder="Tell us something about that working experience"
                                            name="job-description[0]" rows="5" required></textarea>
                                    </div>
                                </form>
                                <div class="d-flex justify-content-between mt-4">
                                    <button type="button" class="btn btn-secondary mr-auto" id="back-to-experience"
                                        onclick="changeTab('experience')">Back</button>
                                    <button type="button" class="btn btn-primary ml-auto" id="next-to-certification"
                                        onclick="changeTab('certification')">Next</button>
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
                                    <input type="text" class="form-control" id="certification-name[0]"
                                        placeholder="Certification title" name="certification-name[0]" required>
                                </div>
                                <div class="form-group mt-1">
                                    <label for="certification-date[0]">Date</label>
                                    <input type="month" class="form-control" id="certification-date[0]"
                                        name="certification-date[0]" required>
                                </div>
                                <div class="form-group mt-1">
                                    <label for="certification-description[0]">Description</label>
                                    <textarea class="form-control" id="certification-description[0]"
                                        name="certification-description[0]" rows="5" required></textarea>
                                </div>
                                <!-- </form> -->

                                <button type="button" class="btn btn-primary mt-3" id="add-certification">Add
                                    More</button>

                                <div class="d-flex justify-content-between mt-4">
                                    <button type="button" class="btn btn-secondary mr-auto" id="back-to-history"
                                        onclick="changeTab('history')">Back</button>
                                    <button type="button" class="btn btn-primary ml-auto" id="next-to-reference"
                                        onclick="changeTab('reference')">Next</button>
                                </div>
                            </div>


                            <!-- Refernce -->
                            <div class="tab-pane" id="reference-section" style="display: none;">
                                <input type="hidden" id="activeTabIndex" value="6">
                                <h4>Step 6/6: References</h4>
                                <h5>First Reference</h5>
                                <!-- <form> -->
                                <div class="form-group">
                                    <label for="reference-name">Reference Name</label>
                                    <input type="text" class="form-control" id="reference-name" name="reference-name[]"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="reference-phone">Major</label>
                                    <input type="text" class="form-control" id="reference-phone"
                                        name="reference-phone[]" required>
                                </div>
                                <div class="form-group">
                                    <label for="reference-email">Email</label>
                                    <input type="email" class="form-control" id="reference-email"
                                        name="reference-email[]" required>
                                </div>

                                <div class="form-group">
                                    <label for="reference-relationship">Relationship</label>
                                    <input type="text" class="form-control" id="reference-relationship"
                                        name="reference-relationship[]" required>
                                </div>
                                <!-- </form> -->

                                <button type="button" class="btn btn-primary mt-3" id="add-reference">Add More</button>

                                <div class="d-flex justify-content-between mt-4">
                                    <button type="button" class="btn btn-secondary mr-auto" id="back-to-certification"
                                        onclick="changeTab('certification')">Back</button>
                                    <button type="submit" id="next-to-end"
                                        class="btn btn-primary ml-auto">Submit</button>
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
    <div id="scrolltop"><a class="btn btn-secondary" href="#top"><span class="icon"><i
                    class="fas fa-angle-up fa-x"></i></span></a></div>
    <script src="./scripts/imagesloaded.pkgd.min.js?ver=1.2.0"></script>
    <script src="./scripts/masonry.pkgd.min.js?ver=1.2.0"></script>
    <script src="./scripts/BigPicture.min.js?ver=1.2.0"></script>
    <script src="./scripts/purecounter.min.js?ver=1.2.0"></script>
    <script src="./scripts/bootstrap.bundle.min.js?ver=1.2.0"></script>
    <script src="./scripts/aos.min.js?ver=1.2.0"></script>
    <script src="./scripts/main.js?ver=1.2.0"></script>

    <!-- required word handle -->
    <script>
        // Get all input elements with the 'required' attribute
        const requiredInputs = document.querySelectorAll('[required]');

        // Loop through each required input element and add an event listener
        requiredInputs.forEach(input => {
            const requiredLabel = document.createElement('span');
            requiredLabel.textContent = ' *';
            requiredLabel.style.color = 'red';
            requiredLabel.style.verticalAlign = 'middle';

            // Check if the input already has a value when the page loads
            if (input.value) {
                requiredLabel.textContent = '';
            }

            // Update the text of the corresponding span element when the input value changes
            input.addEventListener('input', () => {
                if (input.value) {
                    requiredLabel.textContent = '';
                } else {
                    requiredLabel.textContent = ' *(required)';
                }
            });

            // Insert the span element after the label element
            const label = input.parentNode.querySelector('label');
            label.insertBefore(requiredLabel, label.lastChild.nextSibling);
        });
    </script>


    <!-- Year/Salary handle -->
    <script>
        const educationLevel = document.getElementById('education-level');
        const graduationYearSelect = document.getElementById('graduation-year');

        // Disable the Graduation Year select when the Education Level is High School
        educationLevel.addEventListener('change', function () {
            if (educationLevel.value === 'high-school') {
                graduationYearSelect.value = '1234';
                graduationYearSelect.disabled = true;
            } else {
                graduationYearSelect.disabled = false;
            }
        });
        const salaryRangeInput = document.getElementById('salary-range');

        salaryRangeInput.addEventListener('input', function () {
            const cleanedValue = salaryRangeInput.value.replace(/[^0-9]/g, '');
            salaryRangeInput.value = cleanedValue;
        });

    </script>

    <!-- GPA handle -->
    <script>
        const gpaInput = document.getElementById('gpa');
        let gpaScaleSelect = document.querySelector('#gpa-scale');

        gpaScaleSelect.addEventListener('change', function () {
            let gpaScale = this.value;
            gpaInput.setAttribute('max', gpaScale);
        });




        // Set initial max value based on the selected scale
        const maxGpa = gpaScaleSelect.value;
        gpaInput.setAttribute('max', maxGpa);

        // Update max value when the selected scale changes
        gpaScaleSelect.addEventListener('change', function () {
            const newMaxGpa = gpaScaleSelect.value;
            gpaInput.setAttribute('max', newMaxGpa);
        });

        // Listen for input events on the GPA input element
        gpaInput.addEventListener('input', function () {
            const enteredGpa = parseFloat(gpaInput.value);
            const maxGpa = parseFloat(gpaInput.getAttribute('max'));

            // If the entered GPA is greater than the max value, set the input value to the max value
            if (enteredGpa > maxGpa) {
                gpaInput.value = maxGpa;
            }
        });
        gpaInput.addEventListener('input', function () {
            // Remove all non-numeric and non-decimal characters
            let cleanedValue = gpaInput.value;

            // Limit the input length to 4 characters
            if (cleanedValue.length > 4) {
                cleanedValue = cleanedValue.slice(0, 4);
                // Update the input value
                gpaInput.value = cleanedValue;
            }

            
        });
    </script>

    <!-- add many experience -->
    <script>
        function addExperienceForm() {
            let experienceCount = 1;
            document.querySelector('#add-experience').addEventListener('click', function () {
                // Create new form elements
                let newForm = document.createElement('div');
                newForm.classList.add('experience-forms');
                newForm.innerHTML = `
            <h5 class="mt-3">Next Experience </h5>
            <div class="form-group">
                    <label for="job-description[${experienceCount}]">Job Description</label>
                    <textarea class="form-control" id="job-description[${experienceCount}]" name="job-description[${experienceCount}]" 
                    placeholder="Tell us something about that job" rows="2"
                        required></textarea>
                </div>
                <div class="form-group">
                    <label for="job-duration[${experienceCount}]">Duration</label>
                    <input type="month" class="form-control" id="job-duration[${experienceCount}]" name="job-duration[${experienceCount}]" required>
                </div>
                <div class="form-group">
                    <label for="job-skills[${experienceCount}]">Skills Utilized</label>
                    <input type="text" class="form-control" placeholder="What you obtain after working at this position" 
                    name="job-skills[${experienceCount}]" required>
                </div>
            <button type="button" class="btn btn-danger my-3 remove-experience-form">Remove Experience</button>
        `;
                // Append the new form elements to the page
                this.parentNode.insertBefore(newForm, this);
                // Increment the experience count
                experienceCount++;
                // Add event listener to the new "Remove Experience" button
                newForm.querySelector('.remove-experience-form').addEventListener('click', function () {
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
            document.querySelector('#add-certification').addEventListener('click', function () {
                // Create new form elements
                let newForm = document.createElement('div');
                newForm.classList.add('certification-forms');
                newForm.innerHTML = `
            <h5 class="mt-3">Next Certification</h5>
            <div class="form-group">
                <label for="certification-name[${certificationCount}]">Certification Name</label>
                <input type="text" class="form-control" id="certification-name[${certificationCount}]" name="certification-name[${certificationCount}]" required>
            </div>
            <div class="form-group">
                <label for="certification-date[${certificationCount}]">Date</label>
                <input type="month" class="form-control" name="certification-date[${certificationCount}]" id="certification-date[${certificationCount}]" required>
            </div>
            <div class="form-group">
                <label for="certification-description[${certificationCount}]">Description</label>
                <textarea class="form-control" id="certification-description[${certificationCount}]"  name="certification-description[${certificationCount}]"  rows="2" required></textarea>
            </div>
            <button type="button" class="btn btn-danger my-3 remove-certification-form">Remove Certification</button>
        `;

                this.parentNode.insertBefore(newForm, this);

                certificationCount++;

                newForm.querySelector('.remove-certification-form').addEventListener('click', function () {
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
            document.querySelector('#add-reference').addEventListener('click', function () {
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

                newForm.querySelector('.remove-reference-form').addEventListener('click', function () {
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


    <!-- Change tab handle -->
    <script>
        function changeTab(tab) {
            document.getElementById(tab + "-tab").disabled = false;
            validationTab(tab);
            var tabs = document.getElementsByClassName("tab-pane");
            let tabButton = document.getElementById(`${tab}-tab`);
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

            document.getElementById(tab + "-tab").classList.add('active');
            document.querySelector('.active').style.backgroundColor = "lightblue"
            const scrolling = document.getElementById('card-cv');

            scrolling.scrollIntoView();

        }
    </script>

    <!-- validation handle -->
    <script>
        // Enable the next button only when all required fields have been filled
        function validationTab(tab) {
            let activeTabIndex = tabIndex[tab];
            // Get the index of the active tab

            // Get the next button

            let nextButton = document.getElementById(`next-to-${Object.entries(tabIndex)[activeTabIndex[0] + 1][0]}`);

            // Get all required inputs in the active tab
            let requiredInputs = document.querySelectorAll(`#${Object.entries(tabIndex)[activeTabIndex[0]][0]}-section [required]`);

            // Disable the next button initially
            if (!tabIndex[tab][1]) {
                nextButton.disabled = true;
            } else {
                nextButton.disabled = false;

            }
            requiredInputs.forEach(function (input) {
                input.addEventListener("input", function () {
                    if (checkRequiredInputs()) {
                        nextButton.disabled = false;
                        document.getElementById(tab + "-tab").disabled = false;
                        tabIndex[tab][1] = 1;
                    } else {
                        nextButton.disabled = true;
                    }
                });
            });

            // Check if all required inputs in the active tab are filled
            function checkRequiredInputs() {
                let allFilled = true;
                requiredInputs.forEach(function (input) {
                    if (input.value === "") {
                        allFilled = false;
                    }
                });
                return allFilled;
            }
            // Get all tab content elements 
        }
    </script>

    <script>
        for (var idx = 0; idx < Object.keys(tabIndex).length - 1; idx++) {
            document.getElementById(Object.entries(tabIndex)[idx][0] + "-tab").disabled = !Object.entries(tabIndex)[idx][1][1];
            document.getElementById(Object.entries(tabIndex)[idx][0] + "-tab").style.backgroundColor = "lightpink";
        }
    </script>

    <!-- submit handle -->
    <script>
        const form = document.getElementById('cv-form');

        form.addEventListener('keydown', function (event) {
            if (event.key === 'Enter') {
                event.preventDefault();
                changeTab('next-tab');
            }
        });

    </script>
</body>

</html>