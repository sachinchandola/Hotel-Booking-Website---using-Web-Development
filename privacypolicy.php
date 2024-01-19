<?php 
 include './includes/header.php';
 
 $sqlk = "SELECT * from privacy ";

$resultk = mysqli_query($con, $sqlk);
$tempt = mysqli_fetch_assoc($resultk);

if (!$resultk) {
    echo " sql error occur: " . mysqli_error();
}
 ?>

        <main class="aboutus_cont contactus_cont">
            <div class="hero_banner" style="background-image: url(./assets/images/privacy-policy.jpg);">
                <h1 style="text-shadow: none;">Privacy Policy</h1>
            </div>


            <div class="img_txt_cont container">

                <!-- This portion will be dynamic -->
                <?php  echo $tempt['about']; ?>

            </div>

        </main>

        <?php include './includes/footer.php';?>

