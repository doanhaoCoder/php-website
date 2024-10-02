<?php
include "admin/database/database.php";
include "admin/database/blogcategories.php";
include "admin/database/settings.php";
include "admin/database/sliders.php";
include "admin/database/socials.php";
include "admin/database/about.php";
include "admin/database/links.php";
include "admin/database/subscribers.php";
include "admin/database/blogs.php";
include "admin/database/comments.php";
include "admin/helper/help_function.php";



$database = new database();
$db = $database->connect();

$settings = new settings($db);
$settings->id = 1;
$settings->read();

$blogcategories = new blogcategories($db);
$stmt_blogcategories = $blogcategories->readAll();

$socials = new socials($db);
$stmt_socials = $socials->readAll();

$links = new links($db);
$stmt_links = $links->readAll();

$about = new about($db);
$about->id = 1;
$about->read();

/*verify code*/
if (!empty($_GET['verify'])) {
    $subscribers = new subscribers($db);
    $subscribers->verified_token = $_GET['verify'];
    $stmt_subscribers = $subscribers->checkRequestVerified();

    /*Verification matched*/
    if ($stmt_subscribers->rowCount() > 0) {
        $row = $stmt_subscribers->fetch();
        $subscribers->status = 1;
        $subscribers->verified_token = "verified";
        $subscribers->email = $row['email'];
        $subscribers->updated_at = date("Y-m-d h:i:s", time());
        $subscribers->id = $row['id'];
        $subscribers->update();
    }
}

$page = isset($_GET["page"]) ? ($_GET["page"]) : '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?php echo $settings->site_name ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <link rel="icon" href="<?php echo "./images/" . $settings->site_favicon ?>" sizes="32x32" href="favicon-32x32.png" />
    <link rel="icon" href="<?php echo "./images/" . $settings->site_favicon ?>" sizes="16x16" href="favicon-16x16.png" />
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>

    <!-- Spinner End -->

    <!-- Topbar Start -->
    <?php
    include "includes/topbar.php"
    ?>
    <!-- Topbar End -->

    <!-- Header Start -->
    <?php
    include "includes/header.php"
    ?>
    <!-- Header End -->

    <!-- slider Start -->
    <?php
    include "includes/slider.php"
    ?>
    <!-- slider End -->

    <!-- content Start -->
    <?php
    include "includes/content.php"
    ?>
    <!-- content End -->

    <!-- Footer Start -->
    <?php
    include "includes/footer.php"
    ?>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>