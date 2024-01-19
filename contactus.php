<?php

include './includes/header.php';
$contact ='false';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the email address and QR code source URL from the POST data
    // $email = $_POST['email'];
    // $qrCodeSrc = $_POST['qrCodeSrc'];
    $name = $_POST['name'];
    $email_user = $_POST['email'];
    $contact = $_POST['contact'];
    $query = $_POST['query'];
    $email = "achandola07@gmail.com";

    
$mailheader= "Name: ". $name."<br>".
"\r\n Email: ". $email_user."<br>".
"\r\n Contact No.: ". $contact."<br>".
"\r\n Query: ".$query." \r\n";

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER; //Enable verbose debug output
        $mail->isSMTP(); //Send using SMTP
        $mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
        $mail->SMTPAuth = true; //Enable SMTP authentication
        $mail->Username = 'abhiad565@gmail.com'; //SMTP username
        $mail->Password = 'nocj atct lmtc zukd'; //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
        $mail->Port = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('abhiad565@gmail.com', 'iamfoodie');
        $mail->addAddress($email, 'Joe User'); //Add a recipient


        // Attach the QR code as a file
        // $mail->addStringAttachment(file_get_contents($qrCodeSrc), 'qr-code.png');

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'User Query';
        $mail->Body = $mailheader;
        $mail->AltBody = 'Here is your QR code:';
        
        // Send the email
        $mail->send();
        $contact='true';
    } catch (Exception $e) {
        echo "Email could not be sent. Error: {$mail->ErrorInfo}";
    }
} 




$sql1 = "SELECT * from contact ";

$result1 = mysqli_query($con, $sql1);
$temp1 = mysqli_fetch_assoc($result1);

if (!$result1) {
    echo " sql error occur: " . mysqli_error();
}



?>


        <main class="aboutus_cont contactus_cont">
            <div class="hero_banner" style="background-image: url(./assets/images/contact_bell.jpg);">
                <h1>Contact Us</h1>
            </div>


            <div class="img_txt_cont">
                <div class="left" data-aos="fade-right">
                    <form action='contactus.php' method='post'>
                        <h3>Ask any query</h3>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Fullname</label>
                            <input type="text" class="form-control" id="exampleInputFullname" name='name' required>
                          </div>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Email address</label>
                          <input type="email" class="form-control" id="email" name='email' aria-describedby="emailHelp" required onkeyup="onpressemail()">
                          <span id='emessage'></span>
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">Contact No.</label>
                          <input type="tel" minlength="10" maxlength="10" class="form-control" name='contact' id="exampleInputContactNo"  required onkeypress="return regex(event)">
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">Your Query</label>
                          <textarea rows="5"  class="form-control" id="exampleInputMessege" name='query' required></textarea>
                        </div>
                        <button type="submit" class="btn icon_btn">Submit</button>
                    </form>
                </div>
                <div class="right" data-aos="fade-left">
                    <h3 >Get in touch</h3>
                    
                    <!-- <a href="<php echo $temp1['address']>" class="box">
                        <div class="icon">
                            <img src="./assets/images/contact_01.png" alt="">
                        </div>
                        <div class="text">
                            <p><php echo $temp1['address']></p>
                        </div>
                    </a> -->
                    <a href="tel:<?php echo $temp1['phoneNo']?>" class="box">
                        <div class="icon">
                            <img src="./assets/images/contact_02.png" alt="">
                        </div>
                        <div class="text">
                            <p>+91-<?php echo $temp1['phoneNo']?></p>
                        </div>
                    </a>
                    <a href="mailto:<?php echo $temp1['email']?>" class="box">
                        <div class="icon">
                            <img src="./assets/images/contact_03.png" alt="">
                        </div>
                        <div class="text">
                            <p><?php echo $temp1['email']?></p>
                        </div>
                    </a>

                    <div class="box social_box">
                        <a href="<?php echo $temp1['facebook']?>" class="icon">
                            <img src="./assets/images/i_facebook.png" alt="">
                        </a>
                        <a href="<?php echo $temp1['instagram']?>" class="icon">
                            <img src="./assets/images/i_instagram.png" alt="">
                        </a>
                        <a href="<?php echo $temp1['twitter']?>" class="icon">
                            <img src="./assets/images/i_x.png" alt="">
                        </a>
                    </div>
                </div>
            </div>

        </main>
        
        <?php include './includes/footer.php';?>
        
        
        <script>
            setInterval(function(){ $(".alert").fadeOut(); }, 3000);
        </script>


        <script>
            function myRemoveFunction() {
                var textRemove = document.getElementById("tutorial");
                textRemove.remove();
            }
        </script>

