<?php
require_once('initialize.php');
require_once('database/dbconnect.php');



if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $user_id = $_SESSION["user_id"];
    // Prepare the SQL query
    $old_resume_info = $conn->prepare("SELECT `id` FROM `resume` WHERE user_id = $user_id");
    $old_resume_info->execute();
    $result_old = $old_resume_info->get_result();
    $row_old = $result_old->fetch_assoc();
    $old_id = isset($row_old['id']) ? $row_old['id'] : "";
    if (isset($row_old)) {
        $delete_resume = $conn->prepare("DELETE FROM `resume` WHERE id = $old_id");
        $delete_resume->execute();
    }
    // Job-Objective
    $job_title = $_POST['job-title'];
    $position = $_POST['position'];
    $employment_type = $_POST['employment-type'];
    $salary_range = $_POST['salary-range'];
    $qualifications = $_POST['qualifications'];
    $sql = "INSERT INTO resume (user_id, title, position, employment_type, desire_salary, goals) VALUES ($user_id,'$job_title','$position','$employment_type','$salary_range','$qualifications')";
    $sql = rtrim($sql, ",");
    mysqli_query($conn, $sql);
    $insert_id = mysqli_insert_id($conn);
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // Additional Section
    $habit = $_POST['habit'];
    $hobbies = $_POST['hobbies'];
    $personal_information = $_POST['personal-information'];
    $sql = "INSERT INTO additional_information (resume_id, user_id, hobbies, habits, personal_info) VALUES ($insert_id, $user_id,'$habit','$hobbies','$personal_information')";
    $sql = rtrim($sql, ",");
    mysqli_query($conn, $sql);

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // Education-Section
    $school_name = $_POST['school-name'];
    $degree_name = $_POST['degree-name'];
    $education_level = $_POST['education-level'];
    $graduation_year = $_POST['graduation-year'];
    $gpa = $_POST['gpa'] . "/" . $_POST['gpa-scale'];

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
    $sql = "INSERT INTO education (resume_id, user_id , school,  degree, `year`, gpa, major) VALUES ";
    foreach ($educations as $education) {
        $sql .= "('$insert_id','$user_id','$education[school_name]', '$education[education_level]','$education[graduation_year]' , '$education[gpa]',  '$education[degree_name]'),";
    }
    $sql = rtrim($sql, ",");
    mysqli_query($conn, $sql);
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // Professional
    $job_skills = $_POST['job-skills'];

    // Store the values in an array
    $professional_experiences = array();
    for ($i = 0; $i < count($job_skills); $i++) {
        if ($job_skills[$i] !== "") {
            $professional_experiences[] = array(
                'job_skills' => $job_skills[$i]
            );
        }
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
    $job_name = $_POST['job-name'];
    $company_name = $_POST['company-name'];
    $work_type = $_POST['employment-degree'];
    $job_duration = $_POST['job-duration'];
    $working_description = $_POST['working-description'];

    // Store the values in an array
    $work_histories = array();
    for ($i = 0; $i < count($job_name); $i++) {
        if ($job_name[$i] !== "" && $company_name[$i] !== "" && $work_type[$i] !== "" && $job_duration[$i] !== "" && $working_description[$i] !== "") {
            $work_histories[$i] = array(
                'job_name' => $job_name[$i],
                'company_name' => $company_name[$i],
                'work_type' => $work_type[$i],
                'job_duration' => $job_duration[$i],
                'working_description' => $working_description[$i]
            );
        }
    }

    // Insert the work histories into the database
    $sql = "INSERT INTO working_history (resume_id, user_id,  position, company_name, work_type,  duration , tasks) VALUES ";
    foreach ($work_histories as $work_history) {
        $sql .= "('$insert_id','$user_id','$work_history[job_name]', '$work_history[company_name]', '$work_history[work_type]','$work_history[job_duration]', '$work_history[working_description]'),";
    }
    $sql = rtrim($sql, ",");
    mysqli_query($conn, $sql);
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // Certification Section
    $certification_names = $_POST['certification-name'];
    $certification_dates = $_POST['certification-date'];
    $expire_dates = $_POST['expire-date'];
    $certification_organizations = $_POST['certification-organization'];

    // Store the values in an array
    $certifications = array();
    for ($i = 0; $i < count($certification_names); $i++) {
        if ($certification_names[$i] !== "" && $certification_dates[$i] !== "" && $certification_organizations[$i] !== "") {
            $certifications[$i] = array(
                'name' => $certification_names[$i],
                'obtain_date' => date('Y-m-d', strtotime($certification_dates[$i])),
                'expire_date' => date('Y-m-d', strtotime($expire_dates[$i])),
                'organization' => $certification_organizations[$i]
            );
        }
    }

    // Insert the certifications into the database
    $sql = "INSERT INTO certificate (resume_id, user_id, title, obtained_date, expiration_date, organization) VALUES ";
    foreach ($certifications as $certification) {
        $sql .= "('$insert_id','$user_id','$certification[name]', '$certification[obtain_date]', '$certification[expire_date]', '$certification[organization]'),";
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
        if ($reference_names[$i] !== "" && $reference_phones[$i] !== "" && $reference_emails[$i] !== "" && $reference_relationships[$i] !== "") {
            $references[] = array(
                'reference_name' => $reference_names[$i],
                'reference_phone' => $reference_phones[$i],
                'reference_email' => $reference_emails[$i],
                'reference_relationship' => $reference_relationships[$i]
            );
        }
    }

    // Insert the references into the database
    $sql = "INSERT INTO reference (resume_id, user_id, name, email, phone, relationship) VALUES ";
    foreach ($references as $reference) {
        $sql .= "('$insert_id','$user_id', '$reference[reference_name]',  '$reference[reference_email]','$reference[reference_phone]', '$reference[reference_relationship]'),";
    }
    $sql = rtrim($sql, ",");
    mysqli_query($conn, $sql);

    $_SESSION['label'] = "Successful";
    $_SESSION['message'] = "Your CV created successfully";
    header('Location: ./index.php?page=candidates&id=' . $_SESSION["user_id"] . '');
} else {
    $_SESSION['label'] = "Error";
    $_SESSION['message'] = "Your CV not submit";
    header('Location: ./index.php?page=candidates&id=' . $_SESSION["user_id"] . '');
}