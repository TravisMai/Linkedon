<!DOCTYPE html>
<html lang="en">

<?php 
require_once('inc/header.php');
require_once('initialize.php');
?>
<?php
ob_start();
?>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css"
        integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" /> 
    <style>
        #backbtn {
            color: white;
        }
        @media print {
            header, footer, .hide-on-print {
                display: none;
            }    
        }
    </style>
</head>

<body id="top">
    <?php require_once('inc/topBarNav.php') ?>

    <div class="page-content bg-light">
        <div id="content">
            <!-- The detail of candidate will be show when user click on a candidate's name or click view detail -->
            <div class="container" id = "detail-of-candidate">
            <?php
            if(isset($_GET['id'])){
                $id = intval($_GET['id']);
                require_once('database/dbconnect.php');

                $sql = "SELECT `avatar`, `firstname`, `lastname`, `email`, `phone`, `address` FROM `users` WHERE id = $id";
                $result = $conn->query($sql);

                $output = '
                <button type="button" class="btn btn-dark my-2 hide-on-print" onclick = "history.back();"><i class="bi fa-lg bi-chevron-left"></i></button>
                <h1><u class="text-warning hide-on-print">Curriculum Vitae</u></h1>        
                    <div class="container">
                        <div class="row justify-content-center">';
                if(mysqli_num_rows($result) > 0){
                    while ($row = $result->fetch_assoc()) {
                        $output .= '
                        <div class="col-md-4 mt-3">
                            <div class="card border">
                                <img class="card-img-top border border-primary" src="'. $row['avatar'].'" alt="">
                                <div class="card-body">              
                                    <p class="card-text">Name: <strong>'.$row['firstname'].' '. $row['lastname'] .'</strong></p>
                                    <p class="card-text">Email: <strong>'. $row['email'] .'</strong><i class="bi bi-envelope m-1"></i></p>
                                    <p class="card-text">Phone: <strong>'. $row['phone'] .'</strong><i class="bi bi-telephone m-1"></i></p>
                                    <p class="card-text">Address: <strong>'. $row['address'] .'</strong><i class="bi bi-geo-alt m-1"></i></p>
                                </div>
                            </div>
                        </div>';
                    }
                }


                $sql = "SELECT * FROM `resume` WHERE user_id = $id";
                $result = $conn->query($sql);
                
                if (mysqli_num_rows($result) > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $salary = number_format($row['desire_salary']) . '.000.000 VND <i class="bi bi-cash"></i>';
                        $position = $row['position'] . ' (' . $row['employment_type'] . ')';
                        $output .= '
                        <div class="col-md-8 mb-2 mt-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Objective</h5>
                                    <p class="card-text">' . $position . '<br><strong>Salary Expectation: </strong>' . $salary . '<br><strong>Goal: </strong>' . $row['goals'] . '.</p>
                                </div>
                            </div>';
                    }
                }
                

                $sql = "SELECT * FROM `education` WHERE user_id = $id";
                $result = $conn->query($sql);

                if(mysqli_num_rows($result) > 0){
                    $output .= '
                    <div class="card mt-2">
                        <div class="card-body">
                            <h5 class="card-title">Education</h5>
                            <ul>';
                    while ($row = $result->fetch_assoc()) {
                        $output .= '
                            <li>'.$row['degree'] .' in ' . $row['major'] .', '. $row['school'] .'<br>'
                            .'<strong>Graduate year: </strong>' . $row['year'] .'<br>'
                            .'<strong>GPA: </strong>' . $row['gpa'] .'</li>      
                        ';
                    }
                    $output .= '
                            </ul>
                        </div>
                    </div>';
                }

                $sql = "SELECT `position`, `company_name`, `duration`, `tasks` FROM `working_history` WHERE user_id = $id";
                $result = $conn->query($sql);

                if(mysqli_num_rows($result) > 0){
                    $output .= '
                    <div class="card mt-2">
                        <div class="card-body">
                            <h5 class="card-title">Working History</h5>
                                <ul>';
                    while ($row = $result->fetch_assoc()) {
                        $duration = 'N/A';
                        if ($row['duration'] == 0) $duration = 'Less Than 6 Months';
                        elseif ($row['duration'] == 1) $duration = '6 Months to < 1 Years';
                        elseif ($row['duration'] == 2) $duration = '1 Years to < 2 Years';
                        elseif ($row['duration'] == 3) $duration = '2 Years to < 3 Years';
                        elseif ($row['duration'] == 4) $duration = '3 Years to < 4 Years';
                        elseif ($row['duration'] == 5) $duration = '4 Years to < 5 Years';
                        elseif ($row['duration'] == 6) $duration = 'Over 5 Years';
                        elseif ($row['duration'] == -1) $duration = 'Still in Job';
                        $output .= '
                            <li><em>'. $row['position'] .'</em> at <em>'. $row['company_name'] .'</em>
                            <br>'. '<strong>Duration: </strong>' . $duration  . '
                            <br>'. '<strong>Tasks: </strong>'. $row['tasks'] .'</li>
                        ';
                    }
                    $output .= '
                            </ul>
                        </div>
                    </div>';
                }

                $sql = "SELECT `title`, `organization`, DATE_FORMAT(`obtained_date`, '%m/%Y') as `year` FROM `certificate` WHERE user_id = $id";
                $result = $conn->query($sql);

                if(mysqli_num_rows($result) > 0){
                    $output .= '
                    <div class="card mt-2">
                        <div class="card-body">
                            <h5 class="card-title">Certificates</h5>
                                <ul>';
                    while ($row = $result->fetch_assoc()) {
                        $output .= '
                            <li>'.$row['title'] .' - '. $row['organization'] . ' - ' . $row['year'] . '</li>      
                        ';
                    }
                    $output .= '
                            </ul>
                        </div>
                    </div>';
                }

                $sql = "SELECT `skill` FROM `skill` WHERE user_id = $id AND `skill` <> ''";
                $result = $conn->query($sql);

                if (mysqli_num_rows($result) > 0) {
                    $skills = '';
                    while ($row = $result->fetch_assoc()) {
                        $delimiter = empty($skills) ? '' : ' <i class="bi bi-dot"></i> ';
                        $skills .= $delimiter . $row['skill'];
                    }
                    $output .= '
                        <div class="card mt-2">
                            <div class="card-body">
                                <h5 class="card-title">Skills</h5>
                                <p>' . $skills . '</p>
                            </div>
                        </div>';
                }

                $sql = "SELECT `hobbies`, `habits`, `personal_info` FROM `additional_information` WHERE user_id = $id";
                $result = $conn->query($sql);

                if(mysqli_num_rows($result) > 0){
                    $output .= '
                    <div class="card mt-2">
                        <div class="card-body">
                            <h5 class="card-title">Additional Information</h5>
                                <ul>';
                    while ($row = $result->fetch_assoc()) {
                        $output .= '
                            <li>'. '<strong>Hobbies: </strong>'. $row['hobbies'] . '</li><li><strong>Habits: </strong>'. $row['habits'] . '</li><li><strong>Personal Info: </strong>'. $row['personal_info'] .'</li>      
                        ';
                    }
                    $output .= '
                            </ul>
                        </div>
                    </div>';
                }
                
                $sql = "SELECT *  FROM `reference` WHERE user_id = $id";
                $result = $conn->query($sql);

                if(mysqli_num_rows($result) > 0){
                    $output .= '
                    <div class="card mt-2">
                        <div class="card-body">
                            <h5 class="card-title">References</h5>
                                <ul>';
                    while ($row = $result->fetch_assoc()) {
                        $output .= '
                            <li>'. $row['name'].' ('. $row['relationship'] . ') <br>' . '<strong>E-mail: </strong>'. $row['email'] . '<i class="bi bi-envelope m-1"></i><br><strong>Phone: </strong>'. $row['phone'] .'<i class="bi bi-telephone m-1"></i></li><br/>      
                        ';
                    }
                    $output .= '
                            </ul>
                        </div>
                    </div>';
                }

                $output .= '
                        </div>
                    </div>
                </div>
                ';
                echo $output;
                $conn->close();
            }

            ?>

            </div>
        </div>
    </div>

</body>

</html>
