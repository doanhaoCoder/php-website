<?php
$socials = new socials($db);
$stmt_socials = $socials->readAll();
?>
<div class="container-fluid bg-dark text-light footer my-6 mb-0 py-6 wow fadeIn" data-wow-delay="0.1s">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-4">ABOUT OUR SITE</h4>
                <p class="mb-2" style="color: #F3F6F8;"><?php echo $about->footer ?></p>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-light mb-4">SITE LINKS</h4>
                <?php
                while ($rows = $stmt_links->fetch()) {
                ?>
                    <a class="btn btn-link" href="<?php echo $rows['url'] ?>"><?php echo $rows['title'] ?></a>
                <?php
                }
                ?>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-light mb-4">FOLLOW US</h4>
                <?php
                while ($rows = $stmt_socials->fetch()) {
                ?>
                    <a class="btn btn-link" href="<?php echo $rows['url'] ?>"><?php echo $rows['title'] ?></a>
                <?php
                }
                ?>

            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-light mb-4">SIGN UP FOR NEWSLETTER</h4>
                <form action="">
                    <div class="input-group" id="mc-form" novalidate="true">
                        <input type="email" name="email" id="email" class="form-control p-3 border-0" placeholder="Your Email Address" required="">
                        <input type="button" class="btn btn-primary" name="subscribe" value="subscribe" onclick="btn_subscribe()">
                        <label for=" mc-email" class="subscribe-message"></label>
                    </div>
                </form>
                <div id="msg" style="font-weight:bold; text-align:center"></div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid copyright text-light py-4 wow fadeIn" data-wow-delay="0.1s">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                &copy; <?php echo $settings->site_footer ?>
            </div>
        </div>
    </div>
</div>
<script>
    function btn_subscribe() {
        var email = document.getElementById("email").value;
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                if (this.responseText == 'success') {
                    document.getElementById('email').value = "";
                    document.getElementById('msg').innerHTML = "Please check your email to verify account.";
                } else if (this.responseText == 'resend_mail') {
                    document.getElementById('email').value = "";
                    document.getElementById('msg').innerHTML = "Verification link has been sent to your email.";
                } else if (this.responseText == 'already_subscriber') {
                    document.getElementById('email').value = "";
                    document.getElementById('msg').innerHTML = "You has already been subscribed with this email";
                } else {
                    document.getElementById('msg').innerHTML = "Your account has been actived.";
                }
                //console.log(this.responseText);
            }
        }
        xhttp.open("Post", "subscriber.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send('email=' + email);
    }
</script>