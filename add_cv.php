<!DOCTYPE html>
<html lang="en">

<?php 
require_once('inc/header.php');
require_once('database/dbconnect.php');

?>

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

</script>
<?php
$experienceCount = 0;
$certificationCount = 0;
$referenceCount = 0;
$jobCount = 0;
?>

<body id="top">
    <?php require_once('inc/topBarNav.php');
    if (!isset($_SESSION["user_id"])) {
        header('Location: index.php?page=home');
    }
    else {
        $user_id = $_SESSION["user_id"];
    }
    $name_check = $conn->prepare("SELECT firstname, lastname FROM `users` WHERE `id` = $user_id");
    $name_check->execute();
    $name_info = $name_check->get_result();
    $row_name = $name_info->fetch_assoc();

    if (empty($row_name['firstname']) || empty($row_name['lastname'])) {
        $_SESSION['label'] = "Error";
        $_SESSION['message'] = "Please Fulfill your information";
        header('Location: index.php?page=profile');
    }

    ?>
    <div class="page-content bg-light">
        <div id="content">
            <header>
                <div class="cover bg-light">
                    <div class="row bg-success">
                        <img src="images/ezgif.com-crop.gif" style="max-height: 350px; width: 100%;">
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
            <div class="col-7 col-sm-10 col-md-6">
                <ul class="nav nav-tabs flex-column flex-md-row" id="cv-Tab">
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

                <form id="cv-form" method="POST" action="index.php?page=action\add_cv_processing">

                    <input type="hidden" name="page" value="action\add_cv_processing">

                    <div class="card border-success rounded">
                        <div class="card-body tab-content">
                            <!-- Personal Information Section -->
                            <div class="tab-pane active" id="personal-section">
                                <input type="hidden" id="activeTabIndex" value="0">
                                <p class="card-text h4">Start: Personal Information</p>
                                <p class="text" style="color: blue">First, we need to confirm your personal information
                                </p>
                                <?php
                                require_once('./config.php');
                                $servername = DB_SERVER;
                                $username = DB_USERNAME;
                                $password = DB_PASSWORD;
                                $dbname = DB_NAME;
                                $conn = new mysqli($servername, $username, $password, $dbname);

                                // Get the user's type by querying the database with the user_id stored in the session
                                $user_id = $_SESSION["user_id"];
                                $user_info = $conn->prepare("SELECT * FROM users WHERE users.id = ? ");
                                $user_info->bind_param("i", $user_id);
                                $user_info->execute();
                                $result = $user_info->get_result();
                                $row = $result->fetch_assoc();


                                $obj_info = $conn->prepare("SELECT users.firstname, users.lastname, users.email, users.phone, users.address, resume.id, resume.title, resume.position, resume.employment_type, resume.desire_salary, resume.goals FROM users INNER JOIN `resume` ON users.id = resume.user_id WHERE users.id = $user_id ");
                                $obj_info->execute();
                                $result_obj = $obj_info->get_result();
                                $row_obj = $result_obj->fetch_assoc();
                                if (isset($row_obj['id'])) {
                                    $resume_id = $row_obj['id'];
                                } else {
                                    $resume_id = -999;
                                }


                                $additional_info = $conn->prepare("SELECT additional_information.hobbies, additional_information.habits, additional_information.personal_info FROM additional_information WHERE additional_information.user_id = $user_id AND additional_information.resume_id = $resume_id");
                                $additional_info->execute();
                                $result_additional = $additional_info->get_result();
                                $row_additional = $result_additional->fetch_assoc();
                                ?>
                                <label for="first-name" class="mt-2">First Name</label>
                                <input type="text" class="form-control" name="first-name" id="first-name" disabled
                                    value="<?php echo $row['firstname']; ?>">
                                <label for="last-name" class="mt-2">Last Name</label>
                                <input type="text" class="form-control" name="last-name"
                                    placeholder="Hãy nói với chúng tôi và chúng tôi đổi khai sinh của bạn"
                                    id="last-name" disabled value="<?php echo $row['lastname']; ?>">
                                <label for="email" class="mt-2">Email</label>
                                <input type="text" id="email" name="email" class="form-control" disabled
                                    value="<?php echo $row['email']; ?>">
                                <label for="phone-number" class="mt-2">Phone Number:</label>
                                <input type="text" id="phone-number" name="phone-number" class="form-control" disabled
                                    value="<?php echo $row['phone']; ?>">
                                <label for="address" class="mt-2">Address</label>
                                <input type="text" id="address" name="address" class="form-control" disabled
                                    value="<?php echo $row['address']; ?>">
                                <label for="additional-info" class="mt-2">Additional Information:</label>
                                <div class="form-group mt-2">
                                    <label for="habit">Habit</label>
                                    <input type="text" class="form-control" placeholder="Something about your habit"
                                        id="habit" name="habit" value="<?php if (isset($row_additional['habits'])) {
                                            echo $row_additional['habits'];
                                        } else {
                                            echo "";
                                        } ?>">
                                </div>
                                <div class="form-group mt-2">
                                    <label for="hobbies">Hobbies</label>
                                    <input type="text" class="form-control" placeholder="Something about your hobbies"
                                        id="hobbies" name="hobbies" value="<?php if (isset($row_additional['hobbies'])) {
                                            echo $row_additional['hobbies'];
                                        } else {
                                            echo "";
                                        } ?>">
                                </div>
                                <div class="form-group mt-2">
                                    <label for="personal-information">Personal Information</label>
                                    <textarea class="form-control" id="personal-information" name="personal-information"
                                        rows="3" placeholder="Share us something about yourself: 
Ex: a language, playing a guitar, i am a vegetarian...."><?php if (isset($row_additional['personal_info'])) {
    echo $row_additional['personal_info'];
} else {
    echo "";
} ?></textarea>
                                </div>
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
                                <div class="form-group mt-1">
                                    <label for="job-title">Job Title</label>
                                    <input placeholder="Job Title" type="text" class="form-control" id="job-title"
                                        name="job-title" value="<?php if (isset($row_obj['title'])) {
                                            echo $row_obj['title'];
                                        } else {
                                            echo "";
                                        } ?>" required>
                                </div>
                                <div class="form-group mt-1">
                                    <label for="position">Postion</label>
                                    <input placeholder="Tell us the position you want to apply: fresher, junior, etc.."
                                        type="text" class="form-control" value="<?php if (isset($row_obj['position'])) {
                                            echo $row_obj['position'];
                                        } else {
                                            echo "";
                                        } ?>" id="position" name="position" required>
                                </div>
                                <div class="form-group mt-1">
                                    <label for="employment-type">Type of Employment</label>
                                    <select class="form-control" required id="employment-type" name="employment-type">
                                        <option value="">-- Select --</option>
                                        <option value="full-time" <?php if (isset($row_obj['employment_type']) && $row_obj['employment_type'] == 'full-time')
                                            echo 'selected'; ?>>Full-time
                                        </option>
                                        <option value="part-time" <?php if (isset($row_obj['employment_type']) && $row_obj['employment_type'] == 'part-time')
                                            echo 'selected'; ?>>Part-time
                                        </option>
                                        <option value="contract" <?php if (isset($row_obj['employment_type']) && $row_obj['employment_type'] == 'contract')
                                            echo 'selected'; ?>>Contract
                                        </option>
                                        <option value="freelance" <?php if (isset($row_obj['employment_type']) && $row_obj['employment_type'] == 'freelance')
                                            echo 'selected'; ?>>Freelance
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group mt-1">
                                    <label for="">Desired Salary Range</label>
                                    <div class="input-group">
                                        <label class="input-group-text" for="salary-range">Apprx</label>
                                        <input placeholder="Ex: 20." type="number" min="1" step="1" class="form-control"
                                            required id="salary-range" name="salary-range" value="<?php if (isset($row_obj['desire_salary'])) {
                                                echo $row_obj['desire_salary'];
                                            } else {
                                                echo "";
                                            } ?>">
                                        <span class="input-group-text">.000.000 VND</span>
                                    </div>
                                </div>
                                <div class="form-group mt-1">
                                    <label for="qualifications">Qualifications and Career Goals</label>
                                    <textarea placeholder="Tell us about your aim and goal, and expectation about job"
                                        required class="form-control" id="qualifications" name="qualifications"
                                        rows="2"><?php if (isset($row_obj['goals'])) {
                                            echo $row_obj['goals'];
                                        } else {
                                            echo "";
                                        } ?></textarea>
                                </div>
                                <div class="d-flex justify-content-between mt-4">
                                    <button type="button" class="btn btn-secondary mr-auto" id="back-to-personal"
                                        onclick="changeTab('personal')">Back</button>
                                    <button type="button" class="btn btn-primary ml-auto" id="next-to-education"
                                        onclick="changeTab('education')">Next</button>
                                </div>
                            </div>
                            <?php
                            $edu_info = $conn->prepare("SELECT education.school, education.major, education.degree, education.year, education.gpa FROM education WHERE education.user_id = $user_id AND education.resume_id = $resume_id");
                            $edu_info->execute();
                            $result_edu = $edu_info->get_result();
                            $row_edu = $result_edu->fetch_assoc();
                            ?>
                            <!-- Education Section -->
                            <div class="tab-pane" id="education-section">
                                <input type="hidden" id="activeTabIndex" value="2">
                                <h4>Step 2/6: Education</h4>
                                <div class="form-group mt-1">
                                    <label for="school-name">School/University name</label>
                                    <input type="text" placeholder="Your University/ School" class="form-control"
                                        id="school-name" name="school-name" value="<?php if (isset($row_edu['school'])) {
                                            echo $row_edu['school'];
                                        } else {
                                            echo "";
                                        } ?>" required>
                                </div>
                                <div class="form-group mt-1">
                                    <label for="degree-name">Major/Course name</label>
                                    <input type="text" placeholder="Your majority/ course name" class="form-control"
                                        id="degree-name" name="degree-name" value="<?php if (isset($row_edu['major'])) {
                                            echo $row_edu['major'];
                                        } else {
                                            echo "";
                                        } ?>" required>
                                </div>
                                <div class="form-group mt-1">
                                    <label for="education-level">Education level</label>
                                    <select class="form-control" id="education-level" name="education-level" required>
                                        <option value="">-- Select --</option>
                                        <option value="High School" <?php if (isset($row_edu['degree']) && $row_edu['degree'] == 'High School') {
                                            echo 'selected';
                                        } ?>>High School
                                        </option>
                                        <option value="Under Graduated" <?php if (isset($row_edu['degree']) && $row_edu['degree'] == "Under Graduated") {
                                            echo 'selected';
                                        } ?>>Under Graduated</option>
                                        <option value="Bachelor" <?php if (isset($row_edu['degree']) && $row_edu['degree'] == "Bachelor") {
                                            echo 'selected';
                                        } ?>>Bachelor's Degree
                                        </option>
                                        <option value="MBA" <?php if (isset($row_edu['degree']) && $row_edu['degree'] == 'MBA') {
                                            echo 'selected';
                                        } ?>>MBA</option>
                                        <option value="Graduate" <?php if (isset($row_edu['degree']) && $row_edu['degree'] == 'Graduate') {
                                            echo 'selected';
                                        } ?>>Graduate Degree
                                        </option>
                                        <option value="Post Graduate" <?php if (isset($row_edu['degree']) && $row_edu['degree'] == 'Post Graduate') {
                                            echo 'selected';
                                        } ?>>Post-Graduate   Degree</option>
                                        <option value="Ph.D" <?php if (isset($row_edu['degree']) && $row_edu['degree'] == 'Ph.D') {
                                            echo 'selected';
                                        } ?>>Doctor of Philosophy
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group mt-1">
                                    <label for="graduation-year">Graduation Year</label>
                                    <select class="form-control" id="graduation-year" name="graduation-year">
                                        <option value="">-- Select --</option>
                                        <option value="1234">High School</option>
                                        <!-- Generate options for years from 1990 to 2023 -->
                                        <?php
                                        for ($i = 2030; $i >= 1990; $i--) {
                                            if (isset($row_edu['year']) && $row_edu['year'] == $i) {
                                                echo "<option value='$i' selected>$i</option>";
                                            } else {
                                                echo "<option value='$i'>$i</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group mt-1">
                                    <label for="">GPA</label>
                                    <div class="input-group">
                                        <label class="input-group-text" for="gpa-scale"> </label>
                                        <input type="number" step="0.01" max="10" required class="form-control" id="gpa"
                                            placeholder="7.0" name="gpa"
                                            value="<?php echo isset($row_edu['gpa']) ? $parts = explode('/', $row_edu['gpa'])[0] : ''; ?>">
                                        <select class="form-control" id="gpa-scale" name="gpa-scale" required>
                                            <option value="10" <?php if ((isset($row_edu['gpa'])) && $parts = explode('/', $row_edu['gpa'])[1] == 10) {
                                                echo 'selected';
                                            } ?>>/10</option>
                                            <option value="4" <?php if ((isset($row_edu['gpa'])) && $parts = explode('/', $row_edu['gpa'])[1] == 4) {
                                                echo 'selected';
                                            } ?>>/4</option>
                                        </select>
                                        <div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between mt-4">
                                    <button type="button" class="btn btn-secondary mr-auto" id="back-to-objective"
                                        onclick="changeTab('objective')">Back</button>
                                    <button type="button" class="btn btn-primary ml-auto" id="next-to-experience"
                                        onclick="changeTab('experience')">Next</button>
                                </div>
                            </div>
                            <?php
                            $skill_info = $conn->prepare("SELECT skill.skill FROM skill WHERE skill.resume_id = $resume_id AND skill.user_id = $user_id AND skill.skill <> ''");
                            $skill_info->execute();
                            $result_skill = $skill_info->get_result();
                            $row_skill = $result_skill->fetch_assoc();
                            ?>
                            <!-- Professional Skills -->
                            <div class="tab-pane" id="experience-section" style="display: none;">
                                <input type="hidden" id="activeTabIndex" value="3">
                                <?php $experienceCount++; ?>
                                <h4>Step 3/6: Professional Experience</h4>
                                <h5>First Skill</h5>
                                <div class="form-group mt-1">
                                    <label for="job-skills">Skills Utilized</label>
                                    <input type="text" class="form-control" id="job-skills"
                                        placeholder="What skill that you obtained" name="job-skills[]" value="<?php if (isset($row_skill['skill'])) {
                                            echo $row_skill['skill'];
                                        } else {
                                            echo "";
                                        } ?>" required>
                                    <?php while($row_skill = $result_skill->fetch_assoc()): ?>
                                        <input type="search" class="form-control" id="job-skills"
                                        placeholder="Leave blank if you want to delete it" name="job-skills[]" value="<?php if (isset($row_skill['skill'])) {
                                            echo $row_skill['skill'];
                                        }?>">
                                    <?php endwhile; ?>
                                </div>
                                <button type="button" class="btn btn-success my-3" id="add-experience">Add
                                    New skill</button>
                                <!-- Add a Next button to go to the next section -->
                                <div class="d-flex justify-content-between mt-4">
                                    <button type="button" class="btn btn-secondary mr-auto" id="back-to-education"
                                        onclick="changeTab('education')">Back</button>
                                    <button type="button" class="btn btn-primary ml-auto" id="next-to-history"
                                        onclick="changeTab('history')">Next</button>
                                </div>
                            </div>

                            <?php
                            $work_info = $conn->prepare("SELECT working_history.position, working_history.company_name, working_history.duration, working_history.work_type, working_history.tasks FROM working_history WHERE working_history.resume_id = $resume_id AND working_history.user_id = $user_id
                                                        AND working_history.position <> '' 
                                                        AND working_history.company_name <> '' 
                                                        AND working_history.duration <> '' 
                                                        AND working_history.work_type <> '' 
                                                        AND working_history.tasks <> ''
                                                        ");
                            $work_info->execute();
                            $result_work = $work_info->get_result();
                            $row_work = $result_work->fetch_assoc();
                            ?>
                            <!-- Work history Section -->
                            <div class="tab-pane" id="history-section">
                                <input type="hidden" id="activeTabIndex" value="4">
                                <?php $jobCount++; ?>
                                <h4>Step 4/6: Work History</h4>
                                <h5>Lastest Job</h5>
                                <p class="text" style="color: blue">Please show us your latest job, or your most
                                    impressive experience </p>
                                <div class="form-group mt-1">
                                    <label for="job-name">Job Position</label>
                                    <input type="text" class="form-control" id="job-name" name="job-name[]"
                                        placeholder="Job Name" value="<?php if (isset($row_work['position'])) {
                                            echo $row_work['position'];
                                        } else {
                                            echo "";
                                        } ?>" required>
                                </div>
                                <div class="form-group mt-1">
                                    <label for="company-name">Company Name</label>
                                    <input type="text" class="form-control" placeholder="Name of the Company"
                                        id="company-name" name="company-name[]" value="<?php if (isset($row_work['company_name'])) {
                                            echo $row_work['company_name'];
                                        } else {
                                            echo "";
                                        } ?>" required>
                                </div>
                                <div class="form-group mt-1">
                                    <label for="employment-degree">Type of Employment</label>
                                    <select class="form-control" id="employment-degree" required
                                        name="employment-degree[]">
                                        <option value="">-- Select --</option>
                                        <option value="full-time" <?php if (isset($row_work['work_type']) && $row_work['work_type'] == 'full-time')
                                            echo 'selected'; ?>>Full-time
                                        </option>
                                        <option value="part-time" <?php if (isset($row_work['work_type']) && $row_work['work_type'] == 'part-time')
                                            echo 'selected'; ?>>Part-time
                                        </option>
                                        <option value="contract" <?php if (isset($row_work['work_type']) && $row_work['work_type'] == 'contract')
                                            echo 'selected'; ?>>Contract
                                        </option>
                                        <option value="freelance" <?php if (isset($row_work['work_type']) && $row_work['work_type'] == 'freelance')
                                            echo 'selected'; ?>>Freelance
                                        </option>
                                        <option value="internship" <?php if (isset($row_work['work_type']) && $row_work['work_type'] == 'internship')
                                            echo 'selected'; ?>>Internship
                                        </option>
                                    </select>
                                </div>

                                <div class="form-group mt-1">
                                    <label for="job-duration">Duration</label>
                                    <select class="form-control" id="job-duration" name="job-duration[]" required>
                                        <option value="">-- Select --</option>
                                        <option value="0" <?php if (isset($row_work['duration']) && $row_work['duration'] == '0')
                                            echo 'selected'; ?>>Less Than 6 Months
                                        </option>
                                        <option value="1" <?php if (isset($row_work['duration']) && $row_work['duration'] == '1')
                                            echo 'selected'; ?>>6 Months to < 1
                                                Years</option>
                                        <option value="2" <?php if (isset($row_work['duration']) && $row_work['duration'] == '2')
                                            echo 'selected'; ?>>1 Years to < 2
                                                Years</option>
                                        <option value="3" <?php if (isset($row_work['duration']) && $row_work['duration'] == '3')
                                            echo 'selected'; ?>>2 Years to < 3
                                                Years</option>
                                        <option value="4" <?php if (isset($row_work['duration']) && $row_work['duration'] == '4')
                                            echo 'selected'; ?>>3 Years to < 4
                                                Years</option>
                                        <option value="5" <?php if (isset($row_work['duration']) && $row_work['duration'] == '5')
                                            echo 'selected'; ?>>4 Years to < 5
                                                Years</option>
                                        <option value="6" <?php if (isset($row_work['duration']) && $row_work['duration'] == '6')
                                            echo 'selected'; ?>>Over 5 Years</option>
                                        <option value="-1" <?php if (isset($row_work['duration']) && $row_work['duration'] == '-1')
                                            echo 'selected'; ?>>Still in Job</option>
                                    </select>
                                </div>
                                <div class="form-group mt-1 ">
                                    <label for="working-description">Job Description</label>
                                    <textarea class="form-control" id="working-description"
                                        placeholder="Tell us something about that working experience such as which tasks you have done, ..."
                                        name="working-description[]" rows="2" required><?php if (isset($row_work['tasks'])) {
                                            echo $row_work['tasks'];
                                        } else {
                                            echo "";
                                        } ?></textarea>
                                </div>
                                <?php while($row_work = $result_work->fetch_assoc()): ?>
                                    <br/>
                                    <h5>Another Job</h5>
                                <p class="text" style="color: blue">If you want to delete an old work-history, just simply leave Job Position or Company Name field blank</p>
                                <div class="form-group mt-1">
                                    <label for="job-name">Job Position</label>
                                    <input type="search" class="form-control" id="job-name" name="job-name[]"
                                        placeholder="Leave blank if you want to delete it" value="<?php if (isset($row_work['position'])) {
                                            echo $row_work['position'];
                                        }?>">
                                </div>
                                <div class="form-group mt-1">
                                    <label for="company-name">Company Name</label>
                                    <input type="search" class="form-control" placeholder="Leave blank if you want to delete it"
                                        id="company-name" name="company-name[]" value="<?php if (isset($row_work['company_name'])) {
                                            echo $row_work['company_name'];
                                        }?>" >
                                </div>
                                <div class="form-group mt-1">
                                    <label for="employment-degree">Type of Employment</label>
                                    <select class="form-control" id="employment-degree" required
                                        name="employment-degree[]">
                                        <option value="">-- Select --</option>
                                        <option value="full-time" <?php if (isset($row_work['work_type']) && $row_work['work_type'] == 'full-time')
                                            echo 'selected'; ?>>Full-time
                                        </option>
                                        <option value="part-time" <?php if (isset($row_work['work_type']) && $row_work['work_type'] == 'part-time')
                                            echo 'selected'; ?>>Part-time
                                        </option>
                                        <option value="contract" <?php if (isset($row_work['work_type']) && $row_work['work_type'] == 'contract')
                                            echo 'selected'; ?>>Contract
                                        </option>
                                        <option value="freelance" <?php if (isset($row_work['work_type']) && $row_work['work_type'] == 'freelance')
                                            echo 'selected'; ?>>Freelance
                                        </option>
                                        <option value="internship" <?php if (isset($row_work['work_type']) && $row_work['work_type'] == 'internship')
                                            echo 'selected'; ?>>Internship
                                        </option>
                                    </select>
                                </div>

                                <div class="form-group mt-1">
                                    <label for="job-duration">Duration</label>
                                    <select class="form-control" id="job-duration" name="job-duration[]" required>
                                        <option value="">-- Select --</option>
                                        <option value="0" <?php if (isset($row_work['duration']) && $row_work['duration'] == '0')
                                            echo 'selected'; ?>>Less Than 6 Months
                                        </option>
                                        <option value="1" <?php if (isset($row_work['duration']) && $row_work['duration'] == '1')
                                            echo 'selected'; ?>>6 Months to < 1
                                                Years</option>
                                        <option value="2" <?php if (isset($row_work['duration']) && $row_work['duration'] == '2')
                                            echo 'selected'; ?>>1 Years to < 2
                                                Years</option>
                                        <option value="3" <?php if (isset($row_work['duration']) && $row_work['duration'] == '3')
                                            echo 'selected'; ?>>2 Years to < 3
                                                Years</option>
                                        <option value="4" <?php if (isset($row_work['duration']) && $row_work['duration'] == '4')
                                            echo 'selected'; ?>>3 Years to < 4
                                                Years</option>
                                        <option value="5" <?php if (isset($row_work['duration']) && $row_work['duration'] == '5')
                                            echo 'selected'; ?>>4 Years to < 5
                                                Years</option>
                                        <option value="6" <?php if (isset($row_work['duration']) && $row_work['duration'] == '6')
                                            echo 'selected'; ?>>Over 5 Years</option>
                                        <option value="-1" <?php if (isset($row_work['duration']) && $row_work['duration'] == '-1')
                                            echo 'selected'; ?>>Still in Job</option>
                                    </select>
                                </div>
                                <div class="form-group mt-1 ">
                                    <label for="working-description">Job Description</label>
                                    <textarea class="form-control" id="working-description"
                                        placeholder="Leave blank if you want to delete it"
                                        name="working-description[]" rows="2" ><?php if (isset($row_work['tasks'])) {
                                            echo $row_work['tasks'];
                                        }?></textarea>
                                </div>
                                <?php endwhile; ?>



                                <button type="button" class="btn btn-primary mt-3" id="add-job">Add More</button>
                                <div class="d-flex justify-content-between mt-4">
                                    <button type="button" class="btn btn-secondary mr-auto" id="back-to-experience"
                                        onclick="changeTab('experience')">Back</button>
                                    <button type="button" class="btn btn-primary ml-auto" id="next-to-certification"
                                        onclick="changeTab('certification')">Next</button>
                                </div>
                            </div>

                            <?php
                            $certi_info = $conn->prepare("SELECT certificate.title, certificate.organization, certificate.obtained_date, certificate.expiration_date FROM certificate WHERE certificate.resume_id = $resume_id AND certificate.user_id = $user_id
                                                        AND certificate.title <> ''
                                                        AND certificate.organization <> ''
                                                        AND certificate.obtained_date <> ''
                                                        AND certificate.expiration_date <> ''");
                            $certi_info->execute();
                            $result_certi = $certi_info->get_result();
                            $row_certi = $result_certi->fetch_assoc();
                            ?>
                            <!-- Certiftication -->
                            <div class="tab-pane" id="certification-section" style="display: none;">
                                <input type="hidden" id="activeTabIndex" value="5">
                                <?php $certificationCount++; ?>
                                <h4>Step 5/6: Certifications</h4>
                                <h5>First Certification</h5>
                                <div class="form-group mt-1">
                                    <label for="certification-name">Certification Name</label>
                                    <input type="text" class="form-control" id="certification-name"
                                        placeholder="Certification title" name="certification-name[]" value="<?php if (isset($row_certi['title'])) {
                                            echo $row_certi['title'];
                                        } else {
                                            echo "";
                                        } ?>" required>
                                </div>
                                <div class="form-group mt-1">
                                    <label for="certification-organization">Organization</label>
                                    <textarea class="form-control" id="certification-organization"
                                        name="certification-organization[]" placeholder="Organization provider" rows="1"
                                        required><?php if (isset($row_certi['organization'])) {
                                            echo $row_certi['organization'];
                                        } else {
                                            echo "";
                                        } ?></textarea>
                                </div>
                                <div class="form-group mt-1">
                                    <label for="certification-date">Obtained date</label>
                                    <input type="date" class="form-control" id="certification-date"
                                        name="certification-date[]" value="<?php if (isset($row_certi['obtained_date'])) {
                                            echo $row_certi['obtained_date'];
                                        } else {
                                            echo "";
                                        } ?>" required>
                                </div>
                                <div class="form-group mt-1">
                                    <label for="expire-date">Expired date</label>
                                    <input type="date" class="form-control" id="expire-date" name="expire-date[]" value="<?php if (isset($row_certi['expiration_date'])) {
                                        echo $row_certi['expiration_date'];
                                    } else {
                                        echo "";
                                    } ?>">
                                </div>
                                <?php while($row_certi = $result_certi->fetch_assoc()): ?>
                                    <br/>
                                    <h5>Another Certification</h5>
                                    <p class="text" style="color: blue">If you want to delete a certificate, just simply leave Certification Name field blank</p>
                                <div class="form-group mt-1">
                                    <label for="certification-name">Certification Name</label>
                                    <input type="search" class="form-control" id="certification-name"
                                        placeholder="Leave blank if you want to delete it" name="certification-name[]" value="<?php if (isset($row_certi['title'])) {
                                            echo $row_certi['title'];
                                        }?>">
                                </div>
                                <div class="form-group mt-1">
                                    <label for="certification-organization">Organization</label>
                                    <textarea class="form-control" id="certification-organization"
                                        name="certification-organization[]" placeholder="Organization provider" rows="1"
                                        required><?php if (isset($row_certi['organization'])) {
                                            echo $row_certi['organization'];
                                        }?></textarea>
                                </div>
                                <div class="form-group mt-1">
                                    <label for="certification-date">Obtained date</label>
                                    <input type="date" class="form-control" id="certification-date"
                                        name="certification-date[]" value="<?php if (isset($row_certi['obtained_date'])) {
                                            echo $row_certi['obtained_date'];
                                        }?>" required>
                                </div>
                                <div class="form-group mt-1">
                                    <label for="expire-date">Expired date</label>
                                    <input type="date" class="form-control" id="expire-date" name="expire-date[]" value="<?php if (isset($row_certi['expiration_date'])) {
                                        echo $row_certi['expiration_date'];
                                    }?>">
                                </div>
                                <?php endwhile; ?>


                                <button type="button" class="btn btn-primary mt-3" id="add-certification">Add
                                    More</button>
                                <div class="d-flex justify-content-between mt-4">
                                    <button type="button" class="btn btn-secondary mr-auto" id="back-to-history"
                                        onclick="changeTab('history')">Back</button>
                                    <button type="button" class="btn btn-primary ml-auto" id="next-to-reference"
                                        onclick="changeTab('reference')">Next</button>
                                </div>
                            </div>
                            
                            <?php
                            $refer_info = $conn->prepare("SELECT reference.name, reference.email, reference.phone, reference.relationship FROM reference WHERE reference.resume_id = $resume_id AND reference.user_id = $user_id
                                                        AND reference.name <> ''
                                                        AND reference.email <> ''
                                                        AND reference.phone <> ''
                                                        AND reference.relationship <> ''");
                            $refer_info->execute();
                            $result_refer = $refer_info->get_result();
                            $row_refer = $result_refer->fetch_assoc();
                            ?>
                            <!-- Refernce -->
                            <div class="tab-pane" id="reference-section" style="display: none;">
                                <input type="hidden" id="activeTabIndex" value="6">
                                <?php $referenceCount++; ?>
                                <h4>Step 6/6: References</h4>
                                <h5>First Reference</h5>

                                <div class="form-group">
                                    <label for="reference-name">Name</label>
                                    <input type="text" class="form-control" id="reference-name" name="reference-name[]"
                                        placeholder="Relationship's name" value="<?php if (isset($row_refer['name'])) {
                                            echo $row_refer['name'];
                                        } else {
                                            echo "";
                                        } ?>" required>
                                </div>
                                <div class="form-group mt-1">
                                    <label for="reference-email">Email</label>
                                    <input type="email" class="form-control" id="reference-email"
                                        name="reference-email[]" placeholder="Email" value="<?php if (isset($row_refer['email'])) {
                                            echo $row_refer['email'];
                                        } else {
                                            echo "";
                                        } ?>" required>
                                </div>
                                <div class="form-group mt-1">
                                    <label for="reference-phone">Phone</label>
                                    <input type="text" class="form-control" id="reference-phone"
                                        name="reference-phone[]" placeholder="Phone" value="<?php if (isset($row_refer['phone'])) {
                                            echo $row_refer['phone'];
                                        } else {
                                            echo "";
                                        } ?>" required>
                                </div>
                                <div class="form-group mt-1">
                                    <label for="reference-relationship">Relationship</label>
                                    <input type="text" class="form-control" id="reference-relationship"
                                        placeholder="Ex: Lecturer, Mentor, etc" name="reference-relationship[]" value="<?php if (isset($row_refer['relationship'])) {
                                            echo $row_refer['relationship'];
                                        } else {
                                            echo "";
                                        } ?>" required>
                                </div>
                                <?php while($row_refer = $result_refer->fetch_assoc()): ?>
                                    <br/>
                                    <h5>Another Reference</h5>
                                    <p class="text" style="color: blue">If you want to delete a reference, just simply leave any field blank</p>
                                <div class="form-group">
                                    <label for="reference-name">Name</label>
                                    <input type="search" class="form-control" id="reference-name" name="reference-name[]"
                                        placeholder="Leave blank if you want to delete it" value="<?php if (isset($row_refer['name'])) {
                                            echo $row_refer['name'];
                                        }?>" >
                                </div>
                                <div class="form-group mt-1">
                                    <label for="reference-email">Email</label>
                                    <input type="email" class="form-control" id="reference-email"
                                        name="reference-email[]" placeholder="Email" value="<?php if (isset($row_refer['email'])) {
                                            echo $row_refer['email'];
                                        }?>" >
                                </div>
                                <div class="form-group mt-1">
                                    <label for="reference-phone">Phone</label>
                                    <input type="search" class="form-control" id="reference-phone"
                                        name="reference-phone[]" placeholder="Leave blank if you want to delete it" value="<?php if (isset($row_refer['phone'])) {
                                            echo $row_refer['phone'];
                                        }?>" >
                                </div>
                                <div class="form-group mt-1">
                                    <label for="reference-relationship">Relationship</label>
                                    <input type="search" class="form-control" id="reference-relationship"
                                        placeholder="Leave blank if you want to delete it" name="reference-relationship[]" value="<?php if (isset($row_refer['relationship'])) {
                                            echo $row_refer['relationship'];
                                        }?>" >
                                </div>
                                <?php endwhile; ?>



                                <button type="button" class="btn btn-primary mt-3" id="add-reference">Add More</button>

                                <div class="d-flex justify-content-between mt-4">
                                    <button type="button" class="btn btn-secondary mr-auto" id="back-to-certification"
                                        onclick="changeTab('certification')">Back</button>
                                    <button type="submit" id="next-to-end"
                                        class="btn btn-primary ml-auto" onclick="confirm('Are you sure and want to continue?')">Submit</button>
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

    <div>
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

        <!-- validation handle -->
        <script>
            // Enable the next button only when all required fields have been filled

            function validationTab(tab) {
                let activeTabIndex = tabIndex[tab];
                // Get the index of the active tab

                let nextButton = document.getElementById(`next-to-${Object.entries(tabIndex)[activeTabIndex[0] + 1][0]}`);
                // Get all required inputs in the active tab
                let requiredInputs = document.querySelectorAll(`#${Object.entries(tabIndex)[activeTabIndex[0]][0]}-section [required]`);

                let buttons = document.querySelectorAll("#add-reference, #add-experience, #add-certification, #add-job");
                // Add event listener to each button
                buttons.forEach(function (button) {
                    button.addEventListener("click", function () {
                        // Update required inputs
                        requiredInputs.forEach(function (input) {
                            input.removeEventListener("keyup", onInputEvent);
                        });
                        requiredInputs = document.querySelectorAll(`#${Object.entries(tabIndex)[activeTabIndex[0]][0]}-section [required]`);
                        attachEventListeners("keyup");
                        inputValidation(nextButton, tab, tabIndex);
                    });
                });
                // Disable the next button initially
                if (!tabIndex[tab][1]) {
                    nextButton.disabled = true;
                } else {
                    nextButton.disabled = false;
                }
                function inputValidation(nextButton, tab, tabIndex) {
                    if (checkRequiredInputs()) {
                        nextButton.disabled = false;
                        document.getElementById(tab + "-tab").disabled = false;
                        tabIndex[tab][1] = 1;
                    } else {
                        nextButton.disabled = true;
                    }
                }

                function onInputEvent() {
                    inputValidation(nextButton, tab, tabIndex);
                }

                function attachEventListeners(eventType) {
                    requiredInputs.forEach(function (input) {
                        input.addEventListener(eventType, onInputEvent);
                    });
                }


                attachEventListeners("mousemove");
                attachEventListeners("keyup");

                // Check if all required inputs in the active tab are filled
                function checkRequiredInputs() {
                    let allFilled = true;
                    requiredInputs = document.querySelectorAll(`#${Object.entries(tabIndex)[activeTabIndex[0]][0]}-section [required]`);
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


        <!-- Nav bar Handle -->
        <script>
            // Get the activeTabIndex value
            const activeTabIndexInput = document.getElementById("activeTabIndex");
            let activeTabIndex = parseInt(activeTabIndexInput.value);

            // Function to change the active tab
            function changeTab(tab) {
                // document.getElementById(tab + "-tab").disabled = false;
                validationTab(tab);
                var tabs = document.getElementsByClassName("tab-pane");
                let tabButton = document.getElementById(`${tab}-tab`);
                // Loop through each tab content element and hide them
                for (var i = 0; i < tabs.length; i++) {
                    tabs[i].style.display = "none";
                }
                activeTabIndex = tabIndex[tab][0];
                activeTabIndexInput.value = activeTabIndex;

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


            // Function to navigate to the next tab
            function nextTab() {
                const currentTab = Object.keys(tabIndex).find(key => tabIndex[key][0] === activeTabIndex);
                const nextTab = Object.keys(tabIndex).find(key => (tabIndex[key][0]) === tabIndex[currentTab][0] + 1);

                if (nextTab) {
                    changeTab(nextTab);
                } else {
                    // Submit the form if on the last tab
                    if (checkRequiredInputs()) {
                        document.getElementById("cv-form").submit();
                    }
                }
            }


            // Handle keydown event for Enter key
            document.addEventListener("keydown", function (event) {
                const activeTabIndexInput = document.getElementById("activeTabIndex");
                let activeTabIndex = parseInt(activeTabIndexInput.value);
                if (event.key === "Enter") {
                    event.preventDefault(); // Prevent form submission
                    // Check if currently on the last tab
                    if (activeTabIndex === tabIndex["end"][0]) {
                        // Submit the form
                        ;
                    } else {
                        // Navigate to the next tab
                        let next_but = document.getElementById(`next-to-${Object.entries(tabIndex)[activeTabIndex + 1][0]}`);
                        if (next_but.disabled === false) {
                            nextTab();
                        }
                    }
                }
            });

            // Initialize tab navigation
            window.addEventListener("DOMContentLoaded", function () {
                // Call the changeTab() function to set the initial tab
                const initialTab = Object.keys(tabIndex)[0];
                changeTab(initialTab);
            });
        </script>

        <!-- add many experience -->
        <script>
            function addExperienceForm() {
                document.querySelector('#add-experience').addEventListener('click', function () {
                    // Create new form elements
                    let newForm = document.createElement('div');
                    newForm.classList.add('experience-forms');
                    newForm.innerHTML = `
                    <?php $experienceCount++; ?>
            <h5 class="mt-3">Another Skill </h5>
            <div class="form-group mt-1">
            <?php $row_skill = $result_skill->fetch_assoc(); ?>
                <label for="job-skills">Skills Utilized</label>
                <input type="text" class="form-control" id="job-skills"
                    placeholder="What skill that you obtained" name="job-skills[]" value="<?php if (isset($row_skill['skill'])) {
                        echo $row_skill['skill'];
                    } else {
                        echo "";
                    } ?>" required>
            </div>
            <button type="button" class="btn btn-danger mt-3 remove-experience-form">Remove Skill</button>
        `;
                    // Append the new form elements to the page
                    this.parentNode.insertBefore(newForm, this);
                    // Increment the experience count
                    // Add event listener to the new "Remove Experience" button
                    newForm.querySelector('.remove-experience-form').addEventListener('click', function () {
                        if (confirm('Are you sure you want to delete this skill?')) {
                            // Remove the corresponding experience form
                            this.parentNode.remove();
                            // Decrement the experience count
                            // Update the text of the p element
                        }
                    });
                });
            }
            addExperienceForm();
        </script>

        <!-- Add many job  -->
        <script>
            function addJobForm() {
                document.querySelector('#add-job').addEventListener('click', function () {
                    // Create new form elements
                    let newForm = document.createElement('div');
                    newForm.classList.add('job-forms');
                    newForm.innerHTML = `
            <h5 class="mt-3">Another Job </h5>
            <?php $row_work = $result_work->fetch_assoc(); ?>
            <div class="form-group mt-1">
                <label for="job-name">Job Position</label>
                <input type="text" class="form-control" id="job-name" name="job-name[]"
                    placeholder="Job Name" value="<?php if (isset($row_work['position'])) {
                        echo $row_work['position'];
                    } else {
                        echo "";
                    } ?>" required>
            </div>
            <div class="form-group mt-1">
                <label for="company-name">Company Name</label>
                <input type="text" class="form-control" placeholder="Name of the Company"
                    id="company-name" name="company-name[]" value="<?php if (isset($row_work['company_name'])) {
                        echo $row_work['company_name'];
                    } else {
                        echo "";
                    } ?>" required>
            </div>
            <div class="form-group mt-1">
                <label for="employment-degree">Type of Employment</label>
                <select class="form-control" id="employment-degree" required
                    name="employment-degree[]">
                    <option value="">-- Select --</option>
                    <option value="full-time" <?php if (isset($row_work['work_type']) && $row_work['work_type'] == 'full-time')
                        echo 'selected'; ?>>Full-time
                    </option>
                    <option value="part-time" <?php if (isset($row_work['work_type']) && $row_work['work_type'] == 'part-time')
                        echo 'selected'; ?>>Part-time
                    </option>
                    <option value="contract" <?php if (isset($row_work['work_type']) && $row_work['work_type'] == 'contract')
                        echo 'selected'; ?>>Contract
                    </option>
                    <option value="freelance" <?php if (isset($row_work['work_type']) && $row_work['work_type'] == 'freelance')
                        echo 'selected'; ?>>Freelance
                    </option>
                    <option value="internship" <?php if (isset($row_work['work_type']) && $row_work['work_type'] == 'internship')
                        echo 'selected'; ?>>Internship
                    </option>
                </select>
            </div>

            <div class="form-group mt-1">
                <label for="job-duration">Duration</label>
                <select class="form-control" id="job-duration" name="job-duration[]" required>
                    <option value="">-- Select --</option>
                    <option value="0" <?php if (isset($row_work['duration']) && $row_work['duration'] == '0')
                        echo 'selected'; ?>>Less Than 6 Months
                    </option>
                    <option value="1" <?php if (isset($row_work['duration']) && $row_work['duration'] == '1')
                        echo 'selected'; ?>>6 Months to < 1
                            Years</option>
                    <option value="2" <?php if (isset($row_work['duration']) && $row_work['duration'] == '2')
                        echo 'selected'; ?>>1 Years to < 2
                            Years</option>
                    <option value="3" <?php if (isset($row_work['duration']) && $row_work['duration'] == '3')
                        echo 'selected'; ?>>2 Years to < 3
                            Years</option>
                    <option value="4" <?php if (isset($row_work['duration']) && $row_work['duration'] == '4')
                        echo 'selected'; ?>>3 Years to < 4
                            Years</option>
                    <option value="5" <?php if (isset($row_work['duration']) && $row_work['duration'] == '5')
                        echo 'selected'; ?>>4 Years to < 5
                            Years</option>
                    <option value="6" <?php if (isset($row_work['duration']) && $row_work['duration'] == '6')
                        echo 'selected'; ?>>Over 5 Years</option>
                    <option value="-1" <?php if (isset($row_work['duration']) && $row_work['duration'] == '-1')
                        echo 'selected'; ?>>Still in Job</option>
                </select>
            </div>
            <div class="form-group mt-1 ">
                <label for="working-description">Job Description</label>
                <textarea class="form-control" id="working-description"
                    placeholder="Tell us something about that working experience such as which tasks you have done, ..."
                    name="working-description[]" rows="2" required><?php if (isset($row_work['tasks'])) {
                        echo $row_work['tasks'];
                    } else {
                        echo "";
                    } ?></textarea>
            </div>  
            <button type="button" class="btn btn-danger mt-3 remove-job-form">Remove Job</button>
        `;
                    // Append the new form elements to the page
                    this.parentNode.insertBefore(newForm, this);
                    // Increment the experience count
                    // Add event listener to the new "Remove Experience" button
                    newForm.querySelector('.remove-job-form').addEventListener('click', function () {
                        if (confirm('Are you sure you want to delete this job history?')) {
                            // Remove the corresponding experience form
                            this.parentNode.remove();
                            // Decrement the experience count
                            // Update the text of the p element
                        }
                    });
                });
            }
            addJobForm();
        </script>

        <!-- Add many certification -->
        <script>
            function addCertificationForm() {
                document.querySelector('#add-certification').addEventListener('click', function () {
                    // Create new form elements
                    let newForm = document.createElement('div');
                    newForm.classList.add('certification-forms');
                    newForm.innerHTML = `
            <h5 class="mt-3">Next Certification</h5>
            <?php $row_certi = $result_certi->fetch_assoc(); ?>
            <div class="form-group mt-1">
                    <label for="certification-name">Certification Name</label>
                    <input type="text" class="form-control" id="certification-name"
                        placeholder="Certification title" name="certification-name[]" value="<?php if (isset($row_certi['title'])) {
                            echo $row_certi['title'];
                        } else {
                            echo "";
                        } ?>" required>
                </div>
                <div class="form-group mt-1">
                    <label for="certification-organization">Organization</label>
                    <textarea class="form-control" id="certification-organization"
                        name="certification-organization[]" placeholder="Organization provider" rows="1"
                        required><?php if (isset($row_certi['organization'])) {
                            echo $row_certi['organization'];
                        } else {
                            echo "";
                        } ?></textarea>
                </div>
                <div class="form-group mt-1">
                    <label for="certification-date">Obtained date</label>
                    <input type="date" class="form-control" id="certification-date"
                        name="certification-date[]" value="<?php if (isset($row_certi['obtained_date'])) {
                            echo $row_certi['obtained_date'];
                        } else {
                            echo "";
                        } ?>" required>
                </div>
                <div class="form-group mt-1">
                    <label for="expire-date">Expired date</label>
                    <input type="date" class="form-control" id="expire-date" name="expire-date[]" value="<?php if (isset($row_certi['expiration_date'])) {
                        echo $row_certi['expiration_date'];
                    } else {
                        echo "";
                    } ?>">
                </div>
            <button type="button" class="btn btn-danger mt-3 remove-certification-form">Remove Certification</button>
        `;

                    this.parentNode.insertBefore(newForm, this);
                    newForm.querySelector('.remove-certification-form').addEventListener('click', function () {
                        if (confirm('Are you sure you want to delete this certification?')) {
                            // Remove the corresponding experience form
                            this.parentNode.remove();
                            // Decrement the experience count
                        }
                    });
                });
            }
            addCertificationForm();
        </script>

        <!-- Add many reference -->
        <script>
            function addReferenceForm() {
                document.querySelector('#add-reference').addEventListener('click', function () {
                    // Create new form elements
                    let newForm = document.createElement('div');
                    newForm.classList.add('reference-forms');
                    newForm.innerHTML = `
            <h5 class="mt-3">Next Reference</h5>
            <?php $row_refer = $result_refer->fetch_assoc(); ?>
                <div class="form-group">
                    <label for="reference-name">Name</label>
                    <input type="text" class="form-control" id="reference-name" name="reference-name[]"
                        placeholder="Relationship's name" value="<?php if (isset($row_refer['name'])) {
                            echo $row_refer['name'];
                        } else {
                            echo "";
                        } ?>" required>
                </div>
                <div class="form-group mt-1">
                    <label for="reference-email">Email</label>
                    <input type="email" class="form-control" id="reference-email"
                        name="reference-email[]" placeholder="Email" value="<?php if (isset($row_refer['email'])) {
                            echo $row_refer['email'];
                        } else {
                            echo "";
                        } ?>" required>
                </div>
                <div class="form-group mt-1">
                    <label for="reference-phone">Phone</label>
                    <input type="text" class="form-control" id="reference-phone"
                        name="reference-phone[]" placeholder="Phone" value="<?php if (isset($row_refer['phone'])) {
                            echo $row_refer['phone'];
                        } else {
                            echo "";
                        } ?>" required>
                </div>
                <div class="form-group mt-1">
                    <label for="reference-relationship">Relationship</label>
                    <input type="text" class="form-control" id="reference-relationship"
                        placeholder="Ex: Lecturer, Mentor, etc" name="reference-relationship[]" value="<?php if (isset($row_refer['relationship'])) {
                            echo $row_refer['relationship'];
                        } else {
                            echo "";
                        } ?>" required>
                </div>
            <button type="button" class="btn btn-danger mt-3 remove-reference-form">Remove Reference</button>
        `;

                    this.parentNode.insertBefore(newForm, this);
                    newForm.querySelector('.remove-reference-form').addEventListener('click', function () {
                        if (confirm('Are you sure you want to delete this reference?')) {
                            // Remove the corresponding reference form
                            this.parentNode.remove();
                            // Decrement the reference count
                        }
                    });
                });
            }
            addReferenceForm();
        </script>
        <!-- <script>
        for (var idx = 0; idx < Object.keys(tabIndex).length; idx++) {
            document.getElementById(Object.entries(tabIndex)[idx][0] + "-tab").disabled = !Object.entries(tabIndex)[idx][1][1];
            document.getElementById(Object.entries(tabIndex)[idx][0] + "-tab").style.backgroundColor = "lightpink";
        }
    </script> -->

    </div>
</body>

</html>