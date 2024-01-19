<?php
include './includes/header.php';

//login 








$sql1 = "SELECT * from banner ";

$result1 = mysqli_query($con, $sql1);


if (!$result1) {
    echo " sql error occur: " . mysqli_error();
}


$sql2 = "SELECT * from homeabout ";

$result2 = mysqli_query($con, $sql2);
$temp2 = mysqli_fetch_assoc($result2);

if (!$result2) {
    echo " sql error occur: " . mysqli_error();
}

$sql3 = "SELECT * from membership ";

$result3 = mysqli_query($con, $sql3);
$temp3 = mysqli_fetch_assoc($result3);

if (!$result3) {
    echo " sql error occur: " . mysqli_error();
}

$sql4 = "SELECT * from location ";

$result4 = mysqli_query($con, $sql4);
$temp4 = mysqli_fetch_assoc($result4);

if (!$result4) {
    echo " sql error occur: " . mysqli_error();
}

$sql5 = "SELECT * from testimonial ";

$result4 = mysqli_query($con, $sql4);
$temp4 = mysqli_fetch_assoc($result4);

if (!$result4) {
    echo " sql error occur: " . mysqli_error();
}

$sql5 = "SELECT * from testimonial ";

$result5 = mysqli_query($con, $sql5);
if (!$result5) {
    echo " sql error occur: " . mysqli_error();
}


$sql6 = "SELECT * from hotels";
$result6 = mysqli_query($con, $sql6);
$count6 = mysqli_num_rows($result6);
$start6 = $count6 - 5;
if ($start6 <= 0) {
    $start6 = 0;
}


$sql66 = "SELECT * from hotels limit $start6, 5";
$result66 = mysqli_query($con, $sql66);
if (!$result66) {
    echo " sql error occur: " . mysqli_error();
}






$sql7 = "SELECT * from resorts";
$result7 = mysqli_query($con, $sql7);
$count7 = mysqli_num_rows($result7);
$start7 = $count7 - 5;
if ($start7 <= 0) {
    $start7 = 0;
}
$sql77 = "SELECT * from resorts limit $start7, 5";
$result77 = mysqli_query($con, $sql77);

if (!$result77) {
    echo " sql error occur: " . mysqli_error();
}






$sql8 = "SELECT * from homestays";
$result8 = mysqli_query($con, $sql8);
$count8 = mysqli_num_rows($result8);
$start8 = $count8 - 5;
if ($start8 <= 0) {
    $start8 = 0;
}

$sql88 = "SELECT * from homestays limit $start8, 5";
$result88 = mysqli_query($con, $sql88);
if (!$result88) {
    echo " sql error occur: " . mysqli_error();
}




$sql9 = "SELECT * from restaurants";
$result9 = mysqli_query($con, $sql9);
$count9 = mysqli_num_rows($result9);
$start9 = $count9 - 5;
if ($start9 <= 0) {
    $start9 = 0;
}

$sql99 = "SELECT * from restaurants limit $start9, 5";
$result99 = mysqli_query($con, $sql99);

if (!$result99) {
    echo " sql error occur: " . mysqli_error();
}


?>





<main class="homepage_main">
    <!-- Hero Section -->
    <section class="hero">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">

                <?php if (mysqli_num_rows($result1) > 0) {

                    $count = 1;
                    while ($temp1 = mysqli_fetch_assoc($result1)) {
                ?>
                        <?php if ($count == 1) { ?>
                            <div class='carousel-item active' data-bs-interval='4000'>
                                <img src='<?php echo ADMIN_URL; ?>img/<?php echo $temp1['image']; ?>' class='d-block w-100' alt='...'>
                            </div>
                        <?php } else {
                        ?>
                            <div class='carousel-item' data-bs-interval='4000'>
                                <img src='<?php echo ADMIN_URL; ?>img/<?php echo $temp1['image']; ?>' class='d-block w-100' alt='...'>
                            </div>
                        <?php
                        }
                        ?>
                <?php
                        $count++;
                    }
                }
                ?>



            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <div class="stay_btns_box">
            <ul>
                <li class="btn_item">
                    <a class="btn_link" href="hotel">Hotels</a>
                </li>
                <li class="btn_item">
                    <a class="btn_link" href="resort">Resort</a>
                </li>
                <li class="btn_item">
                    <a class="btn_link" href="homestay">Homestay</a>
                </li>
                <li class="btn_item">
                    <a class="btn_link" href="restaurant">Restaurant</a>
                </li>
            </ul>
        </div>

    </section>

    <!-- About Section -->
    <section class="about">
        <?php echo "
            <h2 data-aos='zoom-out'>" . $temp2['title'] . "</h2>
            <p data-aos='zoom-out' data-aos-delay='300'>" . $temp2['about'] . "</p>
            ";
        ?>
    </section>

    <!-- Top Hotels Section -->
    <section class="heading">
        <h1 class="title" data-aos="fade-right">
            Top Rated Hotels
        </h1>
        <p class="sub_title" data-aos="fade-left">
            Exquisite Accommodations for Discerning Travelers
        </p>
    </section>
    <?php $temp6 = mysqli_fetch_assoc($result66);
    if (isset($temp6)) {

        $sqls = "SELECT * FROM states where id='{$temp6['state']}' ";
        $result_state = mysqli_query($con, $sqls);
        $temps = mysqli_fetch_assoc($result_state);

        $s = $temps['state_name'];

        $sqld = "SELECT * FROM districts where id='{$temp6['district']}' ";
        $resultd = mysqli_query($con, $sqld);
        $tempd = mysqli_fetch_assoc($resultd);
        $d = $tempd['district_name'];


        $k = $temp6['sno'];
        $sql6i = "SELECT * from imagehotel where id='$k' ";
        $result6i = mysqli_query($con, $sql6i);
        $temp6i = mysqli_fetch_assoc($result6i);


    ?>

        <section class="top_rated">
            <div class="left">
                <a href="staydetails?idd=<?php echo $temp6['sno']; ?>&type=1" class="img_card" data-aos="zoom-out">
                    <img src='<?php echo ADMIN_URL ?>img/<?php echo $temp6i['images']; ?>' alt="">
                    <div class="detail_box">
                        <div class="name">
                            <?php echo $temp6['name']; ?>
                        </div>
                        <div class="location">
                            <?php echo $d . ", " . $s; ?>
                        </div>
                    </div>
                </a>
            </div>

            <?php }
            $temp6 = mysqli_fetch_assoc($result66);
            if (isset($temp6)) {
            $k = $temp6['sno'];
            $sqls = "SELECT * FROM states where id='{$temp6['state']}' ";
            $result_state = mysqli_query($con, $sqls);
            $temps = mysqli_fetch_assoc($result_state);

            $s = $temps['state_name'];

            $sqld = "SELECT * FROM districts where id='{$temp6['district']}' ";
            $resultd = mysqli_query($con, $sqld);
            $tempd = mysqli_fetch_assoc($resultd);
            $d = $tempd['district_name'];
            $sql6i = "SELECT * from imagehotel where id='$k' ";
            $result6i = mysqli_query($con, $sql6i);
            $temp6i = mysqli_fetch_assoc($result6i);
            ?>
            <div class="right">
                <div class="card_container">
                    <a href="staydetails?idd=<?php echo $temp6['sno']; ?>&type=1" class="img_card" data-aos="zoom-out" data-aos-delay="300">
                        <img src="<?php echo ADMIN_URL ?>img/<?php echo $temp6i['images']; ?>" alt="">
                        <div class="detail_box">
                            <div class="name">
                                <?php echo $temp6['name']; ?>
                            </div>
                            <div class="location">
                                <?php echo $d . ", " . $s; ?>
                            </div>
                        </div>
                    </a>
                </div>

            <?php }
            $temp6 = mysqli_fetch_assoc($result66);
            if (isset($temp6)) {
            $k = $temp6['sno'];
            $sqls = "SELECT * FROM states where id='{$temp6['state']}' ";
            $result_state = mysqli_query($con, $sqls);
            $temps = mysqli_fetch_assoc($result_state);

            $s = $temps['state_name'];

            $sqld = "SELECT * FROM districts where id='{$temp6['district']}' ";
            $resultd = mysqli_query($con, $sqld);
            $tempd = mysqli_fetch_assoc($resultd);
            $d = $tempd['district_name'];
            $sql6i = "SELECT * from imagehotel where id='$k' ";
            $result6i = mysqli_query($con, $sql6i);
            $temp6i = mysqli_fetch_assoc($result6i);
            ?>

                <div class="card_container">
                    <a href="staydetails?idd=<?php echo $temp6['sno']; ?>&type=1" class="img_card" data-aos="zoom-out" data-aos-delay="500">
                        <img src="<?php echo ADMIN_URL ?>img/<?php echo $temp6i['images']; ?>" alt="">
                        <div class="detail_box">
                            <div class="name">
                                <?php echo $temp6['name']; ?>
                            </div>
                            <div class="location">
                                <?php echo $d . ", " . $s; ?>
                            </div>
                        </div>
                    </a>
                </div>

            <?php }
            $temp6 = mysqli_fetch_assoc($result66);
            if (isset($temp6)) {
            $k = $temp6['sno'];
            $sqls = "SELECT * FROM states where id='{$temp6['state']}' ";
            $result_state = mysqli_query($con, $sqls);
            $temps = mysqli_fetch_assoc($result_state);

            $s = $temps['state_name'];

            $sqld = "SELECT * FROM districts where id='{$temp6['district']}' ";
            $resultd = mysqli_query($con, $sqld);
            $tempd = mysqli_fetch_assoc($resultd);
            $d = $tempd['district_name'];
            $sql6i = "SELECT * from imagehotel where id='$k' ";
            $result6i = mysqli_query($con, $sql6i);
            $temp6i = mysqli_fetch_assoc($result6i);
            ?>

                <div class="card_container">
                    <a href="staydetails?idd=<?php echo $temp6['sno']; ?>&type=1" class="img_card" data-aos="zoom-out" data-aos-delay="700">
                        <img src="<?php echo ADMIN_URL ?>img/<?php echo $temp6i['images']; ?>" alt="">
                        <div class="detail_box">
                            <div class="name">
                                <?php echo $temp6['name']; ?>
                            </div>
                            <div class="location">
                                <?php echo $d . ", " . $s; ?>
                            </div>
                        </div>
                    </a>
                </div>

            <?php }
            $temp6 = mysqli_fetch_assoc($result66);
            if (isset($temp6)) {
            $k = $temp6['sno'];

            $sqls = "SELECT * FROM states where id='{$temp6['state']}' ";
            $result_state = mysqli_query($con, $sqls);
            $temps = mysqli_fetch_assoc($result_state);
            $s = $temps['state_name'];
            $sqld = "SELECT * FROM districts where id='{$temp6['district']}' ";
            $resultd = mysqli_query($con, $sqld);
            $tempd = mysqli_fetch_assoc($resultd);
            $d = $tempd['district_name'];

            $sql6i = "SELECT * from imagehotel where id='$k' ";
            $result6i = mysqli_query($con, $sql6i);
            $temp6i = mysqli_fetch_assoc($result6i);
            ?>

                <div class="card_container">
                    <a href="staydetails?idd=<?php echo $temp6['sno']; ?>&type=1" class="img_card" data-aos="zoom-out" data-aos-delay="900">
                        <img src="<?php echo ADMIN_URL ?>img/<?php echo $temp6i['images']; ?>" alt="">
                        <div class="detail_box">
                            <div class="name">
                                <?php echo $temp6['name']; ?>
                            </div>
                            <div class="location">
                                <?php echo $d . ", " . $s; ?>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        <?php } ?>
        </section>


        

        <!-- Become A Member Section -->
        <section class="heading">
            <h1 class="title" data-aos="fade-right">
                Become A Member
            </h1>
            <p class="sub_title" data-aos="fade-left">
            Get Discounts With Our Listed Restaurants - Hotels - Resorts - Homestays
            </p>
        </section>
        <section class="membership_container">
            <div class="left">
                <img src="./assets/images/<?php echo $temp3['image']; ?>" alt="" data-aos="zoom-in-up" data-aos-delay="300">
            </div>
            <div class="right">
                <p data-aos="fade-right">
                    <?php echo $temp3['about']; ?>
                </p>
            </div>
        </section>




        <!-- Premium Resorts Section -->
        <section class="heading">
            <h1 class="title" data-aos="fade-right">
                Premium Resorts
            </h1>
            <p class="sub_title" data-aos="fade-left">
                Exquisite Accommodations for Discerning Travelers
            </p>
        </section>

        <?php $temp7 = mysqli_fetch_assoc($result77);
        if (isset($temp7)) {
            $k7 = $temp7['sno'];

            $sqls = "SELECT * FROM states where id='{$temp7['state']}' ";
            $result_state = mysqli_query($con, $sqls);
            $temps = mysqli_fetch_assoc($result_state);
            $s = $temps['state_name'];
            $sqld = "SELECT * FROM districts where id='{$temp7['district']}' ";
            $resultd = mysqli_query($con, $sqld);
            $tempd = mysqli_fetch_assoc($resultd);
            $d = $tempd['district_name'];

            $sql7i = "SELECT * from imageresort where id='$k7' ";
            $result7i = mysqli_query($con, $sql7i);
            $temp7i = mysqli_fetch_assoc($result7i);
        ?>
            <section class="top_rated">
                <div class="left">
                    <a href="staydetails?idd=<?php echo $temp7['sno']; ?>&type=2" class="img_card" data-aos="zoom-out">
                        <img src="<?php echo ADMIN_URL ?>img/<?php echo $temp7i['images']; ?>" alt="">
                        <div class="detail_box">
                            <div class="name">
                                <?php echo $temp7['name'] ?>
                            </div>
                            <div class="location">
                                <?php echo $d . ", " . $s; ?>
                            </div>
                        </div>
                    </a>
                </div>

                <?php }
                $temp7 = mysqli_fetch_assoc($result77);
                if (isset($temp6)) {
                    $k7 = $temp7['sno'];
                    $sqls = "SELECT * FROM states where id='{$temp7['state']}' ";
                    $result_state = mysqli_query($con, $sqls);
                    $temps = mysqli_fetch_assoc($result_state);
                    $s = $temps['state_name'];
                    $sqld = "SELECT * FROM districts where id='{$temp7['district']}' ";
                    $resultd = mysqli_query($con, $sqld);
                    $tempd = mysqli_fetch_assoc($resultd);
                    $d = $tempd['district_name'];

                    $sql7i = "SELECT * from imageresort where id='$k7' ";
                    $result7i = mysqli_query($con, $sql7i);
                    $temp7i = mysqli_fetch_assoc($result7i);
                    ?>
                <div class="right">
                    <div class="card_container">
                        <a href="staydetails?idd=<?php echo $temp7['sno']; ?>&type=2" class="img_card" data-aos="zoom-out">
                            <img src="<?php echo ADMIN_URL ?>img/<?php echo $temp7i['images']; ?>" alt="">
                            <div class="detail_box">
                                <div class="name">
                                    <?php echo $temp7['name'] ?>
                                </div>
                                <div class="location">
                                    <?php echo $d . ", " . $s; ?>
                                </div>
                            </div>
                        </a>
                    </div>

                        <?php }
                    $temp7 = mysqli_fetch_assoc($result77);
                    if (isset($temp6)) {
                        $k7 = $temp7['sno'];
                        $sqls = "SELECT * FROM states where id='{$temp7['state']}' ";
                        $result_state = mysqli_query($con, $sqls);
                        $temps = mysqli_fetch_assoc($result_state);
                        $s = $temps['state_name'];
                        $sqld = "SELECT * FROM districts where id='{$temp7['district']}' ";
                        $resultd = mysqli_query($con, $sqld);
                        $tempd = mysqli_fetch_assoc($resultd);
                        $d = $tempd['district_name'];

                        $sql7i = "SELECT * from imageresort where id='$k7' ";
                        $result7i = mysqli_query($con, $sql7i);
                        $temp7i = mysqli_fetch_assoc($result7i);
                        ?>

                    <div class="card_container">
                        <a href="staydetails?idd=<?php echo $temp7['sno']; ?>&type=2" class="img_card" data-aos="zoom-out">
                            <img src="<?php echo ADMIN_URL ?>img/<?php echo $temp7i['images']; ?>" alt="">
                            <div class="detail_box">
                                <div class="name">
                                    <?php echo $temp7['name'] ?>
                                </div>
                                <div class="location">
                                    <?php echo $d . ", " . $s; ?>
                                </div>
                            </div>
                        </a>
                    </div>

                <?php }
                    $temp7 = mysqli_fetch_assoc($result77);
                    if (isset($temp6)) {
                        $k7 = $temp7['sno'];
                        $sqls = "SELECT * FROM states where id='{$temp7['state']}' ";
                        $result_state = mysqli_query($con, $sqls);
                        $temps = mysqli_fetch_assoc($result_state);
                        $s = $temps['state_name'];
                        $sqld = "SELECT * FROM districts where id='{$temp7['district']}' ";
                        $resultd = mysqli_query($con, $sqld);
                        $tempd = mysqli_fetch_assoc($resultd);
                        $d = $tempd['district_name'];

                        $sql7i = "SELECT * from imageresort where id='$k7' ";
                        $result7i = mysqli_query($con, $sql7i);
                        $temp7i = mysqli_fetch_assoc($result7i);
                        ?>

                    <div class="card_container">
                        <a href="staydetails?idd=<?php echo $temp7['sno']; ?>&type=2" class="img_card" data-aos="zoom-out">
                            <img src="<?php echo ADMIN_URL ?>img/<?php echo $temp7i['images']; ?>" alt="">
                            <div class="detail_box">
                                <div class="name">
                                    <?php echo $temp7['name'] ?>
                                </div>
                                <div class="location">
                                    <?php echo $d . ", " . $s; ?>
                                </div>
                            </div>
                        </a>
                    </div>

                <?php }
                $temp7 = mysqli_fetch_assoc($result77);
                if (isset($temp6)) {
                    $k7 = $temp7['sno'];
                    $sqls = "SELECT * FROM states where id='{$temp7['state']}' ";
                    $result_state = mysqli_query($con, $sqls);
                    $temps = mysqli_fetch_assoc($result_state);
                    $s = $temps['state_name'];
                    $sqld = "SELECT * FROM districts where id='{$temp7['district']}' ";
                    $resultd = mysqli_query($con, $sqld);
                    $tempd = mysqli_fetch_assoc($resultd);
                    $d = $tempd['district_name'];

                    $sql7i = "SELECT * from imageresort where id='$k7' ";
                    $result7i = mysqli_query($con, $sql7i);
                    $temp7i = mysqli_fetch_assoc($result7i);
                    ?>

                    <div class="card_container">
                        <a href="staydetails?idd=<?php echo $temp7['sno']; ?>&type=2" class="img_card" data-aos="zoom-out">
                            <img src="<?php echo ADMIN_URL ?>img/<?php echo $temp7i['images']; ?>" alt="">
                            <div class="detail_box">
                                <div class="name">
                                    <?php echo $temp7['name'] ?>
                                </div>
                                <div class="location">
                                    <?php echo $d . ", " . $s; ?>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php } ?>
                </div>
            </section>



            <!-- Locations Map Section Start -->
            <section class="location_map">
                <section class="heading">
                    <h1 class="title" data-aos="fade-right">
                        Stay anywhere in India
                    </h1>
                    <p class="sub_title" data-aos="fade-left">
                        Exquisite Accommodations for Discerning Travelers
                    </p>
                </section>
                <img src="./assets/images/<?php echo $temp4['image'] ?>" alt="">
            </section>
            <!-- Locations Map Section End -->


 


                <!-- Best Rooms Section -->
                <section class="heading">
                    <h1 class="title" data-aos="fade-right">
                        Best Rooms and Suits
                    </h1>
                    <p class="sub_title" data-aos="fade-left">
                        Exquisite Accommodations for Discerning Travelers
                    </p>
                </section>

                <section class="card_slider">
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">


                            <?php
                            $sqlh = "SELECT * from hotels";
                            $resulth = mysqli_query($con, $sqlh);
                            for ($i = 0; $i < 3; $i++) {
                                $temph = mysqli_fetch_assoc($resulth);

                                $kh = $temph['sno'];
                                $sqls = "SELECT * FROM states where id='{$temph['state']}' ";
                                $result_state = mysqli_query($con, $sqls);
                                $temps = mysqli_fetch_assoc($result_state);
                                $s = $temps['state_name'];
                                $sqld = "SELECT * FROM districts where id='{$temph['district']}' ";
                                $resultd = mysqli_query($con, $sqld);
                                $tempd = mysqli_fetch_assoc($resultd);
                                $d = $tempd['district_name'];
                                $sqlhi = "SELECT * from imagehotel where id='$kh' ";
                                $resulthi = mysqli_query($con, $sqlhi);
                                $temphi = mysqli_fetch_assoc($resulthi);

                            ?>

                                <div class='swiper-slide'>
                                    <div class='card'>
                                        <img class='card_img' src='<?php echo ADMIN_URL ?>img/<?php echo $temphi['images'] ?>' alt='...'>

                                        <div class='card-body'>
                                            <h5 class='card-title'> <?php echo $temph['name'] ?> </h5>
                                            <p class='card-text'><?php echo  $d . "," . $s  ?>
                                            </p>
                                            <a href='staydetails?idd=<?php echo $temph['sno'] ?>&type=1' class='btn btn-primary'>View details</a>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>

                            <?php
                            $sqlr = "SELECT * from resorts";
                            $resultr = mysqli_query($con, $sqlr);
                            for ($i = 0; $i < 2; $i++) {
                                $tempr = mysqli_fetch_assoc($resultr);

                                $kr = $tempr['sno'];
                                $sqls = "SELECT * FROM states where id='{$tempr['state']}' ";
                                $result_state = mysqli_query($con, $sqls);
                                $temps = mysqli_fetch_assoc($result_state);
                                $s = $temps['state_name'];
                                $sqld = "SELECT * FROM districts where id='{$tempr['district']}' ";
                                $resultd = mysqli_query($con, $sqld);
                                $tempd = mysqli_fetch_assoc($resultd);
                                $d = $tempd['district_name'];
                                $sqlri = "SELECT * from imageresort where id='$kr' ";
                                $resultri = mysqli_query($con, $sqlri);
                                $tempri = mysqli_fetch_assoc($resultri);
                            ?>
                                <div class='swiper-slide'>
                                    <div class='card'>
                                        <img class='card_img' src='<?php echo ADMIN_URL ?>img/<?php echo $tempri['images'] ?>' alt='...'>

                                        <div class='card-body'>
                                            <h5 class='card-title'> <?php echo $tempr['name'] ?> </h5>
                                            <p class='card-text'><?php echo  $d . "," . $s  ?>
                                            </p>
                                            <a href='staydetails?idd=<?php echo $tempr['sno'] ?>&type=2' class='btn btn-primary'>View details</a>
                                        </div>
                                    </div>
                                </div>
                            <?php

                            }
                            ?>

                            <?php
                            $sqls = "SELECT * from homestays";
                            $results = mysqli_query($con, $sqls);

                            for ($i = 0; $i < 2; $i++) {

                                $temps = mysqli_fetch_assoc($results);
                                


                                $ks = $temps['sno'];
                                $sqls = "SELECT * FROM states where id='{$temps['state']}' ";
                                $result_state = mysqli_query($con, $sqls);
                                $temp_state = mysqli_fetch_assoc($result_state);
                                $s = $temp_state['state_name'];


                                $sql_district = "SELECT * FROM districts where id='{$temps['district']}' ";

                                $resultd = mysqli_query($con, $sqld);
                                $tempd = mysqli_fetch_assoc($resultd);
                                $d = $tempd['district_name'];


                                $sqlsi = "SELECT * from imagehomestay where id='$ks' ";
                                $resultsi = mysqli_query($con, $sqlsi);
                                $tempsi = mysqli_fetch_assoc($resultsi);
                            ?>
                                <div class='swiper-slide'>
                                    <div class='card'>
                                        <img class='card_img' src='<?php echo ADMIN_URL ?>img/<?php echo $tempsi['images'] ?>' alt='...'>

                                        <div class='card-body'>
                                            <h5 class='card-title'> <?php echo $temps['name'] ?> </h5>
                                            <p class='card-text'><?php echo  $d . "," . $s  ?>
                                            </p>
                                            <a href='staydetails?idd=<?php echo $temps['sno'] ?>&type=3' class='btn btn-primary'>View details</a>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>


                            <?php
                            $sqla = "SELECT * from restaurants";
                            $resulta = mysqli_query($con, $sqla);
                            for ($i = 0; $i < 3; $i++) {
                                $tempa = mysqli_fetch_assoc($resulta);

                                $ka = $tempa['sno'];

                                $sqls = "SELECT * FROM states where id='{$tempa['state']}' ";
                                $result_state = mysqli_query($con, $sqls);
                                $temps = mysqli_fetch_assoc($result_state);
                                $s = $temps['state_name'];
                                $sqld = "SELECT * FROM districts where id='{$tempa['district']}' ";
                                $resultd = mysqli_query($con, $sqld);
                                $tempd = mysqli_fetch_assoc($resultd);
                                $d = $tempd['district_name'];
                                $sqlai = "SELECT * from imagerestaurant where id='$ka' ";
                                $resultai = mysqli_query($con, $sqlai);
                                $tempai = mysqli_fetch_assoc($resultai);

                            ?>
                                <div class='swiper-slide'>
                                    <div class='card'>
                                        <img class='card_img' src='<?php echo ADMIN_URL ?>img/<?php echo $tempsi['images'] ?>' alt='...'>

                                        <div class='card-body'>
                                            <h5 class='card-title'> <?php echo $tempa['name'] ?> </h5>
                                            <p class='card-text'><?php echo  $d . "," . $s  ?>
                                            </p>
                                            <a href='staydetails?idd=<?php echo $tempa['sno'] ?>&type=4' class='btn btn-primary'>View details</a>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>




                            <!-- <div class=" swiper-button-next">
                                    </div>
                                    <div class="swiper-button-prev"></div> -->
                            <!-- <div class="swiper-pagination"></div> -->
                        </div>
                </section>


                <!-- Testimonials Section -->
                <section class="heading">
                    <h1 class="title">
                        Client's Testimonials
                    </h1>
                    <p class="sub_title">
                        Exquisite Accommodations for Discerning Travelers
                    </p>
                </section>

                <section class="card_slider testi_slider">
                    <div class="swiper mySwiperTesti">
                        <div class="swiper-wrapper">
                            <?php
                            while ($temp5 = mysqli_fetch_assoc($result5)) {
                            ?>
                                <div class='swiper-slide'>
                                    <div class='card'>
                                        <div class='icon'>
                                            <img src='./assets/images/i_quote.png' alt=''>
                                        </div>
                                        <div class="testi_message"> <?php echo $temp5['message']; ?></div>
                                        <h4><?php echo $temp5['username']; ?></h4>
                                    </div>
                                </div>
                            <?php } ?>

                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                        <!-- <div class="swiper-pagination"></div> -->
                    </div>
                </section>

</main>


<?php include './includes/footer.php'; ?>