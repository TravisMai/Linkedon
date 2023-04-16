<!DOCTYPE html>
<html lang="en">

<?php require_once('inc/header.php') ?>
<?php require_once('initialize.php') ?>
<?php
ob_start();
?>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css"
        integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" /> 
    <style>
        th {
            font-size: 20px;
        }
        select {
            max-width: 200px;
        }
        .select-label {
            background: #F6E05E;
        }
        .user-dashboard-info-box .candidates-list .thumb {
            margin-right: 20px;
        }
        .user-dashboard-info-box .candidates-list .thumb img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            overflow: hidden;
            border-radius: 50%;
        }
        .user-dashboard-info-box .title {
            display: flex;
            align-items: center;
            padding: 30px 0;
        }
        .user-dashboard-info-box .candidates-list td {
            vertical-align: middle;
        }
        .user-dashboard-info-box td li {
            margin: 0 4px;
        }
        .user-dashboard-info-box .table thead th {
            border-bottom: none;
        }
        .table.manage-candidates-top th {
            border: 0;
        }
        .user-dashboard-info-box .candidate-list-objective {
            margin-bottom: 10px;
        }
        .table.manage-candidates-top {
            min-width: 100px;
        }
        .user-dashboard-info-box .candidate-list-details ul {
            color: #969696;
        }
        /* Candidate List */
        .candidate-list {
            background: #f1f1f1;
            display: flex;
            border-bottom: 1px solid #eeeeee;
            align-items: center;
            padding: 20px;
        }
        .candidate-list:hover a .candidate-list-objective {
            color: #e74c3c;
            box-shadow: -1px 4px 10px 1px rgba(24, 111, 201, 0.1);
        }
        .candidate-list .candidate-list-image {
            margin-right: 25px;
            flex: 0 0 80px;
            border: none;
        }
        .candidate-list .candidate-list-image img {
            width: 80px;
            height: 80px;
            object-fit: cover;
        }
        .candidate-list-title {
            margin-bottom: 5px;
        }
        .candidate-list-details ul {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 0px;
        }
        .candidate-list-details ul li {
            margin: 5px 10px 5px 0px;
            font-size: 13px;
        }
        .candidate-list {
            margin-left: auto;
            text-align: center;
            font-size: 13px;
            flex: 0 0 90px;
        }
        .candidate-list .span {
            display: block;
            margin: 0 auto;
        }
        .candidate-list .candidate-list-objective {
            display: inline-block;
            position: relative;
            height: 40px;
            width: 40px;
            line-height: 40px;
            border: 1px solid #eeeeee;
            border-radius: 100%;
            text-align: center;
            margin-bottom: 20px;
            font-size: 16px;
            color: #646f79;
        }
        .user-dashboard-info-box .candidates-list .thumb {
            margin-right: 20px;
        }
        .bi-three-dots-vertical:hover {
            display: block;
            background-color: #F6BB42;
            border-radius: 50%;
        }
        #candidate-search-result {
            display: none;
        }
        @media screen and (max-width: 800px) {
            .user-dashboard-info-box .candidates-list .thumb img {
                width: 40px;
                height: 40px;
            }

            .candidate-list-title h5 {
                font-size: 10px;
                padding-left: 10px;
            }

            .candidate-list-option ul li {
                font-size: 8px;
                padding-left: 10px;
            }

            .candidate-list-objective {
                font-size: 8px;
            }

            th {
                font-size: 10px;
            }
        }
    </style>
    <script>

        // Show candidate after click on search dropdown
        // disable the filter parts
        // enable Show All button to go back and show the whole list
        function showCandidate(userid) {

            document.getElementById('filterObjective').disabled = true;
            document.getElementById('filterMajor').disabled = true;
            // clear input field
            var inputField = document.getElementById('searchInput');
            inputField.value = '';
            // remove show class from dropdown menu
            var searchMenu = document.querySelector('#searchMenu');
            searchMenu.classList.remove('show');

            var candidate_search = document.getElementById("candidate-search-result");
            var candidate_all = document.getElementById("candidate-all");
            var showBtn = document.getElementById("showBtn");
            var filterBtn = document.getElementById("filterBtn");

            if (userid.length == 0) {
                candidate_search.innerHTML="";
                return;
            }
            var xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange=function() {
                if (this.readyState==4 && this.status==200) {
                    showBtn.disabled = false;
                    filterBtn.disabled = true;
                    candidate_all.style.display = 'none';
                    candidate_search.style.display = 'block';
                    candidate_search.innerHTML=this.responseText;
                }
            }
            xmlhttp.open("GET","action/search_candidate.php?query="+userid,true);
            xmlhttp.send();
        }

        // Create a dropdown list of search results that has the beginning match with user's input
        function searchCandidate(str) {
            if (str.length == 0) {
                document.getElementById("search-dropdown").innerHTML="";
                return;
            }
            var xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange=function() {
                if (this.readyState==4 && this.status==200) {
                    document.getElementById("search-dropdown").innerHTML=this.responseText;
                }
            }
            xmlhttp.open("GET","action/search_dropdown.php?query="+str,true);
            xmlhttp.send();
        }
        
        // Show candidate based on the condition set inside the filters after click the Filter button
        function filterCandidates() {
            var objective = document.getElementById("filterObjective").value;
            var major = document.getElementById("filterMajor").value;
            var candidate_search = document.getElementById("candidate-search-result");
            var candidate_all = document.getElementById("candidate-all");
            var showBtn = document.getElementById("showBtn");

            if(objective == '0' && major == '0') {
                showBtn.disabled = true;
                candidate_all.style.display = 'block';
                candidate_search.style.display = 'none';
                return;
            }
            else {
                var xmlhttp = new XMLHttpRequest();

                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        showBtn.disabled = false;
                        candidate_all.style.display = 'none';
                        candidate_search.style.display = 'block';

                        candidate_search.innerHTML=this.responseText;
                    }
                };
                xmlhttp.open("GET", "action/filter_candidate.php?objective=" + objective + "&major=" + major, true);
                xmlhttp.send();
            }            
        }

        // Show All button will show all candidate and will be enable after a search
        function toggleShowBtn(){
            var candidate_search = document.getElementById("candidate-search-result");
            var candidate_all = document.getElementById("candidate-all");
            var showBtn = document.getElementById("showBtn");
            var filterBtn = document.getElementById("filterBtn");
            var objectiveSlct = document.getElementById("filterObjective");
            var majorSlct = document.getElementById("filterMajor");

            if(candidate_search.style.display === 'none') {         
                candidate_search.style.display = 'block';
                candidate_all.style.display = 'none';
            }
            else {
                document.getElementById('filterObjective').disabled = false;
                document.getElementById('filterMajor').disabled = false;
                filterBtn.disabled = false;
                showBtn.disabled = true;

                objectiveSlct.selectedIndex = 0;
                majorSlct.selectedIndex = 0;

                candidate_search.style.display = 'none';
                candidate_all.style.display = 'block';
            }
        }

    </script>
</head>

<body id="top">
    <?php require_once('inc/topBarNav.php') ?>

    <div class="page-content bg-light">
        <div id="content">
            <!-- The detail of candidate will be show when user click on a candidate's name or click view detail -->
            <div class="container" id = "detail-of-candidate"></div>
            <!-- This appear first when user click on "Candidates" -->
            <div class="container" id = "search-for-candidate">
                <h1><u class="text-warning">CVs</u></h1>
                <!-- Search bar -->
                <div class="container mt-3 mb-2">
                    <input type="text" onkeyup="searchCandidate(this.value)" class="form-control rounded" id = "searchInput" placeholder="Search for candidate">
                    <div class = "container" id="search-dropdown"></div>
                </div>
                <!-- Filter buttons -->
                <div class="container d-flex flex-wrap justify-content-around">
                    <div class = "d-flex pt-1">
                        <select class="form-select w-100" aria-label="Sort by Objective" id = "filterObjective">
                            <option class="select-label" value="0" selected>Objective</option>
                            <?php
                                include "database/dbconnect.php";

                                $sql = "SELECT DISTINCT `objective` FROM `resume`";

                                $result = $conn->query($sql);

                                if(mysqli_num_rows($result) > 0){
                                    while($row = $result->fetch_assoc()) {
                                        echo '<option value="'. $row['objective'] .'">'. $row['objective'] .'</option>';
                                    }
                                }
                            ?>
                        </select>             
                    </div>    
                    <div class = "d-flex pt-1">
                        <select class="form-select w-100" aria-label="Sort by Major" id = "filterMajor">
                            <option class="select-label" value="0" selected>Major</option>
                            <?php
                                include "database/dbconnect.php";

                                $sql = "SELECT DISTINCT `major` FROM `education`";

                                $result = $conn->query($sql);

                                if(mysqli_num_rows($result) > 0){
                                    while($row = $result->fetch_assoc()) {
                                        echo '<option value="'. $row['major'] .'">'. $row['major'] .'</option>';
                                    }
                                }
                            ?>
                        </select>             
                    </div>        
                    <div class = "d-flex pt-1">
                        <button class = "btn btn-secondary me-1" onclick= "filterCandidates()" id = "filterBtn">Filter</button>
                        <button class = "btn btn-primary" onclick= "toggleShowBtn()" id = "showBtn" disabled>Show All</button>
                    </div>
                </div>
                <!-- Show a list of candidates with name, major and their objective -->
                <div class="container mt-3 mb-4">
                    <div class="col-lg-12 mt-4 mt-lg-0">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- This div show the value when search for candidate -->
                                <div class="user-dashboard-info-box table-responsive mb-0 bg-white p-4 shadow-sm" id="candidate-search-result"></div>
                                <!-- Table display when user click on Candidates on NavBar-->
                                <div class="user-dashboard-info-box table-responsive mb-0 bg-white p-4 shadow-sm" id="candidate-all">
                                    <table class="table manage-candidates-top mb-0">
                                        <thead>
                                            <tr>
                                                <th>Candidate Name</th>
                                                <th>Objective</th>
                                                <th class="action text-right"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                include "database/dbconnect.php";
                                                // select data to show to the list of candidates/
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
                                                ORDER BY resume.date_added DESC;";

                                                $result = $conn->query($sql);
                                                if(mysqli_num_rows($result) > 0){
                                                    while($row = $result->fetch_assoc()) {
                                                        echo
                                                        '<tr class="candidates-list">
                                                        <td class="title">
                                                            <div class="thumb">
                                                                <img class="img-fluid border border-primary"
                                                                    src="' . $row['avatar'] . '" alt="">
                                                            </div>
                                                            <div class="candidate-list-details">
                                                                <div class="candidate-list-info">
                                                                    <div class="candidate-list-title">
                                                                        <h5 class="mb-0"><a href="#">'. $row['firstname'] . ' ' . $row['lastname'] .'</a></h5>
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
                                                            <ul class="list-unstyled mb-0 d-flex justify-content-end">
                                                                <li class="text-secondary"><i class="bi fa-lg bi-three-dots-vertical"></i></li>
                                                            </ul>
                                                        </td>
                                                        </tr>                                                     
                                                        ';
                                                    }
                                                }
                                                $conn->close();
                                            ?>
                                        </tbody>
                                    </table>
                                    <div class="text-center mt-3 mt-sm-3">
                                        <ul class="pagination justify-content-center mb-0">
                                            <li class="page-item disabled"> <span class="page-link">Prev</span> </li>
                                            <li class="page-item active" aria-current="page"><span class="page-link">1
                                                </span> <span class="sr-only">(current)</span></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item"><a class="page-link" href="#">...</a></li>
                                            <li class="page-item"><a class="page-link" href="#">25</a></li>
                                            <li class="page-item"> <a class="page-link" href="#">Next</a> </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once('inc/footer.php') ?>
    </div>

    <div id="scrolltop">
        <a class="btn btn-secondary" href="#top">
            <span class="icon">
                <i class="fas fa-angle-up fa-x"></i>
            </span>
        </a>
    </div>
    <script src="./scripts/imagesloaded.pkgd.min.js?ver=1.2.0"></script>
    <script src="./scripts/masonry.pkgd.min.js?ver=1.2.0"></script>
    <script src="./scripts/BigPicture.min.js?ver=1.2.0"></script>
    <script src="./scripts/purecounter.min.js?ver=1.2.0"></script>
    <script src="./scripts/bootstrap.bundle.min.js?ver=1.2.0"></script>
    <script src="./scripts/aos.min.js?ver=1.2.0"></script>
    <script src="./scripts/main.js?ver=1.2.0"></script>

</body>

</html>