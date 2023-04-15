<!DOCTYPE html>
<html lang="en">

<?php require_once('inc/header.php') ?>
<?php
ob_start();
?>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css"
        integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" /> 
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <style>
        th {
            font-size: 20px;
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
        .candidate-list:hover a.candidate-list-objective {
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
            -webkit-box-flex: 0;
            -ms-flex: 0 0 90px;
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
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
            margin-bottom: 20px;
            font-size: 16px;
            color: #646f79;
        }
        .candidate-list:hover {
            position: inherit;
            -webkit-box-shadow: inherit;
            box-shadow: inherit;
            z-index: inherit;
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
                    <input type="text" class="form-control rounded" placeholder="Search for candidate">

                </div>
                <!-- Filter buttons -->
                <div class="container d-flex flex-wrap justify-content-around">
                    <div class = "d-flex pt-1">
                        <select class="form-select" aria-label="Sort by Objective">
                            <option value="0" selected>Objective</option>
                            <option value="1">Tutor</option>
                            <option value="2">Computer Scientist</option>
                            <option value="3">Manager</option>
                        </select>             
                    </div>    
                    <div class = "d-flex pt-1">
                        <select class="form-select" aria-label="Sort by Major">
                            <option value="0" selected>Major</option>
                            <option value="1">Tutor</option>
                            <option value="2">Computer Scientist</option>
                            <option value="3">Manager</option>
                        </select>             
                    </div>        
                </div>

                <!-- Show a list of candidates with name, major and their objective -->
                <div class="container mt-3 mb-4" id="candidate-all">
                    <div class="col-lg-12 mt-4 mt-lg-0">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- This div show the value when search for candidate -->
                                <div class="user-dashboard-info-box table-responsive mb-0 bg-white p-4 shadow-sm" id="candidate-search-result">
                                    <table class="table manage-candidates-top mb-0">
                                        <thead>
                                            <tr>
                                                <th>Candidate Name</th>
                                                <th>Objective</th>
                                                <th class="action text-right"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="candidates-list">
                                                <td class="title">
                                                    <div class="thumb">
                                                        <img class="img-fluid border border-primary"
                                                            src="https://i.ibb.co/P5hLdTg/profile-picture.png" alt="">
                                                    </div>
                                                    <div class="candidate-list-details">
                                                        <div class="candidate-list-info">
                                                            <div class="candidate-list-title">
                                                                <h5 class="mb-0"><a href="#">Hung Dep Trai</a></h5>
                                                            </div>
                                                            <div class="candidate-list-option">
                                                                <ul class="list-unstyled">
                                                                    <li>Information Technology</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="candidate-list-objective">

                                                    <span class=>Tutor</span>
                                                </td>
                                                <td>
                                                    <ul class="list-unstyled mb-0 d-flex justify-content-end">
                                                        <li class="text-secondary"><i class="bi fa-lg bi-three-dots-vertical"></i></li>
                                                    </ul>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
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
                                            <tr class="candidates-list">
                                                <td class="title">
                                                    <div class="thumb">
                                                        <img class="img-fluid border border-primary"
                                                            src="https://i.ibb.co/x3wfK5z/female-avatar.jpg" alt="">
                                                    </div>
                                                    <div class="candidate-list-details">
                                                        <div class="candidate-list-info">
                                                            <div class="candidate-list-title">
                                                                <h5 class="mb-0"><a href="#">Hung Dep Trai</a></h5>
                                                            </div>
                                                            <div class="candidate-list-option">
                                                                <ul class="list-unstyled">
                                                                    <li>Information Technology</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="candidate-list-objective">
                                                    <span class=>Tutor</span>
                                                </td>
                                                <td>
                                                    <ul class="list-unstyled mb-0 d-flex justify-content-end">
                                                        <li class="text-secondary"><i class="bi fa-lg bi-three-dots-vertical"></i></li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            <tr class="candidates-list">
                                                <td class="title">
                                                    <div class="thumb">
                                                        <img class="img-fluid border border-primary"
                                                            src="https://i.ibb.co/P5hLdTg/profile-picture.png" alt="">
                                                    </div>
                                                    <div class="candidate-list-details">
                                                        <div class="candidate-list-info">
                                                            <div class="candidate-list-title">
                                                                <h5 class="mb-0"><a href="#">Hung Dep Trai</a></h5>
                                                            </div>
                                                            <div class="candidate-list-option">
                                                                <ul class="list-unstyled">
                                                                    <li>Human Resources</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="candidate-list-objective">

                                                    <span class=>Human Resources</span>
                                                </td>
                                                <td>
                                                    <ul class="list-unstyled mb-0 d-flex justify-content-end">
                                                        <li class="text-secondary"><i class="bi fa-lg bi-three-dots-vertical"></i></li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            <tr class="candidates-list">
                                                <td class="title">
                                                    <div class="thumb">
                                                        <img class="img-fluid border border-primary"
                                                            src="https://i.ibb.co/P5hLdTg/profile-picture.png" alt="">
                                                    </div>
                                                    <div class="candidate-list-details">
                                                        <div class="candidate-list-info">
                                                            <div class="candidate-list-title">
                                                                <h5 class="mb-0"><a href="#">Hung Dep Trai</a></h5>
                                                            </div>
                                                            <div class="candidate-list-option">
                                                                <ul class="list-unstyled">
                                                                    <li>Computer Science</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="candidate-list-objective">

                                                    <span class=>Project Manager</span>
                                                </td>
                                                <td>
                                                    <ul class="list-unstyled mb-0 d-flex justify-content-end">
                                                        <li class="text-secondary"><i class="bi fa-lg bi-three-dots-vertical"></i></li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            <tr class="candidates-list">
                                                <td class="title">
                                                    <div class="thumb">
                                                        <img class="img-fluid border border-primary"
                                                            src="https://i.ibb.co/P5hLdTg/profile-picture.png" alt="">
                                                    </div>
                                                    <div class="candidate-list-details">
                                                        <div class="candidate-list-info">
                                                            <div class="candidate-list-title">
                                                                <h5 class="mb-0"><a href="#">Hung Dep Trai</a></h5>
                                                            </div>
                                                            <div class="candidate-list-option">
                                                                <ul class="list-unstyled">
                                                                    <li>Computer Science</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="candidate-list-objective">

                                                    <span class=>Computer Scientist</span>
                                                </td>
                                                <td>
                                                    <ul class="list-unstyled mb-0 d-flex justify-content-end">
                                                        <li class="text-secondary"><i class="bi fa-lg bi-three-dots-vertical"></i></li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            <tr class="candidates-list">
                                                <td class="title">
                                                    <div class="thumb">
                                                        <img class="img-fluid border border-primary"
                                                            src="https://i.ibb.co/P5hLdTg/profile-picture.png" alt="">
                                                    </div>
                                                    <div class="candidate-list-details">
                                                        <div class="candidate-list-info">
                                                            <div class="candidate-list-title">
                                                                <h5 class="mb-0"><a href="#">Hung Dep Trai</a></h5>
                                                            </div>
                                                            <div class="candidate-list-option">
                                                                <ul class="list-unstyled">
                                                                    <li>Web Programming</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="candidate-list-objective">

                                                    <span class=>Web Developer</span>
                                                </td>
                                                <td>
                                                    <ul class="list-unstyled mb-0 d-flex justify-content-end">
                                                        <li class="text-secondary"><i class="bi fa-lg bi-three-dots-vertical"></i></li>
                                                    </ul>
                                                </td>
                                            </tr>
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