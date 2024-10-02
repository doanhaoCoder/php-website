<?php
include "database/database.php";
include "database/settings.php";
include "database/users.php";
$database = new database();
$db = $database->connect();

$users = new users($db);

$settings = new settings($db);
$settings->id = 1;
$settings->read();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $username = $_POST['username'];
  $password = sha1($_POST['password']);

  $users->username = $username;
  $users->password = $password;

  //sign in admin
  if ($users->roleAdmin()->rowCount() == 0) {
    $users->name = $_POST['name'];
    $users->email = $_POST['email'];
    $users->phone = $_POST['phone'];
    $users->role = 2;
    $users->image = "guest.jpg";
    $users->email_verified = "verified";
    $users->status = 1;

    date_default_timezone_set($settings->site_timezone);
    $users->created_at = date("Y-m-d H:i:s", time());
    $users->updated_at = date("Y-m-d H:i:s", time());
    $users->create();
  }
  if ($users->userLogin()->rowCount() > 0) {
    $row = $users->userLogin()->fetch();
    session_start();
    $_SESSION['user_id'] = $row['id'];
    $_SESSION['user_role'] = $row['role'];
    header('location:index.php');
  } else {
    $error = "Login false!";
  }
}
?>

<!DOCTYPE html>
<html lang="en" class="form-screen">

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

</head>

<body>


  <?php
  if ($users->roleAdmin()->rowCount() > 0) {

    if (isset($error)) {
  ?>
      <div class="notification red" style="margin: 10px auto; padding: 12px">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0">
          <div>
            <?php echo $error ?>
          </div>
        </div>
      </div>
    <?php
    }
    ?>
    <!-- sign in user -->
    <div id="app">
      <section class="section main-section">
        <div class="card">
          <header class="card-header" style="display:flex; justify-content: center;">
            <div>
              <img src="<?php echo "../images/" . $settings->site_logo ?>" alt="" width="80px" height="80px" style="border-radius: 50px;">
              <p class="card-header-title" style="padding:0">
                <span class="icon"><i class="mdi mdi-lock"></i></span>
                Login
              </p>
            </div>
          </header>
          <div class="card-content">
            <form action="" method="POST">

              <div class="field spaced">
                <label class="label">Username</label>
                <div class="control icons-left">
                  <input class="input" type="text" name="username" placeholder="Username" required>
                  <span class="icon is-small left"><i class="mdi mdi-account"></i></span>
                </div>
              </div>

              <div class="field spaced">
                <label class="label">Password</label>
                <p class="control icons-left">
                  <input class="input" type="password" name="password" placeholder="Password" required>
                  <span class="icon is-small left"><i class="mdi mdi-asterisk"></i></span>
                </p>
              </div>

              <div class="field spaced">
                <div class="control">
                  <label class="checkbox"><input type="checkbox" name="remember" value="1" checked>
                    <span class="check"></span>
                    <span class="control-label">Remember</span>
                  </label>
                </div>
              </div>
              <hr>
              <div class="field grouped">
                <div class="control">
                  <button type="submit" class="button blue">
                    Login
                  </button>
                </div>

              </div>
            </form>
          </div>
          <div>
            <p style="text-align: center;"><?php echo $settings->site_footer ?></p>
          </div>
        </div>
      </section>
    </div>
  <?php
  } else {
    //sign up admin
  ?>
    <div id="app">
      <section class="section main-section">
        <div class="card">
          <header class="card-header">
            <div>
              <img src="<?php echo "../images/" . $settings->site_logo ?>" alt="" width="80px" height="80px" style="border-radius: 10px;">
            </div>
            <p class="card-header-title">
              <span class="icon"><i class="mdi mdi-lock"></i></span>
              Please sign up
            </p>
          </header>
          <div class="card-content">
            <form action="" method="POST">

              <div class="field spaced">
                <label class="label">Name</label>
                <div class="control icons-left">
                  <input class="input" type="text" name="name" placeholder="Name" required>
                  <span class="icon is-small left"><i class="mdi mdi-account"></i></span>
                </div>
              </div>

              <div class="field spaced">
                <label class="label">Email</label>
                <div class="control icons-left">
                  <input class="input" type="text" name="email" placeholder="Email" required>
                  <span class="icon is-small left"><i class="mdi mdi-account"></i></span>
                </div>
              </div>

              <div class="field spaced">
                <label class="label">Phone</label>
                <div class="control icons-left">
                  <input class="input" type="text" name="phone" placeholder="Phone" required>
                  <span class="icon is-small left"><i class="mdi mdi-account"></i></span>
                </div>
              </div>

              <div class="field spaced">
                <label class="label">Username</label>
                <div class="control icons-left">
                  <input class="input" type="text" name="username" placeholder="Username" required>
                  <span class="icon is-small left"><i class="mdi mdi-account"></i></span>
                </div>
              </div>

              <div class="field spaced">
                <label class="label">Password</label>
                <p class="control icons-left">
                  <input class="input" type="password" name="password" placeholder="Password" required>
                  <span class="icon is-small left"><i class="mdi mdi-asterisk"></i></span>
                </p>
              </div>

              <div class="field spaced">
                <div class="control">
                  <label class="checkbox"><input type="checkbox" name="remember" value="1" checked>
                    <span class="check"></span>
                    <span class="control-label">Remember</span>
                  </label>
                </div>
              </div>
              <hr>
              <div class="field grouped">
                <div class="control">
                  <button type="submit" class="button blue">
                    Sign up
                  </button>
                </div>

              </div>
            </form>
          </div>
          <div>
            <p style="text-align: center;"><?php echo $settings->site_footer ?></p>
          </div>
        </div>
      </section>
    </div>
  <?php
  }
  ?>

  <!-- Scripts below are for demo only -->
  <script type="text/javascript" src="js/main.min.js?v=1628755089081"></script>
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
</body>

</html>