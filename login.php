<?php
 include './includes/config.php';
 session_destroy();
 session_start();
 
 $login='false';
 

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $pass = $_POST['pass'];


    $sqlw = "SELECT * from registration WHERE email= '$email' AND password='$pass' ";

    $resultw = mysqli_query($con, $sqlw);

    $c = mysqli_num_rows($resultw);

    if ($c == 1) {
        $tempw = mysqli_fetch_assoc($resultw);
        $_SESSION['name'] = $tempw['name'];
        header("Location: ./index.php");
        exit;
    } else{
        $login='true';
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

    <main class="main_auth_cont" style="background-image: url(./assets/images/bg-01.jpg);">
        <div class="form-container" id="login-form">
            <h1>Log in</h1>
            <form action='login.php' method='post'>
            <label for="username">Email</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Password</label>
            <input type="password" id="password" name="pass" required>
            <button type="submit">Login</button>
            </form>
            <p>Don't have an account? <a href="signup.php" id="signup-link">Sign up</a></p>
            
            <div class="back_to_home"><a href="index">Back to Home</a></div>

            <div class="overlay_logo">
            <img src="./assets/images/logo2.png" alt="">
            </div>
        </div>
    </main>
</body>
</html>
   
<?php include './includes/footer.php'; ?>