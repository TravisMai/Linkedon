<?php
session_start();
session_unset();
session_destroy();
setcookie("user_cookie", "", time() - 3600, "/"); // expire cookie
?>
<!DOCTYPE html>
<html>
<head>
	<title>Logout</title>
	<script>
		alert("You have been logged out.");
		window.location.href = "./index.php?page=home";
	</script>
</head>
<body>
</body>
</html>