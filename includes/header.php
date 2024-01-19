<?php 
 include './includes/config.php';

 $sqllf = "SELECT * from logofavi ";

 $resultlf = mysqli_query($con, $sqllf);
 $templf = mysqli_fetch_assoc($resultlf);
 if (!$resultlf) {
    echo " sql error occur: " . mysqli_error();
}



$sqlform = "SELECT * from googleform ";

$resultform = mysqli_query($con, $sqlform);
$tempform = mysqli_fetch_assoc($resultform);



 ?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="./assets/css/style.css">
        <link rel="stylesheet" href="./assets/css/media-query.css">
        <link rel="shortcut icon" href="<?php echo ADMIN_URL ?>img/<?php echo $templf['favi']; ?>">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <!-- AOS -->
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

        <!-- Link Swiper's CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

        <title>I Am Foodie</title>
    </head>
    <body>
        <header class="header_main sticky-top">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="<?php echo BASE_URL?>">
                        <img src="<?php echo ADMIN_URL ?>img/<?php echo $templf['logo']; ?>" alt="" class="d-inline-block align-text-top">
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="<?php echo BASE_URL ?>">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="aboutus">About us</a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a class="nav-link" href="hotel">Hotels</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="resort">Resorts</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="homestay">Homestays</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="restaurant">Restaurants</a>
                                </li> -->
                                <li class="nav-item">
                                    <a class="nav-link" href="contactus">Contact us</a>
                                </li>

                                <li class="nav-item">
                                    <a href='<?php echo $tempform['business']; ?>' class='btn icon_btn' type='submit' target="_blank">
                                        Business Free Listing
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href='<?php echo $tempform['member']; ?>' class='btn icon_btn' type='submit' target="_blank">
                                        Become A Member
                                        <!-- https://docs.google.com/forms/d/e/1FAIpQLScnYa1i5WSJI-Fa3K6v4JzXgFY9SxxcTfJiCiPOgZ4vzZO70Q/viewform?usp=sf_link -->
                                    </a>
                                </li>
                            </ul>
            <?php
            if(isset($_SESSION['name'])){
                echo "<a href='#' class='btn icon_btn profile_btn' type='submit'>
                <img class='icon' src='./assets/icons/user.png' alt=''>
            ".$_SESSION['name']."
                </a>
                &nbsp;
                <a href='login.php' class='btn icon_btn' type='submit'>
                    <img class='icon' style='margin: 0.125rem 0' src='./assets/icons/logout.png' alt=''>
                </a>";


            }
            else{
            echo "<a href='login.php' class='btn icon_btn' type='submit'>
            <img class='icon' src='./assets/icons/user.png' alt=''>
            Login
            </a>";
            }
            ?>
                        
                    </div>
                </div>
            </nav>
        </header>