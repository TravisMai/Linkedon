<?php

if(isset($_GET['objective']) && isset($_GET['major']) && isset($_GET['skill'])){
    $objective = $_GET['objective'];
    $major = $_GET['major'];
    $skill = $_GET['skill'];
    $skill = rawurldecode($skill);

    require_once('../initialize.php');
    require_once('../database/dbconnect.php');

    $sql = '';
    if ($skill == '0') {
        if($objective == '0') {
            $sql = "
                SELECT
                users.id, 
                users.firstname, 
                users.lastname, 
                users.avatar,
                users.phone,
                users.email,
                users.address, 
                resume.position, 
                education.major 
                FROM users
                INNER JOIN resume ON users.id = resume.user_id
                INNER JOIN education ON resume.id = education.resume_id
                WHERE education.major = '$major'";
        }

        elseif($major == '0') {
            $sql = "
            SELECT
            users.id, 
            users.firstname, 
            users.lastname, 
            users.avatar,
            users.phone,
            users.email,
            users.address, 
            resume.position, 
            education.major 
            FROM users
            INNER JOIN resume ON users.id = resume.user_id
            INNER JOIN education ON resume.id = education.resume_id
            WHERE resume.position = '$objective'";
        }

        else {
            $sql = "
            SELECT
            users.id, 
            users.firstname, 
            users.lastname, 
            users.avatar,
            users.phone,
            users.email,
            users.address, 
            resume.position, 
            education.major 
            FROM users
            INNER JOIN resume ON users.id = resume.user_id
            INNER JOIN education ON resume.id = education.resume_id
            WHERE resume.position = '$objective'
            AND education.major = '$major'";
        }
    }

    else {
        if ($objective == '0' && $major == '0') {
            $sql = "
            SELECT
            users.id, 
            users.firstname, 
            users.lastname, 
            users.avatar,
            users.phone,
            users.email,
            users.address, 
            resume.position, 
            education.major 
            FROM users
            INNER JOIN resume ON users.id = resume.user_id
            INNER JOIN education ON resume.id = education.resume_id
            INNER JOIN skill ON resume.id = skill.resume_id
            WHERE skill.skill = '$skill'";
        }

        elseif ($objective == '0') {
            $sql = "
                SELECT
                users.id, 
                users.firstname, 
                users.lastname, 
                users.avatar,
                users.phone,
                users.email,
                users.address, 
                resume.position, 
                education.major 
                FROM users
                INNER JOIN resume ON users.id = resume.user_id
                INNER JOIN education ON resume.id = education.resume_id
                INNER JOIN skill ON resume.id = skill.resume_id
                WHERE education.major = '$major'
                AND skill.skill = '$skill'";
        }

        elseif ($major == '0') {
            $sql = "
            SELECT
            users.id, 
            users.firstname, 
            users.lastname, 
            users.avatar,
            users.phone,
            users.email,
            users.address, 
            resume.position, 
            education.major 
            FROM users
            INNER JOIN resume ON users.id = resume.user_id
            INNER JOIN education ON resume.id = education.resume_id
            INNER JOIN skill ON resume.id = skill.resume_id
            WHERE resume.position = '$objective'
            AND skill.skill = '$skill'";
        }

        else {
            $sql = "
            SELECT
            users.id, 
            users.firstname, 
            users.lastname, 
            users.avatar,
            users.phone,
            users.email,
            users.address, 
            resume.position, 
            education.major 
            FROM users
            INNER JOIN resume ON users.id = resume.user_id
            INNER JOIN education ON resume.id = education.resume_id
            INNER JOIN skill ON resume.id = skill.resume_id
            WHERE resume.position = '$objective'
            AND education.major = '$major'
            AND skill.skill = '$skill'";
        }
    }

    $result = $conn->query($sql);

    $output = '';
    if(mysqli_num_rows($result) > 0){
        $output .= '
        <table class="table manage-candidates-top mb-0">
        <thead>
            <tr>
                <th>Candidate Name</th>
                <th>Objective</th>
                <th class="action text-right"></th>
            </tr>
        </thead>
        <tbody>        
        ';
        while($row = $result->fetch_assoc()) {
            $hoverinfo = '

            <div class="card" id="info-tooltip">

                <div class="card-body">
                <div class="row">
                    <div class="col-3">
                    <img src="'. $row['avatar'] .'" class="img-fluid rounded-circle" alt="Avatar">
                    </div>
                    <div class="col">
                    <ul class="list-unstyled d-block">
                        <li><h6>'. $row['firstname'] .' '. $row['lastname'] .'</h6></li>
                        <li>
                        <i class="bi bi-telephone-fill"></i> <strong>Phone:</strong> ' . $row['phone'] . '
                        </li>
                        <li>
                        <i class="bi bi-envelope-fill"></i> <strong>Email:</strong> ' . $row['email'] . '
                        </li>
                        <li>
                        <i class="bi bi-map-fill"></i> <strong>Address:</strong> ' . $row['address'] . '
                        </li>
                        <li>
                        <i class="bi bi-graph-up"></i> <strong>Major:</strong> ' . $row['major'] . '
                        </li>
                        <li>
                        <i class="bi bi-star-fill"></i> <strong>Objective:</strong> ' . $row['position'] . '
                        </li>';

            $sql_skills = "SELECT `skill` FROM `skill` WHERE user_id =" . intval($row['id']);
            $result_skills = $conn->query($sql_skills);

            $skills = '';
            if (mysqli_num_rows($result_skills) > 0) {
                while ($rowss = $result_skills->fetch_assoc()) {
                    $delimiter = empty($skills) ? '' : ' <i class="bi bi-dot"></i> ';
                    $skills .= $delimiter . $rowss['skill'];
                }
            } else {
                $skills = 'N/A';
            }

            $hoverinfo .= '
                        <li>
                        <i class="bi bi-bookmark-fill"></i> <strong>Skills:</strong> ' . $skills . '
                        </li>
                    </ul>
                    </div>
                </div>
                </div>
            </div>
            ';            
            $output .= '
            <tr class="candidates-list">
            <td class="title">
                <div class="thumb">
                    <img class="img-fluid border border-primary"
                        src="' . $row['avatar'] . '" alt="">
                </div>
                <div class="candidate-list-details">
                    <div class="candidate-list-info">
                        <div class="candidate-list-title candidate-name">
                            <h5 class="mb-0"><a href="index.php?page=candidates&id='. $row['id'] .'">'. $row['firstname'] . ' ' . $row['lastname'] .'</a></h5>
                            '.
                            $hoverinfo 
                            .'                            
                        </div>
                        <div class="candidate-list-option">
                            <ul class="list-unstyled">
                                <li>' . $row['major'] . '</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </td>
            <td class="candidate-list-objective mb-0">
                <span>'. $row['position'] .'</span>
            </td>
            <td>
                <a href="index.php?page=candidates&id='. $row['id'] . '"><button class = "btn btn-outline-secondary btn-sm">View CV</button></a>
            </td>
            </tr>                                                     
            ';
        }
        $output .= '</tbody>
        </table>';
    }

    echo $output;
    $conn->close();
}
?>