<?php

$sqll = "SELECT * from contact ";

$resultl = mysqli_query($con, $sqll);
$templ = mysqli_fetch_assoc($resultl);
?>
<footer>
    <div class="overlay"></div>
    <div class="content_box">
        <div class="logo_box">
            <img src="./assets/images/logo.png" alt="">

            <ul class="social_box">
                <li><a href="<?php echo $templ['facebook'] ?>"><img src="./assets/images/i_facebook.png" alt=""></a>
                </li>
                <li><a href="<?php echo $templ['instagram'] ?>"><img src="./assets/images/i_instagram.png" alt=""></a>
                </li>
                <li><a href="<?php echo $templ['twitter'] ?>"><img src="./assets/images/i_x.png" alt=""></a></li>
            </ul>
        </div>

        <div class="link_box">
            <h4>Useful Links</h4>
            <ul>
                <li><a href="aboutus">About</a></li>
                <li><a href="services">Services</a></li>
                <li><a href="careers">Careers</a></li>
                <li><a href="team">Team</a></li>
            </ul>
        </div>

        <div class="link_box">
            <h4>Contact Us</h4>
            <ul>
                <li><a href="contactus">Help & Support</a></li>
                <li><a href='https://docs.google.com/forms/d/e/1FAIpQLSfiTls0-i-IY9vNXSYxOZfFyCGTymmonVteCKxDUl0c8JJZWQ/viewform?usp=sf_link' target="_blank">Partner With Us</a></li>
            </ul>
        </div>

        <div class="link_box">
            <h4>Legal</h4>
            <ul>
                <!-- <li>
                    <a href="#"><b>Address : </b>
                        <php echo $templ['address'] >
                    </a>
                </li><br /> 
                <li>
                    <a href="mailto:<php echo $templ['email'] >"><b>Email : </b>
                        <php echo $templ['email'] >
                    </a>
                </li>
                <li>
                    <a href="tel:<php echo $templ['phoneNo'] >"><b>Call : </b>+91-
                        <php echo $templ['phoneNo'] >
                    </a>
                </li>
                -->

                <li><a href="terms">Terms & Coditions</a></li>
                <li><a href="privacypolicy">Privacy Policy</a></li>
                <li><a href="faq">FAQ</a></li>
            </ul>
        </div>
    </div>

    <div class="sub_footer">
        @All Rights Reserved&nbsp;<a href="https://www.imfoodie.in">imfoodie.in</a>&nbsp;|| Designed and
        Developed by <a href="https://www.webappssoft.com" target="_blank">&nbsp;WASS</a>
    </div>
</footer>

<script>
    function regex(e) {
        var x = e.which || e.keycode;
        if ((x >= 48 && x <= 57))
            return true;
        else
            return false;
    }
</script>

<script>
    function onpressemail() {
    var email = document.getElementById('email').value;
    var pattern = /^[^ ]+@[^ ]+\.[a-z]{0,20}$/;

if(!email.match(pattern)){
    
    document.getElementById('emessage').innerHTML = " ** Please fill valid email";
    document.getElementById('emessage').style.color = "#ff0000";
    return false;
}else{
     document.getElementById('emessage').innerHTML = "";
     document.getElementById('emessage').style.color = "#00ff00";
 }
    }

</script>

<script>
    const activepage = window.location.pathname;
    const searchParams = new URLSearchParams(window.location.search);

    if (activepage == '/') {
        console.log(activepage);
    }
    const navlinks = document.querySelectorAll('nav a').forEach(link => {
        const nav = new URL(link.href).pathname;
        if (nav === activepage) {
            link.classList.add('active');
        }
        console.log(link.href);
        if (activepage == '/') {
            if (link.href.includes('index')) {
                link.classList.add('active');
            }
        }
        if (searchParams.get('type') == 1) {
            if (link.href.includes('hotel')) {
                link.classList.add('active');
            }
        }
        if (searchParams.get('type') == 2) {
            if (link.href.includes('resort')) {
                link.classList.add('active');
            }
        }
        if (searchParams.get('type') == 3) {
            if (link.href.includes('homestay')) {
                link.classList.add('active');
            }
        }
        if (searchParams.get('type') == 4) {
            if (link.href.includes('restaurant')) {
                link.classList.add('active');
            }
        }
    })
</script>

<!-- sweetalert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>


<?php
if(isset($confirmpass)){
if ($confirmpass == 'true') {
    ?>
    <script>
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Password are not matching!",
        });
    </script>
<?php }}
?>


<?php
if(isset($emailexist)){
if ($emailexist == 'true') {
    ?>
    <script>
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Email already exists!",
        });
    </script>
<?php }}
?>

<?php
if(isset($login)){
if ($login == 'true') {
    ?>
    <script>
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Please enter a correct username and password!",
        });
    </script>
<?php }}
?>


<?php
if(isset($contact)){
if ($contact == 'true') {
    ?>
    <script>
        Swal.fire({
            icon: "success",
            text: "Your information is received successfully!",
        });
    </script>
<?php }}
?>
<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        // Breakpoints
        breakpoints: {
            768: {
                slidesPerView: 3,
                spaceBetween: 30
            },
            1024: {
                slidesPerView: 5,
                spaceBetween: 40
            }
        },
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
</script>
<script>
    var swiper = new Swiper(".mySwiperTesti", {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        // Breakpoints
        breakpoints: {
            768: {
                slidesPerView: 3,
                spaceBetween: 30
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 40
            }
        },
        autoplay: {
            delay: 3500,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
</script>


<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
<script>
    AOS.init();
</script>
</body>

</html>