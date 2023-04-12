<?php require_once('config.php') ?>
<!DOCTYPE html>
<html lang="en" class="" style="height: auto;">
<?php require_once('inc/header.php') ?>
<?php require_once('index.php')?>
<head>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!--Stylesheet-->
    <style media="screen">
        *,
        *:before,
        *:after {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #000000;
        }

        .background {
            width: 430px;
            height: 520px;
            position: absolute;
            transform: translate(-50%, -50%);
            left: 50%;
            top: 50%;
        }

        .background .shape {
            height: 200px;
            width: 200px;
            position: absolute;
            border-radius: 50%;
        }

        .shape:first-child {
            background: linear-gradient(#1845ad,
                    #23a2f6);
            left: -80px;
            top: -80px;
        }

        .shape:last-child {
            background: linear-gradient(to right,
                    #ff512f,
                    #f09819);
            right: -30px;
            bottom: -80px;
        }

        form {
            height: 800px;
            width: 400px;
            background-color: rgba(255, 255, 255, 0.75);
            position: absolute;
            transform: translate(-50%, -50%);
            top: 50%;
            left: 50%;
            border-radius: 10px;
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 0 40px rgba(8, 7, 16, 0.6);
            padding: 50px 35px;
        }

        form * {
            font-family: 'Poppins', sans-serif;
            color: #ffffff;
            letter-spacing: 0.5px;
            outline: none;
            border: none;
        }

        form h3 {
            color: #000000;
            font-size: 32px;
            font-weight: 500;
            line-height: 42px;
            text-align: center;
        }

        label {
            color: #000000;
            display: block;
            margin-top: 30px;
            font-size: 16px;
            font-weight: 500;
        }

        input {
            display: block;
            height: 50px;
            width: 100%;
            background-color: rgba(0, 0, 0, 0.25);
            border-radius: 3px;
            padding: 0 10px;
            margin-top: 8px;
            font-size: 14px;
            font-weight: 300;
        }

        ::placeholder {
            color: #e5e5e5;
        }

        button {
            margin-top: 50px;
            width: 100%;
            background-color: rgba(0, 0, 0, 0.45);
            color: #080710;
            padding: 15px 0;
            font-size: 18px;
            font-weight: 600;
            border-radius: 5px;
            cursor: pointer;
        }

        .social {
            margin-top: 30px;
            display: flex;
        }

        .social div {
            background: red;
            width: 150px;
            border-radius: 3px;
            padding: 5px 10px 10px 5px;
            background-color: rgba(255, 255, 255, 0.27);
            color: #eaf0fb;
            text-align: center;
        }

        .social div:hover {
            background-color: rgba(255, 255, 255, 0.47);
        }

        .social .fb {
            margin-left: 25px;
        }

        .social i {
            margin-right: 4px;
        }

        .cate{
            height: 1em;
            width: 30px;
        }

        .type-form{
            /* width: 40px; */
            display: inline-block;
        }
        
    </style>
</head>

<body>
    <form action="./action/create_user.php" method="post">
        <h3>Register Here</h3>
        <label for="username">Email:</label>
        <input type="text" name="email" id="email" placeholder="Email" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>" required>

        <label for="username">Username:</label>
        <input type="text" name="username" id="username" placeholder="Name" value="<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?>" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="Password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*\W)(?=.*[a-zA-Z]).{8,}" title="Password must contain at least one uppercase letter, one lowercase letter, one number, one special character, and be at least 8 characters long.">
        
        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*\W)(?=.*[a-zA-Z]).{8,}" title="Password must contain at least one uppercase letter, one lowercase letter, one number, one special character, and be at least 8 characters long.">
        
        <div class="type-form"> 
            <label for="employee">Job seeker</label>
            <input class="cate" type="radio" name="typeUser" value= 0 id="employee" checked>
        </div>
        
        <div class="type-form" style ='margin-left: 100px;' >
            <label for="employer">Employer</label>
            <input class="cate" type="radio" name="typeUser" value= 1 id="employer">
        </div>

        <label><a href="./login.php" style="color:#000000">Already have one?</a></label>

        <button type="submit" value="Create User">Register</button>
    </form>
</body>
<?php
if (isset($error_msg)) {
    echo $error_msg;
}
?>

</html>