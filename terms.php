<?php 
 include './includes/header.php';
 
 $sqlk = "SELECT * from termcondition ";

$resultk = mysqli_query($con, $sqlk);
$tempt = mysqli_fetch_assoc($resultk);

if (!$resultk) {
    echo " sql error occur: " . mysqli_error();
}
 ?>



        <main class="aboutus_cont contactus_cont">
            <div class="hero_banner" style="background-image: url(./assets/images/terms_conditions.jpg);">
                <h1 style="text-shadow: none;">Terms & Conditions</h1>
            </div>


            <div class="img_txt_cont">
                
                <!-- This portion will be dynamic -->

                <div style="display: flex; flex-direction: column;">
                <?php  echo $tempt['about']; ?>
                </div>

                <!-- This portion will be dynamic -->
                
            </div>

        </main>

        <?php include './includes/footer.php';?>
