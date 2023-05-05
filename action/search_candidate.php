<?php

if(isset($_GET['query'])){
    $query = intval($_GET['query']);

    require_once('../initialize.php');
    require_once('../database/dbconnect.php');

    $sql = "SELECT
    users.id, 
    users.firstname, 
    users.lastname, 
    users.avatar, 
    resume.objective, 
    education.major 
    FROM users
    INNER JOIN resume ON users.id = resume.user_id
    INNER JOIN education ON resume.id = education.resume_id
    WHERE users.id = $query";

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
            $output .= '
            <tr class="candidates-list">
            <td class="title">
                <div class="thumb">
                    <img class="img-fluid border border-primary"
                        src="' . $row['avatar'] . '" alt="">
                </div>
                <div class="candidate-list-details">
                    <div class="candidate-list-info">
                        <div class="candidate-list-title">
                            <h5 class="mb-0"><a href="index.php?page=candidates&id='. $row['id'] .'">'. $row['firstname'] . ' ' . $row['lastname'] .'</a></h5>
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
                <span>'. $row['objective'] .'</span>
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