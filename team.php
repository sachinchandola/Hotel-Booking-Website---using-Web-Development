<?php 
 include './includes/header.php';
 
 $sqlk = "SELECT * from team ";

$resultk = mysqli_query($con, $sqlk);
$tempt = mysqli_fetch_assoc($resultk);

if (!$resultk) {
    echo " sql error occur: " . mysqli_error();
}
 ?>



        <main class="aboutus_cont contactus_cont">
            <div class="hero_banner" style="background-image: url(./assets/images/team-sec.jpg);">
                <h1 style="text-shadow: none;">Our Team</h1>
            </div>


            <div class="img_txt_cont">
                
                

                <div style="display: flex; flex-direction: column;">

                <?php  echo $tempt['about']; ?>

                </div>

                
            </div>

        </main>

        <?php include './includes/footer.php';?>
