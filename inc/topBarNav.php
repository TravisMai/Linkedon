<?php
session_start(); // start session

$page = isset($_GET['page']) ? $_GET['page'] : 'home';

if (isset($_GET['id'])) {
    $page = 'show_resume';
}

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
<script src="./scripts/imagesloaded.pkgd.min.js?ver=1.2.0"></script>
<script src="./scripts/masonry.pkgd.min.js?ver=1.2.0"></script>
<script src="./scripts/BigPicture.min.js?ver=1.2.0"></script>
<script src="./scripts/purecounter.min.js?ver=1.2.0"></script>
<script src="./scripts/bootstrap.bundle.min.js?ver=1.2.0"></script>
<script src="./scripts/aos.min.js?ver=1.2.0"></script>
<script src="./scripts/main.js?ver=1.2.0"></script>
<header class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-light bg-light" id="header-nav" role="navigation">
        <div class="container"><a class="link-dark navbar-brand site-title mb-0"
                style="color:  #ff7153; font-size: 30px" href="index.php?page=home">Linked<span
                    style="background-color: #ff7153; color: white; border-radius: 5px; padding-left: 2px; padding-right: 2px; margin-left: 2px;">On</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto me-2">
                    <li class="nav-item"><a class="nav-link" href="index.php?page=home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?page=about">About</a></li>
                    <?php
                    if (isset($_SESSION["user_id"])) {
                        require_once('./config.php');
                        $servername = DB_SERVER;
                        $username = DB_USERNAME;
                        $password = DB_PASSWORD;
                        $dbname = DB_NAME;
                        $conn = new mysqli($servername, $username, $password, $dbname);

                        // Get the user's type by querying the database with the user_id stored in the session
                        $user_id = $_SESSION["user_id"];
                        $stmt = $conn->prepare("SELECT `type` FROM users WHERE `id` = ?");
                        $stmt->bind_param("i", $user_id);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $row = $result->fetch_assoc();
                        $user_type = $row['type'];

                        // Check the user's type and perform the appropriate action
                        if ($user_type == 0) {
                            echo '<li class="nav-item"><a class="nav-link" href="index.php?page=candidates">Candidates</a></li>';
                            echo '<li class="nav-item"><a class="nav-link" href="index.php?page=add_cv">Modify CV</a></li>';
                        } else {
                            echo '<li class="nav-item"><a class="nav-link" href="index.php?page=candidates">Candidates</a></li>';
                        }
                    }
                    ?>
                </ul>
                <ul class="navbar-nav ms-auto me-2">
                    <?php
                    // check if user is logged in
                    if (isset($_SESSION['user_id']) && $_SESSION['user_id'] > 0 && $user_type == 0) {
                        // user is logged in, show dropdown button
                        echo '<li class="nav-item dropdown">';
                        echo '<a class="nav-link dropdown-toggle" href="#" id="user-dropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">';
                        echo '<i class="fa fa-user-circle fa-spin"></i>';
                        echo '</a>';
                        echo '<ul class="dropdown-menu" aria-labelledby="user-dropdown">';
                        echo '<li><a class="dropdown-item" href="index.php?page=action/setup_profile">My Profile</a></li>';
                        echo '<li><a class="dropdown-item" href="index.php?page=candidates&id=' . $_SESSION["user_id"] . '">My Resume</a></li>';
                        echo '</ul>';
                        echo '</li>';
                    } else {
                        echo '<li class="nav-item"><a class="nav-link" href="index.php?page=action/setup_profile"><i class="bi bi-person-circle"></i></a></li>';
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