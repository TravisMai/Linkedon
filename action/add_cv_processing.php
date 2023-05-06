<?php
require_once('initialize.php');
require_once('database/dbconnect.php');



// if (isset($_POST['submit'])) {
$user_id = $_SESSION["user_id"];
$habit = $_POST['habit'];
$hobbies = $_POST['hobbies'];
$personal_information = $_POST['personal-information'];
// Job-Objective
$job_title = $_POST['job-title'];
$position = $_POST['position'];
$employment_type = $_POST['employment-type'];
$salary_range = $_POST['salary-range'];
$qualifications = $_POST['qualifications'];
$sql = "INSERT INTO resume (user_id, title, position, employment_type, desire_salary, goals, date_added, date_updated) VALUES ($user_id,'$job_title','$position','$employment_type','$salary_range','$qualifications')";
$sql = rtrim($sql, ",");
mysqli_query($conn, $sql);
$insert_id = mysqli_insert_id($conn);
///////////////////////////////////////////////////////////////////
// Education-Section
$school_name = $_POST['school-name'];
$degree_name = $_POST['degree-name'];
$education_level = $_POST['education-level'];
$graduation_year = $_POST['graduation-year'];
$gpa = $_POST['gpa'] . $_POST['gpa-scale'];

// Store the values in an array
$educations = array();
$educations[] = array(
    'school_name' => $school_name,
    'degree_name' => $degree_name,
    'education_level' => $education_level,
    'graduation_year' => $graduation_year,
    'gpa' => $gpa,
);

// Insert the educations into the database
// $sql = "INSERT INTO education (school, degree, major, graduation_year, gpa) VALUES ";
$sql = "INSERT INTO education (resume_id, user_id , school, degree, major) VALUES ";
foreach ($educations as $education) {
    $sql .= "('$insert_id','$user_id','$education[school_name]', '$education[education_level]', '$education[degree_name]'),";
}
$sql = rtrim($sql, ",");
mysqli_query($conn, $sql);
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Professional
$job_skills = $_POST['job-skills'];

// Store the values in an array
$professional_experiences = array();
for ($i = 0; $i < count($job_skills); $i++) {
    $professional_experiences[] = array(
        'job_skills' => $job_skills[$i]
    );
}

// Insert the professional experiences into the database
$sql = "INSERT INTO skill (resume_id, user_id, skill) VALUES ";
foreach ($professional_experiences as $professional_experience) {
    $sql .= "('$insert_id','$user_id','$professional_experience[job_skills]'),";
}
$sql = rtrim($sql, ",");
mysqli_query($conn, $sql);
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Working-Section
$job_name = $_POST['employment-degree'] . " " . $_POST['job-name'];
$company_name = $_POST['company-name'];

$job_duration = $_POST['job-duration'];
$formatted_date = $start_date . " to " . $end_date;
$working_description = $_POST['working-description'];

// Store the values in an array
$work_histories = array();
$work_histories[] = array(
    'job_name' => $job_name,
    'company_name' => $company_name,
    'job_duration' => $job_duration,
    'working_description' => $working_description
);

// Insert the work histories into the database
$sql = "INSERT INTO working_history (resume_id, user_id,  position, company_name,  duration , tasks) VALUES ";
foreach ($work_histories as $work_history) {
    $sql .= "('$insert_id','$user_id','$work_history[job_name]', '$work_history[company_name]', '$work_history[job_duration]', '$work_history[working_description]'),";
}
$sql = rtrim($sql, ",");
mysqli_query($conn, $sql);
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Certification Section
$certification_names = $_POST['certification-name'];
$certification_dates = $_POST['certification-date'];
$certification_organizations = $_POST['certification-organization'];

// Store the values in an array
$certifications = array();
for ($i = 0; $i < count($certification_names); $i++) {
    $certifications[$i] = array(
        'name' => $certification_names[$i],
        'date' => $certification_dates[$i],
        'organization' => $certification_organizations[$i]
    );
}

// Insert the certifications into the database
$sql = "INSERT INTO certificate (resume_id, user_id, title, obtained_date, organization) VALUES ";
foreach ($certifications as $certification) {
    $sql .= "('$insert_id','$user_id','$certification[name]', '$certification[date]', '$certification[organization]'),";
}
$sql = rtrim($sql, ",");
mysqli_query($conn, $sql);
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Reference Section
$reference_names = $_POST['reference-name'];
$reference_phones = $_POST['reference-phone'];
$reference_emails = $_POST['reference-email'];
$reference_relationships = $_POST['reference-relationship'];

// Store the values in an array
$references = array();
for ($i = 0; $i < count($reference_names); $i++) {
    $references[] = array(
        'reference_name' => $reference_names[$i],
        'reference_phone' => $reference_phones[$i],
        'reference_email' => $reference_emails[$i],
        'reference_relationship' => $reference_relationships[$i]
    );
}

// Insert the references into the database
$sql = "INSERT INTO references (reference_name, reference_phone, reference_email, reference_relationship) VALUES ";
foreach ($references as $reference) {
    $sql .= "('$reference[reference_name]', '$reference[reference_phone]', '$reference[reference_email]', '$reference[reference_relationship]'),";
}
$sql = rtrim($sql, ",");
$_SESSION['label'] = "Successful";
$_SESSION['message'] = "Your CV created successfully";
header('Location: ../index.php?page=profile');
mysqli_query($conn, $sql);
// }
