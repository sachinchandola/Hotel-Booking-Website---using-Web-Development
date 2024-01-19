<?php
include './includes/config.php';
$confirmpass='false';
$emailexist='false';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $confirmpass = $_POST['confirmpass'];

    if ($pass == $confirmpass) {
        $sqlemail = "SELECT * FROM registration where email='$email'";
        $resultemail = mysqli_query($con, $sqlemail);
        if (mysqli_num_rows($resultemail) != 1) {
            $sql2 = "INSERT INTO registration  (name, email, password)  value ('$name', '$email', '$pass' ) ";

            $result2 = mysqli_query($con, $sql2);

            if (!$result2) {
                echo " sql error occur: " . mysqli_error();
            } else {
                $_SESSION['name'] = $name;
                header("Location: ./index.php");
                exit;
            }

        }{
            $emailexist='true';
        }
    }else{
        $confirmpass='true';
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/media-query.css">

    <title>I Am Foodie</title>
</head>

<body>
    <main class="main_auth_cont" style="background-image: url(./assets/images/bg-02.jpg);">
        <div class="form-container" id="login-form">
            <h1>Sign up</h1>
            <form class="signup_form" action='signup.php' method='post'>
                <label for="username">Username</label>
                <input type="text" id="username" name="name" required>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
                <label for="password">Password</label>
                <input type="password" id="password" name="pass" required>
                <label for="confirmpassword">Confirm Password</label>
                <input type="password" id="confirmpassword" name="confirmpass" required>
                <button type="submit">Sign up</button>
            </form>
            <p>Already have an account? <a href="login.php" id="signup-link">Log in</a></p>
            
            <div class="back_to_home"><a href="index">Back to Home</a></div>

            <div class="overlay_logo">
                <img src="./assets/images/logo2.png" alt="">
            </div>
        </div>
    </main>

    <?php include './includes/footer.php'; ?>