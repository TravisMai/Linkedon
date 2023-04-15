<?php
if(isset($_GET['query'])){
    $query = $_GET['query'];

    require_once('../initialize.php');
    require_once('../database/dbconnect.php');

    $sql = "SELECT * FROM `users` WHERE (firstname LIKE '" . $query . "%' OR lastname LIKE '". $query ."%')";
    $result = $conn->query($sql);

    $output = '';
    if(mysqli_num_rows($result) > 0){
        $output .= '<div class="dropdown-menu show" id = "searchMenu">';
        while($row = $result->fetch_assoc()) {
            $output .= "<input type = \"button\" value = \"". $row['firstname'] . ' ' . $row['lastname'] ."\" onclick= \"showCandidate('" . $row['id'] . "') \"class=\"dropdown-item\">";
        }
        $output .= '</div>';
    }
    else {
        $output .= '<div class="dropdown-menu show"><a class = "dropdown-item">No candidate found</a></div>';
    }
    echo $output;
    $conn->close();
}

?>