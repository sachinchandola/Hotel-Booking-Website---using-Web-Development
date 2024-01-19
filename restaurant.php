<?php

include './includes/header.php';

if (isset($_POST['district']) or isset($_GET['filter'])) {

    if (isset($_POST['district'])) {
        $_SESSION['district'] = $_POST['district'];
        $_SESSION['state'] = $_POST['state'];
    }

    $perpage = 12;
    if (isset($_GET["page"])) {
        $page = $_GET["page"];
    } else {
        $page = 1;
    }

    $start = ($page - 1) * $perpage;

    $state = $_SESSION['state'];
    $district = $_SESSION['district'];


    $sqls = "SELECT * FROM states where id='$state' ";
    $results = mysqli_query($con, $sqls);
    $temps = mysqli_fetch_assoc($results);
    $s = $temps['state_name'];
    
    $sqld = "SELECT * FROM districts where id='$district'";
    $resultd = mysqli_query($con, $sqld);
    $tempd = mysqli_fetch_assoc($resultd);
    $d = $tempd['district_name'];


    $sql1 = "SELECT * from restaurants where  district='$district' limit $start, $perpage";

    $result1 = mysqli_query($con, $sql1);
    $count = mysqli_num_rows($result1);
} else {
    unset($_SESSION['district']);
    $perpage = 12;
    if (isset($_GET["page"])) {
        $page = $_GET["page"];
    } else {
        $page = 1;
    }

    $start = ($page - 1) * $perpage;

    $sql1 = "SELECT * from restaurants limit $start, $perpage";

    $result1 = mysqli_query($con, $sql1);
    $count = mysqli_num_rows($result1);


    if (!$result1) {
        echo " sql error occur: " . mysqli_error();
    }
}






if (isset($_POST['idd'])) {
    $idd = $_POST['idd'];


    $sqla = "SELECT * FROM district where id='$idd' ";

    $resulta = mysqli_query($con, $sqla);

    $str = "";

    while ($tempp = mysqli_fetch_assoc($resulta)) {
        $str .= "<option value='" . $tempp['sno'] . "'>" . $tempp['district'] . "</option>";
    }

    echo $str;
}
// //images location in form
$sqlk = "SELECT * from states ";

$resultk = mysqli_query($con, $sqlk);


if (!$resultk) {
    echo " sql error occur: " . mysqli_error();
}



$sql4 = "SELECT * FROM banners where sno=1  ";

$result4 = mysqli_query($con, $sql4);

$tempb = mysqli_fetch_assoc($result4);


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


<main class="stylelist_main">
    <div class="hero_banner" style="background-image: url(./assets/images/<?php echo $tempb['restimage']; ?>);">
        <h1>Restaurants</h1>
    </div>

    <nav class="breadcrumb_cont" data-aos="fade-down" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Restaurants</li>
        </ol>

        <form class="filter_box" method='post' action='restaurant.php'>

            <select class="state_select" name="state" id="state" required="required">
                <option value="" selected="selected">Select State</option>

                <?php
                while ($tempk = mysqli_fetch_assoc($resultk)) {
                    echo " <option value='" . $tempk['id'] . "'>" . $tempk['state_name'] . "</option>";
                }
                ?>
            </select>

            <select class="form-control" id="districtSelect" name="district" required>
           
            </select>

            <button class="btn icon_btn" type="submit">
                <img class="icon" src="./assets/images/i_filter.png" alt="">
                Filter
            </button>
        </form>
    </nav>

    <div class='cards_container'>
        <?php
        if ($count >= 1) {
            while ($temp1 = mysqli_fetch_assoc($result1)) {
                $k = $temp1['sno'];
                $sql2 = "SELECT * from imagerestaurant where id='$k' ";

                $result2 = mysqli_query($con, $sql2);
                $temp2 = mysqli_fetch_assoc($result2);


                $query_state = "SELECT state_name FROM `states` WHERE id= $temp1[state]";
                $result_state = mysqli_query($con, $query_state);
                $data = mysqli_fetch_assoc($result_state);
                $state_name = $data['state_name'];


                $query_district = "SELECT district_name FROM `districts` WHERE id= $temp1[district]";
                $result_district = mysqli_query($con, $query_district);
                $row1 = mysqli_fetch_assoc($result_district);
                $district_name = $row1['district_name'];

                echo "
                <div class='card col-6 col-md-3'>
                    <img src='./zfoodie/img/" . $temp2['images'] . "' class='card-img-top' alt='...'>
                    <div class='card-body'>
                        <h5 class='card-title'>" . $temp1['name'] . "</h5>
                        <p class='card-text'>" . $district_name . ", " . $state_name . "</p>
                        <a href='staydetails.php?idd=" . $temp1['sno'] . "&type=4' class='btn btn-primary'>View details</a>
                    </div>
            </div>
                ";
            }
        } else {
            echo "<div style='height:100px; width:200px; margin-left:560px; margin-top:100px;'>No restaurant Added</div>";
        }


        if ($count >= 1) {
        ?>


            <nav class="pagination_cont" aria-label="...">
                <ul class="pagination">

                    <?php
                    if (isset($_POST['district']) or isset($_GET['filter'])) {
                        $sql3 = "SELECT * from restaurants where state='$s' AND district='$d'";

                        $result3 = mysqli_query($con, $sql3);
                        $count = mysqli_num_rows($result3);
                        $totalpage = ceil($count / $perpage);
                    } else {
                        $sql3 = "SELECT * from restaurants ";

                        $result3 = mysqli_query($con, $sql3);
                        $count = mysqli_num_rows($result3);
                        $totalpage = ceil($count / $perpage);
                    }
                    $pagelink = "";


                    if (isset($_POST['district']) or isset($_GET['filter'])) {
                        if ($page >= 2) {
                            echo "<li class='page-item'>
    <a class='page-link' href='restaurant.php?page=" . ($page - 1) . "&filter=2' tabindex='-1'>&laquo; Pre</a>
    </li>";
                        } else {
                            echo "<li class='page-item disabled' >
                        <button class='page-link' href='#' tabindex='-1' disabled>&laquo; Pre</button>
                        </li>";
                        }

                        for ($i = 1; $i <= $totalpage; $i++) {
                            if ($i == $page) {
                                $pagelink .= "<li class='page-item active'><a class='page-link' href='restaurant.php?page=" . $i . "&filter=2' tabindex='-1'>" . $i . "</a></li>";
                            } else {
                                $pagelink .= "<li class='page-item'><a class='page-link' href='restaurant.php?page=" . $i . "&filter=2' tabindex='-1'>" . $i . "</a></li>";
                            }
                        }
                        echo $pagelink;

                        if ($page < $totalpage) {
                            echo "<li class='page-item'>
        <a class='page-link' href='restaurant.php?page=" . ($page + 1) . "&filter=2' tabindex='-1'>Next &raquo;</a>
        </li>";
                        } else {
                            echo "<li class='page-item disabled'>
                        <button class='page-link' href='#' tabindex='-1' disabled>Next &raquo;</button>
                        </li>";
                        }
                    } else {
                        if ($page >= 2) {
                            echo "<li class='page-item'>
<a class='page-link' href='restaurant.php?page=" . ($page - 1) . "' tabindex='-1'>&laquo; Pre</a>
</li>";
                        } else {
                            echo "<li class='page-item disabled' >
                        <button class='page-link' href='#' tabindex='-1' disabled>&laquo; Pre</button>
                        </li>";
                        }
                        for ($i = 1; $i <= $totalpage; $i++) {
                            if ($i == $page) {
                                $pagelink .= "<li class='page-item active'><a class='page-link' href='restaurant.php?page=" . $i . "' tabindex='-1'>" . $i . "</a></li>";
                            } else {
                                $pagelink .= "<li class='page-item'><a class='page-link' href='restaurant.php?page=" . $i . "' tabindex='-1'>" . $i . "</a></li>";
                            }
                        }
                        echo $pagelink;

                        if ($page < $totalpage) {
                            echo "<li class='page-item'>
    <a class='page-link' href='restaurant.php?page=" . ($page + 1) . "' tabindex='-1'>Next &raquo;</a>
    </li>";
                        } else {
                            echo "<li class='page-item disabled' >
                        <button class='page-link' href='#' tabindex='-1' disabled>Next &raquo;</button>
                        </li>";
                        }
                    }
                    ?>


                </ul>
            </nav>
        <?php } ?>


                    <!-- Top Restaurants Section -->
                    <section class="heading container-fluid" data-aos="fade-right">
                        <h1 class="title">
                            Top Rated Restaurants
                        </h1>
                        <p class="sub_title" data-aos="fade-left">
                            Exquisite Accommodations for Discerning Travelers
                        </p>
                    </section>

            <?php $temp9 = mysqli_fetch_assoc($result99);
            if (isset($temp9)) {
                $k9 = $temp9['sno'];

                $sqls = "SELECT * FROM states where id='{$temp9['state']}' ";
                $result_state = mysqli_query($con, $sqls);
                $temps = mysqli_fetch_assoc($result_state);
                $s = $temps['state_name'];
                $sqld = "SELECT * FROM districts where id='{$temp9['district']}' ";
                $resultd = mysqli_query($con, $sqld);
                $tempd = mysqli_fetch_assoc($resultd);
                $d = $tempd['district_name'];


                $sql9i = "SELECT * from imagerestaurant where id='$k9' ";
                $result9i = mysqli_query($con, $sql9i);
                $temp9i = mysqli_fetch_assoc($result9i);
            ?>

                <section class="top_rated">
                    <div class="left" style="order: 2;">
                        <a href="staydetails?idd=<?php echo $temp9['sno']; ?>&type=4" class="img_card" data-aos="zoom-out">
                            <img src="<?php echo ADMIN_URL ?>img/<?php echo $temp9i['images'] ?>" alt="">
                            <div class="detail_box">
                                <div class="name">
                                    <?php echo $temp9['name'] ?>
                                </div>
                                <div class="location">
                                    <?php echo $d . ", " . $s; ?>
                                </div>
                            </div>
                        </a>
                    </div>

                <?php }
            $temp9 = mysqli_fetch_assoc($result99);
            if (isset($temp9)) {
                $k9 = $temp9['sno'];
                $sqls = "SELECT * FROM states where id='{$temp9['state']}' ";
                $result_state = mysqli_query($con, $sqls);
                $temps = mysqli_fetch_assoc($result_state);
                $s = $temps['state_name'];
                $sqld = "SELECT * FROM districts where id='{$temp9['district']}' ";
                $resultd = mysqli_query($con, $sqld);
                $tempd = mysqli_fetch_assoc($resultd);
                $d = $tempd['district_name'];
                $sql9i = "SELECT * from imagerestaurant where id='$k9' ";
                $result9i = mysqli_query($con, $sql9i);
                $temp9i = mysqli_fetch_assoc($result9i);
                ?>

                    <div class="right">
                        <div class="card_container">
                            <a href="staydetails?idd=<?php echo $temp9['sno']; ?>&type=4" class="img_card" data-aos="zoom-out">
                                <img src="<?php echo ADMIN_URL ?>img/<?php echo $temp9i['images'] ?>" alt="">
                                <div class="detail_box">
                                    <div class="name">
                                        <?php echo $temp9['name'] ?>
                                    </div>
                                    <div class="location">
                                        <?php echo $d . ", " . $s; ?>
                                    </div>
                                </div>
                            </a>
                        </div>

                    <?php }
                $temp9 = mysqli_fetch_assoc($result99);
                if (isset($temp9)) {
                    $k9 = $temp9['sno'];
                    $sqls = "SELECT * FROM states where id='{$temp9['state']}' ";
                    $result_state = mysqli_query($con, $sqls);
                    $temps = mysqli_fetch_assoc($result_state);
                    $s = $temps['state_name'];
                    $sqld = "SELECT * FROM districts where id='{$temp9['district']}' ";
                    $resultd = mysqli_query($con, $sqld);
                    $tempd = mysqli_fetch_assoc($resultd);
                    $d = $tempd['district_name'];
                    $sql9i = "SELECT * from imagerestaurant where id='$k9' ";
                    $result9i = mysqli_query($con, $sql9i);
                    $temp9i = mysqli_fetch_assoc($result9i);
                    ?>


                        <div class="card_container">
                            <a href="staydetails?idd=<?php echo $temp9['sno']; ?>&type=4" class="img_card">
                                <img src="<?php echo ADMIN_URL ?>img/<?php echo $temp9i['images'] ?>" alt="">
                                <div class="detail_box">
                                    <div class="name">
                                        <?php echo $temp9['name'] ?>
                                    </div>
                                    <div class="location">
                                        <?php echo $d . ", " . $s; ?>
                                    </div>
                                </div>
                            </a>
                        </div>

                    <?php }
                $temp9 = mysqli_fetch_assoc($result99);
                if (isset($temp9)) {
                    $k9 = $temp9['sno'];
                    $sqls = "SELECT * FROM states where id='{$temp9['state']}' ";
                    $result_state = mysqli_query($con, $sqls);
                    $temps = mysqli_fetch_assoc($result_state);
                    $s = $temps['state_name'];
                    $sqld = "SELECT * FROM districts where id='{$temp9['district']}' ";
                    $resultd = mysqli_query($con, $sqld);
                    $tempd = mysqli_fetch_assoc($resultd);
                    $d = $tempd['district_name'];
                    $sql9i = "SELECT * from imagerestaurant where id='$k9' ";
                    $result9i = mysqli_query($con, $sql9i);
                    $temp9i = mysqli_fetch_assoc($result9i);
                    ?>

                        <div class="card_container">
                            <a href="staydetails?idd=<?php echo $temp9['sno']; ?>&type=4" class="img_card">
                                <img src="<?php echo ADMIN_URL ?>img/<?php echo $temp9i['images'] ?>" alt="">
                                <div class="detail_box">
                                    <div class="name">
                                        <?php echo $temp9['name'] ?>
                                    </div>
                                    <div class="location">
                                        <?php echo $d . ", " . $s; ?>
                                    </div>
                                </div>
                            </a>
                        </div>

                    <?php }
                $temp9 = mysqli_fetch_assoc($result99);
                if (isset($temp9)) {
                    $k9 = $temp9['sno'];
                    $sqls = "SELECT * FROM states where id='{$temp9['state']}' ";
                    $result_state = mysqli_query($con, $sqls);
                    $temps = mysqli_fetch_assoc($result_state);
                    $s = $temps['state_name'];
                    $sqld = "SELECT * FROM districts where id='{$temp9['district']}' ";
                    $resultd = mysqli_query($con, $sqld);
                    $tempd = mysqli_fetch_assoc($resultd);
                    $d = $tempd['district_name'];
                    $sql9i = "SELECT * from imagerestaurant where id='$k9' ";
                    $result9i = mysqli_query($con, $sql9i);
                    $temp9i = mysqli_fetch_assoc($result9i);
                    ?>

                        <div class="card_container">
                            <a href="staydetails?idd=<?php echo $temp9['sno']; ?>&type=4" class="img_card">
                                <img src="<?php echo ADMIN_URL ?>img/<?php echo $temp9i['images'] ?>" alt="">
                                <div class="detail_box">
                                    <div class="name">
                                        <?php echo $temp9['name'] ?>
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

</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<!-- <script>
    $(document).ready(function() {

        $("#state").on("change", function() {
            var state = $("#state").val();

            loaddata(state);


            function loaddata(state) {
                $.ajax({
                    url: "restaurant.php",
                    type: "post",
                    data: {
                        idd: state
                    },
                    success: function(data) {
                        // alert(data);
                        $('#city').html(data);
                    }
                });
            }
        });
    });
</script> -->
<script>
    $(document).ready(function() {
        $("#state").change(function() {
            $("#districtSelect").html('');
            var state = $("#state").val();
            var district = '';
            $.ajax({
                type: "GET",
                url: "get_districts.php",
                data: {
                    "state": state,
                    "district": district
                },
                success: function(result) {
                    //  alert(result);
                    $("#districtSelect").html(result)
                }
            });
        });
        //by default get state wise district
        $(document).ready(function() {
            $("#districtSelect").html('');
            var state = $("#state").val();
            var district = $("#district").val();
            $.ajax({
                type: "GET",
                url: "get_districts.php",
                data: {
                    "state": state,
                    "district": district
                },
                success: function(result) {
                    // alert(result);
                    $("#districtSelect").html(result)

                }
            });
        });
    });
</script>

<?php include './includes/footer.php'; ?>