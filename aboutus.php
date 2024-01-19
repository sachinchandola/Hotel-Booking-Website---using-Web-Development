<?php

include './includes/header.php';

$sql1 = "SELECT * from abouts ";

$result1 = mysqli_query($con, $sql1);


if (!$result1) {
    echo " sql error occur: " . mysqli_error();
}

?>


        <main class="aboutus_cont">
            <div class="hero_banner" style="background-image: url(./assets/images/banner01.jpg);">
                <h1>About Us</h1>
            </div>


            <?php
            $k=1;
            while($temp1 = mysqli_fetch_assoc($result1)){
            if($k%2==0){
            ?>
            <div class="img_txt_cont reversed">
                <div class="left" data-aos="fade-left">
                    <img src="./assets/images/<?php echo $temp1['image'];?>" alt="">
                </div>
                <div class="right" data-aos="fade-right">
                    <h3><?php  echo $temp1['title'];?></h3>
                    <p><?php  echo $temp1['about'];?></p>
                    
                </div>
            </div>
            <?php
            }
            else{
                ?>


            <div class="img_txt_cont">
                <div class="left" data-aos="fade-right">
                    <img src="./assets/images/<?php echo $temp1['image'];?>" alt="">
                </div>
                <div class="right" data-aos="fade-left">
                    <h3><?php echo $temp1['title'];?></h3>
                    <p><?php  echo $temp1['about'];?></p>
                </div>
            </div>
            <?php
            }

            $k++;
            }
            ?>


        </main>

        <?php include './includes/footer.php';?>

