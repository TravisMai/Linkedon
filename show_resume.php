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

                $sql = "SELECT `avatar`, `firstname`, `lastname`, `email`, `phone` FROM `users` WHERE id = $id";
                $result = $conn->query($sql);

                $output = '
                <a id = "backbtn" href="index.php?page=candidates"><button type="button" class="btn btn-dark my-2 hide-on-print"><i class="bi fa-lg bi-chevron-left"></i></button></a>
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
                                    <p class="card-text">Phone: <strong>'.'0'. $row['phone'] .'</strong><i class="bi bi-telephone m-1"></i></p>
                                </div>
                            </div>
                        </div>';
                    }
                }

                $sql = "SELECT * FROM `resume` WHERE user_id = $id";
                $result = $conn->query($sql);

                if(mysqli_num_rows($result) > 0){
                    while ($row = $result->fetch_assoc()) {
                        $output .= '                        
                        <div class="col-md-8 mb-2 mt-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Objective</h5>
                                    <p class="card-text">'. $row['objective'] .'.</p>
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
                            <li>'.$row['degree'] .' in ' . $row['major'] .', '. $row['school'] .'</li>      
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
                        $output .= '
                            <li>'. $row['position'] .', '. $row['company_name'] . ', ' . $row['duration'] . '<br>' . '<strong>Tasks: </strong>'. $row['tasks'] .'</li>      
                        ';
                    }
                    $output .= '
                            </ul>
                        </div>
                    </div>';
                }

                $sql = "SELECT `title`, `organization`, `value`, YEAR(obtained_date) as `year` FROM `certificate` WHERE user_id = $id";
                $result = $conn->query($sql);

                if(mysqli_num_rows($result) > 0){
                    $output .= '
                    <div class="card mt-2">
                        <div class="card-body">
                            <h5 class="card-title">Certificates</h5>
                                <ul>';
                    while ($row = $result->fetch_assoc()) {
                        $output .= '
                            <li>'.$row['title'] .', '. $row['organization'] . ', ' . $row['year'] . '<br>' . '<strong>Status: </strong>' . $row['value'] .'</li>      
                        ';
                    }
                    $output .= '
                            </ul>
                        </div>
                    </div>';
                }

                $sql = "SELECT `skill` FROM `skill` WHERE user_id = $id";
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
                            <li>'. $row['firstname'].' '. $row['lastname'] .', ('. $row['relationship'] . ') <br>' . '<strong>E-mail: </strong>'. $row['email'] . '<i class="bi bi-envelope m-1"></i><br><strong>Phone: </strong>0'. $row['phone'] .'<i class="bi bi-telephone m-1"></i></li>      
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
