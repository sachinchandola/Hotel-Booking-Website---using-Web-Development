<?php
include './includes/header.php';


$sqlk = "SELECT * from faq ";

$resultk = mysqli_query($con, $sqlk);


if (!$resultk) {
    echo " sql error occur: " . mysqli_error();
}
?>


<main class="aboutus_cont contactus_cont faq_cont">
    <div class="hero_banner" style="background-image: url(./assets/images/terms_conditions.jpg);">
        <h1 style="text-shadow: none;">FAQ</h1>
    </div>


    <div class="img_txt_cont container">

        <div class="accordion w-100" id="accordionExample">


        <?php
           $sno=1;
        $tempt = mysqli_fetch_assoc($resultk);
        ?>
        <div class="accordion-item">
        <h2 class="accordion-header" id="heading<?php echo  $sno;?>">
            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapse<?php echo  $sno;?>" aria-expanded="true" aria-controls="collapse<?php echo  $sno;?>">
                <strong><?php echo $tempt['question'];?></strong>
            </button>
        </h2>
        <div id="collapse<?php echo  $sno;?>" class="accordion-collapse collapse show" aria-labelledby="heading<?php echo  $sno;?>"
            data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <p><?php echo $tempt['answer'];?></p>
            </div>
        </div>
    </div>
        


            <?php
            $sno++;
            while ($tempt = mysqli_fetch_assoc($resultk)) {
                ?>
                <div class="accordion-item">
                    <h2 class="accordion-header collapsed" id="heading<?php echo  $sno;?>">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse<?php echo  $sno;?>" aria-expanded="false" aria-controls="collapse<?php echo  $sno;?>">
                            <strong><?php echo $tempt['question'];?></strong>
                        </button>
                    </h2>
                    <div id="collapse<?php echo  $sno;?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo  $sno;?>"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p><?php echo $tempt['answer'];?></p>
                        </div>
                    </div>
                </div>
            <?php
        $sno++;    
        }
            ?>

            
        </div>

    </div>
</main>

<?php include './includes/footer.php'; ?>




