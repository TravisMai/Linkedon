<?php
session_start(); // start session

$page = isset($_GET['page']) ? $_GET['page'] : 'home';
$page_path = dirname(__DIR__) . '/' . $page . '.php';

// check if user is logged in
if (isset($_SESSION['user_id']) && $_SESSION['user_id'] > 0) {
    // user is logged in, show logout option
    $login_link = 'logout.php';
    $login_text = 'Logout';
} else {
    // user is not logged in, show login/register option
    $login_link = 'login.php';
    $login_text = 'Login/Register';
}

// output header with dynamic login link
?>
<header class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-light bg-light" id="header-nav" role="navigation">
        <div class="container"><a class="link-dark navbar-brand site-title mb-0" href="#">Worst CV</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto me-2">
                    <li class="nav-item"><a class="nav-link" href="index.php?page=add_cv">Job Seeker</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?page=cvs">Candidates</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?page=home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?page=about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?page=products">Products</a></li>
                </ul>    
                <ul class="navbar-nav ms-auto me-2">    
                    <?php
                        // check if user is logged in
                        if (isset($_SESSION['user_id']) && $_SESSION['user_id'] > 0) {
                            // user is logged in, show profile option
                            echo '<li class="nav-item"><a class="nav-link" href="action/setup_profile.php"><i class="bi bi-person-circle"></i></a></li>';
                        } 
                    ?>    
                    <li class="nav-item"><a class="nav-link" href="<?php echo $login_link; ?>"><?php echo $login_text; ?></a></li>               
                </ul>
            </div>
        </div>
    </nav>
</header>

<?php
// include requested page
if (file_exists($page_path)) {
    include($page_path);
} else {
    echo 'Page not found!';
}
?>
