<?php
session_start();
include "database/database.php";
include "database/blogcategories.php";
include "database/blogs.php";
include "database/sliders.php";
include "database/socials.php";
include "database/links.php";
include "database/about.php";
include "database/contact.php";
include "database/terms.php";
include "database/settings.php";
include "database/mailsettings.php";
include "database/subscribers.php";
include "database/comments.php";
include "database/users.php";
include "helper/help_function.php";

// check session user _id  
if (empty($_SESSION['user_id'])) {
  header("location:login.php");
}

$database = new database();
$db = $database->connect();

$settings = new settings($db);
$settings->id = 1;
$settings->read();

$page = isset($_GET["page"]) ? ($_GET["page"]) : 'dashboard';
?>

<!DOCTYPE html>
<html lang="en" class="">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $settings->site_name ?></title>
  <link rel="icon" href="<?php echo "../images/" . $settings->site_favicon ?>" sizes="32x32" href="favicon-32x32.png" />
  <link rel="icon" href="<?php echo "../images/" . $settings->site_favicon ?>" sizes="16x16" href="favicon-16x16.png" />

  <!-- Tailwind is included -->
  <link rel="stylesheet" href="css/main.css?v=1628755089081">

  <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png" />
  <link rel="mask-icon" href="safari-pinned-tab.svg" color="#00b4b6" />

  <meta name="description" content="Admin One - free Tailwind dashboard">

  <meta property="og:url" content="https://justboil.github.io/admin-one-tailwind/">
  <meta property="og:site_name" content="JustBoil.me">
  <meta property="og:title" content="Admin One HTML">
  <meta property="og:description" content="Admin One - free Tailwind dashboard">
  <meta property="og:image" content="https://justboil.me/images/one-tailwind/repository-preview-hi-res.png">
  <meta property="og:image:type" content="image/png">
  <meta property="og:image:width" content="1920">
  <meta property="og:image:height" content="960">

  <meta property="twitter:card" content="summary_large_image">
  <meta property="twitter:title" content="Admin One HTML">
  <meta property="twitter:description" content="Admin One - free Tailwind dashboard">
  <meta property="twitter:image:src" content="https://justboil.me/images/one-tailwind/repository-preview-hi-res.png">
  <meta property="twitter:image:width" content="1920">
  <meta property="twitter:image:height" content="960">

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-130795909-1"></script>


  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'UA-130795909-1');
  </script>

  <script src="https://kit.fontawesome.com/ea06a77a9b.js" crossorigin="anonymous"></script>

  <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
</head>

<body>

  <div id="app">

    <!-- header -->
    <?php
    include "includes/header.php";
    ?>

    <!-- sidebar -->
    <?php
    include "includes/sidebar.php";
    ?>

    <!-- dashboard -->
    <?php
    // print_r($_SESSION);
    if ($page == 'dashboard') {
      include 'includes/dashboard.php';
    } else if ($page == 'blogcategories') {
      include "includes/blogcategories.php";
    } else if ($page == 'blogcategories_add') {
      include "includes/blogcategories_add.php";
    } else if ($page == 'blogcategories_edit') {
      include "includes/blogcategories_edit.php";
    } //end blogcategories
    else if ($page == 'blogs') {
      include "includes/blogs.php";
    } else if ($page == 'blogs_add') {
      include "includes/blogs_add.php";
    } else if ($page == 'blogs_edit') {
      include "includes/blogs_edit.php";
    } //end blogs
    else if ($page == 'sliders') {
      include "includes/sliders.php";
    } else if ($page == 'sliders_add') {
      include "includes/sliders_add.php";
    } else if ($page == 'sliders_edit') {
      include "includes/sliders_edit.php";
    } //end sliders
    else if ($page == 'socials') {
      include "includes/socials.php";
    } else if ($page == 'socials_add') {
      include "includes/socials_add.php";
    } else if ($page == 'socials_edit') {
      include "includes/socials_edit.php";
    } //end socials 
    else if ($page == 'links') {
      include "includes/links.php";
    } else if ($page == 'links_add') {
      include "includes/links_add.php";
    } else if ($page == 'links_edit') {
      include "includes/links_edit.php";
    } //end links menu
    else if ($page == 'users') {
      include "includes/users.php";
    } else if ($page == 'users_add') {
      include "includes/users_add.php";
    } else if ($page == 'users_edit') {
      include "includes/users_edit.php";
    } //end users menu
    else if ($page == 'about') {
      include "includes/about.php";
    } else if ($page == 'contact') {
      include "includes/contact.php";
    } else if ($page == 'terms') {
      include "includes/terms.php";
    } else if ($page == 'settings') {
      include "includes/settings.php";
    } else if ($page == 'mailsettings') {
      include "includes/mailsettings.php";
    } else if ($page == 'subscribers') {
      include "includes/subscribers.php";
    } else if ($page == 'subscribers_add') {
      include "includes/subscribers_add.php";
    } else if ($page == 'comments') {
      include "includes/comments.php";
    }
    ?>

    <div id="sample-modal" class="modal">
      <div class="modal-background --jb-modal-close"></div>
      <div class="modal-card">
        <header class="modal-card-head">
          <p class="modal-card-title">Sample modal</p>
        </header>
        <section class="modal-card-body">
          <p>Lorem ipsum dolor sit amet <b>adipiscing elit</b></p>
          <p>This is sample modal</p>
        </section>
        <footer class="modal-card-foot">
          <button class="button --jb-modal-close">Cancel</button>
          <button class="button red --jb-modal-close">Confirm</button>
        </footer>
      </div>
    </div>

    <div id="sample-modal-2" class="modal">
      <div class="modal-background --jb-modal-close"></div>
      <div class="modal-card">
        <header class="modal-card-head">
          <p class="modal-card-title">Sample modal</p>
        </header>
        <section class="modal-card-body">
          <p>Lorem ipsum dolor sit amet <b>adipiscing elit</b></p>
          <p>This is sample modal</p>
        </section>
        <footer class="modal-card-foot">
          <button class="button --jb-modal-close">Cancel</button>
          <button class="button blue --jb-modal-close">Confirm</button>
        </footer>
      </div>
    </div>

    <!-- footer -->
    <footer class="footer">
      <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0">
        <div class="flex items-center justify-start space-x-3">
          <?php echo $settings->site_footer  ?>
        </div>
      </div>
    </footer>

  </div>

  <!-- Scripts below are for demo only -->
  <script type="text/javascript" src="js/main.min.js?v=1628755089081"></script>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
  <script type="text/javascript" src="js/chart.sample.min.js"></script>


  <script>
    ! function(f, b, e, v, n, t, s) {
      if (f.fbq) return;
      n = f.fbq = function() {
        n.callMethod ?
          n.callMethod.apply(n, arguments) : n.queue.push(arguments)
      };
      if (!f._fbq) f._fbq = n;
      n.push = n;
      n.loaded = !0;
      n.version = '2.0';
      n.queue = [];
      t = b.createElement(e);
      t.async = !0;
      t.src = v;
      s = b.getElementsByTagName(e)[0];
      s.parentNode.insertBefore(t, s)
    }(window, document, 'script',
      'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '658339141622648');
    fbq('track', 'PageView');
  </script>
  <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=658339141622648&ev=PageView&noscript=1" /></noscript>

  <!-- Icons below are for demo only. Feel free to use any icon pack. Docs: https://bulma.io/documentation/elements/icon/ -->
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">

  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
  <script>
    $('#content').summernote({
      placeholder: 'Input content',
      tabsize: 2,
      height: 100
    });
    $('#footer').summernote({
      placeholder: 'Input footer',
      tabsize: 2,
      height: 100
    });

    function sendMail() {
      var title = document.getElementById("title").value;
      var content = document.getElementById("content").value;
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          // console.log(this.responseText);
          // alert(this.responseText);
          if (this.responseText == "success") {
            document.getElementById("msg").innerHTML = "<div class='notification green' style='margin: 10px auto; padding: 12px'<div class='flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0'><div>Mail has been send all User successfully!</div></div></div>";
          } else {
            document.getElementById("msg").innerHTML = "<div class='notification red' style='margin: 10px auto; padding: 12px'<div class='flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0'><div>No User available to send email</div></div></div>";
          }
        }
      }
      xhttp.open("POST", "mail/sendmail.php", true);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhttp.send("title=" + title + "&content=" + content);
    }
  </script>
</body>

</html>