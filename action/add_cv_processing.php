<?php
require_once('initialize.php');
require_once('database/dbconnect.php');



// if (isset($_POST['submit'])) {
    echo "<h1>342342343243242 </h1>";
    $habit = $_POST['additional-info'];
    // Job-Objective
    $job_title = $_POST['job-title'];
    $position = $_POST['position'];
    $employment_type = $_POST['employment-type'];
    $salary_range = $_POST['salary-range'];
    $qualifications = $_POST['qualifications'];
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
    $sql = "INSERT INTO educations (school_name, degree_name, education_level, graduation_year, gpa) VALUES ";
    foreach ($educations as $education) {
        $sql .= "('$education[school_name]', '$education[degree_name]', '$education[education_level]', '$education[graduation_year]', '$education[gpa]'),";
    }
    $sql = rtrim($sql, ",");
    mysqli_query($conn, $sql);
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // Professional
    $job_descriptions = $_POST['job-description'];
    $job_durations = $_POST['job-duration'];
    $job_skills = $_POST['job-skills'];

    // Store the values in an array
    $professional_experiences = array();
    for ($i = 0; $i < count($job_descriptions); $i++) {
        $professional_experiences[] = array(
            'job_description' => $job_descriptions[$i],
            'job_duration' => $job_durations[$i],
            'job_skills' => $job_skills[$i]
        );
    }

    // Insert the professional experiences into the database
    $sql = "INSERT INTO professional_experiences (job_description, job_duration, job_skills) VALUES ";
    foreach ($professional_experiences as $professional_experience) {
        $sql .= "('$professional_experience[job_description]', '$professional_experience[job_duration]', '$professional_experience[job_skills]'),";
    }
    $sql = rtrim($sql, ",");
    mysqli_query($conn, $sql);
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // Working-Section
    $job_name = $_POST['employment-degree'] . " " . $_POST['job-name'];
    $company_name = $_POST['company-name'];

    $start_date = $_POST['start-date'];
    $end_date = $_POST['end-date'];
    $formatted_date = $start_date . " to " . $end_date;
    $working_description = $_POST['working-description'];

    // Store the values in an array
    $work_histories = array();
    $work_histories[] = array(
        'job_name' => $job_name,
        'company_name' => $company_name,
        'start_date' => $start_date,
        'end_date' => $end_date,
        'working_description' => $working_description
    );

    // Insert the work histories into the database
    $sql = "INSERT INTO work_histories (position, company_name,  start_date, end_date, working_description) VALUES ";
    foreach ($work_histories as $work_history) {
        $sql .= "('$work_history[job_name]', '$work_history[company_name]', '$work_history[start_date]', '$work_history[end_date]', '$work_history[working_description]'),";
    }
    $sql = rtrim($sql, ",");
    mysqli_query($conn, $sql);
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // Certification Section
    $certification_names = $_POST['certification-name'];
    $certification_dates = $_POST['certification-date'];
    $certification_descriptions = $_POST['certification-description'];

    // Store the values in an array
    $certifications = array();
    for ($i = 0; $i < count($certification_names); $i++) {
        $certifications[$i] = array(
            'name' => $certification_names[$i],
            'date' => $certification_dates[$i],
            'description' => $certification_descriptions[$i]
        );
    }

    // Insert the certifications into the database
    $sql = "INSERT INTO certifications (name, date, description) VALUES ";
    foreach ($certifications as $certification) {
        $sql .= "('$certification[name]', '$certification[date]', '$certification[description]'),";
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
    header('Location: http://localhost/CO3049_WebProgramming_HK222/register.php');
    mysqli_query($conn, $sql);
// }
